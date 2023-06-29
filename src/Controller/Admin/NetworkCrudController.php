<?php

namespace App\Controller\Admin;

use App\Entity\Network;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class NetworkCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Network::class;
    }

    public function configureFields(string $pageName): iterable
    {

        yield    IdField::new('id')->hideOnForm();
        yield    TextField::new('name', 'Nom');
        yield    IntegerField::new('price','Prix');

    }
}
