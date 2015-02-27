<?php

/* CoreOrderBundle:Order:step3_5.html.twig */
class __TwigTemplate_a9ebb6781f62229f53328bd72581fda3cd446304551fbbf0f1eb39b712abff38 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout.html.twig");

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
        echo "заказ, оформление, оплата, баланс";
    }

    // line 16
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Страница оформления заказа на сайте OliKids - выбор способа оплаты. Оплата заказа с баланса.";
    }

    // line 18
    public function block_menu($context, array $blocks = array())
    {
        echo " ";
    }

    // line 19
    public function block_js_head($context, array $blocks = array())
    {
        // line 20
        echo "
    ";
        // line 21
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
    ";
        // line 29
        echo "    <script>
        ";
        // line 30
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "products", array(), "any", true, true) && twig_length_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "products", array())))) {
            // line 31
            echo "            ";
            $context["cartCost"] = $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "orderCostInfo", array()), "total_cost", array(), "array");
            // line 32
            echo "                var google_tag_params = {
                    ecomm_pagetype: 'purchase',
                    ecomm_totalvalue: '";
            // line 34
            echo twig_escape_filter($this->env, (isset($context["cartCost"]) ? $context["cartCost"] : $this->getContext($context, "cartCost")), "html", null, true);
            echo "'
                };
                ";
        } else {
            // line 37
            echo "                    var google_tag_params = {
                        ecomm_pagetype: 'purchase'
                    };
        ";
        }
        // line 41
        echo "        ";
        // line 45
        echo "    </script>
    ";
        // line 46
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "d3b49e3_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d3b49e3_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/order_frontend.order_1.js");
            // line 52
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "d3b49e3_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d3b49e3_1") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/order_steps_2.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "d3b49e3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d3b49e3") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/order.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 54
        echo "
";
    }

    // line 57
    public function block_content($context, array $blocks = array())
    {
        // line 58
        echo "
    ";
        // line 59
        $this->displayBlock("order_breadcrumbs_block", $context, $blocks);
        echo "

    <div id=\"content\" class=\"order_page\" role=\"main\">

        <!-- main content col -->
        <div class=\"main_col\">
            <div class=\"main_col_pad\">

                ";
        // line 67
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "orderCostInfo", array(), "any", true, true) && ($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "orderCostInfo", array()), "total_cost", array()) > 0))) {
            // line 68
            echo "                    <h2>Оплата</h2>

                    <p>
                        На Вашем балансе ";
            // line 71
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction((isset($context["balance"]) ? $context["balance"] : $this->getContext($context, "balance"))), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "
                        <br>
                        Пожалуйста, выберите как Вы хотите оплатить заказ.
                    </p>

                    <form method=\"POST\">
                        <br/>

                        <div class=\"order_proceed\">
                            <a class=\"order_proceed_goprev\" href=\"";
            // line 80
            echo $this->env->getExtension('routing')->getPath("core_order_cart_step3");
            echo "\">Доставка</a>
                            <button class=\"common_button big\" name=\"balance\"><span>С баланса</span></button>
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            <button class=\"common_button big\" name=\"payment\"><span>Новый платеж</span></button>
                        </div>

                    </form>

                    ";
        } else {
            // line 91
            echo "
                        <div class=\"info_box\">";
            // line 92
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.cartIsEmpty"), "html", null, true);
            echo "</div>

                    ";
        }
        // line 95
        echo "
            </div>
        </div>
        <!-- /main content col -->

        <!-- side content col -->
        ";
        // line 101
        $this->displayBlock("order_summary_block", $context, $blocks);
        echo "
        <!-- /side content col -->

    </div>

";
    }

    // line 107
    public function block_footer($context, array $blocks = array())
    {
        // line 108
        echo "    ";
        $context["mixMarketList"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : $this->getContext($context, "ServiceContainer")), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "mix-market"), "method");
        // line 109
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "environment", array()) == "prod")) {
            // line 110
            $context["mixMarketList"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : $this->getContext($context, "ServiceContainer")), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "mix-market"), "method");
            // line 111
            echo "        ";
            echo $this->getAttribute((isset($context["mixMarketList"]) ? $context["mixMarketList"] : $this->getContext($context, "mixMarketList")), "cart", array(), "array");
        }
        // line 113
        $this->displayParentBlock("footer", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Order:step3_5.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  241 => 113,  237 => 111,  235 => 110,  233 => 109,  230 => 108,  227 => 107,  217 => 101,  209 => 95,  203 => 92,  200 => 91,  186 => 80,  172 => 71,  167 => 68,  165 => 67,  154 => 59,  151 => 58,  148 => 57,  143 => 54,  123 => 52,  119 => 46,  116 => 45,  114 => 41,  108 => 37,  102 => 34,  98 => 32,  95 => 31,  93 => 30,  90 => 29,  86 => 21,  83 => 20,  80 => 19,  74 => 18,  68 => 16,  62 => 15,  56 => 14,  21 => 12,  14 => 11,);
    }
}
