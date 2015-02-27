<?php

/* CoreTroubleTicketBundle:Admin/TroubleTicket:list.html.twig */
class __TwigTemplate_f971a0a331612f4d4ce21a0dc51ba61e8ed9bb7652e2831f869f6a78f9271a99 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:list_top.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataAdminBundle:CRUD:list_top.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coretroubleticket/css/troubleticket.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
";
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle:Admin/TroubleTicket:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 5,  31 => 4,  28 => 3,);
    }
}
