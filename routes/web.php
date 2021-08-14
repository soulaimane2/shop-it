<?php

use Illuminate\Support\Facades\Route;


//controllers
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\admin\coupon\CouponController;
use App\Http\Controllers\admin\emails\EmailController;
use App\Http\Controllers\admin\products\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/admin',function(){
    return view('admin.admin');
})->middleware(['auth']);

//********** Categories */
Route::get('/admin/categories',[CategoriesController::class,'showCats'])->middleware(['auth']);
Route::post('/admin/categories/add',[CategoriesController::class,'addCat'])->middleware(['auth']);
Route::post('/admin/categories/update/{id}',[CategoriesController::class,'updateCat'])->middleware(['auth']);
Route::get('/admin/categories/delete/{id}',[CategoriesController::class,'deleteCat'])->middleware(['auth']);



/**SubCategories Routes */
Route::get('/admin/subcategories',[SubCategoriesController::class,'showSubCats'])->middleware(['auth']);
Route::post('/admin/subcategories/add',[SubCategoriesController::class,'addsubCat'])->middleware(['auth']);
Route::post('/admin/subcategories/update/{id}',[SubCategoriesController::class,'updateSubCat'])->middleware(['auth']);
Route::get('/admin/subcategories/delete/{id}',[SubCategoriesController::class,'deleteSubCat'])->middleware(['auth']);


/** Brands  */
Route::get('/admin/brands',[BrandController::class,'showBrands'])->middleware(['auth']);
Route::post('/admin/brands/add',[BrandController::class,'addBrand'])->middleware(['auth']);
Route::get('/admin/brands/delete/{id}',[BrandController::class,'dltBrand'])->middleware(['auth']);
Route::post('/admin/brands/update/{id}',[BrandController::class,'updateBrands'])->middleware(['auth']);



/**Coupons */
Route::get('/admin/coupons', [CouponController::class,'couponsList'])->middleware(['auth']);
Route::post('admin/coupons/add',[CouponController::class,'addCoupon'])->middleware(['auth']);
Route::get('/admin/coupons/delete/{id}',[CouponController::class,'deleteCoupon'])->middleware(['auth']);



/**Email List */
Route::get('/admin/Emails',[EmailController::class,'showEmailList'])->middleware(['auth']);
Route::post('/admin/Emails/add',[EmailController::class,'addEmail']);
Route::get('/admin/Email/delete/{id}',[EmailController::class,'deleteEmail'])->middleware(['auth']);




/**Products */
Route::get('/admin/products',[ProductController::class,'productList'])->middleware(['auth']);

Route::get('/admin/products/add',[ProductController::class,'addProduct'])->middleware(['auth']);

Route::post('/admin/products/add/add',[ProductController::class,'addProductToDb'])->middleware(['auth']);

Route::get('/admin/products/getSubs/{id}',[ProductController::class,'getsubCat'])->middleware(['auth']);

Route::get('/admin/products/delete/{id}',[ProductController::class,'deleteItem'])->middleware(['auth']);

Route::get('/admin/products/edit/{id}',[ProductController::class,'editItem'])->middleware(['auth']);

Route::post('/admin/products/update/{id}',[ProductController::class,'updateItem'])->middleware(['auth']);

/**Front End product*/

Route::get('/products/{id}',[ProductController::class,'showProductPage']);




require __DIR__.'/auth.php';