<?php

/* FMElfinderBundle:Elfinder/helper:assets_css.html.twig */
class __TwigTemplate_5a5a0ebfe5a42e1e91b68bed1b258775daff1dbcf2524c01859559d7465830f4 extends Twig_Template
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
        echo "<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/fmelfinder/css/jquery-ui-1.8.21.custom.css"), "html", null, true);
        echo "\" />
<link rel=\"stylesheet\" href=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/fmelfinder/css/elfinder.min.css"), "html", null, true);
        echo "\" />
<link rel=\"stylesheet\" href=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/fmelfinder/css/theme.css"), "html", null, true);
        echo "\" />";
    }

    public function getTemplateName()
    {
        return "FMElfinderBundle:Elfinder/helper:assets_css.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 3,  24 => 2,  19 => 1,);
    }
}
