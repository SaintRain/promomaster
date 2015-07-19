<?php

/* ApplicationSonataUserBundle:Profile:left_menu.html.twig */
class __TwigTemplate_7f8ec8f12eb7241b1a35e338f957f6dfa4b74953f2f8f27ad7d8625df314a4e7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'left_menu' => array($this, 'block_left_menu'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $this->displayBlock('left_menu', $context, $blocks);
    }

    public function block_left_menu($context, array $blocks = array())
    {
        // line 3
        echo "    <ul class=\"list-group sidebar-nav-v1 margin-bottom-40\" id=\"sidebar-nav-1\">
        <li class=\"list-group-item";
        // line 4
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "sonata_user_profile_show")) {
            echo " active";
        }
        echo " \">
            <a href=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("sonata_user_profile_show");
        echo "\"><i class=\"fa fa-user\"></i> &nbsp;Профиль</a>
        </li>

        <li class=\"list-group-item
        ";
        // line 9
        if ((((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_site_list_first_page") || ($this->getAttribute($this->getAttribute($this->getAttribute(        // line 10
(isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_site_list")) || ($this->getAttribute($this->getAttribute($this->getAttribute(        // line 11
(isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_site_edit")) || ($this->getAttribute($this->getAttribute($this->getAttribute(        // line 12
(isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_site_create"))) {
            // line 13
            echo " active";
        }
        // line 14
        echo "        \">
            <a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("core_cabinet_site_list_first_page");
        echo "\"><i class=\"fa  fa-globe\"></i> &nbsp;Сайты</a>
        </li>

        <li class=\"list-group-item
        ";
        // line 19
        if ((((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_adplace_list_first_page") || ($this->getAttribute($this->getAttribute($this->getAttribute(        // line 20
(isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_adplace_list")) || ($this->getAttribute($this->getAttribute($this->getAttribute(        // line 21
(isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_adplace_edit")) || ($this->getAttribute($this->getAttribute($this->getAttribute(        // line 22
(isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_adplace_create"))) {
            // line 23
            echo " active";
        }
        // line 24
        echo "        \">
            <a href=\"";
        // line 25
        echo $this->env->getExtension('routing')->getPath("core_cabinet_adplace_list_first_page");
        echo "\"><i class=\"fa  fa-desktop   \"></i> &nbsp;Рекламные места</a>
        </li>

        <li  class=\"list-group-item ";
        // line 28
        if ((((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_banner_list_first_page") || ($this->getAttribute($this->getAttribute($this->getAttribute(        // line 29
(isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_banner_list")) || ($this->getAttribute($this->getAttribute($this->getAttribute(        // line 30
(isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_banner_edit")) || ($this->getAttribute($this->getAttribute($this->getAttribute(        // line 31
(isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_banner_create"))) {
            // line 33
            echo " active";
        }
        echo "\">
            <a href=\"";
        // line 34
        echo $this->env->getExtension('routing')->getPath("core_cabinet_banner_list_first_page");
        echo "\"><i class=\"fa fa-file-image-o\"></i> &nbsp;Баннеры</a>
        </li>

        <li class=\"list-group-item\">
            <a href=\"\"><i class=\"fa fa-bullhorn\"></i> &nbsp;Рекламные компании</a>
        </li>

        <li class=\"list-group-item\">
            <a href=\"profile_users.html\"><i class=\"fa fa-crosshairs\"></i> &nbsp;Размещения</a>
        </li>


        <li class=\"list-group-item\">
            <a href=\"profile.html\"><i class=\"fa fa-bar-chart-o\"></i> &nbsp;Статистика</a>
        </li>

        <li class=\"list-group-item\">
            <a href=\"profile_settings.html\"><i class=\"fa fa-sign-out\"></i> &nbsp;Выйти</a>
        </li>
    </ul>
";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Profile:left_menu.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  87 => 34,  82 => 33,  80 => 31,  79 => 30,  78 => 29,  77 => 28,  71 => 25,  68 => 24,  65 => 23,  63 => 22,  62 => 21,  61 => 20,  60 => 19,  53 => 15,  50 => 14,  47 => 13,  45 => 12,  44 => 11,  43 => 10,  42 => 9,  35 => 5,  29 => 4,  26 => 3,  20 => 2,);
    }
}
