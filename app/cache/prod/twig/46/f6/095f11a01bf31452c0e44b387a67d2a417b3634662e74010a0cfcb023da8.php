<?php

/* CoreFaqBundle:Faq:search.html.twig */
class __TwigTemplate_46f6095f11a01bf31452c0e44b387a67d2a417b3634662e74010a0cfcb023da8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreFaqBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_description' => array($this, 'block_meta_description'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
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

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Помощь и наиболее часто задаваемые вопросы - поиск по запросу &quot;";
        echo twig_escape_filter($this->env, (isset($context["searchString"]) ? $context["searchString"] : null), "html", null, true);
        echo "&quot; | OliKids.ru";
    }

    // line 3
    public function block_meta_description($context, array $blocks = array())
    {
        echo "помощь, вопросы, фак, FAQ, ";
        echo twig_escape_filter($this->env, (isset($context["searchString"]) ? $context["searchString"] : null), "html", null, true);
    }

    // line 4
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "Результаты поиска в разделе помощи по запросу &quot;";
        echo twig_escape_filter($this->env, (isset($context["searchString"]) ? $context["searchString"] : null), "html", null, true);
        echo "&quot;. Если Вы не смогли найти ответ на свой вопрос - пожалуйста, свяжитесь с нами.";
    }

    // line 5
    public function block_main_content($context, array $blocks = array())
    {
        // line 6
        echo "    <ul class=\"info_page_path page_path_links\">
\t<li class=\"page_path_link\">
            <a href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">OliKids</a>
        </li>
        <li class=\"page_path_link\">
            <a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("core_faq_homepage");
        echo "\">Помощь</a>
        </li>
\t<li class=\"page_path_link\">
            <strong>Результаты поиска по запросу &quot;";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["searchString"]) ? $context["searchString"] : null), "html", null, true);
        echo "&quot;</strong>
        </li>
    </ul>
    <h1>Результаты поиска по запросу &quot;";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["searchString"]) ? $context["searchString"] : null), "html", null, true);
        echo "&quot;</h1>
    ";
        // line 18
        $this->env->loadTemplate("CoreFaqBundle:Faq:search_form.html.twig")->display(array_merge($context, array("form" => (isset($context["searchForm"]) ? $context["searchForm"] : null), "isSearched" => true)));
        // line 19
        echo "    <div class=\"help_cats\">
        ";
        // line 20
        $context["i"] = 0;
        // line 21
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
            // line 22
            echo "            ";
            if ((((isset($context["i"]) ? $context["i"] : null) % 2) == 0)) {
                // line 23
                echo "                <div class=\"help_cat_group grid_container\">
            ";
            }
            // line 25
            echo "                <div class=\"help_cat grid_item\">
                    ";
            // line 26
            $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
            // line 27
            echo "                    <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_faq_category", array("categorySlug" => $this->getAttribute($context["cat"], "slug", array()))), "html", null, true);
            echo "\" class=\"help_cat_link\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["cat"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo "</a>
                    <ul class=\"round_bullet\">
                        ";
            // line 29
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["cat"], "articles", array()));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
                // line 30
                echo "                            <li>
                                <a href=\"";
                // line 31
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_faq_article", array("categorySlug" => $this->getAttribute($context["cat"], "slug", array()), "articleSlug" => $this->getAttribute($context["article"], "slug", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["article"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                echo "</a>
                            </li>
                            ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 34
                echo "                                <div class=\"info_box\">
                                    <h6>Статьи не найдены</h6>
                                </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            echo "                    </li>
                </div>
            ";
            // line 40
            if (((((isset($context["i"]) ? $context["i"] : null) % 2) == 0) || (((twig_length_filter($this->env, (isset($context["categories"]) ? $context["categories"] : null)) % 2) != 0) && $this->getAttribute($context["loop"], "last", array())))) {
                // line 41
                echo "                </div>
                ";
                // line 42
                $context["i"] = 0;
                // line 43
                echo "            ";
            }
            // line 44
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
            // line 45
            echo "                <div class=\"info_box\">
                    <h6>К сожалению, по запросу &DoubleDot;";
            // line 46
            echo twig_escape_filter($this->env, (isset($context["searchString"]) ? $context["searchString"] : null), "html", null, true);
            echo "&DoubleDot; ничего не удалось найти </h6>
                </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "CoreFaqBundle:Faq:search.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  195 => 49,  186 => 46,  183 => 45,  170 => 44,  167 => 43,  165 => 42,  162 => 41,  160 => 40,  156 => 38,  147 => 34,  137 => 31,  134 => 30,  129 => 29,  121 => 27,  119 => 26,  116 => 25,  112 => 23,  109 => 22,  90 => 21,  88 => 20,  85 => 19,  83 => 18,  79 => 17,  73 => 14,  67 => 11,  61 => 8,  57 => 6,  54 => 5,  46 => 4,  39 => 3,  31 => 2,);
    }
}
