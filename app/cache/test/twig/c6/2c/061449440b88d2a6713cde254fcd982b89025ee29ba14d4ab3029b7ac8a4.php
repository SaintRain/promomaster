<?php

/* CoreOrderBundle:Admin/Form/PreOrder/list_fields:pre_order_create_order.html.twig */
class __TwigTemplate_c62c061449440b88d2a6713cde254fcd982b89025ee29ba14d4ab3029b7ac8a4 extends Twig_Template
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
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "order", array())) {
            // line 3
            echo "    <a target=\"_blank\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_order_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "order", array()), "id", array()))), "html", null, true);
            echo "\" class=\"btn view_link btn-small\">
        <i class=\"icon-zoom-in\"></i>
        <span>Посмотреть заказ</span>
    </a>
    ";
        } else {
            // line 8
            echo "    <a href=\"javascript:void(0);\" class=\"btn view_link btn-small create-order\" data-obj-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array()), "html", null, true);
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
