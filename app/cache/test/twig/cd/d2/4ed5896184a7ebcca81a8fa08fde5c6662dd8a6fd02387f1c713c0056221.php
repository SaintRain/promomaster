<?php

/* CoreUnionBundle:Admin/Form:union_widget.html.twig */
class __TwigTemplate_cdd24ed5896184a7ebcca81a8fa08fde5c6662dd8a6fd02387f1c713c0056221 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'union_widget' => array($this, 'block_union_widget'),
            'javascript_union' => array($this, 'block_javascript_union'),
            'buttons_union' => array($this, 'block_buttons_union'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('union_widget', $context, $blocks);
    }

    public function block_union_widget($context, array $blocks = array())
    {
        // line 2
        echo "
";
        // line 4
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "options", array(), "any", false, true), "sortable", array(), "any", true, true)) {
            // line 5
            $context["sortable"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "options", array()), "sortable", array());
        } else {
            // line 7
            $context["sortable"] = "";
        }
        // line 9
        echo "
";
        // line 11
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array(), "any", false, true), "get", array(0 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array())), "method", false, true), (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), array(), "array", true, true)) {
            // line 12
            echo "    ";
            $context["dInfo"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array())), "method"), (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), array(), "array");
            // line 13
            echo "    ";
            $context["unions"] = $this->env->getExtension('checked_union')->getUnionDataList($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "data", array()), (isset($context["dInfo"]) ? $context["dInfo"] : $this->getContext($context, "dInfo")), (isset($context["targetEntity"]) ? $context["targetEntity"] : $this->getContext($context, "targetEntity")), $this->getAttribute((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "class", array()));
        } else {
            // line 15
            echo "    ";
            $context["dInfo"] = false;
            // line 16
            $context["unions"] = $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "data", array());
        }
        // line 18
        echo "
";
        // line 19
        ob_start();
        // line 20
        $this->displayBlock('javascript_union', $context, $blocks);
        // line 121
        echo "
    <div>
