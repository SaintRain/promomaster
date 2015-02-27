<?php

/* CoreOrderBundle:Order:step3.html.twig */
class __TwigTemplate_2e71b154516ff3b1981a29fb8cc247f3d6474137845607ff8fb0ae6b46df93c8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout.html.twig");

        $_trait_0 = $this->env->loadTemplate("CoreOrderBundle:Order/Block:summary_info.html.twig");
        // line 10
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."CoreOrderBundle:Order/Block:summary_info.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $_trait_1 = $this->env->loadTemplate("CoreOrderBundle:Order/Block:breadcrumbs.html.twig");
        // line 11
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

    // line 13
    public function block_title($context, array $blocks = array())
    {
        echo "Оформление заказа - способ доставки | OliKids.ru";
    }

    // line 14
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "заказ, оформление, доставка";
    }

    // line 15
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Страница оформления заказа на сайте OliKids - выбор способа доставки. Выберите наиболее подходящий Вам способ получения товара. Проверьте введенные Вами данные.";
    }

    // line 17
    public function block_menu($context, array $blocks = array())
    {
        echo " ";
    }

    // line 18
    public function block_js_head($context, array $blocks = array())
    {
        // line 19
        echo "    ";
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
    ";
        // line 20
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "d3b49e3_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d3b49e3_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/order_frontend.order_1.js");
            // line 26
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
            // asset "d3b49e3_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d3b49e3_1") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/order_steps_2.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "d3b49e3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d3b49e3") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/order.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 28
        echo "    <script src=\"http://api-maps.yandex.ru/2.1/?lang=ru_RU\" type=\"text/javascript\"></script>
    <script>
        settingsJS.routes['ajax_contact_cart'] = '";
        // line 30
        echo $this->env->getExtension('routing')->getPath("core_order_contact");
        echo "';
        settingsJS.routes['ajax_delivery_calculate'] = '";
        // line 31
        echo $this->env->getExtension('routing')->getPath("delivery_calculate");
        echo "';
        settingsJS.trans['order_label_delivery_time'] = \"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.deleryTime"), "html", null, true);
        echo "\";
        settingsJS.trans['order_label_delivery_error'] = \"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.deliveryError"), "html", null, true);
        echo "\";
        settingsJS.trans['order_label_delivery_re_calc'] = \"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.delivetyReCalc"), "html", null, true);
        echo "\";
        settingsJS.trans['order_label_rub'] = \"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.rub"), "html", null, true);
        echo "\";
        settingsJS.trans['order_label_delivery_error_full'] = \"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.deliveryErrorFull"), "html", null, true);
        echo "\";
        settingsJS.trans['form_error'] = \"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.form.errors"), "html", null, true);
        echo "\";
        settingsJS.trans['order_delivery_in_proccess'] = \"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.inProcess"), "html", null, true);
        echo "\";
    </script>
