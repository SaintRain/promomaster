<?php

/* CoreFileBundle:Form:multiupload_file_frontend_widget.html.twig */
class __TwigTemplate_a73cae56b14df5915c53d288741211d2b16f3f7d02ed5ccee86e45f0ca34e41e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'multiupload_file_frontend_widget' => array($this, 'block_multiupload_file_frontend_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 8
        echo "
";
        // line 9
        $this->displayBlock('multiupload_file_frontend_widget', $context, $blocks);
    }

    public function block_multiupload_file_frontend_widget($context, array $blocks = array())
    {
        // line 10
        echo "

    <div class=\"CoreFileContainer\">

        ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "btnName", array()), array(), "array"), 'widget');
        echo "
        ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "filesToUpload", array()), 'widget', array("attr" => array("data-count_of_attached_files" => twig_length_filter($this->env, (isset($context["files"]) ? $context["files"] : $this->getContext($context, "files"))))));
        echo "
        ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "id", array()), 'widget', array("attr" => array("value" => (isset($context["objId"]) ? $context["objId"] : $this->getContext($context, "objId")), "class" => "ajax-id")));
        echo "
        ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "type", array()), 'widget', array("attr" => array("class" => "ajax-type")));
        echo "
        ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "fieldName", array()), 'widget', array("attr" => array("class" => "ajax-field")));
        echo "
        ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "namespace_to_attach", array()), 'widget', array("attr" => array("class" => "ajax-namespace_to_attach")));
        echo "
        ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "namespace_to_insert", array()), 'widget', array("attr" => array("class" => "ajax-namespace_to_insert")));
        echo "

        <input type=\"hidden\" class=\"ajax-form_id\" name=\"CoreFileBundleInput[";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "name", array()), "html", null, true);
        echo "][form_id]\"
               value=\"";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["uniqId"]) ? $context["uniqId"] : $this->getContext($context, "uniqId")), "html", null, true);
        echo "\"/>

        ";
        // line 25
        if ((isset($context["showCounterOfFiles"]) ? $context["showCounterOfFiles"] : $this->getContext($context, "showCounterOfFiles"))) {
            // line 26
            echo "            <br>
            <div class=\"CoreFileCounter hidden\">
                Отправлено файлов: <span class=\"count-of-sended\">0</span> из <span class=\"count-all-to-send\">0</span>
            </div>

        ";
        }
        // line 32
        echo "
        ";
        // line 33
        if ((isset($context["showStatusOfUpload"]) ? $context["showStatusOfUpload"] : $this->getContext($context, "showStatusOfUpload"))) {
            // line 34
            echo "
            <div style=\"margin-top: 20px\" class=\"alert alert-danger ajax-error-main hidden hide-by-timer\"
                 data-hide-after=\"10\"></div>
            ";
            // line 38
            echo "        ";
        }
        // line 39
        echo "
        ";
        // line 40
        if ((isset($context["showAttachedFiles"]) ? $context["showAttachedFiles"] : $this->getContext($context, "showAttachedFiles"))) {
            // line 41
            echo "
            <div class=\"CoreFileAttached\">
                <ul style=\"padding-left:0; padding-top:10px\">
                    ";
            // line 44
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["files"]) ? $context["files"] : $this->getContext($context, "files")));
            foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                // line 45
                echo "
                        ";
                // line 46
                if (($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "type", array()) == "flash")) {
                    // line 47
                    echo "
                            <li style=\"list-style-type: none;margin-bottom:10px\">
                                ";
                    // line 49
                    if ($this->getAttribute($context["file"], "id", array(), "any", true, true)) {
                        // line 50
                        echo "                                    <span>Размер ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "height", array()), "html", null, true);
                        echo "x";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "width", array()), "html", null, true);
                        echo "</span>
                                    &nbsp;<span class=\"badge badge-u\">
                                    <a class=\"file-link\"
                                       href=\"";
                        // line 53
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["file"])), "html", null, true);
                        echo "\"
                                       target=\"_blank\">Скачать</a></span><br/>
                                    <div style=\"margin-top: 5px\">
                                        <object height=\"";
                        // line 56
                        echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "height", array()), "html", null, true);
                        echo "\" width=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "width", array()), "html", null, true);
                        echo "\"
                                                style=\"padding-left: 0px\"
                                                type=\"application/x-shockwave-flash\"
                                                data=\"";
                        // line 59
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["file"])), "html", null, true);
                        echo "\">
                                            <param name=\"quality\" value=\"high\">
                                            ";
                        // line 62
                        echo "                                            <param name=\"wMode\" value=\"window\">
                                            <param name=\"swLiveConnect\" value=\"true\">
                                            <param name=\"wmode\" value=\"transparent\">
                                            <param name=\"bgcolor\" value=\"#000000\">
                                            ";
                        // line 67
                        echo "                                            <param name=\"allowfullscreen\" value=\"true\">
                                        </object>
                                    </div>
                                ";
                    } else {
                        // line 71
                        echo "                                    ";
                        // line 72
                        echo "                                    ";
                        $context["name"] = twig_split_filter($this->env, $this->getAttribute($context["file"], "name", array()), "#");
                        // line 73
                        echo "                                    ";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), 1, array(), "array"), "html", null, true);
                        echo "
                                ";
                    }
                    // line 75
                    echo "                            </li>
                        ";
                }
                // line 77
                echo "


                        ";
                // line 80
                if (($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "type", array()) == "image")) {
                    // line 81
                    echo "                            <li style=\"list-style-type: none;margin-bottom:10px\">
                                ";
                    // line 82
                    if ($this->getAttribute($context["file"], "id", array(), "any", true, true)) {
                        // line 83
                        echo "                                    <span>Размер ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "height", array()), "html", null, true);
                        echo "x";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "width", array()), "html", null, true);
                        echo "</span>
                                ";
                    } else {
                        // line 85
                        echo "                                    <span>Размер ";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "core_file_image"), "method"), (isset($context["uniqId"]) ? $context["uniqId"] : $this->getContext($context, "uniqId")), array(), "array"), "base64Extra", array(), "array"), $this->getAttribute($context["file"], "name", array()), array(), "array"), "height", array()), "html", null, true);
                        // line 86
                        echo "x";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "core_file_image"), "method"), (isset($context["uniqId"]) ? $context["uniqId"] : $this->getContext($context, "uniqId")), array(), "array"), "base64Extra", array(), "array"), $this->getAttribute($context["file"], "name", array()), array(), "array"), "width", array()), "html", null, true);
                        echo "</span>
                                ";
                    }
                    // line 88
                    echo "                                ";
                    if ($this->getAttribute($context["file"], "id", array(), "any", true, true)) {
                        // line 89
                        echo "                                    &nbsp;<span class=\"badge badge-u\">
                                    <a class=\"file-link\"
                                       href=\"";
                        // line 91
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["file"])), "html", null, true);
                        echo "\"
                                       target=\"_blank\">Скачать</a></span>
                                    ";
                        // line 94
                        echo "                                    ";
                        // line 95
                        echo "                                    ";
                        // line 96
                        echo "                                ";
                    }
                    // line 97
                    echo "                                <br/>

                                    <span class=\"file-attachment\"><a class=\"file-link\"
                                                                     href=\"";
                    // line 100
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["file"])), "html", null, true);
                    echo "\"
                                                                     target=\"_blank\"><img
                                                    style=\"margin-top: 5px;max-height: 200px;\"
                                                    src=\"";
                    // line 103
                    if ($this->getAttribute($context["file"], "id", array(), "any", true, true)) {
                        // line 104
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["file"])), "html", null, true);
                    } else {
                        // line 106
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "core_file_image"), "method"), (isset($context["uniqId"]) ? $context["uniqId"] : $this->getContext($context, "uniqId")), array(), "array"), "base64", array(), "array"), $this->getAttribute($context["file"], "name", array()), array(), "array"), "html", null, true);
                    }
                    // line 107
                    echo "\"/></a>
                                    </span>
                            </li>
                        ";
                }
                // line 111
                echo "



                        ";
                // line 115
                if (($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "type", array()) == "document")) {
                    // line 116
                    echo "
                        ";
                }
                // line 118
                echo "
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 120
            echo "

                    <li style=\"list-style-type: none;margin-bottom:10px\" class=\"hidden\">
                        <span class=\"file-name\"></span><span class=\"size\"></span>&nbsp;<span
                                class=\"download badge badge-u\"><a class=\"file-link\" href=\"#\" target=\"_blank\">Скачать</a></span>&nbsp;
                        ";
            // line 125
            if ((($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "type", array()) != "image") && ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "type", array()) != "flash"))) {
                // line 126
                echo "                            <span class=\"fa fa-times file-remove\" style=\"cursor: pointer\"> </span>
                        ";
            }
            // line 128
            echo "                        ";
            if (($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "type", array()) == "image")) {
                // line 129
                echo "                            <br>
                            <span class=\"file-attachment\"></span>&nbsp;
                        ";
            }
            // line 132
            echo "                    </li>

                </ul>
            </div>

        ";
        }
        // line 138
        echo "
    </div>

    ";
        // line 141
        if ( !(isset($context["libStats"]) ? $context["libStats"] : $this->getContext($context, "libStats"))) {
            // line 142
            echo "
        <script>
            \$(function () {
                \$('.hidden').hide();
            });
            var core_file_ajax_upload_file = '";
            // line 147
            echo $this->env->getExtension('routing')->getPath("core_file_ajax_upload_file");
            echo "',
                    core_file_ajax_remove_file = '";
            // line 148
            echo $this->env->getExtension('routing')->getPath("core_file_ajax_remove_file");
            echo "';
        </script>

        ";
            // line 151
            if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
                // asset "edd10cb_0"
                $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_edd10cb_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/core_file_frontend_core_file_frontend_1.js");
                // line 152
                echo "        <script src=\"";
                echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
                echo "\"></script>
        ";
            } else {
                // asset "edd10cb"
                $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_edd10cb") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/core_file_frontend.js");
                echo "        <script src=\"";
                echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
                echo "\"></script>
        ";
            }
            unset($context["asset_url"]);
            // line 154
            echo "
    ";
        }
        // line 156
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreFileBundle:Form:multiupload_file_frontend_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  343 => 156,  339 => 154,  325 => 152,  321 => 151,  315 => 148,  311 => 147,  304 => 142,  302 => 141,  297 => 138,  289 => 132,  284 => 129,  281 => 128,  277 => 126,  275 => 125,  268 => 120,  261 => 118,  257 => 116,  255 => 115,  249 => 111,  243 => 107,  240 => 106,  237 => 104,  235 => 103,  229 => 100,  224 => 97,  221 => 96,  219 => 95,  217 => 94,  212 => 91,  208 => 89,  205 => 88,  199 => 86,  196 => 85,  188 => 83,  186 => 82,  183 => 81,  181 => 80,  176 => 77,  172 => 75,  166 => 73,  163 => 72,  161 => 71,  155 => 67,  149 => 62,  144 => 59,  136 => 56,  130 => 53,  121 => 50,  119 => 49,  115 => 47,  113 => 46,  110 => 45,  106 => 44,  101 => 41,  99 => 40,  96 => 39,  93 => 38,  88 => 34,  86 => 33,  83 => 32,  75 => 26,  73 => 25,  68 => 23,  64 => 22,  59 => 20,  55 => 19,  51 => 18,  47 => 17,  43 => 16,  39 => 15,  35 => 14,  29 => 10,  23 => 9,  20 => 8,);
    }
}
