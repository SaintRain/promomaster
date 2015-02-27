<?php

/* SonataAdminBundle:CRUD:list_date.html.twig */
class __TwigTemplate_a6edfeeb9a916241e7e8de90ea865aa0fe9502f6f3489bdb67eb7392b8792aad extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "getTemplate", array(0 => "base_list_field"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 25
    public function block_field($context, array $blocks = array())
    {
        // line 26
        if (twig_test_empty((isset($context["value"]) ? $context["value"] : null))) {
            // line 27
            echo "&nbsp;
    ";
        } else {
            // line 29
            echo "        ";
            $context["format"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "format", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array()), "format", array())) : ("dd MMMM Y"));
            // line 30
            echo "        ";
            $context["locale"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "locale", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array()), "locale", array())) : ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
            // line 31
            echo "        ";
            echo $this->env->getExtension('sonata_intl_datetime')->formatDatetime((isset($context["value"]) ? $context["value"] : null), (isset($context["format"]) ? $context["format"] : null), (isset($context["locale"]) ? $context["locale"] : null), (isset($context["default_timezone"]) ? $context["default_timezone"] : null));
        }
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:list_date.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 31,  38 => 30,  35 => 29,  31 => 27,  29 => 26,  26 => 25,);
    }
}
