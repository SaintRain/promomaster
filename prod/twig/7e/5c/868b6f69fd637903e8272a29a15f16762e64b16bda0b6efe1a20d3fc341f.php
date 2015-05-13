<?php

/* CoreFaqBundle::layout.html.twig */
class __TwigTemplate_7e5c868b6f69fd637903e8272a29a15f16762e64b16bda0b6efe1a20d3fc341f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'main_content' => array($this, 'block_main_content'),
            'menu_left' => array($this, 'block_menu_left'),
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

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "    <div role=\"main\" class=\"contacts_page info_page\" id=\"content\">
        <div class=\"main_col\">
            <div class=\"main_col_pad\">
                ";
        // line 6
        $this->displayBlock('main_content', $context, $blocks);
        // line 7
        echo "            </div>
        </div>

        ";
        // line 10
        $this->displayBlock('menu_left', $context, $blocks);
        // line 13
        echo "    </div>
";
    }

    // line 6
    public function block_main_content($context, array $blocks = array())
    {
    }

    // line 10
    public function block_menu_left($context, array $blocks = array())
    {
        // line 11
        echo "            ";
        echo twig_include($this->env, $context, "CoreCommonBundle:Fragments:menuLeft.html.twig");
        echo "
        ";
    }

    public function getTemplateName()
    {
        return "CoreFaqBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 11,  65 => 10,  60 => 6,  55 => 13,  53 => 10,  48 => 7,  46 => 6,  41 => 3,  38 => 2,  11 => 1,);
    }
}
