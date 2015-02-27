<?php
/**
 * Форма редактирования производителей
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ManufacturerBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;
use Doctrine\ORM\EntityRepository;

class ManufacturerFormMapper extends LanguageSwitcherFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {
        parent::__construct($formMapper, $options);

        $formMapper
            ->with('Основные');
        $this
            ->add('caption', null,
                array(
                'label' => 'Название'
        ));
        $formMapper
            ->add('slug', null,
                array(
                'required' => false,
                'label' => 'Системное имя',
                'help' => 'Если оставить пустым, то заполниться автоматически'
            ))
            ->add('yearOfFoundation', 'text',
                array(
                'label' => 'Год основания',
                'attr' => ['data-mask' => 'integer']
            ))
            ->add('president', null,
                array(
                'label' => 'Директор (президент) компании'
        ));
        $formMapper
            ->add('country', null,
                array(
                'property' => 'captionRu',
                'label' => 'Страна',
//                //Если надо ограничить только активными странами, то раскоментировать query_builder
//                'query_builder' => function(EntityRepository $er) {
//                    return $er->createQueryBuilder('c')->where('c.isEnabled = 1')->orderBy('c.indexPosition', 'ASC');
//                }
            ))
            ->add('headquartersAddress', null,
                array(
                'label' => 'Адрес штабквартиры'
        ));
        $formMapper
            ->add('headquartersAddressGoogleMapsLink', 'text',
                array(
                'label' => 'Ссылки на карты (Google):',
                'required' => false
            ))
            ->add('headquartersAddressYandexMapsLink', 'text',
                array(
                'label' => 'Ссылки на карты: (Yandex)',
                'required' => false
            ))
            ->add('email', null,
                array(
                'label' => 'Email (Основной)'
            ))
            ->add('emailSupport', null,
                array(
                'label' => 'Email (Служба тех. поддержки)'
            ))
            ->add('urlSite', 'text',
                array(
                'label' => 'URL сайта',
                'required' => false,
                'attr' => ['data-mask' => 'url']
            ))
            ->add('urlServiceCenter', 'text',
                array(
                'label' => 'URL (Сервис. центра)',
                'required' => false,
                'attr' => ['data-mask' => 'url']
            ))
            ->add('urlSupport', 'text',
                array(
                'label' => 'URL (Служба тех. поддержки)',
                'required' => false,
                'attr' => ['data-mask' => 'url']
            ))
            ->add('phoneSalesDepartment', null,
                array(
                'label' => 'Телефон (Отдел продаж)'
            ))
            ->add('phoneSupport', null,
                array(
                'label' => 'Телефон (Служба тех. поддержки)'
            ))
            ->add('certificates', null,
                array(
                'property' => 'captionRu',
                'required' => false,
                'label' => 'Сертификаты',
            ))
            ->add('indexPosition', null,
                array(
                'label' => 'Позиция сортировки'
            ))
            ->with('Описание')
            ->add('logo', 'multiupload_image',
                array(
                'parent_form' => $formMapper,
                'label' => 'Логотип (300x150)',
                'width' => '700px',
                'attr' => array(
                    'multiple' => false, // для одного файла
                )
        ));
        $this
            ->add('description', 'ckeditor',
                array(
                'required' => false,
                'config' => array('width' => 1000, 'height' => 500),
                'label' => 'Описание'
        ));


        $formMapper->with('SEO')
        ->add('isCanBeInYml', null,
        array(
            'required' => false,
            'label' => 'Включать продукты в YML',
            'help' => 'Этот флаг не последний в определении будет ли продукт находится в YML-каталоге.
            Еще проверяется статус продукта и есть ли продукт в наличии (если продукт не под заказ).'
        ));
        $this
            ->add('title', null,
                array(
                'required' => false,
                'label' => 'Meta-title'
            ))
            ->add('metadescription', 'textarea',
                array(
                'required' => false,
                'label' => 'Meta-keywords'
            ))
            ->add('metakeywords', 'textarea',
                array(
                'required' => false,
                'label' => 'Meta-description'
        ));
        $formMapper->end();
    }
}