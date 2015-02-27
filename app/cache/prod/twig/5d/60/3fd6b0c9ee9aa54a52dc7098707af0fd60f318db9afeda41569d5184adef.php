<?php

/* CoreProductBundle:Catalog:category.html.twig */
class __TwigTemplate_5d603fd6b0c9ee9aa54a52dc7098707af0fd60f318db9afeda41569d5184adef extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreProductBundle:Catalog:layout.html.twig");

        $_trait_0 = $this->env->loadTemplate("CoreProductBundle:Catalog:products_container.html.twig");
        // line 13
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
        // line 15
        $context["_page"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "page"), "method");
        // line 19
        ob_start();
        // line 20
        if (((isset($context["_page"]) ? $context["_page"] : null) && ((isset($context["_page"]) ? $context["_page"] : null) > 1))) {
            echo " страница ";
            echo twig_escape_filter($this->env, (isset($context["_page"]) ? $context["_page"] : null), "html", null, true);
        }
        $context["seoPage"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 22
        if (($this->getAttribute((isset($context["category"]) ? $context["category"] : null), "lvl", array()) > 1)) {
            // line 23
            $context["seoTitle"] = ($this->getAttribute((isset($context["category"]) ? $context["category"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))) . (isset($context["seoPage"]) ? $context["seoPage"] : null));
            // line 24
            $context["seoKeywords"] = (($this->getAttribute((isset($context["category"]) ? $context["category"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))) . " ") . ", в наличие, под заказ, заказать");
            // line 25
            $context["seoDescription"] = (((((("Купить" . " ") . $this->getAttribute((isset($context["category"]) ? $context["category"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) . " ") . "с быстрой доставкой по всей России в интернет магазине") . (isset($context["seoPage"]) ? $context["seoPage"] : null)) . ".");
        } else {
            // line 27
            $context["topCatCaption"] = $this->getAttribute((isset($context["category"]) ? $context["category"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
            // line 28
            $context["childsTitle"] = "";
            // line 29
            $context["titleLimit"] = false;
            // line 30
            $context["descriptionLimit"] = false;
            // line 31
            $context["childsDescription"] = "";
            // line 32
            $context["seoKeywords"] = (isset($context["topCatCaption"]) ? $context["topCatCaption"] : null);
            // line 33
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["activeChilds"]) ? $context["activeChilds"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 34
                $context["childCaption"] = $this->getAttribute($context["child"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
                // line 35
                $context["seoKeywords"] = (((isset($context["seoKeywords"]) ? $context["seoKeywords"] : null) . ", ") . (isset($context["childCaption"]) ? $context["childCaption"] : null));
                // line 36
                if ((twig_length_filter($this->env, (((isset($context["childsTitle"]) ? $context["childsTitle"] : null) . ", ") . (isset($context["childCaption"]) ? $context["childCaption"] : null))) < 60)) {
                    // line 37
                    if (twig_length_filter($this->env, (isset($context["childsTitle"]) ? $context["childsTitle"] : null))) {
                        // line 38
                        $context["childsTitle"] = (((isset($context["childsTitle"]) ? $context["childsTitle"] : null) . ", ") . (isset($context["childCaption"]) ? $context["childCaption"] : null));
                    } else {
                        // line 40
                        $context["childsTitle"] = (((isset($context["childsTitle"]) ? $context["childsTitle"] : null) . " — ") . (isset($context["childCaption"]) ? $context["childCaption"] : null));
                    }
                } else {
                    // line 43
                    $context["titleLimit"] = true;
                }
                // line 45
                if ((twig_length_filter($this->env, (((isset($context["childsDescription"]) ? $context["childsDescription"] : null) . ", ") . (isset($context["childCaption"]) ? $context["childCaption"] : null))) < 100)) {
                    // line 46
                    if (twig_length_filter($this->env, (isset($context["childsDescription"]) ? $context["childsDescription"] : null))) {
                        // line 47
                        $context["childsDescription"] = (((isset($context["childsDescription"]) ? $context["childsDescription"] : null) . ", ") . (isset($context["childCaption"]) ? $context["childCaption"] : null));
                    } else {
                        // line 49
                        $context["childsDescription"] = (((isset($context["childsDescription"]) ? $context["childsDescription"] : null) . " — ") . (isset($context["childCaption"]) ? $context["childCaption"] : null));
                    }
                } else {
                    // line 52
                    $context["descriptionLimit"] = true;
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 55
            if (twig_length_filter($this->env, (isset($context["childsTitle"]) ? $context["childsTitle"] : null))) {
                // line 56
                if ((isset($context["titleLimit"]) ? $context["titleLimit"] : null)) {
                    // line 57
                    $context["seoTitle"] = ((((isset($context["topCatCaption"]) ? $context["topCatCaption"] : null) . (isset($context["childsTitle"]) ? $context["childsTitle"] : null)) . "... ") . (isset($context["seoPage"]) ? $context["seoPage"] : null));
                } else {
                    // line 59
                    $context["seoTitle"] = (((isset($context["topCatCaption"]) ? $context["topCatCaption"] : null) . (isset($context["childsTitle"]) ? $context["childsTitle"] : null)) . (isset($context["seoPage"]) ? $context["seoPage"] : null));
                }
            } else {
                // line 62
                $context["seoTitle"] = ((isset($context["topCatCaption"]) ? $context["topCatCaption"] : null) . (isset($context["seoPage"]) ? $context["seoPage"] : null));
            }
            // line 64
            if (twig_length_filter($this->env, (isset($context["childsDescription"]) ? $context["childsDescription"] : null))) {
                // line 65
                $context["seoDescription"] = ("Купить " . (isset($context["topCatCaption"]) ? $context["topCatCaption"] : null));
                // line 66
                if ((isset($context["descriptionLimit"]) ? $context["descriptionLimit"] : null)) {
                    // line 67
                    $context["seoDescription"] = ((((((isset($context["seoDescription"]) ? $context["seoDescription"] : null) . (isset($context["childsTitle"]) ? $context["childsTitle"] : null)) . "...") . " С быстрой доставкой по всей России в интернет магазине") . (isset($context["seoPage"]) ? $context["seoPage"] : null)) . ".");
                } else {
                    // line 69
                    $context["seoDescription"] = (((((isset($context["seoDescription"]) ? $context["seoDescription"] : null) . (isset($context["childsTitle"]) ? $context["childsTitle"] : null)) . ". С быстрой доставкой по всей России в интернет магазине") . (isset($context["seoPage"]) ? $context["seoPage"] : null)) . ".");
                }
            } else {
                // line 72
                $context["seoDescription"] = (((("Купить " . (isset($context["topCatCaption"]) ? $context["topCatCaption"] : null)) . ". С быстрой доставкой по всей России в интернет магазине") . (isset($context["seoPage"]) ? $context["seoPage"] : null)) . ".");
            }
        }
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 76
    public function block_title($context, array $blocks = array())
    {
        // line 77
        ob_start();
        // line 78
        if ($this->getAttribute((isset($context["category"]) ? $context["category"] : null), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) {
            // line 79
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html");
            echo twig_escape_filter($this->env, (isset($context["seoPage"]) ? $context["seoPage"] : null), "html", null, true);
        } else {
            // line 82
            echo "            ";
            echo twig_escape_filter($this->env, (isset($context["seoTitle"]) ? $context["seoTitle"] : null), "html", null, true);
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 87
    public function block_meta_keywords($context, array $blocks = array())
    {
        // line 88
        ob_start();
        // line 89
        if ($this->getAttribute((isset($context["category"]) ? $context["category"] : null), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) {
            // line 90
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html");
        } else {
            // line 93
            echo "            ";
            echo twig_escape_filter($this->env, (isset($context["seoKeywords"]) ? $context["seoKeywords"] : null), "html", null, true);
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 98
    public function block_meta_description($context, array $blocks = array())
    {
        // line 99
        ob_start();
        // line 100
        if ($this->getAttribute((isset($context["category"]) ? $context["category"] : null), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) {
            // line 101
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html");
            echo twig_escape_filter($this->env, (isset($context["seoPage"]) ? $context["seoPage"] : null), "html", null, true);
        } else {
            // line 104
            echo "            ";
            echo twig_escape_filter($this->env, (isset($context["seoDescription"]) ? $context["seoDescription"] : null), "html", null, true);
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 109
    public function block_seo($context, array $blocks = array())
    {
        // line 110
        echo "    ";
        ob_start();
        // line 111
        echo "
        ";
        // line 112
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "query", array()), "all", array())) > 0)) {
            // line 113
            echo "
            ";
            // line 114
            if (((isset($context["_page"]) ? $context["_page"] : null) && ((isset($context["_page"]) ? $context["_page"] : null) > 1))) {
                // line 115
                echo "
                ";
                // line 116
                $context["canonical"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array("slug" => $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "slug", array()), "page" => (isset($context["_page"]) ? $context["_page"] : null)));
                // line 117
                echo "
            ";
            } else {
                // line 119
                echo "
                ";
                // line 120
                $context["canonical"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array("slug" => $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "slug", array())));
                // line 121
                echo "
            ";
            }
            // line 123
            echo "
            <link rel=\"canonical\" href=\"";
            // line 124
            echo twig_escape_filter($this->env, (isset($context["canonical"]) ? $context["canonical"] : null), "html", null, true);
            echo "\" />

        ";
        }
        // line 127
        echo "

        ";
        // line 129
        $context["totalPageNumber"] = twig_round(($this->getAttribute((isset($context["products"]) ? $context["products"] : null), "getTotalItemCount", array()) / $this->getAttribute((isset($context["products"]) ? $context["products"] : null), "getItemNumberPerPage", array())), 0, "ceil");
        // line 130
        echo "        
        ";
        // line 131
        if ((((isset($context["_page"]) ? $context["_page"] : null) - 1) > 0)) {
            // line 132
            echo "            ";
            if ((((isset($context["_page"]) ? $context["_page"] : null) - 1) == 1)) {
                // line 133
                echo "                <link rel=\"prev\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_catalog_first_page", array("slug" => $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "slug", array()))), "html", null, true);
                echo "\" />
            ";
            } else {
                // line 135
                echo "                <link rel=\"prev\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_catalog", array("slug" => $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "slug", array()), "page" => ((isset($context["_page"]) ? $context["_page"] : null) - 1))), "html", null, true);
                echo "\" />
            ";
            }
            // line 137
            echo "        ";
        }
        // line 138
        echo "
        ";
        // line 139
        if ((((isset($context["_page"]) ? $context["_page"] : null) + 1) <= (isset($context["totalPageNumber"]) ? $context["totalPageNumber"] : null))) {
            // line 140
            echo "            ";
            if ((!(isset($context["_page"]) ? $context["_page"] : null))) {
                // line 141
                echo "                ";
                $context["_page"] = 1;
                // line 142
                echo "            ";
            }
            // line 143
            echo "            <link rel=\"next\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_catalog", array("slug" => $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "slug", array()), "page" => ((isset($context["_page"]) ? $context["_page"] : null) + 1))), "html", null, true);
            echo "\" />
        ";
        }
        // line 145
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 149
    public function block_js_head($context, array $blocks = array())
    {
        // line 150
        echo "    ";
        ob_start();
        // line 151
        echo "
        ";
        // line 152
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
        <script>
            var google_tag_params = {
                ecomm_pagetype: 'category',
            };
            ";
        // line 158
        echo "        </script>
";
        // line 161
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 165
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 166
        echo "    ";
        ob_start();
        // line 167
        echo "
        ";
        // line 168
        if (array_key_exists("breadcrumbs", $context)) {
            // line 169
            echo "
            <div id=\"page_path\">
                <ul class=\"page_path_links\">

                    ";
            // line 173
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
            foreach ($context['_seq'] as $context["i"] => $context["breadcrumb"]) {
                // line 174
                echo "
                        <li class=\"page_path_link\">

                            ";
                // line 177
                if ((($context["i"] + 1) == twig_length_filter($this->env, (isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null)))) {
                    // line 178
                    echo "
                                <strong>";
                    // line 179
                    echo twig_escape_filter($this->env, $this->getAttribute($context["breadcrumb"], "caption", array()), "html", null, true);
                    echo "</strong>

                            ";
                } else {
                    // line 182
                    echo "
                                <a href=\"";
                    // line 183
                    echo twig_escape_filter($this->env, $this->getAttribute($context["breadcrumb"], "href", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["breadcrumb"], "caption", array()), "html", null, true);
                    echo "</a>

                            ";
                }
                // line 186
                echo "
                        </li>

                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['i'], $context['breadcrumb'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 190
            echo "
                </ul>
            </div>

        ";
        }
        // line 195
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 199
    public function block_promo($context, array $blocks = array())
    {
    }

    // line 201
    public function block_main_col($context, array $blocks = array())
    {
        // line 202
        echo "    ";
        ob_start();
        // line 203
        echo "        ";
        // line 204
        echo "        ";
        $context["routeFirsPage"] = "core_shop_product_catalog_first_page";
        // line 205
        echo "
        ";
        // line 207
        echo "        ";
        $this->displayBlock("products_container", $context, $blocks);
        echo "
        ";
        // line 209
        echo "        ";
        if (((array_key_exists("category", $context) && (isset($context["category"]) ? $context["category"] : null)) && $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "descriptionRu", array()))) {
            // line 210
            echo "            <article class=\"def_style\">
                ";
            // line 211
            echo $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "descriptionRu", array());
            echo "
            <article>
        ";
        }
        // line 214
        echo "        ";
        // line 215
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 218
    public function block_right_col($context, array $blocks = array())
    {
        // line 219
        echo "
    <!-- filter with owl -->
    ";
        // line 221
        $this->env->loadTemplate("CorePropertyBundle:Filter:layout.html.twig")->display(array_merge($context, (isset($context["filterBuilder"]) ? $context["filterBuilder"] : null)));
        // line 222
        echo "    <!-- /filter with owl -->

";
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Catalog:category.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  449 => 222,  447 => 221,  443 => 219,  440 => 218,  435 => 215,  433 => 214,  427 => 211,  424 => 210,  421 => 209,  416 => 207,  413 => 205,  410 => 204,  408 => 203,  405 => 202,  402 => 201,  397 => 199,  391 => 195,  384 => 190,  375 => 186,  367 => 183,  364 => 182,  358 => 179,  355 => 178,  353 => 177,  348 => 174,  344 => 173,  338 => 169,  336 => 168,  333 => 167,  330 => 166,  327 => 165,  321 => 161,  318 => 158,  310 => 152,  307 => 151,  304 => 150,  301 => 149,  295 => 145,  289 => 143,  286 => 142,  283 => 141,  280 => 140,  278 => 139,  275 => 138,  272 => 137,  266 => 135,  260 => 133,  257 => 132,  255 => 131,  252 => 130,  250 => 129,  246 => 127,  240 => 124,  237 => 123,  233 => 121,  231 => 120,  228 => 119,  224 => 117,  222 => 116,  219 => 115,  217 => 114,  214 => 113,  212 => 112,  209 => 111,  206 => 110,  203 => 109,  196 => 104,  192 => 101,  190 => 100,  188 => 99,  185 => 98,  178 => 93,  175 => 90,  173 => 89,  171 => 88,  168 => 87,  161 => 82,  157 => 79,  155 => 78,  153 => 77,  150 => 76,  143 => 72,  139 => 69,  136 => 67,  134 => 66,  132 => 65,  130 => 64,  127 => 62,  123 => 59,  120 => 57,  118 => 56,  116 => 55,  109 => 52,  105 => 49,  102 => 47,  100 => 46,  98 => 45,  95 => 43,  91 => 40,  88 => 38,  86 => 37,  84 => 36,  82 => 35,  80 => 34,  76 => 33,  74 => 32,  72 => 31,  70 => 30,  68 => 29,  66 => 28,  64 => 27,  61 => 25,  59 => 24,  57 => 23,  55 => 22,  49 => 20,  47 => 19,  45 => 15,  14 => 13,);
    }
}
