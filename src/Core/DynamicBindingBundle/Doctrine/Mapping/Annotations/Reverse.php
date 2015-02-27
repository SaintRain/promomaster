<?php

namespace Core\DynamicBindingBundle\Doctrine\Mapping\Annotations;

use Doctrine\Common\Annotations\Annotation;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\Common\Annotations\AnnotationReader;

/**
* @Annotation
* @Target("PROPERTY")
*/
final class Reverse extends Annotation
{
	public $targetEntity;

	public $mappedBy;

        public $cascade;

        public $orphanRemoval;
        
}

