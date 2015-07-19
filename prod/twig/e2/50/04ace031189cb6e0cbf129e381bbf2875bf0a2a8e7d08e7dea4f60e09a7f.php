<?php

/* CoreCommonBundle:Form:tree_select_widget.html.twig */
class __TwigTemplate_e25004ace031189cb6e0cbf129e381bbf2875bf0a2a8e7d08e7dea4f60e09a7f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'tree_select_widget' => array($this, 'block_tree_select_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('tree_select_widget', $context, $blocks);
    }

    public function block_tree_select_widget($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        ob_start();
        // line 3
        echo "        <div class=\"rower";
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array(), "any", false, true), "attr", array(), "any", false, true), "class", array(), "array", true, true)) {
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "attr", array()), "class", array(), "array"), "html", null, true);
        }
        echo "\">
            ";
        // line 4
        $context["formValue"] = (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array(), "any", false, true), "value", array(), "any", false, true), "id", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "value", array()), "id", array())) : ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "value", array())));
        // line 5
        echo "            ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'widget', array("value" => (isset($context["formValue"]) ? $context["formValue"] : null)));
        echo "
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 8
        echo "    ";
        echo (isset($context["tree"]) ? $context["tree"] : null);
        echo "
";
        // line 13
        echo "<script>
    (function(\$){
        \$(function(){
            /*
            \$('body').on('click','.trigger-click', function(){
                var \$this = \$(this);
                \$this.blur();
                \$this.siblings('a').trigger('click');
                
            });
            */
            \$(\"#";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo "\").mcDropdown(\"#category_";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo "\",
                {
                    lineHeight: 26,
                    //openFx: \"slideDown\",
                    openSpeed: 25,
                    hideSpeed: 25,
                    select: function(e, t) {
                        var toolTipElt = \$('#";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo "').siblings('a'),
                            allTreeElts = \$(\"#category_";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo " li\"),
                            chosenElt = \$(\"#category_";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo " li[rel='\" + e + \"']\"),
                            shortTextElt = \$('#";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo "').siblings('.short-text'),
                            shortText = t;
                    
                        if (shortText && e) {
                            shortText = shortText.split(':');
                            shortText = shortText[shortText.length - 1];
                        } else {
                            shortText = '";
        // line 41
        echo twig_escape_filter($this->env, (isset($context["empty_value"]) ? $context["empty_value"] : null), "html", null, true);
        echo "';
                        }
                        allTreeElts.removeClass('selected').removeClass('parent-selected');
                        chosenElt.parents('li').addClass('parent-selected');
                        if (chosenElt.length) {
                            chosenElt.addClass('selected');
                        }
                        if (shortTextElt.length) {
                            shortTextElt.text(shortText);
                        } else {
                            toolTipElt.before('<span class=\"short-text\">' + shortText + '</span>');
                        }
                        toolTipElt.tooltip('destroy');
                        toolTipElt.tooltip({
                            title: t,
                            trigger: 'hover',
                            placement: '";
        // line 57
        echo twig_escape_filter($this->env, (isset($context["placement"]) ? $context["placement"] : null), "html", null, true);
        echo "'
                        });
                    },
                    init: function(e, t) {
                        var toolTipElt = \$('#";
        // line 61
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo "').siblings('a'),
                            allTreeElts = \$(\"#category_";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo " li\"),
                            chosenElt = \$(\"#category_";
        // line 63
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo " li[rel='\" + t.val() + \"']\"),
                            placeholder = \$(e).attr('placeholder'),
                            shortText = (!e.val() && placeholder) ? '<span class=\"placeholder\">' + placeholder + '</span>' : e.val();
                        if (shortText) {
                            shortText = shortText.split(':');
                            shortText = shortText[shortText.length - 1];
                        } else {
                            shortText = '";
        // line 70
        echo twig_escape_filter($this->env, (isset($context["empty_value"]) ? $context["empty_value"] : null), "html", null, true);
        echo "';
                        }
                        allTreeElts.removeClass('selected').removeClass('parent-selected');
                        toolTipElt.before('<span class=\"short-text\">' + shortText + '</span>');
                        chosenElt.parents('li').addClass('parent-selected');
                        if (chosenElt.length) {
                            chosenElt.addClass('selected');
                        }
                        toolTipElt.tooltip('destroy');
                        toolTipElt.tooltip({
                            title: e.val(),
                            trigger: 'hover',
                            placement: '";
        // line 82
        echo twig_escape_filter($this->env, (isset($context["placement"]) ? $context["placement"] : null), "html", null, true);
        echo "'
                        });
                    },
                    allowParentSelect: ";
        // line 85
        if ((isset($context["allow_parent_select"]) ? $context["allow_parent_select"] : null)) {
            echo "true";
        } else {
            echo "false";
        }
        // line 86
        echo "                });
        })
    })(jQuery);
</script>
";
        // line 90
        echo (isset($context["tree"]) ? $context["tree"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Form:tree_select_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  175 => 90,  169 => 86,  163 => 85,  157 => 82,  142 => 70,  132 => 63,  128 => 62,  124 => 61,  117 => 57,  98 => 41,  88 => 34,  84 => 33,  80 => 32,  76 => 31,  64 => 24,  51 => 13,  46 => 8,  39 => 5,  37 => 4,  29 => 3,  26 => 2,  20 => 1,);
    }
}
