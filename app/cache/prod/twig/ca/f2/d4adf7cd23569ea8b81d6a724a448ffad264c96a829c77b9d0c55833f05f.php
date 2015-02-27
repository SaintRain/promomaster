<?php

/* ApplicationSonataUserBundle:Profile:products_history.html.twig */
class __TwigTemplate_caf2d4adf7cd23569ea8b81d6a724a448ffad264c96a829c77b9d0c55833f05f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataUserBundle::cabinet_layout.html.twig");

        $_trait_0 = $this->env->loadTemplate("CoreProductBundle:Catalog:products_container.html.twig");
        // line 11
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."CoreProductBundle:Catalog:products_container.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'title' => array($this, 'block_title'),
                'meta_keywords' => array($this, 'block_meta_keywords'),
                'meta_description' => array($this, 'block_meta_description'),
                'seo' => array($this, 'block_seo'),
                'js_head' => array($this, 'block_js_head'),
                'products_container_filter_sort_last' => array($this, 'block_products_container_filter_sort_last'),
                'products_container_controls' => array($this, 'block_products_container_controls'),
                'main_content' => array($this, 'block_main_content'),
            )
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataUserBundle::cabinet_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 14
        $context["_page"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "page"), "method");
        // line 15
        ob_start();
        // line 16
        if (((isset($context["_page"]) ? $context["_page"] : null) && ((isset($context["_page"]) ? $context["_page"] : null) > 1))) {
            echo ", страница ";
            echo twig_escape_filter($this->env, (isset($context["_page"]) ? $context["_page"] : null), "html", null, true);
        }
        $context["seoPage"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 19
    public function block_title($context, array $blocks = array())
    {
        echo "История просмотров";
        echo twig_escape_filter($this->env, (isset($context["seoPage"]) ? $context["seoPage"] : null), "html", null, true);
        echo " | OliKids.ru";
    }

    // line 20
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "история, просмотры, товары";
    }

    // line 21
    public function block_meta_description($context, array $blocks = array())
    {
        echo "История просмотренных товаров на сайте OliKids. Случайно закрыли вкладку с интересным товаром? Не проблема! История просмотров хранит все страницы товаров, на которые Вы заходили";
        echo twig_escape_filter($this->env, (isset($context["seoPage"]) ? $context["seoPage"] : null), "html", null, true);
        echo ".";
    }

    // line 23
    public function block_seo($context, array $blocks = array())
    {
        // line 24
        echo "    ";
        ob_start();
        // line 25
        echo "
        ";
        // line 26
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "query", array()), "all", array())) > 0)) {
            // line 27
            echo "
            ";
            // line 28
            if (((isset($context["_page"]) ? $context["_page"] : null) && ((isset($context["_page"]) ? $context["_page"] : null) > 1))) {
                // line 29
                echo "
                ";
                // line 30
                $context["canonical"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array("page" => (isset($context["_page"]) ? $context["_page"] : null), "_format" => "html"));
                // line 31
                echo "
            ";
            } else {
                // line 33
                echo "
                ";
                // line 34
                $context["canonical"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array("_format" => "html"));
                // line 35
                echo "
            ";
            }
            // line 37
            echo "
            <link rel=\"canonical\" href=\"";
            // line 38
            echo twig_escape_filter($this->env, (isset($context["canonical"]) ? $context["canonical"] : null), "html", null, true);
            echo "\" />

        ";
        }
        // line 41
        echo "

        ";
        // line 43
        $context["totalPageNumber"] = twig_round(($this->getAttribute((isset($context["products"]) ? $context["products"] : null), "getTotalItemCount", array()) / $this->getAttribute((isset($context["products"]) ? $context["products"] : null), "getItemNumberPerPage", array())), 0, "ceil");
        // line 44
        echo "
        ";
        // line 45
        if ((((isset($context["_page"]) ? $context["_page"] : null) - 1) > 0)) {
            // line 46
            echo "            ";
            if ((((isset($context["_page"]) ? $context["_page"] : null) - 1) == 1)) {
                // line 47
                echo "                <link rel=\"prev\" href=\"";
                echo $this->env->getExtension('routing')->getPath("application_sonata_user_profile_products_history_first_page", array("_format" => "html"));
                echo "\" />
            ";
            } else {
                // line 49
                echo "                <link rel=\"prev\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_profile_products_history", array("page" => ((isset($context["_page"]) ? $context["_page"] : null) - 1), "_format" => "html")), "html", null, true);
                echo "\" />
            ";
            }
            // line 51
            echo "        ";
        }
        // line 52
        echo "
        ";
        // line 53
        if ((((isset($context["_page"]) ? $context["_page"] : null) + 1) <= (isset($context["totalPageNumber"]) ? $context["totalPageNumber"] : null))) {
            // line 54
            echo "            ";
            if ((!(isset($context["_page"]) ? $context["_page"] : null))) {
                // line 55
                echo "                ";
                $context["_page"] = 1;
                // line 56
                echo "            ";
            }
            // line 57
            echo "            <link rel=\"next\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_profile_products_history", array("page" => ((isset($context["_page"]) ? $context["_page"] : null) + 1), "_format" => "html")), "html", null, true);
            echo "\" />
        ";
        }
        // line 59
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 63
    public function block_js_head($context, array $blocks = array())
    {
        // line 64
        echo "
    ";
        // line 65
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "

    ";
        // line 67
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "71f3162_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_71f3162_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/profile_frontend.order_1.js");
            // line 73
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "71f3162_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_71f3162_1") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/profile_frontend.profile_2.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "71f3162"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_71f3162") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/profile.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    // line 77
    public function block_products_container_filter_sort_last($context, array $blocks = array())
    {
        // line 78
        echo "    ";
        ob_start();
        // line 79
        echo "
        <li class=\"filter_sort_switch ";
        // line 80
        if (((isset($context["sort"]) ? $context["sort"] : null) == "viewed_desc")) {
            echo "active desc";
        } elseif (((isset($context["sort"]) ? $context["sort"] : null) == "viewed_asc")) {
            echo "active";
        }
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["routeFirsPage"]) ? $context["routeFirsPage"] : null), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : null), array("sort" => ((((isset($context["sort"]) ? $context["sort"] : null) == "viewed_asc")) ? ("viewed_desc") : ("viewed_asc"))))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("by date viewed", array(), "frontend"), "html", null, true);
        echo "</a></li>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 85
    public function block_products_container_controls($context, array $blocks = array())
    {
        // line 86
        echo "    ";
        ob_start();
        // line 87
        echo "
        <div class=\"controls\">
            <span id=\"clear-history-products\" class=\"text_tgl\" data-url-clear=\"";
        // line 89
        echo $this->env->getExtension('routing')->getPath("application_sonata_user_profile_products_history_clear", array("_format" => "json"));
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Clear history"), "html", null, true);
        echo "</span>
        </div>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 95
    public function block_main_content($context, array $blocks = array())
    {
        // line 96
        echo "    ";
        ob_start();
        // line 97
        echo "
        <section class=\"cabinet_history\">

            <h2>";
        // line 100
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("History products"), "html", null, true);
        echo "</h2>

            ";
        // line 103
        echo "            ";
        $context["routeFirsPage"] = "application_sonata_user_profile_products_history_first_page";
        // line 104
        echo "
            ";
        // line 106
        echo "            ";
        $this->displayBlock("products_container", $context, $blocks);
        echo "

        </section>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Profile:products_history.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  282 => 106,  279 => 104,  276 => 103,  271 => 100,  266 => 97,  263 => 96,  260 => 95,  249 => 89,  245 => 87,  242 => 86,  239 => 85,  223 => 80,  220 => 79,  217 => 78,  214 => 77,  192 => 73,  188 => 67,  183 => 65,  180 => 64,  177 => 63,  171 => 59,  165 => 57,  162 => 56,  159 => 55,  156 => 54,  154 => 53,  151 => 52,  148 => 51,  142 => 49,  136 => 47,  133 => 46,  131 => 45,  128 => 44,  126 => 43,  122 => 41,  116 => 38,  113 => 37,  109 => 35,  107 => 34,  104 => 33,  100 => 31,  98 => 30,  95 => 29,  93 => 28,  90 => 27,  88 => 26,  85 => 25,  82 => 24,  79 => 23,  71 => 21,  65 => 20,  57 => 19,  48 => 16,  46 => 15,  44 => 14,  14 => 11,);
    }
}
