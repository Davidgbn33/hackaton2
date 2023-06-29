<?php

namespace App\Controller;

use App\Entity\Telephone;
use App\Form\TelephoneType;
use App\Repository\BrandRepository;
use App\Repository\ModelRepository;
use App\Repository\TelephoneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/telephone')]
class TelephoneController extends AbstractController
{
    #[Route('/', name: 'app_telephone_index', methods: ['GET'])]
    public function index(TelephoneRepository $telephoneRepository): Response
    {
        return $this->render('telephone/index.html.twig', [
            'telephones' => $telephoneRepository->findAll(),
        ]);
    }

    #[Route('/iphone', name: 'iphone', methods: ['GET'])]
    public function iphone(TelephoneRepository $telephoneRepository, ModelRepository $modelRepository, BrandRepository $brandRepository): Response
    {
        $brand = $brandRepository->findOneBy(['name' => 'Apple']);
        $models = $modelRepository->findBy(['brand' => $brand]);
        $telephones = $telephoneRepository->findBy(['model' => $models]);

        return $this->render('telephone/index.html.twig', [
            'telephones' => $telephones,
        ]);
    }

    #[Route('/lg', name: 'lg', methods: ['GET'])]
    public function lg(TelephoneRepository $telephoneRepository, ModelRepository $modelRepository, BrandRepository $brandRepository): Response
    {
        $brand = $brandRepository->findOneBy(['name' => 'LG']);
        $models = $modelRepository->findBy(['brand' => $brand]);
        $telephones = $telephoneRepository->findBy(['model' => $models]);

        return $this->render('telephone/lg.html.twig', [
            'telephones' => $telephones,
        ]);
    }

    #[Route('/sony', name: 'sony', methods: ['GET'])]
    public function sony(TelephoneRepository $telephoneRepository, ModelRepository $modelRepository, BrandRepository $brandRepository): Response
    {
        $brand = $brandRepository->findOneBy(['name' => 'Sony']);
        $models = $modelRepository->findBy(['brand' => $brand]);
        $telephones = $telephoneRepository->findBy(['model' => $models]);

        return $this->render('telephone/sony.html.twig', [
            'telephones' => $telephones,
        ]);
    }

    #[Route('/samsung', name: 'samsung', methods: ['GET'])]
    public function samsung(TelephoneRepository $telephoneRepository, ModelRepository $modelRepository, BrandRepository $brandRepository): Response
    {
        $brand = $brandRepository->findOneBy(['name' => 'Samsung']);
        $models = $modelRepository->findBy(['brand' => $brand]);
        $telephones = $telephoneRepository->findBy(['model' => $models]);

        return $this->render('telephone/samsung.html.twig', [
            'telephones' => $telephones,
        ]);
    }

    #[Route('/xiaomi', name: 'xiaomi', methods: ['GET'])]
    public function xiaomi(TelephoneRepository $telephoneRepository, ModelRepository $modelRepository, BrandRepository $brandRepository): Response
    {
        $brand = $brandRepository->findOneBy(['name' => 'Xiaomi']);
        $models = $modelRepository->findBy(['brand' => $brand]);
        $telephones = $telephoneRepository->findBy(['model' => $models]);

        return $this->render('telephone/xiaomi.html.twig', [
            'telephones' => $telephones,
        ]);
    }

    #[Route('/huawei', name: 'huawei', methods: ['GET'])]
    public function huawei(TelephoneRepository $telephoneRepository, ModelRepository $modelRepository, BrandRepository $brandRepository): Response
    {
        $brand = $brandRepository->findOneBy(['name' => 'Huawei']);
        $models = $modelRepository->findBy(['brand' => $brand]);
        $telephones = $telephoneRepository->findBy(['model' => $models]);

        return $this->render('telephone/huawei.html.twig', [
            'telephones' => $telephones,
        ]);
    }

