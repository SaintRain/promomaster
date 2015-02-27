<?php

/* CoreCategoryBundle:Admin:DefaultCategory_edit.html.twig */
class __TwigTemplate_2089fee935c28ad18ba90841697a57f2b31a5f1279621e66064ab34a3d546a8f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'form_content' => array($this, 'block_form_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $this->displayBlock('form_content', $context, $blocks);
        // line 14
        echo "
";
    }

    // line 3
    public function block_form_content($context, array $blocks = array())
    {
        // line 4
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreCategoryBundle:Admin:DefaultCategory_edit.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  30 => 4,  27 => 3,  22 => 14,  20 => 3,);
    }
}
