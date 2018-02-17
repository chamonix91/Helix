<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 24/01/2018
 * Time: 13:25
 */

namespace Helix\ProjetBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;



/**
 *
 *
 * @ORM\Table(name="pack")
 * @ORM\Entity
 */

class Pack
{

    /**
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\Column(type="string" ,nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer" ,nullable=true)
     */
    private $prix;

    /**
     * @ORM\Column(type="string" ,nullable=true)
     */
    private $offre1;

    /**
     * @ORM\Column(type="string" ,nullable=true)
     */
    private $offre2;

    /**
     * @ORM\Column(type="string" ,nullable=true)
     */
    private $offre3;

    /**
     * @ORM\Column(type="string" ,nullable=true)
     */
    private $offre4;

    /**
     * @ORM\Column(type="string" ,nullable=true)
     */
    private $offre5;

    /**
     * @ORM\Column(type="string" ,nullable=true)
     */
    private $offre6;

    /**
     * @ORM\Column(type="string" ,nullable=true)
     */
    private $offre7;

    /**
     * @ORM\Column(type="string" ,nullable=true)
     */
    private $offre8;

    /**
     * @ORM\Column(type="string" ,nullable=true)
     */
    private $offre9;

    /**
     * @ORM\Column(type="string" ,nullable=true)
     */
    private $offre10;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Helix\UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(name="iduser", referencedColumnName="id")
     * @Assert\Type(type="Helix\UserBundle\Entity\User")
     * @Assert\Valid()
     *
     */
    private $idUser ;



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
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }


    /**
     * @return mixed
     */
    public function getOffre1()
    {
        return $this->offre1;
    }

    /**
     * @param mixed $offre1
     */
    public function setOffre1($offre1)
    {
        $this->offre1 = $offre1;
    }

    /**
     * @return mixed
     */
    public function getOffre2()
    {
        return $this->offre2;
    }

    /**
     * @param mixed $offre2
     */
    public function setOffre2($offre2)
    {
        $this->offre2 = $offre2;
    }

    /**
     * @return mixed
     */
    public function getOffre3()
    {
        return $this->offre3;
    }

    /**
     * @param mixed $offre3
     */
    public function setOffre3($offre3)
    {
        $this->offre3 = $offre3;
    }

    /**
     * @return mixed
     */
    public function getOffre4()
    {
        return $this->offre4;
    }

    /**
     * @param mixed $offre4
     */
    public function setOffre4($offre4)
    {
        $this->offre4 = $offre4;
    }

    /**
     * @return mixed
     */
    public function getOffre5()
    {
        return $this->offre5;
    }

    /**
     * @param mixed $offre5
     */
    public function setOffre5($offre5)
    {
        $this->offre5 = $offre5;
    }

    /**
     * @return mixed
     */
    public function getOffre6()
    {
        return $this->offre6;
    }

    /**
     * @param mixed $offre6
     */
    public function setOffre6($offre6)
    {
        $this->offre6 = $offre6;
    }

    /**
     * @return mixed
     */
    public function getOffre7()
    {
        return $this->offre7;
    }

    /**
     * @param mixed $offre7
     */
    public function setOffre7($offre7)
    {
        $this->offre7 = $offre7;
    }

    /**
     * @return mixed
     */
    public function getOffre8()
    {
        return $this->offre8;
    }

    /**
     * @param mixed $offre8
     */
    public function setOffre8($offre8)
    {
        $this->offre8 = $offre8;
    }

    /**
     * @return mixed
     */
    public function getOffre9()
    {
        return $this->offre9;
    }

    /**
     * @param mixed $offre9
     */
    public function setOffre9($offre9)
    {
        $this->offre9 = $offre9;
    }

    /**
     * @return mixed
     */
    public function getOffre10()
    {
        return $this->offre10;
    }

    /**
     * @param mixed $offre10
     */
    public function setOffre10($offre10)
    {
        $this->offre10 = $offre10;
    }

    public function __toString()
    {
        return $this->getNom();
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }












}