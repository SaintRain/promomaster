<?php

/**
 * 
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Admin\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\TaskBundle\Entity\Issue;

class ExtraStatusTransformer implements DataTransformerInterface
{

    private $om;

    /**
     * @param ObjectManager $om
     */
    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    public function transform($id)
    {
        return $id;
//        if ($id) {
//            $object = $this->om
//                    ->getRepository('CoreOrderBundle:ExtraStatus')
//                    ->find($id);
//            var_dump($object);
//            return $object;
//        } else {
//            return $id;
//        }
    }

    public function reverseTransform($id)
    {
        
        if ($id) {
            $object = $this->om
                    ->getRepository('CoreOrderBundle:ExtraStatus')
                    ->find($id);
            return $object;
        } else {
            return $id;
        }
    }

}
