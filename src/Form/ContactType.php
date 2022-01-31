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
        $categories = [];
        foreach ($builder->getData()->getAccount()->getCategories() as $category) {
            $categories[$category->getName()] = $category;
        }
        
        $builder
            ->add('firstname', TextType::class,
            ['attr' => ['class' => 'name-test',
                        'placeholder' => 'Prénom']
            ],)
            ->add('lastname', TextType::class,
            ['attr' => ['class' => 'test',
                        'placeholder' => 'Nom']
            ],)
            ->add('category', ChoiceType::class, [
                'choices' => $categories,
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