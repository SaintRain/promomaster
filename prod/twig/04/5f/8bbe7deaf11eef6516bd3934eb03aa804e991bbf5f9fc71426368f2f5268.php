<?php

/* FMElfinderBundle:Elfinder:ckeditor.html.twig */
class __TwigTemplate_045f8bbe7deaf11eef6516bd3934eb03aa804e991bbf5f9fc71426368f2f5268 extends Twig_Template
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
    <meta charset=\"utf-8\">
    ";
        // line 5
        if ((isset($context["includeAssets"]) ? $context["includeAssets"] : null)) {
            // line 6
            echo "        ";
            $this->env->loadTemplate("FMElfinderBundle:Elfinder:helper/assets_css.html.twig")->display($context);
            // line 7
            echo "    ";
        }
        // line 8
        echo "</head>
<body>
";
        // line 10
        if ((isset($context["includeAssets"]) ? $context["includeAssets"] : null)) {
            // line 11
            echo "    ";
            $this->env->loadTemplate("FMElfinderBundle:Elfinder:helper/assets_js.html.twig")->display($context);
        }
        // line 13
        echo "<script type=\"text/javascript\" charset=\"utf-8\">
    function getUrlParam(paramName) {
        var reParam = new RegExp('(?:[\\?&]|&amp;)' + paramName + '=([^&]+)', 'i') ;
        var match = window.location.search.match(reParam) ;

        return (match && match.length > 1) ? match[1] : '' ;
    }
    \$().ready(function() {
        var funcNum = getUrlParam('CKEditorFuncNum');
        var mode = getUrlParam('mode');

        var f = \$('#elfinder').elfinder({
            url : '";
        // line 25
        echo $this->env->getExtension('routing')->getPath("ef_connect");
        echo "'+'?mode='+mode,
            lang : '";
        // line 26
        echo twig_escape_filter($this->env, (isset($context["locale"]) ? $context["locale"] : null), "html", null, true);
        echo "',
            getFileCallback : function(file) {
                if (funcNum) {
                    window.opener.CKEDITOR.tools.callFunction(funcNum, file.url);
                    window.close();
                }
            }
        });

        ";
        // line 35
        if ((isset($context["fullscreen"]) ? $context["fullscreen"] : null)) {
            // line 36
            echo "        \$(window).resize(function(){
            var h = \$(window).height();

            if(\$('#elfinder').height() != h - 20){
                \$('#elfinder').height(h -20).resize();
            }
        });
        ";
        }
        // line 44
        echo "    });
</script>
<div id=\"elfinder\"></div>
</body>
</html>



";
    }

    public function getTemplateName()
    {
        return "FMElfinderBundle:Elfinder:ckeditor.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 44,  75 => 36,  73 => 35,  61 => 26,  57 => 25,  43 => 13,  39 => 11,  37 => 10,  33 => 8,  30 => 7,  27 => 6,  25 => 5,  19 => 1,);
    }
}
