<?php

/* CorePaymentBundle:Admin/List:list_percent.html.twig */
class __TwigTemplate_967b03e2b0618a3a9e82d5cfc98dd2a1fcdfc076f28d554c12a9f7f95f9938c0 extends Twig_Template
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
    ";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction((isset($context["value"]) ? $context["value"] : null)), "html", null, true);
        echo " % ";
        // line 14
        echo "
";
    }

    public function getTemplateName()
    {
        return "CorePaymentBundle:Admin/List:list_percent.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 14,  34 => 13,  31 => 12,  28 => 11,);
    }
}
