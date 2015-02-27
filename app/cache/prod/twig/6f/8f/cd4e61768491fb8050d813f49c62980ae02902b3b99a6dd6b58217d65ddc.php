<?php

/* CoreProductBundle:Product:product.html.twig */
class __TwigTemplate_6f8fcd4e61768491fb8050d813f49c62980ae02902b3b99a6dd6b58217d65ddc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout.html.twig");

        $_trait_0 = $this->env->loadTemplate("CoreProductBundle:Catalog:product_cell.html.twig");
        // line 11
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."CoreProductBundle:Catalog:product_cell.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $_trait_1 = $this->env->loadTemplate("CoreReviewBundle:Review:reviews_layout.html.twig");
        // line 12
        if (!$_trait_1->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."CoreReviewBundle:Review:reviews_layout.html.twig".'" cannot be used as a trait.');
        }
        $_trait_1_blocks = $_trait_1->getBlocks();

        $this->traits = array_merge(
            $_trait_0_blocks,
            $_trait_1_blocks
        );

        $this->blocks = array_merge(
            $this->traits,
            array(
                'title' => array($this, 'block_title'),
                'meta_keywords' => array($this, 'block_meta_keywords'),
                'meta_description' => array($this, 'block_meta_description'),
                'seo' => array($this, 'block_seo'),
                'css' => array($this, 'block_css'),
                'js_head' => array($this, 'block_js_head'),
                'content' => array($this, 'block_content'),
            )
        );
    }

    protected function doGetParent(array $context)
    {
        return "CoreCommonBundle::main_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 14
        $context["currentProductCaption"] = $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
        // line 15
        $context["captionCaseGenitive"] = $this->env->getExtension('language_switcher_extension')->getCaseByKey($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("captionCase" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "genitive");
        // line 16
        $context["captionCaseGenitive"] = ((twig_length_filter($this->env, (isset($context["captionCaseGenitive"]) ? $context["captionCaseGenitive"] : null))) ? ((isset($context["captionCaseGenitive"]) ? $context["captionCaseGenitive"] : null)) : ((isset($context["currentProductCaption"]) ? $context["currentProductCaption"] : null)));
        // line 17
        $context["captionCaseAccusative"] = $this->env->getExtension('language_switcher_extension')->getCaseByKey($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("captionCase" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "accusative");
        // line 18
        $context["captionCaseAccusative"] = ((twig_length_filter($this->env, (isset($context["captionCaseAccusative"]) ? $context["captionCaseAccusative"] : null))) ? ((isset($context["captionCaseAccusative"]) ? $context["captionCaseAccusative"] : null)) : ((isset($context["currentProductCaption"]) ? $context["currentProductCaption"] : null)));
        // line 19
        $context["captionCasePrepositional"] = $this->env->getExtension('language_switcher_extension')->getCaseByKey($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("captionCase" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "prepositional");
        // line 20
        $context["captionCasePrepositional"] = ((twig_length_filter($this->env, (isset($context["captionCasePrepositional"]) ? $context["captionCasePrepositional"] : null))) ? ((isset($context["captionCasePrepositional"]) ? $context["captionCasePrepositional"] : null)) : ((isset($context["currentProductCaption"]) ? $context["currentProductCaption"] : null)));
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 21
    public function block_title($context, array $blocks = array())
    {
        // line 22
        ob_start();
        // line 23
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) {
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html");
        } else {
            // line 26
            echo "Купить ";
            echo twig_escape_filter($this->env, (isset($context["captionCaseAccusative"]) ? $context["captionCaseAccusative"] : null), "html", null, true);
            echo ", с доставкой по России.";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 31
    public function block_meta_keywords($context, array $blocks = array())
    {
        // line 32
        ob_start();
        // line 33
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) {
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html");
        } else {
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo ", купить, отзывы, описание, фотографии";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 41
    public function block_meta_description($context, array $blocks = array())
    {
        // line 42
        ob_start();
        // line 43
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) {
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html");
        } else {
            // line 46
            echo "Купить ";
            echo twig_escape_filter($this->env, (isset($context["captionCaseAccusative"]) ? $context["captionCaseAccusative"] : null), "html", null, true);
            echo " в интернет-магазине с доставкой по России. Отзывы о ";
            echo twig_escape_filter($this->env, (isset($context["captionCasePrepositional"]) ? $context["captionCasePrepositional"] : null), "html", null, true);
            echo ". ";
            echo twig_escape_filter($this->env, (isset($context["currentProductCaption"]) ? $context["currentProductCaption"] : null), "html", null, true);
            echo " ";
            if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "orderOnly", array())) {
                echo "под заказ ";
            } else {
                echo "в наличии";
            }
            echo ".";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 51
    public function block_seo($context, array $blocks = array())
    {
        // line 52
        echo "
    ";
        // line 53
        $this->displayParentBlock("seo", $context, $blocks);
        echo "

    ";
        // line 56
        echo "    ";
        // line 61
        echo "
";
    }

    // line 64
    public function block_css($context, array $blocks = array())
    {
        // line 65
        echo "    ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "19e1272_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_19e1272_0") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/product_details_jquery.fancybox_1.css");
            // line 70
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" />
    ";
            // asset "19e1272_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_19e1272_1") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/product_details_jquery.rating_2.css");
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" />
    ";
        } else {
            // asset "19e1272"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_19e1272") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/product_details.css");
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" />
    ";
        }
        unset($context["asset_url"]);
        // line 72
        echo "    ";
        // line 74
        echo "
    ";
        // line 75
        $this->displayParentBlock("css", $context, $blocks);
        echo "

";
    }

    // line 79
    public function block_js_head($context, array $blocks = array())
    {
        // line 80
        echo "
    ";
        // line 81
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
    ";
        // line 82
        if (((isset($context["userCity"]) ? $context["userCity"] : null) && twig_length_filter($this->env, (isset($context["deliveryCompanies"]) ? $context["deliveryCompanies"] : null)))) {
            // line 83
            echo "        <script>
            settingsJS.routes['delivery_calculate'] = \"";
            // line 84
            echo $this->env->getExtension('routing')->getPath("delivery_product_calculate");
            echo "\";
            settingsJS.trans['delivery_calculate'] = \"";
            // line 85
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("delivery.brokenConnect", array(), "CoreDeliveryBundle"), "html", null, true);
            echo "\";
            settingsJS.trans['delivery_calculate_hide'] = \"";
            // line 86
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("delivery.hide", array(), "CoreDeliveryBundle"), "html", null, true);
            echo "\";
            settingsJS.trans['delivery_calculate_show'] = \"";
            // line 87
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("delivery.show", array(), "CoreDeliveryBundle"), "html", null, true);
            echo "\";
        </script>
    ";
            // line 89
            if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
                // asset "4f65755_0"
                $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f65755_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/frontend.delivery_frontend.delivery_1.js");
                // line 90
                echo "    <script src=\"";
                echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
                echo "\"></script>
    ";
            } else {
                // asset "4f65755"
                $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f65755") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/frontend.delivery.js");
                echo "    <script src=\"";
                echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
                echo "\"></script>
    ";
            }
            unset($context["asset_url"]);
            // line 92
            echo "    ";
        }
        // line 93
        echo "    <script>
        var google_tag_params = {
            ecomm_prodid: ";
        // line 95
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "id", array()), "html", null, true);
        echo ",
            ecomm_pagetype: 'product',
        };
        settingsJS.routes['core_pre_order_cost'] = \"";
        // line 98
        echo $this->env->getExtension('routing')->getPath("core_pre_order_cost");
        echo "\";
         ";
        // line 103
        echo "    </script>
    ";
        // line 104
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "3c2556b_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3c2556b_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/product_details_jquery.elevateZoom-3.0.8.min_1.js");
            // line 112
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "3c2556b_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3c2556b_1") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/product_details_jquery.fancybox.pack_2.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "3c2556b_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3c2556b_2") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/product_details_jquery.rating.pack_3.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "3c2556b_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3c2556b_3") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/product_details_frontend.product_4.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "3c2556b_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3c2556b_4") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/product_details_frontend.review_5.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "3c2556b"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3c2556b") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/product_details.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 114
        echo "
    ";
        // line 116
        echo "        ";
        // line 117
        echo "        ";
        // line 118
        echo "        ";
        // line 120
        echo "        ";
        // line 121
        echo "
