<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\CategoryDataTable;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Backend\CreateCategoryRequest;

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

    toastr()->success('Category Has been created Successfully!');
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