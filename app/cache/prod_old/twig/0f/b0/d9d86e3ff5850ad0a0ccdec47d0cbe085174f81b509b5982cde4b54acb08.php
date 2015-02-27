<?php

/* CoreFaqBundle:Faq:article.html.twig */
class __TwigTemplate_0fb0d9d86e3ff5850ad0a0ccdec47d0cbe085174f81b509b5982cde4b54acb08 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreFaqBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'meta_description' => array($this, 'block_meta_description'),
            'main_content' => array($this, 'block_main_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CoreFaqBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        if ($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html");
        } else {
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "category", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo " | OliKids.ru";
        }
    }

    // line 11
    public function block_meta_keywords($context, array $blocks = array())
    {
        // line 12
        if ($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html");
        } else {
            // line 15
            echo "помощь, вопросы, фак, FAQ, ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "category", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
        }
    }

    // line 19
    public function block_meta_description($context, array $blocks = array())
    {
        // line 20
        if ($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html");
        } else {
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo " - вопрос из категории ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "category", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo " на сайте OliKids. Если Вы не смогли найти ответ на свой вопрос - пожалуйста, свяжитесь с нами.";
        }
    }

    // line 27
    public function block_main_content($context, array $blocks = array())
    {
        // line 28
        echo "    <ul class=\"info_page_path page_path_links\">
\t<li class=\"page_path_link\">
            <a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">OliKids</a>
        </li>
        <li class=\"page_path_link\">
            <a href=\"";
        // line 33
        echo $this->env->getExtension('routing')->getPath("core_faq_homepage");
        echo "\">Помощь</a>
        </li>
        <li class=\"page_path_link\">
            <a href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_faq_category", array("categorySlug" => $this->getAttribute($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "category", array()), "slug", array()))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "category", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
        echo "</a>
        </li>
\t<li class=\"page_path_link\">
            <strong>";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
        echo "</strong>
        </li>
    </ul>
    <h1 ";
        // line 42
        echo $this->env->getExtension('fastedit_extension')->fastEditFunction((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")));
        echo ">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
        echo "</h1>
    <article class=\"def_style\" ";
        // line 43
        echo $this->env->getExtension('fastedit_extension')->fastEditFunction((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")));
        echo ">
        ";
        // line 44
        echo $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), ("body" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
        echo "
    </article>
    ";
        // line 46
        $this->env->loadTemplate("CoreFaqBundle:Faq:search_form.html.twig")->display(array_merge($context, array("form" => (isset($context["searchForm"]) ? $context["searchForm"] : $this->getContext($context, "searchForm")))));
    }

    public function getTemplateName()
    {
        return "CoreFaqBundle:Faq:article.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 46,  122 => 44,  118 => 43,  112 => 42,  106 => 39,  98 => 36,  92 => 33,  86 => 30,  82 => 28,  79 => 27,  71 => 23,  68 => 21,  66 => 20,  63 => 19,  55 => 15,  52 => 13,  50 => 12,  47 => 11,  39 => 7,  36 => 5,  34 => 4,  31 => 3,);
    }
}
