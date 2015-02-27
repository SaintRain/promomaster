<?php

/* CoreOrderBundle:Admin/Form/Order/list_fields:status.html.twig */
class __TwigTemplate_e309d56775c6c7950e7993823217b6f7fcfe35d8be380a0b6d7267680a072194 extends Twig_Template
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
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "isCheckedStatus", array())) {
            // line 5
            echo "<span class=\"label label-default\">Проверен</span>
";
        }
        // line 7
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "isPaidStatus", array())) {
            // line 8
            echo "<span class=\"label label-info\">Оплачен</span>
";
        }
        // line 10
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "isShippedStatus", array())) {
            // line 11
            echo "<span class=\"label label-success\">Отгружен</span>
";
        }
        // line 13
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "isCanceledStatus", array())) {
            // line 14
            echo "<span class=\"label label-important\">Отменён</span>
";
        }
        // line 16
        echo "
";
        // line 17
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "extraStatus", array())) {
            echo "<br><span style=\"color:#";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "extraStatus", array()), "hex", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "extraStatus", array()), "captionRu", array()), "html", null, true);
            echo "</span>";
        }
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/Order/list_fields:status.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 17,  58 => 16,  54 => 14,  52 => 13,  48 => 11,  46 => 10,  42 => 8,  40 => 7,  36 => 5,  34 => 4,  31 => 3,  28 => 2,);
    }
}
