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
        // Schema::create('product_image_galleries', function (Blueprint $table) {
        //     $table->id();
        //     $table->text('image');
        //     $table->integer('product_id');
        //     $table->timestamps();
        // });

        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('image');
            $table->boolean('is_main')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index(['product_id', 'is_main']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_image_galleries');
    }
};
