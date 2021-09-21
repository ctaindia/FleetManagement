<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

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

Route::get('cache', function () {

    \Artisan::call('cache:clear');
    \Artisan::call('config:cache');

    dd("Cache is cleared");

});

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Common Auth Routes
Route::group(['middleware' => 'auth'],function(){
	require 'custom/custom.php';
	Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
	Route::get('profile', [ProfileController::class, 'index'])->name('profile.detail');
	Route::get('profile/change-password',[ProfileController::class, 'changePassword'])->name('user.changepassword');
	Route::post('profile/change-password',[ProfileController::class, 'updateUserPassword'])->name('user.updatepassword');
	Route::get('profile/edit',[ProfileController::class, 'changeProfile'])->name('user.changeprofile');
	Route::post('profile/update',[ProfileController::class, 'updateProfile'])->name('user.updateprofile');
});

// Stripe Payment Route
Route::post('stripe/payment/form_submit','StripePaymentController@stripePostForm_Submit')->name('stripe.payment.form_submit');
Route::get('payment/successfull/thankyou/{stripeTransactionId}','StripePaymentController@thankyouStripePayment')->name('payment.successfull.thankyou');

// Route::group(['prefix'=>'admin', 'middleware'=>'admin'],function(){
// 	require 'custom/custom.php';
// });
// Route::group(['prefix'=>'vendor', 'middleware'=>'vendor'],function(){
// 	require 'custom/custom.php';
// });
