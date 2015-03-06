<?php

/**
 * Сущность площадки иного ПО
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\ExecutionContextInterface;
use Core\SiteBundle\Entity\CommonSite;

/**
 * @ORM\Entity(repositoryClass="Core\SiteBundle\Entity\Repository\SoftSiteRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Assert\Callback(methods={"isValid"})
 */
class SoftSite extends CommonSite
{

    /**
     * Назване программы
     * @var string
     * @ORM\Column(type="string", length=250, nullable=false)
     * @Assert\Url()
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }





    /**
     * Дополнительные проверки .общие проверки
     *
     */
    public function isValid(ExecutionContextInterface $context)
    {


    }

}

