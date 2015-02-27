<?php

/**
 * Админский класс для контрагентов
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Application\Sonata\UserBundle\Admin\Form\Mapper\IndiContactFormMapper;
use Application\Sonata\UserBundle\Admin\Form\Mapper\LegalContactFormMapper;

class IndiContactAdmin extends Admin
{
    protected $translationDomain = 'ApplicationSonataUserBundle'; // дефолтная группа (домен) для перевода

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {
        //объект для формы
        $obj = $this->getSubject();
        $options = array();
        //контейнер
        new IndiContactFormMapper($formMapper, $options);
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        parent::configureDatagridFilters($filter);
    }

    protected function configureListFields(ListMapper $list)
    {
        parent::configureListFields($list);
    }
}

