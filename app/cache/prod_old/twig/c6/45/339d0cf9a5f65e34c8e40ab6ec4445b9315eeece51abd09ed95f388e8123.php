<?php

/* CoreConfigBundle:Admin/Form/Type:config_data_widget.html.twig */
class __TwigTemplate_c645339d0cf9a5f65e34c8e40ab6ec4445b9315eeece51abd09ed95f388e8123 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'config_data_widget' => array($this, 'block_config_data_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('config_data_widget', $context, $blocks);
    }

    public function block_config_data_widget($context, array $blocks = array())
    {
        // line 2
        echo "    <textarea ";
        echo " ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " rows=\"20\">";
        echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
        echo "</textarea>
    <input type=\"text\" class=\"span5\" value=\"\" id=\"dataConfigInput\" style=\"display:none\">
    <div id=\"dataConfigEditContent\" style=\"display:none\">
        <style>
            .clearable {
                cursor:pointer;
            }
        </style>
        <div><a class=\"btn sonata-action-element addNewConfig\" href=\"javascript:void(0);\"><i class=\"icon-plus\"></i> Добавить настройку</a></div><br/>
        <div style=\"margin-left:0px;display:none;float:none\" class=\"keyError alert alert-error alert-dismissable span5\">Нельзя добавлять массив с одинаковыми ключами</div>
        <table class=\"table table-bordered table-striped span8\" style=\"margin-left:0px\">
            <thead>
                <tr>
                    <th style=\"width:100px\">Ключ</th>
                    <th style=\"width:100%\">Значение</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script src=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/applicationsonataadmin/js/codemirror/codemirror.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/applicationsonataadmin/js/codemirror/twig.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/applicationsonataadmin/js/codemirror/xml.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/applicationsonataadmin/js/codemirror/htmlmixed.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/applicationsonataadmin/js/codemirror/htmlembedded.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/applicationsonataadmin/js/codemirror/javascript.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/applicationsonataadmin/js/codemirror/css.js"), "html", null, true);
        echo "\"></script>

    <link rel=\"stylesheet\" href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/applicationsonataadmin/css/codemirror.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />

    <script>
        var editor;
        (function(\$){
            \$(function(){
               var selectType = \$(\"select[id\$='_type']\"),
                   formatType = \$(\"select[id\$='_highlight']\"),
                   formatTypeParentBlock = formatType.parents(\"div[id\$='_highlight']\");
               
               if (selectType.val() == 'text' && formatType.val()) {
                    activateCodeMirror(formatType.val());
               }
               if (selectType.val() != 'text') {
                   formatTypeParentBlock.addClass('hidden');
               }
               selectType.change(function(){
                   var \$this = \$(this);
                   if (\$this.val() == 'text') {
                       formatTypeParentBlock.removeClass('hidden');
                   } else {
                       ";
        // line 61
        echo "                       formatTypeParentBlock.addClass('hidden');
                   }
                   if (\$this.val() == 'text' && formatType.val()) {
                       activateCodeMirror(formatType.val());
                   } else if (editor && \$this.val() != 'text'){
                       editor.toTextArea();
                        editor = null;
                       \$('#";
        // line 68
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "id", array()), "html", null, true);
        echo "').css({height: '200px', width: '700px'}).removeClass('hidden');
                   }
               });
               
               formatType.change(function(){
                   var \$this = \$(this);
                   if (\$this.val() && selectType.val()) {
                       if (editor) {
                        editor.toTextArea();
                        editor = null;
                       }
                       activateCodeMirror(\$this.val());
                   } else if (editor && \$this.val() != 'text'){
                       editor.toTextArea();
                       editor = null;
                       \$('#";
        // line 83
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "id", array()), "html", null, true);
        echo "').css({height: '200px', width: '700px'}).removeClass('hidden');
                   }
               });
            });

            var activateCodeMirror = function(modeName) {
                editor = CodeMirror.fromTextArea(document.getElementById(\"";
        // line 89
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "id", array()), "html", null, true);
        echo "\"),
                                            {mode: {name: modeName, htmlMode: true}});
                \$('#";
        // line 91
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "id", array()), "html", null, true);
        echo "').css({height: 0, width: 0, display: 'none'}).addClass('hidden');
            }
        })(jQuery)
        
        var \$typeField = \$(\"#";
        // line 95
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), "html", null, true);
        echo "_type\"),
                \$dataField = \$(\"#";
        // line 96
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), "html", null, true);
        echo "_data\");
    </script>
    <script type=\"text/javascript\" src=\"";
        // line 98
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/coreconfig/js/admin/configData.js"), "html", null, true);
        echo "\"></script>

";
    }

    public function getTemplateName()
    {
        return "CoreConfigBundle:Admin/Form/Type:config_data_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  164 => 98,  159 => 96,  155 => 95,  148 => 91,  143 => 89,  134 => 83,  116 => 68,  107 => 61,  83 => 31,  78 => 29,  74 => 28,  70 => 27,  66 => 26,  62 => 25,  58 => 24,  54 => 23,  26 => 2,  20 => 1,);
    }
}
