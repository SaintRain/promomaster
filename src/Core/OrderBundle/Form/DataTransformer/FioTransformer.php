<?php

namespace Core\OrderBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class FioTransformer implements DataTransformerInterface
{
    public function reverseTransform($value)
    {
        ldd($value);
        die('dfd');
    }

    public function transform($value)
    {
        ldd($value);
        die('dfd');
    }

}