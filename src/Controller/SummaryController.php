<?php

namespace App\Controller;

use App\Repository\TelephoneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SummaryController extends AbstractController
{
    #[Route('/summary', name: 'app_summary')]
    public function index(TelephoneRepository $telephoneRepository): Response
    {
        $telephone = $telephoneRepository ->findBy(['id'=> 1]);
        return $this->render('summary/index.html.twig', [
            'telephone' => $telephone,
        ]);
    }
}
