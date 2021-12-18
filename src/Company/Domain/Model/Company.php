<?php

namespace App\Company\Domain\Model;

use Symfony\Component\Uid\Uuid;

final class Company
{
    public function __construct(
        public Uuid $id,
        public string $name,
    ) {
    }
}