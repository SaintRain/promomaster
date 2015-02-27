<?php

/* CoreConfigBundle:Admin/Form/list_fields:type.html.twig */
class __TwigTemplate_330c65e6e6a038623139d90e327b141467533391da0ecd971225b3cbc4cf5c98 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(("label.type." . $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "type", array()))), "html", null, true);
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
