<?php

/* ApplicationSonataUserBundle:Admin/List:list_balance.html.twig */
class __TwigTemplate_3c2a16b6b9384ca8c8400caa0aabe98e16c6cb6f101499da0c1cf3b416d5f0c7 extends Twig_Template
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
        $context["balance"] = $this->env->getExtension('payment_extension')->getBalanceFunction((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), true);
        // line 10
        echo "
<td class=\"sonata-ba-list-field sonata-ba-list-field-";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "type", array()), "html", null, true);
        if (((isset($context["balance"]) ? $context["balance"] : $this->getContext($context, "balance")) < 0)) {
            echo " error";
        } elseif (((isset($context["balance"]) ? $context["balance"] : $this->getContext($context, "balance")) > 0)) {
            echo " success";
        }
        echo "\" objectId=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "id", array(0 => (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object"))), "method"), "html", null, true);
        echo "\">
    <span class=\"text-nowrap\">";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction((isset($context["balance"]) ? $context["balance"] : $this->getContext($context, "balance"))), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</span>
</td>


";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Admin/List:list_balance.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 12,  30 => 11,  27 => 10,  25 => 9,  22 => 8,  19 => 1,);
    }
}
