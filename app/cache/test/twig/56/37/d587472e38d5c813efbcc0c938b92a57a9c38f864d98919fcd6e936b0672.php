<?php

/* CoreOrderBundle:Order/Block:summary_info.html.twig */
class __TwigTemplate_5637d587472e38d5c813efbcc0c938b92a57a9c38f864d98919fcd6e936b0672 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'order_summary_block' => array($this, 'block_order_summary_block'),
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
        // line 10
        $this->displayBlock('order_summary_block', $context, $blocks);
    }

    public function block_order_summary_block($context, array $blocks = array())
    {
        // line 11
        echo "
    <aside class=\"side_col\">
        <div class=\"side_col_pad\">

            <div class=\"call_us_sidebox\">
                <h2>Есть вопросы? Звоните!</h2>

                ";
        // line 18
        $context["phones"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : $this->getContext($context, "ServiceContainer")), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "phones"), "method");
        // line 19
        echo "                ";
        $context["phonesCaptions"] = array("rostov" => "в Ростове-на-Дону", "msk" => "в Москве", "spb" => "в Санкт-Петербурге");
        // line 20
        echo "
                <strong class=\"text-phone-selected\">";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phones"]) ? $context["phones"] : $this->getContext($context, "phones")), "rostov", array(), "array"), "html", null, true);
        echo "</strong>
                <br>
                <span class=\"text_tgl text-city-selected\">";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phonesCaptions"]) ? $context["phonesCaptions"] : $this->getContext($context, "phonesCaptions")), "rostov", array(), "array"), "html", null, true);
        echo "</span>
                <div class=\"header_contacts_dropdown dropdown\">
                    <ul>
                        ";
        // line 26
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["phones"]) ? $context["phones"] : $this->getContext($context, "phones")));
        foreach ($context['_seq'] as $context["key"] => $context["phone"]) {
            // line 27
            echo "                            ";
            if ($this->getAttribute((isset($context["phonesCaptions"]) ? $context["phonesCaptions"] : null), $context["key"], array(), "array", true, true)) {
                // line 28
                echo "
                                <li id=\"";
                // line 29
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "\" ";
                if (($context["key"] == "rostov")) {
                    echo "class=\"selected\"";
                }
                echo "><strong class=\"text-phone\">";
                echo twig_escape_filter($this->env, $context["phone"], "html", null, true);
                echo "</strong><br><span class=\"text-city\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phonesCaptions"]) ? $context["phonesCaptions"] : $this->getContext($context, "phonesCaptions")), $context["key"], array(), "array"), "html", null, true);
                echo "</span></li>

                            ";
            }
            // line 32
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['phone'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "                    </ul>
                </div>
            </div>
            <div class=\"work_time_sidebox\">
                <h2>Время работы:</h2>
                <strong>Пн. &mdash;&nbsp;Пт. с&nbsp;09:00 до&nbsp;18:00&nbsp;МСК</strong><br>
            </div>

            ";
        // line 41
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "orderCostInfo", array(), "any", true, true) && ($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "orderCostInfo", array()), "total_cost", array()) > 0))) {
            // line 42
            echo "
                ";
            // line 43
            $context["orderCostInfo"] = $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "orderCostInfo", array());
            // line 44
            echo "
                ";
            // line 45
            if ((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo"))) {
                // line 46
                echo "
                    <section class=\"order_summary\">
                        <h2>Ваш заказ <span class=\"order_summary_count\">";
                // line 48
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "total_quantity", array()), "html", null, true);
                echo "</span></h2>
                        <table class=\"order_summary_products_list\">
                            <tbody>

                                ";
                // line 52
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "products", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                    // line 53
                    echo "
                                    <tr class=\"order_summary_product\">
                                        <td>
                                            <strong class=\"order_summary_product_name\">";
                    // line 56
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                    echo " (";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "sessionOrder", array()), "products", array(), "array"), $this->getAttribute($context["product"], "id", array()), array(), "array"), "quantity", array(), "array"), "html", null, true);
                    echo " шт.)</strong>
                                            <p class=\"order_summary_product_specs\">";
                    // line 59
                    $context["size"] = null;
                    // line 60
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["product"], "productDataProperty", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["pdp"]) {
                        // line 61
                        if (($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "name", array()) == "size")) {
                            // line 62
                            $context["size"] = $this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "value", array());
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pdp'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 66
                    echo twig_escape_filter($this->env, (($this->getAttribute($context["product"], "color", array())) ? (($this->getAttribute($this->getAttribute($context["product"], "color", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))) . " цвет")) : ("")), "html", null, true);
                    echo ((($this->getAttribute($context["product"], "color", array()) && (isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")))) ? (", ") : (""));
                    echo twig_escape_filter($this->env, (((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size"))) ? (((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")) . "  размер")) : ("")), "html", null, true);
                    if ($this->getAttribute($context["product"], "sku", array())) {
                        echo " (SKU: ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "sku", array()), "html", null, true);
                        echo ")";
                    }
                    echo "<br>

                                                ";
                    // line 68
                    if ($this->getAttribute($context["product"], "orderOnly", array())) {
                        // line 69
                        echo "
                                                    Под заказ";
                        // line 70
                        if ($this->getAttribute($context["product"], "deliveryDays", array())) {
                            echo ". Время обработки ";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "deliveryDays", array()), "html", null, true);
                            echo " ";
                            echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute($context["product"], "deliveryDays", array()), array(0 => "день", 1 => "дня", 2 => "дней")), "html", null, true);
                            echo ".";
                        }
                        // line 71
                        echo "
                                                ";
                    }
                    // line 73
                    echo "
                                            </p>
                                        </td>
                                        <td class=\"order_summary_product_price\">
                                            <div class=\"product_price\">";
                    // line 77
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "composition", array(), "array"), $this->getAttribute($context["product"], "id", array()), array(), "array"), "cost", array(), "array")), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                    echo "</div>

                                            ";
                    // line 79
                    if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "composition", array(), "array"), $this->getAttribute($context["product"], "id", array()), array(), "array"), "discountValue", array(), "array")) {
                        // line 80
                        echo "
                                                <span class=\"discount\">";
                        // line 81
                        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "composition", array(), "array"), $this->getAttribute($context["product"], "id", array()), array(), "array"), "discountValue", array(), "array")), "html", null, true);
                        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "composition", array(), "array"), $this->getAttribute($context["product"], "id", array()), array(), "array"), "isDiscountValueInPercent", array(), "array")) {
                            echo "%";
                        } else {
                            echo " ";
                            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                        }
                        echo "</span>

                                            ";
                    }
                    // line 84
                    echo "
                                        </td>
                                    </tr>

                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 89
                echo "
                            </tbody>
                        </table>
                        <table class=\"order_summary_total\">
                            <tbody>
                                <tr>
                                    <td>Товаров на сумму</td>
                                    <td class=\"sum price\">";
                // line 96
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "composition_total_cost", array())), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                echo "</td>
                                </tr>
                                ";
                // line 104
                echo "
                                ";
                // line 105
                if ($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "delivery_cost", array(), "array")) {
                    // line 106
                    echo "
                                    <tr>
                                        <td>Доставка: «";
                    // line 108
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "order", array()), "deliveryMethod", array()), "captionRu", array()), "html", null, true);
                    echo "»</td>
                                        <td class=\"sum price\">";
                    // line 109
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "delivery_cost", array())), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                    echo "</td>
                                    </tr>

                                ";
                }
                // line 113
                echo "
                                ";
                // line 114
                if ($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "total_discount_summ", array(), "array")) {
                    // line 115
                    echo "
                                    <tr class=\"discount\">
                                        <td>Скидка</td>
                                        <td class=\"sum price\">-";
                    // line 118
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "total_discount_summ", array())), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                    echo "</td>
                                    </tr>

                                ";
                }
                // line 122
                echo "
                                <tr class=\"order_summary_total_sum\">

                                    ";
                // line 125
                if ($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "delivery_cost", array(), "array")) {
                    // line 126
                    echo "                                        <td>Общая стоимость с учетом доставки</td>
                                    ";
                } else {
                    // line 128
                    echo "                                        <td>Общая стоимость без учета доставки</td>
                                    ";
                }
                // line 130
                echo "
                                    <td class=\"sum price\">";
                // line 131
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "total_cost", array())), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                echo "</td>
                                </tr>
                            </tbody>
                        </table>
                    </section>

                ";
            }
            // line 138
            echo "            ";
        }
        // line 139
        echo "
        </div>
    </aside>

";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Order/Block:summary_info.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  313 => 139,  310 => 138,  298 => 131,  295 => 130,  291 => 128,  287 => 126,  285 => 125,  280 => 122,  271 => 118,  266 => 115,  264 => 114,  261 => 113,  252 => 109,  248 => 108,  244 => 106,  242 => 105,  239 => 104,  232 => 96,  223 => 89,  213 => 84,  201 => 81,  198 => 80,  196 => 79,  189 => 77,  183 => 73,  179 => 71,  171 => 70,  168 => 69,  166 => 68,  154 => 66,  147 => 62,  145 => 61,  141 => 60,  139 => 59,  133 => 56,  128 => 53,  124 => 52,  117 => 48,  113 => 46,  111 => 45,  108 => 44,  106 => 43,  103 => 42,  101 => 41,  91 => 33,  85 => 32,  71 => 29,  68 => 28,  65 => 27,  61 => 26,  55 => 23,  50 => 21,  47 => 20,  44 => 19,  42 => 18,  33 => 11,  27 => 10,  23 => 8,  20 => 1,);
    }
}
