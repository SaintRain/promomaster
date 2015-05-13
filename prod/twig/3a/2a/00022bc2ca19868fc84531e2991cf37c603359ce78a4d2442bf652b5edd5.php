<?php

/* CoreOrderBundle:Admin/Form/PreOrderComposition:form_admin_fields.html.twig */
class __TwigTemplate_3a2a00022bc2ca19868fc84531e2991cf37c603359ce78a4d2442bf652b5edd5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'core_pre_order_compositions_admin_product_ajax_entity_widget' => array($this, 'block_core_pre_order_compositions_admin_product_ajax_entity_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 7
        $this->displayBlock('core_pre_order_compositions_admin_product_ajax_entity_widget', $context, $blocks);
    }

    public function block_core_pre_order_compositions_admin_product_ajax_entity_widget($context, array $blocks = array())
    {
        // line 8
        echo "<div>
    ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget');
        echo "
    
    <p class=\"OOPBQuantityExtraInfoContent\" style=\"display: none;float:right\">
        Остаток у поставщика:
        <span  title=\"Количество товара у поставщика\" class=\"OOPBQuantityLabel label\"></span>
        <span  class=\"OOPBQuantityUpdatedLabel label label-default\" title=\"Дата обновления остатка\"></span>
    </p>
</div>
";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/PreOrderComposition:form_admin_fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  29 => 9,  26 => 8,  20 => 7,);
    }
}
