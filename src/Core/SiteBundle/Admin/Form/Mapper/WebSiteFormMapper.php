<?php
/**
 * Основная форма для редактирования web-сайта
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;


class WebSiteFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {

        $formMapper
            ->add('user', 'ajax_entity', [
            'label' => 'Пользователь',
            'required' => true,
            // 'attr' => ['data-legal' => ($obj && $obj->getContragent() instanceof LegalContragent) ? 1 : 0],
            'properties' => [
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
                'lastName' => array(
                    'search' => false,
                    'return' => true,
                    'entry' => 'left',
                ),
                'firstName' => array(
                    'search' => false,
                    'return' => true,
                    'entry' => 'left',
                ),
                'surName' => array(
                    'search' => false,
                    'return' => true,
                    'entry' => 'left'
                )
            ],
            'select2_constructor' => array(
                'width' => '40%',
                'placeholder' => 'Введите E-mail, фамилию, или ID пользователя',
                'minimumInputLength' => 1),
        ])
            ->add('domain', null, ['label' => 'Домен'])
            ->add('mirrors', null, ['attr' => ['rows' => 5], 'label' => 'Зеркала', 'help' => 'Альтернативные адреса. Если ваш сайт доступен по двум или более адресам (с www и без www не в счет), например, site.ru и site1.ru, то укажите здесь альтернативные адреса вашего сайта, в нашем примере - site1.ru. Если вы не укажите их здесь, то реклама на альтернативных адресах не будет отображаться, несмотря на установку кода. Поддомены Если ваш сайт разбит на поддомены, например, part1.site.ru, part2.site.ru, то укзывать поддомены здесь не нужно, реклама на всех них будет отображаться корректно.'])
            ->add('isVerified', null, ['label' => 'Подтверждено', 'help' => 'Если выставлено, значит пользователь подтвердил свои права на площадку'])
            ->add('verifiedCode', null, ['label' => 'Код подтверждения'])
            ->add('categories', 'category',
                array(
                    'class' => 'Core\CategoryBundle\Entity\SiteCategory',
                    'property' => 'captionRu',
                    'label' => 'Категории продукта',
                    'required' => false,
                    'multiple' => true,
                    'help' => 'Категории к которым принадлежит продукт.
                 При выборе категорий будет подгружен список характеристик,
                 характерных для продуктов, входящих в эту категорию.'
                ))
            ->end();
    }
}