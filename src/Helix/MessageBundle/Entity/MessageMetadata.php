<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 21/01/2018
 * Time: 00:01
 */
namespace Helix\MessageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\MessageBundle\Entity\MessageMetadata as BaseMessageMetadata;

/**
 * @ORM\Entity
 */
class MessageMetadata extends BaseMessageMetadata
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(
     *   targetEntity="Helix\MessageBundle\Entity\Message",
     *   inversedBy="metadata"
     * )
     * @var \FOS\MessageBundle\Model\MessageInterface
     */
    protected $message;

    /**
     * @ORM\ManyToOne(targetEntity="Helix\UserBundle\Entity\User")
     * @var \FOS\MessageBundle\Model\ParticipantInterface
     */
    protected $participant;
}