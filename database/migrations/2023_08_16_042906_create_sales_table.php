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
        Schema::create('sales', function (Blueprint $table) {
    //         'customer_id', 'paid_amount',
    //  'payment_method', 'trx_id', 'discount', 'comment'

            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->integer('paid_amount');
            $table->string('payment_method');
            $table->string('trx_id');
            $table->string('discount');
            $table->string('comment');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
