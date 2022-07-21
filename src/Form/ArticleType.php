<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add('picture', FileType::class, ["required" => false, "data_class" => null])
      ->add('title', TextType::class, ["required" => false])
      ->add('content', TextareaType::class, ["required" => false])
      ->add('isPublished', CheckboxType::class, ["required" => false])
      ->add('categories', EntityType::class, [
        'class' => Category::class,
        'choice_label' => 'label',
        'multiple' => true,
        'expanded' => true,
        "required" => false
      ])
      ->add("save", SubmitType::class, ["label" => "Enregister"]);
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => Article::class,
    ]);
  }
}
