<?php

/* CoreLogisticsBundle:Admin/Supply/list_fields:supplier.html.twig */
class __TwigTemplate_00ae8536adcf7273ffa72468259819c4951388e91fd89cd592488455f861b190 extends Twig_Template
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
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "supplier", array()) && $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "supplier", array()), "caption", array()))) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "supplier", array()), "caption", array()), "html", null, true);
        }
        // line 5
        echo "    ";
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "seller", array()) && $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "seller", array()), "caption", array()))) {
            echo " ";
            if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "supplier", array()) && $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "supplier", array()), "caption", array()))) {
                echo "<br>";
            }
            // line 6
            echo "        ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "seller", array()), "caption", array()), "html", null, true);
            echo "<br>";
        }
        // line 7
        echo "    ";
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "seller", array()) && $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "seller", array()), "isWorkingWithNds", array()))) {
            echo " <small class=\"muted\">(НДС)</small> ";
        }
        // line 8
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/Supply/list_fields:supplier.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 8,  50 => 7,  45 => 6,  38 => 5,  34 => 4,  31 => 3,  28 => 2,);
    }
}
