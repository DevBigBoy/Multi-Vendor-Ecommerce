<?php

namespace App\Models;

use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariantItem extends Model
{
  use HasFactory;

  protected $fillable = [
    'variant_id', 'name', 'price', 'is_default', 'status'
  ];


  public function productVariant()
  {
    return $this->belongsTo(ProductVariant::class, 'variant_id', 'id');
  }
}