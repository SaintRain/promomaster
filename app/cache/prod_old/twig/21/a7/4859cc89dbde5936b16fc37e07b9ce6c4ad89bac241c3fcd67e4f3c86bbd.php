<?php

/* CoreOrderBundle:Admin/Form/Order/list_fields:seriyniki.html.twig */
class __TwigTemplate_21a74859cc89dbde5936b16fc37e07b9ce6c4ad89bac241c3fcd67e4f3c86bbd extends Twig_Template
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
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "totalNeedSeriesQuantity", array()) == $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "totalHaveSeriesQuantity", array()))) {
            echo "label-info";
        } else {
            echo "label-important";
        }
        echo "\">
";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "totalHaveSeriesQuantity", array()), "html", null, true);
        echo " из ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "totalNeedSeriesQuantity", array()), "html", null, true);
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
