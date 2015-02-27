<?php

/* CoreLogisticsBundle:Admin/SupplierPriceAnalysis/list:list_price_analysis_price.html.twig */
class __TwigTemplate_eec236adc1e11fe62ed84e6adad92a5eea7874398e8cd9ee92674e775d1e2670 extends Twig_Template
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

    // line 3
    public function block_field($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "priceFile", array(), "any", false, true), 0, array(), "array", false, true), "name", array(), "any", true, true)) {
            // line 5
            echo "       <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "priceFile", array()), 0, array(), "array"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "priceFile", array()), 0, array(), "array"), "name", array()), "html", null, true);
            echo "</a>
    ";
        }
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/SupplierPriceAnalysis/list:list_price_analysis_price.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
