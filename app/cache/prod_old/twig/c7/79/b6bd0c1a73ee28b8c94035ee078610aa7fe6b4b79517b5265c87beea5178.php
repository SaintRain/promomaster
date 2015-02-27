<?php

/* ApplicationSonataAdminBundle:Admin/ExtraBlocks:extra_bottom_blocks.html.twig */
class __TwigTemplate_c779b6bd0c1a73ee28b8c94035ee078610aa7fe6b4b79517b5265c87beea5178 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $_trait_0 = $this->env->loadTemplate("ApplicationSonataAdminBundle:Admin\\ExtraBlocks:extra_bottom_block_1.html.twig");
        // line 9
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."ApplicationSonataAdminBundle:Admin\\ExtraBlocks:extra_bottom_block_1.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'extra_bottom_blocks' => array($this, 'block_extra_bottom_blocks'),
            )
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 8
        echo "
";
        // line 10
        echo "
";
        // line 11
        $this->displayBlock('extra_bottom_blocks', $context, $blocks);
    }

    public function block_extra_bottom_blocks($context, array $blocks = array())
    {
        // line 12
        echo "    ";
        ob_start();
        // line 13
        echo "
        <div class=\"extra-footer-block-container\">

            ";
        // line 16
        if (($this->getAttribute($this->getAttribute((isset($context["optionsExtraBlocks"]) ? $context["optionsExtraBlocks"] : null), "sides", array(), "array", false, true), "bottom", array(), "array", true, true) && twig_in_filter(1, $this->getAttribute($this->getAttribute((isset($context["optionsExtraBlocks"]) ? $context["optionsExtraBlocks"] : $this->getContext($context, "optionsExtraBlocks")), "sides", array(), "array"), "bottom", array(), "array")))) {
            // line 17
            echo "
                ";
            // line 18
            $this->displayBlock("extra_bottom_block_1", $context, $blocks);
            echo "

            ";
        }
        // line 21
        echo "
        </div>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 25
        echo "    ";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataAdminBundle:Admin/ExtraBlocks:extra_bottom_blocks.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  72 => 25,  66 => 21,  60 => 18,  57 => 17,  55 => 16,  50 => 13,  47 => 12,  41 => 11,  38 => 10,  35 => 8,  32 => 1,  14 => 9,);
    }
}
