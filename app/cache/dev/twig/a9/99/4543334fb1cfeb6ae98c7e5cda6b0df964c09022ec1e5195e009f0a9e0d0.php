<?php

/* CorePropertyBundle:Filter/EditType:select.html.twig */
class __TwigTemplate_a9994543334fb1cfeb6ae98c7e5cda6b0df964c09022ec1e5195e009f0a9e0d0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 9
        try {
            $this->parent = $this->env->loadTemplate("CorePropertyBundle:Filter/EditType:checkbox.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(9);

            throw $e;
        }

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
        return array (  11 => 9,);
    }
}
