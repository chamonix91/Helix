<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 21/01/2018
 * Time: 00:01
 */

namespace Helix\MessageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\MessageBundle\Entity\ThreadMetadata as BaseThreadMetadata;

/**
 * @ORM\Entity
 */
class ThreadMetadata extends BaseThreadMetadata
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(
     *   targetEntity="Helix\MessageBundle\Entity\Thread",
     *   inversedBy="metadata"
     * )
     * @var \FOS\MessageBundle\Model\ThreadInterface
     */
    protected $thread;

    /**
     * @ORM\ManyToOne(targetEntity="Helix\UserBundle\Entity\User")
     * @var \FOS\MessageBundle\Model\ParticipantInterface
     */
    protected $participant;
}