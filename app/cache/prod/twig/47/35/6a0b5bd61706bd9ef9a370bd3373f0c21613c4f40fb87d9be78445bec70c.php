<?php

/* CoreFaqBundle:Faq:category.html.twig */
class __TwigTemplate_47356a0b5bd61706bd9ef9a370bd3373f0c21613c4f40fb87d9be78445bec70c extends Twig_Template
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
        if ($this->getAttribute((isset($context["category"]) ? $context["category"] : null), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) {
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html");
        } else {
            // line 7
            echo "Помощь - ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo " | OliKids.ru";
        }
    }

    // line 11
    public function block_meta_keywords($context, array $blocks = array())
    {
        // line 12
        if ($this->getAttribute((isset($context["category"]) ? $context["category"] : null), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) {
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html");
        } else {
            // line 15
            echo "помощь, вопросы, фак, FAQ, ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
        }
    }

    // line 19
    public function block_meta_description($context, array $blocks = array())
    {
        // line 20
        if ($this->getAttribute((isset($context["category"]) ? $context["category"] : null), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) {
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html");
        } else {
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo " в интернет-магазине OliKids. Если Вы не смогли найти ответ на свой вопрос - пожалуйста, свяжитесь с нами.";
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
\t<li class=\"page_path_link\">
            <strong>";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
        echo "</strong>
        </li>
    </ul>
    <h1 ";
        // line 39
        echo $this->env->getExtension('fastedit_extension')->fastEditFunction((isset($context["category"]) ? $context["category"] : null));
        echo ">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
        echo "</h1>
    ";
        // line 40
        $this->env->loadTemplate("CoreFaqBundle:Faq:search_form.html.twig")->display(array_merge($context, array("form" => (isset($context["searchForm"]) ? $context["searchForm"] : null))));
        // line 41
        echo "    <div class=\"help_cats\">
        <ul class=\"round_bullet\">
        ";
        // line 43
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["articles"]) ? $context["articles"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 44
            echo "            <li>
                <a href=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_faq_article", array("categorySlug" => $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "slug", array()), "articleSlug" => $this->getAttribute($context["article"], "slug", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["article"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo "</a>
            </li>
            ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 48
            echo "                <div class=\"info_box\">Раздел находится в стадии наполнения</div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "        </ul>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CoreFaqBundle:Faq:category.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 50,  129 => 48,  119 => 45,  116 => 44,  111 => 43,  107 => 41,  105 => 40,  99 => 39,  93 => 36,  87 => 33,  81 => 30,  77 => 28,  74 => 27,  68 => 23,  65 => 21,  63 => 20,  60 => 19,  54 => 15,  51 => 13,  49 => 12,  46 => 11,  39 => 7,  36 => 5,  34 => 4,  31 => 3,);
    }
}
