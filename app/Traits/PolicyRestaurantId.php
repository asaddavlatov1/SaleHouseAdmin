<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;

trait PolicyRestaurantId
{
    private string $attribute = 'object';

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function view(User $user, Model $model): Response
    {
        return $user->restaurant_id === $model->restaurant_id
            ? Response::allow()
            : Response::denyAsNotFound(__('messages.not_found', ['attribute' => __('validation.attributes.' . $this->attribute)]));
    }

    public function update(User $user, Model $model): Response
    {
        return $user->restaurant_id === $model->restaurant_id
            ? Response::allow()
            : Response::denyAsNotFound(__('messages.not_found', ['attribute' => __('validation.attributes.' . $this->attribute)]));
    }

    public function delete(User $user, Model $model): Response
    {
        return $user->restaurant_id === $model->restaurant_id
            ? Response::allow()
            : Response::denyAsNotFound(__('messages.not_found', ['attribute' => __('validation.attributes.' . $this->attribute)]));
    }
}
