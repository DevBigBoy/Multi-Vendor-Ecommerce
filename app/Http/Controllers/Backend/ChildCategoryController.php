<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use App\Http\Controllers\Controller;
use App\DataTables\ChildCategoryDataTable;
use App\Http\Requests\Backend\StoreChildCategoryRequest;

class ChildCategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(ChildCategoryDataTable $dataTable)
  {
    return $dataTable->render('admin.child-category.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $categories = Category::all();
    $subCategories = SubCategory::all();
    return view('admin.child-category.create', ['subcategories' => $subCategories, 'categories' => $categories]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreChildCategoryRequest $request)
  {
    $validated = $request->validated();
    $childCategory = new ChildCategory();
    $childCategory->category_id = $validated['category'];
    $childCategory->sub_category_id = $validated['sub_category'];
    $childCategory->name = $validated['name'];
    $childCategory->slug = Str::slug($validated['name']);
    $childCategory->status = $validated['status'];
    $childCategory->save();

    toastr()->success('Created Successfully!');

    return redirect()->route('admin.childcategory.index');
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

  public function changeStatus()
  {
  }
  /**
   * Get Sub Categories based on category's Id
   */
  public function getSubCategories(Request $request)
  {
    $subCategories = SubCategory::where('category_id', $request->id)->where('status', 1)->get();
    return $subCategories;
  }
}
