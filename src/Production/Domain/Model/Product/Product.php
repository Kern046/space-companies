<?php

namespace App\Production\Domain\Model\Product;

use App\Company\Domain\Model\Company;
use Symfony\Component\Uid\Uuid;

class Product
{
    public function __construct(
        public Uuid $id,
        public string $name,
        public string $slug,
        public string $description,
        public Company $company,
    ) {

    }
}