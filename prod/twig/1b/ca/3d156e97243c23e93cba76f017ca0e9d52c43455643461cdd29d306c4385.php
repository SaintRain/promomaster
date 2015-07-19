<?php

/* CoreCategoryBundle:Admin:DefaultCategory_edit.html.twig */
class __TwigTemplate_1bca3d156e97243c23e93cba76f017ca0e9d52c43455643461cdd29d306c4385 extends Twig_Template
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
