<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\TempImageController;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;

/** Admin Routes */
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

/** Profile Routes */
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::put('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');


/** Slider Routes */
Route::resource('sliders', SliderController::class);

/** Category Routes  */
Route::put('change-status', [CategoryController::class, 'changeStatus'])->name('category.change.status');
Route::resource('category', CategoryController::class);

/** SubCategory Routes  */
Route::put('subcategory/change-status', [SubCategoryController::class, 'changeStatus'])->name('subcategory.change.status');
Route::resource('subcategory', SubCategoryController::class);

/** childCategory Routes  */
Route::put('childcategory/change-status', [ChildCategoryController::class, 'changeStatus'])->name('childcategory.change.status');
Route::get('get-subcategories', [ChildCategoryController::class, 'getSubCategories'])->name('get-subcategories');
Route::resource('childcategory', ChildCategoryController::class);

/** Brand Routes  */
Route::put('brand/change-status', [BrandController::class, 'changeStatus'])->name('brand.changestatus');
Route::resource('brand', BrandController::class);

/** Vendor Profile routes */
Route::resource('vendor_profile', AdminVendorProfileController::class);

/** Vendor Profile routes */
Route::put('product/change_status', [ProductController::class, 'changeStatus'])->name('product.changestatus');
Route::get('product/get_subcategories', [ProductController::class, 'getSubCategories'])->name('product.get_subcategories');
Route::get('product/get_childcategories', [ProductController::class, 'getChildCategories'])->name('product.get_childcategories');
Route::resource('/product', ProductController::class);

/** product_image_gallery routes */
Route::resource('product_image_gallery', ProductImageGalleryController::class);

/** ProductVariant routes */
Route::put('product_variant/changestatus', [ProductVariantController::class, 'changeStatus'])->name('product_variant.changestatus');
Route::resource('product_variant', ProductVariantController::class);

/** ProductVariantItem routes */
Route::put('product_variant_item/changestatus', [ProductVariantController::class, 'changeStatus'])->name('product_variant_item.changestatus');

Route::get('product_variant_items/{productId}/{variantId}', [ProductVariantItemController::class, 'index'])->name('product_variant_items.index');
Route::get('product_variant_items/{productId}/{variantId}/create', [ProductVariantItemController::class, 'create'])->name('product_variant_items.create');
Route::post('product_variant_items', [ProductVariantItemController::class, 'store'])->name('product_variant_items.store');
Route::get('product_variant_items_edit/{variantItemId}', [ProductVariantItemController::class, 'edit'])->name('product_variant_items.edit');
Route::put('product_variant_items_edit/{variantItemId}', [ProductVariantItemController::class, 'update'])->name('product_variant_items.update');
Route::delete('product_variant_items/{variantItemId}', [ProductVariantItemController::class, 'destroy'])->name('product_variant_items.destroy');