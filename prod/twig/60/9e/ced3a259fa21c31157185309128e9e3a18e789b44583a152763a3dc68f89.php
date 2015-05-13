<?php

/* CoreProductBundle:Admin/Form/modifications_widget/td_types:color.html.twig */
class __TwigTemplate_609eced3a259fa21c31157185309128e9e3a18e789b44583a152763a3dc68f89 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'color_type' => array($this, 'block_color_type'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('color_type', $context, $blocks);
    }

    public function block_color_type($context, array $blocks = array())
    {
        // line 2
        if ((($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "color", array(), "any", true, true) && $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "color", array(), "any", false, true), "hex", array(), "any", true, true)) && ($this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "color", array()), "hex", array()) != "null"))) {
            echo "<div style=\"width:18px;height:18px;float:left;border:solid 1px #ddd;background-color: #";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "color", array()), "hex", array()), "html", null, true);
            echo "\"></div>
";
        } else {
            // line 4
            echo "<div style=\"width:18px;height:18px;float:left;border:solid 1px #ddd;background: url(/bundles/corecolor/img/varicolored.png) 50%\"></div>
";
        }
        // line 6
        if ($this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "color", array(), "any", false, true), "hex", array(), "any", true, true)) {
            echo "&nbsp;";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "color", array()), "captionRu", array()), "html", null, true);
        }
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Admin/Form/modifications_widget/td_types:color.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 6,  33 => 4,  26 => 2,  20 => 1,);
    }
}