    #[Route('/huawei/new', name: 'huawei_new', methods: ['GET', 'POST'])]
    public function huaweiNew(Request $request, TelephoneRepository $telephoneRepository, ModelRepository $modelRepository, BrandRepository $brandRepository): Response
    {
        $brand = $brandRepository->findOneBy(['name' => 'Huawei']);

        // Récupérer les modèles de la marque Apple
        $models = $modelRepository->findBy(['brand' => $brand]);

        $telephone = new Telephone();

        $form = $this->createForm(TelephoneType::class, $telephone, [
            'models' => $models,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $telephone->setUser($this->getUser());
            $ramPrice = $telephone->getRAM()->getPrice();
            $networkPrice = $telephone->getNetwork()->getPrice();
            $modelPrice = $telephone->getModel()->getPrice();
            $memoryPrice = $telephone->getMemory()->getPrice();
            $conditionPrice = $telephone->getStatus()->getPrice();

            $estimatedPrice = $ramPrice + $networkPrice + $modelPrice + $memoryPrice + $conditionPrice;

            $telephone->setEstimatedPrice($estimatedPrice);
            $telephoneRepository->save($telephone, true);

            return $this->redirectToRoute('app_telephone_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('telephone/new.html.twig', [
            'telephone' => $telephone,
            'form' => $form,
        ]);
    }

    #[Route('/iphone/new', name: 'iphone_new', methods: ['GET', 'POST'])]
    public function iphoneNew(Request $request, TelephoneRepository $telephoneRepository, ModelRepository $modelRepository, BrandRepository $brandRepository): Response
    {
        $brand = $brandRepository->findOneBy(['name' => 'Apple']);

        // Récupérer les modèles de la marque Apple
        $models = $modelRepository->findBy(['brand' => $brand]);

        $telephone = new Telephone();

        $form = $this->createForm(TelephoneType::class, $telephone, [
            'models' => $models,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $telephone->setUser($this->getUser());
            $ramPrice = $telephone->getRAM()->getPrice();
            $networkPrice = $telephone->getNetwork()->getPrice();
            $modelPrice = $telephone->getModel()->getPrice();
            $memoryPrice = $telephone->getMemory()->getPrice();
            $conditionPrice = $telephone->getStatus()->getPrice();

            $estimatedPrice = $ramPrice + $networkPrice + $modelPrice + $memoryPrice + $conditionPrice;

            $telephone->setEstimatedPrice($estimatedPrice);
            $telephoneRepository->save($telephone, true);

            return $this->redirectToRoute('app_telephone_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('telephone/new.html.twig', [
            'telephone' => $telephone,
            'form' => $form,
        ]);
    }

    #[Route('/lg/new', name: 'lg_new', methods: ['GET', 'POST'])]
    public function lgNew(Request $request, TelephoneRepository $telephoneRepository, ModelRepository $modelRepository, BrandRepository $brandRepository): Response
    {
        $brand = $brandRepository->findOneBy(['name' => 'LG']);

        // Récupérer les modèles de la marque Apple
        $models = $modelRepository->findBy(['brand' => $brand]);

        $telephone = new Telephone();

        $form = $this->createForm(TelephoneType::class, $telephone, [
            'models' => $models,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $telephone->setUser($this->getUser());
            $ramPrice = $telephone->getRAM()->getPrice();
            $networkPrice = $telephone->getNetwork()->getPrice();
            $modelPrice = $telephone->getModel()->getPrice();
            $memoryPrice = $telephone->getMemory()->getPrice();
            $conditionPrice = $telephone->getStatus()->getPrice();

            $estimatedPrice = $ramPrice + $networkPrice + $modelPrice + $memoryPrice + $conditionPrice;

            $telephone->setEstimatedPrice($estimatedPrice);
            $telephoneRepository->save($telephone, true);

            return $this->redirectToRoute('app_telephone_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('telephone/new.html.twig', [
            'telephone' => $telephone,
            'form' => $form,
        ]);
    }

    #[Route('/sony/new', name: 'sony_new', methods: ['GET', 'POST'])]
    public function sonyNew(Request $request, TelephoneRepository $telephoneRepository, ModelRepository $modelRepository, BrandRepository $brandRepository): Response
    {
        $brand = $brandRepository->findOneBy(['name' => 'Sony']);

        $models = $modelRepository->findBy(['brand' => $brand]);

        $telephone = new Telephone();

        $form = $this->createForm(TelephoneType::class, $telephone, [
            'models' => $models,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $telephone->setUser($this->getUser());
            $ramPrice = $telephone->getRAM()->getPrice();
            $networkPrice = $telephone->getNetwork()->getPrice();
            $modelPrice = $telephone->getModel()->getPrice();
            $memoryPrice = $telephone->getMemory()->getPrice();
            $conditionPrice = $telephone->getStatus()->getPrice();

            $estimatedPrice = $ramPrice + $networkPrice + $modelPrice + $memoryPrice + $conditionPrice;

            $telephone->setEstimatedPrice($estimatedPrice);
            $telephoneRepository->save($telephone, true);

            return $this->redirectToRoute('app_telephone_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('telephone/new.html.twig', [
            'telephone' => $telephone,
            'form' => $form,
        ]);
    }

    #[Route('/samsung/new', name: 'samsung_new', methods: ['GET', 'POST'])]
    public function samsungNew(Request $request, TelephoneRepository $telephoneRepository, ModelRepository $modelRepository, BrandRepository $brandRepository): Response
    {
        $brand = $brandRepository->findOneBy(['name' => 'Samsung']);

        // Récupérer les modèles de la marque Apple
        $models = $modelRepository->findBy(['brand' => $brand]);

        $telephone = new Telephone();

        $form = $this->createForm(TelephoneType::class, $telephone, [
            'models' => $models,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $telephone->setUser($this->getUser());
            $ramPrice = $telephone->getRAM()->getPrice();
            $networkPrice = $telephone->getNetwork()->getPrice();
            $modelPrice = $telephone->getModel()->getPrice();
            $memoryPrice = $telephone->getMemory()->getPrice();
            $conditionPrice = $telephone->getStatus()->getPrice();

            $estimatedPrice = $ramPrice + $networkPrice + $modelPrice + $memoryPrice + $conditionPrice;

            $telephone->setEstimatedPrice($estimatedPrice);
            $telephoneRepository->save($telephone, true);

            return $this->redirectToRoute('app_telephone_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('telephone/new.html.twig', [
            'telephone' => $telephone,
            'form' => $form,
        ]);
    }

    #[Route('/xiaomi/new', name: 'xiaomi_new', methods: ['GET', 'POST'])]
    public function xiaomiNew(Request $request, TelephoneRepository $telephoneRepository, ModelRepository $modelRepository, BrandRepository $brandRepository): Response
    {
        $brand = $brandRepository->findOneBy(['name' => 'Xiaomi']);

        // Récupérer les modèles de la marque Apple
        $models = $modelRepository->findBy(['brand' => $brand]);

        $telephone = new Telephone();

        $form = $this->createForm(TelephoneType::class, $telephone, [
            'models' => $models,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $telephone->setUser($this->getUser());
            $ramPrice = $telephone->getRAM()->getPrice();
            $networkPrice = $telephone->getNetwork()->getPrice();
            $modelPrice = $telephone->getModel()->getPrice();
            $memoryPrice = $telephone->getMemory()->getPrice();
            $conditionPrice = $telephone->getStatus()->getPrice();

            $estimatedPrice = $ramPrice + $networkPrice + $modelPrice + $memoryPrice + $conditionPrice;

            $telephone->setEstimatedPrice($estimatedPrice);
            $telephoneRepository->save($telephone, true);

            return $this->redirectToRoute('app_telephone_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('telephone/new.html.twig', [
            'telephone' => $telephone,
            'form' => $form,
        ]);
    }

    #[Route('/new', name: 'app_telephone_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TelephoneRepository $telephoneRepository): Response
    {
        $telephone = new Telephone();
        $form = $this->createForm(TelephoneType::class, $telephone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $telephone->setUser($this->getUser());
            $ramPrice = $telephone->getRAM()->getPrice();
            $networkPrice = $telephone->getNetwork()->getPrice();
            $modelPrice = $telephone->getModel()->getPrice();
            $memoryPrice = $telephone->getMemory()->getPrice();
            $conditionPrice = $telephone->getStatus()->getPrice();

            $estimatedPrice = $ramPrice + $networkPrice + $modelPrice + $memoryPrice + $conditionPrice;

            $telephone->setEstimatedPrice($estimatedPrice);
            $telephoneRepository->save($telephone, true);

            return $this->redirectToRoute('app_telephone_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('telephone/new.html.twig', [
            'telephone' => $telephone,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_telephone_show', methods: ['GET'])]
    public function show(Telephone $telephone): Response
    {
        return $this->render('telephone/show.html.twig', [
            'telephone' => $telephone,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_telephone_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Telephone $telephone, TelephoneRepository $telephoneRepository, ModelRepository $modelRepository, BrandRepository $brandRepository): Response
    {

        $form = $this->createForm(TelephoneType::class, $telephone, [
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $telephoneRepository->save($telephone, true);

            return $this->redirectToRoute('app_telephone_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('telephone/edit.html.twig', [
            'telephone' => $telephone,
            'form' => $form,
        ]);
    }
}
