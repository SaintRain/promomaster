<?php

/* ShtumiUsefulBundle::fields.html.twig */
class __TwigTemplate_619454a4301844423d2e9cc078c91ece06dfe45a0d92160c399759d5d75c5b67 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'shtumi_dependent_filtered_entity_widget' => array($this, 'block_shtumi_dependent_filtered_entity_widget'),
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
        $this->displayBlock('shtumi_dependent_filtered_entity_widget', $context, $blocks);
    }

    public function block_shtumi_dependent_filtered_entity_widget($context, array $blocks = array())
    {
        // line 10
        echo "
    <select ";
        // line 11
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo "></select>

    <img src='";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/shtumiuseful/images/ajax-loader.gif"), "html", null, true);
        echo "' id='loader' style='display: none;'>
    <script type=\"text/javascript\">
        jQuery(function(){

            jQuery(\"#";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "parent", array()), "offsetGet", array(0 => (isset($context["parent_field"]) ? $context["parent_field"] : null)), "method"), "vars", array()), "id", array()), "html", null, true);
        echo "\").change( function() {
                var selected_index = ";
        // line 18
        echo twig_escape_filter($this->env, (((isset($context["value"]) ? $context["value"] : null)) ? ((isset($context["value"]) ? $context["value"] : null)) : (0)), "html", null, true);
        echo ";
                jQuery(\"#loader\").show();
                jQuery.ajax({
                    type: \"POST\",
                    data: {
                        parent_id: jQuery(this).val(),
                        entity_alias: \"";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["entity_alias"]) ? $context["entity_alias"] : null), "html", null, true);
        echo "\",
                        empty_value: \"";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["empty_value"]) ? $context["empty_value"] : null), "html", null, true);
        echo "\"
                    },
                    url:\"";
        // line 27
        echo $this->env->getExtension('routing')->getPath("shtumi_dependent_filtered_entity");
        echo "\",
                    success: function(msg){
                        if (msg != ''){
                            jQuery(\"select#";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo "\").html(msg).show();
                            jQuery.each(jQuery(\"select#";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo " option\"), function (index, option){
                                if (jQuery(option).val() == selected_index)
                                    jQuery(option).prop('selected', true);
                            })
                            jQuery(\"select#";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo "\").trigger('change');
                            jQuery(\"#loader\").hide();
                        } else {
                            jQuery(\"select#";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "id", array()), "html", null, true);
        echo "\").html('<em>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["no_result_msg"]) ? $context["no_result_msg"] : null)), "html", null, true);
        echo "</em>');
                            jQuery(\"#loader\").hide();
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError){
                    jQuery('html').html(xhr.responseText);
                    }
                });
            });
            jQuery(\"#";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "parent", array()), "offsetGet", array(0 => (isset($context["parent_field"]) ? $context["parent_field"] : null)), "method"), "vars", array()), "id", array()), "html", null, true);
        echo "\").trigger('change');
        });
    </script>

";
    }

    public function getTemplateName()
    {
        return "ShtumiUsefulBundle::fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  106 => 47,  92 => 38,  86 => 35,  79 => 31,  75 => 30,  69 => 27,  64 => 25,  60 => 24,  51 => 18,  47 => 17,  40 => 13,  35 => 11,  32 => 10,  26 => 9,  23 => 8,  20 => 1,);
    }
}
