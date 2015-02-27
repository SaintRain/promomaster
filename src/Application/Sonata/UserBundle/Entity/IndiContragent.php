<?php

/**
 * Класс контрагентов физического типа
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * IndiContragent
 */
class IndiContragent extends CommonContragent
{

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $surName;

    /**
     * Адресаты
     * @var \Application\Sonata\UserBundle\Entity\IndiContact
     */
    protected $contactList;

    public function __construct()
    {
        parent::__construct();
        $this->contactList = new ArrayCollection();
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return IndiContragent
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return IndiContragent
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set surName
     *
     * @param string $surName
     * @return IndiContragent
     */
    public function setSurName($surName)
    {
        $this->surName = $surName;

        return $this;
    }

    /**
     * Get surName
     *
     * @return string 
     */
    public function getSurName()
    {
        return $this->surName;
    }

    /**
     * Имя для админки
     */
    public function getListName()
    {
        if (!$this->getLastName() || !$this->getFirstName()) {
            return false;
        }
        return $this->getLastName() . ' ' . $this->getFirstName();
    }

    /**
     * Котнактное лицо для доставки
     * ФИО
     * @return type
     */
    public function getContactFio()
    {
        return $this->getLastName() . ' ' . $this->getFirstName() . ' ' . $this->getSurName();
    }

    public function getContactList()
    {
        return $this->contactList;
    }

    /**
     *
     * @param type $contactList
     * @return \Application\Sonata\UserBundle\Entity\CommonContragent
     */
    public function setContactList($contactList)
    {
        $this->contactList = $contactList;
        return $this;
    }

    /**
     *
     * @param \Application\Sonata\UserBundle\Entity\IndiContact $contact
     * @return \Application\Sonata\UserBundle\Entity\CommonContragent
     */
    public function addContactList(IndiContact $contact)
    {
        if (!$this->contactList->contains($contact)) {
            $contact->setContragent($this);
            $this->contactList->add($contact);
        }
        return $this;
    }

    /**
     *
     * @param \Application\Sonata\UserBundle\Entity\IndiContact $contact
     * @return \Application\Sonata\UserBundle\Entity\CommonContragent
     */
    public function removeContactList(IndiContact $contact)
    {

        $this->contactList->removeElement($contact);

        return $this;
    }
}
