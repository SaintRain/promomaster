<?php

/* CoreOrderBundle:Admin/Form/ExtraStatus/list_fields:generalStatus.html.twig */
class __TwigTemplate_1b09a4122be3cb6203f38d934dc34cdb27626fac19abdb8be225d4a86d40a650 extends Twig_Template
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
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "generalStatus", array()) == twig_constant("Core\\OrderBundle\\Entity\\ExtraStatus::checkedStatusCode"))) {
            // line 5
            echo "        <span class=\"label label-default\">Проверен</span>
    ";
        }
        // line 7
        echo "    ";
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "generalStatus", array()) == twig_constant("Core\\OrderBundle\\Entity\\ExtraStatus::paidStatusCode"))) {
            // line 8
            echo "        <span class=\"label label-info\">Оплачен</span>
    ";
        }
        // line 10
        echo "    ";
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "generalStatus", array()) == twig_constant("Core\\OrderBundle\\Entity\\ExtraStatus::shippedStatusCode"))) {
            // line 11
            echo "        <span class=\"label label-success\">Отгружен</span>
    ";
        }
        // line 13
        echo "    ";
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "generalStatus", array()) == twig_constant("Core\\OrderBundle\\Entity\\ExtraStatus::canceledStatusCode"))) {
            // line 14
            echo "        <span class=\"label label-important\">Отменён</span>
    ";
        }
        // line 16
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/ExtraStatus/list_fields:generalStatus.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 16,  57 => 14,  54 => 13,  50 => 11,  47 => 10,  43 => 8,  40 => 7,  36 => 5,  34 => 4,  31 => 3,  28 => 2,);
    }
}
