<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RamController extends AbstractController
{
    #[Route('/ram', name: 'app_ram')]
    public function index(): Response
    {
        return $this->render('ram/index.html.twig', [
            'controller_name' => 'RamController',
        ]);
    }
}
