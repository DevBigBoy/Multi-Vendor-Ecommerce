<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductVariantItemDataTable;
use App\Http\Controllers\Controller;
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
    return $productVariantItemDataTable->render('admin.product.product_variant_item.index', ['product' => $product, 'variant' => $variant]);
  }
}