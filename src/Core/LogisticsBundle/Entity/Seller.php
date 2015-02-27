<?php

/**
 * Продавец
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Core\CommonBundle\Validator\Constraints as CommonAssert;    //дополнительные проверки
use Doctrine\Common\Collections\ArrayCollection;
use Core\OrderBundle\Entity\Waybills;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="core_logistics_seller")
 * @UniqueEntity("code")
 * @ORM\Entity(repositoryClass="Core\LogisticsBundle\Entity\Repository\SellerRepository")
 */
class Seller
{

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Организационно-правовая форма
     * @ORM\ManyToOne(targetEntity="Core\DirectoryBundle\Entity\LegalForm")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     * @Assert\NotBlank()
     */
    private $legalForm;

    /**
     * Название
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $caption;

    /**
     * ИНН
     * @ORM\Column(type="string", length=12, nullable=true)
     * @CommonAssert\INN()
     * @Assert\NotBlank()
     */
    private $inn;

    /**
     * КПП
     * @ORM\Column(type="string", length=9, nullable=true)
     * @CommonAssert\KPP()
     */
    private $kpp;

    /**
     * ОГРН
     * @ORM\Column(type="string", length=15, nullable=true)
     * @CommonAssert\OGRN()
     * @Assert\NotBlank()
     */
    private $ogrn;

    /**
     * ОКПО
     * @ORM\Column(type="string", length=15, nullable=true)
     * @Assert\NotBlank()
     */
    private $okpo;

    /**
     * Должность руководителя
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     */
    private $positionOfTheHead;

    /**
     * ФИО руководителя
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     */
    private $nameOfTheHead;

    /**
     * ФИО руководителя в родительном падеже
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     */
    private $nameOfTheHeadInGenitive;

    /**
     * Руководитель действует на основании
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $headActsUnder;

    /**
     * ФИО гл. бухгалтера
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     */
    private $nameOfTheAccountant;

    /**
     * ФИО гл. бухгалтера в род. падеже
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nameOfTheAccountantInGenitive;

    /**
     * Страна
     * @ORM\ManyToOne(targetEntity="Core\DirectoryBundle\Entity\Country")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     * @Assert\NotBlank()
     */
    private $country;

    /**
     * Город
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * Юр. адрес
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $addressUr;

    /**
     * Почтовый адрес
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $addressPost;

    /**
     * Не публиковать адрес в счетах (вместо него будет показан московкий адрес и телефон)
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $dontPublicAddressUr = false;

    /**
     * Телефон
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     * @CommonAssert\Phone
     */
    private $phone;

    /**
     * Факс
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     * @CommonAssert\Phone
     */
    private $fax;

    /**
     * Банк
     * @ORM\ManyToOne(targetEntity="Bank")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     * @Assert\NotBlank()
     */
    private $bank;

    /**
     * Р/с в банке
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     */
    private $paymentAccount;

    /**
     * К/с в банке
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     */
    private $corrAccount;

    /**
     * Работает с НДС
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isWorkingWithNds;

    /**
     * Список регионов и городов, в которых работает данный продавец.
     * @ORM\ManyToMany(targetEntity="RegionCity", cascade={"persist"}, inversedBy="seller")
     * @ORM\JoinTable(name="core_logistics_seller_match_regions",
     *          joinColumns={@ORM\JoinColumn(referencedColumnName="id", onDelete="cascade")},
     *          inverseJoinColumns={@ORM\JoinColumn(referencedColumnName="id", onDelete="cascade")})
     */
    private $regionsCityList;

    /**
     * Платёжные системы
     * ORM\OneToMany(targetEntity="", cascade={"persist"}, mappedBy="")
     */
    private $paymentSystems;

