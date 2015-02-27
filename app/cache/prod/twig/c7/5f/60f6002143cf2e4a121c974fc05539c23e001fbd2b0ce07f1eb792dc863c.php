<?php

/* CoreLogisticsBundle:Admin/Supply/list_fields:status.html.twig */
class __TwigTemplate_c75f60f6002143cf2e4a121c974fc05539c23e001fbd2b0ce07f1eb792dc863c extends Twig_Template
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
        echo "
";
        // line 4
        if (($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array()), "name", array()) == twig_constant("Core\\LogisticsBundle\\Entity\\Supply::onTheWayStatusName"))) {
            // line 5
            echo "<span class=\"label label-info\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array()), "captionRu", array()), "html", null, true);
            echo "</span>
";
        } else {
            // line 7
            if (($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array()), "name", array()) == twig_constant("Core\\LogisticsBundle\\Entity\\Supply::suppliedStatusName"))) {
                // line 8
                echo "<span class=\"label label-success\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array()), "captionRu", array()), "html", null, true);
                echo "</span>
";
            } else {
                // line 10
                echo "<span class=\"label label-default\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array()), "captionRu", array()), "html", null, true);
                echo "</span>
";
            }
        }
        // line 13
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/Supply/list_fields:status.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 13,  50 => 10,  44 => 8,  42 => 7,  36 => 5,  34 => 4,  31 => 3,  28 => 2,);
    }
}
