<?php

/* CoreOrderBundle:Admin/Form:form_admin_fields.html.twig */
class __TwigTemplate_e5aadc7b613e3e6f1e5756526c86b6f2a64f1435402a8dafd49d62f270cdcc3e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'core_order_admin_isCheckedStatus_checkbox_widget' => array($this, 'block_core_order_admin_isCheckedStatus_checkbox_widget'),
            'core_order_admin_isPaidStatus_checkbox_widget' => array($this, 'block_core_order_admin_isPaidStatus_checkbox_widget'),
            'core_order_admin_isShippedStatus_checkbox_widget' => array($this, 'block_core_order_admin_isShippedStatus_checkbox_widget'),
            'core_order_admin_isCanceledStatus_canceled_status_widget' => array($this, 'block_core_order_admin_isCanceledStatus_canceled_status_widget'),
            'core_order_admin_isCheckedStatusSend_checkbox_widget' => array($this, 'block_core_order_admin_isCheckedStatusSend_checkbox_widget'),
            'core_order_admin_isPaidStatusSend_checkbox_widget' => array($this, 'block_core_order_admin_isPaidStatusSend_checkbox_widget'),
            'core_order_admin_isShippedStatusSend_checkbox_widget' => array($this, 'block_core_order_admin_isShippedStatusSend_checkbox_widget'),
            'core_order_admin_isCanceledStatusSend_checkbox_widget' => array($this, 'block_core_order_admin_isCanceledStatusSend_checkbox_widget'),
            'core_order_admin_compositions_products_in_order_widget' => array($this, 'block_core_order_admin_compositions_products_in_order_widget'),
            'core_order_admin_recipientFio_text_widget' => array($this, 'block_core_order_admin_recipientFio_text_widget'),
            'core_order_admin_contragent_ajax_entity_contragent_widget' => array($this, 'block_core_order_admin_contragent_ajax_entity_contragent_widget'),
            'core_order_admin_deliveryPrice_money_widget' => array($this, 'block_core_order_admin_deliveryPrice_money_widget'),
            'core_order_admin_id_text_widget' => array($this, 'block_core_order_admin_id_text_widget'),
            'core_order_admin_documentScans_multiupload_document_widget' => array($this, 'block_core_order_admin_documentScans_multiupload_document_widget'),
            'core_order_admin_payments_sonata_type_collection_widget' => array($this, 'block_core_order_admin_payments_sonata_type_collection_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 6
        echo "
";
        // line 8
        $this->displayBlock('core_order_admin_isCheckedStatus_checkbox_widget', $context, $blocks);
        // line 18
        echo "
";
        // line 20
        $this->displayBlock('core_order_admin_isPaidStatus_checkbox_widget', $context, $blocks);
        // line 30
        echo "

";
        // line 33
        $this->displayBlock('core_order_admin_isShippedStatus_checkbox_widget', $context, $blocks);
        // line 43
        echo "
";
        // line 45
        $this->displayBlock('core_order_admin_isCanceledStatus_canceled_status_widget', $context, $blocks);
        // line 56
        echo "
";
        // line 57
        $this->displayBlock('core_order_admin_isCheckedStatusSend_checkbox_widget', $context, $blocks);
        // line 60
        echo "
";
        // line 61
        $this->displayBlock('core_order_admin_isPaidStatusSend_checkbox_widget', $context, $blocks);
        // line 64
        $this->displayBlock('core_order_admin_isShippedStatusSend_checkbox_widget', $context, $blocks);
        // line 67
        $this->displayBlock('core_order_admin_isCanceledStatusSend_checkbox_widget', $context, $blocks);
        // line 70
        echo "


";
        // line 74
        $this->displayBlock('core_order_admin_compositions_products_in_order_widget', $context, $blocks);
        // line 77
        echo "
";
        // line 79
        $this->displayBlock('core_order_admin_recipientFio_text_widget', $context, $blocks);
        // line 84
        echo "
";
        // line 86
        $this->displayBlock('core_order_admin_contragent_ajax_entity_contragent_widget', $context, $blocks);
        // line 131
        echo "
";
        // line 132
        $this->displayBlock('core_order_admin_deliveryPrice_money_widget', $context, $blocks);
        // line 272
        echo "
";
        // line 273
        $this->displayBlock('core_order_admin_id_text_widget', $context, $blocks);
        // line 282
        echo "
";
        // line 283
        $this->displayBlock('core_order_admin_documentScans_multiupload_document_widget', $context, $blocks);
        // line 426
        echo "
";
        // line 428
        $this->displayBlock('core_order_admin_payments_sonata_type_collection_widget', $context, $blocks);
    }

    // line 8
    public function block_core_order_admin_isCheckedStatus_checkbox_widget($context, array $blocks = array())
    {
        echo "    
    ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "   
    ";
        // line 10
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), "isCheckedStatusSend", array())) {
            // line 11
            echo "        ";
            $context["imagePrefix"] = "";
            // line 12
            echo "    ";
        } else {
            // line 13
            echo "        ";
            $context["imagePrefix"] = "dont_";
            echo "        
    ";
        }
        // line 14
        echo "    
    &nbsp;<img  data-target=\"isCheckedStatusSend\" class=\"sendEmailOrderStatus\" title=\"Нужно ли отправлять уведомление заказчику при смене этого статуса\" 
         src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl((("bundles/coreorder/Admin/img/" . (isset($context["imagePrefix"]) ? $context["imagePrefix"] : null)) . "send_email.png")), "html", null, true);
        echo "\" />    
