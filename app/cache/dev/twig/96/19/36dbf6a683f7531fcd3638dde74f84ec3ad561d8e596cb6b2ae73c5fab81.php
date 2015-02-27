<?php

/* CoreUnionBundle:Admin/Form/td_types:money.html.twig */
class __TwigTemplate_961936dbf6a683f7531fcd3638dde74f84ec3ad561d8e596cb6b2ae73c5fab81 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'boolean_type' => array($this, 'block_boolean_type'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('boolean_type', $context, $blocks);
    }

    public function block_boolean_type($context, array $blocks = array())
    {
        // line 2
        echo "
<span class=\"money\">";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["d"]) ? $context["d"] : $this->getContext($context, "d")), (isset($context["d_key"]) ? $context["d_key"] : $this->getContext($context, "d_key")))), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</span>

";
    }

    public function getTemplateName()
    {
        return "CoreUnionBundle:Admin/Form/td_types:money.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  29 => 3,  26 => 2,  20 => 1,);
    }
}
