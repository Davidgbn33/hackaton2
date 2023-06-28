<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TelephoneController extends AbstractController
{
    #[Route('/telephone', name: 'app_telephone')]
    public function index(): Response
    {
        return $this->render('telephone/index.html.twig', [
            'controller_name' => 'TelephoneController',
        ]);
    }
}
