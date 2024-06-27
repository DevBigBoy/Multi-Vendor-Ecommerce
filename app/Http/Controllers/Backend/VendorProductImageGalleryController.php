<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use App\DataTables\VendorProductImageGalleryDataTable;
use App\Http\Requests\Vendor\StoreVendorProductImagesRequest;
use App\Traits\ImageDeleteTrait;
use Illuminate\Support\Facades\Auth;

class VendorProductImageGalleryController extends Controller
{
  use ImageUploadTrait, ImageDeleteTrait;

  protected $imageFolder = 'uploads/products/';
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request, VendorProductImageGalleryDataTable $vendorProductImageGalleryDataTable)
  {
    $product = Product::findOrFail($request->product);

    if ($product->vendor_id != Auth::user()->vendor->id) {
      abort(404);
    }

    return $vendorProductImageGalleryDataTable->render('vendor.products.image-gallery.index', compact('product'));
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
  public function store(StoreVendorProductImagesRequest $request)
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
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {

    $productImage = ProductImage::findOrFail($id);

    if ($productImage->product->vendor_id != Auth::user()->vendor->id) {
      abort(404);
    }

    $this->deleteImage($productImage->image_path);
    $productImage->delete();

    return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
  }
}
