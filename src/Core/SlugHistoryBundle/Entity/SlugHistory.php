<?php
/**
 * Сущность для стории изменения ЧПУ по разным сущностям
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SlugHistoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Application\Sonata\UserBundle\Entity\CommonContragent;
use Core\CommonBundle\TranslatableProperties\Note;

/**
 * @ORM\Table(name="core_slug_history", indexes={@ORM\Index(name="slug_idx", columns={"oldUrl"})}))
 * @ORM\Entity(repositoryClass="Core\SlugHistoryBundle\Entity\Repository\SlugHistoryRepository")
 */
class SlugHistory
{
    /**
     * Первичный ключ
     *
     * @var bigint
     * @ORM\Column(type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Дата создания
     *
     * @var datetime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * Cтарый url (генерируем по настройкам, которые у нас есть)
     *
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $oldUrl;

    /**
     * id сущности, которая содержит новый slug
     *
     * @var bigint
     * @ORM\Column(type="bigint")
     */
    private $targetId;

    /**
     * Сущность, которая содержит новый slug, например, Core\ProductBundle\Entity\CommonProduct
     *
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $className;

    public function __construct()
    {

    }

    public function getId()
    {
        return $this->id;
    }

    function getCreatedAt()
    {
        return $this->createdAt;
    }

    function getOldUrl()
    {
        return $this->oldUrl;
    }

    function getTargetId()
    {
        return $this->targetId;
    }

    function getClassName()
    {
        return $this->className;
    }

    function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    function setOldUrl($oldUrl)
    {
        $this->oldUrl = $oldUrl;
    }

    function setTargetId($targetId)
    {
        $this->targetId = $targetId;
    }

    function setClassName($className)
    {
        $this->className = $className;
    }
}