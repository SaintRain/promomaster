<?php

/* CoreTroubleTicketBundle:Admin/List:list_readiness.html.twig */
class __TwigTemplate_817e1e9ef9cc60f95a5f59b3634728cf74d4de353857c8fbeb8034a4d3d85892 extends Twig_Template
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
        echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "readiness", array()) . "%"), "html", null, true);
        echo "\">
            <span>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "readiness", array()), "html", null, true);
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
