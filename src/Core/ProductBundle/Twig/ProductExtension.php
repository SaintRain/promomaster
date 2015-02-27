<?php

/**
 * Twig расширение для вывода цены продукта с учетом скидки
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Twig;

class ProductExtension extends \Twig_Extension {

    private $container;
    private $contragent = null;
    private $discounts = null;
    private $discountsById = array();

    public function __construct($container) {
        $this->container = $container;
    }

    public function getFunctions() {
        return array(
            'computeDiscountForProductAndGetCurrentPrice' => new \Twig_Function_Method($this, 'computeDiscountForProductAndGetCurrentPriceFunction'),
            'filemtime' => new \Twig_Function_Method($this, 'filemtimeFunction')
        );
    }

    public function filemtimeFunction($filename) {

        $filename = $this->container->get('kernel')->getRootDir() . '/../web/' . $filename;
        if (file_exists($filename)) {
            $datetime = date('H:i Y-m-d', filemtime($filename));
        } else {
            $datetime = '';
        }

        return $datetime;
    }


    public function computeDiscountForProductAndGetCurrentPriceFunction($product, $type = null) {
        $contagentId = $this->container->get('session')->get('current_contragent_id');
        if (null !== $contagentId && null === $this->contragent && null === $this->discounts) {
            $this->contragent = $this->container->get('doctrine')->getManager()->getRepository('ApplicationSonataUserBundle:CommonContragent')->findForDiscount($contagentId);
            $this->discounts = $this->container->get('core_discounts_logic')->getDiscounts($this->contragent);
        }

        $id = $product->getId();
        $prices = array(
            'old' => $product->getOldPrice(),
            'current' => $product->getPrice(),
        );

        if (null !== $this->contragent && null !== $this->discounts) {
            if (!isset($this->discountsById[$id])) {
                $this->discountsById[$id] = $this->container->get('core_discounts_logic')->computeDiscountForProduct($this->contragent, $product, $this->discounts);
            }

            if (isset($this->discountsById[$id]['costForOneUnit']) && $this->discountsById[$id]['costForOneUnit'] > 0) {
                if (!($product->getOldPrice() > 0)) {
                    $prices['old'] = $prices['current'];
                }
                $prices['current'] = $this->discountsById[$id]['costForOneUnit'];
            }
        }

        return null === $type ? $prices : $prices[$type];
    }

    public function getName() {
        return 'product_extension';
    }

}
