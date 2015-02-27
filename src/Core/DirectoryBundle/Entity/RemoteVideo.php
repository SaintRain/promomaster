<?php

/**
 * Сущность Видео с видео-хостингов
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
//подключаем языки
use Core\CommonBundle\TranslatableProperties\Caption;

/**
 * RemoteVideo
 * @see https://github.com/Kunstmaan/KunstmaanMediaBundle
 * @ORM\Table(name= "core_directory_video_remote")
 * @ORM\Entity(repositoryClass="Core\DirectoryBundle\Entity\Repository\RemoteVideoRepository")
 */
class RemoteVideo
{
    use Caption;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Код с хостинга
     * @var string
     * @ORM\Column(name="code", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $code;

    /**
     * @var datetime $createdDatetime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="createdDatetime", type="datetime")
     */
    private $createdDatetime;

    /**
     * @var datetime $updatedDatetime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updatedDatetime", type="datetime")
     */
    private $updatedDatetime;

    /**
     * Хостинг с которго встраивается видео
     * @ORM\ManyToOne(targetEntity="VideoHosting", cascade={"persist"}, inversedBy="remoteVideoList")
     * @ORM\JoinColumn(name="video_hosting_id", referencedColumnName="id", onDelete="CASCADE")
     * @Assert\NotBlank()
     */
    protected $videoHosting;

    public function getId()
    {
        return $this->id;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    public function getCreatedDatetime()
    {
        return $this->createdDatetime;
    }

    public function getUpdatedDatetime()
    {
        return $this->updatedDatetime;
    }

    public function getVideoHosting()
    {
        return $this->videoHosting;
    }

    public function setVideoHosting(VideoHosting $videoHosting = null)
    {
        $this->videoHosting = $videoHosting;
        return $this;
    }

}
