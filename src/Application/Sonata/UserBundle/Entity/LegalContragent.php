<?php

/**
 * Класс контрагентов юридического типа
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Core\DirectoryBundle\Entity\LegalForm;
use Symfony\Component\Validator\ExecutionContextInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * LegalContragent
 */

class LegalContragent extends CommonContragent {

    /**
     * Организационно-правовая форма
     * @var string
     */
    private $legalForm;

    /**
     * @var string
     */
    private $organization;

    /**
     * @var string
     */
    private $inn;

    /**
     * @var string
     */
    private $kpp;

    /**
     * @var string
     */
    private $ogrn;

    /**
     * Должность руководителя
     * @var string
     */
    private $chiefPosition;

    /**
     * ФИО руководителя
     * @var string
     */
    private $chiefFio;

    /**
     * Юридический адрес
     * @var string
     */
    private $addressLegal;

    /**
     * Почтовый адрес
     * @var string
     */
    private $addressPost;

    /**
     * @var integer
     */
    private $fax;

    /**
     * ФИО контактного лица
     * @var string
     */
    private $contactFio;

    /**
     * Банк
     * @var string
     */
    private $bank;

    /**
     * Расчетный счет в банке
     * @var string
     */
    private $bankAccount;

    /**
     * Сайт компании
     * @var string
     */
    private $site;

    /**
     * Кор. Счет
     * @var type
     */
    private $corrAccount;

    /**
     * Адресаты
     * @var \Application\Sonata\UserBundle\Entity\IndiContact
     */
    protected $contactList;

    public function __construct()
    {
        parent::__construct();
        $this->contactList = new ArrayCollection();
    }

    /**
     * Set organization
     *
     * @param string $organization
     * @return LegalContragent
     */
    public function setOrganization($organization) {
        $this->organization = $organization;

        return $this;
    }

    /**
     * Get organization
     *
     * @return string
     */
    public function getOrganization() {
        return $this->organization;
    }

    /**
     * Set inn
     *
     * @param integer $inn
     * @return LegalContragent
     */
    public function setInn($inn) {
        $this->inn = $inn;

        return $this;
    }

    /**
     * Get inn
     *
     * @return integer
     */
    public function getInn() {
        return $this->inn;
    }

    /**
     * Set kpp
     *
     * @param integer $kpp
     * @return LegalContragent
     */
    public function setKpp($kpp) {
        $this->kpp = $kpp;

        return $this;
    }

    /**
     * Get kpp
     *
     * @return integer
     */
    public function getKpp() {
        return $this->kpp;
    }

    /**
     * Set ogrn
     *
     * @param integer $ogrn
     * @return LegalContragent
     */
    public function setOgrn($ogrn) {
        $this->ogrn = $ogrn;

        return $this;
    }

    /**
     * Get ogrn
     *
     * @return integer
     */
    public function getOgrn() {
        return $this->ogrn;
    }

    /**
     * Set chiefPosition
     *
     * @param string $chiefPosition
     * @return LegalContragent
     */
    public function setChiefPosition($chiefPosition) {
        $this->chiefPosition = $chiefPosition;

        return $this;
    }

    /**
     * Get chiefPosition
     *
     * @return string
     */
    public function getChiefPosition() {
        return $this->chiefPosition;
    }

    /**
     * Set chiefFio
     *
     * @param string $chiefFio
     * @return LegalContragent
     */
    public function setChiefFio($chiefFio) {
        $this->chiefFio = $chiefFio;

        return $this;
    }

    /**
     * Get chiefFio
     *
     * @return string
     */
    public function getChiefFio() {
        return $this->chiefFio;
    }

    /**
     * Set addressLegal
     *
     * @param string $addressLegal
     * @return LegalContragent
     */
    public function setAddressLegal($addressLegal) {
        $this->addressLegal = $addressLegal;

        return $this;
    }

    /**
     * Get addressLegal
     *
     * @return string
     */
    public function getAddressLegal() {
        return $this->addressLegal;
    }

    /**
     * Set addressPost
     *
     * @param string $addressPost
     * @return LegalContragent
     */
    public function setAddressPost($addressPost) {
        $this->addressPost = $addressPost;

        return $this;
    }

    /**
     * Get addressPost
     *
     * @return string
     */
    public function getAddressPost() {
        return $this->addressPost;
    }

