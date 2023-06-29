<?php

namespace App\Controller\Admin;

use App\Entity\Memory;
use App\Entity\Model;
use App\Entity\Network;
use App\Entity\RAM;
use App\Entity\Status;
use App\Entity\Telephone;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ) {
    }
    #[Route('/admin', name: 'admin')]
    #[IsGranted('ROLE_ADMIN')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->
            setController(UserCrudController::class)
            ->generateUrl();
        return $this->redirect($url);


    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('My Project Directory');
    }
        public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Aller sur le site', 'fa fa-undo', 'app_login');

        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::linkToCrud('liste des utilsateurs', 'fas fa-list', User::class);

        yield MenuItem::section('les téléphones');
        yield    MenuItem::linkToCrud('Ajouter un téléphones', 'fas fa-plus-circle', Telephone::class)->setAction(crud::PAGE_NEW);
        yield    MenuItem::linkToCrud('Liste des téléphones', 'fas fa-list', Telephone::class);

        yield MenuItem::section('La mémoires');
        yield    MenuItem::linkToCrud('Ajouter une mémoire', 'fas fa-plus-circle', Memory::class)->setAction(crud::PAGE_NEW);
        yield    MenuItem::linkToCrud('Liste des mémoires', 'fas fa-list', Memory::class);

        yield MenuItem::section('Les modéles');
        yield    MenuItem::linkToCrud('Ajouter un modéle', 'fas fa-plus-circle', Model::class)->setAction(crud::PAGE_NEW);
        yield    MenuItem::linkToCrud('Liste des modéle', 'fas fa-list', Model::class);

        yield MenuItem::section('Les réseaux');
        yield    MenuItem::linkToCrud('Ajouter un réseau', 'fas fa-plus-circle', Network::class)->setAction(crud::PAGE_NEW);
        yield    MenuItem::linkToCrud('Liste des réseaux', 'fas fa-list', Network::class);

        yield MenuItem::section('Les type de Ram');
        yield    MenuItem::linkToCrud('Ajouter un type de Ram', 'fas fa-plus-circle', RAM::class)->setAction(crud::PAGE_NEW);
        yield    MenuItem::linkToCrud('Liste des Ram ', 'fas fa-list', RAM::class);

        yield MenuItem::section('Les états');
        yield    MenuItem::linkToCrud('Ajouter un état', 'fas fa-plus-circle', Status::class)->setAction(crud::PAGE_NEW);
        yield    MenuItem::linkToCrud('Liste des états ', 'fas fa-list', Status::class);
    }
}
