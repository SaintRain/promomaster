<?php

/**
 * Новый тип формы для выбора цвета продукта в админки, на основе entity
 * Выбор цвета для товара
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ColorBundle\Admin\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormView;
use Doctrine\ORM\EntityRepository;

class ColorType extends AbstractType {

    private $logic; // Логика для работы с цветами
    private $doctrine; // Доктрина

    public function __construct($logic, $doctrine) {
        $this->logic = $logic;
        $this->doctrine = $doctrine;
    }

    /**
     * Построение формы
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
    }

    public function buildView(FormView $view, FormInterface $form, array $options) {
        $view->vars['colors'] = $options['colors'];
    }

    /**
     *  Устанавливаем опции по умолчанию
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {

        $em = $this->doctrine->getManager();

        $colors = $em->createQueryBuilder()
            ->select('c')
            ->from('CoreColorBundle:Color', 'c', 'c.id')
            ->leftJoin('c.palette', 'p')
            ->addSelect('p')
            ->where('c.isEnabled = 1')
            ->orderBy('c.indexPosition', 'ASC')
            ->getQuery()
            ->getResult();


        // Добавляем опции в разрешимый список
        $defaults = array(
            'colors' => $colors,
            'choices' => $colors,
            'property' => 'captionRu',
            'class' => 'Core\ColorBundle\Entity\Color',
        );
        $resolver->setDefaults($defaults);
    }

    /**
     * Родительский тип формы
     */
    public function getParent() {
        return 'entity';
    }

    /**
     * Название типа формы
     */
    public function getName() {
        return 'admin_form_type_color';
    }

}