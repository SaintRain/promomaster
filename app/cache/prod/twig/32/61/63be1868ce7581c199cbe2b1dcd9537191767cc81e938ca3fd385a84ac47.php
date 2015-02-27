<?php

/* CorePaymentBundle:Admin/List:list_payment_amount.html.twig */
class __TwigTemplate_326163be1868ce7581c199cbe2b1dcd9537191767cc81e938ca3fd385a84ac47 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:CRUD:base_list_field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 11
    public function block_field($context, array $blocks = array())
    {
        // line 12
        echo "
    <span style=\"color:";
        // line 13
        echo (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "type", array())) ? ("green") : ("red"));
        echo "\">";
        echo (((($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "type", array()) == false) && ((isset($context["value"]) ? $context["value"] : null) != 0))) ? ("-") : (""));
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction((isset($context["value"]) ? $context["value"] : null)), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</span>

";
    }

    public function getTemplateName()
    {
        return "CorePaymentBundle:Admin/List:list_payment_amount.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 13,  31 => 12,  28 => 11,);
    }
}
