<?php

/**
 * Новый тип формы для фронтэнда
 * Загрузка файлов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FileBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Doctrine\Common\Collections\ArrayCollection;

class MultiuploadFileFrontendType extends AbstractType
{

    private $options; // Переменная для опций получаемых из yml файла
    private $logic; // Логика для работы с файлами
    private $request; //
    private $session; //
    private $libStats = array(); //чтобы не подключать библиотеки JS и файлы CSS несколько раз ведём статистику

    public function __construct($options, $logic, Request $request, $session)
    {
        $this->options = $options; //array_merge($options['image'], $options['document']);
        $this->logic = $logic;
        $this->request = $request;
        $this->session = $session;
    }

    /**
     * Построение формы
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        if (isset($options['btnAttr']['class'])) {
            $options['btnAttr']['class'] .= ' fake-input-file';
        } else {
            $options['btnAttr']['class'] = 'fake-input-file';
        }

        if (isset($options['attr']['class'])) {
            $options['attr']['class'] .= ' ajax-file hidden';
        } else {
            $options['attr']['class'] = 'ajax-file hidden';
        }

        if (isset($options['attr']['multiple']) && $options['attr']['multiple'] === false) {
            unset($options['attr']['multiple']);
        } else {
            $options['attr']['multiple'] = true;
        }

        $builder
            ->add($options['btnName'], 'button', array(
                'attr' => $options['btnAttr'],
            ))
            ->add('filesToUpload', 'file', array(
                'required' => false,
                'attr' => $options['attr'],
            ))
            ->add('id', 'hidden', array(
                'required' => false,
            ))
            ->add('type', 'hidden', array(
                'required' => false,
                'data' => $options['type'],
            ))
            ->add('fieldName', 'hidden', array(
                'required' => false,
                'data' => $builder->getName(),
            ))
            ->add('namespace_to_attach', 'hidden', array(
                'required' => false,
                'data' => $options['namespace_to_attach'],
            ))
            ->add('namespace_to_insert', 'hidden', array(
                'required' => false,
                'data' => $options['namespace_to_insert'],
            ));


        if (isset($this->options['document'][$options['namespace_to_attach']][$builder->getName()])) {
            $configs=$this->options['document'][$options['namespace_to_attach']];
        }
        else if (isset($this->options['image'][$options['namespace_to_attach']][$builder->getName()])) {
            $configs=$this->options['image'][$options['namespace_to_attach']];
        }
        else if (isset($this->options['flash'][$options['namespace_to_attach']][$builder->getName()])) {
            $configs=$this->options['flash'][$options['namespace_to_attach']];
        }


//        $configs = isset($this->options['document'][$options['namespace_to_attach']][$builder->getName()]) ? $this->options['document'][$options['namespace_to_attach']] : $this->options['image'][$options['namespace_to_attach']];


        $configsField = isset($configs[$builder->getName()]) ? $configs[$builder->getName()] : null;
        $builder->addEventListener(FormEvents::BIND, function (FormEvent $event) use ($configsField) {
            if ($configsField) {
                if ($configsField['max_count_files'] > 1) {
                    $data = new ArrayCollection();
                } else {
                    $data = array();
                }
            } else {
                $data = null;
            }
            $event->setData($data);
        });
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
//        if (!isset($this->options['document'][$options['namespace_to_attach']][$form->getName()]) && !isset($this->options['image'][$options['namespace_to_attach']][$form->getName()])) {
//            throw new NotFoundHttpException('Ooops... Configuration not found for entity "' . $options['namespace_to_attach'] . '" field "' . $form->getName() . '" in config.yml');
//        }

        if (isset($this->options['document'][$options['namespace_to_attach']][$form->getName()])) {
        }
        else if (isset($this->options['image'][$options['namespace_to_attach']][$form->getName()])) {
        }
        else if (isset($this->options['flash'][$options['namespace_to_attach']][$form->getName()])) {
        }
        else {
            throw new NotFoundHttpException('Ooops... Configuration not found for entity "' . $options['namespace_to_attach'] . '" field "' . $form->getName() . '" in config.yml');
        }

        $files = array();

        if ($this->libStats) {
            $libStats = true;
        } else {
            $libStats = false;
            $this->libStats = true;
        }

        $objToAttach = $view->parent->vars['value'];

        // получаем id формы
        $requestCoreFileBundleInput = $this->request->request->get('CoreFileBundleInput');
        $formId = isset($requestCoreFileBundleInput[$form->getName()]['form_id']) ? $requestCoreFileBundleInput[$form->getName()]['form_id'] : null;


        if (is_object($objToAttach) && null !== $objToAttach) {
            $view->vars['objId'] = $objToAttach->getId();
        } else {
            $view->vars['objId'] = null;
        }

        //if ($options['showAttachedFiles']) {
        if (empty($view->vars['objId'])) {
            $session = $this->session->get('core_file');
            if (isset($session[$formId])) {
                foreach ($session[$formId][$options['namespace_to_attach']][$options['namespace_to_insert']] as $names) {
                    $names = array_reverse($names);
                    foreach ($names as $name) {
                        $files[] = array('name' => $name);
                    }
                }
            }
        } else {
            $filesObj = $objToAttach->{'get' . ucfirst($form->getName())}();
            foreach ($filesObj as $fileObj) {
                if (null !== $fileObj && is_object($fileObj)) {
                    $files[] = $fileObj;
                }
            }
        }
        //}

        $view->vars['files'] = $files;

        $view->vars['uniqId'] = isset($formId) ? $formId : 'f' . uniqid();
        $view->vars['libStats'] = $libStats;
        $view->vars['btnAttr'] = $options['btnAttr'];
        $view->vars['btnName'] = $options['btnName'];
        $view->vars['type'] = $options['type'];
        $view->vars['namespace_to_attach'] = $options['namespace_to_attach'];
        $view->vars['namespace_to_insert'] = $options['namespace_to_insert'];
        $view->vars['showStatusOfUpload'] = $options['showStatusOfUpload'];
        $view->vars['showCounterOfFiles'] = $options['showCounterOfFiles'];
        $view->vars['showAttachedFiles'] = $options['showAttachedFiles'];
    }

    /**
     *  Устанавливаем опции по умолчанию
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {

        // Добавляем опции в разрешимый список
        $defaults = array(
            //'core_file' => $this->options,
            'by_reference' => true,
            'type' => 'document',
            'attr' => array(
                'multiple' => true,
            ),
            'btnName' => 'upload',
            'btnAttr' => array(),
            'showStatusOfUpload' => true,
            'showCounterOfFiles' => true,
            'showAttachedFiles' => true,
        );
        $resolver->setDefaults($defaults);

        // Перечисленные опции являются обязательными
        $resolver->setRequired(array(
            'namespace_to_attach',
            'namespace_to_insert',
        ));
    }

    /**
     * Название типа формы
     */
    public function getName()
    {
        return 'multiupload_file_frontend';
    }

}