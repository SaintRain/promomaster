<?php

/* CoreFileBundle:Admin/Form:multiupload_image_widget.html.twig */
class __TwigTemplate_a51790d516f894870e72458a66a5ab15934835a7a91f0fc522802e2bd7138cf3 extends Twig_Template
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
                'multiupload_image_widget' => array($this, 'block_multiupload_image_widget'),
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
        $this->displayBlock('multiupload_image_widget', $context, $blocks);
    }

    public function block_multiupload_image_widget($context, array $blocks = array())
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
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corefile/tooltip/jquery.tooltip.css"), "html", null, true);
            echo "\" />
        <link rel=\"stylesheet\" href=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corefile/jcrop/css/jquery.Jcrop.css"), "html", null, true);
            echo "\" />
        <link rel=\"stylesheet\" href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corefile/core_file.css"), "html", null, true);
            echo "\" />

        ";
            // line 27
            echo "
        <script>
            ";
            // line 29
            if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array(), "any", false, true), "get", array(0 => "core_file_image"), "method", false, true), $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), array(), "array", false, true), "base64", array(), "array", true, true)) {
                // line 30
                echo "                var imageInBase64 = new Array();
                ";
                // line 31
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "core_file_image"), "method"), $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), array(), "array"), "base64", array(), "array"));
                foreach ($context['_seq'] as $context["imageName"] => $context["base64"]) {
                    // line 32
                    echo "                    imageInBase64['";
                    echo $context["imageName"];
                    echo "'] = '";
                    echo $context["base64"];
                    echo "'
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['imageName'], $context['base64'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 34
                echo "            ";
            }
            // line 35
            echo "
            var imageMainInBase64;
            ";
            // line 37
            if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array(), "any", false, true), "get", array(0 => "core_file_image"), "method", false, true), $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), array(), "array", false, true), "imageMainInBase64", array(), "array", true, true)) {
                // line 38
                echo "                imageMainInBase64 = '";
                echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "core_file_image"), "method"), $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array()), array(), "array"), "imageMainInBase64", array(), "array");
                echo "';
            ";
            }
            // line 40
            echo "

            var core_file_ajax_replace_image = '";
            // line 42
            echo $this->env->getExtension('routing')->getPath("core_file_ajax_replace_image");
            echo "',
                core_file_ajax_upload_file = '";
            // line 43
            echo $this->env->getExtension('routing')->getPath("core_file_ajax_upload_file");
            echo "',
                core_file_ajax_remove_file = '";
            // line 44
            echo $this->env->getExtension('routing')->getPath("core_file_ajax_remove_file");
            echo "',
                core_file_ajax_google_api_add = '";
            // line 45
            echo $this->env->getExtension('routing')->getPath("core_file_ajax_google_api_add");
            echo "',
                sonata_admin_append_form_element_image = [];
        </script>

        <script src=\"";
            // line 49
            echo $this->env->getExtension('assets')->getAssetUrl("bundles/corefile/tooltip/jquery.tooltip.js");
            echo "\" type=\"text/javascript\"></script>
        <script src=\"";
            // line 50
            echo $this->env->getExtension('assets')->getAssetUrl("bundles/corefile/jcrop/js/jquery.Jcrop.js");
            echo "\" type=\"text/javascript\"></script>
        <script src=\"";
            // line 51
            echo $this->env->getExtension('assets')->getAssetUrl("bundles/corefile/core_file.js");
            echo "\" type=\"text/javascript\"></script>
        <script src=\"";
            // line 52
            echo $this->env->getExtension('assets')->getAssetUrl("bundles/corefile/core_file_image.js");
            echo "\" type=\"text/javascript\"></script>

        <script src=\"";
            // line 54
            echo $this->env->getExtension('assets')->getAssetUrl("bundles/corefile/google.api.search.images.js");
            echo "\" type=\"text/javascript\"></script>

        ";
            // line 57
            echo "
        ";
            // line 59
            echo "        <div id=\"jcrop-container\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.crop_title", array(), "CoreFileBundle"), "html", null, true);
            echo " ( )\">
            <table class=\"table table-bordered\" align=\"center\" style=\"width:auto;\">
                <tr>
                    <td><img id=\"jcrop-target\" class=\"image-for-crop\" data-background=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : $this->getContext($context, "ServiceContainer")), "getParameter", array(0 => "core_file"), "method"), "thumbnail_backgrond_color", array(), "array"), "html", null, true);
            echo "\" src=\"\" alt=\"Original\"/></td>
                    <td class=\"text-center\">
                        <div id=\"preview-pane\">
                            <div class=\"preview-container\">
                                <img class=\"jcrop-preview image-for-crop\" src=\"\" alt=\"Preview\" />
                            </div>
                        </div>
                        <div class=\"clearfix\"></div><br/>
                        <a id=\"crop-ok\" class=\"btn btn-primary\" title=\"";
            // line 70
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.ok", array(), "CoreFileBundle"), "html", null, true);
            echo "\"><span class=\"icon-ok icon-white\"></span> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.ok", array(), "CoreFileBundle"), "html", null, true);
            echo "</a>
                        &nbsp;&nbsp;&nbsp;
                        <a id=\"crop-cancel\" class=\"btn btn-danger\" title=\"";
            // line 72
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.cancel", array(), "CoreFileBundle"), "html", null, true);
            echo "\"><span class=\"icon-remove icon-white\"></span> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.cancel", array(), "CoreFileBundle"), "html", null, true);
            echo "</a>
                    </td>
                </tr>
            </table>
            <input class=\"coords-for-crop\" type=\"hidden\" id=\"coords-x1\" name=\"coords[x1]\">
            <input class=\"coords-for-crop\" type=\"hidden\" id=\"coords-y1\" name=\"coords[y1]\">
            <input class=\"coords-for-crop\" type=\"hidden\" id=\"coords-x2\" name=\"coords[x2]\">
            <input class=\"coords-for-crop\" type=\"hidden\" id=\"coords-y2\" name=\"coords[y2]\">
            <input class=\"coords-for-crop\" type=\"hidden\" id=\"coords-w\" name=\"coords[w]\">
            <input class=\"coords-for-crop\" type=\"hidden\" id=\"coords-h\" name=\"coords[h]\">
        </div>
        ";
            // line 84
            echo "
        ";
            // line 86
            echo "        <div id=\"google-api-search-images-container\" title=\"Поиск картинок через интернет\">
            <div id=\"gasi-controls\">
                <input ";
            // line 88
            if ($this->getAttribute((isset($context["google_api"]) ? $context["google_api"] : $this->getContext($context, "google_api")), "search_field", array())) {
                echo "data-id-element-for-get-query=\"";
                echo twig_escape_filter($this->env, (isset($context["uniqId"]) ? $context["uniqId"] : $this->getContext($context, "uniqId")), "html", null, true);
                echo "_";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["google_api"]) ? $context["google_api"] : $this->getContext($context, "google_api")), "search_field", array()), "html", null, true);
                echo "\"";
            }
            echo " class=\"gasi-query\" type=\"text\" id=\"gasi-query\" name=\"gasi-query\">
                <select id=\"gasi-imgsz\">
                    <option value=\"medium\">Очень маленькие</option>
                    <option value=\"large\">Маленькие</option>
                    <option value=\"xlarge\" selected=\"selected\">Средние</option>
                    <option value=\"xxlarge\">Большие</option>
                    <option value=\"huge\">Очень большие</option>
                </select>
                <input type=\"submit\" class=\"btn btn-primary\" id=\"gasi-search\" value=\"Поиск\">
                <input type=\"submit\" class=\"btn btn-success\" id=\"gasi-add\" value=\"Добавить выбранные\">
            </div>
            <br>
            <br>
            <table class=\"table table-bordered\" align=\"center\" style=\"width: 100%;\">
                <tr>
                    <td id=\"gasi-previews\"></td>
                </tr>
            </table>
        </div>
        ";
            // line 108
            echo "
    ";
        }
        // line 110
        echo "
    <script>
        ";
        // line 113
        echo "
            ";
        // line 115
        echo "            ";
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "subclass"), "method")) {
            // line 116
            echo "                ";
            $context["link_parameters"] = ("&subclass=" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "subclass"), "method"));
            // line 117
            echo "            ";
        } else {
            // line 118
            echo "                ";
            $context["link_parameters"] = "";
            // line 119
            echo "            ";
        }
        // line 120
        echo "            sonata_admin_append_form_element_image['";
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "'] = '";
        echo ($this->env->getExtension('routing')->getUrl("sonata_admin_append_form_element", array("code" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "root", array()), "code", array()), "elementId" => (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "objectId" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "root", array()), "id", array(0 => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "root", array()), "subject", array())), "method"), "uniqid" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "root", array()), "uniqid", array()))) . (isset($context["link_parameters"]) ? $context["link_parameters"] : $this->getContext($context, "link_parameters")));
        // line 125
        echo "';
        ";
        // line 127
        echo "    </script>

    ";
        // line 130
        echo "    ";
        $context["loadNotFromCache"] = ("?" . twig_date_format_filter($this->env, "now", "U", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))));
        // line 131
        echo "    <div class=\"pull-left\">
        <a class=\"btn btn-large fake-input-file fake-input-file-main ";
        // line 132
        if ((isset($context["is_main"]) ? $context["is_main"] : $this->getContext($context, "is_main"))) {
            echo "btn-to-upload-image-to-detect-color";
        }
        if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "disabled", array())) {
            echo " disabled";
        }
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.upload", array(), "CoreFileBundle"), "html", null, true);
        echo "\"><span class=\"icon-upload\"></span> ";
        if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array(), "any", false, true), "attr", array(), "any", false, true), "multiple", array(), "any", true, true) || (twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array())) < 1)) || (!$this->getAttribute($this->getAttribute(twig_first($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array())), "vars", array()), "value", array())))) {
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.upload", array(), "CoreFileBundle"), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.upload_other", array(), "CoreFileBundle"), "html", null, true);
        }
        echo "</a>
        <input type=\"file\" data-form_id_field=\"";
        // line 133
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "\" ";
        if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "disabled", array())) {
            echo "disabled=\"disabled\"";
        }
        echo " name=\"CoreFileBundleInput[";
        echo twig_escape_filter($this->env, (isset($context["uniqId"]) ? $context["uniqId"] : $this->getContext($context, "uniqId")), "html", null, true);
        echo "][filesToUpload][]\" class=\"ajax-image-upload-main oneForOne";
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "attr", array()), "class", array()), "html", null, true);
        echo "\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " accept=\"image/*\" data-count_of_attached_files=\"";
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array())) && $this->getAttribute($this->getAttribute(twig_first($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array())), "vars", array()), "value", array()))) {
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array())), "html", null, true);
        }
        echo "\"/>

        ";
        // line 135
        if ($this->getAttribute((isset($context["google_api"]) ? $context["google_api"] : $this->getContext($context, "google_api")), "use", array())) {
            // line 136
            echo "
            <a class=\"btn btn-large google-api-search-images-btn";
            // line 137
            if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "disabled", array())) {
                echo " disabled";
            }
            echo "\" data-form_id_field=\"";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "\"><span class=\"icon-globe\"></span> Поиск через интернет</a>

        ";
        }
        // line 140
        echo "
        <input type=\"hidden\" class=\"ajax-form_id\" name=\"CoreFileBundleInput[";
        // line 141
        echo twig_escape_filter($this->env, (isset($context["uniqId"]) ? $context["uniqId"] : $this->getContext($context, "uniqId")), "html", null, true);
        echo "][form_id]\" value=\"";
        echo twig_escape_filter($this->env, (isset($context["uniqId"]) ? $context["uniqId"] : $this->getContext($context, "uniqId")), "html", null, true);
        echo "\"/>
        <input type=\"hidden\" class=\"ajax-id\" name=\"CoreFileBundleInput[";
        // line 142
        echo twig_escape_filter($this->env, (isset($context["uniqId"]) ? $context["uniqId"] : $this->getContext($context, "uniqId")), "html", null, true);
        echo "][id]\" value=\"";
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "id", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "id", array()), "html", null, true);
        } else {
            echo "0";
        }
        echo "\"/>
        <input type=\"hidden\" class=\"ajax-type\" name=\"CoreFileBundleInput[";
        // line 143
        echo twig_escape_filter($this->env, (isset($context["uniqId"]) ? $context["uniqId"] : $this->getContext($context, "uniqId")), "html", null, true);
        echo "][type]\" value=\"image\"/>
        <input type=\"hidden\" class=\"ajax-field\" name=\"CoreFileBundleInput[";
        // line 144
        echo twig_escape_filter($this->env, (isset($context["uniqId"]) ? $context["uniqId"] : $this->getContext($context, "uniqId")), "html", null, true);
        echo "][fieldName]\" value=\"";
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "\"/>
        <input type=\"hidden\" class=\"ajax-namespace_to_attach\" name=\"CoreFileBundleInput[";
        // line 145
        echo twig_escape_filter($this->env, (isset($context["uniqId"]) ? $context["uniqId"] : $this->getContext($context, "uniqId")), "html", null, true);
        echo "][namespace_to_attach]\" value=\"";
        echo twig_escape_filter($this->env, (isset($context["namespace_to_attach"]) ? $context["namespace_to_attach"] : $this->getContext($context, "namespace_to_attach")), "html", null, true);
        echo "\"/>
        <input type=\"hidden\" class=\"ajax-namespace_to_insert\" name=\"CoreFileBundleInput[";
        // line 146
        echo twig_escape_filter($this->env, (isset($context["uniqId"]) ? $context["uniqId"] : $this->getContext($context, "uniqId")), "html", null, true);
        echo "][namespace_to_insert]\" value=\"";
        echo twig_escape_filter($this->env, (isset($context["namespace_to_insert"]) ? $context["namespace_to_insert"] : $this->getContext($context, "namespace_to_insert")), "html", null, true);
        echo "\"/>
        <input type=\"hidden\" class=\"ajax-detect_dominant_color\" value=\"";
        // line 147
        echo twig_escape_filter($this->env, (isset($context["is_main"]) ? $context["is_main"] : $this->getContext($context, "is_main")), "html", null, true);
        echo "\"/>
        ";
        // line 151
        echo "
        <span class=\"counter-of-files\">&nbsp;&nbsp;&nbsp;Отправлено файлов: <b class=\"count-of-sended\">0</b> из <b class=\"count-all-to-send\">0</b></span>
        &nbsp;&nbsp;&nbsp;
    </div>

    <div class=\"line10\"></div>

    <div class=\"progress progress-info progress-file progress-striped active\">
        <div class=\"bar\" style=\"width: 0%;\">
            <span>0%</span>
        </div>
    </div>

    <div class=\"clearfix\"></div>
    <div class=\"alert alert-info ajax-info-main hidden hide-by-timer\" data-hide-after=\"10\">Вероятно цвет товара был изменен</div>
    <div class=\"alert alert-danger ajax-error-main hidden hide-by-timer\" data-hide-after=\"25\"></div>
    <div class=\"alert alert-success ajax-success-main hidden hide-by-timer\" data-hide-after=\"10\"></div>
    <div class=\"clearfix\"></div>

