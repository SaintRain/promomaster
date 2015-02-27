<?php

/* CoreOrderBundle:Order:finish.html.twig */
class __TwigTemplate_859c02c68c7338e0de9254f5b6a2613ce43a4c34c0ae403089a8328e8b8da442 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'meta_description' => array($this, 'block_meta_description'),
            'menu' => array($this, 'block_menu'),
            'js_head' => array($this, 'block_js_head'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
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

    // line 11
    public function block_title($context, array $blocks = array())
    {
        echo "Спасибо за покупку! | OliKids.ru";
    }

    // line 12
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "заказ, оформление, покупка, спасибо";
    }

    // line 13
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Благодарим за покупку в интернет-магазине детских товаров OliKids! Станьте нашим постоянным клиентом и получите беспрецендентную скидку на любые товары!";
    }

    // line 15
    public function block_menu($context, array $blocks = array())
    {
        echo " ";
    }

    // line 16
    public function block_js_head($context, array $blocks = array())
    {
        // line 17
        echo "
    ";
        // line 18
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "

    ";
        // line 20
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "d3b49e3_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d3b49e3_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/order_frontend.order_1.js");
            // line 26
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "d3b49e3_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d3b49e3_1") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/order_steps_2.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "d3b49e3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d3b49e3") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/order.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 28
        echo "
