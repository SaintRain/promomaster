<?php

/* FMElfinderBundle:Elfinder/compressed:_tinymce4.html.twig */
class __TwigTemplate_e9a75146ccd9f633a84c6a9cc0d3d54f609e2c5cc78a0f2ec2431e0e39b4c394 extends Twig_Template
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
        echo "<script type=\"text/javascript\">
    function elFinderBrowser (field_name, url, type, win) {
        tinymce.activeEditor.windowManager.open({
            file:\"";
        // line 4
        echo $this->env->getExtension('routing')->getUrl("elfinder");
        echo "\",
            title: 'elFinder 2.0',
            width: 900,
            height: 450,
            resizable: 'yes'
        }, {
            setUrl: function (url) {
                win.document.getElementById(field_name).value = url;
            }
        });
        return false;
    }
</script>";
    }

    public function getTemplateName()
    {
        return "FMElfinderBundle:Elfinder/compressed:_tinymce4.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 4,  19 => 1,);
    }
}