";
    }

    // line 42
    public function block_content($context, array $blocks = array())
    {
        // line 43
        echo "    ";
        $this->displayBlock("order_breadcrumbs_block", $context, $blocks);
        echo "
<div id=\"content\" class=\"order_page\" role=\"main\">
    <div class=\"main_col\">
        <div class=\"main_col_pad\">
            ";
        // line 47
        if ((isset($context["isCartEmpty"]) ? $context["isCartEmpty"] : null)) {
            // line 48
            echo "                <div class=\"info_box\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.cartIsEmpty"), "html", null, true);
            echo "</div>
                ";
        } else {
            // line 50
            echo "                <div id=\"from_form\"></div>
                ";
            // line 51
            $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : null), array(0 => "CoreOrderBundle:Form:row.html.twig"));
            // line 52
            echo "                <form id=\"delivery_form\" action=\"";
            echo $this->env->getExtension('routing')->getPath("core_order_cart_step3");
            echo "\" ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
            echo " method=\"POST\">
                    <div id=\"in_form\">
                        <h2>";
            // line 54
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.form.delivery.method"), "html", null, true);
            echo "</h2>
                        ";
            // line 56
            echo "                        ";
            $context["selectedValue"] = false;
            // line 57
            echo "                        ";
            $context["curId"] = false;
            // line 58
            echo "                        ";
            $context["curCompanyId"] = false;
            // line 59
            echo "                        ";
            $context["selectedValue"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "deliveryMethod", array()), "vars", array()), "value", array());
            // line 60
            echo "                        ";
            if (((isset($context["deliveryMethodId"]) ? $context["deliveryMethodId"] : null) && (!(isset($context["selectedValue"]) ? $context["selectedValue"] : null)))) {
                // line 61
                echo "                            ";
                $context["selectedValue"] = (isset($context["deliveryMethodId"]) ? $context["deliveryMethodId"] : null);
                // line 62
                echo "                        ";
            }
            // line 63
            echo "                        ";
            // line 64
            echo "                        <ul class=\"order_delivery_group group_switcher clearfix\">
                            ";
            // line 65
            if ((isset($context["selectedValue"]) ? $context["selectedValue"] : null)) {
                // line 66
                echo "                                ";
                $context["serviceTypeId"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["serviceList"]) ? $context["serviceList"] : null), (isset($context["selectedValue"]) ? $context["selectedValue"] : null), array(), "array"), "serviceType", array()), "position", array());
                // line 67
                echo "                                ";
                $context["curCompanyId"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["serviceTypeList"]) ? $context["serviceTypeList"] : null), (isset($context["serviceTypeId"]) ? $context["serviceTypeId"] : null), array(), "array"), "company", array(), "array"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["serviceList"]) ? $context["serviceList"] : null), (isset($context["selectedValue"]) ? $context["selectedValue"] : null), array(), "array"), "company", array()), "position", array()), array(), "array"), "position", array());
                // line 68
                echo "                            ";
            }
            // line 69
            echo "                            ";
            if ((isset($context["selectedValue"]) ? $context["selectedValue"] : null)) {
                // line 70
                echo "                                ";
                $context["firstInCityId"] = 0;
                // line 71
                echo "                                ";
                $context["firstWithAddress"] = null;
                // line 72
                echo "                                ";
                $context["firstWithAddresId"] = 0;
                // line 73
                echo "                                ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["serviceList"]) ? $context["serviceList"] : null), (isset($context["selectedValue"]) ? $context["selectedValue"] : null), array(), "array"), "company", array()), "services", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["serv"]) {
                    // line 74
                    echo "                                    ";
                    if (($this->getAttribute($context["serv"], "city", array(), "any", true, true) && (!(isset($context["firstInCityId"]) ? $context["firstInCityId"] : null)))) {
                        // line 75
                        echo "                                        ";
                        $context["firstInCityId"] = $this->getAttribute($context["serv"], "id", array());
                        // line 76
                        echo "                                    ";
                    }
                    // line 77
                    echo "                                    ";
                    if (($this->getAttribute($context["serv"], "addresses", array(), "any", true, true) && (!(isset($context["firstWithAddress"]) ? $context["firstWithAddress"] : null)))) {
                        // line 78
                        echo "                                        ";
                        $context["firstWithAddress"] = $context["serv"];
                        // line 79
                        echo "                                        ";
                        $context["firstWithAddressId"] = $this->getAttribute($context["serv"], "id", array());
                        // line 80
                        echo "                                    ";
                    }
                    // line 81
                    echo "                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['serv'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 82
                echo "                            ";
            }
            // line 83
            echo "                            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["serviceTypeList"]) ? $context["serviceTypeList"] : null));
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
            foreach ($context['_seq'] as $context["key"] => $context["val"]) {
                // line 84
                echo "
                                <li class=\"group_switch delivery_group_";
                // line 85
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["val"], "serviceType", array(), "array"), "name", array()), "html", null, true);
                echo "
                                ";
                // line 86
                if ((((((((array_key_exists("firstWithAddress", $context) && (isset($context["firstWithAddress"]) ? $context["firstWithAddress"] : null)) && array_key_exists("serviceTypeId", $context)) && ((isset($context["serviceTypeId"]) ? $context["serviceTypeId"] : null) == $context["key"])) && ($this->getAttribute((isset($context["firstWithAddress"]) ? $context["firstWithAddress"] : null), "id", array()) == (isset($context["selectedValue"]) ? $context["selectedValue"] : null))) && (isset($context["deliveryPoint"]) ? $context["deliveryPoint"] : null)) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["firstWithAddress"]) ? $context["firstWithAddress"] : null), "addresses", array()), "first", array(), "method"), "id", array()) == (isset($context["deliveryPoint"]) ? $context["deliveryPoint"] : null))) || (((array_key_exists("serviceTypeId", $context) && ((isset($context["serviceTypeId"]) ? $context["serviceTypeId"] : null) == $context["key"])) && array_key_exists("firstInCityId", $context)) && ((isset($context["firstInCityId"]) ? $context["firstInCityId"] : null) == (isset($context["selectedValue"]) ? $context["selectedValue"] : null))))) {
                    echo "selected";
                }
                // line 87
                echo "                                ";
                if (((isset($context["selectedValue"]) ? $context["selectedValue"] : null) && ((isset($context["serviceTypeId"]) ? $context["serviceTypeId"] : null) == $context["key"]))) {
                    echo " active";
                } elseif (((!(isset($context["selectedValue"]) ? $context["selectedValue"] : null)) && $this->getAttribute($context["loop"], "first", array()))) {
                    echo "active";
                }
                echo "\">
                                    <span class=\"group_switch_icon\">&nbsp;</span>
                                    <span class=\"group_switch_text\">";
                // line 89
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["val"], "serviceType", array(), "array"), "captionRu", array()), "html", null, true);
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
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 92
            echo "                        </ul>
                        <div class=\"order_delivery_type type_switcher";
            // line 93
            if (((isset($context["selectedValue"]) ? $context["selectedValue"] : null) && ($this->getAttribute($this->getAttribute((isset($context["serviceList"]) ? $context["serviceList"] : null), (isset($context["selectedValue"]) ? $context["selectedValue"] : null), array(), "array", false, true), "addresses", array(), "any", true, true) || $this->getAttribute($this->getAttribute((isset($context["serviceList"]) ? $context["serviceList"] : null), (isset($context["selectedValue"]) ? $context["selectedValue"] : null), array(), "array", false, true), "city", array(), "any", true, true)))) {
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["serviceList"]) ? $context["serviceList"] : null), (isset($context["selectedValue"]) ? $context["selectedValue"] : null), array(), "array"), "serviceType", array()), "name", array()), "html", null, true);
                echo " ";
            } else {
                echo " brown_gradient_box";
            }
            echo "\">
                            ";
            // line 94
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["serviceTypeList"]) ? $context["serviceTypeList"] : null));
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
            foreach ($context['_seq'] as $context["key"] => $context["val"]) {
                // line 95
                echo "                                ";
                $context["firstService"] = twig_first($this->env, $this->getAttribute($context["val"], "service", array(), "array"));
                // line 96
                echo "                                ";
                if ((!($this->getAttribute((isset($context["firstService"]) ? $context["firstService"] : null), "addresses", array(), "any", true, true) || $this->getAttribute((isset($context["firstService"]) ? $context["firstService"] : null), "city", array(), "any", true, true)))) {
                    // line 97
                    echo "                                    <ul class=\"type_switches delivery_group_";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["val"], "serviceType", array(), "array"), "name", array()), "html", null, true);
                    echo " ";
                    if (((isset($context["selectedValue"]) ? $context["selectedValue"] : null) && ((isset($context["serviceTypeId"]) ? $context["serviceTypeId"] : null) == $context["key"]))) {
                        echo " active";
                    } elseif (((!(isset($context["selectedValue"]) ? $context["selectedValue"] : null)) && $this->getAttribute($context["loop"], "first", array()))) {
                        echo " active";
                    }
                    echo "\">
                                        ";
                    // line 98
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["val"], "company", array(), "array"));
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
                    foreach ($context['_seq'] as $context["key"] => $context["company"]) {
                        // line 99
                        echo "                                            <li class=\"";
                        if (((isset($context["selectedValue"]) ? $context["selectedValue"] : null) && ($this->getAttribute($this->getAttribute($this->getAttribute($context["company"], "services", array()), "first", array(), "method"), "id", array()) == (isset($context["selectedValue"]) ? $context["selectedValue"] : null)))) {
                            echo "selected ";
                        }
                        echo "type_switch ";
                        if ((((isset($context["curCompanyId"]) ? $context["curCompanyId"] : null) && ((isset($context["curCompanyId"]) ? $context["curCompanyId"] : null) == $context["key"])) || ((!(isset($context["curCompanyId"]) ? $context["curCompanyId"] : null)) && $this->getAttribute($context["loop"], "first", array())))) {
                            echo " active";
                        }
                        echo "\">
                                                <span class=\"delivery_";
                        // line 100
                        echo twig_escape_filter($this->env, $this->getAttribute($context["company"], "name", array()), "html", null, true);
                        echo " delivery_icon type_switch_icon\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["company"], "captionRu", array()), "html", null, true);
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
                    unset($context['_seq'], $context['_iterated'], $context['key'], $context['company'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 103
                    echo "                                    </ul>
                                ";
                }
                // line 105
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
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 106
            echo "                        </div>
                        
                        <div class=\"order_delivery_options
                            ";
            // line 109
            if (((isset($context["selectedValue"]) ? $context["selectedValue"] : null) && $this->getAttribute($this->getAttribute((isset($context["serviceList"]) ? $context["serviceList"] : null), (isset($context["selectedValue"]) ? $context["selectedValue"] : null), array(), "array", false, true), "addresses", array(), "any", true, true))) {
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["serviceList"]) ? $context["serviceList"] : null), (isset($context["selectedValue"]) ? $context["selectedValue"] : null), array(), "array"), "serviceType", array()), "name", array()), "html", null, true);
                echo "
                            ";
            } elseif (((isset($context["selectedValue"]) ? $context["selectedValue"] : null) && $this->getAttribute($this->getAttribute((isset($context["serviceList"]) ? $context["serviceList"] : null), (isset($context["selectedValue"]) ? $context["selectedValue"] : null), array(), "array", false, true), "city", array(), "any", true, true))) {
                // line 110
                echo " delivery_group_";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["serviceList"]) ? $context["serviceList"] : null), (isset($context["selectedValue"]) ? $context["selectedValue"] : null), array(), "array"), "serviceType", array()), "name", array()), "html", null, true);
                echo "
                            ";
            }
            // line 112
            echo "                            ";
            if ((!(isset($context["selectedValue"]) ? $context["selectedValue"] : null))) {
                // line 113
                echo "                            ";
                $context["serviceTypeListFirst"] = twig_first($this->env, (isset($context["serviceTypeList"]) ? $context["serviceTypeList"] : null));
                // line 114
                echo "                                ";
                $context["serviceTypeListFirstService"] = twig_first($this->env, $this->getAttribute((isset($context["serviceTypeListFirst"]) ? $context["serviceTypeListFirst"] : null), "service", array(), "array"));
                // line 115
                echo "                                ";
                if ($this->getAttribute((isset($context["serviceTypeListFirstService"]) ? $context["serviceTypeListFirstService"] : null), "addresses", array(), "any", true, true)) {
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["serviceTypeListFirst"]) ? $context["serviceTypeListFirst"] : null), "serviceType", array(), "array"), "name", array()), "html", null, true);
                    echo "
                                ";
                } elseif ($this->getAttribute((isset($context["serviceTypeListFirstService"]) ? $context["serviceTypeListFirstService"] : null), "city", array(), "any", true, true)) {
                    // line 116
                    echo " delivery_group_";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["serviceTypeListFirst"]) ? $context["serviceTypeListFirst"] : null), "serviceType", array(), "array"), "name", array()), "html", null, true);
                }
                // line 117
                echo "                            ";
            }
            echo "\"
                        >
                            <table class=\"delivery_methods order_delivery_options_list\">
                                ";
            // line 120
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["serviceTypeList"]) ? $context["serviceTypeList"] : null));
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
            foreach ($context['_seq'] as $context["serviceTypeId"] => $context["val"]) {
                // line 121
                echo "                                    ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["val"], "company", array(), "array"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["company"]) {
                    // line 122
                    echo "                                        ";
                    // line 123
                    echo "                                        ";
                    $context["firstInCity"] = 0;
                    // line 124
                    echo "                                        ";
                    $context["curIndex"] = 0;
                    // line 125
                    echo "                                        ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["company"], "services", array()));
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
                    foreach ($context['_seq'] as $context["key"] => $context["deliveryMethod"]) {
                        // line 126
                        echo "                                            ";
                        if (($this->getAttribute($context["deliveryMethod"], "city", array(), "any", true, true) && (!(isset($context["firstInCity"]) ? $context["firstInCity"] : null)))) {
                            // line 127
                            echo "                                                ";
                            $context["firstInCity"] = 1;
                            // line 128
                            echo "                                                ";
                            $context["curIndex"] = $this->getAttribute($context["loop"], "index", array());
                            // line 129
                            echo "                                            ";
                        }
                        // line 130
                        echo "                                            ";
                        if (($this->getAttribute($this->getAttribute($context["deliveryMethod"], "serviceType", array()), "position", array()) == $context["serviceTypeId"])) {
                            // line 131
                            echo "                                                ";
                            if ($this->getAttribute($context["deliveryMethod"], "addresses", array(), "any", true, true)) {
                                // line 132
                                echo "                                                    ";
                                $context['_parent'] = (array) $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["deliveryMethod"], "addresses", array()));
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
                                foreach ($context['_seq'] as $context["_key"] => $context["address"]) {
                                    // line 133
                                    echo "                                                        ";
                                    if ($this->getAttribute($context["address"], "status", array())) {
                                        // line 134
                                        echo "                                                            <tr data-company=\"delivery_";
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["deliveryMethod"], "company", array()), "name", array()), "html", null, true);
                                        echo "\" data-group=\"delivery_group_";
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["deliveryMethod"], "serviceType", array()), "name", array()), "html", null, true);
                                        echo "\" class=\"";
                                        if ($this->getAttribute($context["loop"], "first", array())) {
                                            echo "first ";
                                        }
                                        echo " ";
                                        if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "deliveryPoint", array()), "vars", array()), "value", array()) && ($this->getAttribute($context["address"], "id", array()) == $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "deliveryPoint", array()), "vars", array()), "value", array()))) || ($this->getAttribute($context["address"], "id", array()) == (isset($context["deliveryPoint"]) ? $context["deliveryPoint"] : null)))) {
                                            echo "selected ";
                                        }
                                        if ($this->getAttribute($context["loop"], "last", array())) {
                                            echo "last ";
                                        }
                                        echo "order_delivery_option delivery_group_";
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["deliveryMethod"], "serviceType", array()), "name", array()), "html", null, true);
                                        echo " delivery_";
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["deliveryMethod"], "company", array()), "name", array()), "html", null, true);
                                        echo " ";
                                        if (((twig_length_filter($this->env, (isset($context["activeServices"]) ? $context["activeServices"] : null)) && $this->getAttribute((isset($context["activeServices"]) ? $context["activeServices"] : null), $this->getAttribute($context["deliveryMethod"], "id", array()), array(), "array", true, true)) || (isset($context["deliveryPoint"]) ? $context["deliveryPoint"] : null))) {
                                            echo " active";
                                        }
                                        echo "\">
                                                                <td class=\"order_delivery_option_select\">
                                                                    <input data-delivery-method=\"";
                                        // line 136
                                        echo twig_escape_filter($this->env, $this->getAttribute($context["deliveryMethod"], "id", array()), "html", null, true);
                                        echo "\" class=\"delivery_point\" type=\"radio\" value=\"";
                                        echo twig_escape_filter($this->env, $this->getAttribute($context["address"], "id", array()), "html", null, true);
                                        echo "\" name=\"delivery_point[]\" required=\"required\" ";
                                        if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "deliveryPoint", array()), "vars", array()), "value", array()) && ($this->getAttribute($context["address"], "id", array()) == $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "deliveryPoint", array()), "vars", array()), "value", array()))) || ($this->getAttribute($context["address"], "id", array()) == (isset($context["deliveryPoint"]) ? $context["deliveryPoint"] : null)))) {
                                            echo " checked=\"checked\"";
                                        }
                                        echo "/>
                                                                </td>
                                                                <td class=\"order_delivery_option_name\" colspan=\"2\">
                                                                    <strong>";
                                        // line 139
                                        echo twig_escape_filter($this->env, $this->getAttribute($context["address"], "fullCaptionRu", array()), "html", null, true);
                                        echo "</strong>
                                                                    ";
                                        // line 140
                                        if ($this->getAttribute($context["address"], "description", array())) {
                                            // line 141
                                            echo "                                                                        <br />
                                                                        <span>";
                                            // line 142
                                            echo nl2br(twig_escape_filter($this->env, $this->getAttribute($context["address"], "description", array()), "html", null, true));
                                            echo "</span>
                                                                    ";
                                        }
                                        // line 144
                                        echo "                                                                    ";
                                        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "orderDeliveryDays", array())) {
                                            // line 145
                                            echo "                                                                        <br />
                                                                        <br />
                                                                        ";
                                            // line 147
                                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->transchoice("order.label.availableDays", $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "orderDeliveryDays", array()), array("%days%" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "orderDeliveryDays", array()))), "html", null, true);
                                            echo "
                                                                    ";
                                        }
                                        // line 148
                                        echo "    
                                                                    ";
                                        // line 149
                                        if ($this->getAttribute($context["address"], "isSupplyPlacticCard", array())) {
                                            // line 150
                                            echo "                                                                        <br />
                                                                        <br />
                                                                        <span>";
                                            // line 152
                                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("isSupplyPlacticCard"), "html", null, true);
                                            echo "</span>
                                                                    ";
                                        }
                                        // line 154
                                        echo "                                                                </td>
                                                                <td class=\"order_delivery_option_map\">
                                                                    <a data-latitude=\"";
                                        // line 156
                                        echo twig_escape_filter($this->env, $this->getAttribute($context["address"], "latitude", array()), "html", null, true);
                                        echo "\" data-longitude=\"";
                                        echo twig_escape_filter($this->env, $this->getAttribute($context["address"], "longitude", array()), "html", null, true);
                                        echo "\" href=\"javascript:void(0);\" class=\"order_delivery_option_map_tgl text_tgl\">
                                                                        <span class=\"num\">";
                                        // line 157
                                        echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                                        echo "</span>";
                                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.onMap"), "html", null, true);
                                        echo "
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        ";
                                    }
                                    // line 162
                                    echo "                                                    ";
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
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['address'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 163
                                echo "                                                ";
                            } elseif ($this->getAttribute($context["deliveryMethod"], "city", array(), "any", true, true)) {
                                // line 164
                                echo "                                                    ";
                                ob_start();
                                // line 165
                                echo "                                                        <tr
                                                                data-company=\"delivery_";
                                // line 166
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["deliveryMethod"], "company", array()), "name", array()), "html", null, true);
                                echo "\"
                                                                data-group=\"delivery_group_";
                                // line 167
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["deliveryMethod"], "serviceType", array()), "name", array()), "html", null, true);
                                echo "\"
                                                                class=\"order_delivery_option
                                                            ";
                                // line 169
                                if (((isset($context["firstInCity"]) ? $context["firstInCity"] : null) && ((isset($context["curIndex"]) ? $context["curIndex"] : null) == $this->getAttribute($context["loop"], "index", array())))) {
                                    echo "first ";
                                }
                                // line 170
                                echo "                                                            ";
                                if (((isset($context["selectedValue"]) ? $context["selectedValue"] : null) && ((isset($context["selectedValue"]) ? $context["selectedValue"] : null) == $this->getAttribute($context["deliveryMethod"], "id", array())))) {
                                    echo "selected ";
                                }
                                // line 171
                                echo "                                                            ";
                                if ($this->getAttribute($context["loop"], "last", array())) {
                                    echo "last ";
                                }
                                // line 172
                                echo "                                                            delivery_group_";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["deliveryMethod"], "serviceType", array()), "name", array()), "html", null, true);
                                echo "
                                                            delivery_";
                                // line 173
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["deliveryMethod"], "company", array()), "name", array()), "html", null, true);
                                echo "
                                                            ";
                                // line 174
                                if ((twig_length_filter($this->env, (isset($context["activeServices"]) ? $context["activeServices"] : null)) && $this->getAttribute((isset($context["activeServices"]) ? $context["activeServices"] : null), $this->getAttribute($context["deliveryMethod"], "id", array()), array(), "array", true, true))) {
                                    echo " active";
                                }
                                echo "\">
                                                            <td class=\"order_delivery_option_select\">
                                                                <input class=\"delivery_method\" type=\"radio\" value=\"";
                                // line 176
                                echo twig_escape_filter($this->env, $this->getAttribute($context["deliveryMethod"], "id", array()), "html", null, true);
                                echo "\" name=\"delivery_method[]\" required=\"required\" ";
                                if (((isset($context["selectedValue"]) ? $context["selectedValue"] : null) && ($this->getAttribute($context["deliveryMethod"], "id", array()) == (isset($context["selectedValue"]) ? $context["selectedValue"] : null)))) {
                                    echo " checked=\"checked\"";
                                }
                                echo "/>
                                                            </td>
                                                            <td class=\"order_delivery_option_name free_delivery\" colspan=\"3\">
                                                                    <strong>";
                                // line 179
                                echo twig_escape_filter($this->env, $this->getAttribute($context["deliveryMethod"], "captionRu", array()), "html", null, true);
                                echo "</strong><br />
                                                                    ";
                                // line 180
                                if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "orderDeliveryDays", array())) {
                                    // line 181
                                    echo "                                                                        ";
                                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->transchoice("order.label.availableDays", $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "orderDeliveryDays", array()), array("%days%" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "orderDeliveryDays", array()))), "html", null, true);
                                    echo "
                                                                        <br />
                                                                        <br />
                                                                    ";
                                }
                                // line 185
                                echo "                                                                    ";
                                echo nl2br(twig_escape_filter($this->env, $this->getAttribute($context["deliveryMethod"], "description", array()), "html", null, true));
                                echo "
                                                                    
                                                            </td>
                                                        </tr>
                                                    ";
                                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                                // line 190
                                echo "                                                ";
                            } else {
                                // line 191
                                echo "                                                    ";
                                ob_start();
                                // line 192
                                echo "                                                    <tr
                                                        data-company=\"delivery_";
                                // line 193
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["deliveryMethod"], "company", array()), "name", array()), "html", null, true);
                                echo "\"
                                                        data-group=\"delivery_group_";
                                // line 194
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["deliveryMethod"], "serviceType", array()), "name", array()), "html", null, true);
                                echo "\"
                                                        class=\"order_delivery_option calculate
                                                            ";
                                // line 196
                                if ($this->getAttribute($context["loop"], "first", array())) {
                                    echo "first ";
                                }
                                // line 197
                                echo "                                                            ";
                                if (((isset($context["selectedValue"]) ? $context["selectedValue"] : null) && ((isset($context["selectedValue"]) ? $context["selectedValue"] : null) == $this->getAttribute($context["deliveryMethod"], "id", array())))) {
                                    echo "selected ";
                                }
                                // line 198
                                echo "                                                            ";
                                if ($this->getAttribute($context["loop"], "last", array())) {
                                    echo "last ";
                                }
                                // line 199
                                echo "                                                            delivery_group_";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["deliveryMethod"], "serviceType", array()), "name", array()), "html", null, true);
                                echo "
                                                            delivery_";
                                // line 200
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["deliveryMethod"], "company", array()), "name", array()), "html", null, true);
                                echo "
                                                            ";
                                // line 201
                                if ((twig_length_filter($this->env, (isset($context["activeServices"]) ? $context["activeServices"] : null)) && $this->getAttribute((isset($context["activeServices"]) ? $context["activeServices"] : null), $this->getAttribute($context["deliveryMethod"], "id", array()), array(), "array", true, true))) {
                                    echo " active";
                                }
                                echo "\">
                                                        <td class=\"order_delivery_option_select\">
                                                            <input class=\"delivery_method\" type=\"radio\" value=\"";
                                // line 203
                                echo twig_escape_filter($this->env, $this->getAttribute($context["deliveryMethod"], "id", array()), "html", null, true);
                                echo "\" name=\"delivery_method[]\" required=\"required\" ";
                                if (((isset($context["selectedValue"]) ? $context["selectedValue"] : null) && ($this->getAttribute($context["deliveryMethod"], "id", array()) == (isset($context["selectedValue"]) ? $context["selectedValue"] : null)))) {
                                    echo " checked=\"checked\"";
                                }
                                echo "/>
                                                        </td>
                                                        <td class=\"order_delivery_option_name\">
                                                            ";
                                // line 206
                                echo twig_escape_filter($this->env, $this->getAttribute($context["deliveryMethod"], "captionRu", array()), "html", null, true);
                                // line 208
                                echo "                                                        </td>
                                                        <td class=\"order_delivery_option_terms\">
                                                            ";
                                // line 210
                                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.inProcess"), "html", null, true);
                                echo "
                                                        </td>
                                                        <td class=\"order_delivery_option_price\">
                                                            <span class=\"text_tgl in-proccess\">";
                                // line 213
                                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.process"), "html", null, true);
                                echo "</span>
                                                        </td>
                                                    </tr>
                                                    ";
                                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                                // line 217
                                echo "                                                ";
                            }
                            // line 218
                            echo "                                            ";
                        }
                        // line 219
                        echo "                                        ";
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
                    unset($context['_seq'], $context['_iterated'], $context['key'], $context['deliveryMethod'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 220
                    echo "                                    ";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['company'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 221
                echo "                                ";
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
            unset($context['_seq'], $context['_iterated'], $context['serviceTypeId'], $context['val'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 222
            echo "                            </table>
                        </div>
                    </div>
                    ";
            // line 225
            if (($this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors') || (!$this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "valid", array())))) {
                // line 226
                echo "                        <div class=\"attention_box\">
                            ";
                // line 227
                if (twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "errors", array()))) {
                    // line 228
                    echo "                                ";
                    echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
                    echo "
                                ";
                } else {
                    // line 230
                    echo "                                    ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.form.errors"), "html", null, true);
                    echo "
                            ";
                }
                // line 232
                echo "                        </div>
                    ";
            }
            // line 234
            echo "                    <div class=\"order_delivery_recipient brown_gradient_box\">
                        <div class=\"recipient_info\">
                            <span class=\"contact_info ";
            // line 236
            if ((!(isset($context["contact"]) ? $context["contact"] : null))) {
                echo "hidden ";
            }
            echo "order_delivery_recipient_edit_tgl text_tgl\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.change"), "html", null, true);
            echo "</span>
                            <h3>";
            // line 237
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.form.buyerRecipient.recipient"), "html", null, true);
            echo "</h3>
                            <p id=\"contact_info\" class=\"";
            // line 238
            if ((!(isset($context["contact"]) ? $context["contact"] : null))) {
                echo "hidden";
            }
            echo " contact_info\">
                                    ";
            // line 239
            if ((isset($context["contact"]) ? $context["contact"] : null)) {
                // line 240
                echo "                                        ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contact"]) ? $context["contact"] : null), "name", array()), "html", null, true);
                echo "<br />тел. ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contact"]) ? $context["contact"] : null), "phone", array()), "html", null, true);
                echo "<br />г. ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["contact"]) ? $context["contact"] : null), "city", array()), "name", array()), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contact"]) ? $context["contact"] : null), "address", array()), "html", null, true);
                echo "
                                    ";
            }
            // line 242
            echo "                            </p>
                        </div>
                        <div id=\"inner_recipient\" class=\"inner";
            // line 244
            if ((isset($context["contact"]) ? $context["contact"] : null)) {
                echo " hidden";
            }
            echo "\">
                            ";
            // line 245
            if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
                // line 246
                echo "                                <fieldset class=\"form_fieldset order_recipient_saved_addresses\">
                                    ";
                // line 247
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "contactList", array()), 'row');
                echo "
                                </fieldset>
                            ";
            }
            // line 250
            echo "                            ";
            if (($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "contact", array(), "any", false, true), "firstName", array(), "any", true, true) && $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "contact", array(), "any", false, true), "lastName", array(), "any", true, true))) {
                // line 251
                echo "                            <fieldset class=\"form_fieldset\">
                                ";
                // line 252
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "contact", array()), "firstName", array()), 'row');
                echo "
                                ";
                // line 253
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "contact", array()), "lastName", array()), 'row');
                echo "
                            </fieldset>
                            ";
            }
            // line 256
            echo "                            ";
            if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "contact", array(), "any", false, true), "passport", array(), "any", true, true)) {
                // line 257
                echo "                            <fieldset class=\"form_fieldset passport_field";
                if ((!$this->getAttribute((isset($context["contact"]) ? $context["contact"] : null), "passport", array()))) {
                    echo " hidden";
                }
                echo "\">
                                ";
                // line 258
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "contact", array()), "passport", array()), 'row');
                echo "
                            </fieldset>
                            ";
            }
            // line 261
            echo "                            ";
            if (($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "contact", array(), "any", false, true), "contactEmail", array(), "any", true, true) && $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "contact", array()), "phone", array()))) {
                // line 262
                echo "                            <fieldset class=\"form_fieldset\">
                                ";
                // line 263
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "contact", array()), "phone", array()), 'row');
                echo "
                                ";
                // line 264
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "contact", array()), "contactEmail", array()), 'row');
                echo "
                            </fieldset>
                            ";
            }
            // line 267
            echo "                            <fieldset class=\"form_fieldset\">
                                ";
            // line 268
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "contact", array()), "city", array()), 'row');
            echo "
                                ";
            // line 269
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "contact", array()), "address", array()), 'row');
            echo "
                                ";
            // line 280
            echo "                            </fieldset>
                            <fieldset class=\"form_fieldset\">
                                ";
            // line 282
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "contact", array()), "mark", array()), 'row');
            echo "
                            </fieldset>
                            <div class=\"form_padding_group\">
                                <button class=\"common_button submit_form\">
                                    <span>";
            // line 286
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.update"), "html", null, true);
            echo "</span>
                                </button>&nbsp;<span class=\"";
            // line 287
            if ((!(isset($context["contact"]) ? $context["contact"] : null))) {
                echo "hidden  ";
            }
            echo "text_tgl recipient_close\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.cancel"), "html", null, true);
            echo "</span>
                            </div>
                        </div>
                    </div>
                    <div class=\"order_proceed\">
                        ";
            // line 292
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
            echo "
                        <a href=\"";
            // line 293
            echo $this->env->getExtension('routing')->getPath("core_order_cart_step2");
            echo "\" class=\"order_proceed_goprev\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.form.buyerRecipient.buyer"), "html", null, true);
            echo "</a>
                        <span class=\"order_proceed_next\">";
            // line 294
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next Step: «Payment»"), "html", null, true);
            echo "</span>
                        <button  ";
            // line 295
            if ((!(isset($context["contact"]) ? $context["contact"] : null))) {
                echo " disabled=\"disabled\"";
            }
            echo " type=\"submit\" class=\"";
            if ((!(isset($context["contact"]) ? $context["contact"] : null))) {
                echo "disabled ";
            }
            echo "common_button big with_arrow delivery_btn\"><span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.forward"), "html", null, true);
            echo "</span></button>
                    </div>
                </form>
            ";
        }
        // line 299
        echo "        </div>
    </div>
        <!-- side content col -->
        ";
        // line 302
        $this->displayBlock("order_summary_block", $context, $blocks);
        echo "
        <!-- /side content col -->
