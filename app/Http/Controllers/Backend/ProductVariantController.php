<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductVariantDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreProductVariantRequest;
use App\Http\Requests\Backend\UpdateProductVariantRequest;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class ProductVariantController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  protected $model;

  public function __construct(ProductVariant $productVariant)
  {
    $this->model = $productVariant;
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
    $variant = $this->model::findOrFail($id);
    return view('admin.product.variant.edit', compact('variant'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateProductVariantRequest $request, string $id)
  {
    $variant = $this->model::findOrFail($id);

    $data = $request->validated();

    $variant->update($data);

    toastr()->success('Updated Successfully!');

    return redirect()->route('admin.product_variant.index', ['product' => $variant->product_id]);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $this->model::destroy($id);
    return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
  }

  public function changeStatus(Request $request)
  {
    $variant = $this->model::findOrFail($request->id);
    $variant->status = $request->isChecked == 'true' ? 1 : 0;
    $variant->save();

    return response(['status' => 'success', 'message' => 'Status Updated Successfully!']);
  }
}
