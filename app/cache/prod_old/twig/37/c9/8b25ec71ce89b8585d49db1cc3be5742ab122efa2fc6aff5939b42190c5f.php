<?php

/* ApplicationSonataUserBundle:Profile:order_more.html.twig */
class __TwigTemplate_37c98b25ec71ce89b8585d49db1cc3be5742ab122efa2fc6aff5939b42190c5f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataUserBundle::cabinet_layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'meta_description' => array($this, 'block_meta_description'),
            'js_head' => array($this, 'block_js_head'),
            'main_content' => array($this, 'block_main_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataUserBundle::cabinet_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 11
    public function block_title($context, array $blocks = array())
    {
        echo "Заказ №";
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array())), "html", null, true);
        echo " от ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "createdDateTime", array()), "d.m.Y, H:i", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
        echo " | OliKids.ru";
    }

    // line 12
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "заказ, информация";
    }

    // line 13
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Подробная информация о заказе №";
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array())), "html", null, true);
        echo " от ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "createdDateTime", array()), "d.m.Y, H:i", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
        echo " на сайте OliKids. Список заказанных товаров, информация об оплате.";
    }

    // line 15
    public function block_js_head($context, array $blocks = array())
    {
        // line 16
        echo "    ";
        ob_start();
        // line 17
        echo "
        ";
        // line 18
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "

        ";
        // line 20
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "71f3162_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_71f3162_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/profile_frontend.order_1.js");
            // line 26
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "71f3162_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_71f3162_1") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/profile_frontend.profile_2.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "71f3162"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_71f3162") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/profile.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 28
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 32
    public function block_main_content($context, array $blocks = array())
    {
        // line 33
        echo "    ";
        ob_start();
        // line 34
        echo "
        <ul class=\"cabinet_page_path page_path_links\">
            <li class=\"page_path_link\"><a href=\"";
        // line 36
        echo $this->env->getExtension('routing')->getPath("application_sonata_user_profile_orders_history_list_first_page");
        echo "\">Мои заказы</a></li>
            <li class=\"page_path_link\"><strong>Заказ №";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array())), "html", null, true);
        echo "</strong></li>
        </ul>

        <div ";
        // line 40
        echo $this->env->getExtension('fastedit_extension')->fastEditFunction((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")));
        echo " class=\"cabinet_order\">

            <h2>Заказ №";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array())), "html", null, true);
        // line 44
        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "extraStatus", array())) {
            // line 46
            echo "<span class=\"order_status\" style=\"color: #";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "extraStatus", array()), "hex", array()), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "extraStatus", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo "</span>";
        } else {
            // line 50
            echo "<span class=\"order_status pending\"> В обработке</span>";
        }
        // line 54
        echo "</h2>

            <div class=\"cabinet_order_summary\">
                <ul class=\"cabinet_order_summary_col list_simple\">
                    <li>Оформлен: ";
        // line 58
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "createdDateTime", array()), "d.m.Y, H:i", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
        echo "</li>
                    <li>Сумма заказа: ";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction((($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "history_info", array(), "array", true, true)) ? ($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "history_info", array(), "array"), "total_cost_all", array(), "array")) : ($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "total_cost_all", array(), "array")))), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</li>

                    ";
        // line 61
        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryMethod", array())) {
            // line 62
            echo "
                        <li>Доставка: ";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryMethod", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo "</li>

                    ";
        }
        // line 66
        echo "
                    ";
        // line 67
        if (($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "id", array()) != $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "current_contragent_id"), "method"))) {
            // line 68
            echo "
                        <li>Контрагент:&nbsp;";
            // line 70
            if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array(), "any", false, true), "legalForm", array(), "any", true, true)) {
                // line 71
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "organization", array()), "html", null, true);
            } else {
                // line 73
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "lastName", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "firstName", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "surName", array()), "html", null, true);
            }
            // line 75
            echo "</li>

                    ";
        }
        // line 78
        echo "
                </ul>
                <ul class=\"cabinet_order_summary_col files list_simple\">
                    <li><a class=\"file with_icon\" target=\"_blank\" href=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_profile_order_print", array("id" => $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array()), "type" => "warranty", "needStamps" => 1)), "html", null, true);
        echo "\">Гарантийный талон</a></li>
                    <li><a class=\"file with_icon\" target=\"_blank\" href=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_profile_order_print", array("id" => $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array()), "type" => "self", "needStamps" => 0)), "html", null, true);
        echo "\">Печатная форма заказа</a></li>
                    <li><a class=\"file with_icon\" target=\"_blank\" href=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_profile_order_print", array("id" => $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array()), "type" => "waybill", "needStamps" => 0)), "html", null, true);
        echo "\">Товарная накладная</a></li>
                </ul>
                <ul class=\"cabinet_order_summary_col service list_simple\">
                    <li><a class=\"ask with_icon text_tgl\" href=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("trouble_ticket_contact_with_order_id", array("order_id" => $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array()))), "html", null, true);
        echo "#ask-a-question\">Задать вопрос по заказу</a></li>
                        ";
        // line 88
        echo "                </ul>
            </div>

            <section class=\"cabinet_order_list border_box\">
                <h3>Состав заказа</h3>
                <table class=\"cabinet_order_list\">
                    <tbody>

                        ";
        // line 96
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "compositions", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["composition"]) {
            // line 97
            echo "
                            <tr class=\"cabinet_order_list_product\">
                                <td>
                                    ";
            // line 100
            if ($this->getAttribute($this->getAttribute($context["composition"], "product", array()), "isEnabled", array())) {
                // line 101
                echo "                                        <a class=\"cabinet_order_list_product_name\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_product", array("slug" => $this->getAttribute($this->getAttribute($context["composition"], "product", array()), "slug", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["composition"], "product", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                echo "</a>
                                        ";
            } else {
                // line 103
                echo "                                            <b class=\"cabinet_order_list_product_name\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["composition"], "product", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                echo "</b>
                                    ";
            }
            // line 106
            $context["size"] = null;
            // line 107
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["composition"], "product", array()), "productDataProperty", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["pdp"]) {
                // line 108
                if (($this->getAttribute($this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "property", array()), "name", array()) == "size")) {
                    // line 109
                    $context["size"] = $this->getAttribute($this->getAttribute($context["pdp"], "data", array()), "value", array());
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pdp'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 113
            echo "<p class=\"cabinet_order_list_product_specs\">";
            // line 114
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($context["composition"], "product", array()), "color", array())) ? (($this->getAttribute($this->getAttribute($this->getAttribute($context["composition"], "product", array()), "color", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))) . " цвет")) : ("")), "html", null, true);
            echo ((($this->getAttribute($this->getAttribute($context["composition"], "product", array()), "color", array()) && (isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")))) ? (", ") : (""));
            echo twig_escape_filter($this->env, (((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size"))) ? (((isset($context["size"]) ? $context["size"] : $this->getContext($context, "size")) . "  размер")) : ("")), "html", null, true);
            if ($this->getAttribute($this->getAttribute($context["composition"], "product", array()), "sku", array())) {
                echo " (SKU: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["composition"], "product", array()), "sku", array()), "html", null, true);
                echo ")";
            }
            echo "<br>
                                    </p>
                                </td>
                                <td class=\"cabinet_order_list_product_qnt\">";
            // line 117
            echo twig_escape_filter($this->env, $this->getAttribute($context["composition"], "quantity", array()), "html", null, true);
            echo " шт.</td>
                                <td class=\"cabinet_order_list_product_price\">
                                    <div class=\"product_price\">";
            // line 119
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($context["composition"], "cost", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</div>

                                    ";
            // line 121
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "composition", array(), "array"), $this->getAttribute($this->getAttribute($context["composition"], "product", array()), "id", array()), array(), "array"), "discountValue", array(), "array") > 0)) {
                // line 122
                echo "                                        ";
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "composition", array(), "array"), $this->getAttribute($this->getAttribute($context["composition"], "product", array()), "id", array()), array(), "array"), "isDiscountValueInPercent", array(), "array")) {
                    // line 123
                    echo "
                                            <span class=\"discount\">";
                    // line 124
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "composition", array(), "array"), $this->getAttribute($this->getAttribute($context["composition"], "product", array()), "id", array()), array(), "array"), "discountValue", array(), "array"), "html", null, true);
                    echo " %</span>

                                        ";
                } else {
                    // line 127
                    echo "
                                            <span class=\"discount\">";
                    // line 128
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "composition", array(), "array"), $this->getAttribute($this->getAttribute($context["composition"], "product", array()), "id", array()), array(), "array"), "discountValue", array(), "array")), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                    echo "</span>

                                        ";
                }
                // line 131
                echo "                                    ";
            }
            // line 132
            echo "
                                </td>
                            </tr>

                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['composition'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 137
        echo "
                    </tbody>
                </table>
                <table class=\"cabinet_order_list_total\">
                    <tbody>
                        <tr>
                            <td>Товаров на сумму</td>
                            <td class=\"sum price\">";
        // line 144
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "composition_total_cost", array(), "array")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</td>
                        </tr>
                        ";
        // line 150
        echo "
                        ";
        // line 151
        if ((($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "delivery_cost", array(), "array") > 0) && $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryMethod", array()))) {
            // line 152
            echo "
                            <tr>
                                <td>Доставка: ";
            // line 154
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryMethod", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo "</td>
                                <td class=\"sum price\">";
            // line 155
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "delivery_cost", array(), "array")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</td>
                            </tr>

                        ";
        }
        // line 159
        echo "
                        ";
        // line 160
        if (($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "total_discount_summ", array(), "array") > 0)) {
            // line 161
            echo "
                            <tr class=\"discount\">
                                <td>Скидка</td>
                                <td class=\"sum price\">-";
            // line 164
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "total_discount_summ", array(), "array")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</td>
                            </tr>

                        ";
        }
        // line 168
        echo "
                        <tr class=\"cabinet_order_list_total_sum\">
                            <td>Общая стоимость";
        // line 170
        if ((($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "delivery_cost", array(), "array") > 0) && $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryMethod", array()))) {
            echo " c учетом доставки";
        }
        echo "</td>
                            <td class=\"sum price\">";
        // line 171
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "total_cost_all", array(), "array")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <section class=\"cabinet_order_payment border_box\">

                ";
        // line 179
        if ((((!$this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "isPaidStatus", array())) && (!$this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "isCanceledStatus", array()))) && ((!$this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryMethod", array())) || (!$this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryMethod", array()), "isCashOnDelivery", array()))))) {
            // line 180
            echo "
                    ";
            // line 181
            if (($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "payments", array()) && $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "payments", array()), "count", array()))) {
                // line 182
                echo "                        <span class=\"cabinet_order_payment_change_tgl text_tgl\">Изменить способ оплаты</span>
                    ";
            } else {
                // line 184
                echo "                        <span class=\"cabinet_order_payment_change_tgl text_tgl\">Оплатить ";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction((($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "history_info", array(), "array", true, true)) ? ($this->getAttribute($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "history_info", array(), "array"), "total_cost_all", array(), "array")) : ($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "total_cost_all", array(), "array")))), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                echo "</span>                            
                    ";
            }
            // line 186
            echo "
                ";
        }
        // line 188
        echo "
                <h3 id=\"anchor_payment\">Оплата</h3>

                ";
        // line 191
        if (($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "payments", array()) && $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "payments", array()), "count", array()))) {
            // line 192
            echo "                    ";
            $context["break"] = 0;
            // line 193
            echo "
                    ";
            // line 194
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "payments", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["payment"]) {
                if (($this->getAttribute($context["payment"], "type", array()) && (!(isset($context["break"]) ? $context["break"] : $this->getContext($context, "break"))))) {
                    // line 195
                    echo "
                        ";
                    // line 196
                    $context["break"] = 1;
                    // line 197
                    echo "
                        ";
                    // line 198
                    $context["systemKey"] = (($this->getAttribute($context["payment"], "system", array())) ? ($this->getAttribute($this->getAttribute($context["payment"], "system", array()), "system", array())) : ("Balance"));
                    // line 199
                    echo "
                        <h4 class=\"payment_h4\">Платеж №";
                    // line 200
                    echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute($context["payment"], "id", array())), "html", null, true);
                    echo "</h4>

                        ";
                    // line 202
                    if ((!$this->getAttribute($context["payment"], "isPassed", array()))) {
                        // line 203
                        echo "
                            <div class=\"cabinet_order_unit_status cancelled\">Платеж не выполнен. ";
                        // line 204
                        if ((((!$this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "isPaidStatus", array())) && ((isset($context["systemKey"]) ? $context["systemKey"] : $this->getContext($context, "systemKey")) != "BankTransfer")) && ((!$this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryMethod", array())) || (!$this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryMethod", array()), "isCashOnDelivery", array()))))) {
                            echo "Повторите платеж или выберите другой способ оплаты";
                        }
                        echo "</div>

                        ";
                    }
                    // line 207
                    echo "
                        <ul class=\"list_simple\">

                            ";
                    // line 210
                    if (((((!$this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "isPaidStatus", array())) && (!$this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "isCanceledStatus", array()))) && twig_in_filter((isset($context["systemKey"]) ? $context["systemKey"] : $this->getContext($context, "systemKey")), array(0 => "Robokassa", 1 => "PayPal", 2 => "YandexMoney", 3 => "PlasticCard"))) && (!$this->getAttribute($context["payment"], "isPassed", array())))) {
                        // line 211
                        echo "
                                <li><a id=\"paymentRetry\" href=\"#\" data-payment-system=\"";
                        // line 212
                        echo twig_escape_filter($this->env, (isset($context["systemKey"]) ? $context["systemKey"] : $this->getContext($context, "systemKey")), "html", null, true);
                        echo "\">Повторить платеж</a></li>

                            ";
                    }
                    // line 215
                    echo "
                            <li>Способ оплаты: ";
                    // line 216
                    echo twig_escape_filter($this->env, (($this->getAttribute($context["payment"], "system", array())) ? ($this->getAttribute($this->getAttribute($context["payment"], "system", array()), "captionRu", array())) : ("Баланс")), "html", null, true);
                    echo "</li>
                            <li>Статус оплаты: ";
                    // line 217
                    if ($this->getAttribute($context["payment"], "isPassed", array())) {
                        echo "Выполнен";
                    } else {
                        echo "Не выполнен";
                    }
                    echo "</li>

                            ";
                    // line 219
                    if ((((isset($context["systemKey"]) ? $context["systemKey"] : $this->getContext($context, "systemKey")) == "BankTransfer") && (!$this->getAttribute($context["payment"], "isPassed", array())))) {
                        // line 220
                        echo "                                ";
                        $context["seller"] = $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array());
                        // line 221
                        echo "                                <li>
                                    <pre>
