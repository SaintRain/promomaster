<?php
namespace Core\DynamicBindingBundle\Subscriber;

use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Query\ResultSetMapping;
use Metadata\PropertyMetadata;
use Doctrine\Common\Persistence\Mapping\ReflectionService;
use Doctrine\Common\Collections\ArrayCollection;


class SequencePrefixSubscriber implements \Doctrine\Common\EventSubscriber
{
    const BIND_CLASS = 'Core\DynamicBindingBundle\Entity\Binding';
    
    const ANNOTATION_CLASS = 'Core\\DynamicBindingBundle\\Doctrine\\Mapping\Annotations\\Reverse';

    protected $config;

    public function __construct($config = null)
    {
        $this->config = $config;
    }

    public function getSubscribedEvents()
    {
        return array(/*'loadClassMetadata',*/ 'postLoad', 'prePersist');
    }

    public function loadClassMetadata(LoadClassMetadataEventArgs $args)
    {
        $metadata = $args->getClassMetadata();
        $class = $metadata->getReflectionClass();
        $fromEntities = [];
        foreach($this->config['binding'] as $key => $val) {
            $fromEntities[$val['long']] = $key;
        }
        if (array_key_exists($class->getName(), $fromEntities)) {
            $bindingMetadata = $args->getEntityManager()->getClassMetadata(self::BIND_CLASS);
            //$discrMap = $this->config['binding'][$fromEntities[$class->getName()]]['grant'];
            
            $bindingMetadata->mapManyToOne(array(
                'fieldName' => 'fromEntity',
                'joinColumns' => array([/*'name' => 'fromEntityId',*/ 'referencedColumnName' => 'id', 'onDelete' => 'CASCADE']),
                'targetEntity' => $class->getName(),
                'inversedBy' => 'dynamicFields'
            ));
            /*
            $bindingMetadata->setDiscriminatorColumn(array(
                'name' => 'fromEntityType',
                'type' => 'string',
                'length' => 255,
                'columnDefinition' => null
            ));
             * 
             */
                         
            //$bindingMetadata->setDiscriminatorMap(array($fromEntities[$class->getName()]));
            $reader = new AnnotationReader();
            
            //$annotations = $reader->getClassAnnotations($class);
            foreach ($class->getProperties() as $reflectionProperty) {
                $annotation = $reader->getPropertyAnnotation($reflectionProperty,self::ANNOTATION_CLASS);
                if ($annotation) {
                    $annotation = (array)$annotation;
                    //unset($annotation['value']);
                    $annotation['mappedBy'] = 'fromEntity';
                    $annotation['fieldName'] = $reflectionProperty->getName();
                    $metadata->mapOneToMany($annotation);
                }
            }
        }
        
    }
    /*
    public function postLoad(LifecycleEventArgs $eventArgs)
    {
        $fromEntity = $eventArgs->getEntity();
        $className = get_class($fromEntity);
        
        $bindingMetadata = $eventArgs->getEntityManager()->getClassMetadata(self::BIND_CLASS);
        $bindingMetadata->mapManyToOne(array(
                'fieldName' => 'fromEntity',
                'joinColumns' => array(['name' => 'fromEntityId', 'referencedColumnName' => 'id', 'onDelete' => 'CASCADE']),
                'targetEntity' => $className,
                'inversedBy' => 'dynamicFields'
            ));
        
        ldd($bindingMetadata);
        return true;
        
        $fromEntities = [];
        foreach($this->config['binding'] as $key => $val) {
            $fromEntities[$val['long']] = $key;
        }
        
        if (array_key_exists($className, $fromEntities)) {
            $reader = new AnnotationReader();
            $em = $eventArgs->getEntityManager();
            $metadata = $em->getClassMetadata($className);
            ldd($metadata);
            $refClass = $metadata->getReflectionClass();
            foreach ($refClass->getProperties() as $reflectionProperty) {
                $annotation = $reader->getPropertyAnnotation($reflectionProperty,self::ANNOTATION_CLASS);
                if ($annotation) {
                    
                    $productReflProp = $metadata->reflClass->getProperty($reflectionProperty->getName());
                    $productReflProp->setAccessible(true);
                    $rsm = new ResultSetMapping();
                    $rsm->addEntityResult(self::BIND_CLASS, 'o')
                        ->addFieldResult('o', 'id', 'id')
                        ->addFieldResult('o', 'fromEntityId', 'fromEntityId')
                        //->addJoinedEntityResult($className, 'c', 'u', 'fromEntity')
                        //->addMetaResult('o', 'fromEntity', 'fromEntityId')
                        ->addFieldResult('o', 'fromEntityType', 'fromEntityType')
                        ->addFieldResult('o', 'toEntityId', 'toEntityId')
                        ->addFieldResult('o', 'toEntityType', 'toEntityType')
                    ;

                    $query = $em->createNativeQuery('SELECT o.id, o.fromEntityId, o.fromEntityType, o.toEntityId, o.toEntityType FROM core_binding o WHERE o.fromEntityId = :fromEntityId AND o.fromEntityType = :fromEntityType', $rsm);
                    $query->setParameter('fromEntityType', $fromEntities[$className])
                            ->setParameter('fromEntityId', $fromEntity->getId())
                    ;
                    $entities = $query->getResult();
                    //ldd($entities);
                    //$entities = $em->getRepository(self::BIND_CLASS)->findAll();
                    //ld($entities);
                    
                    $productReflProp->setValue($fromEntity, $entities);
                    
                }
            }
            
        }
    }*/


