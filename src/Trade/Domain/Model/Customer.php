<?php

namespace App\Trade\Domain\Model;

use App\Company\Domain\Model\Company;
use App\Shared\Domain\Model\User;
use Symfony\Component\Uid\Uuid;

class Customer
{
    public function __construct(
        public Uuid $id,
        public Company $company,
        public string $email,
        public ?User $user = null,
    ) {

    }
}