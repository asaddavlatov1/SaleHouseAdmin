<?php

namespace App\Services;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    public function index()
    {
        return User::all();
    }

    public function store(UserRequest $request): User
    {

        $user = User::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'middle_name' => $request->input('middle_name'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')), // Hashing password securely
            'is_active' => $request->has('is_active'),
        ]);

        return $user;
    }

    public function create(User $user)
    {
        return $user;
    }

    public function update(UserRequest $request, User $user) 
    {
        $users = User::find($user);

        $user->update([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'middle_name' => $request->input('middle_name'),
            'phone' => $request->input('phone'),
            'password' => $request->filled('password') ? Hash::make($request->input('password')) : $user->password,
            'is_active' => $request->has('is_active'),
        ]);
        
        return $user;
    }

    public function edit(User $user)
    {
        $company = Company::findOrFail($user);    }

    public function delete(User $user): void
    {
        $user->delete();
    }   
}