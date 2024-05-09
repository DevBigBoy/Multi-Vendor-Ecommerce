<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\DataTables\BrandDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreBrandRequest;

class BrandController extends Controller
{
  use ImageUploadTrait;
  /**
   * Display a listing of the resource.
   */
  public function index(BrandDataTable $dataTable)
  {
    return $dataTable->render('admin.brand.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.brand.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreBrandRequest $request)
  {
    $validated = $request->validated();

    $logoPath = $this->uploadImage($request, 'logo', 'uploads/brands/');
    $brand = new Brand();
    $brand->logo = $logoPath;
    $brand->name = $validated['name'];
    $brand->slug = Str::slug($validated['name']);
    $brand->is_featured = $validated['is_featured'];
    $brand->status = $validated['status'];
    $brand->save();

    toastr()->success('Brand has been created Successfully!');
    return redirect()->route('admin.brand.index');
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
    $brand = Brand::findOrFail($id);
    return view('admin.brand.edit', ['brand' => $brand]);
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