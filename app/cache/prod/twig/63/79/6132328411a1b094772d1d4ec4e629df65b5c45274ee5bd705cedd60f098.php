<?php

/* ApplicationSonataUserBundle:Profile:order_print.html.twig */
class __TwigTemplate_63796132328411a1b094772d1d4ec4e629df65b5c45274ee5bd705cedd60f098 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'keywords' => array($this, 'block_keywords'),
            'description' => array($this, 'block_description'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 8
        echo "
<!doctype html public \"-//W3C//DTD HTML 4.01 Transitional//EN\"
    \"http://www.w3.org/TR/html4/loose.dtd\">
<html>
    <head>
        <title>";
        // line 13
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <meta name=\"Robots\" content=\"noindex,follow\" >
        <meta name=\"Keywords\" content=\"";
        // line 15
        $this->displayBlock('keywords', $context, $blocks);
        echo "\">
        <meta name=\"Description\" content=\"";
        // line 16
        $this->displayBlock('description', $context, $blocks);
        echo "\">
        <meta name=\"Content-Type\" content=\"text/html; charset=UTF-8\">
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
        <style>
            body {width: 800px; margin: auto}
            table.border {border-collapse: collapse;border:#000000 1px solid;}
            .border td, .border th  {background: white; border:#000000 1px solid !important;}
        </style>
    </head>
    <body>

        <h1 style=\"text-align: center\">Заказ №";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())), "html", null, true);
        echo "</h1>

        <table width=\"100%\" cellpadding=\"5\" cellspacing=\"0\">
            <tr>
                <td width=\"140px\">Статус:</td>
                <td>";
        // line 34
        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "extraStatus", array())) {
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "extraStatus", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
        } else {
            // line 37
            echo "В обработке";
        }
        // line 40
        echo "</td>
            </tr>
            <tr>
                <td>Оформлен:</td>
                <td>";
        // line 44
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "createdDateTime", array()), "d.m.Y, H:i", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td>Сумма заказа:</td>
                <td>";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction((($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "history_info", array(), "array", true, true)) ? ($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "history_info", array(), "array"), "total_cost_all", array(), "array")) : ($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "total_cost_all", array(), "array")))), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</td>
            </tr>

            ";
        // line 51
        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryMethod", array())) {
            // line 52
            echo "
                <tr>
                    <td>Доставка:</td>
                    <td>";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryMethod", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo "</td>
                </tr>

            ";
        }
        // line 59
        echo "
                <tr>
                    <td>Контрагент:</td>
                    <td>";
        // line 63
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array(), "any", false, true), "legalForm", array(), "any", true, true)) {
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "organization", array()), "html", null, true);
        } else {
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "lastName", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "firstName", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "surName", array()), "html", null, true);
        }
        // line 68
        echo "</td>
                </tr>

        </table>
        <br>

        <table class=\"border\" width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">
            <tr>
                <td colspan=\"4\" style=\"text-align: center;\"><h2>Состав заказа</h2></td>
            </tr>
            <tr>
                <td align=\"center\"><b>Название товара</b></td>
                <td align=\"center\"><b>Цена</b></td>
                <td align=\"center\"><b>Кол-во</b></td>
                <td align=\"center\"><b>Стоимость</b></td>
            </tr>

            ";
        // line 85
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "compositions", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["composition"]) {
            // line 87
            $context["size"] = null;
            // line 88
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["composition"], "product", array()), "productDataProperty", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["pdp"]) {
                // line 89
                if (($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "name", array()) == "size")) {
                    // line 90
                    $context["size"] = $this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "value", array());
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pdp'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 94
            echo "<tr>
                    <td>
                        ";
            // line 96
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["composition"], "product", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo "
                        <br>
                        <span style=\"font-size:11px\">";
            // line 99
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($context["composition"], "product", array()), "color", array())) ? (($this->getAttribute($this->getAttribute($this->getAttribute($context["composition"], "product", array()), "color", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))) . " цвет")) : ("")), "html", null, true);
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
            // line 102
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($context["composition"], "price", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</td>
                    <td align=\"center\">";
            // line 103
            echo twig_escape_filter($this->env, $this->getAttribute($context["composition"], "quantity", array()), "html", null, true);
            echo " шт.</td>
                    <td align=\"right\">
                        ";
            // line 105
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($context["composition"], "cost", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "

                        <br>

                        ";
            // line 109
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "composition", array(), "array"), $this->getAttribute($this->getAttribute($context["composition"], "product", array()), "id", array()), array(), "array"), "discountValue", array(), "array") > 0)) {
                // line 110
                echo "                            ";
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "composition", array(), "array"), $this->getAttribute($this->getAttribute($context["composition"], "product", array()), "id", array()), array(), "array"), "isDiscountValueInPercent", array(), "array")) {
                    // line 111
                    echo "                                ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "composition", array(), "array"), $this->getAttribute($this->getAttribute($context["composition"], "product", array()), "id", array()), array(), "array"), "discountValue", array(), "array"), "html", null, true);
                    echo " %
                            ";
                } else {
                    // line 113
                    echo "                                ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "composition", array(), "array"), $this->getAttribute($this->getAttribute($context["composition"], "product", array()), "id", array()), array(), "array"), "discountValue", array(), "array")), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                    echo "
                            ";
                }
                // line 115
                echo "                        ";
            }
            // line 116
            echo "
                    </td>
                </tr>

            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['composition'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 121
        echo "            <tr>
                <td colspan=\"3\" align=\"right\">Товаров на сумму:</td>
                <td align=\"right\">";
        // line 123
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "composition_total_cost", array(), "array")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</td>
            </tr>
            ";
        // line 129
        echo "
            ";
        // line 130
        if ((($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "delivery_cost", array(), "array") > 0) && $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryMethod", array()))) {
            // line 131
            echo "
                <tr>
                    <td colspan=\"3\" align=\"right\">Доставка: ";
            // line 133
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryMethod", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo "</td>
                    <td align=\"right\">";
            // line 134
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "delivery_cost", array(), "array")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</td>
                </tr>

            ";
        }
        // line 138
        echo "
            ";
        // line 139
        if (($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "total_discount_summ", array(), "array") > 0)) {
            // line 140
            echo "
                <tr>
                    <td colspan=\"3\" align=\"right\">Скидка:</td>
                    <td align=\"right\">-";
            // line 143
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "total_discount_summ", array(), "array")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</td>
                </tr>

            ";
        }
        // line 147
        echo "
            <tr class=\"cabinet_order_list_total_sum\">
                <td colspan=\"3\" align=\"right\">Общая стоимость";
        // line 149
        if ((($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "delivery_cost", array(), "array") > 0) && $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryMethod", array()))) {
            echo " c учетом доставки";
        }
        echo ":</td>
                <td align=\"right\">";
        // line 150
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "total_cost_all", array(), "array")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</td>
            </tr>
        </table>

        <br>

        ";
        // line 156
        if ((((($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientFio", array()) || $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryCity", array())) || $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientPhone", array())) || $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientEmail", array())) || $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryMethod", array()))) {
            // line 157
            echo "
            <h2 style=\"text-align: center;\">Получатель и адрес доставки</h2>
            ";
            // line 159
            $context["c"] = $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array());
            // line 160
            echo "            <table width=\"100%\" cellpadding=\"5\" cellspacing=\"0\">

                ";
            // line 162
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientFio", array())) {
                // line 163
                echo "                    <tr>
                        <td width=\"140px\">ФИО:</td>
                        <td>";
                // line 165
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientFio", array()), "html", null, true);
                echo "</td>
                    </tr>
                ";
            } else {
                // line 168
                echo "                    <tr>
                        <td width=\"140px\">Организация:</td>
                        <td>";
                // line 170
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientCompany", array()), "html", null, true);
                echo "</td>
                    </tr>
                ";
            }
            // line 173
            echo "
                ";
            // line 174
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryCity", array())) {
                // line 175
                echo "                    <tr>
                        <td>Адрес:</td>
                        <td>Российская Федерация, ";
                // line 177
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryCity", array()), "postIndex", array()), "html", null, true);
                echo ", г. ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryCity", array()), "name", array()), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryAddress", array()), "html", null, true);
                echo "</td>
                    </tr>
                ";
            }
            // line 180
            echo "
                ";
            // line 181
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientPhone", array())) {
                // line 182
                echo "                    <tr>
                        <td>Контактный телефон:</td>
                        <td>";
                // line 184
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientPhone", array()), "html", null, true);
                echo "</td>
                    </tr>
                ";
            }
            // line 187
            echo "
                ";
            // line 188
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientEmail", array())) {
                // line 189
                echo "                    <tr>
                        <td>E-mail:</td>
                        <td>";
                // line 191
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientEmail", array()), "html", null, true);
                echo "</td>
                    </tr>
                ";
            }
            // line 194
            echo "
            </table>

        ";
        }
        // line 198
        echo "
    </body>
