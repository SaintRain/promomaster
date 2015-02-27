<?php

/* CoreTroubleTicketBundle:TroubleTicket:msg_create.html.twig */
class __TwigTemplate_5317cd8550ae267aa2dcab3a08047ecf7db574742a1be1bc49c906defa3b687b extends Twig_Template
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
        // line 5
        echo $this->env->getExtension('eval_extension')->evaluateString($context, $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : $this->getContext($context, "ServiceContainer")), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "contact-msg-template"), "method"));
        echo "

";
        // line 10
        echo "
";
        // line 12
        echo "
";
        // line 16
        echo "
";
        // line 20
        echo "    ";
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle:TroubleTicket:msg_create.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 20,  30 => 16,  27 => 12,  24 => 10,  19 => 5,);
    }
}
