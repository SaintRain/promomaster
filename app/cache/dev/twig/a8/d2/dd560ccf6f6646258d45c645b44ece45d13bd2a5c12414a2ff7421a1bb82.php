<?php

/* ApplicationSonataUserBundle:Admin/List:list_orders_info.html.twig */
class __TwigTemplate_a8d2dd560ccf6f6646258d45c645b44ece45d13bd2a5c12414a2ff7421a1bb82 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

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
        return array (  54 => 7,  50 => 6,  42 => 4,  39 => 3,  36 => 2,  11 => 1,);
    }
}
