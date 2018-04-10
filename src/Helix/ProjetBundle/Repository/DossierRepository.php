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

}