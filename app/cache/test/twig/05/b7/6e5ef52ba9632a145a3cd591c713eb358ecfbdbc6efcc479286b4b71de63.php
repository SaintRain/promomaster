<?php

/* CoreCommonBundle:Pages:search.html.twig */
class __TwigTemplate_05b76e5ef52ba9632a145a3cd591c713eb358ecfbdbc6efcc479286b4b71de63 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout.html.twig");

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
        // line 13
        $context["_page"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "page"), "method");
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 15
    public function block_title($context, array $blocks = array())
    {
        echo "Поиск по сайту";
        if (((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) && ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) > 1))) {
            echo ", страница ";
            echo twig_escape_filter($this->env, (isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")), "html", null, true);
        }
    }

    // line 16
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "поиск, запрос";
    }

    // line 17
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Результаты поиска по запросу ";
        echo twig_escape_filter($this->env, (isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")), "html", null, true);
        echo " на сайте OliKids";
        if (((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) && ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) > 1))) {
            echo ", страница ";
            echo twig_escape_filter($this->env, (isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")), "html", null, true);
        }
        echo ".";
    }

    // line 19
    public function block_seo($context, array $blocks = array())
    {
        // line 20
        echo "    ";
        ob_start();
        // line 21
        echo "
        ";
        // line 22
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "query", array()), "all", array())) > 0)) {
            // line 23
            echo "
            ";
            // line 24
            if (((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) && ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) > 1))) {
                // line 25
                echo "
                ";
                // line 26
                $context["canonical"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), array("page" => (isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page"))));
                // line 27
                echo "
            ";
            } else {
                // line 29
                echo "
                ";
                // line 30
                $context["canonical"] = $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"));
                // line 31
                echo "
            ";
            }
            // line 33
            echo "
            <link rel=\"canonical\" href=\"";
            // line 34
            echo twig_escape_filter($this->env, (isset($context["canonical"]) ? $context["canonical"] : $this->getContext($context, "canonical")), "html", null, true);
            echo "\" />

        ";
        }
        // line 37
        echo "
        ";
        // line 38
        if (twig_length_filter($this->env, (isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")))) {
            // line 39
            echo "            ";
            $context["totalPageNumber"] = twig_round(($this->getAttribute((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), "getTotalItemCount", array()) / $this->getAttribute((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), "getItemNumberPerPage", array())), 0, "ceil");
            // line 40
            echo "
            ";
            // line 41
            if ((((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) - 1) > 0)) {
                // line 42
                echo "                ";
                if ((((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) - 1) == 1)) {
                    // line 43
                    echo "                    <link rel=\"prev\" href=\"";
                    echo $this->env->getExtension('routing')->getPath("core_common_search_first_page");
                    echo "\" />
                ";
                } else {
                    // line 45
                    echo "                    <link rel=\"prev\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_common_search", array("page" => ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) - 1))), "html", null, true);
                    echo "\" />
                ";
                }
                // line 47
                echo "            ";
            }
            // line 48
            echo "
            ";
            // line 49
            if ((((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) + 1) <= (isset($context["totalPageNumber"]) ? $context["totalPageNumber"] : $this->getContext($context, "totalPageNumber")))) {
                // line 50
                echo "                ";
                if ((!(isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")))) {
                    // line 51
                    echo "                    ";
                    $context["_page"] = 1;
                    // line 52
                    echo "                ";
                }
                // line 53
                echo "                <link rel=\"next\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_common_search", array("page" => ((isset($context["_page"]) ? $context["_page"] : $this->getContext($context, "_page")) + 1))), "html", null, true);
                echo "\" />
            ";
            }
            // line 55
            echo "        ";
        }
        // line 56
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 60
    public function block_js_head($context, array $blocks = array())
    {
        // line 61
        echo "    ";
        ob_start();
        // line 62
        echo "
        ";
        // line 63
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
        <script>
            var google_tag_params = {
                ecomm_pagetype: 'searchresults',
            };
            ";
        // line 69
        echo "        </script>
";
        // line 71
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 75
    public function block_content($context, array $blocks = array())
    {
        // line 76
        echo "    ";
        ob_start();
        // line 77
        echo "
        ";
        // line 79
        echo "        ";
        $context["routeFirsPage"] = "core_common_search_first_page";
        // line 80
        echo "
        <div id=\"page_path\">
            <ul class=\"page_path_links\">
                <li class=\"page_path_link\">
                    <a href=\"";
        // line 84
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">Главная</a>
                </li>
                <li class=\"page_path_link\">
                    <strong>Поиск</strong>
                </li>
            </ul>
        </div>

        <!-- content with cols -->
        <div id=\"content\" role=\"main\">

            ";
        // line 95
        if (((!(isset($context["filterBuilder"]) ? $context["filterBuilder"] : $this->getContext($context, "filterBuilder"))) && (isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")))) {
            // line 96
            echo "
                ";
            // line 98
            echo "                ";
            if ($this->getAttribute((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), "getTotalItemCount", array())) {
                // line 99
                echo "                    <h2>Поиск \"";
                echo twig_escape_filter($this->env, (isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")), "html", null, true);
                echo "\"</h2>
                    <h3>По вашему запросу найдено ";
                // line 100
                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), "getTotalItemCount", array()) . " ") . $this->env->getExtension('decline_of_number_extension')->declOfNumFunction($this->getAttribute((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), "getTotalItemCount", array()), array(0 => "товар", 1 => "товара", 2 => "товаров"))), "html", null, true);
                echo "</h3>
                ";
            } else {
                // line 102
                echo "                    <h2>По Вашему запросу \"";
                echo twig_escape_filter($this->env, (isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")), "html", null, true);
                echo "\" ничего не найдено</h2>
                    <h3>Попробуйте видоизменить Ваш поисковый запрос, и тогда возможно что-то и найдется.</h3>
                ";
            }
            // line 105
            echo "
                <br>

            ";
        }
        // line 109
        echo "
            ";
        // line 110
        if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "query", array()), "get", array(0 => "query"), "method") || $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "query", array()), "get", array(0 => "form"), "method")) && (twig_length_filter($this->env, (isset($context["query"]) ? $context["query"] : $this->getContext($context, "query"))) <= 2))) {
            // line 111
            echo "                <h3>Минимальная длина поискового запроса 3 символа!<br>Допустимые символы: цифры, буквы, пробел, тире!</h3>
            ";
        }
        // line 113
        echo "
            <!-- main content col -->
            <div class=\"main_col\" ";
        // line 115
        if ((!(isset($context["filterBuilder"]) ? $context["filterBuilder"] : $this->getContext($context, "filterBuilder")))) {
            echo "style=\"margin: 0 auto; float:none;\"";
        }
        echo ">
                <div class=\"main_col_pad\">

                    <!-- products showcase -->
                        ";
        // line 119
        if ((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products"))) {
            // line 120
            echo "                            ";
            // line 121
            echo "                            ";
            $this->displayBlock("products_container", $context, $blocks);
            echo "
                        ";
        }
        // line 123
        echo "                    <!-- /products showcase -->

                    ";
        // line 132
        echo "
                </div>
            </div>
            <!-- /main content col -->

            ";
        // line 137
        if ((isset($context["filterBuilder"]) ? $context["filterBuilder"] : $this->getContext($context, "filterBuilder"))) {
            // line 138
            echo "
                <!-- side content col -->
                <aside class=\"side_col\">
                    <div class=\"side_col_pad\">
                        <!-- filter with owl -->
                        ";
            // line 143
            $this->env->loadTemplate("CorePropertyBundle:Filter:layout.html.twig")->display(array_merge($context, (isset($context["filterBuilder"]) ? $context["filterBuilder"] : $this->getContext($context, "filterBuilder"))));
            // line 144
            echo "                        <!-- /filter with owl -->
                    </div>
                </aside>
                <!-- /side content col -->

            ";
        }
        // line 150
        echo "
        </div>
        <!-- /content with cols -->

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Pages:search.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  330 => 150,  322 => 144,  320 => 143,  313 => 138,  311 => 137,  304 => 132,  300 => 123,  294 => 121,  292 => 120,  290 => 119,  281 => 115,  277 => 113,  273 => 111,  271 => 110,  268 => 109,  262 => 105,  255 => 102,  250 => 100,  245 => 99,  242 => 98,  239 => 96,  237 => 95,  223 => 84,  217 => 80,  214 => 79,  211 => 77,  208 => 76,  205 => 75,  199 => 71,  196 => 69,  188 => 63,  185 => 62,  182 => 61,  179 => 60,  173 => 56,  170 => 55,  164 => 53,  161 => 52,  158 => 51,  155 => 50,  153 => 49,  150 => 48,  147 => 47,  141 => 45,  135 => 43,  132 => 42,  130 => 41,  127 => 40,  124 => 39,  122 => 38,  119 => 37,  113 => 34,  110 => 33,  106 => 31,  104 => 30,  101 => 29,  97 => 27,  95 => 26,  92 => 25,  90 => 24,  87 => 23,  85 => 22,  82 => 21,  79 => 20,  76 => 19,  63 => 17,  57 => 16,  47 => 15,  42 => 13,  14 => 11,);
    }
}
