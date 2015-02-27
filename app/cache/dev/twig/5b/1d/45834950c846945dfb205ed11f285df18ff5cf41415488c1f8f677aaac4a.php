<?php

/* CoreOrderBundle:Admin/Documents:deliveryAgreement.html.twig */
class __TwigTemplate_5b1d45834950c846945dfb205ed11f285df18ff5cf41415488c1f8f677aaac4a extends Twig_Template
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
        // line 3
        $this->displayBlock('content', $context, $blocks);
    }

    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if ( !$this->getAttribute((isset($context["order"]) ? $context["order"] : null), "costInfo", array(), "any", true, true)) {
            // line 5
            echo "        ";
            $context["costInfo"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : $this->getContext($context, "ServiceContainer")), "get", array(0 => "core_order_logic"), "method"), "computeOrderCostInfo", array(0 => (isset($context["order"]) ? $context["order"] : $this->getContext($context, "order"))), "method");
            // line 6
            echo "            ";
        }
        // line 7
        echo "                ";
        ob_start();
        // line 8
        echo "                    <style type=\"text/css\">table, td, th, div {font-family:Verdana, Arial;font-size:12px;}</style>
                    <div>
                        <div style=\"float:left;width:70%;\">
                            <div style=\"font-size:14px\"><strong>ДОГОВОР ПОСТАВКИ № ";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array())), "html", null, true);
        echo "</strong></div>
                            <div style=\"\">";
        // line 12
        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "createdDateTime", array())) {
            echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "createdDateTime", array()), "none", "none", null, (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone")), "\"d\" MMMM  Y г."), "html", null, true);
        } else {
            echo "&quot;___&quot;&nbsp;&nbsp;______________&nbsp;&nbsp;20___&nbsp;&nbsp;г.";
        }
        echo "</div>
                        </div>
                        ";
        // line 14
        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "createdDateTime", array())) {
            // line 15
            echo "                            <div style=\"float:right; width: 52mm; height: 14mm; text-align: center;\">
                                <barcode code=\"001";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array()), "html", null, true);
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "createdDateTime", array()), "Ymd", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
            echo "\" type=\"C128C\" />
                                <div style=\"font-size:7pt;\">001";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "id", array())), "html", null, true);
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "createdDateTime", array()), "Ymd", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
            echo "</div>
                            </div>
                        ";
        }
        // line 20
        echo "                        <div style=\"clear:both;\"></div>
                    </div>


                    <p>
                        ";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "legalForm", array()), "fullCaptionRu", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "caption", array()), "html", null, true);
        echo ", ";
        if (twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "legalForm", array()), "captionRu", array()), twig_get_array_keys_filter(array(0 => "ИП", 1 => "ЧП", 2 => "ПБОЮЛ")))) {
            echo "именуемый";
        } else {
            echo "именуемое";
        }
        echo " в дальнейшем \"Поставщик\", 
                        в лице ";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "nameOfTheHeadInGenitive", array()), "html", null, true);
        echo ", действующего на основании ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "headActsUnder", array()), "html", null, true);
        echo ", с одной стороны, и&nbsp;
                        ";
        // line 27
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array(), "any", false, true), "legalForm", array(), "any", true, true)) {
            // line 28
            echo "                            ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "legalForm", array()), "captionRu", array()), "html", null, true);
            echo "  &quot;";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragentCompany", array()), "html", null, true);
            echo "&quot;, именуемое в дальнейшем \"Покупатель\", в лице ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "chiefPosition", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "chiefFio", array()), "html", null, true);
            echo ", действующего на основании _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
                        ";
        } else {
            // line 30
            echo "                            ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragentFio", array()), "html", null, true);
            echo "
                            проживающий по адресу ";
            // line 31
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryPostcode", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryPostcode", array()), "html", null, true);
                echo ", ";
            }
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryCity", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryCity", array()), "name", array()), "html", null, true);
                echo ",";
            }
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryAddress", array()), "html", null, true);
            echo ", именуемый в дальнейшем \"Покупатель\", действующий от своего имени
                        ";
        }
        // line 33
        echo "                        , с другой стороны, заключили настоящий договор о нижеследующем:
                    </p>

                    <div style=\"text-align:center;font-size:13px\">1. Предмет договора</div>
                    <p>1.1. Поставщик обязуется передать в собственность Покупателя , а Покупатель принять и оплатить товар:</p>


                    <table border=\"1\" cellspacing=\"0\" cellpadding=\"5\" width=\"780\" style=\"border-style: solid; border-color: #000; border-width:.25pt; border-collapse: collapse;\"><tbody>
                            <tr valign=\"top\">
                                <td><b>№</b></td>
                                <td nowrap><b>Наименование товара</b></td>
                                <td nowrap><b>Ед. изм.</b></td>
                                <td nowrap><b>Кол-во (шт.)</b></td>
                                <td nowrap><b>Цена (";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo ")</b></td>
                                <td nowrap><b>Сумма (";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo ")</b></td>
                            </tr>
                            ";
        // line 49
        $context["index"] = 0;
        // line 50
        echo "                                ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "compositions", array()));
        foreach ($context['_seq'] as $context["comp_index"] => $context["comp"]) {
            // line 51
            echo "                                    <tr valign=\"top\">
                                        <td>";
            // line 52
            echo twig_escape_filter($this->env, ($context["comp_index"] + 1), "html", null, true);
            echo "</td>
                                        <td>";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "sku", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "captionRu", array()), "html", null, true);
            echo "</td>
                                        <td align=\"left\">";
            // line 54
            if ($this->getAttribute($this->getAttribute($context["comp"], "product", array()), "unitOfMeasure", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["comp"], "product", array()), "unitOfMeasure", array()), "shortCaptionRu", array()), "html", null, true);
            } else {
                echo "&mdash;";
            }
            echo "</td>
                                        <td align=\"right\">";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute($context["comp"], "quantity", array()), "html", null, true);
            echo "</td>
                                        <td align=\"right\">";
            // line 56
            if ($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "history_info", array()), "composition", array()), $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "id", array()), array(), "array"), "cost_per_one_unit", array())), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "composition", array()), $this->getAttribute($this->getAttribute($context["comp"], "product", array()), "id", array()), array(), "array"), "cost_per_one_unit", array())), "html", null, true);
            }
            echo "</td>
                                        <td align=\"right\">";
            // line 57
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($context["comp"], "cost", array())), "html", null, true);
            echo "</td>
                                    </tr>
                                    ";
            // line 59
            $context["index"] = ($context["comp_index"] + 1);
            // line 60
            echo "                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['comp_index'], $context['comp'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "
                                            ";
        // line 62
        if ((($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "deliveryMethod", array(), "any", true, true) && $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "isDeliveryIncludedInPayment", array())) && ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryCost", array()) > 0))) {
            // line 63
            echo "                                                <tr>
                                                    <td>";
            // line 64
            echo twig_escape_filter($this->env, ((isset($context["index"]) ? $context["index"] : $this->getContext($context, "index")) + 1), "html", null, true);
            echo "</td>
                                                    <td>Возмещение услуг доставки</td>
                                                    <td align=\"left\">шт</td>
                                                    <td align=\"right\">1</td>
                                                    <td align=\"right\">";
            // line 68
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryCost", array())), "html", null, true);
            echo "</td>
                                                    <td align=\"right\">";
            // line 69
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryCost", array())), "html", null, true);
            echo "</td>
                                                </tr>
                                            ";
        }
        // line 72
        echo "                                            ";
        if (($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "isWorkingWithNds", array()) && $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "ndsTax", array()))) {
            // line 73
            echo "                                                <tr valign=\"top\">
                                                    <td nowrap=\"nowrap\">&nbsp;</td>
                                                    <td align=\"right\" colspan=\"4\">В том числе НДС (";
            // line 75
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "ndsTax", array()), "html", null, true);
            echo "%):</td>
                                                    <td align=\"right\" valign=\"bottom\">";
            // line 76
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "nds_tax", array())), "html", null, true);
            echo "</td>
                                                </tr>
                                            ";
        }
        // line 79
        echo "                                            <tr valign=\"top\">
                                                <td nowrap=\"nowrap\">&nbsp;</td>
                                                <td align=\"right\" colspan=\"4\">Всего к оплате:</td>
                                                <td align=\"right\" valign=\"bottom\">";
        // line 82
        if ($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "history_info", array()), "total_cost", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "total_cost", array()), "html", null, true);
        }
        echo "</td>
                                            </tr>

                                        </tbody></table>

                                    <p>Сумма прописью: ";
        // line 87
        if ($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : null), "history_info", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->amount2strFunction($this->getAttribute($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "history_info", array()), "total_cost", array())), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->amount2strFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "total_cost", array())), "html", null, true);
        }
        // line 88
        echo "                                        ";
        if (($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "isWorkingWithNds", array()) && $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "ndsTax", array()))) {
            echo ", в т. ч. НДС ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "ndsTax", array()), "html", null, true);
            echo "% - ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["costInfo"]) ? $context["costInfo"] : $this->getContext($context, "costInfo")), "nds_tax", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        }
        // line 89
        echo "                                    </p>
                                    <p>1.2. Право собственности на товар переходит к Покупателю с момента фактической передачи ему товара.</p>

                                    <div style=\"text-align:center;font-size:13px\">2. Порядок поставки товара. Приемка товара.</div>
                                    <p>
                                        2.1. Поставщик производит поставку в течение пяти дней с момента поступления средств от Покупателя на расчетный счет поставщика.<br />
                                        2.2. Доставка товара осуществляется ";
        // line 95
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryMethod", array()), "captionRu", array()), "html", null, true);
        echo " (далее по тексту \"Перевозчик\"), затраты на доставку";
        if (($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "isDeliveryIncludedInPayment", array()) && ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryCost", array()) > 0))) {
            echo " выделяются в счете отдельной строкой";
        } else {
            echo " в стоимость товаров не включена";
        }
        echo ".<br />
                                        2.3. Покупатель обязан совершить все необходимые действия, обеспечивающие принятие товаров, поставленных в соответствии с настоящим договором. Передача товара Покупателю удостоверяется соответствующей отметкой на товарной накладной.<br />
                                        2.4. При получении поставленного товара Покупатель обязуется незамедлительно осмотреть товар, проверить его количество и качество. В случае выявления недостатков товаров Покупатель в присутствии представителя Перевозчика составляет соответствующий акт, подписываемый сторонами.<br />
                                        2.5. В случае обоснованного отказа Покупателя от переданного Поставщиком товара, он обязуется обеспечить сохранность (ответственное хранение) этого товара и незамедлительно уведомить Поставщика о своем отказе принять товар с указанием мотивов отказа.
                                    </p>

                                    <div style=\"text-align:center;font-size:13px\">3. Цены по договору и порядок расчетов</div>
                                    <p>
                                        3.1. Цена товара согласовывается сторонами путем обмена соответствующими документами (заявкой на поставку товара и счетом на оплату поставляемого товара).<br />
                                        3.2. Передаваемые товары оплачиваются Покупателем в безналичной форме путем перечисления денежных средств в срок не позднее трех календарных дней с момента выставления счета на оплату Поставщиком.
                                    </p>

                                    <div style=\"text-align:center;font-size:13px\">4.Ответственность сторон</div>
                                    <p>
                                        4.1. Любая из сторон настоящего договора, не исполнившая обязательства по договору или исполнившая их ненадлежащим образом, несет ответственность за это при наличии вины (умысла или неосторожности, небрежности, неосмотрительности).<br />
                                        4.2. За просрочку отгрузки товара Поставщик уплачивает Покупателю неустойку в размере 0,1 % от суммы неотгруженого товара за каждый день просрочки.<br />
                                        4.3. Уплата неустойки (штрафа, пени) и возмещение убытков, причиненных ненадлежащим исполнением обязательств, не освобождает стороны договора от исполнения обязательств по договору в полном объеме.<br />
                                    </p>

                                    <div style=\"text-align:center;font-size:13px\">5. Прочие положения</div>
                                    <p>
                                        5.1. Настоящий договор действует с момента подписания его сторонами до полного исполнения ими своих обязательств.<br />
                                        5.2. Споры, которые могут возникнуть при исполнении настоящего договора, будут разрешаться путем переговоров. В случае недостижения согласия споры разрешаются в судебном порядке в Арбитражном суде по месту нахождения истца.<br />
                                        5.3. Изменения и дополнения к настоящему договору оформляются в письменном виде, подписываются сторонами и являются неотъемлемой частью настоящего договора.<br />
                                        5.4. В случае изменения юридического адреса или обслуживающего банка стороны договора обязаны в семидневный срок уведомить об этом друг друга.
                                    </p>

                                    <pagebreak />

                                    <div style=\"text-align:center;font-size:13px\">6. Адреса, банковские реквизиты и подписи сторон</div>

                                    <table border=\"0\" cellspacing=\"0\" cellpadding=\"5\" width=\"780\"><tbody>
                                            <tr>
                                                <td width=\"45%\"><b>Поставщик:</b></td>
                                                <td width=\"10%\">&nbsp;</td>
                                                <td width=\"45%\"><b>Покупатель:</b></td>
                                            </tr>
                                            <tr>
                                                <td width=\"45%\" valign=\"top\">
                                                    ";
        // line 134
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "legalForm", array()), "captionRu", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "caption", array()), "html", null, true);
        echo "<br />
                                                    ";
        // line 135
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "addressUr", array()), "html", null, true);
        echo "<br />
                                                    ИНН ";
        // line 136
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "inn", array()), "html", null, true);
        echo "<br />
                                                    р/с ";
        // line 137
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "paymentAccount", array()), "html", null, true);
        echo " в ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "bank", array()), "captionFull", array()), "html", null, true);
        echo "<br />
                                                    к/с ";
        // line 138
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "corrAccount", array()), "html", null, true);
        echo "<br />
                                                    БИК ";
        // line 139
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "bank", array()), "bic", array()), "html", null, true);
        echo "
                                                </td>
                                                <td width=\"10%\">&nbsp;</td>
                                                <td width=\"45%\" valign=\"top\">
                                                    ";
        // line 143
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array(), "any", false, true), "legalForm", array(), "any", true, true)) {
            // line 144
            echo "                                                        ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "legalForm", array()), "captionRu", array()), "html", null, true);
            echo "  &quot;";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragentCompany", array()), "html", null, true);
            echo "&quot;<br />
                                                        ";
            // line 145
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "addressLegal", array()), "html", null, true);
            echo "<br />
                                                        ИНН ";
            // line 146
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "inn", array()), "html", null, true);
            echo "<br />
                                                        р/с ";
            // line 147
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "bankAccount", array()), "html", null, true);
            echo " в ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "bank", array()), "captionFull", array()), "html", null, true);
            echo "<br />
                                                        к/с ";
            // line 148
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "corrAccount", array()), "html", null, true);
            echo "<br />
                                                        БИК ";
            // line 149
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "bank", array()), "bic", array()), "html", null, true);
            echo "
                                                    ";
        } else {
            // line 151
            echo "                                                        ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragentFio", array()), "html", null, true);
            echo "<br />
                                                        ";
            // line 152
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryPostcode", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryPostcode", array()), "html", null, true);
                echo ", ";
            }
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryCity", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryCity", array()), "name", array()), "html", null, true);
                echo ",";
            }
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "deliveryAddress", array()), "html", null, true);
            echo "
                                                        ";
            // line 153
            if (($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array(), "any", false, true), "passport", array(), "any", true, true) && $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "passport", array()))) {
                // line 154
                echo "                                                            <br />Паспорт ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "passport", array()), "html", null, true);
                echo "
                                                        ";
            }
            // line 156
            echo "                                                    ";
        }
        // line 157
        echo "                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan=\"3\" align=\"center\">Подписи сторон</td>
                                            </tr>
                                            <tr>
                                                <td width=\"45%\"><b>Поставщик:</b></td>
                                                <td width=\"10%\">&nbsp;</td>
                                                <td width=\"45%\"><b>Покупатель:</b></td>
                                            </tr>
                                            <tr>
                                                <td width=\"45%\">";
        // line 168
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "legalForm", array()), "captionRu", array()) != "ИП")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "positionOfTheHead", array()), "html", null, true);
            echo " ";
        }
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "legalForm", array()), "captionRu", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "caption", array()), "html", null, true);
        echo "</td>
                                                <td width=\"10%\">&nbsp;</td>
                                                <td width=\"45%\">";
        // line 170
        if ($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "contragent", array(), "any", false, true), "legalForm", array(), "any", true, true)) {
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "legalForm", array()), "captionRu", array()) != "ИП")) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "chiefPosition", array()), "html", null, true);
                echo " ";
            }
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragent", array()), "legalForm", array()), "captionRu", array()), "html", null, true);
            echo "  &quot;";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragentCompany", array()), "html", null, true);
            echo "&quot;
                                                    ";
        } else {
            // line 171
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "contragentFio", array()), "html", null, true);
        }
        echo "</td>
                                                    </tr>
                                                    <tr>
                                                        <td width=\"45%\">________________________ ";
        // line 174
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "seller", array()), "nameOfTheHead", array()), "html", null, true);
        echo "</td>
                                                        <td width=\"10%\">&nbsp;</td>
                                                        <td width=\"45%\">____________________________________________________</td>
                                                    </tr>
                                                </tbody></table>

                                            ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 181
        echo "                                                ";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Documents:deliveryAgreement.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  484 => 181,  474 => 174,  467 => 171,  455 => 170,  444 => 168,  431 => 157,  428 => 156,  422 => 154,  420 => 153,  407 => 152,  402 => 151,  397 => 149,  393 => 148,  387 => 147,  383 => 146,  379 => 145,  372 => 144,  370 => 143,  363 => 139,  359 => 138,  353 => 137,  349 => 136,  345 => 135,  339 => 134,  291 => 95,  283 => 89,  273 => 88,  267 => 87,  255 => 82,  250 => 79,  244 => 76,  240 => 75,  236 => 73,  233 => 72,  227 => 69,  223 => 68,  216 => 64,  213 => 63,  211 => 62,  208 => 61,  202 => 60,  200 => 59,  195 => 57,  187 => 56,  183 => 55,  175 => 54,  169 => 53,  165 => 52,  162 => 51,  157 => 50,  155 => 49,  150 => 47,  146 => 46,  131 => 33,  117 => 31,  112 => 30,  100 => 28,  98 => 27,  92 => 26,  80 => 25,  73 => 20,  66 => 17,  61 => 16,  58 => 15,  56 => 14,  47 => 12,  43 => 11,  38 => 8,  35 => 7,  32 => 6,  29 => 5,  26 => 4,  20 => 3,);
    }
}
