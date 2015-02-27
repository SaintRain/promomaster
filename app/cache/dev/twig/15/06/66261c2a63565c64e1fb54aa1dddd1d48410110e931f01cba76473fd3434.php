<?php

/* CoreReviewBundle:Admin/List:list_count_collection.html.twig */
class __TwigTemplate_150666261c2a63565c64e1fb54aa1dddd1d48410110e931f01cba76473fd3434 extends Twig_Template
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
        return $this->env->resolveTemplate($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "getTemplate", array(0 => "base_list_field"), "method"));
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "count", array()), "html", null, true);
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
