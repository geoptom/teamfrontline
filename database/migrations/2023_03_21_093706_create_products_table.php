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
        // Schema::create('products', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('slug');
        //     $table->text('thumb_image');
        //     $table->integer('vendor_id');
        //     $table->integer('category_id');
        //     $table->integer('sub_category_id')->nullable();
        //     $table->integer('child_category_id')->nullable();
        //     $table->integer('brand_id');
        //     $table->integer('qty');
        //     $table->text('short_description');
        //     $table->text('long_description');
        //     $table->text('video_link')->nullable();
        //     $table->string('sku')->nullable();
        //     $table->double('price');
        //     $table->double('offer_price')->nullable();
        //     $table->date('offer_start_date')->nullable();
        //     $table->date('offer_end_date')->nullable();
        //     $table->string('product_type')->nullable();
        //     $table->boolean('status');
        //     $table->integer('is_approved')->default(0);
        //     $table->string('seo_title')->nullable();
        //     $table->text('seo_description')->nullable();

        //     $table->timestamps();
        // });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('thumb_image')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('brand_id')->nullable()->constrained()->onDelete('set null');
            $table->integer('qty')->default(0);
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->string('video_link')->nullable();
            $table->string('sku')->nullable()->unique();
            $table->decimal('price', 10, 2);
            $table->decimal('offer_price', 10, 2)->nullable();
            $table->date('offer_start_date')->nullable();
            $table->date('offer_end_date')->nullable();
            $table->enum('product_type', ['simple', 'variable'])->default('simple');
            $table->json('attributes')->nullable(); // For vendor CSV variations or extra data
            $table->boolean('status')->default(1);
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_approved')->default(0);
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->timestamps();

            $table->index(['category_id', 'status', 'is_approved']);
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
