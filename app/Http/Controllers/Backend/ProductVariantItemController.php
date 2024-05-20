<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductVariantItemDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreProductVariantItemRequest;
use App\Http\Requests\Backend\UpdateProductVariantItemRequest;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;

class ProductVariantItemController extends Controller
{
  protected $model;

  public function __construct(ProductVariantItem $productVariantItem)
  {
    $this->model = $productVariantItem;
  }

  public function index($productId, $variantId, ProductVariantItemDataTable $productVariantItemDataTable)
  {
    $product = Product::findOrFail($productId);
    $variant = ProductVariant::findOrFail($variantId);
    return $productVariantItemDataTable->render('admin.product.product_variant_item.index', compact('product', 'variant'));
  }

  public function create(string $productId, string $variantId)
  {
    $product = Product::findOrFail($productId);
    $variant = ProductVariant::findOrFail($variantId);
    return view('admin.product.product_variant_item.create', compact('product', 'variant'));
  }

  /**
   * Store Data
   */
  public function store(StoreProductVariantItemRequest $request)
  {
    $data = $request->validated();

    $this->model::create($data);

    toastr()->success('Items Created Successfully!');

    return redirect()->route('admin.product_variant_items.index', [$data['product_id'], $data['variant_id']]);
  }

  public function edit($variantItemId)
  {
    $item = $this->model::findOrFail($variantItemId);
    return view('admin.product.product_variant_item.edit', compact('item'));
  }

  public function update(UpdateProductVariantItemRequest $request, $variantItemId)
  {
    $data = $request->validated();

    $item = $this->model::findOrFail($variantItemId);

    $item->update($data);

    toastr()->success('Items Updated Successfully!');

    return redirect()->route('admin.product_variant_items.index', [
      'productId' => $item->productVariant->product_id,
      'variantId' => $item->variant_id
    ]);
  }

  public function destroy($variantItemId)
  {
    $this->model::destroy($variantItemId);
    return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
  }

  public function changeStatus(Request $request)
  {
    $item = $this->model::find($request->id);
    $item->status = $request->isChecked == 'true' ? 1 : 0;
    $item->save();
    return response(['status' => 'success', 'message' => 'Status Updated Successfully!']);
  }
}
