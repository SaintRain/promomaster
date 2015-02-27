<?php

/* CoreProductBundle:Catalog:brand.html.twig */
class __TwigTemplate_0744203eaeb73842e189961e419d26df331190b25d33a1c9a2c9245be21758c0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreProductBundle:Catalog:layout.html.twig");

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
                'breadcrumbs' => array($this, 'block_breadcrumbs'),
                'promo' => array($this, 'block_promo'),
                'main_col' => array($this, 'block_main_col'),
                'right_col' => array($this, 'block_right_col'),
            )
        );
    }

    protected function doGetParent(array $context)
    {
        return "CoreProductBundle:Catalog:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 13
        $context["_page"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "page"), "method");
        // line 16
        ob_start();
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["filterBuilder"]) ? $context["filterBuilder"] : $this->getContext($context, "filterBuilder")), "categories", array(), "array"), "values", array(), "array"));
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["c"], "caption", array(), "array"), "html", null, true);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        $context["seoCats"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 20
        ob_start();
        // line 21
        if (((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) && ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) > 1))) {
            echo ", страница ";
            echo twig_escape_filter($this->env, (isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")), "html", null, true);
        }
        $context["seoPage"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 24
        $context["currentSeries"] = null;
        // line 25
        if ((twig_length_filter($this->env, (isset($context["series"]) ? $context["series"] : $this->getContext($context, "series"))) && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "slugSeries"), "method"))) {
            // line 26
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["series"]) ? $context["series"] : $this->getContext($context, "series")));
            foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
                // line 27
                if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "slugSeries"), "method") == $this->getAttribute($context["s"], "slug", array()))) {
                    // line 28
                    $context["currentSeries"] = $context["s"];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 33
    public function block_title($context, array $blocks = array())
    {
        // line 34
        ob_start();
        // line 35
        if ((!(isset($context["currentSeries"]) ? $context["currentSeries"] : $this->getContext($context, "currentSeries")))) {
            // line 36
            if ($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
                // line 37
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html");
                echo twig_escape_filter($this->env, (isset($context["seoPage"]) ? $context["seoPage"] : $this->getContext($context, "seoPage")), "html", null, true);
            } else {
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                if (((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) && ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) > 1))) {
                    echo " страница ";
                    echo twig_escape_filter($this->env, (isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")), "html", null, true);
                }
            }
        } else {
            // line 42
            echo "Товары от ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo " из серии ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentSeries"]) ? $context["currentSeries"] : $this->getContext($context, "currentSeries")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo " - тематические наборы, игрушки для малышей, машинки, грузовики";
            echo twig_escape_filter($this->env, (isset($context["seoCats"]) ? $context["seoCats"] : $this->getContext($context, "seoCats")), "html", null, true);
            echo twig_escape_filter($this->env, (isset($context["seoPage"]) ? $context["seoPage"] : $this->getContext($context, "seoPage")), "html", null, true);
            echo " | OliKids.ru";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 47
    public function block_meta_keywords($context, array $blocks = array())
    {
        // line 48
        ob_start();
        // line 49
        if ((!(isset($context["currentSeries"]) ? $context["currentSeries"] : $this->getContext($context, "currentSeries")))) {
            // line 50
            if ($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
                // line 51
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html");
            } else {
                // line 53
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            }
        } else {
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentSeries"]) ? $context["currentSeries"] : $this->getContext($context, "currentSeries")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo twig_escape_filter($this->env, (isset($context["seoCats"]) ? $context["seoCats"] : $this->getContext($context, "seoCats")), "html", null, true);
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 61
    public function block_meta_description($context, array $blocks = array())
    {
        // line 62
        ob_start();
        // line 63
        if ((!(isset($context["currentSeries"]) ? $context["currentSeries"] : $this->getContext($context, "currentSeries")))) {
            // line 64
            if ($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
                // line 65
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html");
                echo twig_escape_filter($this->env, (isset($context["seoPage"]) ? $context["seoPage"] : $this->getContext($context, "seoPage")), "html", null, true);
            } else {
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                if (((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) && ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) > 1))) {
                    echo " страница ";
                    echo twig_escape_filter($this->env, (isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")), "html", null, true);
                }
            }
        } else {
            // line 70
            echo "В интернет-магазине OliKids представлено большое разнообразие товаров из серии ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentSeries"]) ? $context["currentSeries"] : $this->getContext($context, "currentSeries")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo " от производителя ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo " - различные тематические наборы, игрушки для малышей, машинки, грузовики";
            echo twig_escape_filter($this->env, (isset($context["seoCats"]) ? $context["seoCats"] : $this->getContext($context, "seoCats")), "html", null, true);
            echo ". Фильтр поможет быстро подобрать товар от производителя ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo ", подходящий под Ваши требования";
            echo twig_escape_filter($this->env, (isset($context["seoPage"]) ? $context["seoPage"] : $this->getContext($context, "seoPage")), "html", null, true);
            echo ".";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 75
    public function block_seo($context, array $blocks = array())
    {
        // line 76
        echo "    ";
        ob_start();
        // line 77
        echo "
        ";
        // line 78
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "query", array()), "all", array())) > 0)) {
            // line 79
            echo "
            ";
            // line 80
            if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "slugSeries"), "method")) {
                // line 81
                echo "                ";
                $context["params"] = array("slugSeries" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "slugSeries"), "method"));
                // line 82
                echo "            ";
            } else {
                // line 83
                echo "                ";
                $context["params"] = array();
                // line 84
                echo "            ";
            }
            // line 85
            echo "
            ";
            // line 86
            if (((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) && ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) > 1))) {
                // line 87
                echo "
                ";
                // line 88
                $context["canonical"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), twig_array_merge(array("slug" => $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "slug", array()), "page" => (isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page"))), (isset($context["params"]) ? $context["params"] : $this->getContext($context, "params"))));
                // line 89
                echo "
            ";
            } else {
                // line 91
                echo "
                ";
                // line 92
                $context["canonical"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), twig_array_merge(array("slug" => $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "slug", array())), (isset($context["params"]) ? $context["params"] : $this->getContext($context, "params"))));
                // line 93
                echo "
            ";
            }
            // line 95
            echo "
            <link rel=\"canonical\" href=\"";
            // line 96
            echo twig_escape_filter($this->env, (isset($context["canonical"]) ? $context["canonical"] : $this->getContext($context, "canonical")), "html", null, true);
            echo "\" />

        ";
        }
        // line 99
        echo "

        ";
        // line 101
        $context["totalPageNumber"] = twig_round(($this->getAttribute((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), "getTotalItemCount", array()) / $this->getAttribute((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), "getItemNumberPerPage", array())), 0, "ceil");
        // line 102
        echo "
        ";
        // line 103
        if ((((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) - 1) > 0)) {
            // line 104
            echo "            ";
            if ((((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) - 1) == 1)) {
                // line 105
                echo "                <link rel=\"prev\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand_first_page", array("slug" => $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "slug", array()))), "html", null, true);
                echo "\" />
            ";
            } else {
                // line 107
                echo "                <link rel=\"prev\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand", array("slug" => $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "slug", array()), "page" => ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) - 1))), "html", null, true);
                echo "\" />
            ";
            }
            // line 109
            echo "        ";
        }
        // line 110
        echo "
        ";
        // line 111
        if ((((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) + 1) <= (isset($context["totalPageNumber"]) ? $context["totalPageNumber"] : $this->getContext($context, "totalPageNumber")))) {
            // line 112
            echo "            ";
            if ((!(isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")))) {
                // line 113
                echo "                ";
                $context["_page"] = 1;
                // line 114
                echo "            ";
            }
            // line 115
            echo "            <link rel=\"next\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand", array("slug" => $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "slug", array()), "page" => ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) + 1))), "html", null, true);
            echo "\" />
        ";
        }
        // line 117
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 121
    public function block_js_head($context, array $blocks = array())
    {
        // line 122
        echo "    ";
        ob_start();
        // line 123
        echo "
        ";
        // line 124
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
        <script>
            var google_tag_params = {
                ecomm_pagetype: 'category',
            };
            ";
        // line 130
        echo "        </script>
";
        // line 133
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 137
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 138
        echo "    ";
        ob_start();
        // line 139
        echo "
        <div id=\"page_path\">
            <ul class=\"page_path_links\">
                <li class=\"page_path_link\"><a href=\"";
        // line 142
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">OliKids</a></li>

                ";
        // line 144
        if ((!(isset($context["currentSeries"]) ? $context["currentSeries"] : $this->getContext($context, "currentSeries")))) {
            // line 145
            echo "
                    <li class=\"page_path_link\"><strong>";
            // line 146
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo "</strong></li>

                ";
        } else {
            // line 149
            echo "
                    <li class=\"page_path_link\"><a href=\"";
            // line 150
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand_first_page", array("slug" => $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "slug", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo "</a></li>
                    <li class=\"page_path_link\"><strong>";
            // line 151
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentSeries"]) ? $context["currentSeries"] : $this->getContext($context, "currentSeries")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo "</strong></li>

                ";
        }
        // line 154
        echo "
            </ul>
        </div>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 161
    public function block_promo($context, array $blocks = array())
    {
        // line 162
        echo "    ";
        ob_start();
        // line 163
        echo "
        ";
        // line 164
        if (((($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "logo", array()), "preview", "712x240_") || $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("description" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) || $this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "substrate", array()), "preview", "148x70_")) || $this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "seriesList", array()), "count", array()))) {
            // line 165
            echo "
            <section ";
            // line 166
            echo $this->env->getExtension('fastedit_extension')->fastEditFunction((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")));
            echo " class=\"brand_info\">
                <div class=\"brand_info_container\">
                    <div class=\"brand_info_content\">
                        <div class=\"brand_info_content_pad\">

                            ";
            // line 171
            if ($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "logo", array()), "preview", "148x70_")) {
                // line 172
                echo "                                ";
                $context["imgAlt"] = $this->getAttribute(twig_first($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "logo", array())), ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
                // line 173
                echo "                                <img alt=\"";
                echo twig_escape_filter($this->env, (isset($context["imgAlt"]) ? $context["imgAlt"] : $this->getContext($context, "imgAlt")), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, (isset($context["imgAlt"]) ? $context["imgAlt"] : $this->getContext($context, "imgAlt")), "html", null, true);
                echo "\" class=\"brand_info_logo\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "logo", array()), "preview", "148x70_")), "html", null, true);
                echo "\" width=\"148\" height=\"70\">

                            ";
            }
            // line 176
            echo "
                            ";
            // line 177
            if ($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("description" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
                // line 178
                echo "
                                <div class=\"brand_info_text\">
                                    ";
                // line 180
                echo $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("description" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
                echo "

                                    ";
                // line 182
                if ($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("descriptionContinue" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
                    // line 183
                    echo "
                                        <div class=\"description-hidden-part hidden\">

                                            ";
                    // line 186
                    echo $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("descriptionContinue" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
                    echo "

                                        </div> 
                                        <div class=\"clearfix\"></div>
                                        <span class=\"text_tgl trigger-description-hidden-part\" data-trigger-text=\"Скрыть часть описания\">Узнать больше</span><br><br>

                                    ";
                }
                // line 193
                echo "
                                </div>

                            ";
            }
            // line 197
            echo "
                            ";
            // line 198
            if (twig_length_filter($this->env, (isset($context["series"]) ? $context["series"] : $this->getContext($context, "series")))) {
                // line 199
                echo "
                                <ul class=\"brand_info_cats\">
                                    <li class=\"brand_info_cat\">

                                        ";
                // line 203
                if ((twig_length_filter($this->env, (isset($context["series"]) ? $context["series"] : $this->getContext($context, "series"))) > 1)) {
                    // line 204
                    echo "                                            Серии продуктов:
                                        ";
                } else {
                    // line 206
                    echo "                                            Серия продуктов:
                                        ";
                }
                // line 208
                echo "
                                    </li>

                                    ";
                // line 211
                $context["slugSeries"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "slugSeries"), "method");
                // line 212
                echo "
                                    ";
                // line 213
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["series"]) ? $context["series"] : $this->getContext($context, "series")));
                foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
                    // line 214
                    echo "
                                        <li class=\"brand_info_cat\">

                                            ";
                    // line 217
                    if (((!(isset($context["slugSeries"]) ? $context["slugSeries"] : $this->getContext($context, "slugSeries"))) || ((isset($context["slugSeries"]) ? $context["slugSeries"] : $this->getContext($context, "slugSeries")) != $this->getAttribute($context["s"], "slug", array())))) {
                        // line 218
                        echo "                                                <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand_series_first_page", array("slug" => $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "slug", array()), "slugSeries" => $this->getAttribute($context["s"], "slug", array()))), "html", null, true);
                        echo "\">";
                        echo $this->getAttribute($context["s"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
                        echo "</a>
                                            ";
                    } else {
                        // line 220
                        echo "                                                <strong>";
                        echo $this->getAttribute($context["s"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
                        echo "</strong>
                                            ";
                    }
                    // line 222
                    echo "
                                        </li>

                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 226
                echo "
                                </ul>

                            ";
            }
            // line 230
            echo "
                            <br>
                        </div>
                    </div>

                    ";
            // line 235
            if ($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "substrate", array()), "preview", "712x240_")) {
                // line 236
                echo "
                        <img class=\"brand_info_pic\" src=\"";
                // line 237
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "substrate", array()), "preview", "712x240_", true)), "html", null, true);
                echo "\" width=\"712\" height=\"240\">

                    ";
            }
            // line 240
            echo "
                </div>
            </section>

        ";
        }
        // line 245
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 249
    public function block_main_col($context, array $blocks = array())
    {
        // line 250
        echo "    ";
        ob_start();
        // line 251
        echo "
        ";
        // line 253
        echo "        ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "slugSeries"), "method")) {
            // line 254
            echo "            ";
            $context["routeFirsPage"] = "core_shop_product_brand_series_first_page";
            // line 255
            echo "        ";
        } else {
            // line 256
            echo "            ";
            $context["routeFirsPage"] = "core_shop_product_brand_first_page";
            // line 257
            echo "        ";
        }
        // line 258
        echo "
        ";
        // line 260
        echo "        ";
        $this->displayBlock("products_container", $context, $blocks);
        echo "

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 266
    public function block_right_col($context, array $blocks = array())
    {
        // line 267
        echo "
    <!-- filter with owl -->
    ";
        // line 269
        $this->env->loadTemplate("CorePropertyBundle:Filter:layout.html.twig")->display(array_merge($context, (isset($context["filterBuilder"]) ? $context["filterBuilder"] : $this->getContext($context, "filterBuilder"))));
        // line 270
        echo "    <!-- /filter with owl -->

";
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Catalog:brand.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  599 => 270,  597 => 269,  593 => 267,  590 => 266,  581 => 260,  578 => 258,  575 => 257,  572 => 256,  569 => 255,  566 => 254,  563 => 253,  560 => 251,  557 => 250,  554 => 249,  548 => 245,  541 => 240,  535 => 237,  532 => 236,  530 => 235,  523 => 230,  517 => 226,  508 => 222,  502 => 220,  494 => 218,  492 => 217,  487 => 214,  483 => 213,  480 => 212,  478 => 211,  473 => 208,  469 => 206,  465 => 204,  463 => 203,  457 => 199,  455 => 198,  452 => 197,  446 => 193,  436 => 186,  431 => 183,  429 => 182,  424 => 180,  420 => 178,  418 => 177,  415 => 176,  404 => 173,  401 => 172,  399 => 171,  391 => 166,  388 => 165,  386 => 164,  383 => 163,  380 => 162,  377 => 161,  368 => 154,  362 => 151,  356 => 150,  353 => 149,  347 => 146,  344 => 145,  342 => 144,  337 => 142,  332 => 139,  329 => 138,  326 => 137,  320 => 133,  317 => 130,  309 => 124,  306 => 123,  303 => 122,  300 => 121,  294 => 117,  288 => 115,  285 => 114,  282 => 113,  279 => 112,  277 => 111,  274 => 110,  271 => 109,  265 => 107,  259 => 105,  256 => 104,  254 => 103,  251 => 102,  249 => 101,  245 => 99,  239 => 96,  236 => 95,  232 => 93,  230 => 92,  227 => 91,  223 => 89,  221 => 88,  218 => 87,  216 => 86,  213 => 85,  210 => 84,  207 => 83,  204 => 82,  201 => 81,  199 => 80,  196 => 79,  194 => 78,  191 => 77,  188 => 76,  185 => 75,  169 => 70,  161 => 67,  157 => 65,  155 => 64,  153 => 63,  151 => 62,  148 => 61,  139 => 56,  135 => 53,  132 => 51,  130 => 50,  128 => 49,  126 => 48,  123 => 47,  110 => 42,  102 => 39,  98 => 37,  96 => 36,  94 => 35,  92 => 34,  89 => 33,  78 => 28,  76 => 27,  72 => 26,  70 => 25,  68 => 24,  62 => 21,  60 => 20,  49 => 17,  47 => 16,  45 => 13,  14 => 11,);
    }
}
