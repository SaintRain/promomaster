<?php

/* CoreOrderBundle:Order/Block:breadcrumbs.html.twig */
class __TwigTemplate_65d879e38028320134f3b67b28952e410e0558461dcaf196b0b780433d8e3528 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'order_breadcrumbs_block' => array($this, 'block_order_breadcrumbs_block'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 8
        echo "

";
        // line 10
        $this->displayBlock('order_breadcrumbs_block', $context, $blocks);
    }

    public function block_order_breadcrumbs_block($context, array $blocks = array())
    {
        // line 11
        echo "
    ";
        // line 12
        $context["r"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "_route"), "method");
        // line 13
        echo "
    <div id=\"order_steps\">
        <ul class=\"order_steps_items\">

            ";
        // line 17
        if (((isset($context["r"]) ? $context["r"] : null) == "core_order_cart")) {
            // line 18
            echo "                <li class=\"order_step_item current\">Ваши покупки</li>
            ";
        } else {
            // line 20
            echo "                <li class=\"order_step_item done\"><a href=\"";
            echo $this->env->getExtension('routing')->getPath("core_order_cart");
            echo "\">Ваши покупки</a></li>
            ";
        }
        // line 22
        echo "
            ";
        // line 23
        if (((isset($context["r"]) ? $context["r"] : null) == "core_order_cart_step2")) {
            // line 24
            echo "                <li class=\"order_step_item current\">Данные покупателя</li>
            ";
        } elseif ((        // line 25
(isset($context["r"]) ? $context["r"] : null) == "core_order_cart")) {
            // line 26
            echo "                <li class=\"order_step_item\">Данные покупателя</li>
            ";
        } else {
            // line 28
            echo "                <li class=\"order_step_item done\"><a href=\"";
            echo $this->env->getExtension('routing')->getPath("core_order_cart_step2");
            echo "\">Данные покупателя</a></li>
            ";
        }
        // line 30
        echo "
            ";
        // line 31
        if (((isset($context["r"]) ? $context["r"] : null) == "core_order_cart_step3")) {
            // line 32
            echo "                <li class=\"order_step_item current\">Доставка</li>
            ";
        } elseif (((        // line 33
(isset($context["r"]) ? $context["r"] : null) == "core_order_cart") || ((isset($context["r"]) ? $context["r"] : null) == "core_order_cart_step2"))) {
            // line 34
            echo "                <li class=\"order_step_item\">Доставка</li>
            ";
        } else {
            // line 36
            echo "                <li class=\"order_step_item done\"><a href=\"";
            echo $this->env->getExtension('routing')->getPath("core_order_cart_step3");
            echo "\">Доставка</a></li>
            ";
        }
        // line 38
        echo "
            ";
        // line 39
        if ((((isset($context["r"]) ? $context["r"] : null) == "core_order_cart_step3_5") || ((isset($context["r"]) ? $context["r"] : null) == "core_order_cart_step4"))) {
            // line 40
            echo "                <li class=\"order_step_item current last\">Оплата</li>
            ";
        } else {
            // line 42
            echo "                <li class=\"order_step_item last\">Оплата</li>
            ";
        }
        // line 44
        echo "
        </ul>
    </div>

";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Order/Block:breadcrumbs.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  109 => 44,  105 => 42,  101 => 40,  99 => 39,  96 => 38,  90 => 36,  86 => 34,  84 => 33,  81 => 32,  79 => 31,  76 => 30,  70 => 28,  66 => 26,  64 => 25,  61 => 24,  59 => 23,  56 => 22,  50 => 20,  46 => 18,  44 => 17,  38 => 13,  36 => 12,  33 => 11,  27 => 10,  23 => 8,  20 => 1,);
    }
}
