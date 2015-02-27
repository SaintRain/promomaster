<?php

/* SonataIntlBundle:CRUD:list_currency.html.twig */
class __TwigTemplate_bf39b89fec4463a5234f6afb572d8aa790a22be3529c237ff3f2200df3c5d1f4 extends Twig_Template
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
        if ((null === (isset($context["value"]) ? $context["value"] : null))) {
            // line 16
            echo "&nbsp;";
        } else {
            // line 18
            $context["currency"] = $this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array()), "currency", array());
            // line 19
            echo "        ";
            $context["attributes"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "attributes", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "attributes", array()), array())) : (array()));
            // line 20
            echo "        ";
            $context["textAttributes"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "textAttributes", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "textAttributes", array()), array())) : (array()));
            // line 21
            echo "        ";
            $context["locale"] = (($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "locale", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["field_description"]) ? $context["field_description"] : null), "options", array(), "any", false, true), "locale", array()), null)) : (null));
            // line 22
            echo "
        ";
            // line 23
            echo $this->env->getExtension('sonata_intl_number')->formatCurrency((isset($context["value"]) ? $context["value"] : null), (isset($context["currency"]) ? $context["currency"] : null), (isset($context["attributes"]) ? $context["attributes"] : null), (isset($context["textAttributes"]) ? $context["textAttributes"] : null), (isset($context["locale"]) ? $context["locale"] : null));
        }
    }

    public function getTemplateName()
    {
        return "SonataIntlBundle:CRUD:list_currency.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 23,  45 => 22,  42 => 21,  39 => 20,  36 => 19,  34 => 18,  31 => 16,  29 => 15,  26 => 14,);
    }
}
