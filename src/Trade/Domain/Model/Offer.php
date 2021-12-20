<?php

namespace App\Trade\Domain\Model;

use App\Production\Domain\Model\Product\Product;
use App\Shared\Domain\Model\Price;
use Symfony\Component\Uid\Uuid;

class Offer
{
    public function __construct(
        public Uuid $id,
        public Product $product,
        public Price $price
    ) {

    }
}