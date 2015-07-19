<?php

/* CoreOrderBundle:Admin/Form/ExtraStatus/list_fields:generalStatus.html.twig */
class __TwigTemplate_439800a7fc98a462c5c6785e318e8ea60fbed434ea4af7255346f8dae23add56 extends Twig_Template
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
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "generalStatus", array()) == twig_constant("Core\\OrderBundle\\Entity\\ExtraStatus::checkedStatusCode"))) {
            // line 5
            echo "        <span class=\"label label-default\">Проверен</span>
    ";
        }
        // line 7
        echo "    ";
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "generalStatus", array()) == twig_constant("Core\\OrderBundle\\Entity\\ExtraStatus::paidStatusCode"))) {
            // line 8
            echo "        <span class=\"label label-info\">Оплачен</span>
    ";
        }
        // line 10
        echo "    ";
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "generalStatus", array()) == twig_constant("Core\\OrderBundle\\Entity\\ExtraStatus::shippedStatusCode"))) {
            // line 11
            echo "        <span class=\"label label-success\">Отгружен</span>
    ";
        }
        // line 13
        echo "    ";
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "generalStatus", array()) == twig_constant("Core\\OrderBundle\\Entity\\ExtraStatus::canceledStatusCode"))) {
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
        return array (  69 => 16,  65 => 14,  62 => 13,  58 => 11,  55 => 10,  51 => 8,  48 => 7,  44 => 5,  42 => 4,  39 => 3,  36 => 2,  11 => 1,);
    }
}
