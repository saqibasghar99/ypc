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
        Schema::create('feefixer', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('feefixer');
    }
};