<!-- /clear -->



    ";
        // line 175
        echo "    ";
        if ((!$this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "hasassociationadmin", array()))) {
            // line 176
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")));
            foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                // line 177
                echo "            ";
                echo twig_escape_filter($this->env, $this->env->getExtension('sonata_admin')->renderRelationElement($context["element"], $this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array())), "html", null, true);
                echo "
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 179
            echo "    ";
        } else {
            // line 180
            echo "
    ";
            // line 181
            $context["index"] = 0;
            // line 182
            echo "
    <span id=\"field_widget_";
            // line 183
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "\"  class=\"field-container-tbl\">
        ";
            // line 184
            if (((twig_length_filter($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array())) > 0) && $this->getAttribute($this->getAttribute(twig_first($this->env, $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array())), "vars", array()), "value", array()))) {
                // line 185
                echo "            <table id=\"image-table_";
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo "\" class=\"table table-bordered image-table\" style=\"width:";
                echo twig_escape_filter($this->env, (isset($context["width"]) ? $context["width"] : $this->getContext($context, "width")), "html", null, true);
                echo "\">
                <thead>
                    <tr>
                        ";
                // line 188
                $context["keys"] = twig_get_array_keys_filter($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array()));
                // line 189
                echo "                        ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array()), twig_first($this->env, (isset($context["keys"]) ? $context["keys"] : $this->getContext($context, "keys"))), array(), "array"), "children", array()));
                foreach ($context['_seq'] as $context["field_name"] => $context["nested_field"]) {
                    // line 190
                    echo "                            ";
                    if (((!twig_in_filter($context["field_name"], (isset($context["hide_field"]) ? $context["hide_field"] : $this->getContext($context, "hide_field"))) && !twig_in_filter("all", (isset($context["hide_field"]) ? $context["hide_field"] : $this->getContext($context, "hide_field")))) || (twig_in_filter("all", (isset($context["hide_field"]) ? $context["hide_field"] : $this->getContext($context, "hide_field"))) && twig_in_filter($context["field_name"], array(0 => "_delete", 1 => "name", 2 => "size", 3 => "file", 4 => "indexPosition"))))) {
                        // line 191
                        echo "                                ";
                        if (($context["field_name"] == "_delete")) {
                            // line 192
                            echo "                                    <th width=\"50\" class=\"text-left nowrap\" nowrap>
                                        ";
                            // line 193
                            if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array(), "any", false, true), "attr", array(), "any", false, true), "multiple", array(), "any", true, true)) {
                                // line 194
                                echo "                                            <input type=\"checkbox\" class=\"select-all-for-delete\" title=\"";
                                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.select_all", array(), "CoreFileBundle"), "html", null, true);
                                echo "\">&nbsp;
                                        ";
                            }
                            // line 196
                            echo "                                        ";
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("action_delete", array(), "CoreFileBundle"), "html", null, true);
                            echo "
                                    </th>
                                ";
                        } else {
                            // line 199
                            echo "                                    ";
                            $context["label"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "sonata_admin", array(), "array"), "admin", array()), "trans", array(0 => $this->env->getExtension('translator')->trans($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "label", array()), array(), "CoreFileBundle")), "method");
                            // line 200
                            echo "                                    <th ";
                            echo (($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "required", array(), "array")) ? ("class=\"required\"") : (""));
                            echo " ";
                            if ((!(isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")))) {
                                echo "class=\"hidden\"";
                            }
                            echo ">
                                        ";
                            // line 201
                            echo twig_escape_filter($this->env, (isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")), "html", null, true);
                            echo "
                                    </th>
                                ";
                        }
                        // line 204
                        echo "                            ";
                    }
                    // line 205
                    echo "                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['field_name'], $context['nested_field'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 206
                echo "                    </tr>
                </thead>
                <tbody class=\"sonata-ba-tbody\">
                    ";
                // line 209
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array()));
                foreach ($context['_seq'] as $context["nested_group_field_name"] => $context["nested_group_field"]) {
                    // line 210
                    echo "                        <tr class=\"main-row-collection\">
                            ";
                    // line 211
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["nested_group_field"], "children", array()));
                    foreach ($context['_seq'] as $context["field_name"] => $context["nested_field"]) {
                        // line 212
                        echo "                                ";
                        if (((!twig_in_filter($context["field_name"], (isset($context["hide_field"]) ? $context["hide_field"] : $this->getContext($context, "hide_field"))) && !twig_in_filter("all", (isset($context["hide_field"]) ? $context["hide_field"] : $this->getContext($context, "hide_field")))) || (twig_in_filter("all", (isset($context["hide_field"]) ? $context["hide_field"] : $this->getContext($context, "hide_field"))) && twig_in_filter($context["field_name"], array(0 => "_delete", 1 => "name", 2 => "size", 3 => "file", 4 => "indexPosition"))))) {
                            // line 213
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
                            echo "\">
                                        ";
                            // line 214
                            if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "associationadmin", array(), "any", false, true), "formfielddescriptions", array(), "any", false, true), $context["field_name"], array(), "array", true, true)) {
                                // line 215
                                echo "                                            ";
                                if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "sonata_admin", array()), "admin", array()), "formFieldDescriptions", array()), $context["field_name"], array(), "array"), "type", array()) == "file")) {
                                    // line 216
                                    echo "                                                ";
                                    // line 217
                                    echo "                                                ";
                                    $context["i"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_group_field"], "children", array()), $context["field_name"], array(), "array"), "parent", array()), "vars", array()), "value", array());
                                    // line 218
                                    echo "                                                ";
                                    $context["preview"] = $this->getAttribute($this->getAttribute((isset($context["configs"]) ? $context["configs"] : $this->getContext($context, "configs")), "options", array(), "array"), "preview", array());
                                    // line 219
                                    echo "                                                <table id=\"form-";
                                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "id", array()), "html", null, true);
                                    echo "\">
                                                    <tr>
                                                        <td class=\"b-l-none\">
                                                            <a class=\"open-original-image original-";
                                    // line 222
                                    echo twig_escape_filter($this->env, twig_first($this->env, twig_get_array_keys_filter($this->getAttribute($this->getAttribute((isset($context["configs"]) ? $context["configs"] : $this->getContext($context, "configs")), "options", array(), "array"), "original", array()))), "html", null, true);
                                    echo " ";
                                    if ((isset($context["is_main"]) ? $context["is_main"] : $this->getContext($context, "is_main"))) {
                                        echo "image-to-detect-color";
                                    }
                                    echo "\" href=\"";
                                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "original", $this->getAttribute(twig_get_array_keys_filter($this->getAttribute($this->getAttribute((isset($context["configs"]) ? $context["configs"] : $this->getContext($context, "configs")), "options", array(), "array"), "original", array())), 0, array(), "array"))), "html", null, true);
                                    echo twig_escape_filter($this->env, (isset($context["loadNotFromCache"]) ? $context["loadNotFromCache"] : $this->getContext($context, "loadNotFromCache")), "html", null, true);
                                    echo "\" target=\"_blank\" title=\"";
                                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.view_original_image", array(), "CoreFileBundle"), "html", null, true);
                                    echo "\">
                                                                <img class=\"main-preview preview-";
                                    // line 223
                                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["configs"]) ? $context["configs"] : $this->getContext($context, "configs")), "prefix_preview_in_admin", array(), "array"), "html", null, true);
                                    echo "\" width=\"";
                                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["preview"]) ? $context["preview"] : $this->getContext($context, "preview")), $this->getAttribute((isset($context["configs"]) ? $context["configs"] : $this->getContext($context, "configs")), "prefix_preview_in_admin", array(), "array"), array(), "array"), "size", array()), "w", array()), "html", null, true);
                                    echo "px\" height=\"";
                                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["configs"]) ? $context["configs"] : $this->getContext($context, "configs")), "options", array(), "array"), "preview", array()), $this->getAttribute((isset($context["configs"]) ? $context["configs"] : $this->getContext($context, "configs")), "prefix_preview_in_admin", array(), "array"), array(), "array"), "size", array()), "h", array()), "html", null, true);
                                    echo "px\" src=\"";
                                    if (($this->env->getExtension('filter_extension')->getFileWebPathFilter((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "preview", $this->getAttribute((isset($context["configs"]) ? $context["configs"] : $this->getContext($context, "configs")), "prefix_preview_in_admin", array(), "array")) && $this->getAttribute((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "halfPath", array()))) {
                                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "preview")), "html", null, true);
                                        echo twig_escape_filter($this->env, (isset($context["loadNotFromCache"]) ? $context["loadNotFromCache"] : $this->getContext($context, "loadNotFromCache")), "html", null, true);
                                    }
                                    echo "\"/>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            ";
                                    // line 227
                                    $context['_parent'] = (array) $context;
                                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["configs"]) ? $context["configs"] : $this->getContext($context, "configs")), "options", array(), "array"), "original", array()));
                                    foreach ($context['_seq'] as $context["prefix"] => $context["o"]) {
                                        // line 228
                                        echo "                                                                ";
                                        // line 231
                                        echo "                                                                    ";
                                        // line 232
                                        echo "                                                                    ";
                                        // line 233
                                        echo "                                                                    <span class=\"original-";
                                        echo twig_escape_filter($this->env, $context["prefix"], "html", null, true);
                                        echo " fake-input-file icon-upload ";
                                        if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "disabled", array())) {
                                            echo " disabled icon-gray";
                                        }
                                        echo "\" data-id=\"";
                                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "id", array()), "html", null, true);
                                        echo "\" title=\"";
                                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.upload", array(), "CoreFileBundle"), "html", null, true);
                                        echo "\"></span>
                                                                    <input type=\"file\" ";
                                        // line 234
                                        if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "disabled", array())) {
                                            echo "disabled=\"disabled\"";
                                        }
                                        echo " class=\"static original-file original-";
                                        echo twig_escape_filter($this->env, $context["prefix"], "html", null, true);
                                        echo " ajax-image-upload hidden-always\" data-id=\"";
                                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "id", array()), "html", null, true);
                                        echo "\" data-width=\"0.1\" data-height=\"0.1\" data-replace=\"";
                                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "original", $context["prefix"])), "html", null, true);
                                        echo "\" accept=\"";
                                        echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute((isset($context["configs"]) ? $context["configs"] : $this->getContext($context, "configs")), "mime_types", array()), ","), "html", null, true);
                                        echo "\"/>
                                                                ";
                                        // line 236
                                        echo "                                                                &nbsp;
                                                                <a class=\"original-";
                                        // line 237
                                        echo twig_escape_filter($this->env, $context["prefix"], "html", null, true);
                                        echo " image-tooltip main-image-tooltip\" href=\"";
                                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "original", $context["prefix"])), "html", null, true);
                                        echo twig_escape_filter($this->env, (isset($context["loadNotFromCache"]) ? $context["loadNotFromCache"] : $this->getContext($context, "loadNotFromCache")), "html", null, true);
                                        echo "\" target=\"_blank\" title=\"";
                                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.view", array(), "CoreFileBundle"), "html", null, true);
                                        echo "\"><span class=\"width-and-height\">";
                                        echo twig_escape_filter($this->env, $this->env->getExtension('filter_extension')->getImageSizeFilter($this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "original", $context["prefix"]))), "html", null, true);
                                        echo "</span></a>
                                                                <span class=\"icon-star icon-gray\" title=\"";
                                        // line 238
                                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.original.image", array(), "CoreFileBundle"), "html", null, true);
                                        echo "\"></span>
                                                                <br>
                                                            ";
                                    }
                                    $_parent = $context['_parent'];
                                    unset($context['_seq'], $context['_iterated'], $context['prefix'], $context['o'], $context['_parent'], $context['loop']);
                                    $context = array_intersect_key($context, $_parent) + $_parent;
                                    // line 241
                                    echo "
                                                            ";
                                    // line 242
                                    if ($this->getAttribute($this->getAttribute((isset($context["configs"]) ? $context["configs"] : null), "options", array(), "array", false, true), "watermark", array(), "any", true, true)) {
                                        // line 243
                                        echo "                                                                ";
                                        $context['_parent'] = (array) $context;
                                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["configs"]) ? $context["configs"] : $this->getContext($context, "configs")), "options", array(), "array"), "watermark", array()));
                                        foreach ($context['_seq'] as $context["prefix"] => $context["w"]) {
                                            // line 244
                                            echo "                                                                    ";
                                            // line 247
                                            echo "                                                                    ";
                                            // line 248
                                            echo "                                                                    ";
                                            // line 249
                                            echo "                                                                    <span class=\"icon-upload watermark-";
                                            echo twig_escape_filter($this->env, $context["prefix"], "html", null, true);
                                            echo " fake-input-file";
                                            if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "disabled", array())) {
                                                echo " disabled icon-gray";
                                            }
                                            echo "\" data-id=\"";
                                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "id", array()), "html", null, true);
                                            echo "\" title=\"";
                                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.upload", array(), "CoreFileBundle"), "html", null, true);
                                            echo "\"></span>
                                                                    <input type=\"file\" ";
                                            // line 250
                                            if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "disabled", array())) {
                                                echo "disabled=\"disabled\"";
                                            }
                                            echo " class=\"static watermark-";
                                            echo twig_escape_filter($this->env, $context["prefix"], "html", null, true);
                                            echo " ajax-image-upload hidden-always\" data-id=\"";
                                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "id", array()), "html", null, true);
                                            echo "\" data-width=\"";
                                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["w"], "size", array()), "w", array()), "html", null, true);
                                            echo "\" data-height=\"";
                                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["w"], "size", array()), "h", array()), "html", null, true);
                                            echo "\" data-replace=\"";
                                            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "watermark", $context["prefix"])), "html", null, true);
                                            echo "\" accept=\"";
                                            echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute((isset($context["configs"]) ? $context["configs"] : $this->getContext($context, "configs")), "mime_types", array()), ","), "html", null, true);
                                            echo "\"/>
                                                                    ";
                                            // line 252
                                            echo "                                                                    &nbsp;
                                                                    <span class=\"icon-edit preview-";
                                            // line 253
                                            echo twig_escape_filter($this->env, $context["prefix"], "html", null, true);
                                            echo " btn-crop-image\" data-id=\"";
                                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "id", array()), "html", null, true);
                                            echo "\" data-width=\"";
                                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["w"], "size", array()), "w", array()), "html", null, true);
                                            echo "\" data-height=\"";
                                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["w"], "size", array()), "h", array()), "html", null, true);
                                            echo "\"  data-original=\"";
                                            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "original", $this->getAttribute(twig_get_array_keys_filter($this->getAttribute($this->getAttribute((isset($context["configs"]) ? $context["configs"] : $this->getContext($context, "configs")), "options", array(), "array"), "original", array())), 0, array(), "array"))), "html", null, true);
                                            echo "\" data-replace=\"";
                                            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "watermark", $context["prefix"])), "html", null, true);
                                            echo "\" title=\"";
                                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.crop", array(), "CoreFileBundle"), "html", null, true);
                                            echo "\" data-is-watermark=\"1\"></span>
                                                                    &nbsp;
                                                                    <a class=\"watermark-";
                                            // line 255
                                            echo twig_escape_filter($this->env, $context["prefix"], "html", null, true);
                                            echo " image-tooltip\" href=\"";
                                            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "watermark", $context["prefix"])), "html", null, true);
                                            echo twig_escape_filter($this->env, (isset($context["loadNotFromCache"]) ? $context["loadNotFromCache"] : $this->getContext($context, "loadNotFromCache")), "html", null, true);
                                            echo "\" target=\"_blank\" title=\"";
                                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.view", array(), "CoreFileBundle"), "html", null, true);
                                            echo "\">";
                                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(((($this->getAttribute($this->getAttribute($context["w"], "size", array()), "w", array()) . "x") . $this->getAttribute($this->getAttribute($context["w"], "size", array()), "h", array())) . "px"), array(), "CoreFileBundle"), "html", null, true);
                                            echo "</a>

                                                                    <span class=\"icon-star-empty icon-gray\" title=\"";
                                            // line 257
                                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.watermark.with", array(), "CoreFileBundle"), "html", null, true);
                                            echo "\"></span>
                                                                ";
                                        }
                                        $_parent = $context['_parent'];
                                        unset($context['_seq'], $context['_iterated'], $context['prefix'], $context['w'], $context['_parent'], $context['loop']);
                                        $context = array_intersect_key($context, $_parent) + $_parent;
                                        // line 259
                                        echo "                                                                <br>
                                                            ";
                                    }
                                    // line 261
                                    echo "
                                                            ";
                                    // line 264
                                    echo "                                                            ";
                                    $context['_parent'] = (array) $context;
                                    $context['_seq'] = twig_ensure_traversable((isset($context["preview"]) ? $context["preview"] : $this->getContext($context, "preview")));
                                    foreach ($context['_seq'] as $context["prefix"] => $context["p"]) {
                                        // line 265
                                        echo "                                                                    ";
                                        // line 266
                                        echo "                                                                    ";
                                        // line 267
                                        echo "                                                                    <span class=\"icon-upload preview-";
                                        echo twig_escape_filter($this->env, $context["prefix"], "html", null, true);
                                        echo " fake-input-file";
                                        if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "disabled", array())) {
                                            echo " disabled icon-gray";
                                        }
                                        echo "\" title=\"";
                                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.upload", array(), "CoreFileBundle"), "html", null, true);
                                        echo "\"></span>
                                                                    <input type=\"file\" ";
                                        // line 268
                                        if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "disabled", array())) {
                                            echo "disabled=\"disabled\"";
                                        }
                                        echo " class=\"static preview-";
                                        echo twig_escape_filter($this->env, $context["prefix"], "html", null, true);
                                        echo " ajax-image-upload hidden-always\" data-id=\"";
                                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "id", array()), "html", null, true);
                                        echo "\" data-width=\"";
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["p"], "size", array()), "w", array()), "html", null, true);
                                        echo "\" data-height=\"";
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["p"], "size", array()), "h", array()), "html", null, true);
                                        echo "\" data-replace=\"";
                                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "preview", $context["prefix"])), "html", null, true);
                                        echo "\" accept=\"";
                                        echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute((isset($context["configs"]) ? $context["configs"] : $this->getContext($context, "configs")), "mime_types", array()), ","), "html", null, true);
                                        echo "\"/>
                                                                    &nbsp;
                                                                    ";
                                        // line 271
                                        echo "                                                                    <span class=\"icon-edit preview-";
                                        echo twig_escape_filter($this->env, $context["prefix"], "html", null, true);
                                        echo " btn-crop-image\" data-id=\"";
                                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "id", array()), "html", null, true);
                                        echo "\" data-width=\"";
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["p"], "size", array()), "w", array()), "html", null, true);
                                        echo "\" data-height=\"";
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["p"], "size", array()), "h", array()), "html", null, true);
                                        echo "\"  data-original=\"";
                                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "original", $this->getAttribute(twig_get_array_keys_filter($this->getAttribute($this->getAttribute((isset($context["configs"]) ? $context["configs"] : $this->getContext($context, "configs")), "options", array(), "array"), "original", array())), 0, array(), "array"))), "html", null, true);
                                        echo "\" data-replace=\"";
                                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "preview", $context["prefix"])), "html", null, true);
                                        echo "\" title=\"";
                                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.crop", array(), "CoreFileBundle"), "html", null, true);
                                        echo "\" data-is-watermark=\"0\"></span>
                                                                &nbsp;
                                                                <a class=\"preview-";
                                        // line 273
                                        echo twig_escape_filter($this->env, $context["prefix"], "html", null, true);
                                        echo " image-tooltip\" href=\"";
                                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "preview", $context["prefix"])), "html", null, true);
                                        echo twig_escape_filter($this->env, (isset($context["loadNotFromCache"]) ? $context["loadNotFromCache"] : $this->getContext($context, "loadNotFromCache")), "html", null, true);
                                        echo "\" target=\"_blank\" title=\"";
                                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.multiupoad.view", array(), "CoreFileBundle"), "html", null, true);
                                        echo "\">";
                                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(((($this->getAttribute($this->getAttribute($context["p"], "size", array()), "w", array()) . "x") . $this->getAttribute($this->getAttribute($context["p"], "size", array()), "h", array())) . "px"), array(), "CoreFileBundle"), "html", null, true);
                                        echo "</a>
                                                                <br>
                                                            ";
                                    }
                                    $_parent = $context['_parent'];
                                    unset($context['_seq'], $context['_iterated'], $context['prefix'], $context['p'], $context['_parent'], $context['loop']);
                                    $context = array_intersect_key($context, $_parent) + $_parent;
                                    // line 276
                                    echo "                                                        </td>
                                                    </tr>
                                                </table>
                                                <div class=\"alert alert-danger ajax-error-";
                                    // line 279
                                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "id", array()), "html", null, true);
                                    echo " hidden hide-by-timer\" data-hide-after=\"10\"></div>
                                                <div class=\"alert alert-success ajax-success-";
                                    // line 280
                                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "id", array()), "html", null, true);
                                    echo " hidden hide-by-timer\" data-hide-after=\"5\"></div>
                                                ";
                                    // line 282
                                    echo "                                            ";
                                } else {
                                    // line 283
                                    echo "                                                ";
                                    $context["aClass"] = $this->getAttribute($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "attr", array()), "class", array());
                                    // line 284
                                    echo "                                                ";
                                    if (($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "name", array()) == "name")) {
                                        // line 285
                                        echo "                                                    ";
                                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget', array("attr" => array("class" => ("hidden hidden-always file-name " . (isset($context["aClass"]) ? $context["aClass"] : $this->getContext($context, "aClass"))))));
                                        echo "
                                                ";
                                    } elseif (($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "name", array()) == "size")) {
                                        // line 287
                                        echo "                                                    <span class=\"human-size\">";
                                        if ($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array(), "any", false, true), "value", array(), "any", true, true)) {
                                            echo twig_escape_filter($this->env, $this->env->getExtension('filter_extension')->getHumanFileSizeFilter($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "value", array())), "html", null, true);
                                        }
                                        echo "</span>
                                                    ";
                                        // line 288
                                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget', array("attr" => array("class" => ("hidden hidden-always file-size " . (isset($context["aClass"]) ? $context["aClass"] : $this->getContext($context, "aClass"))))));
                                        echo "
                                                ";
                                    } elseif (($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "name", array()) == "indexPosition")) {
                                        // line 290
                                        echo "                                                    ";
                                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget', array("attr" => array("class" => ("file-indexPosition " . (isset($context["aClass"]) ? $context["aClass"] : $this->getContext($context, "aClass"))))));
                                        echo "
                                                ";
                                    } else {
                                        // line 292
                                        echo "                                                    ";
                                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                                        echo "
                                                ";
                                    }
                                    // line 294
                                    echo "
                                            ";
                                }
                                // line 296
                                echo "
                                            ";
                                // line 297
                                $context["dummy"] = $this->getAttribute($context["nested_group_field"], "setrendered", array());
                                // line 298
                                echo "                                        ";
                            } else {
                                // line 299
                                echo "                                            ";
                                if (($this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "name", array()) == "_delete")) {
                                    // line 300
                                    echo "                                                ";
                                    $context["index"] = ((isset($context["index"]) ? $context["index"] : $this->getContext($context, "index")) + 1);
                                    // line 301
                                    echo "                                                ";
                                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget', array("attr" => array("class" => "checkbox-delete")));
                                    echo "
                                                &nbsp;
                                                <span class=\"remove-file icon-trash";
                                    // line 303
                                    if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "disabled", array())) {
                                        echo " disabled icon-gray";
                                    }
                                    echo "\" data-id=\"";
                                    if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_group_field"], "children", array(), "any", false, true), $context["field_name"], array(), "array", false, true), "parent", array(), "any", false, true), "vars", array(), "any", false, true), "value", array(), "any", false, true), "id", array(), "any", true, true)) {
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["nested_group_field"], "children", array()), $context["field_name"], array(), "array"), "parent", array()), "vars", array()), "value", array()), "id", array()), "html", null, true);
                                    }
                                    echo "\"></span>
                                                ";
                                    // line 304
                                    if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array(), "any", false, true), "attr", array(), "any", false, true), "multiple", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "attr", array()), "multiple", array()) == true))) {
                                        // line 305
                                        echo "                                                    <br>
                                                    <span class=\"muted\"># <span class=\"position\" title=\"Номер п/п\">";
                                        // line 306
                                        echo twig_escape_filter($this->env, (isset($context["index"]) ? $context["index"] : $this->getContext($context, "index")), "html", null, true);
                                        echo "</span></span>
                                                ";
                                    }
                                    // line 308
                                    echo "                                            ";
                                } else {
                                    // line 309
                                    echo "                                                ";
                                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'widget');
                                    echo "
                                            ";
                                }
                                // line 311
                                echo "                                        ";
                            }
                            // line 312
                            echo "                                        ";
                            if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($context["nested_field"], "vars", array()), "errors", array())) > 0)) {
                                // line 313
                                echo "                                            <div class=\"help-inline sonata-ba-field-error-messages\">
                                                ";
                                // line 314
                                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["nested_field"], 'errors');
                                echo "
                                            </div>
                                        ";
                            }
                            // line 317
                            echo "                                    </td>
                                ";
                        }
                        // line 319
                        echo "                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['field_name'], $context['nested_field'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 320
                    echo "                        </tr>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['nested_group_field_name'], $context['nested_group_field'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 322
                echo "                </tbody>
            </table>
        ";
            }
            // line 325
            echo "    </span>

