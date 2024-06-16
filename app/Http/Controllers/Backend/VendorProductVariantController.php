<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Http\Controllers\Controller;
use App\DataTables\VendorProductVariantDataTable;

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
  public function store(Request $request)
  {
    //
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
    //
  }
}