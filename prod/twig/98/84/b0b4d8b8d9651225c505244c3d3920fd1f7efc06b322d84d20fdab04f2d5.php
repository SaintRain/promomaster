<?php

/* CoreOrderBundle:Admin/Documents:guarantees.html.twig */
class __TwigTemplate_9884b0b4d8b8d9651225c505244c3d3920fd1f7efc06b322d84d20fdab04f2d5 extends Twig_Template
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
        echo "    <style type=\"text/css\">
        html {
            font-size: 93.5%;
            font-family: Arial,Helvetica,sans-serif;
        }
        ul li {
            list-style: none;
            margin: 0;
        }
        ul ul {
            margin: 0;
        }
        table.items {margin: 10px 0 0 0;}
        table.items th, table.items td {border-style: solid; border-color: #000; padding: 2px;}
    </style>
    <center>
        <table border=\"0\" cellspacing=\"0\" width=\"100%\" style=\"margin: 10pt 0 0 0; font-size: 8pt; line-height: 8.2pt; width: 595px; \">
            <tr>
                <td style=\"font-family: Verdana, Arial; line-height: 8.4pt;\">
                    <span style=\"font-size: 60px; letter-spacing: -7px;\">PromoMaster.net</span>
                    <br/><br /><span style=\"font-size: 12px;\">Интернет-магазин детских товаров</span>
                    <br/><span style=\"font-size: 12px;\">";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "legalForm", array()), "captionRu", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "caption", array()), "html", null, true);
        echo " ИНН/КПП: ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "inn", array()), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "kpp", array()), "html", null, true);
        echo "</span>
                    <br/><span style=\"font-size: 12px;\">";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "addressUr", array()), "html", null, true);
        echo "</span>                                
                </td>
                <td style=\"font-size: 36px; font-family: Verdana, Arial; text-align: right;\">";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "phone", array()), "html", null, true);
        echo "<br /><br /><br />";
        echo twig_escape_filter($this->env, (isset($context["default_email"]) ? $context["default_email"] : null), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td colspan=\"2\" align=\"center\" style=\"padding: 20px 0; font-size: 20px;\">Гарантийный талон № ";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "id", array())), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td colspan=\"2\"><b>Гарантия</b><br />На основании настоящего документа мы гарантируем отсутствие в изделии дефектов производственного характера и дефектов составляющих его компонентов для следующего перечня товаров:</td>
            </tr>
            <tr>
                <td colspan=\"2\">
                    <style type=\"text/css\">
                        body {width: 800px; margin: auto}
                        table.items {margin-top: 10px; margin-left: 10px}
                        table.items td, table.items th  {background: white; border: 1px black solid !important; border-width: 1px !important;}
                    </style>


                    <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class=\"items\" style=\"width:790px;border-collapse: collapse\">
                        <tr>
                            <th style=\"border-width: .5pt 0 .5pt .5pt;width:30px\">№</th>
                            <th style=\"border-width: .5pt 0 .5pt .5pt;\" align=\"left\">Код товара</th>
                            <th style=\"border-width: .5pt 0 .5pt .5pt;width:330px\" align=\"left\">Наименование</th>
                            <th style=\"border-width: .5pt 0 .5pt .5pt;width:150px\" align=\"left\">Серийный номер</th>
                            <th style=\"border-width: .5pt;width:90px\" align=\"center\">Гарантия до</th>
                        </tr>
                        ";
        // line 53
        $context["c_index"] = 0;
        // line 54
        echo "
                        ";
        // line 55
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["data"]) ? $context["data"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["unit"]) {
            // line 56
            echo "                            ";
            if ($this->getAttribute($this->getAttribute($context["unit"], "serials", array()), "count", array())) {
                // line 57
                echo "                                ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["unit"], "serials", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["serial"]) {
                    // line 58
                    echo "                                    ";
                    $context["c_index"] = ((isset($context["c_index"]) ? $context["c_index"] : null) + 1);
                    // line 59
                    echo "                                    <tr>
                                        <td style=\"border-width: 0 0 .5pt .5pt;width:30px\">";
                    // line 60
                    echo twig_escape_filter($this->env, (isset($context["c_index"]) ? $context["c_index"] : null), "html", null, true);
                    echo "</td>
                                        <td style=\"border-width: 0 0 .5pt .5pt;\">";
                    // line 61
                    if ($this->getAttribute($this->getAttribute($context["unit"], "product", array()), "sku", array())) {
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["unit"], "product", array()), "sku", array()), "html", null, true);
                    } else {
                        echo "&mdash;";
                    }
                    echo "</td>
                                        <td style=\"border-width: 0 0 .5pt .5pt;width:330px\">";
                    // line 62
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["unit"], "product", array()), "sku", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["unit"], "product", array()), "captionRu", array()), "html", null, true);
                    echo "</td>
                                        <td style=\"border-width: 0 0 .5pt .5pt;width:150px\">";
                    // line 63
                    if ($this->getAttribute($context["serial"], "value", array(), "any", true, true)) {
                        echo twig_escape_filter($this->env, $this->getAttribute($context["serial"], "value", array()), "html", null, true);
                    } else {
                        echo "Без с/н.";
                    }
                    echo "</td>
                                        <td style=\"border-width: 0 .5pt .5pt .5pt;width:90px\" align=\"center\">";
                    // line 64
                    if ($this->getAttribute($context["unit"], "warrantyBefore", array(), "any", true, true)) {
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["unit"], "warrantyBefore", array()), "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
                    } else {
                        echo "&mdash;";
                    }
                    echo "</td>
                                    </tr>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['serial'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 67
                echo "                            ";
            } else {
                // line 68
                echo "                                ";
                $context["c_index"] = ((isset($context["c_index"]) ? $context["c_index"] : null) + 1);
                // line 69
                echo "                                <tr>
                                    <td style=\"border-width: 0 0 .5pt .5pt;width:30px\">";
                // line 70
                echo twig_escape_filter($this->env, (isset($context["c_index"]) ? $context["c_index"] : null), "html", null, true);
                echo "</td>
                                    <td style=\"border-width: 0 0 .5pt .5pt;\">";
                // line 71
                if ($this->getAttribute($this->getAttribute($context["unit"], "product", array()), "sku", array())) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["unit"], "product", array()), "sku", array()), "html", null, true);
                } else {
                    echo "&mdash;";
                }
                echo "</td>
                                    <td style=\"border-width: 0 0 .5pt .5pt;width:330px\">";
                // line 72
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["unit"], "product", array()), "sku", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["unit"], "product", array()), "captionRu", array()), "html", null, true);
                echo "</td>
                                    <td style=\"border-width: 0 0 .5pt .5pt;width:150px\">";
                // line 73
                if ($this->getAttribute((isset($context["serial"]) ? $context["serial"] : null), "value", array(), "any", true, true)) {
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["serial"]) ? $context["serial"] : null), "value", array()), "html", null, true);
                } else {
                    echo "Без с/н.";
                }
                echo "</td>
                                    <td style=\"border-width: 0 .5pt .5pt .5pt;width:90px\" align=\"center\">";
                // line 74
                if ($this->getAttribute($context["unit"], "warrantyBefore", array(), "any", true, true)) {
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["unit"], "warrantyBefore", array()), "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
                } else {
                    echo "&mdash;";
                }
                echo "</td>
                                </tr>
                            ";
            }
            // line 77
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['unit'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 78
        echo "                    </table>

                </td>
            </tr>
            <tr>
                <td colspan=\"2\">                                                                                                                                        
                    <b>Условия</b>
                    <ol class=\"conditions\" >
                        <li>Документом, дающим право на гарантийное обслуживание, является гарантийный талон, который оформляется при приобретении товаров в интернет-магазине детских товаров PromoMaster.net (OOO РОСТПЭЙ). В гарантийном талоне указываются (на каждую отдельную позицию):
                            <ul>
                                <li>- Код товара</li>
                                <li>- Наименование</li>
                                <li>- Серийный номер (при наличии)</li>
                                <li>- Гарантия до</li>
                            </ul>
                        </li>
                        <li>Прием товаров в гарантийный ремонт или на замену по гарантии осуществляется только после предварительного обращения в службу поддержки и проведения консультации с менеджером посредством системы обращений компании PromoMaster.net на странице www.PromoMaster.net/contacts.html</li>
                        <li>Прием товаров в гарантийный ремонт или на замену по гарантии осуществляется в офисе компании PromoMaster.net (OOO РОСТПЭЙ) по адресу: 344011, г. Ростов-на-Дону, пер.Доломановский, д. 70Д, оф.1001</li>
                        <li>Доставка товаров в офис PromoMaster.net (OOO РОСТПЭЙ) и обратно осуществляется Покупателем за свой счет. В случае если подтверждается гарантийный случай, затраты клиента на доставку товара компенсируются интернет магазином PromoMaster.net (OOO РОСТПЭЙ).</li>
                        <li>Настоящая гарантия действительна только при предъявлении вместе с дефектным товаром правильно заполненного гарантийного талона с проставленной датой продажи. Если дата продажи не указана, то гарантийный срок исчисляется с момента изготовления изделия, установленного по серийному номеру (при его наличии).</li>
                        <li>После поступления товара в ремонт, в течение 10 рабочих дней происходит оценка состояния твоара, в результате которой определяется, будет ли осуществлена замена товара на новый или произведен ремонт (бесплатный или платный).</li>
                        <li>Настоящая гарантия недействительна, если серийный номер (при его налиичии) на изделии будет изменён, стёрт, удалён или будет неразборчив, а так же при обнаружении следов переклеивания или ремаркирования идентификационных стикеров.</li>
                        <li>Настоящая гарантия не распространяется в случае:
                            <ul>
                                <li>- неправильной эксплуатации: использование изделия не по назначению; использование изделия в условиях, не соответствующих стандартам и нормам безопасности;</li>
                                <li>- ремонта, произведённого не уполномоченными сервисными центрами или дилерами;</li>
                                <li>- обнаружения следов вскрытия устройства;</li>
                                <li>- несчастных случаев, прямых ударов молнии или грозовых разрядов, затопления, пожара, неправильной вентиляции и иных причин;</li>
                                <li>- дефектов системы, в которой использовалось данное изделие.</li>
                            </ul>
                        </li>
                        <li>Условия возврат товара надлежащего качества:
                            <ul>
                                <li>- Клиент вправе отказаться от товара в любое время до его передачи, а после передачи товара - в течение семи дней.</li>
                                <li>- Возврат товара надлежащего качества возможен в случае, если сохранены его товарный вид, потребительские свойства, а также документ, подтверждающий факт и условия покупки указанного товара. </li>
                                <li>- Клиент не вправе отказаться от товара надлежащего качества, имеющего индивидуально-определенные свойства, если указанный товар может быть использован исключительно приобретающим его потребителем.</li>
                                <li>- При отказе клиента от товара надлежащего качества продавец возвращает денежную сумму, уплаченную клиентов по договору, за исключением расходов продавца на доставку товара, не позднее чем через десять дней со дня предъявления клиентом соответствующего требования.</li>
                                <li>- Клиент доставляет товар до продавца за свой счет. Прием товара осуществляется в офисе компании PromoMaster.net (OOO РОСТПЭЙ) по адресу: 344011, г. Ростов-на-Дону, пер.Доломановский, д. 70Д, оф.1001.</li>
                            </ul>
                    </ol>                                                                  
                </td>
            </tr>

            <tr>
                <td colspan=\"2\" align=\"right\" style=\"padding-top: 40px;\">Подпись продавца</td>
            </tr>
            <tr>
                <td align=\"left\" style=\"padding-top:20px;\">Дата продажи: ";
        // line 125
        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "createdDateTime", array())) {
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : null), "createdDateTime", array()), "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
        } else {
            echo "__&nbsp;&nbsp;__________&nbsp;&nbsp;20__";
        }
        echo "</td>
                <td align=\"right\" style=\"padding-top:20px;\">";
        // line 126
        if ((isset($context["haveStamps"]) ? $context["haveStamps"] : null)) {
            echo "<img alt=\"stamp\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "imageSignAndStamp", array())), "html", null, true);
            echo "\" height=\"178\" width=\"182\">";
        } else {
            echo "______________________________";
        }
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "seller", array()), "nameOfTheHead", array()), "html", null, true);
        echo "</td>
            </tr>
        </table>
    </center>

";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Documents:guarantees.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  267 => 126,  259 => 125,  210 => 78,  204 => 77,  194 => 74,  186 => 73,  180 => 72,  172 => 71,  168 => 70,  165 => 69,  162 => 68,  159 => 67,  146 => 64,  138 => 63,  132 => 62,  124 => 61,  120 => 60,  117 => 59,  114 => 58,  109 => 57,  106 => 56,  102 => 55,  99 => 54,  97 => 53,  72 => 31,  64 => 28,  59 => 26,  49 => 25,  26 => 4,  20 => 3,);
    }
}
