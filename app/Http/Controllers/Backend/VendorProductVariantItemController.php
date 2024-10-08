<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\DataTables\VendorProductVariantItemDataTable;
use App\Http\Requests\Backend\StoreProductVariantItemRequest;
use App\Http\Requests\Backend\UpdateProductVariantItemRequest;

class VendorProductVariantItemController extends Controller
{
  protected $model;

  public function __construct(ProductVariantItem $productVariantItem)
  {
    $this->model = $productVariantItem;
  }

  public function index($productId, $variantId, VendorProductVariantItemDataTable $productVariantItemDataTable)
  {
    $product = Product::findOrFail($productId);
    $variant = ProductVariant::findOrFail($variantId);

    if ($variant->product->vendor_id !== Auth::user()->vendor->id) {
      abort(404);
    }

    return $productVariantItemDataTable->render('vendor.products.product-variant-item.index', compact('product', 'variant'));
  }

  public function create(string $productId, string $variantId)
  {
    $product = Product::findOrFail($productId);
    $variant = ProductVariant::findOrFail($variantId);
    return view('vendor.products.product-variant-item.create', compact('product', 'variant'));
  }

  /**
   * Store Data
   */
  public function store(StoreProductVariantItemRequest $request)
  {
    $data = $request->validated();

    $this->model::create($data);

    toastr()->success('Items Created Successfully!');

    return to_route('vendor.products-variant-item.index', ['productId' => $data['product_id'], 'variantId' => $data['variant_id']]);
  }

  public function edit($variantItemId)
  {
    $variantItem = $this->model::findOrFail($variantItemId);

    return view('vendor.products.product-variant-item.edit', compact('variantItem'));
  }

  public function update(UpdateProductVariantItemRequest $request, $variantItemId)
  {
    $data = $request->validated();

    $item = $this->model::findOrFail($variantItemId);

    $item->update($data);

    toastr()->success('Items Updated Successfully!');

    return redirect()->route('vendor.products-variant-item.index', [
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
    $item = $this->model::findOrFail($request->id);
    $item->status = $request->isChecked == 'true' ? 1 : 0;
    $item->save();
    return response(['status' => 'success', 'message' => 'Status Updated Successfully!']);
  }
}
