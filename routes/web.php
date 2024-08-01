<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('auth/login', [AuthController::class, 'login'])->withoutMiddleware('auth:web');
Route::post('auth/login', [AuthController::class, 'login_check'])->name('login_check')->withoutMiddleware('auth:web');
Route::get('auth/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
