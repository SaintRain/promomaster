<?php

/* ApplicationSonataUserBundle:Profile:left_menu.html.twig */
class __TwigTemplate_a21a783f257b793d7a30a2d1eb5ca8acd790e8cf0b9a265c663b2959a4be53c7 extends Twig_Template
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
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "sonata_user_profile_show")) {
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
        if ((((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_site_list_first_page") || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_site_list")) || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_site_edit")) || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_site_create"))) {
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
        if ((((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_adplace_list_first_page") || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_adplace_list")) || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_adplace_edit")) || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_adplace_create"))) {
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
        if ((((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_banner_list_first_page") || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_banner_list")) || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_banner_edit")) || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "core_cabinet_banner_create"))) {
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
        return array (  78 => 34,  73 => 33,  71 => 28,  65 => 25,  62 => 24,  59 => 23,  57 => 19,  50 => 15,  47 => 14,  44 => 13,  42 => 9,  35 => 5,  29 => 4,  26 => 3,  20 => 2,);
    }
}
