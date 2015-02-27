<?php

/**
 * Форма для поиска по FAQ-статьям
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FaqBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class SearchFaqType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('searchQuery', 'text', array(
            'label' => 'Поиск',
            'attr' => ['placeholder' => 'Поиск'],
            'constraints' => array(
				new NotBlank(),
				new Length(array('max' => 100)),
			)
        ));

    }

    public function getName()
    {
        return 'search_faq_type';
    }
}