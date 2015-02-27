<?php

/* CoreStatisticsBundle:Admin/Form/list_fields:deliverymethod.html.twig */
class __TwigTemplate_7d6d269141c0090d771f1fa5a043d84a482c0e3909a39db5322a429b90ea11f1 extends Twig_Template
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
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "deliveryMethod", array())) {
            // line 5
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_delivery_service_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "deliveryMethod", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "deliveryMethod", array()), "captionRu", array()), "html", null, true);
            echo "</a>
    ";
        } else {
            // line 7
            echo "        <span class=\"label label-important\">нет</span>
    ";
        }
    }

    public function getTemplateName()
    {
        return "CoreStatisticsBundle:Admin/Form/list_fields:deliverymethod.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
