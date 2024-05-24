<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

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

  public function scopeFilter(Builder $builder, $filters)
  {
  }
}