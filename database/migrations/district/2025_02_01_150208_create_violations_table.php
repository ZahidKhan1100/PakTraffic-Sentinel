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
        Schema::connection('district')->create('violations', function (Blueprint $table) {
            $table->string('code', 10)->primary();
            $table->text('description');
            $table->decimal('fine_amount', 10, 2);
            $table->unsignedTinyInteger('penalty_points')->nullable();
            $table->date('effective_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('district')->dropIfExists('violations');
    }
};
