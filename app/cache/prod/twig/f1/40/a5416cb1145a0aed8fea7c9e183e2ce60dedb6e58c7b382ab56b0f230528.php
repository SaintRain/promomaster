<?php

/* CoreCommonBundle:Pages:about.html.twig */
class __TwigTemplate_f140a5416cb1145a0aed8fea7c9e183e2ce60dedb6e58c7b382ab56b0f230528 extends Twig_Template
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
        if (((isset($context["article"]) ? $context["article"] : null) && $this->getAttribute((isset($context["article"]) ? $context["article"] : null), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))))) {
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html");
        } else {
            // line 8
            echo "Об интернет-магазине";
        }
    }

    // line 12
    public function block_meta_keywords($context, array $blocks = array())
    {
        // line 13
        if (((isset($context["article"]) ? $context["article"] : null) && $this->getAttribute((isset($context["article"]) ? $context["article"] : null), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))))) {
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
        } else {
            // line 16
            echo "о нас, о магазине";
        }
    }

    // line 20
    public function block_meta_description($context, array $blocks = array())
    {
        // line 21
        if (((isset($context["article"]) ? $context["article"] : null) && $this->getAttribute((isset($context["article"]) ? $context["article"] : null), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))))) {
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
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

                <h1>
                    ";
        // line 39
        if ((isset($context["article"]) ? $context["article"] : null)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
        }
        echo "</h1>
                ";
        // line 40
        if ((isset($context["article"]) ? $context["article"] : null)) {
            // line 41
            echo "                ";
            echo $this->getAttribute((isset($context["article"]) ? $context["article"] : null), ("body" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
            echo "
                ";
        }
        // line 43
        echo "            </div>
        </div>

        ";
        // line 46
        $this->displayBlock('menu_left', $context, $blocks);
        // line 49
        echo "    </div>
";
    }

    // line 46
    public function block_menu_left($context, array $blocks = array())
    {
        // line 47
        echo "            ";
        echo twig_include($this->env, $context, "CoreCommonBundle:Fragments:menuLeft.html.twig");
        echo "
        ";
    }

    // line 51
    public function block_js_head($context, array $blocks = array())
    {
        // line 52
        echo "    ";
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
    ";
        // line 58
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
        return array (  134 => 58,  129 => 52,  126 => 51,  119 => 47,  116 => 46,  111 => 49,  109 => 46,  104 => 43,  98 => 41,  96 => 40,  90 => 39,  82 => 34,  75 => 29,  72 => 28,  67 => 24,  64 => 22,  62 => 21,  59 => 20,  54 => 16,  51 => 14,  49 => 13,  46 => 12,  41 => 8,  38 => 6,  36 => 5,  33 => 4,);
    }
}
