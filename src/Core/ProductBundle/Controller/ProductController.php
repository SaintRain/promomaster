<?php

/**
 * Контроллер для товаров
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProductController extends Controller
{

    /**
     * Каталог по категории
     *
     * @param string $slug
     * @param int $page
     * @author Sergeev A.M.
     */
    public function categoryAction($slug, $page = 1)
    {
        if ($url = $this->get('core_product_logic')->getRedirectUrlIfPageEqualOne('core_shop_product_catalog_first_page')) {
            return new RedirectResponse($url, 301);
        }

        $data = $this->get('core_product_logic')->getDataForPage('category', $slug, $page);

        return $this->render('CoreProductBundle:Catalog:category.html.twig', $data);
    }

    /**
     * Каталог по бренду
     *
     * @param string $slug
     * @param int $page
     * @author Sergeev A.M.
     */
    public function brandAction($slug, $page = 1)
    {
        if ($url = $this->get('core_product_logic')->getRedirectUrlIfPageEqualOne('core_shop_product_brand_first_page')) {
            return new RedirectResponse($url, 301);
        }

        $data = $this->get('core_product_logic')->getDataForPage('brand', $slug, $page);

        return $this->render('CoreProductBundle:Catalog:brand.html.twig', $data);
    }

    /**
     * Каталог по бренду и серии
     *
     * @param string $slug
     * @param string $slugSeries
     * @param int $page
     * @author Sergeev A.M.
     */
    public function brandAndSeriesAction($slug, $slugSeries, $page = 1)
    {
        if ($url = $this->get('core_product_logic')->getRedirectUrlIfPageEqualOne('core_shop_product_brand_series_first_page')) {
            return new RedirectResponse($url, 301);
        }

        $options = array(
            'slugSeries' => $slugSeries,
        );

        $data = $this->get('core_product_logic')->getDataForPage('brand', $slug, $page, $options);

        return $this->render('CoreProductBundle:Catalog:brand.html.twig', $data);
    }

    /**
     * Страницы продукта
     *
     * @param string $slug
     * @author Sergeev A.M.
     */
    public function productAction($slug)
    {
        $data = $this->get('core_product_logic')->productPage($slug);

        return $this->render('CoreProductBundle:Product:product.html.twig', $data);
    }

}
