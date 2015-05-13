<?php

/* SonataFormatterBundle:Form:formatter.html.twig */
class __TwigTemplate_fdc53c1cbc19265941d43c0d0528d618cae1611b2066eb7ba8a1d323c17942b1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'sonata_formatter_type_widget' => array($this, 'block_sonata_formatter_type_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('sonata_formatter_type_widget', $context, $blocks);
    }

    public function block_sonata_formatter_type_widget($context, array $blocks = array())
    {
        // line 2
        echo "
    <div style=\"margin-bottom: 5px;\">
        ";
        // line 4
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array()), (isset($context["format_field"]) ? $context["format_field"] : null), array(), "array"), 'widget');
        echo "
        <i>";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("please_select_format_method", array(), "SonataFormatterBundle"), "html", null, true);
        echo "</i>
    </div>

    ";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array()), (isset($context["source_field"]) ? $context["source_field"] : null), array(), "array"), 'widget');
        echo "

    <script>
        var ";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["source_id"]) ? $context["source_id"] : null), "html", null, true);
        echo "_rich_instance = false;

        jQuery(document).ready(function() {

            // This code requires CKEDITOR and jQuery MarkItUp
            if (typeof CKEDITOR === 'undefined' || jQuery().markItUp == undefined) {
                return;
            }

            jQuery('#";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array()), (isset($context["format_field"]) ? $context["format_field"] : null), array(), "array"), "vars", array()), "id", array()), "html", null, true);
        echo "').change(function() {
                var elms = jQuery('#";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array()), (isset($context["source_field"]) ? $context["source_field"] : null), array(), "array"), "vars", array()), "id", array()), "html", null, true);
        echo "');
                elms.markItUpRemove();
                if (";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["source_id"]) ? $context["source_id"] : null), "html", null, true);
        echo "_rich_instance) {
                    ";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["source_id"]) ? $context["source_id"] : null), "html", null, true);
        echo "_rich_instance.destroy();
                }

                var val = jQuery(this).val();
                var appendClass = val;
                switch(val) {
                    case 'textile':
                        elms.markItUp(markitup_sonataTextileSettings);
                        break;
                    case 'markdown':
                        elms.markItUp(markitup_sonataMarkdownSettings);
                        break;
                    case 'bbcode':
                        elms.markItUp(markitup_sonataBBCodeSettings);
                        break;
                    case 'rawhtml':
                        elms.markItUp(markitup_sonataHtmlSettings);
                        appendClass = 'html';
                        break;
                    case 'richhtml':
                        ";
        // line 44
        echo twig_escape_filter($this->env, (isset($context["source_id"]) ? $context["source_id"] : null), "html", null, true);
        echo "_rich_instance = ";
        echo $this->env->getExtension('ivory_ckeditor')->renderReplace($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array()), (isset($context["source_field"]) ? $context["source_field"] : null), array(), "array"), "vars", array()), "id", array()), (isset($context["ckeditor_configuration"]) ? $context["ckeditor_configuration"] : null));
        echo ";
                }

                var parent = elms.parents('div.markItUp');

                if (parent) {
                    for (name in ['textile', 'markdown', 'bbcode', 'rawhtml', 'richhtml', 'rawhtml']) {
                        parent.removeClass(name)
                    }

                    parent.addClass(appendClass);
                }
            });

            jQuery('#";
        // line 58
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array()), (isset($context["format_field"]) ? $context["format_field"] : null), array(), "array"), "vars", array()), "id", array()), "html", null, true);
        echo "').trigger('change');
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "SonataFormatterBundle:Form:formatter.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  113 => 58,  94 => 44,  71 => 24,  67 => 23,  62 => 21,  58 => 20,  46 => 11,  40 => 8,  34 => 5,  30 => 4,  26 => 2,  20 => 1,);
    }
}
