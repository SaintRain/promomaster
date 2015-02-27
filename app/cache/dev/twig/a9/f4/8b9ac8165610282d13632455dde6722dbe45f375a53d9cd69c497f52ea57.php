<?php

/* CoreLogisticsBundle:Admin/Transit/list_fields:status.html.twig */
class __TwigTemplate_a9f48b9ac8165610282d13632455dde6722dbe45f375a53d9cd69c497f52ea57 extends Twig_Template
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
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "status", array())) {
            // line 4
            echo "
";
            // line 5
            if (($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "status", array()), "name", array()) == twig_constant("Core\\LogisticsBundle\\Entity\\Transit::formedStatusName"))) {
                // line 6
                echo "<span class=\"label label-default\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "status", array()), "captionRu", array()), "html", null, true);
                echo "</span>
";
            }
            // line 8
            if (($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "status", array()), "name", array()) == twig_constant("Core\\LogisticsBundle\\Entity\\Transit::packedStatusName"))) {
                // line 9
                echo "<span class=\"label label-inverse\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "status", array()), "captionRu", array()), "html", null, true);
                echo "</span>
";
            }
            // line 11
            if (($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "status", array()), "name", array()) == twig_constant("Core\\LogisticsBundle\\Entity\\Transit::onTheWayStatusName"))) {
                // line 12
                echo "<span class=\"label label-info\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "status", array()), "captionRu", array()), "html", null, true);
                echo "</span>
";
            }
            // line 14
            if (($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "status", array()), "name", array()) == twig_constant("Core\\LogisticsBundle\\Entity\\Transit::completedStatusName"))) {
                // line 15
                echo "<span class=\"label label-success\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "status", array()), "captionRu", array()), "html", null, true);
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
        return array (  76 => 17,  70 => 15,  68 => 14,  62 => 12,  60 => 11,  54 => 9,  52 => 8,  46 => 6,  44 => 5,  41 => 4,  39 => 3,  36 => 2,  11 => 1,);
    }
}
