<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\CartController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/',[LayoutController::class,'home']);
Route::get('/about',[AboutController::class,'about']);
Route::get('/services/{type}', [ServiceController::class, 'showServices']);
Route::get('/packages/{type}', [PackageController::class, 'packages']);
Route::get('/blog',[BlogController::class,'blog']);
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/blogdetails',[LayoutController::class,'blogdetails']);
Route::get('/contact',[LayoutController::class,'contact']);
Route::post('/store2',[ContactController::class,'store2']);
Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscribe.store');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/store1', [LoginController::class, 'store1'])->name('register.store');

Route::post('/logout', function () {
    Auth::logout();
    session()->flush();
    return redirect('/login')->with('success', 'Logged out successfully!');
})->name('logout');

Route::post('/clear-cart', function () {
    session()->forget('cart');
    return redirect()->back()->with('success', 'Cart cleared successfully!');
})->name('clear.cart');

//razorpay
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index']);
    Route::get('/add-service-to-cart/{id}', [CartController::class, 'addServiceToCart'])->name('cart.add.service');
    Route::get('/add-package-to-cart/{id}', [CartController::class, 'addPackageToCart'])->name('cart.add.package');
    Route::post('/remove-from-cart', [CartController::class, 'remove']);
    Route::post('/cart/update', [CartController::class, 'update']);
    Route::get('/checkout', [CartController::class, 'checkout']);
    Route::post('/place-order', [CartController::class, 'placeOrder']);
});

Route::post('/api/create-razorpay-order', [CartController::class, 'createRazorpayOrder']);


// Admin dashboard
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin1',[admincontroller::class,'dashboard'])->name('dashboard.page');

Route::resource('/admin/services', ServiceController::class)->names('services');
Route::resource('/admin/packages', PackageController::class)->names('packages');

Route::get('/admin/about', [AboutController::class, 'adminAbout'])->name('admin.about');
Route::get('/admin/about/edit', [AboutController::class, 'edit'])->name('admin.about.edit');
Route::post('/admin/about/update', [AboutController::class, 'update'])->name('admin.about.update');


    Route::get('/admin/blogs', [BlogController::class, 'index'])->name('admin.blogs');
    Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/update/{id}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/delete/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
    Route::get('/create', [BlogController::class, 'create'])->name('blogs.create'); 
    Route::post('/store', [BlogController::class, 'store'])->name('blogs.store');


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/orders', [AdminController::class, 'index'])->name('admin.orders');
    Route::get('/orders/{id}', [AdminController::class, 'show'])->name('admin.orders.show');
    Route::post('/admin/orders/{id}/status', [AdminController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    Route::get('/admin/orders/completed', [AdminController::class, 'completedOrders'])->name('cart.done');
    Route::get('/admin/orders/cancelled', [AdminController::class, 'cancelledOrders'])->name('cart.cancle');

});
