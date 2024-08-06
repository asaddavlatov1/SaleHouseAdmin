<?php

namespace app\Services\Interfaces;
use App\Models\User;

interface UserServiceInterface
{
    public function index();

    public function update(UserRequest $request, User $user);

    public function create();

    public function store(UserRequest $request);

    public function delete(User $user): void;
}