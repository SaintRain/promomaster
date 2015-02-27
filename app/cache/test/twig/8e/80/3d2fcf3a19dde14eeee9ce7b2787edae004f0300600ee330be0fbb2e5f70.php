<?php

/* CoreDirectoryBundle:Admin/List:cities_amount_by_country.html.twig */
class __TwigTemplate_8e803d2fcf3a19dde14eeee9ce7b2787edae004f0300600ee330be0fbb2e5f70 extends Twig_Template
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
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "citiesAmount", array())) {
            // line 5
            echo "        <div><a target=_blank\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_directory_city_list", array("filter[country][value]" => $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "citiesAmount", array()), "html", null, true);
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
        return "CoreDirectoryBundle:Admin/List:cities_amount_by_country.html.twig";
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
