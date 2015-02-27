<?php
/**
 * Новый тип формы, получение данных по ajax
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\PersistentCollection;

class AjaxEntityType extends AbstractType
{
    private $doctrine; // Доктрина
    private $logic;
    private $templating;
    private $initData = array();
    private $encodingLogic;
    private $container;

    public function __construct($doctrine, $logic, $templating, $encodingLogic, $container)
    {
        $this->doctrine      = $doctrine;
        $this->logic         = $logic;
        $this->templating    = $templating;
        $this->encodingLogic = $encodingLogic;
        $this->container     = $container;
    }

    /**
     * Построение формы
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // обработчик для трансформации объектов в строку id'шников
        $builder->addEventListener(FormEvents::PRE_SET_DATA,
            function(FormEvent $event) {
            $data = $event->getData();
            if (null !== $data) {
                $event->setData($this->transform($data));
            }
        });

        // обработчик для трансформации строки id'шников в объекты
        $builder->addEventListener(FormEvents::PRE_BIND,
            function(FormEvent $event) {
            $data         = $event->getData();
            $form         = $event->getForm();
            $fieldName    = $form->getName();
            $parentClass  = $form->getParent()->getConfig()->getDataClass();
            $isCollection = false;
            if ($parentClass) {
                $classMetadata = $this->doctrine->getManager()->getClassMetadata($parentClass);
                $mapping       = $classMetadata->getAssociationMapping($fieldName);
                $isCollection  = $classMetadata->isCollectionValuedAssociation($fieldName) ? true : false;

                if (null !== $data) {
                    $event->setData($this->reverseTransform($data, $mapping, $isCollection));
                }
            }
        });
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $em = $this->doctrine->getManager();

        $data        = $form->getData();
        $fieldName   = $form->getName();
        $parentClass = $form->getParent()->getConfig()->getDataClass();
        $getter      = 'get'.ucfirst($fieldName);

        $attr = array(
            'class' => '',
        );

        $isCollection = false;
        if ($parentClass) {
            $classMetadata = $em->getClassMetadata($parentClass);
            $mapping       = $classMetadata->getAssociationMapping($fieldName);
            $isCollection  = $classMetadata->isCollectionValuedAssociation($fieldName) ? true : false;
        }

        if ($parentClass && '' === $options['class']) {
            // делаем один запрос, если поле ajax_entity находится в коллекции
            $parents = $form->getParent()->getParent();
            if (null !== $parents) {
                $parentRootData = $form->getRoot()->getData();
                if (is_object($parentRootData)) {
                    $parentRootDataClass = get_class($parentRootData);
                    $fieldCollection     = $parents->getName();
                    $getterCollection    = 'get'.ucfirst($fieldCollection);
                    if (method_exists($parentRootData, $getterCollection)) {
                        $collection = $parentRootData->{$getterCollection}();
                        if ($collection instanceof PersistentCollection || $collection instanceof ArrayCollection) {
                            $attr['class']           = ' collection';
                            $attr['data-collection'] = 'collection_'.$fieldCollection.'_'.$fieldName;
                            $ids                     = array();
                            foreach ($collection as $item) {
                                if (method_exists($item, $getter) && null !== $item->$getter()) {
                                    if ($item->$getter() instanceof PersistentCollection) {
                                        $ids = array_merge($ids,
                                            $item->$getter()->map(function($obj) {
                                                return $obj->getId();
                                            })->toArray());
                                    } else {
                                        $ids[] = $item->$getter()->getId();
                                    }
                                }
                            }
//                            if (!isset($this->initData[$parentRootDataClass][$fieldCollection]) && !empty($ids)) {
//                                $qb = $em->createQueryBuilder();
//                                $qb->from($mapping['targetEntity'], 'entity', 'entity.id');
//                                $qb->select('entity')->where('entity.id IN (:ids)')->setParameter('ids', $ids);
//                                $this->initData[$parentRootDataClass][$fieldCollection] = $qb->getQuery()->getResult();
//                            }
                        }
                    }
                }
            }

            $options['class'] = $mapping['targetEntity'];
        }
        if ($isCollection) {
            $options['select2_constructor']['multiple'] = true;
        }

        // Пытаемся получить связной обект
        if (count($options['initData']) === 0 && method_exists($form, 'getParent') && method_exists($form->getParent(), 'getData') && method_exists($form->getParent()->getData(), $getter)) {
            $obj = $form->getParent()->getData()->{$getter}();
            if (method_exists($obj, 'getId')) {
                $options['initData'] = [$obj];
            }
        }

        // Если есть даннае для инициализации, то будем использовать их
        if (count($options['initData']) > 0) {
            foreach ($options['initData'] as $obj) {
                if (method_exists($obj, 'getId')) {
                    $this->initData[$obj->getId()] = $obj;
                } else {
                    unset($options['initData']);
                    break;
                }
            }
        }

        // получение данных для инициализации списков
        if ($data) {
            if (gettype($data) !== 'string') {
                $data                = (string) $this->transform($data);
                $view->vars['value'] = $data;
            }

            $request                = new Request();
            $request->initialize(array(
                'class' => $this->encodingLogic->encode($options['class']),
                'properties' => $this->encodingLogic->encode(json_encode($options['properties'])),
                'query' => $data,
                'init' => true,
                'initData' => count($options['initData']) ? $this->initData : (isset($parentRootDataClass) && isset($this->initData[$parentRootDataClass][$fieldCollection]) ? $this->initData[$parentRootDataClass][$fieldCollection]
                            : []),
                'initImages' => false,
                'max_results' => 10,
            ));
            $view->vars['initData'] = $this->logic->getData($request);
        }

        if (($options['select2_constructor'])) {
            unset($options['select2_constructor']['ajax']);
            unset($options['select2_constructor']['initSelection']);
        }
        if (isset($options['select2_constructor']['formatResult'])) {
            $view->vars['formatResult']             = $options['select2_constructor']['formatResult'];
            $view->vars['formatResultFromTemplate'] = preg_match('/\(result\)/', $view->vars['formatResult']) ? false : true;
            unset($options['select2_constructor']['formatResult']);
        }
        if (isset($options['select2_constructor']['formatSelection'])) {
            $view->vars['formatSelection']             = $options['select2_constructor']['formatSelection'];
            $view->vars['formatSelectionFromTemplate'] = preg_match('/\(result\)/', $view->vars['formatSelection']) ? false : true;
            unset($options['select2_constructor']['formatSelection']);
        }
        if (isset($options['select2_constructor']['onReset'])) {
            $view->vars['onReset']             = $options['select2_constructor']['onReset'];
            $view->vars['onResetFromTemplate'] = preg_match('/\(event\)/', $view->vars['onReset']) ? false : true;
            unset($options['select2_constructor']['onReset']);
        }
        if (!isset($options['select2_constructor']['minimumInputLength'])) {
            $options['select2_constructor']['minimumInputLength'] = 3;
        }

        // рендерим шаблон содержащий кастомные функции для отображения списка
        if ($options['template_customise_functions']) {
            $template_customise_functions = 'CoreCommonBundle:Form\ajax_entity\callbacks:'.$options['template_customise_functions'];
            if ($this->templating->exists($template_customise_functions)) {
                $view->vars['customise_functions'] = $this->templating->render($template_customise_functions, array('id' => $view->vars['id']));
            }
        }

        if (isset($options['route_edit']) && strlen($options['route_edit']) && strpos($options['route_edit'], '_edit') <= 0) {
            $options['route_edit'] = '';
        }

        // Переводим настройки Select2
        foreach ($options['select2_constructor'] as $oName => $oVal) {
            $options['select2_constructor'][$oName] = $this->container->get('translator')->trans($oVal, [], $options['translationDomain']);
        }

        $view->vars['isParentCollection'] = isset($attr['data-collection']) ? true : false;
        $view->vars['constructor']        = $options['select2_constructor'];
        $view->vars['separator']          = $options['separator'];
        $view->vars['entry']              = $options['entry'];
        $view->vars['frontend']           = $options['frontend'];
        $view->vars['initImages']         = $options['initImages'];
        $view->vars['class']              = $this->encodingLogic->encode($options['class']);
        $view->vars['properties']         = $options['properties'];
        $view->vars['properties_json']    = $this->encodingLogic->encode(json_encode($options['properties']));
        $view->vars['max_results']        = $options['max_results'];
        $view->vars['subId']              = $view->vars['id'];
        $view->vars['id']                 = uniqid($view->vars['id'].'_');
        $view->vars['route_edit'] = $options['route_edit'];

        // Если есть дополнение к запросу а именно к условию делаем экранирование спецсимволов
        if (null !== $options['add_to_query']) {
            if (isset($options['add_to_query']['where'])) {
                foreach ($options['add_to_query']['where'] as $whereType => $data) {
                    foreach ($data as $key => $where) {
                        $options['add_to_query']['where'][$whereType][$key] = (str_replace("'", '"', $where));
                    }
                }
            }
        }

        if (!empty($options['add_to_query'])) {
            $view->vars['add_to_query'] = $this->encodingLogic->encode(json_encode($options['add_to_query']));
        }

        if (isset($attr['data-collection'])) {
            $view->vars['attr']['data-collection'] = $attr['data-collection'];
        }

        if (isset($view->vars['attr']['class'])) {
            $view->vars['attr']['class'] .= ' ajax-entity'.$attr['class'];
        } else {
            $view->vars['attr']['class'] = 'ajax-entity'.$attr['class'];
        }

        // #bug фиксируем ширину списка, убираем лишний класс если была задана ширина.
        if (isset($options['select2_constructor']['width'])) {
            $view->vars['attr']['class'] = preg_replace('/span\d+/', '', $view->vars['attr']['class']);
        }
    }

    /**
     *  Устанавливаем опции по умолчанию
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {

        // Добавляем опции в разрешимый список
        $defaults = array(
            'class' => '',
            'entry' => '', // вхождение поискового слова (full - полное совпадение, left - с левой стороны, right - с правой стороны, по дефолту с обеих сторнон)
            'properties' => '', // поля по которым производится поиск
            'max_results' => 10, // максимальное кол-во записей для отображения
            'select2_constructor' => '', // настройки списка select2
            'separator' => ', ', // разделитель между properties в списке и в выбранном результате, при стандартном отображении
            'template_customise_functions' => '', // шаблон кастомных функций
            'initImages' => true, // флаг для отключения первоначальной инициализации картинок, уменьшает кол-во запросов при построении главной формы (если в properties есть картинки, а выводить в выбранный элемент нам их не надо)
            'frontend' => false, // флаг для кодирования данных (использовать исключительно для фронтенда)
            'initData' => array(),
            'add_to_query' => array(),
            'translationDomain' => 'AjaxEntity', // группа домен для переводов настроек Select2
            'route_edit' => '', // админский роут для редактирования объекта
        );
        $resolver->setDefaults($defaults);

        $resolver->addAllowedTypes(array(
            'entry' => 'string',
            'properties' => 'array',
            'max_results' => 'integer',
            'separator' => 'string',
            'template_customise_functions' => 'string',
            'add_to_query' => 'array',
        ));

        // Перечисленные опции являются обязательными
        $resolver->setRequired(array(
            'properties',
        ));
    }

    /**
     * Родительский тип формы
     */
    public function getParent()
    {
        return 'text';
    }

    /**
     * Название типа формы
     */
    public function getName()
    {
        return 'ajax_entity';
    }

    /**
     * Трансформация из объектов в строку id'шников
     *
     * @param $objects
     * @return string
     */
    public function transform($objects)
    {
        if (null === $objects) {
            return '';
        }

        if ($objects instanceof PersistentCollection) {
            $ids = array();
            foreach ($objects as $item) {
                $ids[] = $item->getId();
            }
            return implode(',', $ids);
        } elseif (method_exists($objects, 'getId')) {
            return $objects->getId();
        }
    }

    /**
     * Трансформация из строки id'шников в объект
     *
     * @param string $ids
     * @param array $mapping
     * @param boolean $isCollection
     * @return ArrayCollection || object
     */
    public function reverseTransform($ids, $mapping, $isCollection)
    {
        if (null === $ids) {
            return null;
        }

        $objectsArray = $this->doctrine->getManager()->getRepository($mapping['targetEntity'])->findBy(['id' => explode(',', $ids)]);
        if (count($objectsArray)) {
            if ($isCollection) {
                $objects = new ArrayCollection($objectsArray);
            } else {
                $objects = array_pop($objectsArray);
            }
        } else {
            $objects = null;
        }

        return $objects;
    }
}