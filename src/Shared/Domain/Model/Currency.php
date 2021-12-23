<?php

namespace App\Shared\Domain\Model;

enum Currency: string
{
    case EUR = 'EUR';
    case GBP = 'GPB';
    case USD = 'USD';
}