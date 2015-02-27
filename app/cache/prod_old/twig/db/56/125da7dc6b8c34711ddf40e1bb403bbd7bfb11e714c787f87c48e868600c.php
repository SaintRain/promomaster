<?php

/* CoreDeliveryBundle:Admin/List:list_buyer_type.html.twig */
class __TwigTemplate_db56125da7dc6b8c34711ddf40e1bb403bbd7bfb11e714c787f87c48e868600c extends Twig_Template
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
        if (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "buyerType", array()) == "IndiContragent")) {
            // line 5
            echo "        <span class=\"label label-info\">Физическое лицо</span>
        ";
        } elseif (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "buyerType", array()) == "LegalContragent")) {
            // line 7
            echo "            <span class=\"label label-info\">Юридическое лицо</span>
            ";
        } else {
            // line 9
            echo "        <span class=\"label label-default\">Не указано</span>
    ";
        }
    }

    public function getTemplateName()
    {
        return "CoreDeliveryBundle:Admin/List:list_buyer_type.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 9,  38 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
