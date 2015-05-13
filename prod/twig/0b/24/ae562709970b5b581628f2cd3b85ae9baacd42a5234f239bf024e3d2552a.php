<?php

/* CoreDeliveryBundle:Delivery:index.html.twig */
class __TwigTemplate_0b24ae562709970b5b581628f2cd3b85ae9baacd42a5234f239bf024e3d2552a extends Twig_Template
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
        echo twig_escape_filter($this->env, (isset($context["defaultData"]) ? $context["defaultData"] : null), "html", null, true);
        echo "
<br /><hr />
";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["price"]) ? $context["price"] : null), "html", null, true);
    }

    public function getTemplateName()
    {
        return "CoreDeliveryBundle:Delivery:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 3,  19 => 1,);
    }
}
