<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\Interfaces\UserServiceInterface;

class UserController extends Controller
{
    public function __construct(
        protected UserServiceInterface $service
    ){}

    public function index()
    {
        $users = $this->service->index();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserRequest $request)
    {
        $user = $this->service->store($request);
        return redirect()->route('admin.user.index')->with('success', __('messages.created'));
    }

    public function edit(User $user)
    {
        $user = $this->service->edit($user);
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $this->service->update($user->id, $request->validated());
        return redirect()->route('admin.user.index')->with('success', __('messages.updated'));
    }

    public function destroy(User $user)
    {
        $this->service->delete($user);
        return redirect()->back()->with('success', __('messages.success'));
    }
}