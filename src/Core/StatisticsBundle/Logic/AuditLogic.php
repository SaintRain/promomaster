<?php
/**
 * Сервис для работы со статистиками, для нахождения изменений в сущностях
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\StatisticsBundle\Logic;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Mapping\ClassMetadata;

class AuditLogic
{
    protected $doctrine;
    protected $auditReader; // Сервис бандла AuditReader
    protected $auditConfig; // Конфигурации бандла AuditReader

    public function __construct($timezone, $doctrine, $auditReader, $auditConfig)
    {
        $dateTime                  = new \DateTime('now', new \DateTimeZone($timezone));
        $this->timezone            = $timezone;
        $this->timeOffsetInSeconds = $dateTime->getOffset();

        $this->doctrine    = $doctrine;
        $this->auditReader = $auditReader;
        $this->auditConfig = $auditConfig;
    }

    public function getAuditReader()
    {
        return $this->auditReader;
    }

    /**
     * Функция для сравнения 2-х массивов
     *
     * @param array $oldData
     * @param array $newData
     * @param array $exception - поля исключения, которые не надо сравнивать
     * @return array
     */
    public function arrayDiff($oldData, $newData, $exception)
    {
        $exception = array_merge($exception,
            array(
            $this->auditConfig->getRevisionFieldName(),
            $this->auditConfig->getRevisionTypeFieldName(),
            'updatedDateTime',
            'updatedAt',
            'createdDateTime',
            'createdAt',
            'timestamp',
            'r___timestamp',
            'r___id',
            'r___username',
        ));
        $diff      = array();

        $keys = array_keys($oldData + $newData);
        foreach ($keys as $field) {
            $old = array_key_exists($field, $oldData) ? $oldData[$field] : null;
            $new = array_key_exists($field, $newData) ? $newData[$field] : null;

            if ((is_array($old) && !is_array($new) && $new) || (!is_array($old) && is_array($new) && $old)) {
                continue;
            }

            if ($old !== $new && !in_array($field, $exception)) {
                $diff[$field] = array('old' => $old, 'new' => $new);
            }
        }

        return $diff;
    }

    /**
     * Функцуия для пополнения выбираемых полей из БД по метадате с учетом subClass'ов
     *
     * @param string $select
     * @param string $fieldPrefix
     * @param \Doctrine\ORM\Mapping\ClassMetadata $classMetadata
     * @return string
     */
    private function complateSelectByClassMatadata($fieldPrefix, $classMetadata, $onlyThisFields = array(), $delim = '___', $select = '', $useDBFieldNames = false)
    {
        // Добавляем необходимые поля
        foreach ($classMetadata->fieldNames as $mdFieldDB => $mdField) {
            if (false === strpos($select, '`'.($delim ? $fieldPrefix.$delim : '').($useDBFieldNames ? $mdFieldDB : $mdField ).'`')) {
                if (empty($onlyThisFields)) {
                    $select .= ', t_'.$fieldPrefix.'.'.$mdFieldDB.' AS `'.($delim ? $fieldPrefix.$delim : '').($useDBFieldNames ? $mdFieldDB : $mdField ).'`';
                } else {
                    if (in_array($mdField, $onlyThisFields) || in_array($mdFieldDB, $onlyThisFields)) {
                        $select .= ', t_'.$fieldPrefix.'.'.$mdFieldDB.' AS `'.($delim ? $fieldPrefix.$delim : '').($useDBFieldNames ? $mdFieldDB : $mdField ).'`';
                    }
                }
            }
        }

        // Добавляем необходимые поля, которые имеют связи с другими сущностями
        foreach ($classMetadata->associationMappings as $mdField => $mdOptions) {

            if (isset($mdOptions['joinColumns'])) {
                foreach ($mdOptions['joinColumns'] as $mdFieldOptions) {
                    if (false === strpos($select, '`'.($delim ? $fieldPrefix.$delim : '').($useDBFieldNames ? $mdFieldOptions['name'] : $mdField ).'`')) {
                        if (empty($onlyThisFields)) {
                            $select .= ', t_'.$fieldPrefix.'.'.$mdFieldOptions['name'].' AS `'.($delim ? $fieldPrefix.$delim : '').($useDBFieldNames ? $mdFieldOptions['name'] : $mdField ).'`';
                        } else {
                            if (in_array($mdField, $onlyThisFields) || in_array($mdFieldOptions['name'], $onlyThisFields)) {
                                $select .= ', t_'.$fieldPrefix.'.'.$mdFieldOptions['name'].' AS `'.($delim ? $fieldPrefix.$delim : '').($useDBFieldNames ? $mdFieldOptions['name'] : $mdField ).'`';
                            }
                        }
                    }
                }
            }
        }

        // Проверяем на наличие subClass'ов, если есть, то дополняем select необходимыми полями
        if (!empty($classMetadata->subClasses)) {
            foreach ($classMetadata->subClasses as $subClass) {
                $em               = $this->doctrine->getManager();
                $subClassMetadata = $em->getClassMetadata($subClass);
                $select           = $this->complateSelectByClassMatadata($fieldPrefix, $subClassMetadata, $onlyThisFields, $delim, $select, $useDBFieldNames);
            }
        }

        return $select;
    }

    /**
     * Функция для получения информации для построения блока истории сущности
     *
     * @param object $obj - для которго показываем историю
     * @param array $options - опции выводимых полей
     * @return array
     */
    public function getAuditData($obj, $options, $exception = array())
    {

        $id               = $obj->getId();
        $currentClassName = get_class($obj);
        $entity           = strtolower(substr($currentClassName, strripos($currentClassName, '\\') + 1));

        $em                         = $this->doctrine->getManager();
        $currentClassMetadata       = $em->getClassMetadata($currentClassName);
        $currentAssociationMappings = $currentClassMetadata->getAssociationMappings();

        $currentTableName = $this->auditConfig->getTablePrefix().$currentClassMetadata->table['name'].$this->auditConfig->getTableSuffix();

        // Клеим основной запрос
        $query = 'SELECT DISTINCT r.id AS r___id, r.timestamp AS r___timestamp, r.username AS r___username'
            .', t_'.$entity.'.'.$this->auditConfig->getRevisionFieldName().', t_'.$entity.'.'.$this->auditConfig->getRevisionTypeFieldName()
            .' '.$this->complateSelectByClassMatadata($entity, $currentClassMetadata, null, null)
            .' FROM '.$this->auditConfig->getRevisionTableName().' AS r'
            .' LEFT JOIN '.$currentTableName.' t_'.$entity.' ON r.id = t_'.$entity.'.'.$this->auditConfig->getRevisionFieldName()
            .' WHERE t_'.$entity.'.id = '.$id;

        // Выполняем запрос
        $revisions = $this->doctrine->getManager()->getConnection()->fetchAll($query);

        // Строим массив из основных данных
        $differences = array();
        $usernames   = array();
        foreach ($revisions as $revision) {

            // очищаем поля связанные с ревизией
            $tempRevision = $revision;
            $usernames[]  = $revision['r___username'];
//            unset($tempRevision['r___id']);
//            unset($tempRevision['r___timestamp']);
//            unset($tempRevision['r___username']);
            unset($tempRevision[$this->auditConfig->getRevisionFieldName()]);
            unset($tempRevision[$this->auditConfig->getRevisionTypeFieldName()]);

            $differences[$revision['r___id']] = array(
                'id' => $revision['r___id'],
                'timestamp' => date('d.m.Y H:i:s', (strtotime($revision['r___timestamp']) + $this->timeOffsetInSeconds)),
                'username' => $revision['r___username'],
                'type' => $revision[$this->auditConfig->getRevisionTypeFieldName()],
                'data' => array(
                    $currentClassName => array(
                        $id => array(
                            'type' => $revision[$this->auditConfig->getRevisionTypeFieldName()],
                            'fields' => $tempRevision,
                        )
                    )),
            );
        }

        // Достаем id записей которые надо найти в БД
        // Дополняем массив опций
        $revisionsDirty = $revisions;
        foreach ($options as $field => $optField) {
            if (isset($currentAssociationMappings[$field])) {
                $assoc = $currentAssociationMappings[$field];

                $joinClassName                = $assoc['targetEntity'];
                $joinClassMetadata            = $em->getClassMetadata($joinClassName);
                $options[$field]['tableName'] = $this->auditConfig->getTablePrefix().$joinClassMetadata->table['name'].$this->auditConfig->getTableSuffix();
                $options[$field]              = array_merge($options[$field],
                    array(
                    'classMetadata' => $joinClassMetadata,
                    'returnFields'  => empty($optField['property']) ? ['id'] : array_merge(['id'], $optField['property']),
                ));

                if (isset($assoc['joinColumns'])) {
                    $options[$field]['tableFieldName'] = $assoc['joinColumns'][0]['name'];
                    foreach ($revisionsDirty as $idx => $revision) {
                        if ($revision[$field]) {
                            $options[$field]['ids'][$revision[$field]] = $revision[$field];

                            // Костыль для удаления поля с id для файлов
                            if (in_array('Core\FileBundle\Entity\CommonFile', $joinClassMetadata->parentClasses) && $assoc['type'] === ClassMetadata::ONE_TO_ONE) {
                                //unset($differences[$revision['r___id']]['data'][$currentClassName][$id]['fields'][$field]);
                                //ldd($differences[$revision['r___id']]['data'][$currentClassName][$id]['fields'][$field]);
                                $differences[$revision['r___id']]['data'][$currentClassName][$id]['fields'][$field] = null;
                            }
                        }
                    }
                }

                foreach ($optField['property'] as $subField) {
                    if (strpos($subField, '.') > 0) {
                        list($joinField, $joinedField) = explode('.', $subField);

                        $joinFieldOptions       = $options[$field]['classMetadata']->associationMappings[$joinField];
                        $joinFieldClassMetadata = $em->getClassMetadata($joinFieldOptions['targetEntity']);

                        if (isset($joinFieldOptions['joinColumns'])) {
                            $options[$joinField]['tableFieldName'] = $joinFieldOptions['joinColumns'][0]['name'];
                        }

                        $options[$joinField] = array_merge($options[$joinField],
                            array(
                            'classMetadata' => $joinFieldClassMetadata,
                            'returnFields' => isset($options[$joinField]['returnFields']) ?
                                array_merge($options[$joinField]['returnFields'], [$joinedField => $joinedField, 'id' => 'id']) : [$joinedField => $joinedField, 'id' => 'id'],
                        ));

                        $options[$joinField]['tableName'] = $this->auditConfig->getTablePrefix().$joinFieldClassMetadata->table['name'].$this->auditConfig->getTableSuffix();
                    }
                }
            }
        }

        //ldd($revisions);
        // Выполняем запросы по join полям
        foreach ($options as $field => $optField) {
            if (isset($currentAssociationMappings[$field])) {
                $assoc  = $currentAssociationMappings[$field];
                $query  = '';
                $result = array();
                if ($currentClassMetadata->associationMappings[$field]['type'] === ClassMetadata::ONE_TO_ONE || $assoc['type'] === ClassMetadata::MANY_TO_ONE) {
                    if (isset($optField['ids'])) {

                        $query  = 'SELECT t_'.$field.'.'.$this->auditConfig->getRevisionFieldName().', t_'.$field.'.'.$this->auditConfig->getRevisionTypeFieldName().' '.$this->complateSelectByClassMatadata($field, $optField['classMetadata'], $optField['returnFields'], null)
                            .' FROM '.$optField['tableName'].' AS t_'.$field
                            .' RIGHT JOIN ('
                            .' SELECT MAX('.$this->auditConfig->getRevisionFieldName().') as f_rev'
                            .' FROM '.$optField['tableName'].' AS t_temp'
                            .' WHERE t_temp.id IN ('.implode(', ', $optField['ids']).')'
                            .' GROUP BY t_temp.id'
                            .') t_temp2 ON t_temp2.f_rev = t_'.$field.'.'.$this->auditConfig->getRevisionFieldName()
                        ;
                        $result = $this->doctrine->getManager()->getConnection()->fetchAll($query);
                    }
                } elseif ($currentClassMetadata->associationMappings[$field]['type'] === ClassMetadata::MANY_TO_MANY && $assoc['joinTable']) {
                    $joinTable         = $this->auditConfig->getTablePrefix().$assoc['joinTable']['name'].$this->auditConfig->getTableSuffix();
                    $joinColumn        = $assoc['joinTable']['joinColumns'][0]['name'];
                    $inverseJoinColumn = $assoc['joinTable']['inverseJoinColumns'][0]['name'];

                    $tableNameTargetEntity = $this->auditConfig->getTablePrefix().$optField['classMetadata']->table['name'].$this->auditConfig->getTableSuffix();

                    $rf  = $optField['returnFields'];
                    if (($key = array_search('id', $rf)) !== false) {
                        unset($rf[$key]);
                    }

                    $query = 'SELECT t_'.$joinTable.'.revtype revtype, t_'.$joinTable.'.rev rev, t_'.$joinTable.'.'.$inverseJoinColumn.' id'.$this->complateSelectByClassMatadata($tableNameTargetEntity,
                            $optField['classMetadata'], $rf, null)
                        .' FROM '.$joinTable.' AS t_'.$joinTable.' '
                        .' LEFT JOIN '.$tableNameTargetEntity.' t_'.$tableNameTargetEntity.' ON t_'.$tableNameTargetEntity.'.id = t_'.$joinTable.'.'.$inverseJoinColumn
                        .' WHERE t_'.$joinTable.'.'.$joinColumn.' = '.$obj->getId()
                    //. 't_' . $joinTable . '.isCurrentCollection = 1'
                    ;

                    $resultDirty = $this->doctrine->getManager()->getConnection()->fetchAll($query);
                    foreach ($resultDirty as $row) {
                        unset($row['isCurrentCollection']);
                        unset($row[$joinColumn]);
                        unset($row[$inverseJoinColumn]);
                        $result[] = $row;
                    }
                } else {
//                    $query = 'SELECT t_' . $field . '.' . $this->auditConfig->getRevisionFieldName() . ', t_' . $field . '.' . $this->auditConfig->getRevisionTypeFieldName() . ' ' . $this->complateSelectByClassMatadata($field, $optField['classMetadata'], null, null)
//                            . ' FROM ' . $optField['tableName'] . ' AS t_' . $field
//                            . ' WHERE t_' . $field . '.' . $this->auditConfig->getRevisionFieldName() . ' IN (' . implode(', ', array_keys($differences)) . ')';

                    $mappedBy = $assoc['mappedBy'];
                    $OR       = '';
                    if (isset($optField['classMetadata']->associationMappings[$mappedBy])) {
                        $OR = ' OR t_'.$field.'.'.$optField['classMetadata']->associationMappings[$mappedBy]['joinColumns'][0]['name'].' = '.$obj->getId();
                    }
                    $query  = 'SELECT DISTINCT r.id AS r___id, r.timestamp AS r___timestamp, r.username AS r___username, t_'.$field.'.'.$this->auditConfig->getRevisionFieldName().', t_'.$field.'.'.$this->auditConfig->getRevisionTypeFieldName().' '.$this->complateSelectByClassMatadata($field,
                            $optField['classMetadata'], null, null)
                        .' FROM '.$optField['tableName'].' AS t_'.$field
                        .' JOIN '.$this->auditConfig->getRevisionTableName().' r ON r.id = t_'.$field.'.'.$this->auditConfig->getRevisionFieldName()
                        .' WHERE t_'.$field.'.'.$this->auditConfig->getRevisionFieldName().' IN ('.implode(', ', array_keys($differences)).')'.$OR;
                    $result = $this->doctrine->getManager()->getConnection()->fetchAll($query);
                }

                // Выполняем запрос и запоминаем полученую подробную информацию по классу
                if (!empty($result)) {
                    $tmpKey = $optField['classMetadata']->name.'#'.$field;
                    if (isset($entityData[$tmpKey])) {
                        $entityData[$tmpKey] = array_merge($entityData[$tmpKey], $result);
                    } else {
                        $entityData[$tmpKey] = $result;
                    }
                }
//                if ('Core\ProductBundle\Entity\CommonProductModification' === $optField['classMetadata']->name) {
//                    ldd($query);
//                }
            }
        }

        // После того как выбрали join данные, ищем данные для полей переданых с точкой
        foreach ($options as $field => $optField) {
            if (!isset($optField['property'])) {
                continue;
            }

            $joinField = '';

            foreach ($optField['property'] as $subField) {
                if (strpos($subField, '.') > 0) {
                    list($joinField, $joinedField) = explode('.', $subField);
                    if (isset($entityData[$optField['classMetadata']->name.'#'.$field])) {
                        foreach ($entityData[$optField['classMetadata']->name.'#'.$field] as $subData) {
                            $options[$joinField]['ids'][$subData[$joinField]] = $subData[$joinField];
                        }
                    }
                }
            }

            // запрос
            if (isset($options[$joinField]['ids']) && count($options[$joinField]['ids'])) {

                $query = 'SELECT t_'.$joinField.'.'.$this->auditConfig->getRevisionFieldName().', t_'.$joinField.'.'.$this->auditConfig->getRevisionTypeFieldName().' '.$this->complateSelectByClassMatadata($joinField,
                        $options[$joinField]['classMetadata'], $options[$joinField]['returnFields'], null)
                    .' FROM '.$options[$joinField]['tableName'].' AS t_'.$joinField
                    .' WHERE t_'.$joinField.'.id IN ('.implode(', ', $options[$joinField]['ids']).')'
                    .' GROUP BY t_'.$joinField.'.id'
                    .' ORDER BY t_'.$joinField.'.'.$this->auditConfig->getRevisionFieldName().' DESC'
                    .' LIMIT '.count($options[$joinField]['ids']);

                $entityData[$options[$joinField]['classMetadata']->name.'#'.$joinField] = $this->doctrine->getManager()->getConnection()->fetchAll($query);
            }
        }

        $options[$entity] = array(
            'isCurrentEntity' => true,
            'classMetadata' => $currentClassMetadata,
            'returnFields' => [],
        );

        // Объединяем массив истории сущностей с массивом подробной информации
        $isAdd = false;
        foreach ($options as $field => $optField) {

            if (!isset($optField['classMetadata']) || !isset($entityData[$optField['classMetadata']->name.'#'.$field])) {
                continue;
            }

            $className = $optField['classMetadata']->name;

            foreach ($entityData[$className.'#'.$field] as $edKey => $subData) {
                if (isset($differences[$subData['rev']])) {
                    $differences[$subData['rev']]['data'][$className][$subData['id'].'#'.$field]['type']   = $subData[$this->auditConfig->getRevisionTypeFieldName()];
                    $differences[$subData['rev']]['data'][$className][$subData['id'].'#'.$field]['fields'] = $subData;
                } else {

                    foreach ($differences as $idRev => $difference) {
                        foreach ($difference['data'] as $diffClassName => $eData) {
                            foreach ($eData as $id => $data) {
                                if (isset($data['fields'][$field])) {

                                    $tmpId = $data['fields'][$field];

                                    if ($tmpId == $subData['id']) {
                                        $differences[$idRev]['data'][$className][$tmpId.'#'.$field]['type']   = $subData[$this->auditConfig->getRevisionTypeFieldName()];
                                        $differences[$idRev]['data'][$className][$tmpId.'#'.$field]['fields'] = $subData;
                                        $isAdd                                                                = true;
                                    }
                                }

                                // если данные не были добавлены в ревизию по соответсвию id, то ставим в соответствии с пользователем и по времени
                                if ($isAdd === false && isset($subData['r___timestamp']) && isset($data['fields']['r___timestamp']) && strtotime($data['fields']['r___timestamp']) > strtotime($subData['r___timestamp'])
                                    && $differences[$idRev]['username'] === $subData['r___username']) {
                                    $differences[$idRev]['data'][$className][$subData['id'].'#'.$field]['type']   = $subData[$this->auditConfig->getRevisionTypeFieldName()];
                                    $differences[$idRev]['data'][$className][$subData['id'].'#'.$field]['fields'] = $subData;

                                    unset($entityData[$className.'#'.$field][$edKey]);
                                    $isAdd = true;
                                }
                            }
                        }
                    }
                }
                $isAdd = false;
            }

            // если остались данные, может случиться в случае редактирования через ajax, добавляем ревизии в массив
            if (count($entityData[$className.'#'.$field]) && 0) {
                reset($entityData[$className.'#'.$field]);
                $edKeyFirst = key($entityData[$className.'#'.$field]);
                if (isset($entityData[$className.'#'.$field][$edKeyFirst]['r___id'])) {
                    end($differences);
                    $dKeyLast            = key($differences);
                    $lastExistDifference = $differences[$dKeyLast];
                    foreach ($entityData[$className.'#'.$field] as $edKey => $subData) {
                        $differences[$subData['r___id']] = $lastExistDifference;
                        $lastExistDifference['id']       = $subData['r___id'];
                        if ($lastExistDifference['username'] === $subData['r___username']) {
                            $differences[$subData['r___id']]['data'][$className][$subData['id']]['type']   = $subData[$this->auditConfig->getRevisionTypeFieldName()];
                            $differences[$subData['r___id']]['data'][$className][$subData['id']]['fields'] = $subData;
                        }
                    }
                }
            }
        }

        // Перемещаем данные на свои места
        foreach ($differences as $idRev => $difference) {
            foreach ($difference['data'] as $className => $data) {
                foreach ($data as $id => $eData) {
                    $eData = $eData['fields'];
                    if (!isset($eData[$this->auditConfig->getRevisionFieldName()])) {
                        continue;
                    }

                    $isCurrent = $className === $currentClassMetadata->name;

                    // Удаляем поля которые передали в массивые exception (исключения)
                    foreach ($options as $field => $optField) {
                        if (isset($optField['classMetadata']) && $className === $optField['classMetadata']->name) {
                            $optionsField = $optField;
                            if (isset($optionsField['exception'])) {
                                $optionsField['exception'] = array_merge($optionsField['exception'], ['r___id', 'r___timestamp', 'r___username']);
                            } else {
                                $optionsField['exception'] = ['r___id', 'r___timestamp', 'r___username'];
                            }
                            foreach ($optionsField['exception'] as $ex) {
                                if (isset($eData[$ex])) {
                                    unset($eData[$ex]);
                                    break;
                                }
                            }
                        }
                    }

                    $differences[$idRev]['data'][$className][$id]['fields'] = $eData;

                    if (!$isCurrent && (int) $eData[$this->auditConfig->getRevisionFieldName()] === (int) $idRev) {
                        $differences[$idRev]['data'][$className][$id]['fields'] = $eData;
                        // Генерируем title для записи из коллекции, если был задан формат, поля соединенные точкой не трогаем
                        foreach ($options as $field => $optField) {
                            if (isset($optField['classMetadata']) && $className === $optField['classMetadata']->name) {
                                $optionsField = $optField;
                                break;
                            }
                        }

                        if (isset($optionsField['title_format'])) {
                            $title      = '';
                            $titleParts = array();
                            foreach ($optionsField['property'] as $oField) {
                                if (strpos($oField, '.') > 0) {
                                    $titleParts[] = $oField;
                                }
                                if (isset($eData[$oField])) {
                                    $titleParts[] = $eData[$oField];
                                }
                            }
                            if (!empty($titleParts)) {
                                $title = vsprintf($optionsField['title_format'], $titleParts);
                            } else {
                                $title = implode(' ', $titleParts);
                            }
                            $differences[$idRev]['data'][$className][$id]['title'] = $title;
                        }
                    }
                }
            }
        }
        unset($entityData);

        // Переносим сущности по связям
        $classNamesToClear = array();
        foreach ($options as $fieldName => $optField) {
            if ($fieldName !== $entity && isset($currentClassMetadata->associationMappings[$fieldName])) {

                $fieldOptions  = $currentClassMetadata->associationMappings[$fieldName];
                $classMetadata = $optField['classMetadata'];

                if ($fieldOptions['type'] === ClassMetadata::ONE_TO_ONE || $fieldOptions['type'] === ClassMetadata::MANY_TO_ONE) {//|| $fieldOptions['type'] === ClassMetadata::MANY_TO_MANY
                    $field = $fieldName;
                    foreach ($differences as $i => $difference) {

                        if (isset($difference['data'][$classMetadata->name])) {
                            foreach ($difference['data'][$classMetadata->name] as $data) {
                                $fieldsData = array();
                                foreach ($optField['returnFields'] as $returnField) {
                                    if (isset($data['fields'][$returnField])) {
                                        $fieldsData[$returnField] = $data['fields'][$returnField];
                                    } else {
                                        $fieldsData[$returnField] = '';
                                    }
                                }

                                reset($difference['data'][$currentClassMetadata->name]);
                                $entityId = key($difference['data'][$currentClassMetadata->name]);

                                $id = $fieldsData['id'];
                                if (count($fieldsData) > 1) {
                                    unset($fieldsData['id']);
                                } else {
                                    $fieldsData['id'] = $id;
                                }

                                if (isset($options[$field]['link_format'])) {
                                    $caption = vsprintf($options[$field]['link_format'], $fieldsData);
                                } else {
                                    $caption = implode(' ', $fieldsData);
                                }

                                $returnData = array(
                                    'id' => $id,
                                    'className' => $classMetadata->name,
                                    'caption' => $caption,
                                );

                                if ($differences[$i]['data'][$currentClassMetadata->name][$entityId]['fields'][$field] == $id) {
                                    $differences[$i]['data'][$currentClassMetadata->name][$entityId]['fields'][$field] = $returnData;
                                }
                                $classNamesToClear[] = $classMetadata->name;
                            }
                        }
                    }
                }
            }
        }
        //ldd($differences);
        foreach ($differences as $i => $difference) {
            foreach ($classNamesToClear as $classNameToClear) {
                //if ('Core\CategoryBundle\Entity\ProductCategory' !== $classNameToClear)
                ///    unset($differences[$i]['data'][$classNameToClear]);
            }
        }

        // Переводим значения полей даты, логики и текста по метаданным в "человеческие" значения
        foreach ($options as $fieldName => $optField) {
            if (!isset($optField['classMetadata'])) {
                continue;
            }
            $cm = $optField['classMetadata'];
            foreach ($differences as $idRev => $difference) {
                foreach ($difference['data'] as $className => $arrayData) {
                    if ($cm->name === $className) {
                        foreach ($arrayData as $id => $fieldsData) {
                            foreach ($cm->fieldMappings as $fieldOptions) {
                                if (isset($fieldsData['fields'][$fieldOptions['fieldName']])) {
                                    $field = $fieldOptions['fieldName'];
                                    $value = htmlspecialchars($fieldsData['fields'][$fieldOptions['fieldName']]);

                                    // Если boolean, то вместо 1/0 выводим да/нет
                                    if ($fieldOptions['type'] === 'boolean') {
                                        $differences[$idRev]['data'][$className][$id]['fields'][$field] = $value ? 'да' : 'нет';
                                    } elseif ($fieldOptions['type'] === 'datetime') {
                                        // Если datetime, то преобразовываем SQL формат в дд.мм.гггг чч:мм:сс, и обрезаем нули если времени нет
                                        $date = date('d.m.Y H:i:s', (strtotime($value) + $this->timeOffsetInSeconds));
                                        if (substr($date, -8) === '00:00:00') {
                                            $date = substr($date, 0, 11);
                                        }
                                        $differences[$idRev]['data'][$className][$id]['fields'][$field] = $date;
                                    } elseif ($fieldOptions['type'] === 'text' && $value && preg_replace("/\n+|\r+/", '', $value)) {
                                        // Если text, то обертываем значение в textarea, если вдруг будет много текста
                                        $differences[$idRev]['data'][$className][$id]['fields'][$field] = '<textarea readonly="readonly">'.$value.'</textarea>';
                                    } else {
                                        // Иначе просто преобразуем данные в специальные символы HTML
                                        $differences[$idRev]['data'][$className][$id]['fields'][$field] = $value;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        // разбираем join поля с точкой в имени
        $joinFields   = array();
        $joinedFields = array();
        foreach ($options as $field => $subFields) {
            if (isset($subFields['property'])) {
                foreach ($subFields['property'] as $subField) {
                    if (strpos($subField, '.') > 0) {
                        list($joinField, $joinedField) = explode('.', $subField);
                        $joinFields[$field][$joinField][$joinedField] = $joinedField;
                        $joinFields[$field][$joinField]['id']         = 'id';
                    }
                }
            }
        }

        // переносим значения подсущностей на свое место (например для "Заказа": "Продукт" в "Композицию")
        if (!empty($joinFields)) {
            foreach ($joinFields as $field => $jfs) {
                foreach ($jfs as $joinField => $joinedFields) {
                    $cm                     = $options[$field]['classMetadata'];
                    $joinFieldOptions       = $cm->associationMappings[$joinField];
                    $joinFieldClassMetadata = $em->getClassMetadata($joinFieldOptions['targetEntity']);
                    foreach ($differences as $idRev => $difference) {
                        if (isset($difference['data'][$cm->name])) {
                            foreach ($difference['data'][$cm->name] as $id => $array) {
                                if (isset($array['fields'][$joinField]) && isset($difference['data'][$joinFieldClassMetadata->name])) {// && (int) $array['fields'][$joinField] === (int) key($difference['data'][$joinFieldClassMetadata->name])
                                    reset($difference['data'][$joinFieldClassMetadata->name]);
                                    $entityId = key($difference['data'][$joinFieldClassMetadata->name]);
                                    if (!isset($difference['data'][$joinFieldClassMetadata->name][$entityId])) {
                                        continue;
                                    }
                                    $data = $difference['data'][$joinFieldClassMetadata->name][$entityId];

                                    foreach ($difference['data'][$joinFieldClassMetadata->name] as $entityId => $data) {
                                        if ((int) $array['fields'][$joinField] === (int) $data['fields']['id']) {

                                            $fieldsData = array();
                                            foreach ($joinedFields as $joinedField) {
                                                if (isset($data['fields'][$joinedField])) {
                                                    $fieldsData[$joinedField] = $data['fields'][$joinedField];
                                                } else {
                                                    $fieldsData[$joinedField] = '';
                                                }
                                            }

                                            if (count($fieldsData) > 1) {
                                                unset($fieldsData['id']);
                                                if (isset($options[$field]['link_format'])) {
                                                    $caption = vsprintf($options[$field]['link_format'], $fieldsData);
                                                } else {
                                                    $caption = implode(' ', $fieldsData);
                                                }
                                            } else {
                                                $fieldsData['id'] = $entityId;
                                                $caption          = implode(' ', $fieldsData);
                                            }

                                            // Заменяем в title поля связанные точкой
                                            if (isset($options[$field]['title_format']) && isset($differences[$idRev]['data'][$cm->name][$id]['title'])) {
                                                $title = $differences[$idRev]['data'][$cm->name][$id]['title'];
                                                foreach ($joinedFields as $joinedField) {
                                                    if (isset($data['fields'][$joinedField])) {
                                                        $title                                                = str_replace($joinField.'.'.$joinedField, $data['fields'][$joinedField], $title);
                                                        $differences[$idRev]['data'][$cm->name][$id]['title'] = $title;
                                                    }
                                                }
                                            }

                                            $returnData = array(
                                                'id' => $data['fields']['id'],
                                                'className' => $joinFieldClassMetadata->name,
                                                'caption' => $caption,
                                            );

                                            $differences[$idRev]['data'][$cm->name][$id]['fields'][$joinField] = $returnData;
                                            unset($differences[$idRev]['data'][$joinFieldClassMetadata->name][$entityId]);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        // Находим измененные поля у ревизий
        $i               = 0;
        $idRevPrev       = 0;
        $differencesTemp = $differences;
        $differences     = array();
        foreach ($differencesTemp as $idRev => $difference) {
            if ($i !== 0) {
                foreach ($difference['data'] as $className => $data) {
                    foreach ($data as $id => $array) {

                        if (!isset($data[$id]['type'])) {
                            unset($difference['data'][$className][$id]);
                            continue;
                        }

                        if ($data[$id]['type'] === 'UPD') {
                            if (isset($differencesTemp[$idRevPrev]['data'][$className][$id])) {
                                $diff = $this->arrayDiff($differencesTemp[$idRevPrev]['data'][$className][$id]['fields'], $array['fields'], $exception);
                                if (!empty($diff)) {
                                    $difference['data'][$className][$id]['fields'] = $diff;
                                } else {
                                    unset($difference['data'][$className][$id]);
                                }
                            } else {
                                unset($difference['data'][$className][$id]);
                            }
                        } elseif (in_array($data[$id]['type'], ['INS', 'DEL'])) {
                            $difference['data'][$className][$id]['fields'] = array();
                            foreach ($options as $optKey => $optField) {
                                if (!isset($optField['classMetadata'])) {
                                    continue;
                                }
                                $cm = $optField['classMetadata'];

                                if ($cm->name === $className) {

                                    foreach ($array['fields'] as $field => $value) {
                                        if (isset($options[$optKey]['property']) && (in_array($field, $options[$optKey]['property']) || is_array($value))) {
                                            $difference['data'][$className][$id]['fields'][$field] = $value;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            $differences[$idRev] = $difference;
            $idRevPrev           = $idRev;
            $i++;
        }
        unset($differencesTemp);

        // очишаем массив разностей от пустых полей
        foreach ($differences as $i => $difference) {
            if (isset($difference['data'])) {
                foreach ($difference['data'] as $className => $fields) {
                    if (empty($fields)) {
                        unset($differences[$i]['data'][$className]);
                    }
                }
            }
            if (!isset($differences[$i]['data']) || empty($differences[$i]['data'])) {
                unset($differences[$i]);
            }
        }

        // выбираем из БД пользователей, сделавших изменения с полученной сушностью для создания ссылки на пользователя
        $users = $em->getRepository('ApplicationSonataUserBundle:User')->findBy(['username' => array_unique($usernames)]);
        foreach ($differences as $id => $difference) {
            foreach ($users as $user) {
                if ($difference['username'] === $user->getUsername()) {
                    $differences[$id]['user'] = $user;
                }
            }
        }
        unset($users);

        foreach ($options as $field => $optField) {
            if (isset($options[$field]) && isset($optField['classMetadata'])) {
                $options[$optField['classMetadata']->name] = $options[$field];
                unset($options[$field]);
            }
        }

        return [
            'differences' => array_reverse($differences),
            'options' => $options,
        ];
    }
}