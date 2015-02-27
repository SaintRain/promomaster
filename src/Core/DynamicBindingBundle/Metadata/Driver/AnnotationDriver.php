<?php

namespace Core\DynamicBindingBundle\Metadata\Driver;

use Metadata\Driver\DriverInterface;
use Metadata\MergeableClassMetadata;
use Doctrine\Common\Annotations\Reader;
use Matthias\AnnotationBundle\Metadata\PropertyMetadata;

class AnnotationDriver implements DriverInterface
{
    private $reader;

    public function __construct(Reader $reader)
    {
        $this->reader = $reader;
    }

    public function loadMetadataForClass(\ReflectionClass $class)
    {
        $classMetadata = new MergeableClassMetadata($class->getName());

        foreach ($class->getProperties() as $reflectionProperty) {
            $propertyMetadata = new PropertyMetadata($class->getName(), $reflectionProperty->getName());

            $annotation = $this->reader->getPropertyAnnotation(
                $reflectionProperty,
                'Matthias\\AnnotationBundle\\Annotation\\DefaultValue'
            );

            if (null !== $annotation) {
                // a "@DefaultValue" annotation was found
                $propertyMetadata->defaultValue = $annotation->value;
            }

            $classMetadata->addPropertyMetadata($propertyMetadata);
        }

        return $classMetadata;
    }
}

