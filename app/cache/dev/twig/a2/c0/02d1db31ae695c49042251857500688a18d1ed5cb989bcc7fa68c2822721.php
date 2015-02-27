<?php

/* CoreCommonBundle::main_layout_simple.html.twig */
class __TwigTemplate_a2c002d1db31ae695c49042251857500688a18d1ed5cb989bcc7fa68c2822721 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'js_head' => array($this, 'block_js_head'),
            'menu' => array($this, 'block_menu'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CoreCommonBundle::main_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_js_head($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
    <script>var orderJsonString = 'null';</script>

    ";
        // line 6
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "6af700b_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_6af700b_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_layout_simple_jquery.fancybox.pack_1.js");
            // line 10
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "6af700b_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_6af700b_1") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_layout_simple_frontend.product_2.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "6af700b"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_6af700b") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_layout_simple.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 11
        echo "   

";
    }

    // line 15
    public function block_menu($context, array $blocks = array())
    {
    }

    // line 17
    public function block_header($context, array $blocks = array())
    {
        // line 18
        echo "    <div class=\"wrapper\">
        ";
        // line 19
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("CoreCommonBundle:Fragments:header", array("request" => $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "simple" => true)));
        echo "
    ";
    }

    // line 22
    public function block_content($context, array $blocks = array())
    {
        // line 23
        echo "    ";
    }

    // line 25
    public function block_footer($context, array $blocks = array())
    {
        // line 26
        echo "        ";
        $this->env->loadTemplate("CoreCommonBundle:Fragments/simple:footer.html.twig")->display($context);
        // line 27
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle::main_layout_simple.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 27,  107 => 26,  104 => 25,  100 => 23,  97 => 22,  91 => 19,  88 => 18,  85 => 17,  80 => 15,  74 => 11,  54 => 10,  50 => 6,  43 => 3,  40 => 2,  11 => 1,);
    }
}
