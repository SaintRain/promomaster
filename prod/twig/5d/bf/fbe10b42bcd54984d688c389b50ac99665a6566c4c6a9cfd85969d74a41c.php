<?php

/* ApplicationSonataAdminBundle:Admin/ExtraBlocks:extra_left_blocks.html.twig */
class __TwigTemplate_5dbffbe10b42bcd54984d688c389b50ac99665a6566c4c6a9cfd85969d74a41c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $_trait_0 = $this->env->loadTemplate("ApplicationSonataAdminBundle:Admin\\ExtraBlocks:extra_left_block_1.html.twig");
        // line 9
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."ApplicationSonataAdminBundle:Admin\\ExtraBlocks:extra_left_block_1.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'extra_left_blocks' => array($this, 'block_extra_left_blocks'),
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
        // line 11
        echo "
";
        // line 12
        $this->displayBlock('extra_left_blocks', $context, $blocks);
    }

    public function block_extra_left_blocks($context, array $blocks = array())
    {
        // line 13
        echo "    ";
        ob_start();
        // line 14
        echo "
        <div class=\"extra-left-block-container\">

            ";
        // line 17
        if (($this->getAttribute($this->getAttribute((isset($context["optionsExtraBlocks"]) ? $context["optionsExtraBlocks"] : null), "sides", array(), "array", false, true), "left", array(), "array", true, true) && twig_in_filter(1, $this->getAttribute($this->getAttribute((isset($context["optionsExtraBlocks"]) ? $context["optionsExtraBlocks"] : null), "sides", array(), "array"), "left", array(), "array")))) {
            // line 18
            echo "
                ";
            // line 19
            $this->displayBlock("extra_left_block_1", $context, $blocks);
            echo "

            ";
        }
        // line 22
        echo "
            ";
        // line 24
        echo "
        </div>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 28
        echo "    <script type=\"text/javascript\">
        \$(function(){

            // переносим блок в левую колонку
            if (\$('.sidebar').size() === 0) {
                \$('.content').addClass('span10').before('<div class=\"sidebar span2\"></div>');
            }

            // удаляем пустые блоки, если есть
            \$('.extra-left-block .tab-content').each(function(){
                if (\$(this).html() === '') {
                    \$(this).closest('.extra-left-block').remove();
                }
            });

            var html = \$('.extra-left-block-container').html();
            \$('.extra-left-block-container').remove();
            \$('.sidebar').append(html);
            \$('.extra-left-block').fadeIn('fast');
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataAdminBundle:Admin/ExtraBlocks:extra_left_blocks.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  75 => 28,  69 => 24,  66 => 22,  60 => 19,  57 => 18,  55 => 17,  50 => 14,  47 => 13,  41 => 12,  38 => 11,  35 => 8,  32 => 1,  14 => 9,);
    }
}
