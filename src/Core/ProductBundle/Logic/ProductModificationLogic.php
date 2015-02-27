<?php

/**
 * Бизнесс логика для управления модификациями продукта
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Logic;

use Core\ProductBundle\Entity\CommonProductModification;
use Core\ProductBundle\Entity\Repository\CommonProductRepository;
use Doctrine\Common\Collections\ArrayCollection;

class ProductModificationLogic {

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
     * Доформировывает список модификаций. Нужен когда мы добавили в форме записи, а после сабмита форма не прошла валидацию.
     * Нужно  сохранить порядок записей и их сортировку
     * @param type $data
     * @param type $dInfo
     * @param type $targetEntityStr
     * @param type $classname
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getDataList($data, $dInfo, $classname) {

        $newData = new ArrayCollection();
        if (isset($dInfo['ids'])) {
            foreach ($dInfo['ids'] as $d_id) {
                $need = true;
                foreach ($data as $d) {
                    if ($d_id == $d->getId()) {
                        $need = false;
                        break;
                    }
                }

                if ($need) {
                    $subject = $this->em->createQuery('SELECT d FROM ' . $classname . ' d   WHERE d.id=:id')
                            ->setParameters(['id' => $d_id])
                            ->getOneOrNullResult();
                    $newData->add($subject);
                } else {
                    $newData->add($d);
                }
            }
        }

        return $newData;
    }

    /**
     * Сохранение редактирования модификаций: сортировка/удаление и т.д.
     * @param type $data
     * @param type $obj
     * @return boolean
     */
    public function updateCollections($data, $obj, $propertyFields, $sortable) {
        
        $things = [];
        if (!$data || !$obj->getId()) {
            //возможно здесь будет обработка, если запись еще не создана
            return $things;
        }
        //ставим текущий объект как главный, если это
        if (!isset($data['general'])) {
            $data['general'] = $obj->getId();
        }

        $dataById = array();
        $dataDeleteById = array();
        $dataUndockById = array();
        $needToResetgeneral = false;
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

        if (isset($data['ids'])) {
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


            $unionGetter = 'get' . ucfirst($propertyFields[0]);
            $unionSetter = 'set' . ucfirst($propertyFields[0]);
            $indexPositionGetter = 'get' . ucfirst($sortable);
            $indexPositionSetter = 'set' . ucfirst($sortable);

            $modificationUnion = $obj->$unionGetter();

//            if (count($data['ids'])) {
                //берём все связные записи одним разом
                $pmu = $this->em->createQuery('SELECT u  FROM ' . get_class($obj) . ' u WHERE u.id IN (:ids)')
                        ->setParameters(['ids' => $data['ids']])
                        ->getResult();

                foreach ($pmu as $p) {
                    //если изменили главную модификацию
                    if ($data['general'] == $p->getId() && (!$modificationUnion->getGeneral() || $modificationUnion->getGeneral()->getId() != $data['general'])) {
                        if (!isset($dataById[$p->getId()]['_delete']) && !isset($dataById[$p->getId()]['_undock'])) {
                            $modificationUnion->setGeneral($p);
                            $things[] = $modificationUnion;
                        }
                    }

                    if (isset($dataById[$p->getId()])) {
                        //удаляем запись
                        if (isset($dataById[$p->getId()]['_delete'])) {
                            if ($modificationUnion->getGeneral() && $modificationUnion->getGeneral()->getId() == $p->getId()) {
                                $needToResetgeneral = true;
                            }
                            $modificationUnion->getDataList()->removeElement($p);
                            $this->em->remove($p);
                        }
                        //открепляем запись
                        else if (isset($dataById[$p->getId()]['_undock'])) {
                            if ($modificationUnion->getGeneral() && $modificationUnion->getGeneral()->getId() == $p->getId()) {
                                $needToResetgeneral = true;
                            }
                            $p->$unionSetter(NULL);
                            $things[] = $p;
                        }
                        //меняем сортировку
                        else if (isset($dataById[$p->getId()]['_indexPosition']) && $dataById[$p->getId()]['_indexPosition'] != $p->$indexPositionGetter()) {
                            $p->$indexPositionSetter($dataById[$p->getId()]['_indexPosition']);
                            $things[] = $p;
                        }
                    }
                }

                //если произошло удаление или открепление записи, которая являлась главной, тогда ставим текущий объект
                if ($needToResetgeneral) {
                    $modificationUnion->setGeneral($obj);
                    $things[] = $modificationUnion;
                }
            }
//        }
        return $things;
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
                    if (!isset($data['general_id'])) {
                        $data['general_id'] = $newObject->getModificationUnion()->getGeneral()->getId();
                    }
                    $data['d'] = $newObject;
                    $items[]['html'] = $this->templating->render('CoreProductBundle::Admin/Form/modifications_widget/generate_table_row.html.twig', $data);
                }
            }

            $res['rows'] = $items;
        }

        return $res;
    }

    /**
     * Назначает выбранную запись
     * @param array $data
     * @return type
     */
    public function setRecordToModification($data) {
        $errors = [];
        $data['targetEntity'] = urldecode($data['targetEntity']);
        //берём запись к которой нужно прицепить
        $subject = $this->em->createQuery('SELECT d FROM ' . $data['targetEntity'] . ' d  WHERE d.id=:id')
                ->setParameters(['id' => $data['subject_id']])
                ->getOneOrNullResult();

        //берём запись, которую следует прицепить
        $selectedObject = $this->em->createQuery('SELECT d FROM ' . $data['targetEntity'] . ' d WHERE d.id=:id')
                ->setParameter('id', $data['selected_object_id'])
                ->getOneOrNullResult();

        //ставим индекс сортировки на конец
        if ($data['sortable']) {
            $indexPositionSetter = 'set' . ucfirst($data['sortable']);
            if ($subject->getModificationUnion()->getDataList()) {
                $index = $subject->getModificationUnion()->getDataList()->count();
            } else {
                $index = 0;
            }
            $selectedObject->$indexPositionSetter($index + 1);
        }

        $mappedByGetter = 'get' . ucfirst($data['mappedBy']);
        $mappedBySetter = 'set' . ucfirst($data['mappedBy']);
        $two_records = false;
        $unionSelected = $selectedObject->$mappedByGetter();

        //проверяем, вдруг запись переносим в другую группу, а она отмечена как главная
        if ($unionSelected->getGeneral() && $unionSelected->getGeneral()->getId() == $selectedObject->getId()) {
            $unionSelected->setGeneral(NULL);
            $this->em->persist($unionSelected);
        }

        //если запись к которой цепляем существует
        if (isset($data['subject_id']) && $data['subject_id'] && $subject) {
            $union = $subject->$mappedByGetter();
            //проверяем нужно ли объединение
            if (!$union->getId()) {
                //нужно создать объединение
                $newUnion = $subject->$mappedByGetter();   //гетер возвращает новое объединение
                $newUnion->setGeneral($subject);
                $subject->$mappedBySetter($newUnion);
                $selectedObject->$mappedBySetter($newUnion);
                $this->em->persist($subject);
                $this->em->persist($selectedObject);
                $two_records = true;
            } else {
                // $selectedObject->$mappedBySetter($subject)->$mappedByGetter());

                if (!$union->getGeneral()) {
                    $union->setGeneral($subject);
                    $this->em->persist($union);
                }
                //просто назначаем продукту созданное ранее объединение
                $selectedObject->$mappedBySetter($union);
                $this->em->persist($selectedObject);
            }
        }

        //формируем результат
        if ($two_records) {
            if (isset($data['subject_id']) && $data['subject_id']) {
                $res = array($subject, $selectedObject);
            } else {
                $res = array(false, $selectedObject);
            }
        } else {
            $res = array(false, $selectedObject);
        }
        $this->em->flush();
        return array($errors, $res);
    }

    /**
     * Открепляет выбранную запись из объединеня
     * @param array $data
     * @return type
     */
    public function unsetRecordFromModification($data) {
        $errors = [];
        $data['targetEntity'] = urldecode($data['targetEntity']);
        // $data['options']['class'] = urldecode($data['options']['class']);
        //берём все связные записи одним разом
        $object = $this->em->createQuery('SELECT u FROM ' . $data['targetEntity'] . ' u WHERE u.id = :id')
                ->setParameter('id', $data['selected_object_id'])
                ->getOneOrNullResult();

        if ($object) {
            //сбрасываем сортировку
            if ($data['sortable']) {
                $indexPositionSetter = 'set' . ucfirst($data['sortable']);
                $object->$indexPositionSetter(NULL);
            }

            //если открепили запись, которая была главной, тогда ставим главной запись с которой пришли
            $mappedByGetter = 'get' . ucfirst($data['mappedBy']);
            $mappedBySetter = 'set' . ucfirst($data['mappedBy']);
            $general = $object->$mappedByGetter()->getGeneral();
            if ($general && $general->getId() == $data['selected_object_id']) {
                $query = $this->em->createQuery('SELECT u FROM ' . $data['targetEntity'] . ' u WHERE u.id = :id')
                        ->setParameter('id', $data['subject_id']);
                $subject = $query->getOneOrNullResult();
                $union = $subject->$mappedByGetter();
                $union->setGeneral($subject);
                $this->em->flush($union);
            }
            //открепляем
            $object->$mappedBySetter(NULL);
            $this->em->flush($object);
        }

        return array($errors, $object);
    }

    /**
     * Создание дубликата
     * @param type $data
     * @return type
     */
    public function createDublicate($data) {

        $object = $this->em->getRepository('CoreProductBundle:CommonProduct')->getOneWithJoins($data['subject_id']);

        if ($object->getId()) {
            $newObject = $this->cloneObject($object);
            $newObject
                    ->setArticle($data['newArticle'])
                    ->setSlug(NULL)
                    ->setCreatedDateTime(new \DateTime())
                    ->setReviewsRating(NULL)
                    ->setReviewsCount(NULL)
                    ->setModificationUnion(NULL)
                    ->setIsEnabled(false)
            ;

            $errors = $this->validator->validate($newObject);
            if (!count($errors)) {

                $this->em->getConnection()->beginTransaction();
                try {
                    $this->em->persist($newObject);
                    $this->em->flush();
                    $this->em->refresh($newObject); //нужно обновление, иначе файлы не скопируются
                    //копируем файлы, если есть связь с FileBundle
                    $this->core_file_logic->copyAllFiles($object, $newObject);
                    $this->em->getConnection()->commit();
                } catch (\Exception $e) {
                    $this->em->getConnection()->rollback();
                    $this->em->close();
                    throw $e;
                }
            }
        } else {
            $newObject = null;
            $errors['not_founded'] = 'Не верно указан ID!';
        }

        return array($errors, $newObject);
    }

    /**
     * Создание модификации продукта
     * @param type $data
     * @return type
     */
    public function createProductModification($data) {

        $object = $this->em->getRepository('CoreProductBundle:CommonProduct')->getOneWithJoins($data['subject_id']);

        if ($object->getId()) {
            //проверяем есть ли созданное объединение
            if (!$object->getModificationUnion()->getId()) {
                $pmu = new CommonProductModification();
                $object->setModificationUnion($pmu);
                $pmu->setGeneral($object);
                $this->em->persist($object);
            } else {
                $pmu = false;
            }

            //ставим индекс сортировки на конец
            if ($data['sortable']) {
                $indexPositionSetter = 'set' . ucfirst($data['sortable']);
                if ($object->getModificationUnion()->getDataList()) {
                    $index = $object->getModificationUnion()->getDataList()->count();
                } else {
                    $index = 0;
                }
            } else {
                $index = 0;
            }

            $newObject = $this->cloneObject($object);
            $newObject
                    ->setArticle($data['newArticle'])
                    ->setSlug(NULL)
                    ->$indexPositionSetter($index + 1)
                    ->setCreatedDateTime(new \DateTime())
                    ->setReviewsRating(NULL)
                    ->setReviewsCount(NULL)
            ;

            $errors = $this->validator->validate($newObject);
// $errors=[];
            if (!count($errors)) {

                $this->em->getConnection()->beginTransaction();
                try {
                    $this->em->persist($newObject);
                    $this->em->flush();
                    $this->em->refresh($newObject); //нужно обновление, иначе файлы не скопируются
                    //копируем файлы, если есть связь с FileBundle
                    $this->core_file_logic->copyAllFiles($object, $newObject);
                    $this->em->getConnection()->commit();
                } catch (\Exception $e) {
                    $this->em->getConnection()->rollback();
                    $this->em->close();
                    throw $e;
                }
            }
        } else {
            $newObject = null;
            $errors['not_founded'] = 'Не верно указан ID!';
        }
        if ($pmu) {
            $res = array($object, $newObject);
        } else {
            $res = array(false, $newObject);
        }
        return array($errors, $res);
    }

    /**
     * Клонируем обект со всеми связями
     * @param type $object
     * @param type $em
     * @return type
     */
    function cloneObject($object) {
        //сущности, которые нельзя клонировать
        $notClonedEntities = [
            'Core\FileBundle\Entity\ImageFile',
            'Core\FileBundle\Entity\DocumentFile',
            'Core\LogisticsBundle\Entity\UnitInStock',
            'Core\LogisticsBundle\Entity\ProductAvailability',
            'Core\UnionBundle\Entity\UserProductFavoriteUnion',
            'Core\UnionBundle\Entity\UserProductHistoryUnion',
            'Core\ReviewBundle\Entity\Review',
            'Core\OrderBundle\Entity\Order',
            'Core\OrderBundle\Entity\Composition'
        ];

        $newObject = clone $object;

        $meta = $this->em->getClassMetadata(get_class($object));
        $cols = $meta->getAssociationNames();  //берём поля, для которых есть связи

        foreach ($cols as $c) {
            //если OneToMnay или ManyToMany
            if ($meta->isCollectionValuedAssociation($c)) {
                $map = $meta->getAssociationMapping($c);    //берём подробную информацию о поле
                if (!in_array($map['targetEntity'], $notClonedEntities)) {    //пропускаем сущности, которые нельзя клонировать
                    if ($map['inversedBy']) {
                        $c2 = $map['inversedBy'];
                    } else if ($map['mappedBy']) {
                        $c2 = $map['mappedBy'];
                    } else {
                        $c2 = false;
                    }
                    $getter = 'get' . ucfirst($c);
                    $setter = 'set' . ucfirst($c);
                    // $getter2 = 'get' . ucfirst($c2);
                    $setter2 = 'set' . ucfirst($c2);

                    $collections = $object->$getter();  //берём колекцию
                    if ($collections->count()) {
                        $newObject->$setter(new ArrayCollection()); //обнуляем коллекцию
                        foreach ($collections as $col) {
                            if ($c2) {  //двухсторонняя связь
                                if ($map['mappedBy']) { //один к многим
                                    $collection = clone $col;
                                    $collection->$setter2($newObject);
                                } else {
                                    $collection = $col; //многие к многим
                                }
                            } else { //односторонняя связь
                                if ($map['mappedBy']) { //один к многим
                                    $collection = clone $col;
                                } else {
                                    $collection = $col; //многие к многим.
                                }
                            }
                            $newObject->$getter()->add($collection);
                        }
                    }
                }
            }
        }
        return $newObject;
    }

}
