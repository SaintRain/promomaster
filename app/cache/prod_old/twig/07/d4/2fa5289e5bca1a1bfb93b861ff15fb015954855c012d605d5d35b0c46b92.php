<?php

/* CoreDeliveryBundle:Delivery:index.html.twig */
class __TwigTemplate_07d42fa5289e5bca1a1bfb93b861ff15fb015954855c012d605d5d35b0c46b92 extends Twig_Template
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
        echo twig_escape_filter($this->env, (isset($context["defaultData"]) ? $context["defaultData"] : $this->getContext($context, "defaultData")), "html", null, true);
        echo "
<br /><hr />
";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["price"]) ? $context["price"] : $this->getContext($context, "price")), "html", null, true);
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
