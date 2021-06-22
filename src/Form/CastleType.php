<?php

namespace App\Form;

use App\Entity\Appelation;
use App\Entity\Castle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CastleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label'=> 'Nom du château',
                'attr' => [
                    'placeholder' => 'Château du châtelin'
                ]
            ])
            ->add('image', TextType::class, [
                'label' => 'url de l\'image',
                'required' => false,
            ])
            ->add('appelation', EntityType::class, [
                'class' => Appelation::class,
                'choice_label' => 'name',
                'expanded' => false,
                'multiple' => false,
            ])
            ->add('rating')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Castle::class,
        ]);
    }
}
