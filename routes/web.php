<?php

use App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\Pages\HomeController;
use Illuminate\Support\Facades\Route;

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

/* Admin Authentication Routes */

Route::prefix('admin')->middleware('alreadylogin')->group(function () {
    Route::get('/', [Auth::class, 'login'])->name('login');
    Route::post('/', [Auth::class, 'user_login'])->name('user_login');
    Route::get('/register', [Auth::class, 'register']);
});

/* Admin Other Routes */
Route::prefix("admin")->middleware('authcheck')->group(function () {
    //Dashboard
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
    //Users
    Route::get('/users', [UserController::class, 'users'])->name('users');
    //Categories
    Route::get('/categories', [CategoryController::class, 'categories'])->name('categories');
    Route::get('/add-category', [CategoryController::class, 'add_category'])->name('add_category');
    Route::post('/add-category', [CategoryController::class, 'added_category'])->name('added_category');
    Route::post('/delete-category', [CategoryController::class, 'delete_category'])->name('delete_category');

    //Brands
    Route::get('/brands', [CategoryController::class, 'brands'])->name('brands');
    Route::get('/add-brand', [CategoryController::class, 'add_brand'])->name('add_brand');
    Route::post('/added-brand', [CategoryController::class, 'added_brand'])->name('added_brand');
    Route::post('/delete-brand', [CategoryController::class, 'delete_brand'])->name('delete_brand');
    Route::post('/update-brand-status', [CategoryController::class, 'update_brand_status'])->name('update_brand_status');

    //Sub Categories
    Route::get('/sub-categories', [CategoryController::class, 'sub_categories'])->name('sub_categories');
    //Brands
    Route::get('/brands', [CategoryController::class, 'brands'])->name('brands');
    //Coupon
    Route::get('/coupons', [CouponController::class, 'coupons'])->name('coupons');
    Route::get('/add-coupon', [CouponController::class, 'add_coupon'])->name('add_coupon');
    Route::post('/add-coupon', [CouponController::class, 'added_coupon'])->name('added_coupon');
    Route::post('/delete-coupon', [CouponController::class, 'delete_coupon'])->name('delete_coupon');
    //Newsletter
    Route::get('/newsletters', [NewsletterController::class, 'newsletters'])->name('newsletters');
    Route::post('/delete-newsletter', [NewsletterController::class, 'delete_newsletter'])->name('delete_newsletter');
    //Logout
    Route::get('/logout', [Auth::class, 'logout'])->name('logout');
});

//Front End Routes
Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
});