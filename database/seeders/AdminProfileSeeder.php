<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminProfileSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $user = User::where('email', 'admin@gmail.com')->first();
    $vendor = new Vendor();
    $vendor->banner = 'uploads/default.png';
    $vendor->phone = '01007575755';
    $vendor->email = 'admin@gmail.com';
    $vendor->address = 'Nasr city, Cairo';
    $vendor->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos at impedit quibusdam sunt accusantium dolores veritatis velit voluptatum, aspernatur facilis pariatur sint omnis ut, maiores autem. Odit eos ullam esse?';
    $vendor->fb_link = 'https://x.com/elonmusk';
    $vendor->tw_link = 'https://x.com/elonmusk';
    $vendor->insta_link = 'https://x.com/elonmusk';
    $vendor->user_id = $user->id;
    $vendor->save();
  }
}
