<?php
/**
 * Базовый класс производителей
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ManufacturerBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
//подключаем языки
use Core\CommonBundle\TranslatableProperties\Caption;
use Core\CommonBundle\TranslatableProperties\Description;
use Core\CommonBundle\TranslatableProperties\Title;
use Core\CommonBundle\TranslatableProperties\Metakeywords;
use Core\CommonBundle\TranslatableProperties\Metadescription;
use Symfony\Component\Validator\ExecutionContextInterface;

/**
 * @ORM\Table(name="core_manufacturer")
 * @ORM\Entity(repositoryClass="Core\ManufacturerBundle\Entity\Repository\ManufacturerRepository")
 */
class Manufacturer
{

    use Caption,
        Description,
        Title,
        Metakeywords,
        Metadescription;
    /**
     * Первичный ключ
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Транслитерация Friendly URL
     * @var string
     * @Gedmo\Slug(fields={"captionRu"}, updatable=false, unique=true, separator="-")
     * @ORM\Column(type="string", length=300)
     */
    private $slug;

    /**
     * Год основания
     * @var text
     * @ORM\Column(type="smallint", nullable=true, length=4)
     */
    private $yearOfFoundation;

    /**
     * Директор (президент) компании
     * @var string
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $president;

    /**
     * Страна
     * @ORM\ManyToOne(targetEntity="Core\DirectoryBundle\Entity\Country")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $country;

    /**
     * Адрес штабквартиры
     * @var string
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $headquartersAddress;

    /**
     * Ссылка расположения штаб квартиры на google картах
     * @var string
     * @ORM\Column(type="string", length=250, nullable=true)
     * @Assert\Url()
     */
    private $headquartersAddressGoogleMapsLink;

    /**
     * Ссылка расположения штаб квартиры на yandex картах
     * @var string
     * @ORM\Column(type="string", length=250, nullable=true)
     * @Assert\Url()
     */
    private $headquartersAddressYandexMapsLink;

    /**
     * Email основной
     * @var string
     * @ORM\Column(type="string", length=250, nullable=true)
     * @Assert\Email()
     */
    private $email;

    /**
     * Служба тех. поддержки
     * @var string
     * @ORM\Column(type="string", length=250, nullable=true)
     * @Assert\Email()
     */
    private $emailSupport;

    /**
     * Сайт
     * @var string
     * @ORM\Column(type="string", length=250, nullable=true)
     * @Assert\Url()
     */
    private $urlSite;

    /**
     * Сайт (Сервис. центра)
     * @var string
     * @ORM\Column(type="string", length=250, nullable=true)
     * @Assert\Url()
     */
    private $urlServiceCenter;

    /**
     * Сайт (Служба тех. поддержки)
     * @var string
     * @ORM\Column(type="string", length=250, nullable=true)
     * @Assert\Url()
     */
    private $urlSupport;

    /**
     * Телефон (Отдел продаж)
     * @var string
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $phoneSalesDepartment;

    /**
     * Телефон (Служба поддержки)
     * @var string
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $phoneSupport;

    /**
     * Время создания
     * @var datetime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdDateTime;

    /**
     * Индекс позиции сортировки
     * @var bigint
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $indexPosition;

    /**
     * Логотип
     * @ORM\OneToOne(targetEntity="Core\FileBundle\Entity\ImageFile", cascade={"persist"})
     * @ORM\JoinColumn(name="logo_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $logo;

    /**
     * Сертификаты
     * @ORM\OneToMany(targetEntity="Certificate", mappedBy="manufacturer", cascade={"persist"})
     */
    private $certificates;

    /**
     * Скидки для производителей
     * @ORM\ManyToMany(targetEntity="Core\DiscountsBundle\Entity\ManufacturerDiscount", mappedBy="manufacturers")
     */
    private $manufacturerDiscounts;

    /**
     * Бренды
     * @ORM\OneToMany(targetEntity="Brand", cascade={"persist"}, orphanRemoval=true,  mappedBy="manufacturer")
     * @ORM\OrderBy({"indexPosition"="ASC"})
     */
    private $brandList;

    /**
     * @ORM\OneToMany(targetEntity="Core\ProductBundle\Entity\CommonProduct", cascade={"persist"},  mappedBy="manufacturerMain")
     */
    private $products;

