<?php

/* CoreOrderBundle:Admin/Form/Order/list_fields:weightAndVolume.html.twig */
class __TwigTemplate_2316c3eedeb12c3ab889afeee44321ed197099f464aa091162e189068c04fbf4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

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
        $context["weightVolumeInfo"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => "core_order_logic"), "method"), "computeOrderWeightAndVolume", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method");
        // line 4
        echo "    <div><b>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["weightVolumeInfo"]) ? $context["weightVolumeInfo"] : null), "weight", array()), "html", null, true);
        echo " кг</b>&nbsp;/&nbsp;<b>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["weightVolumeInfo"]) ? $context["weightVolumeInfo"] : null), "volume", array()), "html", null, true);
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
        return array (  42 => 4,  39 => 3,  36 => 2,  11 => 1,);
    }
}
