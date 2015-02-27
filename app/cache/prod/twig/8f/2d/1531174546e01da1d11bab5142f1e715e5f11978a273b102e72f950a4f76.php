<?php

/* CoreOrderBundle:Admin/Form/ExtraStatus/list_fields:color_preview.html.twig */
class __TwigTemplate_8f2d1531174546e01da1d11bab5142f1e715e5f11978a273b102e72f950a4f76 extends Twig_Template
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
        if ((isset($context["value"]) ? $context["value"] : null)) {
            // line 6
            echo "        <div style=\"width:18px;height:18px;float:left;border:solid 1px #ddd;background-color: ";
            echo twig_escape_filter($this->env, ("#" . (isset($context["value"]) ? $context["value"] : null)), "html", null, true);
            echo "\"></div>&nbsp;";
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true);
            echo "
    ";
        } else {
            // line 7
            echo "        
    ";
        }
        // line 9
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Form/ExtraStatus/list_fields:color_preview.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 9,  44 => 7,  36 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
