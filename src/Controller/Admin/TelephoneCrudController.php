<?php

namespace App\Controller\Admin;

use App\Entity\Telephone;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Filter\Type\BooleanFilterType;

class TelephoneCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Telephone::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions

            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ;
    }

    public function configureFields(string $pageName): iterable
    {
yield AssociationField::new('user', 'Utilisateur');
         yield  AssociationField::new('model');
        yield  AssociationField::new('RAM');
        yield  AssociationField::new('memory');
        yield  AssociationField::new('network');
        yield  AssociationField::new('status');
        yield  BooleanField::new('cableCharger');
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // ...
            ->showEntityActionsInlined()
            ;
    }
}
