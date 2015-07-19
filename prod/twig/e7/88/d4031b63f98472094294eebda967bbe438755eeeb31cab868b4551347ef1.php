<?php

/* ApplicationSonataAdminBundle:CRUD:list__action_dublicate.html.twig */
class __TwigTemplate_e788d4031b63f98472094294eebda967bbe438755eeeb31cab868b4551347ef1 extends Twig_Template
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
        echo "
<a href=\"javascript:void(0);\" data-id=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "html", null, true);
        echo "\" data-article=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "article", array()), "html", null, true);
        echo "\" class=\"dublicateProduct btn btn-small\">
    Дублировать
</a>

";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataAdminBundle:CRUD:list__action_dublicate.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  19 => 1,);
    }
}
