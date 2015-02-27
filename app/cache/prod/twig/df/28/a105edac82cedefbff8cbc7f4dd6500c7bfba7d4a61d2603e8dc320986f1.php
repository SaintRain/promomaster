<?php

/* CoreConfigBundle:Admin/Form/list_fields:name.html.twig */
class __TwigTemplate_df28a105edac82cedefbff8cbc7f4dd6500c7bfba7d4a61d2603e8dc320986f1 extends Twig_Template
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
        echo "   <div style=\"width:200px\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "name", array()), "html", null, true);
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "CoreConfigBundle:Admin/Form/list_fields:name.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,);
    }
}
