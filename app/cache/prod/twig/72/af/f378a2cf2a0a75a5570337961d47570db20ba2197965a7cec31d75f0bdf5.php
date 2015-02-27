<?php

/* CoreUnionBundle:Admin/Form/td_types:boolean.html.twig */
class __TwigTemplate_72aff378a2cf2a0a75a5570337961d47570db20ba2197965a7cec31d75f0bdf5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'boolean_type' => array($this, 'block_boolean_type'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('boolean_type', $context, $blocks);
    }

    public function block_boolean_type($context, array $blocks = array())
    {
        // line 2
        echo "        ";
        if ($this->getAttribute((isset($context["d"]) ? $context["d"] : null), (isset($context["d_key"]) ? $context["d_key"] : null))) {
            // line 3
            echo "<span class=\"label label-success\">да</span>        
        ";
        } else {
            // line 5
            echo "<span class=\"label label-important\">нет</span>
            ";
        }
    }

    public function getTemplateName()
    {
        return "CoreUnionBundle:Admin/Form/td_types:boolean.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  33 => 5,  29 => 3,  26 => 2,  20 => 1,);
    }
}
