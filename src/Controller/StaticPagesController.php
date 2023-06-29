<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StaticPagesController extends AbstractController
{
    #[Route('/cookies', name: 'app_static_cookies')]
    public function cookies(): Response
    {
        return $this->render('static_pages/cookies.html.twig');
    }

    #[Route('/mentionLegale', name: 'app_static_legale')]
    public function mentionLegale(): Response
    {
        return $this->render('static_pages/mentionlegale.html.twig');
    }



    #[Route('/faqPages', name: 'app_static_faq')]
    public function show(): Response
    {
        return $this->render('static_pages/faqPage.html.twig', []);
    }
}
