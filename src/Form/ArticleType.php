<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',TextType::class,array('attr' => ['class'=>'form-control','placeholder'=>'Enter Titre d\' Article']))
            ->add('description',TextareaType::class,array(
                'attr' => ['data-provide'=>'markdown',
                    'class'=>'form-control',
                    'rows'=>'10',
                    'placeholder'=>'Enter Description']

            ))
            ->add('datedecreation', DateType::class, array(
                'attr' => ['class'=>'form-control','placeholder'=>'yyyy-MM-dd'],
                'widget' => 'single_text',
                'html5' => false,
                'label' => 'Date de Creation (yyyy-MM-dd)*',
                'format' => 'yyyy-MM-dd',
            ))
            ->add('createby',TextType::class,array('attr' => ['class'=>'form-control','placeholder'=>'Enter l\' auteur']))
            ->add('type',TextType::class,array('attr' => ['class'=>'form-control','placeholder'=>'Enter Type d\' Article']))
            ->add('images',TextType::class,array('attr' => ['class'=>'form-control','placeholder'=>'Enter Link image']))
            ->add('videos',TextType::class,array('attr' => ['class'=>'form-control','placeholder'=>'Enter Link video']))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
