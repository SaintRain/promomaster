<?php
/**
 * Базовый класс товара
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\ExecutionContextInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Core\ProductBundle\Entity\Product;
use Core\ProductBundle\Entity\CompositeProduct;
use Doctrine\Common\Collections\ArrayCollection;
use Core\PropertyBundle\Entity\ProductDataProperty;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Core\ProductBundle\Entity\CommonProductModification;
use Core\DirectoryBundle\Entity\RemoteVideo;
use Core\CategoryBundle\Entity\ProductVirtualCategory;
//подключаем языки
use Core\CommonBundle\TranslatableProperties\Caption;
use Core\CommonBundle\TranslatableProperties\ShortDescription;
use Core\CommonBundle\TranslatableProperties\Description;
use Core\CommonBundle\TranslatableProperties\Complectation;
use Core\CommonBundle\TranslatableProperties\Slogan;
use Core\CommonBundle\TranslatableProperties\Title;
use Core\CommonBundle\TranslatableProperties\Metakeywords;
use Core\CommonBundle\TranslatableProperties\Metadescription;
use Core\CommonBundle\TranslatableProperties\CaptionCase;
use Core\ProductBundle\Entity\Traits\PhysicalProperties;

/**
 *
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"Product"="Product", "ServiceProduct"="ServiceProduct" , "CompositeProduct"="CompositeProduct", "DigitalProduct"="DigitalProduct"})
 * @ORM\Table(name="core_product_common", indexes={@ORM\Index(name="search_idx", columns={"isEnabled", "slug"}), @ORM\Index(name="sku", columns={"sku"})}))
 * @ORM\Entity(repositoryClass="Core\ProductBundle\Entity\Repository\CommonProductRepository")
 * UniqueEntity("article")
 * @UniqueEntity("slug")
 * @ORM\HasLifecycleCallbacks()
 * @Assert\Callback(methods={"isValidCommon"})
 */
class CommonProduct
{

