<?php

/* CoreProductBundle:Admin/list_fields:ostatok.html.twig */
class __TwigTemplate_1b8181a28098bcbf55f37eb91f3bfaa816f66cb4b7fe2021ea22d092c5d0b343 extends Twig_Template
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
        echo "    ";
        $context["getAvailabilityQuantityReal"] = $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "getAvailabilityQuantityReal", array());
        // line 5
        echo "    ";
        $context["getAvailabilityQuantityVirtualReal"] = $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "getAvailabilityQuantityVirtualReal", array());
        // line 6
        echo "<span title=\"Количество свободного товара, который лежит на складе\" class=\"label 
      ";
        // line 7
        if (((isset($context["getAvailabilityQuantityReal"]) ? $context["getAvailabilityQuantityReal"] : null) > 1)) {
            echo "label-success";
        } else {
            echo "label-important";
        }
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "getAvailabilityQuantityReal", array()), "html", null, true);
        echo "</span>
      ";
        // line 8
        if (((isset($context["getAvailabilityQuantityVirtualReal"]) ? $context["getAvailabilityQuantityVirtualReal"] : null) > 0)) {
            // line 9
            echo "<span title=\"Количество свободного товара, который едет на склад\" class=\"label label-default\">+";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "getAvailabilityQuantityVirtualReal", array()), "html", null, true);
            echo "</span>
";
        }
        // line 11
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Admin/list_fields:ostatok.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 11,  52 => 9,  50 => 8,  40 => 7,  37 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
