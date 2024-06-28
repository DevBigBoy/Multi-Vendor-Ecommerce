<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Http\Controllers\Controller;
use App\DataTables\VendorProductVariantDataTable;
use App\Http\Requests\Vendor\StoreVendorProductVariantRequest;
use App\Http\Requests\Vendor\UpdateVendorProductVariantRequest;
use App\Models\ProductVariantItem;
use Illuminate\Support\Facades\Auth;

class VendorProductVariantController extends Controller
{

  protected $model;

  public function __construct(ProductVariant $productVariant)
  {
    $this->model = $productVariant;
  }

  /**
   * Display a listing of the resource.
   */
  public function index(Request $request, VendorProductVariantDataTable $vendorProductVariantDataTable)
  {
    $product = Product::findOrFail($request->product);

    if ($product->vendor_id !== Auth::user()->vendor->id) {
      abort(404);
    }

    return $vendorProductVariantDataTable->render('vendor.products.product-variant.index', compact('product'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Request $request)
  {
    $product = Product::findOrFail($request->product);
    return view('vendor.products.product-variant.create', compact('product'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreVendorProductVariantRequest $request)
  {
    $variant = $request->validated();

    $this->model::create($variant);

    toastr()->success('Created Successfully!');

    return to_route('vendor.products-variant.index', ['product' => $variant['product_id']]);
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
    $variant =  $this->model::findOrFail($id);

    if ($variant->product->vendor_id !== Auth::user()->vendor->id) {
      abort(404);
    }

    return view('vendor.products.product-variant.edit', compact('variant'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateVendorProductVariantRequest $request, string $id)
  {

    $variant = $this->model::findOrFail($id);

    if ($variant->product->vendor_id !== Auth::user()->vendor->id) {
      abort(404);
    }

    $newVariant = $request->validated();

    $variant->update($newVariant);

    toastr()->success('Updated Successfully!');

    return to_route('vendor.products-variant.index', ['product' => $variant->product_id]);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $variant = $this->model::findOrFail($id);

    if ($variant->product->vendor_id !== Auth::user()->vendor->id) {
      abort(404);
    }

    if (ProductVariantItem::where('variant_id', $id)->count() > 0) {
      return response(['status' => 'error', 'message' => 'This Variant Has items please delete it first']);
    }

    $variant->delete();
    return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
  }

  public function changeStatus(Request $request)
  {
    $variant = $this->model::findOrFail($request->id);
    $variant->status = $request->isChecked == 'true' ? 1 : 0;
    $variant->save();

    return response(['status' => 'success', 'message' => 'Status Updated Successfully!']);
  }
}
