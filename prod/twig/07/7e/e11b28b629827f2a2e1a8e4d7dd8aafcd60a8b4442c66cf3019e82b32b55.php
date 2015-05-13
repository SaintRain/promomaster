<?php

/* CoreTroubleTicketBundle:Admin/List:list__action_show_on_site.html.twig */
class __TwigTemplate_077ee11b28b629827f2a2e1a8e4d7dd8aafcd60a8b4442c66cf3019e82b32b55 extends Twig_Template
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
        // line 1
        echo "<a target=\"_blank\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("trouble_ticket_edit", array("hash" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "hash", array()))), "html", null, true);
        echo "\" class=\"btn view_link btn-small\">
    <i class=\"icon-zoom-in\"></i>
    ";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("label.action_show_on_site", array(), "CoreTroubleTicketBundle"), "html", null, true);
        echo "
</a>";
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle:Admin/List:list__action_show_on_site.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 3,  19 => 1,);
    }
}
