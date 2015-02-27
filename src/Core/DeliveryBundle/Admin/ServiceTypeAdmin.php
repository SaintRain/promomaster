<?php

/**
 * Админский класс для типов услуг транспортных компаний
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ServiceTypeAdmin extends Admin {


    protected $translationDomain = 'CoreDeliveryBundle'; // дефолтная группа (домен) для перевода

    public function getFormBuilder() {
        $formBuilder = parent::getFormBuilder();
        return $formBuilder;
    }

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object) {
        $text = (null === $object->getId()) ? 'Добавление нового типа доставки' : 'Тип доставки '. $object->getCaptionRu();
        
        return $text;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('captionRu', null, array(
                            'label' => 'Название'))
            ->add('name', null, array(
                            'label' => 'Системное имя'))
            ->add('position', null, array(
                            'label' => 'Позиция сортировки'))
            ->add('status', 'choice', array(
                                    'attr' => array('class' => 'choice-inline with-min-width'),
                                    'expanded' => true,
                                    'choices' => array(
                                      1 => 'Вкл.',
                                      0 => 'Выкл.',
                                    ),
                            'label' => 'Статус'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('id', null, array(
				'label' => '№'))
                    ->addIdentifier('captionRu', null, array(
                            'label' => 'Название'))
                    ->add('name', null, array(
                                    'label' => 'Системное имя'))
                    ->add('position', null, array(
                            'editable' => true,
                            'label' => 'Позиция сортировки'))
                    ->add('status', null, array(
                                    'editable' => true,
                                    'label' => 'Вкл.'))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('id', null, array(
                            'label' => '№' ), null,
                                    array('attr' => ['placeholder' => 'ID'])
                        )
                    ->add('captionRu', null, array(
                            'label' => 'Название'), null,
                                    array('attr' => ['placeholder' => 'Название'])
                        )
                    ->add('name', null, array(
                                    'label' => 'Системное имя'), null,
                                    array('attr' => ['placeholder' => 'Системное имя'])
                        )
                    ->add('status', null, array(
                                    'label' => 'Вкл.'), null,
                                    array('attr' => ['placeholder' => 'Включено'])
                        )
                    /*
                    ->add('position', null, array(
                            'label' => 'Позиция сортировки'), null,
                                    array('attr' => ['placeholder' => 'Позиция сортировки'])
                        )    
                     */
        ;
    }

    /**
     * @param type $name
     * @return string
     */
    public function getTemplate($name)
    {
        switch ($name) {
            case 'list':
                return 'ApplicationSonataAdminBundle:CRUD:list_top.html.twig';
            default:
                return parent::getTemplate($name);
                break;
        }

    }

}