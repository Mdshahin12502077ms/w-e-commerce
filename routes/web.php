<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubcategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[homeController::class, 'index']);
Route::get('/product/details',[homeController::class, 'ProductDetails']);
Route::get('/product/checkout',[homeController::class, 'checkout']);
Route::get('product/shop',[homeController::class,'shop']);
Route::get('product/return_process',[homeController::class,'returnProcess']);
Auth::routes();

//admin route
Route::get('admin/login',[AdminController::class,'login']);

Route::post('admin/login',[AdminController::class,'loginCheck']);

// Route::post('admin/logout',[AdminController::class,'logout']);

Route::get('admin/dashboard',[AdminController::class,'Dashboard']);


//Category route
Route::prefix('admin/category/')->group(function(){
    Route::get('list',[CategoryController::class,'list']);
    Route::get('create',[CategoryController::class,'Create']);
    Route::post('store',[CategoryController::class,'Store']);
    Route::get('edit/{id}',[CategoryController::class,'edit']);
    Route::post('update/{id}',[CategoryController::class,'update']);
    Route::get('/delete/{id}',[CategoryController::class,'Delete']);


});

Route::prefix('admin/subCategory/')->group(function(){
    Route::get('list',[SubcategoryController::class,'list']);
    Route::get('create',[SubcategoryController::class,'Create']);
    Route::post('store',[SubcategoryController::class,'Store']);
    Route::get('edit/{id}',[SubcategoryController::class,'edit']);
    Route::post('update/{id}',[SubcategoryController::class,'update']);
    Route::get('/delete/{id}',[SubcategoryController::class,'Delete']);

});
