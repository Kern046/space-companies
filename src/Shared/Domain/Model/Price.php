<?php

namespace App\Shared\Domain\Model;

class Price
{
    public function __construct(
        public Currency $currency,
        public int $amount
    ) {

    }
}