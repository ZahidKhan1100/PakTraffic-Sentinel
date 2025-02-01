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
        Schema::connection('district')->create('officers', function (Blueprint $table) {
            $table->id();
            $table->string('badge_number', 20)->unique();
            $table->decimal('current_balance', 15, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->string('district_code', 5);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->index('district_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('district')->dropIfExists('officers');
    }
};
