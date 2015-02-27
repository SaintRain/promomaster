<?php

/**
 * Сущность валют
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Intl\Intl;

/**
 * @ORM\Table(name="core_directory_currency")
 * @ORM\Entity(repositoryClass="Core\DirectoryBundle\Entity\Repository\CurrencyRepository")
 */
class Currency
{

    /**
     * Первичный ключ
     * @var smallint
     * @ORM\Column(name="id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Активность валюты
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $isEnabled;

    /**
     * Валюта
     * @var string
     * @ORM\Column(type="string", length=3, nullable=false)
     * @Assert\NotBlank()
     */
    private $currency;

    /**
     * Катировка
     * @var string
     * @ORM\Column(type="float", nullable=true)
     */
    private $rate;

    /**
     * @var datetime
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @var datetime
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;

    /**
     * Индекс позиции сортировки
     * @var bigint
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $indexPosition;
    
    /**
     * Курс к рублю
     * @var float
     * @ORM\Column(type="decimal", scale=5)
     */
    private $currencyRUB;

    /**
     * Время последнего обновления курса
     * @var datetime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $currencyDateTime;
        
    /**
     * Символ валюты
     * @var string
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $symbol;

    public function __toString()
    {
        return $this->getCaptionRu();
    }

    public function __construct()
    {
        $this->isEnabled = false;
    }

    public function __call($name, $arguments)
    {
        if (strpos($name, 'getCaption') === 0) {
            $locale = strtolower(substr($name, -2));

            $caption = Intl::getCurrencyBundle()->getCurrencyName($this->currency, $locale);
            if ($caption === null) {
                $caption = Intl::getCurrencyBundle()->getCurrencyName($this->currency, 'ru');
            }
            return $caption;
        }
    }

    public function __get($name)
    {
        return $this->{'get' . ucfirst($name)}();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
        return $this;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    public function getRate()
    {
        return $this->rate;
    }

    public function setRate($rate)
    {
        $this->rate = $rate;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getSymbol()
    {
        return $this->symbol;
    }

    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
        return $this;
    }

    public function getIndexPosition()
    {
        return $this->indexPosition;
    }

    public function setIndexPosition($indexPosition)
    {
        $this->indexPosition = $indexPosition;
        return $this;
    }

    public function getCurrencyDateTime()
    {
        return $this->currencyDateTime;
    }

    public function setCurrencyDateTime($currencyDateTime)
    {
        $this->currencyDateTime = $currencyDateTime;
        return $this;
    }

    public function getCurrencyRUB()
    {
        return $this->currencyRUB;
    }

    public function setCurrencyRUB($currencyRUB)
    {
        $this->currencyRUB = $currencyRUB;
        return $this;
    }

}
