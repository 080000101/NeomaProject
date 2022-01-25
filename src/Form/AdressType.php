<?php

namespace App\Form;

use App\Entity\Adress;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;


class AdressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('country', CountryType::class,
            ['attr' => ['class' => 'name-test',
                        'placeholder' => 'Pays']
            ],)
            ->add('city', TextType::class,
            ['attr' => ['class' => 'name-test',
                        'placeholder' => 'Ville']
            ],)
            ->add('adress', TextType::class,
            ['attr' => ['class' => 'name-test',
                        'placeholder' => 'Adresse']
            ],)
            ->add('name', TextType::class,
            ['attr' => ['class' => 'name-test',
                        'placeholder' => 'Libellé']
            ],)
            /*->add('zip_code', NumberType::class,
            ['attr' => ['class' => 'name-test',
                        'placeholder' => 'Code Postal']
            ],)*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adress::class,
        ]);
    }
}
