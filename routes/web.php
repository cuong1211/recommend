<?php

use App\Http\Controllers\Backend\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CompanyController;
use App\Http\Controllers\Backend\InProductController;
use App\Http\Controllers\Backend\StatisticalController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Middleware\CheckLogin;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\LoginController;

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

Route::group(['prefix' => 'admin','middleware' => CheckLogin::class], function () {
    Route::get('/', function () {
        return view('pages.main');
    })->name('admin');
    route::resource('user', UserController::class);
    route::post('user/import', [UserController::class, 'import'])->name('user.import');
    route::post('rate/import', [UserController::class, 'importRate'])->name('rate.import');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('order', OrderController::class);
    Route::resource('company', CompanyController::class);
    // Route::resource('receipt', ReceiptController::class);
    Route::resource('in_product', InProductController::class);
    Route::resource('user', UserController::class);
    route::group(['prefix' => 'statistic'], function () {
        route::get('product', [StatisticalController::class, 'Product'])->name('statistic.product');
        route::get('sale', [StatisticalController::class, 'SaleReport'])->name('statistic.report');
    });
});
route::group(['Middleware'=>['web'],['api']], function () {
    route::get('/login', [LoginController::class, 'getLogin'])->name('login');
    route::post('/login', [LoginController::class, 'postLogin'])->name('login');
    route::get('/logout', [LoginController::class, 'getLogout'])->name('logout');
});
Route::get('image/{id}', [ProductController::class, 'download'])->name('image');
Route::get('receive/{id}/{user}', [ProductController::class, 'receive'])->name('receive');
route::get('/signout',[App\Http\Controllers\Auth\LogoutController::class,'getLogout'])->name('signout');
// route::get('/shop/{id}',[FrontendController::class,'getCategory'])->name('frontend.category');
route::get('/shop/{id}',[FrontendController::class,'getProduct'])->name('frontend.product');
route::get('/cart',[App\Http\Controllers\Frontend\CartController::class,'index'])->name('cart.index');
route::get('checkout',[App\Http\Controllers\Frontend\CartController::class,'getCheckout'])->name('cart.checkout');
// route::post('checkout/{id}',[App\Http\Controllers\Frontend\CartController::class,'postCheckout'])->name('cart.post');
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('home');
route::get('search',[FrontendController::class,'getSearch'])->name('frontend.search');
route::get('/product/{id}',[FrontendController::class,'getProductDetail'])->name('frontend.productDetail');
route::group(['middleware' => CheckLogin::class],function(){
    Route::get('/home/{id}', [App\Http\Controllers\Frontend\FrontendController::class, 'recommend'])->name('home.recommend');
});

// route::post('/Order',[FrontendController::class,'postOrder'])->name('order.post');