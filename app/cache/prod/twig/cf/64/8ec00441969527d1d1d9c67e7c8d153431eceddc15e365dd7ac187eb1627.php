<?php

/* ApplicationSonataUserBundle:Admin/List:list_balance.html.twig */
class __TwigTemplate_cf648ec00441969527d1d1d9c67e7c8d153431eceddc15e365dd7ac187eb1627 extends Twig_Template
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
        $context["balance"] = $this->env->getExtension('payment_extension')->getBalanceFunction((isset($context["object"]) ? $context["object"] : null), true);
        // line 10
        echo "
<td class=\"sonata-ba-list-field sonata-ba-list-field-";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "type", array()), "html", null, true);
        if (((isset($context["balance"]) ? $context["balance"] : null) < 0)) {
            echo " error";
        } elseif (((isset($context["balance"]) ? $context["balance"] : null) > 0)) {
            echo " success";
        }
        echo "\" objectId=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method"), "html", null, true);
        echo "\">
    <span class=\"text-nowrap\">";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction((isset($context["balance"]) ? $context["balance"] : null)), "html", null, true);
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
