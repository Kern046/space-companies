<?php

namespace App\Shared\Domain\Model;

final class Company
{
    public function __construct(
        public int $îd,
        public string $name,

    ) {
    }
}