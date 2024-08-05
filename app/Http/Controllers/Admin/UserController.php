<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $data['users'] = User::all();
        return view('admin.users.index', $data);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    // Store a new user
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

        return redirect()->route('admin.user.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
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

        return redirect()->route('admin.user.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully.');
    }
}