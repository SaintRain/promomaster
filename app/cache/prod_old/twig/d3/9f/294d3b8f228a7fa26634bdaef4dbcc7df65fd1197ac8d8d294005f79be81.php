<?php

/* ApplicationSonataUserBundle:Admin/List:list_orders_info.html.twig */
class __TwigTemplate_d39f294d3b8f228a7fa26634bdaef4dbcc7df65fd1197ac8d8d294005f79be81 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:CRUD:base_list_field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_field($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "orders", array()))) {
            // line 4
            echo "        <a target=\"blank\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_order_list", array("filter[contragent__user__email][value]" => $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->transchoice("orderCount", twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "orders", array()))), "html", null, true);
            echo "</a>
        ";
        } else {
            // line 6
            echo "            <div class=\"label\">Заказов нет</div>
    ";
        }
        // line 7
        echo "    
";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Admin/List:list_orders_info.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 7,  42 => 6,  34 => 4,  31 => 3,  28 => 2,);
    }
}
