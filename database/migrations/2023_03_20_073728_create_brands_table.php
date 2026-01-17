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
        // Schema::create('brands', function (Blueprint $table) {
        //     $table->id();
        //     $table->text('logo');
        //     $table->string('name');
        //     $table->string('slug');
        //     $table->boolean('is_featured');
        //     $table->boolean('status');
        //     $table->timestamps();
        // });

        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('website')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('is_featured')->default(0);
            $table->integer('position')->default(0);
            $table->timestamps();
            $table->index(['slug', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
