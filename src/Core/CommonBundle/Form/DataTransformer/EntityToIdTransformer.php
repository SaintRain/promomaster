<?php

/**
 * Трансформер данных для формы ajax_entity
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;

class EntityToIdTransformer implements DataTransformerInterface
{
    protected $em;
    
    public function __construct($em)
    {
        $this->em = $em;
    }

    public function reverseTransform($value)
    {
        ldd($value);
        return $value->getId();
    }

    public function transform($value)
    {
        if ($value) {
            ldd($value);
            return $value->getId();
        }
        return null;
    }

}