<!-- clear -->
        ";
            // line 329
            echo "
        ";
            // line 330
            if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array(), "any", false, true), "options", array(), "any", false, true), "sortable", array(), "any", true, true)) {
                // line 331
                echo "            <script type=\"text/javascript\">
                jQuery('div#field_container_";
                // line 332
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo " tbody.sonata-ba-tbody').sortable({
                    axis: 'y',
                    opacity: 0.6,
                    items: 'tr.main-row-collection',
                    stop: apply_position_value_";
                // line 336
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo ",
                    create: function (event, ui) {
                        ";
                // line 339
                echo "                        ";
                if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array(), "any", false, true), "get", array(0 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array())), "method", false, true), (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), array(), "array", true, true) && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "subject", array()), "id", array()))) {
                    // line 340
                    echo "                            var core_file_sortable = [];
                            ";
                    // line 341
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_array_keys_filter($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "uniqid", array())), "method"), (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), array(), "array")));
                    foreach ($context['_seq'] as $context["i"] => $context["pos"]) {
                        // line 342
                        echo "                                core_file_sortable.push('";
                        echo twig_escape_filter($this->env, $context["pos"], "html", null, true);
                        echo "');
                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['i'], $context['pos'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 344
                    echo "                            // если задана сортировка, из пост запроса то строим таблицу в нужном порядке
                            var sortableList = \$('div#field_container_";
                    // line 345
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo " tbody.sonata-ba-tbody'),
                            listitems = \$('tr.main-row-collection', sortableList);

                            for (var i in core_file_sortable) {
                                sortableList.append(listitems[core_file_sortable[i]]);
                            }
                        ";
                }
                // line 352
                echo "                    }
                });

                function apply_position_value_";
                // line 355
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo "() {
                    // update the input value position
                    jQuery('div#field_container_";
                // line 357
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
                // line 364
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
                // line 371
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo "').bind('sonata.add_element', function() {
                    apply_position_value_";
                // line 372
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo "();
                    jQuery('div#field_container_";
                // line 373
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo " tbody.sonata-ba-tbody').sortable('refresh');
                });

                apply_position_value_";
                // line 376
                echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                echo "();

            </script>
        ";
            }
            // line 380
            echo "<!-- /clear -->
    </div>
