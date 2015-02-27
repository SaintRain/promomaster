<?php

/* CoreCommonBundle:Form:ajax_entity_widget.html.twig */
class __TwigTemplate_e211ce4d6aa9975d69a11994f5f8a3369b1d59c5332cf0a6dedb000b754083fb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'ajax_entity_widget' => array($this, 'block_ajax_entity_widget'),
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
        $this->displayBlock('ajax_entity_widget', $context, $blocks);
    }

    public function block_ajax_entity_widget($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        ob_start();
        // line 11
        echo "
        ";
        // line 12
        ob_start();
        // line 13
        echo "            function Select2Default(result, container) {
                var selection = '';
                var len = Object.keys(result).length;
                for (property in result) {
                    if (((property !== 'id' && len > 1) || (property === 'id' && len <= 1)) && result[property].length) {
                        selection += result[property]+'";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["separator"]) ? $context["separator"] : $this->getContext($context, "separator")), "html", null, true);
        echo "';
                    }
                }
                selection = selection.substr(0, selection.length - ";
        // line 21
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["separator"]) ? $context["separator"] : $this->getContext($context, "separator"))), "html", null, true);
        echo ");
                if (container[0].nodeName !== undefined && container[0].nodeName !== 'SPAN') {
                    selection = selection.replace(RegExp('(' + escapeRegExp(\$('.select2-input.select2-focused:focus').val()) + ')', 'gim'), '<u>\$1</u>');
                }
                return selection;
            }
        ";
        $context["formatDefault"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 28
        echo "
        ";
        // line 29
        if (array_key_exists("customise_functions", $context)) {
            // line 30
            echo "            ";
            echo (isset($context["customise_functions"]) ? $context["customise_functions"] : $this->getContext($context, "customise_functions"));
            echo "
        ";
        }
        // line 32
        echo "
        <script>
            var data_";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "id", array()), "html", null, true);
        echo " = {
                class: '";
        // line 35
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "js"), "html", null, true);
        echo "',
                properties: '";
        // line 36
        echo (isset($context["properties_json"]) ? $context["properties_json"] : $this->getContext($context, "properties_json"));
        echo "',
                max_results: ";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["max_results"]) ? $context["max_results"] : $this->getContext($context, "max_results")), "html", null, true);
        echo ",
                entry: '";
        // line 38
        echo twig_escape_filter($this->env, (isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "html", null, true);
        echo "',";
        // line 39
        if (array_key_exists("add_to_query", $context)) {
            echo "add_to_query: '";
            echo (isset($context["add_to_query"]) ? $context["add_to_query"] : $this->getContext($context, "add_to_query"));
            echo "',";
        }
        // line 40
        if ((isset($context["initImages"]) ? $context["initImages"] : $this->getContext($context, "initImages"))) {
            echo "initImages: '";
            echo twig_escape_filter($this->env, (isset($context["initImages"]) ? $context["initImages"] : $this->getContext($context, "initImages")), "html", null, true);
            echo "',";
        }
        // line 41
        echo "}
            \$(function() {
                    \$('input#";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "id", array()), "html", null, true);
        echo "').select2({
                        allowClear: true,
                        ajax: {
                            url: '";
        // line 46
        echo $this->env->getExtension('routing')->getPath(("core_common_ajax_entity" . (((isset($context["frontend"]) ? $context["frontend"] : $this->getContext($context, "frontend"))) ? ("_frontend") : (""))));
        echo "',
                            dataType: 'json',
                            quietMillis: 100,
                            data: function(query, page) {";
        // line 50
        if ((isset($context["isParentCollection"]) ? $context["isParentCollection"] : $this->getContext($context, "isParentCollection"))) {
            // line 51
            echo "if (\$(this).hasClass('collection')) {
                                        var collectionName = \$(this).data('collection');
                                        var selectedIds = \$('input[data-collection=\"' + collectionName + '\"]').map(function(el){
                                            return this.value;
                                        }).get().join(',');
                                        data_";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "id", array()), "html", null, true);
            echo ".selectedIds = selectedIds;
                                    }";
        }
        // line 59
        echo "data_";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "id", array()), "html", null, true);
        echo ".query = query;
                                data_";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "id", array()), "html", null, true);
        echo ".page = page;
                                return data_";
        // line 61
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "id", array()), "html", null, true);
        echo ";
                            },
                            results: function(result, page) {
                                data = [];
                                for (id in result.data) {
                                    data.push(result.data[id]);
                                }
                                return {results: data, more: result.more, total: result.total };
                            }
                        },";
        // line 71
        if (array_key_exists("initData", $context)) {
            // line 72
            echo "initSelection: function(element, callback) {
                                result = ";
            // line 73
            echo (isset($context["initData"]) ? $context["initData"] : $this->getContext($context, "initData"));
            echo ";
                                data = [];
                                for (id in result.data) {
                                    data.push(result.data[id]);
                                }
                                callback(";
            // line 78
            if (($this->getAttribute((isset($context["constructor"]) ? $context["constructor"] : null), "multiple", array(), "any", true, true) && $this->getAttribute((isset($context["constructor"]) ? $context["constructor"] : $this->getContext($context, "constructor")), "multiple", array()))) {
                echo "data";
            } else {
                echo "data[0]";
            }
            echo ");
                            },";
        }
        // line 81
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["constructor"]) ? $context["constructor"] : $this->getContext($context, "constructor")));
        foreach ($context['_seq'] as $context["option"] => $context["value"]) {
            echo twig_escape_filter($this->env, $context["option"], "html", null, true);
            echo ": ";
            if (twig_in_filter("function(", $context["value"])) {
                echo $context["value"];
            } else {
                echo twig_jsonencode_filter($context["value"]);
            }
            echo ", ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['option'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 82
        echo "formatResult:";
        // line 83
        if (array_key_exists("formatResult", $context)) {
            // line 84
            if (((array_key_exists("customise_functions", $context) && array_key_exists("formatResultFromTemplate", $context)) && (isset($context["formatResultFromTemplate"]) ? $context["formatResultFromTemplate"] : $this->getContext($context, "formatResultFromTemplate")))) {
                // line 85
                echo twig_escape_filter($this->env, ((isset($context["formatResult"]) ? $context["formatResult"] : $this->getContext($context, "formatResult")) . (isset($context["subId"]) ? $context["subId"] : $this->getContext($context, "subId"))), "html", null, true);
            } else {
                // line 87
                echo (isset($context["formatResult"]) ? $context["formatResult"] : $this->getContext($context, "formatResult"));
            }
        } else {
            // line 90
            echo (isset($context["formatDefault"]) ? $context["formatDefault"] : $this->getContext($context, "formatDefault"));
        }
        // line 91
        echo ",
                        formatSelection:";
        // line 93
        if (array_key_exists("formatSelection", $context)) {
            // line 94
            if (((array_key_exists("customise_functions", $context) && array_key_exists("formatSelectionFromTemplate", $context)) && (isset($context["formatSelectionFromTemplate"]) ? $context["formatSelectionFromTemplate"] : $this->getContext($context, "formatSelectionFromTemplate")))) {
                // line 95
                echo twig_escape_filter($this->env, ((isset($context["formatSelection"]) ? $context["formatSelection"] : $this->getContext($context, "formatSelection")) . (isset($context["subId"]) ? $context["subId"] : $this->getContext($context, "subId"))), "html", null, true);
            } else {
                // line 97
                echo (isset($context["formatSelection"]) ? $context["formatSelection"] : $this->getContext($context, "formatSelection"));
            }
        } else {
            // line 100
            echo (isset($context["formatDefault"]) ? $context["formatDefault"] : $this->getContext($context, "formatDefault"));
        }
        // line 102
        echo "});

                    ";
        // line 104
        if (array_key_exists("onReset", $context)) {
            // line 105
            if (((array_key_exists("customise_functions", $context) && array_key_exists("onResetFromTemplate", $context)) && (isset($context["onResetFromTemplate"]) ? $context["onResetFromTemplate"] : $this->getContext($context, "onResetFromTemplate")))) {
                // line 106
                echo "\$('input#";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "id", array()), "html", null, true);
                echo "').on('select2-removed', ";
                echo twig_escape_filter($this->env, ((isset($context["onReset"]) ? $context["onReset"] : $this->getContext($context, "onReset")) . (isset($context["subId"]) ? $context["subId"] : $this->getContext($context, "subId"))), "html", null, true);
                echo ");";
            } else {
                // line 108
                echo "\$('input#";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "id", array()), "html", null, true);
                echo "').on('select2-removed',";
                echo (isset($context["onReset"]) ? $context["onReset"] : $this->getContext($context, "onReset"));
                echo ");";
            }
        }
        // line 112
        if ((!(isset($context["frontend"]) ? $context["frontend"] : $this->getContext($context, "frontend")))) {
            // line 113
            echo "customiseHelpBlock();";
        }
        // line 116
        if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "route_edit", array())) {
            // line 118
            echo "\$('input#";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "id", array()), "html", null, true);
            echo "').on('select2-selecting', function (e) {
                            if (e.val) {
                                var \$a = \$('#edit_link_";
            // line 120
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "id", array()), "html", null, true);
            echo "');
                                \$a.attr('href', \$a.data('href').replace(/~id~/g, e.val)).fadeIn('fast');
                            } else {
                                \$a.removeAttr('href').hide();
                            }
                        }).on('select2-removed', function(){
                            \$('#edit_link_";
            // line 126
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "id", array()), "html", null, true);
            echo "').hide();
                        });";
        }
        // line 130
        echo "});
        </script>

        <input type=\"text\" ";
        // line 133
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " value=\"";
        echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
        echo "\" />

        ";
        // line 135
        if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "route_edit", array())) {
            // line 136
            echo "
            <a style=\"margin-left:8px;";
            // line 137
            if ((!(isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")))) {
                echo " display: none;";
            }
            echo "\" id=\"edit_link_";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "id", array()), "html", null, true);
            echo "\" title=\"Перейти на редактирование\" target=\"_blank\" data-href=\"";
            echo $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "route_edit", array()), array("id" => "~id~"));
            echo "\"";
            if ((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value"))) {
                echo " href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "route_edit", array()), array("id" => (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")))), "html", null, true);
                echo "\"";
            }
            echo ">
                <i class=\"icon-edit\" style=\"margin-top: 3px;\"></i>
            </a>

        ";
        }
        // line 142
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Form:ajax_entity_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  318 => 142,  298 => 137,  295 => 136,  293 => 135,  286 => 133,  281 => 130,  276 => 126,  267 => 120,  261 => 118,  259 => 116,  256 => 113,  254 => 112,  246 => 108,  239 => 106,  237 => 105,  235 => 104,  231 => 102,  228 => 100,  224 => 97,  221 => 95,  219 => 94,  217 => 93,  214 => 91,  211 => 90,  207 => 87,  204 => 85,  202 => 84,  200 => 83,  198 => 82,  182 => 81,  173 => 78,  165 => 73,  162 => 72,  160 => 71,  148 => 61,  144 => 60,  139 => 59,  134 => 56,  127 => 51,  125 => 50,  119 => 46,  113 => 43,  109 => 41,  103 => 40,  97 => 39,  94 => 38,  90 => 37,  86 => 36,  82 => 35,  78 => 34,  74 => 32,  68 => 30,  66 => 29,  63 => 28,  53 => 21,  47 => 18,  40 => 13,  38 => 12,  35 => 11,  32 => 10,  26 => 9,  23 => 8,  20 => 1,);
    }
}
