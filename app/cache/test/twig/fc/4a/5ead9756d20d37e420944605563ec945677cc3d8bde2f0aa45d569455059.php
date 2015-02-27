<?php

/* CorePaymentBundle:PaymentSystem/BankTransfer:invoice.html.twig */
class __TwigTemplate_fc4a5ead9756d20d37e420944605563ec945677cc3d8bde2f0aa45d569455059 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CorePaymentBundle:PaymentSystem\\BankTransfer:layout_print.html.twig");

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
        $context["seller"] = $this->getAttribute($this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "order", array()), "seller", array());
        echo "    

    <div style=\"width:720px\">

        <table  width=\"720\" style=\"border:#000000 1px solid;\" cellpadding=\"3\" cellspacing=\"0\">
            <tr>
                <td width=\"120\">Поставщик:</td>
                <td>";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "legalForm", array()), "captionRu", array()), "html", null, true);
        echo " \"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "caption", array()), "html", null, true);
        echo "\"</td>
            </tr>
            <tr>
                <td>Юр. адрес:</td>
                <td>";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "addressUr", array()), "html", null, true);
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "inn", array()), "html", null, true);
        echo "</td>
                <td style=\"border-right:#000000 1px solid;\">КПП&nbsp;";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "kpp", array()), "html", null, true);
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "legalForm", array()), "captionRu", array()), "html", null, true);
        echo " \"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "caption", array()), "html", null, true);
        echo "\"</td>
                <td style=\"border-right:#000000 1px solid;\" >Сч. №</td>
                <td>";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "paymentAccount", array()), "html", null, true);
        echo "</td>
            </tr>

            <tr>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\" colspan=\"2\">Банк получателя</td>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\">БИК</td>
                <td style=\"border-top:#000000 1px solid;\">";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "bank", array()), "bic", array()), "html", null, true);
        echo "</td>
            </tr>

            <tr>
                <td style=\"border-right:#000000 1px solid;\" colspan=\"2\">";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "bank", array()), "caption", array()), "html", null, true);
        echo "</td>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\">Сч. №</td>
                <td>";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "corrAccount", array()), "html", null, true);
        echo "</td>
            </tr>
        </table>

        <br>

        <p align=\"center\">СЧЕТ №";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "id", array())), "html", null, true);
        echo " от ";
        echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, $this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "createdAt", array()), "none", "none", null, (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone")), "«dd» MMMM YYYY г."), "html", null, true);
        echo "</p>

        <br>

        <table  width=\"720\" style=\"\" cellpadding=\"3\" cellspacing=\"0\">
            <tr>
                <td width=\"150\">Плательщик:</td>
                <td>";
        // line 75
        if ($this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "legalForm", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["customer"]) ? $context["customer"] : $this->getContext($context, "customer")), "organization", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, (((($this->getAttribute((isset($context["customer"]) ? $context["customer"] : $this->getContext($context, "customer")), "lastName", array()) . " ") . $this->getAttribute((isset($context["customer"]) ? $context["customer"] : $this->getContext($context, "customer")), "firstName", array())) . " ") . $this->getAttribute((isset($context["customer"]) ? $context["customer"] : $this->getContext($context, "customer")), "surName", array())), "html", null, true);
        }
        echo "</td>
            </tr>
            <tr>
                <td>Грузополучатель:</td>
                <td>";
        // line 79
        if ($this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "legalForm", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["customer"]) ? $context["customer"] : $this->getContext($context, "customer")), "organization", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, (((($this->getAttribute((isset($context["customer"]) ? $context["customer"] : $this->getContext($context, "customer")), "lastName", array()) . " ") . $this->getAttribute((isset($context["customer"]) ? $context["customer"] : $this->getContext($context, "customer")), "firstName", array())) . " ") . $this->getAttribute((isset($context["customer"]) ? $context["customer"] : $this->getContext($context, "customer")), "surName", array())), "html", null, true);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute($this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "order", array()), "id", array())), "html", null, true);
        echo " (платеж №";
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "id", array())), "html", null, true);
        echo ")</td>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\" align=\"center\">шт.</td>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\" align=\"center\">1</td>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\" align=\"center\">";
        // line 99
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "amount", array())), "html", null, true);
        echo "</td>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\" align=\"center\">";
        // line 100
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "amount", array())), "html", null, true);
        echo "</td>
            </tr>
            <tr style=\"border-top:#000000 1px solid;\">
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid;\" align=\"right\" colspan=\"5\">Итого (без НДС):</td>
                <td style=\"border-top:#000000 1px solid;border-right:#000000 1px solid; border-bottom:#000000 1px solid;\" align=\"center\">";
        // line 104
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "amount", array())), "html", null, true);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "amount", array())), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "

            <br>

            ";
        // line 125
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->amount2strFunction($this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "amount", array())), "html", null, true);
        echo "
        </p>

        <br>

        <table  width=\"700\" cellpadding=\"3\" cellspacing=\"0\" >
            <tr>
                <td width=\"200\">Руководитель предприятия</td>
                <td align=\"center\"> <img src=\"";
        // line 133
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "imageSign", array()), "preview", "small")), "html", null, true);
        echo "\"/></td>
                <td align=\"center\">( ";
        // line 134
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "nameOfTheHead", array()), "html", null, true);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "imageSign", array()), "preview", "small")), "html", null, true);
        echo "\"/></td>
                <td align=\"center\">( ";
        // line 144
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "nameOfTheAccountant", array()), "html", null, true);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["seller"]) ? $context["seller"] : $this->getContext($context, "seller")), "imageStamp", array()), "preview", "small2")), "html", null, true);
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
        return array (  262 => 153,  250 => 144,  246 => 143,  234 => 134,  230 => 133,  219 => 125,  210 => 121,  190 => 104,  183 => 100,  179 => 99,  171 => 96,  147 => 79,  136 => 75,  124 => 68,  115 => 62,  110 => 60,  103 => 56,  94 => 50,  87 => 48,  72 => 36,  68 => 35,  63 => 32,  53 => 24,  44 => 20,  34 => 13,  31 => 12,  28 => 11,);
    }
}
