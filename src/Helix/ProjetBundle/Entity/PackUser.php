<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 18/02/2018
 * Time: 15:31
 */

namespace Helix\ProjetBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 *
 * @ORM\Table(name="packuser")
 * @ORM\Entity
 */
class PackUser
{

    /**
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer" ,nullable=true)
     */
    private $iduser;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Helix\ProjetBundle\Entity\Pack", cascade={"persist"})
     * @ORM\JoinColumn(name="idpack", referencedColumnName="id")
     * @Assert\Type(type="Helix\ProjetBundle\Entity\Pack")
     * @Assert\Valid()
     *
     */
    private $pack ;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param mixed $iduser
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }

    /**
     * @return mixed
     */
    public function getPack()
    {
        return $this->pack;
    }

    /**
     * @param mixed $pack
     */
    public function setPack($pack)
    {
        $this->pack = $pack;
    }



}