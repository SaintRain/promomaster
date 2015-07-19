<?php

/* CoreManufacturerBundle:Admin/List:list_brand_products.html.twig */
class __TwigTemplate_3f8425be33bbd557fe6d1b33c3b27c1728ac731790f178377e416440b772ca3b extends Twig_Template
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
        $context["filter"] = array("filter[brand][value][]" => $this->getAttribute(        // line 17
(isset($context["object"]) ? $context["object"] : null), "id", array()), "filter[_page]" => 1, "filter[_sort_by]" => "indexPosition", "filter[_sort_order]" => "ASC", "filter[_per_page]" => 25);
        // line 24
        echo "        ";
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "countProducts", array())) {
            // line 25
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_product_commonproduct_list", (isset($context["filter"]) ? $context["filter"] : null)), "html", null, true);
            echo "\" title=\"Перейти к продукции бренда\"><span class=\"icon-search\"></span>&nbsp;";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "countProducts", array()), "html", null, true);
            echo "</a>
        ";
        } else {
            // line 27
            echo "            -
        ";
        }
        // line 29
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 31
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreManufacturerBundle:Admin/List:list_brand_products.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 31,  65 => 29,  61 => 27,  53 => 25,  50 => 24,  48 => 17,  47 => 16,  44 => 14,  42 => 13,  39 => 12,  36 => 11,  11 => 9,);
    }
}
