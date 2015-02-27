<?php

/* CoreLogisticsBundle:Admin/UnitInStock/list_fields:supplier.html.twig */
class __TwigTemplate_2563f5a17d5939a1db8184bf6d04a7094f7946aa49174f09a47660b960c53318 extends Twig_Template
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
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "supplier", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "supplier", array()), "caption", array()), "html", null, true);
        }
        echo "<br>";
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "seller", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "seller", array()), "caption", array()), "html", null, true);
        }
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/UnitInStock/list_fields:supplier.html.twig";
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
