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
        // line 26
        echo "
            ";
        // line 27
        $this->displayBlock('cell_product_footer', $context, $blocks);
        // line 118
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
                    ";
        // line 17
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "images", array())) && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "images", array()), 0, array(), "array"), ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))))) {
            // line 18
            echo "                        ";
            $context["curImgAlt"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "images", array()), 0, array(), "array"), ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
            // line 19
            echo "                        ";
        } else {
            // line 20
            echo "                            ";
            $context["curImgAlt"] = $this->env->getExtension('translator')->trans("msg.image_not_found", array(), "frontend");
            // line 21
            echo "                    ";
        }
        // line 22
        echo "                    <img class=\"product_img\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "images", array()), "preview", ((array_key_exists("imgSize", $context)) ? ((isset($context["imgSize"]) ? $context["imgSize"] : $this->getContext($context, "imgSize"))) : ("222x222_")), true)), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, (isset($context["curImgAlt"]) ? $context["curImgAlt"] : $this->getContext($context, "curImgAlt")), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, (isset($context["curImgAlt"]) ? $context["curImgAlt"] : $this->getContext($context, "curImgAlt")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
        echo "
                </a>

            ";
    }

    // line 27
    public function block_cell_product_footer($context, array $blocks = array())
    {
        // line 28
        echo "
                ";
        // line 29
        $this->displayBlock('cell_product_category', $context, $blocks);
        // line 50
        echo "
                ";
        // line 51
        $this->displayBlock('cell_product_rating', $context, $blocks);
        // line 63
        echo "
                ";
        // line 64
        $this->displayBlock('cell_product_price', $context, $blocks);
        // line 108
        echo "
                ";
        // line 109
        if ((array_key_exists("favoriteProductsIds", $context) && twig_in_filter($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "id", array()), (isset($context["favoriteProductsIds"]) ? $context["favoriteProductsIds"] : $this->getContext($context, "favoriteProductsIds"))))) {
            // line 110
            echo "
                    <span class=\"favor icon_tgl\" title=\"";
            // line 111
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Remove from favorites", array(), "frontend"), "html", null, true);
            echo "\"
                        data-remove-url=\"";
            // line 112
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_product_update_favorites", array("action" => "remove", "id" => $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "id", array()), "_format" => "json")), "html", null, true);
            echo "\"
                    >&nbsp;</span>

                ";
        }
        // line 116
        echo "
            ";
    }

    // line 29
    public function block_cell_product_category($context, array $blocks = array())
    {
        // line 30
        echo "
                    ";
        // line 31
        $context["productCategory"] = $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "categoryMain", array());
        // line 32
        echo "                    ";
        // line 47
        echo "                    <a class=\"product_cat\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_catalog_first_page", array("slug" => $this->getAttribute((isset($context["productCategory"]) ? $context["productCategory"] : $this->getContext($context, "productCategory")), "slug", array()))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["productCategory"]) ? $context["productCategory"] : $this->getContext($context, "productCategory")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
        echo "</a>

                ";
    }

    // line 51
    public function block_cell_product_rating($context, array $blocks = array())
    {
        // line 52
        echo "
                    ";
        // line 53
        if (($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "reviewsCount", array()) > 0)) {
            // line 54
            echo "
                        <div class=\"product_rating\">
                            ";
            // line 56
            echo $this->env->getExtension('review_extension')->drawStarsByRatingFunction($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "reviewsRating", array()));
            echo "
                            <span class=\"product_rating_count\">";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "reviewsCount", array()), "html", null, true);
            echo "</span>
                        </div>

                    ";
        }
        // line 61
        echo "
                ";
    }

    // line 64
    public function block_cell_product_price($context, array $blocks = array())
    {
        // line 65
        echo "
                    <div class=\"product_price\">

                        ";
        // line 68
        if ($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "old")) {
            // line 69
            echo "
                            <div class=\"product_price old\">";
            // line 70
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "old")), "html", null, true);
            echo " <span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</span></div>

                        ";
        }
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "current")), "html", null, true);
        echo " <span>";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</span>

                        ";
        // line 76
        if ($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "isDiscontinued", array())) {
            // line 77
            echo "
                            <div class=\"avaliability";
            // line 78
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
            // line 81
            echo "
                            <div class=\"avaliability\">Под заказ</div>

                            ";
        } else {
            // line 85
            echo "
                                ";
            // line 86
            if ($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "getAvailabilityQuantityReal", array())) {
                // line 87
                echo "
                                    <div class=\"avaliability";
                // line 88
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
                // line 91
                echo "
                                    <div class=\"avaliability expected report-instock";
                // line 92
                if ((array_key_exists("productItemContainerClass", $context) && ((isset($context["productItemContainerClass"]) ? $context["productItemContainerClass"] : $this->getContext($context, "productItemContainerClass")) == "product_min"))) {
                    echo " avaliability_align_left";
                }
                echo "\" data-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "id", array()), "html", null, true);
                echo "\">
                                        <div class=\"avaliability_expected_link\" title=\"";
                // line 93
                echo "\">
                                            <span class=\"avaliability_expected_link_title\">Ожидается";
                // line 94
                if (((!array_key_exists("productItemContainerClass", $context)) || ((isset($context["productItemContainerClass"]) ? $context["productItemContainerClass"] : $this->getContext($context, "productItemContainerClass")) != "product_min"))) {
                    echo "<br>";
                }
                echo " поставка</span>
                                        </div>
                                    </div>

                                ";
            }
            // line 99
            echo "                        ";
        }
        // line 100
        echo "                        ";
        // line 105
        echo "                    </div>

                ";
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Catalog:product_cell.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  308 => 105,  306 => 100,  303 => 99,  293 => 94,  290 => 93,  282 => 92,  279 => 91,  267 => 88,  264 => 87,  262 => 86,  259 => 85,  253 => 81,  241 => 78,  238 => 77,  236 => 76,  229 => 74,  221 => 70,  218 => 69,  216 => 68,  211 => 65,  208 => 64,  203 => 61,  196 => 57,  192 => 56,  188 => 54,  186 => 53,  183 => 52,  180 => 51,  170 => 47,  168 => 32,  166 => 31,  163 => 30,  160 => 29,  155 => 116,  148 => 112,  144 => 111,  141 => 110,  139 => 109,  136 => 108,  134 => 64,  131 => 63,  129 => 51,  126 => 50,  124 => 29,  121 => 28,  118 => 27,  103 => 22,  100 => 21,  97 => 20,  94 => 19,  91 => 18,  89 => 17,  83 => 16,  80 => 15,  77 => 14,  69 => 118,  67 => 27,  64 => 26,  62 => 14,  43 => 12,  40 => 11,  37 => 10,  31 => 9,  28 => 8,  25 => 1,);
    }
}
