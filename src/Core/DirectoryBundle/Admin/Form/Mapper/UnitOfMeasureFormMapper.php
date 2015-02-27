<?php
/**
 * Форма для редактирования единиц измерений
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class UnitOfMeasureFormMapper extends LanguageSwitcherFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {
        parent::__construct($formMapper, $options);

        $obj = $options['obj'];
        if ($obj->getId()) {
            $query = $options['container']->get('doctrine')->getManager()
                ->createQuery('SELECT u FROM Core\DirectoryBundle\Entity\UnitOfMeasure u WHERE u.id!='.$obj->getId().' ORDER BY u.indexPosition');
        } else {
            $query = null;
        }

        $formMapper
            ->with('Основное');

        $this->add('caption', 'text',
                array(
                'label' => 'Название единицы измерения'))
            ->add('shortCaption', 'text',
                array(
                'required' => true,
                'label' => 'Краткое название'));

        $formMapper->add('code', null,
                array('required' => true,
                'label' => 'Международное обозначение'))
            ->add('okeiCode', null,
                array('required' => true,
                'label' => 'Код OKEI'))
            ->add('group', 'sonata_type_model',
                array(
                'required' => false,
                'property' => 'captionRu',
                'class' => 'Core\DirectoryBundle\Entity\UnitOfMeasureGroup',
                'label' => 'Группа'
            ))
            ->add('isEnabled', null,
                array('required' => false,
                'label' => 'Активно'))
            ->end();
    }
}