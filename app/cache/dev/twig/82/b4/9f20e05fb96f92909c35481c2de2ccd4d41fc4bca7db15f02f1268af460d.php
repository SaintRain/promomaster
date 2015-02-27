<?php

/* SonataAdminBundle:CRUD:list_date.html.twig */
class __TwigTemplate_82b49f20e05fb96f92909c35481c2de2ccd4d41fc4bca7db15f02f1268af460d extends Twig_Template
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
        return $this->env->resolveTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "getTemplate", array(0 => "base_list_field"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 25
    public function block_field($context, array $blocks = array())
    {
        // line 26
        if (twig_test_empty((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")))) {
            // line 27
            echo "&nbsp;
    ";
        } else {
            // line 29
            echo "        ";
            $context["format"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "format", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "options", array()), "format", array())) : ("dd MMMM Y"));
            // line 30
            echo "        ";
            $context["locale"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "locale", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "options", array()), "locale", array())) : ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
            // line 31
            echo "        ";
            echo $this->env->getExtension('sonata_intl_datetime')->formatDatetime((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), (isset($context["format"]) ? $context["format"] : $this->getContext($context, "format")), (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")), (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone")));
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