";
    }

    // line 20
    public function block_core_order_admin_isPaidStatus_checkbox_widget($context, array $blocks = array())
    {
        echo "        
    ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "   
    ";
        // line 22
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), "isPaidStatusSend", array())) {
            // line 23
            echo "        ";
            $context["imagePrefix"] = "";
            // line 24
            echo "    ";
        } else {
            // line 25
            echo "        ";
            $context["imagePrefix"] = "dont_";
            echo "        
    ";
        }
        // line 26
        echo "    
    &nbsp;<img  data-target=\"isPaidStatusSend\" class=\"sendEmailOrderStatus\" title=\"Нужно ли отправлять уведомление заказчику при смене этого статуса\" 
         src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl((("bundles/coreorder/Admin/img/" . (isset($context["imagePrefix"]) ? $context["imagePrefix"] : null)) . "send_email.png")), "html", null, true);
        echo "\" />    
";
    }

    // line 33
    public function block_core_order_admin_isShippedStatus_checkbox_widget($context, array $blocks = array())
    {
        echo "    
    ";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "   
    ";
        // line 35
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), "isShippedStatusSend", array())) {
            // line 36
            echo "        ";
            $context["imagePrefix"] = "";
            // line 37
            echo "    ";
        } else {
            // line 38
            echo "        ";
            $context["imagePrefix"] = "dont_";
            echo "        
    ";
        }
        // line 39
        echo "    
    &nbsp;<img  data-target=\"isShippedStatusSend\" class=\"sendEmailOrderStatus\" title=\"Нужно ли отправлять уведомление заказчику при смене этого статуса\" 
         src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl((("bundles/coreorder/Admin/img/" . (isset($context["imagePrefix"]) ? $context["imagePrefix"] : null)) . "send_email.png")), "html", null, true);
        echo "\" />    
";
    }

    // line 45
    public function block_core_order_admin_isCanceledStatus_canceled_status_widget($context, array $blocks = array())
    {
        echo "    
    ";
        // line 46
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), "isCanceledStatusSend", array())) {
            // line 47
            echo "        ";
            $context["imagePrefix"] = "";
            // line 48
            echo "    ";
        } else {
            // line 49
            echo "        ";
            $context["imagePrefix"] = "dont_";
            echo "        
    ";
        }
        // line 50
        echo "    
    <img style=\"margin-left:21px;position: absolute;margin-top:-2px\"  data-target=\"isCanceledStatusSend\" class=\"sendEmailOrderStatus\" title=\"Нужно ли отправлять уведомление заказчику при смене этого статуса\" 
         src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl((("bundles/coreorder/Admin/img/" . (isset($context["imagePrefix"]) ? $context["imagePrefix"] : null)) . "send_email.png")), "html", null, true);
        echo "\" />        
    ";
        // line 53
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "   

