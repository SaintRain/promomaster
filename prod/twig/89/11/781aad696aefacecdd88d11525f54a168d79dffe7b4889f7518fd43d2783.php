<?php

/* CoreDirectoryBundle:Admin/List:cities_amount_by_region.html.twig */
class __TwigTemplate_8911781aad696aefacecdd88d11525f54a168d79dffe7b4889f7518fd43d2783 extends Twig_Template
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
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "citiesAmount", array())) {
            // line 5
            echo "        <div><a target=_blank\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_directory_city_list", array("filter[country][value]" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "country", array()), "id", array()), "filter[region][value]" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "citiesAmount", array()), "html", null, true);
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
        return "CoreDirectoryBundle:Admin/List:cities_amount_by_region.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 7,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
