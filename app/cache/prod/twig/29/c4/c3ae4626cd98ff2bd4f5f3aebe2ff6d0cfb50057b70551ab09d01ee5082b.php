<?php

/* CoreOrderBundle:Order:step1.html.twig */
class __TwigTemplate_29c4c3ae4626cd98ff2bd4f5f3aebe2ff6d0cfb50057b70551ab09d01ee5082b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout.html.twig");

        $_trait_0 = $this->env->loadTemplate("CoreOrderBundle:Order/Block:breadcrumbs.html.twig");
        // line 13
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."CoreOrderBundle:Order/Block:breadcrumbs.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'title' => array($this, 'block_title'),
                'meta_keywords' => array($this, 'block_meta_keywords'),
                'meta_description' => array($this, 'block_meta_description'),
                'js_head' => array($this, 'block_js_head'),
                'content' => array($this, 'block_content'),
                'footer' => array($this, 'block_footer'),
            )
        );
    }

    protected function doGetParent(array $context)
    {
        return "CoreCommonBundle::main_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 16
    public function block_title($context, array $blocks = array())
    {
        echo "Ваши покупки | OliKids.ru";
    }

    // line 17
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "корзина, заказ, покупки";
    }

    // line 18
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Список Ваших покупок на сайте OliKids.";
    }

    // line 20
    public function block_js_head($context, array $blocks = array())
    {
        // line 21
        echo "
    ";
        // line 22
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
    ";
        // line 30
        echo "    ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "d3b49e3_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d3b49e3_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/order_frontend.order_1.js");
            // line 36
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "d3b49e3_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d3b49e3_1") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/order_steps_2.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "d3b49e3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d3b49e3") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/order.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 38
        echo "
    <script>
        ";
        // line 40
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "products", array(), "any", true, true) && twig_length_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "products", array())))) {
            // line 41
            echo "            ";
            $context["cartCost"] = $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "orderCostInfo", array()), "total_cost", array(), "array");
            // line 42
            echo "                var google_tag_params = {
                    ecomm_pagetype: 'cart',
                    ecomm_totalvalue: '";
            // line 44
            echo twig_escape_filter($this->env, (isset($context["cartCost"]) ? $context["cartCost"] : null), "html", null, true);
            echo "'
                };
                ";
        } else {
            // line 47
            echo "                    var google_tag_params = {
                        ecomm_pagetype: 'cart'
                    };
        ";
        }
        // line 51
        echo "        ";
        // line 55
        echo "    </script>

