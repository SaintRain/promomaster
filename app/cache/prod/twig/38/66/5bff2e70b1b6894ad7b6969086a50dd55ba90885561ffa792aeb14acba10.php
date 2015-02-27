<?php

/* CoreLogisticsBundle:Admin/UnitInStock/list_fields:product.html.twig */
class __TwigTemplate_38665bff2e70b1b6894ad7b6969086a50dd55ba90885561ffa792aeb14acba10 extends Twig_Template
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
        echo "<a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_product_commonproduct_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "product", array()), "id", array()))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "product", array()), "captionRu", array()), "html", null, true);
        echo " </>

";
    }

    public function getTemplateName()
    {
        return "CoreLogisticsBundle:Admin/UnitInStock/list_fields:product.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 3,  28 => 2,);
    }
}
