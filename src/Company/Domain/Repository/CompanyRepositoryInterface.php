<?php

namespace App\Company\Domain\Repository;

interface CompanyRepositoryInterface
{
    public function getLastActiveCompanies(int $limit = 5): array;
}