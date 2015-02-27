<?php

/**
 * Используется для выдачи общих, не сложных фрагментов страниц.
 * Необходим в том случае, когда нужно не просто отрендерить шаблон, но и передать обработанные данные
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use  Core\CacheBundle\Logic\CacheLogic;

class FragmentsController extends Controller
{




    /**
     * Шапка
     */
    public function header2Action($request = null)
    {
        $response = $this->render('CoreCommonBundle:Fragments:header2.html.twig');

        return $response;
    }



    /**
     * Футер
     */
    public function footer2Action($request = null)
    {
        $response = $this->render('CoreCommonBundle:Fragments:footer2.html.twig');

        return $response;
    }













    /**
     * Вывод попоулярных продуктов
     * @return type
     */
    public function popularProductsInDownAction($request = null)
    {
        $products = $this->getDoctrine()->getManager()
            ->getRepository('CoreProductBundle:CommonProduct')
            ->getPopularProductsInDown(6);
        $response = $this->render('CoreCommonBundle:Fragments:popularProductsInDown.html.twig', [
            'products' => $products,
            'request' => $request
        ]);

        return $response;
    }

    /**
     * Вывод брендов внизу
     * @return type
     */
    public function brandsInDownAction($request = null)
    {

        $brands = $this->getDoctrine()->getManager()
            ->getRepository('CoreManufacturerBundle:Brand')
            ->findOnlyWithProducts();

        $response = $this->render('CoreCommonBundle:Fragments:brandsInDown.html.twig', [
            'brands' => $brands,
            'request' => $request
        ]);

        return $response;
    }

    /**
     * Вывод категорий внизу
     * @return type
     */
    public function categoriesInDownAction($request = null)
    {

//        $categories = $this->getDoctrine()->getManager()
//            ->getRepository('CoreCategoryBundle:ProductCategory')
//            ->findBy(array('isEnabled' => true, 'lvl' => 1), array('root' => 'ASC', 'lft' => 'ASC'));

        $categories = $this->get('core_shop_category_logic')->getCategoryTreeToShow();

        $response = $this->render('CoreCommonBundle:Fragments:categoriesInDown.html.twig', [
            'categories' => $categories,
            'request' => $request
        ]);

        return $response;
    }

    /**
     * Генерация header
     *
     * @return Response
     * @author Sergeev A.M.
     */
    public function headerAction($request, $simple = false)
    {
//        $user = $this->get('security.context')->getToken()->getUser();
//        if (is_object($user) && $user->getId()) {
//            $caheTag = 'Fragments:header' . $user->getId();
//        } else {
//            $caheTag = 'Fragments:header';
//        }
//
//        $response = new Response();
//        $cache = $this->container->get('beryllium_cache');
//        if (!$cache->get($caheTag)) {
//
//            $this->get('application_user_logic')->setUpCity();
//            $GET = $request->query->get('form');
//
//            $form = $this->container->get('core_common_fragments')->searchProductForm();
//            // время работы офиса
//            try {
//                $officeWorkTime = $this->get('office_work_time_logic')->getState();
//            } catch (\Exception $e) {
//                $officeWorkTime = null;
//            }
//            //подключаем разные шаблоны
//            if ($simple) {
//                $template = 'CoreCommonBundle:Fragments/simple:header.html.twig';
//                $phones = array();
//            } else {
//                $template = 'CoreCommonBundle:Fragments:header.html.twig';
//                $phones = $this->get('core_config_logic')->get('phones');
//            }
//            $placeholder = isset($GET['q']) && is_string($GET['q']) ? $GET['q'] : 'Поиск игрушек';
//
//            $engine = $this->container->get('templating');
//            $content = $engine->render($template,
//                [
//                    'route' => $request->attributes->get('_route'),
//                    'searchForm' => $form->createView(),
//                    'simple' => $simple,
//                    'placeholder' => preg_replace('/[^0-9a-zA-Zа-яА-Я \-]/u', '', trim($placeholder)),
//                    'phones' => $phones,
//                    'request' => $request,
//                    'officeWorkTime' => $officeWorkTime
//                ]);
//            $cache->set($caheTag, $content, 1);
//        }
//
//        $response->setContent($cache->get($caheTag));
//        return $response;


        $this->get('application_user_logic')->setUpCity();
        $GET = $request->query->get('form');

        $form = $this->container->get('core_common_fragments')->searchProductForm();
        // время работы офиса
        try {
            $officeWorkTime = $this->get('office_work_time_logic')->getState();
        } catch (\Exception $e) {
            $officeWorkTime = null;
        }
        //подключаем разные шаблоны
        if ($simple) {
            $template = 'CoreCommonBundle:Fragments/simple:header.html.twig';
            $phones = array();
        } else {
            $template = 'CoreCommonBundle:Fragments:header.html.twig';
            $phones = $this->get('core_config_logic')->get('phones');
        }
        $placeholder = isset($GET['q']) && is_string($GET['q']) ? $GET['q'] : 'Поиск игрушек';
        $response = $this->render($template, array(
            'route' => $request->attributes->get('_route'),
            'searchForm' => $form->createView(),
            'simple' => $simple,
            'placeholder' => preg_replace('/[^0-9a-zA-Zа-яА-Я \-]/u', '', trim($placeholder)),
            'phones' => $phones,
            'request' => $request,
            'officeWorkTime' => $officeWorkTime
        ));

        //     $response->setMaxAge(0);
        return $response;
    }

    /**
     * Вывод платежных систем в footer'е
     *
     * @return Response
     * @author Sergeev A.M.
     */
    public function PaymentSystemInDownAction($request = null)
    {
        $em = $this->getDoctrine()->getManager();
        $paymentSytems = $em->getRepository('CorePaymentBundle:PaymentSystem\CommonPaymentSystem')->findBy([
            'isEnabled' => true,
            'isInFooter' => true,
        ], ['indexPosition' => 'ASC']);

        $subsystems = array();
        foreach ($paymentSytems as $paymentSytem) {
            if ($paymentSytem->getSystem() === 'Robokassa') {
                $subsystems = $paymentSytem->getSubsystems()->toArray();
            }
        }
        //$article = $em->getRepository('CoreFaqBundle:Article')->findWithCategory('payment-order');
        $article = $this->container->get('core_common_fragments')->getArticle('payment-order');
        $response = $this->render('CoreCommonBundle:Fragments:paymentSystemsInDown.html.twig', array(
            'paymentSytems' => array_merge($paymentSytems, $subsystems),
            'article' => $article,
            'request' => $request
        ));

        return $response;
    }

    /**
     * Генерация меню
     *
     * @return Response
     * @author Sergeev A.M.
     */
    public function menuAction($request)
    {
        $response = new Response();
        $cacheLogic = $this->container->get('core_cache_logic');
        if (!$content = $cacheLogic->get('menuTop', false)) {
            $engine = $this->container->get('templating');
            $data = $this->container->get('core_common_fragments')->menu($request);
            $content = $engine->render('CoreCommonBundle:Fragments:menu.html.twig', $data);

            $cacheLogic->set('menuTop', [CacheLogic::$TAG_CATEGORIES , CacheLogic::$TAG_PROPERTIES],
                $content, CacheLogic::CACHE_TIMEOUT_ONE_DAY, false);
        }
        $response->setContent($content);
        return $response;

//        $data = $this->container->get('core_common_fragments')->menu($request);
//
//        return $this->render('CoreCommonBundle:Fragments:menu.html.twig', $data);
    }

    public function modalWindowAction()
    {
        $csrfToken = $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate');

        $request = $this->container->get('request');
        $session = $request->getSession();

        return $this->render('CoreCommonBundle:Fragments:modal_window.html.twig', array(
            'csrf_token' => $csrfToken
        ));
    }

    /**
     *
     * @return Response
     */
    public function deliveryCompaniesInDownAction($request = null)
    {
        $em = $this->getDoctrine()->getManager();

        $deliveryCompanies = $em
            ->getRepository('CoreDeliveryBundle:Company')
            ->findForFragments();
        //$article = $em->getRepository('CoreFaqBundle:Article')->findWithCategory('delivery-types');
        $article = $this->container->get('core_common_fragments')->getArticle('delivery-types');
        return $this->render('CoreCommonBundle:Fragments:deliveryCompaniesInDown.html.twig', array(
            'deliveryCompanies' => $deliveryCompanies,
            'article' => $article,
            'request' => $request
        ));
    }

    /**
     * Блочок в хедере со статьями
     */
    public function helpArticlesAction($request = null)
    {
        //$em = $this->getDoctrine()->getManager();
        //$data = ['checkout','payment-order','delivery-types'];
        ///$articles = $em->getRepository('CoreFaqBundle:Article')->findBySlug($data);
        $articles = $this->container->get('core_common_fragments')->getArticles();
        return $this->render('CoreCommonBundle:Fragments:helpArticles.html.twig', array(
            'articles' => $articles,
            'request' => $request
        ));
    }

    /**
     * Как стать партнером
     */
    public function howToBecomeAPartnerAction($request = null)
    {
        $em = $this->getDoctrine()->getManager();
        //$data = ['postavshchikam-i-proizvoditieliam'];//'how_to_become_a_partner', 'how-to-become-a-partner',
        //$article = $em->getRepository('CoreFaqBundle:Article')->findOneBySlug($data);
        $article = $this->container->get('core_common_fragments')
            ->getArticle('postavshchikam-i-proizvoditieliam');
        return $this->render('CoreCommonBundle:Fragments:howToBecomeAPartner.html.twig', array(
            'article' => $article,
            'request' => $request
        ));
    }


    /**
     * Футер
     */
    public function footerAction($request = null)
    {
        $response = new Response();
        $cacheLogic = $this->container->get('core_cache_logic');
        if (!$content = $cacheLogic->get('footer', false)) {

            $engine = $this->container->get('templating');
            $content = $engine->render('CoreCommonBundle:Fragments:footer.html.twig');

            $cacheLogic->set('footer',
                [
                    CacheLogic::$TAG_FOOTER,
                    CacheLogic::$TAG_BRANDS,
                    CacheLogic::$TAG_PHONES,
                    CacheLogic::$TAG_PAYMENT_SYSTEM,
                    CacheLogic::$TAG_DELIVERY_SYSTEM,
                    CacheLogic::$TAG_CATEGORIES,
                ],
                $content, CacheLogic::CACHE_TIMEOUT_ONE_DAY, false);
        }
//        $cacheLogic->removeByKey('footer', false);
//        $cacheLogic->removeByKey('menuTop', false);
       // $cacheLogic->removeByTag(CacheLogic::$TAG_CATEGORIES, false);

      //  ldd($cacheLogic->getMap());
        $response->setContent($content);
        return $response;
    }

}
