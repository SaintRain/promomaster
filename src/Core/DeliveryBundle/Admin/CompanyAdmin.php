<?php

/**
 * Админский класс для транспортных компаний
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

class CompanyAdmin extends Admin {


    protected $translationDomain = 'CoreDeliveryBundle'; // дефолтная группа (домен) для перевода

    public function getFormBuilder() {
        $formBuilder = parent::getFormBuilder();
        return $formBuilder;
    }

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object) {
        $text = (null === $object->getId()) ? 'Добавление новой транспортной компании' : 'Транспортная компания '. $object->getCaptionRu();

        return $text;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->with('Основное')
                    ->add('captionRu', null, array(
                                    'label' => 'Название'))
                    ->add('name', null, array(
                                    'help' => "Если оставить пустым, то будет сгенерировано автоматически <b>ВАЖНО!!! Используется программистом</b>",
                                    'label' => 'Системное имя'))
                    ->add('site', null, array(
                                    'label' => 'URL сайта'))
                    ->add('calculator', null, array(
                                    'label' => 'URL страницы калькулятора'))
                    ->add('tracker', null, array(
                                    'label' => 'URL страницы отслеживания груза'))
                    ->add('position', null, array(
                            'label' => 'Позиция сортировки'))
                    ->add('isInFooter', 'choice', array(
                                    'attr' => array('class' => 'choice-inline with-min-width'),
                                    'expanded' => true,
                                    'choices' => array(
                                      1 => 'Да',
                                      0 => 'Нет',
                                    ),
                                    'label' => 'В футере'))
                    ->add('status', 'choice', array(
                                    'attr' => array('class' => 'choice-inline with-min-width'),
                                    'expanded' => true,
                                    'choices' => array(
                                      1 => 'Вкл.',
                                      0 => 'Выкл.',
                                    ),
                                    'label' => 'Статус'))
                ->end()
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
                ->add('site', 'url', array(
                                'attr' => array('class'=>'sdsd'),
				'label' => 'URL сайта'))
                ->add('calculator', 'url', array(
				'label' => 'URL страницы калькулятора'))
                ->add('tracker', 'url', array(
				'label' => 'URL страницы отслеживания груза'))
                ->add('isInFooter', null, array(
                                'editable' => true,
				'label' => 'В футере'))
                ->add('status', null, array(
                                'editable' => true,
				'label' => 'Вкл.'))
                ->add('position', null, array(
                            'editable' => true,
                            'label' => 'Позиция сортировки'))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
                ->add('id', null, array(
				'label' => 'ID'), null,
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
                ->add('site', null, array(
				'label' => 'URL сайта'), null,
                                    array('attr' => ['placeholder' => 'URL сайта'])
                        )
                ->add('calculator', null, array(
				'label' => 'URL страницы калькулятора'), null,
                                    array('attr' => ['placeholder' => 'URL страницы калькулятора'])
                        )
                ->add('tracker', null, array(
				'label' => 'URL страницы отслеживания груза'), null,
                                    array('attr' => ['placeholder' => 'URL страницы отслеживания груза'])
                        )
                ->add('isInFooter', null, array(
				'label' => 'В футере'), null,
                                    array('attr' => ['placeholder' => 'Показывать в футере'])
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