<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;

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
        $users = $this->service->create;
        return view('admin.users.create', compact('users'));
    }

    public function store(UserRequest $request)
    {
        $this->service->store($user, $request->validated());
        return redirect()->route('admin.user.index')->with('success', '__(messages.created)');
    }

    public function edit(User $user)
    {
        $user = $this->service->edit();
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $this->service->update($user, $request->validated());
        return redirect()->route('admin.user.index')->with('success', '__(messages.updated)');
    }

    public function destroy(User $user)
    {
        $this->service->delete($user);
        return to_back()->with('success', __('messages.success'));
    }
}