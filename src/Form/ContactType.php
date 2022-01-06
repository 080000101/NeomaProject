<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;


class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class,
            ['attr' => ['class' => 'test',
                        'placeholder' => 'Marie']
            ],)
            ->add('lastname', TextType::class,
            ['attr' => ['class' => 'test',
                        'placeholder' => 'Dupont']
            ],)
            ->add('phone_number', NumberType::class,
            ['attr' => ['class' => 'test',
                        'placeholder' => '0654378965']
            ],)
            ->add('email', TextType::class,
            ['attr' => ['class' => 'test',
                        'placeholder' => 'mariedupont@gmail.com']
            ],)
            /* ->add('country', CountryType::class, [
                'placeholder' => 'Choisissez votre pays',
                'mapped'      => false
            ])
            ->add('city')
            ->add('adress') */
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
