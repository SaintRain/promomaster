<?php

/* CoreDeliveryBundle:Delivery:index.html.twig */
class __TwigTemplate_54624dd3fb921e1c83c5d6a35822f2355e4b0ee789c0e921df99f844adcd825f extends Twig_Template
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
