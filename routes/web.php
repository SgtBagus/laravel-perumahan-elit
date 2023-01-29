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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* ADMIN ROUTE */
Route::get('/admin', [App\Http\Controllers\Admin\HomeController::class, 'index']);

Route::get('/admin/water-payment', [App\Http\Controllers\Admin\WaterPaymentController::class, 'index']);
Route::get('/admin/water-payment/view', [App\Http\Controllers\Admin\WaterPaymentController::class, 'view']);

Route::get('/admin/nominal-value', [App\Http\Controllers\Admin\NominalValueController::class, 'index']);

Route::get('/admin/home-posting', [App\Http\Controllers\Admin\WaterPaymentController::class, 'index']);
Route::get('/admin/home-posting/view', [App\Http\Controllers\Admin\WaterPaymentController::class, 'view']);

Route::get('/admin/user-list', [App\Http\Controllers\Admin\WaterPaymentController::class, 'index']);
Route::get('/admin/user-list/view', [App\Http\Controllers\Admin\WaterPaymentController::class, 'view']);

Route::get('/admin/note', [App\Http\Controllers\Admin\WaterPaymentController::class, 'index']);
Route::get('/admin/note/view', [App\Http\Controllers\Admin\WaterPaymentController::class, 'view']);

