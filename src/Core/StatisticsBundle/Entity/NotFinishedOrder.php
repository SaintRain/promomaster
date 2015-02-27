<?php

/**
 * Сушность незавершенного заказа
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\StatisticsBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Application\Sonata\UserBundle\Entity\CommonContragent;
use Core\DeliveryBundle\Entity\Service;


/**
 * NotFinishedOrder
 *
 * @ORM\Table("core_statistics_not_finished_order")
 * @ORM\Entity(repositoryClass="Core\StatisticsBundle\Entity\Repository\NotFinishedOrderRepository")
 */
class NotFinishedOrder
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
     * @var \Application\Sonata\UserBundle\Entity\CommonContragent
     *
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\CommonContragent")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $contragent;

    /**
     * @var \Core\DeliveryBundle\Entity\Service
     *
     * @ORM\ManyToOne(targetEntity="Core\DeliveryBundle\Entity\Service")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
    private $deliveryMethod;

    /**
     * Время создания
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdDateTime;

    /**
     * Состав заказа
     * @ORM\OneToMany(targetEntity="NotFinishedOrderComposition", mappedBy="order", cascade={"persist"}, orphanRemoval=true, indexBy="id")
     * @Assert\NotBlank()
     */
    private $compositions;

    public function __construct()
    {
        $this->compositions = new ArrayCollection();
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \Application\Sonata\UserBundle\Entity\CommonContragent $contragent
     */
    public function setContragent(CommonContragent $contragent = null)
    {
        $this->contragent = $contragent;

        return $this;
    }

    /**
     * @return \Application\Sonata\UserBundle\Entity\CommonContragent
     */
    public function getContragent()
    {
        return $this->contragent;
    }


    /**
     * @param \Core\DeliveryBundle\Entity\Service $deliveryMethod
     */
    public function setDeliveryMethod(Service $deliveryMethod = null)
    {
        $this->deliveryMethod = $deliveryMethod;

        return $this;
    }

    /**
     * @return \Core\DeliveryBundle\Entity\Service
     */
    public function getDeliveryMethod()
    {
        return $this->deliveryMethod;
    }

    /**
     * @param \DateTime $createdDateTime
     */
    public function setCreatedDateTime(\DateTime $createdDateTime = null)
    {
        $this->createdDateTime = $createdDateTime;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDateTime()
    {
        return $this->createdDateTime;
    }

    /**
     * @param mixed $compositions
     */
    public function setCompositions($compositions)
    {
        $this->compositions = $compositions;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCompositions()
    {
        return $this->compositions;
    }


    public function addComposition(NotFinishedOrderComposition $composition)
    {
        if (!$this->getCompositions()->contains($composition)) {
            $this->compositions->add($composition);
            $composition->setOrder($this);
        }

        return $this;
    }

    public function removeComposition($composition)
    {
        $this->compositions->removeElement($composition);

        return $this;
    }

}