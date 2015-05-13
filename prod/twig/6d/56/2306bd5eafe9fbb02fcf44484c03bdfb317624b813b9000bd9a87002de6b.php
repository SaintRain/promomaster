<?php

/* CoreCommonBundle:Fragments:header2.html.twig */
class __TwigTemplate_6d562306bd5eafe9fbb02fcf44484c03bdfb317624b813b9000bd9a87002de6b extends Twig_Template
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
        echo "<!--=== Header ===-->
<div class=\"header\">
    <!-- Topbar -->
    <div class=\"topbar\">
        <div class=\"container\">

            <!-- Topbar Navigation -->
            <ul class=\"loginbar pull-right\">
                <li><a href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("core_faq_homepage");
        echo "\">Помощь</a></li>
                <li class=\"topbar-devider\"></li>

                ";
        // line 12
        if ( !$this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
            // line 13
            echo "                <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
            echo "\">Авторизация</a></li>
                ";
        } else {
            // line 15
            echo "
                <li><a href=\"";
            // line 16
            echo $this->env->getExtension('routing')->getPath("sonata_user_profile_show");
            echo "\"><i class=\"fa fa-user\"></i>&nbsp;<strong>";
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "firstname", array()) || $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "lastname", array()))) {
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "lastname", array()) . " ") . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "firstname", array())), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "username", array()), "html", null, true);
            }
            echo "</strong></a></li>
                    <li class=\"topbar-devider\"></li>
                    <li><a href=\"";
            // line 18
            echo $this->env->getExtension('routing')->getPath("_logout");
            echo "\">Выйти</a></li>

                ";
        }
        // line 21
        echo "            </ul>
            <!-- End Topbar Navigation -->
        </div>
    </div>
    <!-- End Topbar -->

    <!-- Navbar -->
    <div class=\"navbar navbar-default mega-menu\" role=\"navigation\">
        <div class=\"container\">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-responsive-collapse\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"fa fa-bars\"></span>
                </button>
                <a class=\"navbar-brand\" href=\"";
        // line 36
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">
                    <img id=\"logo-header\" src=\"/assets/img/logo1-default.png\" alt=\"Logo\">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class=\"collapse navbar-collapse navbar-responsive-collapse\">
                <ul class=\"nav navbar-nav\">
                    <!-- Home -->
                    <li class=\" active\">
                        <a href=\"";
        // line 46
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\" >
                            На главную
                        </a>
                    </li>
                    <!-- End Home -->


                    <li class=\" \">
                        <a href=\"";
        // line 54
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\" >
                            Площадкам
                        </a>
                    </li>

                    <li class=\" \">
                        <a href=\"";
        // line 60
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\" >
                            Агенствам
                        </a>
                    </li>

                    <li class=\" \">
                        <a href=\"";
        // line 66
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\" >
                            Рекламодателям
                        </a>
                    </li>

                    <li class=\" \">
                        <a href=\"";
        // line 72
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\" >
                            О нас
                        </a>
                    </li>


                    <!-- Search Block -->
                    <li>
                        <i class=\"search fa fa-search search-btn\"></i>
                        <div class=\"search-open\">
                            <div class=\"input-group animated fadeInDown\">
                                <input type=\"text\" class=\"form-control\" placeholder=\"Искать\">
                                    <span class=\"input-group-btn\">
                                        <button class=\"btn-u\" type=\"button\">Найти</button>
                                    </span>
                            </div>
                        </div>
                    </li>
                    <!-- End Search Block -->
                </ul>
            </div><!--/navbar-collapse-->
        </div>
    </div>
    <!-- End Navbar -->
</div>
<!--=== End Header ===-->";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Fragments:header2.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 72,  122 => 66,  113 => 60,  104 => 54,  93 => 46,  80 => 36,  63 => 21,  57 => 18,  46 => 16,  43 => 15,  37 => 13,  35 => 12,  29 => 9,  19 => 1,);
    }
}
