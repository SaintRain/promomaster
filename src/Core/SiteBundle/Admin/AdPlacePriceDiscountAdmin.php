<?php

/**
 * Админский класс для скидок на цены размещения
 * @author  Kaluzhy N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class AdPlacePriceDiscountAdmin extends Admin
{
    public function configure()
    {
        parent::configure();

        $this->datagridValues['_sort_by']    = 'id';
        $this->datagridValues['_sort_order'] = 'DESC';
    }

    /**
     * Переписываем шаблоны
     *
     * @param type $name
     * @return string
     */
    public function getTemplate($name)
    {
        switch ($name) {
            case 'list':
                return 'ApplicationSonataAdminBundle:CRUD:list_top_in_new_window.html.twig';
            default:
                return parent::getTemplate($name);
                break;
        }
    }

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object)
    {
        $text = null === $object->getId() ? 'Добавление новой цены' : 'Редактирование цены рекламного места ' . $object->getAdPlace()->getName();
        return $text;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper)
    {

        $obj = $this->getSubject();

        $formMapper
            ->with('Основное')
            //->add('adPlacePrice', null, ['label' => 'Рекламное место', 'property' => 'id'])
            ->add('amount', null, ['label' => 'Свыше', 'help' => 'Скидка действует при указанном количестве'])
            ->add('rate', null, ['label' => 'Размер скидки (%)'])
            ->end()
        ;
    }
}