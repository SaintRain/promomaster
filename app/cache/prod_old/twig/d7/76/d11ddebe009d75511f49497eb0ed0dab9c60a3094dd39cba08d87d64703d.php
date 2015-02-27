<?php

/* CoreManufacturerBundle:Admin/List:list_manufacturer_certificates.html.twig */
class __TwigTemplate_d776d11ddebe009d75511f49497eb0ed0dab9c60a3094dd39cba08d87d64703d extends Twig_Template
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

    // line 11
    public function block_field($context, array $blocks = array())
    {
        // line 12
        echo "
    ";
        // line 13
        ob_start();
        // line 14
        echo "
    ";
        // line 16
        $context["filter"] = array("filter[manufacturer][value]" => $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array()), "filter[_page]" => 1, "filter[_sort_by]" => "indexPosition", "filter[_sort_order]" => "ASC", "filter[_per_page]" => 25);
        // line 24
        echo "
    ";
        // line 25
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "certificates", array()))) {
            // line 26
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_manufacturer_certificate_list", (isset($context["filter"]) ? $context["filter"] : $this->getContext($context, "filter"))), "html", null, true);
            echo "\" title=\"Перейти к сертификатом производителя\"><span class=\"icon-search\"></span>&nbsp;";
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "certificates", array())), "html", null, true);
            echo "</a>
    ";
        } else {
            // line 28
            echo "        -
    ";
        }
        // line 30
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 32
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreManufacturerBundle:Admin/List:list_manufacturer_certificates.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 32,  58 => 30,  54 => 28,  46 => 26,  44 => 25,  41 => 24,  39 => 16,  36 => 14,  34 => 13,  31 => 12,  28 => 11,);
    }
}
