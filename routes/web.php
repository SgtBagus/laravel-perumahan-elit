<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UserListController;
use App\Http\Controllers\Admin\NominalValueController;

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

/* DASHBOARD */
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

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

Route::resource('/admin/nominal-value', NominalValueController::class)->middleware('role:admin');
Route::resource('/admin/user-list', UserListController::class)->middleware('role:admin');
