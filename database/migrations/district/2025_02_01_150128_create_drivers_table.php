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
        Schema::connection('district')->create('drivers', function (Blueprint $table) {
            $table->char('cnic', 13)->primary();
            $table->string('license_number', 20)->unique();
            $table->string('full_name', 100);
            $table->text('address');
            $table->string('mobile', 15);
            $table->decimal('total_fines', 15, 2)->default(0);
            $table->enum('license_status', ['valid', 'suspended', 'expired'])->default('valid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('district')->dropIfExists('drivers');
    }
};
