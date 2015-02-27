<?php

/* CoreFaqBundle:Faq:article.html.twig */
class __TwigTemplate_604840d64e854a029e143aac58b6801a079e24443e9d5a48480672521a142812 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("CoreFaqBundle::layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

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
        return array (  135 => 46,  130 => 44,  126 => 43,  120 => 42,  114 => 39,  106 => 36,  100 => 33,  94 => 30,  90 => 28,  87 => 27,  79 => 23,  76 => 21,  74 => 20,  71 => 19,  63 => 15,  60 => 13,  58 => 12,  55 => 11,  47 => 7,  44 => 5,  42 => 4,  39 => 3,  11 => 1,);
    }
}