";
    }

    // line 59
    public function block_content($context, array $blocks = array())
    {
        // line 60
        echo "
    ";
        // line 61
        $this->displayBlock("order_breadcrumbs_block", $context, $blocks);
        echo "

    <div id=\"content\" class=\"cart_page\" role=\"main\">
        <h1>Ваши покупки</h1>

        <!-- main content col -->
        <div class=\"main_col\">
            <div class=\"main_col_pad\">

                ";
        // line 70
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "products", array(), "any", true, true) && twig_length_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "products", array())))) {
            // line 71
            echo "
                    ";
            // line 72
            $context["orderCostInfo"] = $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "orderCostInfo", array());
            // line 73
            echo "
                    <table class=\"cart_products_list\">
                        <thead>
                            <tr>
                                <th>Товар</th>
                                <th>Количество</th>
                                <th class=\"cart_product_price\">Сумма</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- product -->
                            ";
            // line 84
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "products", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 85
                echo "
                                ";
                // line 86
                $context["quantity"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "sessionOrder", array()), "products", array(), "array"), $this->getAttribute($context["product"], "id", array()), array(), "array"), "quantity", array(), "array");
                // line 87
                echo "                                <tr class=\"cart_product\" data-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "id", array()), "html", null, true);
                echo "\" data-url=\"";
                echo $this->env->getExtension('routing')->getPath("core_product_update_cart");
                echo "\">
                                    <td class=\"cart_product_info\">
                                        <div class=\"cart_product_info_pad\">
                                            <a class=\"cart_product_name\" href=\"";
                // line 90
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_product", array("slug" => $this->getAttribute($context["product"], "slug", array()))), "html", null, true);
                echo "\"><img class=\"cart_product_img\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute($context["product"], "images", array()), "preview", "100x100_", true)), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                echo "</a>
                                            <p class=\"cart_product_specs\">";
                // line 93
                $context["size"] = null;
                // line 94
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["product"], "productDataProperty", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["pdp"]) {
                    // line 95
                    if (($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "name", array()) == "size")) {
                        // line 96
                        $context["size"] = $this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "value", array());
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pdp'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 100
                echo twig_escape_filter($this->env, (($this->getAttribute($context["product"], "color", array())) ? (($this->getAttribute($this->getAttribute($context["product"], "color", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))) . " цвет")) : ("")), "html", null, true);
                echo ((($this->getAttribute($context["product"], "color", array()) && (isset($context["size"]) ? $context["size"] : null))) ? (", ") : (""));
                echo twig_escape_filter($this->env, (((isset($context["size"]) ? $context["size"] : null)) ? (((isset($context["size"]) ? $context["size"] : null) . "  размер")) : ("")), "html", null, true);
                if ($this->getAttribute($context["product"], "sku", array())) {
                    echo " (SKU: ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "sku", array()), "html", null, true);
                    echo ")";
                }
                echo "<br>";
                // line 102
                if ($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction($context["product"], "old")) {
                    // line 104
                    echo "<span class=\"product_price old\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction($context["product"], "old")), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                    echo "</span>&nbsp;";
                }
                // line 107
                echo "
                                                <span class=\"product_price\">";
                // line 108
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction($context["product"], "current")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                echo "</span>

                                                <br>

                                                ";
                // line 112
                if ($this->getAttribute($context["product"], "orderOnly", array())) {
                    // line 113
                    echo "
                                                    <span>Под заказ";
                    // line 114
                    if ($this->getAttribute($context["product"], "deliveryDays", array())) {
                        echo ". Время обработки ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "deliveryDays", array()), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute($context["product"], "deliveryDays", array()), array(0 => "день", 1 => "дня", 2 => "дней")), "html", null, true);
                        echo ".";
                    }
                    echo "</span>

                                                ";
                }
                // line 117
                echo "
                                            </p>
                                            <ul class=\"cart_product_tools\">
                                                <li class=\"cart_product_tool\"><span class=\"delete with_icon text_tgl\" data-action=\"remove\">Удалить позицию</span></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td class=\"cart_product_qnt\">
                                        <div class=\"clearfix\">
                                            <span class=\"qnt_btn decrease";
                // line 126
                echo "\" data-action=\"setQuantity\">&nbsp;</span>
                                            <input class=\"cart_product_qnt_input\" type=\"text\" value=\"";
                // line 127
                echo twig_escape_filter($this->env, (isset($context["quantity"]) ? $context["quantity"] : null), "html", null, true);
                echo "\" size=\"3\" maxlength=\"3\" data-action=\"setQuantity\" data-max=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "availabilityQuantity", array()), "html", null, true);
                echo "\">
                                            <span class=\"qnt_btn increase";
                // line 128
                if (((isset($context["quantity"]) ? $context["quantity"] : null) >= $this->getAttribute($context["product"], "availabilityQuantity", array()))) {
                    echo " disabled";
                }
                echo "\" data-action=\"setQuantity\">&nbsp;</span>
                                        </div>
                                        <div class=\"clearfix amount\">
                                            ";
                // line 131
                if ($this->getAttribute($context["product"], "orderOnly", array())) {
                    // line 132
                    echo "                                                На складе:
                                            ";
                } else {
                    // line 134
                    echo "                                                ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.goodsAvailability"), "html", null, true);
                    echo "
                                            ";
                }
                // line 136
                echo "                                            <span class=\"qnt\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "availabilityQuantity", array()), "html", null, true);
                if ($this->getAttribute($context["product"], "unitOfMeasure", array())) {
                    echo "&nbsp;";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product"], "unitOfMeasure", array()), ("shortCaption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                }
                echo "</span>
                                        </div>
                                    </td>
                                    <td class=\"cart_product_price\" nowrap>
                                        <div class=\"product_price\"><b class=\"composition_cost\">";
                // line 140
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "composition", array(), "array"), $this->getAttribute($context["product"], "id", array()), array(), "array"), "cost", array(), "array")), "html", null, true);
                echo "</b>&nbsp;<span>";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                echo "</span></div>

                                        ";
                // line 142
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "composition", array(), "array"), $this->getAttribute($context["product"], "id", array()), array(), "array"), "discountValue", array(), "array")) {
                    // line 143
                    echo "                                            <span class=\"discount\">Со скидкой <b class=\"discountValue\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "composition", array(), "array"), $this->getAttribute($context["product"], "id", array()), array(), "array"), "discountValue", array(), "array"), "html", null, true);
                    echo "</b>";
                    if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "composition", array(), "array"), $this->getAttribute($context["product"], "id", array()), array(), "array"), "isDiscountValueInPercent", array(), "array")) {
                        echo "% (<b class=\"discountValueInCurrency\">";
                        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "composition", array(), "array"), $this->getAttribute($context["product"], "id", array()), array(), "array"), "discountValueInMoney", array(), "array")), "html", null, true);
                        echo "</b> ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                        echo ")";
                    } else {
                        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                    }
                    echo "</span>
                                        ";
                }
                // line 145
                echo "
                                    </td>
                                </tr>

                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 150
            echo "
                        </tbody>
                    </table>

                    <div class=\"cart_total\">
                        <table>
                            <tbody>
                                ";
            // line 161
            echo "
                                ";
            // line 162
            if (($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "total_discount_summ", array(), "array") > 0)) {
                // line 163
                echo "
                                    <tr class=\"discount\">
                                        <td>Скидка</td>
                                        <td class=\"sum price\">-<b id=\"total_discount_summ\">";
                // line 166
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "total_discount_summ", array(), "array")), "html", null, true);
                echo "</b><span>&nbsp;";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                echo "</span></td>
                                    </tr>

                                ";
            }
            // line 170
            echo "
                                <tr class=\"cart_total_sum\">
                                    <td>Общая стоимость без учета доставки</td>
                                    <td class=\"sum price\"><b id=\"total_cost\">";
            // line 173
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "total_cost", array(), "array")), "html", null, true);
            echo "</b><span>&nbsp;";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</span></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class=\"order_proceed";
            // line 178
            if ((!$this->getAttribute((isset($context["confines"]) ? $context["confines"] : null), "canCreateOrder", array()))) {
                echo " hidden";
            }
            echo "\">
                            <button id=\"create-order\" data-url=\"";
            // line 179
            echo $this->env->getExtension('routing')->getPath("core_order_cart_step2");
            echo "\" class=\"common_button big with_arrow\" type=\"submit\"><span>Оформить заказ</span></button>
                        </div>

                        <!--noindex-->

                        <strong class=\"confines_min_sum\">";
            // line 186
            if ((!$this->getAttribute((isset($context["confines"]) ? $context["confines"] : null), "canCreateOrder", array()))) {
                // line 188
                echo $this->getAttribute((isset($context["confines"]) ? $context["confines"] : null), "msg", array());
            }
            // line 192
            echo "</strong>

                        <!--/noindex-->

                    </div>

                ";
        } else {
            // line 199
            echo "
                    <div class=\"info_box\">Ваша корзина пуста</div>
                    Вы можете добавить товары в корзину перейдя на страницу понравившегося вам товара в списке товаров.

                    ";
            // line 203
            if (((isset($context["countNotPaidOrders"]) ? $context["countNotPaidOrders"] : null) > 0)) {
                // line 204
                echo "
                        <br>
                        У Вас есть ";
                // line 206
                echo twig_escape_filter($this->env, (isset($context["countNotPaidOrders"]) ? $context["countNotPaidOrders"] : null), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction((isset($context["countNotPaidOrders"]) ? $context["countNotPaidOrders"] : null), array(0 => "неоплаченный заказ", 1 => "неоплаченных заказa", 2 => "неоплаченных заказов")), "html", null, true);
                echo ". Просмотреть их можно в Личном кабинете в <a href=\"";
                echo $this->env->getExtension('routing')->getPath("application_sonata_user_profile_orders_history_list_first_page");
                echo "\">Списке заказов</a>.

                    ";
            }
            // line 209
            echo "
                ";
        }
        // line 211
        echo "
                ";
        // line 261
        echo "            </div>
        </div>
        <!-- /main content col -->

        <!-- side content col -->
        ";
        // line 290
        echo "        <!-- /side content col -->

    </div>

