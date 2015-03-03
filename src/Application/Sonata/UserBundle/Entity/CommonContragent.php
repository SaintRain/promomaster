<?php

/**
 * Базовый класс контрагентов, содержащий основные свойства
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Entity;

use Core\DirectoryBundle\Entity\City;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Application\Sonata\UserBundle\Entity\CommonContact;
use Symfony\Component\Validator\ExecutionContextInterface;

/**
 * @todo Добавить привязку к 1с
 */
class CommonContragent
{

    /**
     * Первичный ключ
     * @var integer
     */
    protected $id;

    /**
     * Город
     * @var type
     */
    protected $city;

    /**
     * @var \DateTime
     */
    protected $createdDateTime;

    /**
     * @var \DateTime
     */
    protected $updatedDateTime;

    /**
     *
     * @var Application\Sonata\UserBundle\Entity\User
     */
    protected $user;

    /**
     * 1с id (номер)
     */
    //protected $oneC;

    /**
     * Телефон
     * @var string
     */
    protected $phone1;

    /**
     * Телефон
     * @var string
     */
    protected $phone2;

    /**
     * Телефон
     * @var string
     */
    protected $phone3;

    /**
     * Контактный email
     * @var type 
     */
    protected $contactEmail;

    /**
     * Платежи
     * @var string
     */
    protected $payments;

    /**
     * Индивидуальные скидки по производителям
     * @return type
     */
    protected $manufacturerDiscounts;

    /**
     * Все заказы контрагента
     */
//    private $orders;

    public function __toString()
    {
        return (string) $this->id;
    }

    function __construct()
    {
        $this->payments = new ArrayCollection();
    }

    /**
     * Set city
     *
     * @param \Core\DirectoryBundle\Entity\City $city
     * @return CommonContragent
     */
    public function setCity(City $city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \Core\DirectoryBundle\Entity\City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set phone1
     *
     * @param integer $phone1
     * @return CommonContragent
     */
    public function setPhone1($phone1)
    {
        $this->phone1 = $phone1;

        return $this;
    }

    /**
     * Get phone1
     *
     * @return integer
     */
    public function getPhone1()
    {
        return $this->phone1;
    }

    /**
     * Set phone2
     *
     * @param integer $phone2
     * @return CommonContragent
     */
    public function setPhone2($phone2)
    {
        $this->phone2 = $phone2;

        return $this;
    }

    /**
     * Get phone2
     *
     * @return integer
     */
    public function getPhone2()
    {
        return $this->phone2;
    }

    /**
     * Set phone3
     *
     * @param integer $phone3
     * @return CommonContragent
     */
    public function setPhone3($phone3)
    {
        $this->phone3 = $phone3;

        return $this;
    }

    /**
     * Get phone3
     *
     * @return integer
     */
    public function getPhone3()
    {
        return $this->phone3;
    }

    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = $contactEmail;

        return $this;
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

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setUser($user = null)
    {
        $this->user = $user;

        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getCreatedDateTime()
    {
        return $this->createdDateTime;
    }

    public function getUpdatedDateTime()
    {
        return $this->updatedDateTime;
    }

    /**
     * Hook on pre-persist operations
     */
    public function prePersist()
    {
        $this->createdDateTime = new \DateTime;
        $this->updatedDateTime = new \DateTime;
    }

    /**
     * Hook on pre-update operations
     */
    public function preUpdate()
    {
        $this->updatedDateTime = new \DateTime;
    }

    public function setPayments($payments)
    {
        $this->payments = $payments;
        return $this;
    }

    public function getPayments()
    {
        return $this->payments;
    }

    public function addPayment($payment)
    {
        $payment->setCustomer($this);
        $this->payments->add($payment);
        return $this;
    }

    public function removePayment($payment)
    {
        $this->payments->removeElement($payment);
        return $this;
    }

    public function getManufacturerDiscounts()
    {
        return $this->manufacturerDiscounts;
    }

    public function setManufacturerDiscounts($manufacturerDiscounts)
    {
        $this->manufacturerDiscounts = $manufacturerDiscounts;
        return $this;
    }

//    public function getOrders()
//    {
//        return $this->orders;
//    }
//
//    public function setOrders($orders)
//    {
//        $this->orders = $orders;
//        return $this;
//    }

    /**
     * Дополнительные проверки
     */
    public function isValid(ExecutionContextInterface $context)
    {
        $phone = preg_replace('/[)(\+\-\s]+/','', $this->phone1);
        if (strlen($phone) > 12 || strlen($phone) < 10) {
            $context->buildViolation('Пожалуйста укажите правильное количество цифр')
                ->atPath('phone1')
                ->addViolation();
        }
    }

}
