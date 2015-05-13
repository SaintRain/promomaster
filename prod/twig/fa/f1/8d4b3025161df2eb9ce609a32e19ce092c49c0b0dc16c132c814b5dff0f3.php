<?php

/* CoreOrderBundle:Admin/Documents:waybillAtTheDateTorg12.html.twig */
class __TwigTemplate_faf18d4b3025161df2eb9ce609a32e19ce092c49c0b0dc16c132c814b5dff0f3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $this->displayBlock('content', $context, $blocks);
    }

    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "    <style type=\"text/css\">
        body, table {font-family: Arial, sans-serif;}
        td {padding:1px 1px 0 1px;font-size:10pt;font-weight:400;font-style:normal;text-decoration:none;text-align:general;vertical-align:bottom;border: 0 solid #000;line-height:8.5pt;}
        table.torg12 {border-collapse: collapse; table-layout: fixed;}
        .xl26{font-size:7pt;text-align:right;}
        .xl28{font-size:8pt;text-align:center;vertical-align:top;border-width:.5pt;}
        .xl29{font-size:8pt;text-align:right;vertical-align:top;}
        .xl31{font-size:8pt;text-align:center;vertical-align:top;border-width: 0 .5pt .5pt 0;}
        .xl32{font-size:8pt;text-align:right;vertical-align:top;border-width: 0 .5pt 0 0;}
        .xl38{border-width: 0 .5pt .5pt 0;}
        .xl41{font-size:9pt;text-align:center;vertical-align:top;border-width: 1pt .5pt .5pt .5pt;}
        .xl48{font-size:7pt;text-align:center;vertical-align:middle;border-width: 0 .5pt 2pt 0;border-bottom-style:double;}
        .xl49{font-size:8pt;text-align:center;vertical-align:middle;border-width: 0 .5pt 2pt 0.5pt;border-bottom-style:double;font-style:italic;}
        .xl50{font-size:8pt;text-align:center;vertical-align:middle;border-width: 0 .5pt 2pt 0;border-bottom-style:double;font-style:italic;}
        .xl51{font-size:8pt;text-align:right;vertical-align:middle;border-width: 0 .5pt .5pt .5pt;}
        .xl52{font-size:8pt;text-align:left;vertical-align:middle;border-width: 0 .5pt .5pt 0;}
        .xl53{font-size:8pt;text-align:right;vertical-align:middle;border-width: 0 .5pt .5pt 0;}
        .xl55{font-size:9pt;text-align:right;border-width: .5pt 0 0 0;}
        .xl57{font-size:9pt;text-align:center;border-width: 0 .5pt .5pt 0;}
        .xl58{font-size:8pt;}
        .xl59{font-size:8pt;text-align:center;border-width: 0 .5pt .5pt 0;}
        .xl61{font-size:8pt;border-width: 0 0 0 .5pt;padding-left:10px;}
        .xl64{font-size:8pt;vertical-align:top;}
        .xl65{font-size:7pt;vertical-align:top;border-width: 0 0 0 .5pt;}
        .xl67{font-size:9pt;vertical-align:middle;border-width: 0 0 .5pt 0;padding-right:10px;width:120px;}
        .xl71{font-size:8pt;text-align:center;vertical-align:middle;border-width: 1pt .5pt 1pt 1pt;width: 79pt;}
        .xl73{font-size:8pt;text-align:center;vertical-align:middle;border-width: 1pt 1pt 1pt 0;width: 105pt;}
        .xl76{vertical-align:top;font-weight:bold}
        .xl78{font-size:8pt;text-align:center;vertical-align:middle;border-width: 0 .5pt .5pt .5pt;}
        .xl79{font-size:8pt;text-align:center;vertical-align:middle;border-width: 0 .5pt .5pt 0;}
        .xl80{font-size:7pt;text-align:center;vertical-align:middle;border-width: .5pt .5pt 0 .5pt;}
        .xl81{font-size:7pt;text-align:center;vertical-align:middle;border-width: .5pt 0 .5pt .5pt;}
        .xl83{font-size:7pt;text-align:center;vertical-align:middle;border-width: .5pt .5pt .5pt 0;width: 77pt;}
        .xl90{font-size:9pt;text-align:center;border-width: 0 .5pt .5pt 0;}
        .xl92{font-size:8pt;border-width: 0 .5pt 0 0;}
        .xl96{font-size:8pt;text-align:left;padding-left:190px}
        .xl97{font-size:8pt;vertical-align:middle;border-width: 0 0 .5pt 0;line-height:9pt;}
    </style>


    ";
        // line 43
        if ( !$this->getAttribute((isset($context["order"]) ? $context["order"] : null), "costInfo", array(), "any", true, true)) {
            // line 44
            echo "        ";
            $context["costInfo"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => "core_order_logic"), "method"), "computeOrderCostInfo", array(0 => (isset($context["order"]) ? $context["order"] : null)), "method");
            // line 45
            echo "            ";
        }
        // line 46
        echo "                ";
        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())) {
            // line 47
            echo "                    <div style=\"position: absolute; left: 7mm; top: 3.5mm; text-align: center;\">
                        <barcode code=\"002";
            // line 48
            echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())), "html", null, true);
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "createdDateTime", array()), "Ymd", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            echo "\" type=\"C128C\" />
                        <div style=\"font-size:7pt;\">002";
            // line 49
            echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())), "html", null, true);
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["dateFrom"]) ? $context["dateFrom"] : null), "Ymd", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            echo "</div>
                    </div>
                ";
        }
        // line 52
        echo "

                <center>
                    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"1022\" class=\"torg12\">
                        <tbody>
                            <tr>
                                <td colspan=\"14\" height=\"14\" class=\"xl26\" align=\"right\">Унифицированная форма № Торг-12<br />Утверждена постановлением Госкомстата России от 25.12.98 No 132</td>
                                <td class=\"xl28\">Код</td>
                            </tr>
                            <tr height=\"15\">
                                <td colspan=\"12\" height=\"15\"></td>
                                <td colspan=\"2\" class=\"xl29\" style=\"border-right:.5pt solid black;\">Форма по ОКУД</td>
                                <td class=\"xl31\">0330212</td>
                            </tr>
                            <tr>
                                <td colspan=\"12\">
                                    <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"800\"><tr>
                                            <td class=\"xl67\" style=\"padding-right:10px;width:120px;\" valign=\"middle\">Грузоотправитель:</td>
                                            <td class=\"xl97\" valign=\"middle\">";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "legalForm", array()), "captionRu", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "caption", array()), "html", null, true);
        echo ",
                                                адрес: ";
        // line 71
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "addressPost", array()), "html", null, true);
        echo ", телефон: ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "phone", array()), "html", null, true);
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "inn", array())) {
            echo ", ИНН: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "inn", array()), "html", null, true);
        }
        // line 72
        echo "                                                ";
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "paymentAccount", array())) {
            echo ", расчетный счет: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "paymentAccount", array()), "html", null, true);
        }
        // line 73
        echo "                                                ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array(), "any", false, true), "bank", array(), "any", false, true), "bic", array(), "any", true, true)) {
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "bank", array()), "caption", array()), "html", null, true);
        }
        // line 74
        echo "                                                ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "bank", array()), "correspondentAccount", array())) {
            echo ", кор. счет: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "bank", array()), "correspondentAccount", array()), "html", null, true);
        }
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array(), "any", false, true), "bank", array(), "any", false, true), "bik", array(), "any", true, true)) {
            echo ", БИК:  ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "bank", array()), "bik", array()), "html", null, true);
        }
        echo "</td>
                                        </tr></table>
                                </td>
                                <td colspan=\"1\"></td>
                                <td class=\"xl32\">по ОКПО</td>
                                <td class=\"xl31\">";
        // line 79
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "okpo", array()), "html", null, true);
        echo "</td>
                            </tr>
                            <tr>
                                <td rowspan=\"2\" colspan=\"12\">
                                    <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"800\"><tr>
                                            <td class=\"xl67\" style=\"padding-right:10px;width:120px;\" valign=\"middle\">Грузополучатель:</td>
                                            <td class=\"xl97\" valign=\"middle\">";
        // line 85
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "legalForm", array()), "captionRu", array()), "html", null, true);
        echo " \"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragentCompany", array()), "html", null, true);
        echo "\",
                                                адрес: ";
        // line 86
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "addressLegal", array()), "html", null, true);
        echo ", телефон: ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "phone1", array()), "html", null, true);
        echo ", ИНН: ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "inn", array()), "html", null, true);
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "kpp", array())) {
            echo ", КПП: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "kpp", array()), "html", null, true);
        }
        echo ",
                                                расчетный счет: ";
        // line 87
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "bankAccount", array()), "html", null, true);
        echo "
                                            ";
        // line 88
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "bank", array())) {
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "bank", array()), "caption", array()), "html", null, true);
            if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "corrAccount", array())) {
                echo ", кор. счет: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "corrAccount", array()), "html", null, true);
            }
        }
        // line 89
        echo "                                            ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array(), "any", false, true), "bank", array(), "any", false, true), "bik", array(), "any", true, true)) {
            echo ", БИК: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "bank", array()), "bik", array()), "html", null, true);
        }
        echo "</td>
                                    </tr></table>
                            </td>
                            <td class=\"xl29\" colspan=\"2\" style=\"border-right:.5pt solid black;\">Вид деятельности по ОКДП</td>
                            <td class=\"xl38\"></td>
                        </tr>
                        <tr>
                            <td class=\"xl32\" colspan=\"2\">по ОКПО</td>
                            <td class=\"xl38\"></td>
                        </tr>
                        <tr>
                            <td colspan=\"12\">
                                <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"800\"><tr>
                                        <td class=\"xl67\" style=\"padding-right:10px;width:120px;\" valign=\"middle\">Поставщик:</td>
                                        <td class=\"xl97\" valign=\"middle\">";
        // line 103
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "legalForm", array()), "captionRu", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "caption", array()), "html", null, true);
        echo ", адрес: ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "addressPost", array()), "html", null, true);
        echo ", телефон: ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "phone", array()), "html", null, true);
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "inn", array())) {
            echo ", ИНН: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "inn", array()), "html", null, true);
        }
        // line 104
        echo "                                            ";
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "paymentAccount", array())) {
            echo ", расчетный счет: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "paymentAccount", array()), "html", null, true);
        }
        // line 105
        echo "                                            ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array(), "any", false, true), "bank", array(), "any", false, true), "bic", array(), "any", true, true)) {
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "bank", array()), "caption", array()), "html", null, true);
        }
        // line 106
        echo "                                            ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "bank", array()), "correspondentAccount", array())) {
            echo ", кор. счет: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "bank", array()), "correspondentAccount", array()), "html", null, true);
        }
        // line 107
        echo "                                            ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array(), "any", false, true), "bank", array(), "any", false, true), "bik", array(), "any", true, true)) {
            echo ", БИК:  ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "bank", array()), "bik", array()), "html", null, true);
        }
        echo "</td>
                                    </tr></table>
                            </td>
                            <td colspan=\"1\"></td>
                            <td class=\"xl32\">по ОКПО</td>
                            <td class=\"xl31\">";
        // line 112
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "okpo", array()), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <td colspan=\"12\">
                                <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"800\"><tr>
                                        <td class=\"xl67\" style=\"padding-right:10px;width:120px;\" valign=\"middle\">Плательщик:</td>
                                        <td class=\"xl97\" valign=\"middle\">";
        // line 118
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "legalForm", array()), "captionRu", array()), "html", null, true);
        echo " \"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragentCompany", array()), "html", null, true);
        echo "\",
                                            адрес: ";
        // line 119
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryAddress", array()), "html", null, true);
        echo ", телефон: ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "phone1", array()), "html", null, true);
        echo ", ИНН: ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "inn", array()), "html", null, true);
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "kpp", array())) {
            echo ", КПП: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "kpp", array()), "html", null, true);
        }
        echo ",
                                            расчетный счет: ";
        // line 120
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "bankAccount", array()), "html", null, true);
        echo "
                                        ";
        // line 121
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "bank", array())) {
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "bank", array()), "caption", array()), "html", null, true);
            if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "corrAccount", array())) {
                echo ", кор. счет: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "corrAccount", array()), "html", null, true);
            }
        }
        // line 122
        echo "                                        ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array(), "any", false, true), "bank", array(), "any", false, true), "bik", array(), "any", true, true)) {
            echo ", БИК: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "bank", array()), "bik", array()), "html", null, true);
        }
        // line 123
        echo "                                    </td>
                                </tr></table>
                        </td>
                        <td colspan=\"1\"></td>
                        <td class=\"xl32\">по ОКПО</td>
                        <td class=\"xl31\"></td>
                    </tr>
                    <tr>
                        <td colspan=\"12\">
                            <table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"800\"><tr>
                                    <td class=\"xl67\" style=\"padding-right:10px;width:120px;\" valign=\"middle\">Основание:</td>
                                    <td class=\"xl97\" valign=\"middle\">По счету No ";
        // line 134
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array()), "html", null, true);
        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())) {
            echo " от ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "createdDateTime", array()), "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
        }
        echo "</td>
                                </tr></table>
                        </td>
                        <td colspan=\"1\"></td>
                        <td class=\"xl78\" style=\"border-top: .5pt solid black;\">номер</td>
                        <td class=\"xl78\"></td>
                    </tr>
                    <tr>
                        <td colspan=\"11\" height=\"14\"></td>
                        <td colspan=\"2\" style=\"border-top: 0 none;\"></td>
                        <td class=\"xl78\">дата</td>
                        <td class=\"xl78\"></td>
                    </tr>

                    <tr>
                        <td colspan=\"2\"></td>
                        <td colspan=\"2\" class=\"xl71\" width=\"105\">Номер документа</td>
                        <td colspan=\"3\" class=\"xl73\" width=\"139\">Дата составления</td>
                        <td colspan=\"3\"></td>
                        <td colspan=\"3\" class=\"xl29\" style=\"border-right:.5pt solid black;\">Транспортная накладная</td>
                        <td class=\"xl79\">номер</td>
                        <td class=\"xl38\"></td>
                    </tr>

                    <tr>
                        <td height=\"16\"></td>
                        <td class=\"xl76\">ТОВАРНАЯ НАКЛАДНАЯ</td>
                        <td colspan=\"2\" class=\"xl41\">";
        // line 161
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())), "html", null, true);
        echo "</td>
                        <td colspan=\"3\" class=\"xl41\">";
        // line 162
        if ((isset($context["dateFrom"]) ? $context["dateFrom"] : null)) {
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["dateFrom"]) ? $context["dateFrom"] : null), "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
        }
        echo "</td>
                        <td colspan=\"6\"></td>
                        <td class=\"xl78\">дата</td>
                        <td class=\"xl38\"></td>
                    </tr>

                    <tr>
                        <td colspan=\"12\" height=\"17\"></td>
                        <td colspan=\"2\" class=\"xl29\" style=\"border-right:.5pt solid black;\">Вид операции</td>
                        <td class=\"xl38\"></td>
                    </tr>
                    <tr>
                        <td colspan=\"15\" class=\"xl47\" height=\"11\"></td>
                    </tr>

                    <tr>
                        <td rowspan=\"2\" class=\"xl80\" style=\"border-bottom: 2pt double black; width: 25pt;\">№ п/п</td>
                        <td colspan=\"2\" class=\"xl81\" style=\"border-right:.5pt solid black; border-left: medium none; width: 255pt;\">Товар</td>
                        <td colspan=\"2\" class=\"xl83\">Ед. измерения</td>
                        <td rowspan=\"2\" class=\"xl80\" style=\"border-bottom: 2pt double black; width: 36pt;\">Вид упаков-<br>ки</td>
                        <td colspan=\"2\" class=\"xl81\" style=\"border-right:.5pt solid black; border-left: medium none; width: 68pt;\">Количество</td>
                        <td rowspan=\"2\" class=\"xl80\" style=\"border-bottom: 2pt double black; width: 33pt;\">Масса брутто</td>
                        <td rowspan=\"2\" class=\"xl80\" style=\"border-bottom: 2pt double black; width: 31pt;\">Кол-во (масса нетто)</td>
                        <td rowspan=\"2\" class=\"xl80\" style=\"border-bottom: 2pt double black; width: 44pt;\">Цена,<br />руб.коп.</td>
                        <td rowspan=\"2\" class=\"xl80\" style=\"border-bottom: 2pt double black; width: 59pt;\">Сумма без учета НДС, руб. коп.</td>
                        <td colspan=\"2\" class=\"xl81\" style=\"border-right:.5pt solid black; border-left: medium none; width: 89pt;\">НДС</td>
                        <td rowspan=\"2\" class=\"xl80\" style=\"border-bottom: 2pt double black; width: 61pt;\">Сумма с учетом НДС, руб.коп.</td>
                    </tr>
                    <tr>
                        <td class=\"xl48\" style=\"width: 232pt;\">наименование, характеристика, сорт, артикул товара</td>
                        <td class=\"xl48\" style=\"width: 23pt;\">код</td>
                        <td class=\"xl48\" style=\"width: 36pt;\">наимено-<br>вание</td>
                        <td class=\"xl48\" style=\"width: 31pt;\">код по ОКЕИ</td>
                        <td class=\"xl48\" style=\"width: 38pt;\">в одном месте</td>
                        <td class=\"xl48\" style=\"width: 30pt;\">мест,<br />шт.</td>
                        <td class=\"xl48\" style=\"width: 32pt;\">Ставка %</td>
                        <td class=\"xl48\" style=\"width: 57pt;\">сумма,<br />руб.коп.</td>
                    </tr>
                    <tr>
                        <td class=\"xl49\">1</td>
                        <td class=\"xl50\">2</td>
                        <td class=\"xl50\">3</td>
                        <td class=\"xl50\">4</td>
                        <td class=\"xl50\">5</td>
                        <td class=\"xl50\">6</td>
                        <td class=\"xl50\">7</td>
                        <td class=\"xl50\">8</td>
                        <td class=\"xl50\">9</td>
                        <td class=\"xl50\">10</td>
                        <td class=\"xl50\">11</td>
                        <td class=\"xl50\">12</td>
                        <td class=\"xl50\">13</td>
                        <td class=\"xl50\">14</td>
                        <td class=\"xl50\">15</td>
                    </tr>
                    ";
        // line 217
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "compositions", array()));
        foreach ($context['_seq'] as $context["comp_index"] => $context["comp"]) {
            // line 218
            echo "                        <tr>
                            <td class=\"xl51\">";
            // line 219
            echo twig_escape_filter($this->env, ($context["comp_index"] + 1), "html", null, true);
            echo "</td>
                            <td class=\"xl52\" style=\"hyphens:none\">";
            // line 220
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "sku", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "captionRu", array()), "html", null, true);
            echo "</td>
                            <td class=\"xl53\">&mdash;</td>
                            <td class=\"xl52\">";
            // line 222
            if ($this->getAttribute($this->getAttribute($this->getAttribute($context["comp"], "product", array(), "any", false, true), "unitOfMeasure", array(), "any", false, true), "shortCaptionRu", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["comp"], "product", array()), "unitOfMeasure", array()), "shortCaptionRu", array()), "html", null, true);
            } else {
                echo "&mdash;";
            }
            echo "</td>
                            <td class=\"xl53\">";
            // line 223
            if ($this->getAttribute($this->getAttribute($this->getAttribute($context["comp"], "product", array(), "any", false, true), "unitOfMeasure", array(), "any", false, true), "okeiCode", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["comp"], "product", array()), "unitOfMeasure", array()), "okeiCode", array()), "html", null, true);
            } else {
                echo "&mdash;";
            }
            echo "</td>
                            <td class=\"xl53\">&mdash;</td>
                            <td class=\"xl53\">&mdash;</td>
                            <td class=\"xl53\">&mdash;</td>
                            <td class=\"xl53\">&mdash;</td>
                            <td class=\"xl59\">";
            // line 228
            echo twig_escape_filter($this->env, $this->getAttribute($context["comp"], "quantity", array()), "html", null, true);
            echo "</td>
                            <td class=\"xl53\">";
            // line 229
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($context["comp"], "price", array())), "html", null, true);
            echo "</td>
                            <td class=\"xl53\">";
            // line 230
            if ($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array()), "composition", array()), $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "id", array()), array(), "array"), "cost_without_ndsTax", array())), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "composition", array()), $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "id", array()), array(), "array"), "cost_without_ndsTax", array())), "html", null, true);
            }
            echo "</td>
                            <td class=\"xl53\">";
            // line 231
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "ndsTax", array()), "html", null, true);
            echo "</td>
                            <td class=\"xl53\">";
            // line 232
            if ($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array()), "composition", array()), $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "id", array()), array(), "array"), "ndsSum", array())), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "composition", array()), $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "id", array()), array(), "array"), "ndsSum", array())), "html", null, true);
            }
            echo "</td>
                            <td class=\"xl53\">";
            // line 233
            if ($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array()), "composition", array()), $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "id", array()), array(), "array"), "cost", array())), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "composition", array()), $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "id", array()), array(), "array"), "cost", array())), "html", null, true);
            }
            echo "</td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['comp_index'], $context['comp'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 236
        echo "                    <tr>
                        <td colspan=\"3\" class=\"xl47\"></td>
                        <td colspan=\"4\" class=\"xl55\" style=\"border-right:.5pt solid black; border-top: none;\" >Итого</td>
                        <td class=\"xl57\">x</td>
                        <td class=\"xl90\">x</td>
                        <td class=\"xl59\">";
        // line 241
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "total_quantity", array()), "html", null, true);
        echo "</td>
                        <td class=\"xl90\">x</td>
                        <td class=\"xl53\" align=\"right\">";
        // line 243
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "total_cost_no_nds_tax", array())), "html", null, true);
        echo "</td>
                        <td class=\"xl90\">x</td>
                        <td class=\"xl53\" align=\"right\">";
        // line 245
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "nds_tax", array())), "html", null, true);
        echo "</td>
                        <td class=\"xl53\" align=\"right\">";
        // line 246
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "total_cost", array())), "html", null, true);
        echo "</td>
                    </tr>

                    <tr>
                        <td colspan=\"3\" class=\"xl47\"></td>
                        <td colspan=\"4\" class=\"xl55\" style=\"border-right:.5pt solid black; border-top: none;\" >Сумма</td>
                        <td class=\"xl57\">x</td>
                        <td class=\"xl90\">x</td>
                        <td class=\"xl59\">";
        // line 254
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "total_quantity", array()), "html", null, true);
        echo "</td>
                        <td class=\"xl90\">x</td>
                        <td class=\"xl53\" align=\"right\">";
        // line 256
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "total_cost_no_nds_tax", array())), "html", null, true);
        echo "</td>
                        <td class=\"xl90\">x</td>
                        <td class=\"xl53\" align=\"right\">";
        // line 258
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "nds_tax", array())), "html", null, true);
        echo "</td>
                        <td class=\"xl53\" align=\"right\">";
        // line 259
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "total_cost", array())), "html", null, true);
        echo "</td>
                    </tr>


                    <!--
                    <tr>
                        <td colspan=\"15\" style=\"padding-top: {\$p.margin}px;\">&nbsp;</td>
                    </tr>
                    -->
            </table>





            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"1022\" class=\"torg12\">

                <tr>
                    <td colspan=\"2\" class=\"xl58\">Товарная накладная имеет приложение на</td>
                    <td colspan=\"5\" class=\"xl58\" style=\"border-bottom:.5pt solid black;\">";
        // line 278
        echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->num2prepositionalFunction((isset($context["pageCount"]) ? $context["pageCount"] : null)), "html", null, true);
        echo "</td>
                    <td colspan=\"8\" class=\"xl58\">";
        // line 279
        echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction((isset($context["pageCount"]) ? $context["pageCount"] : null), array(0 => "листе", 1 => "листах", 2 => "листах")), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <td colspan=\"2\" class=\"xl58\"></td>
                    <td colspan=\"5\" class=\"xl58\" style=\"font-size: 7pt;\" align=\"center\">прописью</td>
                    <td colspan=\"8\" class=\"xl58\"></td>
                </tr>
                <tr>
                    <td colspan=\"2\" class=\"xl58\">и содержит</td>
                    <td colspan=\"5\" class=\"xl58\" style=\"border-bottom:.5pt solid black;\">";
        // line 288
        echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->num2strFunction($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "compositions", array()), "count", array())), "html", null, true);
        echo "</td>
                    <td colspan=\"8\" class=\"xl58\">порядковых номеров записей</td>
                </tr>
                <tr>
                    <td colspan=\"2\" class=\"xl58\"></td>
                    <td colspan=\"5\" class=\"xl58\" style=\"font-size: 7pt;\" align=\"center\">прописью</td>
                    <td colspan=\"8\" class=\"xl58\"></td>
                </tr>

                <tr>
                    <td colspan=\"5\" class=\"xl58\"></td>
                    <td colspan=\"3\" class=\"xl58\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Масса груза (нетто)</td>
                    <td colspan=\"6\" class=\"xl58\" style=\"border-bottom:.5pt solid black;\"></td>
                    <td colspan=\"1\" class=\"xl58\" style=\"border:1pt solid black;\"></td>
                </tr>
                <tr>
                    <td colspan=\"8\" class=\"xl58\"></td>
                    <td colspan=\"6\" class=\"xl58\" style=\"font-size: 7pt;\" align=\"center\">прописью</td>
                    <td colspan=\"1\" class=\"xl58\"></td>
                </tr>
                <tr>
                    <td colspan=\"2\" class=\"xl58\">Всего мест</td>
                    <td colspan=\"3\" class=\"xl58\" style=\"border-bottom:.5pt solid black;\"></td>
                    <td colspan=\"3\" class=\"xl58\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Масса груза (брутто)</td>
                    <td colspan=\"6\" class=\"xl58\" style=\"border-bottom:.5pt solid black;\"></td>
                    <td colspan=\"1\" class=\"xl58\" style=\"border:1pt solid black;\"></td>
                </tr>
                <tr>
                    <td colspan=\"2\" class=\"xl58\"></td>
                    <td colspan=\"3\" class=\"xl58\" style=\"font-size: 7pt;\" align=\"center\">прописью</td>
                    <td colspan=\"3\" class=\"xl58\"></td>
                    <td colspan=\"6\" class=\"xl58\" style=\"font-size: 7pt;\" align=\"center\">прописью</td>
                    <td colspan=\"1\" class=\"xl58\"></td>
                </tr>
                <tr>
                    <td colspan=\"2\" class=\"xl58\">Приложение (паспорта, сертификаты и т.п.) на </td>
                    <td colspan=\"3\" class=\"xl58\" style=\"border-bottom:.5pt solid black;\"></td>
                    <td colspan=\"3\" class=\"xl58\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;листах</td>
                    <td class=\"xl92\"></td>
                    <td colspan=\"6\" class=\"xl61\" style=\"border-left: medium none;\"></td>
                </tr>
                <tr>
                    <td colspan=\"2\" class=\"xl58\"></td>
                    <td colspan=\"3\" class=\"xl58\" style=\"font-size: 7pt;\" align=\"center\">прописью</td>
                    <td colspan=\"3\" class=\"xl58\"></td>
                    <td class=\"xl92\"></td>
                    <td colspan=\"6\" class=\"xl61\" style=\"border-left: medium none;\">По доверенности № ___________ от \"____\" _______________ 20 __ г.</td>
                </tr>
                <tr>
                    <td colspan=\"8\" class=\"xl58\">Всего отпущено на сумму:  ";
        // line 337
        if ($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->amount2strFunction($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array()), "composition_total_cost", array())), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->amount2strFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "composition_total_cost", array())), "html", null, true);
        }
        echo ". ";
        if ( !$this->getAttribute((isset($context["order"]) ? $context["order"] : null), "ndsTax", array())) {
            echo "Без НДС";
        }
        echo "</td>
                    <td class=\"xl92\"></td>
                    <td colspan=\"6\" class=\"xl61\" style=\"border-left: medium none;\">выданной _____________________________________________________</td>
                </tr>
                <tr>
                    <td colspan=\"8\" class=\"xl58\">Отпуск груза разрешил ";
        // line 342
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "positionOfTheHead", array()), "html", null, true);
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_______________________&nbsp;&nbsp;&nbsp;/ ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "nameOfTheHead", array()), "html", null, true);
        echo " /</td>
                    <td class=\"xl92\"></td>
                    <td colspan=\"6\" class=\"xl61\" style=\"border-left: medium none; font-size: 7pt;\" align=\"center\">кем, кому (организация, место работы, должность, фамилия, и. о.)</td>
                </tr>
                <tr>
                    <td colspan=\"3\" class=\"xl64\" style=\"font-size: 7pt;\" align=\"center\">должность</td>
                    <td colspan=\"2\" class=\"xl64\" style=\"font-size: 7pt;\">подпись</td>
                    <td colspan=\"3\" class=\"xl64\" style=\"font-size: 7pt;\" align=\"center\">расшифровка подписи</td>
                    <td class=\"xl92\"></td>
                    <td colspan=\"6\" class=\"xl65\" style=\"border-left: medium none;\"></td>
                </tr>
                <tr>
                    <td colspan=\"8\" class=\"xl58\">Главный (старший) бухгалтер&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_______________________&nbsp;&nbsp;&nbsp;/ ";
        // line 354
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "nameOfTheAccountant", array()), "html", null, true);
        echo " /</td>
                    <td class=\"xl92\"></td>
                    <td colspan=\"6\" class=\"xl61\" style=\"border-left: medium none;\">Груз принял _____________________________________________________</td>
                </tr>
                <tr>
                    <td colspan=\"3\" class=\"xl64\" style=\"font-size: 7pt;\" align=\"center\"></td>
                    <td colspan=\"2\" class=\"xl64\" style=\"font-size: 7pt;\">подпись</td>
                    <td colspan=\"3\" class=\"xl64\" style=\"font-size: 7pt;\" align=\"center\">расшифровка подписи</td>
                    <td class=\"xl92\"></td>
                    <td colspan=\"6\" class=\"xl65\" style=\"border-left: medium none; font-size: 7pt; padding-left: 120px;\">должность&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;подпись&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;расшифровка подписи</td>
                </tr>
                <tr>
                    <td colspan=\"8\" class=\"xl58\">Отпуск груза произвел ";
        // line 366
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "positionOfTheHead", array()), "html", null, true);
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_______________________&nbsp;&nbsp;&nbsp;/ ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "nameOfTheHead", array()), "html", null, true);
        echo " /</td>
                    <td class=\"xl92\"></td>
                    <td colspan=\"6\" class=\"xl61\" style=\"border-left: medium none;\">Груз получил<br />грузополучатель__________________________________________________</td>
                </tr>
                <tr>
                    <td colspan=\"3\" class=\"xl64\" style=\"font-size: 7pt;\" align=\"center\">должность</td>
                    <td colspan=\"2\" class=\"xl64\" style=\"font-size: 7pt;\">подпись</td>
                    <td colspan=\"3\" class=\"xl64\" style=\"font-size: 7pt;\" align=\"center\">расшифровка подписи</td>
                    <td class=\"xl92\"></td>
                    <td colspan=\"6\" class=\"xl65\" style=\"border-left: medium none; font-size: 7pt; padding-left: 120px;\">должность&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;подпись&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;расшифровка подписи</td>
                </tr>
                <tr>
                    <td class=\"xl58\"></td>
                    <td colspan=\"4\" class=\"xl96\">";
        // line 379
        if ( !(isset($context["haveStamps"]) ? $context["haveStamps"] : null)) {
            echo "М.П.";
        }
        if ((isset($context["dateFrom"]) ? $context["dateFrom"] : null)) {
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "createdDateTime", array()), "none", "none", null, (isset($context["default_timezone"]) ? $context["default_timezone"] : null), "\"d\" MMMM Y"), "html", null, true);
            echo " года";
        }
        echo "</td>
                    <td colspan=\"4\" class=\"xl58\"></td>
                    <td colspan=\"1\" class=\"xl65\"></td>
                    <td colspan=\"5\" class=\"xl65\" style=\"border-left: medium none;\">М.П.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\"____\" __________________ 20 __ года</td>
                </tr>
                </tbody>
            </table>
        </center>


        ";
        // line 389
        if ((isset($context["haveStamps"]) ? $context["haveStamps"] : null)) {
            // line 390
            echo "            <div style=\"position:absolute;bottom:50px;left:185px;\"><img alt=\"stamp\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "imageStamp", array())), "html", null, true);
            echo "\" height=\"150\" width=\"150\" /></div>
            <div style=\"position:absolute;bottom:145px;left:320px;\"><img alt=\"sign\" src=\"";
            // line 391
            echo twig_escape_filter($this->env, $this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "imageSign", array())), "html", null, true);
            echo "\" height=\"70\" width=\"70\" /></div>
            <div style=\"position:absolute;bottom:100px;left:320px;\"><img alt=\"sign\" src=\"";
            // line 392
            echo twig_escape_filter($this->env, $this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "imageSignAndStamp", array())), "html", null, true);
            echo "\" height=\"70\" width=\"70\" /></div>
            <div style=\"position:absolute;bottom:75px;left:350px;\"><img alt=\"sign\" src=\"";
            // line 393
            echo twig_escape_filter($this->env, $this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "imageSign", array())), "html", null, true);
            echo "\" height=\"70\" width=\"70\" /></div>
        ";
        }
        // line 395
        echo "        ";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Documents:waybillAtTheDateTorg12.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  737 => 395,  732 => 393,  728 => 392,  724 => 391,  719 => 390,  717 => 389,  697 => 379,  679 => 366,  664 => 354,  647 => 342,  631 => 337,  579 => 288,  567 => 279,  563 => 278,  541 => 259,  537 => 258,  532 => 256,  527 => 254,  516 => 246,  512 => 245,  507 => 243,  502 => 241,  495 => 236,  482 => 233,  474 => 232,  470 => 231,  462 => 230,  458 => 229,  454 => 228,  442 => 223,  434 => 222,  427 => 220,  423 => 219,  420 => 218,  416 => 217,  356 => 162,  352 => 161,  318 => 134,  305 => 123,  299 => 122,  290 => 121,  286 => 120,  274 => 119,  268 => 118,  259 => 112,  247 => 107,  241 => 106,  235 => 105,  229 => 104,  217 => 103,  196 => 89,  187 => 88,  183 => 87,  171 => 86,  165 => 85,  156 => 79,  140 => 74,  134 => 73,  128 => 72,  120 => 71,  114 => 70,  94 => 52,  87 => 49,  82 => 48,  79 => 47,  76 => 46,  73 => 45,  70 => 44,  68 => 43,  26 => 3,  20 => 2,);
    }
}
