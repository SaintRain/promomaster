<?php



namespace Core\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\ExecutionContextInterface;
use Core\BannerBundle\Entity\CommonBanner;

/**
 * @ORM\Table(name="core_site_email_spam")
 * @ORM\Entity(repositoryClass="Core\SiteBundle\Entity\Repository\EmailSpamRepository")
 *

 */
class EmailSpam
{

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     *
     * @var string
     * @ORM\Column(type="string", length=250, nullable=false)
     * Assert\NotBlank()
     */
    private $name;

    /**
     *
     * @var string
     * @ORM\Column(type="string", length=250, nullable=false)
     * Assert\NotBlank()
     */
    private $site;
    /**
     *
     * @var string
     * @ORM\Column(type="string", length=250, nullable=false)
     * Assert\NotBlank()
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(type="boolean", nullable=true)
     * Assert\NotBlank()
     */
    private $isSended;

    /**
     * @var string
     * @ORM\Column(type="datetime", nullable=true)
     * Assert\NotBlank()
     */
    private $sendedAt;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getIsSended()
    {
        return $this->isSended;
    }

    /**
     * @param string $isSended
     */
    public function setIsSended($isSended)
    {
        $this->isSended = $isSended;
    }

    /**
     * @return string
     */
    public function getSendedAt()
    {
        return $this->sendedAt;
    }

    /**
     * @param string $sendedAt
     */
    public function setSendedAt($sendedAt)
    {
        $this->sendedAt = $sendedAt;
    }

    /**
     * @return string
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param string $site
     */
    public function setSite($site)
    {
        $this->site = $site;
    }


}

