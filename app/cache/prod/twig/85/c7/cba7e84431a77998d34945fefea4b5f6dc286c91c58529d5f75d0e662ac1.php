<?php

/* CoreColorBundle:Form:colorpicker_widget.html.twig */
class __TwigTemplate_85c7cba7e84431a77998d34945fefea4b5f6dc286c91c58529d5f75d0e662ac1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'colorpicker_widget' => array($this, 'block_colorpicker_widget'),
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
        // line 9
        $this->displayBlock('colorpicker_widget', $context, $blocks);
    }

    public function block_colorpicker_widget($context, array $blocks = array())
    {
        // line 10
        echo "
    ";
        // line 11
        if ((isset($context["libFirst"]) ? $context["libFirst"] : null)) {
            // line 12
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corecolor/colorpicker/css/colorpicker.css"), "html", null, true);
            echo "\" type=\"text/css\" />
        <link rel=\"stylesheet\" href=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corecolor/colorpicker/css/admin_colorpicker.css"), "html", null, true);
            echo "\" type=\"text/css\" />

        <script type=\"text/javascript\" src=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corecolor/colorpicker/js/colorpicker.js"), "html", null, true);
            echo "\"></script>
        <script type=\"text/javascript\" src=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corecolor/colorpicker/js/eye.js"), "html", null, true);
            echo "\"></script>
        <script type=\"text/javascript\" src=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corecolor/colorpicker/js/utils.js"), "html", null, true);
            echo "\"></script>
        <script type=\"text/javascript\" src=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corecolor/colorpicker/js/admin_colorpicker.js"), "html", null, true);
            echo "\"></script>

    ";
        }
        // line 21
        echo "
    ";
        // line 22
        ob_start();
        // line 23
        echo "        <div class=\"colorpicker-preview\"><div style=\"background-color: ";
        echo twig_escape_filter($this->env, ("#" . (isset($context["value"]) ? $context["value"] : null)), "html", null, true);
        echo "\"></div></div>
        <input type=\"text\" ";
        // line 24
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " value=\"";
        echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true);
        echo "\" />
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 26
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreColorBundle:Form:colorpicker_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  82 => 26,  75 => 24,  70 => 23,  68 => 22,  65 => 21,  59 => 18,  55 => 17,  51 => 16,  47 => 15,  42 => 13,  37 => 12,  35 => 11,  32 => 10,  26 => 9,  23 => 8,  20 => 1,);
    }
}
