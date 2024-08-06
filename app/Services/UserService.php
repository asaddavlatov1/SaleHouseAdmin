<?php

namespace app\Services;

use App\Models\User;
use App\Http\Requests\UserRequest;

class UserService implements UserServiceInterface
{
    public function index()
    {
        return User::query()->get();
    }

    public function store(UserRequest $request) 
    {
        User::create([
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
        return User::all(); 
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
        return User::find($user);
    }

    public function delete(User $user): void
    {
        $user->delete();
    }
}