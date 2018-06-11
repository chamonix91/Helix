<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 11/04/2018
 * Time: 12:29
 */

namespace Helix\UserBundle\Repository;
use Doctrine\ORM\EntityRepository;

class UserRepository  extends EntityRepository
{

    public function getByRoles() {

        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('r')
            ->from('HelixUserBundle:User', 'r')
            ->where('r.roles > :roles')
            ->setParameters(array('roles'=> 'ROLE_SPONSOR'));
        $query = $qb->getQuery();
        $user = $query->getResult();
        return $user;


    }

}