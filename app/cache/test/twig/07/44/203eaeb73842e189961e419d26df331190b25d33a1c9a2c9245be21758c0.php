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
        // line 35
        if ((!(isset($context["currentSeries"]) ? $context["currentSeries"] : $this->getContext($context, "currentSeries")))) {
            // line 37
            if ($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
                // line 38
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html");
                echo twig_escape_filter($this->env, (isset($context["seoPage"]) ? $context["seoPage"] : $this->getContext($context, "seoPage")), "html", null, true);
            } else {
                // line 40
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                if (((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) && ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) > 1))) {
                    echo " страница ";
                    echo twig_escape_filter($this->env, (isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")), "html", null, true);
                }
            }
        } else {
            // line 45
            echo "Товары от ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo " из серии ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentSeries"]) ? $context["currentSeries"] : $this->getContext($context, "currentSeries")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo " - тематические наборы, игрушки для малышей, машинки, грузовики";
            echo twig_escape_filter($this->env, (isset($context["seoCats"]) ? $context["seoCats"] : $this->getContext($context, "seoCats")), "html", null, true);
            echo twig_escape_filter($this->env, (isset($context["seoPage"]) ? $context["seoPage"] : $this->getContext($context, "seoPage")), "html", null, true);
            echo " | OliKids.ru";
        }
    }

    // line 51
    public function block_meta_keywords($context, array $blocks = array())
    {
        // line 53
        if ((!(isset($context["currentSeries"]) ? $context["currentSeries"] : $this->getContext($context, "currentSeries")))) {
            // line 55
            if ($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
                // line 56
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html");
            } else {
                // line 58
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            }
        } else {
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentSeries"]) ? $context["currentSeries"] : $this->getContext($context, "currentSeries")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo twig_escape_filter($this->env, (isset($context["seoCats"]) ? $context["seoCats"] : $this->getContext($context, "seoCats")), "html", null, true);
        }
    }

    // line 69
    public function block_meta_description($context, array $blocks = array())
    {
        // line 71
        if ((!(isset($context["currentSeries"]) ? $context["currentSeries"] : $this->getContext($context, "currentSeries")))) {
            // line 72
            if ($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
                // line 73
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html");
                echo twig_escape_filter($this->env, (isset($context["seoPage"]) ? $context["seoPage"] : $this->getContext($context, "seoPage")), "html", null, true);
            } else {
                // line 75
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                if (((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) && ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) > 1))) {
                    echo " страница ";
                    echo twig_escape_filter($this->env, (isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")), "html", null, true);
                }
            }
        } else {
            // line 81
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
    }

    // line 87
    public function block_seo($context, array $blocks = array())
    {
        // line 88
        echo "    ";
        ob_start();
        // line 89
        echo "
        ";
        // line 90
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "query", array()), "all", array())) > 0)) {
            // line 91
            echo "
            ";
            // line 92
            if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "slugSeries"), "method")) {
                // line 93
                echo "                ";
                $context["params"] = array("slugSeries" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "slugSeries"), "method"));
                // line 94
                echo "            ";
            } else {
                // line 95
                echo "                ";
                $context["params"] = array();
                // line 96
                echo "            ";
            }
            // line 97
            echo "
            ";
            // line 98
            if (((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) && ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) > 1))) {
                // line 99
                echo "
                ";
                // line 100
                $context["canonical"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), twig_array_merge(array("slug" => $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "slug", array()), "page" => (isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page"))), (isset($context["params"]) ? $context["params"] : $this->getContext($context, "params"))));
                // line 101
                echo "
            ";
            } else {
                // line 103
                echo "
                ";
                // line 104
                $context["canonical"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), twig_array_merge(array("slug" => $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "slug", array())), (isset($context["params"]) ? $context["params"] : $this->getContext($context, "params"))));
                // line 105
                echo "
            ";
            }
            // line 107
            echo "
            <link rel=\"canonical\" href=\"";
            // line 108
            echo twig_escape_filter($this->env, (isset($context["canonical"]) ? $context["canonical"] : $this->getContext($context, "canonical")), "html", null, true);
            echo "\" />

        ";
        }
        // line 111
        echo "

        ";
        // line 113
        $context["totalPageNumber"] = twig_round(($this->getAttribute((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), "getTotalItemCount", array()) / $this->getAttribute((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), "getItemNumberPerPage", array())), 0, "ceil");
        // line 114
        echo "
        ";
        // line 115
        if ((((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) - 1) > 0)) {
            // line 116
            echo "            ";
            if ((((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) - 1) == 1)) {
                // line 117
                echo "                <link rel=\"prev\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand_first_page", array("slug" => $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "slug", array()))), "html", null, true);
                echo "\" />
            ";
            } else {
                // line 119
                echo "                <link rel=\"prev\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand", array("slug" => $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "slug", array()), "page" => ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) - 1))), "html", null, true);
                echo "\" />
            ";
            }
            // line 121
            echo "        ";
        }
        // line 122
        echo "
        ";
        // line 123
        if ((((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) + 1) <= (isset($context["totalPageNumber"]) ? $context["totalPageNumber"] : $this->getContext($context, "totalPageNumber")))) {
            // line 124
            echo "            ";
            if ((!(isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")))) {
                // line 125
                echo "                ";
                $context["_page"] = 1;
                // line 126
                echo "            ";
            }
            // line 127
            echo "            <link rel=\"next\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand", array("slug" => $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "slug", array()), "page" => ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) + 1))), "html", null, true);
            echo "\" />
        ";
        }
        // line 129
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 133
    public function block_js_head($context, array $blocks = array())
    {
        // line 134
        echo "    ";
        ob_start();
        // line 135
        echo "
        ";
        // line 136
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
        <script>
            var google_tag_params = {
                ecomm_pagetype: 'category',
            };
            ";
        // line 142
        echo "        </script>
";
        // line 145
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 149
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 150
        echo "    ";
        ob_start();
        // line 151
        echo "
        <div id=\"page_path\">
            <ul class=\"page_path_links\">
                <li class=\"page_path_link\"><a href=\"";
        // line 154
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">OliKids</a></li>

                ";
        // line 156
        if ((!(isset($context["currentSeries"]) ? $context["currentSeries"] : $this->getContext($context, "currentSeries")))) {
            // line 157
            echo "
                    <li class=\"page_path_link\"><strong>";
            // line 158
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo "</strong></li>

                ";
        } else {
            // line 161
            echo "
                    <li class=\"page_path_link\"><a href=\"";
            // line 162
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand_first_page", array("slug" => $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "slug", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo "</a></li>
                    <li class=\"page_path_link\"><strong>";
            // line 163
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentSeries"]) ? $context["currentSeries"] : $this->getContext($context, "currentSeries")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo "</strong></li>

                ";
        }
        // line 166
        echo "
            </ul>
        </div>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 173
    public function block_promo($context, array $blocks = array())
    {
        // line 174
        echo "    ";
        ob_start();
        // line 175
        echo "
        ";
        // line 176
        if (((($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "logo", array()), "preview", "712x240_") || $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("description" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) || $this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "substrate", array()), "preview", "148x70_")) || $this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "seriesList", array()), "count", array()))) {
            // line 177
            echo "
            <section ";
            // line 178
            echo $this->env->getExtension('fastedit_extension')->fastEditFunction((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")));
            echo " class=\"brand_info\">
                <div class=\"brand_info_container\">
                    <div class=\"brand_info_content\">
                        <div class=\"brand_info_content_pad\">

                            ";
            // line 183
            if ($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "logo", array()), "preview", "148x70_")) {
                // line 184
                echo "                                ";
                $context["imgAlt"] = $this->getAttribute(twig_first($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "logo", array())), ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
                // line 185
                echo "                                <img alt=\"";
                echo twig_escape_filter($this->env, (isset($context["imgAlt"]) ? $context["imgAlt"] : $this->getContext($context, "imgAlt")), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, (isset($context["imgAlt"]) ? $context["imgAlt"] : $this->getContext($context, "imgAlt")), "html", null, true);
                echo "\" class=\"brand_info_logo\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "logo", array()), "preview", "148x70_")), "html", null, true);
                echo "\" width=\"148\" height=\"70\">

                            ";
            }
            // line 188
            echo "
                            ";
            // line 189
            if ($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("description" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
                // line 190
                echo "
                                <div class=\"brand_info_text\">
                                    ";
                // line 192
                echo $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("description" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
                echo "

                                    ";
                // line 194
                if ($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("descriptionContinue" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
                    // line 195
                    echo "
                                        <div class=\"description-hidden-part hidden\">

                                            ";
                    // line 198
                    echo $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), ("descriptionContinue" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
                    echo "

                                        </div> 
                                        <div class=\"clearfix\"></div>
                                        <span class=\"text_tgl trigger-description-hidden-part\" data-trigger-text=\"Скрыть часть описания\">Узнать больше</span><br><br>

                                    ";
                }
                // line 205
                echo "
                                </div>

                            ";
            }
            // line 209
            echo "
                            ";
            // line 210
            if (twig_length_filter($this->env, (isset($context["series"]) ? $context["series"] : $this->getContext($context, "series")))) {
                // line 211
                echo "
                                <ul class=\"brand_info_cats\">
                                    <li class=\"brand_info_cat\">

                                        ";
                // line 215
                if ((twig_length_filter($this->env, (isset($context["series"]) ? $context["series"] : $this->getContext($context, "series"))) > 1)) {
                    // line 216
                    echo "                                            Серии продуктов:
                                        ";
                } else {
                    // line 218
                    echo "                                            Серия продуктов:
                                        ";
                }
                // line 220
                echo "
                                    </li>

                                    ";
                // line 223
                $context["slugSeries"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "slugSeries"), "method");
                // line 224
                echo "
                                    ";
                // line 225
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["series"]) ? $context["series"] : $this->getContext($context, "series")));
                foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
                    // line 226
                    echo "
                                        <li class=\"brand_info_cat\">

                                            ";
                    // line 229
                    if (((!(isset($context["slugSeries"]) ? $context["slugSeries"] : $this->getContext($context, "slugSeries"))) || ((isset($context["slugSeries"]) ? $context["slugSeries"] : $this->getContext($context, "slugSeries")) != $this->getAttribute($context["s"], "slug", array())))) {
                        // line 230
                        echo "                                                <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand_series_first_page", array("slug" => $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "slug", array()), "slugSeries" => $this->getAttribute($context["s"], "slug", array()))), "html", null, true);
                        echo "\">";
                        echo $this->getAttribute($context["s"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
                        echo "</a>
                                            ";
                    } else {
                        // line 232
                        echo "                                                <strong>";
                        echo $this->getAttribute($context["s"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
                        echo "</strong>
                                            ";
                    }
                    // line 234
                    echo "
                                        </li>

                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 238
                echo "
                                </ul>

                            ";
            }
            // line 242
            echo "
                            <br>
                        </div>
                    </div>

                    ";
            // line 247
            if ($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "substrate", array()), "preview", "712x240_")) {
                // line 248
                echo "
                        <img class=\"brand_info_pic\" src=\"";
                // line 249
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "substrate", array()), "preview", "712x240_", true)), "html", null, true);
                echo "\" width=\"712\" height=\"240\">

                    ";
            }
            // line 252
            echo "
                </div>
            </section>

        ";
        }
        // line 257
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 261
    public function block_main_col($context, array $blocks = array())
    {
        // line 262
        echo "    ";
        ob_start();
        // line 263
        echo "
        ";
        // line 265
        echo "        ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "slugSeries"), "method")) {
            // line 266
            echo "            ";
            $context["routeFirsPage"] = "core_shop_product_brand_series_first_page";
            // line 267
            echo "        ";
        } else {
            // line 268
            echo "            ";
            $context["routeFirsPage"] = "core_shop_product_brand_first_page";
            // line 269
            echo "        ";
        }
        // line 270
        echo "
        ";
        // line 272
        echo "        ";
        $this->displayBlock("products_container", $context, $blocks);
        echo "

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 278
    public function block_right_col($context, array $blocks = array())
    {
        // line 279
        echo "
    <!-- filter with owl -->
    ";
        // line 281
        $this->env->loadTemplate("CorePropertyBundle:Filter:layout.html.twig")->display(array_merge($context, (isset($context["filterBuilder"]) ? $context["filterBuilder"] : $this->getContext($context, "filterBuilder"))));
        // line 282
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
        return array (  590 => 282,  588 => 281,  584 => 279,  581 => 278,  572 => 272,  569 => 270,  566 => 269,  563 => 268,  560 => 267,  557 => 266,  554 => 265,  551 => 263,  548 => 262,  545 => 261,  539 => 257,  532 => 252,  526 => 249,  523 => 248,  521 => 247,  514 => 242,  508 => 238,  499 => 234,  493 => 232,  485 => 230,  483 => 229,  478 => 226,  474 => 225,  471 => 224,  469 => 223,  464 => 220,  460 => 218,  456 => 216,  454 => 215,  448 => 211,  446 => 210,  443 => 209,  437 => 205,  427 => 198,  422 => 195,  420 => 194,  415 => 192,  411 => 190,  409 => 189,  406 => 188,  395 => 185,  392 => 184,  390 => 183,  382 => 178,  379 => 177,  377 => 176,  374 => 175,  371 => 174,  368 => 173,  359 => 166,  353 => 163,  347 => 162,  344 => 161,  338 => 158,  335 => 157,  333 => 156,  328 => 154,  323 => 151,  320 => 150,  317 => 149,  311 => 145,  308 => 142,  300 => 136,  297 => 135,  294 => 134,  291 => 133,  285 => 129,  279 => 127,  276 => 126,  273 => 125,  270 => 124,  268 => 123,  265 => 122,  262 => 121,  256 => 119,  250 => 117,  247 => 116,  245 => 115,  242 => 114,  240 => 113,  236 => 111,  230 => 108,  227 => 107,  223 => 105,  221 => 104,  218 => 103,  214 => 101,  212 => 100,  209 => 99,  207 => 98,  204 => 97,  201 => 96,  198 => 95,  195 => 94,  192 => 93,  190 => 92,  187 => 91,  185 => 90,  182 => 89,  179 => 88,  176 => 87,  161 => 81,  153 => 75,  149 => 73,  147 => 72,  145 => 71,  142 => 69,  134 => 63,  130 => 58,  127 => 56,  125 => 55,  123 => 53,  120 => 51,  108 => 45,  100 => 40,  96 => 38,  94 => 37,  92 => 35,  89 => 33,  78 => 28,  76 => 27,  72 => 26,  70 => 25,  68 => 24,  62 => 21,  60 => 20,  49 => 17,  47 => 16,  45 => 13,  14 => 11,);
    }
}
