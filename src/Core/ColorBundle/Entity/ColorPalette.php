<?php

/**
 * Сущность цветов (диапазон)
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ColorBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;  //нужен для callback
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="core_directory_color_palette")
 * @ORM\Entity(repositoryClass="Core\ColorBundle\Entity\Repository\ColorPaletteRepository")
 * @Assert\Callback(methods={"isValid"})
 */
class ColorPalette {

    /**
     * Первичный ключ
     * @var smallint
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Цвет в формате hex
     * @var string
     * @ORM\Column(type="string", length=6, nullable=false, unique=true)
     * @Assert\NotBlank()
     */
    private $hex;

    /**
     * Индекс позиции сортировки
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $indexPosition;

    /**
     * @ORM\ManyToOne(targetEntity="Color", inversedBy="palette")
     * @ORM\JoinColumn(name="main_color_id", referencedColumnName="id")
     */
    protected $main;

    public function __construct() {

    }

    public function getId() {
        return $this->id;
    }

    public function getHex() {
        return $this->hex;
    }

    public function setHex($hex) {
        $this->hex = $hex;
        return $this;
    }

    public function getIndexPosition() {
        return $this->indexPosition;
    }

    public function setIndexPosition($indexPosition) {
        $this->indexPosition = $indexPosition;
        return $this;
    }

    public function getMain() {
        return $this->main;
    }

    public function setMain($main) {
        $this->main = $main;
        return $this;
    }

    /**
     * Валидация введенного hex строки
     *
     * @param \Symfony\Component\Validator\ExecutionContextInterface $context
     */
    public function isValid(ExecutionContextInterface $context) {
        if (!preg_match('/(^[0-9a-fA-F]{6}$)|(^[0-9a-fA-F]{3}$)|(^null$)/', $this->getHex())) {
            $context->buildViolation('Invalid characters! (0-9,a-f,A-f and \'null\')')
                    ->atPath('hex')
                    ->addViolation();
        }
    }

}
