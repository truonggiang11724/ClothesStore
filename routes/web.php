<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('home');
});


//Route PageController
Route::get('/home', [PageController::class, 'home'])->name('home');
// Route::get('/cart', [PageController::class, 'cart'])->name('cart');
Route::get('/checkout_payment', [PageController::class, 'checkout_payment'])->name('checkout_payment');
Route::get('/checkout_shipping', [PageController::class, 'checkout_shipping'])->name('checkout_shipping');
// Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');
Route::get('/forgotten_password', [PageController::class, 'forgotten_password'])->name('forgotten_password');
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/product', [PageController::class, 'product'])->name('product');
Route::get('/register', [PageController::class, 'register'])->name('register');
// Route::get('/category', [PageController::class, 'category'])->name('category');

// //Route ProductController
// Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/{id}', [ProductController::class, 'detail'])->name('products.detail');

//Route AuthController
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//Route Category Controller
Route::get('/category', [CategoryController::class, 'index'])->name('category');

//Route CartController
Route::middleware('auth')->group(function () {
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity'); //Ajax Update Quantity 
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
});

//Route OrderController

Route::middleware('auth')->group(function () {
    Route::post('/order/submit', [OrderController::class, 'submit'])->name('order.submit');
    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::get('/districts/{province_id}', [OrderController::class, 'getDistricts']);
    Route::get('/wards/{district_id}', [OrderController::class, 'getWards']);
    Route::get('/list_order', [OrderController::class, 'list_order'])->name('list_order');
});


//Route CheckoutController
Route::post('/checkout/index', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::get('/checkout/vnPayCheck', [CheckoutController::class, 'vnPayCheck'])->name('checkout.vnpay');
