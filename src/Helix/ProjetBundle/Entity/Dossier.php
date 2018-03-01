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
 * @ORM\Table(name="dossier")
 * @ORM\Entity
 */

class Dossier
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
    private $nom;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateouverture;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $datecloture;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $houverture;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $hcloture;

    /**
     * @ORM\Column(type="text" ,nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text" ,nullable=true)
     */
    private $programme;

    /**
     * @ORM\Column(type="string" ,nullable=true)
     */
    private $partenaire;

    /**
     * @ORM\Column(type="string" ,nullable=true)
     */
    private $compagnecom;

    /**
     * @ORM\Column(type="integer" ,nullable=true)
     */
    private $note;

    /**
     * @ORM\Column(type="integer" ,nullable=true)
     */
    private $etat;


    /**
     *
     * @ORM\ManyToOne(targetEntity="Helix\ProjetBundle\Entity\Pack", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="idpack", referencedColumnName="id")
     * @Assert\Type(type="Helix\ProjetBundle\Entity\Pack")
     * @Assert\Valid()
     *
     */
    private $pack ;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Helix\ProjetBundle\Entity\Pack", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="idpack2", referencedColumnName="id")
     * @Assert\Type(type="Helix\ProjetBundle\Entity\Pack")
     * @Assert\Valid()
     *
     */
    private $pack2 ;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Helix\ProjetBundle\Entity\Pack", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="idpack3", referencedColumnName="id")
     * @Assert\Type(type="Helix\ProjetBundle\Entity\Pack")
     * @Assert\Valid()
     *
     */
    private $pack3 ;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Helix\UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(name="iduser", referencedColumnName="id")
     * @Assert\Type(type="Helix\UserBundle\Entity\User")
     * @Assert\Valid()
     *
     */
    private $iduser;



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
     * @return \DateTime
     */
    public function getDateouverture()
    {
        return $this->dateouverture;
    }

    /**
     * @param \DateTime $dateouverture
     */
    public function setDateouverture($dateouverture)
    {
        $this->dateouverture = $dateouverture;
    }

    /**
     * @return \DateTime
     */
    public function getDatecloture()
    {
        return $this->datecloture;
    }

    /**
     * @param \DateTime $datecloture
     */
    public function setDatecloture($datecloture)
    {
        $this->datecloture = $datecloture;
    }

    /**
     * @return \DateTime
     */
    public function getHouverture()
    {
        return $this->houverture;
    }

    /**
     * @param \DateTime $houverture
     */
    public function setHouverture($houverture)
    {
        $this->houverture = $houverture;
    }

    /**
     * @return \DateTime
     */
    public function getHcloture()
    {
        return $this->hcloture;
    }

    /**
     * @param \DateTime $hcloture
     */
    public function setHcloture($hcloture)
    {
        $this->hcloture = $hcloture;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getProgramme()
    {
        return $this->programme;
    }

    /**
     * @param mixed $programme
     */
    public function setProgramme($programme)
    {
        $this->programme = $programme;
    }

    /**
     * @return mixed
     */
    public function getPartenaire()
    {
        return $this->partenaire;
    }

    /**
     * @param mixed $partenaire
     */
    public function setPartenaire($partenaire)
    {
        $this->partenaire = $partenaire;
    }

    /**
     * @return mixed
     */
    public function getCompagnecom()
    {
        return $this->compagnecom;
    }

    /**
     * @param mixed $compagnecom
     */
    public function setCompagnecom($compagnecom)
    {
        $this->compagnecom = $compagnecom;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note)
    {
        $this->note = $note;
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

    /**
     * @return mixed
     */
    public function getPack2()
    {
        return $this->pack2;
    }

    /**
     * @param mixed $pack2
     */
    public function setPack2($pack2)
    {
        $this->pack2 = $pack2;
    }

    /**
     * @return mixed
     */
    public function getPack3()
    {
        return $this->pack3;
    }

    /**
     * @param mixed $pack3
     */
    public function setPack3($pack3)
    {
        $this->pack3 = $pack3;
    }






}