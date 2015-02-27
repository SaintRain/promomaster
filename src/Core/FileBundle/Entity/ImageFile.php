<?php

/**
 * Сущность картинок
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Core\FileBundle\Entity\CommonFile;
use Core\CommonBundle\TranslatableProperties\Alt;

/**
 * @ORM\Table(name="core_file_image")
 * @ORM\Entity(repositoryClass="Core\FileBundle\Entity\Repository\ImageFileRepository")
 */
class ImageFile extends CommonFile
{

    use Alt;

    /**
     * Высота картинки
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    private $height;

    /**
     * Ширина картинки
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    private $width;

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

}
