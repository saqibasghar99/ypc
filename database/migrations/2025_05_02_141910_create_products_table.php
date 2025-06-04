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
            $table->id();
            $table->string('productname');  
            $table->string('productdescription');
            $table->string('stockquantity')->default(0);;
            $table->string('totalprice');
            $table->decimal('costprice', 8, 2)->default(0.00)->nullable();
            $table->string('discount')->default(0);
            $table->string('category')->nullable();
            $table->string('size')->nullable();
            $table->string('tags')->nullable();
            $table->string('image');
            $table->string('preview_image1')->nullable();
            $table->string('preview_image2')->nullable();
            $table->string('preview_image3')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');      
            $table->decimal('shipping_cost', 8, 2)->default(0.00)->nullable();
            $table->decimal('tax_price', 8, 2)->default(0.00)->nullable();
            $table->timestamps();
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
