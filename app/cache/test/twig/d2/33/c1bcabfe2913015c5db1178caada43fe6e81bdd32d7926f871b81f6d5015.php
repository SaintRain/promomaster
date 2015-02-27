<?php

/* CoreProductBundle:Product:product.html.twig */
class __TwigTemplate_d233c1bcabfe2913015c5db1178caada43fe6e81bdd32d7926f871b81f6d5015 extends Twig_Template
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
        $context["currentProductCaption"] = $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
        // line 15
        $context["captionCaseGenitive"] = $this->env->getExtension('language_switcher_extension')->getCaseByKey($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("captionCase" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "genitive");
        // line 16
        $context["captionCaseGenitive"] = ((twig_length_filter($this->env, (isset($context["captionCaseGenitive"]) ? $context["captionCaseGenitive"] : $this->getContext($context, "captionCaseGenitive")))) ? ((isset($context["captionCaseGenitive"]) ? $context["captionCaseGenitive"] : $this->getContext($context, "captionCaseGenitive"))) : ((isset($context["currentProductCaption"]) ? $context["currentProductCaption"] : $this->getContext($context, "currentProductCaption"))));
        // line 17
        $context["captionCaseAccusative"] = $this->env->getExtension('language_switcher_extension')->getCaseByKey($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("captionCase" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "accusative");
        // line 18
        $context["captionCaseAccusative"] = ((twig_length_filter($this->env, (isset($context["captionCaseAccusative"]) ? $context["captionCaseAccusative"] : $this->getContext($context, "captionCaseAccusative")))) ? ((isset($context["captionCaseAccusative"]) ? $context["captionCaseAccusative"] : $this->getContext($context, "captionCaseAccusative"))) : ((isset($context["currentProductCaption"]) ? $context["currentProductCaption"] : $this->getContext($context, "currentProductCaption"))));
        // line 19
        $context["captionCasePrepositional"] = $this->env->getExtension('language_switcher_extension')->getCaseByKey($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("captionCase" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "prepositional");
        // line 20
        $context["captionCasePrepositional"] = ((twig_length_filter($this->env, (isset($context["captionCasePrepositional"]) ? $context["captionCasePrepositional"] : $this->getContext($context, "captionCasePrepositional")))) ? ((isset($context["captionCasePrepositional"]) ? $context["captionCasePrepositional"] : $this->getContext($context, "captionCasePrepositional"))) : ((isset($context["currentProductCaption"]) ? $context["currentProductCaption"] : $this->getContext($context, "currentProductCaption"))));
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 21
    public function block_title($context, array $blocks = array())
    {
        // line 22
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html");
        } else {
            // line 25
            echo "Купить ";
            echo twig_escape_filter($this->env, (isset($context["captionCaseAccusative"]) ? $context["captionCaseAccusative"] : $this->getContext($context, "captionCaseAccusative")), "html", null, true);
            echo ", с доставкой по России.";
        }
    }

    // line 29
    public function block_meta_keywords($context, array $blocks = array())
    {
        // line 30
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html");
        } else {
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo ", купить, отзывы, описание, фотографии";
        }
    }

    // line 37
    public function block_meta_description($context, array $blocks = array())
    {
        // line 38
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html");
        } else {
            // line 41
            echo "Купить ";
            echo twig_escape_filter($this->env, (isset($context["captionCaseAccusative"]) ? $context["captionCaseAccusative"] : $this->getContext($context, "captionCaseAccusative")), "html", null, true);
            echo " в интернет-магазине с доставкой по России. Отзывы о ";
            echo twig_escape_filter($this->env, (isset($context["captionCasePrepositional"]) ? $context["captionCasePrepositional"] : $this->getContext($context, "captionCasePrepositional")), "html", null, true);
            echo ". ";
            echo twig_escape_filter($this->env, (isset($context["currentProductCaption"]) ? $context["currentProductCaption"] : $this->getContext($context, "currentProductCaption")), "html", null, true);
            echo " ";
            if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "orderOnly", array())) {
                echo "под заказ ";
            } else {
                echo "в наличии";
            }
            echo ".";
        }
    }

    // line 45
    public function block_seo($context, array $blocks = array())
    {
        // line 46
        echo "
    ";
        // line 47
        $this->displayParentBlock("seo", $context, $blocks);
        echo "

    ";
        // line 50
        echo "    ";
        // line 55
        echo "
";
    }

    // line 58
    public function block_css($context, array $blocks = array())
    {
        // line 59
        echo "    ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "19e1272_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_19e1272_0") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/product_details_jquery.fancybox_1.css");
            // line 64
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
            // asset "19e1272_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_19e1272_1") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/product_details_jquery.rating_2.css");
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
        } else {
            // asset "19e1272"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_19e1272") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/product_details.css");
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
        }
        unset($context["asset_url"]);
        // line 66
        echo "    ";
        // line 68
        echo "
    ";
        // line 69
        $this->displayParentBlock("css", $context, $blocks);
        echo "

";
    }

    // line 73
    public function block_js_head($context, array $blocks = array())
    {
        // line 74
        echo "
    ";
        // line 75
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
    ";
        // line 76
        if (((isset($context["userCity"]) ? $context["userCity"] : $this->getContext($context, "userCity")) && twig_length_filter($this->env, (isset($context["deliveryCompanies"]) ? $context["deliveryCompanies"] : $this->getContext($context, "deliveryCompanies"))))) {
            // line 77
            echo "        <script>
            settingsJS.routes['delivery_calculate'] = \"";
            // line 78
            echo $this->env->getExtension('routing')->getPath("delivery_product_calculate");
            echo "\";
            settingsJS.trans['delivery_calculate'] = \"";
            // line 79
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("delivery.brokenConnect", array(), "CoreDeliveryBundle"), "html", null, true);
            echo "\";
            settingsJS.trans['delivery_calculate_hide'] = \"";
            // line 80
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("delivery.hide", array(), "CoreDeliveryBundle"), "html", null, true);
            echo "\";
            settingsJS.trans['delivery_calculate_show'] = \"";
            // line 81
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("delivery.show", array(), "CoreDeliveryBundle"), "html", null, true);
            echo "\";
        </script>
    ";
            // line 83
            if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
                // asset "4f65755_0"
                $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f65755_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/frontend.delivery_frontend.delivery_1.js");
                // line 84
                echo "    <script src=\"";
                echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
                echo "\"></script>
    ";
            } else {
                // asset "4f65755"
                $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f65755") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/frontend.delivery.js");
                echo "    <script src=\"";
                echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
                echo "\"></script>
    ";
            }
            unset($context["asset_url"]);
            // line 86
            echo "    ";
        }
        // line 87
        echo "    <script>
        var google_tag_params = {
            ecomm_prodid: ";
        // line 89
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()), "html", null, true);
        echo ",
            ecomm_pagetype: 'product',
        };
        settingsJS.routes['core_pre_order_cost'] = \"";
        // line 92
        echo $this->env->getExtension('routing')->getPath("core_pre_order_cost");
        echo "\";
         ";
        // line 97
        echo "    </script>
    ";
        // line 98
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "3c2556b_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3c2556b_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/product_details_jquery.elevateZoom-3.0.8.min_1.js");
            // line 106
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "3c2556b_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3c2556b_1") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/product_details_jquery.fancybox.pack_2.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "3c2556b_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3c2556b_2") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/product_details_jquery.rating.pack_3.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "3c2556b_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3c2556b_3") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/product_details_frontend.product_4.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "3c2556b_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3c2556b_4") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/product_details_frontend.review_5.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "3c2556b"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3c2556b") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/product_details.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 108
        echo "
    ";
        // line 110
        echo "        ";
        // line 111
        echo "        ";
        // line 112
        echo "        ";
        // line 114
        echo "        ";
        // line 115
        echo "
