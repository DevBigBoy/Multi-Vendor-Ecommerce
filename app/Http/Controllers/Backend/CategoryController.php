<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\CategoryDataTable;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Backend\CreateCategoryRequest;
use App\Http\Requests\Backend\UpdateCategoryRequest;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(CategoryDataTable $dataTable)
  {
    return $dataTable->render('admin.category.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.category.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(CreateCategoryRequest $request): RedirectResponse
  {
    $category = new Category();

    $category->icon = $request->icon;
    $category->name = $request->name;
    $category->slug = Str::slug($request->name);
    $category->status = $request->status;

    $category->save();

    toastr()->success('Created Successfully!');
    return redirect()->route('admin.category.index');
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
    $category = Category::findOrFail($id);
    return View('admin.category.edite', compact('category'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateCategoryRequest $request, string $id)
  {
    $category = Category::findOrFail($id);
    $category->icon = $request->icon;
    $category->name = $request->name;
    $category->status = $request->status;
    $category->save();

    toastr()->success('Updated Sucessfully');
    return redirect()->route('admin.category.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $category = Category::findOrFail($id);
    $category->delete();
    return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
  }

  public function changeStatus(Request $request)
  {
    $category = Category::findOrFail($request->id);
    $category->status = $request->isChecked == 'true' ? 1 : 0;
    $category->save();
    return response(['status' => 'success', 'message' => 'Updated Successfully!']);
  }
}
