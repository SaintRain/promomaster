<?php

/* CoreProductBundle:Catalog:product_cell.html.twig */
class __TwigTemplate_e98397ea5c4d02490ea8610b56db9d889c5e9061dc563a4c6fd95c5a0cbf9abd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'product' => array($this, 'block_product'),
            'cell_product_header' => array($this, 'block_cell_product_header'),
            'cell_product_footer' => array($this, 'block_cell_product_footer'),
            'cell_product_category' => array($this, 'block_cell_product_category'),
            'cell_product_rating' => array($this, 'block_cell_product_rating'),
            'cell_product_price' => array($this, 'block_cell_product_price'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 8
        echo "
";
        // line 9
        $this->displayBlock('product', $context, $blocks);
    }

    public function block_product($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        ob_start();
        // line 11
        echo "
        <div ";
        // line 12
        echo $this->env->getExtension('fastedit_extension')->fastEditFunction((isset($context["product"]) ? $context["product"] : null));
        echo " ";
        if (array_key_exists("i", $context)) {
            echo "id=\"i-";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "\"";
        }
        echo " class=\"product grid_item ";
        if ((array_key_exists("favoriteProductsIds", $context) && twig_in_filter($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "id", array()), (isset($context["favoriteProductsIds"]) ? $context["favoriteProductsIds"] : null)))) {
            echo "favored";
        }
        if (array_key_exists("productItemContainerClass", $context)) {
            echo " ";
            echo twig_escape_filter($this->env, (isset($context["productItemContainerClass"]) ? $context["productItemContainerClass"] : null), "html", null, true);
        }
        echo "\">

            ";
        // line 14
        $this->displayBlock('cell_product_header', $context, $blocks);
        // line 30
        echo "
            ";
        // line 31
        $this->displayBlock('cell_product_footer', $context, $blocks);
        // line 122
        echo "
    </div>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 14
    public function block_cell_product_header($context, array $blocks = array())
    {
        // line 15
        echo "
                <a class=\"product_name\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_product", array("slug" => $this->getAttribute((isset($context["product"]) ? $context["product"] : null), "slug", array()))), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
        echo "\">
                    ";
        // line 17
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : null), "images", array()))) {
            // line 18
            echo "                        ";
            if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "images", array()), 0, array(), "array"), ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) {
                // line 19
                echo "                            ";
                $context["curImgAlt"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "images", array()), 0, array(), "array"), ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
                // line 20
                echo "                            ";
            } else {
                // line 21
                echo "                                ";
                $context["curImgAlt"] = $this->getAttribute((isset($context["product"]) ? $context["product"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
                // line 22
                echo "                        ";
            }
            // line 23
            echo "                        ";
        } else {
            // line 24
            echo "                             ";
            $context["curImgAlt"] = $this->env->getExtension('translator')->trans("msg.image_not_found", array(), "frontend");
            // line 25
            echo "                    ";
        }
        // line 26
        echo "                    <img class=\"product_img\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "images", array()), "preview", ((array_key_exists("imgSize", $context)) ? ((isset($context["imgSize"]) ? $context["imgSize"] : null)) : ("222x222_")), true)), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, (isset($context["curImgAlt"]) ? $context["curImgAlt"] : null), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, (isset($context["curImgAlt"]) ? $context["curImgAlt"] : null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
        echo "
                </a>

            ";
    }

    // line 31
    public function block_cell_product_footer($context, array $blocks = array())
    {
        // line 32
        echo "
                ";
        // line 33
        $this->displayBlock('cell_product_category', $context, $blocks);
        // line 54
        echo "
                ";
        // line 55
        $this->displayBlock('cell_product_rating', $context, $blocks);
        // line 67
        echo "
                ";
        // line 68
        $this->displayBlock('cell_product_price', $context, $blocks);
        // line 112
        echo "
                ";
        // line 113
        if ((array_key_exists("favoriteProductsIds", $context) && twig_in_filter($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "id", array()), (isset($context["favoriteProductsIds"]) ? $context["favoriteProductsIds"] : null)))) {
            // line 114
            echo "
                    <span class=\"favor icon_tgl\" title=\"";
            // line 115
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Remove from favorites", array(), "frontend"), "html", null, true);
            echo "\"
                        data-remove-url=\"";
            // line 116
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_product_update_favorites", array("action" => "remove", "id" => $this->getAttribute((isset($context["product"]) ? $context["product"] : null), "id", array()), "_format" => "json")), "html", null, true);
            echo "\"
                    >&nbsp;</span>

                ";
        }
        // line 120
        echo "
            ";
    }

    // line 33
    public function block_cell_product_category($context, array $blocks = array())
    {
        // line 34
        echo "
                    ";
        // line 35
        $context["productCategory"] = $this->getAttribute((isset($context["product"]) ? $context["product"] : null), "categoryMain", array());
        // line 36
        echo "                    ";
        // line 51
        echo "                    <a class=\"product_cat\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_catalog_first_page", array("slug" => $this->getAttribute((isset($context["productCategory"]) ? $context["productCategory"] : null), "slug", array()))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["productCategory"]) ? $context["productCategory"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
        echo "</a>

                ";
    }

    // line 55
    public function block_cell_product_rating($context, array $blocks = array())
    {
        // line 56
        echo "
                    ";
        // line 57
        if (($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "reviewsCount", array()) > 0)) {
            // line 58
            echo "
                        <div class=\"product_rating\">
                            ";
            // line 60
            echo $this->env->getExtension('review_extension')->drawStarsByRatingFunction($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "reviewsRating", array()));
            echo "
                            <span class=\"product_rating_count\">";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : null), "reviewsCount", array()), "html", null, true);
            echo "</span>
                        </div>

                    ";
        }
        // line 65
        echo "
                ";
    }

    // line 68
    public function block_cell_product_price($context, array $blocks = array())
    {
        // line 69
        echo "
                    <div class=\"product_price\">

                        ";
        // line 72
        if ($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["product"]) ? $context["product"] : null), "old")) {
            // line 73
            echo "
                            <div class=\"product_price old\">";
            // line 74
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["product"]) ? $context["product"] : null), "old")), "html", null, true);
            echo " <span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</span></div>

                        ";
        }
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["product"]) ? $context["product"] : null), "current")), "html", null, true);
        echo " <span>";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</span>

                        ";
        // line 80
        if ($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "isDiscontinued", array())) {
            // line 81
            echo "
                            <div class=\"avaliability";
            // line 82
            if ((array_key_exists("productItemContainerClass", $context) && ((isset($context["productItemContainerClass"]) ? $context["productItemContainerClass"] : null) == "product_min"))) {
                echo " avaliability_align_left";
            }
            echo "\">СНЯТ С";
            if (( !array_key_exists("productItemContainerClass", $context) || ((isset($context["productItemContainerClass"]) ? $context["productItemContainerClass"] : null) != "product_min"))) {
                echo " <br>";
            }
            echo "ПРОИЗВОДСТВА</div>

                        ";
        } elseif ($this->getAttribute(        // line 84
(isset($context["product"]) ? $context["product"] : null), "orderOnly", array())) {
            // line 85
            echo "
                            <div class=\"avaliability\">Под заказ</div>

                            ";
        } else {
            // line 89
            echo "
                                ";
            // line 90
            if ($this->getAttribute((isset($context["product"]) ? $context["product"] : null), "getAvailabilityQuantityReal", array())) {
                // line 91
                echo "
                                    <div class=\"avaliability";
                // line 92
                if ((array_key_exists("productItemContainerClass", $context) && ((isset($context["productItemContainerClass"]) ? $context["productItemContainerClass"] : null) == "product_min"))) {
                    echo " avaliability_align_left";
                }
                echo "\">ЕСТЬ НА";
                if (( !array_key_exists("productItemContainerClass", $context) || ((isset($context["productItemContainerClass"]) ? $context["productItemContainerClass"] : null) != "product_min"))) {
                    echo "<br>";
                }
                echo " СКЛАДЕ</div>

                                ";
            } elseif ($this->getAttribute(            // line 94
(isset($context["product"]) ? $context["product"] : null), "getAvailabilityQuantityVirtualReal", array())) {
                // line 95
                echo "
                                    <div class=\"avaliability expected report-instock";
                // line 96
                if ((array_key_exists("productItemContainerClass", $context) && ((isset($context["productItemContainerClass"]) ? $context["productItemContainerClass"] : null) == "product_min"))) {
                    echo " avaliability_align_left";
                }
                echo "\" data-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : null), "id", array()), "html", null, true);
                echo "\">
                                        <div class=\"avaliability_expected_link\" title=\"";
                // line 97
                echo "\">
                                            <span class=\"avaliability_expected_link_title\">Ожидается";
                // line 98
                if (( !array_key_exists("productItemContainerClass", $context) || ((isset($context["productItemContainerClass"]) ? $context["productItemContainerClass"] : null) != "product_min"))) {
                    echo "<br>";
                }
                echo " поставка</span>
                                        </div>
                                    </div>

                                ";
            }
            // line 103
            echo "                        ";
        }
        // line 104
        echo "                        ";
        // line 109
        echo "                    </div>

                ";
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Catalog:product_cell.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  322 => 109,  320 => 104,  317 => 103,  307 => 98,  304 => 97,  296 => 96,  293 => 95,  291 => 94,  280 => 92,  277 => 91,  275 => 90,  272 => 89,  266 => 85,  264 => 84,  253 => 82,  250 => 81,  248 => 80,  241 => 78,  233 => 74,  230 => 73,  228 => 72,  223 => 69,  220 => 68,  215 => 65,  208 => 61,  204 => 60,  200 => 58,  198 => 57,  195 => 56,  192 => 55,  182 => 51,  180 => 36,  178 => 35,  175 => 34,  172 => 33,  167 => 120,  160 => 116,  156 => 115,  153 => 114,  151 => 113,  148 => 112,  146 => 68,  143 => 67,  141 => 55,  138 => 54,  136 => 33,  133 => 32,  130 => 31,  115 => 26,  112 => 25,  109 => 24,  106 => 23,  103 => 22,  100 => 21,  97 => 20,  94 => 19,  91 => 18,  89 => 17,  83 => 16,  80 => 15,  77 => 14,  69 => 122,  67 => 31,  64 => 30,  62 => 14,  43 => 12,  40 => 11,  37 => 10,  31 => 9,  28 => 8,  25 => 1,);
    }
}
