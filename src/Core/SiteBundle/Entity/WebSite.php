<?php

/**
 * Сущность площадки web-сайта
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
 * @ORM\Entity(repositoryClass="Core\SiteBundle\Entity\Repository\WebSiteRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Assert\Callback(methods={"isValid"})
 */
class WebSite extends CommonSite
{

    /**
     * Доменное имя
     * @var string
     * @ORM\Column(type="string", length=250, nullable=false)
     * @Assert\Url()
     * @Assert\NotBlank()
     */
    private $domain;


    /**
     * Зеркала
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $mirrors;


    /**
     * Регион
     * @var string
     * @ORM\Column(type="string", length=250, nullable=false)
     */
    private $region;

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     */
    public function setDomain($domain)
    {
//        $domain = preg_replace("#/$#", '', $domain);
        $this->domain = $domain;

        return $this;
    }


    /**
     * @return string
     */
    public function getMirrors()
    {
        return $this->mirrors;
    }

    /**
     * @param string $mirrors
     */
    public function setMirrors($mirrors)
    {
        $this->mirrors = $mirrors;
    }

    public function getName()
    {
        return str_replace('http://', '', $this->getDomain());
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param string $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }



    /**
     * Дополнительные проверки .общие проверки
     *
     */
    public function isValid(ExecutionContextInterface $context)
    {


    }

}

