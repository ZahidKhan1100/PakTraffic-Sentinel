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
        Schema::connection('district')->create('vehicles', function (Blueprint $table) {
            $table->string('registration_number', 20)->primary();
            $table->char('owner_cnic', 13);
            $table->enum('type', ['car', 'bike', 'truck', 'other']);
            $table->string('make', 50)->nullable();
            $table->string('model', 50)->nullable();
            $table->date('registration_expiry');
            $table->timestamps();
        
            $table->foreign('owner_cnic')
                  ->references('cnic')
                  ->on('drivers')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('district')->dropIfExists('vehicles');
    }
};
