<?php

/* CoreAdCompanyBundle:AdCompany:edit.html.twig */
class __TwigTemplate_4b4e439c74916d6da5f7a0b04e9a0ccc2cf73073192a2d2cbb181aff4bb6e3db extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("AppliactionSonataUserBundle::cabinet_layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'main_content' => array($this, 'block_main_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AppliactionSonataUserBundle::cabinet_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main_content($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->env->loadTemplate("AppliactionSonataUserBundle:AdCompany:edit_content.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "CoreAdCompanyBundle:AdCompany:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 4,  36 => 3,  11 => 1,);
    }
}
