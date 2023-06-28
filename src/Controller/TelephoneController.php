<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TelephoneController extends AbstractController
{
    #[Route('/iphone', name: 'app_telephone')]
    public function iphone(): Response
    {
        return $this->render('telephoneChoice/Iphone.html.twig', [
        ]);
    }

    #[Route('/lg', name: 'app_telephone')]
    public function lg(): Response
    {
        return $this->render('telephoneChoice/lg.html.twig', [
        ]);
    }

    #[Route('/samsung', name: 'app_telephone')]
    public function samsung(): Response
    {
        return $this->render('telephoneChoice/samsung.html.twig', [
        ]);
    }

    #[Route('/huawei', name: 'app_telephone')]
    public function huawei(): Response
    {
        return $this->render('telephoneChoice/huawei.html.twig', [
        ]);
    }

    #[Route('/xiaomi', name: 'app_telephone')]
    public function xiaomi(): Response
    {
        return $this->render('telephoneChoice/xiaomi.html.twig', [
        ]);
    }

    #[Route('/sony', name: 'app_telephone')]
    public function sony(): Response
    {
        return $this->render('telephoneChoice/sony.html.twig', [
        ]);
    }
}
