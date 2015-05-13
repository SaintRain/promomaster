<?php

/* CoreCommonBundle:Fragments/simple:header.html.twig */
class __TwigTemplate_14db660bd7021271ef3339eed62f7279e40f6a2e32759481c4fb917768f12646 extends Twig_Template
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
