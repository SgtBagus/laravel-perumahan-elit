<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserListController;

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

/* PAYMENT LIST */
Route::get('/payment-list', [App\Http\Controllers\PaymentListController::class, 'index']);
Route::get('/payment-list/view/{id}', [App\Http\Controllers\PaymentListController::class, 'view']);

/* CASHHER */
Route::get('/casher', [App\Http\Controllers\CasherController::class, 'index']);
Route::get('/casher/view/{id}', [App\Http\Controllers\CasherController::class, 'view']);

/* ADMIN ROUTE */
Route::get('/admin', [App\Http\Controllers\Admin\HomeController::class, 'index'])->middleware('role:admin');

Route::get('/admin/water-payment', [App\Http\Controllers\Admin\WaterPaymentController::class, 'index'])->middleware('role:admin');
Route::get('/admin/water-payment/view/{id}', [App\Http\Controllers\Admin\WaterPaymentController::class, 'view'])->middleware('role:admin');
Route::get('/admin/water-payment/delete/{id}', [App\Http\Controllers\Admin\WaterPaymentController::class, 'view'])->middleware('role:admin');

Route::get('/admin/nominal-value', [App\Http\Controllers\Admin\NominalValueController::class, 'index'])->middleware('role:admin');

Route::resource('/admin/user-list', UserListController::class)->middleware('role:admin');
