<?php

/* CoreLogisticsBundle:Admin/Supplier/list_fields:regionsCityList.html.twig */
class __TwigTemplate_b3bda735ae03f86a393316edb7777bdbbc2075cd7ae3ebc9f8b7f93d4d35a8d7 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "country", array()), "captionRu", array()), "html", null, true);
        echo "&nbsp;/&nbsp;";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "city", array()), "html", null, true);
        echo "
<br><small><b>Юр.:</b> ";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "addressUr", array()), "html", null, true);
        echo "</small><br><small><b>Почт.:</b> ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "addressPost", array()), "html", null, true);
        echo "</small>
";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/Supplier/list_fields:regionsCityList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 4,  31 => 3,  28 => 2,);
    }
}