    /**
     * Параметры для dpd - аккаунт
     * @var string
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $dpdAccount;

    /**
     * Параметры для dpd - пароль
     * @var string
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $dpdPassword;

    /**
     * Параметры для CDEK - аккаунт
     * @var string
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $cdekAccount;

    /**
     * Параметры для CDEK - пароль
     * @var string
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $cdekPassword;

    /**
     * Параметры для Дел. Линий  - логин
     * @var string
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $dellineLogin;

    /**
     * Параметры для Дел. Линий  - пароль
     * @var string
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $dellinePassword;

    /**
     * Параметры для ПЭК  - логин
     * @var string
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $pekLogin;

    /**
     * Параметры для ПЭК  - пароль
     * @var string
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $pekPassword;

    /**
     * Параметры для Почты России - логин
     * @var string
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $postRuLogin;

    /**
     * Параметры для Почты России  - пароль
     * @var string
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $postRuPassword;

    /**
     * Параметры для EMS - номер договора
     * @var string
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $emsContractNumber;

    /**
     * ID 1С-Бухгалтерия
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $idIn1c;

    /**
     * Показывать в контактной форме
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isShowInContactForm = true;

    /**
     * Дефолтный продавец
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isDefault;

    /**
     * Подпись
     * @ORM\OneToOne(targetEntity="Core\FileBundle\Entity\ImageFile", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    private $imageSign;

    /**
     * Штамп
     * @ORM\OneToOne(targetEntity="Core\FileBundle\Entity\ImageFile", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    private $imageStamp;

    /**
     * Подпись+Штамп
     * @ORM\OneToOne(targetEntity="Core\FileBundle\Entity\ImageFile", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    private $imageSignAndStamp;

    /**
     * Подпись бухгалтера
     * @ORM\OneToOne(targetEntity="Core\FileBundle\Entity\ImageFile", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    private $imageSignOfAccountant;

    /**
     * Габариты упаковок
     * @ORM\OneToMany(targetEntity="Core\OrderBundle\Entity\Waybills", cascade={"persist"},  mappedBy="salesMan", orphanRemoval=true)
     * @ORM\OrderBy({"indexPosition"="ASC"})
     */
    private $waybills;

    /**
     * Уникальный код продавца
     * @var string
     * @Gedmo\Slug(fields={"caption"}, updatable=true, unique=true, separator="-")
     * @ORM\Column(type="string", unique=true, length=255)
     */
    private $code;