</div>
<div class=\"modal_window delivery_map_popup\">
    <div class=\"delivery_map_block\">
        <div id=\"map\" style=\"width: 100%; height: 400px\"></div>
    </div>
    <span title=\"Закрыть\" class=\"modal_window_close\">Закрыть</span>
</div>
";
    }

    // line 312
    public function block_footer($context, array $blocks = array())
    {
        // line 313
        echo "    ";
        $context["mixMarketList"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "mix-market"), "method");
        // line 314
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "environment", array()) == "prod")) {
            // line 315
            $context["mixMarketList"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "mix-market"), "method");
            // line 316
            echo "        ";
            echo $this->getAttribute((isset($context["mixMarketList"]) ? $context["mixMarketList"] : null), "cart", array(), "array");
        }
        // line 318
        $this->displayParentBlock("footer", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Order:step3.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1141 => 318,  1137 => 316,  1135 => 315,  1133 => 314,  1130 => 313,  1127 => 312,  1113 => 302,  1108 => 299,  1093 => 295,  1089 => 294,  1083 => 293,  1079 => 292,  1067 => 287,  1063 => 286,  1056 => 282,  1052 => 280,  1048 => 269,  1044 => 268,  1041 => 267,  1035 => 264,  1031 => 263,  1028 => 262,  1025 => 261,  1019 => 258,  1012 => 257,  1009 => 256,  1003 => 253,  999 => 252,  996 => 251,  993 => 250,  987 => 247,  984 => 246,  982 => 245,  976 => 244,  972 => 242,  960 => 240,  958 => 239,  952 => 238,  948 => 237,  940 => 236,  936 => 234,  932 => 232,  926 => 230,  920 => 228,  918 => 227,  915 => 226,  913 => 225,  908 => 222,  894 => 221,  880 => 220,  866 => 219,  863 => 218,  860 => 217,  853 => 213,  847 => 210,  843 => 208,  841 => 206,  831 => 203,  824 => 201,  820 => 200,  815 => 199,  810 => 198,  805 => 197,  801 => 196,  796 => 194,  792 => 193,  789 => 192,  786 => 191,  783 => 190,  774 => 185,  766 => 181,  764 => 180,  760 => 179,  750 => 176,  743 => 174,  739 => 173,  734 => 172,  729 => 171,  724 => 170,  720 => 169,  715 => 167,  711 => 166,  708 => 165,  705 => 164,  702 => 163,  688 => 162,  678 => 157,  672 => 156,  668 => 154,  663 => 152,  659 => 150,  657 => 149,  654 => 148,  649 => 147,  645 => 145,  642 => 144,  637 => 142,  634 => 141,  632 => 140,  628 => 139,  616 => 136,  589 => 134,  586 => 133,  568 => 132,  565 => 131,  562 => 130,  559 => 129,  556 => 128,  553 => 127,  550 => 126,  532 => 125,  529 => 124,  526 => 123,  524 => 122,  506 => 121,  489 => 120,  482 => 117,  478 => 116,  470 => 115,  467 => 114,  464 => 113,  461 => 112,  455 => 110,  448 => 109,  443 => 106,  429 => 105,  425 => 103,  406 => 100,  395 => 99,  378 => 98,  367 => 97,  364 => 96,  361 => 95,  344 => 94,  334 => 93,  331 => 92,  314 => 89,  304 => 87,  300 => 86,  296 => 85,  293 => 84,  275 => 83,  272 => 82,  266 => 81,  263 => 80,  260 => 79,  257 => 78,  254 => 77,  251 => 76,  248 => 75,  245 => 74,  240 => 73,  237 => 72,  234 => 71,  231 => 70,  228 => 69,  225 => 68,  222 => 67,  219 => 66,  217 => 65,  214 => 64,  212 => 63,  209 => 62,  206 => 61,  203 => 60,  200 => 59,  197 => 58,  194 => 57,  191 => 56,  187 => 54,  179 => 52,  177 => 51,  174 => 50,  168 => 48,  166 => 47,  158 => 43,  155 => 42,  148 => 38,  144 => 37,  140 => 36,  136 => 35,  132 => 34,  128 => 33,  124 => 32,  120 => 31,  116 => 30,  112 => 28,  92 => 26,  88 => 20,  83 => 19,  80 => 18,  74 => 17,  68 => 15,  62 => 14,  56 => 13,  21 => 11,  14 => 10,);
    }
}
