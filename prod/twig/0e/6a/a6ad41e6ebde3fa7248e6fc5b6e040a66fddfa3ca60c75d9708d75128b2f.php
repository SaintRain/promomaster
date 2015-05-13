<?php

/* CorePaymentBundle:PaymentSystem/BankTransfer:invoice.html.twig */
class __TwigTemplate_0e6aa6ad41e6ebde3fa7248e6fc5b6e040a66fddfa3ca60c75d9708d75128b2f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 9
        try {
            $this->parent = $this->env->loadTemplate("CorePaymentBundle:PaymentSystem\\BankTransfer:layout_print.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(9);

            throw $e;
        }

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CorePaymentBundle:PaymentSystem\\BankTransfer:layout_print.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        echo "    
    ";
        // line 13
        $context["seller"] = $this->getAttribute($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "order", array()), "seller", array());
        echo "    

    <div style=\"width:720px\">

        <table  width=\"720\" style=\"border:#000000 1px solid;\" cellpadding=\"3\" cellspacing=\"0\">
            <tr>
                <td width=\"120\">Поставщик:</td>
                <td>";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "legalForm", array()), "captionRu", array()), "html", null, true);
        echo " \"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "caption", array()), "html", null, true);
        echo "\"</td>
            </tr>
            <tr>
                <td>Юр. адрес:</td>
                <td>";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "addressUr", array()), "html", null, true);
        echo "</td>
            </tr>
        </table>

        <br>

        <br>
        ";
        // line 32
        echo "
        <table  width=\"720\" style=\"border:#000000 1px solid;\" cellpadding=\"3\" cellspacing=\"0\">
            <tr>
                <td style=\"border-right:#000000 1px solid;\">ИНН&nbsp;";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "inn", array()), "html", null, true);
        echo "</td>
                <td style=\"border-right:#000000 1px solid;\">КПП&nbsp;";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "kpp", array()), "html", null, true);
        echo "</td>
                <td style=\"border-right:#000000 1px solid;\" width=\"50\"></td>
                <td></td>
            </tr>

            <tr>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\" colspan=\"2\">Получатель</td>
                <td style=\"border-right:#000000 1px solid;\"></td>
                <td></td>
            </tr>

            <tr>
                <td style=\"border-right:#000000 1px solid;\" colspan=\"2\">";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "legalForm", array()), "captionRu", array()), "html", null, true);
        echo " \"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "caption", array()), "html", null, true);
        echo "\"</td>
                <td style=\"border-right:#000000 1px solid;\" >Сч. №</td>
                <td>";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "paymentAccount", array()), "html", null, true);
        echo "</td>
            </tr>

            <tr>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\" colspan=\"2\">Банк получателя</td>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\">БИК</td>
                <td style=\"border-top:#000000 1px solid;\">";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "bank", array()), "bic", array()), "html", null, true);
        echo "</td>
            </tr>

            <tr>
                <td style=\"border-right:#000000 1px solid;\" colspan=\"2\">";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "bank", array()), "caption", array()), "html", null, true);
        echo "</td>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\">Сч. №</td>
                <td>";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "corrAccount", array()), "html", null, true);
        echo "</td>
            </tr>
        </table>

        <br>

        <p align=\"center\">СЧЕТ №";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "id", array())), "html", null, true);
        echo " от ";
        echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, $this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "createdAt", array()), "none", "none", null, (isset($context["default_timezone"]) ? $context["default_timezone"] : null), "«dd» MMMM YYYY г."), "html", null, true);
        echo "</p>

        <br>

        <table  width=\"720\" style=\"\" cellpadding=\"3\" cellspacing=\"0\">
            <tr>
                <td width=\"150\">Плательщик:</td>
                <td>";
        // line 75
        if ($this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "legalForm", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "organization", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, (((($this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "lastName", array()) . " ") . $this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "firstName", array())) . " ") . $this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "surName", array())), "html", null, true);
        }
        echo "</td>
            </tr>
            <tr>
                <td>Грузополучатель:</td>
                <td>";
        // line 79
        if ($this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "legalForm", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "organization", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, (((($this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "lastName", array()) . " ") . $this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "firstName", array())) . " ") . $this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "surName", array())), "html", null, true);
        }
        echo "</td>
            </tr>
        </table>

        <br>

        <table  width=\"720\" cellpadding=\"3\" cellspacing=\"0\">
            <tr>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid; border-left:#000000 1px solid;\" width=\"40\" align=\"center\">№</td>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\" align=\"center\">Наименование товара</td>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\" width=\"90\" align=\"center\">Единица</td>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\" width=\"100\" align=\"center\">Количество</td>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\" width=\"60\" align=\"center\">Цена (руб.)</td>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\" width=\"80\" align=\"center\">Сумма (руб.)</td>
            </tr>
            <tr style=\"border-top:#000000 1px solid;\">
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid; border-left:#000000 1px solid;\" align=\"center\">1</td>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\">Оплата заказа №";
        // line 96
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "order", array()), "id", array())), "html", null, true);
        echo " (платеж №";
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "id", array())), "html", null, true);
        echo ")</td>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\" align=\"center\">шт.</td>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\" align=\"center\">1</td>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\" align=\"center\">";
        // line 99
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "amount", array())), "html", null, true);
        echo "</td>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\" align=\"center\">";
        // line 100
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "amount", array())), "html", null, true);
        echo "</td>
            </tr>
            <tr style=\"border-top:#000000 1px solid;\">
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\" align=\"right\" colspan=\"5\">Итого (без НДС):</td>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid; border-bottom:#000000 1px solid;\" align=\"center\">";
        // line 104
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "amount", array())), "html", null, true);
        echo "</td>
            </tr>
            <!--
            <tr>
                <td style=\"border-right:#000000 1px solid;\" align=\"right\" colspan=\"5\">Итого с учетом НДС:</td>
                <td style=\"border-right:#000000 1px solid; border-bottom:#000000 1px solid;\"></td>
            </tr>
            <tr>
                <td style=\"border-right:#000000 1px solid;\" align=\"right\" colspan=\"5\">Всего к оплате:</td>
                <td style=\"border-right:#000000 1px solid; border-bottom:#000000 1px solid;\"></td>
            </tr>
            -->
        </table>

        <br>

        <p>
            Всего наименований 1, на сумму ";
        // line 121
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "amount", array())), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "

            <br>

            ";
        // line 125
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->amount2strFunction($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "amount", array())), "html", null, true);
        echo "
        </p>

        <br>

        <table  width=\"700\" cellpadding=\"3\" cellspacing=\"0\" >
            <tr>
                <td width=\"200\">Руководитель предприятия</td>
                <td align=\"center\"> <img src=\"";
        // line 133
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "imageSign", array()), "preview", "small")), "html", null, true);
        echo "\"/></td>
                <td align=\"center\">( ";
        // line 134
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "nameOfTheHead", array()), "html", null, true);
        echo " )</td>
            </tr>
            <tr>
                <td></td>
                <td align=\"center\"><i style=\"font-size: 9pt\">(подпись)</i></td>
                <td align=\"center\"><i style=\"font-size: 9pt\">(расшифровка подписи)</i></td>
            </tr>
            <tr>
                <td>Главный бухгалтер</td>
                <td align=\"center\"> <img src=\"";
        // line 143
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "imageSign", array()), "preview", "small")), "html", null, true);
        echo "\"/></td>
                <td align=\"center\">( ";
        // line 144
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "nameOfTheAccountant", array()), "html", null, true);
        echo " )</td>
            </tr>
            <tr>
                <td></td>
                <td align=\"center\"><i style=\"font-size: 9pt\">(подпись)</i></td>
                <td align=\"center\"><i style=\"font-size: 9pt\">(расшифровка подписи)</i></td>
            </tr>
        </table>
        
        <p style=\"margin-left: 1cm; margin-bottom: 0cm\"><font face=\"Arial, sans-serif\"><img src=\"";
        // line 153
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "imageStamp", array()), "preview", "small2")), "html", null, true);
        echo "\"/></font></p>
    </div>
            
";
    }

    public function getTemplateName()
    {
        return "CorePaymentBundle:PaymentSystem/BankTransfer:invoice.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  270 => 153,  258 => 144,  254 => 143,  242 => 134,  238 => 133,  227 => 125,  218 => 121,  198 => 104,  191 => 100,  187 => 99,  179 => 96,  155 => 79,  144 => 75,  132 => 68,  123 => 62,  118 => 60,  111 => 56,  102 => 50,  95 => 48,  80 => 36,  76 => 35,  71 => 32,  61 => 24,  52 => 20,  42 => 13,  39 => 12,  36 => 11,  11 => 9,);
    }
}
