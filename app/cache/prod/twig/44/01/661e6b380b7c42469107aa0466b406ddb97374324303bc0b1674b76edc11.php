<?php

/* CoreProductBundle:Catalog:brand.html.twig */
class __TwigTemplate_4401661e6b380b7c42469107aa0466b406ddb97374324303bc0b1674b76edc11 extends Twig_Template
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
        $context["_page"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "page"), "method");
        // line 16
        ob_start();
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["filterBuilder"]) ? $context["filterBuilder"] : null), "categories", array(), "array"), "values", array(), "array"));
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
        if (((isset($context["_page"]) ? $context["_page"] : null) && ((isset($context["_page"]) ? $context["_page"] : null) > 1))) {
            echo ", страница ";
            echo twig_escape_filter($this->env, (isset($context["_page"]) ? $context["_page"] : null), "html", null, true);
        }
        $context["seoPage"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 24
        $context["currentSeries"] = null;
        // line 25
        if ((twig_length_filter($this->env, (isset($context["series"]) ? $context["series"] : null)) && $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "slugSeries"), "method"))) {
            // line 26
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["series"]) ? $context["series"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
                // line 27
                if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "slugSeries"), "method") == $this->getAttribute($context["s"], "slug", array()))) {
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
        if ((!(isset($context["currentSeries"]) ? $context["currentSeries"] : null))) {
            // line 36
            if ($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) {
                // line 37
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html");
                echo twig_escape_filter($this->env, (isset($context["seoPage"]) ? $context["seoPage"] : null), "html", null, true);
            } else {
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                if (((isset($context["_page"]) ? $context["_page"] : null) && ((isset($context["_page"]) ? $context["_page"] : null) > 1))) {
                    echo " страница ";
                    echo twig_escape_filter($this->env, (isset($context["_page"]) ? $context["_page"] : null), "html", null, true);
                }
            }
        } else {
            // line 42
            echo "Товары от ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo " из серии ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentSeries"]) ? $context["currentSeries"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo " - тематические наборы, игрушки для малышей, машинки, грузовики";
            echo twig_escape_filter($this->env, (isset($context["seoCats"]) ? $context["seoCats"] : null), "html", null, true);
            echo twig_escape_filter($this->env, (isset($context["seoPage"]) ? $context["seoPage"] : null), "html", null, true);
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
        if ((!(isset($context["currentSeries"]) ? $context["currentSeries"] : null))) {
            // line 50
            if ($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) {
                // line 51
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html");
            } else {
                // line 53
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            }
        } else {
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentSeries"]) ? $context["currentSeries"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo twig_escape_filter($this->env, (isset($context["seoCats"]) ? $context["seoCats"] : null), "html", null, true);
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 61
    public function block_meta_description($context, array $blocks = array())
    {
        // line 62
        ob_start();
        // line 63
        if ((!(isset($context["currentSeries"]) ? $context["currentSeries"] : null))) {
            // line 64
            if ($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) {
                // line 65
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html");
                echo twig_escape_filter($this->env, (isset($context["seoPage"]) ? $context["seoPage"] : null), "html", null, true);
            } else {
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                if (((isset($context["_page"]) ? $context["_page"] : null) && ((isset($context["_page"]) ? $context["_page"] : null) > 1))) {
                    echo " страница ";
                    echo twig_escape_filter($this->env, (isset($context["_page"]) ? $context["_page"] : null), "html", null, true);
                }
            }
        } else {
            // line 70
            echo "В интернет-магазине OliKids представлено большое разнообразие товаров из серии ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentSeries"]) ? $context["currentSeries"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo " от производителя ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo " - различные тематические наборы, игрушки для малышей, машинки, грузовики";
            echo twig_escape_filter($this->env, (isset($context["seoCats"]) ? $context["seoCats"] : null), "html", null, true);
            echo ". Фильтр поможет быстро подобрать товар от производителя ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo ", подходящий под Ваши требования";
            echo twig_escape_filter($this->env, (isset($context["seoPage"]) ? $context["seoPage"] : null), "html", null, true);
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
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "query", array()), "all", array())) > 0)) {
            // line 79
            echo "
            ";
            // line 80
            if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "slugSeries"), "method")) {
                // line 81
                echo "                ";
                $context["params"] = array("slugSeries" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "slugSeries"), "method"));
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
            if (((isset($context["_page"]) ? $context["_page"] : null) && ((isset($context["_page"]) ? $context["_page"] : null) > 1))) {
                // line 87
                echo "
                ";
                // line 88
                $context["canonical"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), twig_array_merge(array("slug" => $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "slug", array()), "page" => (isset($context["_page"]) ? $context["_page"] : null)), (isset($context["params"]) ? $context["params"] : null)));
                // line 89
                echo "
            ";
            } else {
                // line 91
                echo "
                ";
                // line 92
                $context["canonical"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), twig_array_merge(array("slug" => $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "slug", array())), (isset($context["params"]) ? $context["params"] : null)));
                // line 93
                echo "
            ";
            }
            // line 95
            echo "
            <link rel=\"canonical\" href=\"";
            // line 96
            echo twig_escape_filter($this->env, (isset($context["canonical"]) ? $context["canonical"] : null), "html", null, true);
            echo "\" />

        ";
        }
        // line 99
        echo "

        ";
        // line 101
        $context["totalPageNumber"] = twig_round(($this->getAttribute((isset($context["products"]) ? $context["products"] : null), "getTotalItemCount", array()) / $this->getAttribute((isset($context["products"]) ? $context["products"] : null), "getItemNumberPerPage", array())), 0, "ceil");
        // line 102
        echo "
        ";
        // line 103
        if ((((isset($context["_page"]) ? $context["_page"] : null) - 1) > 0)) {
            // line 104
            echo "            ";
            if ((((isset($context["_page"]) ? $context["_page"] : null) - 1) == 1)) {
                // line 105
                echo "                <link rel=\"prev\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand_first_page", array("slug" => $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "slug", array()))), "html", null, true);
                echo "\" />
            ";
            } else {
                // line 107
                echo "                <link rel=\"prev\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand", array("slug" => $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "slug", array()), "page" => ((isset($context["_page"]) ? $context["_page"] : null) - 1))), "html", null, true);
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
        if ((((isset($context["_page"]) ? $context["_page"] : null) + 1) <= (isset($context["totalPageNumber"]) ? $context["totalPageNumber"] : null))) {
            // line 112
            echo "            ";
            if ((!(isset($context["_page"]) ? $context["_page"] : null))) {
                // line 113
                echo "                ";
                $context["_page"] = 1;
                // line 114
                echo "            ";
            }
            // line 115
            echo "            <link rel=\"next\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand", array("slug" => $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "slug", array()), "page" => ((isset($context["_page"]) ? $context["_page"] : null) + 1))), "html", null, true);
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
        if ((!(isset($context["currentSeries"]) ? $context["currentSeries"] : null))) {
            // line 145
            echo "
                    <li class=\"page_path_link\"><strong>";
            // line 146
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo "</strong></li>

                ";
        } else {
            // line 149
            echo "
                    <li class=\"page_path_link\"><a href=\"";
            // line 150
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand_first_page", array("slug" => $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "slug", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo "</a></li>
                    <li class=\"page_path_link\"><strong>";
            // line 151
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentSeries"]) ? $context["currentSeries"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
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
        if (((($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "logo", array()), "preview", "712x240_") || $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), ("description" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) || $this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "substrate", array()), "preview", "148x70_")) || $this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "seriesList", array()), "count", array()))) {
            // line 165
            echo "
            <section ";
            // line 166
            echo $this->env->getExtension('fastedit_extension')->fastEditFunction((isset($context["brand"]) ? $context["brand"] : null));
            echo " class=\"brand_info clearfix\">
                <div class=\"brand_info_container\">
                    <div class=\"brand_info_about_company clearfix\">
                        <div class=\"brand_info_about_company_data\">
                                ";
            // line 170
            if ($this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "manufacturer", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) {
                // line 171
                echo "                                    <div><strong>Название:&nbsp;</strong>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "manufacturer", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                echo "</div>
                                ";
            }
            // line 173
            echo "                                ";
            if ($this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "manufacturer", array()), "yearOfFoundation", array())) {
                // line 174
                echo "                                    <div><strong>Год основания:&nbsp;</strong>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "manufacturer", array()), "yearOfFoundation", array()), "html", null, true);
                echo "</div>
                                ";
            }
            // line 176
            echo "                                ";
            if ($this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "manufacturer", array()), "country", array())) {
                // line 177
                echo "                                    <div><strong>Страна:&nbsp;</strong>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "manufacturer", array()), "country", array()), "getCaption", array(0 => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())), "method"), "html", null, true);
                echo "</div>
                                ";
            }
            // line 179
            echo "                                ";
            if ($this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "manufacturer", array()), "headquartersAddress", array())) {
                // line 180
                echo "                                    <div><strong>Адрес:&nbsp;</strong>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "manufacturer", array()), "headquartersAddress", array()), "html", null, true);
                echo "</div>
                                ";
            }
            // line 182
            echo "                                ";
            if ($this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "manufacturer", array()), "email", array())) {
                // line 183
                echo "                                    <div><strong>E-mail:&nbsp;</strong>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "manufacturer", array()), "email", array()), "html", null, true);
                echo "</div>
                                ";
            }
            // line 185
            echo "                                ";
            if ($this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "manufacturer", array()), "urlSite", array())) {
                // line 186
                echo "                                    <div><strong>Вебсайт:&nbsp;</strong>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "manufacturer", array()), "urlSite", array()), "html", null, true);
                echo "</div>
                                ";
            }
            // line 188
            echo "                                ";
            if ($this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "manufacturer", array()), "phoneSalesDepartment", array())) {
                // line 189
                echo "                                    <div><strong>Телефон:&nbsp;</strong>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "manufacturer", array()), "phoneSalesDepartment", array()), "html", null, true);
                echo "</div>
                                ";
            }
            // line 191
            echo "                        </div>
                        ";
            // line 192
            if (($this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "manufacturer", array()), "headquartersAddressYandexMapsLink", array()) || $this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "manufacturer", array()), "headquartersAddressGoogleMapsLink", array()))) {
                // line 193
                echo "                            <div class=\"see_on_map\">
                                ";
                // line 194
                if ($this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "manufacturer", array()), "headquartersAddressYandexMapsLink", array())) {
                    // line 195
                    echo "                                    <a target=\"_blank\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "manufacturer", array()), "headquartersAddressYandexMapsLink", array()), "html", null, true);
                    echo "\">Посмотреть на карте<ins class=\"icon_on_map\">&nbsp;</ins></a>
                                ";
                } elseif ($this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "manufacturer", array()), "headquartersAddressGoogleMapsLink", array())) {
                    // line 197
                    echo "                                    <a target=\"_blank\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "manufacturer", array()), "headquartersAddressGoogleMapsLink", array()), "html", null, true);
                    echo "\">Посмотреть на карте<ins class=\"icon_on_map\">&nbsp;</ins></a>
                                ";
                }
                // line 198
                echo "    
                            </div>
                        ";
            }
            // line 201
            echo "                        ";
            // line 202
            echo "                    </div>
                    <div class=\"brand_info_content\">
                        <div class=\"brand_info_content_pad\">

                            ";
            // line 206
            if ($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "logo", array()), "preview", "148x70_")) {
                // line 207
                echo "                                ";
                $context["imgAlt"] = $this->getAttribute(twig_first($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "logo", array())), ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
                // line 208
                echo "                                <img alt=\"";
                echo twig_escape_filter($this->env, (isset($context["imgAlt"]) ? $context["imgAlt"] : null), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, (isset($context["imgAlt"]) ? $context["imgAlt"] : null), "html", null, true);
                echo "\" class=\"brand_info_logo\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "logo", array()), "preview", "148x70_")), "html", null, true);
                echo "\" width=\"148\" height=\"70\">

                            ";
            }
            // line 211
            echo "
                            ";
            // line 212
            if ($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), ("description" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) {
                // line 213
                echo "
                                <div class=\"brand_info_text\">
                                    ";
                // line 215
                echo $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), ("description" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
                echo "

                                    ";
                // line 217
                if ($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), ("descriptionContinue" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) {
                    // line 218
                    echo "
                                        <div class=\"description-hidden-part hidden\">

                                            ";
                    // line 221
                    echo $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), ("descriptionContinue" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
                    echo "

                                        </div>
                                        <div class=\"clearfix\"></div>
                                        <span class=\"text_tgl trigger-description-hidden-part\" data-trigger-text=\"Скрыть часть описания\">Узнать больше</span><br><br>

                                    ";
                }
                // line 228
                echo "
                                </div>

                            ";
            }
            // line 232
            echo "
                            ";
            // line 233
            if (twig_length_filter($this->env, (isset($context["series"]) ? $context["series"] : null))) {
                // line 234
                echo "
                                <ul class=\"brand_info_cats\">
                                    <li class=\"brand_info_cat\">

                                        ";
                // line 238
                if ((twig_length_filter($this->env, (isset($context["series"]) ? $context["series"] : null)) > 1)) {
                    // line 239
                    echo "                                            Серии продуктов:
                                        ";
                } else {
                    // line 241
                    echo "                                            Серия продуктов:
                                        ";
                }
                // line 243
                echo "
                                    </li>

                                    ";
                // line 246
                $context["slugSeries"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "slugSeries"), "method");
                // line 247
                echo "
                                    ";
                // line 248
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["series"]) ? $context["series"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
                    // line 249
                    echo "
                                        <li class=\"brand_info_cat\">

                                            ";
                    // line 252
                    if (((!(isset($context["slugSeries"]) ? $context["slugSeries"] : null)) || ((isset($context["slugSeries"]) ? $context["slugSeries"] : null) != $this->getAttribute($context["s"], "slug", array())))) {
                        // line 253
                        echo "                                                <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand_series_first_page", array("slug" => $this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "slug", array()), "slugSeries" => $this->getAttribute($context["s"], "slug", array()))), "html", null, true);
                        echo "\">";
                        echo $this->getAttribute($context["s"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
                        echo "</a>
                                            ";
                    } else {
                        // line 255
                        echo "                                                <strong>";
                        echo $this->getAttribute($context["s"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
                        echo "</strong>
                                            ";
                    }
                    // line 257
                    echo "
                                        </li>

                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 261
                echo "
                                </ul>

                            ";
            }
            // line 265
            echo "
                            <br>
                        </div>
                    </div>

                    ";
            // line 270
            if ($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "substrate", array()), "preview", "712x240_")) {
                // line 271
                echo "
                        <img class=\"brand_info_pic\" src=\"";
                // line 272
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["brand"]) ? $context["brand"] : null), "substrate", array()), "preview", "712x240_", true)), "html", null, true);
                echo "\" width=\"712\" height=\"240\">

                    ";
            }
            // line 275
            echo "
                    <div class=\"clearfix\"></div>

                </div>
            </section>

        ";
        }
        // line 282
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 286
    public function block_main_col($context, array $blocks = array())
    {
        // line 287
        echo "    ";
        ob_start();
        // line 288
        echo "
        ";
        // line 290
        echo "        ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "slugSeries"), "method")) {
            // line 291
            echo "            ";
            $context["routeFirsPage"] = "core_shop_product_brand_series_first_page";
            // line 292
            echo "        ";
        } else {
            // line 293
            echo "            ";
            $context["routeFirsPage"] = "core_shop_product_brand_first_page";
            // line 294
            echo "        ";
        }
        // line 295
        echo "
        ";
        // line 297
        echo "        ";
        $this->displayBlock("products_container", $context, $blocks);
        echo "

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 303
    public function block_right_col($context, array $blocks = array())
    {
        // line 304
        echo "
    <!-- filter with owl -->
    ";
        // line 306
        $this->env->loadTemplate("CorePropertyBundle:Filter:layout.html.twig")->display(array_merge($context, (isset($context["filterBuilder"]) ? $context["filterBuilder"] : null)));
        // line 307
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
        return array (  697 => 307,  695 => 306,  691 => 304,  688 => 303,  679 => 297,  676 => 295,  673 => 294,  670 => 293,  667 => 292,  664 => 291,  661 => 290,  658 => 288,  655 => 287,  652 => 286,  646 => 282,  637 => 275,  631 => 272,  628 => 271,  626 => 270,  619 => 265,  613 => 261,  604 => 257,  598 => 255,  590 => 253,  588 => 252,  583 => 249,  579 => 248,  576 => 247,  574 => 246,  569 => 243,  565 => 241,  561 => 239,  559 => 238,  553 => 234,  551 => 233,  548 => 232,  542 => 228,  532 => 221,  527 => 218,  525 => 217,  520 => 215,  516 => 213,  514 => 212,  511 => 211,  500 => 208,  497 => 207,  495 => 206,  489 => 202,  487 => 201,  482 => 198,  476 => 197,  470 => 195,  468 => 194,  465 => 193,  463 => 192,  460 => 191,  454 => 189,  451 => 188,  445 => 186,  442 => 185,  436 => 183,  433 => 182,  427 => 180,  424 => 179,  418 => 177,  415 => 176,  409 => 174,  406 => 173,  400 => 171,  398 => 170,  391 => 166,  388 => 165,  386 => 164,  383 => 163,  380 => 162,  377 => 161,  368 => 154,  362 => 151,  356 => 150,  353 => 149,  347 => 146,  344 => 145,  342 => 144,  337 => 142,  332 => 139,  329 => 138,  326 => 137,  320 => 133,  317 => 130,  309 => 124,  306 => 123,  303 => 122,  300 => 121,  294 => 117,  288 => 115,  285 => 114,  282 => 113,  279 => 112,  277 => 111,  274 => 110,  271 => 109,  265 => 107,  259 => 105,  256 => 104,  254 => 103,  251 => 102,  249 => 101,  245 => 99,  239 => 96,  236 => 95,  232 => 93,  230 => 92,  227 => 91,  223 => 89,  221 => 88,  218 => 87,  216 => 86,  213 => 85,  210 => 84,  207 => 83,  204 => 82,  201 => 81,  199 => 80,  196 => 79,  194 => 78,  191 => 77,  188 => 76,  185 => 75,  169 => 70,  161 => 67,  157 => 65,  155 => 64,  153 => 63,  151 => 62,  148 => 61,  139 => 56,  135 => 53,  132 => 51,  130 => 50,  128 => 49,  126 => 48,  123 => 47,  110 => 42,  102 => 39,  98 => 37,  96 => 36,  94 => 35,  92 => 34,  89 => 33,  78 => 28,  76 => 27,  72 => 26,  70 => 25,  68 => 24,  62 => 21,  60 => 20,  49 => 17,  47 => 16,  45 => 13,  14 => 11,);
    }
}
