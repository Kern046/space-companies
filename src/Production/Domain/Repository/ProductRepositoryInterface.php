<?php

namespace App\Production\Domain\Repository;

use App\Company\Domain\Model\Company;

interface ProductRepositoryInterface
{
    public function getCompanyProducts(Company $company): array;
}