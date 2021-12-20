<?php

namespace App\Company\Domain\Model;

use Symfony\Component\Uid\Uuid;

class Company
{
    public function __construct(
        public Uuid $id,
        public string $name,
        public string $slug,
        public string $description,
    ) {
    }
}