<?php

namespace Helix\ProjetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class preferencesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('alcool', ChoiceType::class, array(
            'choices' => array('Alcool autorisé ?' => 'all','Oui' => 'oui', 'non' => 'non'),
        ))
            ->add('gouvernorat', ChoiceType::class, array(
                'choices' => array('choisir un gouvernorat' => 'all',
                    'Ariana' => 'Ariana',
                    'Béja' => 'Béja',
                    'Ben Arous' => 'Ben Arous',
                    'Bizerte' => 'Bizerte',
                    'Gabès' => 'Gabès',
                    'Gafsa' => 'Gafsa',
                    'Jendouba' => 'Jendouba',
                    'Kairouan' => 'Kairouan',
                    'Kasserine' => 'Kasserine',
                    'Kébili' => 'Kébili',
                    'Le Kef' => 'Le Kef',
                    'Mahdia' => 'Mahdia',
                    'La Manouba' => 'La Manouba',
                    'Médenine' => 'Médenine',
                    'Monastir' => 'Monastir',
                    'Nabeul' => 'Nabeul',
                    'Sfax' => 'Sfax',
                    'Sidi Bouzid' => 'Sidi Bouzid',
                    'Siliana' => 'Siliana',
                    'Sousse' => 'Sousse',
                    'Tataouine' => 'Tataouine',
                    'Tozeur' => 'Tozeur',
                    'Tunis' => 'Tunis',
                    'Zaghouan' => 'Zaghouan'
                ),
            ))
            ->add('theme', ChoiceType::class, array(
                'choices' => array('choisir un theme' => 'all','Business' => 'Business', 'Humanitaire' => 'Humanitaire', 'Culturel' => 'Culturel'),
            ))
            ->add('age', ChoiceType::class, array(
                'choices' => array('choisir une tranche d âge' => 'all','[-18 ans]' => '[-18]', '[18-25ans]' => '[25-35 ans]', '[35 ans+]' => '[35 ans+]'),
            ))
            ->add('withPartner', ChoiceType::class, array(
                'choices' => array('Avez-vous un partenaire ? ' => 'all','Oui' => 'oui', 'non' => 'non'),
            ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Helix\ProjetBundle\Entity\preferences'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'helix_projetbundle_preferences';
    }


}
