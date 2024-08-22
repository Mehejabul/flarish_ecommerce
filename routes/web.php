<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\CartController;


use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\CatalogueController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\StockController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\PageController;
use App\Http\Controllers\backend\AdController;
use App\Http\Controllers\backend\SettingsController;
use App\Http\Controllers\backend\OrderController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('client.home');
Route::get('/shop/{slug?}', [HomeController::class, 'shopPage'])->name('client.shopPage');
Route::get('/shop/id/{slug?}', [HomeController::class, 'shopPageid'])->name('client.shopPageid');
Route::get('/pages/{slug?}', [HomeController::class, 'pages'])->name('pages');

Route::get('/user_login', [HomeController::class, 'login_website'])->name('login.website');
Route::get('/user-logout',[AdminController::class,'userLogout'])->name('user.logout');

Route::get('/user_register', [HomeController::class, 'register_website'])->name('register.website');
Route::post('/register', [AdminController::class, 'store'])->name('customer.register');

Route::get('/my_account', [HomeController::class, 'account'])->name('client.account');

// Cart
Route::get('/cart-add', [HomeController::class, 'cart'])->name('client.cart');
Route::get('/cart',[CartController::class,"index"])->name('cart.index');
Route::post('/cart/store',[CartController::class,"addToCart"])->name('cart.store');
Route::put('/cart/update',[CartController::class,"updateCart"])->name('cart.update');
Route::delete('/cart/remove',[CartController::class,"removeItem"])->name('cart.remove');
Route::delete('/cart/clear',[CartController::class,"clearCart"])->name('cart.clear');
Route::get('product-details/{slug}',[ProductController::class,'productDetails'])->name('productDetails');
Route::get('product-detailsid/{id}',[ProductController::class,'productDetailsID'])->name('productDetailsid');
// Checkout
Route::get('/checkout', [HomeController::class, 'checkout'])->name('client.checkout');
Route::post('/checkout', [OrderController::class, 'placeOrder'])->name('client.placeOrder');
// Shop Page Search & filter
Route::get('search',[HomeController::class,'searchPage'])->name('searchPage');
// Route::post('/quickViewDetails',[HomeController::class,'quickViewDetails'])->name('quickViewDetails');
Route::get('filter',[HomeController::class,'filterProduct'])->name('filter');
// Route::post('/place-order',[OrderController::class,'placeOrder'])->name('place.order');

Route::prefix('/')->group(function(){
    Route::match(['get', 'post'], 'login',[AdminController::class,'login'])->name('admin.login');
    Route::group(['middleware'=>['user']],function(){
    Route::get('logout',[AdminController::class,'logout'])->name('admin.logout');

    Route::get('dashboard',[SettingsController::class,'dashboard'])->name('dashboard');
    Route::resource('catalogue', CatalogueController::class);
    Route::post('update-catalogue-status',[CatalogueController::class,'updateCatalogueStatus'])->name('updateCatalogueStatus');
    Route::resource('category', CategoryController::class);
    Route::get('append-categories-level',[CategoryController::class,'appendCategoryLevel'])->name('appendCategory');
    Route::post('update-category-status',[CategoryController::class,'updateCategoryStatus'])->name('updateCategoryStatus');

    // Product
    Route::resource('product', ProductController::class);
    Route::match(['get', 'post'],'product-variation-add', [ProductController::class,'productVariation'])->name('productVariation');
    Route::post('update-product-status',[ProductController::class,'updateProductStatus'])->name('updateProductStatus');
    Route::get('multiimage-delete/{id}',[ProductController::class,'multiImageDelete'])->name('ImageDelete');

    // Stock
    Route::resource('stock', StockController::class);
    Route::match(['get', 'post'],'stock-variation-update/{id}', [StockController::class,'updateStockVariation'])->name('updateStockVariation');
    Route::match(['get', 'post'],'stock-size-update/{id}', [StockController::class,'updateStockSize'])->name('updateStockSize');

    // Settings
    Route::resource('setting', SettingsController::class);

    // Pages
    Route::resource('page', PageController::class);
    Route::post('update-page-status',[PageController::class,'updatePageStatus'])->name('updatePageStatus');

    // Banner
    Route::resource('banner', BannerController::class);
    Route::post('update-banner-status',[BannerController::class,'updateBannerStatus'])->name('updateBannerStatus');

    // Ad
    Route::resource('ad', AdController::class);
    Route::post('update-ad-status',[AdController::class,'updateAdStatus'])->name('updateAdStatus');

    // Customer
    Route::get('customer',[OrderController::class,'customer'])->name('customer');
    
    Route::post('update-customer-status',[OrderController::class,'updateCustomerStatus'])->name('updateCustomerStatus');

    // Order
    Route::get('order-list/{status?}', [OrderController::class,'list'])->name('orderList');
    Route::get('order-itemlist/{id}', [OrderController::class,'orderDetails'])->name('orderItemlist');
    Route::match(['get', 'post'], 'order-status/{id}', [OrderController::class,'updateStatus'])->name('orderStatusUpdate');
    });
});


