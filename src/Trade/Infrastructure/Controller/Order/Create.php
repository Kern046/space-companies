<?php

namespace App\Trade\Infrastructure\Controller\Order;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

final class Create extends AbstractController
{
    #[Route("/order", name: "create_order", methods: ["POST"])]
    public function __invoke()
    {

    }
}