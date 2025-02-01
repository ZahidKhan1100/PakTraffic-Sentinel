<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('district')->create('tickets', function (Blueprint $table) {
            $table->id();

            // Unique ticket number with prefix pattern: DISTRICT-YYYYMMDD-00001
            $table->string('ticket_number', 25)->unique()->comment('Format: DISTRICT-YYYYMMDD-00001');

            // Relationships
            $table->foreignId('officer_id')->constrained('officers')->onDelete('restrict');
            $table->char('driver_cnic', 13)->comment('References drivers.cnic');
            $table->string('vehicle_registration', 20)->comment('References vehicles.registration_number');
            $table->string('violation_code', 10)->comment('References violations.code');

            // Dates
            $table->dateTime('issue_date')->useCurrent();
            $table->date('due_date')->comment('Auto-calculated based on violation type');

            // Status tracking
            $table->enum('status', ['issued', 'paid', 'contested', 'void'])->default('issued');
            $table->enum('payment_method', ['cash', 'card'])->nullable();

            // Financials
            $table->decimal('amount', 10, 2)->comment('Stored in PKR');

            // Geolocation
            $table->decimal('lat', 10, 8)->nullable()->comment('GPS Latitude');
            $table->decimal('lng', 11, 8)->nullable()->comment('GPS Longitude');

            // Evidence handling (store S3 paths or base64 thumbnails)
            $table->json('evidence_photos')->nullable()->comment('Array of image URLs');

            // Timestamps
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('driver_cnic')->references('cnic')->on('drivers')->onDelete('cascade');
            $table->foreign('vehicle_registration')->references('registration_number')->on('vehicles')->onDelete('cascade');
            $table->foreign('violation_code')->references('code')->on('violations')->onDelete('restrict');

            // Index optimization
            $table->index(['driver_cnic', 'status'], 'tickets_driver_status_index');
            $table->index(['vehicle_registration', 'issue_date'], 'tickets_vehicle_issue_date_index');
            $table->index('due_date', 'tickets_due_date_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('district')->dropIfExists('tickets');
    }
};
