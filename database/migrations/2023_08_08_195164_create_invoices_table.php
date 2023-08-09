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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id('invoice_id');
            // $table->unsignedBigInteger('transaction_id')->nullable();
            $table->date('invoice_date');
            $table->date('due_date')->nullable();
            $table->string('status');
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->timestamps();
            // foreign key 
            // $table->foreign('transaction_id')->references('transaction_id')->on('sales_transactions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
