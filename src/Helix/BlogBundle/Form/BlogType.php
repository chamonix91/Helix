<?php

namespace Helix\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BlogType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre')
            ->add('shortdescription')
            ->add('datecreation')
            ->add('soustitre1')
            ->add('contenue1')
            ->add('soustitre2')
            ->add('contenue2')
            ->add('soustitre3')
            ->add('contenue3')
            ->add('image', FileType::class)
            ->add('imagedetail', FileType::class);

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Helix\BlogBundle\Entity\Blog'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'helix_blogbundle_blog';
    }


}
