<?php
namespace App\Services\Interfaces;

use App\Models\User;
use App\Http\Requests\UserRequest;

interface UserServiceInterface
{
    public function index();

    public function create(User $user);

    public function store(UserRequest $request);

    public function update(UserRequest $request, User $user);

    public function delete(User $user): void;
}