<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 13/03/2018
 * Time: 20:21
 */

namespace Helix\ProjetBundle\Repository;

use Doctrine\ORM\EntityRepository;


class DossierRepository extends EntityRepository
{

    public function getRecommande()
    {

        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('r')
            ->from('HelixProjetBundle:Dossier', 'r')
            ->where('r.note > :note')
            ->setParameters(array('note' => 0));
        $query = $qb->getQuery();
        $dossier = $query->getResult();
        return $dossier;
    }

    //////////////////////////////////
    /////// Search Repository////////
    ////////////////////////////////

    public function findProjectByParametres($data)

    {

        $query = $this->createQueryBuilder('a');

        $query->where('a.age = :age')
            ->orWhere('a.alcool = :alcool')
            ->orWhere('a.withPartner = :withPartner')
            ->orWhere('a.gouvernorat = :gouvernorat')
            ->orWhere('a.theme = :theme')
            ->setParameters(array(

                'age' => $data['age'],

                'alcool' => $data['alcool'],

                'withPartner' => $data['withPartner'],
                'gouvernorat' => $data['gouvernorat'],
                'theme' => $data['theme']

            ));


            // Si la recherche porte sur toutes les marques

        if ($data['alcool'] != 'all') {

            $query->andWhere('a.alcool = :alcool')
                ->setParameter('alcool', $data['alcool']);

        }

        // Si la recherche porte sur tout les modèles

        if ($data['age'] != 'all') {

            $query->andWhere('a.age = :age')
                ->setParameter('age', $data['age']);

        }

        // Si la recherche porte sur toutes les villes

        if ($data['withPartner'] != 'all') {

            $query->andWhere('a.withPartner = :withPartner')
                ->setParameter('withPartner', $data['withPartner']);

        }

        // Si la recherche porte sur tout les types de transmission

        if ($data['gouvernorat'] != 'all') {

            $query->andWhere('a.gouvernorat = :gouvernorat')
                ->setParameter('gouvernorat', $data['gouvernorat']);

        }

        // Si la recherche porte sur tout les types de transmission

        if ($data['theme'] != 'all') {

            $query->andWhere('a.theme = :theme')
                ->setParameter('theme', $data['theme']);

        }

        $qr = $query->getQuery();
        $dossier = $qr->getResult();
        return $dossier;
    }


}