    public function __construct()
    {
        $this->regionsCityList = new ArrayCollection();
        $this->waybills = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getCaption();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLegalForm()
    {
        return $this->legalForm;
    }

    public function setLegalForm($legalForm)
    {
        $this->legalForm = $legalForm;
        return $this;
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

    public function getInn()
    {
        return $this->inn;
    }

    public function setInn($inn)
    {
        $this->inn = $inn;
        return $this;
    }

    public function getKpp()
    {
        return $this->kpp;
    }

    public function setKpp($kpp)
    {
        $this->kpp = $kpp;
        return $this;
    }

    public function getOgrn()
    {
        return $this->ogrn;
    }

    public function setOgrn($ogrn)
    {
        $this->ogrn = $ogrn;
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

    public function getPositionOfTheHead()
    {
        return $this->positionOfTheHead;
    }

    public function setPositionOfTheHead($positionOfTheHead)
    {
        $this->positionOfTheHead = $positionOfTheHead;
        return $this;
    }

    public function getNameOfTheHead()
    {
        return $this->nameOfTheHead;
    }

    public function setNameOfTheHead($nameOfTheHead)
    {
        $this->nameOfTheHead = $nameOfTheHead;
        return $this;
    }

    public function getNameOfTheHeadInGenitive()
    {
        return $this->nameOfTheHeadInGenitive;
    }

    public function setNameOfTheHeadInGenitive($nameOfTheHeadInGenitive)
    {
        $this->nameOfTheHeadInGenitive = $nameOfTheHeadInGenitive;
        return $this;
    }

    public function getHeadActsUnder()
    {
        return $this->headActsUnder;
    }

    public function setHeadActsUnder($headActsUnder)
    {
        $this->headActsUnder = $headActsUnder;
        return $this;
    }

    public function getNameOfTheAccountant()
    {
        return $this->nameOfTheAccountant;
    }

    public function setNameOfTheAccountant($nameOfTheAccountant)
    {
        $this->nameOfTheAccountant = $nameOfTheAccountant;
        return $this;
    }

    public function getNameOfTheAccountantInGenitive()
    {
        return $this->nameOfTheAccountantInGenitive;
    }

    public function setNameOfTheAccountantInGenitive($nameOfTheAccountantInGenitive)
    {
        $this->nameOfTheAccountantInGenitive = $nameOfTheAccountantInGenitive;
        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
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

    public function getAddressUr()
    {
        return $this->addressUr;
    }

    public function setAddressUr($addressUr)
    {
        $this->addressUr = $addressUr;
        return $this;
    }

    public function getAddressPost()
    {
        return $this->addressPost;
    }

    public function setAddressPost($addressPost)
    {
        $this->addressPost = $addressPost;
        return $this;
    }

    public function getDontPublicAddressUr()
    {
        return $this->dontPublicAddressUr;
    }

    public function setDontPublicAddressUr($dontPublicAddressUr)
    {
        $this->dontPublicAddressUr = $dontPublicAddressUr;
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

    public function getFax()
    {
        return $this->fax;
    }

    public function setFax($fax)
    {
        $this->fax = $fax;
        return $this;
    }

    public function getBank()
    {
        return $this->bank;
    }

    public function setBank($bank)
    {
        $this->bank = $bank;
        return $this;
    }

    public function getPaymentAccount()
    {
        return $this->paymentAccount;
    }

    public function setPaymentAccount($paymentAccount)
    {
        $this->paymentAccount = $paymentAccount;
        return $this;
    }

    public function getCorrAccount()
    {
        return $this->corrAccount;
    }

    public function setCorrAccount($corrAccount)
    {
        $this->corrAccount = $corrAccount;
        return $this;
    }

    public function getIsWorkingWithNds()
    {
        return $this->isWorkingWithNds;
    }

    public function setIsWorkingWithNds($isWorkingWithNds)
    {
        $this->isWorkingWithNds = $isWorkingWithNds;
        return $this;
    }

    public function getRegionsCityList()
    {
        return $this->regionsCityList;
    }

    public function setRegionsCityList($regionsCityList)
    {
        $this->regionsCityList = $regionsCityList;
        return $this;
    }

    public function addRegionsCityList($regionsCityList)
    {
        $regionsCityList->setSeller($this);
        $this->regionsCityList->add($regionsCityList);
        return $this;
    }

    public function removeRegionsCityList($regionsCityList)
    {
        $this->regionsCityList->remove($regionsCityList);
        return $this;
    }

    public function getPaymentSystems()
    {
        return $this->paymentSystems;
    }

    public function setPaymentSystems($paymentSystems)
    {
        $this->paymentSystems = $paymentSystems;
        return $this;
    }

    public function getDpdAccount()
    {
        return $this->dpdAccount;
    }

    public function setDpdAccount($dpdAccount)
    {
        $this->dpdAccount = $dpdAccount;
        return $this;
    }

    public function getDpdPassword()
    {
        return $this->dpdPassword;
    }

    public function setDpdPassword($dpdPassword)
    {
        $this->dpdPassword = $dpdPassword;
        return $this;
    }

    public function getCdekAccount()
    {
        return $this->cdekAccount;
    }

    public function setCdekAccount($cdekAccount)
    {
        $this->cdekAccount = $cdekAccount;
        return $this;
    }

    public function getCdekPassword()
    {
        return $this->cdekPassword;
    }

    public function setCdekPassword($cdekPassword)
    {
        $this->cdekPassword = $cdekPassword;
        return $this;
    }

    public function getDellineLogin()
    {
        return $this->dellineLogin;
    }

    public function setDellineLogin($dellineLogin)
    {
        $this->dellineLogin = $dellineLogin;
        return $this;
    }

    public function getDellinePassword()
    {
        return $this->dellinePassword;
    }

    public function setDellinePassword($dellinePassword)
    {
        $this->dellinePassword = $dellinePassword;
        return $this;
    }

    public function getPekLogin()
    {
        return $this->pekLogin;
    }

    public function setPekLogin($pekLogin)
    {
        $this->pekLogin = $pekLogin;

        return $this;
    }

    public function getPostRuLogin()
    {
        return $this->postRuLogin;
    }

    public function getPostRuPassword()
    {
        return $this->postRuPassword;
    }

    public function setPostRuLogin($postRuLogin)
    {
        $this->postRuLogin = $postRuLogin;
        return $this;
    }

    public function setPostRuPassword($postRuPassword)
    {
        $this->postRuPassword = $postRuPassword;

        return $this;
    }


    public function getPekPassword()
    {
        return $this->pekPassword;
    }

    public function setPekPassword($pekPassword)
    {
        $this->pekPassword = $pekPassword;

        return $this;
    }


    public function getEmsContractNumber()
    {
        return $this->emsContractNumber;
    }

    public function setEmsContractNumber($emsContractNumber)
    {
        $this->emsContractNumber = $emsContractNumber;
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

    public function getIsShowInContactForm()
    {
        return $this->isShowInContactForm;
    }

    public function setIsShowInContactForm($isShowInContactForm)
    {
        $this->isShowInContactForm = $isShowInContactForm;
        return $this;
    }

    public function getIsDefault()
    {
        return $this->isDefault;
    }

    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;
        return $this;
    }

    public function getImageSign()
    {
        return [$this->imageSign];
    }

    public function setImageSign($imageSign)
    {
        $this->imageSign = $imageSign;
        return $this;
    }

    public function addImageSign($imageSign)
    {
        $this->imageSign = $imageSign;
        return $this;
    }

    public function removeImageSign($imageSign)
    {
        $this->imageSign = null;
        return $this;
    }

    public function getImageStamp()
    {
        return [$this->imageStamp];
    }

    public function setImageStamp($imageStamp)
    {
        $this->imageStamp = $imageStamp;
        return $this;
    }

    public function addImageStamp($imageStamp)
    {
        $this->imageStamp = $imageStamp;
        return $this;
    }

    public function removeImageStamp($imageStamp)
    {
        $this->imageStamp = null;
        return $this;
    }

    public function getImageSignAndStamp()
    {
        return [$this->imageSignAndStamp];
    }

    public function setImageSignAndStamp($imageSignAndStamp)
    {
        $this->imageSignAndStamp = $imageSignAndStamp;
        return $this;
    }

    public function addImageSignAndStamp($imageSignAndStamp)
    {
        $this->imageSignAndStamp = $imageSignAndStamp;
        return $this;
    }

    public function removeImageSignAndStamp($imageSignAndStamp)
    {
        $this->imageSignAndStamp = null;
        return $this;
    }

    public function getImageSignOfAccountant()
    {
        return [$this->imageSignOfAccountant];
    }

    public function setImageSignOfAccountant($imageSignOfAccountant)
    {
        $this->imageSignOfAccountant = $imageSignOfAccountant;
        return $this;
    }

    public function addImageSignOfAccountant($imageSignOfAccountant)
    {
        $this->imageSignOfAccountant = $imageSignOfAccountant;
        return $this;
    }

    public function removeImageSignOfAccountant($imageSignOfAccountant)
    {
        $this->imageSignOfAccountant = null;
        return $this;
    }

    public function getWaybills()
    {
        return $this->waybills;
    }

    public function setWaybills($waybills)
    {
        $this->waybills = $waybills;
        return $this;
    }

    public function addWaybill(Waybills $waybill)
    {
        if (!$this->waybills->contains($waybill)) {
            $this->waybills->add($waybill);
            $waybill->setOrder($this);
        }

        return $this;
    }

    public function removeWaybill($waybill)
    {
        $this->waybills->removeElement($waybill);
        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }
}
