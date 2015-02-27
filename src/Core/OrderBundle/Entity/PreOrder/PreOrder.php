<?php
/**
 * Подписчики на продукты которые заказываются под заказ
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Entity\PreOrder;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Core\DirectoryBundle\Entity\City;
use Core\ProductBundle\Entity\CommonProduct;
use Symfony\Component\Validator\ExecutionContext;
use Application\Sonata\UserBundle\Entity\CommonContragent;
use Core\OrderBundle\Entity\PreOrder\PreOrderStatus;
use Core\OrderBundle\Entity\Order;
use Application\Sonata\UserBundle\Entity\User;
use Symfony\Component\Validator\ExecutionContextInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Core\CommonBundle\Validator\Constraints as CoreContraints;
use Core\OrderBundle\Entity\PreOrder\PreOrderComposition;

/**
 * @ORM\Table(name="core_order_pre_order")
 * @ORM\Entity(repositoryClass="Core\OrderBundle\Entity\Repository\PreOrder\PreOrderRepository")
 */
class PreOrder
{
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
     * @Assert\NotBlank()
     */
    protected $email;

    /**
     * Телефон пользователя
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     * @CoreContraints\Phone()
     * @Assert\Length(min = 10)
     */
    protected $phone;

    /**
     * @var string
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    protected $address;

    /**
     * @var string
     * @ORM\Column(type="string", length=150)
     * @Assert\Regex("/^[а-яА-Яa-zA-z-' ]+$/u")
     * @Assert\NotBlank()
     */
    protected $firstName;

    /**
     * @var string
     * @ORM\Column(type="string", length=150)
     * @Assert\Regex("/^[а-яА-Яa-zA-z-' ]+$/u")
     * @Assert\NotBlank()
     */
    protected $lastName;

    /**
     * @var string
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Assert\Regex("/^[а-яА-Яa-zA-z-' ]+$/u")
     */
    protected $surName;

    /**
     * Город доставки
     * @ORM\ManyToOne(targetEntity="Core\DirectoryBundle\Entity\City")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotBlank()
     */
    protected $city;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\CommonContragent")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    protected $contragent;

    /**
     * @var \Application\Sonata\UserBundle\Entity\User
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    protected $user;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="PreOrderStatus")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    protected $status;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="Core\OrderBundle\Entity\Order")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    protected $order;

    /**
     * Время создания
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdDateTime;

    /**
     * Комментарии заказа
     * @ORM\OneToMany(targetEntity="AdminCommentToPreOrder", cascade={"persist"}, mappedBy="preOrder")
     */
    private $adminComments;

    /**
     * Пользователи, которые подписаны на обновление коментариев
     * @ORM\ManyToMany(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinTable(name="core_order_admin_preorder_comments_match_user")
     */
    private $subscribersOnAdminComments;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $cancelReason;

    /**
     * Отправлять письмо заказчику когда статус отменен
     * @ORM\Column(type="boolean", nullable=true, options={"default" = 1})
     * @var boolean
     */
    private $isSendCancelMsg = true;

    /**
     * Состав рредзаказа
     * @ORM\OneToMany(targetEntity="PreOrderComposition", cascade={"persist"}, orphanRemoval=true, mappedBy="preOrder")
     * @ORM\OrderBy({"indexPosition"="ASC"})
     * @Assert\NotBlank()
     */
    private $compositions;

    /**
     * Доступно ли в админке, может скрываться после присоединения заказы
     * @ORM\Column(type="boolean", nullable=true, options={"default" = 1})
     * @var boolean
     */
    private $isVisible = true;

