<?php

namespace App\Shared\Domain\Model;

enum UserStatus
{
    case Registered;
    case Confirmed;
    case Inactive;
    case Banned;
    case Disabled;
}