<?php

/* FMElfinderBundle:Elfinder/compressed:_tinymce.html.twig */
class __TwigTemplate_fc6241f60031ea4bdc5d0e61e5768abcec2f511164c7f6d5f7ead2e30e9a4cea extends Twig_Template
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
    //<![CDATA[
    function elFinderBrowser (field_name, url, type, win) {
        tinyMCE.activeEditor.windowManager.open({
            file: \"";
        // line 5
        echo $this->env->getExtension('routing')->getUrl("elfinder");
        echo "\",
            title: 'elFinder 2.0',
            width: 900,
            height: 450,
            resizable: 'yes',
            inline: 'yes',
            popup_css: false,
            close_previous: 'no'
        }, {
            window: win,
            input: field_name
        });
        return false;
    }
    //]]>
</script>";
    }

    public function getTemplateName()
    {
        return "FMElfinderBundle:Elfinder/compressed:_tinymce.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 5,  19 => 1,);
    }
}