    /**
     * Set fax
     *
     * @param integer $fax
     * @return LegalContragent
     */
    public function setFax($fax) {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return integer
     */
    public function getFax() {
        return $this->fax;
    }

    /**
     * Set contactFio
     *
     * @param string $contactFio
     * @return LegalContragent
     */
    public function setContactFio($contactFio) {
        $this->contactFio = $contactFio;

        return $this;
    }

    /**
     * Get contactFio
     *
     * @return string
     */
    public function getContactFio() {
        return $this->contactFio;
    }

    public function getBank() {
        return $this->bank;
    }

    public function setBank($bank) {
        $this->bank = $bank;
        return $this;
    }

    /**
     * Set bankAccount
     *
     * @param integer $bankAccount
     * @return LegalContragent
     */
    public function setBankAccount($bankAccount) {
        $this->bankAccount = $bankAccount;

        return $this;
    }

    /**
     * Get bankAccount
     *
     * @return integer
     */
    public function getBankAccount() {
        return $this->bankAccount;
    }

    /**
     * Set site
     *
     * @param string $site
     * @return LegalContragent
     */
    public function setSite($site) { /*
      if ($site == 'http://') {
      $site = '';
      } */
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return string
     */
    public function getSite() {
        return $this->site;
    }

    public function getLegalForm() {
        return $this->legalForm;
    }

    public function setLegalForm(LegalForm $legalForm = null) {
        $this->legalForm = $legalForm;

        return $this;
    }

    /**
     * Имя для админки
     */
    public function getListName() {
        return $this->getOrganization();
    }

    public function getCorrAccount() {
        return $this->corrAccount;
    }

    public function setCorrAccount($corrAccount) {
        $this->corrAccount = $corrAccount;
        return $this;
    }

    public function getContactList()
    {
        return $this->contactList;
    }

    /**
     *
     * @param type $contactList
     * @return \Application\Sonata\UserBundle\Entity\CommonContragent
     */
    public function setContactList($contactList)
    {
        $this->contactList = $contactList;
        return $this;
    }

    /**
     *
     * @param \Application\Sonata\UserBundle\Entity\LegalContact $contact
     * @return \Application\Sonata\UserBundle\Entity\CommonContragent
     */
    public function addContactList(LegalContact $contact)
    {
        if (!$this->contactList->contains($contact)) {
            $contact->setContragent($this);
            $this->contactList->add($contact);
        }
        return $this;
    }

    /**
     *
     * @param \Application\Sonata\UserBundle\Entity\LegalContact $contact
     * @return \Application\Sonata\UserBundle\Entity\CommonContragent
     */
    public function removeContactList(LegalContact $contact)
    {

        $this->contactList->removeElement($contact);

        return $this;
    }

    /**
     * @link http://webhamster.ru/mytetrashare/index/mtb0/1386914786np4phmvb2k
     * @tutorial изначальнно известно лишь 22 весовых аргумента
     * Проверка
     * @param \Symfony\Component\Validator\ExecutionContextInterface $context
     */
    public function checkBankAccount($context) {
        if ($this->getBank()) {
            $weights = [7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7];
            $bik = $this->getBank()->getBic();
            $bankAccount = $this->getBankAccount();
            $lastThree = substr($bik, -3);
            if ($lastThree == '000' || $lastThree == '001') {
                $check = 0 . substr($bik, 4, 2) . $bankAccount;
            } else {
                $check = substr($bik, -3, 3) . $bankAccount;
            }

            $sum = 0;
            for ($i = 0, $strLength = strlen($check); $i < $strLength; $i++) {
                $sum += $check[$i] * $weights[$i];
            }
            $result = $sum % 10;

            if ($result != 0) {
                $context->buildViolation('Not valid bank account!')
                ->atPath('bankAccount')
                ->addViolation();
            }
        }
    }

    /**
     * Спец. проверки для организационно-правовых форм
     * @param type $context
     */
    public function checkLegalForm($context) {
        if ($this->getLegalForm()) {
            $legalForm = $this->getLegalForm()->getName();

            // тип ИП
            if ($legalForm == 'ip') {
                if (strlen($this->getInn()) != 12) {
                    $context->buildViolation('The length must be %length%!')
                    ->atPath('inn')
                    ->setParameter('%length%', 12)
                    ->addViolation();
                }
                if (strlen($this->getOgrn()) != 15) {
                    $context->buildViolation('The length must be %length%!')
                    ->atPath('ogrn')
                    ->setParameter('%length%', 15)
                    ->addViolation();
                }
            } else {
                if (!$this->getKpp()) {
                    $context->buildViolation('The kpp field should not be empty!')
                    ->atPath('kpp')
                    ->addViolation();
                }
                if (strlen($this->getInn()) != 10) {
                    $context->buildViolation('The length must be %length%!')
                    ->atPath('inn')
                    ->setParameter('%length%', 10)
                    ->addViolation();
                }
                if (strlen($this->getOgrn()) != 13) {
                    $context->buildViolation('The length must be %length%!')
                    ->atPath('ogrn')
                    ->setParameter('%length%', 13)
                    ->addViolation();
                }
            }
        }

    }

}
