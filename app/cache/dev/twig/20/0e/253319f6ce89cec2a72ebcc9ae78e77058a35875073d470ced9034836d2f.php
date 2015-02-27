<?php

/* ApplicationSonataAdminBundle:CRUD:list__action_dublicate.html.twig */
class __TwigTemplate_200e253319f6ce89cec2a72ebcc9ae78e77058a35875073d470ced9034836d2f extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array()), "html", null, true);
        echo "\" data-article=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "article", array()), "html", null, true);
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
