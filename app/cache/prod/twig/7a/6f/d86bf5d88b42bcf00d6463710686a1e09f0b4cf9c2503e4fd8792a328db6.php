<?php

/* CoreLogisticsBundle:Admin/Supplier/list_fields:positionOfTheHead.html.twig */
class __TwigTemplate_7a6fd86bf5d88b42bcf00d6463710686a1e09f0b4cf9c2503e4fd8792a328db6 extends Twig_Template
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
        echo "<strong>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "positionOfTheHead", array()), "html", null, true);
        echo "</strong><br>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "nameOfTheHead", array()), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/Supplier/list_fields:positionOfTheHead.html.twig";
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
