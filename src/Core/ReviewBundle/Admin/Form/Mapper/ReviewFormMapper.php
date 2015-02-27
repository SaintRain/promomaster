<?php

/**
 * Форма редактирования отзыва
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ReviewBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;
use Core\ReviewBundle\Entity\Payment;

class ReviewFormMapper extends LanguageSwitcherFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {

        parent::__construct($formMapper, $options);

        $obj = $options['obj'];
        $em = $options['container']->get('doctrine.orm.entity_manager');
        $isExist = $obj->getId() ? true : false;

        $formMapper
            ->with('Отзыв')
            ->add('isEnabled', null, array(
                'label' => 'Активность',
                'required' => false,
        ));

        if ($obj->getId()) {
            $formMapper
                ->add('id', 'text', array(
                    'label' => 'ID',
                    'disabled' => true,
                    'required' => false,
                    'attr' => array('style' => 'width:100px;')
                ))
                ->add('createdAt', null, array(
                    'label' => 'Создан',
                    'widget' => 'single_text',
                    'required' => false,
                    'format' => 'dd.MM.yyyy в HH:mm',
                    'view_timezone' => $options['container']->getParameter('default_timezone'),
                    'disabled' => true,
                ))
                ->add('updatedAt', null, array(
                    'label' => 'Обновлен',
                    'widget' => 'single_text',
                    'required' => false,
                    'format' => 'dd.MM.yyyy в HH:mm',
                    'view_timezone' => $options['container']->getParameter('default_timezone'),
                    'disabled' => true,
            ));
        }

        $formMapper
            ->add('product', 'ajax_entity', [
                'label' => 'Продукт',
                'read_only' => $obj->getProduct() || $isExist ? true : false,
                'properties' => array(
                    'id' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'full',
                    ),
                    'sku' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'left',
                    ),
                    'article' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'left',
                    ),
                    'captionRu' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'left',
                    ),
                    'images' => array(
                        'search' => false,
                        'return' => true,
                    ),
                    'price' => array(
                        'search' => false,
                        'return' => true,
                    )),
                'template_customise_functions' => 'product.html.twig',
                'select2_constructor' => array(// стандартные настройки списка select2
                    'placeholder' => 'Продукт к которому написаны отзывы',
                    'minimumInputLength' => 1,
                    'formatResult' => 'productFormatResult',
                    'formatSelection' => 'productFormatSelection',
                )
            ])
            ->add('user', 'ajax_entity', array(
                'label' => 'Пользователь',
                'disabled' => $isExist,
                'separator' => ' ',
                'properties' => array(
                    'id' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'full',
                    ),
                    'email' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'left',
                    ),
                    'firstname' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'left',
                    ),
                    'lastname' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'left',
                    ),
                ),
                'select2_constructor' => array(// стандартные настройки списка select2
                    'placeholder' => 'Пользователь который написал отзывы',
                    'minimumInputLength' => 1,
                )
            ))
            ->add('parent', 'ajax_entity', array(
                'label' => 'Отзыв (родительский)',
                'read_only' => $obj->getParent() || $isExist ? true : false,
                'required' => false,
                'max_results' => 5,
                'separator' => ' ',
                'properties' => array(
                    'id' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'full',
                    ),
                    'rating' => array(
                        'search' => true,
                        'return' => true,
                    ),
                    'user.email' => array(
                        'search' => true,
                        'return' => true,
                    ),
                    'product.captionRu' => array(
                        'search' => true,
                        'return' => true,
                    ),
                    'product.article' => array(
                        'search' => true,
                        'return' => true,
                    ),
                ),
                'select2_constructor' => array(// стандартные настройки списка select2
                    'placeholder' => 'Отзыв к которому прицепить текущий',
                    'minimumInputLength' => 1,
                    'formatResult' => $format = 'function(result) { var stars = ""; for (var i=0; i<result.rating; i++) stars += "&#9733;"; return "ID: <b>" + result.id + " " + stars + "</b>,<br>Написал: <b>" + result.userEmail + "</b><br>к продукту <b>" + result.productCaptionRu + "</b> (арт: " + result.productArticle + ") "; }',
                    'formatSelection' => str_replace('<br>', ' ', $format),
                )
            ))
            ->add('rating', 'star_rating', array(
                'disabled' => $isExist,
                'label' => 'Оценка',
        ));
        if ($obj->getId()) {
            $formMapper
                ->add('likes', null, array(
                    'label' => 'Лайки',
                    'required' => false,
                    'property' => 'id'
            ));
        }
        $formMapper->add('review', null, array(
                'label' => 'Отзыв',
                'attr' => array(
                    'rows' => 10
                )
            ))
            ->add('pros', null, array(
                'label' => 'Плюсы',
                'attr' => array(
                    'rows' => 5
                )
            ))
            ->add('cons', null, array(
                'label' => 'Минусы',
                'attr' => array(
                    'rows' => 5
                )
            ))
            ->with('Фото и видео')
            ->add('photos', 'multiupload_image', array(
                'width' => '800px',
                //'hide_field' => array('altRu'),
                'parent_form' => $formMapper,
                'label' => 'Фото',
                ), array(
                'sortable' => 'indexPosition',
            ))
            ->add('remoteVideos', 'collection', array(
                'attr' => ['class' => 'remote-video-block'],
                'type' => 'remote_video_form',
                'required' => false,
                'by_reference' => false,
                'label' => 'Видео с хостинга',
                'prototype_name' => 'remote_videos_',
                'cascade_validation' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'options' => ['hostings' => $em->getRepository('CoreDirectoryBundle:VideoHosting')->findAll()]
            ))
//            ->add('videos', 'multiupload_document', array(
//                'hide_field' => array('all'),
//                'width' => '800px',
//                'parent_form' => $formMapper,
//                'label' => 'Видео',
//                ), array(
//                'sortable' => 'indexPosition',
//            ))
        ;

        if ($obj->getId() && !$obj->getParent()) {
            $formMapper
                ->with('Ответы')
                ->add('children', 'sonata_type_collection', array(
                    'label' => false,
            ));
            ;
        }

        $formMapper->end();
    }

}
