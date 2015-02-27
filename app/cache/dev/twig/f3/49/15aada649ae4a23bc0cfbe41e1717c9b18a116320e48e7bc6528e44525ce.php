<?php

/* CoreColorBundle:Admin/List:list_color_preview.html.twig */
class __TwigTemplate_f34915aada649ae4a23bc0cfbe41e1717c9b18a116320e48e7bc6528e44525ce extends Twig_Template
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
        echo "
    ";
        // line 5
        if (((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")) != "null")) {
            // line 6
            echo "        <div style=\"width:18px;height:18px;float:left;border:solid 1px #ddd;background-color: ";
            echo twig_escape_filter($this->env, ("#" . (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value"))), "html", null, true);
            echo "\"></div>&nbsp;";
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
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
        return array (  58 => 10,  52 => 8,  44 => 6,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
