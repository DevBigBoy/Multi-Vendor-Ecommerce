<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\DataTables\VendorProductDataTable;
use App\Http\Requests\Vendor\StoreVendorProductRequest;
use App\Http\Requests\Vendor\UpdateVendorProductRequest;

class VendorProductController extends Controller
{
  use ImageUploadTrait;

  protected $imageFolder = 'uploads/products/';
  /**
   * Display a listing of the resource.
   */
  public function index(VendorProductDataTable $dataTable)
  {
    return $dataTable->render('vendor.products.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $categories = Category::all();
    $brands = Brand::all();
    return view('vendor.products.create', compact('categories', 'brands'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreVendorProductRequest $request)
  {
    $validated = $request->validated();

    $imagePath  = $this->uploadImage($request, 'thumb_image', $this->imageFolder);
    $product = new Product();
    $product->name = $validated['name'];
    $product->slug = Str::slug($validated['name']);
    $product->thumb_image = $imagePath;
    $product->vendor_id = Auth::user()->vendor->id;
    $product->category_id = $validated['category'];
    $product->sub_category_id = $validated['sub_category'];
    $product->child_category_id  = $validated['child_category'];
    $product->brand_id  = $validated['brand'];
    $product->qty = $validated['qty'];
    $product->price = $validated['price'];
    $product->short_description = $validated['short_description'];
    $product->long_description = $validated['long_description'];
    $product->product_type = $validated['product_type'];
    $product->status = $validated['status'];
    $product->video_link = $validated['video_link'];
    $product->sku = $validated['sku'];
    $product->offer_price = $validated['offer_price'];
    $product->offer_start_date = $validated['offer_start_date'];
    $product->offer_end_date = $validated['offer_end_date'];
    $product->is_approved = 0;
    $product->seo_title = $validated['seo_title'];
    $product->seo_decription = $validated['seo_decription'];
    $product->save();

    toastr()->success('Product created Successfully!');

    return to_route('vendor.products.index');
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
    $product = Product::find($id);
    $categories = Category::all();
    $brands = Brand::all();

    $subCategries = SubCategory::where('category_id', $product->category_id)->get();
    $childcategories = ChildCategory::where('sub_category_id', $product->sub_category_id)->get();

    return view('vendor.products.edit', compact('product', 'categories', 'brands', 'subCategries', 'childcategories'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateVendorProductRequest $request, string $id)
  {
    $validated = $request->validated();

    $product = Product::find($id);

    $imagePath  = $this->updateImage($request, 'thumb_image', $this->imageFolder, $product->thumb_image);
    $product->name = $validated['name'];
    $product->slug = Str::slug($validated['name']);
    $product->thumb_image = $imagePath ?? $product->thumb_image;
    $product->vendor_id = Auth::user()->vendor->id;
    $product->category_id = $validated['category'];
    $product->sub_category_id = $validated['sub_category'];
    $product->child_category_id  = $validated['child_category'];
    $product->brand_id  = $validated['brand'];
    $product->qty = $validated['qty'];
    $product->price = $validated['price'];
    $product->short_description = $validated['short_description'];
    $product->long_description = $validated['long_description'];
    $product->product_type = $validated['product_type'];
    $product->status = $validated['status'];
    $product->video_link = $validated['video_link'];
    $product->sku = $validated['sku'];
    $product->offer_price = $validated['offer_price'];
    $product->offer_start_date = $validated['offer_start_date'];
    $product->offer_end_date = $validated['offer_end_date'];
    $product->is_approved = $product->is_approved;
    $product->seo_title = $validated['seo_title'];
    $product->seo_decription = $validated['seo_decription'];
    $product->save();

    toastr()->success('Product Updated Successfully!');
    return to_route('vendor.products.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }


  public function getSubCategories(Request $request)
  {
    $categories = Category::find($request->id)->subCategories;
    return $categories;
  }

  public function getChildCategories(Request $request)
  {
    $childcategories = SubCategory::find($request->id)->childCategories;
    return $childcategories;
  }
}