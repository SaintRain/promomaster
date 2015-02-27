<?php

/* CoreProductBundle:Catalog:layout.html.twig */
class __TwigTemplate_614a403fb2d6bd2144d7fa4e689384d2d304a15590cd9e5ea58ea7cb09f41c94 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'breadcrumbs' => array($this, 'block_breadcrumbs'),
            'promo' => array($this, 'block_promo'),
            'main_col' => array($this, 'block_main_col'),
            'right_col' => array($this, 'block_right_col'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CoreCommonBundle::main_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "    ";
        ob_start();
        // line 13
        echo "
        <!-- breadcrumbs -->
        ";
        // line 15
        $this->displayBlock('breadcrumbs', $context, $blocks);
        // line 16
        echo "        <!-- /breadcrumbs -->

        <!-- promo -->
        ";
        // line 19
        $this->displayBlock('promo', $context, $blocks);
        // line 20
        echo "        <!-- /promo -->

        <!-- content with cols -->
        <div id=\"content\" role=\"main\">

            <!-- main content col -->
            <div class=\"main_col\">
                <div class=\"main_col_pad\">
                    ";
        // line 28
        $this->displayBlock('main_col', $context, $blocks);
        // line 29
        echo "                </div>
            </div>
            <!-- /main content col -->

            <!-- side content col -->
            <aside class=\"side_col\">
                <div class=\"side_col_pad\">

                    ";
        // line 37
        $this->displayBlock('right_col', $context, $blocks);
        // line 38
        echo "
                </div>
            </aside>
            <!-- /side content col -->

        </div>
        <!-- /content with cols -->

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 15
    public function block_breadcrumbs($context, array $blocks = array())
    {
    }

    // line 19
    public function block_promo($context, array $blocks = array())
    {
    }

    // line 28
    public function block_main_col($context, array $blocks = array())
    {
    }

    // line 37
    public function block_right_col($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Catalog:layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 37,  98 => 28,  93 => 19,  88 => 15,  75 => 38,  73 => 37,  63 => 29,  61 => 28,  51 => 20,  49 => 19,  44 => 16,  42 => 15,  38 => 13,  35 => 12,  32 => 11,);
    }
}
