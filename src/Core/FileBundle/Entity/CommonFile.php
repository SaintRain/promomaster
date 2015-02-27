<?php

/**
 * Базовая сущность для файлов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FileBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"ImageFile"="ImageFile", "DocumentFile"="DocumentFile", "FlashFile"="FlashFile"})
 * @ORM\Table(name="core_file_common")
 * @ORM\Entity(repositoryClass="Core\FileBundle\Entity\Repository\CommonFileRepository")
 */
class CommonFile {

    /**
     * Первичный ключ
     * @var bigint
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Новое название файла
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $name;

    /**
     * Часть пути к файлу, решает проблему с подстановкой имени поля при генерации пути к файлу
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $halfPath;

    /**
     * Загружаемый файл
     * @Assert\File(maxSize="50M")
     */
    private $file;

    /**
     * Индекс позиции сортировки
     * @var int
     * @ORM\Column(type="bigint", nullable=true)
     */
    protected $indexPosition;


    /**
     * Размер файла
     * @var bigint
     * @ORM\Column(type="bigint", nullable=true)
     */
    protected $size;


    public function __clone() {
        $this->id = null;
    }

    public function getId() {
        return $this->id;
    }

    /**
     * @return UploadedFile
     */
    public function getFile() {
        return $this->file;
    }

    /**
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null) {
        $this->file = $file;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getHalfPath() {
        return $this->halfPath;
    }

    public function setHalfPath($halfPath) {
        $this->halfPath = $halfPath;
        return $this;
    }

    public function getIndexPosition() {
        return $this->indexPosition;
    }

    public function setIndexPosition($indexPosition) {
        $this->indexPosition = $indexPosition;
        return $this;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }
}
