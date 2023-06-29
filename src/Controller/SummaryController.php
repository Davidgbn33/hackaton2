<?php

namespace App\Controller;

use App\Repository\TelephoneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SummaryController extends AbstractController
{
    #[Route('/summary/{id}', name: 'app_summary')]
    public function index(TelephoneRepository $telephoneRepository, $id): Response
    {
        $telephone = $telephoneRepository ->findBy(['id'=> $id]);

        return $this->render('summary/index.html.twig', [
            'telephone' => $telephone,
        ]);
    }
}