</html>";
    }

    // line 13
    public function block_title($context, array $blocks = array())
    {
        echo "Оплаты через банк";
    }

    // line 15
    public function block_keywords($context, array $blocks = array())
    {
        echo "Оплата через банк";
    }

    // line 16
    public function block_description($context, array $blocks = array())
    {
        echo "Оплата через банк";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Profile:order_print.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  415 => 16,  409 => 15,  403 => 13,  397 => 198,  391 => 194,  385 => 191,  381 => 189,  379 => 188,  376 => 187,  370 => 184,  366 => 182,  364 => 181,  361 => 180,  351 => 177,  347 => 175,  345 => 174,  342 => 173,  336 => 170,  332 => 168,  326 => 165,  322 => 163,  320 => 162,  316 => 160,  314 => 159,  310 => 157,  308 => 156,  297 => 150,  291 => 149,  287 => 147,  278 => 143,  273 => 140,  271 => 139,  268 => 138,  259 => 134,  255 => 133,  251 => 131,  249 => 130,  246 => 129,  239 => 123,  235 => 121,  225 => 116,  222 => 115,  214 => 113,  208 => 111,  205 => 110,  203 => 109,  194 => 105,  189 => 103,  183 => 102,  170 => 99,  165 => 96,  161 => 94,  154 => 90,  152 => 89,  148 => 88,  146 => 87,  142 => 85,  123 => 68,  116 => 66,  113 => 64,  111 => 63,  106 => 59,  99 => 55,  94 => 52,  92 => 51,  84 => 48,  77 => 44,  71 => 40,  68 => 37,  65 => 35,  63 => 34,  55 => 27,  41 => 16,  37 => 15,  32 => 13,  25 => 8,  22 => 1,);
    }
}
