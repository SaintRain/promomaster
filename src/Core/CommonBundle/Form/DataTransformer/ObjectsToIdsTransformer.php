<?php

/**
 * Трансформер данных для формы ajax_entity
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\PersistentCollection;

class ObjectsToIdsTransformer implements DataTransformerInterface {

    private $doctrine;
    private $class;
    private $isCollection;
    private $logic;

    public function __construct($doctrine, $logic, $fOptions) {
        $this->doctrine = $doctrine;
        $this->logic = $logic;

        if (isset($this->logic->fieldsOptions[$fOptions['sourceEntity']])) {
            $options = $this->logic->fieldsOptions[$fOptions['sourceEntity']][$fOptions['fieldName']];
            $this->class = $options['targetEntity'];
            $this->isCollection = $options['isCollection'];
        }
    }

    public function transform($objects) {
        if (null === $objects) {
            return '';
        }

        if ($objects instanceof PersistentCollection) {
            $ids = array();
            foreach ($objects as $item) {
                $ids[] = $item->getId();
            }
            return implode(',', $ids);
        } elseif (method_exists($objects, 'getId')) {
            return $objects->getId();
        }
    }

    public function reverseTransform($ids) {
        if (null === $ids) {
            return null;
        }

        $objectsArray = $this->doctrine->getManager()->getRepository($this->class)->findBy(['id' => explode(',', $ids)]);
        if (count($objectsArray)) {
            if ($this->isCollection) {
                $objects = new ArrayCollection($objectsArray);
            } else {
                $objects = array_pop($objectsArray);
            }
        } else {
            $objects = null;
        }

        return $objects;
    }

}