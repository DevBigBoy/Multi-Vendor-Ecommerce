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
      $table->string('name');
      $table->string('slug');
      $table->text('thumb_image');
      $table->foreignId('vendor_id')->constrained('vendors');
      $table->foreignId('category_id')->constrained('categories');
      $table->foreignId('sub_category_id')->constrained('sub_categories');
      $table->foreignId('child_category_id')->constrained('child_categories');
      $table->foreignId('brand_id')->constrained('brands');
      $table->integer('qty');
      $table->double('price');
      $table->text('short_description');
      $table->longText('long_description');
      $table->text('video_link')->nullable();
      $table->string('sku')->nullable();
      $table->double('offer_price')->nullable();
      $table->date('offer_start_date')->nullable();
      $table->date('offer_end_date')->nullable();
      $table->string('product_type')->nullable();
      $table->boolean('status');
      $table->integer('is_approved')->default(0);
      $table->string('seo_title')->nullable();
      $table->text('seo_decription')->nullable();
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