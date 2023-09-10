<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\websiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Auth::routes();


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::group([
        'middleware' => ['is_admin', 'auth'],
        'prefix' => 'admin',
    ], function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('/categories', CategoryController::class);
        Route::resource('/products', productController::class);
        Route::resource('/orders', \App\Http\Controllers\OrderController::class);
    });


    Route::get('/about', [websiteController::class, 'about'])->name('about');
    Route::get('/contact', [websiteController::class, 'contact'])->name('contact');
    Route::post('/send-massage', [websiteController::class, 'sendEmail'])->name('contact.send');
    Route::get('/', [websiteController::class, 'index'])->name('index');
    Route::get('/categories', [websiteController::class, 'getCategories'])->name('get_categories');
    Route::get('/category/{slug}', [websiteController::class, 'getCategoryBySlug'])->name('get_category_slug');
    Route::get('/category/{category_slug}/{product_slug}', [websiteController::class, 'getProductBySlug'])->name('get_product_slug');
//    Route::post('/product/add_to_cart', [addToCartController::class, 'addToCart'])->name('product.addToCart');

    Route::group([
        'middleware' => ['auth']
    ], function () {

        Route::resource('cart', CartController::class);
        Route::resource('checkout', CheckoutController::class);
        Route::get('/complete-information', [UserProfileController::class, 'create'])->name('complete-info');
        Route::post('/complete-information', [UserProfileController::class, 'store'])->name('submit-info');
        Route::post('/confirm-order/{id}', [\App\Http\Controllers\OrderController::class, 'make_order_paid'])->name('confirm-order');
    });

});

