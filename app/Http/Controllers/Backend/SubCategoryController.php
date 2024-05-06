<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\CreateSubCategoryRequest;
use App\Http\Requests\Backend\UpdateSubCategoryRequest;
use App\Models\Category;
use App\Models\ChildCategory;
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

    toastr()->success('Sub Category Created Successfully!');

    return redirect()->route('admin.subcategory.index');
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
    $catgories = Category::all();
    $subCategory = SubCategory::findOrFail($id);
    return view('admin.sub-category.edite', ['subcategory' => $subCategory, 'catgories' => $catgories]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateSubCategoryRequest $request, string $id)
  {
    $subCategory = SubCategory::findOrFail($id);
    $subCategory->name = $request->name;
    $subCategory->category_id = $request->category;
    $subCategory->status = $request->status;
    $subCategory->save();
    toastr()->success('Sub Category updated Successfully!');
    return redirect()->route('admin.subcategory.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $subCategory = SubCategory::findOrFail($id);
    $childCategory = ChildCategory::where('sub_category_id', $subCategory->id)->count();
    if ($childCategory > 0) {
      return response(['status' => 'error', 'message' => 'This Sub-Category contain sub items for delete this you need to delete the sub items first!']);
    }
    $subCategory->delete();

    return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
  }

  public function changeStatus(Request $request)
  {
    $id = $request->id;
    $subCategory = SubCategory::findOrFail($id);
    $subCategory->status = $request->isChecked == 'true' ? 1 : 0;
    $subCategory->save();
    return response(['status' => 'success', 'message' => 'Updated Successfully!']);
  }
}
