<?php

namespace App\Shared\Infrastructure\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class Login extends AbstractController
{
    public function __invoke(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('pages/shared/user/login.html.twig', [
            'error' => $authenticationUtils->getLastAuthenticationError(),
            'last_username' => $authenticationUtils->getLastUsername(),
        ]);
    }
}