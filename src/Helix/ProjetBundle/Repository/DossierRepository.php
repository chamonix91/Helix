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

    public function getRecommande() {

        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('r')
            ->from('HelixProjetBundle:Dossier', 'r')
            ->where('r.note > :note')
            ->setParameters(array('note'=> 0));
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
            ->andWhere('a.alcool = :alcool')
            ->andWhere('a.withPartner = :withPartner')
            ->andWhere('a.gouvernorat = :gouvernorat')
            ->andWhere('a.theme = :theme')
            ->setParameters(array(

                'age' => $data['age'],

                'alcool' => $data['alcool'],

                'withPartner' => $data['withPartner'],
                'gouvernorat' => $data['gouvernorat'],
                'theme' => $data['theme']

            ));
        $qr = $query->getQuery();
        $dossier = $qr->getResult();
        return $dossier;
        /*

// Si la recherche porte sur toutes les marques

        if($data['marque'] != '')

        {

            $query->andWhere('a.marque = :marque')

                ->setParameter('marque', $data['marque']);

        }

// Si la recherche porte sur tout les modèles

        if($data['modele'] != '')

        {

            $query->andWhere('a.modele = :modele')

                ->setParameter('modele', $data['modele']);

        }

// Si la recherche porte sur toutes les villes

        if($data['ville'] != '')

        {

            $query->andWhere('a.ville = :ville')

                ->setParameter('ville', $data['ville']);

        }

// Si la recherche porte sur tout les types de transmission

        if($data['transmission'] != '')

        {

            $query->andWhere('a.transmission = :transmission')

                ->setParameter('transmission', $data['transmission']);

        }

        return $query->getQuery()->getResult();

    }*/

    }
}