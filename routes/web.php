<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\Frontend\CuscomerController;
use App\Http\Controllers\Frontend\HomeController;
use App\Models\Checkout;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/product/details/{slug}', [HomeController::class, 'product_details'])->name('product.details');
Route::get('customer/login', [HomeController::class, 'customer_login'])->name('customer.login');
Route::post('customer/login/form', [HomeController::class, 'customer_login_form'])->name('customer.login.form');
Route::get('/customer/logout', [HomeController::class, 'customer_logout'])->name('customer.logout');
Route::post('/add/to/card', [CartController::class, 'add_to_card'])->name('add.to.card');
Route::get('/cart/delete/{id}', [CartController::class, 'cart_delete'])->name('cart.delete');

Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::post('/cart/update', [CartController::class, 'cart_update'])->name('cart.update');

Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::post('/checkout/store', [CheckoutController::class, 'checkout_store'])->name('checkout.store');
Route::get('/order/success', [HomeController::class, 'order_success'])->name('order.success');
Route::get('/customer/profile', [CuscomerController::class, 'customer_profile'])->name('customer.profile');
Route::post('/customer/profile/update', [CuscomerController::class, 'customer_profile_update'])->name('customer.profile.update');
Route::get('/customer/password/change', [CuscomerController::class, 'customer_password_change'])->name('customer.password.change');
Route::post('/customer/password/update', [CuscomerController::class, 'customer_password_update'])->name('customer.password.update');

Route::post('/getcity', [CheckoutController::class, 'getcity'])->name('getcity');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
