<?php

/* CoreOrderBundle:Admin/Form/Order/list_fields:weightAndVolume.html.twig */
class __TwigTemplate_239f1cd86cd80d2c6b878791f5e1ba8da5d86b378e55505a85992ec765035708 extends Twig_Template
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
        echo "     ";
        $context["weightVolumeInfo"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : $this->getContext($context, "ServiceContainer")), "get", array(0 => "core_order_logic"), "method"), "computeOrderWeightAndVolume", array(0 => (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object"))), "method");
        // line 4
        echo "    <div><b>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["weightVolumeInfo"]) ? $context["weightVolumeInfo"] : $this->getContext($context, "weightVolumeInfo")), "weight", array()), "html", null, true);
        echo " кг</b>&nbsp;/&nbsp;<b>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["weightVolumeInfo"]) ? $context["weightVolumeInfo"] : $this->getContext($context, "weightVolumeInfo")), "volume", array()), "html", null, true);
        echo " м3</b></div>
";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/Order/list_fields:weightAndVolume.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 4,  31 => 3,  28 => 2,);
    }
}
