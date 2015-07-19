<?php

/* CorePaymentBundle:PaymentSystem/BankTransfer:savings_bank.html.twig */
class __TwigTemplate_9d0a6b029682b11b1b0042d19d192d9df6c30517b9b5567db2a837f77db25fd6 extends Twig_Template
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
        return array (  161 => 40,  155 => 39,  148 => 38,  140 => 37,  134 => 36,  128 => 35,  122 => 34,  116 => 33,  110 => 32,  101 => 26,  95 => 25,  88 => 24,  80 => 23,  74 => 22,  68 => 21,  62 => 20,  56 => 19,  50 => 18,  44 => 14,  42 => 13,  39 => 12,  36 => 11,  11 => 9,);
    }
}
