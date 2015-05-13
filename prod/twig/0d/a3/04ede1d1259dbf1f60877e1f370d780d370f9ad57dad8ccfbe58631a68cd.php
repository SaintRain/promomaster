<?php

/* CoreOrderBundle:Order:step4.html.twig */
class __TwigTemplate_0da304ede1d1259dbf1f60877e1f370d780d370f9ad57dad8ccfbe58631a68cd extends Twig_Template
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

        $_trait_0 = $this->env->loadTemplate("CoreOrderBundle:Order/Block:summary_info.html.twig");
        // line 11
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."CoreOrderBundle:Order/Block:summary_info.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $_trait_1 = $this->env->loadTemplate("CoreOrderBundle:Order/Block:breadcrumbs.html.twig");
        // line 12
        if (!$_trait_1->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."CoreOrderBundle:Order/Block:breadcrumbs.html.twig".'" cannot be used as a trait.');
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
                'menu' => array($this, 'block_menu'),
                'js_head' => array($this, 'block_js_head'),
                'content' => array($this, 'block_content'),
                'footer' => array($this, 'block_footer'),
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 14
    public function block_title($context, array $blocks = array())
    {
        echo "Оформление заказа - оплата | OliKids.ru";
    }

    // line 15
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "заказ, оформление, оплата";
    }

    // line 16
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Страница оформления заказа на сайте OliKids - выбор способа оплаты. Выберите наиболее подходящий Вам способ оплаты и нажмите кнопку &quot;Перейти к оплате&quot;.";
    }

    // line 18
    public function block_menu($context, array $blocks = array())
    {
        echo " ";
    }

    // line 20
    public function block_js_head($context, array $blocks = array())
    {
        // line 21
        echo "    ";
        ob_start();
        // line 22
        echo "        ";
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
        ";
        // line 30
        echo "        <script>
            ";
        // line 31
        if ((((isset($context["data"]) ? $context["data"] : null) && $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "products", array(), "any", true, true)) && twig_length_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "products", array())))) {
            // line 32
            echo "                ";
            $context["cartCost"] = $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "orderCostInfo", array()), "total_cost", array(), "array");
            // line 33
            echo "                    var google_tag_params = {
                        ecomm_pagetype: 'purchase',
                        ecomm_totalvalue: '";
            // line 35
            echo twig_escape_filter($this->env, (isset($context["cartCost"]) ? $context["cartCost"] : null), "html", null, true);
            echo "'
                    };
                    ";
        } else {
            // line 38
            echo "                        var google_tag_params = {
                            ecomm_pagetype: 'purchase'
                        };
            ";
        }
        // line 42
        echo "                ";
        // line 46
        echo "        </script>
        ";
        // line 47
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "d3b49e3_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d3b49e3_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/order_frontend.order_1.js");
            // line 53
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
        ";
            // asset "d3b49e3_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d3b49e3_1") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/order_steps_2.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "d3b49e3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d3b49e3") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/order.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 55
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 59
    public function block_content($context, array $blocks = array())
    {
        // line 60
        echo "    ";
        ob_start();
        // line 61
        echo "        ";
        $this->displayBlock("order_breadcrumbs_block", $context, $blocks);
        echo "

        <div id=\"content\" class=\"order_page\" role=\"main\">

            <!-- main content col -->
            <div class=\"main_col\">
                <div class=\"main_col_pad\">

                    ";
        // line 69
        if ($this->getAttribute((isset($context["messages"]) ? $context["messages"] : null), "error", array(), "any", true, true)) {
            // line 70
            echo "
                        <div class=\"payment-result alert alert-error\">

                            ";
            // line 73
            echo nl2br(twig_join_filter($this->getAttribute((isset($context["messages"]) ? $context["messages"] : null), "error", array()), "<br>"));
            echo "

                        </div>

                    ";
        } elseif ($this->getAttribute(        // line 77
(isset($context["messages"]) ? $context["messages"] : null), "success", array(), "any", true, true)) {
            // line 78
            echo "
                        <div class=\"payment-result alert alert-success\">

                            ";
            // line 81
            echo nl2br(twig_join_filter($this->getAttribute((isset($context["messages"]) ? $context["messages"] : null), "success", array()), "<br>"));
            echo "

                        </div>

                    ";
        }
        // line 86
        echo "
                    ";
        // line 87
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "orderCostInfo", array(), "any", true, true) && ($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "orderCostInfo", array()), "total_cost", array()) > 0))) {
            // line 88
            echo "
                        <h2>Способ оплаты</h2>

                        ";
            // line 91
            $this->env->loadTemplate("CoreOrderBundle:Order/Block:payment_system_switcher.html.twig")->display($context);
            // line 92
            echo "
                        <form method=\"POST\">

                            <input id=\"PaymentSystem\" type=\"hidden\" name=\"PaymentSystem\">

                            <div class=\"order_proceed\">
                                <a class=\"order_proceed_goprev\" href=\"";
            // line 98
            echo $this->env->getExtension('routing')->getPath("core_order_cart_step3");
            echo "\">Доставка</a>
                                <button class=\"common_button big with_arrow\" type=\"submit\"><span class=\"text-trigger\">Перейти к оплате...</span></button>
                            </div>

                        </form>

                     ";
        } else {
            // line 105
            echo "
                        <div class=\"info_box\">";
            // line 106
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.cartIsEmpty"), "html", null, true);
            echo "</div>

                    ";
        }
        // line 109
        echo "
                </div>
            </div>
            <!-- /main content col -->

            <!-- side content col -->
            ";
        // line 115
        $this->displayBlock("order_summary_block", $context, $blocks);
        echo "
            <!-- /side content col -->

        </div>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 123
    public function block_footer($context, array $blocks = array())
    {
        // line 124
        echo "
    ";
        // line 125
        $context["mixMarketList"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "mix-market"), "method");
        // line 126
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "environment", array()) == "prod")) {
            // line 128
            $context["mixMarketList"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "mix-market"), "method");
            // line 129
            echo "        ";
            echo $this->getAttribute((isset($context["mixMarketList"]) ? $context["mixMarketList"] : null), "cart", array(), "array");
        }
        // line 133
        $this->displayParentBlock("footer", $context, $blocks);
        echo "

";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Order:step4.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  280 => 133,  276 => 129,  274 => 128,  272 => 126,  270 => 125,  267 => 124,  264 => 123,  253 => 115,  245 => 109,  239 => 106,  236 => 105,  226 => 98,  218 => 92,  216 => 91,  211 => 88,  209 => 87,  206 => 86,  198 => 81,  193 => 78,  191 => 77,  184 => 73,  179 => 70,  177 => 69,  165 => 61,  162 => 60,  159 => 59,  153 => 55,  133 => 53,  129 => 47,  126 => 46,  124 => 42,  118 => 38,  112 => 35,  108 => 33,  105 => 32,  103 => 31,  100 => 30,  95 => 22,  92 => 21,  89 => 20,  83 => 18,  77 => 16,  71 => 15,  65 => 14,  56 => 9,  29 => 12,  22 => 11,  11 => 9,);
    }
}
