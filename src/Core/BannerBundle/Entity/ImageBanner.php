<?php

/**
 * Графический баннер
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\BannerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\ExecutionContextInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Core\BannerBundle\Entity\CommonBanner;


/**
 * @ORM\Entity(repositoryClass="Core\BannerBundle\Entity\Repository\ImageBannerRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Assert\Callback(methods={"isValid"})
 */
class ImageBanner extends CommonBanner
{
    /**
     * URL куда должен ссылаться рекламный баннер
     * @var string
     * @ORM\Column(type="string", length=250, nullable=false)
     * @Assert\Url()
     */
    private $url;

    /**
     * Файл
     * @ORM\OneToOne(targetEntity="Core\FileBundle\Entity\ImageFile", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     * Assert\NotBlank()
     */
    private $image;


    /**
     * Открывать ссылку в новом коне
     * @var string
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isOpenUrlInNewWindow;


    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {

        return [$this->image] ? [$this->image] : null;

    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }


    public function addImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public function removeImage($image)
    {
        $this->image = null;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsOpenUrlInNewWindow()
    {
        return $this->isOpenUrlInNewWindow;
    }

    /**
     * @param string $isOpenUrlInNewWindow
     */
    public function setIsOpenUrlInNewWindow($isOpenUrlInNewWindow)
    {
        $this->isOpenUrlInNewWindow = $isOpenUrlInNewWindow;
    }

    /**
     * Дополнительные проверки
     */
    public function isValid(ExecutionContextInterface $context)
    {
        if (!$this->isGag) {
            $context->buildViolation('Необходимо указать')
                        ->atPath('url')
                        ->addViolation();
        }
//        if (!($this->getImage()) ) {
//            $context->buildViolation('Пожалуйста, укажите цену')
//                        ->atPath('image')
//                        ->addViolation();
//        }
    }

}
