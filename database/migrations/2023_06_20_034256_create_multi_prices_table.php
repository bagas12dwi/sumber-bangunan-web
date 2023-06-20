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
        Schema::create('multi_prices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('amount');
            $table->foreignId('unit_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
            $table->integer('selling_price');
            $table->integer('capital_price');
            $table->foreignId('user_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multi_prices');
    }
};
