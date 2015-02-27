<?php

namespace Core\TroubleTicketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Application\Sonata\UserBundle\Entity\User;
use Core\CategoryBundle\Entity\TroubleTicketCategory;

/**
 * TroubleTicket
 *
 * @ORM\Table(name="core_trouble_ticket")
 * @ORM\Entity(repositoryClass="Core\TroubleTicketBundle\Entity\Repository\TroubleTicketRepository")
 */
class TroubleTicket
{

    const SALT = 'olikids';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\NotBlank
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date_time", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdDateTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_date_time", type="datetime")
     * @Gedmo\Timestampable()
     */
    private $updatedDateTime;

    /**
     * @var string
     *
     * @ORM\Column(name="author_email", type="string", length=255)
     * @Assert\Email()
     * @Assert\NotBlank(groups={"Frontend"})
     */
    private $authorEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="author_name", type="string", length=255)
     * @Assert\NotBlank(groups={"Frontend"})
     */
    private $authorName;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text", nullable=true)
     */
    private $body;

    /**
     * Готовность
     * @var integer
     *
     * @ORM\Column(name="readiness", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $readiness = 0;

    /**
     * @ORM\ManyToOne(targetEntity="Core\TroubleTicketBundle\Entity\Status")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * @Assert\NotBlank()
     * @Assert\NotNull()
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="Core\TroubleTicketBundle\Entity\Priority")
     * @ORM\JoinColumn(name="priority_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * @Assert\NotBlank()
     * @Assert\NotNull()
     */
    private $priority;

    /**
     * @ORM\ManyToMany(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinTable(name="core_trouble_ticket_watcher",
     *      joinColumns={@ORM\JoinColumn(name="trouble_ticket_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")}
     *      )
     */
    private $watchers;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="manager_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     * @Assert\NotBlank(groups={"Backend"})
     */
    private $manager;

    /**
     * @ORM\ManyToOne(targetEntity="Core\CategoryBundle\Entity\TroubleTicketCategory")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * @Assert\NotBlank()
     * @Assert\NotNull()
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="Core\TroubleTicketBundle\Entity\Message", mappedBy="troubleTicket", cascade={"persist"}, indexBy="id")
     */
    private $messages;

    /**
     * @ORM\OneToMany(targetEntity="Core\TroubleTicketBundle\Entity\Log", mappedBy="troubleTicket", cascade={"persist"})
     */
    private $logs;

    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=255, unique=true)
     */
    private $hash;

    /**
     * @var string
     *
     * @ORM\Column(name="owner", type="string", length=255)
     * @Assert\NotBlank(groups={"Frontend"})
     */
    private $owner;

    /**
     * @ORM\ManyToMany(targetEntity="Core\FileBundle\Entity\DocumentFile", cascade={"persist"}, indexBy="id")
     * @ORM\JoinTable(name="core_trouble_ticket_match_file")
     * @ORM\OrderBy({"indexPosition" = "ASC"})
     */
    private $file;

    /**
     *
     * @var integer
     * @ORM\Column(name="admin_answers", type="integer", nullable=true)
     */
    private $adminAnswers = 0;

    /**
     *
     * @var boolean
     * @ORM\Column(name="is_admin_answer", type="boolean")
     */
    private $isAdminAnswer = true;

    /**
     * Связь с заказом
     * @ORM\ManyToOne(targetEntity="Core\OrderBundle\Entity\Order", inversedBy="tickets")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $order;

    /**
     * Связь с продуктом
     * @ORM\ManyToOne(targetEntity="Core\ProductBundle\Entity\CommonProduct", inversedBy="tickets")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $product;

    /**
     * Время обновления менеджером
     * @var \DateTime
     * @ORM\Column(name="updated_date_time_by_manager", type="datetime", nullable=true)
     */
    private $updatedDateTimeByManager;

    public function __toString()
    {
        return $this->getTitle() . '';
    }

    public function __construct()
    {
        $this->messages = new ArrayCollection();
        $this->logs = new ArrayCollection();
        $this->watchers = new ArrayCollection();
        $this->file = new ArrayCollection();
    }

    /**
     * @var integer
     *
     * @param integer $id
     * @return TroubleTicket
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return TroubleTicket
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set createdDateTime
     *
     * @param \DateTime $createdDateTime
     * @return TroubleTicket
     */
    public function setCreatedDateTime(\DateTime $createdDateTime)
    {
        $this->createdDateTime = $createdDateTime;

        return $this;
    }

    /**
     * Get createdDateTime
     *
     * @return \DateTime
     */
    public function getCreatedDateTime()
    {
        return $this->createdDateTime;
    }

    /**
     * Set updatedDateTime
     *
     * @param \DateTime $updatedDateTime
     * @return TroubleTicket
     */
    public function setUpdatedDateTime(\DateTime $updatedDateTime)
    {
        $this->updatedDateTime = $updatedDateTime;

        return $this;
    }

    /**
     * Get updatedDateTime
     *
     * @return \DateTime
     */
    public function getUpdatedDateTime()
    {
        return $this->updatedDateTime;
    }

    /**
     * Set authorEmail
     *
     * @param string $authorEmail
     * @return TroubleTicket
     */
    public function setAuthorEmail($authorEmail)
    {
        $this->authorEmail = $authorEmail;

        $this->setOwner($this->authorEmail);

        return $this;
    }

    /**
     * Get authorEmail
     *
     * @return string
     */
    public function getAuthorEmail()
    {
        return $this->authorEmail;
    }

    /**
     * Set authorName
     *
     * @param string $authorName
     * @return TroubleTicket
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;

        return $this;
    }

    /**
     * Get authorName
     *
     * @return string
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    public function getAuthor()
    {
        return array('Email' => $this->authorEmail, 'Имя' => $this->authorName);
    }

    /**
     * Set body
     *
     * @param string $body
     * @return TroubleTicket
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set readiness
     *
     * @param integer $readiness
     * @return TroubleTicket
     */
    public function setReadiness($readiness)
    {
        $this->readiness = $readiness;

        return $this;
    }

    /**
     * Get readiness
     *
     * @return integer
     */
    public function getReadiness()
    {
        return $this->readiness;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus(Status $status = null)
    {
        $this->status = $status;

        return $this;
    }

    public function getPriority()
    {
        return $this->priority;
    }

    public function setPriority(Priority $priority = null)
    {
        $this->priority = $priority;

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

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory(TroubleTicketCategory $category = null)
    {
        $this->category = $category;

        return $this;
    }

    public function getManager()
    {
        return $this->manager;
    }

    public function setManager(User $manager = null)
    {
        $this->manager = $manager;

        return $this;
    }

    /**
     *
     * @param \Core\TroubleTicketBundle\Entity\Message $message
     */
    public function addMessage(Message $message)
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
            $message->setTroubleTicket($this);
        }
    }

    /**
     *
     * @return Doctrine\Common\Collections\ArrayCollection
     */
    public function getMessages()
    {
        return $this->messages;
    }

    public function getSomething()
    {
        return $this->messages;
    }

    public function removeMessage($message)
    {
        $this->getMessages()->removeElement($message);
    }

    /**
     *
     * @param \Core\TroubleTicketBundle\Entity\Log $log
     */
    public function addLog(Log $log)
    {
        if (!$this->logs->contains($log)) {
            $this->logs[] = $log;
            $log->setTroubleTicket($this);
        }
    }

    /**
     *
     * @return Doctrine\Common\Collections\ArrayCollection
     */
    public function getLogs()
    {
        return $this->logs;
    }

    public function removeLog(Log $log)
    {
        $this->getLogs()->removeElement($log);
    }

    public function getHash()
    {
        return $this->hash;
    }

    public function setHash($hash = null)
    {

        $this->hash = md5(time() . $this->getRandString() . self::SALT);

        return $this;
    }

    protected function getRandString($length = 4)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

        return substr(str_shuffle($chars), 0, $length);
    }

    public function getIsAdminAnswer()
    {
        return $this->isAdminAnswer;
    }

    public function setIsAdminAnswer($isAdminAnswer)
    {
        $this->isAdminAnswer = $isAdminAnswer;

        return $this;
    }

    public function addWatcher(User $watcher)
    {
        if (!$this->watchers->contains($watcher)) {
            $this->watchers[] = $watcher;
        }
    }

    public function getWatchers()
    {
        return $this->watchers;
    }

    public function removeWatcher(User $watcher)
    {
        $this->getWatchers()->removeElement($watcher);
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    public function addFile($file)
    {
        $this->file->add($file);

        return $this;
    }

    public function removeFile($file)
    {
        $this->file->removeElement($file);

        return $this;
    }

    public function getValueForKey($key)
    {
        $method = 'get' . $key;
        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setOwner($owner)
    {
        $this->owner = md5($owner . self::SALT);

        return $this;
    }

    public function getAdminAnswers()
    {
        return $this->adminAnswers;
    }

    public function setAdminAnswers($adminAnswers = 0)
    {
        if ($adminAnswers) {
            $this->adminAnswers++;
        } else {
            $this->adminAnswers = 0;
        }

        return $this;
    }

    /**
     * Поля котрые необходимо записывать в лог
     * @return type
     */
    public function getFieldsForLog()
    {
        return array(
            'title',
            'body',
            'readiness',
            'status',
            'priority',
            'manager',
            'category'
        );
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }

    public function getUpdatedDateTimeByManager()
    {
        return $this->updatedDateTimeByManager;
    }

    public function setUpdatedDateTimeByManager(\DateTime $updatedDateTimeByManager)
    {
        $this->updatedDateTimeByManager = $updatedDateTimeByManager;
        return $this;
    }

}
