<?php

/* CoreDirectoryBundle:Admin/List:list_currency_rub.html.twig */
class __TwigTemplate_2cf9323231ef95a47b576422391aaa990786a0fb1e96d4716c4e34b672c39e72 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:CRUD:base_list_field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_field($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if ( !($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "currencyRUB", array()) * 1)) {
            // line 5
            echo "        <span class=\"label\">Просчет не производился</span>
    ";
        } else {
            // line 7
            echo "        ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "currencyRUB", array()), "html", null, true);
            echo " (от ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "currencyDateTime", array()), "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
            echo ")
    ";
        }
    }

    public function getTemplateName()
    {
        return "CoreDirectoryBundle:Admin/List:list_currency_rub.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 7,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