";
    }

    // line 57
    public function block_core_order_admin_isCheckedStatusSend_checkbox_widget($context, array $blocks = array())
    {
        echo "  
    <span style='display: none'>";
        // line 58
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "</span>
";
    }

    // line 61
    public function block_core_order_admin_isPaidStatusSend_checkbox_widget($context, array $blocks = array())
    {
        echo "  
    <span style='display: none'>";
        // line 62
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "</span>
";
    }

    // line 64
    public function block_core_order_admin_isShippedStatusSend_checkbox_widget($context, array $blocks = array())
    {
        echo "  
    <span style='display: none'>";
        // line 65
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "</span>
";
    }

    // line 67
    public function block_core_order_admin_isCanceledStatusSend_checkbox_widget($context, array $blocks = array())
    {
        echo "  
    <span style='display: none'>";
        // line 68
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "</span>
";
    }

    // line 74
    public function block_core_order_admin_compositions_products_in_order_widget($context, array $blocks = array())
    {
        // line 75
        echo "    ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
";
    }

    // line 79
    public function block_core_order_admin_recipientFio_text_widget($context, array $blocks = array())
    {
        // line 80
        echo "    <div style=\"float:left\">";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "</div>
    <div style=\"float:left\">&nbsp;&nbsp;<a href=\"javascript:void(0);\" class=\"btn selectContragentReciepment\"><i class=\"icon icon-list\"></i>&nbsp;Получатели контрагента</a></div>
    <div  style=\"display:none\" id=\"selectContragentReciepmentContent\"></div>
";
    }

    // line 86
    public function block_core_order_admin_contragent_ajax_entity_contragent_widget($context, array $blocks = array())
    {
        // line 87
        echo "    ";
        ob_start();
        // line 88
        echo "        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "

        <span class=\"help-block \">Вы не сможете сменить контрагента, если заказа был отгружен ранее</span>
        ";
        // line 91
        $context["cont"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), "contragent", array());
        // line 92
        echo "        ";
        if ((isset($context["cont"]) ? $context["cont"] : null)) {
            // line 93
            echo "

            ";
            // line 95
            $context["ordersInfo"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => "application_user_logic"), "method"), "getContragentOrdersInfo", array(0 => $this->getAttribute((isset($context["cont"]) ? $context["cont"] : null), "id", array())), "method");
            // line 96
            echo "            <table class=\"table table-bordered table-striped\" style=\"width:900px\">
                <tbody>
                    <tr>
                        <td>Заказы</td>
                        <td>
                            <span class=\"label label-inverse\"  title=\"Всего\">все ";
            // line 101
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["cont"]) ? $context["cont"] : null), "orders", array()), "count", array()), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "cost", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo ")</span>&nbsp;&nbsp;
                            <span class=\"label label-default\">Проверено  ";
            // line 102
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "checked", array()), "count", array()), "html", null, true);
            echo " ";
            if ($this->getAttribute($this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "checked", array()), "cost", array())) {
                echo " (";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "checked", array()), "cost", array())), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                echo ")";
            }
            echo "</span>&nbsp;&nbsp;
                            <span class=\"label label-info\">Оплачено ";
            // line 103
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "paid", array()), "count", array()), "html", null, true);
            echo " ";
            if ($this->getAttribute($this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "paid", array()), "cost", array())) {
                echo " (";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "paid", array()), "cost", array())), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                echo ")";
            }
            echo "</span>&nbsp;&nbsp;
                            <span class=\"label label-success\">Отгружено ";
            // line 104
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "shipped", array()), "count", array()), "html", null, true);
            echo " ";
            if ($this->getAttribute($this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "shipped", array()), "cost", array())) {
                echo " (";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "shipped", array()), "cost", array())), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                echo ")";
            }
            echo "</span>&nbsp;&nbsp;
                            <span class=\"label label-important\">Отменено ";
            // line 105
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "canceled", array()), "count", array()), "html", null, true);
            echo " ";
            if ($this->getAttribute($this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "canceled", array()), "cost", array())) {
                echo " (";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute((isset($context["ordersInfo"]) ? $context["ordersInfo"] : null), "canceled", array()), "cost", array())), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                echo ")";
            }
            echo "</span>&nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>Баланс</td>
                        ";
            // line 110
            $context["balance"] = $this->env->getExtension('payment_extension')->getBalanceFunction($this->getAttribute((isset($context["cont"]) ? $context["cont"] : null), "id", array()), true);
            // line 111
            echo "                        <td><span class=\"label ";
            if (((isset($context["balance"]) ? $context["balance"] : null) < 1)) {
                echo "label-important";
            }
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction((isset($context["balance"]) ? $context["balance"] : null)), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</td>
                    </tr>
                    <tr>
                        <td>Дополнительно</td>
                        <td>
                            <span class=\"label\" >E-mail:</span> ";
            // line 116
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["cont"]) ? $context["cont"] : null), "user", array()), "email", array()), "html", null, true);
            echo "
                            <div>
                                <span class=\"label\">";
            // line 118
            if ($this->getAttribute((isset($context["cont"]) ? $context["cont"] : null), "kpp", array(), "any", true, true)) {
                echo "Юр.";
            } else {
                echo "Физ.";
            }
            echo "</span>&nbsp;
                                <span class=\"label label-info\">";
            // line 119
            if ($this->getAttribute((isset($context["cont"]) ? $context["cont"] : null), "kpp", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cont"]) ? $context["cont"] : null), "organization", array()), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cont"]) ? $context["cont"] : null), "surName", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cont"]) ? $context["cont"] : null), "firstName", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cont"]) ? $context["cont"] : null), "lastName", array()), "html", null, true);
            }
            echo "</span>&nbsp;&nbsp;
                                &nbsp;&nbsp;<a target=\"_blank\" href=\"";
            // line 120
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_commoncontragent_edit", array("id" => $this->getAttribute((isset($context["cont"]) ? $context["cont"] : null), "id", array()))), "html", null, true);
            echo "\">Посмотреть контрагента</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <br/>
        ";
        }
        // line 129
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 132
    public function block_core_order_admin_deliveryPrice_money_widget($context, array $blocks = array())
    {
        // line 133
        echo "    ";
        ob_start();
        // line 134
        echo "        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
        <a title=\"Пересчитать\" href=\"javascript:void(0);\" class=\"delivery-recalc btn btn-small\"><i class=\"icon icon-repeat\"></i></a>
        <div class=\"all-methods-wr\">
            <a title=\"Узнать стоимость для всех вариантов\" href=\"javascript:void(0);\" class=\"delivery-calc-all btn btn-small btn-warning\"><i class=\"icon icon-refresh\"></i></a>
            <div class=\"all-methods-container hidden\">
                <table class=\"table table-bordered\">
                    <thead>
                        <tr>
                            <th colspan=\"3\" class=\"table-caption\">Все способы доставки</th>
                        </tr>
                        <tr>
                            <th data-sort=\"string\">Способ доставки</th>
                            <th data-sort=\"float\">Стоимость, руб</th>
                            <th data-sort=\"period\">Срок доставки, дни</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            ";
        // line 269
        echo "        </div>
        ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 271
        echo "    ";
    }

    // line 273
    public function block_core_order_admin_id_text_widget($context, array $blocks = array())
    {
        // line 274
        echo "    ";
        $context["order"] = $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array());
        // line 275
        echo "    ";
        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())) {
            // line 277
            echo "        <h4>Заказ #";
            echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())), "html", null, true);
            echo " <span style=\"color:gray\">(от ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "createdDateTime", array()), "d.m.Y H:i:s", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            echo ")</span></h4>
    ";
        } else {
            // line 279
            echo "        <h4>Новый заказ <span style=\"color:gray\">(от ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d.m.Y H:i:s", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            echo ")</span></h4>        
    ";
        }
    }

    // line 283
    public function block_core_order_admin_documentScans_multiupload_document_widget($context, array $blocks = array())
    {
        // line 284
        echo "    ";
        $context["order"] = $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array());
        // line 285
        echo "    ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
    <span class=\"help-block sonata-ba-field-help span5\">
        Всего может быть не более 4 шт. в каждом заказе. Допустимые форматы: jpg, jpeg, png, pdf, doc, docx. Макс. размер каждого: 2.00 Mb.
    </span>
    ";
        // line 289
        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())) {
            // line 290
            echo "        <br/>
        <br/>
        <div class=\"well well-small \" >
            <div class=\"control-group\">
                <a class=\"btn\" style=\"width:190px\" target=\"_blank\" href=\"";
            // line 294
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "generateObjectUrl", array(0 => "invoiceForPayment", 1 => (isset($context["order"]) ? $context["order"] : null), 2 => array("order_id" => $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array()))), "method"), "html", null, true);
            echo "\"><i class=\"icon-largeы\"></i> Cчет на оплату</a>
            </div>
            <div class=\"control-group\">
                <a class=\"btn invoiceForPaymentSend\" style=\"width:190px\" data-url=\"";
            // line 297
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "generateObjectUrl", array(0 => "invoiceForPaymentSend", 1 => (isset($context["order"]) ? $context["order"] : null), 2 => array("order_id" => $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array()))), "method"), "html", null, true);
            echo "\"  href=\"javascript:void(0)\"><i class=\"icon-large icon-envelope\"></i> Отправить счет на оплату </a>
                <span class=\"label lastInvoiceForPaymentSendDateTime\" ";
            // line 298
            if (((!$this->getAttribute((isset($context["order"]) ? $context["order"] : null), "sendInvoiceForPaymentToEmailDateTime", array())) || (twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "sendInvoiceForPaymentToEmailDateTime", array()), "Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)) == "-0001"))) {
                echo "style=\"display:none\"";
            }
            echo ">
                    ";
            // line 299
            if (($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "sendInvoiceForPaymentToEmailDateTime", array()) && (twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "sendInvoiceForPaymentToEmailDateTime", array()), "Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)) != "-0001"))) {
                echo "Последняя отправка ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "sendInvoiceForPaymentToEmailDateTime", array()), "d.m.Y H:i:s", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            }
            echo "</span>
            </div>
            <div class=\"control-group\">
                <a class=\"btn\" style=\"width:190px\" target=\"_blank\" href=\"";
            // line 302
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "generateObjectUrl", array(0 => "guarantees", 1 => (isset($context["order"]) ? $context["order"] : null), 2 => array("order_id" => $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array()), "needStamps" => 0)), "method"), "html", null, true);
            echo "\"><i class=\"icon-large icon-file\"></i> Гарантийный талон</a>
            </div>
            <div class=\"control-group\">
                <a class=\"btn\" style=\"width:190px\" target=\"_blank\" href=\"";
            // line 305
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "generateObjectUrl", array(0 => "deliveryAgreement", 1 => (isset($context["order"]) ? $context["order"] : null), 2 => array("order_id" => $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array()))), "method"), "html", null, true);
            echo "\"><i class=\"icon-large icon-plane\"></i> Договор поставки</a><br>
            </div>
            <div class=\"control-group\">
                <a class=\"btn\" style=\"width:190px\" target=\"_blank\" href=\"";
            // line 308
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "generateObjectUrl", array(0 => "invoice", 1 => (isset($context["order"]) ? $context["order"] : null), 2 => array("order_id" => $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array()))), "method"), "html", null, true);
            echo "\"><i class=\"icon-large\"></i> Счет-фактура</a><br>
            </div>
            <!--
            Пока скрываем
            <div class=\"control-group\">
                <a class=\"btn\" style=\"width:190px\" target=\"_blank\" href=\"";
            // line 313
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "generateObjectUrl", array(0 => "receiptOfSberbank", 1 => (isset($context["order"]) ? $context["order"] : null), 2 => array("order_id" => $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array()))), "method"), "html", null, true);
            echo "\"><i class=\"icon-large icon-file\"></i> Квитанция Сбербанка</a>
            </div>
            -->
            <div class=\"control-group\">
                <a class=\"btn  waybillAtTheDate\" style=\"width:190px\" target=\"_blank\" href=\"#\"><i class=\"icon-large icon-shopping-cart\"></i> Товарная накладная</a>
                <input type=\"text\" id=\"waybillAtTheDate\" ";
            // line 318
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "isShippedStatus", array())) {
                echo "readonly";
            }
            echo " class=\"form-control span2 ";
            if ((!$this->getAttribute((isset($context["order"]) ? $context["order"] : null), "isShippedStatus", array()))) {
                echo "datepicker";
            }
            echo "\"
                       placeholder=\"на дату\" value=\"";
            // line 319
            if ((!$this->getAttribute((isset($context["order"]) ? $context["order"] : null), "isShippedStatus", array()))) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "createdDateTime", array()), "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            }
            echo "\">
            </div>
            <div class=\"control-group\">
                <a class=\"btn   addressLabel\" style=\"width:190px\" target=\"_blank\" href=\"\"><i class=\"icon-large icon-tag\"></i> Адресный ярлык</a>
                <input type=\"text\" id=\"addressLabel\" class=\"form-control span2\" data-mask=\"integer\" placeholder=\"для коробок\" value=\"1\">
            </div>
        </div>

        <script>
            //отправка счета на email
            \$('.invoiceForPaymentSend').click(function() {
                var link = \$(this).attr('data-url');
                \$.ajax({
                    url: link,
                    type: 'GET',
                    success: function(data) {
                        if (data.res === 1) {
                            \$('.lastInvoiceForPaymentSendDateTime').show().html('Последняя отправка ' + data.sendDateTime);
                            alert(\"Счет на оплату успешно отправлен контрагенту!\");
                        }
                        else {
                            alert(\"Ошибка отправки счета контрагенту!\");
                        }
                    },
                    error: function(data) {
                        alert(\"Ошибка отправки счета контрагенту!\");
                    }
                });
            });
            //
            \$('.waybillAtTheDate').click(function() {
                var waybillAtTheDateURL = \"";
            // line 350
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "generateObjectUrl", array(0 => "waybillAtTheDate", 1 => (isset($context["order"]) ? $context["order"] : null), 2 => array("order_id" => $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array()), "date" => "00.00.0000")), "method"), "html", null, true);
            echo "\",
                        value = \$('#waybillAtTheDate').val();
                if (value) {
                    var url = waybillAtTheDateURL.replace('00.00.0000', value);
                    \$(this).attr('href', url);
                }
                else {
                    alert('Укажите дату для товарной накладной!');
                }
            });
            \$('.addressLabel').click(function() {
                var addressLabel = \"";
            // line 361
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "generateObjectUrl", array(0 => "addressLabel", 1 => (isset($context["order"]) ? $context["order"] : null), 2 => array("order_id" => $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array()), "quantity" => "0")), "method"), "html", null, true);
            echo "\",
                        value = \$('#addressLabel').val();
                if (value) {
                    var url = addressLabel.replace('0', value);
                    \$(this).attr('href', url);
                }
                else {
                    alert('Укажите количество коробок!');
                }
            });
        </script>
    ";
        }
        // line 373
        echo "    <script>

        //если изменили юзера, то пытаемся
        \$('.selectContragentReciepment').on('click', function() {
            var contragent_id = \$('input[name=\"";
        // line 377
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "uniqid", array()), "html", null, true);
        echo "[contragent]\"]').val();
            if (contragent_id) {
                \$.get(\"";
        // line 379
        echo $this->env->getExtension('routing')->getPath("core_order_get_contragent_receipments");
        echo "\", {contragent_id: contragent_id})
                        .done(function(res) {

                            var html = '';
                            for (var index in res) {
                                html = html + '<li><a data-caption=\"' + res[index].caption + '\" data-company=\"' + res[index].organization + '\" data-phone=\"' + res[index].phone + '\" data-email=\"' + res[index].contactEmail + '\" data-passport=\"' + res[index].passport + '\"  class=\"setContragentReciepmentContent\" href=\"javascript:void(0)\">' + res[index].caption + '</a></li>';
                            }

                            if (html === '') {
                                html = '<h5>У выбранного контрагента еще нет получателей.</h5>';
                            }
                            html = html + '<br/><div style=\"vertical-align:baseline;\" class=\"well well-small form-actions\"><input type=\"button\" class=\"btn btn-danger selectContragentReciepmentContentClose\" value=\"Закрыть\"></div>';

                            \$('#selectContragentReciepmentContent').html(html);
                            var dlg = \$('#selectContragentReciepmentContent').dialog(
                                    {width: 500, height: 300, modal: true, title: \"Выберите получателя для автозаполнения\"}
                            ).on('keydown', function(evt) {
                                if (evt.keyCode === \$.ui.keyCode.ESCAPE) {
                                    dlg.dialog('close');
                                }
                                evt.stopPropagation();
                            });
                        });
            }
            else {
                alert(\"Укажите контрагента!\")
            }
        });

        \$('body').on('click', '.selectContragentReciepmentContentClose', function(event) {

            if (\$('#selectContragentReciepmentContent').dialog(\"isOpen\")) {
                \$('#selectContragentReciepmentContent').dialog('close');
            }
        });
        \$('body').on('click', '.setContragentReciepmentContent', function(event) {
            \$('#";
        // line 415
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "uniqid", array()), "html", null, true);
        echo "_recipientFio').val(\$(this).attr('data-caption'));
            \$('#";
        // line 416
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "uniqid", array()), "html", null, true);
        echo "_recipientCompany').val(\$(this).attr('data-company'));
            \$('#";
        // line 417
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "uniqid", array()), "html", null, true);
        echo "_recipientPhone').val(\$(this).attr('data-phone'));
            \$('#";
        // line 418
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "uniqid", array()), "html", null, true);
        echo "_recipientEmail').val(\$(this).attr('data-email'));
            \$('#";
        // line 419
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "uniqid", array()), "html", null, true);
        echo "_recipientPassport').val(\$(this).attr('data-Passport'));
            if (\$('#selectContragentReciepmentContent').dialog(\"isOpen\")) {
                \$('#selectContragentReciepmentContent').dialog('close');
            }
        });
    </script>
