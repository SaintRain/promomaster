<?php

/**
 * Конфигурации
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ConfigBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\ExecutionContextInterface;  //нужен для callback
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="core_config")
 * @ORM\Entity(repositoryClass="Core\ConfigBundle\Entity\Repository\ConfigRepository")
 * @UniqueEntity("name")
 */
class Config
{

    /**
     * Возможные типы
     * @var type
     */
    private static $editTypes = array(
        'string' => ['caption' => 'Строка'],
        'text' => ['caption' => 'Текст'],
        'array' => ['caption' => 'Массив']
    );

    /**
     * Типы подсветки (форматирования)
     * @var array
     */
    private static $highlightTypes =  array(
        'twig' => ['caption' => 'Twig'],
        'text/html' => ['caption' => 'Html'],
        'javascript' => ['caption' => 'Javascript'],
        'css' => ['caption' => 'Css']
    );
   
    /**
     * Первичный ключ
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Индекс позиции сортировки
     * @var int
     * @ORM\Column(name="indexPosition", type="bigint", nullable=true)
     */
    protected $indexPosition;

    /**
     * Время создания
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="createdDateTime", type="datetime")
     */
    protected $createdDateTime;

    /**
     * Имя, может использаваться как ключ
     * @var string
     * @Gedmo\Slug(fields={"caption"}, updatable=false, unique=true, separator="-")
     * @ORM\Column(type="string", unique=true, length=255)
     */
    protected $name;

    /**
     * Тип настройки
     * @var string
     * @ORM\Column(type="string",  length=300)
     */
    protected $type;

    /**
     * Название
     * @var string
     * @ORM\Column(type="string",  length=300)
     * @Assert\NotBlank()
     */
    protected $caption;

    /**
     * Примечание
     * @var string
     * @ORM\Column(type="string", nullable=true,  length=300);
     */
    protected $description;

    /**
     * Группа
     * @var string
     * @ORM\ManyToOne(targetEntity="Group", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    protected $group;

    /**
     * Подсветка кода (форматирование)
     * @var string
     * @ORM\Column(type="string", nullable=true,  length=50);
     */
    protected $highlight;

    /**
     * Значение
     * @ORM\Column(type="text", nullable=true)
     */
    protected $data;

    public function getId()
    {
        return $this->id;
    }

    public function getIndexPosition()
    {
        return $this->indexPosition;
    }

    public function getCreatedDateTime()
    {
        return $this->createdDateTime;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getCaption()
    {
        return $this->caption;
    }


    public function getData()
    {
        return $this->data;
    }

    public function setIndexPosition($indexPosition)
    {
        $this->indexPosition = $indexPosition;
        return $this;
    }

    public function setCreatedDateTime(\DateTime $createdDateTime)
    {
        $this->createdDateTime = $createdDateTime;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function setCaption($caption)
    {
        $this->caption = $caption;
        return $this;
    }

    public function setData($data)
    {
        $data = trim($data);
        $this->data = $data;
        return $this;
    }

    /**
     * @return string
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param string $group
     * @return Config
     */
    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Config
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getHighlight()
    {
        return $this->highlight;
    }

    public function setHighlight($highlight)
    {
        $this->highlight = $highlight;
        return $this;
    }

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

    public static function getHighlightTypes($formNeedShortINfo = false)
    {
        //если нужно вернуть информацию для списку в форму
        if ($formNeedShortINfo) {
            $properties = [];
            foreach (self::$highlightTypes as $key => $property) {
                $properties[$key] = $property['caption'];
            }
            return $properties;
        } else {
            return self::$highlightTypes;
        }
    }
}
