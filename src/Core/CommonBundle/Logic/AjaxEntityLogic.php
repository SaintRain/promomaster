<?php

/**
 * Сервис для работы с типом формы ajax_entity
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Logic;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\PersistentCollection;
use Core\FileBundle\Entity\ImageFile;
use Doctrine\ORM\Query\Expr\Join;

class AjaxEntityLogic
{

    protected $doctrine;
    protected $fileLogic;
    protected $encodingLogic;
    protected $paginator;
    protected $frontendRoute = 'core_common_ajax_entity_frontend';
    protected $frontendNamespaces = array(// namespaces разрешенные для frontend
        'Core\ProductBundle\Entity\CommonProduct',
        'Core\DirectoryBundle\Entity\City',
        'Core\LogisticsBundle\Entity\Bank'
    );
    protected $ban = array(); // namespaces запрещенные полностью
    protected $params; //глобальный параметры системы

    public function __construct($doctrine, $fileLogic, $encodingLogic, $paginator, $params)
    {
        $this->doctrine = $doctrine;
        $this->fileLogic = $fileLogic;
        $this->encodingLogic = $encodingLogic;
        $this->paginator = $paginator;
        $this->params = $params;

    }

    public function getData(Request $request)
    {
        $isFrontend = $request->attributes->get('_route') === $this->frontendRoute;
        $join = $request->query->get('join');
        $getPaginate = $request->query->get('getPaginate');
        $class = class_exists($request->query->get('class')) ? $request->query->get('class') : $this->encodingLogic->decode($request->query->get('class'));
        $properties = class_exists($request->query->get('class')) ? json_decode($request->query->get('properties'), true) : json_decode($this->encodingLogic->decode($request->query->get('properties')), true);
        $query = $request->query->get('query');
        $max_results = $request->query->get('max_results');
        $page = $request->query->get('page') ? $request->query->get('page') : 1;
        $init = $request->query->get('init');
        $initData = $request->query->get('initData');
        $initImages = $request->query->get('initImages');
        $add_to_query = class_exists($request->query->get('class')) ? json_decode($request->query->get('add_to_query'), true) : json_decode($this->encodingLogic->decode($request->query->get('add_to_query')), true);
        $ids = explode(',', $query);
        $selectedIds = explode(',', $request->query->get('selectedIds'));

        $em = $this->doctrine->getManager();

        if (!$class || in_array($class, $this->ban) || ($isFrontend && !in_array($class, $this->frontendNamespaces))) {
            throw new NotFoundHttpException('Cann\'t get class.');
        }

        if (strlen($query) <= 0) {
            throw new NotFoundHttpException('Cann\'t get query.');
        }

        if (!isset($properties['id'])) {
            $properties['id'] = array(
                'search' => false,
                'return' => true,
            );
        }
        $objectsArray = array();
        $isInit = false;

        if (!empty($initData)) {
            $isInit = true;
            foreach ($ids as $id) {
                if (isset($initData[$id])) {
                    $objectsArray[] = $initData[$id];
                } else {
                    $isInit = false;
                }
            }
        }

        if (!$isInit) {

            $qb = $em
                ->getRepository($class)
                ->createQueryBuilder('entity');

            if ($join) {
                $qb->addSelect($join)->leftJoin('entity.' . $join, $join);
            }

            // собираем все поля пришедшей сущности, для проверки на наличие поля в таблице
            $classMetadata = $em->getClassMetadata($class);
            $columnNames = $classMetadata->columnNames;

            if ($init) {
                $qb
                    ->andWhere('entity.id IN (:ids)')
                    ->setParameter('ids', $ids)
                    ->setMaxResults($max_results);
                $offset = abs($page - 1) * $max_results;
                if ($offset > 0) {
                    $qb->setFirstResult($offset);
                }

                $objectsArray = $qb->getQuery()->getResult();
            } else {
                foreach ($properties as $property => $options) {
                    $entity = 'entity';
                    if (isset($options['search']) && $options['search']) {

                        if (strpos($property, '.') > 0) {
                            list($join, $property) = explode('.', $property);
                            $qb
                                ->addSelect($join . '_' . $property)
                                ->leftJoin($entity . '.' . $join, $join . '_' . $property);
                            $entity = $join . '_' . $property;
                        } elseif (!isset($columnNames[$property])) {
                            // если поле не найдено в главной сущности, то проверяем его в SINGLE_TABLE и JOINED_TABLE
                            $discriminatorMap = $classMetadata->discriminatorMap;
                            if (is_array($discriminatorMap)) {
                                foreach ($discriminatorMap as $secondClass) {
                                    $secondClassMetadata = $em->getClassMetadata($secondClass);
                                    if (isset($secondClassMetadata->columnNames[$property])) {
                                        $classJoin = 'join_' . $entity . '_' . $property;
                                        $qb->leftJoin(
                                            $secondClass, $classJoin, Join::WITH, $entity . '.id = ' . $classJoin . '.id'
                                        );
                                        $entity = $classJoin;
                                    }
                                }
                            }
                        }

                        $qb->orWhere(
                            $qb->expr()->like($entity . '.' . $property, ':query_' . $property)
                        );

                        if (isset($options['entry']) && $options['entry']) {
                            $entry = $options['entry'];
                        } else {
                            $entry = $request->query->get('entry');
                        }

                        switch ($entry) {
                            case 'full':
                                $qb->setParameter('query_' . $property, $query);
                                break;
                            case 'left':
                                $qb->setParameter('query_' . $property, $query . '%');
                                break;
                            case 'right':
                                $qb->setParameter('query_' . $property, '%' . $query);
                                break;
                            default:
                                $qb->setParameter('query_' . $property, '%' . $query . '%');
                                break;
                        }
                    }
                }

                // Добавляем проверку на уже выбранные элементы, только для коллекции со списком ajax_entity
                if (!empty($selectedIds) && $selectedIds[0] !== '') {
                    $qb->andWhere($entity . '.id NOT IN (:selectedIds)')->setParameter('selectedIds', $selectedIds);
                }

                if (null !== $add_to_query) {
                    // Добавляем улсовия в запрос на выборку, если указали в настройках
                    if (isset($add_to_query['where'])) {
                        foreach ($add_to_query['where'] as $whereType => $data) {
                            foreach ($data as $where) {
                                if (strpos($where, '.')) {
                                    $joins = explode('.', $where);
                                    $countJoins = count($joins);
                                    for ($i = 0; $i < $countJoins; $i++) {
                                        switch ($i) {
                                            case 0:
                                                $qb->addSelect($joins[$i])->leftJoin('entity.' . $joins[$i], $joins[$i]);
                                                break;
                                            case $countJoins - 1:
                                                $qb->{$whereType}($joins[$i - 1] . '.' . $joins[$i]);
                                                break;
                                            default:
                                                $qb->addSelect($joins[$i])->leftJoin($joins[$i] . '.' . $joins[$i], str_replace('"', "'", $joins));

                                                break;
                                        }
                                    }
                                } else {
                                    $qb->{$whereType}('entity.' . str_replace('"', "'", $where));
                                }
                            }
                        }
                    }
                }

                $qb->groupBy('entity.id');

                $paginate = $this->paginator->paginate($qb, $page, $max_results);

                if ($getPaginate) {
                    return $paginate;
                }

                $objectsArray = $paginate->getItems();
            }
        }

        $result = array();
        foreach ($objectsArray as $obj) {
            foreach ($properties as $property => $options) {
                if (isset($options['return']) && $options['return'] === true && is_object($obj)) {

                    $id = $obj->getId();

                    if (strpos($property, '.') > 0) {
                        list($join, $property) = explode('.', $property);
                        // заменяем основной объект на дочерний
                        $replacedObj = $obj;
                        $obj = $obj->{'get' . ucfirst($join)}();
                    }

                    $getter = 'get' . ucfirst($property);
                    if (method_exists($obj, $getter)) {
                        $data = $obj->{$getter}();
                        if ($data instanceof \DateTime) {
                            //ставим временную зону
                            $timezone = new  \DateTimeZone($this->params['default_timezone']);
                            $data->setTimezone($timezone);
                            $data = $data->format(isset($options['date_format']) ? $options['date_format'] : 'd.m.Y H:i');
                        }
                        if (null !== $data) {
                            // если это коллекция или массив, то вероятнее всего юзер хочет получить картинку, что и пытаемся вернуть
                            if ((is_array($data) || $data instanceof PersistentCollection)) {
                                if (is_object($data)) {
                                    $data = $data->toArray();
                                }
                                $objChild = array_shift($data);
                                if ($objChild instanceof ImageFile && $initImages) {
                                    $path = $this->fileLogic->getFileAssetWebPath($objChild, 'preview');
                                    if (null !== $path) {
                                        $result[$id][$property] = $path;
                                    }
                                }
                            } else {
                                if (isset($replacedObj)) {
                                    $result[$id][$join . ucfirst($property)] = $data;
                                } else {
                                    $result[$id][$property] = $data;
                                }
                            }
                        }
                    }

                    // возвращаем на место основной объект
                    if (isset($replacedObj)) {
                        $obj = $replacedObj;
                        unset($replacedObj);
                    }
                }
            }
        }

        return json_encode([
            'data' => $result,
            'more' => isset($paginate) ? ($page * $max_results < $paginate->getTotalItemCount() ? true : false) : false,
            'total' => isset($paginate) ? (int) $paginate->getTotalItemCount() : false]);
    }

}
