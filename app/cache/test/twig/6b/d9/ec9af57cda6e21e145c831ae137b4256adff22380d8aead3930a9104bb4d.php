<?php

/* CoreFileBundle:Admin/Form:multiupload_document_widget.html.twig */
class __TwigTemplate_6bd9ec9af57cda6e21e145c831ae137b4256adff22380d8aead3930a9104bb4d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $_trait_0 = $this->env->loadTemplate("SonataAdminBundle:Form:form_admin_fields.html.twig");
        // line 10
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."SonataAdminBundle:Form:form_admin_fields.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'multiupload_document_widget' => array($this, 'block_multiupload_document_widget'),
            )
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 9
        echo "
";
        // line 11
        echo "
";
        // line 12
        $this->displayBlock('multiupload_document_widget', $context, $blocks);
    }

    public function block_multiupload_document_widget($context, array $blocks = array())
    {
        // line 13
        echo "
    <div id=\"field_container_";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "\" class=\"field-container\">

<!-- clear -->

    ";
        // line 18
        if ((isset($context["firstTable"]) ? $context["firstTable"] : $this->getContext($context, "firstTable"))) {
            // line 19
            echo "
        ";
            // line 21
            echo "
        <link rel=\"stylesheet\" href=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corefile/core_file.css"), "html", null, true);
            echo "\" />

        ";
            // line 25
            echo "
        <script>
            var core_file_ajax_upload_file = '";
            // line 27
            echo $this->env->getExtension('routing')->getPath("core_file_ajax_upload_file");
            echo "',
                core_file_ajax_remove_file = '";
            // line 28
            echo $this->env->getExtension('routing')->getPath("core_file_ajax_remove_file");
            echo "',
                sonata_admin_append_form_element_documents = [],
                core_file_sortable = [];
        </script>
        <script src=\"";
            // line 32
            echo $this->env->getExtension('assets')->getAssetUrl("bundles/corefile/core_file.js");
            echo "\" type=\"text/javascript\"></script>
        <script src=\"";
            // line 33
            echo $this->env->getExtension('assets')->getAssetUrl("bundles/corefile/core_file_document.js");
            echo "\" type=\"text/javascript\"></script>

        ";
            // line 36
            echo "
    ";
        }
        // line 38
        echo "
    ";
        // line 40
        echo "    <script>
        ";
        // line 42
        echo "
            ";
        // line 43
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "subclass"), "method")) {
            // line 44
            echo "                ";
            $context["link_parameters"] = ("&subclass=" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "subclass"), "method"));
            // line 45
            echo "            ";
        } else {
            // line 46
            echo "                ";
            $context["link_parameters"] = "";
            // line 47
            echo "            ";
        }
        // line 48
        echo "
            sonata_admin_append_form_element_documents['";
        // line 49
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "'] = '";
        echo ($this->env->getExtension('routing')->getUrl("sonata_admin_append_form_element", array("code" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "root", array()), "code", array()), "elementId" => (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "objectId" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "root", array()), "id", array(0 => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "root", array()), "subject", array())), "method"), "uniqid" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "root", array()), "uniqid", array()))) . (isset($context["link_parameters"]) ? $context["link_parameters"] : $this->getContext($context, "link_parameters")));
        // line 54
        echo "';
        ";
        // line 56
        echo "    </script>

    ";
        // line 59
        echo "    <div class=\"pull-left\">
        <a class=\"btn btn-large fake-input-file fake-input-file-main";
        // line 60
        if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "disabled", array())) {
            echo " disabled";
        }
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.upload", array(), "CoreFileBundle"), "html", null, true);
        echo "\"><span class=\"icon-trash icon-upload\"></span> ";
        if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array(), "any", false, true), "attr", array(), "any", false, true), "multiple", array(), "any", true, true) || (twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array())) < 1)) || (!$this->getAttribute($this->getAttribute(twig_first($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array())), "vars", array()), "value", array())))) {
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.upload", array(), "CoreFileBundle"), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.upload_other", array(), "CoreFileBundle"), "html", null, true);
        }
        echo "</a>
        <input type=\"file\" ";
        // line 61
        if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "disabled", array())) {
            echo "disabled=\"disabled\"";
        }
        echo " data-form_id_field=\"";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "\" name=\"CoreFileBundleInput[";
        echo twig_escape_filter($this->env, (isset($context["uniqId"]) ? $context["uniqId"] : $this->getContext($context, "uniqId")), "html", null, true);
        echo "][filesToUpload][]\" class=\"ajax-document-upload-main oneForOne";
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "attr", array()), "class", array()), "html", null, true);
        echo "\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " ";
        echo " data-count_of_attached_files=\"";
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array())) && $this->getAttribute($this->getAttribute(twig_first($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array())), "vars", array()), "value", array()))) {
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array())), "html", null, true);
        }
        echo "\"/>
        <input type=\"hidden\" class=\"ajax-form_id\" name=\"CoreFileBundleInput[";
        // line 62
        echo twig_escape_filter($this->env, (isset($context["uniqId"]) ? $context["uniqId"] : $this->getContext($context, "uniqId")), "html", null, true);
        echo "][form_id]\" value=\"";
        echo twig_escape_filter($this->env, (isset($context["uniqId"]) ? $context["uniqId"] : $this->getContext($context, "uniqId")), "html", null, true);
        echo "\"/>
        <input type=\"hidden\" class=\"ajax-id\" name=\"CoreFileBundleInput[";
        // line 63
        echo twig_escape_filter($this->env, (isset($context["uniqId"]) ? $context["uniqId"] : $this->getContext($context, "uniqId")), "html", null, true);
        echo "][id]\" value=\"";
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "id", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "id", array()), "html", null, true);
        } else {
            echo "0";
        }
        echo "\"/>
        <input type=\"hidden\" class=\"ajax-type\" name=\"CoreFileBundleInput[";
        // line 64
        echo twig_escape_filter($this->env, (isset($context["uniqId"]) ? $context["uniqId"] : $this->getContext($context, "uniqId")), "html", null, true);
        echo "][type]\" value=\"document\"/>
        <input type=\"hidden\" class=\"ajax-field\" name=\"CoreFileBundleInput[";
        // line 65
        echo twig_escape_filter($this->env, (isset($context["uniqId"]) ? $context["uniqId"] : $this->getContext($context, "uniqId")), "html", null, true);
        echo "][fieldName]\" value=\"";
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "\"/>
        <input type=\"hidden\" class=\"ajax-namespace_to_attach\" name=\"CoreFileBundleInput[";
        // line 66
        echo twig_escape_filter($this->env, (isset($context["uniqId"]) ? $context["uniqId"] : $this->getContext($context, "uniqId")), "html", null, true);
        echo "][namespace_to_attach]\" value=\"";
        echo twig_escape_filter($this->env, (isset($context["namespace_to_attach"]) ? $context["namespace_to_attach"] : $this->getContext($context, "namespace_to_attach")), "html", null, true);
        echo "\"/>
        <input type=\"hidden\" class=\"ajax-namespace_to_insert\" name=\"CoreFileBundleInput[";
        // line 67
        echo twig_escape_filter($this->env, (isset($context["uniqId"]) ? $context["uniqId"] : $this->getContext($context, "uniqId")), "html", null, true);
        echo "][namespace_to_insert]\" value=\"";
        echo twig_escape_filter($this->env, (isset($context["namespace_to_insert"]) ? $context["namespace_to_insert"] : $this->getContext($context, "namespace_to_insert")), "html", null, true);
        echo "\"/>
        <span class=\"counter-of-documents\">&nbsp;&nbsp;&nbsp;Отправлено файлов: <b class=\"count-of-sended\">0</b> из <b class=\"count-all-to-send\">0</b></span>
        &nbsp;&nbsp;&nbsp;
    </div>

    <div class=\"line10\"></div>

    <div class=\"progress progress-info progress-file progress-striped active\">
        <div class=\"bar\" style=\"width: 0%;\">
            <span>0%</span>
        </div>
    </div>

    <div class=\"clearfix\"></div>
    <div class=\"alert alert-danger ajax-error-main hidden hide-by-timer\" data-hide-after=\"25\"></div>
    <div class=\"alert alert-success ajax-success-main hidden hide-by-timer\" data-hide-after=\"10\"></div>
    <div class=\"clearfix\"></div>

