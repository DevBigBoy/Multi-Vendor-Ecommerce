<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  public function category()
  {
    $this->belongsTo(Category::class);
  }

  public function subcategory()
  {
    $this->belongsTo(SubCategory::class);
  }

  public function childcategory()
  {
    $this->belongsTo(ChildCategory::class);
  }
}
