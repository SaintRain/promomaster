<?php

/* CoreTroubleTicketBundle:Admin/List:list_readiness.html.twig */
class __TwigTemplate_0ed56c57b19504181cafe667f0f2f2346058026bc341d13d0bc99fff5f138b3a extends Twig_Template
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
        echo "    <div class=\"progress progress-info\">
        <div class=\"bar\" style=\"width: ";
        // line 5
        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "readiness", array()) . "%"), "html", null, true);
        echo "\">
            <span>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "readiness", array()), "html", null, true);
        echo "&percnt;</span>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle:Admin/List:list_readiness.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
