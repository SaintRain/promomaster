<?php

/* CoreReviewBundle:Review:reviews_with_link_more.html.twig */
class __TwigTemplate_e9303029331461cc03623606b844e9d960e659b13caa8a3e270633c1f6faecc0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $_trait_0 = $this->env->loadTemplate("CoreReviewBundle:Review:reviews_rows.html.twig");
        // line 10
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."CoreReviewBundle:Review:reviews_rows.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'reviews_with_link_more' => array($this, 'block_reviews_with_link_more'),
            )
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 9
        echo "
";
        // line 11
        echo "
";
        // line 12
        $this->displayBlock('reviews_with_link_more', $context, $blocks);
    }

    public function block_reviews_with_link_more($context, array $blocks = array())
    {
        // line 13
        echo "    ";
        ob_start();
        // line 14
        echo "
        ";
        // line 15
        if ((twig_length_filter($this->env, (isset($context["reviews"]) ? $context["reviews"] : null)) > 0)) {
            // line 16
            echo "
            <ul id=\"reviews-list\" class=\"product_discussions_list\">

                ";
            // line 19
            $this->displayBlock("reviews_rows", $context, $blocks);
            echo "

            </ul>

        ";
        }
        // line 24
        echo "
        <div class=\"read_all\">

            ";
        // line 27
        if ((((isset($context["reviewsTotal"]) ? $context["reviewsTotal"] : null) > (isset($context["reviewsShow"]) ? $context["reviewsShow"] : null)) && ((isset($context["reviewsTotal"]) ? $context["reviewsTotal"] : null) <= (isset($context["reviewsMaxCountForShowAll"]) ? $context["reviewsMaxCountForShowAll"] : null)))) {
            // line 28
            echo "
                <span id=\"rewiews-more\" class=\"read_all_tgl text_tgl with_icon with_icon_right\" data-type=\"all\" data-url=\"";
            // line 29
            echo $this->env->getExtension('routing')->getPath("core_review_view_more_ajax");
            echo "\" data-slug=\"";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "slug", array(), "any", true, true)) ? ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "slug", array())) : ((isset($context["currentProductSlug"]) ? $context["currentProductSlug"] : null))), "html", null, true);
            echo "\" data-page=\"1\" data-show=\"";
            echo twig_escape_filter($this->env, (isset($context["reviewsMaxCountForShowAll"]) ? $context["reviewsMaxCountForShowAll"] : null), "html", null, true);
            echo "\">Читать все (";
            echo twig_escape_filter($this->env, (isset($context["reviewsTotal"]) ? $context["reviewsTotal"] : null), "html", null, true);
            echo ")</span>

            ";
        } elseif (((isset($context["reviewsTotal"]) ? $context["reviewsTotal"] : null) > (isset($context["reviewsMaxCountForShowAll"]) ? $context["reviewsMaxCountForShowAll"] : null))) {
            // line 32
            echo "
                <span id=\"rewiews-more\" class=\"read_all_tgl text_tgl with_icon with_icon_right\" data-type=\"more\" data-url=\"";
            // line 33
            echo $this->env->getExtension('routing')->getPath("core_review_view_more_ajax");
            echo "\" data-slug=\"";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "slug", array(), "any", true, true)) ? ($this->getAttribute((isset($context["currentProduct"]) ? $context["currentProduct"] : null), "slug", array())) : ((isset($context["currentProductSlug"]) ? $context["currentProductSlug"] : null))), "html", null, true);
            echo "\" data-page=\"2\" data-show=\"";
            echo twig_escape_filter($this->env, (isset($context["reviewsShow"]) ? $context["reviewsShow"] : null), "html", null, true);
            echo "\">Показать еще отзывы</span>

            ";
        }
        // line 36
        echo "
        </div>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreReviewBundle:Review:reviews_with_link_more.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  103 => 36,  93 => 33,  90 => 32,  78 => 29,  75 => 28,  73 => 27,  68 => 24,  60 => 19,  55 => 16,  53 => 15,  50 => 14,  47 => 13,  41 => 12,  38 => 11,  35 => 9,  32 => 1,  14 => 10,);
    }
}
