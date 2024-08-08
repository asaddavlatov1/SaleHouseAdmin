<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('auth/login', [AuthController::class, 'login'])->withoutMiddleware('auth:web');
Route::post('auth/login', [AuthController::class, 'login_check'])->name('login_check')->withoutMiddleware('auth:web');
Route::get('auth/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('company', CompanyController::class);
Route::resource('user',   UserController::class);