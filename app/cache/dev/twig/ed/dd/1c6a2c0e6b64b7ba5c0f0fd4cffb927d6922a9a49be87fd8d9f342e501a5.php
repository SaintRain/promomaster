<?php

/* CoreLogisticsBundle:Admin/Supply/list_fields:isCreatedForOrderOnly.html.twig */
class __TwigTemplate_eddd1c6a2c0e6b64b7ba5c0f0fd4cffb927d6922a9a49be87fd8d9f342e501a5 extends Twig_Template
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
        return array (  66 => 13,  62 => 11,  59 => 10,  55 => 8,  47 => 6,  44 => 5,  42 => 4,  39 => 3,  36 => 2,  11 => 1,);
    }
}
