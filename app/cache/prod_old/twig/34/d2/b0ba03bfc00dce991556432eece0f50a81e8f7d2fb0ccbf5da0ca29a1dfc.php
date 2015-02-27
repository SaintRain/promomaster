<?php

/* CoreStatisticsBundle:Admin/Crud:default.html.twig */
class __TwigTemplate_34d2b0ba03bfc00dce991556432eece0f50a81e8f7d2fb0ccbf5da0ca29a1dfc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'content' => array($this, 'block_content'),
            'statisticsContent' => array($this, 'block_statisticsContent'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate((isset($context["base_template"]) ? $context["base_template"] : $this->getContext($context, "base_template")));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("title_dashboard", array(), "SonataAdminBundle"), "html", null, true);
    }

    // line 4
    public function block_breadcrumb($context, array $blocks = array())
    {
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        echo call_user_func_array($this->env->getFunction('sonata_block_render_event')->getCallable(), array("sonata.admin.dashboard.top", array("admin_pool" => (isset($context["admin_pool"]) ? $context["admin_pool"] : $this->getContext($context, "admin_pool")))));
        echo "

    <div class=\"row-fluid\">
        <div class=\"span6\">
            <ul class=\"breadcrumb\">
                <li>
                    <a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getUrl("sonata_admin_dashboard");
        echo "\">⌂</a>
                    <span class=\"divider\">/</span>
                </li>
                <li class=\"active\">Статистика</li>
            </ul>
        </div>
    </div>

    ";
        // line 20
        $context["_route"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method");
        echo "        
        <div class=\"row-fluid\">

            <ul class=\"nav nav-tabs\">
                <li class=\"";
        // line 24
        if (((isset($context["_route"]) ? $context["_route"] : $this->getContext($context, "_route")) == "admin_core_statistics_statistics_list")) {
            echo " active";
        }
        echo " first\">
                    <a href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "generateUrl", array(0 => "list"), "method"), "html", null, true);
        echo "\">По складу</a>
                </li>
                <li class=\"";
        // line 27
        if (((isset($context["_route"]) ? $context["_route"] : $this->getContext($context, "_route")) == "admin_core_statistics_statistics_deficitProductStatistics")) {
            echo " active";
        }
        echo " last\">
                    <a href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "generateUrl", array(0 => "deficitProductStatistics"), "method"), "html", null, true);
        echo "\">Заканчивающиеся товары</a>
                </li>
                <li class=\"";
        // line 30
        if (((isset($context["_route"]) ? $context["_route"] : $this->getContext($context, "_route")) == "admin_core_statistics_statistics_inventoryStatistics")) {
            echo " active";
        }
        echo " last\">
                    <a href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "generateUrl", array(0 => "inventoryStatistics"), "method"), "html", null, true);
        echo "\">Инвенторизация</a>
                </li>
            <li class=\"";
        // line 33
        if (((isset($context["_route"]) ? $context["_route"] : $this->getContext($context, "_route")) == "admin_core_statistics_statistics_virtualUnitsStatistics")) {
            echo " active";
        }
        echo " last\">
                    <a href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "generateUrl", array(0 => "virtualUnitsStatistics"), "method"), "html", null, true);
        echo "\">Виртуальные товары</a>
                </li>
            </ul>

            <div class=\"content  span10\">
                ";
        // line 39
        $this->displayBlock('statisticsContent', $context, $blocks);
        // line 41
        echo "            </div>
        </div>

        ";
        // line 44
        echo call_user_func_array($this->env->getFunction('sonata_block_render_event')->getCallable(), array("sonata.admin.dashboard.bottom", array("admin_pool" => (isset($context["admin_pool"]) ? $context["admin_pool"] : $this->getContext($context, "admin_pool")))));
        echo "

        ";
    }

    // line 39
    public function block_statisticsContent($context, array $blocks = array())
    {
        // line 40
        echo "                ";
    }

    public function getTemplateName()
    {
        return "CoreStatisticsBundle:Admin/Crud:default.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 40,  132 => 39,  125 => 44,  120 => 41,  118 => 39,  110 => 34,  104 => 33,  99 => 31,  93 => 30,  88 => 28,  82 => 27,  77 => 25,  71 => 24,  64 => 20,  53 => 12,  43 => 6,  40 => 5,  35 => 4,  29 => 3,);
    }
}
