<?php

/* CoreLogisticsBundle:Admin/UnitInStock/list_fields:supply.html.twig */
class __TwigTemplate_09214baec99a7c66e35ea75d1d3bdcc815ceed79579769766d412c25916f4fd9 extends Twig_Template
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
        echo "<a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_logistics_supply_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "supply", array()), "id", array()))), "html", null, true);
        echo "\"># ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "supply", array()), "id", array()), "html", null, true);
        echo "</a>

";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/UnitInStock/list_fields:supply.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 3,  28 => 2,);
    }
}
