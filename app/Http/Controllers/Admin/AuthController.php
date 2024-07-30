<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function login_check(LoginRequest $loginRequest)
    {
        if (auth('web')->attempt($loginRequest->validated())) {
            return to_route('admin.dashboard');
        }
        return back()->withErrors(__('auth.failed'));
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();

        return to_route('admin.login');
    }
}
