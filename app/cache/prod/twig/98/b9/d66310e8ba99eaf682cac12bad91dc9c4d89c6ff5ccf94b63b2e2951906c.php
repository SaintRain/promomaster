<?php

/* CoreLogisticsBundle:Admin/Supplier/list_fields:requisites.html.twig */
class __TwigTemplate_98b9d66310e8ba99eaf682cac12bad91dc9c4d89c6ff5ccf94b63b2e2951906c extends Twig_Template
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
        echo "<b>ИНН:</b> ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "inn", array()), "html", null, true);
        echo "<br>
<b>КПП:</b> ";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "kpp", array()), "html", null, true);
        echo "<br>
<b>ОГРН:</b> ";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "ogrn", array()), "html", null, true);
        echo "<br>
";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/Supplier/list_fields:requisites.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 5,  36 => 4,  31 => 3,  28 => 2,);
    }
}
