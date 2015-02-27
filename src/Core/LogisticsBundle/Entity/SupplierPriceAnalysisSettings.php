<?php
/**
 * Класс, содержащий настройки под каждого поставщика для парсинга и анализа прайсов
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table("core_logistics_supplier_price_analysis_settings")
 * @ORM\Entity(repositoryClass="Core\LogisticsBundle\Entity\Repository\SupplierPriceAnalysisSettingsRepository")
 */
class SupplierPriceAnalysisSettings
{
    static $FIELD_NAMES = [
        'sku' => 'SKU производителя',
        'captionRu' => 'Название товара',
        'orderOnlyPriceBuying' => 'Цена закупки',
        'OOPBQuantity' => 'Остаток',
        'mrc' => 'МРЦ'
    ];
    static $FIELD_TYPES = [
        'int' => 'Целое число',
        'float' => 'Дробное число',
        'string' => 'Строка'
    ];

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Поставщик
     * @ORM\ManyToOne(targetEntity="Supplier", inversedBy="paSettings")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $supplier;

    /**
     * Буква колонки, или формала, например A+B
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     */
    private $columnCaption;

    /**
     * Название поля из сущности продукта
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     */
    private $fieldNameFromProductEntity;

    /**
     * Тип поля
     * @ORM\Column(type="string", length=20)
     */
    private $fieldType;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $indexPosition;

    public function getId()
    {
        return $this->id;
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
     * @return SupplierPriceAnalysisSettings
     */
    public function setSupplier($supplier)
    {
        $this->supplier = $supplier;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getColumnCaption()
    {
        return $this->columnCaption;
    }

    /**
     * @param mixed $columnCaption
     * @return PriceAnalysisSettings
     */
    public function setColumnCaption($columnCaption)
    {
        $this->columnCaption = $columnCaption;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFieldNameFromProductEntity()
    {
        return $this->fieldNameFromProductEntity;
    }

    /**
     * @param mixed $fieldNameFromProductEntity
     * @return PriceAnalysisSettings
     */
    public function setFieldNameFromProductEntity($fieldNameFromProductEntity)
    {
        $this->fieldNameFromProductEntity = $fieldNameFromProductEntity;
        return $this;
    }

    function getFieldType()
    {
        return $this->fieldType;
    }

    function setFieldType($fieldType)
    {
        $this->fieldType = $fieldType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIndexPosition()
    {
        return $this->indexPosition;
    }

    /**
     * @param mixed $indexPosition
     * @return PriceAnalysisSettings
     */
    public function setIndexPosition($indexPosition)
    {
        $this->indexPosition = $indexPosition;
        return $this;
    }
}