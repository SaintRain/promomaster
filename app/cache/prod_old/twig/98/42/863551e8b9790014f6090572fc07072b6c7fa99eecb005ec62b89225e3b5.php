<?php

/* CoreLogisticsBundle:Admin/Bank/list_fields:bick_swift.html.twig */
class __TwigTemplate_9842863551e8b9790014f6090572fc07072b6c7fa99eecb005ec62b89225e3b5 extends Twig_Template
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

    // line 3
    public function block_field($context, array $blocks = array())
    {
        // line 4
        echo "<b>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "bic", array()), "html", null, true);
        echo "</b><br>
<span class=\"muted\">—</span>
<br>
<b>";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "swift", array()), "html", null, true);
        echo "</b>
";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/Bank/list_fields:bick_swift.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 7,  31 => 4,  28 => 3,);
    }
}
