<?php

/**
 * Форма доставка - получатель
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ReviewBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class ReviewType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('review', null, array(
                'label' => false,
                'required' => false,
                'attr' => array(
                    'class' => 'text_input',
                    'placeholder' => 'Ваш отзыв...'
                )
            ))
            ->add('pros', null, array(
                'label' => false,
                'attr' => array(
                    'class' => 'text_input min review-pros',
                    'placeholder' => 'Плюсы'
                )
            ))
            ->add('cons', null, array(
                'label' => false,
                'attr' => array(
                    'class' => 'text_input min review-cons',
                    'placeholder' => 'Минусы'
                )
            ))
            ->add('rating', 'star_rating', array(
//                'required' => true,
            ))
            ->add('parent', 'hidden', array(
                'label' => false,
                'attr' => array(
                    'class' => 'hidden reviews-parent-id'
                )
            ))
            ->add('product', 'entity', array(
                'label' => false,
                'read_only' => true,
                'class' => 'Core\ProductBundle\Entity\CommonProduct',
                'property' => 'slug',
                'choices' => null !== $options['product'] ? [$options['product']] : '',
                'attr' => array(
                    'class' => 'hidden'
                )
            ))
            ->add('user', 'entity', array(
                'label' => false,
                'read_only' => true,
                'class' => 'Application\Sonata\UserBundle\Entity\User',
                'property' => 'username',
                'choices' => null !== $options['user'] && $options['user'] !== 'anon.' ? [$options['user']] : '',
                'attr' => array(
                    'class' => 'hidden'
                )
            ))
            ->add('photos', 'multiupload_file_frontend', array(
                'label' => false,
                'required' => false,
                'type' => 'image',
                'namespace_to_attach' => 'Core\ReviewBundle\Entity\Review',
                'namespace_to_insert' => 'Core\FileBundle\Entity\ImageFile',
                'btnName' => '',
                'btnAttr' => array(
                    'class' => 'upload_photo icon_tgl',
                    'title' => 'Загрузить фото'
                ),
                'showStatusOfUpload' => true,
                'showCounterOfFiles' => false,
                'showAttachedFiles' => true,
            ))

            /*->add('remoteVideos', 'collection', array(
                'attr' => [
                    'title' => 'Видео с хостинга'
                ],
                'type' => 'remote_video_form',
                'required' => false,
                'by_reference' => false,
                'label' => 'Видео с хостинга',
                'prototype_name' => '_remote_video_index_',
                'cascade_validation' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'options' => ['hostings' => $options['em']->getRepository('CoreDirectoryBundle:VideoHosting')->findAll()]
            ))*/
            /*->add('videos', 'multiupload_file_frontend', array(
                'label' => false,
                'required' => false,
                'type' => 'document',
                'namespace_to_attach' => 'Core\ReviewBundle\Entity\Review',
                'namespace_to_insert' => 'Core\FileBundle\Entity\DocumentFile',
                'btnName' => '',
                'btnAttr' => array(
                    'class' => 'upload_video icon_tgl',
                    'title' => 'Загрузить видео'
                ),
                'showStatusOfUpload' => true, // Показывать сообщения/ошибки о статусе загрузки файла (default true)
                'showCounterOfFiles' => false, // Показывать кол-во загруженных файлов (пример: "Отправлено 5 из 10") (default true)
                'showAttachedFiles' => true, // Показывать имена уже загруженных файлов (default true)
            ))*/
        ;
        /*
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) use ($options) {
            $form = $event->getForm();
            $form->add('remoteVideos', 'collection', array(
                'attr' => [
                    'title' => 'Видео с хостинга'
                ],
                'type' => 'remote_video_form',
                'required' => false,
                'by_reference' => false,
                'label' => 'Видео с хостинга',
                'prototype_name' => '_remote_video_index_',
                'cascade_validation' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'options' => ['hostings' => $options['em']->getRepository('CoreDirectoryBundle:VideoHosting')->findAll()]
            ));
        });
        */
        /*
        $builder->addEventListener(FormEvents::PRE_SUBMIT, function(FormEvent $event) {
            $data = $event->getData();
            ld($data);
        });
        */
        /*
        $builder->addEventListener(FormEvents::SUBMIT, function(FormEvent $event) {
            $data = $event->getData()->getRemoteVideos()->first();
        });
        */
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Core\ReviewBundle\Entity\Review',
            'product' => null,
            'user' => null,
            'em' => null,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'core_review_form_type';
    }

}
