<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\VendorProductImageGalleryDataTable;

class VendorProductImageGalleryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request, VendorProductImageGalleryDataTable $vendorProductImageGalleryDataTable)
  {
    $product = Product::find($request->product);
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
  public function store(Request $request)
  {
    dd($request->all());
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