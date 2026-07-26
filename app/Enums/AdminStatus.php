<?php

namespace App\Enums;

enum AdminStatus:int
{
    case INACTIVE = 0;
    case ACTIVE = 1;
    case PENDING = 2;
}
