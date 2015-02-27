<?php

/**
 * Баннер по HTML или JS-коду
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
 * @ORM\Entity(repositoryClass="Core\BannerBundle\Entity\Repository\CodeBannerRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Assert\Callback(methods={"isValid"})
 */
class CodeBanner extends CommonBanner {


    /**
     * Код баннера
     * @var string
     * @ORM\Column(type="text", nullable=false)
     * @Assert\NotBlank()
     */
    protected $code;

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
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
