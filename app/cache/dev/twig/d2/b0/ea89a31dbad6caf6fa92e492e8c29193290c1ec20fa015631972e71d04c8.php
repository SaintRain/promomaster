<?php

/* CoreSphereConsoleBundle:Toolbar:toolbar.html.twig */
class __TwigTemplate_d2b0ea89a31dbad6caf6fa92e492e8c29193290c1ec20fa015631972e71d04c8 extends Twig_Template
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
        echo "        <a href=\"";
        echo $this->env->getExtension('routing')->getPath("console");
        echo "\" class=\"coresphere_console_popover\">
            <img width=\"13\" height=\"28\" alt=\"Console\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAcCAYAAABh2p9gAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJ
bWFnZVJlYWR5ccllPAAAAG5JREFUeNpi/P//PwM1ARMDlcGogZQDlhMnTlAtmi0sLBip70IkNiOF
rsMwkKGiouL/CE42Bw4cAGOqGejg4AA3mGouRDaYnGSD1YXoFhCyhIVYm4l16UguvmB5keLCAVTk
UNOFjKO13ggwECDAAAMNHZ7ErsJjAAAAAElFTkSuQmCC\"/>
        </a>
    ";
        $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 12
        echo "    ";
        $context["text"] = ('' === $tmp = "Console") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 13
        echo "
    ";
        // line 14
        $this->env->loadTemplate("WebProfilerBundle:Profiler:toolbar_item.html.twig")->display(array_merge($context, array("link" => false)));
    }

    public function getTemplateName()
    {
        return "CoreSphereConsoleBundle:Toolbar:toolbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 14,  56 => 13,  53 => 12,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
