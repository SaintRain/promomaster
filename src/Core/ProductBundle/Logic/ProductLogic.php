<?php
/**
 * Логика для продукта
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Logic;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Core\UnionBundle\Entity\UserProduвыctFavoriteUnion;
use Core\UnionBundle\Entity\UserProductHistoryUnion;
use Core\UnionBundle\Entity\UserProductFavoriteUnion;
use Core\ReviewBundle\Form\Type\ReviewType;
use Core\ReviewBundle\Entity\Review;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\NullOutput;
use Core\ProductBundle\Entity\Subscribers\ToReport;
use Core\OrderBundle\Entity\PreOrder\PreOrder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Core\OrderBundle\Form\Type\FrontendPreOrderFormType;
use Application\Sonata\UserBundle\Entity\IndiContragent;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Sonata\AdminBundle\Datagrid\DatagridInterface;
use Core\ProductBundle\Entity\CommonProduct;
use Core\CategoryBundle\Entity\ProductCategory;
use Symfony\Component\Process\Process;

class ProductLogic
{
    private $default_locale;
    private $session;
    private $router;
    private $translator;
    private $request;
    private $locale;
    private $container;
    private $mailer;
    private $params;

    /**
     * Количество товаров на странице
     * @var array
     */
    private static $goodsLimit = [12, 24, 48];

    public function __construct($templating, $default_locale, $session, $router, $translator, $container, $mailer, $params)
    {
        $this->templating     = $templating;
        $this->default_locale = $default_locale;
        $this->session        = $session;
        $this->router         = $router;
        $this->translator     = $translator;
        $this->container      = $container;
        $this->mailer         = $mailer;
        $this->params         = $params;
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
            $this->locale  = $event->getRequest()->getLocale();
        }
    }

    /**
     * Получение id товаров которые находятся в избранном у текущего пользователя
     *
     * @param object $product
     * @return boolean
     */
    public function addProductInUserHistory($product)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (null !== $user && 'anon.' !== $user && is_object($user)) {

            $em = $this->container->get('doctrine')->getManager();

            // Предворительно получаем историю просмотренных товаров
            $isExist = $em->getRepository('CoreProductBundle:CommonProduct')->isExistInUserHistory($user, $product);

            if (count($isExist) === 0) {
                $union = new UserProductHistoryUnion();
                $union->setTargetObject($user);
                $union->setMappedObject($product);
                $union->setViewedAt(new \DateTime());
            } else {
                $union = $isExist->getHistoryUsers()->first();
                $union->setViewedAt(new \DateTime());
            }
            $em->persist($union);
            $em->flush($union);
        }
    }

    /**
     * Получаем URL для перенаправление c /~/1 на /~, чтобы не было одинаковых URL
     *
     * @param string $route
     * @return boolean|string
     */
    public function getRedirectUrlIfPageEqualOne($route)
    {

        if ($this->request->get('page') === '1' && $this->request->attributes->get('_route') !== $route) {
            $parameters = array_merge(
                $this->request->attributes->get('_route_params'), $this->request->query->all(), array('page' => null)
            );
            return $this->router->generate($route, $parameters);
        }
        return false;
    }

    /**
     * Получаем корректное значение переменной для ограничения показа товаров на странице, а так же дефолтное значение и предел
     *
     * @return array
     */
    public function getTheRightCountForDisplay()
    {

        $default = 12; // дефолтное значение
        $limit   = 500; // предел, если кол-во товаров больше то на странице скрывается ссылка "Все товары"
        $show    = $this->request->query->get('show');
        if ($show == null || in_array($show, self::$goodsLimit)) {
            /*
              if ($show === 'all' || (int) $show > $limit) {
              $show = $limit;
              } elseif ((int) $show > $default) {
             *
             */
            if ((int) $show > $default) {
                $show = (int) $show;
            } else {
                $show = $default;
            }
        } else {
            throw new NotFoundHttpException('Page Not Found');
        }

        return [$show, $default, $limit];
    }

    /**
     * Получение всех размеров и цветов модифицированых товаров
     *
     * @param object $product
     * @return array
     */
    public function getModsData($idCurrent, $productOrArray)
    {
        $modsData = array();

        if (is_array($productOrArray)) {
            $mods = $productOrArray;
        } else {
            $mods = [$productOrArray];
        }

        foreach ($mods as $mod) {

            if ($mod->getAvailabilityQuantity() && null !== $mod->getColor()) {
                $modsData['colors'][$mod->getColor()->getId()]['caption']   = $mod->getColor()->{'getCaption'.ucfirst($this->locale)}();
                $modsData['colors'][$mod->getColor()->getId()]['isCurrent'] = $mod->getId() === $idCurrent ? true : false;
                $properties                                                 = $mod->getProductDataProperty();
                foreach ($properties as $i => $property) {
                    $propertyTmp = $property->getData()->getProperty();
                    if ($propertyTmp->getName() === 'size') {
                        $uri = $this->router->generate('core_product', array(
                            'slug' => $mod->getSlug(),
                        ));

                        $modsData['colors'][$mod->getColor()->getId()]['links'][$property->getData()->getName()] = $uri;
                        $modsData['sizes'][$property->getData()->getName()]['caprion']                           = $property->getData()->getValue();
                        $modsData['sizes'][$property->getData()->getName()]['isCurrent']                         = $mod->getId() === $product->getId() ? true : false;
                        break;
                    }
                }
            }
        }

        if (!isset($modsData['colors']) || !isset($modsData['sizes'])) {
            $modsData = array();
        }

        return $modsData;
    }

    /**
     * Разбиение характеристик для костомного и обычного вывода
     *
     * @param object $product
     * @return array
     */
    public function getExtraAndRestProperties($product)
    {

        $properties      = $product->getProductDataProperty();
        $extraProperties = array();
        $restProperties  = array();

        foreach ($properties as $i => $productProperty) {
            $data = $productProperty->getData();
            $prop = $data->getProperty();
            if ($prop->getIsEnabled() === false) {
                continue;
            }
            switch ($prop->getName()) {
                case 'age':
                    $extraProperties['age'][]             = $data;
                    break;
                case 'skills':
                    $extraProperties['skills'][]          = $data;
                    break;
                case 'number_components':
                    $extraProperties['number_components'] = (int) $productProperty->getValueNumeric();
                    break;
                case 'iso-sings':
                    $extraProperties['iso-sings'][]       = $data;
                    break;
                default:
                    $id                                   = $productProperty->getId();
                    $editType                             = $prop->getEditType();

                    if (in_array($prop->getName(), ['size'])) {
                        break;
                    } elseif (in_array($editType, ['input', 'input_text', 'textarea', 'editor'])) {
                        $restProperties[$prop->getName()] = array(
                            'type' => $editType,
                            'caption' => $prop->{'getCaption'.ucfirst($this->locale)}(),
                            'value' => $editType === 'input' ? $productProperty->getValueNumeric() : $productProperty->getValue(),
                            'indexPosition' => $prop->getIndexPosition(),
                            'unit' => $prop->getDefaultUnit() ? $prop->getDefaultUnit()->{'getShortCaption'.ucfirst($this->locale)}() : '',
                            'values' => null,
                        );
                    } elseif (in_array($editType, ['radio', 'select', 'multiselect', 'checkbox'])) {
                        $restProperties[$prop->getName()] = array(
                            'type' => $editType,
                            'caption' => $prop->{'getCaption'.ucfirst($this->locale)}(),
                            'value' => null,
                            'indexPosition' => $prop->getIndexPosition(),
                            'unit' => null,
                            'values' => isset($restProperties[$prop->getName()]['values']) ? $restProperties[$prop->getName()]['values'] + [$data->getId() => $data->getValue()] : [$data->getId() => $data->getValue()]
                        );
                    }
                    break;
            }
        }

        usort($restProperties,
            function ($a, $b) {
            if ($a['indexPosition'] > $b['indexPosition']) {
                return 1;
            } else {
                return -1;
            }
        });

        return [$extraProperties, $restProperties];
    }

    /**
     * Установка и получение недавно просмотренных товаров
     *
     * @param object $product
     * @return array
     */
    public function getAndSetRecentlyViewed($product)
    {

        if (null === $product) {
            throw new NotFoundHttpException('Object Product is empty! '."\n".get_class().'#'.__FUNCTION__);
        }

        $id = $product->getId();

        if (!$this->session->has('core_product')) {
            $this->session->set('core_product', array());
        }

        $session = $this->session->get('core_product');

        if (isset($session['recentlyViewed'])) {
            unset($session['recentlyViewed'][$id]);
        } else {
            $session['recentlyViewed'] = array();
        }

        $setted                         = $session['recentlyViewed'];
        $session['recentlyViewed'][$id] = $id;

        if (count($session['recentlyViewed']) > 21) {
            $session['recentlyViewed'] = array_slice($session['recentlyViewed'], -21);
        }

        $this->session->set('core_product', $session);

        $recentlyViewedTemp = $em                 = $this->container->get('doctrine')->getManager()->getRepository('CoreProductBundle:CommonProduct')->findProducts($setted);

        $recentlyViewed = array();
        foreach ($setted as $id) {
            if (isset($recentlyViewedTemp[$id])) {
                $recentlyViewed[$id] = $recentlyViewedTemp[$id];
            }
        }

        return array_reverse($recentlyViewed);
    }

    /**
     * Обновление товара в избранном (Добавление/Удаление)
     *
     * @param string $action
     * @param int $id
     */
    public function updateFavorites($request, $action, $id)
    {
        if ('POST' !== $request->getMethod()) {
            throw new NotFoundHttpException('Method must be a POST!');
        }

        $em       = $this->container->get('doctrine')->getManager();
        $response = array();

        $product = $em->getRepository('CoreProductBundle:CommonProduct')->find($id);
        $user    = $this->container->get('security.context')->getToken()->getUser();

        if (null === $product) {
            $response['error'][] = $this->translator->trans('Product not found', array(), 'frontend');
        }

        // Делаем предвыборку избранных продуктов
        $favoriteProducts = $em->getRepository('CoreProductBundle:CommonProduct')->getUserProducts($user, null, 'favorite');

        $oldUnion = $user->getFavoriteProducts()->filter(function ($union) use ($product) {
            if ($product->getId() === $union->getMappedObject()->getId()) {
                return $union;
            }
        });

        if (null === $user || 'anon.' === $user || !is_object($user)) {
            $response['error'][] = $this->translator->trans('User not found', array(), 'frontend');
        } else {

            if ($action === 'add' && !$oldUnion->isEmpty()) {
                $response['error'][] = $this->translator->trans('Product already in favorites', array(), 'frontend');
            }

            if ($action === 'remove' && $oldUnion->isEmpty()) {
                $response['error'][] = $this->translator->trans('Faved has not this product', array(), 'frontend');
            }
        }

        if (isset($response['error'])) {
            return $response;
        }

        if ($oldUnion->isEmpty()) {
            $union = new UserProductFavoriteUnion();
            $union->setTargetObject($user);
            $union->setMappedObject($product);
            $union->setAddedAt(new \DateTime());
            $em->persist($union);
        } else {
            $union = $oldUnion->first();
            $em->remove($union);
        }

        $em->flush();

        if ($action === 'add') {
            $response['success'][] = $this->translator->trans('Product added in favorites', array(), 'frontend');
        } else {
            $response['success'][] = $this->translator->trans('Product removed from favorites', array(), 'frontend');
        }

        return $response;
    }

    /**
     * Очистка истории просмотренных товаров у пользователя
     */
    public function productsHistoryClear($request)
    {
        if ('POST' !== $request->getMethod()) {
            throw new NotFoundHttpException('Method must be a POST!');
        }

        $em       = $this->container->get('doctrine')->getManager();
        $response = array();

        $user = $this->container->get('security.context')->getToken()->getUser();

        if (null === $user || 'anon.' === $user || !is_object($user)) {
            $response['error'][] = $this->translator->trans('User not found', array(), 'frontend');
        }

        // Делаем предвыборку избранных продуктов
        $favoriteProducts = $em->getRepository('CoreProductBundle:CommonProduct')->getUserProducts($user, null, 'history');

        foreach ($user->getHistoryProducts() as $union) {
            $em->remove($union);
        }

        $em->flush();

        $response['success'][] = $this->translator->trans('History cleared', array(), 'frontend');

        return $response;
    }

    /**
     * Генерация хлебных крошек
     *
     * @param object $product
     * @return array
     */
    public function getBreadcrumbs($productOrCategory)
    {
        $breadcrumbs = array(
            array(
                'caption' => 'OliKids',
                'href' => $this->router->generate('core_common_index'),
        ));


        if ($productOrCategory instanceof \Core\ProductBundle\Entity\CommonProduct) {

            $product      = $productOrCategory;
            $category     = $product->getCategoryMain();
            $HTTP_REFERER = parse_url($this->request->server->get('HTTP_REFERER'));

            if (preg_match('/\/vendors\/(.+)\.html/', $HTTP_REFERER['path'], $matches)) {
                $slug  = $matches[1];
                $brand = $product->getBrand();
                if ($brand) {
                    $breadcrumbs[] = array(
                        'caption' => $brand->{'getCaption'.ucfirst($this->locale)}(),
                        'href' => $this->router->generate('core_shop_product_brand_first_page', array('slug' => $brand->getSlug())),
                    );
                }
            } elseif (preg_match('/\/catalog\/(.+)\.html/', $HTTP_REFERER['path'], $matches)) {
                $slug = $matches[1];
                if (false === $product->getCategories()->isInitialized()) {
                    $product->getCategories()->initialize();
                }
                foreach ($product->getCategories() as $category) {
                    if ($category->getSlug() === $slug) {
                        break;
                    }
                }
            }
        } else {
            $category = $productOrCategory;
        }

        if ($category->getParent() && $category->getLvl() > 1) {
            $repo = $this->container->get('doctrine')->getManager()->getRepository('CoreCategoryBundle:ProductCategory');
            $repo->getSimplePath($category);
        }

        $breadcrumbs = array_merge($breadcrumbs, array_reverse($this->_getBreadcrumbs($category)));

        return $breadcrumbs;
    }

    private function _getBreadcrumbs($category)
    {
        $breadcrumbs = array();

        if (null !== $category->getParent()) {
            $breadcrumbs[] = array(
                'caption' => $category->{'getCaption'.ucfirst($this->locale)}(),
                'href' => $this->router->generate('core_shop_product_catalog_first_page', array('slug' => $category->getSlug())),
            );
            $breadcrumbs   = array_merge($breadcrumbs, $this->_getBreadcrumbs($category->getParent()));
        }

        return $breadcrumbs;
    }

    /**
     * Добавление/Удаление товара в/из корзины
     *
     * @param Request $request
     * @return array
     */
    public function updateCart($request = null)
    {
        $em       = $this->container->get('doctrine')->getManager();
        $response = array();
        $action   = '';
        if (null !== $request) {
            $id     = (int) $request->request->get('id');
            $action = $request->request->get('action');

            if (!$action && !$request->request->get('contragentId')) {
                throw new NotFoundHttpException('Action is not defined!');
            }

            $quantity = null !== $request->request->get('quantity') ? $request->request->get('quantity') : 1;

            $product = $em->getRepository('CoreProductBundle:CommonProduct')->find($id);

            if (null === $product || ($product->getAvailabilityQuantity() == 0 && $action !== 'remove')) {
                $response['error'][] = $this->translator->trans('Cannot find product', array(), 'frontend');
                return $response;
            }
        }
        if (!$this->session->has('core_order')) {
            $this->session->set('core_order', array());
        }

        $sessionOrder = $this->session->get('core_order');

        // Добавляем/удаляем/меняем кол-во товара в корзине
        switch ($action) {
            case 'add':
                if (isset($sessionOrder['products'][$id])) {
                    // Проверяем на возможное кол-во для добавления в корзину
                    if ($product->getAvailabilityQuantity() < $sessionOrder['products'][$id]['quantity'] + $quantity) {
                        $response['error'][] = $this->translator->trans('Quantity can not be greater than the maximum available from stock (%quantity% pcs.)',
                            array('%quantity%' => $product->getAvailabilityQuantity()), 'frontend');
                    } else {
                        $sessionOrder['products'][$id]['quantity'] += $quantity;
                    }
                } else {
                    $sessionOrder['products'][$id]['id']       = $id;
                    $sessionOrder['products'][$id]['quantity'] = $quantity;
                }

                $response['success'][] = $this->translator->trans('Product add in cart', array('%URL%' => $this->router->generate('core_order_cart')), 'frontend');

                break;
            case 'remove':
                unset($sessionOrder['products'][$id]);
                $response['success'][] = $this->translator->trans('Product remove from cart', array(), 'frontend');
                break;
            case 'setQuantity':
                if (isset($sessionOrder['products'][$id])) {

                    if ($product->getAvailabilityQuantity() < $quantity) {
                        $response['error'][] = $this->translator->trans('Quantity can not be greater than the maximum available from stock (%quantity% pcs.)',
                            array('%quantity%' => $product->getAvailabilityQuantity()), 'frontend');
                    } else if ($quantity <= 0) {
                        $response['error'][] = $this->translator->trans('Quantity cannot be less or equal to 0', array(), 'frontend');
                    } else {
                        $sessionOrder['products'][$id]['quantity'] = $quantity;
                    }
                    $response['success'][] = $this->translator->trans('Number of products changed', array(), 'frontend');
                }
                break;
            default:
                throw new NotFoundHttpException('Unknown action!');
                break;
        }

        if (isset($response['error'])) {
            return $response;
        }

        $this->session->set('core_order', $sessionOrder);

        // Пересчитываем данные о заказе
        $data             = $this->container->get('core_order_logic')->getFullOrderInfo();
        $response['data'] = $data['orderCostInfo'];

        $response['data']['confines'] = $this->container->get('core_order_logic')->checkMinSumForOrder(['order' => $data['order']]);

        $sessionOrder['total_quantity'] = $response['data']['total_quantity'] ? $response['data']['total_quantity'] : 0;
        $sessionOrder['total_cost']     = $response['data']['total_cost'] ? $response['data']['total_cost'] : 0;

        $this->session->set('core_order', $sessionOrder);

        return $response;
    }

    /**
     * Получение данных для вывода страницы каталога по бренду или категории
     *
     * @param string $type
     * @param string $slug
     * @param int $page
     * @return type
     */
    public function getDataForPage($type, $slug, $page, $opt = [])
    {
        $em           = $this->container->get('doctrine')->getManager();
        $activeChilds = array();
        if ($type === 'brand') {
            $options = array(
                'brand' => array(
                    'slug' => $slug,
                ),
                'showElements' => array('price', 'categories'),
            );

            if (isset($opt['slugSeries'])) {
                $series = $em->getRepository('CoreManufacturerBundle:Series')->findOneBySlug($opt['slugSeries']);
                if (null === $series) {
                    throw new NotFoundHttpException('Series not found!'."\n".'slug: '.$opt['slugSeries']);
                }

                $options['series'] = $series;
            }

            $data = $this->container->get('core_property_filter_logic')->getFilterBuilderByBrand($options);
        } else {

            //$category = $em->getRepository('CoreCategoryBundle:ProductCategory')->findOneBySlug($slug);
            $category = $em->getRepository('CoreCategoryBundle:ProductCategory')->findOnePartialBySlug($slug);
            if (!$category) {
                throw new NotFoundHttpException('Category not found!');
            }
            //$childrens     = $em->getRepository('CoreCategoryBundle:ProductCategory')->getChildren($category);
            $childrens     = $em->getRepository('CoreCategoryBundle:ProductCategory')->findChildernsForCategoryPage($category);
            $categoriesIds = array();
            foreach ($childrens as $child) {
                if ($child->getIsEnabled()) {
                    $categoriesIds[] = $child->getId();
                }
                if ($child->getIsEnabled() && $child->getLvl() == 2) {
                    $activeChilds[] = $child;
                }
            }
            $categoriesIds[] = $category->getId();

            $options = array(
                'category' => array(
                    'slug' => $slug,
                ),
                'ids' => $categoriesIds,
                'showElements' => array('price', 'brands'),
            );

            $data = $this->container->get('core_property_filter_logic')->getFilterBuilderByCategory($options);
        }

        $filterRequest = $this->request->query->get('filter');
        if ($type === 'brand') {
            $filterRequest['brands'][] = $data['brand']->getId();
            if (isset($options['series'])) {
                $filterRequest['series'][] = $options['series']->getId();
            }
        } else {

            if (($result = $this->_checkOnDisabledCategory($data['category']))) {
                throw new NotFoundHttpException($result['error']);
            }

            $filterRequest['categories'] = $categoriesIds;
        }
        $filterRequest['sort']   = $this->request->query->get('sort');
        $filterRequest['show']   = $this->request->query->get('show');
        $filterRequest['locale'] = $this->request->getLocale();
        list($show, $default, $limit) = $this->getTheRightCountForDisplay();

        $queryBuilder = $em->getRepository('CoreProductBundle:CommonProduct')->generateQueryBuilderByFilter($filterRequest);
        $products     = $this->container->get('application_knp_paginator_logic')->paginate($queryBuilder, $page, $show);
        $products->setUsedRoute($type === 'brand' ? ('core_shop_product_brand'.(isset($opt['slugSeries']) && $opt['slugSeries'] ? '_series' : '')) : 'core_shop_product_catalog');

        $user                = $this->container->get('security.context')->getToken()->getUser();
        $favoriteProductsIds = $em->getRepository('CoreProductBundle:CommonProduct')->getFavoriteProductsIds($user);

        return array(
            'filterBuilder' => $data['filterBuilder'],
            'filterRequest' => $filterRequest,
            'filterRoute' => $type === 'brand' ? 'core_shop_product_brand'.(isset($opt['slugSeries']) && $opt['slugSeries'] ? '_series' : '').'_first_page' : 'core_shop_product_catalog_first_page',
            'showLimit' => $limit,
            'products' => $products,
            'hide_category_link' => $type === 'brand' ? false : true,
            'favoriteProductsIds' => $favoriteProductsIds,
            'breadcrumbs' => $type === 'category' ? $this->getBreadcrumbs($category) : [],
            $type => $type === 'category' ? $category : $data[$type],
            'activeChilds' => $activeChilds,
            'series' => $type === 'brand' ? $em->getRepository('CoreManufacturerBundle:Series')->findSeriesWithProduct($data[$type]) : [],
//            'fullInfoAboutQuantity' => $this->getFullInfoAboutQuantity($products),
        );
    }

    /**
     * Проверка на активность родительских категорий
     *
     * @param object $category
     * @return boolean
     * @throws NotFoundHttpException
     */
    private function _checkOnDisabledCategory($category)
    {
        $error = false;
        if (true !== $category->getIsEnabled()) {
            $error = 'Category (ID: '.$category->getId().') is disabled!';
        } else {
            if (null !== $category->getParent()) {

                $category = $category->getParent();

                if (true === $category->getIsEnabled()) {
                    if (($result = $this->_checkOnDisabledCategory($category))) {
                        return $result;
                    }
                } else {
                    $error = 'One of the parents category (ID: '.$category->getId().') is disabled!';
                }
            }
        }

        return false === $error ? false : [
            'error' => $error,
            'category' => $category,
        ];
    }

    /**
     * Страницы продукта
     *
     * @param string $slug
     */
    public function productPage($slug)
    {
        $em       = $this->container->get('doctrine')->getManager();
        $repo     = $em->getRepository('CoreProductBundle:CommonProduct');
        list($product, $dirtyInfo) = $repo->findProductInDetail($slug);
        $modsData = $this->getModsData($product->getId(), $dirtyInfo);

        //$deliveryArticle = $em->getRepository('CoreFaqBundle:Article')->findWithCategory('delivery-types');
        $deliveryArticle = $this->container->get('core_common_fragments')->getArticle('delivery-types');
        // доставка если опеределен город пользователя
        $session         = $this->container->get('session');
        if ($session->get('userCityId')) {
            $userCity          = $em->getRepository('CoreDirectoryBundle:City')->find((int) $session->get('userCityId'));
            $deliveryCompanies = $em->getRepository('CoreDeliveryBundle:Company')->findForProductPage();
            $isSelfPickUp      = $em->getRepository('CoreDeliveryBundle:ServiceWithAddress')->findSelfPickUp($userCity->getId());
        }

        $alternative         = $em->getRepository('CoreUnionBundle:ProductAlternativeUnion')->getAlternativeProducts($product);
        $quantityAlternative = $em->getRepository('CoreUnionBundle:ProductQuantityAlternativeUnion')->getQuantityAlternativeProducts($product);
        $similars            = $em->getRepository('CoreUnionBundle:ProductSimilarsUnion')->getSimilarsProducts($product);
        $accessories         = $em->getRepository('CoreUnionBundle:ProductAccessoriesUnion')->getAccessoriesProducts($product);

        $breadcrumbs = $this->getBreadcrumbs($product);

        if (($result = $this->_checkOnDisabledCategory($product->getCategoryMain()))) {
            throw new NotFoundHttpException($result['error']);
        }

        list($extraProperties, $restProperties) = $this->getExtraAndRestProperties($product);

        $recentlyViewed  = $this->getAndSetRecentlyViewed($product);
        $this->addProductInUserHistory($product);
        $securityContext = $this->container->get('security.context');

        if ($securityContext->getToken() && is_object($securityContext->getToken()->getUser())) {
            $user = $this->container->get('security.context')->getToken()->getUser();
        } else {
            $user = null;
        }

        $favoriteProductsIds = $repo->getFavoriteProductsIds($user);

        $seriesDirty = $repo->findFromSerires($product, ['limit' => 27, 'countQuantity' => true]);
        $series      = [];
        foreach ($seriesDirty as $val) {
            $series[] = $val[0];
        }

        if ($product->getorderOnly() && !$product->getOOPBQuantity()) {
            $preOrderLogic    = $this->container->get('core_pre_order_logic');
            $preOrderFormData = $preOrderLogic->getPreOrderFormDefaultData($em, $user, $product);
            $preOrderForm     = $this->container->get('form.factory')
                ->create(new FrontendPreOrderFormType(), $preOrderFormData['data'], $preOrderFormData['options']);
            if ($this->session->get('current_contragent_namespace') && strpos($this->session->get('current_contragent_namespace'), 'LegalContragent')) {
                $isRenderPreOrderForm = false;
            } else {
                $isRenderPreOrderForm = true;
            }
        }
        $preOrderFormView = (isset($isRenderPreOrderForm) && $isRenderPreOrderForm) ? $preOrderForm->createView() : null;

        if ($user) {
            $reviewsAll = $em->getRepository('CoreReviewBundle:Review')->findByProductAndUser($product, $user, $this->container->get('request')->cookies->get('reviews_sort'));
            $reviewForm = $this->container->get('form.factory')->create(new ReviewType(), new Review(),
                    array(
                    'em' => $em,
                    'product' => $product,
                    'user' => $user
                ))->createView();
        } else {
            $reviewsAll = [];
            $reviewForm = null;
        }

        $reviewsShow               = 3;
        $reviewsTotal              = 0;
        $reviewsMaxCountForShowAll = 9; // если количество отзывов больше то будут грузится постранично
        $reviews                   = array();

        foreach ($reviewsAll as $id => $data) {
            if ($data['object']->getLvl() === 0) {
                $reviewsTotal++;
                $reviews[$id] = $data;
            }
        }
        $reviewsStars = $em->getRepository('CoreReviewBundle:Review')->findByProductWithCountedStars($product);

        $articles = array();
        if ($extraProperties && isset($extraProperties['skills'])) {
            $articleKeys = [];
            foreach ($extraProperties['skills'] as $skill) {
                if ($skill->getArticleKey()) {
                    $articleKeys[$skill->getArticleKey()] = $skill->getArticleKey();
                }
            }
            $searchedArticles = $em->getRepository('CoreFaqBundle:Article')->findBySlug(array_keys($articleKeys));
            foreach ($searchedArticles as $article) {
                $articles[$article->getSlug()] = $article;
            }
        }

        $confines = $this->container->get('core_order_logic')->checkMinSumForOrder(['product' => $product]);

        return array(
            'articles' => $articles,
            'currentProduct' => $product,
            'similars' => $similars,
            'accessories' => $accessories,
            'quantityAlternative' => $quantityAlternative,
            'alternative' => $alternative,
            'properties' => $restProperties,
            'extraProperties' => $extraProperties,
            'modsData' => $modsData,
            'recentlyViewed' => $recentlyViewed,
            'favoriteProductsIds' => $favoriteProductsIds,
            'series' => $series,
            'breadcrumbs' => $breadcrumbs,
            'reviewForm' => $reviewForm,
            'preOrderForm' => $preOrderFormView,
            'reviews' => array_slice($reviews, 0, 3, true),
            'reviewsAll' => $reviewsAll,
            'reviewsTotal' => $reviewsTotal,
            'reviewsShow' => $reviewsShow,
            'reviewsMaxCountForShowAll' => $reviewsMaxCountForShowAll,
            'reviewsStars' => $reviewsStars,
            'userCity' => (isset($userCity) && $userCity) ? $userCity : null,
            'deliveryCompanies' => (isset($deliveryCompanies) && $deliveryCompanies) ? $deliveryCompanies : [],
            'isSelfPickUp' => (isset($isSelfPickUp)) ? $isSelfPickUp : 0,
            'deliveryArticle' => $deliveryArticle,
            'confines' => $confines,
        );
    }

    /**
     * Загружает файл с товарами для последущего импорта
     * @param type $request
     * @return string
     */
    public function uploadPriceFile($request)
    {

        $file  = $request->files->get('productPrice');
        $fname = 'products_'.gmdate('d-m-y_H-i-s').'.csv';

        $path = $this->container->get('kernel')->getRootDir().'/../web/uploads/temp/productPrices';
        if (!file_exists($path)) {
            $fs = new Filesystem();
            $fs->mkdir($path);
            file_put_contents($path.'/.htaccess', 'deny from all');
        }
        $file->move($path, $fname);

        //ставим в мемкеш ключ о том, что  необходимо распарсить файл
        $cache = $this->container->get('beryllium_cache');
        $cache->set('needToParceProductPrices', $path.'/'.$fname, 90);
        $cache->delete('parceProductIsFinished'); //удаляем флаг от предыдущей работы
        $cache->delete('parceProductIsErrors'); //удаляем флаг ошибок, если он есть

        $res = ['res' => 'ok'];
        return $res;
    }

    /**
     * Проверяет статус парсинга файла, содержащего импортируемые товары
     * @return type
     */
    public function uploadPriceFileCheckStatus()
    {
        $cache    = $this->container->get('beryllium_cache');
        $percent  = 0;
        $quantity = 0;
        if ($cache->get('parceProductIsFinished') !== false) {
            $percent  = 100;
            $quantity = $cache->get('parceProductIsFinished');
        } else {
            if ($cache->get('parceProductPricesInProgress') !== false) {
                $percent = $cache->get('parceProductPricesInProgress');
            } else {
                $percent = 0;
            }
        }

        //ищем ошибки
        if ($cache->get('parceProductIsErrors') !== false) {
            $error = $cache->get('parceProductIsErrors');
        } else {
            $error = '';
        }

        return ['percent' => $percent, 'quantity' => $quantity, 'error' => $error];
    }

    /**
     * Cтавим в мемкеш ключ о том, что  необходимо сгенерировать YML-файл
     * @param type $request
     * @return string
     */
    public function ymlGeneratorStart()
    {
        $cache = $this->container->get('beryllium_cache');
        $cache->set('needToGenerateYML', time(), 90);
        $cache->delete('generateYMLIsFinished'); //удаляем флаг от предыдущей работы
        $cache->delete('generateYMLIsErrors'); //удаляем флаг ошибок, если он есть
        $cache->delete('generateYMLInProgress');

        //запускаем крон асинхронно
        echo $this->container->get('core_common_process')
            ->runAppConsole('product:yml');

        $res = ['res' => 'ok'];
        return $res;
    }

    /**
     * Проверяет статус генерирования YML-файла
     * @return type
     */
    public function ymlGeneratorCheckStatus()
    {
        $cache    = $this->container->get('beryllium_cache');
        $percent  = 0;
        $quantity = 0;
        if ($cache->get('generateYMLIsFinished') !== false) {
            $percent  = 100;
            $quantity = $cache->get('generateYMLIsFinished');
        } else {
            if ($cache->get('generateYMLInProgress') !== false) {
                $percent = $cache->get('generateYMLInProgress');
            } else {
                $percent = 0;
            }
        }

        //ищем ошибки
        if ($cache->get('generateYMLIsErrors') !== false) {
            $error = $cache->get('generateYMLIsErrors');
        } else {
            $error = '';
        }

        return ['percent' => $percent, 'quantity' => $quantity, 'error' => $error];
    }

    /**
     * Проверка на отображение товара
     * @return boolean
     */
    public function checkAndSetIsVisiblePre($product)
    {
        $isVivible = true;
        if ($product instanceof CommonProduct) {
            if ((bool) $product->getIsEnabled() === true) {
                $category = $product->getCategoryMain();
                $repo     = $this->container->get('doctrine')->getManager()->getRepository('CoreCategoryBundle:ProductCategory');
                $repo->getPath($category);
                if ($this->_checkOnDisabledCategory($category)) {
                    $isVivible = false;
                }
            } else {
                $isVivible = false;
            }

            if ($isVivible && $product->getIsDiscontinued()) {
                if ($product->getSimilars()->isEmpty()) {
                    $isVivible = false;
                }
            }

            $product->setIsVisible($isVivible);
        }

        return $isVivible;
    }

    /**
     * Проверка на отображение товара
     * @return boolean
     */
    public function checkAndSetIsVisiblePost($product)
    {
        if ($product instanceof CommonProduct) {
            $isVivible = $product->getIsVisible();
            if ($isVivible && $product->getIsDiscontinued()) {
                if ($product->getSimilars()->isEmpty()) {
                    $isVivible = false;
                }
            }

            if (!$isVivible) {
                $product->setIsVisible(false);
                $em = $this->container->get('doctrine')->getManager();

                $query = 'UPDATE core_product_common SET isVisible = "0" WHERE id = "'.$product->getId().'"';
                $em->getConnection()->executeUpdate($query);
            }
        }
    }

    /**
     * Включение или выключенеи отображения товаров при включении или выключении категории
     * @return type
     */
    public function checkAndUpdateIsVisibleStatus($category)
    {
        if ($category instanceof ProductCategory) {
            $em       = $this->container->get('doctrine')->getManager();
            $repo     = $em->getRepository('CoreCategoryBundle:ProductCategory');
            $disabled = array();
            if (($result   = $this->_checkOnDisabledCategory($category))) {
                // Если есть отключенная родительская категория
                $childrens   = $repo->getChildren($result['category']);
                $childrens[] = $result['category'];
            } else {
                // Если нет закрытой род. категории
                $childrens   = $repo->getChildren($category);
                $childrens[] = $category;

                // Перебираем дочерние категории, в поисках выключеных
                foreach ($childrens as $child) {
                    if (!$child->getIsEnabled() || ($child->getParent() && in_array($child->getParent()->getId(), $disabled))) {
                        $disabled[] = $child->getId();
                    }
                }
            }

            $ids = array();
            foreach ($childrens as $child) {
                if (!in_array($child->getId(), $disabled)) {
                    $ids[] = $child->getId();
                }
            }

            $query              = 'UPDATE core_product_common SET isVisible = '.($result ? 0 : 1).' WHERE isVisible = '.($result ? 1 : 0).' AND categoryMain_id IN ('.implode(',', $ids).')';
            $countOfUpdatedRows = $em->getConnection()->executeUpdate($query);

            return [
                'count' => $countOfUpdatedRows,
                'action' => ($result ? 'off' : 'on'),
            ];
        }
    }

    /**
     * Подписка на товар, когда появится в наличии
     *
     * @return type
     */
    public function subscribeToReport($request)
    {
        if ('POST' !== $request->getMethod()) {
            throw new NotFoundHttpException('Not found!');
        }

        $em       = $this->container->get('doctrine')->getManager();
        $response = array();

        $id    = $request->request->get('productId');
        $email = strtolower($request->request->get('email'));

        $product = $em->getRepository('CoreProductBundle:CommonProduct')->find($id);

        if (null === $product) {
            $response['error'][] = $this->translator->trans('Product not found', array(), 'frontend');
        }

        if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response['error'][] = $this->translator->trans('Bad email', array(), 'frontend');
        }

        if (isset($response['error'])) {
            return $response;
        }

        $isExist = $em->getRepository('CoreProductBundle:Subscribers\ToReport')->findOneBy(['email' => $email,
            'product' => $product]);
        if (null === $isExist) {
            $subscribersToReport = new ToReport();
            $subscribersToReport->setEmail($email);
            $subscribersToReport->setProduct($product);

            $em->persist($subscribersToReport);
            $em->flush($subscribersToReport);
        }
        $response['success'][] = $this->translator->trans('You subscribe to this product', array('%email%' => $email), 'frontend');

        return $response;
    }

    /**
     * Получаем дату и кол-во для товаров со ствтцсом "Ожидается поставки"
     *
     * @return type
     */
    public function getDateAndCountForNearestSupply($request)
    {
        if ('POST' !== $request->getMethod()) {
            throw new NotFoundHttpException('Method must be a POST!');
        }

        $response = array();
        $em       = $this->container->get('doctrine')->getManager();
        $locale   = $request->getLocale();

        $id = $request->request->get('productId');

        $product = $em->getRepository('CoreProductBundle:CommonProduct')->find($id);

        if ($product) {
            $date                = $em->getRepository('CoreLogisticsBundle:Supply')->getFutureSupplyDate($product);
            $month               = ['января', 'февраля', 'марта', 'апреля', 'мая',
                'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
            $response['success'] = $date->format('d').' '.$month[$date->format('n')].' '.$date->format('Y').' ('.$product->getAvailabilityQuantityVirtualReal().' '.$product->getUnitOfMeasure()->{'getShortCaption'.ucfirst($locale)}().')';
        }

        return $response;
    }

    /**
     * Делает запрос на обновление описания продукта для яндексМаркета
     * @param type $product
     */
    public function checkDescriptionChange($product)
    {
        $uow       = $this->container->get('doctrine')->getManager()->getUnitOfWork();
        $changeset = $uow->getEntityChangeSet($product);

        //если проверен
        if ($product->getIsDescriptionSendToYandex() && isset($changeset['descriptionRu'])) {
            //делаем запрос яндексу
            $text_response = $this->container->get('core_yandex_api_logic')->sendOriginalText($product->getDescriptionRu());
            //выводим соответствущее сообщение
            if ($text_response) {
                if ($text_response['result_status'] == 201) {
                    $messageType = 'sonata_flash_success';
                    $message     = 'Оригинальный текст успешно обновлен!';
                } else {
                    $code        = $text_response['result_body']['@attributes']['code'];
                    $messageType = 'sonata_flash_info';
                    if ($code == 'ORIGINALS_TEXT_TOO_SHORT') {
                        $message = 'Оригинальный текст слишком маленький (минимим 500 символов)!';
                    } else {
                        $message = $text_response['result_body']['message'];
                    }
                }
            } else {
                $message     = 'Оригинальные текст не был обновлен! Возможно, что-то с соединением.';
                $messageType = 'sonata_flash_info';
            }

            $this->container->get('session')->getFlashBag()->add(
                $messageType, $message
            );
        }
    }

    /**
     * @todo возможно необходимо будет передавать порядок занный в админском классе
     * Проставляем порядок продуктов
     * @param DatagridInterface $datagrid
     * @return array
     */
    public function setProductsId(DatagridInterface $datagrid = null)
    {
        $sessIds = [];
        if ($datagrid) {
            $datagrid->buildPager();
            $query = $datagrid->getQuery();
            $query->select('DISTINCT '.$query->getRootAlias().'.id');
            $query->setMaxResults(null);
            $query->setFirstResult(null);
            if ($query instanceof ProxyQueryInterface) {
                $query->addOrderBy($query->getSortBy(), $query->getSortOrder());
                $result = $query->getQuery()->getResult();
            }
        } else {
            $em     = $this->container->get('doctrine.orm.entity_manager');
            $result = $em->getRepository('CoreProductBundle:CommonProduct')->findIds();
        }
        if (isset($result)) {
            foreach ($result as $key => $row) {
                $sessIds[$row['id']] = $row['id'];
                unset($row);
                unset($result[$key]);
            }
            unset($result);
            $this->session->set('productAdminOrder', $sessIds);
        }

        return $sessIds;
    }

    /**
     * Получить список id (пред, след, текущий)
     * @param int $id
     * @throws \Exception
     */
    public function getIds($id, $needCurrent = true)
    {
        $needIds = [];
        if ($this->session->get('productAdminOrder')) {
            $ids = $this->session->get('productAdminOrder');
        } else {
            $ids = $this->setProductsId();
        }
        if (!isset($ids[$id])) {
            $ids[$id] = $id;
            $this->session->set('productAdminOrder', $ids);
        }
        $needIds = $this->getPrevNext($ids, $id, $needCurrent);

        return $needIds;
    }

    /**
     * Получить предыдущий следующий элементы плюс текущий
     * @param type $array
     * @param int $key
     * @return array
     */
    protected function getPrevNext(array $array, $key, $needCurrent)
    {
        $keys    = array_keys($array);
        $indices = array_flip($keys);
        $i       = $indices[$key];
        $prev    = ($i > 0) ? $array[$keys[$i - 1]] : null;
        $next    = ($i < count($keys) - 1) ? $array[$keys[$i + 1]] : null;
        if ($needCurrent) {
            return array('prev' => (int) $prev, 'current' => (int) $key, 'next' => (int) $next);
        } else {
            return array('prev' => (int) $prev, 'next' => (int) $next);
        }
    }
}