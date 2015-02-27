<?php

/* CoreReviewBundle:Admin/List:list_text.html.twig */
class __TwigTemplate_6d138e26b143f648b15541e0b4258d723fc607508988fb08591fc953556f8756 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 9
        try {
            $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(9);

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

    // line 11
    public function block_field($context, array $blocks = array())
    {
        // line 12
        echo "
    ";
        // line 13
        if ((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value"))) {
            // line 14
            echo "        <span class=\"icon-eye-open\" style=\"cursor: help;\" data-toggle=\"popover\" title=\"Просмотр\" data-html=\"true\" data-content=\"";
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
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
        return array (  57 => 21,  53 => 19,  44 => 14,  42 => 13,  39 => 12,  36 => 11,  11 => 9,);
    }
}
