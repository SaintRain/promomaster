<?php

/* ApplicationSonataUserBundle:Profile:products_favorite.html.twig */
class __TwigTemplate_d43cef3e19b6da8c1a0a9ab8996b26c6a9562efc9349c5b8ef50da7d2427e053 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataUserBundle::cabinet_layout.html.twig");

        $_trait_0 = $this->env->loadTemplate("CoreProductBundle:Catalog:products_container.html.twig");
        // line 11
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
                'products_container_filter_sort_last' => array($this, 'block_products_container_filter_sort_last'),
                'main_content' => array($this, 'block_main_content'),
            )
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataUserBundle::cabinet_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 14
        $context["_page"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "page"), "method");
        // line 15
        ob_start();
        // line 16
        if (((isset($context["_page"]) ? $context["_page"] : null) && ((isset($context["_page"]) ? $context["_page"] : null) > 1))) {
            echo ", страница ";
            echo twig_escape_filter($this->env, (isset($context["_page"]) ? $context["_page"] : null), "html", null, true);
        }
        $context["seoPage"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 19
    public function block_title($context, array $blocks = array())
    {
        echo "Избранные товары";
        echo twig_escape_filter($this->env, (isset($context["seoPage"]) ? $context["seoPage"] : null), "html", null, true);
        echo " | OliKids.ru";
    }

    // line 20
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "избранное, товары";
    }

    // line 21
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Список товаров, отмеченных Вами как избранные в интернет-магазине OliKids. Не надо запоминать - пополняйте этот список желаемыми товарами чтобы приобрести их в будущем";
        echo twig_escape_filter($this->env, (isset($context["seoPage"]) ? $context["seoPage"] : null), "html", null, true);
        echo ".";
    }

    // line 23
    public function block_seo($context, array $blocks = array())
    {
        // line 24
        echo "    ";
        ob_start();
        // line 25
        echo "
        ";
        // line 26
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "query", array()), "all", array())) > 0)) {
            // line 27
            echo "
            ";
            // line 28
            if (((isset($context["_page"]) ? $context["_page"] : null) && ((isset($context["_page"]) ? $context["_page"] : null) > 1))) {
                // line 29
                echo "
                ";
                // line 30
                $context["canonical"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array("page" => (isset($context["_page"]) ? $context["_page"] : null), "_format" => "html"));
                // line 31
                echo "
            ";
            } else {
                // line 33
                echo "
                ";
                // line 34
                $context["canonical"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array("_format" => "html"));
                // line 35
                echo "
            ";
            }
            // line 37
            echo "
            <link rel=\"canonical\" href=\"";
            // line 38
            echo twig_escape_filter($this->env, (isset($context["canonical"]) ? $context["canonical"] : null), "html", null, true);
            echo "\" />

        ";
        }
        // line 41
        echo "

        ";
        // line 43
        $context["totalPageNumber"] = twig_round(($this->getAttribute((isset($context["products"]) ? $context["products"] : null), "getTotalItemCount", array()) / $this->getAttribute((isset($context["products"]) ? $context["products"] : null), "getItemNumberPerPage", array())), 0, "ceil");
        // line 44
        echo "
        ";
        // line 45
        if ((((isset($context["_page"]) ? $context["_page"] : null) - 1) > 0)) {
            // line 46
            echo "            ";
            if ((((isset($context["_page"]) ? $context["_page"] : null) - 1) == 1)) {
                // line 47
                echo "                <link rel=\"prev\" href=\"";
                echo $this->env->getExtension('routing')->getPath("application_sonata_user_profile_products_favorites_first_page", array("_format" => "html"));
                echo "\" />
            ";
            } else {
                // line 49
                echo "                <link rel=\"prev\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_profile_products_favorites", array("page" => ((isset($context["_page"]) ? $context["_page"] : null) - 1), "_format" => "html")), "html", null, true);
                echo "\" />
            ";
            }
            // line 51
            echo "        ";
        }
        // line 52
        echo "
        ";
        // line 53
        if ((((isset($context["_page"]) ? $context["_page"] : null) + 1) <= (isset($context["totalPageNumber"]) ? $context["totalPageNumber"] : null))) {
            // line 54
            echo "            ";
            if ((!(isset($context["_page"]) ? $context["_page"] : null))) {
                // line 55
                echo "                ";
                $context["_page"] = 1;
                // line 56
                echo "            ";
            }
            // line 57
            echo "            <link rel=\"next\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_profile_products_favorites", array("page" => ((isset($context["_page"]) ? $context["_page"] : null) + 1), "_format" => "html")), "html", null, true);
            echo "\" />
        ";
        }
        // line 59
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 63
    public function block_products_container_filter_sort_last($context, array $blocks = array())
    {
        // line 64
        echo "
    <li class=\"filter_sort_switch ";
        // line 65
        if (((isset($context["sort"]) ? $context["sort"] : null) == "added_desc")) {
            echo "active desc";
        } elseif (((isset($context["sort"]) ? $context["sort"] : null) == "added_asc")) {
            echo "active";
        }
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["routeFirsPage"]) ? $context["routeFirsPage"] : null), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : null), array("sort" => ((((isset($context["sort"]) ? $context["sort"] : null) == "added_asc")) ? ("added_desc") : ("added_asc"))))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("by date added", array(), "frontend"), "html", null, true);
        echo "</a></li>

";
    }

    // line 69
    public function block_main_content($context, array $blocks = array())
    {
        // line 70
        echo "    ";
        ob_start();
        // line 71
        echo "
        <section class=\"cabinet_favorites\">

            <h2>";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Featured products"), "html", null, true);
        echo "</h2>

            ";
        // line 77
        echo "            ";
        $context["routeFirsPage"] = "application_sonata_user_profile_products_favorites_first_page";
        // line 78
        echo "
            ";
        // line 80
        echo "            ";
        $this->displayBlock("products_container", $context, $blocks);
        echo "

        </section>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Profile:products_favorite.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  218 => 80,  215 => 78,  212 => 77,  207 => 74,  202 => 71,  199 => 70,  196 => 69,  181 => 65,  178 => 64,  175 => 63,  169 => 59,  163 => 57,  160 => 56,  157 => 55,  154 => 54,  152 => 53,  149 => 52,  146 => 51,  140 => 49,  134 => 47,  131 => 46,  129 => 45,  126 => 44,  124 => 43,  120 => 41,  114 => 38,  111 => 37,  107 => 35,  105 => 34,  102 => 33,  98 => 31,  96 => 30,  93 => 29,  91 => 28,  88 => 27,  86 => 26,  83 => 25,  80 => 24,  77 => 23,  69 => 21,  63 => 20,  55 => 19,  46 => 16,  44 => 15,  42 => 14,  14 => 11,);
    }
}
