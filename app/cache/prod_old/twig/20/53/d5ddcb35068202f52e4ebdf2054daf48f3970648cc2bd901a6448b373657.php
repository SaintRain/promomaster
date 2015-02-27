<?php

/* CorePropertyBundle:Filter/EditType:select.html.twig */
class __TwigTemplate_2053d5ddcb35068202f52e4ebdf2054daf48f3970648cc2bd901a6448b373657 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CorePropertyBundle:Filter/EditType:checkbox.html.twig");

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "CorePropertyBundle:Filter/EditType:checkbox.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "CorePropertyBundle:Filter/EditType:select.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array ();
    }
}
