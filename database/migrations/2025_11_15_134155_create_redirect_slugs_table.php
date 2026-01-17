<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('redirect_slugs', function (Blueprint $table) {
            $table->id();

            // Multi-model support
            $table->string('model')->default('products');
            $table->string('route_name')->nullable();

            // Old -> New mapping
            $table->string('old_slug')->nullable();
            $table->string('new_slug')->nullable(); // null means “URL removed permanently”

            $table->string('old_path')->nullable(); // /about
            $table->string('new_path')->nullable(); // /about-us

            // Prevent loops & track updates
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('hits')->default(0);
            $table->timestamp('last_hit_at')->nullable();

            $table->timestamps();

            $table->index(['old_slug', 'route_name', 'is_active']);
            $table->index(['model', 'old_path', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redirect_slugs');
    }
};
