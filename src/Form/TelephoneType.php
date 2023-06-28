<?php

namespace App\Form;

use App\Entity\Memory;
use App\Entity\Model;
use App\Entity\Network;
use App\Entity\RAM;
use App\Entity\Status;
use App\Entity\Telephone;
use EasyCorp\Bundle\EasyAdminBundle\Form\Filter\Type\BooleanFilterType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TelephoneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cable_charger', BooleanFilterType::class)


            ->add('model',EntityType::class,[
                'class' => Model::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => true,
                'by_reference' => false,
            ])

            ->add('RAM', EntityType::class, [
                'class' => RAM::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => true,
                'by_reference' => false,
            ])
            ->add('memory', EntityType::class, [
                'class' => Memory::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => true,
                'by_reference' => false,
            ])
            ->add('network', EntityType::class, [
                'class' => Network::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => true,
                'by_reference' => false,
            ])
            ->add('status', EntityType::class, [
                'class' => Status::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => true,
                'by_reference' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Telephone::class,
        ]);
    }
}
