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
        Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('billing_first_name');
        $table->string('billing_last_name');
        $table->string('billing_email');
        $table->string('billing_address');
        $table->string('billing_phone');
        $table->string('billing_country');
        $table->string('billing_state')->nullable();
        $table->string('billing_city');
        $table->string('billing_zip')->nullable();
        
        $table->string('shipping_first_name');
        $table->string('shipping_last_name');
        $table->string('shipping_email');
        $table->string('shipping_address');
        $table->string('shipping_phone');
        $table->string('shipping_country');
        $table->string('shipping_state')->nullable();
        $table->string('shipping_city');
        $table->string('shipping_zip')->nullable();

        $table->string('payment_method')->default('Cash On Delivery');
        $table->decimal('total_amount', 8, 2);
        $table->decimal('quantity')->nullable();

        $table->string('order_number')->unique();
        $table->timestamp('ordered_at')->nullable();
        $table->timestamp('delivered_at')->nullable();
        $table->enum('payment_status', ['paid', 'unpaid', 'refunded'])->default('unpaid');
        $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled'])->default('pending');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
