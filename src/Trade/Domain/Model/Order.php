<?php

namespace App\Trade\Domain\Model;

use Symfony\Component\Uid\Uuid;

final class Order
{
    public function __construct(
        public Uuid $uuid,
        public Customer $customer,
        public OrderStatus $status,
        public \DateTime $createdAt,
    ) {

    }
}