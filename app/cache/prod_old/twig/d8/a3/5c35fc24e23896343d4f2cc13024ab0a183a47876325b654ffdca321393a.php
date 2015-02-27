<?php

/* CoreLogisticsBundle:Admin/Supply/list_fields:isCreatedForOrderOnly.html.twig */
class __TwigTemplate_d8a35c35fc24e23896343d4f2cc13024ab0a183a47876325b654ffdca321393a extends Twig_Template
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
        echo "
    ";
        // line 4
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "isCreatedForOrderOnly", array())) {
            // line 5
            echo "        ";
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "order", array())) {
                // line 6
                echo "        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_order_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "order", array()), "id", array()))), "html", null, true);
                echo "\">заказ #";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "order", array()), "id", array()), "html", null, true);
                echo "</a>
            ";
            } else {
                // line 8
                echo "                <span class=\"label label-success\">Да</span>
            ";
            }
            // line 10
            echo "        ";
        } else {
            // line 11
            echo "            <span class=\"label label-success\">нет</span>
            ";
        }
        // line 13
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/Supply/list_fields:isCreatedForOrderOnly.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 13,  54 => 11,  51 => 10,  47 => 8,  39 => 6,  36 => 5,  34 => 4,  31 => 3,  28 => 2,);
    }
}