Банковские реквизиты:
    Получатель: ";
                        // line 224
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "legalForm", array()), "captionRu", array()), "html", null, true);
                        echo " \"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "caption", array()), "html", null, true);
                        echo "\"
    Банк: ";
                        // line 225
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "bank", array()), "captionFull", array()), "html", null, true);
                        echo ", ";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "bank", array()), "address", array()), "html", null, true);
                        echo "
    ИНН/КПП: ";
                        // line 226
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "inn", array()), "html", null, true);
                        echo "/";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "kpp", array()), "html", null, true);
                        echo "
    ОГРН: ";
                        // line 227
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "ogrn", array()), "html", null, true);
                        echo "
    БИК: ";
                        // line 228
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "bank", array()), "bic", array()), "html", null, true);
                        echo "
    К/счет: ";
                        // line 229
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "corrAccount", array()), "html", null, true);
                        echo "
    Р/счет: ";
                        // line 230
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "paymentAccount", array()), "html", null, true);
                        echo "
    Сумма: ";
                        // line 231
                        echo twig_escape_filter($this->env, $this->getAttribute($context["payment"], "amount", array()), "html", null, true);
                        echo " руб.
    Примечание: Оплата заказа №";
                        // line 232
                        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array())), "html", null, true);
                        echo " (платеж №";
                        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute($context["payment"], "id", array())), "html", null, true);
                        echo "). НДС нет.
                                    </pre>

                                    <br />
                                    <a href=\"";
                        // line 236
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_payment_bank_transfer_print_invoice", array("id" => $this->getAttribute($context["payment"], "id", array()), "type" => "invoice")), "html", null, true);
                        echo "\" target=\"_blank\">Платежка</a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href=\"";
                        // line 238
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_payment_bank_transfer_print_invoice", array("id" => $this->getAttribute($context["payment"], "id", array()), "type" => "savings_bank")), "html", null, true);
                        echo "\" target=\"_blank\">Сбербанк</a>
                                    <br /><br />
                                </li>
                            ";
                    }
                    // line 242
                    echo "
                        </ul>

                    ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['payment'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 246
            echo "
                ";
        } elseif ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "isPaidStatus", array())) {
            // line 248
            echo "
                    <ul class=\"list_simple\">
                        <li>Способ оплаты: c баланса</li>
                        <li>Статус оплаты: Выполнен</li>
                    </ul>

                ";
        }
        // line 255
        echo "
            </section>

            ";
        // line 258
        if ((((($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "recipientFio", array()) || $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryCity", array())) || $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "recipientPhone", array())) || $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "recipientEmail", array())) || $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryMethod", array()))) {
            // line 259
            echo "
                <section class=\"cabinet_order_delivery border_box\">
                    <h3>Получатель и адрес доставки</h3>
                    ";
            // line 263
            echo "                    <ul class=\"list_simple\">

                        ";
            // line 265
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "recipientFio", array())) {
                // line 266
                echo "
                            <li><strong>";
                // line 267
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "recipientFio", array()), "html", null, true);
                echo "</strong></li>

                        ";
            } else {
                // line 270
                echo "
                            <li><strong>";
                // line 271
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "recipientCompany", array()), "html", null, true);
                echo "</strong></li>

                        ";
            }
            // line 274
            echo "
                        ";
            // line 275
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryCity", array())) {
                // line 276
                echo "
                            <li>Российская Федерация, ";
                // line 277
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryCity", array()), "postIndex", array()), "html", null, true);
                echo ", г. ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryCity", array()), "name", array()), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryAddress", array()), "html", null, true);
                echo "</li>

                        ";
            }
            // line 280
            echo "
                        ";
            // line 281
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "recipientPhone", array())) {
                // line 282
                echo "
                            <li>Контактный телефон: ";
                // line 283
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "recipientPhone", array()), "html", null, true);
                echo "</li>

                        ";
            }
            // line 286
            echo "
                        ";
            // line 287
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "recipientEmail", array())) {
                // line 288
                echo "
                            <li>E-mail: ";
                // line 289
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "recipientEmail", array()), "html", null, true);
                echo "</li>

                        ";
            }
            // line 292
            echo "
                    </ul>

                    ";
            // line 295
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryMethod", array())) {
                // line 296
                echo "
                        <ul class=\"list_simple\">
                            <li>Доставка: ";
                // line 298
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryMethod", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                if (($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "delivery_cost", array(), "array") > 0)) {
                    echo ", ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "delivery_cost", array(), "array")), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                }
                echo "</li>
                        </ul>

                    ";
            }
            // line 302
            echo "
                </section>

            ";
        }
        // line 306
        echo "
        </div>

        <div class=\"modal_window change_payment_type\">
            <h2>Изменение способа оплаты</h2>

            ";
        // line 312
        $this->env->loadTemplate("CoreOrderBundle:Order/Block:payment_system_switcher.html.twig")->display($context);
        // line 313
        echo "
            <br>

            <form method=\"POST\" action=\"#anchor_payment\">

                <input id=\"PaymentSystem\" type=\"hidden\" name=\"PaymentSystem\">
                <input type=\"hidden\" name=\"orderId\" value=\"";
        // line 319
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array()), "html", null, true);
        echo "\">

                <div class=\"modal_window_action\">
                    <button class=\"common_button big\" type=\"submit\"><span>";
        // line 322
        if (($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "payments", array()) && $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "payments", array()), "count", array()))) {
            echo "Сохранить изменения";
        } else {
            echo "Оплатить";
        }
        echo "</span></button> или <span class=\"text_tgl modal_window_close_by_cancel\">Отменить</span>
                </div>
            </form>

            <span class=\"modal_window_close\" title=\"Закрыть\">Закрыть</span>
        </div>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Profile:order_more.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  744 => 322,  738 => 319,  730 => 313,  728 => 312,  720 => 306,  714 => 302,  701 => 298,  697 => 296,  695 => 295,  690 => 292,  684 => 289,  681 => 288,  679 => 287,  676 => 286,  670 => 283,  667 => 282,  665 => 281,  662 => 280,  652 => 277,  649 => 276,  647 => 275,  644 => 274,  638 => 271,  635 => 270,  629 => 267,  626 => 266,  624 => 265,  620 => 263,  615 => 259,  613 => 258,  608 => 255,  599 => 248,  595 => 246,  585 => 242,  578 => 238,  573 => 236,  564 => 232,  560 => 231,  556 => 230,  552 => 229,  548 => 228,  544 => 227,  538 => 226,  532 => 225,  526 => 224,  521 => 221,  518 => 220,  516 => 219,  507 => 217,  503 => 216,  500 => 215,  494 => 212,  491 => 211,  489 => 210,  484 => 207,  476 => 204,  473 => 203,  471 => 202,  466 => 200,  463 => 199,  461 => 198,  458 => 197,  456 => 196,  453 => 195,  448 => 194,  445 => 193,  442 => 192,  440 => 191,  435 => 188,  431 => 186,  423 => 184,  419 => 182,  417 => 181,  414 => 180,  412 => 179,  399 => 171,  393 => 170,  389 => 168,  380 => 164,  375 => 161,  373 => 160,  370 => 159,  361 => 155,  357 => 154,  353 => 152,  351 => 151,  348 => 150,  341 => 144,  332 => 137,  322 => 132,  319 => 131,  311 => 128,  308 => 127,  302 => 124,  299 => 123,  296 => 122,  294 => 121,  287 => 119,  282 => 117,  269 => 114,  267 => 113,  260 => 109,  258 => 108,  254 => 107,  252 => 106,  246 => 103,  238 => 101,  236 => 100,  231 => 97,  227 => 96,  217 => 88,  213 => 86,  207 => 83,  203 => 82,  199 => 81,  194 => 78,  189 => 75,  182 => 73,  179 => 71,  177 => 70,  174 => 68,  172 => 67,  169 => 66,  163 => 63,  160 => 62,  158 => 61,  151 => 59,  147 => 58,  141 => 54,  138 => 50,  131 => 46,  129 => 44,  127 => 42,  122 => 40,  116 => 37,  112 => 36,  108 => 34,  105 => 33,  102 => 32,  96 => 28,  76 => 26,  72 => 20,  67 => 18,  64 => 17,  61 => 16,  58 => 15,  48 => 13,  42 => 12,  32 => 11,);
    }
}
