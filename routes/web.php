<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('auth/login', [AuthController::class, 'login']);
Route::post('auth/login', [AuthController::class, 'login_check'])->name('login_check');