";
    }

    // line 31
    public function block_content($context, array $blocks = array())
    {
        // line 32
        echo "
    <div id=\"content\" class=\"order_page\" role=\"main\">

        ";
        // line 35
        if ((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order"))) {
            // line 36
            echo "
            <h2 class=\"order_thankyou\">Спасибо<br>за&nbsp;ваш заказ!</h2>

        ";
        }
        // line 40
        echo "
        <!-- main content col -->
        <div class=\"main_col\">
            <div class=\"main_col_pad\">

                ";
        // line 45
        if ((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order"))) {
            // line 46
            echo "
                    <div class=\"order_resume brown_gradient_box\">
                        <div class=\"order_resume_words\">
                            <h2><span>Ваш заказ оформлен</span></h2>
                            <p>На указанный адрес <strong>";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "recipientEmail", array()), "html", null, true);
            echo "</strong> отправлено письмо с информацией о вашем заказе.</p>
                            <p>Спасибо за то что воспользовались нашими услугами!</p>
                        </div>
                        <div class=\"order_resume_info\">
                            <h3>Заказ №";
            // line 54
            echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array())), "html", null, true);
            // line 56
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "extraStatus", array())) {
                // line 58
                echo "<span class=\"order_status\" style=\"color: #";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "extraStatus", array()), "hex", array()), "html", null, true);
                echo "\"> ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "extraStatus", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                echo "</span>";
            } else {
                // line 62
                echo "<span class=\"order_status done\">В обработке";
                if ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "isPaidStatus", array())) {
                    echo " (оплачен)";
                }
                echo "</span>";
            }
            // line 66
            echo "</h3>
                            <ul class=\"list_simple\">
                                <li>Оформлен: ";
            // line 68
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "createdDateTime", array()), "d.m.Y, H:i", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
            echo "</li>
                                <li>Сумма заказа: ";
            // line 69
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "total_cost_all", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</li>

                                ";
            // line 71
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryMethod", array())) {
                // line 72
                echo "
                                    <li>Доставка: ";
                // line 73
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryMethod", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                echo "</li>

                                ";
            }
            // line 76
            echo "
                                ";
            // line 77
            if ((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment"))) {
                // line 78
                echo "
                                    ";
                // line 79
                $context["paymentSystemCaption"] = $this->getAttribute($this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "system", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
                // line 80
                echo "                                    ";
                if ((($this->getAttribute($this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "system", array()), "system", array()) == "Robokassa") && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "query", array()), "get", array(0 => "shpsubsystem"), "method"))) {
                    // line 81
                    echo "                                        ";
                    $context["temp"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "system", array()), "subsystems", array()), "get", array(0 => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "query", array()), "get", array(0 => "shpsubsystem"), "method")), "method");
                    // line 82
                    echo "                                        ";
                    if ((($this->getAttribute($this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "system", array()), "system", array()) == "Robokassa") && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "query", array()), "get", array(0 => "shpsubsystem"), "method"))) {
                        // line 83
                        echo "                                            ";
                        $context["paymentSystemCaption"] = $this->getAttribute((isset($context["temp"]) ? $context["temp"] : $this->getContext($context, "temp")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
                        // line 84
                        echo "                                        ";
                    }
                    // line 85
                    echo "                                    ";
                }
                // line 86
                echo "
                                    <li>Оплата: ";
                // line 87
                echo twig_escape_filter($this->env, (isset($context["paymentSystemCaption"]) ? $context["paymentSystemCaption"] : $this->getContext($context, "paymentSystemCaption")), "html", null, true);
                echo "</li>

                                ";
            } elseif (((isset($context["paymentSystem"]) ? $context["paymentSystem"] : $this->getContext($context, "paymentSystem")) == "Balance")) {
                // line 90
                echo "
                                    <li>Оплата: С баланса<br>(остаток: ";
                // line 91
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('payment_extension')->getBalanceFunction($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "id", array()))), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                echo ")</li>

                                ";
            } elseif (((isset($context["paymentSystem"]) ? $context["paymentSystem"] : $this->getContext($context, "paymentSystem")) == "PaymentOnDelivery")) {
                // line 94
                echo "
                                    <li>Оплата: При получении (наложенный платеж)</li>

                                ";
            }
            // line 98
            echo "
                            </ul>

                            ";
            // line 101
            if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) {
                // line 102
                echo "
                                <a class=\"more_info\" href=\"";
                // line 103
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_profile_order", array("id" => $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array()))), "html", null, true);
                echo "\">Информация о заказе</a>

                                <br>

                                ";
                // line 107
                if (((isset($context["paymentSystem"]) ? $context["paymentSystem"] : $this->getContext($context, "paymentSystem")) != "BankTransfer")) {
                    // line 108
                    echo "
                                    <span>Через <span class=\"more_info_timer\">10</span> сек. Вы будете автоматически переадресованы на страницу с информацией о заказе.</span>

                                ";
                }
                // line 112
                echo "
                            ";
            }
            // line 114
            echo "
                        </div>
                    </div>

                ";
        }
        // line 119
        echo "
                ";
        // line 120
        if ((($this->getAttribute((isset($context["messages"]) ? $context["messages"] : null), "error", array(), "any", true, true) || $this->getAttribute((isset($context["messages"]) ? $context["messages"] : null), "success", array(), "any", true, true)) || ((isset($context["paymentSystem"]) ? $context["paymentSystem"] : $this->getContext($context, "paymentSystem")) == "BankTransfer"))) {
            // line 121
            echo "
                    <div class=\"order_resume_instruction\">
                        <div class=\"order_payment_instruction\">

                            ";
            // line 125
            if ($this->getAttribute((isset($context["messages"]) ? $context["messages"] : null), "error", array(), "any", true, true)) {
                // line 126
                echo "
                                ";
                // line 127
                if (((!(isset($context["order"]) ? $context["order"] : $this->getContext($context, "order"))) && (!(isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment"))))) {
                    // line 128
                    echo "
                                    <div class=\"attention_box\">

                                        Платежка и заказ не были найдены

                                    </div>

                                ";
                } else {
                    // line 136
                    echo "
                                    <div class=\"attention_box\">

                                        ";
                    // line 139
                    echo nl2br(twig_join_filter($this->getAttribute((isset($context["messages"]) ? $context["messages"] : $this->getContext($context, "messages")), "error", array()), "<br>"));
                    echo "

                                    </div>

                                ";
                }
                // line 144
                echo "
                            ";
            } elseif ($this->getAttribute((isset($context["messages"]) ? $context["messages"] : null), "success", array(), "any", true, true)) {
                // line 146
                echo "
                                <div class=\"info_box\">

                                    ";
                // line 149
                echo nl2br(twig_join_filter($this->getAttribute((isset($context["messages"]) ? $context["messages"] : $this->getContext($context, "messages")), "success", array()), "<br>"));
                echo "

                                </div>

                            ";
            }
            // line 154
            echo "
                            ";
            // line 155
            if (((isset($context["paymentSystem"]) ? $context["paymentSystem"] : $this->getContext($context, "paymentSystem")) == "BankTransfer")) {
                // line 156
                echo "
                                <h3>Реквизиты для оплаты заказа</h3>
                                ";
                // line 158
                $context["seller"] = $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array());
                // line 159
                echo "                                Получатель: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "legalForm", array()), "captionRu", array()), "html", null, true);
                echo " \"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "caption", array()), "html", null, true);
                echo "\"<br />
                                Банк: ";
                // line 160
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "bank", array()), "captionFull", array()), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "bank", array()), "address", array()), "html", null, true);
                echo "<br />
                                ИНН/КПП: ";
                // line 161
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "inn", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "kpp", array()), "html", null, true);
                echo "<br />
                                ОГРН: ";
                // line 162
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "ogrn", array()), "html", null, true);
                echo "<br />
                                БИК: ";
                // line 163
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "bank", array()), "bic", array()), "html", null, true);
                echo "<br />
                                К/счет: ";
                // line 164
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "corrAccount", array()), "html", null, true);
                echo "<br />
                                Р/счет: ";
                // line 165
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "paymentAccount", array()), "html", null, true);
                echo "<br />
                                Сумма: ";
                // line 166
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "amount", array()), "html", null, true);
                echo " руб.<br />
                                Примечание: Оплата заказа №";
                // line 167
                echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array())), "html", null, true);
                echo " (платеж №";
                echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "id", array())), "html", null, true);
                echo "). НДС нет.<br />
                                <br />
                                <a href=\"";
                // line 169
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_payment_bank_transfer_print_invoice", array("id" => $this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "id", array()), "type" => "invoice")), "html", null, true);
                echo "\" target=\"_blank\">Платежка</a>
                                &nbsp;&nbsp;&nbsp;
                                <a href=\"";
                // line 171
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_payment_bank_transfer_print_invoice", array("id" => $this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "id", array()), "type" => "savings_bank")), "html", null, true);
                echo "\" target=\"_blank\">Сбербанк</a>
                                <br /><br />

                            ";
            }
            // line 175
            echo "                        </div>
                    </div>
                ";
        }
        // line 178
        echo "                ";
        // line 194
        echo "            </div>
        </div>
        <!-- /main content col -->

        <!-- side content col -->
        <aside class=\"side_col\">
            <div class=\"call_us_sidebox\">
                <h2>Есть вопросы? Звоните!</h2>

                ";
        // line 203
        $context["phones"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : $this->getContext($context, "ServiceContainer")), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "phones"), "method");
        // line 204
        echo "                ";
        $context["phonesCaptions"] = array("rostov" => "в Ростове-на-Дону", "msk" => "в Москве", "spb" => "в Санкт-Петербурге");
        // line 205
        echo "
                <strong class=\"text-phone-selected\">";
        // line 206
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phones"]) ? $context["phones"] : $this->getContext($context, "phones")), "rostov", array(), "array"), "html", null, true);
        echo "</strong>
                <br>
                <span class=\"text_tgl text-city-selected\">";
        // line 208
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phonesCaptions"]) ? $context["phonesCaptions"] : $this->getContext($context, "phonesCaptions")), "rostov", array(), "array"), "html", null, true);
        echo "</span>
                <div class=\"header_contacts_dropdown dropdown\">
                    <ul>
                        ";
        // line 211
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["phones"]) ? $context["phones"] : $this->getContext($context, "phones")));
        foreach ($context['_seq'] as $context["key"] => $context["phone"]) {
            // line 212
            echo "                            ";
            if ($this->getAttribute((isset($context["phonesCaptions"]) ? $context["phonesCaptions"] : null), $context["key"], array(), "array", true, true)) {
                // line 213
                echo "
                                <li id=\"";
                // line 214
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
            // line 217
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['phone'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 218
        echo "                    </ul>
                </div>
            </div>
            <div class=\"work_time_sidebox\">
                <h2>Время работы:</h2>
                <strong>Пн. —&nbsp;Пт. с&nbsp;09:00 до&nbsp;18:00&nbsp;МСК</strong><br>
            </div>

        </aside>
        <!-- /side content col -->

    </div>

";
    }

    // line 233
    public function block_footer($context, array $blocks = array())
    {
        // line 236
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "environment", array()) == "prod")) {
            // line 237
            $context["mixMarketList"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : $this->getContext($context, "ServiceContainer")), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "mix-market"), "method");
            // line 238
            echo "        ";
            echo $this->getAttribute((isset($context["mixMarketList"]) ? $context["mixMarketList"] : $this->getContext($context, "mixMarketList")), "finish", array(), "array");
            echo "
        <script type=\"text/javascript\">
            var yaParams = {
                order_id: \"";
            // line 241
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array()), "html", null, true);
            echo "\",
                order_price: ";
            // line 242
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "composition_total_cost", array()), "html", null, true);
            echo ",
                currency: \"";
            // line 243
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : $this->getContext($context, "ServiceContainer")), "getParameter", array(0 => "default_currency"), "method"), "html", null, true);
            echo "\",
                exchange_rate: 1,
                goods:
                   [";
            // line 247
            $context["i"] = 0;
            // line 248
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "compositions", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                // line 249
                echo "{
                            id: \"";
                // line 250
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["c"], "product", array()), "id", array()), "html", null, true);
                echo "\",
                            name: \"";
                // line 251
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["c"], "product", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                echo "\",
                            price: ";
                // line 252
                echo twig_escape_filter($this->env, $this->getAttribute($context["c"], "price", array()), "html", null, true);
                echo ",
                            quantity: ";
                // line 253
                echo twig_escape_filter($this->env, $this->getAttribute($context["c"], "quantity", array()), "html", null, true);
                echo "
                        }";
                // line 255
                $context["i"] = ((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")) + 1);
                // line 256
                if (((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")) != $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "compositions", array()), "count", array()))) {
                    // line 257
                    echo ",";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 260
            echo "]
            };
        </script>";
        }
        // line 266
        $this->displayParentBlock("footer", $context, $blocks);
        echo "

";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Order:finish.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  550 => 266,  545 => 260,  538 => 257,  536 => 256,  534 => 255,  530 => 253,  526 => 252,  522 => 251,  518 => 250,  515 => 249,  511 => 248,  509 => 247,  503 => 243,  499 => 242,  495 => 241,  488 => 238,  486 => 237,  484 => 236,  481 => 233,  464 => 218,  458 => 217,  444 => 214,  441 => 213,  438 => 212,  434 => 211,  428 => 208,  423 => 206,  420 => 205,  417 => 204,  415 => 203,  404 => 194,  402 => 178,  397 => 175,  390 => 171,  385 => 169,  378 => 167,  374 => 166,  370 => 165,  366 => 164,  362 => 163,  358 => 162,  352 => 161,  346 => 160,  339 => 159,  337 => 158,  333 => 156,  331 => 155,  328 => 154,  320 => 149,  315 => 146,  311 => 144,  303 => 139,  298 => 136,  288 => 128,  286 => 127,  283 => 126,  281 => 125,  275 => 121,  273 => 120,  270 => 119,  263 => 114,  259 => 112,  253 => 108,  251 => 107,  244 => 103,  241 => 102,  239 => 101,  234 => 98,  228 => 94,  220 => 91,  217 => 90,  211 => 87,  208 => 86,  205 => 85,  202 => 84,  199 => 83,  196 => 82,  193 => 81,  190 => 80,  188 => 79,  185 => 78,  183 => 77,  180 => 76,  174 => 73,  171 => 72,  169 => 71,  162 => 69,  158 => 68,  154 => 66,  147 => 62,  140 => 58,  138 => 56,  136 => 54,  129 => 50,  123 => 46,  121 => 45,  114 => 40,  108 => 36,  106 => 35,  101 => 32,  98 => 31,  93 => 28,  73 => 26,  69 => 20,  64 => 18,  61 => 17,  58 => 16,  52 => 15,  46 => 13,  40 => 12,  34 => 11,);
    }
}
