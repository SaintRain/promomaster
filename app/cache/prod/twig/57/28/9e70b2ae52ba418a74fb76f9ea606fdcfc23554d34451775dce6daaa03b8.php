<?php

/* CoreReviewBundle:Admin/List:list_count_collection.html.twig */
class __TwigTemplate_57289e70b2ae52ba418a74fb76f9ea606fdcfc23554d34451775dce6daaa03b8 extends Twig_Template
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
        return array (  32 => 13,  29 => 12,  26 => 11,);
    }
}
