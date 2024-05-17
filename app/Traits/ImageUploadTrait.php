<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait ImageUploadTrait
{
  public function uploadImage($request, $inputName, $path)
  {
    if ($request->hasFile($inputName)) {

      $image = $request->{$inputName};
      $imageExt = $image->getClientOriginalExtension();
      $imageName = 'media_' . uniqid() . '.' . $imageExt;
      $image->move(public_path($path), $imageName);

      return $path . $imageName;
    }
  }

  public function uploadMultiImage($request, $inputName, $path)
  {
    $imagePaths = [];

    if ($request->hasFile($inputName)) {

      $images = $request->{$inputName};

      foreach ($images as  $image) {
        $imageExt = $image->getClientOriginalExtension();
        $imageName = 'media_' . uniqid() . '.' . $imageExt;

        $image->move(public_path($path), $imageName);

        $imagePaths[] = $path . $imageName;
      }

      return $imagePaths;
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
    }
  }
}
