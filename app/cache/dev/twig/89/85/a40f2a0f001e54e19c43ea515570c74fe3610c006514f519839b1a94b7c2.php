<?php

/* CoreLogisticsBundle:Admin/Supply/list_fields:status.html.twig */
class __TwigTemplate_8985a40f2a0f001e54e19c43ea515570c74fe3610c006514f519839b1a94b7c2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

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
        if (($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "status", array()), "name", array()) == twig_constant("Core\\LogisticsBundle\\Entity\\Supply::onTheWayStatusName"))) {
            // line 5
            echo "<span class=\"label label-info\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "status", array()), "captionRu", array()), "html", null, true);
            echo "</span>
";
        } else {
            // line 7
            if (($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "status", array()), "name", array()) == twig_constant("Core\\LogisticsBundle\\Entity\\Supply::suppliedStatusName"))) {
                // line 8
                echo "<span class=\"label label-success\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "status", array()), "captionRu", array()), "html", null, true);
                echo "</span>
";
            } else {
                // line 10
                echo "<span class=\"label label-default\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "status", array()), "captionRu", array()), "html", null, true);
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
        return array (  65 => 13,  58 => 10,  52 => 8,  50 => 7,  44 => 5,  42 => 4,  39 => 3,  36 => 2,  11 => 1,);
    }
}