    use Caption,
        ShortDescription,
        Description,
        Complectation,
        Slogan,
        Title,
        Metakeywords,
        Metadescription,
        CaptionCase,
        PhysicalProperties; //физические характеристики;
    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Основная категория
     * @ORM\ManyToOne(targetEntity="Core\CategoryBundle\Entity\ProductCategory", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    private $categoryMain;

    /**
     * Категории в которых находится продукт
     * @ORM\ManyToMany(targetEntity="Core\CategoryBundle\Entity\ProductCategory", cascade={"persist"}, inversedBy="products",  fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="core_product_match_categories")
     * @Assert\NotBlank()
     */
    private $categories;

    /**
     * Индекс позиции сортировки
     * @var int
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $indexPosition;

    /**
     * Индекс позиции сортировки для модификация
     * @var int
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $indexPositionModification;

    /**
     * Время создания
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdDateTime;

    /**
     * Активность товара
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $isEnabled = true;

    /**
     * Лучший, предпочтительный товар. Может использоваться для вывода на главную и проч.
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $isBest = false;

    /**
     * Снят с производства
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $isDiscontinued = false;

    /**
     * Артикул товара, также может использаваться как индетифицирующий ключ
     * @var string
     * @ORM\Column(type="string",  length=255, nullable=true)
     * ORM\Column(type="string", unique=true, length=255)
     * Assert\NotBlank()
     */
    private $article;

    /**
     * SKU  производителя
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     */
    private $sku;

    /**
     * Штрихкод
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $barcode;

    /**
     * Цена
     * @var decimal
     * @ORM\Column(type="decimal", scale=2, nullable=false)
     * @Assert\NotBlank()
     */
    private $price = 0;

    /**
     * Старая цена
     * @var decimal
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    private $oldPrice;

    /**
     * Производители
     * @ORM\ManyToMany(targetEntity="Core\ManufacturerBundle\Entity\Manufacturer", cascade={"persist"})
     * @ORM\JoinTable(name="core_product_match_manufacturers")
     * @Assert\NotBlank()
     */
    private $manufacturers;

    /**
     * Основной производитель. Нужен для SEO и статистики
     * @ORM\ManyToOne(targetEntity="Core\ManufacturerBundle\Entity\Manufacturer", cascade={"persist"}, inversedBy="products")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     * @Assert\NotBlank()
     */
    private $manufacturerMain;

    /**
     * Бренд
     * @ORM\ManyToOne(targetEntity="Core\ManufacturerBundle\Entity\Brand", cascade={"persist"}, inversedBy="products")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     * Assert\NotBlank()
     */
    private $brand;

    /**
     * Значения характеристик
     * @var array collection
     * @ORM\OneToMany(targetEntity="Core\PropertyBundle\Entity\ProductDataProperty", cascade={"persist"}, orphanRemoval=true, mappedBy="product")
     */
    private $productDataProperty;

    /**
     * Группа/объединение модификаций в которую входит продукт
     * @ORM\ManyToOne(targetEntity="CommonProductModification", cascade={"persist"},  inversedBy="dataList")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    private $modificationUnion;

    /**
     * Товары заменители, в пределах одного производителя
     * @ORM\OneToMany(targetEntity="Core\UnionBundle\Entity\ProductSimilarsUnion", cascade={"persist"}, mappedBy="mappedObject")
     */
    private $similars;

    /**
     * Аксессуары
     * @ORM\OneToMany(targetEntity="Core\UnionBundle\Entity\ProductAccessoriesUnion", cascade={"persist"}, mappedBy="mappedObject")
     */
    private $accessories;

    /**
     * Дополнительные услуги
     * @ORM\OneToMany(targetEntity="Core\UnionBundle\Entity\ProductServicesUnion", cascade={"persist"}, mappedBy="mappedObject")
     */
    private $services;

    /**
     * Альтернтивные товары. Похожие по техническим характеристикам
     * @ORM\OneToMany(targetEntity="Core\UnionBundle\Entity\ProductAlternativeUnion", cascade={"persist"}, mappedBy="mappedObject")
     */
    private $alternative;

    /**
     * Дополнительные изображения
     *
     * @ORM\ManyToMany(targetEntity="Core\FileBundle\Entity\ImageFile", cascade={"persist"})
     * @ORM\OrderBy({"indexPosition" = "ASC"})
     * @ORM\JoinTable(name="core_file_product_match_image")
     */
    private $images;

    /**
     * Транслитерация Friendly URL
     * @var string
     * @Gedmo\Slug(fields={"captionRu", "article"}, updatable=false, unique=true, separator="-")
     * Gedmo\Slug(fields={"captionRu"}, updatable=true, unique=true, separator="-")
     * @ORM\Column(type="string", unique=true, length=255)
     */
    private $slug;

    /**
     * Связь с таблицей Цвет
     * @ORM\ManyToOne(targetEntity="Core\ColorBundle\Entity\Color", inversedBy="products")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    private $color;

    /**
     * Цвет в формате HEX определенный автоматически или по клику на картинку
     * @var string
     * @ORM\Column(type="string", length=7, nullable=true)
     */
    private $colorOriginalCode;

    /**
     * Флаг показывающий, что цвет был выбран пользователем вручную
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isColorSelectedByUser = false;

    /**
     * Файлы инструкции
     * @ORM\ManyToMany(targetEntity="Core\FileBundle\Entity\DocumentFile", cascade={"persist"})
     * @ORM\OrderBy({"indexPosition" = "ASC"})
     * @ORM\JoinTable(name="core_file_product_match_document")
     */
    private $instruction;

    /**
     * Доступное количество товара для продажи по складам
     * @ORM\OneToMany(targetEntity="Core\LogisticsBundle\Entity\ProductAvailability", cascade={"persist"}, mappedBy="product")
     */
    private $productAvailability;

    /**
     * Количество серийников для этого товара. Если в коробке несколько устройств, то на каждое должен идти серийный номер
     * @ORM\Column(type="smallint")
     */
    private $serialsQuantity = 1;

    /**
     * Товарные позиции на складе
     * @ORM\OneToMany(targetEntity="Core\LogisticsBundle\Entity\UnitInStock", cascade={"persist"}, mappedBy="product", fetch="EXTRA_LAZY")
     */
    private $units;

    /**
     * Пользователи у которых товар находится в избранном
     *
     * @ORM\OneToMany(targetEntity="Core\UnionBundle\Entity\UserProductFavoriteUnion", cascade={"persist"}, mappedBy="mappedObject")
     * @ ORM\ManyToMany(targetEntity="Application\Sonata\UserBundle\Entity\User", cascade={"persist"}, mappedBy="favoriteProducts")
     */
    private $favoriteUsers;

    /**
     * Пользователи у которых товар находится в избранном
     *
     * @ORM\OneToMany(targetEntity="Core\UnionBundle\Entity\UserProductHistoryUnion", cascade={"persist"}, mappedBy="mappedObject")
     * @ ORM\ManyToMany(targetEntity="Application\Sonata\UserBundle\Entity\User", cascade={"persist"}, mappedBy="favoriteProducts")
     */
    private $historyUsers;

    /**
     * Флаг, определяющий что у товара не может быть серийников (провада, мелочь всякая). Также, возможно, составлные товары без серийников.
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isNoSerials;

    /**
     * Гарантия на продукт в месяцах
     * @ORM\Column(type="integer", nullable=true)
     */
    private $warrantyMonths;

    /**
     * Количественные альтернативы
     * @ORM\OneToMany(targetEntity="Core\UnionBundle\Entity\ProductQuantityAlternativeUnion", cascade={"persist"}, mappedBy="mappedObject")
     */
    private $quantityAlternative;

    /**
     * Количество кусков/частей в продукте (в упаковке может быть 100 болтов, или в бухте 200 метров).
     * Используется для количественных алтернатив
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantityOfPieces;

    /**
     * Единица измерения продукта (шт., метры и т.д.)
     * @ORM\ManyToOne(targetEntity="Core\DirectoryBundle\Entity\UnitOfMeasure", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     * @Assert\NotBlank()
     */
    private $unitOfMeasure;

    /**
     * Теги
     * @ORM\OneToMany(targetEntity="Core\DirectoryBundle\Entity\ProductTags", cascade={"persist"}, orphanRemoval=true, mappedBy="product")
     */
    private $productTags;

    /**
     * Серия к которой относится продукт
     * @ORM\ManyToOne(targetEntity="Core\ManufacturerBundle\Entity\Series", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $serie;

    /**
     * Отзывы пользователей
     * @ORM\OneToMany(targetEntity="Core\ReviewBundle\Entity\Review", mappedBy="product", cascade={"persist", "merge", "refresh","detach"}, orphanRemoval=true)
     * @ORM\OrderBy({"createdAt" = "DESC"})
     */
    protected $reviews;

    /**
     * Оценка товара по его отзывам
     * @var integer
     * @ORM\Column(type="decimal", scale=1, nullable=true)
     */
    protected $reviewsRating;

    /**
     * Кол-во отзывов
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $reviewsCount;

    /**
     * @ORM\ManyToMany(targetEntity="Core\DirectoryBundle\Entity\RemoteVideo", cascade={"persist"})
     * @ORM\JoinTable(name="core_product_match_remote_video",
     *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="remotevideo_id", referencedColumnName="id")}
     *      )
     */
    protected $remoteVideos;

    /**
     * Виртульные категории
     * @ORM\ManyToMany(targetEntity="Core\CategoryBundle\Entity\ProductVirtualCategory", cascade={"persist"}, inversedBy="products")
     * @ORM\JoinTable(name="core_product_match_category_virtual",
     *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="product_category_virtual_id", referencedColumnName="id")}
     *      )
     */
    protected $virtualCategoryList;

    /**
     * Страна происхождения
     * @ORM\ManyToOne(targetEntity="Core\DirectoryBundle\Entity\Country")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $countryOfOrigin;

    /**
     * Используется для SEO, для генерации YML-файлов
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typePrefix;

    /**
     * Композиции в которых находится товар
     * @ORM\OneToMany(targetEntity="Core\OrderBundle\Entity\Composition", mappedBy="product", fetch="LAZY")
     */
    private $inOrderCompositions;

    /**
     * Флаг отвечающий за отображение товара на сайте
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isVisible = true;

    /**
     * Тикеты
     * @ORM\OneToMany(targetEntity="Core\TroubleTicketBundle\Entity\TroubleTicket", cascade={"persist"}, mappedBy="product")
     */
    private $tickets;

    /**
     * Только под заказ
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $orderOnly;

    /**
     * Цена закупки
     * @var decimal
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    private $orderOnlyPriceBuying = 0;

    /**
     * Валюта для цены закупки
     * @ORM\ManyToOne(targetEntity="Core\DirectoryBundle\Entity\Currency")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $OOPBCurrency;

    /**
     * Надбавка для курса вылюты
     * @var decimal
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    private $OOPBCurrencyRateAdditive = 2;

    /**
     * Если выставлено, значит надбавка для курса валюты считается в процентах
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isOOPBCurrencyRateAdditiveInPercent = true;

    /**
     * МРЦ - минимальная рознична цена.
     * @var decimal
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    private $mrc;

    /**
     * Аквтино ли МРЦ
     * @var boolean
     * @ORM\Column(type="boolean",  nullable=true)
     */
    private $isMrcEnabled;

    /**
     * Остаток товара у заказчика
     * @var int
     * @ORM\Column(type="integer",  options={"default" = 0})
     */
    private $OOPBQuantity = 0;

    /**
     * Дата последнего обновления остатка
     * @var int
     * @ORM\Column(type="datetime",  nullable=true)
     * @Gedmo\Timestampable(on="change", field={"OOPBQuantity"})
     */
    private $OOPBQuantityUpdated;

    /**
     * Наценка инет-магазина
     * @var decimal
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    private $orderOnlyShopTax = 0;

    /**
     * Если выставлено, значит наценка магазина считается в процентах
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $orderOnlyShopTaxInPercent;

    /**
     * Срок поставки товара в днях, если товар под заказ
     * @var int
     * @ORM\Column(type="smallint",  options={"default" = 1})
     */
    private $deliveryDays = 1;

    /**
     * Поставщик
     * @ORM\ManyToOne(targetEntity="Core\LogisticsBundle\Entity\Supplier", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    private $supplier;

    /**
     * Отправлять запрос на обновление описания яндекс-маркету
     * http://api.yandex.ru/webmaster/doc/dg/reference/host-original-texts-add.xml
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true, options={"default" = true})
     */
    private $isDescriptionSendToYandex = true;

    /**
     * Название для YML
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ymlCaption;

    /**
     * Может ли продукт быть включен в YML. Этот флаг не последний в определении
     * будет ли продукт находится в YML-каталоге
     * @var string
     * @ORM\Column(type="boolean", nullable=true, options={"default" = true})
     */
    private $isCanBeInYml = true;


    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->productDataProperty = new ArrayCollection();
        $this->accessories = new ArrayCollection();
        $this->similars = new ArrayCollection();
        $this->alternative = new ArrayCollection();
        $this->manufacturers = new ArrayCollection();
        $this->instruction = new ArrayCollection();
        $this->services = new ArrayCollection();
        $this->productAvailability = new ArrayCollection();
        $this->units = new ArrayCollection();
        $this->favoriteUsers = new ArrayCollection();
        $this->historyUsers = new ArrayCollection();
        $this->quantityAlternative = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->productTags = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->remoteVideos = new ArrayCollection();
        $this->inOrderCompositions = new ArrayCollection();
        $this->virtualCategoryList = new ArrayCollection();
        $this->tickets = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getCategoryMain()
    {
        return $this->categoryMain;
    }

    public function setCategoryMain($categoryMain)
    {
        $this->categoryMain = $categoryMain;
        return $this;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;
        return $this;
    }

//   public function addCategorie($categorie) {
//        $productDataProperty->setProduct($this);
//        $this->productDataProperty->add($productDataProperty);
//        return $this;
//    }
//
//    public function removeCategorie(ProductDataProperty $productDataProperty) {
//        $this->getProductDataProperty()->removeElement($productDataProperty);
//        return $this;
//    }

    public function getIndexPosition()
    {
        return $this->indexPosition;
    }

    public function setIndexPosition($indexPosition)
    {
        $this->indexPosition = $indexPosition;
        return $this;
    }

    public function getIndexPositionModification()
    {
        return $this->indexPositionModification;
    }

    public function setIndexPositionModification($indexPositionModification)
    {
        $this->indexPositionModification = $indexPositionModification;
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

    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
        return $this;
    }

    public function getIsBest()
    {
        return $this->isBest;
    }

    public function setIsBest($isBest)
    {
        $this->isBest = $isBest;
        return $this;
    }

    public function getIsDiscontinued()
    {
        return $this->isDiscontinued;
    }

    public function setIsDiscontinued($isDiscontinued)
    {
        $this->isDiscontinued = $isDiscontinued;
        return $this;
    }

    public function getArticle()
    {
        return $this->article;
    }

    public function setArticle($article)
    {
        $this->article = $article;
        return $this;
    }

    public function setSku($sku)
    {
        $this->sku = $sku;
        return $this;
    }

    public function getSku()
    {
        return $this->sku;
    }

    public function getPrice()
    {
        return (float)$this->price;
    }

    public function getBarcode()
    {
        $barcode = explode("\n", $this->barcode);
        return $barcode;
    }

    public function setBarcode($barcode)
    {
        if (is_array($barcode)) {
            $barcode = implode("\n", $barcode);
        }
        $this->barcode = $barcode;
        return $this;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function getOldPrice()
    {
        return (float)$this->oldPrice;
    }

    public function setOldPrice($oldPrice)
    {
        $this->oldPrice = $oldPrice;
        return $this;
    }

    public function getManufacturers()
    {
        return $this->manufacturers;
    }

    public function setManufacturers($manufacturers)
    {
        $this->manufacturers = $manufacturers;
        return $this;
    }

    public function getManufacturerMain()
    {
        return $this->manufacturerMain;
    }

    public function setManufacturerMain($manufacturerMain)
    {
        $this->manufacturerMain = $manufacturerMain;
        return $this;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
        return $this;
    }

    public function getProductDataProperty()
    {
        return $this->productDataProperty;
    }

    public function setProductDataProperty(ArrayCollection $productDataProperty)
    {
        $this->productDataProperty = $productDataProperty;
        return $this;
    }

    public function addProductDataProperty(ProductDataProperty $productDataProperty)
    {
        $productDataProperty->setProduct($this);
        $this->productDataProperty->add($productDataProperty);
        return $this;
    }

    public function removeProductDataProperty(ProductDataProperty $productDataProperty)
    {
        $this->getProductDataProperty()->removeElement($productDataProperty);
        return $this;
    }

    /**
     * По имени характеристики находит значение
     * @param type $property_key
     * @param type $data_key
     * @return type
     */
    public function getPDPByPropertyName($property_name)
    {
        foreach ($this->getProductDataProperty() as $pdp) {
            if ($pdp->getData()->getProperty()->getName() === $property_name) {
                return $pdp;
            }
        }
    }

    public function getModificationUnion()
    {
        if (!$this->modificationUnion) {
            $this->modificationUnion = new CommonProductModification();
        }
        return $this->modificationUnion;
    }

    public function setModificationUnion($modificationUnion)
    {
        $this->modificationUnion = $modificationUnion;
        return $this;
    }

    public function getSimilars()
    {
        return $this->similars;
    }

    public function setSimilars($similars)
    {
        $this->similars = $similars;
        return $this;
    }

    public function addSimilars($similars)
    {
        $this->similars->add($similars);
        return $this;
    }

    public function removeSimilars($similars)
    {
        $this->similars->removeElement($similars);
        return $this;
    }

    public function getAccessories()
    {
        return $this->accessories;
    }

    public function setAccessories($accessories)
    {
        $this->accessories = $accessories;
        return $this;
    }

    public function addAccessories($accessories)
    {
        $this->accessories->add($accessories);
        return $this;
    }

    public function removeAccessories($accessories)
    {
        $this->accessories->removeElement($accessories);
        return $this;
    }

    public function getServices()
    {
        return $this->services;
    }

    public function setServices($services)
    {
        $this->services = $services;
        return $this;
    }

    public function addServices($services)
    {
        $this->services->add($services);
        return $this;
    }

    public function removeServices($services)
    {
        $this->services->removeElement($services);
        return $this;
    }

    public function getAlternative()
    {
        return $this->alternative;
    }

    public function setAlternative($alternative)
    {
        $this->alternative = $alternative;
        return $this;
    }

    public function addAlternative($alternative)
    {
        $this->alternative->add($alternative);
        return $this;
    }

    public function removeAlternative($alternative)
    {
        $this->alternative->removeElement($alternative);
        return $this;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function setImages($images)
    {
        $this->images = $images;
        return $this;
    }

    public function addImages($images)
    {
        $this->images->add($images);
        return $this;
    }

    public function removeImages($images)
    {
        $this->images->removeElement($images);
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

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    public function getColorOriginalCode()
    {
        return $this->colorOriginalCode;
    }

    public function setColorOriginalCode($colorOriginalCode)
    {
        $this->colorOriginalCode = $colorOriginalCode;
        return $this;
    }

    public function getIsColorSelectedByUser()
    {
        return $this->isColorSelectedByUser;
    }

    public function setIsColorSelectedByUser($isColorSelectedByUser)
    {
        $this->isColorSelectedByUser = $isColorSelectedByUser;
        return $this;
    }

    public function getInstruction()
    {
        return $this->instruction;
    }

    public function setInstruction($instruction)
    {
        $this->instruction = $instruction;
        return $this;
    }

    public function addInstruction($instruction)
    {
        $this->instruction->add($instruction);
        return $this;
    }

    public function removeInstruction($instruction)
    {
        $this->instruction->removeElement($instruction);
        return $this;
    }

    public function getProductAvailability()
    {
        return $this->productAvailability;
    }

    public function setProductAvailability($productAvailability)
    {
        $this->productAvailability = $productAvailability;
        return $this;
    }

    public function addProductAvailability($productAvailability)
    {
        $this->productAvailability->add($productAvailability);
        return $this;
    }

    public function removeProductAvailability($productAvailability)
    {
        $this->productAvailability->removeElement($productAvailability);
        return $this;
    }

    /**
     * Считает общее количество позиций товара доступного для продажи
     * @return int
     */
    public function getAvailabilityQuantity()
    {
        $total = 0;
        if (!$this->getOrderOnly()) {
            foreach ($this->getProductAvailability() as $pa) {
                $total += $pa->getQuantity();
            }
        } else {
            $total = $this->getOOPBQuantity();
        }
        return $total;
    }

    /**
     * Считает общее количество реальных позиций товара доступного для продажи, которые лежат на складе
     * @return int
     */
    public function getAvailabilityQuantityReal()
    {
        $total = 0;
        foreach ($this->getProductAvailability() as $pa) {
            $total += $pa->getQuantity() - $pa->getQuantityVirtual() - $pa->getQuantityVirtualReal();
        }
        return $total;
    }

    /**
     * Считает общее количество виртуально-реальных позиций товара доступного для продажи, которые едут на склад
     * @return int
     */
    public function getAvailabilityQuantityVirtualReal()
    {
        $total = 0;
        foreach ($this->getProductAvailability() as $pa) {
            $total += $pa->getQuantityVirtualReal();
        }
        return $total;
    }

    /**
     * Возвращает артикул и название для удобства
     * @return type
     */
    function getArticleAndCaption()
    {
        return $this->article . ', ' . $this->captionRu;
    }

    public function getSerialsQuantity()
    {
        return $this->serialsQuantity;
    }

    public function setSerialsQuantity($serialsQuantity)
    {
        if ($this->getIsNoSerials()) {
            $serialsQuantity = 0;
        }

        $this->serialsQuantity = $serialsQuantity;
        return $this;
    }

    public function getUnits()
    {
        return $this->units;
    }

    public function setUnits($units)
    {
        $this->units = $units;
        return $this;
    }

    public function getFavoriteUsers()
    {
        return $this->favoriteUsers;
    }

    public function setFavoriteUsers($favoriteUsers)
    {
        $this->favoriteUsers = $favoriteUsers;
        return $this;
    }

    public function addFavoriteUsers($favoriteUsers)
    {
        $this->favoriteUsers->add($favoriteUsers);
        return $this;
    }

    public function removeFavoriteUsers($favoriteUsers)
    {
        $this->favoriteUsers->removeElement($favoriteUsers);
        return $this;
    }

    public function getHistoryUsers()
    {
        return $this->historyUsers;
    }

    public function setHistoryUsers($historyUsers)
    {
        $this->historyUsers = $historyUsers;
        return $this;
    }

    public function addHistoryUsers($historyUsers)
    {
        $this->historyUsers->add($historyUsers);
        return $this;
    }

    public function removeHistoryUsers($historyUsers)
    {
        $this->historyUsers->removeElement($historyUsers);
        return $this;
    }

    public function getIsNoSerials()
    {
        return $this->isNoSerials;
    }

    public function setIsNoSerials($isNoSerials)
    {
        $this->isNoSerials = $isNoSerials;
        return $this;
    }

    public function getWarrantyMonths()
    {
        return $this->warrantyMonths;
    }

    public function setWarrantyMonths($warrantyMonths)
    {
        $this->warrantyMonths = $warrantyMonths;
        return $this;
    }

    public function getQuantityAlternative()
    {
        return $this->quantityAlternative;
    }

    public function setQuantityAlternative($quantityAlternative)
    {
        $this->quantityAlternative = $quantityAlternative;
        return $this;
    }

    public function addQuantityAlternative($quantityAlternative)
    {
        $this->quantityAlternative->add($quantityAlternative);
        return $this;
    }

    public function removeQuantityAlternative($quantityAlternative)
    {
        $this->quantityAlternative->removeElement($quantityAlternative);
        return $this;
    }

    public function getQuantityOfPieces()
    {
        return $this->quantityOfPieces;
    }

    public function setQuantityOfPieces($quantityOfPieces)
    {
        $this->quantityOfPieces = $quantityOfPieces;
        return $this;
    }

    public function getUnitOfMeasure()
    {
        return $this->unitOfMeasure;
    }

    public function setUnitOfMeasure($unitOfMeasure)
    {
        $this->unitOfMeasure = $unitOfMeasure;
        return $this;
    }

    public function getSerie()
    {
        return $this->serie;
    }

    public function setSerie($serie)
    {
        $this->serie = $serie;
        return $this;
    }

    public function getReviews()
    {
        return $this->reviews;
    }

    public function setReviews($reviews)
    {
        $this->reviews = $reviews;
        return $this;
    }

    public function addReview($review)
    {
        $this->reviews->add($review);
        return $this;
    }

    public function removeReview($review)
    {
        $this->reviews->removeElement($review);
        return $this;
    }

    public function getReviewsRating()
    {
        return (float)$this->reviewsRating;
    }

    public function setReviewsRating($reviewsRating)
    {
        $this->reviewsRating = $reviewsRating;

        return $this;
    }

    public function getReviewsCount()
    {
        return $this->reviewsCount;
    }

    public function setReviewsCount($reviewsCount)
    {
        $this->reviewsCount = $reviewsCount;
        return $this;
    }

    public function getRemoteVideos()
    {
        return $this->remoteVideos;
    }

    public function setRemoteVideos($remoteVideos)
    {
        $this->remoteVideos = $remoteVideos;
        return $this;
    }

    public function addRemoteVideo($remoteVideo)
    {
        if (!$this->remoteVideos->contains($remoteVideo)) {
            $this->remoteVideos->add($remoteVideo);
        }

        return $this;
    }

    public function removeRemoteVideo(RemoteVideo $remoteVideo)
    {
        $this->remoteVideos->removeElement($remoteVideo);

        return $this;
    }

    public function getCountryOfOrigin()
    {
        return $this->countryOfOrigin;
    }

    public function setCountryOfOrigin($countryOfOrigin)
    {
        $this->countryOfOrigin = $countryOfOrigin;
        return $this;
    }

    public function getTypePrefix()
    {
        return $this->typePrefix;
    }

    public function setTypePrefix($typePrefix)
    {
        $this->typePrefix = $typePrefix;
        return $this;
    }

    public function getInOrderCompositions()
    {
        return $this->inOrderCompositions;
    }

    public function setInOrderCompositions($inOrderCompositions)
    {
        $this->inOrderCompositions = $inOrderCompositions;
        return $this;
    }

    public function getIsVisible()
    {
        return $this->isVisible;
    }

    public function setIsVisible($isVisible)
    {
        $this->isVisible = $isVisible;
        return $this;
    }

    public function getVirtualCategoryList()
    {
        return $this->virtualCategoryList;
    }

    public function setVirtualCategoryList($virtualCategoryList)
    {
        $this->virtualCategoryList = $virtualCategoryList;

        return $this;
    }

    public function addVirtualCategoryList($virtualCategory)
    {
        if (!$this->virtualCategoryList->contains($virtualCategory)) {
            $this->virtualCategoryList->add($virtualCategory);
        }

        return $this;
    }

    public function removeVirtualCategoryList(ProductVirtualCategory $virtualCategory)
    {
        $this->virtualCategoryList->removeElement($virtualCategory);

        return $this;
    }

    public function getTickets()
    {
        return $this->tickets;
    }

    public function setTickets($tickets)
    {
        $this->tickets = $tickets;
        return $this;
    }

    public function addTicket($ticket)
    {
        $ticket->setProduct($this);
        $this->tickets->add($ticket);
        return $this;
    }

    public function removeTicket($ticket)
    {
        $this->tickets->removeElement($ticket);
        return $this;
    }

    public function getOrderOnly()
    {
        return $this->orderOnly;
    }

    public function getOrderOnlyPriceBuying()
    {
        return $this->orderOnlyPriceBuying;
    }

    public function getOrderOnlyShopTax()
    {
        return $this->orderOnlyShopTax;
    }

    public function getOrderOnlyShopTaxInPercent()
    {
        return $this->orderOnlyShopTaxInPercent;
    }

    /**
     * @return int
     */
    public function getDeliveryDays()
    {
        return $this->deliveryDays;
    }

    /**
     * @param int $deliveryDays
     * @return CommonProduct
     */
    public function setDeliveryDays($deliveryDays)
    {
        $this->deliveryDays = $deliveryDays;
        return $this;
    }


    public function setOrderOnly($orderOnly)
    {
        $this->orderOnly = $orderOnly;
        return $this;
    }

    public function setOrderOnlyPriceBuying($orderOnlyPriceBuying)
    {
        $this->orderOnlyPriceBuying = $orderOnlyPriceBuying;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOOPBCurrency()
    {
        return $this->OOPBCurrency;
    }

    /**
     * @param mixed $OOPBCurrency
     * @return CommonProduct
     */
    public function setOOPBCurrency($OOPBCurrency)
    {
        $this->OOPBCurrency = $OOPBCurrency;
        return $this;
    }

    /**
     * @return decimal
     */
    public function getOOPBCurrencyRateAdditive()
    {
        return $this->OOPBCurrencyRateAdditive;
    }

    /**
     * @param decimal $OOPBCurrencyRateAdditive
     * @return CommonProduct
     */
    public function setOOPBCurrencyRateAdditive($OOPBCurrencyRateAdditive)
    {
        $this->OOPBCurrencyRateAdditive = $OOPBCurrencyRateAdditive;
        return $this;
    }


    function getIsMrcEnabled()
    {
        return $this->isMrcEnabled;
    }

    function setIsMrcEnabled($isMrcEnabled)
    {
        $this->isMrcEnabled = $isMrcEnabled;
        return $this;
    }


    /**
     * @return decimal
     */
    public function getMrc()
    {
        return $this->mrc;
    }

    /**
     * @param decimal $mrc
     * @return CommonProduct
     */
    public function setMrc($mrc)
    {
        $this->mrc = $mrc;
        return $this;
    }

    /**
     * @return int
     */
    public function getOOPBQuantity()
    {
        return $this->OOPBQuantity;
    }

    /**
     * @param int $OOPBQuantity
     * @return CommonProduct
     */
    public function setOOPBQuantity($OOPBQuantity)
    {
        $this->OOPBQuantity = $OOPBQuantity;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsOOPBCurrencyRateAdditiveInPercent()
    {
        return $this->isOOPBCurrencyRateAdditiveInPercent;
    }

    /**
     * @param boolean $isOOPBCurrencyRateAdditiveInPercent
     * @return CommonProduct
     */
    public function setIsOOPBCurrencyRateAdditiveInPercent($isOOPBCurrencyRateAdditiveInPercent)
    {
        $this->isOOPBCurrencyRateAdditiveInPercent = $isOOPBCurrencyRateAdditiveInPercent;
        return $this;
    }

    /**
     * @return int
     */
    public function getOOPBQuantityUpdated()
    {
        return $this->OOPBQuantityUpdated;
    }

    /**
     * @param int $OOPBQuantityUpdated
     * @return CommonProduct
     */
    public function setOOPBQuantityUpdated($OOPBQuantityUpdated)
    {
        $this->OOPBQuantityUpdated = $OOPBQuantityUpdated;
        return $this;
    }

    public function setOrderOnlyShopTax($orderOnlyShopTax)
    {
        $this->orderOnlyShopTax = $orderOnlyShopTax;
    }

    public function setOrderOnlyShopTaxInPercent($orderOnlyShopTaxInPercent)
    {
        $this->orderOnlyShopTaxInPercent = $orderOnlyShopTaxInPercent;
    }

    /**
     * @return mixed
     */
    public function getSupplier()
    {
        return $this->supplier;
    }

    /**
     * @param mixed $supplier
     * @return CommonProduct
     */
    public function setSupplier($supplier)
    {
        $this->supplier = $supplier;
        return $this;
    }

    public function getIsDescriptionSendToYandex()
    {
        return $this->isDescriptionSendToYandex;
    }

    public function setIsDescriptionSendToYandex($isDescriptionSendToYandex)
    {
        $this->isDescriptionSendToYandex = $isDescriptionSendToYandex;
    }

    public function getProductTags()
    {
        return $this->productTags;
    }

    public function setProductTags($productTags)
    {
        $this->productTags = $productTags;
        return $this;
    }

    public function addProductTag($productTag)
    {
        $productTag->setProduct($this);
        $this->productTags->add($productTag);
        return $this;
    }

    public function removeProductTag($productTag)
    {
        $this->productTags->removeElement($productTag);
        return $this;
    }

    public function getYmlCaption()
    {
        return $this->ymlCaption;
    }

    public function setYmlCaption($ymlCaption)
    {
        $this->ymlCaption = $ymlCaption;
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
     * @return CommonProduct
     */
    public function setIsCanBeInYml($isCanBeInYml)
    {
        $this->isCanBeInYml = $isCanBeInYml;
        return $this;
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->updatePrice();
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->updatePrice();
    }


    /**
     * Обновляет цену под заказ
     */
    public function updatePrice()
    {
        //если под заказ
        if ($this->orderOnly) {
            //если MRC включена, то берем её без всяких расчетов
            if ($this->isMrcEnabled) {
                $price = $this->mrc;
            } else {

                if ($this->getOOPBCurrency()) {
                    $rate = $this->getOOPBCurrency()->getCurrencyRUB() > 0 ? $this->getOOPBCurrency()->getCurrencyRUB()
                        : 1;
                } else {
                    $rate = 1;
                }
                $orderOnlyShopTax = $this->orderOnlyShopTax > 0 ? $this->orderOnlyShopTax
                    : 1;

                //прибавляем к курсу надбавку
                if ($this->isOOPBCurrencyRateAdditiveInPercent) {
                    $rate = $rate + ($rate / 100) * $this->OOPBCurrencyRateAdditive;
                } else {
                    $rate = $rate + $this->OOPBCurrencyRateAdditive;
                }

                //переводим по курсу цену закупки
                $orderOnlyPriceBuying = $this->orderOnlyPriceBuying;
                $orderOnlyPriceBuying = $orderOnlyPriceBuying * $rate;

                if ($this->orderOnlyShopTaxInPercent) {
                    $price = $orderOnlyPriceBuying + (($orderOnlyPriceBuying / 100)
                            * $orderOnlyShopTax);
                } else {
                    $price = $orderOnlyPriceBuying + $orderOnlyShopTax * $rate;
                }
            }

            $price = ceil($price);
        } else {
            $price = $this->price;
        }
        $this->setPrice($price);

        if (isset($orderOnlyPriceBuying)) {
            return [
                'orderOnlyPriceBuying' => $orderOnlyPriceBuying
            ];
        }
    }

    /**
     * Определяет является ли товар физическим
     * @return boolean
     */
    public function getIsPhysical()
    {

        $res = false;
        if ($this instanceof Product) {
            $res = true;
        } else {
            if ($this instanceof ServiceProduct) {
                $res = false;
            } else {
                if ($this instanceof DigitalProduct) {
                    $res = false;
                } else {
                    if ($this instanceof CompositeProduct) {
                        foreach ($this->getCompositions() as $comp) {
                            if ($comp->getTargetObject() && $comp->getTargetObject()->getIsPhysical()) {
                                $res = true;
                                break;
                            }
                        }
                    }
                }
            }
        }
        return $res;
    }

    /**
     * Дополнительные проверки .общие проверки
     *
     */
    public function isValidCommon(ExecutionContextInterface $context)
    {

        //основная категория должна быть выбрана среди  других категорий
        if ($this->getCategories()->contains($this->getCategoryMain()) === false) {
            $context->buildViolation('Основная категория должна быть из категорий продукта!')
                ->atPath('categoryMain')
                ->addViolation();
        }
        //основной бренд должен быть выбран среди  других брендов
        if ($this->getManufacturers()->contains($this->getManufacturerMain()) === false) {
            $context->buildViolation('Основной производитель должен быть из производителей продукта!')
                ->atPath('manufacturerMain')
                ->addViolation();
        }
        if ($this->getOldPrice() && $this->getPrice() >= $this->getOldPrice()) {
            $context->buildViolation("Старая цена не может быть меньше или равна новой {$this->getPrice()}!")
                ->atPath('oldPrice')
                ->addViolation();
        }

        if (!$this->isNoSerials && !$this->serialsQuantity) {
            $context->buildViolation('Укажите количество серийных номеров!')
                ->atPath('serialsQuantity')
                ->addViolation();
        }

        $twins = [];
        foreach ($this->productTags as $tag) {
            if (isset($twins[$tag->getCaptionRu()])) {
                $context->buildViolation('Теги не могут быть одинаковыми!')
                    ->atPath('tags')
                    ->addViolation();
                break;
            }
            $twins[$tag->getCaptionRu()] = true;
        }

        //проверяем блок ПОД ЗАКАЗ
        if ($this->orderOnly) {
            if (!$this->orderOnlyPriceBuying) {
                $context->buildViolation('Не указана цена закупки!')
                    ->atPath('orderOnlyPriceBuying')
                    ->addViolation();
            }

            if (!$this->OOPBCurrency) {
                $context->buildViolation('Не указана валюта закупки!')
                    ->atPath('OOPBCurrency')
                    ->addViolation();
            }

            if ($this->isEnabled && !$this->isMrcEnabled && !$this->orderOnlyShopTax) {
                $context->buildViolation('Не указана наценка!')
                    ->atPath('orderOnlyShopTax')
                    ->addViolation();
            }

            if ($this->isMrcEnabled && !$this->mrc) {
                $context->buildViolation('Не указана МРЦ!')
                    ->atPath('mrc')
                    ->addViolation();
            }
            if (!$this->deliveryDays) {
                $context->buildViolation('Не указан максимальный срок поставки товара!')
                    ->atPath('deliveryDays')
                    ->addViolation();
            }

        }
    }
}