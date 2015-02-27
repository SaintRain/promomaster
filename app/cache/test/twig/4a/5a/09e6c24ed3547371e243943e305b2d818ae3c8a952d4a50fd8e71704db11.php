<?php

/* CoreLogisticsBundle:Admin/Supplier/list_fields:regionsCityList.html.twig */
class __TwigTemplate_4a5a09e6c24ed3547371e243943e305b2d818ae3c8a952d4a50fd8e71704db11 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "country", array()), "captionRu", array()), "html", null, true);
        echo "&nbsp;/&nbsp;";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "city", array()), "html", null, true);
        echo "
<br><small><b>Юр.:</b> ";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "addressUr", array()), "html", null, true);
        echo "</small><br><small><b>Почт.:</b> ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "addressPost", array()), "html", null, true);
        echo "</small>
";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/Supplier/list_fields:regionsCityList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 4,  31 => 3,  28 => 2,);
    }
}
