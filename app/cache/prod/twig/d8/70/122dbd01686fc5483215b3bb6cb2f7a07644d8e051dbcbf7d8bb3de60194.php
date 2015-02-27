<?php

/* CoreProductBundle:Admin/Form/modifications_widget:product_modifications_widget.html.twig */
class __TwigTemplate_d870122dbd01686fc5483215b3bb6cb2f7a07644d8e051dbcbf7d8bb3de60194 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'product_modifications_widget' => array($this, 'block_product_modifications_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('product_modifications_widget', $context, $blocks);
    }

    public function block_product_modifications_widget($context, array $blocks = array())
    {
        // line 3
        echo "        ";
        $context["general"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), (isset($context["mappedBy"]) ? $context["mappedBy"] : null)), "general", array());
        // line 4
        echo "        ";
        if ($this->getAttribute((isset($context["general"]) ? $context["general"] : null), "id", array(), "any", true, true)) {
            // line 5
            echo "            ";
            $context["general_id"] = $this->getAttribute((isset($context["general"]) ? $context["general"] : null), "id", array());
            // line 6
            echo "        ";
        } else {
            // line 7
            echo "            ";
            $context["general_id"] = 0;
            // line 8
            echo "        ";
        }
        // line 9
        echo "
";
        // line 11
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "options", array(), "any", false, true), "sortable", array(), "any", true, true)) {
            // line 12
            $context["sortable"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "options", array()), "sortable", array());
        } else {
            // line 14
            $context["sortable"] = "";
        }
        // line 16
        echo "
";
        // line 18
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array(), "any", false, true), "get", array(0 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "uniqid", array())), "method", false, true), (isset($context["name"]) ? $context["name"] : null), array(), "array", true, true)) {
            // line 19
            echo "    ";
            $context["dInfo"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "uniqid", array())), "method"), (isset($context["name"]) ? $context["name"] : null), array(), "array");
            // line 20
            echo "    ";
            $context["unions"] = $this->env->getExtension('checked_modification')->getModificationDataList($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "data", array()), (isset($context["dInfo"]) ? $context["dInfo"] : null), $this->getAttribute((isset($context["options"]) ? $context["options"] : null), "class", array()));
        } else {
            // line 22
            echo "    ";
            $context["dInfo"] = false;
            // line 23
            $context["unions"] = $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "data", array());
        }
        // line 25
        echo "

