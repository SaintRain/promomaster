<?php

/* SonataAdminBundle:Core:user_block.html.twig */
class __TwigTemplate_9389c55209ba9bc2d767311b1e82d756a41aa72cda5583e434ccc7964deb4e2a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'user_block' => array($this, 'block_user_block'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 8
        echo "
";
        // line 9
        $this->displayBlock('user_block', $context, $blocks);
    }

    public function block_user_block($context, array $blocks = array())
    {
        // line 10
        echo "
    <span class=\"user_block_big\">";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "username", array()), "html", null, true);
        echo " - <a href=\"";
        echo $this->env->getExtension('routing')->getPath("_logout");
        echo "\">Выход</a></span>
    <span class=\"user_block_small\"><span class=\"icon-user\" title=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "username", array()), "html", null, true);
        echo "\" style=\"cursor: help\"></span>&nbsp;&nbsp;&nbsp;<a href=\"";
        echo $this->env->getExtension('routing')->getPath("_logout");
        echo "\" title=\"Выход\"><span class=\"icon-logout\"></span></a></span>

";
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Core:user_block.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  41 => 12,  35 => 11,  32 => 10,  26 => 9,  23 => 8,  20 => 1,);
    }
}
