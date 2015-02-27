<?php

/* CoreCommonBundle:Pages:index.html.twig */
class __TwigTemplate_f32afa8833280a55f19c1a3b00b501125961d837c94f0590df35c37daa0360ab extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout.html.twig");

        $_trait_0 = $this->env->loadTemplate("CoreProductBundle:Catalog:product_cell.html.twig");
        // line 3
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."CoreProductBundle:Catalog:product_cell.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'js_head' => array($this, 'block_js_head'),
                'content' => array($this, 'block_content'),
                'title' => array($this, 'block_title'),
                'meta_keywords' => array($this, 'block_meta_keywords'),
                'meta_description' => array($this, 'block_meta_description'),
            )
        );
    }

    protected function doGetParent(array $context)
    {
        return "CoreCommonBundle::main_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_js_head($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
    <script>
        var google_tag_params = {
                ecomm_pagetype: 'home'
           }
         ";
        // line 12
        echo "    </script>
";
    }

    // line 17
    public function block_content($context, array $blocks = array())
    {
        // line 18
        echo "   ";
        // line 84
        echo "<div role=\"main\" id=\"content\">
    <div class=\"main_col\">
        <div class=\"main_col_pad\">
        <!-- products showcase -->
        <section class=\"products_showcase products_grid\">
            <div class=\"clear\">
                <ul class=\"text_tabs\">
                    ";
        // line 91
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["centerCategories"]) ? $context["centerCategories"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["centCat"]) {
            // line 92
            echo "                        <li class=\"text_tab in_cat_";
            echo twig_escape_filter($this->env, $this->getAttribute($context["centCat"], "name", array()), "html", null, true);
            if ($this->getAttribute($context["loop"], "first", array())) {
                echo " text_tab_active";
            }
            echo "\">
                            <span>";
            // line 93
            echo twig_escape_filter($this->env, $this->getAttribute($context["centCat"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
            echo "</span>
                        </li>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['centCat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 96
        echo "                </ul>
                ";
        // line 98
        echo "            </div>
            <div class=\"clear\">
                ";
        // line 100
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["centerCategories"]) ? $context["centerCategories"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["centCat"]) {
            // line 101
            echo "                    ";
            $context["i"] = 0;
            // line 102
            echo "                    ";
            $context["isFirst"] = (($this->getAttribute($context["loop"], "first", array())) ? (true) : (false));
            // line 103
            echo "                    ";
            $context["productLen"] = twig_length_filter($this->env, $this->getAttribute($context["centCat"], "products", array()));
            // line 104
            echo "                    ";
            $context["products"] = ((((isset($context["productLen"]) ? $context["productLen"] : null) > 8)) ? (twig_slice($this->env, $this->getAttribute($context["centCat"], "products", array()), 0, 7)) : ($this->getAttribute($context["centCat"], "products", array())));
            // line 105
            echo "                    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 106
                echo "                        ";
                if (((((isset($context["i"]) ? $context["i"] : null) % 4) == 0) || ((isset($context["productLen"]) ? $context["productLen"] : null) == 0))) {
                    // line 107
                    echo "                            <div class=\"products_grid_line grid_container in_cat_";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["centCat"], "name", array()), "html", null, true);
                    if ((!(isset($context["isFirst"]) ? $context["isFirst"] : null))) {
                        echo " hidden";
                    }
                    echo "\">
                        ";
                }
                // line 109
                echo "
                                ";
                // line 110
                $this->displayBlock("product", $context, $blocks);
                echo "

                               ";
                // line 133
                echo "                                    ";
                // line 135
                echo "                        ";
                $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
                // line 136
                echo "                        ";
                $context["productLen"] = ((isset($context["productLen"]) ? $context["productLen"] : null) - 1);
                // line 137
                echo "                        ";
                if (((((isset($context["i"]) ? $context["i"] : null) % 4) == 0) || ((isset($context["productLen"]) ? $context["productLen"] : null) == 0))) {
                    // line 138
                    echo "                            ";
                    $context["i"] = 0;
                    // line 139
                    echo "                            </div>
                        ";
                }
                // line 141
                echo "                    ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 142
            echo "                ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['centCat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 143
        echo "            </div>
        </section>
        <!-- brands showcase -->
        ";
        // line 146
        if (twig_length_filter($this->env, (isset($context["brands"]) ? $context["brands"] : null))) {
            // line 147
            echo "        <section class=\"brands showcase_box\">
                <h2>
                    <a href=\"javascript:void(0);\">Бренды</a>
                </h2>
                ";
            // line 154
            echo "                <div class=\"showcase_container\">
                    <ul class=\"showcase_list slider multiple-items\">
                        ";
            // line 156
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["brands"]) ? $context["brands"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["brand"]) {
                // line 157
                echo "                            <li class=\"showcase_item\">
                                <a href=\"";
                // line 158
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("core_shop_product_brand_first_page", array("slug" => $this->getAttribute($context["brand"], "slug", array()))), "html", null, true);
                echo "\">
                                    ";
                // line 159
                if ($this->getAttribute($context["brand"], "logo", array())) {
                    // line 160
                    echo "                                        ";
                    if ($this->getAttribute(twig_first($this->env, $this->getAttribute($context["brand"], "logo", array())), ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())))) {
                        // line 161
                        echo "                                            ";
                        $context["imgAlt"] = $this->getAttribute(twig_first($this->env, $this->getAttribute($context["brand"], "logo", array())), ("alt" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
                        // line 162
                        echo "                                            ";
                    } else {
                        // line 163
                        echo "                                                ";
                        $context["imgAlt"] = $this->getAttribute($context["brand"], ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array())));
                        // line 164
                        echo "                                        ";
                    }
                    // line 165
                    echo "
                                        <img alt=\"";
                    // line 166
                    echo twig_escape_filter($this->env, (isset($context["imgAlt"]) ? $context["imgAlt"] : null), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, (isset($context["imgAlt"]) ? $context["imgAlt"] : null), "html", null, true);
                    echo "\" src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter(twig_first($this->env, $this->getAttribute($context["brand"], "logo", array())), "preview", "148x70_")), "html", null, true);
                    echo "\">
                                    ";
                } else {
                    // line 168
                    echo "                                        <img title=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("msg.image_not_found", array(), "frontend"), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("msg.image_not_found", array(), "frontend"), "html", null, true);
                    echo "\" src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/image_not_found/64x64.jpg"), "html", null, true);
                    echo "\">
                                    ";
                }
                // line 170
                echo "                                </a>
                            </li>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['brand'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 173
            echo "                    </ul>
                </div>
        </section>
        ";
        }
        // line 177
        echo "
        ";
        // line 194
        echo "        </div>
    </div> <!-- /main content col -->

    <!-- side content col -->
    <aside class=\"side_col\">
        <div class=\"side_col_pad\">
            <!-- filter with owl -->
            ";
        // line 201
        $this->env->loadTemplate("CorePropertyBundle:Filter:layout.html.twig")->display(array_merge($context, (isset($context["filterBuilder"]) ? $context["filterBuilder"] : null)));
        // line 202
        echo "            <!-- /filter with owl -->
        </div>
    </aside>
    <!-- /side content col -->
