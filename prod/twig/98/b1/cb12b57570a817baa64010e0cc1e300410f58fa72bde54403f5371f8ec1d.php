<?php

/* CoreProductBundle:Catalog:brand.html.twig */
class __TwigTemplate_98b1cb12b57570a817baa64010e0cc1e300410f58fa72bde54403f5371f8ec1d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 9
        try {
            $this->parent = $this->env->loadTemplate("CoreProductBundle:Catalog:layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(9);

            throw $e;
        }

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
        // line 9
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
        // line 9
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 33
    public function block_title($context, array $blocks = array())
    {
        // line 34
        ob_start();
        // line 35
        if ( !(isset($context["currentSeries"]) ? $context["currentSeries"] : null)) {
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
            echo " | PromoMaster.net";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 47
    public function block_meta_keywords($context, array $blocks = array())
    {
        // line 48
        ob_start();
        // line 49
        if ( !(isset($context["currentSeries"]) ? $context["currentSeries"] : null)) {
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
        if ( !(isset($context["currentSeries"]) ? $context["currentSeries"] : null)) {
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
            if ( !(isset($context["_page"]) ? $context["_page"] : null)) {
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
        if ( !(isset($context["currentSeries"]) ? $context["currentSeries"] : null)) {
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
                } elseif ($this->getAttribute($this->getAttribute(                // line 196
(isset($context["brand"]) ? $context["brand"] : null), "manufacturer", array()), "headquartersAddressGoogleMapsLink", array())) {
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
                    if (( !(isset($context["slugSeries"]) ? $context["slugSeries"] : null) || ((isset($context["slugSeries"]) ? $context["slugSeries"] : null) != $this->getAttribute($context["s"], "slug", array())))) {
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
        return array (  708 => 307,  706 => 306,  702 => 304,  699 => 303,  690 => 297,  687 => 295,  684 => 294,  681 => 293,  678 => 292,  675 => 291,  672 => 290,  669 => 288,  666 => 287,  663 => 286,  657 => 282,  648 => 275,  642 => 272,  639 => 271,  637 => 270,  630 => 265,  624 => 261,  615 => 257,  609 => 255,  601 => 253,  599 => 252,  594 => 249,  590 => 248,  587 => 247,  585 => 246,  580 => 243,  576 => 241,  572 => 239,  570 => 238,  564 => 234,  562 => 233,  559 => 232,  553 => 228,  543 => 221,  538 => 218,  536 => 217,  531 => 215,  527 => 213,  525 => 212,  522 => 211,  511 => 208,  508 => 207,  506 => 206,  500 => 202,  498 => 201,  493 => 198,  487 => 197,  485 => 196,  480 => 195,  478 => 194,  475 => 193,  473 => 192,  470 => 191,  464 => 189,  461 => 188,  455 => 186,  452 => 185,  446 => 183,  443 => 182,  437 => 180,  434 => 179,  428 => 177,  425 => 176,  419 => 174,  416 => 173,  410 => 171,  408 => 170,  401 => 166,  398 => 165,  396 => 164,  393 => 163,  390 => 162,  387 => 161,  378 => 154,  372 => 151,  366 => 150,  363 => 149,  357 => 146,  354 => 145,  352 => 144,  347 => 142,  342 => 139,  339 => 138,  336 => 137,  330 => 133,  327 => 130,  319 => 124,  316 => 123,  313 => 122,  310 => 121,  304 => 117,  298 => 115,  295 => 114,  292 => 113,  289 => 112,  287 => 111,  284 => 110,  281 => 109,  275 => 107,  269 => 105,  266 => 104,  264 => 103,  261 => 102,  259 => 101,  255 => 99,  249 => 96,  246 => 95,  242 => 93,  240 => 92,  237 => 91,  233 => 89,  231 => 88,  228 => 87,  226 => 86,  223 => 85,  220 => 84,  217 => 83,  214 => 82,  211 => 81,  209 => 80,  206 => 79,  204 => 78,  201 => 77,  198 => 76,  195 => 75,  179 => 70,  171 => 67,  167 => 65,  165 => 64,  163 => 63,  161 => 62,  158 => 61,  149 => 56,  145 => 53,  142 => 51,  140 => 50,  138 => 49,  136 => 48,  133 => 47,  120 => 42,  112 => 39,  108 => 37,  106 => 36,  104 => 35,  102 => 34,  99 => 33,  95 => 9,  87 => 28,  85 => 27,  81 => 26,  79 => 25,  77 => 24,  71 => 21,  69 => 20,  58 => 17,  56 => 16,  54 => 13,  48 => 9,  22 => 11,  11 => 9,);
    }
}
