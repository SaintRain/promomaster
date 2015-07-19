<?php

/* CoreManufacturerBundle:Admin/List:list_manufacturer_certificates.html.twig */
class __TwigTemplate_66245efd0a8f8e21bf735b4e7b1f68affde197ca82eeb5c3907d658a3cd17a56 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 9
        try {
            $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(9);

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
        $context["filter"] = array("filter[manufacturer][value]" => $this->getAttribute(        // line 17
(isset($context["object"]) ? $context["object"] : null), "id", array()), "filter[_page]" => 1, "filter[_sort_by]" => "indexPosition", "filter[_sort_order]" => "ASC", "filter[_per_page]" => 25);
        // line 24
        echo "
    ";
        // line 25
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "certificates", array()))) {
            // line 26
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_manufacturer_certificate_list", (isset($context["filter"]) ? $context["filter"] : null)), "html", null, true);
            echo "\" title=\"Перейти к сертификатом производителя\"><span class=\"icon-search\"></span>&nbsp;";
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "certificates", array())), "html", null, true);
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
        return array (  71 => 32,  67 => 30,  63 => 28,  55 => 26,  53 => 25,  50 => 24,  48 => 17,  47 => 16,  44 => 14,  42 => 13,  39 => 12,  36 => 11,  11 => 9,);
    }
}
