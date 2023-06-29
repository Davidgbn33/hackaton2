<?php

namespace App\Controller\Admin;

use App\Entity\RAM;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RAMCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RAM::class;
    }

    public function configureFields(string $pageName): iterable
    {

        yield    IdField::new('id')->hideOnForm();
        yield    TextField::new('name', 'Nom');
        yield    IntegerField::new('price', 'Prix');

    }
}
