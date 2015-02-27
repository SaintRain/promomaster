<?php

/* CoreCommonBundle:TwigExtensions:fastEditInit.html.twig */
class __TwigTemplate_85620b90eafa8d6eaa8addb3c290e0cc2f502aad0a2e0ffe5fd443106c56421b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'fastEditInit' => array($this, 'block_fastEditInit'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 7
        echo "
";
        // line 8
        $this->displayBlock('fastEditInit', $context, $blocks);
    }

    public function block_fastEditInit($context, array $blocks = array())
    {
        echo "    
    <script>
        var __fastEditTagName = \"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["tagName"]) ? $context["tagName"] : $this->getContext($context, "tagName")), "html", null, true);
        echo "\",
            __fastEditCTRL = false;
    </script>    

    ";
        // line 14
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "d0beed1_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d0beed1_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/fastEditInit_fastEditInit_1.js");
            // line 15
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "d0beed1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d0beed1") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/fastEditInit.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 16
        echo "    
    <a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("sonata_admin_dashboard");
        echo "\" style=\"z-index: 100; text-shadow: 1px 1px 2px white, 0 0 1em white; /* Параметры тени */display:block;position:fixed;top:3px;right:3px;font-size:18px;font-weight:bold;\">А<br>Д<br>М<br>И<br>Н<br>К<br>А</a>
";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:TwigExtensions:fastEditInit.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  60 => 17,  57 => 16,  43 => 15,  39 => 14,  32 => 10,  23 => 8,  20 => 7,);
    }
}
