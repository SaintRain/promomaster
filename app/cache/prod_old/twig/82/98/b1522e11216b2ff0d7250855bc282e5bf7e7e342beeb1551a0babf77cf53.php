<?php

/* CorePaymentBundle:Admin/List:list_id.html.twig */
class __TwigTemplate_8298b1522e11216b2ff0d7250855bc282e5bf7e7e342beeb1551a0babf77cf53 extends Twig_Template
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

    // line 11
    public function block_field($context, array $blocks = array())
    {
        // line 12
        echo "
    <a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_payment_payment_edit", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array()))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array())), "html", null, true);
        echo "</a>

";
    }

    public function getTemplateName()
    {
        return "CorePaymentBundle:Admin/List:list_id.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 13,  31 => 12,  28 => 11,);
    }
}
