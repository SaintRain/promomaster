<?php

/* CoreDirectoryBundle:Admin/List:regions_amount_by_country.html.twig */
class __TwigTemplate_8951dc55a860d1929158a248b424ca6b9c666a12a9209286d97c4af0f614bbb0 extends Twig_Template
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
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "regionsAmount", array())) {
            // line 5
            echo "        <div><a target=_blank\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_directory_region_list", array("filter[country][value]" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "regionsAmount", array()), "html", null, true);
            echo "</a></div>
        ";
        } else {
            // line 7
            echo "        <div>&#x2012;</div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "CoreDirectoryBundle:Admin/List:regions_amount_by_country.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
