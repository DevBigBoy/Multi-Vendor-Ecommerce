<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductImageDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreProductImagesRequest;
use App\Models\Product;
use App\Models\ProductImage;
use App\Traits\ImageDeleteTrait;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class ProductImageGalleryController extends Controller
{
  use ImageUploadTrait, ImageDeleteTrait;

  protected $imageFolder = 'uploads/products/';

  /**
   * Display a listing of the resource.
   */
  public function index(Request $request, ProductImageDataTable $datatable)
  {
    $product = Product::findOrFail($request->product);
    return $datatable->render('admin.product.image_gallery.index', compact('product'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreProductImagesRequest $request)
  {
    $data = $request->validated();

    $imagePaths = $this->uploadMultiImage($request, 'images', $this->imageFolder);

    foreach ($imagePaths as  $imagePath) {
      ProductImage::create([
        'product_id' => $data['product_id'],
        'image_path' => $imagePath
      ]);
    }

    toastr()->success('Uploaded Successfully!');
    return redirect()->back();
  }




  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $productImage = ProductImage::findOrFail($id);
    $this->deleteImage($productImage->image_path);
    $productImage->delete();

    return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
  }
}