<?php

/* SonataAdminBundle:CRUD:base_list_flat_field.html.twig */
class __TwigTemplate_fe3f567c12205eb0eb67f4988d8e04a8b4b85dcc4130886e149fe8065adbd978 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 11
        echo "
<span class=\"sonata-ba-list-field sonata-ba-list-field-";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "type", array()), "html", null, true);
        echo "\" objectId=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method"), "html", null, true);
        echo "\">
    ";
        // line 13
        if (((($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "identifier", array(), "any", true, true) && $this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "route", array(), "any", true, true)) && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "isGranted", array(0 => ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array()), "route", array()), "name", array()) == "show")) ? ("VIEW") : (twig_upper_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array()), "route", array()), "name", array())))), 1 => (isset($context["object"]) ? $context["object"] : null)), "method")) && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasRoute", array(0 => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array()), "route", array()), "name", array())), "method"))) {
            // line 19
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateObjectUrl", array(0 => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array()), "route", array()), "name", array()), 1 => (isset($context["object"]) ? $context["object"] : null), 2 => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array()), "route", array()), "parameters", array())), "method"), "html", null, true);
            echo "\">";
            // line 20
            $this->displayBlock('field', $context, $blocks);
            // line 21
            echo "</a>
    ";
        } else {
            // line 23
            echo "        ";
            $this->displayBlock("field", $context, $blocks);
            echo "
    ";
        }
        // line 25
        echo "</span>
";
    }

    // line 20
    public function block_field($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true);
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:base_list_flat_field.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 20,  47 => 25,  41 => 23,  37 => 21,  35 => 20,  31 => 19,  29 => 13,  23 => 12,  20 => 11,);
    }
}
