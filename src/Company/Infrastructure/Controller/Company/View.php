<?php

namespace App\Company\Infrastructure\Controller\Company;

use App\Company\Domain\Repository\CompanyRepositoryInterface;
use App\Trade\Domain\Repository\OfferRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class View extends AbstractController
{
    public function __invoke(
        CompanyRepositoryInterface $companyRepository,
        OfferRepositoryInterface $offerRepository,
        string $slug,
    ) {
        if (null === ($company = $companyRepository->getOne($slug))) {
            throw new NotFoundHttpException('Company not found');
        }

        return $this->render('pages/company/company.html.twig', [
            'company' => $company,
            'offers' => $offerRepository->getCompanyOffers($company),
        ]);
    }
}