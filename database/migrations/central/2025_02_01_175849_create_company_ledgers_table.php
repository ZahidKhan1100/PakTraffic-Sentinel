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
        Schema::connection('central')->create('company_ledgers', function (Blueprint $table) {
            $table->id();
            $table->string('district_code', 5);
            $table->date('transaction_date');
            $table->decimal('service_fee', 15, 2);
            $table->string('transaction_id', 50)->nullable();
            $table->timestamps();
            $table->foreign('district_code')->references('code')->on('districts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('central')->dropIfExists('company_ledgers');
    }
};
