<?php

namespace App\Trade\Domain\Repository;

use App\Company\Domain\Model\Company;
use App\Trade\Domain\Model\Offer;

interface OfferRepositoryInterface
{
    /**
     * @return list<Offer>
     */
    public function getCompanyOffers(Company $company): array;
}