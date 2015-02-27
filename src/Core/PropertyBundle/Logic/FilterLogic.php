<?php

/**
 * Бизнес-логика фильтра
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PropertyBundle\Logic;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Query;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\Intl\Intl;

class FilterLogic
{

    private $locale;
    private $request;
    private $doctrine;
    private $templating;
    private $default_currency;
    private $container;

    public function __construct($locale, $default_currency, $doctrine, $templating, $translator, $container)
    {
        $this->locale = $locale;
        $this->default_currency = $default_currency;
        $this->doctrine = $doctrine;
        $this->templating = $templating;
        $this->translator = $translator;
        $this->container = $container;
    }

    /**
     * Подписка на событие request для получения текущей локили
     *
     * @param \Symfony\Component\HttpKernel\Event\GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        if ($event->getRequestType() === HttpKernel::MASTER_REQUEST) {
            $this->request = $event->getRequest();
            $this->locale = $event->getRequest()->getLocale();
        }
    }

    /**
     * Создание массива для вывода фильтра по имеющимся в категории характеристикам
     * Полученый массив передается в Twig шаблон c названием filter
     *
     * @param integer || object $category - категория
     * @param array $options
     * @return array
     */
    public function getFilterBuilderByCategory($options)
    {

        $em = $this->doctrine->getManager();
        $indexesPosition = array();

        // Получаем основные данные для построения фильтра (цена, бренды и объект категории для получения характеристик)
        $data = $em->getRepository('CoreCategoryBundle:ProductCategory')->getFilterGeneralData($options);

        if (null === $data) {
            throw new NotFoundHttpException('Cann\'t get general data for build filter! ' . "\n" . json_encode($options, JSON_UNESCAPED_SLASHES) . "\n" . get_class() . '#' . __FUNCTION__);
        }

        $category = $data['category'];

        if (null === $category) {
            throw new NotFoundHttpException('Cann\'t find category by ' . "\n" . json_encode($options['category'], JSON_UNESCAPED_SLASHES) . "\n" . get_class() . '#' . __FUNCTION__);
        }

        // создаем коллекцию из категорий
        $collectionCategories = new ArrayCollection();
        $collectionCategories->add($category);

        // задаем опции для поиска характеристик
        $optionsToSearchProperties = array(
            'isUsedInFilter' => true,
            'isEnabled' => true,
            'categories' => $collectionCategories,
        );

        // ищем характеристики с учетом категории
        $properties = $em->getRepository('CorePropertyBundle:Property')->getAll($optionsToSearchProperties);

        $filterBuilder = array();
        $EditTypeDir = 'CorePropertyBundle:Filter/EditType';

        $dataListIds = array();
        foreach ($properties as $property) {
            $dataList = $property->getDataList()->first();
            if (null !== $dataList) {
                $dataListIds[] = $dataList->getId();
            }
        }

        // получаем максимумы и минимумы для построения виджета диапазона чисел
        $MaxAndMin = $em->getRepository('CorePropertyBundle:ProductDataProperty')->getMaxAndMinByIdsDataList($dataListIds);

        foreach ($properties as $property) {

            $editType = in_array($property->getEditType(), ['multiselect', 'select']) ? 'checkbox' : $property->getEditType();

            // для radio, multiselect, checkbox (получение всех значений)
            $values = array();
            if (in_array($editType, ['checkbox', 'radio'])) {
                $dataList = $property->getDataList();
                foreach ($dataList as $dataOne) {
                    $values[$dataOne->getId()] = array(
                        'caption' => $dataOne->getValue(),
                        'name' => $dataOne->getName(),
                        'indexPosition' => $dataOne->getIndexPosition(),
                    );
                }
            }

            $values = $this->sortByIndexPosition($values);

            // для input (получение максимума и минимума)
            $range = array();
            $unitObj = null;

            if ($editType === 'input' && count($MaxAndMin)) {
                $unitObj = $property->getGeneralSettingsCategory()->getDefaultUnit();
                if (null !== $unitObj) {
                    $dataList = $property->getDataList()->first();
                    foreach ($MaxAndMin as $MM) {
                        if ($MM['dataId'] == $dataList->getId()) {
                            $min = floor($MM['minVal']);
                            $max = round($MM['maxVal']);
                            $range['minVal'] = $max == $min && $max > 0 ? 0 : $min;
                            $range['maxVal'] = $max == $min && $min < 0 ? 0 : $max;
                        }
                    }
                    $range['shortCaption'] = $unitObj->{'getShortCaption' . ucfirst($this->locale)}();
                }
            }

            $name = $property->getName();
            $EditTypeDirExtra = $EditTypeDir . '/Extra:' . $editType . '__' . $name . '.html.twig';
            $indexPosition = $property->getGeneralSettingsCategory()->getIndexPosition();
            $indexesPosition[] = $indexPosition;

            $filterBuilder[$name] = array(
                'caption' => $property->{'getCaption' . ucfirst($this->locale)}(),
                'name' => $name,
                'type' => $editType,
                'indexPosition' => $indexPosition,
                'is' => 'p', //property
                'template' => $this->templating->exists($EditTypeDirExtra) ? $EditTypeDirExtra : $EditTypeDir . ':' . $editType . '.html.twig',
                'values' => $values,
                'range' => $range,
            );
        }

        // добавляем в фильтр цену
        if (in_array('price', $options['showElements']) && ($data['minPrice'] >= 0 && $data['maxPrice'] > 0)) {
            $EditTypeDirExtra = $EditTypeDir . '/Extra:input__price.html.twig';
            $min = floor($data['minPrice']);
            $max = round($data['maxPrice']);
            $filterBuilder['price'] = array(
                'caption' => $this->translator->trans('filter.price', [], 'frontend'),
                'name' => 'price',
                'type' => 'input',
                'indexPosition' => count($indexesPosition) ? max($indexesPosition) + 1 : 1001,
                'template' => $this->templating->exists($EditTypeDirExtra) ? $EditTypeDirExtra : $EditTypeDir . ':input.html.twig',
                'values' => array(),
                'range' => array(
                    'shortCaption' => Intl::getCurrencyBundle()->getCurrencySymbol($this->default_currency, $this->locale),
                    'minVal' => $max == $min ? 0 : $min,
                    'maxVal' => $max,
                ),
            );
        }

        // добавляем в фильтр бренды
        if (in_array('brands', $options['showElements'])) {
            $values = array();

            $brands = $this->doctrine->getManager()->getRepository('CoreManufacturerBundle:Brand')->findByCategory($category, $options);

            if ($brands) {
                foreach ($brands as $brand) {
                    $values[$brand->getId()] = array(
                        'caption' => $brand->{'getCaption' . ucfirst($this->locale)}(),
                        'name' => $brand->getSlug(),
                        'indexPosition' => $brand->getIndexPosition(),
                    );
                }

                $values = $this->sortByIndexPosition($values);

                $EditTypeDirExtra = $EditTypeDir . '/Extra:checkbox__brands.html.twig';
                $filterBuilder['brands'] = array(
                    'caption' => $this->translator->trans('filter.brands', [], 'frontend'),
                    'name' => 'brands',
                    'type' => 'checkbox',
                    'indexPosition' => count($indexesPosition) ? max($indexesPosition) + 1 : 1002,
                    'template' => $this->templating->exists($EditTypeDirExtra) ? $EditTypeDirExtra : $EditTypeDir . ':checkbox.html.twig',
                    'values' => $values,
                    'range' => array(),
                );
            }
        }

        $filterBuilder = $this->finishFilterBuilder($filterBuilder, $data, $options);

        return [
            'filterBuilder' => $filterBuilder,
            'category' => $category
        ];
    }

    /**
     * Создание массива для вывода фильтра по имеющимся в категории характеристикам
     * Полученый массив передается в Twig шаблон c названием filter
     *
     * @param integer || object $category - категория
     * @param array $options
     * @return array
     */
    public function getFilterBuilderByBrand($options)
    {
        $em = $this->doctrine->getManager();

        // Получаем основные данные для построения фильтра (цена, бренды и объект категории для получения характеристик)
        $data = $em->getRepository('CoreManufacturerBundle:Brand')->getFilterGeneralData($options);

        if (null === $data) {
            throw new NotFoundHttpException('Cann\'t get general data for build filter! ' . "\n" . json_encode($options, JSON_UNESCAPED_SLASHES) . "\n" . get_class() . '#' . __FUNCTION__);
        }

        $brand = $data['brand'];

        if (null === $brand) {
            throw new NotFoundHttpException('Cann\'t find brand by ' . "\n" . json_encode($options['brand'], JSON_UNESCAPED_SLASHES) . "\n" . get_class() . '#' . __FUNCTION__);
        }

        $filterBuilder = $this->getPartOfStaticFilterByPropertyNames(['sex', 'age', 'skills']);

        $EditTypeDir = 'CorePropertyBundle:Filter/EditType';

        // добавляем в фильтр цену
        if (in_array('price', $options['showElements']) && ($data['minPrice'] >= 0 && $data['maxPrice'] > 0)) {
            $EditTypeDirExtra = $EditTypeDir . '/Extra:input__price.html.twig';
            $min = floor($data['minPrice']);
            $max = round($data['maxPrice']);
            $filterBuilder['price'] = array(
                'caption' => $this->translator->trans('filter.price', [], 'frontend'),
                'name' => 'price',
                'type' => 'input',
                'indexPosition' => 1,
                'template' => $this->templating->exists($EditTypeDirExtra) ? $EditTypeDirExtra : $EditTypeDir . ':input.html.twig',
                'values' => array(),
                'range' => array(
                    'shortCaption' => Intl::getCurrencyBundle()->getCurrencySymbol($this->default_currency, $this->locale),
                    'minVal' => $max == $min ? 0 : $min,
                    'maxVal' => $max,
                ),
            );
        }

        // добавляем в фильтр категории
        if (in_array('categories', $options['showElements'])) {
            $values = array();

            $categories = $this->doctrine->getManager()->getRepository('CoreCategoryBundle:ProductCategory')->findByBrand($brand);

            foreach ($categories as $category) {
                $values[$category->getId()] = array(
                    'caption' => $category->{'getCaption' . ucfirst($this->locale)}(),
                    'name' => $category->getSlug(),
                    'indexPosition' => $category->getIndexPosition(),
                );
            }

            $values = $this->sortByIndexPosition($values);

            $EditTypeDirExtra = $EditTypeDir . '/Extra:checkbox__categories.html.twig';
            $filterBuilder['categories'] = array(
                'caption' => $this->translator->trans('filter.categories', [], 'frontend'),
                'name' => 'categories',
                'type' => 'checkbox',
                'indexPosition' => 2,
                'template' => $this->templating->exists($EditTypeDirExtra) ? $EditTypeDirExtra : $EditTypeDir . ':checkbox.html.twig',
                'values' => $values,
                'range' => array(),
            );
        }

        $filterBuilder = $this->finishFilterBuilder($filterBuilder, $data, $options);

        return [
            'filterBuilder' => $filterBuilder,
            'brand' => $brand
        ];
    }

    /**
     * Создание массива для вывода фильтра на главной странице
     * Полученый массив передается в Twig шаблон c названием filter
     *
     * @return array
     */
    public function getFilterBuilderWithOwl()
    {
        $filterBuilder = $this->getPartOfStaticFilterByPropertyNames(['sex', 'age']);

        // добавляем в фильтр категории
        $values = array();
        $categories = $this->container->get('core_shop_category_logic')->getCategoryTreeToShow();

        foreach ($categories as $category) {
            $values[$category['id']] = array(
                'caption' => $category['caption' . ucfirst($this->locale)],
                'name' => $category['slug'],
                'indexPosition' => ['indexPosition'],
            );
        }

        $EditTypeDir = 'CorePropertyBundle:Filter/EditType';
        $EditTypeDirExtra = $EditTypeDir . '/Extra:checkbox__categories.html.twig';
        $filterBuilder['categories'] = array(
            'caption' => $this->translator->trans('filter.categories', [], 'frontend'),
            'name' => 'categories',
            'type' => 'checkbox',
            'indexPosition' => 2,
            'template' => $this->templating->exists($EditTypeDirExtra) ? $EditTypeDirExtra : $EditTypeDir . ':checkbox.html.twig',
            'values' => $values,
            'range' => array(),
        );

        return [
            'filterBuilder' => $filterBuilder,
            'categories' => $categories,
        ];
    }

    /**
     * Сортировка массива по убыванию по ключу indexPosition
     *
     * @param array $array
     * @return array
     */
    private function sortByIndexPosition($array)
    {
        uasort($array, function($a, $b) {
            if (isset($a['indexPosition'])) {
                if ($a['indexPosition'] == $b['indexPosition']) {
                    return 0;
                }
                return ($a['indexPosition'] > $b['indexPosition']) ? 1 : -1;
            } else {
                return 0;
            }
        });

        return $array;
    }

    /**
     * Создает часть статического фильтра по названиям характеристик
     *
     * @param array $propertyNames
     * @return array
     */
    private function getPartOfStaticFilterByPropertyNames($propertyNames)
    {
        $filterBuilder = array();
        $EditTypeDir = 'CorePropertyBundle:Filter/EditType';
        $properties = $this->doctrine->getManager()->getRepository('CorePropertyBundle:Property')->getPropertyForBuildStaticFilter($propertyNames);

        foreach ($properties as $property) {
            $editType = in_array($property->getEditType(), ['multiselect', 'select']) ? 'checkbox' : $property->getEditType();
            $values = array();
            foreach ($property->getDataList() as $dataOne) {
                $values[$dataOne->getId()] = array(
                    'caption' => $dataOne->getValue(),
                    'name' => $dataOne->getName(),
                    'indexPosition' => $dataOne->getIndexPosition(),
                );
            }

            $EditTypeDirExtra = $EditTypeDir . '/Extra:' . $editType . '__' . $property->getName() . '.html.twig';

            $filterBuilder[$property->getName()] = array(
                'caption' => $property->{'getCaption' . ucfirst($this->locale)}(),
                'name' => $property->getName(),
                'type' => $editType,
                'indexPosition' => $property->getIndexPosition(),
                'is' => 'p',
                'template' => $this->templating->exists($EditTypeDirExtra) ? $EditTypeDirExtra : $EditTypeDir . ':' . $editType . '.html.twig',
                'values' => $values,
                'range' => array()
            );
        }

        return $filterBuilder;
    }

    /**
     * Создает часть статического фильтра по названиям характеристик
     *
     * @param array $propertyNames
     * @return array
     */
    private function finishFilterBuilder($filterBuilder, $data, $options)
    {
        $indexPosition = 1000;
        $EditTypeDir = 'CorePropertyBundle:Filter/EditType';
        if (isset($data['isInFilterNetWeight']) && $data['isInFilterNetWeight']) {
            $EditTypeDirExtra = $EditTypeDir . '/Extra:input__netWeight.html.twig';
            $min = floor($data['minNetWeight']);
            $max = round($data['maxNetWeight']);
            $filterBuilder['netWeight'] = array(
                'caption' => $this->translator->trans('filter.netWeight', [], 'frontend'),
                'name' => 'netWeight',
                'type' => 'input',
                'indexPosition' => $indexPosition++,
                'template' => $this->templating->exists($EditTypeDirExtra) ? $EditTypeDirExtra : $EditTypeDir . ':input.html.twig',
                'values' => array(),
                'range' => array(
                    'shortCaption' => $this->translator->trans('filter.' . ($data['isNetWeightInGm'] ? 'g' : 'kg'), [], 'frontend'),
                    'minVal' => $max == $min && $max > 0 ? 0 : $min,
                    'maxVal' => $max == $min && $min < 0 ? 0 : $max,
                ),
                'other' => array(
                    'isNetWeightInGm' => $data['isNetWeightInGm']
                )
            );
        }

        if (isset($data['isInFilterGrossWeight']) && $data['isInFilterGrossWeight']) {
            $EditTypeDirExtra = $EditTypeDir . '/Extra:input__grossWeight.html.twig';
            $min = floor($data['minGrossWeight']);
            $max = round($data['maxGrossWeight']);
            $filterBuilder['grossWeight'] = array(
                'caption' => $this->translator->trans('filter.grossWeight', [], 'frontend'),
                'name' => 'grossWeight',
                'type' => 'input',
                'indexPosition' => $indexPosition++,
                'template' => $this->templating->exists($EditTypeDirExtra) ? $EditTypeDirExtra : $EditTypeDir . ':input.html.twig',
                'values' => array(),
                'range' => array(
                    'shortCaption' => $this->translator->trans('filter.' . ($data['isGrossWeightInGm'] ? 'g' : 'kg'), [], 'frontend'),
                    'minVal' => $max == $min && $max > 0 ? 0 : $min,
                    'maxVal' => $max == $min && $min < 0 ? 0 : $max,
                ),
                'other' => array(
                    'isGrossWeightInGm' => $data['isGrossWeightInGm']
                )
            );
        }

        foreach (['lengthOfProduct', 'widthOfProduct', 'heightOfProduct', 'lengthOfBox', 'widthOfBox', 'heightOfBox'] as $name) {
            if (isset($data['isInFilter' . ucfirst($name)]) && $data['isInFilter' . ucfirst($name)]) {
                $min = floor($data['min' . ucfirst($name)]);
                $max = round($data['max' . ucfirst($name)]);
                $EditTypeDirExtra = $EditTypeDir . '/Extra:input__' . $name . '.html.twig';
                $filterBuilder[$name] = array(
                    'caption' => $this->translator->trans('filter.' . $name, [], 'frontend'),
                    'name' => $name,
                    'type' => 'input',
                    'indexPosition' => $indexPosition++,
                    'template' => $this->templating->exists($EditTypeDirExtra) ? $EditTypeDirExtra : $EditTypeDir . ':input.html.twig',
                    'values' => array(),
                    'range' => array(
                        'shortCaption' => $this->translator->trans('filter.mm', [], 'frontend'),
                        'minVal' => $max == $min && $max > 0 ? 0 : $min,
                        'maxVal' => $max == $min && $min < 0 ? 0 : $max,
                    ),
                );
            }
        }

        $filterBuilderResult = $this->sortByIndexPosition($filterBuilder);

        return $filterBuilderResult;
    }

}
