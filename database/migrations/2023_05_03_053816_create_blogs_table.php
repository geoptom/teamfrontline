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
        // Schema::create('blogs', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('user_id');
        //     $table->integer('category_id');
        //     $table->text('image');
        //     $table->string('title');
        //     $table->string('slug');
        //     $table->text('description');
        //     $table->string('seo_title')->nullable();
        //     $table->string('seo_description')->nullable();
        //     $table->boolean('status');
        //     $table->timestamps();
        // });

        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained('blog_categories')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
