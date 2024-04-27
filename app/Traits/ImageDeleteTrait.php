<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait ImageDeleteTrait
{

  public function deleteImage(string $path)
  {
    if (File::exists(public_path($path))) {
      File::delete(public_path($path));
    }
  }
}