";
    }

    // line 124
    public function block_content($context, array $blocks = array())
    {
        // line 125
        echo "    ";
        $context["imgSize"] = "140x140_";
        echo " ";
        // line 126
        echo "    ";
        ob_start();
        // line 127
        echo "        <!-- breadcrumbs -->
        ";
        // line 128
        if (array_key_exists("breadcrumbs", $context)) {
            // line 129
            echo "
            <div id=\"page_path\">
                <ul class=\"page_path_links\">

                    ";
            // line 133
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
                // line 134
                echo "
                        <li class=\"page_path_link\"><a href=\"";
                // line 135
                echo twig_escape_filter($this->env, $this->getAttribute($context["breadcrumb"], "href", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["breadcrumb"], "caption", array()), "html", null, true);
                echo "</a></li>

                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 138
            echo "
                    <li class=\"page_path_link\"><strong>";
            // line 139
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo "</strong></li>

                </ul>
            </div>

        ";
        }
        // line 145
        echo "        <!-- /breadcrumbs -->

        <div id=\"content\" class=\"product_page\" role=\"main\">

            <section itemscope itemtype=\"http://schema.org/Product\">";
        // line 151
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "brand", array())) {
            // line 153
            echo "<meta itemprop=\"brand\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "brand", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo "\" />";
        }
        // line 157
        echo "<meta itemprop=\"sku\" content=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "sku", array()), "html", null, true);
        echo "\" />
                <div class=\"product_header\">
                    <hgroup>
                        <h1 itemprop=\"name\">";
        // line 160
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
        echo "</h1>
                        <h2>";
        // line 163
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "brand", array())) {
            // line 165
            echo "Производитель: <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand_first_page", array("slug" => $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "brand", array()), "slug", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "brand", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo "</a>";
            // line 166
            if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "serie", array())) {
                // line 167
                echo ", Серия: <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand_series_first_page", array("slug" => $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "brand", array()), "slug", array()), "slugSeries" => $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "serie", array()), "slug", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "serie", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                echo "</a>";
            }
        }
        // line 174
        echo "</h2>
                    </hgroup>

                    ";
        // line 177
        if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "reviewsCount", array()) > 0)) {
            // line 178
            echo "
                        <div class=\"product_rating\" itemprop=\"aggregateRating\" itemscope itemtype=\"http://schema.org/AggregateRating\">
                            <meta itemprop=\"reviewCount\" content=\"";
            // line 180
            echo twig_escape_filter($this->env, (isset($context["reviewsTotal"]) ? $context["reviewsTotal"] : null), "html", null, true);
            echo "\" />
                            <meta itemprop=\"ratingValue\" content=\"";
            // line 181
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "reviewsRating", array()), 1, ".", ""), "html", null, true);
            echo "\" />
                            ";
            // line 184
            echo "                            ";
            echo $this->env->getExtension('review_extension')->drawStarsByRatingFunction($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "reviewsRating", array()), "big");
            echo "

                            <span class=\"product_rating_count\">";
            // line 186
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "reviewsRating", array()), 1, ".", ""), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "reviewsCount", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "reviewsCount", array()), array(0 => "оценка", 1 => "оценки", 2 => "оценок")), "html", null, true);
            echo ")</span>
                            <span class=\"product_goto_review\"><span onclick=\"location.href = '#review-anchor-add'\" class=\"text_tgl\">Оставить отзыв</span></span>
                        </div>

                    ";
        }
        // line 191
        echo "
                </div>


                <!-- product overview & buy -->
                ";
        // line 196
        $context["order"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "get", array(0 => "core_order"), "method");
        // line 197
        echo "                <script>var orderJsonString = '";
        echo twig_jsonencode_filter((isset($context["order"]) ? $context["order"] : null));
        echo "'</script>
                ";
        // line 198
        $context["isInCart"] = false;
        // line 199
        echo "
                <div class=\"product_overview\" ";
        // line 200
        echo $this->env->getExtension('fastedit_extension')->fastEditFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : null));
        echo ">
                    <div class=\"product_page_pad cols_container product_gallery_wrap\">
                        <!-- product photos -->
                        <section class=\"product_photos main_col\">
                            ";
        // line 204
        $context["mainImg"] = ((twig_length_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "images", array()))) ? (twig_first($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "images", array()))) : (null));
        // line 205
        echo "                            ";
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "images", array()))) {
            // line 206
            echo "                                ";
            if ($this->getAttribute(twig_first($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "images", array())), ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) {
                // line 207
                echo "                                    ";
                $context["alt"] = $this->getAttribute(twig_first($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "images", array())), ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
                // line 208
                echo "                                    ";
            } else {
                // line 209
                echo "                                        ";
                $context["alt"] = ("Фотография " . $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))));
                // line 210
                echo "                                ";
            }
            // line 211
            echo "                                ";
        } else {
            // line 212
            echo "                                     ";
            $context["alt"] = $this->env->getExtension('translator')->trans("msg.image_not_found", array(), "frontend");
            // line 213
            echo "                            ";
        }
        // line 214
        echo "
                            ";
        // line 215
        $context["filesTotalCount"] = ($this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "images", array()), "count", array()) + twig_length_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "remoteVideos", array())));
        // line 216
        echo "
                            <div class=\"main_col_pad\">
                                <div class=\"product_photo_view\">

                                    <ins class=\"loupe";
        // line 220
        if (((isset($context["mainImg"]) ? $context["mainImg"] : null) && (!(((($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : null), "width", array()) >= 1000) || ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : null), "height", array()) >= 1000)) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : null), "height", array()) >= 410)) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : null), "width", array()) >= 650))))) {
            echo " hidden";
        }
        echo "\">&nbsp;</ins>

                                    <span class=\"img-loader\"></span>

                                    ";
        // line 224
        if (((!(isset($context["filesTotalCount"]) ? $context["filesTotalCount"] : null)) && (((isset($context["mainImg"]) ? $context["mainImg"] : null) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : null), "height", array()) >= 500)) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : null), "width", array()) >= 500)))) {
            // line 225
            echo "
                                        <a class=\"fancybox-button\" rel=\"fancybox-button\" href=\"";
            // line 226
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "images", array()), "original", "uploaded_file_", true)), "html", null, true);
            echo "\">

                                    ";
        }
        // line 229
        echo "
                                    <img itemprop=\"image\" src=\"";
        // line 230
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "images", array()), "preview", "400x400_", true)), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, (isset($context["alt"]) ? $context["alt"] : null), "html", null, true);
        echo "\"
                                         ";
        // line 231
        if ((!$this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "images", array()), "preview", "100x100_"))) {
            // line 232
            echo "style=\"cursor: default;\"";
        }
        // line 234
        if (((isset($context["mainImg"]) ? $context["mainImg"] : null) && (((($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : null), "width", array()) >= 1000) || ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : null), "height", array()) >= 1000)) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : null), "height", array()) >= 410)) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : null), "width", array()) >= 650)))) {
            echo "data-zoom-image=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "images", array()))), "html", null, true);
            echo "\"";
        }
        // line 235
        echo "                                         >

                                    ";
        // line 237
        if ((((!(isset($context["filesTotalCount"]) ? $context["filesTotalCount"] : null)) && (isset($context["mainImg"]) ? $context["mainImg"] : null)) && (($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : null), "height", array()) >= 500) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : null), "width", array()) >= 500)))) {
            // line 238
            echo "
                                        </a>

                                    ";
        }
        // line 242
        echo "
                                </div>

                                ";
        // line 246
        echo "
                                ";
        // line 247
        if (((isset($context["filesTotalCount"]) ? $context["filesTotalCount"] : null) > 1)) {
            // line 248
            echo "
                                    <div class=\"product_gallery\">

                                        ";
            // line 251
            if (((isset($context["filesTotalCount"]) ? $context["filesTotalCount"] : null) > 4)) {
                // line 252
                echo "
                                            <span class=\"product_gallery_nav prev disabled\"><span class=\"product_gallery_nav_btn\">";
                // line 253
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next's", array(), "frontend"), "html", null, true);
                echo "</span></span>
                                            <span class=\"product_gallery_nav next disabled\"><span class=\"product_gallery_nav_btn\">";
                // line 254
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Prev's", array(), "frontend"), "html", null, true);
                echo "</span></span>

                                        ";
            }
            // line 257
            echo "
                                        <div class=\"product_gallery_list\">
                                            <ul class=\"product_gallery_scroll\">

                                                ";
            // line 261
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "images", array()));
            foreach ($context['_seq'] as $context["i"] => $context["image"]) {
                // line 262
                echo "
                                                    ";
                // line 263
                if ($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["image"], "preview", "100x100_")) {
                    // line 264
                    echo "
                                                        ";
                    // line 265
                    if ($this->getAttribute($context["image"], ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) {
                        // line 266
                        echo "                                                            ";
                        $context["alt"] = $this->getAttribute($context["image"], ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
                        // line 267
                        echo "                                                        ";
                    } else {
                        // line 268
                        echo "                                                            ";
                        $context["alt"] = ((("Фотография №" . ($context["i"] + 1)) . " ") . $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))));
                        // line 269
                        echo "                                                        ";
                    }
                    // line 270
                    echo "
                                                        <li class=\"product_gallery_item\" data-src=\"";
                    // line 271
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["image"], "preview", "400x400_", true)), "html", null, true);
                    echo "\">

                                                            ";
                    // line 273
                    if ((($this->getAttribute($context["image"], "height", array()) >= 500) && ($this->getAttribute($context["image"], "width", array()) >= 500))) {
                        // line 274
                        echo "                                                                <a class=\"fancybox-button\" rel=\"fancybox-button\" href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["image"], "original", "uploaded_file_", true)), "html", null, true);
                        echo "\">
                                                            ";
                    }
                    // line 276
                    echo "
                                                                <img ";
                    // line 277
                    if ((((($this->getAttribute($context["image"], "width", array()) >= 1000) || ($this->getAttribute($context["image"], "height", array()) >= 1000)) && ($this->getAttribute($context["image"], "height", array()) >= 410)) && ($this->getAttribute($context["image"], "width", array()) >= 650))) {
                        echo "data-zoom-image=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["image"])), "html", null, true);
                        echo "\"";
                    }
                    echo " src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["image"], "preview", "100x100_", true)), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, (isset($context["alt"]) ? $context["alt"] : null), "html", null, true);
                    echo "\" />

                                                            ";
                    // line 279
                    if ((($this->getAttribute($context["image"], "height", array()) >= 500) && ($this->getAttribute($context["image"], "width", array()) >= 500))) {
                        // line 280
                        echo "                                                                </a>
                                                            ";
                    }
                    // line 282
                    echo "
                                                        </li>

                                                    ";
                }
                // line 286
                echo "
                                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['i'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 288
            echo "
                                                ";
            // line 289
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "remoteVideos", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["remoteVideo"]) {
                // line 290
                echo "                                                    <li class=\"product_gallery_item small_video\"  data-src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/icon-video.png"), "html", null, true);
                echo "\">
                                                        <a class=\"fancybox-button\" data-fancybox-type=\"iframe\" rel=\"fancybox-button\" href=\"";
                // line 291
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["remoteVideo"], "videoHosting", array()), "playerUri", array()), "html", null, true);
                echo twig_escape_filter($this->env, $this->getAttribute($context["remoteVideo"], "code", array()), "html", null, true);
                echo "\">
                                                            <i class=\"icon_no_video\" title=\"";
                // line 292
                echo twig_escape_filter($this->env, $this->getAttribute($context["remoteVideo"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                echo "\"></i>
                                                        </a>
                                                    </li>
                                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['remoteVideo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 296
            echo "
                                            </ul>
                                        </div>

                                    </div>

                                ";
        }
        // line 303
        echo "
                            </div>
                        </section>
                        <!-- /product photos -->

                        <!-- product specs & buy -->
                        <div class=\"side_col\">
                            <div class=\"side_col_pad\">
                                <section class=\"product_specs\">

                                    ";
        // line 313
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("slogan" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) {
            // line 314
            echo "
                                        <p class=\"product_spec_catchword\">";
            // line 315
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("slogan" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo "</p>

                                    ";
        }
        // line 318
        echo "
                                    ";
        // line 319
        if ((!twig_test_empty((isset($context["extraProperties"]) ? $context["extraProperties"] : null)))) {
            // line 320
            echo "
                                        <ul class=\"product_specs_list\">

                                            ";
            // line 323
            if ($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : null), "age", array(), "array", true, true)) {
                // line 324
                echo "                                                ";
                $context["age"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : null), "age", array(), "array"), 0, array(), "array"), "value", array());
                // line 325
                echo "
                                                ";
                // line 326
                if ((twig_slice($this->env, (isset($context["age"]) ? $context["age"] : null), (-1)) == 1)) {
                    // line 327
                    echo "                                                    ";
                    $context["ageString"] = array(0 => "год", 1 => "года", 2 => "лет");
                    // line 328
                    echo "                                                ";
                } else {
                    // line 329
                    echo "                                                    ";
                    $context["ageString"] = array(0 => "года", 1 => "года", 2 => "лет");
                    // line 330
                    echo "                                                ";
                }
                // line 331
                echo "
                                                <li class=\"product_spec\" title=\"Рекомендуемый производителем возраст ребенка ";
                // line 332
                echo twig_escape_filter($this->env, (isset($context["age"]) ? $context["age"] : null), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction(twig_slice($this->env, (isset($context["age"]) ? $context["age"] : null), (-1)), (isset($context["ageString"]) ? $context["ageString"] : null)), "html", null, true);
                echo "\">

                                                    ";
                // line 334
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : null), "age", array(), "array"));
                foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                    // line 335
                    echo "
                                                        <span class=\"product_spec_age\">";
                    // line 336
                    echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "value", array()), "html", null, true);
                    echo "</span>

                                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 339
                echo "
                                                    <span class=\"product_spec_label\">";
                // line 340
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Age", array(), "frontend"), "html", null, true);
                echo "</span>
                                                </li>

                                            ";
            }
            // line 344
            echo "
                                            ";
            // line 345
            if ($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : null), "skills", array(), "array", true, true)) {
                // line 346
                echo "
                                                <li class=\"product_spec product_spec_skills\">

                                                    ";
                // line 349
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : null), "skills", array(), "array"));
                foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                    // line 350
                    echo "
                                                        <span class=\"product_spec_skill skill_";
                    // line 351
                    echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "name", array()), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "value", array()), "html", null, true);
                    echo "\"><span class=\"skill_icon\">&nbsp;</span></span>

                                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 354
                echo "
                                                    <span class=\"product_spec_label\">";
                // line 355
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Developing skills", array(), "frontend"), "html", null, true);
                echo "</span>
                                                </li>

                                            ";
            }
            // line 359
            echo "
                                            ";
            // line 360
            if (($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : null), "number_components", array(), "array", true, true) && ($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : null), "number_components", array(), "array") > 0))) {
                // line 361
                echo "
                                                <li class=\"product_spec\">
                                                    <span class=\"product_spec_details\">";
                // line 363
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : null), "number_components", array(), "array"), "html", null, true);
                echo "</span>
                                                    <span class=\"product_spec_label\">";
                // line 364
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Number of components", array(), "frontend"), "html", null, true);
                echo "</span>
                                                </li>

                                            ";
            }
            // line 368
            echo "
                                        </ul>

                                    ";
        }
        // line 372
        echo "
                                </section>
                                <section class=\"product_buy\">
                                    <!--  Standart -->

                                    ";
        // line 377
        if (((!twig_test_empty((isset($context["modsData"]) ? $context["modsData"] : null))) && ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "AvailabilityQuantity", array()) > 0))) {
            // line 378
            echo "
                                        <div class=\"product_buy_options\">

                                            ";
            // line 381
            if (($this->getAttribute((isset($context["modsData"]) ? $context["modsData"] : null), "colors", array(), "any", true, true) && $this->getAttribute((isset($context["modsData"]) ? $context["modsData"] : null), "colors", array()))) {
                // line 382
                echo "
                                                <div class=\"product_buy_option\">
                                                    <label>";
                // line 384
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Color", array(), "frontend"), "html", null, true);
                echo "</label>
                                                    <select id=\"color\">

                                                        ";
                // line 387
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["modsData"]) ? $context["modsData"] : null), "colors", array()));
                foreach ($context['_seq'] as $context["value"] => $context["color"]) {
                    // line 388
                    echo "
                                                            <option value=\"";
                    // line 389
                    echo twig_escape_filter($this->env, $context["value"], "html", null, true);
                    echo "\" ";
                    if ($this->getAttribute($context["color"], "isCurrent", array())) {
                        echo "selected=\"selected\"";
                    }
                    echo " ";
                    if ($this->getAttribute($context["color"], "links", array(), "any", true, true)) {
                        echo "data-links-json=\"";
                        echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute($context["color"], "links", array())), "html", null, true);
                        echo "\"";
                    }
                    echo ">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["color"], "caption", array()), "html", null, true);
                    echo "</option>

                                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['value'], $context['color'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 392
                echo "
                                                    </select>
                                                </div>

                                            ";
            }
            // line 397
            echo "
                                            ";
            // line 398
            if (($this->getAttribute((isset($context["modsData"]) ? $context["modsData"] : null), "sizes", array(), "any", true, true) && $this->getAttribute((isset($context["modsData"]) ? $context["modsData"] : null), "sizes", array()))) {
                // line 399
                echo "
                                                <div class=\"product_buy_option\">
                                                    <label>";
                // line 401
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Size", array(), "frontend"), "html", null, true);
                echo "</label>
                                                    <select id=\"size\" class=\"load\">

                                                        ";
                // line 404
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["modsData"]) ? $context["modsData"] : null), "sizes", array()));
                foreach ($context['_seq'] as $context["value"] => $context["size"]) {
                    // line 405
                    echo "
                                                            <option value=\"";
                    // line 406
                    echo twig_escape_filter($this->env, $context["value"], "html", null, true);
                    echo "\" ";
                    if ($this->getAttribute($context["size"], "isCurrent", array())) {
                        echo "selected=\"selected\" data-current=\"this\"";
                    }
                    echo ">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["size"], "caprion", array()), "html", null, true);
                    echo "</option>

                                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['value'], $context['size'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 409
                echo "
                                                    </select>
                                                    ";
                // line 415
                echo "                                                </div>

                                                <div id=\"sizeMsgTpl\">";
                // line 417
                echo $this->env->getExtension('translator')->trans("msg.not_have_size", array(), "frontend");
                echo "</div>

                                            ";
            }
            // line 420
            echo "

                                            ";
            // line 422
            $context["isEnableSelectQA"] = false;
            // line 423
            echo "                                            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["quantityAlternative"]) ? $context["quantityAlternative"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["qa"]) {
                if ($this->getAttribute($this->getAttribute($context["qa"], "targetObject", array()), "quantityOfPieces", array())) {
                    // line 424
                    echo "                                                ";
                    $context["isEnableSelectQA"] = true;
                    // line 425
                    echo "                                            ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['qa'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 426
            echo "
                                            ";
            // line 427
            if (((isset($context["quantityAlternative"]) ? $context["quantityAlternative"] : null) && (isset($context["isEnableSelectQA"]) ? $context["isEnableSelectQA"] : null))) {
                // line 428
                echo "
                                                <div class=\"product_buy_option\">
                                                    <label>";
                // line 430
                echo "</label>
                                                    <select id=\"quantity-alternative\" class=\"\">";
                // line 433
                if ((!$this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "quantityOfPieces", array()))) {
                    // line 434
                    echo "<option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "id", array()), "html", null, true);
                    echo "\" selected=\"selected\">Целый товар (";
                    echo twig_escape_filter($this->env, (($this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "current")) . " ") . $this->env->getExtension('money_extension')->currencyFormatFunction()), "html", null, true);
                    echo ")</option>";
                } else {
                    // line 437
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["quantityAlternative"]) ? $context["quantityAlternative"] : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["qa"]) {
                        if ((!$this->getAttribute($this->getAttribute($context["qa"], "targetObject", array()), "quantityOfPieces", array()))) {
                            // line 438
                            $context["qa"] = $this->getAttribute($context["qa"], "targetObject", array());
                            // line 442
                            echo "                                                            <option value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["qa"], "id", array()), "html", null, true);
                            echo "\" ";
                            if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "id", array()) == $this->getAttribute($context["qa"], "id", array()))) {
                                echo "selected=\"selected\"";
                            }
                            echo ">Целый товар";
                            if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "id", array()) != $this->getAttribute($context["qa"], "id", array()))) {
                                echo " (";
                                echo twig_escape_filter($this->env, (($this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction($context["qa"], "current")) . " ") . $this->env->getExtension('money_extension')->currencyFormatFunction()), "html", null, true);
                                echo ")";
                            }
                            echo "</option>

                                                        ";
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['qa'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 445
                    echo "
                                                        <option value=\"";
                    // line 446
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "id", array()), "html", null, true);
                    echo "\" selected=\"selected\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "quantityOfPieces", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "unitOfMeasure", array()), ("shortCaption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                    echo " (";
                    echo twig_escape_filter($this->env, (($this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "current")) . " ") . $this->env->getExtension('money_extension')->currencyFormatFunction()), "html", null, true);
                    echo ")</option>";
                }
                // line 450
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["quantityAlternative"]) ? $context["quantityAlternative"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["qa"]) {
                    if ($this->getAttribute($this->getAttribute($context["qa"], "targetObject", array()), "quantityOfPieces", array())) {
                        // line 451
                        $context["qa"] = $this->getAttribute($context["qa"], "targetObject", array());
                        // line 455
                        echo "                                                            <option value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["qa"], "id", array()), "html", null, true);
                        echo "\" ";
                        if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "id", array()) == $this->getAttribute($context["qa"], "id", array()))) {
                            echo "selected=\"selected\"";
                        }
                        echo ">";
                        // line 456
                        echo twig_escape_filter($this->env, $this->getAttribute($context["qa"], "quantityOfPieces", array()), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "unitOfMeasure", array()), ("shortCaption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                        echo " ";
                        if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "id", array()) != $this->getAttribute($context["qa"], "id", array()))) {
                            echo " (";
                            echo twig_escape_filter($this->env, (($this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction($context["qa"], "current")) . " ") . $this->env->getExtension('money_extension')->currencyFormatFunction()), "html", null, true);
                            echo ")";
                        }
                        // line 457
                        echo "                                                            </option>
                                                        ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['qa'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 459
                echo "
                                                    </select>
                                                </div>

                                            ";
            }
            // line 464
            echo "
                                        </div>

                                    ";
        }
        // line 468
        echo "
                                    <div class=\"product_buy_action\" itemprop=\"offers\" itemscope itemtype=\"http://schema.org/Offer\">
                                        <div class=\"product_buy_price\">
                                            <meta itemprop=\"price\" content=\"";
        // line 471
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "price", array()), "html", null, true);
        echo "\" />
                                            <meta itemprop=\"priceCurrency\" content=\"RUB\" />
                                            <h4 class=\"h4price\">Цена:</h4>

                                            ";
        // line 475
        if ($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "old")) {
            // line 476
            echo "
                                                <div class=\"product_price old\">";
            // line 477
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "old")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</div>

                                            ";
        }
        // line 480
        echo "
                                            <div class=\"product_price\">";
        // line 481
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "current")), "html", null, true);
        echo " <span>";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</span></div>
                                        </div>
                                        ";
        // line 483
        if ((!$this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "isDiscontinued", array()))) {
            // line 484
            echo "
                                            ";
            // line 485
            if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "orderOnly", array()) && (!$this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "OOPBQuantity", array())))) {
                // line 486
                echo "                                                ";
            } elseif (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "AvailabilityQuantity", array()) > 0)) {
                // line 487
                echo "                                                <button id=\"update-cart\" class=\"common_button big button_cart button_green\"
                                                        data-id=\"";
                // line 488
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "id", array()), "html", null, true);
                echo "\"
                                                        data-url=\"";
                // line 489
                echo $this->env->getExtension('routing')->getPath("core_product_update_cart");
                echo "\"
                                                        ";
                // line 490
                if (($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "products", array(), "any", true, true) && $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "products", array(), "any", false, true), $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "id", array()), array(), "array", true, true))) {
                    // line 491
                    $context["isInCart"] = true;
                    // line 492
                    echo "                                                            data-is-in-cart=\"1\"
                                                        ";
                }
                // line 494
                echo "data-is-in-cart-text=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Product add in cart", array("%URL%" => $this->env->getExtension('routing')->getPath("core_order_cart")), "frontend"), "html", null, true);
                echo "\"
                                                        ><span><i class=\"button_icon\"></i><b class=\"in-cart-text\">";
                // line 495
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Add in cart", array(), "frontend"), "html", null, true);
                echo "</b></span></button>    
                                            ";
            }
            // line 496
            echo "    
                                        ";
        }
        // line 497
        echo " 
                                        
                                        ";
        // line 499
        if ((!$this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "isDiscontinued", array()))) {
            // line 500
            echo "
                                            ";
            // line 501
            if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "orderOnly", array()) && (!$this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "OOPBQuantity", array())))) {
                // line 502
                echo "                                                ";
                if ((isset($context["preOrderForm"]) ? $context["preOrderForm"] : null)) {
                    // line 503
                    echo "                                                <div class=\"clear\"></div>
                                                <br>
                                                <form class=\"product-in-order\" id=\"pre_order_form\">
                                                    Вы можете купить товар <strong>Под заказ</strong>.
                                                    Для оформление заказа укажите ваши данные.
                                                    <br>
                                                    <br>
                                                    ";
                    // line 510
                    $this->env->getExtension('form')->renderer->setTheme((isset($context["preOrderForm"]) ? $context["preOrderForm"] : null), array(0 => "CoreOrderBundle:Form:row.html.twig"));
                    // line 511
                    echo "                                                    ";
                    if ($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : null), "contactList", array(), "any", true, true)) {
                        // line 512
                        echo "                                                        <div class=\"like_text_input_rounded_wr\">
                                                            ";
                        // line 513
                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : null), "contactList", array()), 'label');
                        echo "
                                                            <div class=\"rounded_select\">
                                                                <div class=\"rounded_select_in\">
                                                                ";
                        // line 516
                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : null), "contactList", array()), 'widget');
                        echo "
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ";
                    }
                    // line 521
                    echo "                                                    <div class=\"like_text_input_rounded_wr\">
                                                        ";
                    // line 522
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : null), "preOrder", array()), "email", array()), 'label');
                    echo "
                                                        ";
                    // line 523
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : null), "preOrder", array()), "email", array()), 'widget');
                    echo "
                                                    </div>
                                                    <div class=\"like_text_input_rounded_wr\">
                                                        ";
                    // line 526
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : null), "preOrder", array()), "phone", array()), 'label');
                    echo "
                                                        ";
                    // line 527
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : null), "preOrder", array()), "phone", array()), 'widget');
                    echo "
                                                    </div>
                                                    <div class=\"like_text_input_rounded_wr\">
                                                        ";
                    // line 530
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : null), "preOrder", array()), "fio", array()), 'label');
                    echo "
                                                        ";
                    // line 531
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : null), "preOrder", array()), "fio", array()), 'widget');
                    echo "
                                                    </div>
                                                    <div class=\"like_text_input_rounded_wr\">
                                                        ";
                    // line 534
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : null), "preOrder", array()), "city", array()), 'label');
                    echo "
                                                        <div class=\"like_text_input_rounded select2\">
                                                            ";
                    // line 536
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : null), "preOrder", array()), "city", array()), 'widget');
                    echo "
                                                        </div>
                                                    </div>
                                                    <div class=\"like_text_input_rounded_wr\">
                                                        ";
                    // line 540
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : null), "preOrder", array()), "address", array()), 'label');
                    echo "
                                                        ";
                    // line 541
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : null), "preOrder", array()), "address", array()), 'widget');
                    echo "
                                                    </div>
                                                    <div class=\"like_text_input_rounded_wr\">
                                                        ";
                    // line 544
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : null), "preOrder", array()), "compositions", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["preOrderComposition"]) {
                        // line 545
                        echo "                                                            ";
                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["preOrderComposition"], "quantity", array()), 'label');
                        echo "
                                                            ";
                        // line 546
                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["preOrderComposition"], "quantity", array()), 'widget');
                        echo "
                                                            ";
                        // line 547
                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["preOrderComposition"], "product", array()), 'widget');
                        echo "
                                                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['preOrderComposition'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 549
                    echo "                                                        ";
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["preOrderForm"]) ? $context["preOrderForm"] : null), 'rest');
                    echo "
                                                    </div>
                                                    <div class=\"like_text_input_rounded_wr\">
                                                        <label class=\"control-label \"><strong>Итого</strong></label>
                                                        <span id=\"pre_order_total_cost\">";
                    // line 553
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "current")), "html", null, true);
                    echo " <span>";
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                    echo "</span></span>
                                                    </div>
                                                    <button id=\"buy-in-order\"
                                                            class=\"common_button big button_cart button_green\"
                                                            ";
                    // line 557
                    if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "environment", array()) == "prod")) {
                        echo " onclick=\"yaCounter23357440.reachGoal('preorder'); return true;\" ";
                    }
                    // line 558
                    echo "                                                            data-id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "id", array()), "html", null, true);
                    echo "\"
                                                            data-url=\"";
                    // line 559
                    echo $this->env->getExtension('routing')->getPath("core_product_update_cart");
                    echo "\"
                                                            >
                                                        <span>
                                                            <i class=\"button_icon\"></i>
                                                            <b class=\"in-cart-text\">Заказать</b>
                                                        </span>
                                                    </button>
                                                </form>

                                                ";
                    // line 584
                    echo "                                                <div id=\"byOrderMessage\"></div>
                                                ";
                }
                // line 586
                echo "                                            ";
            } elseif (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "AvailabilityQuantity", array()) > 0)) {
                // line 587
                echo "                                                ";
                if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "orderOnly", array())) {
                    // line 588
                    echo "
                                                    <div class=\"clearfix\"></div>

                                                    <!--noindex-->

                                                    <span class=\"confines_min_sum\">";
                    // line 595
                    if ((!$this->getAttribute((isset($context["confines"]) ? $context["confines"] : null), "canCreateOrder", array()))) {
                        // line 597
                        echo $this->getAttribute((isset($context["confines"]) ? $context["confines"] : null), "msg", array());
                    }
                    // line 601
                    echo "</span>

                                                    <!--/noindex-->

                                                ";
                }
                // line 606
                echo "                                                ";
                // line 617
                echo "                                                <div class=\"clear\"></div>
                                                <div class=\"ajax-result-cart\">
                                                    <div class=\"ajax-success\"";
                // line 619
                if ((isset($context["isInCart"]) ? $context["isInCart"] : null)) {
                    echo " style=\"display:block\">";
                    echo $this->env->getExtension('translator')->trans("Product add in cart", array("%URL%" => $this->env->getExtension('routing')->getPath("core_order_cart")), "frontend");
                } else {
                    echo ">";
                }
                echo "</div>
                                                    <div class=\"ajax-error\"></div>
                                                </div>

                                            ";
            }
            // line 624
            echo "
                                        ";
        }
        // line 626
        echo "
                                        <div class=\"product_availability with_icon ";
        // line 627
        if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "AvailabilityQuantity", array()) == 0)) {
            echo "not_instock";
        } else {
            echo "instock";
        }
        echo "\">
                                            Артикул: ";
        // line 628
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "id", array()), "html", null, true);
        echo ". ";
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "sku", array())) {
            echo " SKU (";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "sku", array()), "html", null, true);
            echo ")";
        }
        // line 629
        echo "                                            <br>

                                            ";
        // line 631
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "isDiscontinued", array())) {
            // line 632
            echo "
                                                <span><link itemprop=\"availability\" href=\"http://schema.org/Discontinued\" />Снят с производства</span>

                                            ";
        } elseif ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "orderOnly", array())) {
            // line 636
            echo "                                                ";
            if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "OOPBQuantity", array())) {
                // line 637
                echo "                                                <span>
                                                    <link itemprop=\"availability\" href=\"http://schema.org/InStock\" />На складе ";
                // line 638
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "OOPBQuantity", array()), "html", null, true);
                if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "unitOfMeasure", array())) {
                    echo "&nbsp;";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "unitOfMeasure", array()), ("shortCaption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                }
                // line 639
                echo "                                                </span>
                                                <br />
                                                ";
            }
            // line 642
            echo "                                                <span><link itemprop=\"availability\" href=\"http://schema.org/PreOrder\" />Под заказ";
            if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "deliveryDays", array())) {
                echo ". Время обработки ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "deliveryDays", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "deliveryDays", array()), array(0 => "день", 1 => "дня", 2 => "дней")), "html", null, true);
                echo ".";
            }
            echo "</span>
                                            ";
        } else {
            // line 644
            echo "                                            <span class=\"instock-text\">";
            if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "AvailabilityQuantity", array()) != 0)) {
                echo "<link itemprop=\"availability\" href=\"http://schema.org/InStock\" />";
            }
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("In stock", array(), "frontend"), "html", null, true);
            echo "</span>
                                            <span class=\"not-instock-text\">";
            // line 645
            if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "AvailabilityQuantity", array()) == 0)) {
                echo "<link itemprop=\"availability\" href=\"http://schema.org/OutOfStock\" />";
            }
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Not in stock", array(), "frontend"), "html", null, true);
            echo "</span><span class=\"count-instock\">";
            if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "AvailabilityQuantity", array()) > 0)) {
                echo ": ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "AvailabilityQuantity", array()), "html", null, true);
                if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "unitOfMeasure", array())) {
                    echo "&nbsp;";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "unitOfMeasure", array()), ("shortCaption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                }
            }
            echo "</span>
                                            ";
        }
        // line 647
        echo "
                                        </div>

                                    </div>

                                    ";
        // line 652
        if (((($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "AvailabilityQuantity", array()) == 0) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "isDiscontinued", array())) && twig_length_filter($this->env, (isset($context["similars"]) ? $context["similars"] : null)))) {
            // line 653
            echo "
                                        <section class=\"showcase_compact_box products_grid row_three\">
                                            <h2>";
            // line 655
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Alternative product", array(), "frontend"), "html", null, true);
            echo "</h2>
                                            <div class=\"products_grid_line grid_container\">

                                                ";
            // line 659
            echo "                                                ";
            $context["productItemContainerClass"] = "product_min";
            // line 660
            echo "                                                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["similars"]) ? $context["similars"] : null));
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
            foreach ($context['_seq'] as $context["i"] => $context["product"]) {
                // line 661
                echo "                                                    ";
                $context["product"] = $this->getAttribute($context["product"], "targetObject", array());
                // line 662
                echo "                                                    ";
                $this->displayBlock("product", $context, $blocks);
                echo "

                                                ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['i'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 665
            echo "
                                            </div>

                                            ";
            // line 668
            if ((twig_length_filter($this->env, (isset($context["similars"]) ? $context["similars"] : null)) > 3)) {
                // line 669
                echo "
                                                <span class=\"showcase_compact_nav prev disabled\">";
                // line 670
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next's", array(), "frontend"), "html", null, true);
                echo "</span>
                                                <span class=\"showcase_compact_nav next disabled\">";
                // line 671
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Prev's", array(), "frontend"), "html", null, true);
                echo "</span>

                                            ";
            }
            // line 674
            echo "
                                        </section>

                                    ";
        }
        // line 678
        echo "
                                    ";
        // line 679
        if (((($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "AvailabilityQuantity", array()) > 0) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "orderOnly", array())) && (isset($context["deliveryArticle"]) ? $context["deliveryArticle"] : null))) {
            // line 680
            echo "
                                        <div class=\"product_buy_delivery\" data-product-price=\"";
            // line 681
            echo twig_escape_filter($this->env, $this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "current"), "html", null, true);
            echo "\" data-product-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "id", array()), "html", null, true);
            echo "\">
                                            <p>";
            // line 682
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("deliveryText", array(), "frontend"), "html", null, true);
            echo " <a rel=\"nofollow\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_faq_article", array("articleSlug" => $this->getAttribute((isset($context["deliveryArticle"]) ? $context["deliveryArticle"] : null), "slug", array()), "categorySlug" => $this->getAttribute($this->getAttribute((isset($context["deliveryArticle"]) ? $context["deliveryArticle"] : null), "category", array()), "slug", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("MoreDelivery", array(), "frontend"), "html", null, true);
            echo "</a></p>
                                            ";
            // line 712
            echo "                                        </div>


                                        ";
            // line 748
            echo "                                    ";
        }
        // line 749
        echo "                                </section>
                                <ul class=\"product_toolbox\">
                                    <li class=\"product_tool\">
                                        <span id=\"update-favorite\" class=\"product_favor with_icon text_tgl\"
                                              data-add-url=\"";
        // line 753
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_product_update_favorites", array("action" => "add", "id" => $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "id", array()), "_format" => "json")), "html", null, true);
        echo "\"
                                              data-remove-url=\"";
        // line 754
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_product_update_favorites", array("action" => "remove", "id" => $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "id", array()), "_format" => "json")), "html", null, true);
        echo "\"
                                              data-add-text=\"";
        // line 755
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("In favorites", array(), "frontend"), "html", null, true);
        echo "\"
                                              data-remove-text=\"";
        // line 756
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("From favorites", array(), "frontend"), "html", null, true);
        echo "\"
                                                ";
        // line 757
        if (twig_in_filter($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "id", array()), (isset($context["favoriteProductsIds"]) ? $context["favoriteProductsIds"] : null))) {
            // line 758
            echo "data-is-in-favorite=\"1\"
                                                ";
        } else {
            // line 760
            echo "data-is-in-favorite=\"0\"
                                                ";
        }
        // line 762
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "security", array(), "any", false, true), "token", array(), "any", false, true), "user", array(), "any", false, true), "id", array(), "any", true, true)) {
            // line 763
            echo "data-is-logged=\"1\"
                                                ";
        } else {
            // line 765
            echo "data-is-logged=\"0\"
                                                    data-login-url=\"";
            // line 766
            echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
            echo "\"
                                                ";
        }
        // line 768
        echo ">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("In favorites", array(), "frontend"), "html", null, true);
        echo "</span>
                                    </li>
                                    <!--noindex-->
                                    <li class=\"product_tool\">
                                        <a rel=\"nofollow\" class=\"product_ask with_icon text_tgl\" href=\"";
        // line 772
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("trouble_ticket_contact_with_product_id", array("product_id" => $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "id", array()))), "html", null, true);
        echo "#ask-a-question\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ask a question", array(), "frontend"), "html", null, true);
        echo "</a>
                                    </li>
                                    <!--/noindex-->
                                    ";
        // line 783
        echo "                                </ul>
                                <div class=\"clear\"></div>
                                <div class=\"ajax-result-favorites\">
                                    <div class=\"ajax-success\"></div>
                                    <div class=\"ajax-error\"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /product overview & buy -->

                ";
        // line 795
        if (($this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "modificationUnion", array()), "general", array()) && (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "modificationUnion", array()) && $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "modificationUnion", array()), "general", array())) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "modificationUnion", array()), "general", array()), "id", array()) != $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "id", array()))))) {
            // line 796
            echo "
                    <!--noindex-->

                ";
        }
        // line 800
        echo "
                <!-- product details and products promo -->
                <div class=\"product_info\">
                    <div class=\"product_page_pad cols_container\">
                        <!-- products details col -->
                        <section class=\"product_details main_col\">
                            <div class=\"main_col_pad\">
                                <article itemprop=\"description\" class=\"def_style\">
                                    ";
        // line 808
        echo $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("description" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
        echo "
                                </article>
                            </div>
                        </section>
                        <!-- /products details -->

                        <!-- products promo col -->
                        <div class=\"side_col\">
                            <div class=\"side_col_pad\">

                                ";
        // line 818
        if (twig_length_filter($this->env, (isset($context["accessories"]) ? $context["accessories"] : null))) {
            // line 819
            echo "
                                    <section class=\"showcase_compact_box products_grid row_three\">
                                        <h2>Аксессуары для ";
            // line 821
            echo twig_escape_filter($this->env, (isset($context["captionCaseGenitive"]) ? $context["captionCaseGenitive"] : null), "html", null, true);
            echo "</h2>
                                        <div class=\"products_grid_line grid_container\">

                                            ";
            // line 825
            echo "                                            ";
            $context["productItemContainerClass"] = "product_min";
            // line 826
            echo "                                            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["accessories"]) ? $context["accessories"] : null));
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
            foreach ($context['_seq'] as $context["i"] => $context["product"]) {
                // line 827
                echo "
                                                ";
                // line 828
                $context["product"] = $this->getAttribute($context["product"], "targetObject", array());
                // line 829
                echo "                                                ";
                $this->displayBlock("product", $context, $blocks);
                echo "

                                            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['i'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 832
            echo "
                                        </div>

                                            ";
            // line 835
            if ((twig_length_filter($this->env, (isset($context["accessories"]) ? $context["accessories"] : null)) > 3)) {
                // line 836
                echo "
                                            <span class=\"showcase_compact_nav prev disabled\">";
                // line 837
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next's", array(), "frontend"), "html", null, true);
                echo "</span>
                                            <span class=\"showcase_compact_nav next disabled\">";
                // line 838
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Prev's", array(), "frontend"), "html", null, true);
                echo "</span>

                                        ";
            }
            // line 841
            echo "
                                    </section>

                                ";
        }
        // line 845
        echo "
                                ";
        // line 846
        if (twig_length_filter($this->env, (isset($context["series"]) ? $context["series"] : null))) {
            // line 847
            echo "
                                    <section class=\"showcase_compact_box products_grid row_three\">
                                        <h2>";
            // line 849
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("From the series", array(), "frontend"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "serie", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo "</h2>
                                        <div class=\"products_grid_line grid_container\">

                                            ";
            // line 853
            echo "                                            ";
            $context["productItemContainerClass"] = "product_min";
            // line 854
            echo "                                            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["series"]) ? $context["series"] : null));
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
            foreach ($context['_seq'] as $context["i"] => $context["product"]) {
                // line 855
                echo "
                                                ";
                // line 856
                $this->displayBlock("product", $context, $blocks);
                echo "

                                            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['i'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 859
            echo "
                                        </div>

                                        ";
            // line 862
            if ((twig_length_filter($this->env, (isset($context["series"]) ? $context["series"] : null)) > 3)) {
                // line 863
                echo "
                                            <span class=\"showcase_compact_nav prev disabled\">";
                // line 864
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next's", array(), "frontend"), "html", null, true);
                echo "</span>
                                            <span class=\"showcase_compact_nav next disabled\">";
                // line 865
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Prev's", array(), "frontend"), "html", null, true);
                echo "</span>

                                        ";
            }
            // line 868
            echo "
                                    </section>


                                ";
        }
        // line 873
        echo "
                                <!-- /similar products -->

                                <!-- similar products -->
                                ";
        // line 877
        if (twig_length_filter($this->env, (isset($context["alternative"]) ? $context["alternative"] : null))) {
            // line 878
            echo "
                                    <section class=\"showcase_compact_box products_grid row_three\">
                                        <h2>";
            // line 880
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Similar toys", array(), "frontend"), "html", null, true);
            echo "</h2>
                                        <div class=\"products_grid_line grid_container\">

                                            ";
            // line 884
            echo "                                            ";
            $context["productItemContainerClass"] = "product_min";
            // line 885
            echo "                                            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["alternative"]) ? $context["alternative"] : null));
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
            foreach ($context['_seq'] as $context["i"] => $context["product"]) {
                // line 886
                echo "
                                                ";
                // line 887
                $context["product"] = $this->getAttribute($context["product"], "targetObject", array());
                // line 888
                echo "                                                ";
                $this->displayBlock("product", $context, $blocks);
                echo "

                                            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['i'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 891
            echo "
                                        </div>

                                        ";
            // line 894
            if ((twig_length_filter($this->env, (isset($context["alternative"]) ? $context["alternative"] : null)) > 3)) {
                // line 895
                echo "
                                            <span class=\"showcase_compact_nav prev disabled\">";
                // line 896
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next's", array(), "frontend"), "html", null, true);
                echo "</span>
                                            <span class=\"showcase_compact_nav next disabled\">";
                // line 897
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Prev's", array(), "frontend"), "html", null, true);
                echo "</span>

                                        ";
            }
            // line 900
            echo "
                                    </section>

                                ";
        }
        // line 904
        echo "                                <!-- /similar products -->

                            </div>
                        </div>
                        <!-- /products promo col -->

                    </div>
                </div>
                <!-- /product details and products promo -->
                ";
        // line 913
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "remoteVideos", array()))) {
            // line 914
            echo "                    <div class=\"product_info\">
                        <div class=\"product_page_pad cols_container\">
                            <div class=\"main_col_pad\">
                                <h3>Видео обзор ";
            // line 917
            echo twig_escape_filter($this->env, (isset($context["captionCaseGenitive"]) ? $context["captionCaseGenitive"] : null), "html", null, true);
            echo "</h3>
                                ";
            // line 918
            $context["remoteVideoCounter"] = 1;
            // line 919
            echo "                                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "remoteVideos", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["remoteVideo"]) {
                // line 920
                echo "                                    ";
                if (((isset($context["remoteVideoCounter"]) ? $context["remoteVideoCounter"] : null) <= 3)) {
                    // line 921
                    echo "                                    ";
                    $context["remoteVideoCaption"] = $this->getAttribute($context["remoteVideo"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
                    // line 922
                    echo "                                        <div class=\"product_video_wr\" ";
                    if ((isset($context["remoteVideoCaption"]) ? $context["remoteVideoCaption"] : null)) {
                        echo "title=\"";
                        echo twig_escape_filter($this->env, (isset($context["remoteVideoCaption"]) ? $context["remoteVideoCaption"] : null), "html", null, true);
                        echo "\"";
                    }
                    echo ">
                                            <iframe width=\"300\" height=\"210\" src=\"";
                    // line 923
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["remoteVideo"], "videoHosting", array()), "playerUri", array()), "html", null, true);
                    echo twig_escape_filter($this->env, $this->getAttribute($context["remoteVideo"], "code", array()), "html", null, true);
                    echo "\" frameborder=\"0\"></iframe>
                                        </div>
                                    ";
                }
                // line 926
                echo "                                    ";
                $context["remoteVideoCounter"] = ((isset($context["remoteVideoCounter"]) ? $context["remoteVideoCounter"] : null) + 1);
                // line 927
                echo "                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['remoteVideo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 928
            echo "                            </div>
                        </div>
                    </div>
                ";
        }
        // line 932
        echo "                <div class=\"product_spec_info product_info\">
                    <div class=\"padding_content\">
                        <div class=\"cols_container\">

                            ";
        // line 936
        if ($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : null), "skills", array(), "array", true, true)) {
            // line 937
            echo "                                ";
            // line 961
            echo "
                                <div class=\"product_skills grid_item\">
                                    <h3>";
            // line 963
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("This toy will help your child to develop skills", array(), "frontend"), "html", null, true);
            echo "</h3>
                                    <ul class=\"product_skills_list\">

                                        ";
            // line 966
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : null), "skills", array(), "array"));
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                // line 967
                echo "                                            <li class=\"product_skill skill_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "name", array()), "html", null, true);
                echo "\">
                                                ";
                // line 968
                if ((($this->getAttribute($context["data"], "articleKey", array()) && $this->getAttribute((isset($context["articles"]) ? $context["articles"] : null), $this->getAttribute($context["data"], "articleKey", array()), array(), "array", true, true)) && $this->getAttribute((isset($context["articles"]) ? $context["articles"] : null), $this->getAttribute($context["data"], "articleKey", array()), array(), "array"))) {
                    // line 969
                    echo "                                                    ";
                    $context["curArticle"] = $this->getAttribute((isset($context["articles"]) ? $context["articles"] : null), $this->getAttribute($context["data"], "articleKey", array()), array(), "array");
                    // line 970
                    echo "                                                    <h4>
                                                        <!--noindex-->
                                                            <a rel=\"nofollow\" href=\"";
                    // line 972
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_faq_article", array("articleSlug" => $this->getAttribute((isset($context["curArticle"]) ? $context["curArticle"] : null), "slug", array()), "categorySlug" => $this->getAttribute($this->getAttribute((isset($context["curArticle"]) ? $context["curArticle"] : null), "category", array()), "slug", array()))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "value", array()), "html", null, true);
                    echo "</a>
                                                        <!--/noindex-->
                                                    </h4>
                                                    ";
                } else {
                    // line 976
                    echo "                                                        <h4>";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "value", array()), "html", null, true);
                    echo "</h4>
                                                ";
                }
                // line 978
                echo "
                                                ";
                // line 979
                if ($this->getAttribute($context["data"], "shortDescription", array())) {
                    // line 980
                    echo "
                                                    <p>";
                    // line 981
                    echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "shortDescription", array()), "html", null, true);
                    echo "</p>

                                                ";
                }
                // line 984
                echo "
                                                <span class=\"skill_icon\">&nbsp;</span>
                                            </li>

                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 989
            echo "
                                    </ul>
                                </div>


                            ";
        }
        // line 995
        echo "
                            <div class=\"product_techinfo grid_item\">

                                ";
        // line 998
        if (((((((isset($context["properties"]) ? $context["properties"] : null) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "countryOfOrigin", array())) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "warrantyMonths", array())) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "netWeight", array())) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "grossWeight", array())) || (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "heightOfProduct", array()) && $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "widthOfProduct", array())) && $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "lengthOfProduct", array())))) {
            // line 999
            echo "
                                    <h3>";
            // line 1000
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Characteristics", array(), "frontend"), "html", null, true);
            echo "</h3>
                                    <ul class=\"list_simple\">
                                        ";
            // line 1002
            if ((isset($context["properties"]) ? $context["properties"] : null)) {
                // line 1003
                echo "                                            ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["properties"]) ? $context["properties"] : null));
                foreach ($context['_seq'] as $context["name"] => $context["property"]) {
                    // line 1004
                    echo "                                                ";
                    if (($this->getAttribute($context["property"], "values", array()) || $this->getAttribute($context["property"], "value", array()))) {
                        // line 1005
                        echo "
                                                    <li><strong>";
                        // line 1006
                        echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "caption", array()), "html", null, true);
                        echo ": </strong>

                                                        ";
                        // line 1008
                        if ((($context["name"] && ($context["name"] == "brand")) && $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "brand", array()))) {
                            // line 1009
                            echo "
                                                            <a href=\"";
                            // line 1010
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand_first_page", array("slug" => $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "brand", array()), "slug", array()))), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute($context["property"], "values", array()), ", "), "html", null, true);
                            echo "</a>

                                                        ";
                        } else {
                            // line 1013
                            echo "                                                            ";
                            if ((twig_length_filter($this->env, $this->getAttribute($context["property"], "values", array())) > 0)) {
                                // line 1014
                                echo "                                                                ";
                                echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute($context["property"], "values", array()), ", "), "html", null, true);
                                echo "
                                                            ";
                            } else {
                                // line 1016
                                echo "                                                                ";
                                if (($this->getAttribute($context["property"], "type", array()) == "input")) {
                                    // line 1017
                                    echo "                                                                    ";
                                    echo twig_escape_filter($this->env, $this->env->getExtension('format_extension')->numberFormatFunction($this->getAttribute($context["property"], "value", array()), true, 2, ",", ""), "html", null, true);
                                    echo "
                                                                ";
                                } else {
                                    // line 1019
                                    echo "                                                                    ";
                                    echo $this->getAttribute($context["property"], "value", array());
                                    echo "
                                                                ";
                                }
                                // line 1021
                                echo "                                                            ";
                            }
                            // line 1022
                            echo "                                                            ";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "unit", array()), "html", null, true);
                            echo "

                                                        ";
                        }
                        // line 1025
                        echo "
                                                    </li>

                                                ";
                    }
                    // line 1029
                    echo "                                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['name'], $context['property'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 1030
                echo "                                        ";
            }
            // line 1031
            echo "
                                        ";
            // line 1032
            if ((($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "heightOfProduct", array()) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "widthOfProduct", array())) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "lengthOfProduct", array()))) {
                // line 1033
                echo "
                                            <li><strong>";
                // line 1034
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Size", array(), "frontend"), "html", null, true);
                echo ": </strong>";
                echo twig_escape_filter($this->env, $this->env->getExtension('format_extension')->dimensionsFormatFunction($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "heightOfProduct", array()), $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "widthOfProduct", array()), $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "lengthOfProduct", array())), "html", null, true);
                echo "</li>

                                        ";
            }
            // line 1037
            echo "
                                        ";
            // line 1038
            if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "netWeight", array())) {
                // line 1039
                echo "
                                            <li><strong>";
                // line 1040
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Net weight", array(), "frontend"), "html", null, true);
                echo ": </strong>";
                echo twig_escape_filter($this->env, $this->env->getExtension('format_extension')->weightFormatFunction($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "netWeight", array()), $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "isNetWeightInGm", array())), "html", null, true);
                echo "</li>

                                        ";
            }
            // line 1043
            echo "
                                        ";
            // line 1044
            if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "grossWeight", array())) {
                // line 1045
                echo "
                                            <li><strong>";
                // line 1046
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Gross weight", array(), "frontend"), "html", null, true);
                echo ": </strong>";
                echo twig_escape_filter($this->env, $this->env->getExtension('format_extension')->weightFormatFunction($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "grossWeight", array()), $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "isNetWeightInGm", array())), "html", null, true);
                echo "</li>

                                        ";
            }
            // line 1049
            echo "
                                        ";
            // line 1050
            if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "warrantyMonths", array())) {
                // line 1051
                echo "
                                            <li><strong>";
                // line 1052
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Гарантия", array(), "frontend"), "html", null, true);
                echo ": </strong>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "warrantyMonths", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "warrantyMonths", array()), array(0 => "месяц", 1 => "месяца", 2 => "месяцев")), "html", null, true);
                echo "</li>

                                        ";
            }
            // line 1055
            echo "                                        ";
            if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "countryOfOrigin", array())) {
                // line 1056
                echo "                                            <li><strong>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Страна происхождения", array(), "frontend"), "html", null, true);
                echo ": </strong> ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "countryOfOrigin", array()), "getCaption", array(0 => "ru"), "method"), "html", null, true);
                echo "</li>
                                        ";
            }
            // line 1058
            echo "                                        ";
            if ($this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "instruction", array()), "count", array())) {
                // line 1059
                echo "                                            ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "instruction", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                    // line 1060
                    echo "                                                <li>
                                                    <a href=\"";
                    // line 1061
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["file"])), "html", null, true);
                    echo "\" target=\"_blank\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["file"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                    echo "</a>
                                                </li>
                                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 1064
                echo "                                        ";
            }
            // line 1065
            echo "
                                    </ul>

                                ";
        }
        // line 1069
        echo "                                ";
        // line 1085
        echo "
                            </div>

                            ";
        // line 1088
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("complectation" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) {
            // line 1089
            echo "
                                <div class=\"product_techinfo grid_item list_simple_format\">
                                    <h3>Комплектация ";
            // line 1091
            echo twig_escape_filter($this->env, $this->env->getExtension('language_switcher_extension')->getCaseByKey($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("captionCase" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "genitive"), "html", null, true);
            echo "</h3>
                                    ";
            // line 1092
            echo $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("complectation" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
            echo "
                                </div>

                            ";
        }
        // line 1096
        echo "
                        </div>
                    </div>
                </div>
                ";
        // line 1100
        echo " 
                ";
        // line 1101
        if (($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : null), "iso-sings", array(), "array", true, true) && twig_length_filter($this->env, $this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : null), "iso-sings", array(), "array")))) {
            // line 1102
            echo "                <div class=\"product_info\">
                    <div class=\"padding_content\">
\t\t\t<div class=\"main_col_pad\">
                            <h2>Свойства товара</h2>
                            <ul class=\"insignia_list\">
                                ";
            // line 1107
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : null), "iso-sings", array(), "array"));
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                // line 1108
                echo "                                    ";
                if ($this->getAttribute($context["data"], "extraKey3", array())) {
                    // line 1109
                    echo "                                    <div class=\"recycling_icon\">
                                        <ins class=\"insignia-icon-recycling-codes\">&nbsp;</ins>
                                        <div class=\"recycling_icon_num\">
                                            <span class=\"recycling_icon_num_text\">";
                    // line 1112
                    echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "extraKey3", array()), "html", null, true);
                    echo "</span>
                                        </div>
                                        ";
                    // line 1114
                    if (($this->getAttribute($context["data"], "value", array()) && !twig_in_filter("no-title", $this->getAttribute($context["data"], "name", array())))) {
                        // line 1115
                        echo "                                        <div class=\"recycling_icon_desc\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "value", array()), "html", null, true);
                        echo "</div>
                                        ";
                    }
                    // line 1117
                    echo "                                    </div>
                                    ";
                } else {
                    // line 1119
                    echo "                                        <li class=\"insignia_item\">
                                            <ins class=\"";
                    // line 1120
                    echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "name", array()), "html", null, true);
                    echo "\">&nbsp;</ins>
                                            ";
                    // line 1121
                    if (($this->getAttribute($context["data"], "value", array()) && !twig_in_filter("no-title", $this->getAttribute($context["data"], "name", array())))) {
                        // line 1122
                        echo "                                                <div class=\"insignia_item_text\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "value", array()), "html", null, true);
                        echo "</div>
                                            ";
                    }
                    // line 1124
                    echo "                                        </li>
                                    ";
                }
                // line 1126
                echo "                                    
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 1128
            echo "                            </ul>
