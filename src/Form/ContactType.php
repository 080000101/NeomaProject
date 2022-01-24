<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\PhoneNumber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}