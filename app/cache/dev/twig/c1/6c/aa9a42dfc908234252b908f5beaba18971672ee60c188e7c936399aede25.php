<?php

/* JnsXhprofBundle:Collector:xhprof.html.twig */
class __TwigTemplate_c16caa9a42dfc908234252b908f5beaba18971672ee60c188e7c936399aede25 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("WebProfilerBundle:Profiler:layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "WebProfilerBundle:Profiler:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        ob_start();
        // line 5
        echo "        ";
        // line 6
        echo "        <img width=\"28\" height=\"28\" alt=\"Time\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAYAAAByDd+UAAAB7UlEQVR42r2VTShEYRiFzfU3jRSi/CSRZEF2mFIjMxsbSrGwsaBYULbMykZZWtjZaEqpWVjMzspE2WosWJCIpY0U4+c66tw6fc3MvbkzM/X0fr/vmfPe77u3wrbtsuJpEX6BP8oiqELFEHUVY+wEPTJWMsFKxl2wz7ZVfEEmZqwHd+ADtPsV9eJuGthkS+ZK5vBIBB9Bsx+XbmK94IViWcbV/C7dT7NbOeMU+QLfbF+BoCR2FVIKXYUQyFDk23FI5g2Xuq8VLHsVVHdTIpACe9K/AJYI6b5NrgnLuCeHSRGYA12Gy2knoYj3yTNP5yq1viurQA37/eCVG59AB8cTIniSoyqHnHtnXOF4rSOq6upyQxInZHzYOTxkTOaiMv7F+ABa1KnTaAAxEAHj4Fo2TxouUjKXlLKmDbEfxgMQBk1a0hgnTTKgjmuqcjj5AN1gEdjiKu4ICzEVjEiCLKMNtsWBfqZOjRN8K/0drjlm/40x4sXhEOcto6yzcj9t4Rm0cc0AyJoO8z3DCTBa4MpY4IyJPokN1o3yDzJvFDQYp9QT6nLBEWS8kedt5Tn9AeMeCkxcwGUQXErJlvQPOW3JFzDeNP9yuUaxc1Dt9gL3I2gxNoJ7MGO48yfoUtoREJK50gia5SuLoJ5IH4Kl5Rd9TFtTIy1XIQAAAABJRU5ErkJggg==\">
        <span>XHProf</span>
    ";
        $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 9
        echo "    ";
        if ( !$this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "profiling", array())) {
            // line 10
            echo "        ";
            ob_start();
            // line 11
            echo "            ";
            ob_start();
            // line 12
            echo "                <span>Not profiling</span>
            ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 14
            echo "        ";
            $context["text"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 15
            echo "    ";
        }
        // line 16
        echo "    ";
        ob_start();
        // line 17
        echo "        ";
        if ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "profiling", array())) {
            // line 18
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "xhprofurl", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["icon"]) ? $context["icon"] : $this->getContext($context, "icon")), "html", null, true);
            echo "</a>
        ";
        } else {
            // line 20
            echo "            <span>";
            echo twig_escape_filter($this->env, (isset($context["icon"]) ? $context["icon"] : $this->getContext($context, "icon")), "html", null, true);
            echo "</span>
        ";
        }
        // line 22
        echo "    ";
        $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 23
        echo "    <div class=\"sf-toolbar-block\">
        <div class=\"sf-toolbar-icon\">";
        // line 24
        echo twig_escape_filter($this->env, ((array_key_exists("icon", $context)) ? (_twig_default_filter((isset($context["icon"]) ? $context["icon"] : $this->getContext($context, "icon")), "")) : ("")), "html", null, true);
        echo "</div>
        <div class=\"sf-toolbar-info\">";
        // line 25
        echo twig_escape_filter($this->env, ((array_key_exists("text", $context)) ? (_twig_default_filter((isset($context["text"]) ? $context["text"] : $this->getContext($context, "text")), "")) : ("")), "html", null, true);
        echo "</div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "JnsXhprofBundle:Collector:xhprof.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 25,  94 => 24,  91 => 23,  88 => 22,  82 => 20,  74 => 18,  71 => 17,  68 => 16,  65 => 15,  62 => 14,  58 => 12,  55 => 11,  52 => 10,  49 => 9,  44 => 6,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
