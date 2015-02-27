<?php

/* CoreColorBundle:Admin/List:list_color_preview.html.twig */
class __TwigTemplate_2f05ff7ca02c9194e451cbd26fa35a9cf28528810e45e3ec3eed50a6edc3f938 extends Twig_Template
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
        echo "
    ";
        // line 5
        if (((isset($context["value"]) ? $context["value"] : null) != "null")) {
            // line 6
            echo "        <div style=\"width:18px;height:18px;float:left;border:solid 1px #ddd;background-color: ";
            echo twig_escape_filter($this->env, ("#" . (isset($context["value"]) ? $context["value"] : null)), "html", null, true);
            echo "\"></div>&nbsp;";
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true);
            echo "
    ";
        } else {
            // line 8
            echo "        <div style=\"width:18px;height:18px;float:left;border:solid 1px #ddd;background: url(";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corecolor/img/varicolored.png"), "html", null, true);
            echo ") 50%\"></div>
    ";
        }
        // line 10
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreColorBundle:Admin/List:list_color_preview.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 10,  44 => 8,  36 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
