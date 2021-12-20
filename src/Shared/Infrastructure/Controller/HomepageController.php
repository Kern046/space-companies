<?php

namespace App\Shared\Infrastructure\Controller;

use App\Company\Infrastructure\Repository\CompanyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HomepageController extends AbstractController
{
    #[Route("/", name: "homepage", methods: ["GET"])]
    public function __invoke(CompanyRepository $companyRepository): Response
    {
        return $this->render('pages/homepage.html.twig', [
            'companies' => $companyRepository->getLastActiveCompanies(),
        ]);
    }
}