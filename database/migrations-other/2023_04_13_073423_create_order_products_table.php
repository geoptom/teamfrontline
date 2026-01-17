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
        // Schema::create('order_products', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('order_id');
        //     $table->integer('product_id');
        //     $table->integer('vendor_id');
        //     $table->string('product_name');
        //     $table->text('variants');
        //     $table->integer('variant_total')->nullable();
        //     $table->string('unit_price');
        //     $table->integer('qty');

        //     $table->timestamps();
        // });

        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('product_name');
            $table->json('variants')->nullable();
            $table->decimal('unit_price', 10, 2);
            $table->integer('qty');
            $table->timestamps();

            $table->index('order_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
