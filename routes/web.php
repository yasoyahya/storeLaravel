<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{id}', [App\Http\Controllers\CategoryController::class, 'detail'])->name('categories-detail');
Route::get('/details/{id}', [App\Http\Controllers\DetailController::class, 'index'])->name('detail');
Route::post('/details/{id}', [App\Http\Controllers\DetailController::class, 'add'])->name('detail-add');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::get('/success', [App\Http\Controllers\CartController::class, 'success'])->name('success');

Route::get('/register/success', [App\Http\Controllers\Auth\RegisterController::class, 'success'])->name('register-success');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/products', [App\Http\Controllers\DashboardProductController::class, 'index'])->name('dashboard-product');
Route::get('/dashboard/products/create', [App\Http\Controllers\DashboardProductController::class, 'create'])->name('dashboard-product-create');
Route::get('/dashboard/products/{id}', [App\Http\Controllers\DashboardProductController::class, 'details'])->name('dashboard-product-details');
Route::get('/dashboard/transactions', [App\Http\Controllers\DashboardTransactionController::class, 'index'])->name('dashboard-transactions');
Route::get('/dashboard/transactions/{id}', [App\Http\Controllers\DashboardTransactionController::class, 'details'])->name('dashboard-transaction-details');
Route::get('/dashboard/settings', [App\Http\Controllers\DashboardSettingController::class, 'store'])->name('dashboard-settings-store');
Route::get('/dashboard/account', [App\Http\Controllers\DashboardSettingController::class, 'account'])->name('dashboard-settings-account');

// ->middleware(['auth','admin'])
Route::prefix('admin')
    ->namespace('Admin')
    ->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin-dashboard');
        // Route::resource('category','CategoryController');
        Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin-category');
        Route::get('/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin-category-create');
        Route::post('/category/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin-category-store');
        Route::get('/category/edit{slug}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin-category-edit');
        Route::put('/category/update{slug}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin-category-update');
        Route::post('/category/destroy{slug}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin-category-destroy');
        // Route::resource('user','UserController');
        Route::get('/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin-user');
        Route::get('/user/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin-user-create');
        Route::post('/user/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin-user-store');
        Route::get('/user/edit{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin-user-edit');
        Route::put('/user/update{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin-user-update');
        Route::post('/user/destroy{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin-user-destroy');
        // Route::resource('product','ProductController');
        Route::get('/product', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin-product');
        Route::get('/product/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin-product-create');
        Route::post('/product/store', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin-product-store');
        Route::get('/product/edit{slug}', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('admin-product-edit');
        Route::put('/product/update{slug}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin-product-update');
        Route::post('/product/destroy{slug}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('admin-product-destroy');
        // Route::resource('product-gallery','ProductGalleryController');
        Route::get('/product-gallery', [App\Http\Controllers\Admin\ProductGalleryController::class, 'index'])->name('admin-product-gallery');
        Route::get('/product-gallery/create', [App\Http\Controllers\Admin\ProductGalleryController::class, 'create'])->name('admin-product-gallery-create');
        Route::post('/product-gallery/store', [App\Http\Controllers\Admin\ProductGalleryController::class, 'store'])->name('admin-product-gallery-store');
        Route::post('/product-gallery/destroy{id}', [App\Http\Controllers\Admin\ProductGalleryController::class, 'destroy'])->name('admin-product-gallery-destroy');

    });

Auth::routes();
Route::post('/register', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('register');

