<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SellerPendingProductsDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\SellerProductsDataTable;

class SellerProductController extends Controller
{
  public function index(
    SellerProductsDataTable $dataTable
  ) {
    return $dataTable->render('admin.product.seller-products.index');
  }

  public function pendingProducts(
    SellerPendingProductsDataTable $dataTable
  ) {
    return $dataTable->render('admin.product.seller-pending-products.index');
  }
}
