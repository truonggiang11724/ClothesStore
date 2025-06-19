<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Middleware\IsAdmin;

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
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

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

//Route DashboardController
Route::middleware(['auth', IsAdmin::class])
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    });

//Route AdminController
Route::middleware(['auth', IsAdmin::class])
    ->group(function () {
        Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product');
        Route::get('/admin/product/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::get('/admin/product/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/admin/product/destroy', [ProductController::class, 'destroy'])->name('admin.product.destroy');
        Route::post('/admin/product/store', [ProductController::class, 'store'])->name('admin.product.store');
        Route::post('/admin/product/update', [ProductController::class, 'update'])->name('admin.product.update');
        Route::get('/admin/chart-data', [DashboardController::class, 'getMonthlyRevenueData']);
        Route::get('/admin/chart-category-monthly', [DashboardController::class, 'getProductCategoryMonthlyData'])
            ->name('admin.chart.category-monthly');
        Route::get('/admin/chart-category-structure', [DashboardController::class, 'getCategoryStructure'])
            ->name('admin.chart.category-structure');
    });

// Route CouponController,OrderController
Route::middleware(['auth', IsAdmin::class])->prefix('admin')->group(function () {
    Route::get('/coupons', [AdminOrderController::class, 'index'])->name('admin.coupon');
    Route::get('/coupons/create', [AdminOrderController::class, 'create'])->name('admin.coupon.create');
    Route::post('/coupons/store', [AdminOrderController::class, 'store'])->name('admin.coupon.store');
    Route::get('/coupons/edit', [AdminOrderController::class, 'edit'])->name('admin.coupon.edit');
    Route::post('/coupons/update', [AdminOrderController::class, 'update'])->name('admin.coupon.update');
    Route::post('/coupons/delete', [AdminOrderController::class, 'destroy'])->name('admin.coupon.delete');
    Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders');
    Route::post('/admin/orders/deliver', [AdminOrderController::class, 'markDelivered'])->name('admin.orders.deliver');
});

//Route CategoryController
Route::get('/admin/categories', [AdminCategoryController::class, 'index'])->name('admin.categories');
Route::get('/admin/categories/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/admin/categories/store', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
Route::get('/admin/categories/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
Route::post('/admin/categories/update/{id}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
Route::post('/admin/categories/delete/{id}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.delete');
