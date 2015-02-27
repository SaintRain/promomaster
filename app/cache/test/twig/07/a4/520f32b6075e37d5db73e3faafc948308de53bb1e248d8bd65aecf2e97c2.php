<?php

/* CoreProductBundle:Catalog:product_cell.html.twig */
class __TwigTemplate_07a4520f32b6075e37d5db73e3faafc948308de53bb1e248d8bd65aecf2e97c2 extends Twig_Template
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
        echo $this->env->getExtension('fastedit_extension')->fastEditFunction((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")));
        echo " ";
        if (array_key_exists("i", $context)) {
            echo "id=\"i-";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
            echo "\"";
        }
        echo " class=\"product grid_item ";
        if ((array_key_exists("favoriteProductsIds", $context) && twig_in_filter($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "id", array()), (isset($context["favoriteProductsIds"]) ? $context["favoriteProductsIds"] : $this->getContext($context, "favoriteProductsIds"))))) {
            echo "favored";
        }
        if (array_key_exists("productItemContainerClass", $context)) {
            echo " ";
            echo twig_escape_filter($this->env, (isset($context["productItemContainerClass"]) ? $context["productItemContainerClass"] : $this->getContext($context, "productItemContainerClass")), "html", null, true);
        }
        echo "\">

            ";
        // line 14
        $this->displayBlock('cell_product_header', $context, $blocks);
        // line 21
        echo "
            ";
        // line 22
        $this->displayBlock('cell_product_footer', $context, $blocks);
        // line 113
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
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_product", array("slug" => $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "slug", array()))), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
        echo "\">
                    <img class=\"product_img\" src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "images", array()), "preview", ((array_key_exists("imgSize", $context)) ? ((isset($context["imgSize"]) ? $context["imgSize"] : $this->getContext($context, "imgSize"))) : ("222x222_")), true)), "html", null, true);
        echo "\" alt=\"";
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "images", array())) && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "images", array()), 0, array(), "array"), ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))))) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "images", array()), 0, array(), "array"), ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
        }
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
        echo "
                </a>

            ";
    }

    // line 22
    public function block_cell_product_footer($context, array $blocks = array())
    {
        // line 23
        echo "
                ";
        // line 24
        $this->displayBlock('cell_product_category', $context, $blocks);
        // line 45
        echo "
                ";
        // line 46
        $this->displayBlock('cell_product_rating', $context, $blocks);
        // line 58
        echo "
                ";
        // line 59
        $this->displayBlock('cell_product_price', $context, $blocks);
        // line 103
        echo "
                ";
        // line 104
        if ((array_key_exists("favoriteProductsIds", $context) && twig_in_filter($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "id", array()), (isset($context["favoriteProductsIds"]) ? $context["favoriteProductsIds"] : $this->getContext($context, "favoriteProductsIds"))))) {
            // line 105
            echo "
                    <span class=\"favor icon_tgl\" title=\"";
            // line 106
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Remove from favorites", array(), "frontend"), "html", null, true);
            echo "\"
                        data-remove-url=\"";
            // line 107
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_product_update_favorites", array("action" => "remove", "id" => $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "id", array()), "_format" => "json")), "html", null, true);
            echo "\"
                    >&nbsp;</span>

                ";
        }
        // line 111
        echo "
            ";
    }

    // line 24
    public function block_cell_product_category($context, array $blocks = array())
    {
        // line 25
        echo "
                    ";
        // line 26
        $context["productCategory"] = $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "categoryMain", array());
        // line 27
        echo "                    ";
        // line 42
        echo "                    <a class=\"product_cat\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_catalog_first_page", array("slug" => $this->getAttribute((isset($context["productCategory"]) ? $context["productCategory"] : $this->getContext($context, "productCategory")), "slug", array()))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["productCategory"]) ? $context["productCategory"] : $this->getContext($context, "productCategory")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
        echo "</a>

                ";
    }

    // line 46
    public function block_cell_product_rating($context, array $blocks = array())
    {
        // line 47
        echo "
                    ";
        // line 48
        if (($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "reviewsCount", array()) > 0)) {
            // line 49
            echo "
                        <div class=\"product_rating\">
                            ";
            // line 51
            echo $this->env->getExtension('review_extension')->drawStarsByRatingFunction($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "reviewsRating", array()));
            echo "
                            <span class=\"product_rating_count\">";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "reviewsCount", array()), "html", null, true);
            echo "</span>
                        </div>

                    ";
        }
        // line 56
        echo "
                ";
    }

    // line 59
    public function block_cell_product_price($context, array $blocks = array())
    {
        // line 60
        echo "
                    <div class=\"product_price\">

                        ";
        // line 63
        if ($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "old")) {
            // line 64
            echo "
                            <div class=\"product_price old\">";
            // line 65
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "old")), "html", null, true);
            echo " <span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</span></div>

                        ";
        }
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "current")), "html", null, true);
        echo " <span>";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</span>

                        ";
        // line 71
        if ($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "isDiscontinued", array())) {
            // line 72
            echo "
                            <div class=\"avaliability";
            // line 73
            if ((array_key_exists("productItemContainerClass", $context) && ((isset($context["productItemContainerClass"]) ? $context["productItemContainerClass"] : $this->getContext($context, "productItemContainerClass")) == "product_min"))) {
                echo " avaliability_align_left";
            }
            echo "\">СНЯТ С";
            if (((!array_key_exists("productItemContainerClass", $context)) || ((isset($context["productItemContainerClass"]) ? $context["productItemContainerClass"] : $this->getContext($context, "productItemContainerClass")) != "product_min"))) {
                echo " <br>";
            }
            echo "ПРОИЗВОДСТВА</div>

                        ";
        } elseif ($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "orderOnly", array())) {
            // line 76
            echo "
                            <div class=\"avaliability\">Под заказ</div>

                            ";
        } else {
            // line 80
            echo "
                                ";
            // line 81
            if ($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "getAvailabilityQuantityReal", array())) {
                // line 82
                echo "
                                    <div class=\"avaliability";
                // line 83
                if ((array_key_exists("productItemContainerClass", $context) && ((isset($context["productItemContainerClass"]) ? $context["productItemContainerClass"] : $this->getContext($context, "productItemContainerClass")) == "product_min"))) {
                    echo " avaliability_align_left";
                }
                echo "\">ЕСТЬ НА";
                if (((!array_key_exists("productItemContainerClass", $context)) || ((isset($context["productItemContainerClass"]) ? $context["productItemContainerClass"] : $this->getContext($context, "productItemContainerClass")) != "product_min"))) {
                    echo "<br>";
                }
                echo " СКЛАДЕ</div>

                                ";
            } elseif ($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "getAvailabilityQuantityVirtualReal", array())) {
                // line 86
                echo "
                                    <div class=\"avaliability expected report-instock";
                // line 87
                if ((array_key_exists("productItemContainerClass", $context) && ((isset($context["productItemContainerClass"]) ? $context["productItemContainerClass"] : $this->getContext($context, "productItemContainerClass")) == "product_min"))) {
                    echo " avaliability_align_left";
                }
                echo "\" data-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "id", array()), "html", null, true);
                echo "\">
                                        <div class=\"avaliability_expected_link\" title=\"";
                // line 88
                echo "\">
                                            <span class=\"avaliability_expected_link_title\">Ожидается";
                // line 89
                if (((!array_key_exists("productItemContainerClass", $context)) || ((isset($context["productItemContainerClass"]) ? $context["productItemContainerClass"] : $this->getContext($context, "productItemContainerClass")) != "product_min"))) {
                    echo "<br>";
                }
                echo " поставка</span>
                                        </div>
                                    </div>

                                ";
            }
            // line 94
            echo "                        ";
        }
        // line 95
        echo "                        ";
        // line 100
        echo "                    </div>

                ";
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Catalog:product_cell.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  295 => 100,  293 => 95,  290 => 94,  280 => 89,  277 => 88,  269 => 87,  266 => 86,  254 => 83,  251 => 82,  249 => 81,  246 => 80,  240 => 76,  228 => 73,  225 => 72,  223 => 71,  216 => 69,  208 => 65,  205 => 64,  203 => 63,  198 => 60,  195 => 59,  190 => 56,  183 => 52,  179 => 51,  175 => 49,  173 => 48,  170 => 47,  167 => 46,  157 => 42,  155 => 27,  153 => 26,  150 => 25,  147 => 24,  142 => 111,  135 => 107,  131 => 106,  128 => 105,  126 => 104,  123 => 103,  121 => 59,  118 => 58,  116 => 46,  113 => 45,  111 => 24,  108 => 23,  105 => 22,  89 => 17,  83 => 16,  80 => 15,  77 => 14,  69 => 113,  67 => 22,  64 => 21,  62 => 14,  43 => 12,  40 => 11,  37 => 10,  31 => 9,  28 => 8,  25 => 1,);
    }
}
