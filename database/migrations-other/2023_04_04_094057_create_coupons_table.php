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
        // Schema::create('coupons', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('code');
        //     $table->integer('quantity');
        //     $table->integer('max_use');
        //     $table->date('start_date');
        //     $table->date('end_date');
        //     $table->string('discount_type');
        //     $table->double('discount');
        //     $table->boolean('status');
        //     $table->integer('total_used');
        //     $table->timestamps();
        // });

        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->enum('type', ['fixed', 'percent'])->default('fixed');
            $table->decimal('value', 10, 2);
            $table->decimal('min_order_amount', 10, 2)->default(0);
            $table->integer('usage_limit')->nullable();
            $table->integer('used_count')->default(0);
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