    /**
     * Активность бренда
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isEnabled = true;

    /**
     * Может ли продукты данного производителя быть включены в YML. Этот флаг не последний в определении
     * будут ли продукты находится в YML-каталоге
     * @var string
     * @ORM\Column(type="boolean", nullable=true, options={"default" = true})
     */
    private $isCanBeInYml = true;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->certificates = new ArrayCollection();
        $this->brandList = new ArrayCollection();

    }

    public function getId()
    {
        return $this->id;
    }

    public function getCaptionRu()
    {
        return $this->captionRu;
    }

    public function setCaptionRu($captionRu)
    {
        $this->captionRu = $captionRu;
        return $this;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    public function getDescriptionRu()
    {
        return $this->descriptionRu;
    }

    public function setDescriptionRu($descriptionRu)
    {
        $this->descriptionRu = $descriptionRu;
        return $this;
    }

    public function getYearOfFoundation()
    {
        return $this->yearOfFoundation;
    }

    public function setYearOfFoundation($yearOfFoundation)
    {
        $this->yearOfFoundation = $yearOfFoundation;
        return $this;
    }

    public function getPresident()
    {
        return $this->president;
    }

    public function setPresident($president)
    {
        $this->president = $president;
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

    public function getHeadquartersAddress()
    {
        return $this->headquartersAddress;
    }

    public function setHeadquartersAddress($headquartersAddress)
    {
        $this->headquartersAddress = $headquartersAddress;
        return $this;
    }

    public function getHeadquartersAddressGoogleMapsLink()
    {
        return $this->headquartersAddressGoogleMapsLink;
    }

    public function setHeadquartersAddressGoogleMapsLink($headquartersAddressGoogleMapsLink)
    {
        $this->headquartersAddressGoogleMapsLink = $headquartersAddressGoogleMapsLink;
        return $this;
    }

    public function getHeadquartersAddressYandexMapsLink()
    {
        return $this->headquartersAddressYandexMapsLink;
    }

    public function setHeadquartersAddressYandexMapsLink($headquartersAddressYandexMapsLink)
    {
        $this->headquartersAddressYandexMapsLink = $headquartersAddressYandexMapsLink;
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

    public function getEmailSupport()
    {
        return $this->emailSupport;
    }

    public function setEmailSupport($emailSupport)
    {
        $this->emailSupport = $emailSupport;
        return $this;
    }

    public function getUrlSite()
    {
        return $this->urlSite;
    }

    public function setUrlSite($urlSite)
    {
        $this->urlSite = $urlSite;
        return $this;
    }

    public function getUrlServiceCenter()
    {
        return $this->urlServiceCenter;
    }

    public function setUrlServiceCenter($urlServiceCenter)
    {
        $this->urlServiceCenter = $urlServiceCenter;
        return $this;
    }

    public function getUrlSupport()
    {
        return $this->urlSupport;
    }

    public function setUrlSupport($urlSupport)
    {
        $this->urlSupport = $urlSupport;
        return $this;
    }

    public function getPhoneSalesDepartment()
    {
        return $this->phoneSalesDepartment;
    }

    public function setPhoneSalesDepartment($phoneSalesDepartment)
    {
        $this->phoneSalesDepartment = $phoneSalesDepartment;
        return $this;
    }

    public function getPhoneSupport()
    {
        return $this->phoneSupport;
    }

    public function setPhoneSupport($phoneSupport)
    {
        $this->phoneSupport = $phoneSupport;
        return $this;
    }

    public function getCreatedDateTime()
    {
        return $this->createdDateTime;
    }

    public function setCreatedDateTime($createdDateTime)
    {
        $this->createdDateTime = $createdDateTime;
        return $this;
    }

    public function getIndexPosition()
    {
        return $this->indexPosition;
    }

    public function setIndexPosition($indexPosition)
    {
        $this->indexPosition = $indexPosition;
        return $this;
    }

    public function getLogo()
    {
        return $this->logo ? [$this->logo] : null;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
        return $this;
    }

    public function addLogo($logo)
    {
        $this->logo = $logo;
        return $this;
    }

    public function removeLogo($logo)
    {
        $this->logo = null;
        return $this;
    }

    public function getCertificates()
    {
        return $this->certificates;
    }

    public function setCertificates($certificates)
    {
        $this->certificates = $certificates;
        return $this;
    }

    public function addCertificates($certificates)
    {
        $certificates->setManufacturer($this);
        $this->certificates->add($certificates);
        return $this;
    }

    public function removeCertificates($certificates)
    {
        $this->certificates->removeElement($certificates);
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

    public function getBrandList()
    {
        return $this->brandList;
    }

    public function setBrandList($brandList)
    {
        $this->brandList = $brandList;
        return $this;
    }

    public function addBrandList($brand)
    {
        $brand->setManufacturer($this);
        $this->brandList->add($brand);
        return $this;
    }

    public function removeBrandList($brand)
    {
        $this->brandList->removeElement($brand);
        return $this;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }

    public function addProducts($products)
    {
        $products->setManufacturerMain($this);
        $this->products->add($products);
        return $this;
    }

    public function removeProducts($products)
    {
        $this->products->removeElement($products);
        return $this;
    }

    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
        return $this;
    }



    /**
     * @return string
     */
    public function getIsCanBeInYml()
    {
        return $this->isCanBeInYml;
    }

    /**
     * @param string $isCanBeInYml
     * @return Manufacturer
     */
    public function setIsCanBeInYml($isCanBeInYml)
    {
        $this->isCanBeInYml = $isCanBeInYml;
        return $this;
    }


}