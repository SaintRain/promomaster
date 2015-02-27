<?php

/**
 * Бизнесс логика для объединений
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\UnionBundle\Logic;

use Core\UnionBundle\Entity\ProductModificationUnion;
use Core\ProductBundle\Entity\Repository\CommonProductRepository;
use Doctrine\Common\Collections\ArrayCollection;

class UnionLogic {

    private $em;
    private $validator;
    private $core_file_logic;
    private $templating;
    public $fieldsInfo;

    public function __construct($em, $validator, $templating, $core_file_logic) {
        $this->em = $em;
        $this->validator = $validator;
        $this->templating = $templating;
        $this->core_file_logic = $core_file_logic;
    }

    /**
     * Доформировывает список записей. Нужен когда мы добавили в форме записи, а после сабмита форма не прошла валидацию.
     * Нужно  сохранить порядок записей и их сортировку
     * @param type $data
     * @param type $dInfo
     * @param type $targetEntityStr
     * @param type $classname
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getDataList($data, $dInfo, $targetEntityStr, $classname) {

        $newData = new ArrayCollection();
        if (isset($dInfo['ids'])) {
            foreach ($dInfo['ids'] as $d_id) {
                $need = true;
                foreach ($data as $d) {
                    if ($d_id == $d->getTargetObject()->getId()) {
                        $need = false;
                        break;
                    }
                }

                if ($need) {
                    //определяем базовый класс
                    $meta = $this->em->getClassMetadata($classname);
                    $rootEntityName = $meta->rootEntityName;

                    $targetEntity = new $targetEntityStr();
                    $subject = $this->em->createQuery('SELECT d FROM ' . $rootEntityName . ' d   WHERE d.id=:id')
                            ->setParameters(['id' => $d_id])
                            ->getOneOrNullResult();
                    $targetEntity->setTargetObject($subject);
                    $newData->add($targetEntity);
                } else {
                    $newData->add($d);
                }
            }
        }

        return $newData;
    }

    /**
     * Сохранение редактирования прикреплённых записей: сортировка/удаление и т.д.
     * @param type $data
     * @param type $obj
     * @return boolean
     */
    public function updateCollections($data, $obj, $field_description, $sortable, $form_type_options) {

        $things = [];

        if (!$data) {
            //возможно здесь будет обработка, если запись еще не создана
            return $things;
        }

        $dataById = array();
        $dataDeleteById = array();
        $dataUndockById = array();
        if (isset($data['_delete'])) {
            foreach ($data['_delete'] as $delete_id) {
                $dataDeleteById[$delete_id] = true;
            }
        }
        if (isset($data['_undock'])) {
            foreach ($data['_undock'] as $undock_id) {
                $dataUndockById[$undock_id] = true;
            }
        }

        foreach ($data['ids'] as $key => $d_id) {
            if (isset($data['_indexPosition'][$key])) {
                $dataById[$d_id]['_indexPosition'] = $data['_indexPosition'][$key];
            }

            if (isset($dataDeleteById[$d_id])) {
                $dataById[$d_id]['_delete'] = $d_id;
            }

            if (isset($dataUndockById[$d_id])) {
                $dataById[$d_id]['_undock'] = $d_id;
            }
        }

        $getter = 'get' . ucfirst($field_description->getName());

        //сеттер для поля сортировки
        if ($sortable) {
            $indexPositionGetter = 'get' . ucfirst($sortable);
            $indexPositionSetter = 'set' . ucfirst($sortable);
        }

        if (count($data['ids'])) {
            $unions = $obj->$getter(); //берём все прикреплённые записи
            $u_ids = [];
            foreach ($unions as $u_key => $union) {                
                $p = $union->getTargetObject();
                $u_ids[$p->getId()] = true;
                if (isset($dataById[$p->getId()])) {
                    //удаляем запись
                    if (isset($dataById[$p->getId()]['_delete'])) {
                        $unions->remove($u_key);                        
                        $things['remove'][] = $union;
                        $things['remove'][] = $p;                        
                    }
                    //открепляем запись
                    else if (isset($dataById[$p->getId()]['_undock'])) {
                        if ($form_type_options['cascadeUpdateToAllTargetObject'] && get_class($union->getTargetObject()) == get_class($obj)) {
                            $this->cascadeRemoveCollections(['field_name' => $field_description->getName()], $union->getTargetObject(), $obj);
                        }
                        $things['remove'][] = $union;
                    }
                    //меняем сортировку
                    else if ($sortable && isset($dataById[$p->getId()]['_indexPosition']) && $dataById[$p->getId()]['_indexPosition'] != $union->$indexPositionGetter()) {
                        $union->$indexPositionSetter($dataById[$p->getId()]['_indexPosition']);
                        $things['persist'][] = $union;
                    }
                }
            }

            //проверка на добавление
            $needAdd = [];
            foreach ($data['ids'] as $id) {
                if (!isset($u_ids[$id]) && !isset($dataById[$id]['_undock']) && !isset($dataById[$id]['_delete'])) {
                    $needAdd[] = $id;
                }
            }

            if (count($needAdd)) {
                //берём записи, которые следует прицепить
                $targetEntityStr = $field_description->getAssociationMapping()['targetEntity'];    //связующий объект
                $targetEntity = new $targetEntityStr();
                $meta = $this->em->getClassMetadata(get_class($targetEntity));
                $targetObjectInfo = $meta->getAssociationMapping('targetObject');

                //определяем базовый класс
                $meta2 = $this->em->getClassMetadata($targetObjectInfo['targetEntity']);
                $rootEntityName = $meta2->rootEntityName;

                $selectedObjects = $this->em->createQuery('SELECT d FROM ' . $rootEntityName . ' d INDEX BY d.id WHERE d.id IN (:ids)')
                        ->setParameter('ids', $needAdd)
                        ->getResult();
                $index = 1;
                foreach ($data['ids'] as $id) {
                    if (isset($selectedObjects[$id])) {
                        $targetEntity = new $targetEntityStr();
                        $targetEntity->setIndexPosition($index);
                        $targetEntity->setTargetObject($selectedObjects[$id]);
                        $targetEntity->setMappedObject($obj);
//                        $this->em->persist($targetEntity);
                        $things['persist'][] = $targetEntity;                        
                        $index++;
                    }
                }
            }
        }        
        return $things;
//        $this->em->flush();
    }

    /**
     * Генерирует ответ после создания модификаций
     * @param type $errors
     * @param type $newObjectList
     * @return type
     */
    function generateResponse($data, $errors, $newObjectList) {
        if (count($errors)) {
            $er = [];
            foreach ($errors as $e) {
                $t['message'] = $e->getMessage();
                $t['invalidValue'] = $e->getInvalidValue();
                $er[$e->getPropertyPath()] = $t;
            }

            $res = array(
                'errors' => $er
            );
        } else {
            $res = array();
            $items = array();
            foreach ($newObjectList as $key => $newObject) {
                if ($newObject) {
                    $data['d'] = $newObject->getTargetObject();
                    $data['union'] = $newObject;

                    $items[]['html'] = $this->templating->render('CoreUnionBundle::Admin/Form/generate_table_row.html.twig', $data);
                }
            }

            $res['rows'] = $items;
        }

        return $res;
    }

    public function cascadeUpdateCollections($data, $selectedObject, $subject) {
        $getter = 'get' . ucfirst($data['field_name']);
        $setter = 'set' . ucfirst($data['field_name']);
        $addCollection = 'add' . ucfirst($data['field_name']);
        $targetEntityStr = $data['targetEntity'];    //связующий объект
        //для всех связных записей делаем каскадное обновление
        foreach ($subject->$getter() as $u) {
            if ($subject->getId() != $u->getTargetObject()->getId()) {  //исключаем себя
                if ($u->getTargetObject()->getId() == $selectedObject->getId()) {
                    $new = [$subject];
                    foreach ($subject->$getter() as $u_temp) {
                        if ($u_temp->getTargetObject()->getId() != $selectedObject->getId()) {
                            $new[] = $u_temp->getTargetObject();
                        }
                    }

                    //добавляем все элементы из исходного
                    foreach ($new as $n) {
                        $add = true;
                        foreach ($u->getTargetObject()->$getter() as $u2) {
                            if ($u2->getTargetObject()->getId() == $n->getId()) {
                                $add = false;
                                break;
                            }
                        }
                        if ($add) {
                            $targetEntitySelected = new $targetEntityStr();
                            $targetEntitySelected->setMappedObject($u->getTargetObject());
                            $targetEntitySelected->setTargetObject($n);
                            $this->em->persist($targetEntitySelected);
                        }
                    }
                } else {
                    $add = true;
                    foreach ($u->getTargetObject()->$getter() as $u2) {
                        if ($u2->getTargetObject()->getId() == $selectedObject->getId()) {
                            $add = false;
                            break;
                        }
                    }
                    if ($add) {
                        $targetEntitySelected = new $targetEntityStr();
                        $targetEntitySelected->setMappedObject($u->getTargetObject());
                        $targetEntitySelected->setTargetObject($selectedObject);
                        $this->em->persist($targetEntitySelected);
                    }
                }
            }
        }
    }

    public function cascadeRemoveCollections($data, $unselectedObject, $subject) {
        $getter = 'get' . ucfirst($data['field_name']);
        $removeCollection = 'remove' . ucfirst($data['field_name']);
        //для всех связных записей делаем каскадное обновление
        foreach ($subject->$getter() as $u) {
            if ($u->getTargetObject()->getId() != $subject->getId()) {
                if ($u->getTargetObject()->getId() == $unselectedObject->getId()) {
                    foreach ($u->getTargetObject()->$getter() as $u2) {
                        $u2->getMappedObject()->$removeCollection($u2);
                        $this->em->remove($u2);
                    }
                } else {
                    foreach ($u->getTargetObject()->$getter() as $u2) {
                        if ($u2->getTargetObject()->getId() == $unselectedObject->getId()) {
                            $u2->getMappedObject()->$removeCollection($u2);
                            $this->em->remove($u2);
                            break;
                        }
                    }
                }
            }
        }
    }

    /**
     * Назначает выбранную запись 
     * @param array $data
     * @return type
     */
    public function setRecordToUnion($data) {
        $errors = [];
        $data['targetEntity'] = urldecode($data['targetEntity']);
        $data['options']['class'] = urldecode($data['options']['class']);
        $targetEntityStr = $data['targetEntity'];    //связующий объект
        $targetEntity = new $targetEntityStr();

        //берём запись к которой нужно прицепить
        $getter = 'get' . ucfirst($data['field_name']);
        $setter = 'set' . ucfirst($data['field_name']);
        $addCollection = 'add' . ucfirst($data['field_name']);
        $removeCollection = 'remove' . ucfirst($data['field_name']);
        $subject = $this->em->createQuery('SELECT d FROM ' . $data['options']['class'] . ' d LEFT JOIN d.' . $data['field_name'] . ' u  WHERE d.id=:id')
                ->setParameters(['id' => $data['subject_id']])
                ->getOneOrNullResult();

        //берём запись, которую следует прицепить
        $meta = $this->em->getClassMetadata(get_class($targetEntity));
        $targetObjectInfo = $meta->getAssociationMapping('targetObject');
        //определяем базовый класс
        $meta2 = $this->em->getClassMetadata($targetObjectInfo['targetEntity']);
        $rootEntityName = $meta2->rootEntityName;

        $selectedObject = $this->em->createQuery('SELECT d FROM ' . $rootEntityName . ' d WHERE d.id=:id')
                ->setParameter('id', $data['selected_object_id'])
                ->getOneOrNullResult();

        //ставим индекс сортировки на конец
        if ($data['sortable'] && $subject) {
            $indexPositionSetter = 'set' . ucfirst($data['sortable']);
            $targetEntity->$indexPositionSetter($subject->$getter()->count() + 1);
        }

        $targetEntity->setTargetObject($selectedObject);
        if (isset($data['subject_id']) && $data['subject_id']) {
            $targetEntity->setMappedObject($subject);
            $this->em->persist($targetEntity);
            $subject->$addCollection($targetEntity);

            //для всех связных записей делаем каскадное обновление
            if ($data['options']['cascadeUpdateToAllTargetObject'] && get_class($selectedObject) == get_class($subject)) {
                $this->cascadeUpdateCollections($data, $selectedObject, $subject);
            }
            //для записи, которую прикрепляем ставим также исходную запись, если нужно
            else if ($data['options']['setThisToTargetObject'] && get_class($selectedObject) == get_class($subject)) {
                $needAdd = true;
                foreach ($selectedObject->$getter() as $u) {
                    if ($u->getTargetObject()->getId() == $subject->getId()) {
                        $needAdd = false;
                        break;
                    }
                }
                if ($needAdd) {
                    $targetEntitySelected = new $targetEntityStr();
                    $targetEntitySelected->setMappedObject($selectedObject);
                    $targetEntitySelected->setTargetObject($subject);
                    $selectedObject->$addCollection($targetEntitySelected);
                    $this->em->persist($selectedObject);
                }
            }

            $this->em->flush();
        }

        //формируем результат       
        return array($errors, [false, $targetEntity]);
    }

    /**
     * Открепляет выбранную запись из объединеня
     * @param array $data
     * @return type
     */
    public function unsetRecordFromUnion($data) {
        $errors = [];
        $getter = 'get' . ucfirst($data['field_name']);
        $removeCollection = 'remove' . ucfirst($data['field_name']);
        $data['targetEntity'] = urldecode($data['targetEntity']);
        $union = $this->em->createQuery('SELECT u FROM ' . $data['targetEntity'] . ' u WHERE u.mappedObject=:mappedObject
                        AND u.targetObject=:targetObject')
                ->setParameters(['mappedObject' => $data['subject_id'], 'targetObject' => $data['selected_object_id']])
                ->getOneOrNullResult();

        if ($union) {
            $subject = $union->getMappedObject();
            $selectedObject = $union->getTargetObject();

            //сбрасываем сортировку
            if ($data['sortable']) {
                //$indexPositionSetter = 'set' . ucfirst($data['sortable']);                
                //$selectedObject->$indexPositionSetter(NULL);
                $this->em->persist($selectedObject);
            }

            //каскадное удаление всех связаных записей
            if ($data['options']['cascadeUpdateToAllTargetObject'] && get_class($selectedObject) == get_class($subject)) {
                $this->cascadeRemoveCollections($data, $selectedObject, $subject);
            }

            //берём связующую запись и удаляем
            $subject->$removeCollection($union);
            $this->em->remove($union);
            $this->em->flush();
        }

        return $errors;
    }

}
