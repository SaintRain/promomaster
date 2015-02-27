<?php

/* CoreCommonBundle::main_layout2.html.twig */
class __TwigTemplate_d0d54c8ce0731e585defff69ae61a4d5d648fb1247f2f7c9da36c913506d5506 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("CoreCommonBundle::base_layout2.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CoreCommonBundle::base_layout2.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "     ";
        // line 5
        echo "         <div class=\"wrapper\">
             ";
        // line 6
        $this->displayBlock('header', $context, $blocks);
        // line 9
        echo "
             ";
        // line 10
        $this->displayBlock('content', $context, $blocks);
        // line 12
        echo "
             ";
        // line 13
        $this->displayBlock('footer', $context, $blocks);
        // line 16
        echo "
         </div><!--/wrapper-->
     ";
        // line 19
        echo " ";
    }

    // line 6
    public function block_header($context, array $blocks = array())
    {
        // line 7
        echo "                 ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("CoreCommonBundle:Fragments:header2", array("request" => $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()))));
        echo "
             ";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "             ";
    }

    // line 13
    public function block_footer($context, array $blocks = array())
    {
        // line 14
        echo "                 ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("CoreCommonBundle:Fragments:footer2", array("request" => $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()))));
        echo "
             ";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle::main_layout2.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 14,  84 => 13,  80 => 11,  77 => 10,  70 => 7,  67 => 6,  63 => 19,  59 => 16,  57 => 13,  54 => 12,  52 => 10,  49 => 9,  47 => 6,  44 => 5,  42 => 4,  39 => 3,  11 => 1,);
    }
}
