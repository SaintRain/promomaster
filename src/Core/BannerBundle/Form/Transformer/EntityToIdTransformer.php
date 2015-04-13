<?php

 /**
 * 
 * @author  Kaluzhy N.
 * @copyright LLC "PromoMaster"
 */
namespace Core\BannerBundle\Form\Transformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;

class EntityToIdTransformer implements DataTransformerInterface
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;
    /**
     * @var string
     */
    protected $class;
    public function __construct(ObjectManager $objectManager, $class)
    {
        $this->objectManager = $objectManager;
        $this->class = $class;
    }
    public function transform($entity)
    {
        if (null === $entity) {
            return;
        }
        return $entity->getId();
    }
    public function reverseTransform($id)
    {
        if (!$id) {
            return null;
        }
        $entity = $this->getEntity($id);
        if (null === $entity) {
            throw new TransformationFailedException();
        }
        return $entity;
    }

    /**
     * @param $id
     * @return object
     */
    public function getEntity($id)
    {
        return $this->objectManager
            ->getRepository($this->class)
            ->find($id);
    }
}