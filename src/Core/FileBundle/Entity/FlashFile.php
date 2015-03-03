<?php

/**
 * Сущность флешки
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Core\FileBundle\Entity\CommonFile;
use Symfony\Component\Validator\Constraints as Assert;
use Core\CommonBundle\TranslatableProperties\Alt;
use Core\CommonBundle\TranslatableProperties\Caption;

/**
 * @ORM\Table(name="core_file_flash")
 * @ORM\Entity(repositoryClass="Core\FileBundle\Entity\Repository\FlashFileRepository")
 */
class FlashFile extends CommonFile
{

    use Alt;
    use Caption;

    /**
     * Высота флешки
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    private $height;

    /**
     * Ширина флешки
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
