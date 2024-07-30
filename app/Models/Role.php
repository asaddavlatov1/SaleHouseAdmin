<?php

namespace App\Models;

use App\Helpers\TranslatableJson;
use App\Traits\BaseModel;
use Spatie\Permission\Models\Role as SpatieRole;


class Role extends SpatieRole
{
    use BaseModel;

    protected $fillable = [
        'title',
        'name',
        'guard_name',
    ];

    protected $casts = [
        'title' => TranslatableJson::class,
    ];
}
