<?php

/**
 * Базовая сущность для объединения записей в группы
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\UnionBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\MappedSuperclass 
 */
class CommonUnion {

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    public function getId() {
        return $this->id;
    }



}
