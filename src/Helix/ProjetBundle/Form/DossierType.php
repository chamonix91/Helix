<?php

namespace Helix\ProjetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DossierType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
        ->add('dateouverture', DateType::class, array(
            'widget' => 'choice',
        ))
            ->add('datecloture', DateType::class, array(
        'widget' => 'choice',
    ))
            ->add('houverture', TimeType::class)
            ->add('hcloture', TimeType::class)
            ->add('description')
            ->add('programme')
            ->add('partenaire')
            ->add('compagnecom')
            ->add('pack')
            ->add('pack2')
            ->add('pack3');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Helix\ProjetBundle\Entity\Dossier'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'helix_projetbundle_dossier';
    }


}
