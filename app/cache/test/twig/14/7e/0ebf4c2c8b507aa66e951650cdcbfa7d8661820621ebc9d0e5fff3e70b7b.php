<?php

/* CoreLogisticsBundle:Admin/Supply/list_fields:productsCount.html.twig */
class __TwigTemplate_147e0ebf4c2c8b507aa66e951650cdcbfa7d8661820621ebc9d0e5fff3e70b7b extends Twig_Template
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
        echo "<span class=\"label label-info\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "products", array()), "count", array()), "html", null, true);
        echo "</span>
";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/Supply/list_fields:productsCount.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 3,  28 => 2,);
    }
}
