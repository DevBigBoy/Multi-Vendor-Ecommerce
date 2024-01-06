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
    Schema::create('product_variant_items', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('variant_id');
      $table->string('name');
      $table->double('price');
      $table->boolean('is_default')->default(1);
      $table->boolean('status')->default(1);
      $table->foreign('variant_id')->references('id')->on('product_variants');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('product_variant_items');
  }
};