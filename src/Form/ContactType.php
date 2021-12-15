<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname',)
            ->add('lastname')
            ->add('phone_number', NumberType::class , [
                    'scale' => 2,
                    'attr'  => array(
                    'min'  => 0,
                    'max' => 999999999999,
                    'step' => 0.01,
                ),
            ])
            ->add('email')
            ->add('country', CountryType::class, [
                'placeholder' => 'France',
                'mapped'      => false
            ])
            ->add('city')
            ->add('adress')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
