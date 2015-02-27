<?php

/* CorePropertyBundle:Filter/EditType:multiselect.html.twig */
class __TwigTemplate_9d35e534adbd09549d9272bb764839e99870dc9f6d86aa11efdf5b13f34ff8c8 extends Twig_Template
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
        return "CorePropertyBundle:Filter/EditType:multiselect.html.twig";
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
