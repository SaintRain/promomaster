<?php

 /**
 * 
 * @author  Kaluzhy N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CountryFormTypeExtension extends AbstractTypeExtension
{

    public function getExtendedType()
    {
        return 'entity';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setOptional(array('withSubset'));
    }

    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        if (!array_key_exists('withSubset', $options)) {
            return;
        }
        //if ($form->getName() == 'countryList') {
            $choices = $options['choice_list']->getChoices();
            $data = [];
            $activeChoices = [];
            foreach($choices as $val) {
                    $data[$val->getWorldSection()->getCaptionRu()]['views'][$val->getId()] = $view->children[$val->getId()];
                    $data[$val->getWorldSection()->getCaptionRu()]['isChecked'] = true;
                    if ($view->vars['value'][$val->getId()]) {
                        $activeChoices[$val->getId()] = $val;
                    }

            }
            foreach($data as $key => $val) {
                foreach ($val['views'] as $id =>$cur) {
                    if (!$view->vars['value'][$id]) {
                        $data[$key]['isChecked'] = false;
                        break;
                    }
                }
            }
            $view->vars['views'] = $data;
            $view->vars['activeChoices'] = $activeChoices;
        //}
    }


}