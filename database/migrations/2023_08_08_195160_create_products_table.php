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
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('cost_price', 10, 2)->nullable();
            $table->integer('stock_quantity')->default(0);
            $table->string('image_url')->nullable();
            $table->text('specifications')->nullable();
            $table->boolean('availability')->default(true);
            $table->decimal('weight', 10, 2)->nullable();
            $table->string('dimensions')->nullable();
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->string('supplier_product_id')->nullable();
            $table->text('tags')->nullable();
            $table->timestamps();
            // Foreign Key Constraints
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('set null');
            $table->foreign('brand_id')->references('brand_id')->on('brands')->onDelete('set null');
            $table->foreign('supplier_id')->references('supplier_id')->on('suppliers')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
