<?php

/* CoreProductBundle:Catalog:category.html.twig */
class __TwigTemplate_9e9f0a69e70969e95c982df404df3c787ac6e446af113ec02d55c4178b75f6c8 extends Twig_Template
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
        // line 9
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
        // line 9
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 76
    public function block_title($context, array $blocks = array())
    {
        // line 77
        ob_start();
        // line 78
        if ($this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
            // line 79
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html");
            echo twig_escape_filter($this->env, (isset($context["seoPage"]) ? $context["seoPage"] : $this->getContext($context, "seoPage")), "html", null, true);
        } else {
            // line 82
            echo "            ";
            echo twig_escape_filter($this->env, (isset($context["seoTitle"]) ? $context["seoTitle"] : $this->getContext($context, "seoTitle")), "html", null, true);
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 87
    public function block_meta_keywords($context, array $blocks = array())
    {
        // line 88
        ob_start();
        // line 89
        if ($this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
            // line 90
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html");
        } else {
            // line 93
            echo "            ";
            echo twig_escape_filter($this->env, (isset($context["seoKeywords"]) ? $context["seoKeywords"] : $this->getContext($context, "seoKeywords")), "html", null, true);
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 98
    public function block_meta_description($context, array $blocks = array())
    {
        // line 99
        ob_start();
        // line 100
        if ($this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
            // line 101
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html");
            echo twig_escape_filter($this->env, (isset($context["seoPage"]) ? $context["seoPage"] : $this->getContext($context, "seoPage")), "html", null, true);
        } else {
            // line 104
            echo "            ";
            echo twig_escape_filter($this->env, (isset($context["seoDescription"]) ? $context["seoDescription"] : $this->getContext($context, "seoDescription")), "html", null, true);
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
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "query", array()), "all", array())) > 0)) {
            // line 113
            echo "
            ";
            // line 114
            if (((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) && ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) > 1))) {
                // line 115
                echo "
                ";
                // line 116
                $context["canonical"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array("slug" => $this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), "slug", array()), "page" => (isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page"))));
                // line 117
                echo "
            ";
            } else {
                // line 119
                echo "
                ";
                // line 120
                $context["canonical"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array("slug" => $this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), "slug", array())));
                // line 121
                echo "
            ";
            }
            // line 123
            echo "
            <link rel=\"canonical\" href=\"";
            // line 124
            echo twig_escape_filter($this->env, (isset($context["canonical"]) ? $context["canonical"] : $this->getContext($context, "canonical")), "html", null, true);
            echo "\" />

        ";
        }
        // line 127
        echo "

        ";
        // line 129
        $context["totalPageNumber"] = twig_round(($this->getAttribute((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), "getTotalItemCount", array()) / $this->getAttribute((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), "getItemNumberPerPage", array())), 0, "ceil");
        // line 130
        echo "        
        ";
        // line 131
        if ((((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) - 1) > 0)) {
            // line 132
            echo "            ";
            if ((((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) - 1) == 1)) {
                // line 133
                echo "                <link rel=\"prev\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_catalog_first_page", array("slug" => $this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), "slug", array()))), "html", null, true);
                echo "\" />
            ";
            } else {
                // line 135
                echo "                <link rel=\"prev\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_catalog", array("slug" => $this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), "slug", array()), "page" => ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) - 1))), "html", null, true);
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
        if ((((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) + 1) <= (isset($context["totalPageNumber"]) ? $context["totalPageNumber"] : $this->getContext($context, "totalPageNumber")))) {
            // line 140
            echo "            ";
            if ( !(isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page"))) {
                // line 141
                echo "                ";
                $context["_page"] = 1;
                // line 142
                echo "            ";
            }
            // line 143
            echo "            <link rel=\"next\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_catalog", array("slug" => $this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), "slug", array()), "page" => ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) + 1))), "html", null, true);
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
            $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : $this->getContext($context, "breadcrumbs")));
            foreach ($context['_seq'] as $context["i"] => $context["breadcrumb"]) {
                // line 174
                echo "
                        <li class=\"page_path_link\">

                            ";
                // line 177
                if ((($context["i"] + 1) == twig_length_filter($this->env, (isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : $this->getContext($context, "breadcrumbs"))))) {
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
        if (((array_key_exists("category", $context) && (isset($context["category"]) ? $context["category"] : $this->getContext($context, "category"))) && $this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), "descriptionRu", array()))) {
            // line 210
            echo "            <article class=\"def_style\">
                ";
            // line 211
            echo $this->getAttribute((isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), "descriptionRu", array());
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
        $this->env->loadTemplate("CorePropertyBundle:Filter:layout.html.twig")->display(array_merge($context, (isset($context["filterBuilder"]) ? $context["filterBuilder"] : $this->getContext($context, "filterBuilder"))));
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
        return array (  459 => 222,  457 => 221,  453 => 219,  450 => 218,  445 => 215,  443 => 214,  437 => 211,  434 => 210,  431 => 209,  426 => 207,  423 => 205,  420 => 204,  418 => 203,  415 => 202,  412 => 201,  407 => 199,  401 => 195,  394 => 190,  385 => 186,  377 => 183,  374 => 182,  368 => 179,  365 => 178,  363 => 177,  358 => 174,  354 => 173,  348 => 169,  346 => 168,  343 => 167,  340 => 166,  337 => 165,  331 => 161,  328 => 158,  320 => 152,  317 => 151,  314 => 150,  311 => 149,  305 => 145,  299 => 143,  296 => 142,  293 => 141,  290 => 140,  288 => 139,  285 => 138,  282 => 137,  276 => 135,  270 => 133,  267 => 132,  265 => 131,  262 => 130,  260 => 129,  256 => 127,  250 => 124,  247 => 123,  243 => 121,  241 => 120,  238 => 119,  234 => 117,  232 => 116,  229 => 115,  227 => 114,  224 => 113,  222 => 112,  219 => 111,  216 => 110,  213 => 109,  206 => 104,  202 => 101,  200 => 100,  198 => 99,  195 => 98,  188 => 93,  185 => 90,  183 => 89,  181 => 88,  178 => 87,  171 => 82,  167 => 79,  165 => 78,  163 => 77,  160 => 76,  156 => 9,  152 => 72,  148 => 69,  145 => 67,  143 => 66,  141 => 65,  139 => 64,  136 => 62,  132 => 59,  129 => 57,  127 => 56,  125 => 55,  118 => 52,  114 => 49,  111 => 47,  109 => 46,  107 => 45,  104 => 43,  100 => 40,  97 => 38,  95 => 37,  93 => 36,  91 => 35,  89 => 34,  85 => 33,  83 => 32,  81 => 31,  79 => 30,  77 => 29,  75 => 28,  73 => 27,  70 => 25,  68 => 24,  66 => 23,  64 => 22,  58 => 20,  56 => 19,  54 => 15,  48 => 9,  22 => 13,  11 => 9,);
    }
}
