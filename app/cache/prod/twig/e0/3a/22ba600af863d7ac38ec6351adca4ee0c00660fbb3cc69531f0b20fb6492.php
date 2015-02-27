<?php

/* CoreCommonBundle::base_layout.html.twig */
class __TwigTemplate_e03a22ba600af863d7ac38ec6351adca4ee0c00660fbb3cc69531f0b20fb6492 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_description' => array($this, 'block_meta_description'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'seo' => array($this, 'block_seo'),
            'css' => array($this, 'block_css'),
            'js_head' => array($this, 'block_js_head'),
            'header' => array($this, 'block_header'),
            'menu' => array($this, 'block_menu'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
            'js_footer' => array($this, 'block_js_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        ob_start();
        // line 2
        echo "    <!doctype html>
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
        // line 12
        echo "
            ";
        // line 14
        echo "            ";
        $this->displayBlock('seo', $context, $blocks);
        // line 29
        echo "            ";
        // line 30
        echo "
            ";
        // line 31
        $this->displayBlock('css', $context, $blocks);
        // line 33
        echo "            
            ";
        // line 34
        $this->displayBlock('js_head', $context, $blocks);
        // line 36
        echo "            ";
        // line 37
        echo "            ";
        echo $this->env->getExtension('fastedit_extension')->fastEditInitFunction();
        echo "

        </head>

        <body>

            <!-- Header -->
        ";
        // line 44
        $this->displayBlock('header', $context, $blocks);
        // line 45
        echo "        <!-- EndHeader -->

        <!-- Menu -->
    ";
        // line 48
        $this->displayBlock('menu', $context, $blocks);
        // line 49
        echo "    <!-- EndMenu -->

    <!-- Content -->
";
        // line 52
        $this->displayBlock('content', $context, $blocks);
        // line 53
        echo "<!-- EndContent -->

<!-- Footer -->
";
        // line 56
        $this->displayBlock('footer', $context, $blocks);
        // line 57
        echo "<!-- EndFooter -->

";
        // line 59
        $this->displayBlock('js_footer', $context, $blocks);
        // line 60
        echo "</body>
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

    // line 14
    public function block_seo($context, array $blocks = array())
    {
        // line 15
        echo "
                    ";
        // line 16
        $context["canonicalException"] = array(0 => "core_order_finish", 1 => "core_order_finish_with_payment_id", 2 => "core_order_finish_with_order_id");
        // line 21
        echo "
                    ";
        // line 22
        if ((((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "query", array()), "all", array())) > 0) && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method")) && !twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), (isset($context["canonicalException"]) ? $context["canonicalException"] : null)))) {
            // line 23
            echo "
                        <link rel=\"canonical\" href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route_params"), "method")), "html", null, true);
            echo "\" />

                    ";
        }
        // line 27
        echo "
            ";
    }

    // line 31
    public function block_css($context, array $blocks = array())
    {
        // line 32
        echo "            ";
    }

    // line 34
    public function block_js_head($context, array $blocks = array())
    {
        // line 35
        echo "            ";
    }

    // line 44
    public function block_header($context, array $blocks = array())
    {
    }

    // line 48
    public function block_menu($context, array $blocks = array())
    {
    }

    // line 52
    public function block_content($context, array $blocks = array())
    {
    }

    // line 56
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 59
    public function block_js_footer($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle::base_layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  198 => 59,  193 => 56,  188 => 52,  183 => 48,  178 => 44,  174 => 35,  171 => 34,  167 => 32,  164 => 31,  159 => 27,  153 => 24,  150 => 23,  148 => 22,  145 => 21,  143 => 16,  140 => 15,  137 => 14,  132 => 9,  127 => 8,  122 => 6,  115 => 60,  113 => 59,  109 => 57,  107 => 56,  102 => 53,  100 => 52,  95 => 49,  93 => 48,  88 => 45,  86 => 44,  75 => 37,  73 => 36,  71 => 34,  68 => 33,  66 => 31,  63 => 30,  61 => 29,  58 => 14,  55 => 12,  51 => 10,  47 => 9,  43 => 8,  38 => 6,  32 => 2,  30 => 1,);
    }
}
