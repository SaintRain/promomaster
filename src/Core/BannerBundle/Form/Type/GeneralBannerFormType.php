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
use Symfony\Component\Security\Core\SecurityContextInterface;
use Doctrine\ORM\EntityManagerInterface;
use Core\BannerBundle\Entity\ImageBanner;
use Core\BannerBundle\Entity\FlashBanner;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

abstract class GeneralBannerFormType  extends AbstractType
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @var RequestStack
     */

    protected $requestStack;

    /**
     * @var SecurityContextInterface
     */
    protected $security;

    /**
     * @var SessionInterface
     */
    protected $session;

    private static $sessionKeys = [
        'image' => 'core_file_image',
        'file' => 'core_file'
    ];

    public function __construct(EntityManagerInterface $em, SecurityContextInterface $security, SessionInterface $session, RequestStack $requestStack)
    {
        $this->em = $em;
        $this->security = $security;
        $this->requestStack = $requestStack;
        $this->session = $session;
    }



    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $data = $builder->getData();
        $file = null;

        if (!$data || !$data->getId()) {
            $builder->add('bannerType', 'choice', [
                'label' => 'Тип баннера',
                'mapped' => false,
                //'empty_value' => 'Необходимо выбрать',
                'attr' => ['class' => 'banner_type'],
                'choices' => ['image' => 'Изображение', 'flash' => 'Flash', 'code' => 'HTML / Сторонний'],
            ]);
        }

        $builder->add('name', null, ['label'=> 'Название баннера']);

        $builder->addEventListener(FormEvents::POST_SET_DATA, function(FormEvent $event) use (&$file) {
            $data = $event->getData();
            if ($data && $data->getId()) {
                if ($data instanceof ImageBanner) {
                    $file = $data->getImage()[0];

                } elseif($data instanceof FlashBanner) {
                    $file = $data->getFile()[0];
                }
            }
        });

        $builder->addEventListener(FormEvents::SUBMIT, function(FormEvent $event) {
            $data = $event->getData();
            if (null == $data->getUser()) {
                $user = $this->security->getToken()->getUser();
                if (is_object($user)) {
                    $data->setUser($user);
                }
            }

        });

        $builder->addEventListener(FormEvents::POST_SUBMIT, function(FormEvent $event) use (&$file){
            $data = $event->getData();
            $form = $event->getForm();
            $this->checkIsExistSite($data, $form->get('name'));

            // нужно перевязвать файл, потому что он затирается
            if ($data && $data->getId()) {
                if ($data instanceof ImageBanner) {
                    $data->setImage($file);
                } elseif($data instanceof FlashBanner) {
                    $file = $data->setFile($file);
                }
            }

            if ($data instanceof ImageBanner || $data instanceof FlashBanner) {
                if ($data instanceof ImageBanner) {
                    $this->checkIsFileLoaded($form->get('image'), $form->get('name'));
                } elseif($data instanceof FlashBanner) {
                    $this->checkIsFileLoaded($form->get('file'), $form->get('name'));
                }
            }

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

    /**
     * Проверяет загрузку файлов
     * @param $formElement
     * @param $fieldErrorPlace
     */
    private function checkIsFileLoaded($formElement, $fieldErrorPlace)
    {
        $isError = false;
        $fieldName = $formElement->getName();
        $request = $this->requestStack->getCurrentRequest();
        $data = $request->request->get('CoreFileBundleInput');
        if ($data && $data[$fieldName]['form_id']) {
            //$fileHash = $data[$fieldName]['form_id'];
            //ld($fileHash);
            $curSession = $this->session->get(self::$sessionKeys[$fieldName]);
            if (!$curSession /* || !isset($curSession[$fileHash])*/) {
                $isError = true;
            }
        } else {
            $isError = true;
        }
        if ($isError) {
            $fieldErrorPlace->addError(new FormError('Необходимо выбрать файл'));
        }
    }

}