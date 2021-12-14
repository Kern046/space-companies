<?php

namespace App\Trade\Domain\Model;

use App\Shared\Domain\Model\User;
use Symfony\Component\Uid\Uuid;

final class Customer
{
    public function __construct(
        public Uuid $id,
        public ?User $user = null,
    ) {

    }
}