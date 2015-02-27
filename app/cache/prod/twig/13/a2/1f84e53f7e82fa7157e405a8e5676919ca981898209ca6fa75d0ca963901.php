<?php

/* CoreStatisticsBundle:Admin/Form/list_fields:not_finished_order_id.html.twig */
class __TwigTemplate_13a21f84e53f7e82fa7157e405a8e5676919ca981898209ca6fa75d0ca963901 extends Twig_Template
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
        echo "    <a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_statistics_notfinishedorder_show", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "html", null, true);
        echo "</a>
";
    }

    public function getTemplateName()
    {
        return "CoreStatisticsBundle:Admin/Form/list_fields:not_finished_order_id.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,);
    }
}
