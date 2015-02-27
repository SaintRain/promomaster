<?php

/**
 * Подписчики которым надо сообщить о том когда выбранный ими товар поступил на склад.
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Entity\Subscribers;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="core_product_subscribers_to_report")
 * @ORM\Entity(repositoryClass="Core\ProductBundle\Entity\Repository\Subscribers\ToReportRepository")
 */
class ToReport {

    /**
     * Первичный ключ
     * @var bigint
     * @ORM\Column(type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Email на который надо отправить уведомление
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\Email()
     */
    protected $email;

    /**
     * Id продукта
     * @var string
     * @ORM\ManyToOne(targetEntity="Core\ProductBundle\Entity\CommonProduct")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    protected $product;

    /**
     * Время создания
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdDateTime;

    public function getId() {
        return $this->id;
    }

    /**
     * @param string $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    public function getProduct() {
        return $this->product;
    }

    public function setProduct($product) {
        $this->product = $product;
    }

    public function getCreatedDateTime() {
        return $this->createdDateTime;
    }

    public function setCreatedDateTime($createdDateTime) {
        $this->createdDateTime = $createdDateTime;
    }

}
