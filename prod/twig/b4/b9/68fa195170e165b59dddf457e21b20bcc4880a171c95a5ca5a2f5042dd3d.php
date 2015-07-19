<?php

/* SonataAdminBundle:CRUD:base_show_field.html.twig */
class __TwigTemplate_b4b968fa195170e165b59dddf457e21b20bcc4880a171c95a5ca5a2f5042dd3d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'name' => array($this, 'block_name'),
            'field' => array($this, 'block_field'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 11
        echo "
<th>";
        // line 12
        $this->displayBlock('name', $context, $blocks);
        echo "</th>
<td>";
        // line 13
        $this->displayBlock('field', $context, $blocks);
        echo "</td>
";
    }

    // line 12
    public function block_name($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "trans", array(0 => $this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "label", array()), 1 => array(), 2 => $this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "translationDomain", array())), "method"), "html", null, true);
    }

    // line 13
    public function block_field($context, array $blocks = array())
    {
        if ($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array()), "safe", array())) {
            echo (isset($context["value"]) ? $context["value"] : null);
        } else {
            echo nl2br(twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true));
        }
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:base_show_field.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  40 => 13,  34 => 12,  28 => 13,  24 => 12,  21 => 11,);
    }
}
