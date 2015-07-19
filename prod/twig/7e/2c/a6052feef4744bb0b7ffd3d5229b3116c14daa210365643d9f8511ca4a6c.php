<?php

/* CoreOrderBundle:Admin/Documents:layout.html.twig */
class __TwigTemplate_7e2ca6052feef4744bb0b7ffd3d5229b3116c14daa210365643d9f8511ca4a6c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_description' => array($this, 'block_meta_description'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'css' => array($this, 'block_css'),
            'js_head' => array($this, 'block_js_head'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        ob_start();
        // line 2
        echo "<!doctype html>
<!--[if lt IE 8]><html lang=\"ru\" class=\"no-js lt-ie8\"> <![endif]-->
<!--[if gte IE 8]><!--><html lang=\"ru\" class=\"no-js\"> <!--<![endif]-->
    <head>
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <meta charset=\"utf-8\">
        <meta name=\"description\" content=\"";
        // line 8
        $this->displayBlock('meta_description', $context, $blocks);
        echo "\">
        <meta name=\"keywords\" content=\"";
        // line 9
        $this->displayBlock('meta_keywords', $context, $blocks);
        echo "\">
        <link rel=\"shortcut icon\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\"/>
        ";
        // line 11
        $this->displayBlock('css', $context, $blocks);
        // line 12
        echo "        ";
        $this->displayBlock('js_head', $context, $blocks);
        // line 13
        echo "    </head>
    <body>
    ";
        // line 15
        $this->displayBlock('content', $context, $blocks);
        // line 16
        echo "    </body>
</html>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
    }

    // line 8
    public function block_meta_description($context, array $blocks = array())
    {
    }

    // line 9
    public function block_meta_keywords($context, array $blocks = array())
    {
    }

    // line 11
    public function block_css($context, array $blocks = array())
    {
    }

    // line 12
    public function block_js_head($context, array $blocks = array())
    {
    }

    // line 15
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Documents:layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 15,  88 => 12,  83 => 11,  78 => 9,  73 => 8,  68 => 6,  61 => 16,  59 => 15,  55 => 13,  52 => 12,  50 => 11,  46 => 10,  42 => 9,  38 => 8,  33 => 6,  27 => 2,  25 => 1,);
    }
}