    /*
    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        return true;
        $object = $eventArgs->getObject();
        $em = $eventArgs->getEntityManager();
        $object->setFromEntityType('DataProperty')
                ->setToEntityType('Article')
                ->setToEntityId(13)
        ;
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult(self::BIND_CLASS, 'o')
                        ->addFieldResult('o', 'id', 'id')
                        //->addFieldResult('o', 'fromEntityId', 'fromEntityId')
                        //->addJoinedEntityResult($className, 'c', 'u', 'fromEntity')
                        //->addMetaResult('o', 'fromEntity', 'fromEntityId')
                        ->addFieldResult('o', 'fromEntityType', 'fromEntityType')
                        ->addFieldResult('o', 'toEntityId', 'toEntityId')
                        ->addFieldResult('o', 'toEntityType', 'toEntityType')
        ;
        $sql = 'INSERT INTO core_binding (fromEntityType, fromEntityId, toEntityType, toEntityId) VALUES (?, ?, ?, ?)';
        $conn = $eventArgs->getEntityManager()->getConnection();

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, 'DataProperty');
        $stmt->bindValue(2, 68);
        $stmt->bindValue(3, 'Article');
        $stmt->bindValue(4, 13);
        $stmt->execute();
    }
    */

    public function postLoad(LifecycleEventArgs $eventArgs)
    {
        //return true;
        $fromEntity = $eventArgs->getEntity();
        $className = get_class($fromEntity);

        $fromEntities = [];
        foreach($this->config['binding'] as $key => $val) {
            $fromEntities[$val['long']] = $key;
        }

        if (array_key_exists($className, $fromEntities)) {
            $collection = new ArrayCollection();
            $curConfig = $this->config['binding'][$fromEntities[$className]];
            $em = $eventArgs->getEntityManager();
            $productReflProp = $em->getClassMetadata($className)
                ->reflClass->getProperty($curConfig['property']);
            
            $getter = 'get'.ucfirst($curConfig['property']);
            
            $res = $fromEntity->$getter();
            //ldd($res);
            
            $productReflProp->setAccessible(true);
            $entities = $em->getRepository(self::BIND_CLASS)
                    ->findBy(['fromEntityId'=> $fromEntity->getId(),
                                'fromEntityType' => $fromEntities[$className]]
                            );
            $groups = [];
            foreach ($entities as $val) {
                $groups[$val->getToEntityType()][$val->getToEntityId()] = $val;
            }
            foreach ($groups as $key => $val) {
                $query = $em->createQuery('SELECT o FROM ' . $curConfig['grant'][$key]. ' o WHERE o.id IN (?1)');
                $query->setParameter(1, array_keys($val));
                $result = $query->getResult();
                foreach ($result as $cur) {
                    if (isset($val[$cur->getId()])) {
                        $val[$cur->getId()]->setToEntity($cur);
                        $val[$cur->getId()]->setFromEntity($fromEntity);
                        $collection[] = $val[$cur->getId()];
                    }
                }
            }
           
            //$productReflProp->setValue($fromEntity, $entities);
            $productReflProp->setValue($fromEntity, $collection);
            /*
            $productReflProp->setValue(
                $order, $this->dm->getReference('Documents\Product', $order->getProductId())
            );
            foreach ($refClass->getProperties() as $reflectionProperty) {
                $annotation = $reader->getPropertyAnnotation($reflectionProperty,self::ANNOTATION_CLASS);
                if ($annotation) {

                    $productReflProp = $metadata->reflClass->getProperty($reflectionProperty->getName());
                    $productReflProp->setAccessible(true);
                    $rsm = new ResultSetMapping();
                    $rsm->addEntityResult(self::BIND_CLASS, 'o')
                        ->addFieldResult('o', 'id', 'id')
                        ->addFieldResult('o', 'fromEntityId', 'fromEntityId')
                        //->addJoinedEntityResult($className, 'c', 'u', 'fromEntity')
                        //->addMetaResult('o', 'fromEntity', 'fromEntityId')
                        ->addFieldResult('o', 'fromEntityType', 'fromEntityType')
                        ->addFieldResult('o', 'toEntityId', 'toEntityId')
                        ->addFieldResult('o', 'toEntityType', 'toEntityType')
                    ;

                    $query = $em->createNativeQuery('SELECT o.id, o.fromEntityId, o.fromEntityType, o.toEntityId, o.toEntityType FROM core_binding o WHERE o.fromEntityId = :fromEntityId AND o.fromEntityType = :fromEntityType', $rsm);
                    $query->setParameter('fromEntityType', $fromEntities[$className])
                            ->setParameter('fromEntityId', $fromEntity->getId())
                    ;
                    $entities = $query->getResult();
                    //ldd($entities);
                    //$entities = $em->getRepository(self::BIND_CLASS)->findAll();
                    //ld($entities);

                    $productReflProp->setValue($fromEntity, $entities);

                }
            }*/

        }
    }
    
    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        return true;
        $object = $eventArgs->getObject();
        $em = $eventArgs->getEntityManager();
        $object->setFromEntityType('DataProperty')
                ->setToEntityType('Article')
                ->setToEntityId($object->getToEntity()->getId())
                ->setFromEntityId($object->getFromEntity()->getId())
        ;
    }
}