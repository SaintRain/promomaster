<?php

/**
 * Удобный выбор категорий через на фронтенде
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CategoryBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\DataTransformer\ChoicesToValuesTransformer;

class FrontendCategoryType extends AbstractType {

    protected $treeStats = array(); //чтобы не подключать библиотеки несколько раз ведём статистику
    protected $core_shop_category_logic;  //юизнесс логика для работы с категориями
    protected $em;

    public function __construct($core_shop_category_logic, $em) {
        $this->core_shop_category_logic = $core_shop_category_logic;
        $this->em = $em;
    }

    
    public function buildView(FormView $view, FormInterface $form, array $options) {
        //генерируем дерево
//        $treeHtml = $this->core_shop_category_logic->getHtmlJSTree([
//            'class' => $options['class'],
//            'attr' => 'target="_blank"',
//            'link_format' => $this->core_shop_category_logic->getEditLinkFormat($options['class'])
//        ]);

        $categories=$this->em->getRepository('CoreCategoryBundle:SiteCategory')
            ->getBuildTree(['where'=>['isEnabled'=>true]])[0]['__children'];

        //проверяем есть ли уже в форме дерево
//        $uniqid = $view->vars['sonata_admin']['admin']->getUniqid();
//        if (isset($this->treeStats[$uniqid])) {
//            $firstTree = false;
//        } else {
//            $firstTree = true;
//            $this->treeStats[$view->vars['sonata_admin']['admin']->getUniqid()] = true;
//        }

//        $view->vars['firstTree'] = $firstTree;
        $view->vars['categories'] = $categories;
        $view->vars['attr']['class'] ='hidden';    //скрываем старый select2
        
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setOptional(array('treeHtml', 'class', 'property', 'multiple'));
    }

    public function getParent() {
        return 'entity';
    }

    public function getName() {
        return 'FrontendCategory';
    }

}
