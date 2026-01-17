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
        // Schema::create('transactions', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('order_id');
        //     $table->string('transaction_id');
        //     $table->string('payment_method');
        //     $table->double('amount');
        //     $table->double('amount_real_currency');
        //     $table->string('amount_real_currency_name');

        //     $table->timestamps();
        // });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->string('transaction_id')->unique();
            $table->string('payment_method');
            $table->decimal('amount', 10, 2);
            $table->decimal('amount_real_currency', 10, 2)->nullable();
            $table->string('amount_real_currency_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
