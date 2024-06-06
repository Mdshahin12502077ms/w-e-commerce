<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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
Route::get('/product/details/{slug}',[homeController::class, 'ProductDetails']);
Route::get('/product/checkout',[homeController::class, 'checkout']);
Route::get('product/shop',[homeController::class,'shop']);
Route::get('product/cart/view',[homeController::class,'cartView']);
Route::get('product/return_process',[homeController::class,'returnProcess']);

Route::get('product/search',[homeController::class,'productSearch']);

Auth::routes();

//admin route
Route::get('admin/login',[AdminController::class,'login']);

Route::post('admin/login',[AdminController::class,'loginCheck']);

 Route::post('admin/logout',[AdminController::class,'logout']);

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

Route::prefix('admin/Product/')->group(function(){
    Route::get('list',[ProductController::class,'list']);
    Route::get('create',[ProductController::class,'Create']);
    Route::post('store',[ProductController::class,'Store']);
    Route::get('edit/{id}',[ProductController::class,'edit']);
    Route::post('update/{id}',[ProductController::class,'update']);
    Route::get('/delete/{id}',[ProductController::class,'Delete']);

});

 Route::prefix('Product/cart')->group(function(){
   route::post('create/{id}',[CartController::class,'Add']);
   route::get('indexCartcreate/{id}',[CartController::class,'AddIndexCart']);
   route::get('indexCartDelete/{id}',[CartController::class,'IndexCartDelete']);
 });


 Route::prefix('Product/order')->group(function(){

    route::post('confirm',[OrderController::class,'confirm_order']);
    route::get('indexCartDelete/{id}',[CartController::class,'IndexCartDelete']);
    route::get('thanks/{invoice_id}',[OrderController::class,'thanks']);
  });

  Route::prefix('admin/settings/')->group(function(){

    route::get('generalSettings',[SettingController::class,'GeneralSettings']);
    route::post('update',[SettingController::class,'Update']);

    route::get('privacy_policy',[SettingController::class,'privacy_policy']);
    route::post('privacy_policy_update',[SettingController::class,'privacy_policy_update']);

    route::get('terms_condition',[SettingController::class,'terms_condition']);
    route::post('terms_condition_update',[SettingController::class,'terms_condition_update']);

    route::get('home_baner',[SettingController::class,'home_baner']);
    route::post('home_baner_update',[SettingController::class,'home_baner_update']);

  });

  Route::prefix('Category/')->group(function(){

    route::get('product/{slug}',[CategoryController::class,'category_product']);



  });

  Route::prefix('frontend/subategory/')->group(function(){

    route::get('product/{slug}',[SubcategoryController::class,'subcategory_product']);


  });

  Route::prefix('Order/status/')->group(function(){

    route::get('allList',[OrderController::class,'all']);
    route::get('status_pending/{id}',[OrderController::class,'pending']);
    route::get('status_confirmed/{id}',[OrderController::class,'confirmed']);
    route::get('status_Delivered/{id}',[OrderController::class,'delivered']);
    route::get('status_canceled/{id}',[OrderController::class,'canceled']);

    route::get('status_pending_list',[OrderController::class,'pending_list']);
    route::get('status_confirmed_list',[OrderController::class,'confirmed_list']);
    route::get('status_Delivered_list',[OrderController::class,'delivered_list']);
    route::get('status_canceled_list',[OrderController::class,'canceled_list']);
    //details
    route::get('details/{id}',[OrderController::class,'details']);
    route::post('details/{id}',[OrderController::class,'update']);


  });
