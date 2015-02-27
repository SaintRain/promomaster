<?php

/* CoreHolidayBundle:Admin/List:list_date_GMT.html.twig */
class __TwigTemplate_ff10732128ff96e73d7a3e2cb6834a73216379b3601928d4577a3e36935eb51c extends Twig_Template
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
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "d.m.Y"), "html", null, true);
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
