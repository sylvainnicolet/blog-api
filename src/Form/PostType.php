<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'post.title._label',
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('author', TextType::class, [
                'label' => 'post.author._label',
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('publishedAt', DateType::class, [
                'label' => 'post.published_at._label',
                'required' => false,
            ])
            ->add('description', TextareaType::class, [
                'label' => 'post.description._label',
                'constraints' => [
                    new NotBlank(),
                ],
                'attr' => [
                    'rows' => 5,
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
