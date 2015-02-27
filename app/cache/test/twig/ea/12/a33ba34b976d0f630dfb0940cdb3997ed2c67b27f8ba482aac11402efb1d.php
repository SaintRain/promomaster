<?php

/* CoreOrderBundle:Admin/Documents:invoiceForPayment.html.twig */
class __TwigTemplate_ea12a33ba34b976d0f630dfb0940cdb3997ed2c67b27f8ba482aac11402efb1d extends Twig_Template
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
        if ((!$this->getAttribute((isset($context["order"]) ? $context["order"] : null), "costInfo", array(), "any", true, true))) {
            // line 4
            echo "        ";
            $context["costInfo"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : $this->getContext($context, "ServiceContainer")), "get", array(0 => "core_order_logic"), "method"), "computeOrderCostInfo", array(0 => (isset($context["order"]) ? $context["order"] : $this->getContext($context, "order"))), "method");
            // line 5
            echo "    ";
        }
        // line 6
        echo "    ";
        ob_start();
        // line 7
        echo "        <center>
            <table border=\"0\" cellspacing=\"0\" width=\"800\"><tbody>
                    <tr><td colspan=\"2\">&nbsp;</td></tr>
                    <tr>
                        <td colspan=\"2\">
                            <table border=\"1\" cellpadding=\"5\" cellspacing=\"0\" width=\"800\"><tbody>
                                    <tr>
                                        <td bgcolor=\"white\">
                                            <table border=\"0\" cellspacing=\"0\" width=\"680\"><tbody>
                                                    <tr valign=\"top\">
                                                        <td nowrap=\"nowrap\" width=\"20%\">Продавец:</td>
                                                        <td nowrap=\"nowrap\" width=\"22%\">";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "legalForm", array()), "captionRu", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "caption", array()), "html", null, true);
        echo "</td>
                                                        <td rowspan=\"4\" width=\"5%\">&nbsp;</td>
                                                        <td rowspan=\"4\" width=\"21%\">Адрес:</td>
                                                        <td rowspan=\"4\" width=\"32%\">";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "addressUr", array()), "html", null, true);
        echo "</td>
                                                    </tr>
                                                    <tr valign=\"top\">
                                                        <td nowrap=\"nowrap\">ИНН:</td>

                                                        <td nowrap=\"nowrap\">";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "inn", array()), "html", null, true);
        echo "</td>
                                                    </tr>
                                                    ";
        // line 28
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "kpp", array())) {
            // line 29
            echo "                                                        <tr valign=\"top\">
                                                            <td nowrap=\"nowrap\">КПП:</td>
                                                            <td nowrap=\"nowrap\">";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "kpp", array()), "html", null, true);
            echo "</td>
                                                        </tr>
                                                    ";
        }
        // line 34
        echo "                                                    <tr valign=\"top\">

                                                        <td nowrap=\"nowrap\">Тел.:</td>
                                                        <td nowrap=\"nowrap\">";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "phone", array()), "html", null, true);
        echo "</td>
                                                    </tr>
                                                </tbody></table>
                                        </td>
                                    </tr>
                                </tbody></table>
                        </td>
                    </tr>
                    <tr><td colspan=\"2\">&nbsp;</td></tr>
                    <tr>
                        <td colspan=\"2\">
                            <table border=\"1\" cellpadding=\"5\" cellspacing=\"0\" width=\"800\"><tbody>
                                    <tr>
                                        <td bgcolor=\"white\">
                                            <table border=\"0\" cellspacing=\"0\" width=\"680\"><tbody>
                                                    <tr valign=\"top\">
                                                        <td nowrap=\"nowrap\" width=\"20%\">Банк:</td>
                                                        <td width=\"22%\">";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "bank", array()), "caption", array()), "html", null, true);
        echo "</td>
                                                        <td width=\"5%\">&nbsp;</td>
                                                        <td width=\"21%\">БИК:</td>
                                                        <td width=\"32%\">";
        // line 57
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "bank", array()), "bic", array()), "html", null, true);
        echo "</td>

                                                    </tr>
                                                    <tr valign=\"top\">
                                                        <td>Р/с:</td>
                                                        <td >";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "paymentAccount", array()), "html", null, true);
        echo "</td>
                                                        <td>&nbsp;</td>
                                                        <td>К/с:</td>
                                                        <td>";
        // line 65
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "corrAccount", array()), "html", null, true);
        echo "</td>
                                                    </tr>
                                                </tbody></table>
                                        </td>
                                    </tr>
                                </tbody></table>
                        </td>
                    </tr>
                    <tr><td colspan=\"2\">&nbsp;</td></tr>
                    <tr>
                        <td colspan=\"2\" align=\"center\" style=\"font-size: xx-large; font-weight: bold;\">
                            Счет № ";
        // line 76
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array())), "html", null, true);
        echo " от ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "createdDateTime", array()), "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
        echo "
                        </td>
                    </tr>
                    <tr><td colspan=\"2\">&nbsp;</td></tr>
                    <tr>
                        <td colspan=\"2\">
                            <table border=\"1\" cellpadding=\"5\" cellspacing=\"0\" width=\"800\"><tbody>
                                    <tr>
                                        <td colspan=\"2\" bgcolor=\"white\">
                                            <table border=\"0\" cellspacing=\"0\" width=\"680\"><tbody>
                                                    <tr valign=\"top\">
                                                        <td nowrap=\"nowrap\" width=\"20%\">Покупатель:</td>
                                                        <td width=\"75%\">
                                                            ";
        // line 89
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array(), "any", false, true), "legalForm", array(), "any", true, true)) {
            // line 90
            echo "                                                                ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "legalForm", array()), "captionRu", array()), "html", null, true);
            echo "  &quot;";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragentCompany", array()), "html", null, true);
            echo "&quot;
                                                                <br />
                                                                ИНН: ";
            // line 92
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "inn", array()), "html", null, true);
            if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "kpp", array())) {
                echo ", КПП: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "kpp", array()), "html", null, true);
            }
            // line 93
            echo "                                                                <br />
                                                                ";
            // line 94
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "addressLegal", array()), "html", null, true);
            echo "
                                                                <br />
                                                                тел: ";
            // line 96
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "phone1", array()), "html", null, true);
            echo "
                                                            ";
        } else {
            // line 98
            echo "                                                                ";
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragentFio", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragentFio", array()), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "getListName", array()), "html", null, true);
            }
            // line 99
            echo "                                                                <br />
                                                                ";
            // line 100
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryPostcode", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryPostcode", array()), "html", null, true);
                echo ", ";
            }
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryCity", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryCity", array()), "name", array()), "html", null, true);
            }
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryAddress", array()), "html", null, true);
            echo "
                                                            ";
        }
        // line 102
        echo "                                                        </td>
                                                        <td width=\"5%\">&nbsp;</td>
                                                    </tr>
                                                </tbody></table>
                                        </td>
                                    </tr>
                                </tbody></table>
                        </td>
                    </tr>
                    <tr><td colspan=\"2\">&nbsp;</td></tr>
                    <tr>
                        <td colspan=\"2\" align=\"center\">Внимание! Счет действителен в течении 3-х (трех) банковских дней</td>
                    </tr>
                    <tr>
                        <td colspan=\"2\" align=\"center\"><b>Внимание! Реквизиты изменились!</b></td>
                    </tr>
                    <tr><td colspan=\"2\">&nbsp;</td></tr>
                    <tr>
                        <td colspan=\"2\">

                            <table border=\"1\" cellpadding=\"5\" cellspacing=\"0\" width=\"800\"><tbody>
                                    <tr>
                                        <td colspan=\"2\" bgcolor=\"white\">
                                            <table border=\"0\" cellspacing=\"0\" cellpadding=\"5\" width=\"780\" style=\"border-collapse: collapse\"><tbody>
                                                    <tr valign=\"top\">
                                                        <td style=\"border-style: solid; border-color: #888; border-width:0 .5pt .5pt 0\"><b>№</b></td>
                                                        <td style=\"border-style: solid; border-color: #888; border-width:0 .5pt .5pt 0\"><b>Наименование товара</b></td>
                                                        <td style=\"border-style: solid; border-color: #888; border-width:0 .5pt .5pt 0;\"><b>Кол-во (шт.)</b></td>
                                                        <td style=\"border-style: solid; border-color: #888; border-width:0 .5pt .5pt 0\" nowrap><b>Цена (";
        // line 130
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo ")</b></td>
                                                        <td style=\"border-style: solid; border-color: #888; border-width:0 0 .5pt 0\" nowrap><b>Сумма (";
        // line 131
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo ")</b></td>
                                                    </tr>
                                                    ";
        // line 133
        $context["index"] = 0;
        // line 134
        echo "                                                    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "compositions", array()));
        foreach ($context['_seq'] as $context["comp_index"] => $context["comp"]) {
            // line 135
            echo "                                                        <tr valign=\"top\">
                                                            <td style=\"border-style: solid; border-color: #888; border-width:0 .5pt .5pt 0\">";
            // line 136
            echo twig_escape_filter($this->env, ($context["comp_index"] + 1), "html", null, true);
            echo "</td>
                                                            <td style=\"border-style: solid; border-color: #888; border-width:0 .5pt .5pt 0\">";
            // line 137
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "sku", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "captionRu", array()), "html", null, true);
            echo "</td>
                                                            <td style=\"border-style: solid; border-color: #888; border-width:0 .5pt .5pt 0\" align=\"right\">";
            // line 138
            echo twig_escape_filter($this->env, $this->getAttribute($context["comp"], "quantity", array()), "html", null, true);
            echo "</td>
                                                            <td style=\"border-style: solid; border-color: #888; border-width:0 .5pt .5pt 0\" align=\"right\">
                                                                ";
            // line 140
            if ($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "history_info", array()), "composition", array()), $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "id", array()), array(), "array"), "cost_per_one_unit", array())), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "composition", array()), $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "id", array()), array(), "array"), "cost_per_one_unit", array())), "html", null, true);
            }
            // line 141
            echo "                                                            </td>
                                                            <td style=\"border-style: solid; border-color: #888; border-width:0 0 .5pt 0\" align=\"right\">";
            // line 142
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($context["comp"], "cost", array())), "html", null, true);
            echo "</td>
                                                        </tr>
                                                        ";
            // line 144
            $context["index"] = ($context["comp_index"] + 1);
            // line 145
            echo "                                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['comp_index'], $context['comp'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 146
        echo "
                                                    ";
        // line 147
        if ((($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryMethod", array(), "any", true, true) && $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "isDeliveryIncludedInPayment", array())) && ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryCost", array()) > 0))) {
            // line 148
            echo "                                                        <tr>
                                                            <td style=\"border-style: solid; border-color: #888; border-width:0 .5pt .5pt 0\">";
            // line 149
            echo twig_escape_filter($this->env, ((isset($context["index"]) ? $context["index"] : $this->getContext($context, "index")) + 1), "html", null, true);
            echo "</td>
                                                            <td style=\"border-style: solid; border-color: #888; border-width:0 .5pt .5pt 0\">Возмещение услуг доставки</td>
                                                            <td style=\"border-style: solid; border-color: #888; border-width:0 .5pt .5pt 0\" align=\"right\">1</td>
                                                            <td style=\"border-style: solid; border-color: #888; border-width:0 .5pt .5pt 0\" align=\"right\">";
            // line 152
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryCost", array())), "html", null, true);
            echo "</td>
                                                            <td style=\"border-style: solid; border-color: #888; border-width:0 0 .5pt 0\" align=\"right\">";
            // line 153
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryCost", array())), "html", null, true);
            echo "</td>
                                                        </tr>
                                                    ";
        }
        // line 156
        echo "
                                                    ";
        // line 157
        if (($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "isWorkingWithNds", array()) && $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "ndsTax", array()))) {
            // line 158
            echo "                                                        <tr valign=\"top\">
                                                            <td nowrap=\"nowrap\">&nbsp;</td>
                                                            <td nowrap=\"nowrap\">&nbsp;</td>
                                                            <td nowrap=\"nowrap\">&nbsp;</td>
                                                            <td style=\"border-style: solid; border-color: #888; border-width:0 .5pt  .5pt 0;text-align:right;\">В том числе НДС (";
            // line 162
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "ndsTax", array()), "html", null, true);
            echo "%):</td>
                                                            <td style=\"border-style: solid; border-color: #888; border-width:0 0 .5pt 0\" align=\"right\" valign=\"bottom\">";
            // line 163
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "nds_tax", array())), "html", null, true);
            echo "</td>
                                                        </tr>
                                                    ";
        }
        // line 166
        echo "                                                    <tr valign=\"top\">
                                                        <td nowrap=\"nowrap\">&nbsp;</td>
                                                        <td nowrap=\"nowrap\">&nbsp;</td>
                                                        <td nowrap=\"nowrap\">&nbsp;</td>
                                                        <td style=\"border-style: solid; border-color: #888; border-width:0 .5pt 0 0;text-align:right;\">Всего к оплате:</td>
                                                        <td align=\"right\" valign=\"bottom\">";
        // line 171
        if ($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "history_info", array()), "total_cost", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "total_cost", array()), "html", null, true);
        }
        echo "</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody></table>
                        </td>
                    </tr>
                    <tr><td colspan=\"2\">&nbsp;</td></tr>
                    <tr>
                        <td colspan=\"2\">
                            <table border=\"0\" width=\"650\">
                                <tbody>
                                    <tr valign=\"top\">
                                        <td nowrap=\"nowrap\" width=\"23%\">Итого к оплате:</td>
                                        <td width=\"77%\">";
        // line 187
        if ($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->amount2strFunction($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "history_info", array()), "total_cost", array())), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->amount2strFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "total_cost", array())), "html", null, true);
        }
        echo "<br></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr><td colspan=\"2\">&nbsp;</td></tr>
                    <tr>
                        <td colspan=\"2\">
                            <table border=\"0\" width=\"650\">
                                <tbody>
                                    <tr valign=\"top\">
                                        <td nowrap=\"nowrap\" width=\"23%\">Назначение платежа:</td>
                                        <td width=\"77%\">Оплата товара по счету № ";
        // line 200
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array())), "html", null, true);
        echo " от ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "createdDateTime", array()), "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
        echo ". ";
        if (($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "isWorkingWithNds", array()) && $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "ndsTax", array()))) {
            echo "В том числе НДС ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "ndsTax", array()), "html", null, true);
            echo "% - ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "nds_tax", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        } else {
            echo "Без НДС.";
        }
        echo "<br></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>


                    <tr>
                        <td colspan=\"2\">
                            <table border=\"0\" width=\"200\">
                                <tbody>
                                    <tr valign=\"top\">
                                        <td width=\"13%\" style=\"vertical-align: top; padding-top: 55px; text-align: right;\">";
        // line 213
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "positionOfTheHead", array()), "html", null, true);
        echo ":</td>
                                        <td width=\"28%\" style=\"vertical-align: bottom;\">";
        // line 214
        if ((isset($context["haveStamps"]) ? $context["haveStamps"] : $this->getContext($context, "haveStamps"))) {
            echo "<img alt=\"stamp\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "imageSignAndStamp", array())), "html", null, true);
            echo "\" height=\"178\" width=\"182\">";
        } else {
            echo "____________________________________";
        }
        echo "</td>
                                        <td width=\"13%\" style=\"vertical-align: top; padding-top: 55px; text-align: left;\">/";
        // line 215
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "nameOfTheHead", array()), "html", null, true);
        echo "/</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    ";
        // line 221
        if (($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "isWorkingWithNds", array()) && $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "ndsTax", array()))) {
            // line 222
            echo "                        <tr><td colspan=\"2\">&nbsp;</td></tr>
                        <tr>
                            <td colspan=\"2\"><strong>Внимание!</strong> При выполнении платежа по данному счету правильно указывайте сумму НДС (это не всегда ";
            // line 224
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "ndsTax", array()), "html", null, true);
            echo "% от суммы счета)!</td>
                        </tr>
                    ";
        }
        // line 227
        echo "                </tbody></table>
        </center>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 230
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Documents:invoiceForPayment.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  463 => 230,  458 => 227,  452 => 224,  448 => 222,  446 => 221,  437 => 215,  427 => 214,  423 => 213,  394 => 200,  374 => 187,  351 => 171,  344 => 166,  338 => 163,  334 => 162,  328 => 158,  326 => 157,  323 => 156,  317 => 153,  313 => 152,  307 => 149,  304 => 148,  302 => 147,  299 => 146,  293 => 145,  291 => 144,  286 => 142,  283 => 141,  277 => 140,  272 => 138,  266 => 137,  262 => 136,  259 => 135,  254 => 134,  252 => 133,  247 => 131,  243 => 130,  213 => 102,  200 => 100,  197 => 99,  190 => 98,  185 => 96,  180 => 94,  177 => 93,  171 => 92,  163 => 90,  161 => 89,  143 => 76,  129 => 65,  123 => 62,  115 => 57,  109 => 54,  89 => 37,  84 => 34,  78 => 31,  74 => 29,  72 => 28,  67 => 26,  59 => 21,  51 => 18,  38 => 7,  35 => 6,  32 => 5,  29 => 4,  26 => 3,  20 => 2,);
    }
}
