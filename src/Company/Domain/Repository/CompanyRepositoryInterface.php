<?php

namespace App\Company\Domain\Repository;

use App\Company\Domain\Model\Company;

interface CompanyRepositoryInterface
{
    public function getOne(string $slug): ?Company;

    public function getLastActiveCompanies(int $limit = 5): array;
}