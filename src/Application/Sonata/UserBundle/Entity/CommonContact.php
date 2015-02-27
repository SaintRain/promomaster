<?php
/**
 * Класс адресата для контрагента физ. типа
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Core\DirectoryBundle\Entity\City;


class CommonContact
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * Адрес
     * @var string
     */
    protected $address;

    /**
     * Контрагент
     * @var type 
     */
    protected $contragent;

    /**
     * Город
     * @var type 
     */
    protected $city;

    /**
     * Примечание
     * @var string
     */
    protected $mark;

    /**
     * Почтовый индекс
     * @var string
     */
    protected $postIndex;

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

    public function __toString()
    {
        return $this->getAddress();
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Address
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function getPostIndex()
    {
        return $this->postIndex;
    }

    public function setPostIndex($postIndex)
    {
        $this->postIndex = $postIndex;

        return $this;
    }

    public function getMark()
    {
        return $this->mark;
    }

    public function setMark($mark)
    {
        $this->mark = $mark;
        return $this;
    }

    /**
     * Преобразуем в JSON объект
     * @return json
     */
    public function getContact()
    {
        return json_encode($this);
    }
}
