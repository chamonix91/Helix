<?php
// src/AppBundle/Entity/User.php

namespace Helix\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Helix\ProjetBundle\Entity\Pack;
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
 * @ORM\Entity(repositoryClass="Helix\UserBundle\Repository\UserRepository")


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
     * @ORM\Column(type="string", nullable= true)
     *
     */
    private $type="free";

    /**
     * @ORM\OneToOne(targetEntity="Helix\ProjetBundle\Entity\Preferences", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="preference", referencedColumnName="id")
     * @Assert\Type(type="Helix\ProjetBundle\Entity\Preference")
     * @Assert\Valid()
     *
     */
    private $preference ;

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

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getPreference()
    {
        return $this->preference;
    }

    /**
     * @param mixed $preference
     */
    public function setPreference($preference)
    {
        $this->preference = $preference;
    }



}