";
        }
        // line 383
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreFileBundle:Admin/Form:multiupload_image_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  1081 => 383,  1076 => 380,  1069 => 376,  1063 => 373,  1059 => 372,  1055 => 371,  1041 => 364,  1027 => 357,  1022 => 355,  1017 => 352,  1007 => 345,  1004 => 344,  995 => 342,  991 => 341,  988 => 340,  985 => 339,  980 => 336,  973 => 332,  970 => 331,  968 => 330,  965 => 329,  960 => 325,  955 => 322,  948 => 320,  942 => 319,  938 => 317,  932 => 314,  929 => 313,  926 => 312,  923 => 311,  917 => 309,  914 => 308,  909 => 306,  906 => 305,  904 => 304,  894 => 303,  888 => 301,  885 => 300,  882 => 299,  879 => 298,  877 => 297,  874 => 296,  870 => 294,  864 => 292,  858 => 290,  853 => 288,  846 => 287,  840 => 285,  837 => 284,  834 => 283,  831 => 282,  827 => 280,  823 => 279,  818 => 276,  802 => 273,  784 => 271,  765 => 268,  754 => 267,  752 => 266,  750 => 265,  745 => 264,  742 => 261,  738 => 259,  730 => 257,  718 => 255,  701 => 253,  698 => 252,  680 => 250,  667 => 249,  665 => 248,  663 => 247,  661 => 244,  656 => 243,  654 => 242,  651 => 241,  642 => 238,  631 => 237,  628 => 236,  614 => 234,  601 => 233,  599 => 232,  597 => 231,  595 => 228,  591 => 227,  575 => 223,  562 => 222,  555 => 219,  552 => 218,  549 => 217,  547 => 216,  544 => 215,  542 => 214,  527 => 213,  524 => 212,  520 => 211,  517 => 210,  513 => 209,  508 => 206,  502 => 205,  499 => 204,  493 => 201,  484 => 200,  481 => 199,  474 => 196,  468 => 194,  466 => 193,  463 => 192,  460 => 191,  457 => 190,  452 => 189,  450 => 188,  441 => 185,  439 => 184,  435 => 183,  432 => 182,  430 => 181,  427 => 180,  424 => 179,  415 => 177,  410 => 176,  407 => 175,  382 => 151,  378 => 147,  372 => 146,  366 => 145,  360 => 144,  356 => 143,  346 => 142,  340 => 141,  337 => 140,  327 => 137,  324 => 136,  322 => 135,  302 => 133,  285 => 132,  282 => 131,  279 => 130,  275 => 127,  272 => 125,  267 => 120,  264 => 119,  261 => 118,  258 => 117,  255 => 116,  252 => 115,  249 => 113,  245 => 110,  241 => 108,  213 => 88,  209 => 86,  206 => 84,  190 => 72,  183 => 70,  172 => 62,  165 => 59,  162 => 57,  157 => 54,  152 => 52,  148 => 51,  144 => 50,  140 => 49,  133 => 45,  129 => 44,  125 => 43,  121 => 42,  117 => 40,  111 => 38,  109 => 37,  105 => 35,  102 => 34,  91 => 32,  87 => 31,  84 => 30,  82 => 29,  78 => 27,  73 => 24,  69 => 23,  65 => 22,  62 => 21,  59 => 19,  57 => 18,  50 => 14,  47 => 13,  41 => 12,  38 => 11,  35 => 9,  32 => 1,  14 => 10,);
    }
}
