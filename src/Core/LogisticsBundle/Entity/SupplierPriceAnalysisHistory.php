<?php
/**
 * Класс, содержащий  историю цен на момент загрузки прайса
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Table("core_logistics_supplier_price_analysis_history")
 * @ORM\Entity(repositoryClass="Core\LogisticsBundle\Entity\Repository\SupplierPriceAnalysisHistoryRepository")
 */
class SupplierPriceAnalysisHistory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Ссылка на загруженный прайс
     * @ORM\ManyToOne(targetEntity="SupplierpriceAnalysis", inversedBy="priceAnalysisHistory")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $priceAnalysis;

    /**
     * Продукт для которого пишем историю цен
     * @ORM\ManyToOne(targetEntity="Core\ProductBundle\Entity\CommonProduct")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $product;

    /**
     * Цена
     * @var decimal
     * @ORM\Column(type="decimal", scale=2, nullable=false)
     * @Assert\NotBlank()
     */
    private $price = 0;

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
     * МРЦ - минимальная рознична цена.
     * @var decimal
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    private $mrc;

    /**
     * Время создания
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdDateTime;

    public function __construct()
    {
        $this->priceAnalysis= new ArrayCollection();
    }
    function getId()
    {
        return $this->id;
    }

    function getPriceAnalysis()
    {
        return $this->priceAnalysis;
    }

    function getProduct()
    {
        return $this->product;
    }

    function getPrice()
    {
        return $this->price;
    }

    function getOrderOnlyPriceBuying()
    {
        return $this->orderOnlyPriceBuying;
    }

    function getOOPBCurrency()
    {
        return $this->OOPBCurrency;
    }

    function getMrc()
    {
        return $this->mrc;
    }

    function getCreatedDateTime()
    {
        return $this->createdDateTime;
    }

    function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    function setPriceAnalysis($priceAnalysis)
    {
        $this->priceAnalysis = $priceAnalysis;
        return $this;
    }

    function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }

    function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    function setOrderOnlyPriceBuying($orderOnlyPriceBuying)
    {
        $this->orderOnlyPriceBuying = $orderOnlyPriceBuying;
        return $this;
    }

    function setOOPBCurrency($OOPBCurrency)
    {
        $this->OOPBCurrency = $OOPBCurrency;
        return $this;
    }

    function setMrc($mrc)
    {

        $this->mrc = $mrc;
        return $this;
    }

    function setCreatedDateTime(\DateTime $createdDateTime)
    {
        $this->createdDateTime = $createdDateTime;
        return $this;
    }
}