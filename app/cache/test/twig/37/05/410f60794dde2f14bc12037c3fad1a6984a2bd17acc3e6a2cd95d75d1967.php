<?php

/* CorePaymentBundle:Email:sendPaymentOnSupportEmailIfIsPassed.html.twig */
class __TwigTemplate_3705410f60794dde2f14bc12037c3fad1a6984a2bd17acc3e6a2cd95d75d1967 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 8
        echo "
";
        // line 9
        ob_start();
        // line 10
        echo "
    Поступила оплата по счету <a href=\"https://";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["domain"]) ? $context["domain"] : $this->getContext($context, "domain")), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_payment_payment_edit", array("id" => $this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "id", array()))), "html", null, true);
        echo "\" target=\"_blank\">№";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "id", array()), "html", null, true);
        echo "</a><br/>
    Платежная система: ";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "system", array()), "captionRu", array()), "html", null, true);
        echo "<br/>
    Дата счета: ";
        // line 13
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "createdAt", array()), "d.m.Y, H:i", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
        echo "<br/>
    Сумма по счету: ";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "amount", array())), "html", null, true);
        echo "&nbsp;";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "<br/>

    <br>

    ";
        // line 18
        if ($this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "order", array())) {
            // line 19
            echo "
        Счет связан с заказом <a href=\"https://";
            // line 20
            echo twig_escape_filter($this->env, (isset($context["domain"]) ? $context["domain"] : $this->getContext($context, "domain")), "html", null, true);
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_order_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "order", array()), "id", array()))), "html", null, true);
            echo "\" target=\"_blank\">№";
            echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute($this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "order", array()), "id", array())), "html", null, true);
            echo "</a><br/>
        Дата заказа: ";
            // line 21
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["payment"]) ? $context["payment"] : $this->getContext($context, "payment")), "order", array()), "createdDateTime", array()), "d.m.Y, H:i", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
            echo "<br/>
        Сумма заказа: ";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "total_cost_all", array(), "array")), "html", null, true);
            echo "&nbsp;";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "<br/>

    ";
        }
        // line 25
        echo "
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CorePaymentBundle:Email:sendPaymentOnSupportEmailIfIsPassed.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 25,  70 => 22,  66 => 21,  59 => 20,  56 => 19,  54 => 18,  45 => 14,  41 => 13,  37 => 12,  30 => 11,  27 => 10,  25 => 9,  22 => 8,  19 => 1,);
    }
}
