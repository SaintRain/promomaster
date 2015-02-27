<?php

/* CoreDirectoryBundle:Admin/List:list_currency_rub.html.twig */
class __TwigTemplate_957544bf9b37ff296e5bac3cbebd15026ccec8e4566d0ca8ac292e83c694664e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");

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
        if ((!($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "currencyRUB", array()) * 1))) {
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
        return array (  38 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
