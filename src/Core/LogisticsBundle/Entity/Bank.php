<?php

/**
 * Справочник банков
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Core\CommonBundle\Validator\Constraints as CommonAssert;    //дополнительные проверки
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="core_logistics_bank")
 * @ORM\Entity(repositoryClass="Core\LogisticsBundle\Entity\Repository\BankRepository")
 */
class Bank
{

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Название
     * @var string
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $caption;

    /**
     * Полное название
     * @var string
     * @ORM\Column(type="string",  length=255)
     * @Assert\NotBlank()
     */
    private $captionFull;

    /**
     * Номер лицензии
     * @var string
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $license;

    /**
     * Лицензия аннулирована
     * @var string
     * @ORM\Column(type="boolean")
     */
    private $isLicenseCanceled;

    /**
     * Банковский идентификационный код
     * @var string
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $bic;

    /**
     * Сообщество всемирных межбанковских финансовых телекоммуникаций
     * @var string
     * @ORM\Column(type="string", length=11, nullable=true)
     */
    private $swift;
    

    /**
     * Кор. счет
     * @var string
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $correspondentAccount;

    /**
     * ОКПО
     * @ORM\Column(type="string", length=15, nullable=true)    
     */
    private $okpo;

    /**
     * Банк-родитель
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $parentBank;

    /**
     * Город
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * Адрес
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * Телефон(ы)
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     * CommonAssert\Phones
     */
    private $phones;

    /**
     * Сайт
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Url
     */
    private $site;

    /**
     * Email
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Email
     */
    private $email;

    /**
     * ID 1С-Бухгалтерия
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $idIn1c;

    public function getId()
    {
        return $this->id;
    }

    public function getCaption()
    {
        return $this->caption;
    }

    public function setCaption($caption)
    {
        $this->caption = $caption;
        return $this;
    }

    public function getCaptionFull()
    {
        return $this->captionFull;
    }

    public function setCaptionFull($captionFull)
    {
        $this->captionFull = $captionFull;
        return $this;
    }

    public function getLicense()
    {
        return $this->license;
    }

    public function setLicense($license)
    {
        $this->license = $license;
        return $this;
    }

    public function getIsLicenseCanceled()
    {
        return $this->isLicenseCanceled;
    }

    public function setIsLicenseCanceled($isLicenseCanceled)
    {
        $this->isLicenseCanceled = $isLicenseCanceled;
        return $this;
    }

    public function getBic()
    {
        return $this->bic;
    }

    public function setBic($bic)
    {
        $this->bic = $bic;
        return $this;
    }

    public function getSwift()
    {
        return $this->swift;
    }

    public function setSwift($swift)
    {
        $this->swift = $swift;
        return $this;
    }

    public function getCorrespondentAccount()
    {
        return $this->correspondentAccount;
    }

    public function setCorrespondentAccount($correspondentAccount)
    {
        $this->correspondentAccount = $correspondentAccount;
        return $this;
    }

    public function getOkpo()
    {
        return $this->okpo;
    }

    public function setOkpo($okpo)
    {
        $this->okpo = $okpo;
        return $this;
    }

    public function getParentBank()
    {
        return $this->parentBank;
    }

    public function setParentBank($parentBank)
    {
        $this->parentBank = $parentBank;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    public function getPhones()
    {
        return $this->phones;
    }

    public function setPhones($phones)
    {
        $this->phones = $phones;
        return $this;
    }

    public function getSite()
    {
        return $this->site;
    }

    public function setSite($site)
    {
        $this->site = $site;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getIdIn1c()
    {
        return $this->idIn1c;
    }

    public function setIdIn1c($idIn1c)
    {
        $this->idIn1c = $idIn1c;
        return $this;
    }

}
