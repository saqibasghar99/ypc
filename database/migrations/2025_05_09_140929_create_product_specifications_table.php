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
        Schema::create('product_specifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->index();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('display')->nullable();
            $table->string('processor')->nullable();
            $table->string('ram')->nullable();
            $table->string('storage')->nullable();
            $table->string('battery')->nullable();
            $table->string('os')->nullable();
            $table->string('camera')->nullable();
            $table->string('connectivity')->nullable();
            $table->string('weight')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('warranty')->nullable();
            $table->text('included_items')->nullable();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_specifications');
    }
};
