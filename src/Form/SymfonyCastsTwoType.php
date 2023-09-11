<?php

namespace App\Form;

use App\Entity\SymfonyCasts;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class SymfonyCastsTwoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'help' => 'choose comething anything',
            ])
            ->add('content')
            ->add('author')
            ->add('save', SubmitType::class)
            ->add('publishedAt', DateTimeType::class, [
                'date_widget' => 'single_text',
                'time_widget' => 'single_text'
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SymfonyCasts::class,
        ]);
    }
}
