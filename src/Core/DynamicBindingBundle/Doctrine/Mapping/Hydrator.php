<?php

namespace Core\DynamicBindingBundle\Doctrine\Mapping;


use Doctrine\Common\Annotations\AnnotationReader;

class Hydrator
{
	public static function hydrateObject($entityClass, $data)
	{
            ldd('dfdf');
		$reader = new AnnotationReader();
		$reflectionObj = new \ReflectionObject(new $entityClass);

		foreach($data as $key => $value) {
			$property = Inflector::camelize($key);
			if($reflectionObj->hasProperty($property)) {
				$reflectionProp = new \ReflectionProperty($entityClass, $property);
				$relation = $reader->getPropertyAnnotation($reflectionProp, 'MyProject\\Annotations\\ApiRelation');

				if($relation) {
					if($relation->single()) {
						// Do something
					} else if($relation->multiple()) {
						// Do something
					}
				}
			}
		}
		// Do something
	}
}
