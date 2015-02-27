<?php

/* IvoryCKEditorBundle:Form:ckeditor_widget.html.twig */
class __TwigTemplate_2351c8ebd82845797f437be0708eb31fe86ecfaa69e7403ea15fe9056651bd00 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'ckeditor_widget' => array($this, 'block_ckeditor_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('ckeditor_widget', $context, $blocks);
    }

    public function block_ckeditor_widget($context, array $blocks = array())
    {
        // line 2
        echo "    <textarea ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo ">";
        echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
        echo "</textarea>

    ";
        // line 4
        if ((isset($context["enable"]) ? $context["enable"] : $this->getContext($context, "enable"))) {
            // line 5
            echo "        ";
            if ((isset($context["autoload"]) ? $context["autoload"] : $this->getContext($context, "autoload"))) {
                // line 6
                echo "            <script type=\"text/javascript\">
                var CKEDITOR_BASEPATH = \"";
                // line 7
                echo $this->env->getExtension('ivory_ckeditor')->renderBasePath((isset($context["base_path"]) ? $context["base_path"] : $this->getContext($context, "base_path")));
                echo "\";
            </script>
            <script type=\"text/javascript\" src=\"";
                // line 9
                echo $this->env->getExtension('ivory_ckeditor')->renderJsPath((isset($context["js_path"]) ? $context["js_path"] : $this->getContext($context, "js_path")));
                echo "\"></script>
        ";
            }
            // line 11
            echo "        <script type=\"text/javascript\">
            ";
            // line 12
            echo $this->env->getExtension('ivory_ckeditor')->renderDestroy((isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")));
            echo "

            ";
            // line 14
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["plugins"]) ? $context["plugins"] : $this->getContext($context, "plugins")));
            foreach ($context['_seq'] as $context["plugin_name"] => $context["plugin"]) {
                // line 15
                echo "                ";
                echo $this->env->getExtension('ivory_ckeditor')->renderPlugin($context["plugin_name"], $context["plugin"]);
                echo "
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['plugin_name'], $context['plugin'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 17
            echo "
            ";
            // line 18
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["styles"]) ? $context["styles"] : $this->getContext($context, "styles")));
            foreach ($context['_seq'] as $context["style_name"] => $context["style"]) {
                // line 19
                echo "                ";
                echo $this->env->getExtension('ivory_ckeditor')->renderStylesSet($context["style_name"], $context["style"]);
                echo "
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['style_name'], $context['style'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo "
            ";
            // line 22
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["templates"]) ? $context["templates"] : $this->getContext($context, "templates")));
            foreach ($context['_seq'] as $context["template_name"] => $context["template"]) {
                // line 23
                echo "                ";
                echo $this->env->getExtension('ivory_ckeditor')->renderTemplate($context["template_name"], $context["template"]);
                echo "
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['template_name'], $context['template'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "
            ";
            // line 26
            echo $this->env->getExtension('ivory_ckeditor')->renderReplace((isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")));
            echo "
        </script>
    ";
        }
    }

    public function getTemplateName()
    {
        return "IvoryCKEditorBundle:Form:ckeditor_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  108 => 26,  105 => 25,  96 => 23,  92 => 22,  89 => 21,  80 => 19,  76 => 18,  73 => 17,  64 => 15,  60 => 14,  55 => 12,  52 => 11,  47 => 9,  42 => 7,  39 => 6,  36 => 5,  34 => 4,  26 => 2,  20 => 1,);
    }
}
