<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\DataTables\BrandDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreBrandRequest;
use App\Http\Requests\Backend\UpdateBrandRequest;
use App\Traits\ImageDeleteTrait;

class BrandController extends Controller
{
  use ImageUploadTrait, ImageDeleteTrait;

  protected $imageFolder = 'uploads/brands/';
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

    $logoPath = $this->uploadImage($request, 'logo', $this->imageFolder);
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
  public function update(UpdateBrandRequest $request, string $id)
  {
    $validated = $request->validated();

    $brand = Brand::findOrFail($id);
    $logoPath = $this->updateImage($request, 'logo', $this->imageFolder, $brand->logo);

    $brand->logo = empty(!$logoPath) ? $logoPath : $brand->logo;
    $brand->name = $validated['name'];
    $brand->slug = Str::slug($validated['name']);
    $brand->is_featured = $validated['is_featured'];
    $brand->status = $validated['status'];

    $brand->save();

    toastr()->success('Brand has been Updated Successfully!');
    return redirect()->route('admin.brand.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $brand = Brand::findOrFail($id);
    $this->deleteImage($brand->logo);
    $brand->delete();

    return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
  }

  public function changeStatus(Request $request)
  {
    $brand = Brand::findOrFail($request->id);
    $brand->status = $request->isChecked == 'true' ? 1 : 0;
    $brand->save();

    return response(['status' => 'success', 'message' => 'Updated Successfully!']);
  }
}