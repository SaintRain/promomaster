<?php

/**
 * Админский класс для гео городов
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class GeoCityAdmin extends Admin
{

    protected $translationDomain = 'CoreDirectoryBundle'; // дефолтная группа (домен) для перевода

    /**
     * Дефолтные настройки для списка
     */
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
    );

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object)
    {
        if ($object->getId()) {
            $text = 'Город';
        } else {
            $text = 'Добавление нового города';
        }

        $text = $this->trans($text);
        $text .= $object->getId() ? ' «' . $object->getName() . '»' : '';
        return $text;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        //объект для формы
        $obj = $this->getSubject();

        $formMapper
                ->with('Основное')
                ->add('name', null, array(
                    'label' => 'GEO название',
                    'required' => true))
                ->end()
        ;
    }

    protected function configureListFields(ListMapper $list)
    {
        parent::configureListFields($list);
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        parent::configureDatagridFilters($filter);
    }

}
