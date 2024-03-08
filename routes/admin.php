<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\DayController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\WebInfoController;
use App\Http\Controllers\Admin\TestimonialController;


Route::middleware('auth:admin')->group(function(){

	Route::get('/', [HomeController::class,"index"])->name('index');
	Route::get('/home', [HomeController::class,"index"])->name('home');
	Route::get('/dashboard', [HomeController::class,"index"])->name('dashboard');
	Route::resource('role', RoleController::class);
	Route::resource('plan', PlanController::class);
	Route::resource('service', ServiceController::class);
	Route::resource('testimonial', TestimonialController::class);
    Route::resource('order', OrderController::class);
    Route::post('order/status', [OrderController::class,"status_change"])->name("order.status.change");
    Route::get('order-payments', [OrderController::class,"payments"])->name("order.payments");
    Route::resource('user', UserController::class);
    Route::resource('setting', SettingController::class);
    Route::resource('page', PageController::class);
    Route::resource('date', DayController::class);
	Route::resource('contactmessage', ContactUsController::class);

	Route::prefix('/profile')->name('profile.')->group(function(){
		Route::get('/', [AccountController::class,'index'])->name('index');
		Route::get('/edit', [AccountController::class,'edit'])->name('edit');
		Route::post('/update', [AccountController::class,'update'])->name('update');
		Route::post('/change-password', [AccountController::class,'change_password'])->name('change-password');
	});
});
