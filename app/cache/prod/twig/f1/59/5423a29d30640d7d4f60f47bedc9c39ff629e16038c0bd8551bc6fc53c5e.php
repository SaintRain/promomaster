<?php

/* FMElfinderBundle:Elfinder:tinymce.html.twig */
class __TwigTemplate_f1595423a29d30640d7d4f60f47bedc9c39ff629e16038c0bd8551bc6fc53c5e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    ";
        // line 4
        if ((isset($context["includeAssets"]) ? $context["includeAssets"] : null)) {
            // line 5
            echo "        ";
            $this->env->loadTemplate("FMElfinderBundle:Elfinder:helper/assets_css.html.twig")->display($context);
            // line 6
            echo "    ";
        }
        // line 7
        echo "</head>
<body>
";
        // line 9
        if ((isset($context["includeAssets"]) ? $context["includeAssets"] : null)) {
            // line 10
            echo "    ";
            $this->env->loadTemplate("FMElfinderBundle:Elfinder:helper/assets_js.html.twig")->display($context);
        }
        // line 12
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, (isset($context["tinymce_popup_path"]) ? $context["tinymce_popup_path"] : null), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" charset=\"utf-8\">

    var FileBrowserDialogue = {
        init: function() {
            // Here goes your code for setting your custom things onLoad.
        },
        mySubmit: function (URL) {

            var win = tinyMCEPopup.getWindowArg('window');

            // pass selected file path to TinyMCE
            win.document.getElementById(tinyMCEPopup.getWindowArg('input')).value = URL;

            // are we an image browser?
            if (typeof(win.ImageDialog) != 'undefined') {
                // update image dimensions
                if (win.ImageDialog.getImageData) {
                    win.ImageDialog.getImageData();
                }
                // update preview if necessary
                if (win.ImageDialog.showPreviewImage) {
                    win.ImageDialog.showPreviewImage(URL);
                }
            }

            // close popup window
            tinyMCEPopup.close();
        }
    }

    tinyMCEPopup.onInit.add(FileBrowserDialogue.init, FileBrowserDialogue);

    \$().ready(function() {

        var f = \$('#elfinder').elfinder({
            url : '";
        // line 48
        echo $this->env->getExtension('routing')->getPath("ef_connect");
        echo "',
            lang : '";
        // line 49
        echo twig_escape_filter($this->env, (isset($context["locale"]) ? $context["locale"] : null), "html", null, true);
        echo "',
            getfile : {
                onlyURL : true,
                multiple : false,
                folders : false
            },
            getFileCallback : function(url) {
                path = '/' + url.path;
                FileBrowserDialogue.mySubmit(path);
            }
        }).elfinder('instance');
    });
</script>
<div id=\"elfinder\"></div>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "FMElfinderBundle:Elfinder:tinymce.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 49,  82 => 48,  42 => 12,  38 => 10,  36 => 9,  32 => 7,  29 => 6,  26 => 5,  24 => 4,  19 => 1,);
    }
}
