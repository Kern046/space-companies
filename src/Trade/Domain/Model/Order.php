<?php

namespace App\Trade\Domain\Model;

use Symfony\Component\Uid\Uuid;

class Order
{
    public function __construct(
        public Uuid $id,
        public Customer $customer,
        public OrderStatus $status,
        /** @var list<OrderOffer> */
        public array $orderOffers,
        public \DateTime $createdAt,
        public \DateTime $updatedAt,
    ) {

    }
}