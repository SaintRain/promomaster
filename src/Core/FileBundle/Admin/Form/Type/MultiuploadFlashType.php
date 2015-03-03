<?php
/**
 * Новый тип формы для админки, на основе sonata_type_collection
 * Загрузка и редактирование картинок
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FileBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sonata\CoreBundle\Form\EventListener\ResizeFormListener;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MultiuploadFlashType extends AbstractType
{
    private $options; // Переменная для опций получаемых из yml файла
    private $logic; // Логика для работы с файлами
    private $libStats = array(); //чтобы не подключать библиотеки JS и файлы CSS несколько раз ведём статистику

    public function __construct($options, $logic)
    {
        $this->options['core_file'] =$options['flash'];
        $this->logic                = $logic;
    }

    /**
     * Построение формы
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $fieldDescription               = $options['sonata_field_description'];
        $associoation                   = $fieldDescription->getAssociationMapping();
        $options['namespace_to_attach'] = $associoation['sourceEntity'];
        $obj                            = $options['parent_form']->getAdmin()->getSubject();

        // Объект для инициализации формы и ее расширения
        $listener = new ResizeFormListener(
            $builder->getFormFactory(), 'sonata_type_admin',
            array(
            'sonata_field_description' => $fieldDescription,
            'data_class' => $associoation['targetEntity'],
            'auto_initialize' => $options['type_options']['auto_initialize']
            ), null !== $obj->getId() ? false : true // запрещаем/разрешаем изменение формы (modifiable)
            );
        $builder->addEventSubscriber($listener);

        // вешаем на событие PRE_BIND удаление файлов и чистку таблицы
        $options['parent_form']->getFormBuilder()->addEventListener(FormEvents::PRE_BIND,
            function(FormEvent $event) use ($options) {
            $formData = $event->getData();
            if (!empty($formData)) {

                $obj       = $event->getForm()->getData();
                $fieldName = $options['sonata_field_description']->getName();
                if (isset($formData[$fieldName])) {
                    //var_dump($formData);exit;
                    $data                                                          = array(
                        'fieldName' => $fieldName,
                        'namespace_to_attach' => $options['namespace_to_attach'],
                        'data' => $formData,
                    );
                    $this->logic->formDataByFieldName[get_class($obj)][$fieldName] = $data;
                }
            }
        });
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {

        $fieldDescription = $options['sonata_field_description'];
        $associoation     = $fieldDescription->getAssociationMapping();

        if (!isset($options['core_file'][$associoation['sourceEntity']][$fieldDescription->getName()])) {
            throw new NotFoundHttpException('Ooops... Configuration not found for entity "'.$associoation['sourceEntity'].'" field "'.$fieldDescription->getName().'" in config.yml');
        }

        //проверяем есть ли уже в форме коллекция картинок
        $uniqId = $view->vars['sonata_admin']['admin']->getUniqid();
        if (isset($this->libStats[$uniqId])) {
            $firstTable = false;
        } else {
            $firstTable              = true;
            $this->libStats[$uniqId] = true;
        }

        if (isset($view->vars['attr']['multiple']) && $view->vars['attr']['multiple'] !== true) {
            unset($view->vars['attr']['multiple']);
        } else {
            $view->vars['attr']['multiple'] = true;
        }

        // Добавляем значения опций в форму
        $view->vars['firstTable']          = $firstTable;
        $view->vars['namespace_to_insert'] = $associoation['targetEntity'];
        $view->vars['namespace_to_attach'] = $associoation['sourceEntity'];
        $view->vars['configs']             = $options['core_file'][$associoation['sourceEntity']][$fieldDescription->getName()];
        $view->vars['uniqId']              = $uniqId;
        $view->vars['hide_field']          = $options['hide_field'];
        $view->vars['width']               = $options['width'];
    }

    /**
     *  Устанавливаем опции по умолчанию
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {

        // Добавляем опции в разрешимый список
        $defaults = array_merge(
            array(
            'width' => '100%',
            'hide_field' => array(),
            'by_reference' => true,
            'required' => false,
            'type_options' => array(
                'auto_initialize' => false,
            ),
            'attr' => array(
                'multiple' => true,
            )), $this->options
        );
        $resolver->setDefaults($defaults);

        // Перечисленные опции являются обязательными
        $resolver->setRequired(array(
            'parent_form',
        ));
    }

    /**
     * Родительский тип формы
     */
    public function getParent()
    {
        return 'sonata_type_collection';
    }

    /**
     * Название типа формы
     */
    public function getName()
    {
        return 'multiupload_flash';
    }
}