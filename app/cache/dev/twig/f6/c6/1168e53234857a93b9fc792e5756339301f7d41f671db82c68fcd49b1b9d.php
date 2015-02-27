<?php

/* SonataIntlBundle:CRUD:show_date.html.twig */
class __TwigTemplate_f6c61168e53234857a93b9fc792e5756339301f7d41f671db82c68fcd49b1b9d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 12
        try {
            $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_show_field.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(12);

            throw $e;
        }

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
            echo "
        ";
            // line 23
            echo $this->env->getExtension('sonata_intl_datetime')->formatDate((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), (isset($context["pattern"]) ? $context["pattern"] : $this->getContext($context, "pattern")), (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")), (isset($context["timezone"]) ? $context["timezone"] : $this->getContext($context, "timezone")), (isset($context["dateType"]) ? $context["dateType"] : $this->getContext($context, "dateType")));
        }
    }

    public function getTemplateName()
    {
        return "SonataIntlBundle:CRUD:show_date.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 23,  55 => 22,  52 => 21,  49 => 20,  46 => 19,  44 => 18,  41 => 16,  39 => 15,  36 => 14,  11 => 12,);
    }
}
