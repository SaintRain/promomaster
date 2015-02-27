<?php

/**
 * Выбор объединяющих записей-модификаций
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\DataTransformer\ChoicesToValuesTransformer;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Doctrine\Common\Collections\ArrayCollection;

class ProductModificationsType extends AbstractType {

    protected $productLogic;  //бизнесс логика для работы с категориями
    public $options;

    public function __construct($productLogic) {
        $this->productLogic = $productLogic;
    }

    public function buildView(FormView $view, FormInterface $form, array $options) {
        
        //проверяем есть ли уже в форме дерево
        $uniqid = $view->vars['sonata_admin']['admin']->getUniqid();
        if (isset($this->unionStats[$uniqid])) {
            $firstUnion = false;
        } else {
            $firstUnion = true;
            $this->unionStats[$view->vars['sonata_admin']['admin']->getUniqid()] = true;
        }

        $this->options[$uniqid] = $options; //сохраняем опции, чтоб можно было обращаться к ним извне
        $view->vars['firstUnion'] = $firstUnion;
        $view->vars['options'] = $options;
        $view->vars['mappedBy'] = $options['sonata_field_description']->getAssociationMapping()['mappedBy'];
        $view->vars['targetEntity'] = $options['sonata_field_description']->getAssociationMapping()['targetEntity'];
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $productLogic = $this->productLogic;
        $builder->addEventListener(FormEvents::PRE_BIND, function(FormEvent $event) use ($productLogic, $options, $builder) {
                    $data = $event->getData();

                    //чтобы не было ошибки формата, передаём NULL а сохранение делаем в сервисе
                    $event->setData(null);
                    $options['parent_form']->getFormBuilder()->addEventListener(FormEvents::POST_BIND, function(FormEvent $event) use ($productLogic, $options, $data, $builder) {
                                $obj = $event->getData();

                                if (isset($options['sonata_field_description']->getOptions()['sortable'])) {
                                    $sortable = $options['sonata_field_description']->getOptions()['sortable'];
                                } else {
                                    $sortable = '';
                                }

                                //сохраняем информацию
                                $productLogic->fieldsInfo[get_class($obj)][$options['sonata_field_description']->getName()] = [
                                    'sortable' => $sortable,
                                    'data' => $data,
                                    //'field_description' => $options['sonata_field_description'],
                                    'property_fields'=>$builder->getPropertyPath()->getElements()
                                ];
                                
                                //проверяем, чтобы при создании продукта сразу не создавалас группа объединений
                                //группа будет создаваться, конкретно если нужно объединения
                                $mappedBy = $options['sonata_field_description']->getAssociationMapping()['mappedBy'];
                                $mappedByGetter = 'get' . ucfirst($mappedBy);
                                $mappedBySetter = 'set' . ucfirst($mappedBy);
                                if (!$obj->getId() || !$obj->$mappedByGetter()->getId()) {
                                    $obj->$mappedBySetter(null);
                                }
                                
                            });
                });
    }

    /**
     *  Устанавливаем опции по умолчанию
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {

        // Добавляем опции в разрешимый список
        $defaults =
                array(
                    'columns' => [
                        'id' => ['label' => 'ID', 'identifier' => true, 'width' => 80],
                        'captionRu' => ['label' => 'Название', 'identifier' => true],
                        'isEnabled' => ['label' => 'Активно', 'width' => 80]
                    ],
                    'setThisToTargetObject' => false,
                    'hideSubjectInList' => false,
                    'property' => 'id',
                    'by_reference' => true,
                    'required' => false,
                    'deleteable'=>true
        );
        $resolver->setDefaults($defaults);

        // Перечисленные опции являются обязательными
        $resolver->setRequired(array(
            'parent_form',            
            'columns',
            'edit_route',
            'create_route',
            'find_route',
            'class'
        ));
    }

    public function getParent() {
        return 'form';
    }

    public function getName() {
        return 'product_modifications';
    }

}
