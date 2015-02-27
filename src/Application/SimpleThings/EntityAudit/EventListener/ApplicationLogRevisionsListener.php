<?php
/**
 * Разширяем бандл SimpleThingsEntityAuditBundle
 *   Добавляем логирование для связи ManyToMany
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\SimpleThings\EntityAudit\EventListener;

use SimpleThings\EntityAudit\AuditManager;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use Doctrine\ORM\Event\OnFlushEventArgs;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\DBAL\Types\Type;
use SimpleThings\EntityAudit\EventListener\LogRevisionsListener;

class ApplicationLogRevisionsListener extends LogRevisionsListener
{
    /**
     * @var \SimpleThings\EntityAudit\AuditConfiguration
     */
    private $config;

    /**
     * @var \SimpleThings\EntityAudit\Metadata\MetadataFactory
     */
    private $metadataFactory;

    /**
     * @var \Doctrine\DBAL\Connection
     */
    private $conn;

    /**
     * @var \Doctrine\DBAL\Platforms\AbstractPlatform
     */
    private $platform;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * @var array
     */
    private $insertRevisionSQL = array();

    /**
     * @var \Doctrine\ORM\UnitOfWork
     */
    private $uow;

    /**
     * @var int
     */
    private $revisionId;

    public function __construct(AuditManager $auditManager)
    {
        $this->config          = $auditManager->getConfiguration();
        $this->metadataFactory = $auditManager->getMetadataFactory();
    }

    public function getSubscribedEvents()
    {
        return array(Events::onFlush, Events::postPersist, Events::postUpdate);
    }

    public function postPersist(LifecycleEventArgs $eventArgs)
    {
//         onFlush was executed before, everything already initialized
        $entity = $eventArgs->getEntity();

        $class = $this->em->getClassMetadata(get_class($entity));
        if (!$this->metadataFactory->isAudited($class->name)) {
            return;
        }

        $this->saveRevisionEntityData($class, $this->getOriginalEntityData($entity), 'INS');
    }

    public function postUpdate(LifecycleEventArgs $eventArgs)
    {
//         onFlush was executed before, everything already initialized
        $entity = $eventArgs->getEntity();

        $class = $this->em->getClassMetadata(get_class($entity));
        if (!$this->metadataFactory->isAudited($class->name)) {
            return;
        }

        $entityData = array_merge($this->getOriginalEntityData($entity), $this->uow->getEntityIdentifier($entity));
        $this->saveRevisionEntityData($class, $entityData, 'UPD');
    }

    public function onFlush(OnFlushEventArgs $eventArgs)
    {

        $this->em         = $eventArgs->getEntityManager();
        $this->conn       = $this->em->getConnection();
        $this->uow        = $this->em->getUnitOfWork();
        $this->platform   = $this->conn->getDatabasePlatform();
        $this->revisionId = null; // reset revision

        foreach ($this->uow->getScheduledEntityDeletions() AS $entity) {
            $class = $this->em->getClassMetadata(get_class($entity));
            if (!$this->metadataFactory->isAudited($class->name)) {
                continue;
            }
            $entityData = array_merge($this->getOriginalEntityData($entity), $this->uow->getEntityIdentifier($entity));
            $this->saveRevisionEntityData($class, $entityData, 'DEL');
        }

    }

    /**
     * get original entity data, including versioned field, if "version" constraint is used
     *
     * @param mixed $entity
     * @return array
     */
    private function getOriginalEntityData($entity)
    {
        $class = $this->em->getClassMetadata(get_class($entity));
        $data  = $this->uow->getOriginalEntityData($entity);
        if ($class->isVersioned) {
            $versionField        = $class->versionField;
            $data[$versionField] = $class->reflFields[$versionField]->getValue($entity);
        }
        return $data;
    }

    private function getRevisionId()
    {
        if ($this->revisionId === null) {
            $this->conn->insert($this->config->getRevisionTableName(),
                array(
                'timestamp' => date_create('now'),
                'username' => $this->config->getCurrentUsername(),
                ), array(
                Type::DATETIME,
                Type::STRING
            ));

            $sequenceName = $this->platform->supportsSequences() ? 'REVISIONS_ID_SEQ' : null;

            $this->revisionId = $this->conn->lastInsertId($sequenceName);
        }
        return $this->revisionId;
    }

    private function getInsertRevisionSQL($class)
    {
        if (!isset($this->insertRevisionSQL[$class->name])) {
            $placeholders = array('?', '?');
            $tableName    = $this->config->getTablePrefix().$class->table['name'].$this->config->getTableSuffix();

            $sql = "INSERT INTO ".$tableName." (".
                $this->config->getRevisionFieldName().", ".$this->config->getRevisionTypeFieldName();

            $fields = array();

            foreach ($class->associationMappings AS $assoc) {
                if (($assoc['type'] & ClassMetadata::TO_ONE) > 0 && $assoc['isOwningSide']) {
                    foreach ($assoc['targetToSourceKeyColumns'] as $sourceCol) {
                        $fields[$sourceCol] = true;
                        $sql .= ', '.$sourceCol;
                        $placeholders[]     = '?';
                    }
                }
            }

            foreach ($class->fieldNames AS $field) {
                if (array_key_exists($field, $fields)) {
                    continue;
                }
                $type           = Type::getType($class->fieldMappings[$field]['type']);
                $placeholders[] = (!empty($class->fieldMappings[$field]['requireSQLConversion'])) ? $type->convertToDatabaseValueSQL('?', $this->platform) : '?';
                $sql .= ', '.$class->getQuotedColumnName($field, $this->platform);
            }

            $sql .= ") VALUES (".implode(", ", $placeholders).")";
            $this->insertRevisionSQL[$class->name] = $sql;
        }

        return $this->insertRevisionSQL[$class->name];
    }

    /**
     * @param ClassMetadata $class
     * @param array $entityData
     * @param string $revType
     */
    private function saveRevisionEntityData($class, $entityData, $revType)
    {
        $params = array($this->getRevisionId(), $revType);
        $types  = array(\PDO::PARAM_INT, \PDO::PARAM_STR);

        $fields = array();

        foreach ($class->associationMappings AS $field => $assoc) {
            if (($assoc['type'] & ClassMetadata::TO_ONE) > 0 && $assoc['isOwningSide']) {
                $targetClass = $this->em->getClassMetadata($assoc['targetEntity']);

                if ($entityData[$field] !== null) {
                    $relatedId = $this->uow->getEntityIdentifier($entityData[$field]);
                }

                $targetClass = $this->em->getClassMetadata($assoc['targetEntity']);

                foreach ($assoc['sourceToTargetKeyColumns'] as $sourceColumn => $targetColumn) {
                    $fields[$sourceColumn] = true;
                    if ($entityData[$field] === null) {
                        $params[] = null;
                        $types[]  = \PDO::PARAM_STR;
                    } else {
                        $params[] = $relatedId[$targetClass->fieldNames[$targetColumn]];
                        $types[]  = $targetClass->getTypeOfColumn($targetColumn);
                    }
                }
            }
        }

        foreach ($class->fieldNames AS $field) {
            if (array_key_exists($field, $fields)) {
                continue;
            }
            $params[] = $entityData[$field];
            $types[]  = $class->fieldMappings[$field]['type'];
        }

        $this->conn->executeUpdate($this->getInsertRevisionSQL($class), $params, $types);

        $this->_auditCollection($class, $entityData);
    }

    /**
     * Функция для записи истории коллекций объекта
     *
     * @param type $class
     * @param type $entityData
     */
    private function _auditCollection($class, $entityData)
    {
        if (isset($entityData['id'])) {
            $entity = $this->em->getRepository($class->name)->find($entityData['id']);
            if ($entity) {
                foreach ($class->associationMappings AS $field => $assoc) {
                    if ($assoc['type'] === ClassMetadata::MANY_TO_MANY && $assoc['joinTable']) {
                        $joinTable = $this->config->getTablePrefix().$assoc['joinTable']['name'].$this->config->getTableSuffix();

                        $joinColumn        = $assoc['joinTable']['joinColumns'][0]['name'];
                        $inverseJoinColumn = $assoc['joinTable']['inverseJoinColumns'][0]['name'];

                        // Выбираем id записей, которые находятся в коллекции получиного объекта до обновления
                        $sql               = 'SELECT jt.'.$inverseJoinColumn.' FROM '.$joinTable.' jt '
                            .'WHERE jt.'.$this->config->getRevisionTypeFieldName().' = "INS"'
                            .' AND jt.isCurrentCollection = 1'
                            .' AND jt.'.$joinColumn.' = '.$entityData['id'];
                        $currentCollection = $this->conn->fetchAll($sql);

                        $existIds = array();
                        foreach ($currentCollection as $existItem) {
                            $existIds[] = $existItem[$inverseJoinColumn];
                        }

                        // Выбираем id записей, которые находятся в текущей коллекции получиного объекта после обновления
                        $ids = array();
                        if (method_exists($entity, 'get'.ucfirst($field)) && count($entity->{'get'.ucfirst($field)}())) {
                            foreach ($entity->{'get'.ucfirst($field)}() as $item) {
                                $ids[] = $item->getId();
                            }
                        }

                        $DEL = array();
                        foreach ($existIds as $existId) {
                            if (!in_array($existId, $ids)) {
                                $DEL[] = $existId;
                            }
                        }

                        $INS = array();
                        foreach ($ids as $id) {
                            if (!in_array($id, $existIds)) {
                                $INS[] = $id;
                            }
                        }

                        foreach ($INS as $id) {
                            $sql = 'INSERT INTO '.$joinTable.' '
                                .'('.$this->config->getRevisionFieldName().', '.$this->config->getRevisionTypeFieldName().', '.$joinColumn.', '.$inverseJoinColumn.', isCurrentCollection)'
                                .' VALUES '
                                .'("'.$this->getRevisionId().'", "INS", "'.$entityData['id'].'", "'.$id.'", 1)';

                            $this->conn->executeQuery($sql);
                        }

                        foreach ($DEL as $id) {
                            $sql = 'INSERT INTO '.$joinTable.' '
                                .'('.$this->config->getRevisionFieldName().', '.$this->config->getRevisionTypeFieldName().', '.$joinColumn.', '.$inverseJoinColumn.', isCurrentCollection)'
                                .' VALUES '
                                .'("'.$this->getRevisionId().'", "DEL", "'.$entityData['id'].'", "'.$id.'", 0)';
                            $this->conn->executeQuery($sql);
                            $sql = 'UPDATE '.$joinTable.' '
                                .'SET isCurrentCollection = 0 '
                                .'WHERE '
                                .'isCurrentCollection = 1 AND '
                                .$joinColumn.' = '.$entityData['id'].' AND '
                                .$this->config->getRevisionTypeFieldName().' = "INS" AND '
                                .$inverseJoinColumn.' = '.$id;
                            $this->conn->executeQuery($sql);
                        }
                    }
                }
            }
        }
    }
}