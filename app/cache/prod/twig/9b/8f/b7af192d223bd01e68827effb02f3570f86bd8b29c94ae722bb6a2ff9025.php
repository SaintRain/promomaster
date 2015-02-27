<?php

/* SonataAdminBundle:CRUD:list__action_edit.html.twig */
class __TwigTemplate_9b8fb7af192d223bd01e68827effb02f3570f86bd8b29c94ae722bb6a2ff9025 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 11
        echo "
";
        // line 12
        if (($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "isGranted", array(0 => "EDIT", 1 => (isset($context["object"]) ? $context["object"] : null)), "method") && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasRoute", array(0 => "edit"), "method"))) {
            // line 13
            echo "    <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateObjectUrl", array(0 => "edit", 1 => (isset($context["object"]) ? $context["object"] : null)), "method"), "html", null, true);
            echo "\" class=\"btn edit_link btn-small\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("action_edit", array(), "SonataAdminBundle"), "html", null, true);
            echo "\">
        <i class=\"icon-edit\"></i>
        ";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("action_edit", array(), "SonataAdminBundle"), "html", null, true);
            echo "
    </a>
";
        }
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:CRUD:list__action_edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 15,  24 => 13,  22 => 12,  19 => 11,);
    }
}
