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

        $Models = $options['models'];

        $builder
            ->add('cable_charger', BooleanFilterType::class, [
                'label' => 'Cable chargeur',
                'label_attr' => [
                    'class' => 'my-custom-checkbox-label1',
                ],
            ])


            ->add('model',EntityType::class,[
                'label' => 'Modèle',
                'class' => Model::class,
                'choice_label' => 'name',
                'choices' => $Models,
                'multiple' => false,
                'expanded' => true,
                'by_reference' => false,
                'label_attr' => [
                    'class' => 'my-custom-checkbox-label',
                ],
            ])

            ->add('RAM', EntityType::class, [
                'class' => RAM::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => true,
                'by_reference' => false,
                'label_attr' => [
                    'class' => 'my-custom-checkbox-label',
                ],

            ])
            ->add('memory', EntityType::class, [
                'label' => 'Mémoire',
                'class' => Memory::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => true,
                'by_reference' => false,
                'label_attr' => [
                    'class' => 'my-custom-checkbox-label',
                ],

            ])
            ->add('network', EntityType::class, [
                'class' => Network::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => true,
                'by_reference' => false,
                'label_attr' => [
                    'class' => 'my-custom-checkbox-label',
                ],

            ])
            ->add('status', EntityType::class, [
                'label' => 'Etat',
                'class' => Status::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => true,
                'by_reference' => false,
                'label_attr' => [
                    'class' => 'my-custom-checkbox-label',
                ],

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Telephone::class,
            'models' => [],
        ]);
    }
}
