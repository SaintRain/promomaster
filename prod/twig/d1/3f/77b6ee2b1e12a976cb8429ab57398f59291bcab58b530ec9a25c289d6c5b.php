<?php

/* CoreCommonBundle:Pages:receiver.html.twig */
class __TwigTemplate_d13f77b6ee2b1e12a976cb8429ab57398f59291bcab58b530ec9a25c289d6c5b extends Twig_Template
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
        ob_start();
        // line 2
        echo "<html><head></head><body><script type=\"text/javascript\">q = new Object();tmp = location.search.substr(1).split('&');for (i = 0; i < tmp.length; i++) {tmp2 = tmp[i].split('=');q[tmp2[0]] = tmp2[1];}if (q['callback']){window.opener[q['callback']](q['token']);}else{window.opener.redirect(q['token'], q['redirect_uri']);}window.close();</script></body></html>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Pages:receiver.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  21 => 2,  19 => 1,);
    }
}
