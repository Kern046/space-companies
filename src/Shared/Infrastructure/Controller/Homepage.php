<?php

namespace App\Shared\Infrastructure\Controller;

use App\Company\Domain\Repository\CompanyRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class Homepage extends AbstractController
{
    public function __invoke(CompanyRepositoryInterface $companyRepository): Response
    {
        return $this->render('pages/homepage.html.twig', [
            'companies' => $companyRepository->getLastActiveCompanies(),
        ]);
    }
}