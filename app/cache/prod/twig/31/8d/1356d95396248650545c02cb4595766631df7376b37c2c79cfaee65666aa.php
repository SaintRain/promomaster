<?php

/* CoreReviewBundle:Admin/List:list_text.html.twig */
class __TwigTemplate_318d1356d95396248650545c02cb4595766631df7376b37c2c79cfaee65666aa extends Twig_Template
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

    // line 11
    public function block_field($context, array $blocks = array())
    {
        // line 12
        echo "
    ";
        // line 13
        if ((isset($context["value"]) ? $context["value"] : null)) {
            // line 14
            echo "        <span class=\"icon-eye-open\" style=\"cursor: help;\" data-toggle=\"popover\" title=\"Просмотр\" data-html=\"true\" data-content=\"";
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true);
            echo "\" onmouseover=\"
                \$(this).popover('show');
                \$('.popover').css({width:700});
              \" onmouseout=\"\$(this).popover('destroy')\"></span>
    ";
        } else {
            // line 19
            echo "        -
    ";
        }
        // line 21
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreReviewBundle:Admin/List:list_text.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 21,  45 => 19,  36 => 14,  34 => 13,  31 => 12,  28 => 11,);
    }
}