";
        // line 27
        ob_start();
        // line 28
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreproduct/Admin/js/product_modifications_widget.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
<script>
            var ";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "_options = {
    options: {
    field_name: \"";
        // line 32
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "\",
            field_id: \"";
        // line 33
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "\",
            subject_id: \"";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), "id", array()), "html", null, true);
        echo "\",
            mappedBy: \"";
        // line 35
        echo twig_escape_filter($this->env, (isset($context["mappedBy"]) ? $context["mappedBy"] : null), "html", null, true);
        echo "\",
            targetEntity: \"";
        // line 36
        echo twig_escape_filter($this->env, twig_urlencode_filter((isset($context["targetEntity"]) ? $context["targetEntity"] : null)), "html", null, true);
        echo "\",
            uniqid: \"";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "uniqid", array()), "html", null, true);
        echo "\",
            options: {
    class: \"";
        // line 39
        echo twig_escape_filter($this->env, twig_urlencode_filter($this->getAttribute((isset($context["options"]) ? $context["options"] : null), "class", array())), "html", null, true);
        echo "\",
            deleteable: \"";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "options", array()), "deleteable", array()), "html", null, true);
        echo "\",
            hideSubjectInList: \"";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "options", array()), "hideSubjectInList", array()), "html", null, true);
        echo "\",
            setThisToTargetObject: \"";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "options", array()), "setThisToTargetObject", array()), "html", null, true);
        echo "\",
            columns:";
        // line 43
        echo twig_jsonencode_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "options", array()), "columns", array()));
        echo ",
            edit_route: \"";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "options", array()), "edit_route", array()), "html", null, true);
        echo "\",
            create_route: \"";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "options", array()), "create_route", array()), "html", null, true);
        echo "\",
            find_route: \"";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "options", array()), "find_route", array()), "html", null, true);
        echo "\"
    },
            sortable: \"";
        // line 48
        echo twig_escape_filter($this->env, (isset($context["sortable"]) ? $context["sortable"] : null), "html", null, true);
        echo "\"
    },
            set_record_to_union:\"";
        // line 50
        echo $this->env->getExtension('routing')->getPath("set_record_to_modification");
        echo "\",
            unset_record_from_union:\"";
        // line 51
        echo $this->env->getExtension('routing')->getPath("unset_record_from_modification");
        echo "\",
            data: {
        ";
        // line 53
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["unions"]) ? $context["unions"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            // line 54
            echo "        ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "id", array()), "html", null, true);
            echo ": {
    id:";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute($context["d"], "id", array()), "html", null, true);
            echo "
    },
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "    }
    }

    jQuery(document).ready(function(\$) {

    //Выбрать запись как модификацию
    \$('.";
        // line 64
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "_UnionThisToGroupModificationSelect').click(function() {
    reloadModificationsDialogContainer('";
        // line 65
        echo $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "options", array()), "find_route", array()));
        echo "', \"";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "\");
    });
            //Создать модификацию
            \$('.";
        // line 68
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "_UnionThisToGroupModificationAdd').click(function() {
    var newArticle = prompt(\"Пожалуйста, укажите новый артикул\", \$('#";
        // line 69
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "uniqid", array()), "html", null, true);
        echo "_article').val());
    
            if (newArticle !== null && newArticle!='' && newArticle!=\$('#";
        // line 71
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "uniqid", array()), "html", null, true);
        echo "_article').val()) {
    var indexPosition = \$('.";
        // line 72
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "__delete').length + 1;
            //Даные для создания модификации
            var new_options =";
        // line 74
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "_options.options;
            new_options.newArticle = newArticle;
            new_options.indexPosition = indexPosition;
                                        ";
        // line 77
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "_createModification(new_options);
                                            }
                                            });
                                                    /**
                                                     * Создание модификации
                                                     * @param {type} options
                                                     * @returns {undefined}
                                                     */
                                                            function ";
        // line 85
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "_createModification(data) {
                                                            \$.post(
                                                                    \"";
        // line 87
        echo $this->env->getExtension('routing')->getPath($this->getAttribute((isset($context["options"]) ? $context["options"] : null), "create_route", array()));
        echo "\",
                                                                    data,
                                                                    function(res) {
                                                                    addUnionRows(res, \"";
        // line 90
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "\");
                                                                    }
                                                            );
                                                            }
                                                    //отметить всё на удаление
                                                    \$('body').on('change', '.select-all-";
        // line 95
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "-delete', function() {
                                                    if (\$(this).attr('checked')) {
                                                    \$('.";
        // line 97
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "__delete').attr('checked', \$(this).attr('checked'));
                                                    }
                                                    else {
                                                    \$('.";
        // line 100
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "__delete').removeAttr('checked');
                                                    }
                                                    });
                                                            //отметить всё а открепление
                                                            \$('body').on('change', '.select-all-";
        // line 104
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "-undock', function() {
                                                    if (\$(this).attr('checked')) {
                                                    \$('.";
        // line 106
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "__undock').attr('checked', \$(this).attr('checked'));
                                                    }
                                                    else {
                                                    \$('.";
        // line 109
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
        echo "__undock').removeAttr('checked');
                                                    }
                                                    });
    ";
        // line 112
        if ((isset($context["sortable"]) ? $context["sortable"] : null)) {
            // line 113
            echo "                                                    jQuery('div#field_container_";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo " tbody.sonata-ba-tbody').sortable({
                                                    axis: 'y',
                                                            opacity: 0.6,
                                                            items: 'tr.main-row-collection',
                                                            stop: apply_position_value_";
            // line 117
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "
                                                    });
                                                            function apply_position_value_";
            // line 119
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "() {
                                                            // update the input value position
                                                            jQuery('div#field_container_";
            // line 121
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo " tbody.sonata-ba-tbody td.sonata-ba-td-";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "options", array()), "sortable", array()), "html", null, true);
            echo "').each(function(index, element) {

                                                            // remove the sortable handler and put it back
                                                            jQuery('span.sonata-ba-sortable-handler', element).remove();
                                                                    jQuery(element).append('<span class=\"sonata-ba-sortable-handler ui-icon ui-icon-grip-solid-horizontal\"></span>');
                                                                    jQuery('input', element).hide();
                                                            });
                                                                    jQuery('div#field_container_";
            // line 128
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo " tbody.sonata-ba-tbody td.sonata-ba-td-";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "options", array()), "sortable", array()), "html", null, true);
            echo " input').each(function(index, value) {
                                                            jQuery(value).val(index + 1);
                                                            });
                                                            }

                                                    // refresh the sortable option when a new element is added
                                                    jQuery('#sonata-ba-field-container-";
            // line 134
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "').bind('sonata.add_element', function() {
                                                    apply_position_value_";
            // line 135
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "();
                                                            jQuery('div#field_container_";
            // line 136
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo " tbody.sonata-ba-tbody').sortable('refresh');
                                                    });
                                                            apply_position_value_";
            // line 138
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "();
                                                    });
    ";
        }
        // line 141
        echo "    </script>

        ";
        // line 143
        if ((!$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), "id", array()))) {
            // line 144
            echo "    Редактировать данное свойство можно только после создания записи
        ";
        } else {
            // line 146
            echo "
    <div class=\"";
            // line 147
            if ((!$this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), "id", array()))) {
                echo "hidden ";
            }
            echo "\">

        <p><div class=\"btn-group\"><input type=\"button\" class=\"btn ";
            // line 149
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "_UnionThisToGroupModificationAdd\" value=\"Создать модификацию\">
            <input type=\"button\" class=\"btn ";
            // line 150
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "_UnionThisToGroupModificationSelect\" value=\"Выбрать\"></div>
    </p>

    <div id=\"field_container_";
            // line 153
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true);
            echo "\" class=\"field-container ";
            if (((!$this->getAttribute((isset($context["unions"]) ? $context["unions"] : null), "count", array())) || ($this->getAttribute((isset($context["unions"]) ? $context["unions"] : null), "count", array()) < 2))) {
                echo "hide";
            }
            echo "\">
                ";
            // line 154
            echo twig_include($this->env, $context, "CoreProductBundle::Admin/Form/modifications_widget/generate_table.html.twig", array("dInfo" => (isset($context["dInfo"]) ? $context["dInfo"] : null), "general_id" => (isset($context["general_id"]) ? $context["general_id"] : null), "subject_id" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "subject", array()), "id", array()), "mappedBy" => (isset($context["mappedBy"]) ? $context["mappedBy"] : null), "field_id" => (isset($context["id"]) ? $context["id"] : null), "field_name" => (isset($context["name"]) ? $context["name"] : null), "data" => (isset($context["unions"]) ? $context["unions"] : null), "uniqid" => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "uniqid", array()), "options" => $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "options", array()), "sortable" => (isset($context["sortable"]) ? $context["sortable"] : null)));
            echo "
        </div>
    </div>
        ";
        }
        // line 158
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Admin/Form/modifications_widget:product_modifications_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  400 => 158,  393 => 154,  385 => 153,  379 => 150,  375 => 149,  368 => 147,  365 => 146,  361 => 144,  359 => 143,  355 => 141,  349 => 138,  344 => 136,  340 => 135,  336 => 134,  323 => 128,  309 => 121,  304 => 119,  299 => 117,  291 => 113,  289 => 112,  283 => 109,  277 => 106,  272 => 104,  265 => 100,  259 => 97,  254 => 95,  246 => 90,  240 => 87,  235 => 85,  224 => 77,  218 => 74,  213 => 72,  209 => 71,  204 => 69,  200 => 68,  192 => 65,  188 => 64,  180 => 58,  171 => 55,  166 => 54,  162 => 53,  157 => 51,  153 => 50,  148 => 48,  143 => 46,  139 => 45,  135 => 44,  131 => 43,  127 => 42,  123 => 41,  119 => 40,  115 => 39,  110 => 37,  106 => 36,  102 => 35,  98 => 34,  94 => 33,  90 => 32,  85 => 30,  79 => 28,  77 => 27,  73 => 25,  70 => 23,  67 => 22,  63 => 20,  60 => 19,  58 => 18,  55 => 16,  52 => 14,  49 => 12,  47 => 11,  44 => 9,  41 => 8,  38 => 7,  35 => 6,  32 => 5,  29 => 4,  26 => 3,  20 => 1,);
    }
}
