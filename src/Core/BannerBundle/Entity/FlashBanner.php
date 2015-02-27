<?php

/**
 * Flash баннер
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\BannerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\ExecutionContextInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Core\BannerBundle\Entity\CommonBanner;
use Core\FileBundle\Entity\FlashFile;

/**
 * @ORM\Entity(repositoryClass="Core\BannerBundle\Entity\Repository\FlashBannerRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Assert\Callback(methods={"isValid"})
 */
class FlashBanner extends CommonBanner
{

    /**
     * Файл
     * @ORM\OneToOne(targetEntity="Core\FileBundle\Entity\FlashFile", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     * Assert\NotBlank()
     */
    private $file;


    /**
     * Открывать ссылку в новом коне
     * var string
     * ORM\Column(type="boolean", nullable=true)
     */
//    private $isOpenUrlInNewWindow;


    /**
     * Высота
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $height;


    /**
     * Ширина
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $width;

    /**
     * @return mixed
     */
    public function getFile()
    {
        return [$this->file] ? [$this->file] : null;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    public function addFile($file)
    {
        $this->file = $file;
        return $this;
    }

    public function removeFile($file)
    {
        $this->file = null;
        return $this;
    }

//    /**
//     * @return string
//     */
//    public function getIsOpenUrlInNewWindow()
//    {
//        return $this->isOpenUrlInNewWindow;
//    }
//
//    /**
//     * @param string $isOpenUrlInNewWindow
//     */
//    public function setIsOpenUrlInNewWindow($isOpenUrlInNewWindow)
//    {
//        $this->isOpenUrlInNewWindow = $isOpenUrlInNewWindow;
//        return $this;
//    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }


    /**
     * Дополнительные проверки
     */
    public function isValid(ExecutionContextInterface $context)
    {
//        if ($this->number && !$this->price) {
//            $context->buildViolation('Пожалуйста, укажите цену')
//                        ->atPath('price')
//                        ->addViolation();
//        }
    }

}
