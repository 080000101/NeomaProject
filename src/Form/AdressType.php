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
            ->add('name', TextType::class,
            ['attr' => ['class' => 'name-test',
                        'placeholder' => 'ex : Maison']
            ],)
            ->add('adress', TextType::class,
            ['attr' => ['class' => 'name-test',
                        'placeholder' => 'Adresse']
            ],)
            /*->add('zip_code', NumberType::class,
            ['attr' => ['class' => 'name-test',
                        'placeholder' => 'Code Postal']
            ],)*/
            ->add('city', TextType::class,
            ['attr' => ['class' => 'name-test',
                        'placeholder' => 'Ville']
            ],)
            ->add('country', CountryType::class,
            ['attr' => ['class' => 'name-test',
                        'placeholder' => 'Pays']
            ],)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adress::class,
        ]);
    }
}
