<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


//Route PageController
Route::get('/home', [PageController::class, 'home'])->name('home');
Route::get('/cart', [PageController::class, 'cart'])->name('cart');
Route::get('/checkout_payment', [PageController::class, 'checkout_payment'])->name('checkout_payment');
Route::get('/checkout_shipping', [PageController::class, 'checkout_shipping'])->name('checkout_shipping');
Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');
Route::get('/forgotten_password', [PageController::class, 'forgotten_password'])->name('forgotten_password');
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/product', [PageController::class, 'product'])->name('product');
Route::get('/register', [PageController::class, 'register'])->name('register');
Route::get('/category', [PageController::class, 'category'])->name('category');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
