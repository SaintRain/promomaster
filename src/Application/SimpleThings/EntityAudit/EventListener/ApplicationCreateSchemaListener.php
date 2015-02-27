<?php

/**
 * Разширяем бандл SimpleThingsEntityAuditBundle
 *   Добавляем индексы в создаваемые таблицы
 *   Добавляем создание айдитовских таблиц для связи ManyToMany
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\SimpleThings\EntityAudit\EventListener;

use Doctrine\ORM\Tools\ToolEvents;
use SimpleThings\EntityAudit\AuditManager;
use Doctrine\ORM\Tools\Event\GenerateSchemaTableEventArgs;
use Doctrine\ORM\Tools\Event\GenerateSchemaEventArgs;
use Doctrine\Common\EventSubscriber;
use SimpleThings\EntityAudit\EventListener\CreateSchemaListener;
use Doctrine\ORM\Mapping\ClassMetadata;

class ApplicationCreateSchemaListener extends CreateSchemaListener
{

    /**
     * @var \SimpleThings\EntityAudit\AuditConfiguration
     */
    private $config;

    /**
     * @var \SimpleThings\EntityAudit\Metadata\MetadataFactory
     */
    private $metadataFactory;

    public function __construct(AuditManager $auditManager)
    {
        parent::__construct($auditManager);

        $this->config = $auditManager->getConfiguration();
        $this->metadataFactory = $auditManager->getMetadataFactory();
    }

    public function postGenerateSchemaTable(GenerateSchemaTableEventArgs $eventArgs)
    {
        $cm = $eventArgs->getClassMetadata();
        if ($this->metadataFactory->isAudited($cm->name)) {
            $schema = $eventArgs->getSchema();
            $entityTable = $eventArgs->getClassTable();
            $revisionTable = $schema->createTable(
                    $this->config->getTablePrefix() . $entityTable->getName() . $this->config->getTableSuffix()
            );
            foreach ($entityTable->getColumns() AS $column) {
                /* @var $column Column */
                $revisionTable->addColumn($column->getName(), $column->getType()->getName(), array_merge(
                                $column->toArray(), array('notnull' => false, 'autoincrement' => false)
                ));
            }

            // Добавляем индексы
            foreach ($entityTable->getIndexes() as $index_name => $index) {
                if (!$index->isPrimary()) {
                    $revisionTable->addIndex($index->getColumns(), $index_name, $index->getFlags());
                }
            }

            $revisionTable->addColumn($this->config->getRevisionFieldName(), $this->config->getRevisionIdFieldType());
            $revisionTable->addColumn($this->config->getRevisionTypeFieldName(), 'string', array('length' => 4));

            // Добавляем индекс на поле с id ревизии
            $revisionTable->addIndex([$this->config->getRevisionFieldName()], 'idx_' . $this->config->getRevisionFieldName() . '_' . hash('fnv164', $revisionTable->getName()));

            $pkColumns = $entityTable->getPrimaryKey()->getColumns();
            $pkColumns[] = $this->config->getRevisionFieldName();
            $revisionTable->setPrimaryKey($pkColumns);

            // Создаем таблицы для ManyToMany
            foreach ($cm->associationMappings AS $assoc) {
                if ($assoc['type'] === ClassMetadata::MANY_TO_MANY) {
                    if (isset($assoc['joinTable']['name'])) {
                        $joinTable = $this->config->getTablePrefix() . $assoc['joinTable']['name'] . $this->config->getTableSuffix();
                        $joinColumn = $assoc['joinTable']['joinColumns'][0]['name'];
                        $inverseJoinColumn = $assoc['joinTable']['inverseJoinColumns'][0]['name'];

                        $revisionTable = $schema->createTable($joinTable);

                        $revisionTable->addColumn($joinColumn, 'bigint');
                        $revisionTable->addColumn($inverseJoinColumn, 'bigint');
                        $revisionTable->addColumn($this->config->getRevisionFieldName(), $this->config->getRevisionIdFieldType());
                        $revisionTable->addColumn($this->config->getRevisionTypeFieldName(), 'string', array('length' => 4));
                        $revisionTable->addColumn('isCurrentCollection', 'boolean');

                        $revisionTable->addIndex([$joinColumn], 'idx_' . $joinColumn . '_' . hash('fnv164', $joinTable));
                        $revisionTable->addIndex([$inverseJoinColumn], 'idx_' . $inverseJoinColumn . '_' . hash('fnv164', $inverseJoinColumn));
                        $revisionTable->addIndex([$this->config->getRevisionFieldName()], 'idx_' . $this->config->getRevisionFieldName() . '_' . hash('fnv164', $this->config->getRevisionFieldName()));
                    }
                }
            }
        }
    }

}
