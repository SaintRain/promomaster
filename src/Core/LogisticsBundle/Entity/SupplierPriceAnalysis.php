<?php
/**
 * Сушность, где храняться прайсы для последущего анализа
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Core\FileBundle\Entity\DocumentFile;

/**
 * @ORM\Table("core_logistics_supplier_price_analysis")
 * @ORM\Entity(repositoryClass="Core\LogisticsBundle\Entity\Repository\SupplierPriceAnalysisRepository")
 */
class SupplierPriceAnalysis
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Файл прайса
     *
     * @ORM\OneToOne(targetEntity="Core\FileBundle\Entity\DocumentFile", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     * @Assert\NotBlank()
     */
    private $priceFile;

    /**
     * Сеарилизованные строки загруженного прайса
     * @ORM\Column(type="array", nullable=true)
     * Assert\NotBlank()
     */
    private $serializeRows;

    /**
     * Время создания
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdDateTime;

    /**
     * Поставщик для которого указан прайс
     * @ORM\ManyToOne(targetEntity="Supplier", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     * @Assert\NotBlank()
     */
    private $supplier;

    /**
     * Фиксируем цены для продуктов, на момент загрузки прайса
     * @ORM\OneToMany(targetEntity="SupplierPriceAnalysisHistory", mappedBy="priceAnalysis")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $priceAnalysisHistory;

    /**
     * Показывает обработан ли прайс кроном
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true, options={"default"=false})
     */
    private $isQuantityProcessed = false;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDateTime()
    {
        return $this->createdDateTime;
    }

    /**
     * @param \DateTime $createdDateTime
     * @return priceFileAnalysis
     */
    public function setCreatedDateTime($createdDateTime)
    {
        $this->createdDateTime = $createdDateTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPriceFile()
    {
        return [$this->priceFile] ? [$this->priceFile] : null;
    }

    /**
     * @param mixed $priceFile
     * @return priceFileAnalysis
     */
    public function setPriceFile(Array $priceFile = NULL)
    {
        $this->priceFile = $priceFile;
        return $this;
    }

    /**
     * @param $priceFile
     * @return priceFileAnalysis
     */
    public function addPriceFile($priceFile)
    {
        $this->priceFile = $priceFile;
        return $this;
    }

    /**
     * @param $priceFile
     * @return priceFileAnalysis
     */
    public function removePriceFile($priceFile)
    {
        $this->priceFile = null;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSerializeRows()
    {
        return $this->serializeRows;
    }

    /**
     * @param mixed $serializeRows
     * @return SupplierPriceAnalysis
     */
    public function setSerializeRows($serializeRows)
    {
        $this->serializeRows = $serializeRows;
        return $this;
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
     * @return PriceAnalysis
     */
    public function setSupplier($supplier)
    {
        $this->supplier = $supplier;
        return $this;
    }


    function getPriceAnalysisHistory()
    {
        return $this->priceAnalysisHistory;
    }

    function setPriceAnalysisHistory($priceAnalysisHistory)
    {
        $this->priceAnalysisHistory = $priceAnalysisHistory;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsQuantityProcessed()
    {
        return $this->isQuantityProcessed;
    }

    /**
     * @param boolean $isQuantityProcessed
     * @return SupplierPriceAnalysis
     */
    public function setIsQuantityProcessed($isQuantityProcessed)
    {
        $this->isQuantityProcessed = $isQuantityProcessed;
        return $this;
    }

}