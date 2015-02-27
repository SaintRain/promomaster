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
        ob_start();
        // line 23
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("title" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html");
        } else {
            // line 26
            echo "Купить ";
            echo twig_escape_filter($this->env, (isset($context["captionCaseAccusative"]) ? $context["captionCaseAccusative"] : $this->getContext($context, "captionCaseAccusative")), "html", null, true);
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
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("metakeywords" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html");
        } else {
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
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
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("metadescription" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html");
        } else {
            // line 46
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
        if (((isset($context["userCity"]) ? $context["userCity"] : $this->getContext($context, "userCity")) && twig_length_filter($this->env, (isset($context["deliveryCompanies"]) ? $context["deliveryCompanies"] : $this->getContext($context, "deliveryCompanies"))))) {
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
            // line 92
            echo "    ";
        }
        // line 93
        echo "    <script>
        var google_tag_params = {
            ecomm_prodid: ";
        // line 95
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()), "html", null, true);
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
            $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : $this->getContext($context, "breadcrumbs")));
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
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
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
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "brand", array())) {
            // line 153
            echo "<meta itemprop=\"brand\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "brand", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo "\" />";
        }
        // line 157
        echo "<meta itemprop=\"sku\" content=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "sku", array()), "html", null, true);
        echo "\" />
                <div class=\"product_header\">
                    <hgroup>
                        <h1 itemprop=\"name\">";
        // line 160
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
        echo "</h1>
                        <h2>";
        // line 163
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "brand", array())) {
            // line 165
            echo "Производитель: <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand_first_page", array("slug" => $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "brand", array()), "slug", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "brand", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo "</a>";
            // line 166
            if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "serie", array())) {
                // line 167
                echo ", Серия: <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand_series_first_page", array("slug" => $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "brand", array()), "slug", array()), "slugSeries" => $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "serie", array()), "slug", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "serie", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                echo "</a>";
            }
        }
        // line 174
        echo "</h2>
                    </hgroup>

                    ";
        // line 177
        if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "reviewsCount", array()) > 0)) {
            // line 178
            echo "
                        <div class=\"product_rating\" itemprop=\"aggregateRating\" itemscope itemtype=\"http://schema.org/AggregateRating\">
                            <meta itemprop=\"reviewCount\" content=\"";
            // line 180
            echo twig_escape_filter($this->env, (isset($context["reviewsTotal"]) ? $context["reviewsTotal"] : $this->getContext($context, "reviewsTotal")), "html", null, true);
            echo "\" />
                            <meta itemprop=\"ratingValue\" content=\"";
            // line 181
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "reviewsRating", array()), 1, ".", ""), "html", null, true);
            echo "\" />
                            ";
            // line 184
            echo "                            ";
            echo $this->env->getExtension('review_extension')->drawStarsByRatingFunction($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "reviewsRating", array()), "big");
            echo "

                            <span class=\"product_rating_count\">";
            // line 186
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
        // line 191
        echo "
                </div>


                <!-- product overview & buy -->
                ";
        // line 196
        $context["order"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "core_order"), "method");
        // line 197
        echo "                <script>var orderJsonString = '";
        echo twig_jsonencode_filter((isset($context["order"]) ? $context["order"] : $this->getContext($context, "order")));
        echo "'</script>
                ";
        // line 198
        $context["isInCart"] = false;
        // line 199
        echo "
                <div class=\"product_overview\" ";
        // line 200
        echo $this->env->getExtension('fastedit_extension')->fastEditFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")));
        echo ">
                    <div class=\"product_page_pad cols_container product_gallery_wrap\">
                        <!-- product photos -->
                        <section class=\"product_photos main_col\">
                            ";
        // line 204
        $context["mainImg"] = ((twig_length_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "images", array()))) ? (twig_first($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "images", array()))) : (null));
        // line 205
        echo "                            ";
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "images", array())) && $this->getAttribute(twig_first($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "images", array())), ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))))) {
            // line 206
            echo "                                ";
            $context["alt"] = $this->getAttribute(twig_first($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "images", array())), ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
            // line 207
            echo "                            ";
        } else {
            // line 208
            echo "                                ";
            $context["alt"] = ("Фотография " . $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))));
            // line 209
            echo "                            ";
        }
        // line 210
        echo "
                            ";
        // line 211
        $context["filesTotalCount"] = ($this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "images", array()), "count", array()) + twig_length_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "remoteVideos", array())));
        // line 212
        echo "
                            <div class=\"main_col_pad\">
                                <div class=\"product_photo_view\">

                                    <ins class=\"loupe";
        // line 216
        if (((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")) && (!(((($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "width", array()) >= 1000) || ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "height", array()) >= 1000)) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "height", array()) >= 410)) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "width", array()) >= 650))))) {
            echo " hidden";
        }
        echo "\">&nbsp;</ins>

                                    <span class=\"img-loader\"></span>

                                    ";
        // line 220
        if (((!(isset($context["filesTotalCount"]) ? $context["filesTotalCount"] : $this->getContext($context, "filesTotalCount"))) && (((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "height", array()) >= 500)) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "width", array()) >= 500)))) {
            // line 221
            echo "
                                        <a class=\"fancybox-button\" rel=\"fancybox-button\" href=\"";
            // line 222
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "images", array()), "original", "uploaded_file_", true)), "html", null, true);
            echo "\">

                                    ";
        }
        // line 225
        echo "
                                    <img itemprop=\"image\" src=\"";
        // line 226
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "images", array()), "preview", "400x400_", true)), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, (isset($context["alt"]) ? $context["alt"] : $this->getContext($context, "alt")), "html", null, true);
        echo "\"
                                         ";
        // line 227
        if ((!$this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "images", array()), "preview", "100x100_"))) {
            // line 228
            echo "style=\"cursor: default;\"";
        }
        // line 230
        if (((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")) && (((($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "width", array()) >= 1000) || ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "height", array()) >= 1000)) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "height", array()) >= 410)) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "width", array()) >= 650)))) {
            echo "data-zoom-image=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "images", array()))), "html", null, true);
            echo "\"";
        }
        // line 231
        echo "                                         >

                                    ";
        // line 233
        if ((((!(isset($context["filesTotalCount"]) ? $context["filesTotalCount"] : $this->getContext($context, "filesTotalCount"))) && (isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg"))) && (($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "height", array()) >= 500) && ($this->getAttribute((isset($context["mainImg"]) ? $context["mainImg"] : $this->getContext($context, "mainImg")), "width", array()) >= 500)))) {
            // line 234
            echo "
                                        </a>

                                    ";
        }
        // line 238
        echo "
                                </div>

                                ";
        // line 242
        echo "
                                ";
        // line 243
        if (((isset($context["filesTotalCount"]) ? $context["filesTotalCount"] : $this->getContext($context, "filesTotalCount")) > 1)) {
            // line 244
            echo "
                                    <div class=\"product_gallery\">

                                        ";
            // line 247
            if (((isset($context["filesTotalCount"]) ? $context["filesTotalCount"] : $this->getContext($context, "filesTotalCount")) > 4)) {
                // line 248
                echo "
                                            <span class=\"product_gallery_nav prev disabled\"><span class=\"product_gallery_nav_btn\">";
                // line 249
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next's", array(), "frontend"), "html", null, true);
                echo "</span></span>
                                            <span class=\"product_gallery_nav next disabled\"><span class=\"product_gallery_nav_btn\">";
                // line 250
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Prev's", array(), "frontend"), "html", null, true);
                echo "</span></span>

                                        ";
            }
            // line 253
            echo "
                                        <div class=\"product_gallery_list\">
                                            <ul class=\"product_gallery_scroll\">

                                                ";
            // line 257
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "images", array()));
            foreach ($context['_seq'] as $context["i"] => $context["image"]) {
                // line 258
                echo "
                                                    ";
                // line 259
                if ($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["image"], "preview", "100x100_")) {
                    // line 260
                    echo "
                                                        ";
                    // line 261
                    if ($this->getAttribute($context["image"], ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
                        // line 262
                        echo "                                                            ";
                        $context["alt"] = $this->getAttribute($context["image"], ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
                        // line 263
                        echo "                                                        ";
                    } else {
                        // line 264
                        echo "                                                            ";
                        $context["alt"] = ((("Фотография №" . ($context["i"] + 1)) . " ") . $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))));
                        // line 265
                        echo "                                                        ";
                    }
                    // line 266
                    echo "
                                                        <li class=\"product_gallery_item\" data-src=\"";
                    // line 267
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["image"], "preview", "400x400_", true)), "html", null, true);
                    echo "\">

                                                            ";
                    // line 269
                    if ((($this->getAttribute($context["image"], "height", array()) >= 500) && ($this->getAttribute($context["image"], "width", array()) >= 500))) {
                        // line 270
                        echo "                                                                <a class=\"fancybox-button\" rel=\"fancybox-button\" href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["image"], "original", "uploaded_file_", true)), "html", null, true);
                        echo "\">
                                                            ";
                    }
                    // line 272
                    echo "
                                                                <img ";
                    // line 273
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
                    // line 275
                    if ((($this->getAttribute($context["image"], "height", array()) >= 500) && ($this->getAttribute($context["image"], "width", array()) >= 500))) {
                        // line 276
                        echo "                                                                </a>
                                                            ";
                    }
                    // line 278
                    echo "
                                                        </li>

                                                    ";
                }
                // line 282
                echo "
                                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['i'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 284
            echo "
                                                ";
            // line 285
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "remoteVideos", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["remoteVideo"]) {
                // line 286
                echo "                                                    <li class=\"product_gallery_item small_video\"  data-src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/icon-video.png"), "html", null, true);
                echo "\">
                                                        <a class=\"fancybox-button\" data-fancybox-type=\"iframe\" rel=\"fancybox-button\" href=\"";
                // line 287
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["remoteVideo"], "videoHosting", array()), "playerUri", array()), "html", null, true);
                echo twig_escape_filter($this->env, $this->getAttribute($context["remoteVideo"], "code", array()), "html", null, true);
                echo "\">
                                                            <i class=\"icon_no_video\" title=\"";
                // line 288
                echo twig_escape_filter($this->env, $this->getAttribute($context["remoteVideo"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                echo "\"></i>
                                                        </a>
                                                    </li>
                                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['remoteVideo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 292
            echo "
                                            </ul>
                                        </div>

                                    </div>

                                ";
        }
        // line 299
        echo "
                            </div>
                        </section>
                        <!-- /product photos -->

                        <!-- product specs & buy -->
                        <div class=\"side_col\">
                            <div class=\"side_col_pad\">
                                <section class=\"product_specs\">

                                    ";
        // line 309
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("slogan" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
            // line 310
            echo "
                                        <p class=\"product_spec_catchword\">";
            // line 311
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("slogan" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo "</p>

                                    ";
        }
        // line 314
        echo "
                                    ";
        // line 315
        if ((!twig_test_empty((isset($context["extraProperties"]) ? $context["extraProperties"] : $this->getContext($context, "extraProperties"))))) {
            // line 316
            echo "
                                        <ul class=\"product_specs_list\">

                                            ";
            // line 319
            if ($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : null), "age", array(), "array", true, true)) {
                // line 320
                echo "                                                ";
                $context["age"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : $this->getContext($context, "extraProperties")), "age", array(), "array"), 0, array(), "array"), "value", array());
                // line 321
                echo "
                                                ";
                // line 322
                if ((twig_slice($this->env, (isset($context["age"]) ? $context["age"] : $this->getContext($context, "age")), (-1)) == 1)) {
                    // line 323
                    echo "                                                    ";
                    $context["ageString"] = array(0 => "год", 1 => "года", 2 => "лет");
                    // line 324
                    echo "                                                ";
                } else {
                    // line 325
                    echo "                                                    ";
                    $context["ageString"] = array(0 => "года", 1 => "года", 2 => "лет");
                    // line 326
                    echo "                                                ";
                }
                // line 327
                echo "
                                                <li class=\"product_spec\" title=\"Рекомендуемый производителем возраст ребенка ";
                // line 328
                echo twig_escape_filter($this->env, (isset($context["age"]) ? $context["age"] : $this->getContext($context, "age")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction(twig_slice($this->env, (isset($context["age"]) ? $context["age"] : $this->getContext($context, "age")), (-1)), (isset($context["ageString"]) ? $context["ageString"] : $this->getContext($context, "ageString"))), "html", null, true);
                echo "\">

                                                    ";
                // line 330
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : $this->getContext($context, "extraProperties")), "age", array(), "array"));
                foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                    // line 331
                    echo "
                                                        <span class=\"product_spec_age\">";
                    // line 332
                    echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "value", array()), "html", null, true);
                    echo "</span>

                                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 335
                echo "
                                                    <span class=\"product_spec_label\">";
                // line 336
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Age", array(), "frontend"), "html", null, true);
                echo "</span>
                                                </li>

                                            ";
            }
            // line 340
            echo "
                                            ";
            // line 341
            if ($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : null), "skills", array(), "array", true, true)) {
                // line 342
                echo "
                                                <li class=\"product_spec product_spec_skills\">

                                                    ";
                // line 345
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : $this->getContext($context, "extraProperties")), "skills", array(), "array"));
                foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                    // line 346
                    echo "
                                                        <span class=\"product_spec_skill skill_";
                    // line 347
                    echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "name", array()), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "value", array()), "html", null, true);
                    echo "\"><span class=\"skill_icon\">&nbsp;</span></span>

                                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 350
                echo "
                                                    <span class=\"product_spec_label\">";
                // line 351
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Developing skills", array(), "frontend"), "html", null, true);
                echo "</span>
                                                </li>

                                            ";
            }
            // line 355
            echo "
                                            ";
            // line 356
            if (($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : null), "number_components", array(), "array", true, true) && ($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : $this->getContext($context, "extraProperties")), "number_components", array(), "array") > 0))) {
                // line 357
                echo "
                                                <li class=\"product_spec\">
                                                    <span class=\"product_spec_details\">";
                // line 359
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : $this->getContext($context, "extraProperties")), "number_components", array(), "array"), "html", null, true);
                echo "</span>
                                                    <span class=\"product_spec_label\">";
                // line 360
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Number of components", array(), "frontend"), "html", null, true);
                echo "</span>
                                                </li>

                                            ";
            }
            // line 364
            echo "
                                        </ul>

                                    ";
        }
        // line 368
        echo "
                                </section>
                                <section class=\"product_buy\">
                                    <!--  Standart -->

                                    ";
        // line 373
        if (((!twig_test_empty((isset($context["modsData"]) ? $context["modsData"] : $this->getContext($context, "modsData")))) && ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "AvailabilityQuantity", array()) > 0))) {
            // line 374
            echo "
                                        <div class=\"product_buy_options\">

                                            ";
            // line 377
            if (($this->getAttribute((isset($context["modsData"]) ? $context["modsData"] : null), "colors", array(), "any", true, true) && $this->getAttribute((isset($context["modsData"]) ? $context["modsData"] : $this->getContext($context, "modsData")), "colors", array()))) {
                // line 378
                echo "
                                                <div class=\"product_buy_option\">
                                                    <label>";
                // line 380
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Color", array(), "frontend"), "html", null, true);
                echo "</label>
                                                    <select id=\"color\">

                                                        ";
                // line 383
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["modsData"]) ? $context["modsData"] : $this->getContext($context, "modsData")), "colors", array()));
                foreach ($context['_seq'] as $context["value"] => $context["color"]) {
                    // line 384
                    echo "
                                                            <option value=\"";
                    // line 385
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
                // line 388
                echo "
                                                    </select>
                                                </div>

                                            ";
            }
            // line 393
            echo "
                                            ";
            // line 394
            if (($this->getAttribute((isset($context["modsData"]) ? $context["modsData"] : null), "sizes", array(), "any", true, true) && $this->getAttribute((isset($context["modsData"]) ? $context["modsData"] : $this->getContext($context, "modsData")), "sizes", array()))) {
                // line 395
                echo "
                                                <div class=\"product_buy_option\">
                                                    <label>";
                // line 397
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Size", array(), "frontend"), "html", null, true);
                echo "</label>
                                                    <select id=\"size\" class=\"load\">

                                                        ";
                // line 400
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["modsData"]) ? $context["modsData"] : $this->getContext($context, "modsData")), "sizes", array()));
                foreach ($context['_seq'] as $context["value"] => $context["size"]) {
                    // line 401
                    echo "
                                                            <option value=\"";
                    // line 402
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
                // line 405
                echo "
                                                    </select>
                                                    ";
                // line 411
                echo "                                                </div>

                                                <div id=\"sizeMsgTpl\">";
                // line 413
                echo $this->env->getExtension('translator')->trans("msg.not_have_size", array(), "frontend");
                echo "</div>

                                            ";
            }
            // line 416
            echo "

                                            ";
            // line 418
            $context["isEnableSelectQA"] = false;
            // line 419
            echo "                                            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["quantityAlternative"]) ? $context["quantityAlternative"] : $this->getContext($context, "quantityAlternative")));
            foreach ($context['_seq'] as $context["_key"] => $context["qa"]) {
                if ($this->getAttribute($this->getAttribute($context["qa"], "targetObject", array()), "quantityOfPieces", array())) {
                    // line 420
                    echo "                                                ";
                    $context["isEnableSelectQA"] = true;
                    // line 421
                    echo "                                            ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['qa'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 422
            echo "
                                            ";
            // line 423
            if (((isset($context["quantityAlternative"]) ? $context["quantityAlternative"] : $this->getContext($context, "quantityAlternative")) && (isset($context["isEnableSelectQA"]) ? $context["isEnableSelectQA"] : $this->getContext($context, "isEnableSelectQA")))) {
                // line 424
                echo "
                                                <div class=\"product_buy_option\">
                                                    <label>";
                // line 426
                echo "</label>
                                                    <select id=\"quantity-alternative\" class=\"\">";
                // line 429
                if ((!$this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "quantityOfPieces", array()))) {
                    // line 430
                    echo "<option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()), "html", null, true);
                    echo "\" selected=\"selected\">Целый товар (";
                    echo twig_escape_filter($this->env, (($this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "current")) . " ") . $this->env->getExtension('money_extension')->currencyFormatFunction()), "html", null, true);
                    echo ")</option>";
                } else {
                    // line 433
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["quantityAlternative"]) ? $context["quantityAlternative"] : $this->getContext($context, "quantityAlternative")));
                    foreach ($context['_seq'] as $context["_key"] => $context["qa"]) {
                        if ((!$this->getAttribute($this->getAttribute($context["qa"], "targetObject", array()), "quantityOfPieces", array()))) {
                            // line 434
                            $context["qa"] = $this->getAttribute($context["qa"], "targetObject", array());
                            // line 438
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
                    // line 441
                    echo "
                                                        <option value=\"";
                    // line 442
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()), "html", null, true);
                    echo "\" selected=\"selected\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "quantityOfPieces", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "unitOfMeasure", array()), ("shortCaption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                    echo " (";
                    echo twig_escape_filter($this->env, (($this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "current")) . " ") . $this->env->getExtension('money_extension')->currencyFormatFunction()), "html", null, true);
                    echo ")</option>";
                }
                // line 446
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["quantityAlternative"]) ? $context["quantityAlternative"] : $this->getContext($context, "quantityAlternative")));
                foreach ($context['_seq'] as $context["_key"] => $context["qa"]) {
                    if ($this->getAttribute($this->getAttribute($context["qa"], "targetObject", array()), "quantityOfPieces", array())) {
                        // line 447
                        $context["qa"] = $this->getAttribute($context["qa"], "targetObject", array());
                        // line 451
                        echo "                                                            <option value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["qa"], "id", array()), "html", null, true);
                        echo "\" ";
                        if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()) == $this->getAttribute($context["qa"], "id", array()))) {
                            echo "selected=\"selected\"";
                        }
                        echo ">";
                        // line 452
                        echo twig_escape_filter($this->env, $this->getAttribute($context["qa"], "quantityOfPieces", array()), "html", null, true);
                        echo " ";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "unitOfMeasure", array()), ("shortCaption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                        echo " ";
                        if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()) != $this->getAttribute($context["qa"], "id", array()))) {
                            echo " (";
                            echo twig_escape_filter($this->env, (($this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction($context["qa"], "current")) . " ") . $this->env->getExtension('money_extension')->currencyFormatFunction()), "html", null, true);
                            echo ")";
                        }
                        // line 453
                        echo "                                                            </option>
                                                        ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['qa'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 455
                echo "
                                                    </select>
                                                </div>

                                            ";
            }
            // line 460
            echo "
                                        </div>

                                    ";
        }
        // line 464
        echo "
                                    <div class=\"product_buy_action\" itemprop=\"offers\" itemscope itemtype=\"http://schema.org/Offer\">
                                        <div class=\"product_buy_price\">
                                            <meta itemprop=\"price\" content=\"";
        // line 467
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "price", array()), "html", null, true);
        echo "\" />
                                            <meta itemprop=\"priceCurrency\" content=\"RUB\" />
                                            <h4 class=\"h4price\">Цена:</h4>

                                            ";
        // line 471
        if ($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "old")) {
            // line 472
            echo "
                                                <div class=\"product_price old\">";
            // line 473
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "old")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "</div>

                                            ";
        }
        // line 476
        echo "
                                            <div class=\"product_price\">";
        // line 477
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "current")), "html", null, true);
        echo " <span>";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</span></div>
                                        </div>

                                        ";
        // line 480
        if ((!$this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "isDiscontinued", array()))) {
            // line 481
            echo "
                                            ";
            // line 482
            if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "orderOnly", array()) && (!$this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "OOPBQuantity", array())))) {
                // line 483
                echo "                                                ";
                if ((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm"))) {
                    // line 484
                    echo "                                                <div class=\"clear\"></div>
                                                <br>
                                                <form class=\"product-in-order\" id=\"pre_order_form\">
                                                    Вы можете купить товар <strong>Под заказ</strong>.
                                                    Для оформление заказа укажите ваши данные.
                                                    <br>
                                                    <br>
                                                    ";
                    // line 491
                    $this->env->getExtension('form')->renderer->setTheme((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), array(0 => "CoreOrderBundle:Form:row.html.twig"));
                    // line 492
                    echo "                                                    ";
                    if ($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : null), "contactList", array(), "any", true, true)) {
                        // line 493
                        echo "                                                        <div class=\"like_text_input_rounded_wr\">
                                                            ";
                        // line 494
                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "contactList", array()), 'label');
                        echo "
                                                            <div class=\"rounded_select\">
                                                                <div class=\"rounded_select_in\">
                                                                ";
                        // line 497
                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "contactList", array()), 'widget');
                        echo "
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ";
                    }
                    // line 502
                    echo "                                                    <div class=\"like_text_input_rounded_wr\">
                                                        ";
                    // line 503
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "preOrder", array()), "email", array()), 'label');
                    echo "
                                                        ";
                    // line 504
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "preOrder", array()), "email", array()), 'widget');
                    echo "
                                                    </div>
                                                    <div class=\"like_text_input_rounded_wr\">
                                                        ";
                    // line 507
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "preOrder", array()), "phone", array()), 'label');
                    echo "
                                                        ";
                    // line 508
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "preOrder", array()), "phone", array()), 'widget');
                    echo "
                                                    </div>
                                                    <div class=\"like_text_input_rounded_wr\">
                                                        ";
                    // line 511
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "preOrder", array()), "fio", array()), 'label');
                    echo "
                                                        ";
                    // line 512
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "preOrder", array()), "fio", array()), 'widget');
                    echo "
                                                    </div>
                                                    <div class=\"like_text_input_rounded_wr\">
                                                        ";
                    // line 515
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "preOrder", array()), "city", array()), 'label');
                    echo "
                                                        <div class=\"like_text_input_rounded select2\">
                                                            ";
                    // line 517
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "preOrder", array()), "city", array()), 'widget');
                    echo "
                                                        </div>
                                                    </div>
                                                    <div class=\"like_text_input_rounded_wr\">
                                                        ";
                    // line 521
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "preOrder", array()), "address", array()), 'label');
                    echo "
                                                        ";
                    // line 522
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "preOrder", array()), "address", array()), 'widget');
                    echo "
                                                    </div>
                                                    <div class=\"like_text_input_rounded_wr\">
                                                        ";
                    // line 525
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), "preOrder", array()), "compositions", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["preOrderComposition"]) {
                        // line 526
                        echo "                                                            ";
                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["preOrderComposition"], "quantity", array()), 'label');
                        echo "
                                                            ";
                        // line 527
                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["preOrderComposition"], "quantity", array()), 'widget');
                        echo "
                                                            ";
                        // line 528
                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["preOrderComposition"], "product", array()), 'widget');
                        echo "
                                                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['preOrderComposition'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 530
                    echo "                                                        ";
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["preOrderForm"]) ? $context["preOrderForm"] : $this->getContext($context, "preOrderForm")), 'rest');
                    echo "
                                                    </div>
                                                    <div class=\"like_text_input_rounded_wr\">
                                                        <label class=\"control-label \"><strong>Итого</strong></label>
                                                        <span id=\"pre_order_total_cost\">";
                    // line 534
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "current")), "html", null, true);
                    echo " <span>";
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                    echo "</span></span>
                                                    </div>
                                                    <button id=\"buy-in-order\"
                                                            class=\"common_button big button_cart\"
                                                            ";
                    // line 538
                    if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "environment", array()) == "prod")) {
                        echo " onclick=\"yaCounter23357440.reachGoal('preorder'); return true;\" ";
                    }
                    // line 539
                    echo "                                                            data-id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()), "html", null, true);
                    echo "\"
                                                            data-url=\"";
                    // line 540
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
                    // line 565
                    echo "                                                <div id=\"byOrderMessage\"></div>
                                                ";
                }
                // line 567
                echo "
                                            ";
            } elseif (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "AvailabilityQuantity", array()) > 0)) {
                // line 569
                echo "
                                                ";
                // line 570
                if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "orderOnly", array())) {
                    // line 571
                    echo "
                                                    <div class=\"clearfix\"></div>

                                                    <!--noindex-->

                                                    <span class=\"confines_min_sum\">";
                    // line 578
                    if ((!$this->getAttribute((isset($context["confines"]) ? $context["confines"] : $this->getContext($context, "confines")), "canCreateOrder", array()))) {
                        // line 580
                        echo $this->getAttribute((isset($context["confines"]) ? $context["confines"] : $this->getContext($context, "confines")), "msg", array());
                    }
                    // line 584
                    echo "</span>

                                                    <!--/noindex-->

                                                ";
                }
                // line 589
                echo "
                                                <button id=\"update-cart\" class=\"common_button big button_cart\"
                                                        data-id=\"";
                // line 591
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()), "html", null, true);
                echo "\"
                                                        data-url=\"";
                // line 592
                echo $this->env->getExtension('routing')->getPath("core_product_update_cart");
                echo "\"
                                                        ";
                // line 593
                if (($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "products", array(), "any", true, true) && $this->getAttribute($this->getAttribute((isset($context["order"]) ? $context["order"] : null), "products", array(), "any", false, true), $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()), array(), "array", true, true))) {
                    // line 594
                    $context["isInCart"] = true;
                    // line 595
                    echo "                                                            data-is-in-cart=\"1\"
                                                        ";
                }
                // line 597
                echo "data-is-in-cart-text=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Product add in cart", array("%URL%" => $this->env->getExtension('routing')->getPath("core_order_cart")), "frontend"), "html", null, true);
                echo "\"
                                                        ><span><i class=\"button_icon\"></i><b class=\"in-cart-text\">";
                // line 598
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Add in cart", array(), "frontend"), "html", null, true);
                echo "</b></span></button>

                                                <div class=\"clear\"></div>
                                                <div class=\"ajax-result-cart\">
                                                    <div class=\"ajax-success\"";
                // line 602
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
            // line 607
            echo "
                                        ";
        }
        // line 609
        echo "
                                        <div class=\"product_availability with_icon ";
        // line 610
        if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "AvailabilityQuantity", array()) == 0)) {
            echo "not_instock";
        } else {
            echo "instock";
        }
        echo "\">
                                            Артикул: ";
        // line 611
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()), "html", null, true);
        echo ". ";
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "sku", array())) {
            echo " SKU (";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "sku", array()), "html", null, true);
            echo ")";
        }
        // line 612
        echo "                                            <br>

                                            ";
        // line 614
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "isDiscontinued", array())) {
            // line 615
            echo "
                                                <span><link itemprop=\"availability\" href=\"http://schema.org/Discontinued\" />Снят с производства</span>

                                            ";
        } elseif ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "orderOnly", array())) {
            // line 619
            echo "                                                ";
            if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "OOPBQuantity", array())) {
                // line 620
                echo "                                                <span>
                                                    <link itemprop=\"availability\" href=\"http://schema.org/InStock\" />На складе ";
                // line 621
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "OOPBQuantity", array()), "html", null, true);
                if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "unitOfMeasure", array())) {
                    echo "&nbsp;";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "unitOfMeasure", array()), ("shortCaption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
                }
                // line 622
                echo "                                                </span>
                                                <br />
                                                ";
            }
            // line 625
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
            // line 627
            echo "                                            <span class=\"instock-text\">";
            if (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "AvailabilityQuantity", array()) != 0)) {
                echo "<link itemprop=\"availability\" href=\"http://schema.org/InStock\" />";
            }
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("In stock", array(), "frontend"), "html", null, true);
            echo "</span>
                                            <span class=\"not-instock-text\">";
            // line 628
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
        // line 630
        echo "
                                        </div>

                                    </div>

                                    ";
        // line 635
        if (((($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "AvailabilityQuantity", array()) == 0) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "isDiscontinued", array())) && twig_length_filter($this->env, (isset($context["similars"]) ? $context["similars"] : $this->getContext($context, "similars"))))) {
            // line 636
            echo "
                                        <section class=\"showcase_compact_box products_grid row_three\">
                                            <h2>";
            // line 638
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Alternative product", array(), "frontend"), "html", null, true);
            echo "</h2>
                                            <div class=\"products_grid_line grid_container\">

                                                ";
            // line 642
            echo "                                                ";
            $context["productItemContainerClass"] = "product_min";
            // line 643
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
                // line 644
                $context["product"] = $this->getAttribute($context["product"], "targetObject", array());
                // line 645
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
            // line 648
            echo "
                                            </div>

                                            ";
            // line 651
            if ((twig_length_filter($this->env, (isset($context["similars"]) ? $context["similars"] : $this->getContext($context, "similars"))) > 3)) {
                // line 652
                echo "
                                                <span class=\"showcase_compact_nav prev disabled\">";
                // line 653
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next's", array(), "frontend"), "html", null, true);
                echo "</span>
                                                <span class=\"showcase_compact_nav next disabled\">";
                // line 654
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Prev's", array(), "frontend"), "html", null, true);
                echo "</span>

                                            ";
            }
            // line 657
            echo "
                                        </section>

                                    ";
        }
        // line 661
        echo "
                                    ";
        // line 662
        if ((($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "AvailabilityQuantity", array()) > 0) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "orderOnly", array()))) {
            // line 663
            echo "
                                        <div class=\"product_buy_delivery\" data-product-price=\"";
            // line 664
            echo twig_escape_filter($this->env, $this->env->getExtension('product_extension')->computeDiscountForProductAndGetCurrentPriceFunction((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "current"), "html", null, true);
            echo "\" data-product-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()), "html", null, true);
            echo "\">
                                            <p>";
            // line 665
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("deliveryText", array(), "frontend"), "html", null, true);
            echo " <a rel=\"nofollow\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_faq_article", array("articleSlug" => $this->getAttribute((isset($context["deliveryArticle"]) ? $context["deliveryArticle"] : $this->getContext($context, "deliveryArticle")), "slug", array()), "categorySlug" => $this->getAttribute($this->getAttribute((isset($context["deliveryArticle"]) ? $context["deliveryArticle"] : $this->getContext($context, "deliveryArticle")), "category", array()), "slug", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("MoreDelivery", array(), "frontend"), "html", null, true);
            echo "</a></p>
                                            ";
            // line 695
            echo "                                        </div>


                                        ";
            // line 731
            echo "                                    ";
        }
        // line 732
        echo "                                </section>
                                <ul class=\"product_toolbox\">
                                    <li class=\"product_tool\">
                                        <span id=\"update-favorite\" class=\"product_favor with_icon text_tgl\"
                                              data-add-url=\"";
        // line 736
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_product_update_favorites", array("action" => "add", "id" => $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()), "_format" => "json")), "html", null, true);
        echo "\"
                                              data-remove-url=\"";
        // line 737
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_product_update_favorites", array("action" => "remove", "id" => $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()), "_format" => "json")), "html", null, true);
        echo "\"
                                              data-add-text=\"";
        // line 738
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("In favorites", array(), "frontend"), "html", null, true);
        echo "\"
                                              data-remove-text=\"";
        // line 739
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("From favorites", array(), "frontend"), "html", null, true);
        echo "\"
                                                ";
        // line 740
        if (twig_in_filter($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()), (isset($context["favoriteProductsIds"]) ? $context["favoriteProductsIds"] : $this->getContext($context, "favoriteProductsIds")))) {
            // line 741
            echo "data-is-in-favorite=\"1\"
                                                ";
        } else {
            // line 743
            echo "data-is-in-favorite=\"0\"
                                                ";
        }
        // line 745
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "security", array(), "any", false, true), "token", array(), "any", false, true), "user", array(), "any", false, true), "id", array(), "any", true, true)) {
            // line 746
            echo "data-is-logged=\"1\"
                                                ";
        } else {
            // line 748
            echo "data-is-logged=\"0\"
                                                    data-login-url=\"";
            // line 749
            echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
            echo "\"
                                                ";
        }
        // line 751
        echo ">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("In favorites", array(), "frontend"), "html", null, true);
        echo "</span>
                                    </li>
                                    <!--noindex-->
                                    <li class=\"product_tool\">
                                        <a rel=\"nofollow\" class=\"product_ask with_icon text_tgl\" href=\"";
        // line 755
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("trouble_ticket_contact_with_product_id", array("product_id" => $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()))), "html", null, true);
        echo "#ask-a-question\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ask a question", array(), "frontend"), "html", null, true);
        echo "</a>
                                    </li>
                                    <!--/noindex-->
                                    ";
        // line 766
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
        // line 778
        if (($this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "modificationUnion", array()), "general", array()) && (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "modificationUnion", array()) && $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "modificationUnion", array()), "general", array())) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "modificationUnion", array()), "general", array()), "id", array()) != $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()))))) {
            // line 779
            echo "
                    <!--noindex-->

                ";
        }
        // line 783
        echo "
                <!-- product details and products promo -->
                <div class=\"product_info\">
                    <div class=\"product_page_pad cols_container\">
                        <!-- products details col -->
                        <section class=\"product_details main_col\">
                            <div class=\"main_col_pad\">
                                <article itemprop=\"description\" class=\"def_style\">
                                    ";
        // line 791
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
        // line 803
        if (twig_length_filter($this->env, (isset($context["series"]) ? $context["series"] : $this->getContext($context, "series")))) {
            // line 804
            echo "
                                    <section class=\"showcase_compact_box products_grid row_three\">
                                        <h2>";
            // line 806
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("From the series", array(), "frontend"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "serie", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "html", null, true);
            echo "</h2>
                                        <div class=\"products_grid_line grid_container\">

                                            ";
            // line 810
            echo "                                            ";
            $context["productItemContainerClass"] = "product_min";
            // line 811
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
                // line 812
                echo "
                                                ";
                // line 813
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
            // line 816
            echo "
                                        </div>

                                        ";
            // line 819
            if ((twig_length_filter($this->env, (isset($context["series"]) ? $context["series"] : $this->getContext($context, "series"))) > 3)) {
                // line 820
                echo "
                                            <span class=\"showcase_compact_nav prev disabled\">";
                // line 821
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next's", array(), "frontend"), "html", null, true);
                echo "</span>
                                            <span class=\"showcase_compact_nav next disabled\">";
                // line 822
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Prev's", array(), "frontend"), "html", null, true);
                echo "</span>

                                        ";
            }
            // line 825
            echo "
                                    </section>


                                ";
        }
        // line 830
        echo "
                                <!-- /similar products -->

                                <!-- similar products -->
                                ";
        // line 834
        if (twig_length_filter($this->env, (isset($context["alternative"]) ? $context["alternative"] : $this->getContext($context, "alternative")))) {
            // line 835
            echo "
                                    <section class=\"showcase_compact_box products_grid row_three\">
                                        <h2>";
            // line 837
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Similar toys", array(), "frontend"), "html", null, true);
            echo "</h2>
                                        <div class=\"products_grid_line grid_container\">

                                            ";
            // line 841
            echo "                                            ";
            $context["productItemContainerClass"] = "product_min";
            // line 842
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
                // line 843
                echo "
                                                ";
                // line 844
                $context["product"] = $this->getAttribute($context["product"], "targetObject", array());
                // line 845
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
            // line 848
            echo "
                                        </div>

                                        ";
            // line 851
            if ((twig_length_filter($this->env, (isset($context["alternative"]) ? $context["alternative"] : $this->getContext($context, "alternative"))) > 3)) {
                // line 852
                echo "
                                            <span class=\"showcase_compact_nav prev disabled\">";
                // line 853
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next's", array(), "frontend"), "html", null, true);
                echo "</span>
                                            <span class=\"showcase_compact_nav next disabled\">";
                // line 854
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Prev's", array(), "frontend"), "html", null, true);
                echo "</span>

                                        ";
            }
            // line 857
            echo "
                                    </section>

                                ";
        }
        // line 861
        echo "                                <!-- /similar products -->

                            </div>
                        </div>
                        <!-- /products promo col -->

                    </div>
                </div>
                <!-- /product details and products promo -->
                ";
        // line 870
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "remoteVideos", array()))) {
            // line 871
            echo "                    <div class=\"product_info\">
                        <div class=\"product_page_pad cols_container\">
                            <div class=\"main_col_pad\">
                                <h3>Видео обзор ";
            // line 874
            echo twig_escape_filter($this->env, (isset($context["captionCaseGenitive"]) ? $context["captionCaseGenitive"] : $this->getContext($context, "captionCaseGenitive")), "html", null, true);
            echo "</h3>
                                ";
            // line 875
            $context["remoteVideoCounter"] = 1;
            // line 876
            echo "                                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "remoteVideos", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["remoteVideo"]) {
                // line 877
                echo "                                    ";
                if (((isset($context["remoteVideoCounter"]) ? $context["remoteVideoCounter"] : $this->getContext($context, "remoteVideoCounter")) <= 3)) {
                    // line 878
                    echo "                                    ";
                    $context["remoteVideoCaption"] = $this->getAttribute($context["remoteVideo"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
                    // line 879
                    echo "                                        <div class=\"product_video_wr\" ";
                    if ((isset($context["remoteVideoCaption"]) ? $context["remoteVideoCaption"] : $this->getContext($context, "remoteVideoCaption"))) {
                        echo "title=\"";
                        echo twig_escape_filter($this->env, (isset($context["remoteVideoCaption"]) ? $context["remoteVideoCaption"] : $this->getContext($context, "remoteVideoCaption")), "html", null, true);
                        echo "\"";
                    }
                    echo ">
                                            <iframe width=\"300\" height=\"210\" src=\"";
                    // line 880
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["remoteVideo"], "videoHosting", array()), "playerUri", array()), "html", null, true);
                    echo twig_escape_filter($this->env, $this->getAttribute($context["remoteVideo"], "code", array()), "html", null, true);
                    echo "\" frameborder=\"0\"></iframe>
                                        </div>
                                    ";
                }
                // line 883
                echo "                                    ";
                $context["remoteVideoCounter"] = ((isset($context["remoteVideoCounter"]) ? $context["remoteVideoCounter"] : $this->getContext($context, "remoteVideoCounter")) + 1);
                // line 884
                echo "                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['remoteVideo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 885
            echo "                            </div>
                        </div>
                    </div>
                ";
        }
        // line 889
        echo "                <div class=\"product_spec_info product_info\">
                    <div class=\"padding_content\">
                        <div class=\"cols_container\">

                            ";
        // line 893
        if ($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : null), "skills", array(), "array", true, true)) {
            // line 894
            echo "                                ";
            // line 918
            echo "
                                <div class=\"product_skills grid_item\">
                                    <h3>";
            // line 920
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("This toy will help your child to develop skills", array(), "frontend"), "html", null, true);
            echo "</h3>
                                    <ul class=\"product_skills_list\">

                                        ";
            // line 923
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["extraProperties"]) ? $context["extraProperties"] : $this->getContext($context, "extraProperties")), "skills", array(), "array"));
            foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                // line 924
                echo "                                            <li class=\"product_skill skill_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "name", array()), "html", null, true);
                echo "\">
                                                ";
                // line 925
                if ((($this->getAttribute($context["data"], "articleKey", array()) && $this->getAttribute((isset($context["articles"]) ? $context["articles"] : null), $this->getAttribute($context["data"], "articleKey", array()), array(), "array", true, true)) && $this->getAttribute((isset($context["articles"]) ? $context["articles"] : $this->getContext($context, "articles")), $this->getAttribute($context["data"], "articleKey", array()), array(), "array"))) {
                    // line 926
                    echo "                                                    ";
                    $context["curArticle"] = $this->getAttribute((isset($context["articles"]) ? $context["articles"] : $this->getContext($context, "articles")), $this->getAttribute($context["data"], "articleKey", array()), array(), "array");
                    // line 927
                    echo "                                                    <h4>
                                                        <!--noindex-->
                                                            <a rel=\"nofollow\" href=\"";
                    // line 929
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_faq_article", array("articleSlug" => $this->getAttribute((isset($context["curArticle"]) ? $context["curArticle"] : $this->getContext($context, "curArticle")), "slug", array()), "categorySlug" => $this->getAttribute($this->getAttribute((isset($context["curArticle"]) ? $context["curArticle"] : $this->getContext($context, "curArticle")), "category", array()), "slug", array()))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "value", array()), "html", null, true);
                    echo "</a>
                                                        <!--/noindex-->
                                                    </h4>
                                                    ";
                } else {
                    // line 933
                    echo "                                                        <h4>";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "value", array()), "html", null, true);
                    echo "</h4>
                                                ";
                }
                // line 935
                echo "
                                                ";
                // line 936
                if ($this->getAttribute($context["data"], "shortDescription", array())) {
                    // line 937
                    echo "
                                                    <p>";
                    // line 938
                    echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "shortDescription", array()), "html", null, true);
                    echo "</p>

                                                ";
                }
                // line 941
                echo "
                                                <span class=\"skill_icon\">&nbsp;</span>
                                            </li>

                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 946
            echo "
                                    </ul>
                                </div>


                            ";
        }
        // line 952
        echo "
                            <div class=\"product_techinfo grid_item\">

                                ";
        // line 955
        if (((((((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "countryOfOrigin", array())) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "warrantyMonths", array())) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "netWeight", array())) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "grossWeight", array())) || (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "heightOfProduct", array()) && $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "widthOfProduct", array())) && $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "lengthOfProduct", array())))) {
            // line 956
            echo "
                                    <h3>";
            // line 957
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Characteristics", array(), "frontend"), "html", null, true);
            echo "</h3>
                                    <ul class=\"list_simple\">
                                        ";
            // line 959
            if ((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties"))) {
                // line 960
                echo "                                            ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")));
                foreach ($context['_seq'] as $context["name"] => $context["property"]) {
                    // line 961
                    echo "                                                ";
                    if (($this->getAttribute($context["property"], "values", array()) || $this->getAttribute($context["property"], "value", array()))) {
                        // line 962
                        echo "
                                                    <li><strong>";
                        // line 963
                        echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "caption", array()), "html", null, true);
                        echo ": </strong>

                                                        ";
                        // line 965
                        if ((($context["name"] && ($context["name"] == "brand")) && $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "brand", array()))) {
                            // line 966
                            echo "
                                                            <a href=\"";
                            // line 967
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand_first_page", array("slug" => $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "brand", array()), "slug", array()))), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute($context["property"], "values", array()), ", "), "html", null, true);
                            echo "</a>

                                                        ";
                        } else {
                            // line 970
                            echo "                                                            ";
                            if ((twig_length_filter($this->env, $this->getAttribute($context["property"], "values", array())) > 0)) {
                                // line 971
                                echo "                                                                ";
                                echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute($context["property"], "values", array()), ", "), "html", null, true);
                                echo "
                                                            ";
                            } else {
                                // line 973
                                echo "                                                                ";
                                if (($this->getAttribute($context["property"], "type", array()) == "input")) {
                                    // line 974
                                    echo "                                                                    ";
                                    echo twig_escape_filter($this->env, $this->env->getExtension('format_extension')->numberFormatFunction($this->getAttribute($context["property"], "value", array()), true, 2, ",", ""), "html", null, true);
                                    echo "
                                                                ";
                                } else {
                                    // line 976
                                    echo "                                                                    ";
                                    echo $this->getAttribute($context["property"], "value", array());
                                    echo "
                                                                ";
                                }
                                // line 978
                                echo "                                                            ";
                            }
                            // line 979
                            echo "                                                            ";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "unit", array()), "html", null, true);
                            echo "

                                                        ";
                        }
                        // line 982
                        echo "
                                                    </li>

                                                ";
                    }
                    // line 986
                    echo "                                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['name'], $context['property'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 987
                echo "                                        ";
            }
            // line 988
            echo "
                                        ";
            // line 989
            if ((($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "heightOfProduct", array()) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "widthOfProduct", array())) || $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "lengthOfProduct", array()))) {
                // line 990
                echo "
                                            <li><strong>";
                // line 991
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Size", array(), "frontend"), "html", null, true);
                echo ": </strong>";
                echo twig_escape_filter($this->env, $this->env->getExtension('format_extension')->dimensionsFormatFunction($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "heightOfProduct", array()), $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "widthOfProduct", array()), $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "lengthOfProduct", array())), "html", null, true);
                echo "</li>

                                        ";
            }
            // line 994
            echo "
                                        ";
            // line 995
            if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "netWeight", array())) {
                // line 996
                echo "
                                            <li><strong>";
                // line 997
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Net weight", array(), "frontend"), "html", null, true);
                echo ": </strong>";
                echo twig_escape_filter($this->env, $this->env->getExtension('format_extension')->weightFormatFunction($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "netWeight", array()), $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "isNetWeightInGm", array())), "html", null, true);
                echo "</li>

                                        ";
            }
            // line 1000
            echo "
                                        ";
            // line 1001
            if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "grossWeight", array())) {
                // line 1002
                echo "
                                            <li><strong>";
                // line 1003
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Gross weight", array(), "frontend"), "html", null, true);
                echo ": </strong>";
                echo twig_escape_filter($this->env, $this->env->getExtension('format_extension')->weightFormatFunction($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "grossWeight", array()), $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "isNetWeightInGm", array())), "html", null, true);
                echo "</li>

                                        ";
            }
            // line 1006
            echo "
                                        ";
            // line 1007
            if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "warrantyMonths", array())) {
                // line 1008
                echo "
                                            <li><strong>";
                // line 1009
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Гарантия", array(), "frontend"), "html", null, true);
                echo ": </strong>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "warrantyMonths", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "warrantyMonths", array()), array(0 => "месяц", 1 => "месяца", 2 => "месяцев")), "html", null, true);
                echo "</li>

                                        ";
            }
            // line 1012
            echo "                                        ";
            if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "countryOfOrigin", array())) {
                // line 1013
                echo "                                            <li><strong>";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Страна происхождения", array(), "frontend"), "html", null, true);
                echo ": </strong> ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "countryOfOrigin", array()), "getCaption", array(0 => "ru"), "method"), "html", null, true);
                echo "</li>
                                        ";
            }
            // line 1015
            echo "                                        ";
            if ($this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "instruction", array()), "count", array())) {
                // line 1016
                echo "                                            ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "instruction", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                    // line 1017
                    echo "                                                <li>
                                                    <a href=\"";
                    // line 1018
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
                // line 1021
                echo "                                        ";
            }
            // line 1022
            echo "
                                    </ul>

                                ";
        }
        // line 1026
        echo "                                ";
        // line 1042
        echo "
                            </div>

                            ";
        // line 1045
        if ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("complectation" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())))) {
            // line 1046
            echo "
                                <div class=\"product_techinfo grid_item list_simple_format\">
                                    <h3>Комплектация ";
            // line 1048
            echo twig_escape_filter($this->env, $this->env->getExtension('language_switcher_extension')->getCaseByKey($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("captionCase" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array()))), "genitive"), "html", null, true);
            echo "</h3>
                                    ";
            // line 1049
            echo $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), ("complectation" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "locale", array())));
            echo "
                                </div>

                            ";
        }
        // line 1053
        echo "
                        </div>
                    </div>
                </div>

                ";
        // line 1058
        if (($this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "modificationUnion", array()), "general", array()) && (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "modificationUnion", array()) && $this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "modificationUnion", array()), "general", array())) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "modificationUnion", array()), "general", array()), "id", array()) != $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : $this->getContext($context, "currentProduct")), "id", array()))))) {
            // line 1059
            echo "
                    <!--/noindex-->

                ";
        }
        // line 1063
        echo "
            </section>
            <!-- product opinions & discussions -->
            ";
        // line 1066
        $this->displayBlock("reviews_layout", $context, $blocks);
        echo "
            <!-- /product reviews & discussions -->


            <!-- last viewed showcase -->
            ";
        // line 1071
        if ((isset($context["recentlyViewed"]) ? $context["recentlyViewed"] : $this->getContext($context, "recentlyViewed"))) {
            // line 1072
            echo "
                <div class=\"showcase_lastviewed showcase_horizontal showcase_box\">
                    <div class=\"product_page_pad products_grid row_five\">
                        <h2>";
            // line 1075
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Recently viewed", array(), "frontend"), "html", null, true);
            echo "</h2>
                        <div class=\"showcase_container\">

                            ";
            // line 1078
            if ((twig_length_filter($this->env, (isset($context["recentlyViewed"]) ? $context["recentlyViewed"] : $this->getContext($context, "recentlyViewed"))) > 7)) {
                // line 1079
                echo "
                                <span class=\"showcase_nav prev disabled\"><span class=\"showcase_nav_btn\">";
                // line 1080
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next's", array(), "frontend"), "html", null, true);
                echo "</span></span>
                                <span class=\"showcase_nav next disabled\"><span class=\"showcase_nav_btn\">";
                // line 1081
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Prev's", array(), "frontend"), "html", null, true);
                echo "</span></span>

                            ";
            }
            // line 1084
            echo "
                            <div class=\"products_wrapper\">
                                <div class=\"products_grid_line grid_container\">

                                    ";
            // line 1089
            echo "                                    ";
            $context["productItemContainerClass"] = "product_min";
            // line 1090
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
                // line 1091
                echo "
                                        ";
                // line 1092
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
            // line 1095
            echo "
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            ";
        }
        // line 1103
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
        return array (  2346 => 1103,  2336 => 1095,  2319 => 1092,  2316 => 1091,  2298 => 1090,  2295 => 1089,  2289 => 1084,  2283 => 1081,  2279 => 1080,  2276 => 1079,  2274 => 1078,  2268 => 1075,  2263 => 1072,  2261 => 1071,  2253 => 1066,  2248 => 1063,  2242 => 1059,  2240 => 1058,  2233 => 1053,  2226 => 1049,  2222 => 1048,  2218 => 1046,  2216 => 1045,  2211 => 1042,  2209 => 1026,  2203 => 1022,  2200 => 1021,  2189 => 1018,  2186 => 1017,  2181 => 1016,  2178 => 1015,  2170 => 1013,  2167 => 1012,  2157 => 1009,  2154 => 1008,  2152 => 1007,  2149 => 1006,  2141 => 1003,  2138 => 1002,  2136 => 1001,  2133 => 1000,  2125 => 997,  2122 => 996,  2120 => 995,  2117 => 994,  2109 => 991,  2106 => 990,  2104 => 989,  2101 => 988,  2098 => 987,  2092 => 986,  2086 => 982,  2079 => 979,  2076 => 978,  2070 => 976,  2064 => 974,  2061 => 973,  2055 => 971,  2052 => 970,  2044 => 967,  2041 => 966,  2039 => 965,  2034 => 963,  2031 => 962,  2028 => 961,  2023 => 960,  2021 => 959,  2016 => 957,  2013 => 956,  2011 => 955,  2006 => 952,  1998 => 946,  1988 => 941,  1982 => 938,  1979 => 937,  1977 => 936,  1974 => 935,  1968 => 933,  1959 => 929,  1955 => 927,  1952 => 926,  1950 => 925,  1945 => 924,  1941 => 923,  1935 => 920,  1931 => 918,  1929 => 894,  1927 => 893,  1921 => 889,  1915 => 885,  1909 => 884,  1906 => 883,  1899 => 880,  1890 => 879,  1887 => 878,  1884 => 877,  1879 => 876,  1877 => 875,  1873 => 874,  1868 => 871,  1866 => 870,  1855 => 861,  1849 => 857,  1843 => 854,  1839 => 853,  1836 => 852,  1834 => 851,  1829 => 848,  1811 => 845,  1809 => 844,  1806 => 843,  1788 => 842,  1785 => 841,  1779 => 837,  1775 => 835,  1773 => 834,  1767 => 830,  1760 => 825,  1754 => 822,  1750 => 821,  1747 => 820,  1745 => 819,  1740 => 816,  1723 => 813,  1720 => 812,  1702 => 811,  1699 => 810,  1691 => 806,  1687 => 804,  1685 => 803,  1670 => 791,  1660 => 783,  1654 => 779,  1652 => 778,  1638 => 766,  1630 => 755,  1622 => 751,  1617 => 749,  1614 => 748,  1610 => 746,  1608 => 745,  1604 => 743,  1600 => 741,  1598 => 740,  1594 => 739,  1590 => 738,  1586 => 737,  1582 => 736,  1576 => 732,  1573 => 731,  1568 => 695,  1560 => 665,  1554 => 664,  1551 => 663,  1549 => 662,  1546 => 661,  1540 => 657,  1534 => 654,  1530 => 653,  1527 => 652,  1525 => 651,  1520 => 648,  1502 => 645,  1500 => 644,  1480 => 643,  1477 => 642,  1471 => 638,  1467 => 636,  1465 => 635,  1458 => 630,  1441 => 628,  1433 => 627,  1421 => 625,  1416 => 622,  1410 => 621,  1407 => 620,  1404 => 619,  1398 => 615,  1396 => 614,  1392 => 612,  1384 => 611,  1376 => 610,  1373 => 609,  1369 => 607,  1356 => 602,  1349 => 598,  1344 => 597,  1340 => 595,  1338 => 594,  1336 => 593,  1332 => 592,  1328 => 591,  1324 => 589,  1317 => 584,  1314 => 580,  1312 => 578,  1305 => 571,  1303 => 570,  1300 => 569,  1296 => 567,  1292 => 565,  1280 => 540,  1275 => 539,  1271 => 538,  1262 => 534,  1254 => 530,  1246 => 528,  1242 => 527,  1237 => 526,  1233 => 525,  1227 => 522,  1223 => 521,  1216 => 517,  1211 => 515,  1205 => 512,  1201 => 511,  1195 => 508,  1191 => 507,  1185 => 504,  1181 => 503,  1178 => 502,  1170 => 497,  1164 => 494,  1161 => 493,  1158 => 492,  1156 => 491,  1147 => 484,  1144 => 483,  1142 => 482,  1139 => 481,  1137 => 480,  1129 => 477,  1126 => 476,  1118 => 473,  1115 => 472,  1113 => 471,  1106 => 467,  1101 => 464,  1095 => 460,  1088 => 455,  1080 => 453,  1070 => 452,  1062 => 451,  1060 => 447,  1055 => 446,  1045 => 442,  1042 => 441,  1021 => 438,  1019 => 434,  1014 => 433,  1007 => 430,  1005 => 429,  1002 => 426,  998 => 424,  996 => 423,  993 => 422,  986 => 421,  983 => 420,  977 => 419,  975 => 418,  971 => 416,  965 => 413,  961 => 411,  957 => 405,  942 => 402,  939 => 401,  935 => 400,  929 => 397,  925 => 395,  923 => 394,  920 => 393,  913 => 388,  892 => 385,  889 => 384,  885 => 383,  879 => 380,  875 => 378,  873 => 377,  868 => 374,  866 => 373,  859 => 368,  853 => 364,  846 => 360,  842 => 359,  838 => 357,  836 => 356,  833 => 355,  826 => 351,  823 => 350,  812 => 347,  809 => 346,  805 => 345,  800 => 342,  798 => 341,  795 => 340,  788 => 336,  785 => 335,  776 => 332,  773 => 331,  769 => 330,  762 => 328,  759 => 327,  756 => 326,  753 => 325,  750 => 324,  747 => 323,  745 => 322,  742 => 321,  739 => 320,  737 => 319,  732 => 316,  730 => 315,  727 => 314,  721 => 311,  718 => 310,  716 => 309,  704 => 299,  695 => 292,  685 => 288,  680 => 287,  675 => 286,  671 => 285,  668 => 284,  661 => 282,  655 => 278,  651 => 276,  649 => 275,  636 => 273,  633 => 272,  627 => 270,  625 => 269,  620 => 267,  617 => 266,  614 => 265,  611 => 264,  608 => 263,  605 => 262,  603 => 261,  600 => 260,  598 => 259,  595 => 258,  591 => 257,  585 => 253,  579 => 250,  575 => 249,  572 => 248,  570 => 247,  565 => 244,  563 => 243,  560 => 242,  555 => 238,  549 => 234,  547 => 233,  543 => 231,  537 => 230,  534 => 228,  532 => 227,  526 => 226,  523 => 225,  517 => 222,  514 => 221,  512 => 220,  503 => 216,  497 => 212,  495 => 211,  492 => 210,  489 => 209,  486 => 208,  483 => 207,  480 => 206,  477 => 205,  475 => 204,  468 => 200,  465 => 199,  463 => 198,  458 => 197,  456 => 196,  449 => 191,  437 => 186,  431 => 184,  427 => 181,  423 => 180,  419 => 178,  417 => 177,  412 => 174,  404 => 167,  402 => 166,  396 => 165,  394 => 163,  390 => 160,  383 => 157,  378 => 153,  376 => 151,  370 => 145,  361 => 139,  358 => 138,  347 => 135,  344 => 134,  340 => 133,  334 => 129,  332 => 128,  329 => 127,  326 => 126,  322 => 125,  319 => 124,  314 => 121,  312 => 120,  310 => 118,  308 => 117,  306 => 116,  303 => 114,  265 => 112,  261 => 104,  258 => 103,  254 => 98,  248 => 95,  244 => 93,  241 => 92,  227 => 90,  223 => 89,  218 => 87,  214 => 86,  210 => 85,  206 => 84,  203 => 83,  201 => 82,  197 => 81,  194 => 80,  191 => 79,  184 => 75,  181 => 74,  179 => 72,  159 => 70,  154 => 65,  151 => 64,  146 => 61,  144 => 56,  139 => 53,  136 => 52,  133 => 51,  115 => 46,  112 => 44,  110 => 43,  108 => 42,  105 => 41,  98 => 36,  95 => 34,  93 => 33,  91 => 32,  88 => 31,  80 => 26,  77 => 24,  75 => 23,  73 => 22,  70 => 21,  65 => 20,  63 => 19,  61 => 18,  59 => 17,  57 => 16,  55 => 15,  53 => 14,  21 => 12,  14 => 11,);
    }
}
