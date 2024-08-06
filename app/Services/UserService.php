<?php

namespace App\Services;

use App\Models\User;
use App\Http\Requests\UserRequest;

class UserService implements UserServiceInterface
{
    public function index()
    {
        return User::all();
    }

    public function store(UserRequest $request) 
    {
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'middle_name' => $request->middle_name,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'is_active' => $request->has('is_active'),
        ]);

        return $user;
    }

    public function create()
    {
        // Foydalanuvchilarni yaratish uchun qo'shimcha ma'lumot kerak emas
        return [];
    }

    public function update(UserRequest $request, User $user) 
    {
        $user->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'middle_name' => $request->middle_name,
            'phone' => $request->phone,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'is_active' => $request->has('is_active'),
        ]);
        
        return $user;
    }

    public function edit(User $user)
    {
        return $user;
    }

    public function delete(User $user): void
    {
        $user->delete();
    }
}