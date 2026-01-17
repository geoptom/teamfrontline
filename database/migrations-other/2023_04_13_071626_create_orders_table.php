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
        // Schema::create('orders', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('invocie_id');
        //     $table->integer('user_id');
        //     $table->double('sub_total');
        //     $table->double('amount');
        //     $table->string('currency_name');
        //     $table->string('currency_icon');
        //     $table->integer('product_qty');
        //     $table->string('payment_method');
        //     $table->integer('payment_status');
        //     $table->text('order_address');
        //     $table->text('shpping_method');
        //     $table->text('coupon');
        //     $table->string('order_status');
        //     $table->timestamps();
        // });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('sub_total', 10, 2);
            $table->decimal('amount', 10, 2);
            $table->string('currency_name');
            $table->string('currency_icon');
            $table->integer('product_qty');
            $table->string('payment_method');
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->json('order_address');
            $table->string('shipping_method')->nullable();
            $table->json('coupon')->nullable();
            $table->enum('order_status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled'])->default('pending');
            $table->timestamps();

            $table->index(['user_id', 'order_status']);
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
