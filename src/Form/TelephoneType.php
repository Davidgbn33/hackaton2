<?php

namespace App\Form;

use App\Entity\Telephone;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TelephoneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cable_charger')
            ->add('estimatedPrice')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('user')
            ->add('model')
            ->add('RAM')
            ->add('memory')
            ->add('network')
            ->add('status')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Telephone::class,
        ]);
    }
}
