<?php

/* CorePaymentBundle:Admin/List:list_payment_amount.html.twig */
class __TwigTemplate_2d9eec3789ae925354549387f0e5aa7ce7c082b89e4b476efce3ac6cbdaf10b2 extends Twig_Template
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
        echo (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "type", array())) ? ("green") : ("red"));
        echo "\">";
        echo (((($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "type", array()) == false) && ((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")) != 0))) ? ("-") : (""));
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value"))), "html", null, true);
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
