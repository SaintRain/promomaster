<?php

/* CoreFaqBundle:Admin/List:list__action_show_on_site.html.twig */
class __TwigTemplate_d55f7aff334b4efd3198b311caad23d82486f3a3c505f363804e96f878439501 extends Twig_Template
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
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "isActive", array())) {
            // line 2
            echo "<a target=\"_blank\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_faq_article", array("categorySlug" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "category", array()), "slug", array()), "articleSlug" => $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "slug", array()))), "html", null, true);
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
