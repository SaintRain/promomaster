<?php

/* CoreCommonBundle:Fragments:menuLeft.html.twig */
class __TwigTemplate_33f164b8819503ad78f7fca7ee0ba4cbcdf618b43202cdbe0dd0f81212b29c07 extends Twig_Template
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
        echo "<aside class=\"side_col\">
    <div class=\"side_col_pad\">
        <ul class=\"sidebar_menu\">
            ";
        // line 4
        $context["curRoute"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method");
        // line 5
        echo "            ";
        $context["isActive"] = false;
        // line 6
        echo "            ";
        if ((((((isset($context["curRoute"]) ? $context["curRoute"] : null) == "core_faq_homepage") || ((isset($context["curRoute"]) ? $context["curRoute"] : null) == "core_faq_search")) || ((isset($context["curRoute"]) ? $context["curRoute"] : null) == "core_faq_article")) || ((isset($context["curRoute"]) ? $context["curRoute"] : null) == "core_faq_category"))) {
            // line 7
            echo "                ";
            $context["isActive"] = true;
            // line 8
            echo "            ";
        }
        // line 9
        echo "                <li class=\"sidebar_menu_item";
        if ((isset($context["isActive"]) ? $context["isActive"] : null)) {
            echo " active";
        }
        echo "\"><a href=\"";
        echo $this->env->getExtension('routing')->getPath("core_faq_homepage");
        echo "\" class=\"sidebar_menu_link\">Помощь</a></li>
            
            ";
        // line 11
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_common_about")) {
            // line 12
            echo "                <li class=\"sidebar_menu_item active\"><span class=\"sidebar_menu_link\">О магазине</span></li>
                ";
        } else {
            // line 14
            echo "                <li class=\"sidebar_menu_item\"><a href=\"";
            echo $this->env->getExtension('routing')->getPath("core_common_about");
            echo "\" class=\"sidebar_menu_link\">О магазине</a></li>
                ";
        }
        // line 16
        echo "

            ";
        // line 18
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "trouble_ticket_contact")) {
            // line 19
            echo "                <li class=\"sidebar_menu_item active\"><span class=\"sidebar_menu_link\">Контактная информация</span></li>
                ";
        } else {
            // line 21
            echo "                <li class=\"sidebar_menu_item\"><a href=\"";
            echo $this->env->getExtension('routing')->getPath("trouble_ticket_contact");
            echo "\" class=\"sidebar_menu_link\">Контактная информация</a></li>
                ";
        }
        // line 23
        echo "
            ";
        // line 24
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_common_privacy_policies")) {
            // line 25
            echo "                <li class=\"sidebar_menu_item active\"><span class=\"sidebar_menu_link\">Политика конфиденциальности</span></li>
                ";
        } else {
            // line 27
            echo "                <li class=\"sidebar_menu_item\"><a href=\"";
            echo $this->env->getExtension('routing')->getPath("core_common_privacy_policies");
            echo "\" class=\"sidebar_menu_link\">Политика конфиденциальности</a></li>
                ";
        }
        // line 29
        echo "            ";
        // line 32
        echo "        </ul>
    </div>
</aside>";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Fragments:menuLeft.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 32,  91 => 29,  85 => 27,  81 => 25,  79 => 24,  76 => 23,  70 => 21,  66 => 19,  64 => 18,  60 => 16,  54 => 14,  50 => 12,  48 => 11,  38 => 9,  35 => 8,  32 => 7,  29 => 6,  26 => 5,  24 => 4,  19 => 1,);
    }
}
