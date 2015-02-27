<?php

/**
 * Класс адресата для контрагента физ. типа
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Core\DirectoryBundle\Entity\City;
use Symfony\Component\Validator\ExecutionContextInterface;

class IndiContact extends CommonContact implements \JsonSerializable
{
    /**
     * @var IndiContragent
     */
    protected $contragent;

    /**
     * Контактный email
     * @var string
     */
    protected $contactEmail;

    /**
     * Конатктный телефон
     * @var string
     */
    protected $phone;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $surName;

    /**
     * @var string
     */
    protected $passport;

    public function getContragent()
    {
        return $this->contragent;
    }

    public function setContragent(IndiContragent $contragent = null)
    {
        $this->contragent = $contragent;

        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getSurName()
    {
        return $this->surName;
    }

    public function setSurName($surName)
    {
        $this->surName = $surName;
        return $this;
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

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * Set passport
     *
     * @param string $passport
     * @return IndiContragent
     */
    public function setPassport($passport)
    {
        $this->passport = ($passport) ? str_replace(' ', '', $passport) : NULL;

        return $this;
    }

    /**
     * Get passport
     *
     * @return string
     */
    public function getPassport()
    {
        return $this->passport;
    }

    public function jsonSerialize()
    {
        $answer = [];
        foreach($this as $fieldName =>  $val) {
            if (!is_object($val)) {
                $answer[$fieldName] = $val;
            }
            if ($val instanceof City) {
                $answer[$fieldName] = ['caption' => $val->getName(), 'id' => $val->getId()] ;
            }
        }

        $answer['fio'] = $this->getFio();
        
        return $answer;
    }

    /**
     * Полное название
     * @return string
     */
    public function getName()
    {
        return $this->lastName . ' ' . $this->firstName . ' ';
    }

    /**
     * Заголовок для выбора в селекте
     * @return type
     */
    public function getCaptionForSelect() {
        
        return $this->lastName . ' ' . $this->firstName . ' (' . $this->address . ')';
    }

    public function getFio()
    {
        return trim(sprintf('%s %s %s', $this->lastName, $this->firstName, $this->surName));
    }

    /**
     * Дополнительные проверки
     */
    public function isValid(ExecutionContextInterface $context)
    {
        $phone = preg_replace('/[)(\+\-\s]+/','', $this->phone);
        if (strlen($phone) > 12 || strlen($phone) < 10) {
            $context->buildViolation('Пожалуйста укажите правильное количество цифр')
                ->atPath('phone')
                ->addViolation();
        }
    }
}
