<?php

/* CoreDirectoryBundle:Admin/List:get_caption_ru.html.twig */
class __TwigTemplate_13402bae564e2f9ee6716e028d755b744bbb0b64f6b4dd7a0fa40eeed9bb4088 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "getCaptionRu", array()), "html", null, true);
        echo "
    
";
    }

    public function getTemplateName()
    {
        return "CoreDirectoryBundle:Admin/List:get_caption_ru.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 5,  31 => 4,  28 => 3,);
    }
}
