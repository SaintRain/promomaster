<?php

/**
 * Поставщики товаров
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Core\CommonBundle\Validator\Constraints as CommonAssert;    //дополнительные проверки
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\ExecutionContextInterface;


/**
 * @Assert\Callback(methods={"isValid"})
 * @ORM\Table(name="core_logistics_supplier")
 * @ORM\Entity(repositoryClass="Core\LogisticsBundle\Entity\Repository\SupplierRepository")
 */
class Supplier {

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Организационно-правовая форма
     * @ORM\ManyToOne(targetEntity="Core\DirectoryBundle\Entity\LegalForm")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     * @Assert\NotBlank()
     */
    private $legalForm;

    /**
     * Название
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $caption;

    /**
     * ИНН
     * @ORM\Column(type="string", length=12, nullable=true)
     * @CommonAssert\INN()
     */
    private $inn;

    /**
     * КПП
     * @ORM\Column(type="string", length=9, nullable=true)
     * @CommonAssert\KPP()
     */
    private $kpp;

    /**
     * ОГРН
     * @ORM\Column(type="string", length=15, nullable=true)
     * @CommonAssert\OGRN()
     */
    private $ogrn;

    /**
     * Должность руководителя
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $positionOfTheHead;

    /**
     * ФИО руководителя
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nameOfTheHead;

    /**
     * Страна
     * @ORM\ManyToOne(targetEntity="Core\DirectoryBundle\Entity\Country")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     * @Assert\NotBlank()
     */
    private $country;

    /**
     * Город
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * Юр. адрес
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $addressUr;

    /**
     * Почтовый адрес
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $addressPost;

    /**
     * Телефон
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     * @CommonAssert\Phone
     */
    private $phone;

    /**
     * Факс
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     * @CommonAssert\Phone
     */
    private $fax;

    /**
     * Банковский идентификационный код
     * @var string
     * @ORM\Column(type="string", length=9, nullable=true)
     */
    private $bic;

    /**
     * Р/с в банке
     * @var string
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $paymentAccount;

    /**
     * Сайт
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Url
     */
    private $site;

    /**
     * Email
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Email
     */
    private $email;

    /**
     * Настройки для анализа прайсов поставщика
     * @ORM\OneToMany(targetEntity="SupplierPriceAnalysisSettings", orphanRemoval=true, mappedBy="supplier", cascade={"persist"})
     * @ORM\OrderBy({"indexPosition"="ASC"})
     */
    private $paSettings;

    /**
     * Валюта для цены закупки
     * @ORM\ManyToOne(targetEntity="Core\DirectoryBundle\Entity\Currency")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $paCurrency;

    /**
     * Минимальная сумма для оформления заказа
     * @var decimal
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    private $minSumForOrder;

    function __construct()
    {
        $this->paSettings = new ArrayCollection();
    }


    public function getId() {
        return $this->id;
    }

    public function getLegalForm() {
        return $this->legalForm;
    }

    public function setLegalForm($legalForm) {
        $this->legalForm = $legalForm;
        return $this;
    }

    public function getCaption() {
        return $this->caption;
    }

    public function setCaption($caption) {
        $this->caption = $caption;
        return $this;
    }

    public function getInn() {
        return $this->inn;
    }

    public function setInn($inn) {
        $this->inn = $inn;
        return $this;
    }

    public function getKpp() {
        return $this->kpp;
    }

    public function setKpp($kpp) {
        $this->kpp = $kpp;
        return $this;
    }

    public function getOgrn() {
        return $this->ogrn;
    }

    public function setOgrn($ogrn) {
        $this->ogrn = $ogrn;
        return $this;
    }

    public function getPositionOfTheHead() {
        return $this->positionOfTheHead;
    }

    public function setPositionOfTheHead($positionOfTheHead) {
        $this->positionOfTheHead = $positionOfTheHead;
        return $this;
    }

    public function getNameOfTheHead() {
        return $this->nameOfTheHead;
    }

    public function setNameOfTheHead($nameOfTheHead) {
        $this->nameOfTheHead = $nameOfTheHead;
        return $this;
    }

    public function getCountry() {
        return $this->country;
    }

    public function setCountry($country) {
        $this->country = $country;
        return $this;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
        return $this;
    }

    public function getAddressUr() {
        return $this->addressUr;
    }

    public function setAddressUr($addressUr) {
        $this->addressUr = $addressUr;
        return $this;
    }

    public function getAddressPost() {
        return $this->addressPost;
    }

    public function setAddressPost($addressPost) {
        $this->addressPost = $addressPost;
        return $this;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
        return $this;
    }

    public function getFax() {
        return $this->fax;
    }

    public function setFax($fax) {
        $this->fax = $fax;
        return $this;
    }

    public function getBic() {
        return $this->bic;
    }

    public function setBic($bic) {
        $this->bic = $bic;
        return $this;
    }

    public function getPaymentAccount() {
        return $this->paymentAccount;
    }

    public function setPaymentAccount($paymentAccount) {
        $this->paymentAccount = $paymentAccount;
        return $this;
    }

    public function getSite() {
        return $this->site;
    }

    public function setSite($site) {
        $this->site = $site;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getPaSettings()
    {
        return $this->paSettings;
    }

    /**
     * @param mixed $paSettings
     * @return Manufacturer
     */
    public function setPaSettings($paSettings)
    {
        $this->paSettings = $paSettings;
        return $this;
    }

    public function addPaSetting($paSetting)
    {
        $paSetting->setSupplier($this);
        $this->paSettings->add($paSetting);
        return $this;
    }

    public function removePaSetting($paSetting)
    {
        $this->paSettings->removeElement($paSetting);
        return $this;
    }

    function getPaCurrency()
    {
        return $this->paCurrency;
    }

    function setPaCurrency($paCurrency)
    {
        $this->paCurrency = $paCurrency;
        return $this;
    }

    /**
     * @return decimal
     */
    public function getMinSumForOrder()
    {
        return $this->minSumForOrder;
    }

    /**
     * @param decimal $minSumForOrder
     * @return Supplier
     */
    public function setMinSumForOrder($minSumForOrder)
    {
        $this->minSumForOrder = $minSumForOrder;
        return $this;
    }

    /**
     * Дополнительные проверки
     *
     */
    public function isValid(ExecutionContextInterface $context)
    {
        if ($this->paSettings->count() && !$this->paCurrency) {
            $context->buildViolation('Необходимо указать валюту в котором указываются цены в прайсе!')
                ->atPath('paCurrency')
                ->addViolation();
        }
    }



}

