<?php

/* CoreOrderBundle:Form:row.html.twig */
class __TwigTemplate_84aa909e30c9a4b047bfee08cad230223df851f669c8854597cf182fe39e6b0f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreCommonBundle:Form:choice_widget_with_data_attr.html.twig");

        $this->blocks = array(
            'form_row' => array($this, 'block_form_row'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CoreCommonBundle:Form:choice_widget_with_data_attr.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_form_row($context, array $blocks = array())
    {
        // line 3
        ob_start();
        // line 4
        echo "    <div class=\"form_row\">
        ";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'label', array("label_attr" => array("class" => "form_label")));
        echo "
        <div class=\"form_row_field";
        // line 6
        if ($this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors')) {
            echo " form_field_error";
        }
        echo "\">
            ";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
            ";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
        </div>
    </div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Form:row.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 8,  46 => 7,  40 => 6,  36 => 5,  33 => 4,  31 => 3,  28 => 2,);
    }
}
