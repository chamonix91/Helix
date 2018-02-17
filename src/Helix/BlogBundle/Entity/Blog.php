<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 24/01/2018
 * Time: 12:50
 */

namespace Helix\BlogBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 *
 *
 * @ORM\Table(name="blog")
 * @ORM\Entity
 * @Vich\Uploadable
 */
class Blog
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
    private $titre;

    /**
     * @ORM\Column(type="text" ,nullable=true)
     */
    private $shortdescription;



    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", length=255 ,nullable=true)
     */
    private $datecreation;

    /**
     * @ORM\Column(type="string" ,nullable=true)
     */
    private $soustitre1;

    /**
     * @ORM\Column(type="text" ,nullable=true)
     */
    private $contenue1;

    /**
     * @ORM\Column(type="string" ,nullable=true)
     */
    private $soustitre2;

    /**
     * @ORM\Column(type="text" ,nullable=true)
     */
    private $contenue2;

    /**
     * @ORM\Column(type="string" ,nullable=true)
     */
    private $soustitre3;

    /**
     * @ORM\Column(type="text" ,nullable=true)
     */
    private $contenue3;

    /**
     *
     * @ORM\Column(type="string", nullable= true)
     *
     */
    private $nomImage;

    /**
     *
     * @Vich\UploadableField(mapping="blog_image", fileNameProperty="nomImage", size="imageSize")
     * @var File
     *
     */
    private $image;



    /**
     *
     * @ORM\Column(type="string", nullable= true)
     *
     */
    private $nomImagedetail;

    /**
     *
     * @Vich\UploadableField(mapping="blog_imagedetail", fileNameProperty="nomImagedetail", size="imageSize")
     * @var File
     *
     */
    private $imagedetail;



    /**
     * Blog constructor.
     */
    public function __construct()
    {

        $this->datecreation = new \DateTime('now');

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
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getShortdescription()
    {
        return $this->shortdescription;
    }

    /**
     * @param mixed $shortdescription
     */
    public function setShortdescription($shortdescription)
    {
        $this->shortdescription = $shortdescription;
    }

    /**
     * @return \DateTime
     */
    public function getDatecreation()
    {
        return $this->datecreation;
    }

    /**
     * @param \DateTime $datecreation
     */
    public function setDatecreation($datecreation)
    {
        $this->datecreation = $datecreation;
    }

    /**
     * @return mixed
     */
    public function getSoustitre1()
    {
        return $this->soustitre1;
    }

    /**
     * @param mixed $soustitre1
     */
    public function setSoustitre1($soustitre1)
    {
        $this->soustitre1 = $soustitre1;
    }

    /**
     * @return mixed
     */
    public function getContenue1()
    {
        return $this->contenue1;
    }

    /**
     * @param mixed $contenue1
     */
    public function setContenue1($contenue1)
    {
        $this->contenue1 = $contenue1;
    }

    /**
     * @return mixed
     */
    public function getSoustitre2()
    {
        return $this->soustitre2;
    }

    /**
     * @param mixed $soustitre2
     */
    public function setSoustitre2($soustitre2)
    {
        $this->soustitre2 = $soustitre2;
    }

    /**
     * @return mixed
     */
    public function getContenue2()
    {
        return $this->contenue2;
    }

    /**
     * @param mixed $contenue2
     */
    public function setContenue2($contenue2)
    {
        $this->contenue2 = $contenue2;
    }

    /**
     * @return mixed
     */
    public function getSoustitre3()
    {
        return $this->soustitre3;
    }

    /**
     * @param mixed $soustitre3
     */
    public function setSoustitre3($soustitre3)
    {
        $this->soustitre3 = $soustitre3;
    }

    /**
     * @return mixed
     */
    public function getContenue3()
    {
        return $this->contenue3;
    }

    /**
     * @param mixed $contenue3
     */
    public function setContenue3($contenue3)
    {
        $this->contenue3 = $contenue3;
    }

    /**
     * @return mixed
     */
    public function getNomImage()
    {
        return $this->nomImage;
    }

    /**
     * @param mixed $nomImage
     */
    public function setNomImage($nomImage)
    {
        $this->nomImage = $nomImage;
    }

    /**
     * @return File
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param File $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getNomImagedetail()
    {
        return $this->nomImagedetail;
    }

    /**
     * @param mixed $nomImagedetail
     */
    public function setNomImagedetail($nomImagedetail)
    {
        $this->nomImagedetail = $nomImagedetail;
    }

    /**
     * @return File
     */
    public function getImagedetail()
    {
        return $this->imagedetail;
    }

    /**
     * @param File $imagedetail
     */
    public function setImagedetail($imagedetail)
    {
        $this->imagedetail = $imagedetail;
    }


}