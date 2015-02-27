<?php

/**
 * Сущность видео-хостингов
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
//подключаем языки
use Core\CommonBundle\TranslatableProperties\Caption;
/**
 * VideoHosting
 * @ORM\Table(name= "core_directory_video_hosting")
 * @ORM\Entity(repositoryClass="Core\DirectoryBundle\Entity\Repository\VideoHostingRepository")
 */
class VideoHosting
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
     * Системное имя
     * @var string
     * @ORM\Column(name="name", type="string", length=255)
     * @Gedmo\Slug(fields={"captionRu"})
     */
    private $name;

    /**
     * Путь к плееру хостинга
     * @var string
     * @ORM\Column(name="playerUri", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Url()
     */
    private $playerUri;

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
     * Список городов
     * @var Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="RemoteVideo", mappedBy="videoHosting", cascade={"persist"}, orphanRemoval=true, fetch="EXTRA_LAZY")
     */
    private $remoteVideoList;

    public function __construct()
    {
        $this->remoteVideoList = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->captionRu;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCreatedDatetime()
    {
        return $this->createdDatetime;
    }

    public function getUpdatedDatetime()
    {
        return $this->updatedDatetime;
    }

    public function getPlayerUri()
    {
        return $this->playerUri;
    }

    public function setPlayerUri($playerUri)
    {
        $this->playerUri = $playerUri;

        return $this;
    }

    /**
     * @param \Core\DirectoryBundle\Entity\Doctrine\Common\Collections\ArrayCollection $remoteVideoList
     */
    public function setRemoteVideoList($remoteVideoList)
    {
        $this->remoteVideoList = $remoteVideoList;
    }

    /**
     * @return \Core\DirectoryBundle\Entity\Doctrine\Common\Collections\ArrayCollection
     */
    public function getRemoteVideoList()
    {
        return $this->remoteVideoList;
    }


}
