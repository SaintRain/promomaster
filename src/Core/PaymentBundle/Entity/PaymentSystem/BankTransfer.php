<?php

/**
 * Настройки платежной системы BankTransfer
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Entity\PaymentSystem;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;  //нужен для callback
use Core\PaymentBundle\Entity\PaymentSystem\CommonPaymentSystem;

/**
 * @ORM\Entity(repositoryClass="Core\PaymentBundle\Entity\PaymentSystem\Repository\BankTransferRepository")
 * @Assert\Callback(methods={"isValid"})
 */
class BankTransfer extends CommonPaymentSystem {

    /**
     * Продавец
     * ORM\OneToOne(targetEntity="Core\LogisticsBundle\Entity\Seller")
     * ORM\JoinColumn(referencedColumnName="id")
     */
//    private $seller;
//
//    public function getSeller() {
//        return $this->seller;
//    }
//
//    public function setSeller($seller) {
//        $this->seller = $seller;
//        return $this;
//    }
    
// -----------------------------------------------------------------------------
    
    /**
     * Имя получателя (ООО «РОСТПЭЙ»)
     * @var string
     * @ORM\Column(type="string", length=100, nullable=false)
     */
//    private $recipientName;

    /**
     * Адрес получателя (344011, г.  Ростов-на-Дону, пер. Доломановский, д. 70Д, офис №1001)
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     */
//    private $recipientAddress;

    /**
     * Название банка полностьсю (Южный филиал ОАО «Промсвязьбанк»)
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     */
//    private $bankNameFull;

    /**
     * Название банка сокращенно (ОАО «Промсвязьбанк»)
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     */
//    private $bankNameShort;

    /**
     * Адрес банка (г. Волгоград, ул. им. маршала Чуйкова, 65а)
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     */
//    private $bankAddress;

    /**
     * ИНН (6168024612)
     * @var string
     * @ORM\Column(type="string", length=12, nullable=false)
     * @Assert\Regex(pattern="/\d+/")
     */
//    private $INN;

    /**
     * КПП (616401001)
     * @var string
     * @ORM\Column(type="string", length=9, nullable=false)
     * @Assert\Regex(pattern="/\d+/")
     */
//    private $KPP;

    /**
     * ОГРН (1086168004669)
     * @var string
     * @ORM\Column(type="string", length=15, nullable=false)
     * @Assert\Regex(pattern="/\d+/")
     */
//    private $OGRN;

    /**
     * БИК (1084877)
     * @var string
     * @ORM\Column(type="string", length=9, nullable=false)
     * @Assert\Regex(pattern="/\d+/")
     */
//    private $BIK;

    /**
     * К/счет (40702810681000895501)
     * @var string
     * @ORM\Column(type="string", length=20, nullable=false)
     * @Assert\Regex(pattern="/\d+/")
     */
//    private $Kschet;

    /**
     * К/счет (40702810681000895501)
     * @var string
     * @ORM\Column(type="string", length=20, nullable=false)
     * @Assert\Regex(pattern="/\d+/")
     */
//    private $Rschet;

    /*
    public function getRecipientName() {
        return $this->recipientName;
    }

    public function setRecipientName($recipientName) {
        $this->recipientName = $recipientName;
        return $this;
    }

    public function getRecipientAddress() {
        return $this->recipientAddress;
    }

    public function setRecipientAddress($recipientAddress) {
        $this->recipientAddress = $recipientAddress;
        return $this;
    }

    public function getBankNameFull() {
        return $this->bankNameFull;
    }

    public function setBankNameFull($bankNameFull) {
        $this->bankNameFull = $bankNameFull;
        return $this;
    }

    public function getBankNameShort() {
        return $this->bankNameShort;
    }

    public function setBankNameShort($bankNameShort) {
        $this->bankNameShort = $bankNameShort;
        return $this;
    }

    public function getBankAddress() {
        return $this->bankAddress;
    }

    public function setBankAddress($bankAddress) {
        $this->bankAddress = $bankAddress;
        return $this;
    }

    public function getINN() {
        return $this->INN;
    }

    public function setINN($INN) {
        $this->INN = $INN;
        return $this;
    }

    public function getKPP() {
        return $this->KPP;
    }

    public function setKPP($KPP) {
        $this->KPP = $KPP;
        return $this;
    }

    public function getOGRN() {
        return $this->OGRN;
    }

    public function setOGRN($OGRN) {
        $this->OGRN = $OGRN;
        return $this;
    }

    public function getBIK() {
        return $this->BIK;
    }

    public function setBIK($BIK) {
        $this->BIK = $BIK;
        return $this;
    }

    public function getKschet() {
        return $this->Kschet;
    }

    public function setKschet($Kschet) {
        $this->Kschet = $Kschet;
        return $this;
    }

    public function getRschet() {
        return $this->Rschet;
    }

    public function setRschet($Rschet) {
        $this->Rschet = $Rschet;
        return $this;
    }
    */

    /**
     * Валидация
     *
     * @param \Symfony\Component\Validator\ExecutionContextInterface $context
     */
    public function isValid(ExecutionContextInterface $context) {
//        if (!preg_match('/(^[A-Z]{1}[0-9]{12}$)/', $this->getWallet())) {
//            $context->buildViolation('Invalid wallet!')
//                        ->atPath('wallet')
//                        ->addViolation();
//        }
    }

}
