<?php

/* CoreOrderBundle:Order:on_email.html.twig */
class __TwigTemplate_060ed7d5be9c09d1769d2352d69a28cb75a8517ca4e45a924b8859d6167e6984 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 7
        ob_start();
        // line 8
        echo "
    ";
        // line 9
        $context["user"] = $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "user", array());
        // line 10
        echo "    <p style=\"width:700px\">";
        // line 11
        echo "";
        echo "Здравствуйте";
        echo twig_escape_filter($this->env, (isset($context["helloPrefix"]) ? $context["helloPrefix"] : null), "html", null, true);
        echo " Ваш заказ принят.<br>
        ";
        // line 15
        echo "";
        echo "Статус заказа вы можете отследить в личном кабинете на странице: <a href=\"";
        echo twig_escape_filter($this->env, (isset($context["urlOrder"]) ? $context["urlOrder"] : null), "html", null, true);
        echo "\" target=\"_blank\">";
        echo twig_escape_filter($this->env, (isset($context["urlOrder"]) ? $context["urlOrder"] : null), "html", null, true);
        echo "</a><br>

        ";
        // line 17
        if ((isset($context["payUrl"]) ? $context["payUrl"] : null)) {
            // line 18
            echo "            <br/><a href=\"";
            echo twig_escape_filter($this->env, (isset($context["payUrl"]) ? $context["payUrl"] : null), "html", null, true);
            echo "\" target=\"_blank\"><b>Оплатить заказ на сумму ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "total_cost_all", array(), "array")), "html", null, true);
            echo "&nbsp;";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</b></a><br><br>
            ";
        } else {
            // line 20
            echo "                ";
            if ((isset($context["attachment"]) ? $context["attachment"] : null)) {
                // line 21
                echo "";
                echo "В прикрепленном файле находится бланк для оплаты заказа в банке.<br>
                ";
            }
            // line 23
            echo "        ";
        }
        // line 24
        echo "";
        echo "Будем рады ответить на ваши вопросы по телефонам:";
        // line 25
        $context["phones"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "phones"), "method");
        // line 26
        $context["phonesCaptions"] = array("rostov" => "Ростов-на-Дону", "msk" => "Москва", "spb" => "Санкт-Петербург");
        // line 27
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["phones"]) ? $context["phones"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["phone"]) {
            // line 28
            if ($this->getAttribute((isset($context["phonesCaptions"]) ? $context["phonesCaptions"] : null), $context["key"], array(), "array", true, true)) {
                // line 30
                echo "<br>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phonesCaptions"]) ? $context["phonesCaptions"] : null), $context["key"], array(), "array"), "html", null, true);
                echo ": ";
                echo twig_escape_filter($this->env, $context["phone"], "html", null, true);
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['phone'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "</p>

    <h2 style=\"width:700px\">Заказ №";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())), "html", null, true);
        echo "</h2>

    <table width=\"700px\" cellpadding=\"5\" cellspacing=\"0\">
        <tr>
            <td width=\"140px\"><b>Статус:</b></td>
            <td>";
        // line 43
        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "extraStatus", array())) {
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "extraStatus", array()), ("caption" . $this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "getParameter", array(0 => "locale"), "method"))), "html", null, true);
        } else {
            // line 46
            echo "В обработке";
        }
        // line 49
        echo "</td>
        </tr>
        <tr>
            <td><b>Оформлен:</b></td>
            <td>";
        // line 53
        echo twig_escape_filter($this->env, (isset($context["createdDateTime"]) ? $context["createdDateTime"] : null), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <td><b>Сумма заказа:</b></td>
            <td>";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction((($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "history_info", array(), "array", true, true)) ? ($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "history_info", array(), "array"), "total_cost_all", array(), "array")) : ($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "total_cost_all", array(), "array")))), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</td>
        </tr>

        ";
        // line 60
        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryMethod", array())) {
            // line 61
            echo "
            <tr>
                <td><b>Доставка:</b></td>
                <td>";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryMethod", array()), ("caption" . $this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "getParameter", array(0 => "locale"), "method"))), "html", null, true);
            echo "</td>
            </tr>

        ";
        }
        // line 68
        echo "
    </table>
    <br>

    <table class=\"border\" width=\"700px\" border=\"1\" cellpadding=\"5\" cellspacing=\"0\">
        <tr>
            <td colspan=\"5\" style=\"text-align: center;\"><h2>Состав заказа</h2></td>
        </tr>
        <tr>
            <td align=\"center\"><b>Фото</b></td>
            <td align=\"center\"><b>Название товара</b></td>
            <td align=\"center\"><b>Цена</b></td>
            <td align=\"center\"><b>Кол-во</b></td>
            <td align=\"center\"><b>Стоимость</b></td>
        </tr>

        ";
        // line 84
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "compositions", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["composition"]) {
            // line 86
            $context["size"] = null;
            // line 87
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["composition"], "product", array()), "productDataProperty", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["pdp"]) {
                // line 88
                if (($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "name", array()) == "size")) {
                    // line 89
                    $context["size"] = $this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "value", array());
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pdp'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 93
            echo "<tr>
                <td>
                    <a href=\"http://";
            // line 95
            echo twig_escape_filter($this->env, (isset($context["domain"]) ? $context["domain"] : null), "html", null, true);
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_product", array("slug" => $this->getAttribute($this->getAttribute($context["composition"], "product", array()), "slug", array()))), "html", null, true);
            echo "\" target=\"_blank\">
                        <img src=\"http://";
            // line 96
            echo twig_escape_filter($this->env, (isset($context["domain"]) ? $context["domain"] : null), "html", null, true);
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute($this->getAttribute($context["composition"], "product", array()), "images", array()), "preview", "100x100_")), "html", null, true);
            echo "\" width=\"100xp\"/>
                    </a>
                </td>
                <td>
                    <a href=\"http://";
            // line 100
            echo twig_escape_filter($this->env, (isset($context["domain"]) ? $context["domain"] : null), "html", null, true);
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_product", array("slug" => $this->getAttribute($this->getAttribute($context["composition"], "product", array()), "slug", array()))), "html", null, true);
            echo "\" target=\"_blank\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["composition"], "product", array()), ("caption" . $this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "getParameter", array(0 => "locale"), "method"))), "html", null, true);
            echo "</a>
                    <br>
                    <span style=\"font-size:11px\">";
            // line 103
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($context["composition"], "product", array()), "color", array())) ? (($this->getAttribute($this->getAttribute($this->getAttribute($context["composition"], "product", array()), "color", array()), ("caption" . $this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "getParameter", array(0 => "locale"), "method"))) . " цвет")) : ("")), "html", null, true);
            echo ((($this->getAttribute($this->getAttribute($context["composition"], "product", array()), "color", array()) && (isset($context["size"]) ? $context["size"] : null))) ? (", ") : (""));
            echo twig_escape_filter($this->env, (((isset($context["size"]) ? $context["size"] : null)) ? (((isset($context["size"]) ? $context["size"] : null) . "  размер")) : ("")), "html", null, true);
            if ($this->getAttribute($this->getAttribute($context["composition"], "product", array()), "sku", array())) {
                echo " (SKU: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["composition"], "product", array()), "sku", array()), "html", null, true);
                echo ")";
            }
            echo "<br>
                    </span>
                </td>
                <td align=\"right\">";
            // line 106
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($context["composition"], "price", array())), "html", null, true);
            echo "&nbsp;";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</td>
                <td align=\"center\">";
            // line 107
            echo twig_escape_filter($this->env, $this->getAttribute($context["composition"], "quantity", array()), "html", null, true);
            echo "&nbsp;шт.</td>
                <td align=\"right\">";
            // line 109
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($context["composition"], "cost", array())), "html", null, true);
            echo "&nbsp;";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            // line 110
            echo "<br>";
            // line 111
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "composition", array(), "array"), $this->getAttribute($this->getAttribute($context["composition"], "product", array()), "id", array()), array(), "array"), "discountValue", array(), "array") > 0)) {
                // line 112
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "composition", array(), "array"), $this->getAttribute($this->getAttribute($context["composition"], "product", array()), "id", array()), array(), "array"), "isDiscountValueInPercent", array(), "array")) {
                    // line 113
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "composition", array(), "array"), $this->getAttribute($this->getAttribute($context["composition"], "product", array()), "id", array()), array(), "array"), "discountValue", array(), "array"), "html", null, true);
                    echo "&nbsp;%";
                } else {
                    // line 115
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "composition", array(), "array"), $this->getAttribute($this->getAttribute($context["composition"], "product", array()), "id", array()), array(), "array"), "discountValue", array(), "array")), "html", null, true);
                    echo "&nbsp;";
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                }
            }
            // line 119
            echo "</td>
            </tr>

        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['composition'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 123
        echo "        <tr>
            <td colspan=\"4\" align=\"right\">Товаров на сумму:</td>
            <td align=\"right\">";
        // line 125
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "composition_total_cost", array(), "array")), "html", null, true);
        echo "&nbsp;";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</td>
        </tr>
        ";
        // line 131
        echo "
        ";
        // line 132
        if ((($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "delivery_cost", array(), "array") > 0) && $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryMethod", array()))) {
            // line 133
            echo "
            <tr>
                <td colspan=\"4\" align=\"right\">Доставка: ";
            // line 135
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryMethod", array()), ("caption" . $this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "getParameter", array(0 => "locale"), "method"))), "html", null, true);
            echo "</td>
                <td align=\"right\">";
            // line 136
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "delivery_cost", array(), "array")), "html", null, true);
            echo "&nbsp;";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</td>
            </tr>

        ";
        }
        // line 140
        echo "
        ";
        // line 141
        if (($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "total_discount_summ", array(), "array") > 0)) {
            // line 142
            echo "
            <tr>
                <td colspan=\"4\" align=\"right\">Скидка:</td>
                <td align=\"right\">-";
            // line 145
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "total_discount_summ", array(), "array")), "html", null, true);
            echo "&nbsp;";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</td>
            </tr>

        ";
        }
        // line 149
        echo "
        <tr class=\"cabinet_order_list_total_sum\">
            <td colspan=\"4\" align=\"right\">Общая стоимость c учетом доставки:</td>
            <td align=\"right\">";
        // line 152
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "total_cost_all", array(), "array")), "html", null, true);
        echo "&nbsp;";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</td>
        </tr>
    </table>

    <br>

    ";
        // line 158
        $context["c"] = $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array());
        // line 159
        echo "    ";
        if ((((($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientFio", array()) || $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientCompany", array())) || $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryCity", array())) || $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientPhone", array())) || $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientEmail", array()))) {
            // line 161
            echo "    <table width=\"700px\" cellpadding=\"5\" cellspacing=\"0\">
        <tr>
            <td colspan=\"2\" style=\"text-align: center;\"><h2 style=\"text-align: center;\">Получатель и адрес доставки</h2></td>
        </tr>
        ";
            // line 165
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientFio", array())) {
                // line 166
                echo "            <tr>
                <td width=\"140px\"><b>ФИО:</b></td>
                <td>";
                // line 168
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientFio", array()), "html", null, true);
                echo "</td>
            </tr>
        ";
            } else {
                // line 171
                echo "            ";
                if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientCompany", array())) {
                    // line 172
                    echo "            <tr>
                <td width=\"140px\"><b>Организация:</b></td>
                <td>";
                    // line 174
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientCompany", array()), "html", null, true);
                    echo "</td>
            </tr>
            ";
                }
                // line 177
                echo "        ";
            }
            // line 178
            echo "
        ";
            // line 179
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryCity", array())) {
                // line 180
                echo "            <tr>
                <td><b>Адрес:</b></td>
                <td>Российская Федерация, ";
                // line 182
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryCity", array()), "postIndex", array()), "html", null, true);
                echo ", г. ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryCity", array()), "name", array()), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryAddress", array()), "html", null, true);
                echo "</td>
            </tr>
        ";
            }
            // line 185
            echo "
        ";
            // line 186
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientPhone", array())) {
                // line 187
                echo "            <tr>
                <td><b>Контактный телефон:</b></td>
                <td>";
                // line 189
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientPhone", array()), "html", null, true);
                echo "</td>
            </tr>
        ";
            }
            // line 192
            echo "
        ";
            // line 193
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientEmail", array())) {
                // line 194
                echo "            <tr>
                <td><b>E-mail:</b></td>
                <td>";
                // line 196
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientEmail", array()), "html", null, true);
                echo "</td>
            </tr>
        ";
            }
            // line 199
            echo "    </table>
    ";
        }
        // line 201
        echo "    <br>
    <p style=\"width:700px\">";
        // line 203
        echo "";
        echo "С наилучшими пожеланиями,<br>";
        // line 204
        echo "";
        echo "команда сайта <a href=\"http://";
        echo twig_escape_filter($this->env, (isset($context["domain"]) ? $context["domain"] : null), "html", null, true);
        echo "\" target=\"_blank\">";
        echo twig_escape_filter($this->env, (isset($context["domain"]) ? $context["domain"] : null), "html", null, true);
        echo "</a>.";
        // line 205
        echo "";
        // line 206
        echo "</p>

