<?php

/* SonataAdminBundle:Button:history_button.html.twig */
class __TwigTemplate_a57af7352aa366c3b1dae3bf40a79dedb13126c17e4c694f091795711ae45279 extends Twig_Template
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
        if ((($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "hasroute", array(0 => "history"), "method") && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method")) && $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "isGranted", array(0 => "EDIT", 1 => (isset($context["object"]) ? $context["object"] : null)), "method"))) {
            // line 13
            echo "    <a class=\"btn sonata-action-element\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "generateObjectUrl", array(0 => "history", 1 => (isset($context["object"]) ? $context["object"] : null)), "method"), "html", null, true);
            echo "\">
        <i class=\"icon-book\"></i>
        ";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_action_history", array(), "SonataAdminBundle"), "html", null, true);
            echo "</a>
";
        }
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Button:history_button.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 15,  24 => 13,  22 => 12,  19 => 11,);
    }
}
