<?php

/* CoreProductBundle:Product:product.html.twig */
class __TwigTemplate_7b1a294bd3465ea2b41839c63af21dfb439e970a7f9a2f71c9761ba7832b8c6e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 9
        try {
            $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(9);

            throw $e;
        }

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
        // line 9
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
        // line 9
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
        if (((isset($context["mainImg"]) ? $context["mainImg"] : null) &&  !(((($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : null), "width", array()) >= 1000) || ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : null), "height", array()) >= 1000)) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : null), "height", array()) >= 410)) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : null), "width", array()) >= 650)))) {
            echo " hidden";
        }
        echo "\">&nbsp;</ins>

                                    <span class=\"img-loader\"></span>

                                    ";
        // line 224
        if (( !(isset($context["filesTotalCount"]) ? $context["filesTotalCount"] : null) && (((isset($context["mainImg"]) ? $context["mainImg"] : null) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : null), "height", array()) >= 500)) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : null), "width", array()) >= 500)))) {
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
        if ( !$this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "images", array()), "preview", "100x100_")) {
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
        if ((( !(isset($context["filesTotalCount"]) ? $context["filesTotalCount"] : null) && (isset($context["mainImg"]) ? $context["mainImg"] : null)) && (($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : null), "height", array()) >= 500) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : null), "width", array()) >= 500)))) {
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
        if ( !twig_test_empty((isset($context["extraProperties"]) ? $context["extraProperties"] : null))) {
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
                if ((twig_slice($this->env, (isset($context["age"]) ? $context["age"] : null),  -1) == 1)) {
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
                echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction(twig_slice($this->env, (isset($context["age"]) ? $context["age"] : null),  -1), (isset($context["ageString"]) ? $context["ageString"] : null)), "html", null, true);
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
        if (( !twig_test_empty((isset($context["modsData"]) ? $context["modsData"] : null)) && ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "AvailabilityQuantity", array()) > 0))) {
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
                if ( !$this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "quantityOfPieces", array())) {
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
                        if ( !$this->getAttribute($this->getAttribute($context["qa"], "targetObject", array()), "quantityOfPieces", array())) {
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
        if ( !$this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "isDiscontinued", array())) {
            // line 484
            echo "
                                            ";
            // line 485
            if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "orderOnly", array()) &&  !$this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "OOPBQuantity", array()))) {
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
        if ( !$this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "isDiscontinued", array())) {
            // line 500
            echo "
                                            ";
            // line 501
            if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "orderOnly", array()) &&  !$this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "OOPBQuantity", array()))) {
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
                    if ( !$this->getAttribute((isset($context["confines"]) ? $context["confines"] : null), "canCreateOrder", array())) {
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
        } elseif ($this->getAttribute(        // line 635
(isset($context["currentProduct"]) ? $context["currentProduct"] : null), "orderOnly", array())) {
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
        return array (  2545 => 1179,  2535 => 1171,  2518 => 1168,  2515 => 1167,  2497 => 1166,  2494 => 1165,  2488 => 1160,  2482 => 1157,  2478 => 1156,  2475 => 1155,  2473 => 1154,  2467 => 1151,  2462 => 1148,  2460 => 1147,  2452 => 1142,  2447 => 1139,  2441 => 1135,  2438 => 1134,  2435 => 1132,  2428 => 1128,  2421 => 1126,  2417 => 1124,  2411 => 1122,  2409 => 1121,  2405 => 1120,  2402 => 1119,  2398 => 1117,  2392 => 1115,  2390 => 1114,  2385 => 1112,  2380 => 1109,  2377 => 1108,  2373 => 1107,  2366 => 1102,  2364 => 1101,  2361 => 1100,  2355 => 1096,  2348 => 1092,  2344 => 1091,  2340 => 1089,  2338 => 1088,  2333 => 1085,  2331 => 1069,  2325 => 1065,  2322 => 1064,  2311 => 1061,  2308 => 1060,  2303 => 1059,  2300 => 1058,  2292 => 1056,  2289 => 1055,  2279 => 1052,  2276 => 1051,  2274 => 1050,  2271 => 1049,  2263 => 1046,  2260 => 1045,  2258 => 1044,  2255 => 1043,  2247 => 1040,  2244 => 1039,  2242 => 1038,  2239 => 1037,  2231 => 1034,  2228 => 1033,  2226 => 1032,  2223 => 1031,  2220 => 1030,  2214 => 1029,  2208 => 1025,  2201 => 1022,  2198 => 1021,  2192 => 1019,  2186 => 1017,  2183 => 1016,  2177 => 1014,  2174 => 1013,  2166 => 1010,  2163 => 1009,  2161 => 1008,  2156 => 1006,  2153 => 1005,  2150 => 1004,  2145 => 1003,  2143 => 1002,  2138 => 1000,  2135 => 999,  2133 => 998,  2128 => 995,  2120 => 989,  2110 => 984,  2104 => 981,  2101 => 980,  2099 => 979,  2096 => 978,  2090 => 976,  2081 => 972,  2077 => 970,  2074 => 969,  2072 => 968,  2067 => 967,  2063 => 966,  2057 => 963,  2053 => 961,  2051 => 937,  2049 => 936,  2043 => 932,  2037 => 928,  2031 => 927,  2028 => 926,  2021 => 923,  2012 => 922,  2009 => 921,  2006 => 920,  2001 => 919,  1999 => 918,  1995 => 917,  1990 => 914,  1988 => 913,  1977 => 904,  1971 => 900,  1965 => 897,  1961 => 896,  1958 => 895,  1956 => 894,  1951 => 891,  1933 => 888,  1931 => 887,  1928 => 886,  1910 => 885,  1907 => 884,  1901 => 880,  1897 => 878,  1895 => 877,  1889 => 873,  1882 => 868,  1876 => 865,  1872 => 864,  1869 => 863,  1867 => 862,  1862 => 859,  1845 => 856,  1842 => 855,  1824 => 854,  1821 => 853,  1813 => 849,  1809 => 847,  1807 => 846,  1804 => 845,  1798 => 841,  1792 => 838,  1788 => 837,  1785 => 836,  1783 => 835,  1778 => 832,  1760 => 829,  1758 => 828,  1755 => 827,  1737 => 826,  1734 => 825,  1728 => 821,  1724 => 819,  1722 => 818,  1709 => 808,  1699 => 800,  1693 => 796,  1691 => 795,  1677 => 783,  1669 => 772,  1661 => 768,  1656 => 766,  1653 => 765,  1649 => 763,  1647 => 762,  1643 => 760,  1639 => 758,  1637 => 757,  1633 => 756,  1629 => 755,  1625 => 754,  1621 => 753,  1615 => 749,  1612 => 748,  1607 => 712,  1599 => 682,  1593 => 681,  1590 => 680,  1588 => 679,  1585 => 678,  1579 => 674,  1573 => 671,  1569 => 670,  1566 => 669,  1564 => 668,  1559 => 665,  1541 => 662,  1538 => 661,  1520 => 660,  1517 => 659,  1511 => 655,  1507 => 653,  1505 => 652,  1498 => 647,  1481 => 645,  1473 => 644,  1461 => 642,  1456 => 639,  1450 => 638,  1447 => 637,  1444 => 636,  1442 => 635,  1437 => 632,  1435 => 631,  1431 => 629,  1423 => 628,  1415 => 627,  1412 => 626,  1408 => 624,  1395 => 619,  1391 => 617,  1389 => 606,  1382 => 601,  1379 => 597,  1377 => 595,  1370 => 588,  1367 => 587,  1364 => 586,  1360 => 584,  1348 => 559,  1343 => 558,  1339 => 557,  1330 => 553,  1322 => 549,  1314 => 547,  1310 => 546,  1305 => 545,  1301 => 544,  1295 => 541,  1291 => 540,  1284 => 536,  1279 => 534,  1273 => 531,  1269 => 530,  1263 => 527,  1259 => 526,  1253 => 523,  1249 => 522,  1246 => 521,  1238 => 516,  1232 => 513,  1229 => 512,  1226 => 511,  1224 => 510,  1215 => 503,  1212 => 502,  1210 => 501,  1207 => 500,  1205 => 499,  1201 => 497,  1197 => 496,  1192 => 495,  1187 => 494,  1183 => 492,  1181 => 491,  1179 => 490,  1175 => 489,  1171 => 488,  1168 => 487,  1165 => 486,  1163 => 485,  1160 => 484,  1158 => 483,  1151 => 481,  1148 => 480,  1140 => 477,  1137 => 476,  1135 => 475,  1128 => 471,  1123 => 468,  1117 => 464,  1110 => 459,  1102 => 457,  1092 => 456,  1084 => 455,  1082 => 451,  1077 => 450,  1067 => 446,  1064 => 445,  1043 => 442,  1041 => 438,  1036 => 437,  1029 => 434,  1027 => 433,  1024 => 430,  1020 => 428,  1018 => 427,  1015 => 426,  1008 => 425,  1005 => 424,  999 => 423,  997 => 422,  993 => 420,  987 => 417,  983 => 415,  979 => 409,  964 => 406,  961 => 405,  957 => 404,  951 => 401,  947 => 399,  945 => 398,  942 => 397,  935 => 392,  914 => 389,  911 => 388,  907 => 387,  901 => 384,  897 => 382,  895 => 381,  890 => 378,  888 => 377,  881 => 372,  875 => 368,  868 => 364,  864 => 363,  860 => 361,  858 => 360,  855 => 359,  848 => 355,  845 => 354,  834 => 351,  831 => 350,  827 => 349,  822 => 346,  820 => 345,  817 => 344,  810 => 340,  807 => 339,  798 => 336,  795 => 335,  791 => 334,  784 => 332,  781 => 331,  778 => 330,  775 => 329,  772 => 328,  769 => 327,  767 => 326,  764 => 325,  761 => 324,  759 => 323,  754 => 320,  752 => 319,  749 => 318,  743 => 315,  740 => 314,  738 => 313,  726 => 303,  717 => 296,  707 => 292,  702 => 291,  697 => 290,  693 => 289,  690 => 288,  683 => 286,  677 => 282,  673 => 280,  671 => 279,  658 => 277,  655 => 276,  649 => 274,  647 => 273,  642 => 271,  639 => 270,  636 => 269,  633 => 268,  630 => 267,  627 => 266,  625 => 265,  622 => 264,  620 => 263,  617 => 262,  613 => 261,  607 => 257,  601 => 254,  597 => 253,  594 => 252,  592 => 251,  587 => 248,  585 => 247,  582 => 246,  577 => 242,  571 => 238,  569 => 237,  565 => 235,  559 => 234,  556 => 232,  554 => 231,  548 => 230,  545 => 229,  539 => 226,  536 => 225,  534 => 224,  525 => 220,  519 => 216,  517 => 215,  514 => 214,  511 => 213,  508 => 212,  505 => 211,  502 => 210,  499 => 209,  496 => 208,  493 => 207,  490 => 206,  487 => 205,  485 => 204,  478 => 200,  475 => 199,  473 => 198,  468 => 197,  466 => 196,  459 => 191,  447 => 186,  441 => 184,  437 => 181,  433 => 180,  429 => 178,  427 => 177,  422 => 174,  414 => 167,  412 => 166,  406 => 165,  404 => 163,  400 => 160,  393 => 157,  388 => 153,  386 => 151,  380 => 145,  371 => 139,  368 => 138,  357 => 135,  354 => 134,  350 => 133,  344 => 129,  342 => 128,  339 => 127,  336 => 126,  332 => 125,  329 => 124,  324 => 121,  322 => 120,  320 => 118,  318 => 117,  316 => 116,  313 => 114,  275 => 112,  271 => 104,  268 => 103,  264 => 98,  258 => 95,  254 => 93,  251 => 92,  237 => 90,  233 => 89,  228 => 87,  224 => 86,  220 => 85,  216 => 84,  213 => 83,  211 => 82,  207 => 81,  204 => 80,  201 => 79,  194 => 75,  191 => 74,  189 => 72,  169 => 70,  164 => 65,  161 => 64,  156 => 61,  154 => 56,  149 => 53,  146 => 52,  143 => 51,  125 => 46,  122 => 44,  120 => 43,  118 => 42,  115 => 41,  108 => 36,  105 => 34,  103 => 33,  101 => 32,  98 => 31,  90 => 26,  87 => 24,  85 => 23,  83 => 22,  80 => 21,  76 => 9,  74 => 20,  72 => 19,  70 => 18,  68 => 17,  66 => 16,  64 => 15,  62 => 14,  56 => 9,  29 => 12,  22 => 11,  11 => 9,);
    }
}
