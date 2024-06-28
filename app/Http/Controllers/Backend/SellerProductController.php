<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\SellerProductsDataTable;

class SellerProductController extends Controller
{
  public function index(
    SellerProductsDataTable $sellerProductsDataTable
  ) {
    return $sellerProductsDataTable->render('admin.product.seller-products.index');
  }
}