<!-- /clear -->



    ";
        // line 90
        echo "    ";
        if ((!$this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "hasassociationadmin", array()))) {
            // line 91
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")));
            foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                // line 92
                echo "            ";
                echo twig_escape_filter($this->env, $this->env->getExtension('sonata_admin')->renderRelationElement($context["element"], $this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array())), "html", null, true);
                echo "
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 94
            echo "    ";
        } else {
            // line 95
            echo "
    ";
            // line 96
            $context["index"] = 0;
            // line 97
            echo "
    <span id=\"field_widget_";
            // line 98
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "\"  class=\"field-container-tbl\">
        ";
            // line 99
            if (((twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array())) > 0) && $this->getAttribute($this->getAttribute(twig_first($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array())), "vars", array()), "value", array()))) {
                // line 100
                echo "            <table id=\"document-table_";
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo "\" class=\"table table-bordered document-table\" style=\"width:";
                echo twig_escape_filter($this->env, (isset($context["width"]) ? $context["width"] : $this->getContext($context, "width")), "html", null, true);
                echo "\">
                <thead>
                    <tr>
                        ";
                // line 103
                $context["keys"] = twig_get_array_keys_filter($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array()));
                // line 104
                echo "                        ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array()), twig_first($this->env, (isset($context["keys"]) ? $context["keys"] : $this->getContext($context, "keys"))), array(), "array"), "children", array()));
                foreach ($context['_seq'] as $context["field_name"] => $context["nested_field"]) {
                    // line 105
                    echo "                            ";
                    if (((!twig_in_filter($context["field_name"], (isset($context["hide_field"]) ? $context["hide_field"] : $this->getContext($context, "hide_field"))) && !twig_in_filter("all", (isset($context["hide_field"]) ? $context["hide_field"] : $this->getContext($context, "hide_field")))) || (twig_in_filter("all", (isset($context["hide_field"]) ? $context["hide_field"] : $this->getContext($context, "hide_field"))) && twig_in_filter($context["field_name"], array(0 => "_delete", 1 => "name", 2 => "size", 3 => "file", 4 => "indexPosition"))))) {
                        // line 106
                        echo "                                ";
                        if (($context["field_name"] == "_delete")) {
                            // line 107
                            echo "                                    <th width=\"50\" class=\"text-left nowrap\" nowrap>
                                        ";
                            // line 108
                            if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array(), "any", false, true), "attr", array(), "any", false, true), "multiple", array(), "any", true, true)) {
                                // line 109
                                echo "                                            <input type=\"checkbox\" class=\"select-all-for-delete\" title=\"";
                                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.select_all", array(), "CoreFileBundle"), "html", null, true);
                                echo "\">&nbsp;
                                        ";
                            }
                            // line 111
                            echo "                                        ";
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("action_delete", array(), "CoreFileBundle"), "html", null, true);
                            echo "
                                    </th>
                                ";
                        } else {
                            // line 114
                            echo "                                    ";
                            $context["label"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "sonata_admin", array(), "array"), "admin", array()), "trans", array(0 => $this->env->getExtension('translator')->trans($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "label", array()), array(), "CoreFileBundle")), "method");
                            // line 115
                            echo "                                    <th ";
                            echo (($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "required", array(), "array")) ? ("class=\"required\"") : (""));
                            echo " ";
                            if ((!(isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")))) {
                                echo "class=\"hidden\"";
                            }
                            echo ">
                                        ";
                            // line 116
                            echo twig_escape_filter($this->env, (isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), "html", null, true);
                            echo "
                                    </th>
                                ";
                        }
                        // line 119
                        echo "                            ";
                    }
                    // line 120
                    echo "                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['field_name'], $context['nested_field'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 121
                echo "                    </tr>
                </thead>
                <tbody class=\"sonata-ba-tbody\">
                    ";
                // line 124
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array()));
                foreach ($context['_seq'] as $context["nested_group_field_name"] => $context["nested_group_field"]) {
                    // line 125
                    echo "                        <tr class=\"main-row-collection\">
                            ";
                    // line 126
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["nested_group_field"], "children", array()));
                    foreach ($context['_seq'] as $context["field_name"] => $context["nested_field"]) {
                        // line 127
                        echo "                                ";
                        if (((!twig_in_filter($context["field_name"], (isset($context["hide_field"]) ? $context["hide_field"] : $this->getContext($context, "hide_field"))) && !twig_in_filter("all", (isset($context["hide_field"]) ? $context["hide_field"] : $this->getContext($context, "hide_field")))) || (twig_in_filter("all", (isset($context["hide_field"]) ? $context["hide_field"] : $this->getContext($context, "hide_field"))) && twig_in_filter($context["field_name"], array(0 => "_delete", 1 => "name", 2 => "size", 3 => "file", 4 => "indexPosition"))))) {
                            // line 128
                            echo "                                    ";
                            if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "associationadmin", array(), "any", false, true), "formfielddescriptions", array(), "any", false, true), $context["field_name"], array(), "array", true, true)) {
                                // line 129
                                echo "                                        ";
                                $context["filedType"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "sonata_admin", array()), "admin", array()), "formFieldDescriptions", array()), $context["field_name"], array(), "array"), "type", array());
                                // line 130
                                echo "                                    ";
                            } else {
                                // line 131
                                echo "                                        ";
                                $context["filedType"] = "";
                                // line 132
                                echo "                                    ";
                            }
                            // line 133
                            echo "                                    <td class=\"sonata-ba-td-";
                            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                            echo "-";
                            echo twig_escape_filter($this->env, $context["field_name"], "html", null, true);
                            echo " control-group";
                            if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "errors", array())) > 0)) {
                                echo " error";
                            }
                            echo " ";
                            if (((($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "name", array()) == "name") || ($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "name", array()) == "indexPosition")) && ($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "label", array()) == false))) {
                                echo "hidden";
                            }
                            echo "\" ";
                            if ((((isset($context["filedType"]) ? $context["filedType"] : $this->getContext($context, "filedType")) == "file") || ($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "name", array()) == "size"))) {
                                echo "width=\"100px\"";
                            }
                            echo " ";
                            if (($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "name", array()) == "name")) {
                                echo "style=\"max-width:250px;\" width=\"250px\"";
                            }
                            echo ">
                                        ";
                            // line 134
                            if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "associationadmin", array(), "any", false, true), "formfielddescriptions", array(), "any", false, true), $context["field_name"], array(), "array", true, true)) {
                                // line 135
                                echo "                                            ";
                                if (((isset($context["filedType"]) ? $context["filedType"] : $this->getContext($context, "filedType")) == "file")) {
                                    // line 136
                                    echo "                                                ";
                                    $context["d"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_group_field"], "children", array()), $context["field_name"], array(), "array"), "parent", array()), "vars", array()), "value", array());
                                    // line 137
                                    echo "                                                <a class=\"btn download-document nowrap ";
                                    if ((!(isset($context["d"]) ? $context["d"] : $this->getContext($context, "d")))) {
                                        echo "disabled";
                                    }
                                    echo "\" href=\"";
                                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter((isset($context["d"]) ? $context["d"] : $this->getContext($context, "d")))), "html", null, true);
                                    echo "\" target=\"_blank\" title=\"";
                                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.download", array(), "CoreFileBundle"), "html", null, true);
                                    echo "\"><span class=\"icon-download\"></span> ";
                                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.download", array(), "CoreFileBundle"), "html", null, true);
                                    echo "</a>
                                                <div class=\"alert alert-danger ajax-error-";
                                    // line 138
                                    if ((isset($context["d"]) ? $context["d"] : $this->getContext($context, "d"))) {
                                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : $this->getContext($context, "d")), "id", array()), "html", null, true);
                                    } else {
                                        echo "0";
                                    }
                                    echo " hidden hide-by-timer\" data-hide-after=\"10\"></div>
                                                <div class=\"alert alert-success ajax-success-";
                                    // line 139
                                    if ((isset($context["d"]) ? $context["d"] : $this->getContext($context, "d"))) {
                                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["d"]) ? $context["d"] : $this->getContext($context, "d")), "id", array()), "html", null, true);
                                    } else {
                                        echo "0";
                                    }
                                    echo " hidden hide-by-timer\" data-hide-after=\"5\"></div>
                                            ";
                                } else {
                                    // line 141
                                    echo "                                                ";
                                    $context["aClass"] = $this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "attr", array()), "class", array());
                                    // line 142
                                    echo "                                                ";
                                    if (($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "name", array()) == "name")) {
                                        // line 143
                                        echo "                                                    <span class=\"file-name-text\">";
                                        if ($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array(), "any", false, true), "value", array(), "any", true, true)) {
                                            if (twig_in_filter("#", $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "value", array()))) {
                                                echo twig_escape_filter($this->env, $this->getAttribute(twig_split_filter($this->env, $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "value", array()), "#"), 1, array(), "array"), "html", null, true);
                                            } else {
                                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "value", array()), "html", null, true);
                                            }
                                        }
                                        echo "</span>
                                                    ";
                                        // line 144
                                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget', array("attr" => array("class" => ("hidden hidden-always file-name " . (isset($context["aClass"]) ? $context["aClass"] : $this->getContext($context, "aClass"))))));
                                        echo "
                                                ";
                                    } elseif (($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "name", array()) == "size")) {
                                        // line 146
                                        echo "                                                    <span class=\"human-size nowrap\">";
                                        if ($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array(), "any", false, true), "value", array(), "any", true, true)) {
                                            echo twig_escape_filter($this->env, $this->env->getExtension('filter_extension')->getHumanFileSizeFilter($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "value", array())), "html", null, true);
                                        }
                                        echo "</span>
                                                    ";
                                        // line 147
                                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget', array("attr" => array("class" => ("hidden hidden-always file-size " . (isset($context["aClass"]) ? $context["aClass"] : $this->getContext($context, "aClass"))))));
                                        echo "
                                                ";
                                    } elseif (($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "name", array()) == "indexPosition")) {
                                        // line 149
                                        echo "                                                    ";
                                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget', array("attr" => array("class" => ("file-indexPosition " . (isset($context["aClass"]) ? $context["aClass"] : $this->getContext($context, "aClass"))))));
                                        echo "
                                                ";
                                    } else {
                                        // line 151
                                        echo "                                                    ";
                                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                                        echo "
                                                ";
                                    }
                                    // line 153
                                    echo "                                            ";
                                }
                                // line 154
                                echo "
                                            ";
                                // line 155
                                $context["dummy"] = $this->getAttribute($context["nested_group_field"], "setrendered", array());
                                // line 156
                                echo "                                        ";
                            } else {
                                // line 157
                                echo "                                            ";
                                if (($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "name", array()) == "_delete")) {
                                    // line 158
                                    echo "                                                ";
                                    $context["index"] = ((isset($context["index"]) ? $context["index"] : $this->getContext($context, "index")) + 1);
                                    // line 159
                                    echo "                                                ";
                                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget', array("attr" => array("class" => "checkbox-delete")));
                                    echo "
                                                &nbsp;
                                                <span class=\"remove-file icon-trash";
                                    // line 161
                                    if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "disabled", array())) {
                                        echo " disabled icon-gray";
                                    }
                                    echo "\" data-id=\"";
                                    if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_group_field"], "children", array(), "any", false, true), $context["field_name"], array(), "array", false, true), "parent", array(), "any", false, true), "vars", array(), "any", false, true), "value", array(), "any", false, true), "id", array(), "any", true, true)) {
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_group_field"], "children", array()), $context["field_name"], array(), "array"), "parent", array()), "vars", array()), "value", array()), "id", array()), "html", null, true);
                                    }
                                    echo "\"></span>
                                                ";
                                    // line 162
                                    if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array(), "any", false, true), "attr", array(), "any", false, true), "multiple", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "attr", array()), "multiple", array()) == true))) {
                                        // line 163
                                        echo "                                                    <br>
                                                    <span class=\"muted\"># <span class=\"position\" title=\"Номер п/п\">";
                                        // line 164
                                        echo twig_escape_filter($this->env, (isset($context["index"]) ? $context["index"] : $this->getContext($context, "index")), "html", null, true);
                                        echo "</span></span>
                                                ";
                                    }
                                    // line 166
                                    echo "                                            ";
                                } else {
                                    // line 167
                                    echo "                                                ";
                                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                                    echo "
                                            ";
                                }
                                // line 169
                                echo "                                        ";
                            }
                            // line 170
                            echo "                                        ";
                            if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "errors", array())) > 0)) {
                                // line 171
                                echo "                                            <div class=\"help-inline sonata-ba-field-error-messages\">
                                                ";
                                // line 172
                                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'errors');
                                echo "
                                            </div>
                                        ";
                            }
                            // line 175
                            echo "                                    </td>
                                ";
                        }
                        // line 177
                        echo "                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['field_name'], $context['nested_field'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 178
                    echo "                        </tr>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['nested_group_field_name'], $context['nested_group_field'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 180
                echo "                </tbody>
            </table>
        ";
            }
            // line 183
            echo "    </span>



