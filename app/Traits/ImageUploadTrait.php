<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait ImageUploadTrait
{
  public function uploadImage($request, $inputName, $path)
  {
    if ($request->hasFile($inputName)) {
      // if (File::exists(public_path($path))) {
      //   File::delete(public_path($path));
      // }

      $image = $request->{$inputName};
      $imageExt = $image->getClientOriginalExtension();
      $imageName = 'media_' . uniqid() . '.' . $imageExt;
      $image->move(public_path($path), $imageName);

      return $path . $imageName;
    }
  }

  public function updateImage($request, $inputName, $path, $oldpath = null)
  {
    if ($request->hasFile($inputName)) {
      if (File::exists(public_path($oldpath))) {
        File::delete(public_path($oldpath));
      }

      $image = $request->{$inputName};
      $imageExt = $image->getClientOriginalExtension();
      $imageName = 'media_' . uniqid() . '.' . $imageExt;
      $image->move(public_path($path), $imageName);

      return $path . $imageName;
    } else {
      return $oldpath;
    }
  }
}
