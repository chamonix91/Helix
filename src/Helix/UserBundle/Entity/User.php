<?php
// src/AppBundle/Entity/User.php

namespace Helix\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use FOS\MessageBundle\Model\ParticipantInterface;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateur")
 * @Vich\Uploadable

 */
class User extends BaseUser implements ParticipantInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * @ORM\Column(type="string", nullable= true)
     *
     */
    private $nom;

    /**
     *
     * @ORM\Column(type="string", nullable= true)
     *
     */
    private $prenom;

    /**
     *
     * @ORM\Column(type="boolean", nullable= true)
     *
     */
    private $ban;


    /**
     *
     * @ORM\Column(type="string", nullable= true)
     *
     */
    private $nomDocument;

    /**
     * @Vich\UploadableField(mapping="document_image", fileNameProperty="nomDocument", size="imageSize")
     * @var File
     */
    private $Document;

    /**
     *
     * @ORM\Column(type="string", nullable= true)
     *
     */
    private $nomLogo;

    /**
     * @Vich\UploadableField(mapping="logo_image", fileNameProperty="nomLogo", size="imageSize")
     * @var File
     */
    private $logo;

    /**
     *
     * @ORM\OneToMany(targetEntity="Helix\ProjetBundle\Entity\Pack", mappedBy="user", cascade={"remove"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="idpack", referencedColumnName="id")
     * @Assert\Type(type="Helix\ProjetBundle\Entity\Pack")
     * @Assert\Valid()
     *
     */
    private $pack ;



    public function __construct()
    {
        parent::__construct();
        $this->pack = new ArrayCollection();
    }

    /**
     * @return File
     */
    public function getDocument()
    {
        return $this->Document;
    }

    /**
     * @param File $Document
     */
    public function setDocument($Document)
    {
        $this->Document = $Document;
    }

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
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getBan()
    {
        return $this->ban;
    }

    /**
     * @param mixed $ban
     */
    public function setBan($ban)
    {
        $this->ban = $ban;
    }



    /**
     * @return mixed
     */
    public function getNomDocument()
    {
        return $this->nomDocument;
    }

    /**
     * @param mixed $nomDocument
     */
    public function setNomDocument($nomDocument)
    {
        $this->nomDocument = $nomDocument;
    }

    /**
     * @return mixed
     */
    public function getNomLogo()
    {
        return $this->nomLogo;
    }

    /**
     * @param mixed $nomLogo
     */
    public function setNomLogo($nomLogo)
    {
        $this->nomLogo = $nomLogo;
    }

    /**
     * @return File
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param File $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    public function __toString()
    {
        return $this->getNom();
    }

}