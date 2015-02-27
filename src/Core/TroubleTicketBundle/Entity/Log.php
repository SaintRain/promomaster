<?php

namespace Core\TroubleTicketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application\Sonata\UserBundle\Entity\User;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Log
 *
 * @ORM\Table(name="core_trouble_ticket_log")
 * @ORM\Entity(repositoryClass="Core\TroubleTicketBundle\Entity\Repository\LogRepository")
 */
class Log
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
     * @ORM\ManyToOne(targetEntity="Core\TroubleTicketBundle\Entity\TroubleTicket", inversedBy="logs", cascade={"persist"})
     * @ORM\JoinColumn(name="trouble_ticket_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * @Assert\NotNull()
     * @Assert\NotBlank()
     */
    private $troubleTicket;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="manager_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     * @Assert\NotBlank(groups={"Backend"})
     */
    private $manager;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_time", type="datetime")
     * @Assert\NotBlank()
     */
    private $date;

    /**
     * @ORM\OneToOne(targetEntity="Core\TroubleTicketBundle\Entity\Message", mappedBy="log", cascade={"persist", "merge", "refresh","detach"})
     */
    private $message;

    /**
     * @var array
     *
     * @ORM\Column(name="changes", type="json")
     */
    private $changes;


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

    /**
     * Set troubleTicket
     *
     * @param integer $troubleTicket
     * @return Log
     */
    public function setTroubleTicket(TroubleTicket $troubleTicket = null)
    {
        $this->troubleTicket = $troubleTicket;
    
        return $this;
    }

    /**
     * Get troubleTicket
     *
     * @return integer 
     */
    public function getTroubleTicket()
    {
        return $this->troubleTicket;
    }

    /**
     * Set manager
     *
     * @param integer $manager
     * @return Log
     */
    public function setManager(User $manager = null)
    {
        $this->manager = $manager;
    
        return $this;
    }

    /**
     * Get manager
     *
     * @return integer 
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Log
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     *
     * @param Core\TroubleTicketBundle\Entity\Message $message
     */
    public function setMessage(Message $message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     *
     * @return Core\TroubleTicketBundle\Entity\Message
     */
    public function getMessage()
    {
        return $this->message;
    }

    public function getChanges()
    {
        return $this->changes;
    }

    public function setChanges($changes)
    {
        $this->changes = $changes;
        
        return $this;
    }

    
}
