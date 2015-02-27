<?php

/**
 * Индивидуальные настройки характеристики для конкретных категорий
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PropertyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Core\PropertyBundle\Entity\SettingsProperty;

/**
 * @ORM\Table(name="core_property_settings_category")
 * @ORM\Entity(repositoryClass="Core\PropertyBundle\Entity\Repository\SettingsCategoryPropertyRepository")
 */
class SettingsCategoryProperty extends SettingsProperty {

    /**
     * Первичный ключ
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Характеристика к которой относится настройка
     * @ORM\ManyToOne(targetEntity="Property", inversedBy="settingsCategory")
     * @ORM\JoinColumn(name="propertyId", referencedColumnName="id", onDelete="CASCADE")
     * @Assert\NotBlank
     */
    private $property;

    /**
     * Для какой категории созданы настройки
     * @ORM\ManyToOne(targetEntity="Core\CategoryBundle\Entity\ProductCategory", inversedBy="settingsCategoryProperty")
     * @ORM\JoinColumn(name="categoryId", referencedColumnName="id", onDelete="CASCADE")
     * @Assert\NotBlank
     */
    private $category;

    public function getId() {
        return $this->id;
    }

    public function getProperty() {
        return $this->property;
    }

    public function setProperty($property) {
        $this->property = $property;
        return $this;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
        return $this;
    }

}
