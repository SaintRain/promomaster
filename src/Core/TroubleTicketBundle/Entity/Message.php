<?php

namespace Core\TroubleTicketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Application\Sonata\UserBundle\Entity\User;

/**
 * Message
 *
 * @ORM\Table(name="core_trouble_ticket_message")
 * @ORM\Entity(repositoryClass="Core\TroubleTicketBundle\Entity\Repository\MessageRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Message
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Core\TroubleTicketBundle\Entity\TroubleTicket", inversedBy="messages")
     * @ORM\JoinColumn(name="trouble_ticket_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * @Assert\NotBlank()
     * @Assert\NotNull()
     */
    private $troubleTicket;

    /**
     * @ORM\OneToOne(targetEntity="Core\TroubleTicketBundle\Entity\Log", inversedBy="message", cascade={"persist"})
     * @ORM\JoinColumn(name="trouble_ticket_log_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * @Assert\NotBlank()
     * @Assert\NotNull()
     */
    private $log;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     * @Assert\NotBlank()
     */
    private $body;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_time", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="manager_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     * @Assert\NotBlank(groups={"Backend"})
     */
    private $manager;

    public function __toString()
    {
        return $this->getId().'';
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function getTroubleTicket()
    {
        return $this->troubleTicket;
    }

    public function setTroubleTicket(TroubleTicket  $troubleTicket = null)
    {
        $this->troubleTicket = $troubleTicket;

        return $this;
    }

    public function getLog()
    {
        return $this->log;
    }

    public function setLog(Log $log = null)
    {
        $this->log = $log;
        
        return $this;
    }

            public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
    
    public function getManager()
    {
        return $this->manager;
    }

    public function setManager(User $manager = null)
    {
        $this->manager = $manager;

        return $this;
    }

}
