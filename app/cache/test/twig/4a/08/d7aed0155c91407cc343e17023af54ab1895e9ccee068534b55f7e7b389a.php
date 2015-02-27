<?php

/* CoreProductBundle:Catalog:category.html.twig */
class __TwigTemplate_4a08d7aed0155c91407cc343e17023af54ab1895e9ccee068534b55f7e7b389a extends Twig_Template
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
        $context["_page"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "page"), "method");
        // line 19
        ob_start();
        // line 20
        if (((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) && ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) > 1))) {
            echo " страница ";
            echo twig_escape_filter($this->env, (isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")), "html", null, true);
        }
        $context["seoPage"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 22
        if (($this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), "lvl", array()) > 1)) {
            // line 23
            $context["seoTitle"] = ($this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))) . (isset($context["seoPage"]) ? $context["seoPage"] : $this->getContext($context, "seoPage")));
            // line 24
            $context["seoKeywords"] = (($this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))) . " ") . ", в наличие, под заказ, заказать");
            // line 25
            $context["seoDescription"] = (((((("Купить" . " ") . $this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) . " ") . "с быстрой доставкой по всей России в интернет магазине") . (isset($context["seoPage"]) ? $context["seoPage"] : $this->getContext($context, "seoPage"))) . ".");
        } else {
            // line 27
            $context["topCatCaption"] = $this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
            // line 28
            $context["childsTitle"] = "";
            // line 29
            $context["titleLimit"] = false;
            // line 30
            $context["descriptionLimit"] = false;
            // line 31
            $context["childsDescription"] = "";
            // line 32
            $context["seoKeywords"] = (isset($context["topCatCaption"]) ? $context["topCatCaption"] : $this->getContext($context, "topCatCaption"));
            // line 33
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["activeChilds"]) ? $context["activeChilds"] : $this->getContext($context, "activeChilds")));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 34
                $context["childCaption"] = $this->getAttribute($context["child"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
                // line 35
                $context["seoKeywords"] = (((isset($context["seoKeywords"]) ? $context["seoKeywords"] : $this->getContext($context, "seoKeywords")) . ", ") . (isset($context["childCaption"]) ? $context["childCaption"] : $this->getContext($context, "childCaption")));
                // line 36
                if ((twig_length_filter($this->env, (((isset($context["childsTitle"]) ? $context["childsTitle"] : $this->getContext($context, "childsTitle")) . ", ") . (isset($context["childCaption"]) ? $context["childCaption"] : $this->getContext($context, "childCaption")))) < 60)) {
                    // line 37
                    if (twig_length_filter($this->env, (isset($context["childsTitle"]) ? $context["childsTitle"] : $this->getContext($context, "childsTitle")))) {
                        // line 38
                        $context["childsTitle"] = (((isset($context["childsTitle"]) ? $context["childsTitle"] : $this->getContext($context, "childsTitle")) . ", ") . (isset($context["childCaption"]) ? $context["childCaption"] : $this->getContext($context, "childCaption")));
                    } else {
                        // line 40
                        $context["childsTitle"] = (((isset($context["childsTitle"]) ? $context["childsTitle"] : $this->getContext($context, "childsTitle")) . " — ") . (isset($context["childCaption"]) ? $context["childCaption"] : $this->getContext($context, "childCaption")));
                    }
                } else {
                    // line 43
                    $context["titleLimit"] = true;
                }
                // line 45
                if ((twig_length_filter($this->env, (((isset($context["childsDescription"]) ? $context["childsDescription"] : $this->getContext($context, "childsDescription")) . ", ") . (isset($context["childCaption"]) ? $context["childCaption"] : $this->getContext($context, "childCaption")))) < 100)) {
                    // line 46
                    if (twig_length_filter($this->env, (isset($context["childsDescription"]) ? $context["childsDescription"] : $this->getContext($context, "childsDescription")))) {
                        // line 47
                        $context["childsDescription"] = (((isset($context["childsDescription"]) ? $context["childsDescription"] : $this->getContext($context, "childsDescription")) . ", ") . (isset($context["childCaption"]) ? $context["childCaption"] : $this->getContext($context, "childCaption")));
                    } else {
                        // line 49
                        $context["childsDescription"] = (((isset($context["childsDescription"]) ? $context["childsDescription"] : $this->getContext($context, "childsDescription")) . " — ") . (isset($context["childCaption"]) ? $context["childCaption"] : $this->getContext($context, "childCaption")));
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
            if (twig_length_filter($this->env, (isset($context["childsTitle"]) ? $context["childsTitle"] : $this->getContext($context, "childsTitle")))) {
                // line 56
                if ((isset($context["titleLimit"]) ? $context["titleLimit"] : $this->getContext($context, "titleLimit"))) {
                    // line 57
                    $context["seoTitle"] = ((((isset($context["topCatCaption"]) ? $context["topCatCaption"] : $this->getContext($context, "topCatCaption")) . (isset($context["childsTitle"]) ? $context["childsTitle"] : $this->getContext($context, "childsTitle"))) . "... ") . (isset($context["seoPage"]) ? $context["seoPage"] : $this->getContext($context, "seoPage")));
                } else {
                    // line 59
                    $context["seoTitle"] = (((isset($context["topCatCaption"]) ? $context["topCatCaption"] : $this->getContext($context, "topCatCaption")) . (isset($context["childsTitle"]) ? $context["childsTitle"] : $this->getContext($context, "childsTitle"))) . (isset($context["seoPage"]) ? $context["seoPage"] : $this->getContext($context, "seoPage")));
                }
            } else {
                // line 62
                $context["seoTitle"] = ((isset($context["topCatCaption"]) ? $context["topCatCaption"] : $this->getContext($context, "topCatCaption")) . (isset($context["seoPage"]) ? $context["seoPage"] : $this->getContext($context, "seoPage")));
            }
            // line 64
            if (twig_length_filter($this->env, (isset($context["childsDescription"]) ? $context["childsDescription"] : $this->getContext($context, "childsDescription")))) {
                // line 65
                $context["seoDescription"] = ("Купить " . (isset($context["topCatCaption"]) ? $context["topCatCaption"] : $this->getContext($context, "topCatCaption")));
                // line 66
                if ((isset($context["descriptionLimit"]) ? $context["descriptionLimit"] : $this->getContext($context, "descriptionLimit"))) {
                    // line 67
                    $context["seoDescription"] = ((((((isset($context["seoDescription"]) ? $context["seoDescription"] : $this->getContext($context, "seoDescription")) . (isset($context["childsTitle"]) ? $context["childsTitle"] : $this->getContext($context, "childsTitle"))) . "...") . " С быстрой доставкой по всей России в интернет магазине") . (isset($context["seoPage"]) ? $context["seoPage"] : $this->getContext($context, "seoPage"))) . ".");
                } else {
                    // line 69
                    $context["seoDescription"] = (((((isset($context["seoDescription"]) ? $context["seoDescription"] : $this->getContext($context, "seoDescription")) . (isset($context["childsTitle"]) ? $context["childsTitle"] : $this->getContext($context, "childsTitle"))) . ". С быстрой доставкой по всей России в интернет магазине") . (isset($context["seoPage"]) ? $context["seoPage"] : $this->getContext($context, "seoPage"))) . ".");
                }
            } else {
                // line 72
                $context["seoDescription"] = (((("Купить " . (isset($context["topCatCaption"]) ? $context["topCatCaption"] : $this->getContext($context, "topCatCaption"))) . ". С быстрой доставкой по всей России в интернет магазине") . (isset($context["seoPage"]) ? $context["seoPage"] : $this->getContext($context, "seoPage"))) . ".");
            }
        }
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 76
    public function block_title($context, array $blocks = array())
    {
        // line 77
        if ($this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html");
            echo twig_escape_filter($this->env, (isset($context["seoPage"]) ? $context["seoPage"] : $this->getContext($context, "seoPage")), "html", null, true);
        } else {
            // line 81
            echo "        ";
            echo twig_escape_filter($this->env, (isset($context["seoTitle"]) ? $context["seoTitle"] : $this->getContext($context, "seoTitle")), "html", null, true);
        }
    }

    // line 85
    public function block_meta_keywords($context, array $blocks = array())
    {
        // line 86
        if ($this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
            // line 87
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html");
        } else {
            // line 90
            echo "        ";
            echo twig_escape_filter($this->env, (isset($context["seoKeywords"]) ? $context["seoKeywords"] : $this->getContext($context, "seoKeywords")), "html", null, true);
        }
    }

    // line 94
    public function block_meta_description($context, array $blocks = array())
    {
        // line 95
        if ($this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
            // line 96
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html");
            echo twig_escape_filter($this->env, (isset($context["seoPage"]) ? $context["seoPage"] : $this->getContext($context, "seoPage")), "html", null, true);
        } else {
            // line 99
            echo "        ";
            echo twig_escape_filter($this->env, (isset($context["seoDescription"]) ? $context["seoDescription"] : $this->getContext($context, "seoDescription")), "html", null, true);
        }
    }

    // line 103
    public function block_seo($context, array $blocks = array())
    {
        // line 104
        echo "    ";
        ob_start();
        // line 105
        echo "
        ";
        // line 106
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "query", array()), "all", array())) > 0)) {
            // line 107
            echo "
            ";
            // line 108
            if (((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) && ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) > 1))) {
                // line 109
                echo "
                ";
                // line 110
                $context["canonical"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array("slug" => $this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), "slug", array()), "page" => (isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page"))));
                // line 111
                echo "
            ";
            } else {
                // line 113
                echo "
                ";
                // line 114
                $context["canonical"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array("slug" => $this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), "slug", array())));
                // line 115
                echo "
            ";
            }
            // line 117
            echo "
            <link rel=\"canonical\" href=\"";
            // line 118
            echo twig_escape_filter($this->env, (isset($context["canonical"]) ? $context["canonical"] : $this->getContext($context, "canonical")), "html", null, true);
            echo "\" />

        ";
        }
        // line 121
        echo "

        ";
        // line 123
        $context["totalPageNumber"] = twig_round(($this->getAttribute((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), "getTotalItemCount", array()) / $this->getAttribute((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), "getItemNumberPerPage", array())), 0, "ceil");
        // line 124
        echo "        
        ";
        // line 125
        if ((((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) - 1) > 0)) {
            // line 126
            echo "            ";
            if ((((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) - 1) == 1)) {
                // line 127
                echo "                <link rel=\"prev\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_catalog_first_page", array("slug" => $this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), "slug", array()))), "html", null, true);
                echo "\" />
            ";
            } else {
                // line 129
                echo "                <link rel=\"prev\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_catalog", array("slug" => $this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), "slug", array()), "page" => ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) - 1))), "html", null, true);
                echo "\" />
            ";
            }
            // line 131
            echo "        ";
        }
        // line 132
        echo "
        ";
        // line 133
        if ((((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) + 1) <= (isset($context["totalPageNumber"]) ? $context["totalPageNumber"] : $this->getContext($context, "totalPageNumber")))) {
            // line 134
            echo "            ";
            if ((!(isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")))) {
                // line 135
                echo "                ";
                $context["_page"] = 1;
                // line 136
                echo "            ";
            }
            // line 137
            echo "            <link rel=\"next\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_catalog", array("slug" => $this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), "slug", array()), "page" => ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) + 1))), "html", null, true);
            echo "\" />
        ";
        }
        // line 139
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 143
    public function block_js_head($context, array $blocks = array())
    {
        // line 144
        echo "    ";
        ob_start();
        // line 145
        echo "
        ";
        // line 146
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
        <script>
            var google_tag_params = {
                ecomm_pagetype: 'category',
            };
            ";
        // line 152
        echo "        </script>
";
        // line 155
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 159
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 160
        echo "    ";
        ob_start();
        // line 161
        echo "
        ";
        // line 162
        if (array_key_exists("breadcrumbs", $context)) {
            // line 163
            echo "
            <div id=\"page_path\">
                <ul class=\"page_path_links\">

                    ";
            // line 167
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : $this->getContext($context, "breadcrumbs")));
            foreach ($context['_seq'] as $context["i"] => $context["breadcrumb"]) {
                // line 168
                echo "
                        <li class=\"page_path_link\">

                            ";
                // line 171
                if ((($context["i"] + 1) == twig_length_filter($this->env, (isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : $this->getContext($context, "breadcrumbs"))))) {
                    // line 172
                    echo "
                                <strong>";
                    // line 173
                    echo twig_escape_filter($this->env, $this->getAttribute($context["breadcrumb"], "caption", array()), "html", null, true);
                    echo "</strong>

                            ";
                } else {
                    // line 176
                    echo "
                                <a href=\"";
                    // line 177
                    echo twig_escape_filter($this->env, $this->getAttribute($context["breadcrumb"], "href", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["breadcrumb"], "caption", array()), "html", null, true);
                    echo "</a>

                            ";
                }
                // line 180
                echo "
                        </li>

                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['i'], $context['breadcrumb'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 184
            echo "
                </ul>
            </div>

        ";
        }
        // line 189
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 193
    public function block_promo($context, array $blocks = array())
    {
    }

    // line 195
    public function block_main_col($context, array $blocks = array())
    {
        // line 196
        echo "    ";
        ob_start();
        // line 197
        echo "        ";
        // line 198
        echo "        ";
        $context["routeFirsPage"] = "core_shop_product_catalog_first_page";
        // line 199
        echo "
        ";
        // line 201
        echo "        ";
        $this->displayBlock("products_container", $context, $blocks);
        echo "

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 206
    public function block_right_col($context, array $blocks = array())
    {
        // line 207
        echo "
    <!-- filter with owl -->
    ";
        // line 209
        $this->env->loadTemplate("CorePropertyBundle:Filter:layout.html.twig")->display(array_merge($context, (isset($context["filterBuilder"]) ? $context["filterBuilder"] : $this->getContext($context, "filterBuilder"))));
        // line 210
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
        return array (  425 => 210,  423 => 209,  419 => 207,  416 => 206,  407 => 201,  404 => 199,  401 => 198,  399 => 197,  396 => 196,  393 => 195,  388 => 193,  382 => 189,  375 => 184,  366 => 180,  358 => 177,  355 => 176,  349 => 173,  346 => 172,  344 => 171,  339 => 168,  335 => 167,  329 => 163,  327 => 162,  324 => 161,  321 => 160,  318 => 159,  312 => 155,  309 => 152,  301 => 146,  298 => 145,  295 => 144,  292 => 143,  286 => 139,  280 => 137,  277 => 136,  274 => 135,  271 => 134,  269 => 133,  266 => 132,  263 => 131,  257 => 129,  251 => 127,  248 => 126,  246 => 125,  243 => 124,  241 => 123,  237 => 121,  231 => 118,  228 => 117,  224 => 115,  222 => 114,  219 => 113,  215 => 111,  213 => 110,  210 => 109,  208 => 108,  205 => 107,  203 => 106,  200 => 105,  197 => 104,  194 => 103,  188 => 99,  184 => 96,  182 => 95,  179 => 94,  173 => 90,  170 => 87,  168 => 86,  165 => 85,  159 => 81,  155 => 78,  153 => 77,  150 => 76,  143 => 72,  139 => 69,  136 => 67,  134 => 66,  132 => 65,  130 => 64,  127 => 62,  123 => 59,  120 => 57,  118 => 56,  116 => 55,  109 => 52,  105 => 49,  102 => 47,  100 => 46,  98 => 45,  95 => 43,  91 => 40,  88 => 38,  86 => 37,  84 => 36,  82 => 35,  80 => 34,  76 => 33,  74 => 32,  72 => 31,  70 => 30,  68 => 29,  66 => 28,  64 => 27,  61 => 25,  59 => 24,  57 => 23,  55 => 22,  49 => 20,  47 => 19,  45 => 15,  14 => 13,);
    }
}
