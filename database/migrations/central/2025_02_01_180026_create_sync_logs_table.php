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
        Schema::connection('central')->create('sync_logs', function (Blueprint $table) {
            $table->id();
            $table->string('district_code', 5);
            $table->timestamp('last_sync')->useCurrent();
            $table->integer('records_synced')->nullable();
            $table->enum('sync_type', ['daily', 'manual', 'recovery']);
            $table->enum('status', ['success', 'failed']);
            $table->timestamps();
            $table->foreign('district_code')->references('code')->on('districts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('central')->dropIfExists('sync_logs');
    }
};
