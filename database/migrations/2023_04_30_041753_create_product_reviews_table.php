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
        // Schema::create('product_reviews', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('product_id');
        //     $table->integer('user_id');
        //     $table->integer('vendor_id');
        //     $table->string('review');
        //     $table->string('rating');
        //     $table->boolean('status');

        //     $table->timestamps();
        // });

        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('review')->nullable();
            $table->tinyInteger('rating')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_reviews');
    }
};
