<?php

namespace App\Form;

use App\Entity\Club;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClubType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom',TextType::class,array('attr' => ['class'=>'form-control','placeholder'=>'Enter Nom club']))
            ->add('description',TextareaType::class,array(
                'attr' => ['data-provide'=>'markdown',
                    'class'=>'form-control',
                    'rows'=>'10',
                    'placeholder'=>'Enter Description']

            ))
            ->add('logo', FileType::class, [
                'attr' => ['class'=>'form-control','id'=>'logo'],
                'mapped' => false
            ])
            ->add('linkdinscri',TextType::class,array('attr' => ['class'=>'form-control','placeholder'=>'Enter Link d\' inscription']))
            ->add('datedecreation', DateType::class, array(
                'attr' => ['class'=>'form-control','placeholder'=>'yyyy-MM-dd'],
                'widget' => 'single_text',
                'html5' => false,
                'label' => 'Date de Creation (yyyy-MM-dd)*',
                'format' => 'yyyy-MM-dd',
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Club::class,
        ]);
    }
}
