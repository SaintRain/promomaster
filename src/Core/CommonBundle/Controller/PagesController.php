<?php

/**
 * Выдача простых текстовых страниц...
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class PagesController extends Controller
{

    public function indexAction()
    {
        return $this->render('CoreCommonBundle:Pages:index2.html.twig');
    }



//    /**
//     * 404 ошибка, метод используется для внутреннего перенаправления
//     * @return type
//     */
//    public function error404Action(Request $request)
//    {
//        $res = $this->render('CoreCommonBundle:Pages:error404.html.twig', ['request'=>$request]);
//    }
//
//    /**
//     * 504 ошибка, метод используется для внутреннего перенаправления
//     * @return type
//     */
//    public function error504Action()
//    {
//        return $this->render('CoreCommonBundle:Pages:error504.html.twig');
//    }
//
//    /**
//     * О магазине
//     * @return type
//     */
//    public function aboutAction()
//    {
//        $em = $this->getDoctrine()->getManager();
//        $about = $em->getRepository('CoreFaqBundle:Article')->findOneBySlug('about');
//
//        return $this->render('CoreCommonBundle:Pages:about.html.twig', array(
//            'article' => $about,
//        ));
//    }
//
//    /**
//     * Политика конфиденциальности
//     * @return type
//     */
//    public function privacyPoliciesAction()
//    {
//        return $this->render('CoreCommonBundle:Pages:privacyPolicies.html.twig');
//    }
//
//    /**
//     * Поиск продукции
//     *
//     * @return type
//     * @author Sergeev A.M.
//     */
//    public function searchAction(Request $request, $page = 1)
//    {
//        if ($request->get('page') === '1' && $request->attributes->get('_route') !== 'core_common_search_first_page') {
//            $parameters = array_merge($request->attributes->get('_route_params'), $request->query->all(), array('page' => null));
//            return new RedirectResponse($this->get('router')->generate('core_common_search_first_page', $parameters), 301);
//        }
//
//        $em = $this->getDoctrine()->getManager();
//
//        $filterRequest = $request->query->get('filter');
//        $form = $request->query->get('form');
//        list($show, $default, $limit) = $this->get('core_product_logic')->getTheRightCountForDisplay();
//
//        if (!$form) {
//            $data = $this->get('core_property_filter_logic')->getFilterBuilderWithOwl();
//            $filterRequest['sort'] = $request->query->get('sort');
//            $filterRequest['show'] = $request->query->get('show');
//            $filterRequest['locale'] = $request->getLocale();
//            if (isset($filterRequest['categories']) && $filterRequest['categories']) {
//                $filterRequest['categories'] = $this->container->get('core_shop_category_logic')->getChildrenIds($filterRequest['categories'], $data['categories']);
//            }
//
//            $queryBuilder = $em->getRepository('CoreProductBundle:CommonProduct')->generateQueryBuilderByFilter($filterRequest);
//            $products = $this->container->get('application_knp_paginator_logic')->paginate($queryBuilder, $page, $show);
//        } else {
//            $form['q'] = preg_replace('/[^0-9a-zA-Zа-яА-Я \-]/u', '', trim($form['q']));
//
//            if (mb_strlen($form['q'],'UTF-8') > 2) {
//                $request = new Request();
//                $request->initialize(array(
//                    'class' => 'Core\ProductBundle\Entity\CommonProduct',
//                    'query' => $form['q'],
//                    'getPaginate' => true,
//                    'page' => $page,
//                    'max_results' => $show,
//                    'properties' => json_encode(array(
//                        'id' => array(
//                            'search' => true,
//                            'return' => true,
//                            'entry' => 'full',
//                        ),
//                        'sku' => array(
//                            'search' => true,
//                            'return' => true,
//                            'entry' => 'left',
//                        ),
//                        'article' => array(
//                            'search' => true,
//                            'return' => true,
//                            'entry' => 'left',
//                        ),
//                        'captionRu' => array(
//                            'search' => true,
//                            'return' => true,
//                        ),
//                        'images' => array(
//                            'search' => false,
//                            'return' => true,
//                        ),
//                        'price' => array(
//                            'search' => false,
//                            'return' => true,
//                        ),
//                        'slug' => array(
//                            'search' => true,
//                            'return' => true,
//                        ))),
//                    'add_to_query' => json_encode(array( // дополнение к запросу на выборку данных
//                        'where' => array(
//                            'andWhere' => array(
//                                'isEnabled = 1',
//                                'isVisible = 1',
//                            ),
//                        )
//                    )),
//                ));
//
//                $request->query->add(['join' => 'manufacturers']);
//
//                $products = $this->get('core_common_ajax_entity_logic')->getData($request);
//            } else {
//                $products = [];
//            }
//        }
//
//        if ($products) {
//            $products->setUsedRoute('core_common_search');
//        }
//
//        return $this->render('CoreCommonBundle:Pages:search.html.twig', array(
//            'query' => $form['q'],
//            'products' => $products,
//            'filterRequest' => $filterRequest,
//            'filterBuilder' => isset($data['filterBuilder']) ? $data['filterBuilder'] : false,
//            'filterWithOwl' => true,
//            'filterRoute' => 'core_common_search_first_page',
//            'showLimit' => $limit,
//        ));
//    }
//
//    public function receiverAction()
//    {
//        return $this->render('CoreCommonBundle:Pages:receiver.html.twig', array());
//    }
//
//    public function testAction()
//    {
//        throw $this->createNotFoundException();
////        $logic = $this->get('office_work_time_logic');
////        $result = $logic->getState();
////        ldd($result);
//        $this->execute();
//        return $this->render('CoreCommonBundle:Pages:test.html.twig', array(
//            'one' => 'one'
//        ));
//    }
//
//    /**
//     * Выполняемая команда
//     */
//    protected function execute()
//    {
//        $em = $this->get('doctrine.orm.entity_manager');
//        //$em->getConnection()->getConfiguration()->setSQLLogger(null);
////        $em->getConnection()->beginTransaction();
////        try {
//
//            $products = $em->getRepository('CoreProductBundle:CommonProduct')->UpdateProd();
//            $em->clear();
//            //var_dump(count($products));
//            //die();
//            //ldd(count($products));
//            foreach ($products as $p) {
//                $em->clear('Core\CategoryBundle\Entity\ProductCategory');
//                $p = $em->merge($p);
//
//                $time_start = microtime(true);
//                if ($p->getOOPBCurrency() && $p->getOOPBCurrency()->getCurrency()=='RUB') {
//                    $p->setOOPBCurrencyRateAdditive(0);
//                }
//                $p->setOrderOnlyShopTax(10);
//                $p->setOrderOnlyShopTaxInPercent(true);
//                $p->updatePrice();
//               //ld($p->getId());
////                ld($p->getPrice());
//
//                //$em->persist($p);
//                $em->flush();
//                $em->clear();
//                $execution_time = (microtime(true) - $time_start);
//                echo 'Diff ' . $execution_time . "\n\r";
//                //ld($p->getId());
//                //ldd($p->getOrderOnlyShopTax());
//            }
//           //$em->flush();
//
//
////            $em->getConnection()->commit();
////        } catch (Exception $e) {
////            $em->getConnection()->rollback();
////            $em->close();
////
////            throw $e;
////        }
//        return true;
//    }
}
