<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;

/** Admin Routes */
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

/** Profile Routes */
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::put('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');


/** Slider Routes */
Route::resource('slider', SliderController::class);

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