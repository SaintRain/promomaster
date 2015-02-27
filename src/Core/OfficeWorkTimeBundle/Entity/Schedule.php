<?php

namespace Core\OfficeWorkTimeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Schedule
 *
 * @ORM\Table(name="core_office_work_time_schedule")
 * @ORM\Entity(repositoryClass="Core\OfficeWorkTimeBundle\Entity\Repository\ScheduleRepository")
 * @UniqueEntity("dateTime")
 */
class Schedule
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateTime", type="datetime")
     */
    private $dateTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="smallint", nullable=false)
     * @Assert\NotBlank()
     * @Assert\Range(min = -1, max = 1)
     * @Assert\Type(type="integer")
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedDateTime", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $updatedDateTime;


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
     * Set dateTime
     *
     * @param \DateTime $dateTime
     * @return Schedule
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * Get dateTime
     *
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Schedule
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set updatedDateTime
     *
     * @param \DateTime $updatedDateTime
     * @return Schedule
     */
    public function setUpdatedDateTime($updatedDateTime)
    {
        $this->updatedDateTime = $updatedDateTime;

        return $this;
    }

    /**
     * Get updatedDateTime
     *
     * @return \DateTime
     */
    public function getUpdatedDateTime()
    {
        return $this->updatedDateTime;
    }
}
