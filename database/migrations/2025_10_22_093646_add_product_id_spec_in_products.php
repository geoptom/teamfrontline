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
        Schema::table('products', function (Blueprint $table) {
            $table->string('product_uid')->nullable()->after('id');
            $table->longText('features')->nullable()->after('long_description');
            $table->longText('specifications')->nullable()->after('features');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('product_uid');
            $table->dropColumn('features');
            $table->dropColumn('specifications');
        });
    }
};