</div>
";
    }

    // line 210
    public function block_title($context, array $blocks = array())
    {
        echo "OliKids.ru — интернет-магазин игрушек и детских товаров";
    }

    // line 211
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "Детские игрушки, транспорт, куклы, машинки, детские товары";
    }

    // line 212
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Интернет-магазин детских товаров, где можно купить игрушки, самокаты, радионяни, бутылочки.";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Pages:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  353 => 212,  347 => 211,  341 => 210,  332 => 202,  330 => 201,  321 => 194,  318 => 177,  312 => 173,  304 => 170,  294 => 168,  285 => 166,  282 => 165,  279 => 164,  276 => 163,  273 => 162,  270 => 161,  267 => 160,  265 => 159,  261 => 158,  258 => 157,  254 => 156,  250 => 154,  244 => 147,  242 => 146,  237 => 143,  223 => 142,  209 => 141,  205 => 139,  202 => 138,  199 => 137,  196 => 136,  193 => 135,  191 => 133,  186 => 110,  183 => 109,  174 => 107,  171 => 106,  153 => 105,  150 => 104,  147 => 103,  144 => 102,  141 => 101,  124 => 100,  120 => 98,  117 => 96,  100 => 93,  92 => 92,  75 => 91,  66 => 84,  64 => 18,  61 => 17,  56 => 12,  47 => 6,  44 => 5,  14 => 3,);
    }
}
