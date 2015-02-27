<?php

/* CoreLogisticsBundle:Admin/Transit/list_fields:status.html.twig */
class __TwigTemplate_a14ace7f20858dfc456f7e9b8226c9ed3a6528685617ff02b16b231a5bff4dd1 extends Twig_Template
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
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array())) {
            // line 4
            echo "
";
            // line 5
            if (($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array()), "name", array()) == twig_constant("Core\\LogisticsBundle\\Entity\\Transit::formedStatusName"))) {
                // line 6
                echo "<span class=\"label label-default\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array()), "captionRu", array()), "html", null, true);
                echo "</span>
";
            }
            // line 8
            if (($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array()), "name", array()) == twig_constant("Core\\LogisticsBundle\\Entity\\Transit::packedStatusName"))) {
                // line 9
                echo "<span class=\"label label-inverse\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array()), "captionRu", array()), "html", null, true);
                echo "</span>
";
            }
            // line 11
            if (($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array()), "name", array()) == twig_constant("Core\\LogisticsBundle\\Entity\\Transit::onTheWayStatusName"))) {
                // line 12
                echo "<span class=\"label label-info\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array()), "captionRu", array()), "html", null, true);
                echo "</span>
";
            }
            // line 14
            if (($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array()), "name", array()) == twig_constant("Core\\LogisticsBundle\\Entity\\Transit::completedStatusName"))) {
                // line 15
                echo "<span class=\"label label-success\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array()), "captionRu", array()), "html", null, true);
                echo "</span>
";
            }
            // line 17
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/Transit/list_fields:status.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 17,  62 => 15,  60 => 14,  54 => 12,  52 => 11,  46 => 9,  44 => 8,  38 => 6,  36 => 5,  33 => 4,  31 => 3,  28 => 2,);
    }
}
