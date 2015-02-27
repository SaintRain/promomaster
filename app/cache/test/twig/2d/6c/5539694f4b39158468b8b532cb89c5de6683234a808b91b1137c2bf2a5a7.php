<?php

/* CoreCommonBundle:Pages:about.html.twig */
class __TwigTemplate_2d6c5539694f4b39158468b8b532cb89c5de6683234a808b91b1137c2bf2a5a7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'meta_description' => array($this, 'block_meta_description'),
            'content' => array($this, 'block_content'),
            'menu_left' => array($this, 'block_menu_left'),
            'js_head' => array($this, 'block_js_head'),
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

    // line 4
    public function block_title($context, array $blocks = array())
    {
        // line 5
        if ($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html");
        } else {
            // line 8
            echo "Об интернет-магазине";
        }
    }

    // line 12
    public function block_meta_keywords($context, array $blocks = array())
    {
        // line 13
        if ($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
        } else {
            // line 16
            echo "о нас, о магазине";
        }
    }

    // line 20
    public function block_meta_description($context, array $blocks = array())
    {
        // line 21
        if ($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
        } else {
            // line 24
            echo "О магазине";
        }
    }

    // line 28
    public function block_content($context, array $blocks = array())
    {
        // line 29
        echo "    <div role=\"main\" class=\"contacts_page info_page\" id=\"content\">
        <div class=\"main_col\">
            <div class=\"main_col_pad\">

                <ul class=\"info_page_path page_path_links\">
                    <li class=\"page_path_link\"><a href=\"";
        // line 34
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">OliKids</a></li>
                    <li class=\"page_path_link\"><strong>О магазине</strong></li>
                </ul>

                <h1>";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
        echo "</h1>

                ";
        // line 40
        echo $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), ("body" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
        echo "

            </div>
        </div>

        ";
        // line 45
        $this->displayBlock('menu_left', $context, $blocks);
        // line 48
        echo "    </div>
";
    }

    // line 45
    public function block_menu_left($context, array $blocks = array())
    {
        // line 46
        echo "            ";
        echo twig_include($this->env, $context, "CoreCommonBundle:Fragments:menuLeft.html.twig");
        echo "
        ";
    }

    // line 50
    public function block_js_head($context, array $blocks = array())
    {
        // line 51
        echo "    ";
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
    ";
        // line 57
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Pages:about.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 57,  122 => 51,  119 => 50,  112 => 46,  109 => 45,  104 => 48,  102 => 45,  94 => 40,  89 => 38,  82 => 34,  75 => 29,  72 => 28,  67 => 24,  64 => 22,  62 => 21,  59 => 20,  54 => 16,  51 => 14,  49 => 13,  46 => 12,  41 => 8,  38 => 6,  36 => 5,  33 => 4,);
    }
}
