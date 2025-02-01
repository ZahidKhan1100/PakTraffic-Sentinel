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
        Schema::connection('central')->create('districts', function (Blueprint $table) {
            $table->string('code', 5)->primary();
            $table->string('name', 50);
            $table->enum('province', ['Punjab', 'Sindh', 'KPK', 'Balochistan', 'GB', 'AJK']);
            $table->string('bank_account', 50);
            $table->string('contact_email', 100)->nullable();
            $table->date('active_since')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('central')->dropIfExists('districts');
    }
};
