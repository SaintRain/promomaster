<?php

/* CoreOrderBundle:Admin/Form/PreOrder/list_fields:pre_order_fio.html.twig */
class __TwigTemplate_c6e2c3cbf223ef23b4308acf2125194c81b5fc8eeb532a2044c872334dfe5732 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "lastName", array()), "html", null, true);
        echo "
    ";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "firstName", array()), "html", null, true);
        echo "
    ";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "surName", array()), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/PreOrder/list_fields:pre_order_fio.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 6,  36 => 5,  31 => 4,  28 => 3,);
    }
}
