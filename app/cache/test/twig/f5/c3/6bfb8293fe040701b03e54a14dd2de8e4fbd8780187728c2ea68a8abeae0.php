<?php

/* FMElfinderBundle:Elfinder/helper:_tinymce.html.twig */
class __TwigTemplate_f5c36bfb8293fe040701b03e54a14dd2de8e4fbd8780187728c2ea68a8abeae0 extends Twig_Template
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
            inline: 'yes',    // This parameter only has an effect if you use the inlinepopups plugin!
            popup_css: false, // Disable TinyMCE's default popup CSS
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
        return "FMElfinderBundle:Elfinder/helper:_tinymce.html.twig";
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
