<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



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
            ->add('category', null, [
                'choice_label' => 'name',
                'attr' => ['class' => 'test',
                           'placeholder' => 'category']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}