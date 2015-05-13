<?php

/* CoreReviewBundle:Admin/List:list_count_collection.html.twig */
class __TwigTemplate_541597f06516524975e9e92444e15a39b5665a6210ca5fc4c69f4159feba0e71 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 9
        return $this->env->resolveTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "getTemplate", array(0 => "base_list_field"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 11
    public function block_field($context, array $blocks = array())
    {
        // line 12
        echo "
    ";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["value"]) ? $context["value"] : null), "count", array()), "html", null, true);
        echo "
    
";
    }

    public function getTemplateName()
    {
        return "CoreReviewBundle:Admin/List:list_count_collection.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 13,  30 => 12,  27 => 11,  18 => 9,);
    }
}
