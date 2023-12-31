<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductVariantDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreProductVariantRequest;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  protected $model;

  public function __construct()
  {
    $this->model = new ProductVariant;
  }

  public function index(Request $request, ProductVariantDataTable $datatable)
  {
    $product = Product::findOrFail($request->product);
    return $datatable->render('admin.product.variant.index', compact('product'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.product.variant.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreProductVariantRequest $request)
  {
    $data = $request->validated();

    $this->model::create($data);

    toastr()->success('Created Successfully!');

    return redirect()->route('admin.product_variant.index', ['product' => $data['product_id']]);
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