<?php

/* CoreFaqBundle:Admin/List:list__action_show_on_site.html.twig */
class __TwigTemplate_7c26d02db746aed04b49d7776fa572e8c5cd88e2eabccdb7d38b5c1dc386a8b3 extends Twig_Template
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
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "isActive", array())) {
            // line 2
            echo "<a target=\"_blank\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_faq_article", array("categorySlug" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "category", array()), "slug", array()), "articleSlug" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "slug", array()))), "html", null, true);
            echo "\" class=\"btn view_link btn-small\">
    <i class=\"icon-zoom-in\"></i>
    <span>Показать на сайте</span>
</a>
";
        }
    }

    public function getTemplateName()
    {
        return "CoreFaqBundle:Admin/List:list__action_show_on_site.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  21 => 2,  19 => 1,);
    }
}
