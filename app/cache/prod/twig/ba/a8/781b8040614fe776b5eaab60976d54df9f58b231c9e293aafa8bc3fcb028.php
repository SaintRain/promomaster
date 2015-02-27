<?php

/* SonataAdminBundle:CRUD:list_datetime.html.twig */
class __TwigTemplate_baa8781b8040614fe776b5eaab60976d54df9f58b231c9e293aafa8bc3fcb028 extends Twig_Template
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

    // line 14
    public function block_field($context, array $blocks = array())
    {
        // line 15
        if (twig_test_empty((isset($context["value"]) ? $context["value"] : null))) {
            // line 16
            echo "&nbsp;
    ";
        } else {
            // line 18
            echo "        ";
            $context["format"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "format", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array()), "format", array())) : ("dd MMMM Y H:mm"));
            // line 19
            echo "        ";
            $context["locale"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "locale", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array()), "locale", array())) : ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
            // line 20
            echo "        ";
            echo $this->env->getExtension('sonata_intl_datetime')->formatDatetime((isset($context["value"]) ? $context["value"] : null), (isset($context["format"]) ? $context["format"] : null), (isset($context["locale"]) ? $context["locale"] : null), (isset($context["default_timezone"]) ? $context["default_timezone"] : null));
        }
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:list_datetime.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 20,  38 => 19,  35 => 18,  31 => 16,  29 => 15,  26 => 14,);
    }
}
