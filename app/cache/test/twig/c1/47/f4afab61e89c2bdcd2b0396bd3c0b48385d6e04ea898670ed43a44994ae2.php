<?php

/* SonataIntlBundle:CRUD:list_datetime.html.twig */
class __TwigTemplate_c147f4afab61e89c2bdcd2b0396bd3c0b48385d6e04ea898670ed43a44994ae2 extends Twig_Template
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
            echo "&nbsp;";
        } else {
            // line 18
            $context["pattern"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "pattern", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "pattern", array()), null)) : (null));
            // line 19
            echo "        ";
            $context["locale"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "locale", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "locale", array()), null)) : (null));
            // line 20
            echo "        ";
            $context["timezone"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "timezone", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "timezone", array()), null)) : (null));
            // line 21
            echo "        ";
            $context["dateType"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "dateType", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "dateType", array()), null)) : (null));
            // line 22
            echo "        ";
            $context["timeType"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "dateType", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "dateType", array()), null)) : (null));
            // line 23
            echo "
        ";
            // line 24
            echo $this->env->getExtension('sonata_intl_datetime')->formatDatetime((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), (isset($context["pattern"]) ? $context["pattern"] : $this->getContext($context, "pattern")), (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")), (isset($context["timezone"]) ? $context["timezone"] : $this->getContext($context, "timezone")), (isset($context["dateType"]) ? $context["dateType"] : $this->getContext($context, "dateType")), (isset($context["timeType"]) ? $context["timeType"] : $this->getContext($context, "timeType")));
        }
    }

    public function getTemplateName()
    {
        return "SonataIntlBundle:CRUD:list_datetime.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 24,  48 => 23,  45 => 22,  42 => 21,  39 => 20,  36 => 19,  34 => 18,  31 => 16,  29 => 15,  26 => 14,);
    }
}
