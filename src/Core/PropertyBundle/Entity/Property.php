<?php

/**
 * Базовый класс характеристик
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PropertyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;
use Core\PropertyBundle\Entity\DataProperty;
use Core\PropertyBundle\Entity\SettingsProperty;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
//подключаем языки
use Core\CommonBundle\TranslatableProperties\Caption;
use Core\CommonBundle\TranslatableProperties\Description;

/**
 * @ORM\Table(name="core_property")
 * @ORM\Entity(repositoryClass="Core\PropertyBundle\Entity\Repository\PropertyRepository")
 * @UniqueEntity("name")
 */
class Property extends SettingsProperty
{

    use Caption,
        Description;

    /**
     * Возможные варианты редактирования
     * @var type
     */
    private static $editTypes = array(
        'input' => ['caption' => 'Числовое поле ввода', 'group' => 'text'],
        'input_text' => ['caption' => 'Строковое поле ввода', 'group' => 'text'],
        'textarea' => ['caption' => 'Многострочное строкове поле (textarea)', 'group' => 'text'],
        'editor' => ['caption' => 'Расширенные редактор текста', 'group' => 'text'],
        'select' => ['caption' => 'Список (один-к-многим)', 'group' => 'list'],
        'multiselect' => ['caption' => 'Множественный список (многие-к-многим)', 'group' => 'list'],
        'checkbox' => ['caption' => 'Галочки', 'group' => 'list'],
        'radio' => ['caption' => 'Переключатель (radio)', 'group' => 'list']);

    /**
     * Первичный ключ
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Тип редактирования
     * @var string
     * @Assert\Choice(choices = {"input", "input_text", "editor", "textarea", "select", "multiselect", "checkbox", "radio"})
     * @ORM\Column(name="editType", type="string", length=20, nullable=true)
     * @Assert\NotBlank()
     */
    private $editType;

    /**
     * Категории товаров к которым относится характеристика
     * @ORM\ManyToMany(targetEntity="Core\CategoryBundle\Entity\ProductCategory", fetch="EXTRA_LAZY", inversedBy="properties")
     * @ORM\JoinTable(name="core_property_match_categories")
     * @Assert\NotBlank()
     */
    private $categories;

    /**
     * Время создания
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="createdDateTime", type="datetime")
     */
    private $createdDateTime;

    /**
     * Системное имя
     * @var string
     * @ORM\Column(type="string", length=300)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * Связные значения характеристики для подстановки
     * @ORM\OneToMany(targetEntity="DataProperty", mappedBy="property", cascade={"persist"}, orphanRemoval=true)     
     */
    private $dataList;

    /**
     * Все настройки под категории для конкретной характеристики
     * @ORM\OneToMany(targetEntity="SettingsCategoryProperty", mappedBy="property")
     */
    private $settingsCategory;

    public function __construct()
    {
        $this->dataList = new ArrayCollection();
    }

    /**
     * Возвращает массив возможных вариантов подстановки для поля выборки элемента редактирования
     * @param type $formNeedShortINfo
     * @return array
     */
    public static function getEditTypes($formNeedShortINfo = false)
    {

        //если нужно вернуть информацию для списку в форму
        if ($formNeedShortINfo) {
            $properties = [];
            foreach (self::$editTypes as $key => $property) {
                $properties[$key] = $property['caption'];
            }
            return $properties;
        } else {
            return self::$editTypes;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getEditType()
    {
        return $this->editType;
    }

    public function setEditType($editType)
    {
        $this->editType = $editType;
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

    public function getCreatedDateTime()
    {
        return $this->createdDateTime;
    }

    public function setCreatedDateTime($createdDateTime)
    {
        $this->createdDateTime = $createdDateTime;
        return $this;
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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
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

    public function getDataList()
    {
        return $this->dataList;
    }

    public function setDataList($dataList)
    {
        $this->dataList = $dataList;
        return $this;
    }

    public function addDataList(DataProperty $dataList)
    {
        $dataList->setProperty($this);
        $this->dataList[] = $dataList;

        return $this;
    }

    public function removeDataList(DataProperty $dataList)
    {
        $this->dataList->removeElement($dataList);
    }

    public function getSettingsCategory()
    {
        return $this->settingsCategory;
    }

    public function setSettingsCategory(ArrayCollection $settingsCategory)
    {
        $this->settingsCategory = $settingsCategory;
        return $this;
    }

    /**
     * Взависимости от настроек возвращает одну
     * @return \Core\PropertyBundle\Entity\Property
     */
    public function getGeneralSettingsCategory()
    {
        if ($this->settingsCategory->count() == 1) {
            return $this->settingsCategory->first();
        } else {
            return $this;
        }
    }

}
