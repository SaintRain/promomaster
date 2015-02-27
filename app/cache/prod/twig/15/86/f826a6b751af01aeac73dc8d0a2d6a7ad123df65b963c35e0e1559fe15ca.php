<?php

/* ApplicationSonataUserBundle::cabinet_layout.html.twig */
class __TwigTemplate_1586f826a6b751af01aeac73dc8d0a2d6a7ad123df65b963c35e0e1559fe15ca extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout.html.twig");

        $_trait_0 = $this->env->loadTemplate("ApplicationSonataUserBundle:Profile:left_menu.html.twig");
        // line 3
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."ApplicationSonataUserBundle:Profile:left_menu.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'js_head' => array($this, 'block_js_head'),
                'content' => array($this, 'block_content'),
                'main_content' => array($this, 'block_main_content'),
            )
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

    // line 5
    public function block_js_head($context, array $blocks = array())
    {
        // line 6
        echo "
    ";
        // line 7
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "

";
        // line 10
        echo "
";
    }

    // line 13
    public function block_content($context, array $blocks = array())
    {
        // line 14
        echo "    <div role=\"main\" class=\"cabinet_page\" id=\"content\">
        <h1>Личный кабинет</h1>
        <div class=\"main_col\">
            <div class=\"main_col_pad\">
                ";
        // line 18
        $this->displayBlock('main_content', $context, $blocks);
        // line 19
        echo "            </div>
        </div>

        ";
        // line 22
        $this->displayBlock("left_menu", $context, $blocks);
        echo "

    </div>
";
    }

    // line 18
    public function block_main_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle::cabinet_layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 18,  74 => 22,  69 => 19,  67 => 18,  61 => 14,  58 => 13,  53 => 10,  48 => 7,  45 => 6,  42 => 5,  14 => 3,);
    }
}
