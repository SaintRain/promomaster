<?php

/* CoreLogisticsBundle:Admin/Seller/list_fields:positionOfTheHead.html.twig */
class __TwigTemplate_035ee0852197c238ea6a569e472048c1ced3a5da300db2848c71e185364f9824 extends Twig_Template
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
        echo "<strong>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "positionOfTheHead", array()), "html", null, true);
        echo "</strong><br>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "nameOfTheHead", array()), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/Seller/list_fields:positionOfTheHead.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 3,  36 => 2,  11 => 1,);
    }
}
