<?php

/* CoreManufacturerBundle:Admin/Form/Brand:form_admin_fields.html.twig */
class __TwigTemplate_06410942d8de80da4367e9cf54b5146f4a122ef3249697dfa8015ce52f59f173 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'core_brand_admin_seriesList_sonata_type_collection_widget' => array($this, 'block_core_brand_admin_seriesList_sonata_type_collection_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 7
        echo "

";
        // line 10
        $this->displayBlock('core_brand_admin_seriesList_sonata_type_collection_widget', $context, $blocks);
    }

    public function block_core_brand_admin_seriesList_sonata_type_collection_widget($context, array $blocks = array())
    {
        // line 11
        echo "    <div style=\"width:750px\">
        ";
        // line 12
        $this->displayBlock("sonata_type_collection_widget", $context, $blocks);
        echo "
    </div>

";
    }

    public function getTemplateName()
    {
        return "CoreManufacturerBundle:Admin/Form/Brand:form_admin_fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  33 => 12,  30 => 11,  24 => 10,  20 => 7,);
    }
}
