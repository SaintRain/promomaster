<?php

/* CoreCommonBundle:Fragments:userCart.html.twig */
class __TwigTemplate_20c3b4dfe225320448af087f698aa8c0c77df916b5290072e0326fc1392e18c7 extends Twig_Template
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
        $context["order"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "core_order"), "method");
        // line 2
        echo "<!--noindex-->
<div class=\"header_usercart\">
    <div class=\"header_usercart_pad\">
        <a rel=\"nofollow\" href=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("core_order_cart");
        echo "\" class=\"header_usercart_link\">
            <span class=\"header_usercart_count\">";
        // line 6
        if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "total_quantity", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "total_quantity", array()), "html", null, true);
        } else {
            echo "0";
        }
        echo "</span>
            <strong>Ваши покупки</strong>
        </a>
        <span class=\"header_usercart_info\" data-currency=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "\" data-empty-text=\"Корзина пуста\">";
        // line 10
        if (($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "total_quantity", array(), "any", true, true) && ($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "total_quantity", array()) > 0))) {
            // line 11
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "total_quantity", array(), "any", true, true)) {
                // line 12
                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "total_quantity", array()) . " ") . $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "total_quantity", array()), array(0 => "товар", 1 => "товара", 2 => "товаров"))), "html", null, true);
            }
            // line 14
            echo ", ";
            if ($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "total_cost", array(), "any", true, true)) {
                // line 15
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")), "total_cost", array())), "html", null, true);
            }
            // line 16
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        } else {
            // line 18
            echo "                Корзина пуста
            ";
        }
        // line 20
        echo "        </span>

    </div>
</div>
<!--/noindex-->";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Fragments:userCart.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 20,  60 => 18,  56 => 16,  53 => 15,  50 => 14,  47 => 12,  45 => 11,  43 => 10,  40 => 9,  30 => 6,  26 => 5,  21 => 2,  19 => 1,);
    }
}
