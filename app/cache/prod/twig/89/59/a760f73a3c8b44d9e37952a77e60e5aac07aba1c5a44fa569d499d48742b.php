<?php

/* CoreLogisticsBundle:Admin/UnitInStock/list_fields:priceInGtdCurrency.html.twig */
class __TwigTemplate_8959a760f73a3c8b44d9e37952a77e60e5aac07aba1c5a44fa569d499d48742b extends Twig_Template
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

    // line 2
    public function block_field($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "productInSupply", array())) {
            // line 4
            echo "        <span class=\"money\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "productInSupply", array()), "priceInGtdCurrency", array())), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "productInSupply", array()), "gtdCurrency", array()), "symbol", array()), "html", null, true);
            echo "</span>
    ";
        }
        // line 6
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/UnitInStock/list_fields:priceInGtdCurrency.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 6,  34 => 4,  31 => 3,  28 => 2,);
    }
}
