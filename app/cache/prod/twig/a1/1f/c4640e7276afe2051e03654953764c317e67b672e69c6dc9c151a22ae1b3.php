<?php

/* CoreOrderBundle:Admin/Documents:invoice.html.twig */
class __TwigTemplate_a11fc4640e7276afe2051e03654953764c317e67b672e69c6dc9c151a22ae1b3 extends Twig_Template
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
        echo "    ";
        $context["page"] = 1;
        // line 4
        echo "        ";
        if ((!$this->getAttribute((isset($context["order"]) ? $context["order"] : null), "costInfo", array(), "any", true, true))) {
            // line 5
            echo "            ";
            $context["costInfo"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => "core_order_logic"), "method"), "computeOrderCostInfo", array(0 => (isset($context["order"]) ? $context["order"] : null)), "method");
            // line 6
            echo "                ";
        }
        // line 7
        echo "                    ";
        ob_start();
        // line 8
        echo "                        <style type=\"text/css\">
                            table, td, th, div {font-family:Verdana, Arial}
                            table.invoice td, table.invoice th {border:.5pt solid #000;font-size:7.5pt}
                        </style>

                        <div>
                            <div style=\"float:left;width:73%;\">
                                <div style=\"font-size:14px\">
                                    <strong>СЧЕТ-ФАКТУРА No ";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())), "html", null, true);
        echo " от ";
        echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "createdDateTime", array()), "none", "none", null, (isset($context["default_timezone"]) ? $context["default_timezone"] : null), "\"d\" MMMM Y"), "html", null, true);
        echo "</strong>
                                    <br />ИСПРАВЛЕНИЕ No --- от ---
                                </div>
                                <div style=\"margin:5px 0;\">
                                    Продавец: ";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "legalForm", array()), "captionRu", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "caption", array()), "html", null, true);
        echo "<br />
                                    Адрес: ";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "addressUr", array()), "html", null, true);
        echo "; ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "phone", array()), "html", null, true);
        echo "<br />
                                    ИНН / КПП продавца: ";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "inn", array()), "html", null, true);
        echo " / ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "kpp", array()), "html", null, true);
        echo "<br />
                                    Грузоотправитель и его адрес: он же<br />
                                    Грузополучатель и его адрес:  ";
        // line 24
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array(), "any", false, true), "legalForm", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "legalForm", array()), "captionRu", array()), "html", null, true);
            echo "  &quot;";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragentFio", array()), "html", null, true);
            echo "&quot;; ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "addressLegal", array()), "html", null, true);
        } else {
            // line 25
            echo "                                    ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "recipientFio", array()), "html", null, true);
            echo "; ";
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryPostcode", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryPostcode", array()), "html", null, true);
                echo ", ";
            }
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryCity", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryCity", array()), "name", array()), "html", null, true);
            }
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryAddress", array()), "html", null, true);
        }
        echo "<br />
                                        К платежно-расчетному документу No  от
                                        <br />
                                        Покупатель: ";
        // line 28
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array(), "any", false, true), "legalForm", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "legalForm", array()), "captionRu", array()), "html", null, true);
            echo "  &quot;";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragentFio", array()), "html", null, true);
            echo "&quot;";
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragentFio", array()), "html", null, true);
            echo "<br />
                                        Адрес: ";
            // line 29
            if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array(), "any", false, true), "legalForm", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "addressLegal", array()), "html", null, true);
            } else {
                if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryPostcode", array())) {
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryPostcode", array()), "html", null, true);
                    echo ", ";
                }
                if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryCity", array())) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryCity", array()), "name", array()), "html", null, true);
                }
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryAddress", array()), "html", null, true);
            }
        }
        echo "<br />
                                        ИНН / КПП покупателя: ";
        // line 30
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array(), "any", false, true), "legalForm", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "inn", array()), "html", null, true);
        } else {
            echo "---";
        }
        echo " / ";
        if (($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array(), "any", false, true), "legalForm", array(), "any", true, true) && $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "kpp", array()))) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array()), "kpp", array()), "html", null, true);
        } else {
            echo "---";
        }
        echo "<br />
                                        Валюта: наименование, код: Российский рубль, 643
                                    </div>
                                </div>
                                <div style=\"float:right;width:25%;\">
                                    <div style=\"float:right; width: 52mm; height: 14mm; text-align: center;\">
                                        <barcode code=\"003";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())), "html", null, true);
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "createdDateTime", array()), "Ymd", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
        echo "\" type=\"C128C\" />
                                        <div style=\"font-size:7pt;\">003";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())), "html", null, true);
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "createdDateTime", array()), "Ymd", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
        echo "</div>
                                    </div>
                                    <div style=\"clear:both;\"></div>
                                    <div style=\"font-size:7pt;\">
                                        Приложение N 1<br />
                                        к постановлению Правительства Российской Федерации<br />
                                        от 26 декабря 2011 г. N 1137
                                    </div>
                                </div>
                                <div style=\"clear:both;\"></div>
                            </div>

                            <table width=\"100%\" border=\"0\" cellpadding=\"2\" cellspacing=\"0\" class=\"invoice\" style=\"border-collapse: collapse\">
                                <tr>
                                    <th rowspan=\"2\" style=\"width:270px\">Наименование товара<br />(описание выполненных работ,<br />оказанных услуг), имущественного права</th>
                                    <th colspan=\"2\">Единица<br />измерения</th>
                                    <th rowspan=\"2\">Коли-<br />чество<br />(объем)</th>
                                    <th rowspan=\"2\">Цена (тариф)<br />за единицу<br />измерения</th>
                                    <th rowspan=\"2\">Стоимость<br />товаров (работ,<br />услуг),<br />имущественных<br />прав без<br />налога - всего</th>
                                    <th rowspan=\"2\">В том<br />числе<br />сумма<br />акциза</th>
                                    <th rowspan=\"2\">Нало-<br />говая<br />ставка</th>
                                    <th rowspan=\"2\">Сумма<br />налога,<br/>предъяв-<br />ляемая<br />покупателю</th>
                                    <th rowspan=\"2\">Стоимость<br />товаров<br />(работ,&nbsp;услуг),<br />имущественных<br />прав с налогом -<br />всего</th>
                                    <th colspan=\"2\">Страна<br />происхождения<br />товара</th>
                                    <th rowspan=\"2\">Номер<br />таможенной декларации</th>
                                </tr>
                                <tr>
                                    <th>Код</th>
                                    <th>Условное<br />обозна-<br />чение{*<br />(национальное)*}</th>
                                    <th>Циф-<br />ровой<br />код</th>
                                    <th>Краткое<br />наиме-<br />нование</th>
                                </tr>
                                <tr>
                                    <td align=\"center\" style=\"width:270px\">1</td>
                                    <td align=\"center\">2</td>
                                    <td align=\"center\">2a</td>
                                    <td align=\"center\">3</td>
                                    <td align=\"center\">4</td>
                                    <td align=\"center\">5</td>
                                    <td align=\"center\">6</td>
                                    <td align=\"center\">7</td>
                                    <td align=\"center\">8</td>
                                    <td align=\"center\">9</td>
                                    <td align=\"center\">10</td>
                                    <td align=\"center\">10a</td>
                                    <td align=\"center\">11</td>
                                </tr>
                                ";
        // line 84
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "compositions", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["comp"]) {
            // line 85
            echo "                                    <tr>
                                        <td align=\"left\" style=\"width:270px;hyphens:none;\">";
            // line 86
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "sku", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "captionRu", array()), "html", null, true);
            echo "</td>
                                        <td align=\"center\" nowrap>";
            // line 87
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["comp"], "product", array()), "UnitOfMeasure", array()), "okeiCode", array()), "html", null, true);
            echo "</td>
                                        <td align=\"center\" nowrap>";
            // line 88
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["comp"], "product", array()), "UnitOfMeasure", array()), "shortCaptionRu", array()), "html", null, true);
            echo "</td>
                                        <td align=\"right\" nowrap>";
            // line 89
            echo twig_escape_filter($this->env, $this->getAttribute($context["comp"], "quantity", array()), "html", null, true);
            echo "</td>
                                        <td align=\"right\" nowrap>";
            // line 90
            if ($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array()), "composition", array()), $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "id", array()), array(), "array"), "cost_per_one_unit_without_ndsTax", array())), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "composition", array()), $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "id", array()), array(), "array"), "cost_per_one_unit_without_ndsTax", array())), "html", null, true);
            }
            echo "</td>
                                        <td align=\"right\" nowrap>";
            // line 91
            if ($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array()), "composition", array()), $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "id", array()), array(), "array"), "cost_without_ndsTax", array())), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "composition", array()), $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "id", array()), array(), "array"), "cost_without_ndsTax", array())), "html", null, true);
            }
            echo "</td>
                                        <td align=\"center\" nowrap>без&nbsp;акциза</td>
                                        <td align=\"right\" nowrap>";
            // line 93
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "ndsTax", array()), "html", null, true);
            echo "%</td>
                                        <td align=\"right\" nowrap>";
            // line 94
            if ($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array()), "composition", array()), $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "id", array()), array(), "array"), "ndsSum", array())), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "composition", array()), $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "id", array()), array(), "array"), "ndsSum", array())), "html", null, true);
            }
            echo "</td>
                                        <td align=\"right\" nowrap>";
            // line 95
            if ($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array()), "composition", array()), $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "id", array()), array(), "array"), "cost", array())), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "composition", array()), $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "id", array()), array(), "array"), "cost", array())), "html", null, true);
            }
            echo "</td>
                                        <td align=\"center\" nowrap>
                                            ";
            // line 97
            if ($this->getAttribute($this->getAttribute((isset($context["extraData"]) ? $context["extraData"] : null), $this->getAttribute($context["comp"], "id", array()), array(), "array", false, true), "countries", array(), "any", true, true)) {
                // line 98
                echo "                                                ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["extraData"]) ? $context["extraData"] : null), $this->getAttribute($context["comp"], "id", array()), array(), "array"), "countries", array()));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
                    // line 99
                    echo "                                                    ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["country"], "numeric", array()), "html", null, true);
                    if ((!$this->getAttribute($context["loop"], "last", array()))) {
                        echo ", ";
                    }
                    // line 100
                    echo "                                                ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 101
                echo "                                            ";
            } else {
                // line 102
                echo "                                                -
                                            ";
            }
            // line 104
            echo "                                        </td>
                                        <td align=\"center\" nowrap>
                                            ";
            // line 106
            if ($this->getAttribute($this->getAttribute((isset($context["extraData"]) ? $context["extraData"] : null), $this->getAttribute($context["comp"], "id", array()), array(), "array", false, true), "countries", array(), "any", true, true)) {
                // line 107
                echo "                                                ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["extraData"]) ? $context["extraData"] : null), $this->getAttribute($context["comp"], "id", array()), array(), "array"), "countries", array()));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
                    // line 108
                    echo "                                                    ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["country"], "captionRu", array()), "html", null, true);
                    if ((!$this->getAttribute($context["loop"], "last", array()))) {
                        echo ", ";
                    }
                    // line 109
                    echo "                                                ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 110
                echo "                                            ";
            } else {
                // line 111
                echo "                                                -
                                            ";
            }
            // line 113
            echo "                                        </td>
                                        <td align=\"left\" nowrap>
                                            ";
            // line 115
            if ($this->getAttribute($this->getAttribute((isset($context["extraData"]) ? $context["extraData"] : null), $this->getAttribute($context["comp"], "id", array()), array(), "array", false, true), "gtd", array(), "any", true, true)) {
                // line 116
                echo "                                                ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["extraData"]) ? $context["extraData"] : null), $this->getAttribute($context["comp"], "id", array()), array(), "array"), "gtd", array()));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["gtd"]) {
                    // line 117
                    echo "                                                    ";
                    echo twig_escape_filter($this->env, $context["gtd"], "html", null, true);
                    if ((!$this->getAttribute($context["loop"], "last", array()))) {
                        echo ", ";
                    }
                    // line 118
                    echo "                                                ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['gtd'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 119
                echo "                                            ";
            } else {
                // line 120
                echo "                                                -
                                            ";
            }
            // line 122
            echo "                                        </td>
                                    </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comp'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 125
        echo "                            </table>

                            <div style=\"font-size:7pt;position:absolute;bottom:30px;left:40px\">Примечание. 1. Первый экземпляр счета-фактуры, составленного на бумажном носителе - покупателю, второй экземпляр - продавцу.<br />2. При составлении организацией счета-фактуры в электронном виде показатель «Главный бухгалтер (подпись) (Ф.И.О.)» не формируется.</div>
                            <div style=\"font-size:7pt;position:absolute;bottom:30px;right:40px;text-align:right;\">Страница ";
        // line 128
        echo twig_escape_filter($this->env, (isset($context["page"]) ? $context["page"] : null), "html", null, true);
        echo " из ";
        echo twig_escape_filter($this->env, (isset($context["pagescount"]) ? $context["pagescount"] : null), "html", null, true);
        echo "</div>


                            <table width=\"100%\" border=\"0\" cellpadding=\"2\" cellspacing=\"0\" class=\"invoice\" style=\"border-collapse: collapse\">
                                <tr>
                                    <td align=\"left\" colspan=\"5\"><strong>Всего к оплате:</strong></td>
                                    <td align=\"right\" nowrap>";
        // line 134
        if ($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array()), "total_cost_no_nds_tax", array())), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "total_cost_no_nds_tax", array())), "html", null, true);
        }
        echo "</td>
                                    <td align=\"center\" colspan=\"2\">X</td>
                                    <td align=\"right\" nowrap>";
        // line 136
        if ($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array()), "nds_tax", array())), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "nds_tax", array())), "html", null, true);
        }
        echo "</td>
                                    <td align=\"right\" nowrap>";
        // line 137
        if ($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array()), "total_cost", array())), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "total_cost", array())), "html", null, true);
        }
        echo "</td>
                                </tr>
                            </table>

                            <div style=\"font-size:7pt;position:absolute;bottom:30px;left:40px\">Примечание. 1. Первый экземпляр счета-фактуры, составленного на бумажном носителе - покупателю, второй экземпляр - продавцу.<br />2. При составлении организацией счета-фактуры в электронном виде показатель «Главный бухгалтер (подпись) (Ф.И.О.)» не формируется.</div>
                            <div style=\"font-size:7pt;position:absolute;bottom:30px;right:40px;text-align:right;\">Страница ";
        // line 142
        echo twig_escape_filter($this->env, (isset($context["page"]) ? $context["page"] : null), "html", null, true);
        echo " из ";
        echo twig_escape_filter($this->env, (isset($context["pagescount"]) ? $context["pagescount"] : null), "html", null, true);
        echo "</div>

                            <br/>


                            <table width=\"100%\" border=\"0\" cellpadding=\"2\" cellspacing=\"0\">
                                <tr>
                                    <td valign=\"bottom\">Руководитель&nbsp;организации<br />или&nbsp;иное&nbsp;уполномоченное&nbsp;лицо</td>
                                    <td valign=\"bottom\">";
        // line 150
        if ((isset($context["haveStamps"]) ? $context["haveStamps"] : null)) {
            echo "<img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "imageSign", array())), "html", null, true);
            echo "\" width=\"70\" height=\"55\" style=\"margin-right:-80px;margin-bottom:-23px\" />";
        }
        echo "__________________________</td>
                                    <td valign=\"bottom\">";
        // line 151
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "nameOfTheHead", array()), "html", null, true);
        echo "</td>
                                    <td>&nbsp;</td>
                                    <td valign=\"bottom\">Главный&nbsp;бухгалтер<br />или&nbsp;иное&nbsp;уполномоченное&nbsp;лицо</td>
                                    <td valign=\"bottom\">";
        // line 154
        if ((isset($context["haveStamps"]) ? $context["haveStamps"] : null)) {
            echo "<img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "imageSignOfAccountant", array())), "html", null, true);
            echo "\" width=\"70\" height=\"55\" style=\"margin-right:-80px;margin-bottom:-28px\" />";
        }
        echo "__________________________</td>
                                    <td valign=\"bottom\">";
        // line 155
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "nameOfTheAccountant", array()), "html", null, true);
        echo "</td>
                                </tr>
                                <tr>
                                    <td valign=\"top\">&nbsp;</td>
                                    <td valign=\"top\" align=\"center\">(подпись)</td>
                                    <td valign=\"top\" align=\"center\">(ф. и. о.)</td>
                                    <td>&nbsp;</td>
                                    <td valign=\"top\">&nbsp;</td>
                                    <td valign=\"top\" align=\"center\">(подпись)</td>
                                    <td valign=\"top\" align=\"center\">(ф. и. о.)</td>
                                </tr>
                                <tr>
                                    <td colspan=\"7\">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td valign=\"bottom\">Индивидуальный&nbsp;предприниматель</td>
                                    <td valign=\"bottom\">__________________________</td>
                                    <td valign=\"bottom\">________________________________</td>
                                    <td>&nbsp;</td>
                                    <td valign=\"bottom\" colspan=\"3\">__________________________________________________________________________________________________________________</td>
                                </tr>
                                <tr>
                                    <td valign=\"top\">&nbsp;</td>
                                    <td valign=\"top\" align=\"center\">(подпись)</td>
                                    <td valign=\"top\" align=\"center\">(ф. и. о.)</td>
                                    <td>&nbsp;</td>
                                    <td valign=\"top\" align=\"center\" colspan=\"3\">(реквизиты свидетельства о государственной<br />регистрации индивидуального предпринимателя)</td>
                                </tr>
                            </table>

                            <div style=\"font-size:7pt;position:absolute;bottom:30px;left:40px\">Примечание. 1. Первый экземпляр счета-фактуры, составленного на бумажном носителе - покупателю, второй экземпляр - продавцу.<br />2. При составлении организацией счета-фактуры в электронном виде показатель «Главный бухгалтер (подпись) (Ф.И.О.)» не формируется.</div>
                            <div style=\"font-size:7pt;position:absolute;bottom:30px;right:40px;text-align:right;\">Страница ";
        // line 186
        echo twig_escape_filter($this->env, (isset($context["pagescount"]) ? $context["pagescount"] : null), "html", null, true);
        echo " из ";
        echo twig_escape_filter($this->env, (isset($context["pagescount"]) ? $context["pagescount"] : null), "html", null, true);
        echo "</div>
                            ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 188
        echo "
                                ";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Documents:invoice.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  548 => 188,  541 => 186,  507 => 155,  499 => 154,  493 => 151,  485 => 150,  472 => 142,  460 => 137,  452 => 136,  443 => 134,  432 => 128,  427 => 125,  419 => 122,  415 => 120,  412 => 119,  398 => 118,  392 => 117,  374 => 116,  372 => 115,  368 => 113,  364 => 111,  361 => 110,  347 => 109,  341 => 108,  323 => 107,  321 => 106,  317 => 104,  313 => 102,  310 => 101,  296 => 100,  290 => 99,  272 => 98,  270 => 97,  261 => 95,  253 => 94,  249 => 93,  240 => 91,  232 => 90,  228 => 89,  224 => 88,  220 => 87,  214 => 86,  211 => 85,  207 => 84,  156 => 37,  151 => 36,  132 => 30,  115 => 29,  105 => 28,  87 => 25,  79 => 24,  72 => 22,  66 => 21,  60 => 20,  51 => 16,  41 => 8,  38 => 7,  35 => 6,  32 => 5,  29 => 4,  26 => 3,  20 => 2,);
    }
}
