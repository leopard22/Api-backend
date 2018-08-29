<?php

namespace App\Form;

use App\Entity\Song;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SongType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('coverpicture')
            ->add('downloadable')
            ->add('explicit')
            ->add('dateupload')
            ->add('datecreation')
            ->add('duration')
            ->add('enable')
            ->add('nblike')
            ->add('nbplayed')
            ->add('nbdownloaded')
            ->add('idgenre', TypeType::class)
            ->add('iduser', UserType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Song::class,
        ]);
    }
}