";
        // line 123
        $this->displayBlock('buttons_union', $context, $blocks);
        // line 130
        echo "

        <div id=\"field_container_";
        // line 132
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "\" class=\"field-container ";
        if (((!$this->getAttribute((isset($context["unions"]) ? $context["unions"] : $this->getContext($context, "unions")), "count", array())) && (!twig_length_filter($this->env, (isset($context["dInfo"]) ? $context["dInfo"] : $this->getContext($context, "dInfo")))))) {
            echo "hide";
        }
        echo "\">
                ";
        // line 133
        echo twig_include($this->env, $context, "CoreUnionBundle::Admin/Form/generate_table.html.twig", array("dInfo" => (isset($context["dInfo"]) ? $context["dInfo"] : $this->getContext($context, "dInfo")), "subject_id" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "id", array()), "mappedBy" => (isset($context["mappedBy"]) ? $context["mappedBy"] : $this->getContext($context, "mappedBy")), "field_id" => (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "field_name" => (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "unions" => (isset($context["unions"]) ? $context["unions"] : $this->getContext($context, "unions")), "uniqid" => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), "options" => $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "options", array()), "sortable" => (isset($context["sortable"]) ? $context["sortable"] : $this->getContext($context, "sortable"))));
        echo "
            </div>
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 20
    public function block_javascript_union($context, array $blocks = array())
    {
        // line 21
        if ((isset($context["firstUnion"]) ? $context["firstUnion"] : $this->getContext($context, "firstUnion"))) {
            // line 22
            echo "<script src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreunion/Admin/js/union_widget.js"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
";
        }
        // line 23
        echo " 
<script>
var ";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "_options = {
    options: {
            field_name: \"";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "\",
            field_id: \"";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "\",
            subject_id: \"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "id", array()), "html", null, true);
        echo "\",
            mappedBy: \"";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["mappedBy"]) ? $context["mappedBy"] : $this->getContext($context, "mappedBy")), "html", null, true);
        echo "\",
            targetEntity: \"";
        // line 31
        echo twig_escape_filter($this->env, twig_urlencode_filter((isset($context["targetEntity"]) ? $context["targetEntity"] : $this->getContext($context, "targetEntity"))), "html", null, true);
        echo "\",
            uniqid: \"";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), "html", null, true);
        echo "\",
            options: {
                class: \"";
        // line 34
        echo twig_escape_filter($this->env, twig_urlencode_filter($this->getAttribute((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "class", array())), "html", null, true);
        echo "\",
                hideSubjectInList: \"";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "options", array()), "hideSubjectInList", array()), "html", null, true);
        echo "\",
                setThisToTargetObject: \"";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "options", array()), "setThisToTargetObject", array()), "html", null, true);
        echo "\",
                cascadeUpdateToAllTargetObject: \"";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "options", array()), "cascadeUpdateToAllTargetObject", array()), "html", null, true);
        echo "\",
                deleteable: \"";
        // line 38
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "options", array()), "deleteable", array())) {
            echo "1";
        } else {
            echo "0";
        }
        echo "\",
                columns:";
        // line 39
        echo twig_jsonencode_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "options", array()), "columns", array()));
        echo ",
                edit_route: \"";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "options", array()), "edit_route", array()), "html", null, true);
        echo "\",
                create_route: \"";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "options", array()), "create_route", array()), "html", null, true);
        echo "\",
                find_route: \"";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "options", array()), "find_route", array()), "html", null, true);
        echo "\"
                },
            sortable: \"";
        // line 44
        echo twig_escape_filter($this->env, (isset($context["sortable"]) ? $context["sortable"] : $this->getContext($context, "sortable")), "html", null, true);
        echo "\"
            },
    set_record_to_union:\"";
        // line 46
        echo $this->env->getExtension('routing')->getPath("set_record_to_union");
        echo "\",
    unset_record_from_union:\"";
        // line 47
        echo $this->env->getExtension('routing')->getPath("unset_record_from_union");
        echo "\",
    data: {
            ";
        // line 49
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["unions"]) ? $context["unions"] : $this->getContext($context, "unions")));
        foreach ($context['_seq'] as $context["_key"] => $context["union"]) {
            // line 50
            echo "            ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["union"], "targetObject", array()), "id", array()), "html", null, true);
            echo ": {
                id:";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["union"], "targetObject", array()), "id", array()), "html", null, true);
            echo "
            },
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['union'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "        }
    }

    jQuery(document).ready(function(\$) {
    //Добавить запись
    \$('.";
        // line 59
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "_addUnionRecord').click(function() {
    //      document.location = \"";
        // line 60
        echo $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "options", array()), "create_route", array()));
        echo "\";
    });
    
    //Выбрать запись в ноном окне
    \$('body').on('click', '.";
        // line 64
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "_selectRecordToUnion', function() {
    reloadUnionDialogContainer('";
        // line 65
        echo $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "options", array()), "find_route", array()));
        echo "', \"";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "\");
    });
    
    //отметить всё на удаление
    \$('body').on('change', '.select-all-";
        // line 69
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "-delete', function() {
    if (\$(this).attr('checked')) {
    \$('.";
        // line 71
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "__delete').attr('checked', \$(this).attr('checked'));
    }
    else {
    \$('.";
        // line 74
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "__delete').removeAttr('checked');
    }
    });
    
    //отметить всё на открепление
    \$('body').on('change', '.select-all-";
        // line 79
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "-undock', function() {
    if (\$(this).attr('checked')) {
    \$('.";
        // line 81
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "__undock').attr('checked', \$(this).attr('checked'));
    }
    else {
    \$('.";
        // line 84
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "__undock').removeAttr('checked');
    }
    });


    
    ";
        // line 90
        if ((isset($context["sortable"]) ? $context["sortable"] : $this->getContext($context, "sortable"))) {
            // line 91
            echo "    jQuery('div#field_container_";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo " tbody.sonata-ba-tbody').sortable({
    axis: 'y',
            opacity: 0.6,
            items: 'tr.main-row-collection',
            stop: apply_position_value_";
            // line 95
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "
    });
            function apply_position_value_";
            // line 97
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "() {
            // update the input value position
            jQuery('div#field_container_";
            // line 99
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo " tbody.sonata-ba-tbody td.sonata-ba-td-";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "options", array()), "sortable", array()), "html", null, true);
            echo "').each(function(index, element) {

            // remove the sortable handler and put it back
            jQuery('span.sonata-ba-sortable-handler', element).remove();
                    jQuery(element).append('<span class=\"sonata-ba-sortable-handler ui-icon ui-icon-grip-solid-horizontal\"></span>');
                    jQuery('input', element).hide();
            });
                    jQuery('div#field_container_";
            // line 106
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo " tbody.sonata-ba-tbody td.sonata-ba-td-";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "options", array()), "sortable", array()), "html", null, true);
            echo " input').each(function(index, value) {
            jQuery(value).val(index + 1);
            });
            }

    // refresh the sortable option when a new element is added
    jQuery('#sonata-ba-field-container-";
            // line 112
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "').bind('sonata.add_element', function() {
    apply_position_value_";
            // line 113
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "();
            jQuery('div#field_container_";
            // line 114
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo " tbody.sonata-ba-tbody').sortable('refresh');
    });
            apply_position_value_";
            // line 116
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "();    
    ";
        }
        // line 118
        echo "    });
    </script>
";
    }

    // line 123
    public function block_buttons_union($context, array $blocks = array())
    {
        // line 124
        echo "            <p><div class=\"btn-group\">
                <!--<input type=\"button\" class=\"btn ";
        // line 125
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "_addUnionRecord\" name=\"btn_update_and_list\" value=\"Добавить\">&nbsp;-->
                <input type=\"button\" class=\"btn ";
        // line 126
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "_selectRecordToUnion\" name=\"btn_update_and_list\" value=\"Выбрать\">
            </div>
        </p>
";
    }

    public function getTemplateName()
    {
        return "CoreUnionBundle:Admin/Form:union_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  360 => 126,  356 => 125,  353 => 124,  350 => 123,  344 => 118,  339 => 116,  334 => 114,  330 => 113,  326 => 112,  313 => 106,  299 => 99,  294 => 97,  289 => 95,  281 => 91,  279 => 90,  270 => 84,  264 => 81,  259 => 79,  251 => 74,  245 => 71,  240 => 69,  231 => 65,  227 => 64,  220 => 60,  216 => 59,  209 => 54,  200 => 51,  195 => 50,  191 => 49,  186 => 47,  182 => 46,  177 => 44,  172 => 42,  168 => 41,  164 => 40,  160 => 39,  152 => 38,  148 => 37,  144 => 36,  140 => 35,  136 => 34,  131 => 32,  127 => 31,  123 => 30,  119 => 29,  115 => 28,  111 => 27,  106 => 25,  102 => 23,  96 => 22,  94 => 21,  91 => 20,  82 => 133,  74 => 132,  70 => 130,  68 => 123,  64 => 121,  62 => 20,  60 => 19,  57 => 18,  54 => 16,  51 => 15,  47 => 13,  44 => 12,  42 => 11,  39 => 9,  36 => 7,  33 => 5,  31 => 4,  28 => 2,  22 => 1,);
    }
}
