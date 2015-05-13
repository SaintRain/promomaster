<?php

/* FMElfinderBundle:Elfinder/helper:assets_js.html.twig */
class __TwigTemplate_b199bccf2de19d05955e2b69e4c05efac572e94ef13dfa66fcd8d3b31f886ae6 extends Twig_Template
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
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/fmelfinder/js/jquery/jquery-1.8.0.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/fmelfinder/js/jquery/jquery-ui-1.8.23.custom.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/fmelfinder/js/elfinder.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/fmelfinder/js/main_part_4_elfinder.ru_19.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/fmelfinder/js/main_part_4_elfinder.LANG_1.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "FMElfinderBundle:Elfinder/helper:assets_js.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 5,  32 => 4,  28 => 3,  24 => 2,  19 => 1,);
    }
}
