<?php

namespace App\Enums;

use App\Traits\BaseEnum;

enum RoleEnum: string
{
    use BaseEnum;

    case ADMIN = 'admin';
    case OWNER = 'owner';
    case MANAGER = 'manager';
}