";
    }

    // line 118
    public function block_content($context, array $blocks = array())
    {
        // line 119
        echo "    ";
        $context["imgSize"] = "140x140_";
        echo " ";
        // line 120
        echo "    ";
        ob_start();
        // line 121
        echo "        <!-- breadcrumbs -->
        ";
        // line 122
        if (array_key_exists("breadcrumbs", $context)) {
            // line 123
            echo "
            <div id=\"page_path\">
                <ul class=\"page_path_links\">

                    ";
            // line 127
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : $this->getContext($context, "breadcrumbs")));
            foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
                // line 128
                echo "
                        <li class=\"page_path_link\"><a href=\"";
                // line 129
                echo twig_escape_filter($this->env, $this->getAttribute($context["breadcrumb"], "href", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["breadcrumb"], "caption", array()), "html", null, true);
                echo "</a></li>

                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 132
            echo "
                    <li class=\"page_path_link\"><strong>";
            // line 133
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo "</strong></li>

                </ul>
            </div>

        ";
        }
        // line 139
        echo "        <!-- /breadcrumbs -->

        <div id=\"content\" class=\"product_page\" role=\"main\">

            <section itemscope itemtype=\"http://schema.org/Product\">";
        // line 145
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "brand", array())) {
            // line 147
            echo "<meta itemprop=\"brand\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "brand", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo "\" />";
        }
        // line 151
        echo "<meta itemprop=\"sku\" content=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "sku", array()), "html", null, true);
        echo "\" />
                <div class=\"product_header\">
                    <hgroup>
                        <h1 itemprop=\"name\">";
        // line 154
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
        echo "</h1>
                        <h2>";
        // line 157
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "brand", array())) {
            // line 159
            echo "Производитель: <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand_first_page", array("slug" => $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "brand", array()), "slug", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "brand", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo "</a>";
            // line 160
            if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "serie", array())) {
                // line 161
                echo ", Серия: <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand_series_first_page", array("slug" => $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "brand", array()), "slug", array()), "slugSeries" => $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "serie", array()), "slug", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "serie", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                echo "</a>";
            }
        }
        // line 168
        echo "</h2>
                    </hgroup>

                    ";
        // line 171
        if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "reviewsCount", array()) > 0)) {
            // line 172
            echo "
                        <div class=\"product_rating\" itemprop=\"aggregateRating\" itemscope itemtype=\"http://schema.org/AggregateRating\">
                            <meta itemprop=\"reviewCount\" content=\"";
            // line 174
            echo twig_escape_filter($this->env, (isset($context["reviewsTotal"]) ? $context["reviewsTotal"] : $this->getContext($context, "reviewsTotal")), "html", null, true);
            echo "\" />
                            <meta itemprop=\"ratingValue\" content=\"";
            // line 175
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "reviewsRating", array()), 1, ".", ""), "html", null, true);
            echo "\" />
                            ";
            // line 178
            echo "                            ";
            echo $this->env->getExtension('review_extension')->drawStarsByRatingFunction($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "reviewsRating", array()), "big");
            echo "

                            <span class=\"product_rating_count\">";
            // line 180
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "reviewsRating", array()), 1, ".", ""), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "reviewsCount", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "reviewsCount", array()), array(0 => "оценка", 1 => "оценки", 2 => "оценок")), "html", null, true);
            echo ")</span>
                            <span class=\"product_goto_review\"><span onclick=\"location.href = '#review-anchor-add'\" class=\"text_tgl\">Оставить отзыв</span></span>
                        </div>

                    ";
        }
        // line 185
        echo "
                </div>


                <!-- product overview & buy -->
                ";
        // line 190
        $context["order"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "core_order"), "method");
        // line 191
        echo "                <script>var orderJsonString = '";
        echo twig_jsonencode_filter((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")));
        echo "'</script>
                ";
        // line 192
        $context["isInCart"] = false;
        // line 193
        echo "
                <div class=\"product_overview\" ";
        // line 194
        echo $this->env->getExtension('fastedit_extension')->fastEditFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")));
        echo ">
                    <div class=\"product_page_pad cols_container product_gallery_wrap\">
                        <!-- product photos -->
                        <section class=\"product_photos main_col\">
                            ";
        // line 198
        $context["mainImg"] = ((twig_length_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "images", array()))) ? (twig_first($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "images", array()))) : (null));
        // line 199
        echo "                            ";
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "images", array())) && $this->getAttribute(twig_first($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "images", array())), ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))))) {
            // line 200
            echo "                                ";
            $context["alt"] = $this->getAttribute(twig_first($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "images", array())), ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
            // line 201
            echo "                            ";
        } else {
            // line 202
            echo "                                ";
            $context["alt"] = ("Фотография " . $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))));
            // line 203
            echo "                            ";
        }
        // line 204
        echo "
                            ";
        // line 205
        $context["filesTotalCount"] = ($this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "images", array()), "count", array()) + twig_length_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "remoteVideos", array())));
        // line 206
        echo "
                            <div class=\"main_col_pad\">
                                <div class=\"product_photo_view\">

                                    <ins class=\"loupe";
        // line 210
        if (((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")) && (!(((($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "width", array()) >= 1000) || ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "height", array()) >= 1000)) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "height", array()) >= 410)) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "width", array()) >= 650))))) {
            echo " hidden";
        }
        echo "\">&nbsp;</ins>

                                    <span class=\"img-loader\"></span>

                                    ";
        // line 214
        if (((!(isset($context["filesTotalCount"]) ? $context["filesTotalCount"] : $this->getContext($context, "filesTotalCount"))) && (((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "height", array()) >= 500)) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "width", array()) >= 500)))) {
            // line 215
            echo "
                                        <a class=\"fancybox-button\" rel=\"fancybox-button\" href=\"";
            // line 216
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "images", array()), "original", "uploaded_file_", true)), "html", null, true);
            echo "\">

                                    ";
        }
        // line 219
        echo "
                                    <img itemprop=\"image\" src=\"";
        // line 220
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "images", array()), "preview", "400x400_", true)), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, (isset($context["alt"]) ? $context["alt"] : $this->getContext($context, "alt")), "html", null, true);
        echo "\"
                                         ";
        // line 221
        if ((!$this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "images", array()), "preview", "100x100_"))) {
            // line 222
            echo "style=\"cursor: default;\"";
        }
        // line 224
        if (((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")) && (((($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "width", array()) >= 1000) || ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "height", array()) >= 1000)) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "height", array()) >= 410)) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "width", array()) >= 650)))) {
            echo "data-zoom-image=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "images", array()))), "html", null, true);
            echo "\"";
        }
        // line 225
        echo "                                         >

                                    ";
        // line 227
        if ((((!(isset($context["filesTotalCount"]) ? $context["filesTotalCount"] : $this->getContext($context, "filesTotalCount"))) && (isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg"))) && (($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "height", array()) >= 500) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "width", array()) >= 500)))) {
            // line 228
            echo "
                                        </a>

                                    ";
        }
        // line 232
        echo "
                                </div>

                                ";
        // line 236
        echo "
                                ";
        // line 237
        if (((isset($context["filesTotalCount"]) ? $context["filesTotalCount"] : $this->getContext($context, "filesTotalCount")) > 1)) {
            // line 238
            echo "
                                    <div class=\"product_gallery\">

                                        ";
            // line 241
            if (((isset($context["filesTotalCount"]) ? $context["filesTotalCount"] : $this->getContext($context, "filesTotalCount")) > 4)) {
                // line 242
                echo "
                                            <span class=\"product_gallery_nav prev disabled\"><span class=\"product_gallery_nav_btn\">";
                // line 243
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next's", array(), "frontend"), "html", null, true);
                echo "</span></span>
                                            <span class=\"product_gallery_nav next disabled\"><span class=\"product_gallery_nav_btn\">";
                // line 244
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Prev's", array(), "frontend"), "html", null, true);
                echo "</span></span>

                                        ";
            }
            // line 247
            echo "
                                        <div class=\"product_gallery_list\">
                                            <ul class=\"product_gallery_scroll\">

                                                ";
            // line 251
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "images", array()));
            foreach ($context['_seq'] as $context["i"] => $context["image"]) {
                // line 252
                echo "
                                                    ";
                // line 253
                if ($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["image"], "preview", "100x100_")) {
                    // line 254
                    echo "
                                                        ";
                    // line 255
                    if ($this->getAttribute($context["image"], ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
                        // line 256
                        echo "                                                            ";
                        $context["alt"] = $this->getAttribute($context["image"], ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
                        // line 257
                        echo "                                                        ";
                    } else {
                        // line 258
                        echo "                                                            ";
                        $context["alt"] = ((("Фотография №" . ($context["i"] + 1)) . " ") . $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))));
                        // line 259
                        echo "                                                        ";
                    }
                    // line 260
                    echo "
                                                        <li class=\"product_gallery_item\" data-src=\"";
                    // line 261
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["image"], "preview", "400x400_", true)), "html", null, true);
                    echo "\">

                                                            ";
                    // line 263
                    if ((($this->getAttribute($context["image"], "height", array()) >= 500) && ($this->getAttribute($context["image"], "width", array()) >= 500))) {
                        // line 264
                        echo "                                                                <a class=\"fancybox-button\" rel=\"fancybox-button\" href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["image"], "original", "uploaded_file_", true)), "html", null, true);
                        echo "\">
                                                            ";
                    }
                    // line 266
                    echo "
                                                                <img ";
                    // line 267
                    if ((((($this->getAttribute($context["image"], "width", array()) >= 1000) || ($this->getAttribute($context["image"], "height", array()) >= 1000)) && ($this->getAttribute($context["image"], "height", array()) >= 410)) && ($this->getAttribute($context["image"], "width", array()) >= 650))) {
                        echo "data-zoom-image=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["image"])), "html", null, true);
                        echo "\"";
                    }
                    echo " src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["image"], "preview", "100x100_", true)), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, (isset($context["alt"]) ? $context["alt"] : $this->getContext($context, "alt")), "html", null, true);
                    echo "\" />

                                                            ";
                    // line 269
                    if ((($this->getAttribute($context["image"], "height", array()) >= 500) && ($this->getAttribute($context["image"], "width", array()) >= 500))) {
                        // line 270
                        echo "                                                                </a>
                                                            ";
                    }
                    // line 272
                    echo "
                                                        </li>

                                                    ";
                }
                // line 276
                echo "
                                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['i'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 278
            echo "
                                                ";
            // line 279
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "remoteVideos", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["remoteVideo"]) {
                // line 280
                echo "                                                    <li class=\"product_gallery_item small_video\"  data-src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/icon-video.png"), "html", null, true);
                echo "\">
                                                        <a class=\"fancybox-button\" data-fancybox-type=\"iframe\" rel=\"fancybox-button\" href=\"";
                // line 281
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["remoteVideo"], "videoHosting", array()), "playerUri", array()), "html", null, true);
                echo twig_escape_filter($this->env, $this->getAttribute($context["remoteVideo"], "code", array()), "html", null, true);
                echo "\">
                                                            <i class=\"icon_no_video\" title=\"";
                // line 282
                echo twig_escape_filter($this->env, $this->getAttribute($context["remoteVideo"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                echo "\"></i>
                                                        </a>
                                                    </li>
                                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['remoteVideo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 286
            echo "
                                            </ul>
                                        </div>

                                    </div>

                                ";
        }
        // line 293
        echo "
                            </div>
                        </section>
                        <!-- /product photos -->

                        <!-- product specs & buy -->
                        <div class=\"side_col\">
                            <div class=\"side_col_pad\">
                                <section class=\"product_specs\">

                                    ";
        // line 303
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("slogan" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
            // line 304
            echo "
                                        <p class=\"product_spec_catchword\">";
            // line 305
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("slogan" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo "</p>

                                    ";
        }
        // line 308
        echo "
                                    ";
        // line 309
        if ((!twig_test_empty((isset($context["extraProperties"]) ? $context["extraProperties"] : $this->getContext($context, "extraProperties"))))) {
            // line 310
            echo "
                                        <ul class=\"product_specs_list\">

                                            ";
            // line 313
            if ($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : null), "age", array(), "array", true, true)) {
                // line 314
                echo "                                                ";
                $context["age"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : $this->getContext($context, "extraProperties")), "age", array(), "array"), 0, array(), "array"), "value", array());
                // line 315
                echo "
                                                ";
                // line 316
                if ((twig_slice($this->env, (isset($context["age"]) ? $context["age"] : $this->getContext($context, "age")), (-1)) == 1)) {
                    // line 317
                    echo "                                                    ";
                    $context["ageString"] = array(0 => "год", 1 => "года", 2 => "лет");
                    // line 318
                    echo "                                                ";
                } else {
                    // line 319
                    echo "                                                    ";
                    $context["ageString"] = array(0 => "года", 1 => "года", 2 => "лет");
                    // line 320
                    echo "                                                ";
                }
                // line 321
                echo "
                                                <li class=\"product_spec\" title=\"Рекомендуемый производителем возраст ребенка ";
                // line 322
                echo twig_escape_filter($this->env, (isset($context["age"]) ? $context["age"] : $this->getContext($context, "age")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction(twig_slice($this->env, (isset($context["age"]) ? $context["age"] : $this->getContext($context, "age")), (-1)), (isset($context["ageString"]) ? $context["ageString"] : $this->getContext($context, "ageString"))), "html", null, true);
                echo "\">

                                                    ";
                // line 324
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : $this->getContext($context, "extraProperties")), "age", array(), "array"));
                foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                    // line 325
                    echo "
                                                        <span class=\"product_spec_age\">";
                    // line 326
                    echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "value", array()), "html", null, true);
                    echo "</span>

                                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 329
                echo "
                                                    <span class=\"product_spec_label\">";
                // line 330
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Age", array(), "frontend"), "html", null, true);
                echo "</span>
                                                </li>

                                            ";
            }
            // line 334
            echo "
                                            ";
            // line 335
            if ($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : null), "skills", array(), "array", true, true)) {
                // line 336
                echo "
                                                <li class=\"product_spec product_spec_skills\">

                                                    ";
                // line 339
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : $this->getContext($context, "extraProperties")), "skills", array(), "array"));
                foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                    // line 340
                    echo "
                                                        <span class=\"product_spec_skill skill_";
                    // line 341
                    echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "name", array()), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "value", array()), "html", null, true);
                    echo "\"><span class=\"skill_icon\">&nbsp;</span></span>

                                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 344
                echo "
                                                    <span class=\"product_spec_label\">";
                // line 345
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Developing skills", array(), "frontend"), "html", null, true);
                echo "</span>
                                                </li>

                                            ";
            }
            // line 349
            echo "
                                            ";
            // line 350
            if (($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : null), "number_components", array(), "array", true, true) && ($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : $this->getContext($context, "extraProperties")), "number_components", array(), "array") > 0))) {
                // line 351
                echo "
                                                <li class=\"product_spec\">
                                                    <span class=\"product_spec_details\">";
                // line 353
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : $this->getContext($context, "extraProperties")), "number_components", array(), "array"), "html", null, true);
                echo "</span>
                                                    <span class=\"product_spec_label\">";
                // line 354
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Number of components", array(), "frontend"), "html", null, true);
                echo "</span>
                                                </li>

                                            ";
            }
            // line 358
            echo "
                                        </ul>

                                    ";
        }
        // line 362
        echo "
                                </section>
                                <section class=\"product_buy\">
                                    <!--  Standart -->

                                    ";
        // line 367
        if (((!twig_test_empty((isset($context["modsData"]) ? $context["modsData"] : $this->getContext($context, "modsData")))) && ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "AvailabilityQuantity", array()) > 0))) {
            // line 368
            echo "
                                        <div class=\"product_buy_options\">

                                            ";
            // line 371
            if (($this->getAttribute((isset($context["modsData"]) ? $context["modsData"] : null), "colors", array(), "any", true, true) && $this->getAttribute((isset($context["modsData"]) ? $context["modsData"] : $this->getContext($context, "modsData")), "colors", array()))) {
                // line 372
                echo "
                                                <div class=\"product_buy_option\">
                                                    <label>";
                // line 374
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Color", array(), "frontend"), "html", null, true);
                echo "</label>
                                                    <select id=\"color\">

                                                        ";
                // line 377
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["modsData"]) ? $context["modsData"] : $this->getContext($context, "modsData")), "colors", array()));
                foreach ($context['_seq'] as $context["value"] => $context["color"]) {
                    // line 378
                    echo "
                                                            <option value=\"";
                    // line 379
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
                // line 382
                echo "
                                                    </select>
                                                </div>

                                            ";
            }
            // line 387
            echo "
                                            ";
            // line 388
            if (($this->getAttribute((isset($context["modsData"]) ? $context["modsData"] : null), "sizes", array(), "any", true, true) && $this->getAttribute((isset($context["modsData"]) ? $context["modsData"] : $this->getContext($context, "modsData")), "sizes", array()))) {
                // line 389
                echo "
                                                <div class=\"product_buy_option\">
                                                    <label>";
                // line 391
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Size", array(), "frontend"), "html", null, true);
                echo "</label>
                                                    <select id=\"size\" class=\"load\">

                                                        ";
                // line 394
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["modsData"]) ? $context["modsData"] : $this->getContext($context, "modsData")), "sizes", array()));
                foreach ($context['_seq'] as $context["value"] => $context["size"]) {
                    // line 395
                    echo "
                                                            <option value=\"";
                    // line 396
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
                // line 399
                echo "
                                                    </select>
                                                    ";
                // line 405
                echo "                                                </div>

                                                <div id=\"sizeMsgTpl\">";
                // line 407
                echo $this->env->getExtension('translator')->trans("msg.not_have_size", array(), "frontend");
                echo "</div>

                                            ";
            }
            // line 410
            echo "

                                            ";
            // line 412
            $context["isEnableSelectQA"] = false;
            // line 413
            echo "                                            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["quantityAlternative"]) ? $context["quantityAlternative"] : $this->getContext($context, "quantityAlternative")));
            foreach ($context['_seq'] as $context["_key"] => $context["qa"]) {
                if ($this->getAttribute($this->getAttribute($context["qa"], "targetObject", array()), "quantityOfPieces", array())) {
                    // line 414
                    echo "                                                ";
                    $context["isEnableSelectQA"] = true;
                    // line 415
                    echo "                                            ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['qa'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 416
            echo "
                                            ";
            // line 417
            if (((isset($context["quantityAlternative"]) ? $context["quantityAlternative"] : $this->getContext($context, "quantityAlternative")) && (isset($context["isEnableSelectQA"]) ? $context["isEnableSelectQA"] : $this->getContext($context, "isEnableSelectQA")))) {
                // line 418
                echo "
                                                <div class=\"product_buy_option\">
                                                    <label>";
                // line 420
                echo "</label>
                                                    <select id=\"quantity-alternative\" class=\"\">";
                // line 423
                if ((!$this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "quantityOfPieces", array()))) {
                    // line 424
                    echo "<option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()), "html", null, true);
                    echo "\" selected=\"selected\">Целый товар (";
                    echo twig_escape_filter($this->env, (($this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "current")) . " ") . $this->env->getExtension('money_extension')->currencyFormatFunction()), "html", null, true);
                    echo ")</option>";
                } else {
                    // line 427
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["quantityAlternative"]) ? $context["quantityAlternative"] : $this->getContext($context, "quantityAlternative")));
                    foreach ($context['_seq'] as $context["_key"] => $context["qa"]) {
                        if ((!$this->getAttribute($this->getAttribute($context["qa"], "targetObject", array()), "quantityOfPieces", array()))) {
                            // line 428
                            $context["qa"] = $this->getAttribute($context["qa"], "targetObject", array());
                            // line 432
                            echo "                                                            <option value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["qa"], "id", array()), "html", null, true);
                            echo "\" ";
                            if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()) == $this->getAttribute($context["qa"], "id", array()))) {
                                echo "selected=\"selected\"";
                            }
                            echo ">Целый товар";
                            if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()) != $this->getAttribute($context["qa"], "id", array()))) {
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
                    // line 435
                    echo "
                                                        <option value=\"";
                    // line 436
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()), "html", null, true);
                    echo "\" selected=\"selected\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "quantityOfPieces", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "unitOfMeasure", array()), ("shortCaption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                    echo " (";
                    echo twig_escape_filter($this->env, (($this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "current")) . " ") . $this->env->getExtension('money_extension')->currencyFormatFunction()), "html", null, true);
                    echo ")</option>";
                }
                // line 440
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["quantityAlternative"]) ? $context["quantityAlternative"] : $this->getContext($context, "quantityAlternative")));
                foreach ($context['_seq'] as $context["_key"] => $context["qa"]) {
                    if ($this->getAttribute($this->getAttribute($context["qa"], "targetObject", array()), "quantityOfPieces", array())) {
                        // line 441
                        $context["qa"] = $this->getAttribute($context["qa"], "targetObject", array());
                        // line 445
                        echo "                                                            <option value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["qa"], "id", array()), "html", null, true);
                        echo "\" ";
                        if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()) == $this->getAttribute($context["qa"], "id", array()))) {
                            echo "selected=\"selected\"";
                        }
                        echo ">";
                        // line 446
                        echo twig_escape_filter($this->env, $this->getAttribute($context["qa"], "quantityOfPieces", array()), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "unitOfMeasure", array()), ("shortCaption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                        echo " ";
                        if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()) != $this->getAttribute($context["qa"], "id", array()))) {
                            echo " (";
                            echo twig_escape_filter($this->env, (($this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction($context["qa"], "current")) . " ") . $this->env->getExtension('money_extension')->currencyFormatFunction()), "html", null, true);
                            echo ")";
                        }
                        // line 447
                        echo "                                                            </option>
                                                        ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['qa'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 449
                echo "
                                                    </select>
                                                </div>

                                            ";
            }
            // line 454
            echo "
                                        </div>

                                    ";
        }
        // line 458
        echo "
                                    <div class=\"product_buy_action\" itemprop=\"offers\" itemscope itemtype=\"http://schema.org/Offer\">
                                        <div class=\"product_buy_price\">
                                            <meta itemprop=\"price\" content=\"";
        // line 461
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "price", array()), "html", null, true);
        echo "\" />
                                            <meta itemprop=\"priceCurrency\" content=\"RUB\" />
                                            <h4 class=\"h4price\">Цена:</h4>

                                            ";
        // line 465
        if ($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "old")) {
            // line 466
            echo "
                                                <div class=\"product_price old\">";
            // line 467
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "old")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</div>

                                            ";
        }
        // line 470
        echo "
                                            <div class=\"product_price\">";
        // line 471
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "current")), "html", null, true);
        echo " <span>";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</span></div>
                                        </div>

                                        ";
        // line 474
        if ((!$this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "isDiscontinued", array()))) {
            // line 475
            echo "
                                            ";
            // line 476
            if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "orderOnly", array()) && (!$this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "OOPBQuantity", array())))) {
                // line 477
                echo "                                                ";
                if ((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm"))) {
                    // line 478
                    echo "                                                <div class=\"clear\"></div>
                                                <br>
                                                <form class=\"product-in-order\" id=\"pre_order_form\">
                                                    Вы можете купить товар <strong>Под заказ</strong>.
                                                    Для оформление заказа укажите ваши данные.
                                                    <br>
                                                    <br>
                                                    ";
                    // line 485
                    $this->env->getExtension('form')->renderer->setTheme((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), array(0 => "CoreOrderBundle:Form:row.html.twig"));
                    // line 486
                    echo "                                                    ";
                    if ($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : null), "contactList", array(), "any", true, true)) {
                        // line 487
                        echo "                                                        <div class=\"like_text_input_rounded_wr\">
                                                            ";
                        // line 488
                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "contactList", array()), 'label');
                        echo "
                                                            <div class=\"rounded_select\">
                                                                <div class=\"rounded_select_in\">
                                                                ";
                        // line 491
                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "contactList", array()), 'widget');
                        echo "
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ";
                    }
                    // line 496
                    echo "                                                    <div class=\"like_text_input_rounded_wr\">
                                                        ";
                    // line 497
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "preOrder", array()), "email", array()), 'label');
                    echo "
                                                        ";
                    // line 498
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "preOrder", array()), "email", array()), 'widget');
                    echo "
                                                    </div>
                                                    <div class=\"like_text_input_rounded_wr\">
                                                        ";
                    // line 501
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "preOrder", array()), "phone", array()), 'label');
                    echo "
                                                        ";
                    // line 502
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "preOrder", array()), "phone", array()), 'widget');
                    echo "
                                                    </div>
                                                    <div class=\"like_text_input_rounded_wr\">
                                                        ";
                    // line 505
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "preOrder", array()), "fio", array()), 'label');
                    echo "
                                                        ";
                    // line 506
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "preOrder", array()), "fio", array()), 'widget');
                    echo "
                                                    </div>
                                                    <div class=\"like_text_input_rounded_wr\">
                                                        ";
                    // line 509
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "preOrder", array()), "city", array()), 'label');
                    echo "
                                                        <div class=\"like_text_input_rounded select2\">
                                                            ";
                    // line 511
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "preOrder", array()), "city", array()), 'widget');
                    echo "
                                                        </div>
                                                    </div>
                                                    <div class=\"like_text_input_rounded_wr\">
                                                        ";
                    // line 515
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "preOrder", array()), "address", array()), 'label');
                    echo "
                                                        ";
                    // line 516
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "preOrder", array()), "address", array()), 'widget');
                    echo "
                                                    </div>
                                                    <div class=\"like_text_input_rounded_wr\">
                                                        ";
                    // line 519
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "preOrder", array()), "compositions", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["preOrderComposition"]) {
                        // line 520
                        echo "                                                            ";
                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["preOrderComposition"], "quantity", array()), 'label');
                        echo "
                                                            ";
                        // line 521
                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["preOrderComposition"], "quantity", array()), 'widget');
                        echo "
                                                            ";
                        // line 522
                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["preOrderComposition"], "product", array()), 'widget');
                        echo "
                                                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['preOrderComposition'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 524
                    echo "                                                        ";
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), 'rest');
                    echo "
                                                    </div>
                                                    <div class=\"like_text_input_rounded_wr\">
                                                        <label class=\"control-label \"><strong>Итого</strong></label>
                                                        <span id=\"pre_order_total_cost\">";
                    // line 528
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "current")), "html", null, true);
                    echo " <span>";
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                    echo "</span></span>
                                                    </div>
                                                    <button id=\"buy-in-order\"
                                                            class=\"common_button big button_cart\"
                                                            ";
                    // line 532
                    if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "environment", array()) == "prod")) {
                        echo " onclick=\"yaCounter23357440.reachGoal('preorder'); return true;\" ";
                    }
                    // line 533
                    echo "                                                            data-id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()), "html", null, true);
                    echo "\"
                                                            data-url=\"";
                    // line 534
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
                    // line 559
                    echo "                                                <div id=\"byOrderMessage\"></div>
                                                ";
                }
                // line 561
                echo "
                                            ";
            } elseif (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "AvailabilityQuantity", array()) > 0)) {
                // line 563
                echo "
                                                ";
                // line 564
                if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "orderOnly", array())) {
                    // line 565
                    echo "
                                                    <div class=\"clearfix\"></div>

                                                    <!--noindex-->

                                                    <span class=\"confines_min_sum\">";
                    // line 572
                    if ((!$this->getAttribute((isset($context["confines"]) ? $context["confines"] : $this->getContext($context, "confines")), "canCreateOrder", array()))) {
                        // line 574
                        echo $this->getAttribute((isset($context["confines"]) ? $context["confines"] : $this->getContext($context, "confines")), "msg", array());
                    }
                    // line 578
                    echo "</span>

                                                    <!--/noindex-->

                                                ";
                }
                // line 583
                echo "
                                                <button id=\"update-cart\" class=\"common_button big button_cart\"
                                                        data-id=\"";
                // line 585
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()), "html", null, true);
                echo "\"
                                                        data-url=\"";
                // line 586
                echo $this->env->getExtension('routing')->getPath("core_product_update_cart");
                echo "\"
                                                        ";
                // line 587
                if (($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "products", array(), "any", true, true) && $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "products", array(), "any", false, true), $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()), array(), "array", true, true))) {
                    // line 588
                    $context["isInCart"] = true;
                    // line 589
                    echo "                                                            data-is-in-cart=\"1\"
                                                        ";
                }
                // line 591
                echo "data-is-in-cart-text=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Product add in cart", array("%URL%" => $this->env->getExtension('routing')->getPath("core_order_cart")), "frontend"), "html", null, true);
                echo "\"
                                                        ><span><i class=\"button_icon\"></i><b class=\"in-cart-text\">";
                // line 592
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Add in cart", array(), "frontend"), "html", null, true);
                echo "</b></span></button>

                                                <div class=\"clear\"></div>
                                                <div class=\"ajax-result-cart\">
                                                    <div class=\"ajax-success\"";
                // line 596
                if ((isset($context["isInCart"]) ? $context["isInCart"] : $this->getContext($context, "isInCart"))) {
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
            // line 601
            echo "
                                        ";
        }
        // line 603
        echo "
                                        <div class=\"product_availability with_icon ";
        // line 604
        if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "AvailabilityQuantity", array()) == 0)) {
            echo "not_instock";
        } else {
            echo "instock";
        }
        echo "\">
                                            Артикул: ";
        // line 605
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()), "html", null, true);
        echo ". ";
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "sku", array())) {
            echo " SKU (";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "sku", array()), "html", null, true);
            echo ")";
        }
        // line 606
        echo "                                            <br>

                                            ";
        // line 608
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "isDiscontinued", array())) {
            // line 609
            echo "
                                                <span><link itemprop=\"availability\" href=\"http://schema.org/Discontinued\" />Снят с производства</span>

                                            ";
        } elseif ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "orderOnly", array())) {
            // line 613
            echo "                                                ";
            if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "OOPBQuantity", array())) {
                // line 614
                echo "                                                <span>
                                                    <link itemprop=\"availability\" href=\"http://schema.org/InStock\" />На складе ";
                // line 615
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "OOPBQuantity", array()), "html", null, true);
                if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "unitOfMeasure", array())) {
                    echo "&nbsp;";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "unitOfMeasure", array()), ("shortCaption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                }
                // line 616
                echo "                                                </span>
                                                <br />
                                                ";
            }
            // line 619
            echo "                                                <span><link itemprop=\"availability\" href=\"http://schema.org/PreOrder\" />Под заказ";
            if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "deliveryDays", array())) {
                echo ". Время обработки ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "deliveryDays", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "deliveryDays", array()), array(0 => "день", 1 => "дня", 2 => "дней")), "html", null, true);
                echo ".";
            }
            echo "</span>
                                            ";
        } else {
            // line 621
            echo "                                            <span class=\"instock-text\">";
            if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "AvailabilityQuantity", array()) != 0)) {
                echo "<link itemprop=\"availability\" href=\"http://schema.org/InStock\" />";
            }
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("In stock", array(), "frontend"), "html", null, true);
            echo "</span>
                                            <span class=\"not-instock-text\">";
            // line 622
            if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "AvailabilityQuantity", array()) == 0)) {
                echo "<link itemprop=\"availability\" href=\"http://schema.org/OutOfStock\" />";
            }
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Not in stock", array(), "frontend"), "html", null, true);
            echo "</span><span class=\"count-instock\">";
            if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "AvailabilityQuantity", array()) > 0)) {
                echo ": ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "AvailabilityQuantity", array()), "html", null, true);
                if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "unitOfMeasure", array())) {
                    echo "&nbsp;";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "unitOfMeasure", array()), ("shortCaption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                }
            }
            echo "</span>
                                            ";
        }
        // line 624
        echo "
                                        </div>

                                    </div>

                                    ";
        // line 629
        if (((($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "AvailabilityQuantity", array()) == 0) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "isDiscontinued", array())) && twig_length_filter($this->env, (isset($context["similars"]) ? $context["similars"] : $this->getContext($context, "similars"))))) {
            // line 630
            echo "
                                        <section class=\"showcase_compact_box products_grid row_three\">
                                            <h2>";
            // line 632
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Alternative product", array(), "frontend"), "html", null, true);
            echo "</h2>
                                            <div class=\"products_grid_line grid_container\">

                                                ";
            // line 636
            echo "                                                ";
            $context["productItemContainerClass"] = "product_min";
            // line 637
            echo "                                                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["similars"]) ? $context["similars"] : $this->getContext($context, "similars")));
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
                echo "    
                                                    ";
                // line 638
                $context["product"] = $this->getAttribute($context["product"], "targetObject", array());
                // line 639
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
            // line 642
            echo "
                                            </div>

                                            ";
            // line 645
            if ((twig_length_filter($this->env, (isset($context["similars"]) ? $context["similars"] : $this->getContext($context, "similars"))) > 3)) {
                // line 646
                echo "
                                                <span class=\"showcase_compact_nav prev disabled\">";
                // line 647
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next's", array(), "frontend"), "html", null, true);
                echo "</span>
                                                <span class=\"showcase_compact_nav next disabled\">";
                // line 648
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Prev's", array(), "frontend"), "html", null, true);
                echo "</span>

                                            ";
            }
            // line 651
            echo "
                                        </section>

                                    ";
        }
        // line 655
        echo "
                                    ";
        // line 656
        if ((($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "AvailabilityQuantity", array()) > 0) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "orderOnly", array()))) {
            // line 657
            echo "
                                        <div class=\"product_buy_delivery\" data-product-price=\"";
            // line 658
            echo twig_escape_filter($this->env, $this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "current"), "html", null, true);
            echo "\" data-product-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()), "html", null, true);
            echo "\">
                                            <p>";
            // line 659
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("deliveryText", array(), "frontend"), "html", null, true);
            echo " <a rel=\"nofollow\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_faq_article", array("articleSlug" => $this->getAttribute((isset($context["deliveryArticle"]) ? $context["deliveryArticle"] : $this->getContext($context, "deliveryArticle")), "slug", array()), "categorySlug" => $this->getAttribute($this->getAttribute((isset($context["deliveryArticle"]) ? $context["deliveryArticle"] : $this->getContext($context, "deliveryArticle")), "category", array()), "slug", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("MoreDelivery", array(), "frontend"), "html", null, true);
            echo "</a></p>
                                            ";
            // line 689
            echo "                                        </div>


                                        ";
            // line 725
            echo "                                    ";
        }
        // line 726
        echo "                                </section>
                                <ul class=\"product_toolbox\">
                                    <li class=\"product_tool\">
                                        <span id=\"update-favorite\" class=\"product_favor with_icon text_tgl\"
                                              data-add-url=\"";
        // line 730
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_product_update_favorites", array("action" => "add", "id" => $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()), "_format" => "json")), "html", null, true);
        echo "\"
                                              data-remove-url=\"";
        // line 731
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_product_update_favorites", array("action" => "remove", "id" => $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()), "_format" => "json")), "html", null, true);
        echo "\"
                                              data-add-text=\"";
        // line 732
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("In favorites", array(), "frontend"), "html", null, true);
        echo "\"
                                              data-remove-text=\"";
        // line 733
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("From favorites", array(), "frontend"), "html", null, true);
        echo "\"
                                                ";
        // line 734
        if (twig_in_filter($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()), (isset($context["favoriteProductsIds"]) ? $context["favoriteProductsIds"] : $this->getContext($context, "favoriteProductsIds")))) {
            // line 735
            echo "data-is-in-favorite=\"1\"
                                                ";
        } else {
            // line 737
            echo "data-is-in-favorite=\"0\"
                                                ";
        }
        // line 739
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "security", array(), "any", false, true), "token", array(), "any", false, true), "user", array(), "any", false, true), "id", array(), "any", true, true)) {
            // line 740
            echo "data-is-logged=\"1\"
                                                ";
        } else {
            // line 742
            echo "data-is-logged=\"0\"
                                                    data-login-url=\"";
            // line 743
            echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
            echo "\"
                                                ";
        }
        // line 745
        echo ">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("In favorites", array(), "frontend"), "html", null, true);
        echo "</span>
                                    </li>
                                    <!--noindex-->
                                    <li class=\"product_tool\">
                                        <a rel=\"nofollow\" class=\"product_ask with_icon text_tgl\" href=\"";
        // line 749
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("trouble_ticket_contact_with_product_id", array("product_id" => $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()))), "html", null, true);
        echo "#ask-a-question\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ask a question", array(), "frontend"), "html", null, true);
        echo "</a>
                                    </li>
                                    <!--/noindex-->
                                    ";
        // line 760
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
        // line 772
        if (($this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "modificationUnion", array()), "general", array()) && (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "modificationUnion", array()) && $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "modificationUnion", array()), "general", array())) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "modificationUnion", array()), "general", array()), "id", array()) != $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()))))) {
            // line 773
            echo "
                    <!--noindex-->

                ";
        }
        // line 777
        echo "
                <!-- product details and products promo -->
                <div class=\"product_info\">
                    <div class=\"product_page_pad cols_container\">
                        <!-- products details col -->
                        <section class=\"product_details main_col\">
                            <div class=\"main_col_pad\">
                                <article itemprop=\"description\" class=\"def_style\">
                                    ";
        // line 785
        echo $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("description" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
        echo "
                                </article>
                            </div>
                        </section>
                        <!-- /products details -->

                        <!-- products promo col -->
                        <div class=\"side_col\">
                            <div class=\"side_col_pad\">

                                <!-- similar products -->

                                ";
        // line 797
        if (twig_length_filter($this->env, (isset($context["series"]) ? $context["series"] : $this->getContext($context, "series")))) {
            // line 798
            echo "
                                    <section class=\"showcase_compact_box products_grid row_three\">
                                        <h2>";
            // line 800
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("From the series", array(), "frontend"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "serie", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo "</h2>
                                        <div class=\"products_grid_line grid_container\">

                                            ";
            // line 804
            echo "                                            ";
            $context["productItemContainerClass"] = "product_min";
            // line 805
            echo "                                            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["series"]) ? $context["series"] : $this->getContext($context, "series")));
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
                // line 806
                echo "
                                                ";
                // line 807
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
            // line 810
            echo "
                                        </div>

                                        ";
            // line 813
            if ((twig_length_filter($this->env, (isset($context["series"]) ? $context["series"] : $this->getContext($context, "series"))) > 3)) {
                // line 814
                echo "
                                            <span class=\"showcase_compact_nav prev disabled\">";
                // line 815
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next's", array(), "frontend"), "html", null, true);
                echo "</span>
                                            <span class=\"showcase_compact_nav next disabled\">";
                // line 816
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Prev's", array(), "frontend"), "html", null, true);
                echo "</span>

                                        ";
            }
            // line 819
            echo "
                                    </section>


                                ";
        }
        // line 824
        echo "
                                <!-- /similar products -->

                                <!-- similar products -->
                                ";
        // line 828
        if (twig_length_filter($this->env, (isset($context["alternative"]) ? $context["alternative"] : $this->getContext($context, "alternative")))) {
            // line 829
            echo "
                                    <section class=\"showcase_compact_box products_grid row_three\">
                                        <h2>";
            // line 831
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Similar toys", array(), "frontend"), "html", null, true);
            echo "</h2>
                                        <div class=\"products_grid_line grid_container\">

                                            ";
            // line 835
            echo "                                            ";
            $context["productItemContainerClass"] = "product_min";
            // line 836
            echo "                                            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["alternative"]) ? $context["alternative"] : $this->getContext($context, "alternative")));
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
                // line 837
                echo "
                                                ";
                // line 838
                $context["product"] = $this->getAttribute($context["product"], "targetObject", array());
                // line 839
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
            // line 842
            echo "
                                        </div>

                                        ";
            // line 845
            if ((twig_length_filter($this->env, (isset($context["alternative"]) ? $context["alternative"] : $this->getContext($context, "alternative"))) > 3)) {
                // line 846
                echo "
                                            <span class=\"showcase_compact_nav prev disabled\">";
                // line 847
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next's", array(), "frontend"), "html", null, true);
                echo "</span>
                                            <span class=\"showcase_compact_nav next disabled\">";
                // line 848
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Prev's", array(), "frontend"), "html", null, true);
                echo "</span>

                                        ";
            }
            // line 851
            echo "
                                    </section>

                                ";
        }
        // line 855
        echo "                                <!-- /similar products -->

                            </div>
                        </div>
                        <!-- /products promo col -->

                    </div>
                </div>
                <!-- /product details and products promo -->
                ";
        // line 864
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "remoteVideos", array()))) {
            // line 865
            echo "                    <div class=\"product_info\">
                        <div class=\"product_page_pad cols_container\">
                            <div class=\"main_col_pad\">
                                <h3>Видео обзор ";
            // line 868
            echo twig_escape_filter($this->env, (isset($context["captionCaseGenitive"]) ? $context["captionCaseGenitive"] : $this->getContext($context, "captionCaseGenitive")), "html", null, true);
            echo "</h3>
                                ";
            // line 869
            $context["remoteVideoCounter"] = 1;
            // line 870
            echo "                                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "remoteVideos", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["remoteVideo"]) {
                // line 871
                echo "                                    ";
                if (((isset($context["remoteVideoCounter"]) ? $context["remoteVideoCounter"] : $this->getContext($context, "remoteVideoCounter")) <= 3)) {
                    // line 872
                    echo "                                    ";
                    $context["remoteVideoCaption"] = $this->getAttribute($context["remoteVideo"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
                    // line 873
                    echo "                                        <div class=\"product_video_wr\" ";
                    if ((isset($context["remoteVideoCaption"]) ? $context["remoteVideoCaption"] : $this->getContext($context, "remoteVideoCaption"))) {
                        echo "title=\"";
                        echo twig_escape_filter($this->env, (isset($context["remoteVideoCaption"]) ? $context["remoteVideoCaption"] : $this->getContext($context, "remoteVideoCaption")), "html", null, true);
                        echo "\"";
                    }
                    echo ">
                                            <iframe width=\"300\" height=\"210\" src=\"";
                    // line 874
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["remoteVideo"], "videoHosting", array()), "playerUri", array()), "html", null, true);
                    echo twig_escape_filter($this->env, $this->getAttribute($context["remoteVideo"], "code", array()), "html", null, true);
                    echo "\" frameborder=\"0\"></iframe>
                                        </div>
                                    ";
                }
                // line 877
                echo "                                    ";
                $context["remoteVideoCounter"] = ((isset($context["remoteVideoCounter"]) ? $context["remoteVideoCounter"] : $this->getContext($context, "remoteVideoCounter")) + 1);
                // line 878
                echo "                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['remoteVideo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 879
            echo "                            </div>
                        </div>
                    </div>
                ";
        }
        // line 883
        echo "                <div class=\"product_spec_info product_info\">
                    <div class=\"padding_content\">
                        <div class=\"cols_container\">

                            ";
        // line 887
        if ($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : null), "skills", array(), "array", true, true)) {
            // line 888
            echo "                                ";
            // line 912
            echo "
                                <div class=\"product_skills grid_item\">
                                    <h3>";
            // line 914
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("This toy will help your child to develop skills", array(), "frontend"), "html", null, true);
            echo "</h3>
                                    <ul class=\"product_skills_list\">

                                        ";
            // line 917
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : $this->getContext($context, "extraProperties")), "skills", array(), "array"));
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                // line 918
                echo "                                            <li class=\"product_skill skill_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "name", array()), "html", null, true);
                echo "\">
                                                ";
                // line 919
                if ((($this->getAttribute($context["data"], "articleKey", array()) && $this->getAttribute((isset($context["articles"]) ? $context["articles"] : null), $this->getAttribute($context["data"], "articleKey", array()), array(), "array", true, true)) && $this->getAttribute((isset($context["articles"]) ? $context["articles"] : $this->getContext($context, "articles")), $this->getAttribute($context["data"], "articleKey", array()), array(), "array"))) {
                    // line 920
                    echo "                                                    ";
                    $context["curArticle"] = $this->getAttribute((isset($context["articles"]) ? $context["articles"] : $this->getContext($context, "articles")), $this->getAttribute($context["data"], "articleKey", array()), array(), "array");
                    // line 921
                    echo "                                                    <h4>
                                                        <!--noindex-->
                                                            <a rel=\"nofollow\" href=\"";
                    // line 923
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_faq_article", array("articleSlug" => $this->getAttribute((isset($context["curArticle"]) ? $context["curArticle"] : $this->getContext($context, "curArticle")), "slug", array()), "categorySlug" => $this->getAttribute($this->getAttribute((isset($context["curArticle"]) ? $context["curArticle"] : $this->getContext($context, "curArticle")), "category", array()), "slug", array()))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "value", array()), "html", null, true);
                    echo "</a>
                                                        <!--/noindex-->
                                                    </h4>
                                                    ";
                } else {
                    // line 927
                    echo "                                                        <h4>";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "value", array()), "html", null, true);
                    echo "</h4>
                                                ";
                }
                // line 929
                echo "
                                                ";
                // line 930
                if ($this->getAttribute($context["data"], "shortDescription", array())) {
                    // line 931
                    echo "
                                                    <p>";
                    // line 932
                    echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "shortDescription", array()), "html", null, true);
                    echo "</p>

                                                ";
                }
                // line 935
                echo "
                                                <span class=\"skill_icon\">&nbsp;</span>
                                            </li>

                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 940
            echo "
                                    </ul>
                                </div>


                            ";
        }
        // line 946
        echo "
                            <div class=\"product_techinfo grid_item\">

                                ";
        // line 949
        if (((((((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "countryOfOrigin", array())) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "warrantyMonths", array())) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "netWeight", array())) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "grossWeight", array())) || (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "heightOfProduct", array()) && $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "widthOfProduct", array())) && $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "lengthOfProduct", array())))) {
            // line 950
            echo "
                                    <h3>";
            // line 951
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Characteristics", array(), "frontend"), "html", null, true);
            echo "</h3>
                                    <ul class=\"list_simple\">
                                        ";
            // line 953
            if ((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties"))) {
                // line 954
                echo "                                            ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")));
                foreach ($context['_seq'] as $context["name"] => $context["property"]) {
                    // line 955
                    echo "                                                ";
                    if (($this->getAttribute($context["property"], "values", array()) || $this->getAttribute($context["property"], "value", array()))) {
                        // line 956
                        echo "
                                                    <li><strong>";
                        // line 957
                        echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "caption", array()), "html", null, true);
                        echo ": </strong>

                                                        ";
                        // line 959
                        if ((($context["name"] && ($context["name"] == "brand")) && $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "brand", array()))) {
                            // line 960
                            echo "
                                                            <a href=\"";
                            // line 961
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand_first_page", array("slug" => $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "brand", array()), "slug", array()))), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute($context["property"], "values", array()), ", "), "html", null, true);
                            echo "</a>

                                                        ";
                        } else {
                            // line 964
                            echo "                                                            ";
                            if ((twig_length_filter($this->env, $this->getAttribute($context["property"], "values", array())) > 0)) {
                                // line 965
                                echo "                                                                ";
                                echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute($context["property"], "values", array()), ", "), "html", null, true);
                                echo "
                                                            ";
                            } else {
                                // line 967
                                echo "                                                                ";
                                if (($this->getAttribute($context["property"], "type", array()) == "input")) {
                                    // line 968
                                    echo "                                                                    ";
                                    echo twig_escape_filter($this->env, $this->env->getExtension('format_extension')->numberFormatFunction($this->getAttribute($context["property"], "value", array()), true, 2, ",", ""), "html", null, true);
                                    echo "
                                                                ";
                                } else {
                                    // line 970
                                    echo "                                                                    ";
                                    echo $this->getAttribute($context["property"], "value", array());
                                    echo "
                                                                ";
                                }
                                // line 972
                                echo "                                                            ";
                            }
                            // line 973
                            echo "                                                            ";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "unit", array()), "html", null, true);
                            echo "

                                                        ";
                        }
                        // line 976
                        echo "
                                                    </li>

                                                ";
                    }
                    // line 980
                    echo "                                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['name'], $context['property'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 981
                echo "                                        ";
            }
            // line 982
            echo "
                                        ";
            // line 983
            if ((($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "heightOfProduct", array()) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "widthOfProduct", array())) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "lengthOfProduct", array()))) {
                // line 984
                echo "
                                            <li><strong>";
                // line 985
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Size", array(), "frontend"), "html", null, true);
                echo ": </strong>";
                echo twig_escape_filter($this->env, $this->env->getExtension('format_extension')->dimensionsFormatFunction($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "heightOfProduct", array()), $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "widthOfProduct", array()), $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "lengthOfProduct", array())), "html", null, true);
                echo "</li>

                                        ";
            }
            // line 988
            echo "
                                        ";
            // line 989
            if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "netWeight", array())) {
                // line 990
                echo "
                                            <li><strong>";
                // line 991
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Net weight", array(), "frontend"), "html", null, true);
                echo ": </strong>";
                echo twig_escape_filter($this->env, $this->env->getExtension('format_extension')->weightFormatFunction($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "netWeight", array()), $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "isNetWeightInGm", array())), "html", null, true);
                echo "</li>

                                        ";
            }
            // line 994
            echo "
                                        ";
            // line 995
            if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "grossWeight", array())) {
                // line 996
                echo "
                                            <li><strong>";
                // line 997
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Gross weight", array(), "frontend"), "html", null, true);
                echo ": </strong>";
                echo twig_escape_filter($this->env, $this->env->getExtension('format_extension')->weightFormatFunction($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "grossWeight", array()), $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "isNetWeightInGm", array())), "html", null, true);
                echo "</li>

                                        ";
            }
            // line 1000
            echo "
                                        ";
            // line 1001
            if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "warrantyMonths", array())) {
                // line 1002
                echo "
                                            <li><strong>";
                // line 1003
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Гарантия", array(), "frontend"), "html", null, true);
                echo ": </strong>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "warrantyMonths", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "warrantyMonths", array()), array(0 => "месяц", 1 => "месяца", 2 => "месяцев")), "html", null, true);
                echo "</li>

                                        ";
            }
            // line 1006
            echo "                                        ";
            if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "countryOfOrigin", array())) {
                // line 1007
                echo "                                            <li><strong>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Страна происхождения", array(), "frontend"), "html", null, true);
                echo ": </strong> ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "countryOfOrigin", array()), "getCaption", array(0 => "ru"), "method"), "html", null, true);
                echo "</li>
                                        ";
            }
            // line 1009
            echo "                                        ";
            if ($this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "instruction", array()), "count", array())) {
                // line 1010
                echo "                                            ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "instruction", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                    // line 1011
                    echo "                                                <li>
                                                    <a href=\"";
                    // line 1012
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["file"])), "html", null, true);
                    echo "\" target=\"_blank\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["file"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                    echo "</a>
                                                </li>
                                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 1015
                echo "                                        ";
            }
            // line 1016
            echo "
                                    </ul>

                                ";
        }
        // line 1020
        echo "                                ";
        // line 1036
        echo "
                            </div>

                            ";
        // line 1039
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("complectation" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
            // line 1040
            echo "
                                <div class=\"product_techinfo grid_item list_simple_format\">
                                    <h3>Комплектация ";
            // line 1042
            echo twig_escape_filter($this->env, $this->env->getExtension('language_switcher_extension')->getCaseByKey($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("captionCase" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "genitive"), "html", null, true);
            echo "</h3>
                                    ";
            // line 1043
            echo $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("complectation" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
            echo "
                                </div>

                            ";
        }
        // line 1047
        echo "
                        </div>
                    </div>
                </div>

                ";
        // line 1052
        if (($this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "modificationUnion", array()), "general", array()) && (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "modificationUnion", array()) && $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "modificationUnion", array()), "general", array())) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "modificationUnion", array()), "general", array()), "id", array()) != $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()))))) {
            // line 1053
            echo "
                    <!--/noindex-->

                ";
        }
        // line 1057
        echo "
            </section>
            <!-- product opinions & discussions -->
            ";
        // line 1060
        $this->displayBlock("reviews_layout", $context, $blocks);
        echo "
            <!-- /product reviews & discussions -->


            <!-- last viewed showcase -->
            ";
        // line 1065
        if ((isset($context["recentlyViewed"]) ? $context["recentlyViewed"] : $this->getContext($context, "recentlyViewed"))) {
            // line 1066
            echo "
                <div class=\"showcase_lastviewed showcase_horizontal showcase_box\">
                    <div class=\"product_page_pad products_grid row_five\">
                        <h2>";
            // line 1069
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Recently viewed", array(), "frontend"), "html", null, true);
            echo "</h2>
                        <div class=\"showcase_container\">

                            ";
            // line 1072
            if ((twig_length_filter($this->env, (isset($context["recentlyViewed"]) ? $context["recentlyViewed"] : $this->getContext($context, "recentlyViewed"))) > 7)) {
                // line 1073
                echo "
                                <span class=\"showcase_nav prev disabled\"><span class=\"showcase_nav_btn\">";
                // line 1074
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next's", array(), "frontend"), "html", null, true);
                echo "</span></span>
                                <span class=\"showcase_nav next disabled\"><span class=\"showcase_nav_btn\">";
                // line 1075
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Prev's", array(), "frontend"), "html", null, true);
                echo "</span></span>

                            ";
            }
            // line 1078
            echo "
                            <div class=\"products_wrapper\">
                                <div class=\"products_grid_line grid_container\">

                                    ";
            // line 1083
            echo "                                    ";
            $context["productItemContainerClass"] = "product_min";
            // line 1084
            echo "                                    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["recentlyViewed"]) ? $context["recentlyViewed"] : $this->getContext($context, "recentlyViewed")));
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
                // line 1085
                echo "
                                        ";
                // line 1086
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
            // line 1089
            echo "
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            ";
        }
        // line 1097
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
        return array (  2337 => 1097,  2327 => 1089,  2310 => 1086,  2307 => 1085,  2289 => 1084,  2286 => 1083,  2280 => 1078,  2274 => 1075,  2270 => 1074,  2267 => 1073,  2265 => 1072,  2259 => 1069,  2254 => 1066,  2252 => 1065,  2244 => 1060,  2239 => 1057,  2233 => 1053,  2231 => 1052,  2224 => 1047,  2217 => 1043,  2213 => 1042,  2209 => 1040,  2207 => 1039,  2202 => 1036,  2200 => 1020,  2194 => 1016,  2191 => 1015,  2180 => 1012,  2177 => 1011,  2172 => 1010,  2169 => 1009,  2161 => 1007,  2158 => 1006,  2148 => 1003,  2145 => 1002,  2143 => 1001,  2140 => 1000,  2132 => 997,  2129 => 996,  2127 => 995,  2124 => 994,  2116 => 991,  2113 => 990,  2111 => 989,  2108 => 988,  2100 => 985,  2097 => 984,  2095 => 983,  2092 => 982,  2089 => 981,  2083 => 980,  2077 => 976,  2070 => 973,  2067 => 972,  2061 => 970,  2055 => 968,  2052 => 967,  2046 => 965,  2043 => 964,  2035 => 961,  2032 => 960,  2030 => 959,  2025 => 957,  2022 => 956,  2019 => 955,  2014 => 954,  2012 => 953,  2007 => 951,  2004 => 950,  2002 => 949,  1997 => 946,  1989 => 940,  1979 => 935,  1973 => 932,  1970 => 931,  1968 => 930,  1965 => 929,  1959 => 927,  1950 => 923,  1946 => 921,  1943 => 920,  1941 => 919,  1936 => 918,  1932 => 917,  1926 => 914,  1922 => 912,  1920 => 888,  1918 => 887,  1912 => 883,  1906 => 879,  1900 => 878,  1897 => 877,  1890 => 874,  1881 => 873,  1878 => 872,  1875 => 871,  1870 => 870,  1868 => 869,  1864 => 868,  1859 => 865,  1857 => 864,  1846 => 855,  1840 => 851,  1834 => 848,  1830 => 847,  1827 => 846,  1825 => 845,  1820 => 842,  1802 => 839,  1800 => 838,  1797 => 837,  1779 => 836,  1776 => 835,  1770 => 831,  1766 => 829,  1764 => 828,  1758 => 824,  1751 => 819,  1745 => 816,  1741 => 815,  1738 => 814,  1736 => 813,  1731 => 810,  1714 => 807,  1711 => 806,  1693 => 805,  1690 => 804,  1682 => 800,  1678 => 798,  1676 => 797,  1661 => 785,  1651 => 777,  1645 => 773,  1643 => 772,  1629 => 760,  1621 => 749,  1613 => 745,  1608 => 743,  1605 => 742,  1601 => 740,  1599 => 739,  1595 => 737,  1591 => 735,  1589 => 734,  1585 => 733,  1581 => 732,  1577 => 731,  1573 => 730,  1567 => 726,  1564 => 725,  1559 => 689,  1551 => 659,  1545 => 658,  1542 => 657,  1540 => 656,  1537 => 655,  1531 => 651,  1525 => 648,  1521 => 647,  1518 => 646,  1516 => 645,  1511 => 642,  1493 => 639,  1491 => 638,  1471 => 637,  1468 => 636,  1462 => 632,  1458 => 630,  1456 => 629,  1449 => 624,  1432 => 622,  1424 => 621,  1412 => 619,  1407 => 616,  1401 => 615,  1398 => 614,  1395 => 613,  1389 => 609,  1387 => 608,  1383 => 606,  1375 => 605,  1367 => 604,  1364 => 603,  1360 => 601,  1347 => 596,  1340 => 592,  1335 => 591,  1331 => 589,  1329 => 588,  1327 => 587,  1323 => 586,  1319 => 585,  1315 => 583,  1308 => 578,  1305 => 574,  1303 => 572,  1296 => 565,  1294 => 564,  1291 => 563,  1287 => 561,  1283 => 559,  1271 => 534,  1266 => 533,  1262 => 532,  1253 => 528,  1245 => 524,  1237 => 522,  1233 => 521,  1228 => 520,  1224 => 519,  1218 => 516,  1214 => 515,  1207 => 511,  1202 => 509,  1196 => 506,  1192 => 505,  1186 => 502,  1182 => 501,  1176 => 498,  1172 => 497,  1169 => 496,  1161 => 491,  1155 => 488,  1152 => 487,  1149 => 486,  1147 => 485,  1138 => 478,  1135 => 477,  1133 => 476,  1130 => 475,  1128 => 474,  1120 => 471,  1117 => 470,  1109 => 467,  1106 => 466,  1104 => 465,  1097 => 461,  1092 => 458,  1086 => 454,  1079 => 449,  1071 => 447,  1061 => 446,  1053 => 445,  1051 => 441,  1046 => 440,  1036 => 436,  1033 => 435,  1012 => 432,  1010 => 428,  1005 => 427,  998 => 424,  996 => 423,  993 => 420,  989 => 418,  987 => 417,  984 => 416,  977 => 415,  974 => 414,  968 => 413,  966 => 412,  962 => 410,  956 => 407,  952 => 405,  948 => 399,  933 => 396,  930 => 395,  926 => 394,  920 => 391,  916 => 389,  914 => 388,  911 => 387,  904 => 382,  883 => 379,  880 => 378,  876 => 377,  870 => 374,  866 => 372,  864 => 371,  859 => 368,  857 => 367,  850 => 362,  844 => 358,  837 => 354,  833 => 353,  829 => 351,  827 => 350,  824 => 349,  817 => 345,  814 => 344,  803 => 341,  800 => 340,  796 => 339,  791 => 336,  789 => 335,  786 => 334,  779 => 330,  776 => 329,  767 => 326,  764 => 325,  760 => 324,  753 => 322,  750 => 321,  747 => 320,  744 => 319,  741 => 318,  738 => 317,  736 => 316,  733 => 315,  730 => 314,  728 => 313,  723 => 310,  721 => 309,  718 => 308,  712 => 305,  709 => 304,  707 => 303,  695 => 293,  686 => 286,  676 => 282,  671 => 281,  666 => 280,  662 => 279,  659 => 278,  652 => 276,  646 => 272,  642 => 270,  640 => 269,  627 => 267,  624 => 266,  618 => 264,  616 => 263,  611 => 261,  608 => 260,  605 => 259,  602 => 258,  599 => 257,  596 => 256,  594 => 255,  591 => 254,  589 => 253,  586 => 252,  582 => 251,  576 => 247,  570 => 244,  566 => 243,  563 => 242,  561 => 241,  556 => 238,  554 => 237,  551 => 236,  546 => 232,  540 => 228,  538 => 227,  534 => 225,  528 => 224,  525 => 222,  523 => 221,  517 => 220,  514 => 219,  508 => 216,  505 => 215,  503 => 214,  494 => 210,  488 => 206,  486 => 205,  483 => 204,  480 => 203,  477 => 202,  474 => 201,  471 => 200,  468 => 199,  466 => 198,  459 => 194,  456 => 193,  454 => 192,  449 => 191,  447 => 190,  440 => 185,  428 => 180,  422 => 178,  418 => 175,  414 => 174,  410 => 172,  408 => 171,  403 => 168,  395 => 161,  393 => 160,  387 => 159,  385 => 157,  381 => 154,  374 => 151,  369 => 147,  367 => 145,  361 => 139,  352 => 133,  349 => 132,  338 => 129,  335 => 128,  331 => 127,  325 => 123,  323 => 122,  320 => 121,  317 => 120,  313 => 119,  310 => 118,  305 => 115,  303 => 114,  301 => 112,  299 => 111,  297 => 110,  294 => 108,  256 => 106,  252 => 98,  249 => 97,  245 => 92,  239 => 89,  235 => 87,  232 => 86,  218 => 84,  214 => 83,  209 => 81,  205 => 80,  201 => 79,  197 => 78,  194 => 77,  192 => 76,  188 => 75,  185 => 74,  182 => 73,  175 => 69,  172 => 68,  170 => 66,  150 => 64,  145 => 59,  142 => 58,  137 => 55,  135 => 50,  130 => 47,  127 => 46,  124 => 45,  107 => 41,  104 => 39,  102 => 38,  99 => 37,  93 => 33,  90 => 31,  88 => 30,  85 => 29,  78 => 25,  75 => 23,  73 => 22,  70 => 21,  65 => 20,  63 => 19,  61 => 18,  59 => 17,  57 => 16,  55 => 15,  53 => 14,  21 => 12,  14 => 11,);
    }
}
