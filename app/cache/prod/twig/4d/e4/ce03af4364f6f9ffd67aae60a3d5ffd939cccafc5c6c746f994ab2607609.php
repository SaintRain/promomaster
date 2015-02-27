<?php

/* CoreOrderBundle:Admin/Form/Order/list_fields:seriyniki.html.twig */
class __TwigTemplate_4de4ce03af4364f6f9ffd67aae60a3d5ffd939cccafc5c6c746f994ab2607609 extends Twig_Template
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
        echo "<span class=\"label ";
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "totalNeedSeriesQuantity", array()) == $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "totalHaveSeriesQuantity", array()))) {
            echo "label-info";
        } else {
            echo "label-important";
        }
        echo "\">
";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "totalHaveSeriesQuantity", array()), "html", null, true);
        echo " из ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "totalNeedSeriesQuantity", array()), "html", null, true);
        echo "</span>
";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/Order/list_fields:seriyniki.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 4,  31 => 3,  28 => 2,);
    }
}
