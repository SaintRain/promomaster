<?php

/* CoreOrderBundle:Admin/Form/Order/list_fields:status.html.twig */
class __TwigTemplate_4bf5ca0a4aa8ef772fb228d028b7726f869606f8ea1fcda4ab94bf25f3f19ebf extends Twig_Template
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
        return array (  69 => 17,  66 => 16,  62 => 14,  60 => 13,  56 => 11,  54 => 10,  50 => 8,  48 => 7,  44 => 5,  42 => 4,  39 => 3,  36 => 2,  11 => 1,);
    }
}
