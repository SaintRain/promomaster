<?php

/* ApplicationSonataAdminBundle:CRUD:edit.html.twig */
class __TwigTemplate_607f09f8ff97e5cb3cafc6c8904b327c31ca0af19c563f32a96a3c8935651a87 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 12
        try {
            $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:base_edit.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(12);

            throw $e;
        }

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
        return "ApplicationSonataAdminBundle:CRUD:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 20,  50 => 19,  47 => 18,  40 => 15,  37 => 14,  11 => 12,);
    }
}