";
    }

    // line 296
    public function block_footer($context, array $blocks = array())
    {
        // line 297
        echo "    ";
        $context["mixMarketList"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "mix-market"), "method");
        // line 298
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "environment", array()) == "prod")) {
            // line 299
            $context["mixMarketList"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "mix-market"), "method");
            // line 300
            echo "        ";
            echo $this->getAttribute((isset($context["mixMarketList"]) ? $context["mixMarketList"] : null), "cart", array(), "array");
        }
        // line 302
        $this->displayParentBlock("footer", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Order:step1.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  474 => 302,  470 => 300,  468 => 299,  466 => 298,  463 => 297,  460 => 296,  452 => 290,  445 => 261,  442 => 211,  438 => 209,  428 => 206,  424 => 204,  422 => 203,  416 => 199,  407 => 192,  404 => 188,  402 => 186,  394 => 179,  388 => 178,  378 => 173,  373 => 170,  364 => 166,  359 => 163,  357 => 162,  354 => 161,  345 => 150,  335 => 145,  319 => 143,  317 => 142,  310 => 140,  298 => 136,  292 => 134,  288 => 132,  286 => 131,  278 => 128,  272 => 127,  269 => 126,  258 => 117,  246 => 114,  243 => 113,  241 => 112,  232 => 108,  229 => 107,  222 => 104,  220 => 102,  210 => 100,  203 => 96,  201 => 95,  197 => 94,  195 => 93,  187 => 90,  178 => 87,  176 => 86,  173 => 85,  169 => 84,  156 => 73,  154 => 72,  151 => 71,  149 => 70,  137 => 61,  134 => 60,  131 => 59,  125 => 55,  123 => 51,  117 => 47,  111 => 44,  107 => 42,  104 => 41,  102 => 40,  98 => 38,  78 => 36,  73 => 30,  69 => 22,  66 => 21,  63 => 20,  57 => 18,  51 => 17,  45 => 16,  14 => 13,);
    }
}
