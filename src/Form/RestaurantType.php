<?php

namespace App\Form;

use App\Entity\Restaurant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RestaurantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Title',
            ])
            ->add('slug', TextType::class, [
                'label' => 'Slug',
            ])
            ->add('imageFile', FileType::class, [
                'required' => false,
                'label' => 'Image (JPEG or PNG file)',
            ])
            ->add('is_active', CheckboxType::class, [
                'label' => 'Is Active',
                'required' => false,
            ])
            ->add('created_at', DateTimeType::class, [
                'widget' => 'single_text',
                'label' => 'Created At',
            ])
            ->add('updated_at', DateTimeType::class, [
                'widget' => 'single_text',
                'label' => 'Updated At',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Restaurant::class,
        ]);
    }
}
