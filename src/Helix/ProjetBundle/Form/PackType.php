<?php

namespace Helix\ProjetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PackType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
            ->add('prix')
            ->add('offre1')
            ->add('offre2')
            ->add('offre3')
            ->add('offre4')
            ->add('offre5')
            ->add('offre6')
            ->add('offre7')
            ->add('offre8')
            ->add('offre9')
            ->add('offre10');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Helix\ProjetBundle\Entity\Pack'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'helix_projetbundle_pack';
    }


}
