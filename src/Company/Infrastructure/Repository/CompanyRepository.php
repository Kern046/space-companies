<?php

namespace App\Company\Infrastructure\Repository;

use App\Company\Domain\Model\Company;
use App\Company\Domain\Repository\CompanyRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CompanyRepository extends ServiceEntityRepository implements CompanyRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Company::class);
    }

    public function getOne(string $slug): ?Company
    {
        return $this->findOneBy(['slug' => $slug]);
    }

    public function getLastActiveCompanies(int $limit = 5): array
    {
        return $this->createQueryBuilder('c')
            ->select()
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}