<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Http\Controllers\Backend\VendorShopProfileController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\VendorProductVariantController;
use App\Http\Controllers\Backend\VendorProductImageGalleryController;

/**
 * Vendor Routes
 **/
Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [VendorProfileController::class, 'index'])->name('profile');
Route::put('profile', [VendorProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile', [VendorProfileController::class, 'updatePassword'])->name('profile.update.password');

/**
 * Vendor Shop Profile
 **/
Route::resource('shop-profile', VendorShopProfileController::class);

/**
 *  Products Routes
 **/
Route::put('products/change-status', [VendorProductController::class, 'changeStatus'])->name('products.change-status');
Route::get('products/get-subcategories', [VendorProductController::class, 'getSubCategories'])->name('products.get-subcategories');
Route::get('products/get-childcategories', [VendorProductController::class, 'getChildCategories'])->name('products.get-childcategories');
Route::resource('products', VendorProductController::class);

/**
 * Product Image Gallery
 **/
Route::resource('products-image-gallery', VendorProductImageGalleryController::class);

/**
 * Product Variant routes
 **/

Route::put('products-variant/changestatus', [VendorProductVariantController::class, 'changeStatus'])->name('products-variant.changestatus');
Route::resource('products-variant', VendorProductVariantController::class);