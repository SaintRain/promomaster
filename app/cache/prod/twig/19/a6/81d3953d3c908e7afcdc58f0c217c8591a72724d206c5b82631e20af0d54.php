<?php

/* SonataBlockBundle:Block:block_exception.html.twig */
class __TwigTemplate_19a681d3953d3c908e7afcdc58f0c217c8591a72724d206c5b82631e20af0d54 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'block' => array($this, 'block_block'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute($this->getAttribute((isset($context["sonata_block"]) ? $context["sonata_block"] : null), "templates", array()), "block_base", array()));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 14
    public function block_block($context, array $blocks = array())
    {
        // line 15
        echo "    <div class=\"cms-block-exception\">
        <h2>";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["block"]) ? $context["block"] : null), "name", array()), "html", null, true);
        echo "</h2>
        <h3>";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : null), "message", array()), "html", null, true);
        echo "</h3>
    </div>
";
    }

    public function getTemplateName()
    {
        return "SonataBlockBundle:Block:block_exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 17,  32 => 16,  29 => 15,  26 => 14,);
    }
}
