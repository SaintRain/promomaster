<?php

/**
 * Подписчик для генерации sitemap.xml
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\EventListener;

use Presta\SitemapBundle\Service\SitemapListenerInterface;
use Presta\SitemapBundle\Event\SitemapPopulateEvent;
use Presta\SitemapBundle\Sitemap\Url\UrlConcrete;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Filesystem\Filesystem;

class SitemapListener implements SitemapListenerInterface
{

    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function populateSitemap(SitemapPopulateEvent $event)
    {
        // Удаляем старые файлы
//        $oldFilesSitemap = [
//            'sitemap.shop.categories.xml',
//            'sitemap.shop.brands.xml',
//            'sitemap.shop.products.xml',
//            'sitemap.FAQ.categories.xml',
//            'sitemap.FAQ.articles.xml',
//            'sitemap.pages.xml',
//            'sitemap.xml',
//        ];
//        $fs = new Filesystem;
//        foreach ($oldFilesSitemap as $oldFile) {
//            $fs->remove(__DIR__ . '/../../../../web/' . $oldFile);
//        }

        $router = $this->container->get('router');
        $em = $this->container->get('doctrine')->getManager();
        $baseURL = $this->container->getParameter('presta_sitemap.dumper_base_url');
        $disallow = array();

        // Достаем урлы из robots.txt, которые не надо сыпать в сайтмап
        $isAdd = false;
        if (is_file(__DIR__ . '/../../../../web/robots.txt')) {
            $file = new File(__DIR__ . '/../../../../web/robots.txt');
            $file = $file->openFile('r');
            while (!$file->eof()) {

                if (strpos($file->current(), 'User-agent:') !== false) {
                    $isAdd = (strpos($file->current(), 'User-agent: *') !== false) ? true : false;
                }

                if (strpos($file->current(), 'Disallow:') !== false && $isAdd) {
                    $disallow[] = $baseURL . trim(preg_replace('/Disallow: +/', '', $file->current()));
                }
                $file->next();
            }
        }

//        // Категории продуктов
//        $categories = $this->container->get('core_shop_category_logic')->getCategoryTreeToShow(false);
//        foreach ($categories as $category) {
//            if (($url = $this->_goodURL($router->generate('core_shop_product_catalog_first_page', array('slug' => $category['slug']), true), $disallow))) {
//                $event->getGenerator()->addUrl(
//                        new UrlConcrete(
//                        $url, new \DateTime(), UrlConcrete::CHANGEFREQ_WEEKLY, 0.7
//                        ), 'shop.categories'
//                );
//            }
//        }
//
//        // Бренды
//        $brands = $em->getRepository('CoreManufacturerBundle:Brand')->findForPopulateSitemap();
//        foreach ($brands as $brand) {
//            if (($url = $this->_goodURL($router->generate('core_shop_product_brand_first_page', array('slug' => $brand['slug']), true), $disallow))) {
//                $event->getGenerator()->addUrl(
//                        new UrlConcrete(
//                        $url, new \DateTime(), UrlConcrete::CHANGEFREQ_WEEKLY, 0.7
//                        ), 'shop.brands'
//                );
//            }
//        }
//
//        // Продукты
//        $products = $em->getRepository('CoreProductBundle:CommonProduct')->findForPopulateSitemap();
//        foreach ($products as $product) {
//            if (($url = $this->_goodURL($router->generate('core_product', array('slug' => $product['slug']), true), $disallow))) {
//                $event->getGenerator()->addUrl(
//                        new UrlConcrete(
//                        $url, new \DateTime(), UrlConcrete::CHANGEFREQ_WEEKLY, 1
//                        ), 'shop.products'
//                );
//            }
//        }

        // Категории (FAQ)
        if (($url = $this->_goodURL($router->generate('core_faq_homepage', array(), true), $disallow))) {
            $event->getGenerator()->addUrl(
                    new UrlConcrete(
                    $url, new \DateTime(), UrlConcrete::CHANGEFREQ_MONTHLY, 0.5
                    ), 'FAQ.categories'
            );
        }
        $categories = $em->getRepository('CoreCategoryBundle:FaqCategory')->findForPopulateSitemap();
        foreach ($categories as $category) {
            if (($url = $this->_goodURL($router->generate('core_faq_category', array('categorySlug' => $category['slug']), true), $disallow))) {
                $event->getGenerator()->addUrl(
                        new UrlConcrete(
                        $url, new \DateTime(), UrlConcrete::CHANGEFREQ_MONTHLY, 0.5
                        ), 'FAQ.categories'
                );
            }
        }

        // Статьи (FAQ)
        $articles = $em->getRepository('CoreFaqBundle:Article')->findForPopulateSitemap();
        foreach ($articles as $article) {
            if (($url = $this->_goodURL($router->generate('core_faq_article', array('articleSlug' => $article['articleSlug'], 'categorySlug' => $article['categorySlug']), true), $disallow))) {
                $event->getGenerator()->addUrl(
                        new UrlConcrete(
                        $url, new \DateTime(), UrlConcrete::CHANGEFREQ_MONTHLY, 0.5
                        ), 'FAQ.articles'
                );
            }
        }

        // Главная
        if (($url = $this->_goodURL($router->generate('core_common_index', array(), true), $disallow))) {
            $event->getGenerator()->addUrl(
                    new UrlConcrete(
                    $url, new \DateTime(), UrlConcrete::CHANGEFREQ_WEEKLY, 0.7
                    ), 'pages'
            );
        }
        // Остальные страницы с приоритетом 0.5
        $paths = array(
            'core_common_about',
            'core_common_privacy_policies',
            'trouble_ticket_contact',
        );
        foreach ($paths as $path) {
            if (($url = $this->_goodURL($router->generate($path, array(), true), $disallow))) {
                $event->getGenerator()->addUrl(
                        new UrlConcrete(
                        $url, new \DateTime(), UrlConcrete::CHANGEFREQ_MONTHLY, 0.5
                        ), 'pages'
                );
            }
        }
    }

    private function _goodURL($url, $disallow)
    {
        $isDissallow = false;
        foreach ($disallow as $urlPart) {
            if (strpos($url, $urlPart) !== false) {
                $isDissallow = true;
                break;
            }
        }
        return $isDissallow ? false : $url;
    }

}
