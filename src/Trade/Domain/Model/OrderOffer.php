<?php

namespace App\Trade\Domain\Model;

class OrderOffer
{
    public function __construct(
        public int $quantity,
        public Order $order,
        public Offer $offer,
    ) {

    }
}