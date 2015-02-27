<?php

/* CoreFileBundle:Form:multiupload_file_frontend_widget.html.twig */
class __TwigTemplate_ee0c35250c0286671830de6c3441e4d68abe022455d2c7714ad5578be4146586 extends Twig_Template
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
        // line 1
        echo "
";
        // line 9
        echo "
";
        // line 10
        $this->displayBlock('multiupload_file_frontend_widget', $context, $blocks);
    }

    public function block_multiupload_file_frontend_widget($context, array $blocks = array())
    {
        // line 11
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
        echo "][form_id]\" value=\"";
        echo twig_escape_filter($this->env, (isset($context["uniqId"]) ? $context["uniqId"] : $this->getContext($context, "uniqId")), "html", null, true);
        echo "\"/>

        ";
        // line 24
        if ((isset($context["showCounterOfFiles"]) ? $context["showCounterOfFiles"] : $this->getContext($context, "showCounterOfFiles"))) {
            // line 25
            echo "
            <br>
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
            <div class=\"alert alert-danger ajax-error-main hidden hide-by-timer\" data-hide-after=\"5\"></div>
            <div class=\"alert alert-success ajax-success-main hidden hide-by-timer\" data-hide-after=\"20\"></div>

        ";
        }
        // line 39
        echo "
        ";
        // line 40
        if ((isset($context["showAttachedFiles"]) ? $context["showAttachedFiles"] : $this->getContext($context, "showAttachedFiles"))) {
            // line 41
            echo "
            <div class=\"CoreFileAttached\">
                <ul>
                    ";
            // line 44
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["files"]) ? $context["files"] : $this->getContext($context, "files")));
            foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                // line 45
                echo "                        <li>
                            <span class=\"file-name\">";
                // line 46
                if ($this->getAttribute($context["file"], "id", array(), "any", true, true)) {
                    echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "name", array()), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->getAttribute(twig_split_filter($this->env, $this->getAttribute($context["file"], "name", array()), "#"), 1, array(), "array"), "html", null, true);
                }
                echo "</span>
                            ";
                // line 47
                if ($this->getAttribute($context["file"], "id", array(), "any", true, true)) {
                    // line 48
                    echo "                                &nbsp;<a class=\"file-link\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["file"])), "html", null, true);
                    echo "\" target=\"_blank\">Скачать</a>
                            ";
                }
                // line 50
                echo "                                &nbsp;<span class=\"file-remove\" ";
                if ($this->getAttribute($context["file"], "id", array(), "any", true, true)) {
                    echo "data-id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "id", array()), "html", null, true);
                    echo "\"";
                } else {
                    echo "data-hash=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "name", array()), "html", null, true);
                    echo "\"";
                }
                echo ">X</span>
                        </li>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 53
            echo "                    <li class=\"hidden\"><span class=\"file-name\"></span>&nbsp;<a class=\"file-link\" href=\"#\" target=\"_blank\">Скачать</a>&nbsp;<span class=\"file-remove\">X</span></li>
                </ul>
            </div>

        ";
        }
        // line 58
        echo "
    </div>

    ";
        // line 61
        if ((!(isset($context["libStats"]) ? $context["libStats"] : $this->getContext($context, "libStats")))) {
            // line 62
            echo "
        <script>
            \$(function(){\$('.hidden').hide();});
            var core_file_ajax_upload_file = '";
            // line 65
            echo $this->env->getExtension('routing')->getPath("core_file_ajax_upload_file");
            echo "',
                    core_file_ajax_remove_file = '";
            // line 66
            echo $this->env->getExtension('routing')->getPath("core_file_ajax_remove_file");
            echo "';
        </script>
        
    ";
            // line 69
            if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
                // asset "edd10cb_0"
                $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_edd10cb_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/core_file_frontend_core_file_frontend_1.js");
                // line 70
                echo "    <script src=\"";
                echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
                echo "\"></script>
    ";
            } else {
                // asset "edd10cb"
                $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_edd10cb") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/core_file_frontend.js");
                echo "    <script src=\"";
                echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
                echo "\"></script>
    ";
            }
            unset($context["asset_url"]);
            // line 71
            echo "         

    ";
        }
        // line 74
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreFileBundle:Form:multiupload_file_frontend_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  199 => 74,  194 => 71,  180 => 70,  176 => 69,  170 => 66,  166 => 65,  161 => 62,  159 => 61,  154 => 58,  147 => 53,  129 => 50,  123 => 48,  121 => 47,  113 => 46,  110 => 45,  106 => 44,  101 => 41,  99 => 40,  96 => 39,  89 => 34,  87 => 33,  84 => 32,  75 => 25,  73 => 24,  66 => 22,  61 => 20,  57 => 19,  53 => 18,  49 => 17,  45 => 16,  41 => 15,  37 => 14,  32 => 11,  26 => 10,  23 => 9,  20 => 1,);
    }
}
