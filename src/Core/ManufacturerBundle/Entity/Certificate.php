<?php

/**
 * Сертификаты
 * 
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ManufacturerBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="core_manufacturer_certificate")
 * @ORM\Entity(repositoryClass="Core\ManufacturerBundle\Entity\Repository\CertificateRepository")
 */
class Certificate {

    /**
     * Первичный ключ
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Название сертификата
     * @var string
     * @ORM\Column(type="string", length=300)
     * @Assert\NotBlank()
     */
    private $captionRu;

    /**
     * Дата получения
     * @var DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateOfReceipt;

    /**
     * URL сертификата
     * @var string
     * @ORM\Column(type="string", length=250, nullable=true)
     * @Assert\Url()
     */
    private $url;

    /**
     * Бренды
     * @ORM\ManyToOne(targetEntity="Manufacturer", inversedBy="certificates")
     * @ORM\JoinColumn( referencedColumnName="id")
     */
    private $manufacturer;

    /**
     * Логотип
     * @ORM\OneToOne(targetEntity="Core\FileBundle\Entity\ImageFile", cascade={"persist"})
     * @ORM\JoinColumn(name="logo_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $logo;

    /**
     * Подтверждающий документ
     * @ORM\OneToOne(targetEntity="Core\FileBundle\Entity\DocumentFile", cascade={"persist"})
     * @ORM\JoinColumn(name="document_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $document;

    public function __construct() {
    }

    public function getId() {
        return $this->id;
    }

    public function getCaptionRu() {
        return $this->captionRu;
    }

    public function setCaptionRu($captionRu) {
        $this->captionRu = $captionRu;
        return $this;
    }

    public function getDateOfReceipt() {
        return $this->dateOfReceipt;
    }

    public function setDateOfReceipt($dateOfReceipt) {
        $this->dateOfReceipt = $dateOfReceipt;
        return $this;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

    public function getManufacturer() {
        return $this->manufacturer;
    }

    public function setManufacturer($manufacturer) {
        $this->manufacturer = $manufacturer;
        return $this;
    }

    public function getLogo() {
        return [$this->logo];
    }

    public function setLogo($logo) {
        $this->logo = $logo;
        return $this;
    }

    public function addLogo($logo) {
        $this->logo = $logo;
        return $this;
    }

    public function removeLogo($logo) {
        $this->logo = null;
        return $this;
    }

    public function getDocument() {
        return $this->document ? [$this->document] : null;
    }

    public function setDocument($document) {
        $this->document = $document;
        return $this;
    }

    public function addDocument($document) {
        $this->document = $document;
        return $this;
    }

    public function removeDocument($document) {
        $this->document = null;
        return $this;
    }
}
