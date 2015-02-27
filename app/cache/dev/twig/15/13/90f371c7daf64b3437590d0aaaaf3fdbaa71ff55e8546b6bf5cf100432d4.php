<?php

/* CoreProductBundle:Catalog:products_container.html.twig */
class __TwigTemplate_151390f371c7daf64b3437590d0aaaaf3fdbaa71ff55e8546b6bf5cf100432d4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $_trait_0 = $this->env->loadTemplate("CoreProductBundle:Catalog:products_grid.html.twig");
        // line 9
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."CoreProductBundle:Catalog:products_grid.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'products_container' => array($this, 'block_products_container'),
                'products_container_filter_sort_last' => array($this, 'block_products_container_filter_sort_last'),
                'products_container_controls' => array($this, 'block_products_container_controls'),
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
        $this->displayBlock('products_container', $context, $blocks);
    }

    public function block_products_container($context, array $blocks = array())
    {
        // line 12
        echo "    ";
        ob_start();
        // line 13
        echo "
        ";
        // line 14
        if (($this->getAttribute((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), "getTotalItemCount", array()) > 0)) {
            // line 15
            echo "
            ";
            // line 16
            $context["GET"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "query", array());
            // line 17
            echo "            ";
            $context["parameters"] = twig_array_merge(twig_array_merge($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route_params"), "method"), $this->getAttribute((isset($context["GET"]) ? $context["GET"] : $this->getContext($context, "GET")), "all", array())), array("page" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "page"), "method")));
            // line 18
            echo "            ";
            $context["sort"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "query", array()), "get", array(0 => "sort"), "method");
            // line 19
            echo "
            ";
            // line 20
            if ( !array_key_exists("showLimit", $context)) {
                // line 21
                echo "                ";
                $context["showLimit"] = 500;
                // line 22
                echo "            ";
            }
            // line 23
            echo "            ";
            if ( !array_key_exists("showDefault", $context)) {
                // line 24
                echo "                ";
                $context["showDefault"] = 12;
                // line 25
                echo "            ";
            }
            // line 26
            echo "
            ";
            // line 27
            if (((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") != "core_common_search_first_page") && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") != "core_common_search")) || (isset($context["filterBuilder"]) ? $context["filterBuilder"] : $this->getContext($context, "filterBuilder")))) {
                // line 28
                echo "
                <!-- sort -->
                <!--noindex-->
                <div class=\"filter_sort\">
                    ";
                // line 32
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("sort.by", array(), "frontend"), "html", null, true);
                echo "
                    <ul class=\"filter_sort_switches\">
                        <li class=\"filter_sort_switch ";
                // line 34
                if (((isset($context["sort"]) ? $context["sort"] : $this->getContext($context, "sort")) == "name_desc")) {
                    echo "active desc";
                } elseif (((isset($context["sort"]) ? $context["sort"] : $this->getContext($context, "sort")) == "name_asc")) {
                    echo "active";
                }
                echo "\">
                            <a rel=\"nofollow\" href=\"";
                // line 35
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["routeFirsPage"]) ? $context["routeFirsPage"] : $this->getContext($context, "routeFirsPage")), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : $this->getContext($context, "parameters")), array("sort" => ((((isset($context["sort"]) ? $context["sort"] : $this->getContext($context, "sort")) == "name_asc")) ? ("name_desc") : ("name_asc"))))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("sort.name", array(), "frontend"), "html", null, true);
                echo "</a>
                        </li>
                        <li class=\"filter_sort_switch ";
                // line 37
                if (((isset($context["sort"]) ? $context["sort"] : $this->getContext($context, "sort")) == "price_desc")) {
                    echo "active desc";
                } elseif (((isset($context["sort"]) ? $context["sort"] : $this->getContext($context, "sort")) == "price_asc")) {
                    echo "active";
                }
                echo "\">
                            <a rel=\"nofollow\" href=\"";
                // line 38
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["routeFirsPage"]) ? $context["routeFirsPage"] : $this->getContext($context, "routeFirsPage")), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : $this->getContext($context, "parameters")), array("sort" => ((((isset($context["sort"]) ? $context["sort"] : $this->getContext($context, "sort")) == "price_asc")) ? ("price_desc") : ("price_asc"))))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("sort.price", array(), "frontend"), "html", null, true);
                echo "</a>
                        </li>

                        ";
                // line 41
                $this->displayBlock('products_container_filter_sort_last', $context, $blocks);
                // line 48
                echo "
                    </ul>
                </div>
                <!--/noindex-->
                <!-- /sort -->

            ";
            }
            // line 55
            echo "
            <!-- controls -->
            ";
            // line 57
            $this->displayBlock('products_container_controls', $context, $blocks);
            // line 58
            echo "            <!-- /controls -->

            <!-- products showcase -->
                ";
            // line 62
            echo "                ";
            $this->displayBlock("products_grid", $context, $blocks);
            echo "
            <!-- /products showcase -->

            <!-- pagination -->
            <div class=\"pagination\">

                ";
            // line 68
            echo $this->env->getExtension('knp_pagination')->render((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), "CoreProductBundle:Catalog:pagination.html.twig", array(), array("routeFirsPage" => (isset($context["routeFirsPage"]) ? $context["routeFirsPage"] : $this->getContext($context, "routeFirsPage"))));
            echo "

                ";
            // line 70
            if (($this->getAttribute((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")), "getTotalItemCount", array()) > (isset($context["showDefault"]) ? $context["showDefault"] : $this->getContext($context, "showDefault")))) {
                // line 71
                echo "
                    ";
                // line 72
                $context["parameters"] = twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : $this->getContext($context, "parameters")), array("page" => null));
                // line 73
                echo "                    <!--noindex-->
                    <div class=\"pagination_setings\">
                        ";
                // line 75
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("show.by", array(), "frontend"), "html", null, true);
                echo "
                        <ul class=\"pagination_pp_qnts\">
                            <li class=\"pagination_pp_qnt\">

                                ";
                // line 79
                if ((($this->getAttribute((isset($context["GET"]) ? $context["GET"] : $this->getContext($context, "GET")), "get", array(0 => "show"), "method") == 12) ||  !$this->getAttribute((isset($context["GET"]) ? $context["GET"] : $this->getContext($context, "GET")), "get", array(0 => "show"), "method"))) {
                    // line 80
                    echo "                                    <strong>12</strong>
                                ";
                } else {
                    // line 82
                    echo "                                    <a rel=\"nofollow\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["routeFirsPage"]) ? $context["routeFirsPage"] : $this->getContext($context, "routeFirsPage")), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : $this->getContext($context, "parameters")), array("show" => 12))), "html", null, true);
                    echo "\">12</a>
                                ";
                }
                // line 84
                echo "
                            </li>
                            <li class=\"pagination_pp_qnt\">

                                ";
                // line 88
                if (($this->getAttribute((isset($context["GET"]) ? $context["GET"] : $this->getContext($context, "GET")), "get", array(0 => "show"), "method") == 24)) {
                    // line 89
                    echo "                                    <strong>24</strong>
                                ";
                } else {
                    // line 91
                    echo "                                    <a rel=\"nofollow\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["routeFirsPage"]) ? $context["routeFirsPage"] : $this->getContext($context, "routeFirsPage")), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : $this->getContext($context, "parameters")), array("show" => 24))), "html", null, true);
                    echo "\">24</a>
                                ";
                }
                // line 93
                echo "
                            </li>
                            <li class=\"pagination_pp_qnt\">

                                ";
                // line 97
                if (($this->getAttribute((isset($context["GET"]) ? $context["GET"] : $this->getContext($context, "GET")), "get", array(0 => "show"), "method") == 48)) {
                    // line 98
                    echo "                                    <strong>48</strong>
                                ";
                } else {
                    // line 100
                    echo "                                    <a rel=\"nofollow\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["routeFirsPage"]) ? $context["routeFirsPage"] : $this->getContext($context, "routeFirsPage")), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : $this->getContext($context, "parameters")), array("show" => 48))), "html", null, true);
                    echo "\">48</a>
                                ";
                }
                // line 102
                echo "
                            </li>
                            ";
                // line 129
                echo "                        </ul>
                    </div>
                    <!--/noindex-->
                ";
            }
            // line 133
            echo "
            </div>
            <!-- /pagination -->

        ";
        } else {
            // line 138
            echo "
            <div class=\"attention_box\">
                <h6>Товары не найдены</h6>
            </div>

        ";
        }
        // line 144
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 41
    public function block_products_container_filter_sort_last($context, array $blocks = array())
    {
        // line 42
        echo "
                            <li class=\"filter_sort_switch ";
        // line 43
        if (((isset($context["sort"]) ? $context["sort"] : $this->getContext($context, "sort")) == "pop_desc")) {
            echo "active desc";
        } elseif (((isset($context["sort"]) ? $context["sort"] : $this->getContext($context, "sort")) == "pop_asc")) {
            echo "active";
        }
        echo "\">
                                <a rel=\"nofollow\" href=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["routeFirsPage"]) ? $context["routeFirsPage"] : $this->getContext($context, "routeFirsPage")), twig_array_merge((isset($context["parameters"]) ? $context["parameters"] : $this->getContext($context, "parameters")), array("sort" => ((((isset($context["sort"]) ? $context["sort"] : $this->getContext($context, "sort")) == "pop_asc")) ? ("pop_desc") : ("pop_asc"))))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("sort.pop", array(), "frontend"), "html", null, true);
        echo "</a>
                            </li>

                        ";
    }

    // line 57
    public function block_products_container_controls($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Catalog:products_container.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  293 => 57,  283 => 44,  275 => 43,  272 => 42,  269 => 41,  263 => 144,  255 => 138,  248 => 133,  242 => 129,  238 => 102,  232 => 100,  228 => 98,  226 => 97,  220 => 93,  214 => 91,  210 => 89,  208 => 88,  202 => 84,  196 => 82,  192 => 80,  190 => 79,  183 => 75,  179 => 73,  177 => 72,  174 => 71,  172 => 70,  167 => 68,  157 => 62,  152 => 58,  150 => 57,  146 => 55,  137 => 48,  135 => 41,  127 => 38,  119 => 37,  112 => 35,  104 => 34,  99 => 32,  93 => 28,  91 => 27,  88 => 26,  85 => 25,  82 => 24,  79 => 23,  76 => 22,  73 => 21,  71 => 20,  68 => 19,  65 => 18,  62 => 17,  60 => 16,  57 => 15,  55 => 14,  52 => 13,  49 => 12,  43 => 11,  40 => 10,  37 => 8,  34 => 1,  14 => 9,);
    }
}
