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
        Schema::create('settings', function (Blueprint $table) {
            $table->id('setting_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->json('notification_preferences')->nullable();
            $table->string('data_backup_frequency')->nullable();
            $table->string('data_restore_option')->nullable();
            $table->timestamps();
            // Foreign Key Constraint
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
