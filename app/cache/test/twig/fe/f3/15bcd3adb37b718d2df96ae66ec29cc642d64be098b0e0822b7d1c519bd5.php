<?php

/* SonataAdminBundle:CRUD:edit.html.twig */
class __TwigTemplate_fef315bcd3adb37b718d2df96ae66ec29cc642d64be098b0e0822b7d1c519bd5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:base_edit.html.twig");

        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
            'form' => array($this, 'block_form'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataAdminBundle:CRUD:base_edit.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 14
    public function block_javascripts($context, array $blocks = array())
    {
        // line 15
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
";
    }

    // line 18
    public function block_form($context, array $blocks = array())
    {
        // line 19
        echo "  ";
        echo $this->env->getExtension('language_switcher_extension')->languageSwitcher();
        echo "
    ";
        // line 20
        $this->displayParentBlock("form", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 20,  42 => 19,  39 => 18,  32 => 15,  29 => 14,);
    }
}
