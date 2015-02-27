<?php

/* CoreLogisticsBundle:Admin/Transit/list_fields:deliveryMethod.html.twig */
class __TwigTemplate_0e59b71d8ba5b1c0d00a120f33306b0c960b026f44ab95093d4425c384416b99 extends Twig_Template
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
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "deliveryMethod", array())) {
            // line 4
            echo "<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_delivery_service_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "deliveryMethod", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "deliveryMethod", array()), "captionRu", array()), "html", null, true);
            echo "</a>
";
        }
        // line 6
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "deliveryCost", array())) {
            // line 7
            echo " (";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "deliveryCost", array())), "html", null, true);
            echo " <small class=\"muted\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</small>)
 ";
        }
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/Transit/list_fields:deliveryMethod.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 7,  41 => 6,  33 => 4,  31 => 3,  28 => 2,);
    }
}
