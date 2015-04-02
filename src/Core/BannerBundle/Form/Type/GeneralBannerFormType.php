<?php

/**
 * Форма файл для баннера
 * @author  Kaluzhny N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\BannerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Doctrine\ORM\EntityManagerInterface;

abstract class GeneralBannerFormType  extends AbstractType
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @var SecurityContextInterface
     */
    protected $security;

    public function __construct(EntityManagerInterface $em, SecurityContextInterface $security)
    {
        $this->em = $em;
        $this->security = $security;
    }



    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('bannerType', 'choice', [
                    'label' => 'Тип баннер',
                    'mapped' => false,
                    //'empty_value' => 'Необходимо выбрать',
                    'attr' => ['class' => 'banner_type'],
                    'choices' => ['image' => 'Изображение', 'flash' => 'Flash', 'code' => 'HTML / Сторонний'],
                ])
                ->add('name', null, ['label'=> 'Название баннера'])

        ;

        $builder->addEventListener(FormEvents::SUBMIT, function(FormEvent $event) {
            $data = $event->getData();
            if (null == $data->getUser()) {
                $user = $this->security->getToken()->getUser();
                if (is_object($user)) {
                    $data->setUser($user);
                }
            }

        });

        $builder->addEventListener(FormEvents::POST_SUBMIT, function(FormEvent $event) {
            $data = $event->getData();
            $form = $event->getForm();
            $this->checkIsExistSite($data, $form->get('name'));

        });
    }
    /*
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }


    public function getName()
    {
        return 'general_banner_form';
    }
    */
    /**
     * Проверяет есть ли у пользователя баннер с таким именем
     * @param $banner
     * @param $user
     * @return bool
     */
    private function checkIsExistSite($banner, $element)
    {
        $res = $this->em->getRepository('CoreBannerBundle:CommonBanner')
            ->findQuantityByOptions([
                'id'    =>  $banner->getId(),
                'user'  =>  $banner->getUser(),
                'name'  =>  $banner->getName()
            ]);
        if ($res['quantity']) {
            $element
                ->addError(new FormError('Баннер с указанным названием был добавлен вами ранее. Придумайте другое уникальное название.'));
        }
    }

}