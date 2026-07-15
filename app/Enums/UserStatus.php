<?php

namespace App\Enums;

enum UserStatus : int
{
    case INACTIVE = 0;
    case ACTIVE = 1;
    case PENDING = 2;
    case BLACKED = 3;
}
