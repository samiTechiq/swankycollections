<?php

use App\Http\Controllers\Admin\AppsettingController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManageOrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\Frontend\ContactFormController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\SearchProductController;
use App\Http\Controllers\Frontend\StateController;
use App\Http\Controllers\Frontend\UserProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/product/detail/{id}', [HomeController::class, 'productPage'])->name('product.detail');
Route::get('/search/product', [SearchProductController::class, 'index']);
Route::get('/contact', [ContactFormController::class, 'index'])->name('contact');

Route::middleware('isAuthenticated')->group(function(){
    Route::get('/shop/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/shop/cart/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/store', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/order/success/{id}', [CheckoutController::class, 'thankYou'])->name('thankyou');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/order/detail/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/order/mail', [OrderController::class, 'previewMail']);
    // user profile routes
    Route::get('user/profile', [UserProfileController::class, 'index'])->name('user.profile');
    Route::post('/profile/updatename', [UserProfileController::class, 'changeName'])->name('update.name');
    Route::post('/profile/updatepassword', [UserProfileController::class, 'changePassword'])->name('update.password');
    Route::get('/state/local_governments/{id}', [StateController::class, 'index']);
});


// auth routes
Route::prefix('auth')->group(function(){
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/login/store', [AuthController::class, 'store'])->name('auth.store');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('register', [RegistrationController::class, 'register'])->name('auth.register');
    Route::post('register/store', [RegistrationController::class, 'store'])->name('auth.register.store');
    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('auth.forgotpassword');
    Route::post('/forgot-password/store', [ForgotPasswordController::class, 'store'])->name('auth.forgotpassword.store');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'index'])->name('auth.resetpassword');
    Route::post('/reset-password/store/{token}', [ResetPasswordController::class, 'store'])->name('auth.resetpassword.store');
});


// admin routes
Route::prefix('admin')->middleware('is_admin')->group(function(){
    // products routes
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    // sliders routes
    Route::get('/slider', [SliderController::class, 'index'])->name('slider');
    Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/slider/store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::get('/slider/show/{id}', [SliderController::class, 'show'])->name('slider.show');
    Route::post('/slider/update/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::get('/slider/destroy/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
    // banners routes
    Route::get('/banner', [BannerController::class, 'index'])->name('banner');
    Route::get('/banner/create', [BannerController::class, 'create'])->name('banner.create');
    Route::post('/banner/store', [BannerController::class, 'store'])->name('banner.store');
    Route::get('/banner/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
    Route::get('/banner/show/{id}', [BannerController::class, 'show'])->name('banner.show');
    Route::post('/banner/update/{id}', [BannerController::class, 'update'])->name('banner.update');
    Route::get('/banner/destroy/{id}', [BannerController::class, 'destroy'])->name('banner.destroy');
    // contact messages
    Route::get('/contact/message', [ContactMessageController::class, 'index'])->name('contact.chat');
    Route::get('/contact/message/destroy/{id}', [ContactMessageController::class, 'destroy'])->name('message.destroy');
    //manage order routes
    Route::get('/orders/manage', [ManageOrderController::class, 'index'])->name('order.manage');
    Route::get('/orders/edit/{id}', [ManageOrderController::class, 'edit'])->name('order.edit');
    Route::post('/orders/update/{id}', [ManageOrderController::class, 'update'])->name('order.update');
    Route::get('order/destroy/{id}', [ManageOrderController::class, 'destroy'])->name('order.destroy');
    // setting routes
    Route::get('app/setting', [AppsettingController::class, 'index'])->name('setting');
    Route::get('app/setting/create', [AppsettingController::class, 'create'])->name('setting.create');
    Route::post('app/setting/store', [AppsettingController::class, 'store'])->name('setting.store');
    Route::get('app/setting/edit/{id}', [AppsettingController::class, 'edit'])->name('setting.edit');
    Route::post('app/setting/update/{id}', [AppsettingController::class, 'update'])->name('setting.update');
    // users
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/user/disabled/{id}', [UserController::class, 'disabled'])->name('user.disabled');
    Route::get('/user/view/{id}', [UserController::class, 'show'])->name('user.view');
    Route::get('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
