<?php

 /**
 * 
 * @author  Kaluzhy N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\BannerBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FlashBannerFormType extends GeneralBannerFormType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('url', 'text', ['required' => $options['isBanner'], 'label' => 'URL для перехода'])
            ->add('file', 'multiupload_file_frontend', array(
                'required' => true,
                "label" => "Flash",
                'attr' => array(
                    'multiple' => false,
                    'accept' => 'application/x-shockwave-flash'
                ),
                'type' => 'flash',
                'namespace_to_attach' => 'Core\BannerBundle\Entity\FlashBanner',
                'namespace_to_insert' => 'Core\FileBundle\Entity\FlashFile',
                'btnName' => ($builder->getData() && $builder->getData()->getId()) ? 'Выбрать другой файл' : 'Выбрать файл',
                'btnAttr' => array(
                    'class' => 'btn-u',
                ),
                'showStatusOfUpload' => true,
                'showCounterOfFiles' => false,
                'showAttachedFiles' => true,
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Core\BannerBundle\Entity\FlashBanner',
            'isBanner' => true
        ));
    }

//    public function finishView(FormView $view, FormInterface $form, array $options)
//    {
//        $view->children['file']->vars['note'] = 'Чтобы система могла правильно учитывать клики по Flash баннерам, сделайте следующее.';
//        $view->children['file']->vars['note'] .= 'Создайте в баннере элемент типа button, для которого пропишите такой скрипт:';
//        $view->children['file']->vars['note'] .= '<pre>on (release) {getURL(url, "_blank");}</pre>';
//        $view->children['file']->vars['note'] .= 'Если переход по рекламе должен осуществляться не в новом окне, а в текущем, то в методе getURL второй параметр измените на "_self"';
//    }


    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'flash_banner_form';
    }
}