<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UpdateAdminVendorProfileRequest;
use App\Models\Vendor;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminVendorProfileController extends Controller
{
  use ImageUploadTrait;
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $user_id = Auth::user()->id;
    $vendor = Vendor::where('user_id', $user_id)->first();
    return view('admin.vendor-profile.index', ['vendor' => $vendor]);
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
  public function update(UpdateAdminVendorProfileRequest $request, string $id)
  {

    $validated = $request->validated();

    $vendor = Vendor::where('user_id', Auth::user()->id)->first();
    $bannerPath = $this->updateImage($request, 'banner', '/uploads/admin_vendors/', $vendor->banner);
    $vendor->banner = empty(!$bannerPath) ? $bannerPath : $vendor->banner;
    $vendor->phone = $validated['phone'];
    $vendor->email = $validated['email'];
    $vendor->address = $validated['address'];
    $vendor->description = $validated['description'];
    $vendor->fb_link = $validated['fb_link'];
    $vendor->insta_link = $validated['insta_link'];
    $vendor->tw_link = $validated['tw_link'];
    $vendor->status = $validated['status'];
    $vendor->save();

    toastr()->success('Updated successfully!');

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
