<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ContactUsController;
use App\Subscriptions\PayPalSubscriptions\PayPalWebhook;
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

Route::get('/', [FrontendController::class,"index"])->name("index");
Route::get('/service', [FrontendController::class,"service"])->name("service");
Route::get('/about', [FrontendController::class,"about"])->name("about");
Route::get('/about', [FrontendController::class,"about"])->name("about");
Route::get('/plans', [FrontendController::class,"plans"])->name("plans");
Route::get('/contact', [FrontendController::class,"contact"])->name("contact");
Route::get('/profile-page', [FrontendController::class,"profile"])->name("profile");
Route::resource('contactmessage', ContactUsController::class);  

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/change-password', [ProfileController::class, 'change_password'])->name('profile.change-password');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
	Route::resource('order', OrderController::class);                              
});

require __DIR__.'/auth.php';

Route::prefix('admin')->name("admin.")->group(function () {
    require __DIR__.'/admin_auth.php';
    require __DIR__.'/admin.php';
});

// Route::get('plans', [SubscriptionController::class, 'index']);
Route::middleware("auth")->group(function () {
    Route::get('plans/{plan}', [SubscriptionController::class, 'show'])->name("plans.show");
    Route::any('subscription', [SubscriptionController::class, 'store'])->name("subscription.create");
});
