<?php

/* SonataIntlBundle:CRUD:show_percent.html.twig */
class __TwigTemplate_9c613e77f9410a3805c1981de1ff759a58e9efd4e4d6659bbb6162c012594b92 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_show_field.html.twig");

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:CRUD:base_show_field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 14
    public function block_field($context, array $blocks = array())
    {
        // line 15
        if ((null === (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")))) {
            // line 16
            echo "&nbsp;";
        } else {
            // line 18
            $context["attributes"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "attributes", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "attributes", array()), array())) : (array()));
            // line 19
            echo "        ";
            $context["textAttributes"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "textAttributes", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "textAttributes", array()), array())) : (array()));
            // line 20
            echo "        ";
            $context["locale"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "locale", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "locale", array()), null)) : (null));
            // line 21
            echo "
        ";
            // line 22
            echo $this->env->getExtension('sonata_intl_number')->formatPercent((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), (isset($context["attributes"]) ? $context["attributes"] : $this->getContext($context, "attributes")), (isset($context["textAttributes"]) ? $context["textAttributes"] : $this->getContext($context, "textAttributes")), (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")));
        }
    }

    public function getTemplateName()
    {
        return "SonataIntlBundle:CRUD:show_percent.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 22,  44 => 21,  41 => 20,  38 => 19,  36 => 18,  33 => 16,  31 => 15,  28 => 14,);
    }
}
