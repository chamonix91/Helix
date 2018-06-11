<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 13/03/2018
 * Time: 12:44
 */

namespace Helix\ProjetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class PreferenceType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('alcool', ChoiceType::class, array(
                'choices' => array('Oui' => 'oui', 'non' => 'non'),
            ))
            ->add('gouvernorat', ChoiceType::class, array(
                'choices' => array('In Stock' => true, 'Out of Stock' => false),
            ))
            ->add('theme', ChoiceType::class, array(
                'choices' => array('In Stock' => true, 'Out of Stock' => false),
            ))
            ->add('age', ChoiceType::class, array(
                'choices'
                => array('In Stock' => true, 'Out of Stock' => false),
            ))
            ->add('withPartner', ChoiceType::class, array(
                'choices' => array('Oui' => 'oui', 'non' => 'non'),
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Helix\ProjetBundle\Entity\Preferences'
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