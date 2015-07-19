<?php

/* CoreOrderBundle:Order:finish.html.twig */
class __TwigTemplate_0a9bf00a176cb4c323fda6e28dabb87d4cc763856600a089575ad3f070d0d7a4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 9
        try {
            $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(9);

            throw $e;
        }

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
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "d3b49e3_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d3b49e3_1") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/order_steps_2.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "d3b49e3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d3b49e3") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/order.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
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
        if ((isset($context["order"]) ? $context["order"] : null)) {
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
        if ((isset($context["order"]) ? $context["order"] : null)) {
            // line 46
            echo "
                    <div class=\"order_resume brown_gradient_box\">
                        <div class=\"order_resume_words\">
                            <h2><span>Ваш заказ оформлен</span></h2>
                            <p>На указанный адрес <strong>";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientEmail", array()), "html", null, true);
            echo "</strong> отправлено письмо с информацией о вашем заказе.</p>
                            <p>Спасибо за то что воспользовались нашими услугами!</p>
                        </div>
                        <div class=\"order_resume_info\">
                            <h3>Заказ №";
            // line 54
            echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())), "html", null, true);
            // line 56
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "extraStatus", array())) {
                // line 58
                echo "<span class=\"order_status\" style=\"color: #";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "extraStatus", array()), "hex", array()), "html", null, true);
                echo "\"> ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "extraStatus", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                echo "</span>";
            } else {
                // line 62
                echo "<span class=\"order_status done\">В обработке";
                if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "isPaidStatus", array())) {
                    echo " (оплачен)";
                }
                echo "</span>";
            }
            // line 66
            echo "</h3>
                            <ul class=\"list_simple\">
                                <li>Оформлен: ";
            // line 68
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "createdDateTime", array()), "d.m.Y, H:i", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            echo "</li>
                                <li>Сумма заказа: ";
            // line 69
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "total_cost_all", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</li>

                                ";
            // line 71
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryMethod", array())) {
                // line 72
                echo "
                                    <li>Доставка: ";
                // line 73
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryMethod", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                echo "</li>

                                ";
            }
            // line 76
            echo "
                                ";
            // line 77
            if ((isset($context["payment"]) ? $context["payment"] : null)) {
                // line 78
                echo "
                                    ";
                // line 79
                $context["paymentSystemCaption"] = $this->getAttribute($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "system", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
                // line 80
                echo "                                    ";
                if ((($this->getAttribute($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "system", array()), "system", array()) == "Robokassa") && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "query", array()), "get", array(0 => "shpsubsystem"), "method"))) {
                    // line 81
                    echo "                                        ";
                    $context["temp"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "system", array()), "subsystems", array()), "get", array(0 => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "query", array()), "get", array(0 => "shpsubsystem"), "method")), "method");
                    // line 82
                    echo "                                        ";
                    if ((($this->getAttribute($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "system", array()), "system", array()) == "Robokassa") && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "query", array()), "get", array(0 => "shpsubsystem"), "method"))) {
                        // line 83
                        echo "                                            ";
                        $context["paymentSystemCaption"] = $this->getAttribute((isset($context["temp"]) ? $context["temp"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
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
                echo twig_escape_filter($this->env, (isset($context["paymentSystemCaption"]) ? $context["paymentSystemCaption"] : null), "html", null, true);
                echo "</li>

                                ";
            } elseif ((            // line 89
(isset($context["paymentSystem"]) ? $context["paymentSystem"] : null) == "Balance")) {
                // line 90
                echo "
                                    <li>Оплата: С баланса<br>(остаток: ";
                // line 91
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('payment_extension')->getBalanceFunction($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "id", array()))), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                echo ")</li>

                                ";
            } elseif ((            // line 93
(isset($context["paymentSystem"]) ? $context["paymentSystem"] : null) == "PaymentOnDelivery")) {
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
            if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
                // line 102
                echo "
                                <a class=\"more_info\" href=\"";
                // line 103
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_profile_order", array("id" => $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array()))), "html", null, true);
                echo "\">Информация о заказе</a>

                                <br>

                                ";
                // line 107
                if (((isset($context["paymentSystem"]) ? $context["paymentSystem"] : null) != "BankTransfer")) {
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
        if ((($this->getAttribute((isset($context["messages"]) ? $context["messages"] : null), "error", array(), "any", true, true) || $this->getAttribute((isset($context["messages"]) ? $context["messages"] : null), "success", array(), "any", true, true)) || ((isset($context["paymentSystem"]) ? $context["paymentSystem"] : null) == "BankTransfer"))) {
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
                if (( !(isset($context["order"]) ? $context["order"] : null) &&  !(isset($context["payment"]) ? $context["payment"] : null))) {
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
                    echo nl2br(twig_join_filter($this->getAttribute((isset($context["messages"]) ? $context["messages"] : null), "error", array()), "<br>"));
                    echo "

                                    </div>

                                ";
                }
                // line 144
                echo "
                            ";
            } elseif ($this->getAttribute(            // line 145
(isset($context["messages"]) ? $context["messages"] : null), "success", array(), "any", true, true)) {
                // line 146
                echo "
                                <div class=\"info_box\">

                                    ";
                // line 149
                echo nl2br(twig_join_filter($this->getAttribute((isset($context["messages"]) ? $context["messages"] : null), "success", array()), "<br>"));
                echo "

                                </div>

                            ";
            }
            // line 154
            echo "
                            ";
            // line 155
            if (((isset($context["paymentSystem"]) ? $context["paymentSystem"] : null) == "BankTransfer")) {
                // line 156
                echo "
                                <h3>Реквизиты для оплаты заказа</h3>
                                ";
                // line 158
                $context["seller"] = $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array());
                // line 159
                echo "                                Получатель: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "legalForm", array()), "captionRu", array()), "html", null, true);
                echo " \"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "caption", array()), "html", null, true);
                echo "\"<br />
                                Банк: ";
                // line 160
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "bank", array()), "captionFull", array()), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "bank", array()), "address", array()), "html", null, true);
                echo "<br />
                                ИНН/КПП: ";
                // line 161
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "inn", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "kpp", array()), "html", null, true);
                echo "<br />
                                ОГРН: ";
                // line 162
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "ogrn", array()), "html", null, true);
                echo "<br />
                                БИК: ";
                // line 163
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "bank", array()), "bic", array()), "html", null, true);
                echo "<br />
                                К/счет: ";
                // line 164
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "corrAccount", array()), "html", null, true);
                echo "<br />
                                Р/счет: ";
                // line 165
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "paymentAccount", array()), "html", null, true);
                echo "<br />
                                Сумма: ";
                // line 166
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "amount", array()), "html", null, true);
                echo " руб.<br />
                                Примечание: Оплата заказа №";
                // line 167
                echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())), "html", null, true);
                echo " (платеж №";
                echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "id", array())), "html", null, true);
                echo "). НДС нет.<br />
                                <br />
                                <a href=\"";
                // line 169
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_payment_bank_transfer_print_invoice", array("id" => $this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "id", array()), "type" => "invoice")), "html", null, true);
                echo "\" target=\"_blank\">Платежка</a>
                                &nbsp;&nbsp;&nbsp;
                                <a href=\"";
                // line 171
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_payment_bank_transfer_print_invoice", array("id" => $this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "id", array()), "type" => "savings_bank")), "html", null, true);
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
        $context["phones"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "phones"), "method");
        // line 204
        echo "                ";
        $context["phonesCaptions"] = array("rostov" => "в Ростове-на-Дону", "msk" => "в Москве", "spb" => "в Санкт-Петербурге");
        // line 205
        echo "
                <strong class=\"text-phone-selected\">";
        // line 206
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phones"]) ? $context["phones"] : null), "rostov", array(), "array"), "html", null, true);
        echo "</strong>
                <br>
                <span class=\"text_tgl text-city-selected\">";
        // line 208
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phonesCaptions"]) ? $context["phonesCaptions"] : null), "rostov", array(), "array"), "html", null, true);
        echo "</span>
                <div class=\"header_contacts_dropdown dropdown\">
                    <ul>
                        ";
        // line 211
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["phones"]) ? $context["phones"] : null));
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
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phonesCaptions"]) ? $context["phonesCaptions"] : null), $context["key"], array(), "array"), "html", null, true);
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
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "environment", array()) == "prod")) {
            // line 237
            $context["mixMarketList"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "mix-market"), "method");
            // line 238
            echo "        ";
            echo $this->getAttribute((isset($context["mixMarketList"]) ? $context["mixMarketList"] : null), "finish", array(), "array");
            echo "
        <script type=\"text/javascript\">
            var yaParams = {
                order_id: \"";
            // line 241
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array()), "html", null, true);
            echo "\",
                order_price: ";
            // line 242
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : null), "composition_total_cost", array()), "html", null, true);
            echo ",
                currency: \"";
            // line 243
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "getParameter", array(0 => "default_currency"), "method"), "html", null, true);
            echo "\",
                exchange_rate: 1,
                goods:
                   [";
            // line 247
            $context["i"] = 0;
            // line 248
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "compositions", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                // line 249
                echo "{
                            id: \"";
                // line 250
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["c"], "product", array()), "id", array()), "html", null, true);
                echo "\",
                            name: \"";
                // line 251
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["c"], "product", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
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
                $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
                // line 256
                if (((isset($context["i"]) ? $context["i"] : null) != $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "compositions", array()), "count", array()))) {
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
        return array (  561 => 266,  556 => 260,  549 => 257,  547 => 256,  545 => 255,  541 => 253,  537 => 252,  533 => 251,  529 => 250,  526 => 249,  522 => 248,  520 => 247,  514 => 243,  510 => 242,  506 => 241,  499 => 238,  497 => 237,  495 => 236,  492 => 233,  475 => 218,  469 => 217,  455 => 214,  452 => 213,  449 => 212,  445 => 211,  439 => 208,  434 => 206,  431 => 205,  428 => 204,  426 => 203,  415 => 194,  413 => 178,  408 => 175,  401 => 171,  396 => 169,  389 => 167,  385 => 166,  381 => 165,  377 => 164,  373 => 163,  369 => 162,  363 => 161,  357 => 160,  350 => 159,  348 => 158,  344 => 156,  342 => 155,  339 => 154,  331 => 149,  326 => 146,  324 => 145,  321 => 144,  313 => 139,  308 => 136,  298 => 128,  296 => 127,  293 => 126,  291 => 125,  285 => 121,  283 => 120,  280 => 119,  273 => 114,  269 => 112,  263 => 108,  261 => 107,  254 => 103,  251 => 102,  249 => 101,  244 => 98,  238 => 94,  236 => 93,  229 => 91,  226 => 90,  224 => 89,  219 => 87,  216 => 86,  213 => 85,  210 => 84,  207 => 83,  204 => 82,  201 => 81,  198 => 80,  196 => 79,  193 => 78,  191 => 77,  188 => 76,  182 => 73,  179 => 72,  177 => 71,  170 => 69,  166 => 68,  162 => 66,  155 => 62,  148 => 58,  146 => 56,  144 => 54,  137 => 50,  131 => 46,  129 => 45,  122 => 40,  116 => 36,  114 => 35,  109 => 32,  106 => 31,  101 => 28,  81 => 26,  77 => 20,  72 => 18,  69 => 17,  66 => 16,  60 => 15,  54 => 13,  48 => 12,  42 => 11,  11 => 9,);
    }
}
