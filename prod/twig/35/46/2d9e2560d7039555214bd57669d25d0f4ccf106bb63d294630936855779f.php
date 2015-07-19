<?php

/* CoreReviewBundle:Review:reviews_layout.html.twig */
class __TwigTemplate_35462d9e2560d7039555214bd57669d25d0f4ccf106bb63d294630936855779f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $_trait_0 = $this->env->loadTemplate("CoreReviewBundle:Review:reviews_with_link_more.html.twig");
        // line 9
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."CoreReviewBundle:Review:reviews_with_link_more.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'reviews_layout' => array($this, 'block_reviews_layout'),
            )
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 8
        echo "
";
        // line 10
        echo "
";
        // line 11
        $this->displayBlock('reviews_layout', $context, $blocks);
    }

    public function block_reviews_layout($context, array $blocks = array())
    {
        // line 12
        echo "    ";
        $context["productCaptionCase"] = $this->env->getExtension('language_switcher_extension')->getCaseByKey($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("captionCase" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "prepositional");
        // line 13
        echo "        ";
        $context["productCaptionCase"] = (((isset($context["productCaptionCase"]) ? $context["productCaptionCase"] : null)) ? ((isset($context["productCaptionCase"]) ? $context["productCaptionCase"] : null)) : ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))));
        // line 14
        echo "    ";
        ob_start();
        // line 15
        echo "
        <div class=\"product_opinions_discussions\">
            <div class=\"product_page_pad\">
                <!-- tabs with header -->
                <div class=\"header_tabs\">
                    <h2 id=\"reviews\" class=\"header_tab\">Отзывы и обсуждения покупателей</h2>
                </div>
                <!-- product opinions -->
                <section class=\"product_opinions cols_container\" id=\"reviews-section\"
                        ";
        // line 24
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
            // line 25
            echo "data-is-logged=\"1\"";
        } else {
            // line 27
            echo "data-is-logged=\"0\" data-login-url=\"";
            echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
            echo "\"";
        }
        // line 28
        echo ">
                    <div class=\"main_col\">
                        <div class=\"main_col_pad\">

                            ";
        // line 32
        if (twig_length_filter($this->env, (isset($context["reviews"]) ? $context["reviews"] : null))) {
            // line 33
            echo "
                                <ul id=\"reviews-sort\" class=\"text_tabs\" data-url=\"";
            // line 34
            echo $this->env->getExtension('routing')->getPath("core_review_change_sort_or_filter_ajax");
            echo "\" data-slug=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "slug", array()), "html", null, true);
            echo "\">
    ";
            // line 36
            echo "                                    <li id=\"reviews-sort-new-do\" class=\"text_tab text_tab_active\" data-sort=\"new\"><span>Новые</span></li>
                                    <li id=\"reviews-sort-rating-do\" class=\"text_tab\" data-sort=\"rating\"><span>Рейтинг</span></li>
                                    <li id=\"reviews-sort-positive-do\" class=\"text_tab\" data-sort=\"positive\"><span>Полезные</span></li>
                                </ul>

                                ";
            // line 41
            if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
                // line 42
                echo "
                                    <span onclick=\"location.href = '#review-anchor-add'\" class=\"prodct_opinion_add_tgl text_tgl with_icon\">Добавить отзыв";
                // line 43
                if ((isset($context["productCaptionCase"]) ? $context["productCaptionCase"] : null)) {
                    echo " о ";
                    echo twig_escape_filter($this->env, (isset($context["productCaptionCase"]) ? $context["productCaptionCase"] : null), "html", null, true);
                    echo " ";
                }
                echo "</span>

                                ";
            }
            // line 46
            echo "
                            ";
        } else {
            // line 48
            echo "
                                <h4>Нет отзывов к данному товару</h4>

                            ";
        }
        // line 52
        echo "
                            ";
        // line 53
        $context["flash"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "get", array(0 => "flash_review"), "method");
        // line 54
        echo "                            ";
        if ((isset($context["flash"]) ? $context["flash"] : null)) {
            // line 55
            echo "                                <div class=\"clearfix\"></div>
                                ";
            // line 56
            if ($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "error", array(), "any", true, true)) {
                // line 57
                echo "
                                    <div class=\"alert alert-error\">

                                        ";
                // line 60
                echo twig_join_filter($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "error", array()), "<br>");
                echo "

                                    </div>

                                ";
            }
            // line 65
            echo "
                                ";
            // line 66
            if ($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "success", array(), "any", true, true)) {
                // line 67
                echo "
                                    <div class=\"alert alert-success\">

                                        ";
                // line 70
                echo twig_join_filter($this->getAttribute((isset($context["flash"]) ? $context["flash"] : null), "success", array()), "<br>");
                echo "

                                    </div>

                                ";
            }
            // line 75
            echo "                                ";
            $context["flash"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "remove", array(0 => "flash_review"), "method");
            // line 76
            echo "                                <div class=\"clearfix\"></div>
                            ";
        }
        // line 78
        echo "
                            ";
        // line 79
        $this->displayBlock("reviews_with_link_more", $context, $blocks);
        echo "

                            <div class=\"clearfix\"></div>
                            <div class=\"product_opinion_add\">
                                <h3 id=\"review-anchor-add\">Добавить отзыв";
        // line 83
        if ((isset($context["productCaptionCase"]) ? $context["productCaptionCase"] : null)) {
            echo " о ";
            echo twig_escape_filter($this->env, (isset($context["productCaptionCase"]) ? $context["productCaptionCase"] : null), "html", null, true);
            echo " ";
        }
        echo "</h3>

                                ";
        // line 85
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
            // line 86
            echo "                                    <div id=\"reviews-form-container\">
                                        <form class=\"reviews-form\" name=\"core_review_form_type\" method=\"POST\" enctype=\"multipart/form-data\" action=\"";
            // line 87
            echo $this->env->getExtension('routing')->getPath("core_review_send");
            echo "\">

                                            ";
            // line 89
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["reviewForm"]) ? $context["reviewForm"] : null), "user", array()), 'widget');
            echo "
                                            ";
            // line 90
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["reviewForm"]) ? $context["reviewForm"] : null), "product", array()), 'widget');
            echo "

                                            <div class=\"product_opinion_add_main_col\">
                                                <div class=\"form_row\">

                                                    ";
            // line 95
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["reviewForm"]) ? $context["reviewForm"] : null), "review", array()), 'widget', array("attr" => array("class" => "text_input text-review")));
            echo "

                                                </div>

                                                <div class=\"reviews-answer-form-without-this\">

                                                    ";
            // line 104
            echo "
                                                    <div id=\"reviews-pros-and-cons-container\" style=\"display: block;\">

                                                        <div id=\"review-rating\" class=\"form_row\">
                                                            <label>Ваша оценка: </label>
                                                            <br>
                                                            <span class=\"product_rate product_rating_stars big\">
                                                                ";
            // line 111
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["reviewForm"]) ? $context["reviewForm"] : null), "rating", array()), 'widget');
            echo "
                                                            </span>
                                                        </div>
                                                        <div class=\"form_row\">
                                                            ";
            // line 115
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["reviewForm"]) ? $context["reviewForm"] : null), "pros", array()), 'widget');
            echo "
                                                        </div>
                                                        <div class=\"form_row\">
                                                            ";
            // line 118
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["reviewForm"]) ? $context["reviewForm"] : null), "cons", array()), 'widget');
            echo "
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class=\"form_submit\">
                                                    <ul class=\"upload_add\">
                                                        ";
            // line 126
            echo "                                                        <li>";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["reviewForm"]) ? $context["reviewForm"] : null), "photos", array()), 'widget');
            echo "</li>
                                                    </ul>
                                                    <button class=\"common_button big button_send\"><span><i class=\"button_icon\"></i>Добавить</span></button>
                                                </div>
                                            </div>
                                            ";
            // line 132
            echo "                                            ";
            // line 143
            echo "                                            ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["reviewForm"]) ? $context["reviewForm"] : null), 'rest');
            echo "

                                        </form>
                                    </div>
                                ";
        } else {
            // line 148
            echo "
                                    Чтобы оставить отзыв или комментарий, пожалуйста <a href=\"";
            // line 149
            echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
            echo "\">авторизуйтесь</a> или <a href=\"";
            echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
            echo "\">зарегистрируйтесь</a>.

                                ";
        }
        // line 152
        echo "
                            </div>
                        </div>
                    </div>

                    <div class=\"side_col\">
                        <div class=\"side_col_pad\">

                            <section class=\"product_ratinginfo\">
                                ";
        // line 161
        if (((array_key_exists("reviewsStars", $context) && $this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "total", array(), "array", true, true)) && ($this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "total", array(), "array") > 0))) {
            // line 162
            echo "                                    <h3>Рейтинг товара</h3>

                                    <div class=\"product_ratinginfo_general\">
                                        ";
            // line 165
            echo $this->env->getExtension('review_extension')->drawStarsByRatingFunction($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "reviewsRating", array()), "big");
            echo "
                                        ";
            // line 166
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "userCount", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "userCount", array()), array(0 => "покупатель", 1 => "покупателя", 2 => "покупателей")), "html", null, true);
            echo " оценили товар
                                        <span class=\"product_ratinginfo_stats\">";
            // line 167
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "reviewsRating", array()), 1, ".", ""), "html", null, true);
            echo " из 5 звезд</span>
                                    </div>

                                    <div class=\"product_ratinginfo_filter\">
                                        <h6>Отзывы с оценкой</h6>
                                        <ul id=\"reviews-filter\" class=\"product_ratinginfo_filter_list\" data-url=\"";
            // line 172
            echo $this->env->getExtension('routing')->getPath("core_review_change_sort_or_filter_ajax");
            echo "\">
                                            <li id=\"reviews-filter-5-do\" data-filter=\"5\" class=\"product_ratinginfo_filter_item ";
            // line 173
            if (($this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "five", array(), "array") == 0)) {
                echo "not-active";
            }
            echo "\"><a>5 звезд</a><span class=\"rating_scale\">";
            if ($this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "five", array(), "array")) {
                echo "<span class=\"rating_scale_indicator\" style=\"width:";
                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "five", array(), "array") / $this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "total", array(), "array")) * 100), "html", null, true);
                echo "%\">&nbsp;</span>";
            }
            echo "</span> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "five", array(), "array"), "html", null, true);
            echo "</li>
                                            <li id=\"reviews-filter-4-do\" data-filter=\"4\" class=\"product_ratinginfo_filter_item ";
            // line 174
            if (($this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "four", array(), "array") == 0)) {
                echo "not-active";
            }
            echo "\"><a>4 звезды</a><span class=\"rating_scale\">";
            if ($this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "four", array(), "array")) {
                echo "<span class=\"rating_scale_indicator\" style=\"width:";
                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "four", array(), "array") / $this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "total", array(), "array")) * 100), "html", null, true);
                echo "%\">&nbsp;</span>";
            }
            echo "</span> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "four", array(), "array"), "html", null, true);
            echo "</li>
                                            <li id=\"reviews-filter-3-do\" data-filter=\"3\" class=\"product_ratinginfo_filter_item ";
            // line 175
            if (($this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "three", array(), "array") == 0)) {
                echo "not-active";
            }
            echo "\"><a>3 звезды</a><span class=\"rating_scale\">";
            if ($this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "three", array(), "array")) {
                echo "<span class=\"rating_scale_indicator\" style=\"width:";
                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "three", array(), "array") / $this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "total", array(), "array")) * 100), "html", null, true);
                echo "%\">&nbsp;</span>";
            }
            echo "</span> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "three", array(), "array"), "html", null, true);
            echo "</li>
                                            <li id=\"reviews-filter-2-do\" data-filter=\"2\" class=\"product_ratinginfo_filter_item ";
            // line 176
            if (($this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "two", array(), "array") == 0)) {
                echo "not-active";
            }
            echo "\"><a>2 звезды</a><span class=\"rating_scale\">";
            if ($this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "two", array(), "array")) {
                echo "<span class=\"rating_scale_indicator\" style=\"width:";
                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "two", array(), "array") / $this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "total", array(), "array")) * 100), "html", null, true);
                echo "%\">&nbsp;</span>";
            }
            echo "</span> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "two", array(), "array"), "html", null, true);
            echo "</li>
                                            <li id=\"reviews-filter-1-do\" data-filter=\"1\" class=\"product_ratinginfo_filter_item ";
            // line 177
            if (($this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "one", array(), "array") == 0)) {
                echo "not-active";
            }
            echo "\"><a>1 звезда</a><span class=\"rating_scale\">";
            if ($this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "one", array(), "array")) {
                echo "<span class=\"rating_scale_indicator\" style=\"width:";
                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "one", array(), "array") / $this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "total", array(), "array")) * 100), "html", null, true);
                echo "%\">&nbsp;</span>";
            }
            echo "</span> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["reviewsStars"]) ? $context["reviewsStars"] : null), "one", array(), "array"), "html", null, true);
            echo "</li>
                                        </ul>
                                    </div>

                                ";
        }
        // line 182
        echo "
                            </section>

                        </div>
                    </div>
                </section>
                    <!-- product discussions -->
            </div>
        </div>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreReviewBundle:Review:reviews_layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  404 => 182,  386 => 177,  372 => 176,  358 => 175,  344 => 174,  330 => 173,  326 => 172,  318 => 167,  312 => 166,  308 => 165,  303 => 162,  301 => 161,  290 => 152,  282 => 149,  279 => 148,  270 => 143,  268 => 132,  259 => 126,  249 => 118,  243 => 115,  236 => 111,  227 => 104,  218 => 95,  210 => 90,  206 => 89,  201 => 87,  198 => 86,  196 => 85,  187 => 83,  180 => 79,  177 => 78,  173 => 76,  170 => 75,  162 => 70,  157 => 67,  155 => 66,  152 => 65,  144 => 60,  139 => 57,  137 => 56,  134 => 55,  131 => 54,  129 => 53,  126 => 52,  120 => 48,  116 => 46,  106 => 43,  103 => 42,  101 => 41,  94 => 36,  88 => 34,  85 => 33,  83 => 32,  77 => 28,  72 => 27,  69 => 25,  67 => 24,  56 => 15,  53 => 14,  50 => 13,  47 => 12,  41 => 11,  38 => 10,  35 => 8,  32 => 1,  14 => 9,);
    }
}
