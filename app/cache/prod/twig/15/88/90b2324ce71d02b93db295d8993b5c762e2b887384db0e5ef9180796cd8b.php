<?php

/* CoreUnionBundle:Admin/Form/td_types:money.html.twig */
class __TwigTemplate_158890b2324ce71d02b93db295d8993b5c762e2b887384db0e5ef9180796cd8b extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["d"]) ? $context["d"] : null), (isset($context["d_key"]) ? $context["d_key"] : null))), "html", null, true);
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
