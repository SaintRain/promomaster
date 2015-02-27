<?php

/* SonataAdminBundle:Core:create_button.html.twig */
class __TwigTemplate_5cac9c283de89b183547c85cb52748809f27cc53557a3c32b3afe4461d584e05 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 15
        try {
            $this->parent = $this->env->loadTemplate("SonataAdminBundle:Button:create_button.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(15);

            throw $e;
        }

        $this->blocks = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:Button:create_button.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Core:create_button.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  11 => 15,);
    }
}
