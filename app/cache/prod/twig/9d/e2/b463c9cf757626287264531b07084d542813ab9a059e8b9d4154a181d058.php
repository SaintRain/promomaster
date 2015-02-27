<?php

/* CoreLogisticsBundle:Admin/SupplierPriceAnalysis/list:list_price_analysis_price.html.twig */
class __TwigTemplate_9de2b463c9cf757626287264531b07084d542813ab9a059e8b9d4154a181d058 extends Twig_Template
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

    // line 3
    public function block_field($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "priceFile", array(), "any", false, true), 0, array(), "array", false, true), "name", array(), "any", true, true)) {
            // line 5
            echo "       <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "priceFile", array()), 0, array(), "array"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "priceFile", array()), 0, array(), "array"), "name", array()), "html", null, true);
            echo "</a>
    ";
        }
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/SupplierPriceAnalysis/list:list_price_analysis_price.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 5,  31 => 4,  28 => 3,);
    }
}
