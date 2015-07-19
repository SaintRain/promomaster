<?php

/* SonataAdminBundle:CRUD:list_date.html.twig */
class __TwigTemplate_f09cfeab4fa4d57c15bec8273078bffc477bc23ed5d48a39a956f3ab1f59cd42 extends Twig_Template
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
        // line 12
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
        return array (  42 => 31,  39 => 30,  36 => 29,  32 => 27,  30 => 26,  27 => 25,  18 => 12,);
    }
}
