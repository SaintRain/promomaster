<?php

/* ApplicationSonataUserBundle:Admin/Form:contragent_form_admin_fields.html.twig */
class __TwigTemplate_57e1561cee94556dbe399417740b9045e3e22b1aa81006818790eb80bc75b91e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'application_user_contragent_admin_addressList_sonata_type_collection_widget' => array($this, 'block_application_user_contragent_admin_addressList_sonata_type_collection_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "            ";
        // line 2
        echo "            ";
        $this->displayBlock('application_user_contragent_admin_addressList_sonata_type_collection_widget', $context, $blocks);
    }

    public function block_application_user_contragent_admin_addressList_sonata_type_collection_widget($context, array $blocks = array())
    {
        // line 3
        echo "                <div style=\"width:850px\">
                    ";
        // line 4
        $this->displayBlock("sonata_type_collection_widget", $context, $blocks);
        echo "
                </div>
            ";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Admin/Form:contragent_form_admin_fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  32 => 4,  29 => 3,  22 => 2,  20 => 1,);
    }
}