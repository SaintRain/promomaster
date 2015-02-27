<?php

/* CoreCommonBundle::base_layout.html.twig */
class __TwigTemplate_864769aff5e2f20306da70da7ad77dd9cf409a2f0c61f6746c8c929aced9abdc extends Twig_Template
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
        echo "            ";
        $this->displayBlock('seo', $context, $blocks);
        // line 27
        echo "            
            ";
        // line 28
        $this->displayBlock('css', $context, $blocks);
        // line 30
        echo "            
            ";
        // line 31
        $this->displayBlock('js_head', $context, $blocks);
        // line 33
        echo "            ";
        // line 34
        echo "            ";
        echo $this->env->getExtension('fastedit_extension')->fastEditInitFunction();
        echo "

        </head>

        <body>

            <!-- Header -->
        ";
        // line 41
        $this->displayBlock('header', $context, $blocks);
        // line 42
        echo "        <!-- EndHeader -->

        <!-- Menu -->
    ";
        // line 45
        $this->displayBlock('menu', $context, $blocks);
        // line 46
        echo "    <!-- EndMenu -->

    <!-- Content -->
";
        // line 49
        $this->displayBlock('content', $context, $blocks);
        // line 50
        echo "<!-- EndContent -->

<!-- Footer -->
";
        // line 53
        $this->displayBlock('footer', $context, $blocks);
        // line 54
        echo "<!-- EndFooter -->

";
        // line 56
        $this->displayBlock('js_footer', $context, $blocks);
        // line 57
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

    // line 12
    public function block_seo($context, array $blocks = array())
    {
        // line 13
        echo "                
                    ";
        // line 14
        $context["canonicalException"] = array(0 => "core_order_finish", 1 => "core_order_finish_with_payment_id", 2 => "core_order_finish_with_order_id");
        // line 19
        echo "        
                    ";
        // line 20
        if ((((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "query", array()), "all", array())) > 0) && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method")) && !twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), (isset($context["canonicalException"]) ? $context["canonicalException"] : $this->getContext($context, "canonicalException"))))) {
            // line 21
            echo "        
                        <link rel=\"canonical\" href=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route_params"), "method")), "html", null, true);
            echo "\" />
        
                    ";
        }
        // line 25
        echo "                    
            ";
    }

    // line 28
    public function block_css($context, array $blocks = array())
    {
        // line 29
        echo "            ";
    }

    // line 31
    public function block_js_head($context, array $blocks = array())
    {
        // line 32
        echo "            ";
    }

    // line 41
    public function block_header($context, array $blocks = array())
    {
    }

    // line 45
    public function block_menu($context, array $blocks = array())
    {
    }

    // line 49
    public function block_content($context, array $blocks = array())
    {
    }

    // line 53
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 56
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
        return array (  193 => 56,  188 => 53,  183 => 49,  178 => 45,  173 => 41,  169 => 32,  166 => 31,  162 => 29,  159 => 28,  154 => 25,  148 => 22,  145 => 21,  143 => 20,  140 => 19,  138 => 14,  135 => 13,  132 => 12,  127 => 9,  122 => 8,  117 => 6,  110 => 57,  108 => 56,  104 => 54,  102 => 53,  97 => 50,  95 => 49,  90 => 46,  88 => 45,  83 => 42,  81 => 41,  70 => 34,  68 => 33,  66 => 31,  63 => 30,  61 => 28,  58 => 27,  55 => 12,  51 => 10,  47 => 9,  43 => 8,  38 => 6,  32 => 2,  30 => 1,);
    }
}
