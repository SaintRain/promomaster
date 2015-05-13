<?php

/* CoreReviewBundle:Review:reviews_rows.html.twig */
class __TwigTemplate_4c417d2234e8055ef55c1e53070a1512d05aa88a539539779a5187dc6bb68e7e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'reviews_rows' => array($this, 'block_reviews_rows'),
            'reviewOne' => array($this, 'block_reviewOne'),
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
        // line 9
        $this->displayBlock('reviews_rows', $context, $blocks);
    }

    public function block_reviews_rows($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        ob_start();
        // line 11
        echo "
        ";
        // line 12
        $context["i"] = 0;
        // line 13
        echo "
        ";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["reviews"]) ? $context["reviews"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        foreach ($context['_seq'] as $context["id"] => $context["review"]) {
            if (((isset($context["i"]) ? $context["i"] : null) < (isset($context["reviewsShow"]) ? $context["reviewsShow"] : null))) {
                // line 15
                echo "
            ";
                // line 16
                if ($this->getAttribute($context["review"], "object", array(), "any", true, true)) {
                    // line 17
                    echo "                ";
                    $context["review"] = $this->getAttribute($context["review"], "object", array());
                    // line 18
                    echo "            ";
                }
                // line 19
                echo "
           ";
                // line 28
                echo "
            ";
                // line 29
                if ((($this->getAttribute($context["review"], "lvl", array()) == 0) && (( !array_key_exists("reviewsFilterRating", $context) ||  !(isset($context["reviewsFilterRating"]) ? $context["reviewsFilterRating"] : null)) || ((isset($context["reviewsFilterRating"]) ? $context["reviewsFilterRating"] : null) == $this->getAttribute($context["review"], "rating", array()))))) {
                    // line 30
                    echo "
                ";
                    // line 31
                    $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
                    // line 32
                    echo "
                <li ";
                    // line 33
                    echo $this->env->getExtension('fastedit_extension')->fastEditFunction($context["review"]);
                    echo " class=\"product_discussion_node\">

                    <div id=\"review-";
                    // line 35
                    echo twig_escape_filter($this->env, $this->getAttribute($context["review"], "id", array()), "html", null, true);
                    echo "\" class=\"product_discussion_comment\">

                        ";
                    // line 37
                    $this->displayBlock('reviewOne', $context, $blocks);
                    // line 109
                    echo "
                        ";
                    // line 111
                    echo "
                            <span class=\"reply_tgl text_tgl with_icon with_icon_right reviews-give-answer\" data-trigger-text=\"Скрыть форму\" data-id=\"";
                    // line 112
                    echo twig_escape_filter($this->env, $this->getAttribute($context["review"], "id", array()), "html", null, true);
                    echo "\">Ответить</span>

                        ";
                    // line 119
                    echo "
                        <div class=\"reviews-give-answer-form-container\"></div>

                    </div>

                    ";
                    // line 124
                    if ($this->getAttribute($context["review"], "children", array())) {
                        // line 125
                        echo "
                        <ul ";
                        // line 126
                        echo $this->env->getExtension('fastedit_extension')->fastEditFunction($context["review"]);
                        echo " class=\"product_discussion_nodes\">

                            ";
                        // line 128
                        $context["children"] = $this->getAttribute($context["review"], "children", array());
                        // line 129
                        echo "
                            ";
                        // line 130
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["children"]) ? $context["children"] : null));
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
                        foreach ($context['_seq'] as $context["_key"] => $context["review"]) {
                            // line 131
                            echo "                                ";
                            if ($this->getAttribute($context["review"], "isEnabled", array())) {
                                // line 132
                                echo "
                                    <div ";
                                // line 133
                                echo $this->env->getExtension('fastedit_extension')->fastEditFunction($context["review"]);
                                echo " class=\"product_discussion_comment\">

                                        ";
                                // line 135
                                $this->displayBlock("reviewOne", $context, $blocks);
                                echo "

                                        <div class=\"clearfix\"></div>

                                    </div>

                                ";
                            }
                            // line 142
                            echo "                            ";
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
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['review'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 143
                        echo "
                        </ul>

                    ";
                    }
                    // line 147
                    echo "
                <li>

            ";
                }
                // line 151
                echo "
        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['review'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 153
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 37
    public function block_reviewOne($context, array $blocks = array())
    {
        // line 38
        echo "
                            ";
        // line 39
        if ($this->getAttribute((isset($context["review"]) ? $context["review"] : null), "rating", array())) {
            // line 40
            echo "
                                ";
            // line 41
            echo $this->env->getExtension('review_extension')->drawStarsByRatingFunction($this->getAttribute((isset($context["review"]) ? $context["review"] : null), "rating", array()));
            echo "

                                <br>

                            ";
        }
        // line 46
        echo "
                            <span class=\"product_discussion_author\">
                                <strong>";
        // line 50
        if (($this->getAttribute($this->getAttribute((isset($context["review"]) ? $context["review"] : null), "user", array()), "firstname", array()) || $this->getAttribute($this->getAttribute((isset($context["review"]) ? $context["review"] : null), "user", array()), "lastname", array()))) {
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["review"]) ? $context["review"] : null), "user", array()), "lastname", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["review"]) ? $context["review"] : null), "user", array()), "firstname", array()), "html", null, true);
        } else {
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["review"]) ? $context["review"] : null), "user", array()), "username", array()), "html", null, true);
        }
        // line 56
        echo "</strong>, ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["review"]) ? $context["review"] : null), "createdAt", array()), "d.m.Y, H:i", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
        // line 57
        if ($this->getAttribute($this->getAttribute((isset($context["reviews"]) ? $context["reviews"] : null), (isset($context["id"]) ? $context["id"] : null), array(), "array"), "isBuy", array())) {
            // line 58
            echo ", Уже купил(а)";
        }
        // line 60
        echo "</span>
                            <p>";
        // line 61
        echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["review"]) ? $context["review"] : null), "review", array()), "html", null, true));
        echo "</p>
                            ";
        // line 62
        if ($this->getAttribute((isset($context["review"]) ? $context["review"] : null), "pros", array())) {
            echo "<p><strong>Плюсы:</strong> ";
            echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["review"]) ? $context["review"] : null), "pros", array()), "html", null, true));
            echo "</p>";
        }
        // line 63
        echo "                            ";
        if ($this->getAttribute((isset($context["review"]) ? $context["review"] : null), "cons", array())) {
            echo "<p><strong>Минусы:</strong> ";
            echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["review"]) ? $context["review"] : null), "cons", array()), "html", null, true));
            echo "</p>";
        }
        // line 64
        echo "
                            ";
        // line 65
        if (($this->getAttribute($this->getAttribute((isset($context["review"]) ? $context["review"] : null), "photos", array()), "count", array()) || $this->getAttribute($this->getAttribute((isset($context["review"]) ? $context["review"] : null), "remoteVideos", array()), "count", array()))) {
            // line 66
            echo "
                                <ul class=\"product_opinion_photos\">

                                    ";
            // line 69
            if ($this->getAttribute($this->getAttribute((isset($context["review"]) ? $context["review"] : null), "photos", array()), "count", array())) {
                // line 70
                echo "
                                        ";
                // line 71
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["review"]) ? $context["review"] : null), "photos", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["photo"]) {
                    // line 72
                    echo "
                                            <li class=\"product_opinion_photo\">
                                                <a class=\"fancybox-button\" rel=\"fancybox-";
                    // line 74
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["review"]) ? $context["review"] : null), "id", array()), "html", null, true);
                    echo "\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["photo"], "watermark", "watermark_", true)), "html", null, true);
                    echo "\">
                                                    <img src=\"";
                    // line 75
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["photo"], "preview", "35x35_")), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, (($this->getAttribute($context["photo"], ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) ? ($this->getAttribute($context["photo"], ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) : (("Фото №" . $this->getAttribute($context["photo"], "id", array())))), "html", null, true);
                    echo "\">
                                                </a>
                                            </li>

                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['photo'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 80
                echo "
                                    ";
            }
            // line 82
            echo "

                                    ";
            // line 84
            if ($this->getAttribute($this->getAttribute((isset($context["review"]) ? $context["review"] : null), "remoteVideos", array()), "count", array())) {
                // line 85
                echo "
                                        ";
                // line 86
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["review"]) ? $context["review"] : null), "remoteVideos", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["video"]) {
                    // line 87
                    echo "
                                            <li class=\"product_opinion_photo\">
                                                <a class=\"fancybox-button\" rel=\"fancybox-";
                    // line 89
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["review"]) ? $context["review"] : null), "id", array()), "html", null, true);
                    echo "\" data-fancybox-type=\"iframe\" rel=\"fancybox-button\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["video"], "videoHosting", array()), "playerUri", array()), "html", null, true);
                    echo twig_escape_filter($this->env, $this->getAttribute($context["video"], "code", array()), "html", null, true);
                    echo "\">
                                                    <img width=\"35px\" height=\"35px\" src=\"";
                    // line 90
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/video_preview.png"), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["video"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                    echo "\"/>
                                                </a>
                                            </li>

                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['video'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 95
                echo "
                                    ";
            }
            // line 97
            echo "
                                </ul>

                            ";
        }
        // line 101
        echo "
                            <div class=\"product_opinion_rate";
        // line 102
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) && ($this->getAttribute($this->getAttribute((isset($context["review"]) ? $context["review"] : null), "user", array()), "id", array()) == $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "id", array())))) {
            echo " product_opinion_rate_disabled\"";
        } else {
            echo "\" data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["review"]) ? $context["review"] : null), "id", array()), "html", null, true);
            echo "\" data-url=\"";
            echo $this->env->getExtension('routing')->getPath("core_review_rate_ajax");
        }
        echo "\">
                                <span class=\"product_opinion_rate_label\">Помог ли вам этот отзыв?</span>
                                <span class=\"product_opinion_rate_button positive with_icon ";
        // line 104
        if ((( !($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) && ($this->getAttribute($this->getAttribute((isset($context["review"]) ? $context["review"] : null), "user", array()), "id", array()) == $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "id", array()))) && $this->getAttribute((isset($context["reviews"]) ? $context["reviews"] : null), $this->getAttribute((isset($context["review"]) ? $context["review"] : null), "id", array()), array(), "array", true, true)) && $this->getAttribute($this->getAttribute((isset($context["reviews"]) ? $context["reviews"] : null), $this->getAttribute((isset($context["review"]) ? $context["review"] : null), "id", array()), array(), "array"), "isExistPositive", array(), "array"))) {
            echo "selected";
        }
        echo "\" title=\"Да\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["reviewsAll"]) ? $context["reviewsAll"] : null), $this->getAttribute((isset($context["review"]) ? $context["review"] : null), "id", array()), array(), "array"), "countPositive", array(), "array"), "html", null, true);
        echo "</span>
                                <span class=\"product_opinion_rate_button negative with_icon ";
        // line 105
        if ((( !($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) && ($this->getAttribute($this->getAttribute((isset($context["review"]) ? $context["review"] : null), "user", array()), "id", array()) == $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "id", array()))) && $this->getAttribute((isset($context["reviews"]) ? $context["reviews"] : null), $this->getAttribute((isset($context["review"]) ? $context["review"] : null), "id", array()), array(), "array", true, true)) && $this->getAttribute($this->getAttribute((isset($context["reviews"]) ? $context["reviews"] : null), $this->getAttribute((isset($context["review"]) ? $context["review"] : null), "id", array()), array(), "array"), "isExistNegative", array(), "array"))) {
            echo "selected";
        }
        echo "\" title=\"Нет\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["reviewsAll"]) ? $context["reviewsAll"] : null), $this->getAttribute((isset($context["review"]) ? $context["review"] : null), "id", array()), array(), "array"), "countNegative", array(), "array"), "html", null, true);
        echo "</span>
                            </div>

                        ";
    }

    public function getTemplateName()
    {
        return "CoreReviewBundle:Review:reviews_rows.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  385 => 105,  377 => 104,  365 => 102,  362 => 101,  356 => 97,  352 => 95,  339 => 90,  332 => 89,  328 => 87,  324 => 86,  321 => 85,  319 => 84,  315 => 82,  311 => 80,  298 => 75,  292 => 74,  288 => 72,  284 => 71,  281 => 70,  279 => 69,  274 => 66,  272 => 65,  269 => 64,  262 => 63,  256 => 62,  252 => 61,  249 => 60,  246 => 58,  244 => 57,  241 => 56,  238 => 53,  233 => 51,  231 => 50,  227 => 46,  219 => 41,  216 => 40,  214 => 39,  211 => 38,  208 => 37,  202 => 153,  191 => 151,  185 => 147,  179 => 143,  165 => 142,  155 => 135,  150 => 133,  147 => 132,  144 => 131,  127 => 130,  124 => 129,  122 => 128,  117 => 126,  114 => 125,  112 => 124,  105 => 119,  100 => 112,  97 => 111,  94 => 109,  92 => 37,  87 => 35,  82 => 33,  79 => 32,  77 => 31,  74 => 30,  72 => 29,  69 => 28,  66 => 19,  63 => 18,  60 => 17,  58 => 16,  55 => 15,  44 => 14,  41 => 13,  39 => 12,  36 => 11,  33 => 10,  27 => 9,  24 => 8,  21 => 1,);
    }
}
