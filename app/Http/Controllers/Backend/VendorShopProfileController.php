<?php

namespace App\Http\Controllers\Backend;

use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\StoreVendorShopProfileRequest;
use App\Http\Requests\Vendor\UpdateVendorShopProfileRequest;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Auth;

class VendorShopProfileController extends Controller
{
  use ImageUploadTrait;
  /**
   * Display a listing of the resource.
   */

  public function index()
  {
    $vendor = Vendor::where('user_id', Auth::user()->id)->first();
    return view('vendor.shop-profile.index', compact('vendor'));
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
  public function store(StoreVendorShopProfileRequest $request)
  {
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
  public function update(UpdateVendorShopProfileRequest $request, string $id)
  {
    $vendor = Vendor::where('user_id', Auth::user()->id)->first();

    $validated = $request->validated();

    $validated['banner'] = $this->updateImage($request, 'banner', '/uploads/admin_vendors/', $vendor->banner) ?? $vendor->banner;

    $vendor->update($validated);

    toastr()->success('Updated Successfully!');

    return redirect()->back();
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}