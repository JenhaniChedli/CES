<?php

namespace App\Form;

use App\Entity\Staff;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StaffType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname',TextType::class,array('attr' => ['class'=>'form-control','placeholder'=>'Enter First name']))
            ->add('lastname',TextType::class,array('attr' => ['class'=>'form-control','placeholder'=>'Enter Last name']))
            ->add('Email',EmailType::class,array('attr' => ['class'=>'form-control','placeholder'=>'Enter Email']))
            ->add('poste',TextType::class,array('attr' => ['class'=>'form-control','placeholder'=>'Enter Poste']))
            ->add('phoneNumber',TextType::class,array('attr' => ['class'=>'form-control','placeholder'=>'Enter Phone Number']))
            ->add('photo', FileType::class, [
                'attr' => ['class'=>'form-control'],
                'mapped' => false
            ])
            ->add('description',TextareaType::class,array(
                'attr' => [
                    'class'=>'form-control',
                    'rows'=>'10',
                    'placeholder'=>'Enter Description']

            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Staff::class,
        ]);
    }
}
