<?php

/**
 * Форма для редактирования статей FAQ(мини версия с преодпределенной категорией)
 * @author  Kaluzhny N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FaqBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class SimpleArticleFormType extends AbstractType
{
    public function getName()
    {
        return 'simple_article_admin';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('id', 'hidden', ['required' => false, 'attr' => ['class' => 'article-form-field'],])
            ->add('captionRu', 'text', ['required' => true,
                                        'attr' => ['class' => 'article-form-field'],
                                        'label' => 'Название',
                                        'constraints' => array(
                                            new NotBlank()
                                        )
            ])
            ->add('bodyRu', 'textarea', ['required' => true ,
                                    'attr' => ['class' => 'article-form-field'],
                                    'label' => 'Тело статьи',
                                    'constraints' => array(
                                        new NotBlank()
                                    )
            ])
            ->add('slug', 'text', ['required' => false ,
                                    'attr' => ['class' => 'article-form-field'],
                                    'label' => 'ЧПУ',
                                    'constraints' => array(
                                        new Regex(['pattern' => '/[a-z0-9\-\_\/]+/', 'message' => 'Пожалуйста используйте только символы латиницы, тире, дефис и слеш'])
                                    )
            ])
        ;
    }

}