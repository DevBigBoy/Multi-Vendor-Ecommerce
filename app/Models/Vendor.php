<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
  use HasFactory;

  protected $fillable = [
    'banner',
    'phone',
    'email',
    'address',
    'description',
    'fb_link',
    'tw_link',
    'insta_link',
    'user_id',
    'shop_name',
    'status',
  ];
}
