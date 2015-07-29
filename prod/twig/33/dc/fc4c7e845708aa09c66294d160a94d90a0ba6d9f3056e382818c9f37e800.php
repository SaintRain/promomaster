<?php

/* CoreProductBundle:Admin/list_fields:ostatok.html.twig */
class __TwigTemplate_33dcfc4c7e845708aa09c66294d160a94d90a0ba6d9f3056e382818c9f37e800 extends Twig_Template
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
        return array (  66 => 11,  60 => 9,  58 => 8,  48 => 7,  45 => 6,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}