<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductVariantItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariant extends Model
{
  use HasFactory;

  protected $fillable = [
    'product_id',
    'name',
    'status',
  ];

  public function product()
  {
    return $this->belongsTo(Product::class);
  }


  public function productVariantItems()
  {
    return $this->hasMany(ProductVariantItem::class, 'variant_id');
  }

  protected static function booted()
  {
    static::deleting(function ($variant) {
      // Delete all items associated with this variant
      $variant->productVariantItems()->delete();
    });
  }
}