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
        Schema::create('user_returns', function (Blueprint $table) {
            $table->id('return_id');
            $table->unsignedBigInteger('transaction_id');
            $table->date('return_date');
            $table->string('reason')->nullable();
            $table->string('resolution');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('transaction_id')->references('transaction_id')->on('sales_transactions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_returns');
    }
};
