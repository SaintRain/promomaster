<?php

/* CoreConfigBundle:Admin/Form/list_fields:type.html.twig */
class __TwigTemplate_2de476841e358b943a4ff726058d81612bdb37c9ea7c60d158685cc0520dbfbe extends Twig_Template
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
        echo "    ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(("label.type." . $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "type", array()))), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreConfigBundle:Admin/Form/list_fields:type.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,);
    }
}
