<?php

/* CoreOrderBundle:Admin/Documents:waybillAtTheDate.html.twig */
class __TwigTemplate_9d58ff6ffb31231428868268e27d651d4f20add0a54df8fa94a5c4850d105b98 extends Twig_Template
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
        table {font-family: Verdana, Arial; font-size: 12px; width: 100%; border: none;}
        table.items {margin: 20px 0;}
        table.items th {border-style: solid; border-color: #000;}
        table.items td {border-style: solid; border-color: #000;}
    </style>

    ";
        // line 10
        if ( !$this->getAttribute((isset($context["order"]) ? $context["order"] : null), "costInfo", array(), "any", true, true)) {
            // line 11
            echo "        ";
            $context["costInfo"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => "core_order_logic"), "method"), "computeOrderCostInfo", array(0 => (isset($context["order"]) ? $context["order"] : null)), "method");
            // line 12
            echo "            ";
        }
        // line 13
        echo "                ";
        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())) {
            // line 14
            echo "                            <div style=\"float:right; width: 52mm; height: 14mm; text-align: center;\">
                                <barcode code=\"002";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())), "html", null, true);
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "createdDateTime", array()), "Ymd", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            echo "\" type=\"C128C\" />
                                <div style=\"font-size:7pt;\">002";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())), "html", null, true);
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["dateFrom"]) ? $context["dateFrom"] : null), "Ymd", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            echo "</div>
                            </div>
                ";
        }
        // line 19
        echo "
                <table cellspacing=\"0\">
                    <tr><td><b>Продавец:</b> ";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "legalForm", array()), "captionRu", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "caption", array()), "html", null, true);
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "inn", array())) {
            echo ", ИНН: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "inn", array()), "html", null, true);
        }
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "kpp", array())) {
            echo ", КПП: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "kpp", array()), "html", null, true);
        }
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "ogrn", array())) {
            echo ", ОГРН: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "ogrn", array()), "html", null, true);
        }
        echo "</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td><b>Покупатель</b>: ";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragentFio", array()), "html", null, true);
        if (($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryCity", array(), "any", false, true), "name", array(), "any", true, true) || $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryAddress", array()))) {
            echo ", ";
            if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryCity", array(), "any", false, true), "name", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryCity", array()), "name", array()), "html", null, true);
                echo ", ";
            }
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryAddress", array()), "html", null, true);
        }
        echo "</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td><b>Основание:</b> По счету No ";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())), "html", null, true);
        echo " от ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "createdDateTime", array()), "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
        echo "</td></tr>

                </table>

                <table class=\"items\" cellpadding=\"3\" cellspacing=\"0\" style=\"margin-top:60px;border-collapse: collapse;\">
                    <tr><td align=\"center\" colspan=\"6\"><strong style=\"font-size:14px;\">НАКЛАДНАЯ No ";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())), "html", null, true);
        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())) {
            echo " от ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["dateFrom"]) ? $context["dateFrom"] : null), "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
        }
        echo "</strong></td></tr>
                    <tr>
                        <th style=\"border-width: .5pt 0 .5pt .5pt;\" width=\"1%\" nowrap>№</th>
                        <th style=\"border-width: .5pt 0 .5pt .5pt;\">Наименование</th>
                        <th style=\"border-width: .5pt 0 .5pt .5pt;\">Ед. изм.</th>
                        <th style=\"border-width: .5pt 0 .5pt .5pt;\">Цена</th>
                        <th style=\"border-width: .5pt 0 .5pt .5pt;\">Кол-во</th>
                        <th style=\"border-width: .5pt;\">Сумма</th>
                    </tr>
                    ";
        // line 39
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "compositions", array()));
        foreach ($context['_seq'] as $context["comp_index"] => $context["comp"]) {
            // line 40
            echo "                        <tr>
                            <td style=\"border-width: 0 0 .5pt .5pt;\">";
            // line 41
            echo twig_escape_filter($this->env, ($context["comp_index"] + 1), "html", null, true);
            echo "</td>
                            <td style=\"border-width: 0 0 .5pt .5pt;\">";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "sku", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "captionRu", array()), "html", null, true);
            echo "</td>
                            <td style=\"border-width: 0 0 .5pt .5pt;\">";
            // line 43
            if ($this->getAttribute($this->getAttribute($this->getAttribute($context["comp"], "product", array(), "any", false, true), "unitOfMeasure", array(), "any", false, true), "shortCaptionRu", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["comp"], "product", array()), "unitOfMeasure", array()), "shortCaptionRu", array()), "html", null, true);
            }
            echo "</td>
                            <td style=\"border-width: 0 0 .5pt .5pt;\" align=\"right\">";
            // line 44
            if ($this->getAttribute($context["comp"], "cost", array())) {
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction(($this->getAttribute($context["comp"], "cost", array()) / $this->getAttribute($context["comp"], "quantity", array()))), "html", null, true);
            } else {
                echo "0,00";
            }
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</td>
                            <td style=\"border-width: 0 0 .5pt .5pt;\" align=\"right\">";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($context["comp"], "quantity", array()), "html", null, true);
            echo "</td>
                            <td style=\"border-width: 0 .5pt .5pt .5pt;\" align=\"right\">";
            // line 46
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($context["comp"], "cost", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['comp_index'], $context['comp'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "                    <tr>
                        <td style=\"border-width: 0 0 .5pt .5pt;\" colspan=\"4\" align=\"right\"><strong>Итого:</strong></td>
                        <td style=\"border-width: 0 0 .5pt .5pt;\" align=\"right\">";
        // line 51
        if ($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array()), "total_quantity", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "total_quantity", array()), "html", null, true);
        }
        echo "</td>
                        <td style=\"border-width: 0 .5pt .5pt .5pt;\" align=\"right\">";
        // line 52
        if ($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array()), "composition_total_cost", array())), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "composition_total_cost", array())), "html", null, true);
        }
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</td>
                    </tr>

                    ";
        // line 55
        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "ndsTax", array())) {
            // line 56
            echo "                    <tr>
                        <td style=\"border-width: 0 0 .5pt .5pt;\" colspan=\"4\" align=\"right\"><strong>В том числе НДС (";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "ndsTax", array()), "html", null, true);
            echo "%):</strong></td>
                        <td style=\"border-width: 0 0 .5pt .5pt;\" align=\"right\">&mdash;</td>
                        <td style=\"border-width: 0 .5pt .5pt .5pt;\" align=\"right\">";
            // line 59
            if ($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array()), "nds_tax", array())), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "nds_tax", array())), "html", null, true);
            }
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</td>
                    </tr>
                    ";
        }
        // line 62
        echo "
                    <tr><td colspan=\"6\" align=\"left\">Сумма прописью:  ";
        // line 63
        if ($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->amount2strFunction($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array()), "composition_total_cost", array())), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->amount2strFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "composition_total_cost", array())), "html", null, true);
        }
        echo ". ";
        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "ndsTax", array())) {
            echo "НДС ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "ndsTax", array()), "html", null, true);
            echo "%";
        } else {
            echo "Без НДС";
        }
        echo ".</td></tr>
                </table>

                <table cellspacing=\"0\" style=\"margin-top:60px;\">
                    <tr>
                        <td><b>Отпустил</b></td>
                        <td><b>Получил</b></td>
                    </tr>
                    <tr>
                        <td>";
        // line 72
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "nameOfTheHead", array()), "html", null, true);
        echo "&nbsp;________________________</td>
                        <td>";
        // line 73
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array(), "any", false, true), "organization", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragentCompany", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragentFio", array()), "html", null, true);
        }
        echo "&nbsp;________________________</td>
                    </tr>
                </table>
                ";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Documents:waybillAtTheDate.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  248 => 73,  244 => 72,  220 => 63,  217 => 62,  205 => 59,  200 => 57,  197 => 56,  195 => 55,  183 => 52,  175 => 51,  171 => 49,  160 => 46,  156 => 45,  146 => 44,  140 => 43,  134 => 42,  130 => 41,  127 => 40,  123 => 39,  107 => 30,  97 => 25,  84 => 23,  65 => 21,  61 => 19,  54 => 16,  49 => 15,  46 => 14,  43 => 13,  40 => 12,  37 => 11,  35 => 10,  26 => 3,  20 => 2,);
    }
}
