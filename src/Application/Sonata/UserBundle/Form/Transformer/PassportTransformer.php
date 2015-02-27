<?php

/**
 * Форма адресата для контрагента физ. типа
 *
 * @author  Kaluzhniy. N.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Form\Transformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class PassportTransformer implements DataTransformerInterface
{

    public function transform($passport)
    {
        if (null === $passport) {
            return "";
        }
        return str_replace(' ', '',$passport);
    }

    public function reverseTransform($passport)
    {
        if (!$passport) {
            return '';
        }

        return str_replace(' ', '',$passport);
    }
} 