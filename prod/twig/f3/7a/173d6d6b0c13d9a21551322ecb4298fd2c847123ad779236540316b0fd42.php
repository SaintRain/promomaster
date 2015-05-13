<?php

/* CoreLogisticsBundle:Admin/Transit:form_admin_fields.html.twig */
class __TwigTemplate_f37a173d6d6b0c13d9a21551322ecb4298fd2c847123ad779236540316b0fd42 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'core_logistics_unit_in_transit_admin_serialsText_text_widget' => array($this, 'block_core_logistics_unit_in_transit_admin_serialsText_text_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 3
        $this->displayBlock('core_logistics_unit_in_transit_admin_serialsText_text_widget', $context, $blocks);
        // line 6
        echo "

            ";
    }

    // line 3
    public function block_core_logistics_unit_in_transit_admin_serialsText_text_widget($context, array $blocks = array())
    {
        // line 4
        echo nl2br(twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true));
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/Transit:form_admin_fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  34 => 4,  31 => 3,  25 => 6,  23 => 3,  20 => 1,);
    }
}
