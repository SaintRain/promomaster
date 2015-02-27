<?php

/* SonataAdminBundle:CRUD:list_datetime.html.twig */
class __TwigTemplate_1c9277e486121809cf099b0b55a90834a34104ce2ac2ea26a968914aa7607635 extends Twig_Template
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
        return $this->env->resolveTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "getTemplate", array(0 => "base_list_field"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 14
    public function block_field($context, array $blocks = array())
    {
        // line 15
        if (twig_test_empty((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")))) {
            // line 16
            echo "&nbsp;
    ";
        } else {
            // line 18
            echo "        ";
            $context["format"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "format", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "options", array()), "format", array())) : ("dd MMMM Y H:mm"));
            // line 19
            echo "        ";
            $context["locale"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "locale", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : $this->getContext($context, "field_description")), "options", array()), "locale", array())) : ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
            // line 20
            echo "        ";
            echo $this->env->getExtension('sonata_intl_datetime')->formatDatetime((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), (isset($context["format"]) ? $context["format"] : $this->getContext($context, "format")), (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")), (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone")));
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
