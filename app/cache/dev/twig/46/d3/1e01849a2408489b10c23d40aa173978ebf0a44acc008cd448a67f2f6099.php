<?php

/* CoreLogisticsBundle:Admin/Supply/Form:form_admin_fields.html.twig */
class __TwigTemplate_46d31e01849a2408489b10c23d40aa173978ebf0a44acc008cd448a67f2f6099 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'core_logistics_supply_admin_id_text_widget' => array($this, 'block_core_logistics_supply_admin_id_text_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 6
        $this->displayBlock('core_logistics_supply_admin_id_text_widget', $context, $blocks);
    }

    public function block_core_logistics_supply_admin_id_text_widget($context, array $blocks = array())
    {
        // line 7
        echo "    <h4>Поставка # ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "id", array()), "html", null, true);
        echo "</h4>
    ";
        // line 8
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "isCreatedForOrderOnly", array())) {
            // line 9
            echo "        Создана автоматически для товара \"под заказ\".
        ";
            // line 10
            if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "order", array())) {
                // line 11
                echo "        Используется в
        <a href=\"";
                // line 12
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_order_edit", array("id" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "order", array()), "id", array()))), "html", null, true);
                echo "\">заказе
            №";
                // line 13
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "order", array()), "id", array()), "html", null, true);
                echo "</a>
            ";
            }
            // line 15
            echo "    ";
        }
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/Supply/Form:form_admin_fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  50 => 15,  45 => 13,  41 => 12,  38 => 11,  36 => 10,  33 => 9,  31 => 8,  26 => 7,  20 => 6,);
    }
}
