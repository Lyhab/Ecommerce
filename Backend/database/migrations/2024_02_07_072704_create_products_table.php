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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('model')->nullable(false);
            $table->float('discount')->nullable();
            $table->float('price')->nullable(false);
            $table->text('description')->nullable();
            $table->string('brand');
            $table->unsignedBigInteger('brand_id')->default(2);
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->text('image')->nullable();
            $table->timestamps();
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
