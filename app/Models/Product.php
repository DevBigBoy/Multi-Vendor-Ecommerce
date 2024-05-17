<?php

namespace App\Models;

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
    return $this->belongsTo(SubCategory::class);
  }

  public function childcategory()
  {
    return $this->belongsTo(ChildCategory::class);
  }

  public function productimage()
  {
    return $this->hasMany(ProductImage::class);
  }
}
