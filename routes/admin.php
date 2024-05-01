<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\backend\ProfileController;
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
// Route::put('subcategory/change-status', [SubCategoryController::class, 'changeStatus'])->name('sub-category.change.status');
Route::resource('sub-category', SubCategoryController::class);
