<?php

/**
 * Настройки платежной системы PlasticCard
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Entity\PaymentSystem;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface; //нужен для callback
use Core\PaymentBundle\Entity\PaymentSystem\CommonPaymentSystem;

/**
 * @ORM\Entity(repositoryClass="Core\PaymentBundle\Entity\PaymentSystem\Repository\PlasticCardRepository")
 */
class PlasticCard extends CommonPaymentSystem
{
    /**
     * Наш идентификатор в системе YM, получаем у них.
     *
     * @var string
     * @ORM\Column(type="string", length=100, nullable=false)
     * @Assert\NotBlank
     */
    private $shopId;

    /**
     * Наш номер витрины в системе YM, получаем у них.
     *
     * @var string
     * @ORM\Column(type="string", length=100, nullable=false)
     * @Assert\NotBlank
     */
    private $scid;

    /**
     * Пароль магазина
     *
     * @var string
     * @ORM\Column(type="string", length=100, nullable=false)
     * @Assert\NotBlank
     */
    private $shopPassword;

    /**
     * return: Ссылка для перенаправления в случае успешного выполнения платежа
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\Url()
     */
    private $shopSuccessURL;

    /**
     * cancel_return: Ссылка для перенаправления в случае возникновения ошибки при выполнении платежа
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\Url()
     */
    private $shopFailURL;

    /**
     * @param string $shopId
     */
    public function setShopId($shopId)
    {
        $this->shopId = $shopId;
    }

    /**
     * @return string
     */
    public function getShopId()
    {
        return $this->shopId;
    }

    /**
     * @param string $scid
     */
    public function setScid($scid)
    {
        $this->scid = $scid;
    }

    /**
     * @return string
     */
    public function getScid()
    {
        return $this->scid;
    }

    /**
     * @param string $shopPassword
     */
    public function setShopPassword($shopPassword)
    {
        $this->shopPassword = $shopPassword;
    }

    /**
     * @return string
     */
    public function getShopPassword()
    {
        return $this->shopPassword;
    }

    /**
     * @param string $shopFailURL
     */
    public function setShopFailURL($shopFailURL)
    {
        $this->shopFailURL = $shopFailURL;
    }

    /**
     * @return string
     */
    public function getShopFailURL()
    {
        return $this->shopFailURL;
    }

    /**
     * @param string $shopSuccessURL
     */
    public function setShopSuccessURL($shopSuccessURL)
    {
        $this->shopSuccessURL = $shopSuccessURL;
    }

    /**
     * @return string
     */
    public function getShopSuccessURL()
    {
        return $this->shopSuccessURL;
    }

}
