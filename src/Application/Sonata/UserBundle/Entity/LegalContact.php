<?php

/**
 * Класс адресата для контрагента юр. типа
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
namespace Application\Sonata\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Core\DirectoryBundle\Entity\City;

class LegalContact extends CommonContact implements \JsonSerializable
{
    /**
     * Названия организация
     * @var string
     */
    protected $organization;

    protected $contragent;

    public function getOrganization()
    {
        return $this->getContragent()->getOrganization();
    }

    public function getContragent()
    {
        return $this->contragent;
    }

    public function setContragent(LegalContragent $contragent = null)
    {
        $this->contragent = $contragent;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function jsonSerialize()
    {
        $answer = ['phone' => $this->getPhone()];
        foreach($this as $fieldName =>  $val) {
            if (!is_object($val)) {
                $answer[$fieldName] = $val;
            }
            if ($val instanceof City) {
                $answer[$fieldName] = ['caption' => $val->getName(), 'id' => $val->getId()] ;
            }
        }
        $answer['organization'] = $this->getOrganization();
        return $answer;
    }

    /**
     * Полное название
     * @return string
     */
    public function getName()
    {
        return $this->getContragent()->getOrganization();
    }

    public function getContactEmail()
    {
        return $this->getContragent()->getContactEmail();
    }

    public function getPhone()
    {
        return $this->getContragent()->getPhone1();
    }
    /**
     * Заголовок для выбора в селекте
     * @return type
     */
    public function getCaptionForSelect() {

        return $this->address;
    }
}
