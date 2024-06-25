<?php

namespace App\Models;

use App\Traits\ImageDeleteTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Product extends Model
{
  use HasFactory, ImageDeleteTrait;

  protected $fillable = [
    'name',
    'slug',
    'thumb_image',
    'vendor_id',
    'category_id',
    'sub_category_id',
    'child_category_id',
    'brand_id',
    'qty',
    'price',
    'short_description',
    'long_description',
    'video_link',
    'sku',
    'offer_price',
    'offer_start_date',
    'offer_end_date',
    'product_type',
    'status',
    'is_approved',
    'seo_title',
    'seo_decription',
  ];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function subcategory()
  {
    return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
  }

  public function childcategory()
  {
    return $this->belongsTo(ChildCategory::class);
  }

  public function productImages()
  {
    return $this->hasMany(ProductImage::class);
  }

  public function productVariants()
  {
    return $this->hasMany(ProductVariant::class);
  }

  protected static function booted()
  {
    static::deleting(
      function ($product) {
        // Delete all images associated with the product
        foreach ($product->productImages as $image) {
          File::delete(public_path($image->image_path));
        }
        // Delete all variants and their items
        foreach ($product->productVariants as $variant) {
          $variant->productVariantItems()->delete();
        }
        $product->productVariants()->delete();
      }
    );
  }
}