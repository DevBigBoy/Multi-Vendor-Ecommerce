<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VendorShopprofileSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $user = User::where('email', 'vendor@gmail.com')->first();

    Vendor::create([
      'banner' => 'uploads/default.png',
      'phone' => '01025398567',
      'email' => 'vendor@gmail.com',
      'address' => 'Mansoura, Dakahlia, Egypt',
      'shop_name' => 'Vendor Shop',
      'description' => 'Web Developer - Back End Major',
      'fb_link' => 'https://x.com/shezo',
      'tw_link' => 'https://x.com/shezo',
      'insta_link' => 'https://x.com/shezo',
      'user_id' => $user->id,
    ]);
  }
}