";
    }

    // line 428
    public function block_core_order_admin_payments_sonata_type_collection_widget($context, array $blocks = array())
    {
        // line 429
        echo "
    ";
        // line 430
        if ((!$this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "hasassociationadmin", array()))) {
            // line 431
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["value"]) ? $context["value"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                // line 432
                echo "            ";
                echo twig_escape_filter($this->env, $this->env->getExtension('sonata_admin')->renderRelationElement($context["element"], $this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array())), "html", null, true);
                echo "
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 434
            echo "    ";
        } else {
            // line 435
            echo "
        <div id=\"field_container_";
            // line 436
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "\" class=\"field-container\">
            <span id=\"field_widget_";
            // line 437
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "\" >
                ";
            // line 438
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array())) > 0)) {
                // line 439
                echo "                    <table class=\"table table-bordered\">
                        <thead>
                            <tr>
                                ";
                // line 442
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(twig_first($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array())), "children", array()));
                foreach ($context['_seq'] as $context["field_name"] => $context["nested_field"]) {
                    // line 443
                    echo "                                    ";
                    if (!twig_in_filter($context["field_name"], array(0 => "log", 1 => "order"))) {
                        // line 444
                        echo "
                                        ";
                        // line 445
                        if (($context["field_name"] == "_delete")) {
                            // line 446
                            echo "                                            <th>";
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("action_delete", array(), "SonataAdminBundle"), "html", null, true);
                            echo "</th>
                                        ";
                        } else {
                            // line 448
                            echo "                                            <th ";
                            if ((($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array(), "any", false, true), "attr", array(), "array", false, true), "hidden", array(), "array", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "attr", array(), "array"), "hidden", array(), "array")) || twig_in_filter($context["field_name"], array(0 => "product", 1 => "parent")))) {
                                echo " style=\"display:none;\"";
                            }
                            echo ">
                                                ";
                            // line 449
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "sonata_admin", array(), "array"), "admin", array()), "trans", array(0 => $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "label", array())), "method"), "html", null, true);
                            echo "
                                            </th>
                                        ";
                        }
                        // line 452
                        echo "
                                    ";
                    }
                    // line 454
                    echo "                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['field_name'], $context['nested_field'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 455
                echo "                                <th>
                                    Действия
                                </th>
                            </tr>
                        </thead>
                        <tbody class=\"sonata-ba-tbody\">
                            ";
                // line 461
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array()));
                foreach ($context['_seq'] as $context["nested_group_field_name"] => $context["nested_group_field"]) {
                    // line 462
                    echo "                                <tr>
                                    ";
                    // line 463
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["nested_group_field"], "children", array()));
                    foreach ($context['_seq'] as $context["field_name"] => $context["nested_field"]) {
                        // line 464
                        echo "
                                        ";
                        // line 465
                        $context["object"] = $this->getAttribute((isset($context["value"]) ? $context["value"] : null), "get", array(0 => $this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "parent", array()), "vars", array()), "name", array())), "method");
                        // line 466
                        echo "
                                        <td class=\"sonata-ba-td-";
                        // line 467
                        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, $context["field_name"], "html", null, true);
                        echo " control-group";
                        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "errors", array())) > 0)) {
                            echo " error";
                        }
                        echo "\"";
                        if ((($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array(), "any", false, true), "attr", array(), "array", false, true), "hidden", array(), "array", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "attr", array(), "array"), "hidden", array(), "array")) || twig_in_filter($context["field_name"], array(0 => "log", 1 => "order")))) {
                            echo " style=\"display:none;\"";
                        }
                        echo ">
                                            ";
                        // line 468
                        if (twig_in_filter($context["field_name"], array(0 => "id", 1 => "createdAt", 2 => "updatedAt"))) {
                            // line 469
                            echo "                                                ";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "value", array()), "html", null, true);
                            echo "

                                                <span class=\"hidden\">";
                            // line 471
                            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                            echo "</span>

                                            ";
                        } elseif (twig_in_filter($context["field_name"], array(0 => "customer"))) {
                            // line 474
                            echo "
                                                <a href=\"";
                            // line 475
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_commoncontragent_edit", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "sonata_admin", array()), "value", array()))), "html", null, true);
                            echo "\">";
                            // line 476
                            if ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "customer", array(), "any", false, true), "legalForm", array(), "any", true, true)) {
                                // line 477
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "customer", array()), "organization", array()), "html", null, true);
                            } else {
                                // line 479
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "customer", array()), "lastName", array()), "html", null, true);
                                echo " ";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "customer", array()), "firstName", array()), "html", null, true);
                                echo " ";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "customer", array()), "surName", array()), "html", null, true);
                            }
                            // line 481
                            echo "</a>

                                                <span class=\"hidden\">";
                            // line 483
                            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                            echo "</span>

                                            ";
                        } elseif (twig_in_filter($context["field_name"], array(0 => "isPassed"))) {
                            // line 486
                            echo "                                                ";
                            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "isPassed", array())) {
                                // line 487
                                echo "                                                    <span class=\"label label-success\">Да</span>
                                                ";
                            } else {
                                // line 489
                                echo "                                                    <span class=\"label label-important\">Нет</span>
                                                ";
                            }
                            // line 491
                            echo "
                                                <span class=\"hidden\">";
                            // line 492
                            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                            echo "</span>

                                            ";
                        } elseif (twig_in_filter($context["field_name"], array(0 => "system"))) {
                            // line 495
                            echo "                                                ";
                            if ($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "value", array())) {
                                // line 496
                                echo "                                                    <a href=\"";
                                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_payment_paymentsystem_commonpaymentsystem_edit", array("id" => $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "value", array()))), "html", null, true);
                                echo "\">";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "sonata_admin", array()), "value", array()), "html", null, true);
                                echo "</a>
                                                ";
                            } else {
                                // line 498
                                echo "                                                    -
                                                ";
                            }
                            // line 500
                            echo "
                                                <span class=\"hidden\">";
                            // line 501
                            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                            echo "</span>

                                            ";
                        } elseif (twig_in_filter($context["field_name"], array(0 => "type"))) {
                            // line 504
                            echo "                                                ";
                            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "type", array())) {
                                // line 505
                                echo "                                                    Приход
                                                ";
                            } else {
                                // line 507
                                echo "                                                    Расход
                                                ";
                            }
                            // line 509
                            echo "
                                                <span class=\"hidden\">";
                            // line 510
                            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                            echo "</span>

                                            ";
                        } elseif (twig_in_filter($context["field_name"], array(0 => "amount"))) {
                            // line 513
                            echo "                                                ";
                            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "type", array())) {
                                // line 514
                                echo "                                                    <span class=\"money\">
                                                        ";
                                // line 515
                                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "value", array())), "html", null, true);
                                echo " ";
                                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                                echo "
                                                    </span>
                                                ";
                            } else {
                                // line 518
                                echo "                                                    <span class=\"money\" style=\"color:#B94A48\">
                                                        -";
                                // line 519
                                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "value", array())), "html", null, true);
                                echo " ";
                                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                                echo "
                                                    </span>
                                                ";
                            }
                            // line 522
                            echo "
                                                <span class=\"hidden\">";
                            // line 523
                            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                            echo "</span>

                                            ";
                        } elseif (twig_in_filter($context["field_name"], array(0 => "noteRu"))) {
                            // line 526
                            echo "                                                 ";
                            if ($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "value", array())) {
                                // line 527
                                echo "
                                                    <span class=\"icon-eye-open\" style=\"cursor: help;\" data-toggle=\"popover\" data-html=\"true\" data-placement=\"left\" data-content=\"";
                                // line 528
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "value", array()), "html", null, true);
                                echo "\" onmouseover=\"
                                                        \$(this).popover('show');
                                                        \$('.popover').css({width:500, marginLeft:-280+'px'});
                                                        \" onmouseout=\"\$(this).popover('destroy');\" data-original-title=\"Просмотр\"></span>

                                                    <span class=\"hidden\">";
                                // line 533
                                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                                echo "</span>

                                                ";
                            } else {
                                // line 536
                                echo "                                                    -
                                                ";
                            }
                            // line 538
                            echo "
                                            ";
                        } else {
                            // line 540
                            echo "                                                ";
                            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                            echo "
                                                ";
                            // line 541
                            $context["dummy"] = $this->getAttribute($context["nested_group_field"], "setrendered", array());
                            // line 542
                            echo "                                            ";
                        }
                        // line 543
                        echo "
                                            ";
                        // line 544
                        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "errors", array())) > 0)) {
                            // line 545
                            echo "                                                <div class=\"help-inline sonata-ba-field-error-messages\">
                                                    ";
                            // line 546
                            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'errors');
                            echo "
                                                </div>
                                            ";
                        }
                        // line 549
                        echo "                                        </td>


                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['field_name'], $context['nested_field'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 553
                    echo "                                    <td>
                                        <a href=\"";
                    // line 554
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_payment_payment_edit", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute($context["nested_group_field"], "vars", array()), "value", array()), "id", array()))), "html", null, true);
                    echo "\" class=\"btn edit_link btn-small\" title=\"Редактировать\">
                                            <i class=\"icon-edit\"></i>
                                            Редактировать
                                        </a>
                                    </td>
                                </tr>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['nested_group_field_name'], $context['nested_group_field'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 561
                echo "                        </tbody>
                    </table>
                ";
            }
            // line 564
            echo "            </span>
            <br>
            <a target=\"_blank\" class=\"btn sonata-action-element\" href=\"";
            // line 566
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_payment_payment_create", array("order_id" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "sonata_admin", array()), "admin", array()), "subject", array()), "id", array()))), "html", null, true);
            echo "\">
            <i class=\"icon-plus\"></i>
            Добавить новый</a>

        </div>
    ";
        }
        // line 572
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form:form_admin_fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  1108 => 572,  1099 => 566,  1095 => 564,  1090 => 561,  1077 => 554,  1074 => 553,  1065 => 549,  1059 => 546,  1056 => 545,  1054 => 544,  1051 => 543,  1048 => 542,  1046 => 541,  1041 => 540,  1037 => 538,  1033 => 536,  1027 => 533,  1019 => 528,  1016 => 527,  1013 => 526,  1007 => 523,  1004 => 522,  996 => 519,  993 => 518,  985 => 515,  982 => 514,  979 => 513,  973 => 510,  970 => 509,  966 => 507,  962 => 505,  959 => 504,  953 => 501,  950 => 500,  946 => 498,  938 => 496,  935 => 495,  929 => 492,  926 => 491,  922 => 489,  918 => 487,  915 => 486,  909 => 483,  905 => 481,  898 => 479,  895 => 477,  893 => 476,  890 => 475,  887 => 474,  881 => 471,  875 => 469,  873 => 468,  859 => 467,  856 => 466,  854 => 465,  851 => 464,  847 => 463,  844 => 462,  840 => 461,  832 => 455,  826 => 454,  822 => 452,  816 => 449,  809 => 448,  803 => 446,  801 => 445,  798 => 444,  795 => 443,  791 => 442,  786 => 439,  784 => 438,  780 => 437,  776 => 436,  773 => 435,  770 => 434,  761 => 432,  756 => 431,  754 => 430,  751 => 429,  748 => 428,  737 => 419,  733 => 418,  729 => 417,  725 => 416,  721 => 415,  682 => 379,  677 => 377,  671 => 373,  656 => 361,  642 => 350,  604 => 319,  594 => 318,  586 => 313,  578 => 308,  572 => 305,  566 => 302,  557 => 299,  551 => 298,  547 => 297,  541 => 294,  535 => 290,  533 => 289,  525 => 285,  522 => 284,  519 => 283,  511 => 279,  503 => 277,  500 => 275,  497 => 274,  494 => 273,  490 => 271,  486 => 269,  463 => 134,  460 => 133,  457 => 132,  452 => 129,  440 => 120,  428 => 119,  420 => 118,  415 => 116,  400 => 111,  398 => 110,  382 => 105,  370 => 104,  358 => 103,  346 => 102,  338 => 101,  331 => 96,  329 => 95,  325 => 93,  322 => 92,  320 => 91,  313 => 88,  310 => 87,  307 => 86,  298 => 80,  295 => 79,  288 => 75,  285 => 74,  279 => 68,  274 => 67,  268 => 65,  263 => 64,  257 => 62,  252 => 61,  246 => 58,  241 => 57,  234 => 53,  230 => 52,  226 => 50,  220 => 49,  217 => 48,  214 => 47,  212 => 46,  207 => 45,  201 => 41,  197 => 39,  191 => 38,  188 => 37,  185 => 36,  183 => 35,  179 => 34,  174 => 33,  168 => 28,  164 => 26,  158 => 25,  155 => 24,  152 => 23,  150 => 22,  146 => 21,  141 => 20,  135 => 16,  131 => 14,  125 => 13,  122 => 12,  119 => 11,  117 => 10,  113 => 9,  108 => 8,  104 => 428,  101 => 426,  99 => 283,  96 => 282,  94 => 273,  91 => 272,  89 => 132,  86 => 131,  84 => 86,  81 => 84,  79 => 79,  76 => 77,  74 => 74,  69 => 70,  67 => 67,  65 => 64,  63 => 61,  60 => 60,  58 => 57,  55 => 56,  53 => 45,  50 => 43,  48 => 33,  44 => 30,  42 => 20,  39 => 18,  37 => 8,  34 => 6,);
    }
}
