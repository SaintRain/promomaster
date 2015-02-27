<?php

/* CoreFaqBundle:Faq:index.html.twig */
class __TwigTemplate_997b54f427026a2852bb0328172a4e0b5abc4e04c8392bb88d272c8619115b2c extends Twig_Template
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

    // line 4
    public function block_title($context, array $blocks = array())
    {
        // line 5
        if (((isset($context["rootCategory"]) ? $context["rootCategory"] : null) && $this->getAttribute((isset($context["rootCategory"]) ? $context["rootCategory"] : null), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))))) {
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rootCategory"]) ? $context["rootCategory"] : null), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html");
        } else {
            // line 8
            echo "Помощь и наиболее часто задаваемые вопросы | OliKids.ru";
        }
    }

    // line 12
    public function block_meta_keywords($context, array $blocks = array())
    {
        // line 13
        if (((isset($context["rootCategory"]) ? $context["rootCategory"] : null) && $this->getAttribute((isset($context["rootCategory"]) ? $context["rootCategory"] : null), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))))) {
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rootCategory"]) ? $context["rootCategory"] : null), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html");
        } else {
            // line 16
            echo "помощь, вопросы, фак, FAQ";
        }
    }

    // line 20
    public function block_meta_description($context, array $blocks = array())
    {
        // line 21
        if (((isset($context["rootCategory"]) ? $context["rootCategory"] : null) && $this->getAttribute((isset($context["rootCategory"]) ? $context["rootCategory"] : null), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))))) {
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["rootCategory"]) ? $context["rootCategory"] : null), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html");
        } else {
            // line 24
            echo "Помощь по работе с интернет-магазином OliKids. Наиболее часто задаваемые вопросы и ответы на них.";
        }
    }

    // line 28
    public function block_main_content($context, array $blocks = array())
    {
        // line 29
        echo "    <ul class=\"info_page_path page_path_links\">
\t<li class=\"page_path_link\">
            <a href=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">OliKids</a>
        </li>
\t<li class=\"page_path_link\">
            <strong>Помощь</strong>
        </li>
    </ul>
    <h1>Помощь</h1>
    ";
        // line 38
        $this->env->loadTemplate("CoreFaqBundle:Faq:search_form.html.twig")->display(array_merge($context, array("form" => (isset($context["searchForm"]) ? $context["searchForm"] : null))));
        // line 39
        echo "    <div class=\"help_cats\">
        ";
        // line 40
        $context["i"] = 0;
        // line 41
        echo "        ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        $context['_iterated'] = false;
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            // line 42
            echo "            ";
            if ((((isset($context["i"]) ? $context["i"] : null) % 2) == 0)) {
                // line 43
                echo "                <div class=\"help_cat_group grid_container\">
            ";
            }
            // line 45
            echo "                <div ";
            echo $this->env->getExtension('fastedit_extension')->fastEditFunction($context["cat"]);
            echo " class=\"help_cat grid_item\">
                    ";
            // line 46
            $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
            // line 47
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_faq_category", array("categorySlug" => $this->getAttribute($context["cat"], "slug", array()))), "html", null, true);
            echo "\" class=\"help_cat_link\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["cat"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo "</a>
                    <ul class=\"round_bullet\">
                        ";
            // line 49
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["cat"], "articles", array()));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
                // line 50
                echo "                            <li ";
                echo $this->env->getExtension('fastedit_extension')->fastEditFunction($context["article"]);
                echo ">
                                <a href=\"";
                // line 51
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_faq_article", array("categorySlug" => $this->getAttribute($context["cat"], "slug", array()), "articleSlug" => $this->getAttribute($context["article"], "slug", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["article"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                echo "</a>
                            </li>
                            ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 54
                echo "                                <div class=\"info_box\">
                                    <h6>Информация отсутствует</h6>
                                </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            echo "                    </li>
                </div>
            ";
            // line 60
            if (((((isset($context["i"]) ? $context["i"] : null) % 2) == 0) || (((twig_length_filter($this->env, (isset($context["categories"]) ? $context["categories"] : null)) % 2) != 0) && $this->getAttribute($context["loop"], "last", array())))) {
                // line 61
                echo "                </div>
                ";
                // line 62
                $context["i"] = 0;
                // line 63
                echo "            ";
            }
            // line 64
            echo "            ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 65
            echo "                <div class=\"info_box\">
                    <h6>Категории не найдено</h6>
                </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "CoreFaqBundle:Faq:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  200 => 69,  191 => 65,  178 => 64,  175 => 63,  173 => 62,  170 => 61,  168 => 60,  164 => 58,  155 => 54,  145 => 51,  140 => 50,  135 => 49,  127 => 47,  125 => 46,  120 => 45,  116 => 43,  113 => 42,  94 => 41,  92 => 40,  89 => 39,  87 => 38,  77 => 31,  73 => 29,  70 => 28,  65 => 24,  62 => 22,  60 => 21,  57 => 20,  52 => 16,  49 => 14,  47 => 13,  44 => 12,  39 => 8,  36 => 6,  34 => 5,  31 => 4,);
    }
}
