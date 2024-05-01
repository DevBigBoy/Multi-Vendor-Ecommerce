<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\CreateSubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(SubCategoryDataTable $dataTable)
  {

    return $dataTable->render('admin.sub-category.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $catgories = Category::all();
    return view('admin.sub-category.create', ['catgories' => $catgories]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(CreateSubCategoryRequest $request)
  {
    $validated = $request->validated();
    $subcategory = new SubCategory();
    $subcategory->category_id = $validated['category'];
    $subcategory->name = $validated['name'];
    $subcategory->slug = Str::slug($validated['name']);
    $subcategory->status = $validated['status'];
    $subcategory->save();

    toastr()->success('Sub-Category Created Successfully!');

    return redirect()->route('admin.sub-category.index');
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
