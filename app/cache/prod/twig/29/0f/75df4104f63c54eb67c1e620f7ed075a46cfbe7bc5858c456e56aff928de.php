<?php

/* CorePaymentBundle:PaymentSystem/BankTransfer:savings_bank.html.twig */
class __TwigTemplate_290f75df4104f63c54eb67c1e620f7ed075a46cfbe7bc5858c456e56aff928de extends Twig_Template
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
        $context["seller"] = $this->getAttribute($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "order", array()), "seller", array());
        // line 14
        echo "    <table width=\"720\" bordercolor=\"#000000\" style=\"border:#000000 1px solid;\" cellpadding=\"5\" cellspacing=\"0\">
        <tr>
            <td width=\"220\" valign=\"top\" height=\"220\" align=\"center\" style=\"border-bottom:#000000 1px solid; border-right:#000000 1px solid;\"><strong>Извещение</strong></td>
            <td valign=\"top\" style=\"border-bottom:#000000 1px solid;\">
                <strong>Получатель:</strong> ";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "legalForm", array()), "captionRu", array()), "html", null, true);
        echo " \"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "caption", array()), "html", null, true);
        echo "\"<br /><br />
                <strong>КПП:</strong> ";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "kpp", array()), "html", null, true);
        echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>ИНН:</strong> ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "inn", array()), "html", null, true);
        echo "<br /><br />
                <strong>P/сч.:</strong> ";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "paymentAccount", array()), "html", null, true);
        echo " <strong>в:</strong> ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "bank", array()), "caption", array()), "html", null, true);
        echo "<br /><br />
                <strong>БИК:</strong> ";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "bank", array()), "bic", array()), "html", null, true);
        echo "&nbsp;&nbsp;&nbsp;<strong>К/сч.:</strong> ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "corrAccount", array()), "html", null, true);
        echo "<br /><br />
                <strong>Платеж:</strong> Оплата заказа №";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "order", array()), "id", array())), "html", null, true);
        echo " (платеж №";
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "id", array())), "html", null, true);
        echo "). Без НДС.<br /><br />
                <strong>Плательщик:</strong> ";
        // line 23
        if ($this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "legalForm", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "organization", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, (((($this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "lastName", array()) . " ") . $this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "firstName", array())) . " ") . $this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "surName", array())), "html", null, true);
        }
        echo "<br /><br />
                <strong>Адрес плательщика:</strong> ";
        // line 24
        if ($this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "legalForm", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "addressPost", array()), "html", null, true);
        } else {
        }
        echo "<br /><br />
                <strong>Сумма:</strong> ";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "amount", array())), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "<br /><br />
                <strong>Подпись:</strong> _______________ <strong>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Дата:</strong> &quot;__&quot; _________ ";
        // line 26
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "createdAt", array()), "Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
        echo " г.
            </td>
        </tr>
        <tr>
            <td width=\"220\" valign=\"top\" height=\"220\" align=\"center\" style=\"border-right:#000000 1px solid;\"><strong>Квитанция</strong></td>
            <td valign=\"top\">
                <strong>Получатель:</strong> ";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "legalForm", array()), "captionRu", array()), "html", null, true);
        echo " \"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "caption", array()), "html", null, true);
        echo "\"<br /><br />
                <strong>КПП:</strong> ";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "kpp", array()), "html", null, true);
        echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>ИНН:</strong> ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "inn", array()), "html", null, true);
        echo "<br /><br />
                <strong>P/сч.:</strong> ";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "paymentAccount", array()), "html", null, true);
        echo " <strong>в:</strong> ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "bank", array()), "caption", array()), "html", null, true);
        echo "<br /><br />
                <strong>БИК:</strong> ";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "bank", array()), "bic", array()), "html", null, true);
        echo "&nbsp;&nbsp;&nbsp;<strong>К/сч.:</strong> ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["seller"]) ? $context["seller"] : null), "corrAccount", array()), "html", null, true);
        echo "<br /><br />
                <strong>Платеж:</strong> Оплата заказа №";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "order", array()), "id", array())), "html", null, true);
        echo " (платеж №";
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "id", array())), "html", null, true);
        echo "). Без НДС.<br /><br />
                <strong>Плательщик:</strong> ";
        // line 37
        if ($this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "legalForm", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "organization", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, (((($this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "lastName", array()) . " ") . $this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "firstName", array())) . " ") . $this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "surName", array())), "html", null, true);
        }
        echo "<br /><br />
                <strong>Адрес плательщика:</strong> ";
        // line 38
        if ($this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "legalForm", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["customer"]) ? $context["customer"] : null), "addressPost", array()), "html", null, true);
        } else {
        }
        echo "<br /><br />
                <strong>Сумма:</strong> ";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "amount", array())), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "<br /><br />
                <strong>Подпись:</strong> _______________ <strong>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Дата:</strong> &quot;__&quot; _________ ";
        // line 40
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["payment"]) ? $context["payment"] : null), "createdAt", array()), "Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
        echo " г.
            </td>
        </tr>
    </table>

";
    }

    public function getTemplateName()
    {
        return "CorePaymentBundle:PaymentSystem/BankTransfer:savings_bank.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 40,  147 => 39,  140 => 38,  132 => 37,  126 => 36,  120 => 35,  114 => 34,  108 => 33,  102 => 32,  93 => 26,  87 => 25,  80 => 24,  72 => 23,  66 => 22,  60 => 21,  54 => 20,  48 => 19,  42 => 18,  36 => 14,  34 => 13,  31 => 12,  28 => 11,);
    }
}
