<?php

/* CoreHolidayBundle:Admin/List:list_date_GMT.html.twig */
class __TwigTemplate_5943b1c23f2ace28796d35c1fb95b953efc1c50c6491dc42ef25335684a66750 extends Twig_Template
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
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "d.m.Y"), "html", null, true);
        echo "

";
    }

    public function getTemplateName()
    {
        return "CoreHolidayBundle:Admin/List:list_date_GMT.html.twig";
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
