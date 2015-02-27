<?php

namespace Core\DynamicBindingBundle\Doctrine\Mapping\Annotations;

use Doctrine\Common\Annotations\Annotation;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\Common\Annotations\AnnotationReader;

/**
* @Annotation
* @Target("CLASS")
*/

class Across
{
    /**
     * @var array 
     */
    public $targetEntities = [];
}
