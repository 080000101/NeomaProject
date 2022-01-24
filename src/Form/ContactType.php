<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\PhoneNumber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class,
            ['attr' => ['class' => 'name-test',
                        'placeholder' => 'Prénom']
            ],)
            ->add('lastname', TextType::class,
            ['attr' => ['class' => 'test',
                        'placeholder' => 'Nom']
            ],)
            /*->add('name', TextType::class,
            ['attr' => ['class' => 'test',
                        'placeholder' => 'Numéro de téléphone']
            ],)
            ->add('number', PhoneNumber::class,
            ['attr' => ['class' => 'test',
                        'placeholder' => 'Numéro de téléphone']
            ],)
            ->add('email', EmailType::class,

            ['attr' => ['class' => 'test',
                        'placeholder' => 'nomprénom@gmail.com']
            ],)
            ->add('country', CountryType::class, [
                'placeholder' => 'Choisissez votre pays',
                'mapped'      => false,
                'attr' => ['class' => 'test']
            ])
            ->add('city', TextType::class,
            ['attr' => ['class' => 'test',
                        'placeholder' => 'Ville']
            ],)
            ->add('adress', TextType::class,
            ['attr' => ['class' => 'test',
                        'placeholder' => 'Adresse']
            ],)*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}