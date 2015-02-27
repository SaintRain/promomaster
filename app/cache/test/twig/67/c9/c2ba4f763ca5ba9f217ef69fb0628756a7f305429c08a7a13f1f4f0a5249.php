<?php

/* CoreFaqBundle:Admin/List:list_rating.html.twig */
class __TwigTemplate_67c9c2ba4f763ca5ba9f217ef69fb0628756a7f305429c08a7a13f1f4f0a5249 extends Twig_Template
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

    // line 2
    public function block_field($context, array $blocks = array())
    {
        // line 3
        echo "    <div class=\"centered\">
        <div class=\"inline-center\">
            <i title=\"Помогло\" class=\"icon-thumbs-up\"></i>
            <span title=\"Помогло\">";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "goodRate", array()), "html", null, true);
        echo "</span>
        </div>
        <div class=\"inline-center\">
            <i title=\"Не помогло\" class=\"icon-thumbs-down\"></i>
            <span title=\"Не помогло\">";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "badRate", array()), "html", null, true);
        echo "</span>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CoreFaqBundle:Admin/List:list_rating.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 10,  36 => 6,  31 => 3,  28 => 2,);
    }
}
