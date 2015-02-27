<?php

/* CoreConfigBundle:Admin/Form/list_fields:caption.html.twig */
class __TwigTemplate_f61260f989a926291b1fcc74693b1ed6785ec2f2c771db7a5cf70c279d78c98f extends Twig_Template
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
        if ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "group", array(), "any", false, true), "caption", array(), "any", true, true)) {
            // line 5
            echo "        <div class=\"label label-default\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "group", array()), "caption", array()), "html", null, true);
            echo "</div>
    ";
        }
        // line 7
        echo "    <div style=\"width:250px\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_config_config_edit", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array()))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "caption", array()), "html", null, true);
        echo "</a></div>
";
    }

    public function getTemplateName()
    {
        return "CoreConfigBundle:Admin/Form/list_fields:caption.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 7,  34 => 5,  31 => 4,  28 => 3,);
    }
}
