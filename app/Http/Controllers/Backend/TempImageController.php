<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TempImage;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class TempImageController extends Controller
{
  use ImageUploadTrait;

  public function store(Request $request)
  {

    if (!empty($request->image)) {
      $imagePath =  $this->uploadImage($request, 'image', 'uploads/temp');
      $tempImage = new TempImage();
      $tempImage->image_path = $imagePath;
      $tempImage->save();

      return response()->json(
        [
          'status' => true,
          'image_id' => $tempImage->id,
          'name' => $tempImage->image_path,
        ]
      );
    }
  }
}