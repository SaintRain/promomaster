<?php

/* CoreOrderBundle:Admin/Form/PreOrder/list_fields:pre_order_create_order.html.twig */
class __TwigTemplate_14d873561b544a506afe9ed6e47fcf0152b90a6b0bddb83b208fac95549bd5d7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 2
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "order", array())) {
            // line 3
            echo "    <a target=\"_blank\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_order_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "order", array()), "id", array()))), "html", null, true);
            echo "\" class=\"btn view_link btn-small\">
        <i class=\"icon-zoom-in\"></i>
        <span>Посмотреть заказ</span>
    </a>
    ";
        } else {
            // line 8
            echo "    <a href=\"javascript:void(0);\" class=\"btn view_link btn-small create-order\" data-obj-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "html", null, true);
            echo "\">
        <i class=\"icon-plus-sign\"></i>
        <span>Создать заказ</span>
    </a>

";
        }
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/PreOrder/list_fields:pre_order_create_order.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 8,  24 => 3,  22 => 2,  19 => 1,);
    }
}
