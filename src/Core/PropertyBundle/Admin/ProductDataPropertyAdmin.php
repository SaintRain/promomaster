<?php

/**
 * Админский класс для установленых для товаров значений характеристик
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PropertyBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class ProductDataPropertyAdmin extends Admin {

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {
        /*
        $product = $formMapper->getFormBuilder()->getAttributes()['sonata_admin']['admin']->getSubject();

        $categories = $product->getCategories();

        //на основе характеристик генерируем форму
        foreach ($categories as $cat) {
            $properties = $cat->getProperties();
            foreach ($properties as $p) {
                if (in_array($p->getEditType(), ['text', 'textarea'])) {
                    if ($p->getEditType() == 'text') {
                        $formMapper->add('value', 'text', array('disabled' => false, 'required' => true, 'attr' => array('class' => 'span5')));
                    }
                    if ($p->getEditType() == 'textarea') {
                        $formMapper->add('value', 'textarea', array('disabled' => false, 'required' => true, 'attr' => array('rows' => '10')));
                    }
                } else {
                    $formMapper->add('data', null, array('required' => false, 'property' => 'value'));
                }
            }
        }
        */
        
      //  $formMapper->add('id', null);
        $formMapper->add('value', 'textarea', array('label'=>'Значение'));
        $formMapper->add('data', null, array('required' => false, 'property' => 'value'));
        $formMapper->end();


            
           /*
  const PRE_SUBMIT = 'form.pre_bind';

    const SUBMIT = 'form.bind';

    const POST_SUBMIT = 'form.post_bind';

    const PRE_SET_DATA = 'form.pre_set_data';

    const POST_SET_DATA = 'form.post_set_data';

    /**
     * @deprecated Deprecated since version 2.3, to be removed in 3.0. Use
     *             {@link PRE_SUBMIT} instead.
     */
   // const PRE_BIND = 'form.pre_bind';

    /**
     * @deprecated Deprecated since version 2.3, to be removed in 3.0. Use
     *             {@link SUBMIT} instead.
     */
 //   const BIND = 'form.bind';

    /**
     * @deprecated Deprecated since version 2.3, to be removed in 3.0. Use
     *             {@link POST_SUBMIT} instead.
     */
 //   const POST_BIND = 'form.post_bind';
   

    }

    public function isXmlHttpRequest() {
        $container = $this->getConfigurationPool()->getContainer();
        return $container->get('request')->isXmlHttpRequest() || $container->get('request')->get('_xml_http_request');
    }

}