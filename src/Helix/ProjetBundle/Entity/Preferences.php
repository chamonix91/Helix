<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 13/03/2018
 * Time: 12:20
 */

namespace Helix\ProjetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 *
 *
 * @ORM\Table(name="preferences")
 * @ORM\Entity
 */

class Preferences
{


    /**
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $alcool;

    /**
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $gouvernorat;

    /**
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $theme;


    /**
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $age;

    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $iduser;







    /**
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $withPartner;

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
    public function getAlcool()
    {
        return $this->alcool;
    }

    /**
     * @param mixed $alcool
     */
    public function setAlcool($alcool)
    {
        $this->alcool = $alcool;
    }

    /**
     * @return mixed
     */
    public function getGouvernorat()
    {
        return $this->gouvernorat;
    }

    /**
     * @param mixed $gouvernorat
     */
    public function setGouvernorat($gouvernorat)
    {
        $this->gouvernorat = $gouvernorat;
    }



    /**
     * @return mixed
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @param mixed $theme
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getWithPartner()
    {
        return $this->withPartner;
    }

    /**
     * @param mixed $withPartner
     */
    public function setWithPartner($withPartner)
    {
        $this->withPartner = $withPartner;
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






}