<!-- clear -->
        ";
            // line 189
            echo "
        ";
            // line 190
            if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "options", array(), "any", false, true), "sortable", array(), "any", true, true)) {
                // line 191
                echo "            <script type=\"text/javascript\">
                jQuery('div#field_container_";
                // line 192
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo " tbody.sonata-ba-tbody').sortable({
                    axis: 'y',
                    opacity: 0.6,
                    items: 'tr.main-row-collection',
                    stop: apply_position_value_";
                // line 196
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo ",
                    create: function (event, ui) {
                        ";
                // line 199
                echo "                        ";
                if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array(), "any", false, true), "get", array(0 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array())), "method", false, true), (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), array(), "array", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "id", array()))) {
                    // line 200
                    echo "                            var core_file_sortable = [];
                            ";
                    // line 201
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_array_keys_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array())), "method"), (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), array(), "array")));
                    foreach ($context['_seq'] as $context["i"] => $context["pos"]) {
                        // line 202
                        echo "                                core_file_sortable.push('";
                        echo twig_escape_filter($this->env, $context["pos"], "html", null, true);
                        echo "');
                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['i'], $context['pos'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 204
                    echo "                            // если задана сортировка, из пост запроса то строим таблицу в нужном порядке
                            var sortableList = \$('div#field_container_";
                    // line 205
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo " tbody.sonata-ba-tbody'),
                            listitems = \$('tr.main-row-collection', sortableList);

                            for (var i in core_file_sortable) {
                                sortableList.append(listitems[core_file_sortable[i]]);
                            }
                        ";
                }
                // line 212
                echo "                    }

                });

                function apply_position_value_";
                // line 216
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo "() {
                    // update the input value position
                    jQuery('div#field_container_";
                // line 218
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
                // line 225
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo " tbody.sonata-ba-tbody td.sonata-ba-td-";
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "options", array()), "sortable", array()), "html", null, true);
                echo " input').each(function(index, value) {
                        jQuery(value).val(index + 1);
                        \$(this).closest('tr').find('span.position').text(index + 1);
                    });
                }

                // refresh the sortable option when a new element is added
                jQuery('#sonata-ba-field-container-";
                // line 232
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo "').bind('sonata.add_element', function() {
                    apply_position_value_";
                // line 233
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo "();
                    jQuery('div#field_container_";
                // line 234
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo " tbody.sonata-ba-tbody').sortable('refresh');
                });

                apply_position_value_";
                // line 237
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo "();

            </script>
        ";
            }
        }
        // line 242
        echo "
