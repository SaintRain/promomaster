<?php

/* CoreManufacturerBundle:Admin/Form/Brand:form_admin_fields.html.twig */
class __TwigTemplate_3b6d751eb8758a7def39b975e3934c5d47a13430dda900abf9abd30d67f19507 extends Twig_Template
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