";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Order:on_email.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  433 => 206,  431 => 205,  424 => 204,  421 => 203,  418 => 201,  414 => 199,  408 => 196,  404 => 194,  402 => 193,  399 => 192,  393 => 189,  389 => 187,  387 => 186,  384 => 185,  374 => 182,  370 => 180,  368 => 179,  365 => 178,  362 => 177,  356 => 174,  352 => 172,  349 => 171,  343 => 168,  339 => 166,  337 => 165,  331 => 161,  328 => 159,  326 => 158,  315 => 152,  310 => 149,  301 => 145,  296 => 142,  294 => 141,  291 => 140,  282 => 136,  278 => 135,  274 => 133,  272 => 132,  269 => 131,  262 => 125,  258 => 123,  249 => 119,  243 => 115,  239 => 113,  237 => 112,  235 => 111,  233 => 110,  229 => 109,  225 => 107,  219 => 106,  206 => 103,  198 => 100,  190 => 96,  185 => 95,  181 => 93,  174 => 89,  172 => 88,  168 => 87,  166 => 86,  162 => 84,  144 => 68,  137 => 64,  132 => 61,  130 => 60,  122 => 57,  115 => 53,  109 => 49,  106 => 46,  103 => 44,  101 => 43,  93 => 36,  89 => 34,  79 => 30,  77 => 28,  73 => 27,  71 => 26,  69 => 25,  66 => 24,  63 => 23,  58 => 21,  55 => 20,  45 => 18,  43 => 17,  34 => 15,  28 => 11,  26 => 10,  24 => 9,  21 => 8,  19 => 7,);
    }
}
