<?php

/* CmfTreeBrowserBundle:Base:tree.html.twig */
class __TwigTemplate_b6a01e34d6ba9025e3a031fe98b3873cf9f5548ddf9181af37111a31b9634b93 extends Twig_Template
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
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/fosjsrouting/js/router.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 2
        echo $this->env->getExtension('routing')->getPath("fos_js_routing_js", array("callback" => "fos.Router.setData"));
        echo "\"></script>

<script src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/cmftreebrowser/js/jquery.jstree.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/cmftreebrowser/js/jquery.cookie.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>

<script src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/cmftreebrowser/js/admin_tree.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/cmftreebrowser/js/select_tree.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>

<link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/cmftreebrowser/css/style.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\"/>
";
    }

    public function getTemplateName()
    {
        return "CmfTreeBrowserBundle:Base:tree.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 10,  42 => 8,  38 => 7,  33 => 5,  29 => 4,  24 => 2,  19 => 1,);
    }
}
