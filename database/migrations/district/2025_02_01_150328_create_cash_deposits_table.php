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
        Schema::connection('district')->create('cash_deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('officer_id')->constrained('officers');
            $table->decimal('amount', 15, 2);
            $table->date('deposit_date');
            $table->string('slip_number', 50);
            $table->boolean('verified')->default(false);
            $table->dateTime('verification_date')->nullable();
            $table->unsignedBigInteger('verified_by')->nullable();
            $table->timestamps();
            $table->foreign('verified_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('district')->dropIfExists('cash_deposits');
    }
};
