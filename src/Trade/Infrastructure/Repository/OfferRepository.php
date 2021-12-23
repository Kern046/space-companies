<?php

namespace App\Trade\Infrastructure\Repository;

use App\Company\Domain\Model\Company;
use App\Trade\Domain\Model\Offer;
use App\Trade\Domain\Repository\OfferRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class OfferRepository extends ServiceEntityRepository implements OfferRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offer::class);
    }

    public function getCompanyOffers(Company $company): array
    {
        return $this->createQueryBuilder('offer')
            ->select('offer')
            ->join('offer.product', 'product')
            ->join('product.company', 'company')
            ->where('company = :company')
            ->setParameter('company', $company)
            ->getQuery()
            ->getResult();
    }
}