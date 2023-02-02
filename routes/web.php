<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

/* PAYMENT LIST */
Route::get('/payment-list', [App\Http\Controllers\PaymentListController::class, 'index']);
Route::get('/payment-list/view/{id}', [App\Http\Controllers\PaymentListController::class, 'view']);

/* CASHHER */
Route::get('/casher', [App\Http\Controllers\CasherController::class, 'index']);
Route::get('/casher/view/{id}', [App\Http\Controllers\CasherController::class, 'view']);

Route::get('/water-noted', [App\Http\Controllers\WaterNotedController::class, 'index']);

/* ADMIN ROUTE */
Route::get('/admin', [App\Http\Controllers\Admin\HomeController::class, 'index']);

Route::get('/admin/water-payment', [App\Http\Controllers\Admin\WaterPaymentController::class, 'index']);
Route::get('/admin/water-payment/view/{id}', [App\Http\Controllers\Admin\WaterPaymentController::class, 'view']);
Route::get('/admin/water-payment/delete/{id}', [App\Http\Controllers\Admin\WaterPaymentController::class, 'view']);

Route::get('/admin/nominal-value', [App\Http\Controllers\Admin\NominalValueController::class, 'index']);

Route::get('/admin/user-list', [App\Http\Controllers\Admin\UserListController::class, 'index']);