\t\t\t</div>
                    </div>
                </div>
                ";
        }
        // line 1132
        echo "            
                ";
        // line 1134
        echo "                ";
        if (($this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "modificationUnion", array()), "general", array()) && (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "modificationUnion", array()) && $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "modificationUnion", array()), "general", array())) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "modificationUnion", array()), "general", array()), "id", array()) != $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "id", array()))))) {
            // line 1135
            echo "
                    <!--/noindex-->

                ";
        }
        // line 1139
        echo "
            </section>
            <!-- product opinions & discussions -->
            ";
        // line 1142
        $this->displayBlock("reviews_layout", $context, $blocks);
        echo "
            <!-- /product reviews & discussions -->


            <!-- last viewed showcase -->
            ";
        // line 1147
        if ((isset($context["recentlyViewed"]) ? $context["recentlyViewed"] : null)) {
            // line 1148
            echo "
                <div class=\"showcase_lastviewed showcase_horizontal showcase_box\">
                    <div class=\"product_page_pad products_grid row_five\">
                        <h2>";
            // line 1151
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Recently viewed", array(), "frontend"), "html", null, true);
            echo "</h2>
                        <div class=\"showcase_container\">

                            ";
            // line 1154
            if ((twig_length_filter($this->env, (isset($context["recentlyViewed"]) ? $context["recentlyViewed"] : null)) > 7)) {
                // line 1155
                echo "
                                <span class=\"showcase_nav prev disabled\"><span class=\"showcase_nav_btn\">";
                // line 1156
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next's", array(), "frontend"), "html", null, true);
                echo "</span></span>
                                <span class=\"showcase_nav next disabled\"><span class=\"showcase_nav_btn\">";
                // line 1157
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Prev's", array(), "frontend"), "html", null, true);
                echo "</span></span>

                            ";
            }
            // line 1160
            echo "
                            <div class=\"products_wrapper\">
                                <div class=\"products_grid_line grid_container\">

                                    ";
            // line 1165
            echo "                                    ";
            $context["productItemContainerClass"] = "product_min";
            // line 1166
            echo "                                    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["recentlyViewed"]) ? $context["recentlyViewed"] : null));
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
            foreach ($context['_seq'] as $context["i"] => $context["product"]) {
                // line 1167
                echo "
                                        ";
                // line 1168
                $this->displayBlock("product", $context, $blocks);
                echo "

                                    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['i'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 1171
            echo "
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            ";
        }
        // line 1179
        echo "            <!-- /last viewed showcase -->

        </div>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Product:product.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  2534 => 1179,  2524 => 1171,  2507 => 1168,  2504 => 1167,  2486 => 1166,  2483 => 1165,  2477 => 1160,  2471 => 1157,  2467 => 1156,  2464 => 1155,  2462 => 1154,  2456 => 1151,  2451 => 1148,  2449 => 1147,  2441 => 1142,  2436 => 1139,  2430 => 1135,  2427 => 1134,  2424 => 1132,  2417 => 1128,  2410 => 1126,  2406 => 1124,  2400 => 1122,  2398 => 1121,  2394 => 1120,  2391 => 1119,  2387 => 1117,  2381 => 1115,  2379 => 1114,  2374 => 1112,  2369 => 1109,  2366 => 1108,  2362 => 1107,  2355 => 1102,  2353 => 1101,  2350 => 1100,  2344 => 1096,  2337 => 1092,  2333 => 1091,  2329 => 1089,  2327 => 1088,  2322 => 1085,  2320 => 1069,  2314 => 1065,  2311 => 1064,  2300 => 1061,  2297 => 1060,  2292 => 1059,  2289 => 1058,  2281 => 1056,  2278 => 1055,  2268 => 1052,  2265 => 1051,  2263 => 1050,  2260 => 1049,  2252 => 1046,  2249 => 1045,  2247 => 1044,  2244 => 1043,  2236 => 1040,  2233 => 1039,  2231 => 1038,  2228 => 1037,  2220 => 1034,  2217 => 1033,  2215 => 1032,  2212 => 1031,  2209 => 1030,  2203 => 1029,  2197 => 1025,  2190 => 1022,  2187 => 1021,  2181 => 1019,  2175 => 1017,  2172 => 1016,  2166 => 1014,  2163 => 1013,  2155 => 1010,  2152 => 1009,  2150 => 1008,  2145 => 1006,  2142 => 1005,  2139 => 1004,  2134 => 1003,  2132 => 1002,  2127 => 1000,  2124 => 999,  2122 => 998,  2117 => 995,  2109 => 989,  2099 => 984,  2093 => 981,  2090 => 980,  2088 => 979,  2085 => 978,  2079 => 976,  2070 => 972,  2066 => 970,  2063 => 969,  2061 => 968,  2056 => 967,  2052 => 966,  2046 => 963,  2042 => 961,  2040 => 937,  2038 => 936,  2032 => 932,  2026 => 928,  2020 => 927,  2017 => 926,  2010 => 923,  2001 => 922,  1998 => 921,  1995 => 920,  1990 => 919,  1988 => 918,  1984 => 917,  1979 => 914,  1977 => 913,  1966 => 904,  1960 => 900,  1954 => 897,  1950 => 896,  1947 => 895,  1945 => 894,  1940 => 891,  1922 => 888,  1920 => 887,  1917 => 886,  1899 => 885,  1896 => 884,  1890 => 880,  1886 => 878,  1884 => 877,  1878 => 873,  1871 => 868,  1865 => 865,  1861 => 864,  1858 => 863,  1856 => 862,  1851 => 859,  1834 => 856,  1831 => 855,  1813 => 854,  1810 => 853,  1802 => 849,  1798 => 847,  1796 => 846,  1793 => 845,  1787 => 841,  1781 => 838,  1777 => 837,  1774 => 836,  1772 => 835,  1767 => 832,  1749 => 829,  1747 => 828,  1744 => 827,  1726 => 826,  1723 => 825,  1717 => 821,  1713 => 819,  1711 => 818,  1698 => 808,  1688 => 800,  1682 => 796,  1680 => 795,  1666 => 783,  1658 => 772,  1650 => 768,  1645 => 766,  1642 => 765,  1638 => 763,  1636 => 762,  1632 => 760,  1628 => 758,  1626 => 757,  1622 => 756,  1618 => 755,  1614 => 754,  1610 => 753,  1604 => 749,  1601 => 748,  1596 => 712,  1588 => 682,  1582 => 681,  1579 => 680,  1577 => 679,  1574 => 678,  1568 => 674,  1562 => 671,  1558 => 670,  1555 => 669,  1553 => 668,  1548 => 665,  1530 => 662,  1527 => 661,  1509 => 660,  1506 => 659,  1500 => 655,  1496 => 653,  1494 => 652,  1487 => 647,  1470 => 645,  1462 => 644,  1450 => 642,  1445 => 639,  1439 => 638,  1436 => 637,  1433 => 636,  1427 => 632,  1425 => 631,  1421 => 629,  1413 => 628,  1405 => 627,  1402 => 626,  1398 => 624,  1385 => 619,  1381 => 617,  1379 => 606,  1372 => 601,  1369 => 597,  1367 => 595,  1360 => 588,  1357 => 587,  1354 => 586,  1350 => 584,  1338 => 559,  1333 => 558,  1329 => 557,  1320 => 553,  1312 => 549,  1304 => 547,  1300 => 546,  1295 => 545,  1291 => 544,  1285 => 541,  1281 => 540,  1274 => 536,  1269 => 534,  1263 => 531,  1259 => 530,  1253 => 527,  1249 => 526,  1243 => 523,  1239 => 522,  1236 => 521,  1228 => 516,  1222 => 513,  1219 => 512,  1216 => 511,  1214 => 510,  1205 => 503,  1202 => 502,  1200 => 501,  1197 => 500,  1195 => 499,  1191 => 497,  1187 => 496,  1182 => 495,  1177 => 494,  1173 => 492,  1171 => 491,  1169 => 490,  1165 => 489,  1161 => 488,  1158 => 487,  1155 => 486,  1153 => 485,  1150 => 484,  1148 => 483,  1141 => 481,  1138 => 480,  1130 => 477,  1127 => 476,  1125 => 475,  1118 => 471,  1113 => 468,  1107 => 464,  1100 => 459,  1092 => 457,  1082 => 456,  1074 => 455,  1072 => 451,  1067 => 450,  1057 => 446,  1054 => 445,  1033 => 442,  1031 => 438,  1026 => 437,  1019 => 434,  1017 => 433,  1014 => 430,  1010 => 428,  1008 => 427,  1005 => 426,  998 => 425,  995 => 424,  989 => 423,  987 => 422,  983 => 420,  977 => 417,  973 => 415,  969 => 409,  954 => 406,  951 => 405,  947 => 404,  941 => 401,  937 => 399,  935 => 398,  932 => 397,  925 => 392,  904 => 389,  901 => 388,  897 => 387,  891 => 384,  887 => 382,  885 => 381,  880 => 378,  878 => 377,  871 => 372,  865 => 368,  858 => 364,  854 => 363,  850 => 361,  848 => 360,  845 => 359,  838 => 355,  835 => 354,  824 => 351,  821 => 350,  817 => 349,  812 => 346,  810 => 345,  807 => 344,  800 => 340,  797 => 339,  788 => 336,  785 => 335,  781 => 334,  774 => 332,  771 => 331,  768 => 330,  765 => 329,  762 => 328,  759 => 327,  757 => 326,  754 => 325,  751 => 324,  749 => 323,  744 => 320,  742 => 319,  739 => 318,  733 => 315,  730 => 314,  728 => 313,  716 => 303,  707 => 296,  697 => 292,  692 => 291,  687 => 290,  683 => 289,  680 => 288,  673 => 286,  667 => 282,  663 => 280,  661 => 279,  648 => 277,  645 => 276,  639 => 274,  637 => 273,  632 => 271,  629 => 270,  626 => 269,  623 => 268,  620 => 267,  617 => 266,  615 => 265,  612 => 264,  610 => 263,  607 => 262,  603 => 261,  597 => 257,  591 => 254,  587 => 253,  584 => 252,  582 => 251,  577 => 248,  575 => 247,  572 => 246,  567 => 242,  561 => 238,  559 => 237,  555 => 235,  549 => 234,  546 => 232,  544 => 231,  538 => 230,  535 => 229,  529 => 226,  526 => 225,  524 => 224,  515 => 220,  509 => 216,  507 => 215,  504 => 214,  501 => 213,  498 => 212,  495 => 211,  492 => 210,  489 => 209,  486 => 208,  483 => 207,  480 => 206,  477 => 205,  475 => 204,  468 => 200,  465 => 199,  463 => 198,  458 => 197,  456 => 196,  449 => 191,  437 => 186,  431 => 184,  427 => 181,  423 => 180,  419 => 178,  417 => 177,  412 => 174,  404 => 167,  402 => 166,  396 => 165,  394 => 163,  390 => 160,  383 => 157,  378 => 153,  376 => 151,  370 => 145,  361 => 139,  358 => 138,  347 => 135,  344 => 134,  340 => 133,  334 => 129,  332 => 128,  329 => 127,  326 => 126,  322 => 125,  319 => 124,  314 => 121,  312 => 120,  310 => 118,  308 => 117,  306 => 116,  303 => 114,  265 => 112,  261 => 104,  258 => 103,  254 => 98,  248 => 95,  244 => 93,  241 => 92,  227 => 90,  223 => 89,  218 => 87,  214 => 86,  210 => 85,  206 => 84,  203 => 83,  201 => 82,  197 => 81,  194 => 80,  191 => 79,  184 => 75,  181 => 74,  179 => 72,  159 => 70,  154 => 65,  151 => 64,  146 => 61,  144 => 56,  139 => 53,  136 => 52,  133 => 51,  115 => 46,  112 => 44,  110 => 43,  108 => 42,  105 => 41,  98 => 36,  95 => 34,  93 => 33,  91 => 32,  88 => 31,  80 => 26,  77 => 24,  75 => 23,  73 => 22,  70 => 21,  65 => 20,  63 => 19,  61 => 18,  59 => 17,  57 => 16,  55 => 15,  53 => 14,  21 => 12,  14 => 11,);
    }
}
