<?php

/* CoreOrderBundle:Admin/Form/Order/list_fields:status.html.twig */
class __TwigTemplate_1945d5931bf680faa243e12f9201304e89d3969fbc6e6b9b2c3d331e3fc78dbe extends Twig_Template
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
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "isCheckedStatus", array())) {
            // line 5
            echo "<span class=\"label label-default\">Проверен</span>
";
        }
        // line 7
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "isPaidStatus", array())) {
            // line 8
            echo "<span class=\"label label-info\">Оплачен</span>
";
        }
        // line 10
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "isShippedStatus", array())) {
            // line 11
            echo "<span class=\"label label-success\">Отгружен</span>
";
        }
        // line 13
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "isCanceledStatus", array())) {
            // line 14
            echo "<span class=\"label label-important\">Отменён</span>
";
        }
        // line 16
        echo "
";
        // line 17
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "extraStatus", array())) {
            echo "<br><span style=\"color:#";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "extraStatus", array()), "hex", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "extraStatus", array()), "captionRu", array()), "html", null, true);
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
