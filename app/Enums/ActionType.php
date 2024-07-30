<?php

namespace App\Enums;

use App\Traits\BaseEnum;

enum ActionType: string
{
    use BaseEnum;

    case INCOME = 'income';
    case OUTCOME = 'outcome';
}