    public function __construct()
    {
        $this->adminComments = new ArrayCollection();
        $this->compositions  = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getIsDone()
    {
        return $this->isDone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    public function setIsDone($isDone)
    {
        $this->isDone = $isDone;
        return $this;
    }

    public function getCreatedDateTime()
    {
        return $this->createdDateTime;
    }

    public function setCreatedDateTime($createdDateTime)
    {
        $this->createdDateTime = $createdDateTime;
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getSurName()
    {
        return $this->surName;
    }

    public function setSurName($surName)
    {
        $this->surName = $surName;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity(City $city = null)
    {
        $this->city = $city;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus(PreOrderStatus $status = null)
    {
        $this->status = $status;
        return $this;
    }

    public function getContragent()
    {
        return $this->contragent;
    }

    public function setContragent(CommonContragent $contragent = null)
    {
        $this->contragent = $contragent;
        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(User $user = null)
    {
        $this->user = $user;
        return $this;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function setOrder(Order $order)
    {
        $this->order = $order;
        return $this;
    }

    public function getFullName()
    {
        return trim(sprintf("%s %s %s", $this->getLastName(),
                $this->getFirstName(), $this->getSurName()));
    }

    public function getAdminComments()
    {
        return $this->adminComments;
    }

    public function setAdminComments($adminComments)
    {
        $this->adminComments = $adminComments;
        return $this;
    }

    public function addAdminComments($adminComments)
    {
        $this->adminComments->add($adminComments);
        return $this;
    }

    public function removeAdminComments($adminComments)
    {
        $this->adminComments->removeElement($adminComments);
        return $this;
    }

    public function getSubscribersOnAdminComments()
    {
        return $this->subscribersOnAdminComments;
    }

    public function setSubscribersOnAdminComments($subscribersOnAdminComments)
    {
        $this->subscribersOnAdminComments = $subscribersOnAdminComments;
        return $this;
    }

    public function addSubscribersOnAdminComments($subscribersOnAdminComments)
    {
        $this->subscribersOnAdminComments->add($subscribersOnAdminComments);
        return $this;
    }

    public function removeSubscribersOnAdminComments($subscribersOnAdminComments)
    {
        $this->subscribersOnAdminComments->removeElement($subscribersOnAdminComments);
        return $this;
    }

    public function getFullAddress()
    {
        return array(
            'city' => ($this->getCity()) ? $this->getCity()->getName() : '',
            'address' => $this->getAddress()
        );
    }

    public function getCancelReason()
    {
        return $this->cancelReason;
    }

    public function setCancelReason($cancelReason)
    {
        $this->cancelReason = $cancelReason;
        return $this;
    }

    public function getIsSendCancelMsg()
    {
        return $this->isSendCancelMsg;
    }

    public function setIsSendCancelMsg($isSendCancelMsg)
    {
        $this->isSendCancelMsg = $isSendCancelMsg;
        return $this;
    }

    function getCompositions()
    {
        return $this->compositions;
    }

    function setCompositions($compositions)
    {
        $this->compositions = $compositions;
        return $this;
    }

    public function addComposition($composition)
    {
        $composition->setPreOrder($this);
        $this->compositions->add($composition);
        return $this;
    }

    public function removeComposition($composition)
    {
        $this->compositions->removeElement($composition);
        return $this;
    }

    function getIsVisible()
    {
        return $this->isVisible;
    }

    function setIsVisible($isVisible)
    {
        $this->isVisible = $isVisible;
        return $this;
    }

    public function getFio()
    {
        return sprintf('%s %s %s', $this->getLastName(), $this->getFirstName(), $this->getSurName());
    }

    public function setFio($value)
    {
        $fio = explode(' ', trim($value));
        if (isset($fio[0])){
            $this->setLastName($fio[0]);
        }
        if (isset($fio[1])) {
            $this->setFirstName($fio[1]);
        }
        if (isset($fio[2]) && count($fio) == 3) {
            $this->setSurName($fio[2]);
        } elseif (isset($fio[2]) && count($fio) > 3) {
            $surName = implode(' ', array_slice($fio, 2));
            $this->setSurName($surName);
        } 
    }

    /**
     * @Assert\Callback
     */
    public function isValid(ExecutionContextInterface $context)
    {
        if (!$this->getContragent() && !$this->getSurName()) {
            $context->buildViolation('Необходимо указать отчество')
                ->atPath('surName')
                ->addViolation();
        }
        if ($this->getUser() && $this->getContragent() && ($this->getContragent()->getUser()->getId()
            != $this->getUser()->getId())) {
            $context->buildViolation('Для выбранного контрагента неверно указан пользователь')
                ->addViolation();
            $context->buildViolation('')
                ->atPath('user')
                ->addViolation();
        }
        /*
        $fio = explode(' ', trim($this->getFio()));
        // проверка ФИО
        if (count($fio) < 3 && !$this->getContragent()) {
        $context->buildViolation('Необходимо указать фамилию, имя и отчество')
                ->atPath('fio')
                ->addViolation();    
        } elseif (!preg_match("/^[а-яА-Яa-zA-z\-' ]+$/u", $this->getFio())) {
            $context->buildViolation('Пожалуйста, используйте только буквы, тире и апостроф')
                ->atPath('fio')
                ->addViolation();
        }*/
    }
}