<!-- /clear -->
    </div>

";
    }

    public function getTemplateName()
    {
        return "CoreFileBundle:Admin/Form:multiupload_document_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  682 => 242,  674 => 237,  668 => 234,  664 => 233,  660 => 232,  646 => 225,  632 => 218,  627 => 216,  621 => 212,  611 => 205,  608 => 204,  599 => 202,  595 => 201,  592 => 200,  589 => 199,  584 => 196,  577 => 192,  574 => 191,  572 => 190,  569 => 189,  562 => 183,  557 => 180,  550 => 178,  544 => 177,  540 => 175,  534 => 172,  531 => 171,  528 => 170,  525 => 169,  519 => 167,  516 => 166,  511 => 164,  508 => 163,  506 => 162,  496 => 161,  490 => 159,  487 => 158,  484 => 157,  481 => 156,  479 => 155,  476 => 154,  473 => 153,  467 => 151,  461 => 149,  456 => 147,  449 => 146,  444 => 144,  433 => 143,  430 => 142,  427 => 141,  418 => 139,  410 => 138,  397 => 137,  394 => 136,  391 => 135,  389 => 134,  366 => 133,  363 => 132,  360 => 131,  357 => 130,  354 => 129,  351 => 128,  348 => 127,  344 => 126,  341 => 125,  337 => 124,  332 => 121,  326 => 120,  323 => 119,  317 => 116,  308 => 115,  305 => 114,  298 => 111,  292 => 109,  290 => 108,  287 => 107,  284 => 106,  281 => 105,  276 => 104,  274 => 103,  265 => 100,  263 => 99,  259 => 98,  256 => 97,  254 => 96,  251 => 95,  248 => 94,  239 => 92,  234 => 91,  231 => 90,  204 => 67,  198 => 66,  192 => 65,  188 => 64,  178 => 63,  172 => 62,  152 => 61,  138 => 60,  135 => 59,  131 => 56,  128 => 54,  124 => 49,  121 => 48,  118 => 47,  115 => 46,  112 => 45,  109 => 44,  107 => 43,  104 => 42,  101 => 40,  98 => 38,  94 => 36,  89 => 33,  85 => 32,  78 => 28,  74 => 27,  70 => 25,  65 => 22,  62 => 21,  59 => 19,  57 => 18,  50 => 14,  47 => 13,  41 => 12,  38 => 11,  35 => 9,  32 => 1,  14 => 10,);
    }
}
