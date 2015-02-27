<?php

/* CoreCommonBundle:Fragments/simple:header.html.twig */
class __TwigTemplate_1a4ddfc0f0779df2fc6e179a12faa893f440ebac48e1e3c2aa9d209e1263ba57 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<header id=\"header\" class=\"error_page_header\" role=\"banner\">
    <a class=\"header_logo\" href=\"";
        // line 2
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo_olikids.png"), "html", null, true);
        echo "\" alt=\"OliKids.ru — интернет-магазин детских товаров\"></a>
        ";
        // line 3
        $this->env->loadTemplate("CoreCommonBundle:Fragments:searchForm.html.twig")->display($context);
        // line 4
        echo "</header>";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Fragments/simple:header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 4,  28 => 3,  22 => 2,  19 => 1,);
    }
}
