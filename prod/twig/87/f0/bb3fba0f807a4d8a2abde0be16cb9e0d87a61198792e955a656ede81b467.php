<?php

/* CoreOrderBundle:Order:step2.html.twig */
class __TwigTemplate_87f0bb3fba0f807a4d8a2abde0be16cb9e0d87a61198792e955a656ede81b467 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 8
        try {
            $this->parent = $this->env->loadTemplate("CoreCommonBundle::main_layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(8);

            throw $e;
        }

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
                'js_head' => array($this, 'block_js_head'),
                'menu' => array($this, 'block_menu'),
                'title' => array($this, 'block_title'),
                'meta_keywords' => array($this, 'block_meta_keywords'),
                'meta_description' => array($this, 'block_meta_description'),
                'content' => array($this, 'block_content'),
                'footer' => array($this, 'block_footer'),
            )
        );
    }

    protected function doGetParent(array $context)
    {
        // line 8
        return "CoreCommonBundle::main_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 13
    public function block_js_head($context, array $blocks = array())
    {
        // line 14
        echo "    ";
        $this->displayParentBlock("js_head", $context, $blocks);
        echo "
    ";
        // line 15
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "d3b49e3_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d3b49e3_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/order_frontend.order_1.js");
            // line 21
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
    }

    // line 24
    public function block_menu($context, array $blocks = array())
    {
        echo " ";
    }

    // line 26
    public function block_title($context, array $blocks = array())
    {
        echo "Оформление заказа - данные о покупателе | OliKids.ru";
    }

    // line 27
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "заказ, оформление, данные, информация";
    }

    // line 28
    public function block_meta_description($context, array $blocks = array())
    {
        echo "Страница оформления заказа на сайте OliKids - информация о покупателе. Внимательно проверьте итоговый список заказанных товаров. Заполните необходимые данные о себе для продолжения заказа.";
    }

    // line 30
    public function block_content($context, array $blocks = array())
    {
        // line 31
        echo "
    ";
        // line 32
        $this->displayBlock("order_breadcrumbs_block", $context, $blocks);
        echo "

    <div id=\"content\" class=\"order_page\" role=\"main\">
        <div class=\"main_col\">
            <div class=\"main_col_pad\">
                ";
        // line 37
        if ((isset($context["isCartEmpty"]) ? $context["isCartEmpty"] : null)) {
            // line 38
            echo "                    <div class=\"info_box\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.cartIsEmpty"), "html", null, true);
            echo "</div>
                    ";
        } else {
            // line 40
            echo "                        ";
            if ( !$this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
                // line 41
                echo "                        <div class=\"login_offer_box brown_gradient_box\">
                                <p>
                                Уже зарегистрированы? Войдите, чтобы ускорить оформление заказа:
                                <span class=\"login_offer_box_controls\"><a href=\"";
                // line 44
                echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
                echo "\" class=\"login popup common_button\">Войти</a>&nbsp;&nbsp;<span class=\"text_tgl modal_window_off\">Скрыть</span></span>
                                </p>
                            <section class=\"login_social\">
                                <h3>Вход через:</h3>
                                ";
                // line 48
                ob_start();
                // line 49
                echo "                                    <div id=\"uLogin\" data-ulogin=\"display=buttons;
                                         fields=first_name,last_name,photo,photo_big,email,nickname,bdate,sex,city,country,profile;
                                         redirect_uri=;
                                         receiver=http://";
                // line 52
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "host", array()), "html", null, true);
                echo $this->env->getExtension('routing')->getPath("auth_receiver");
                echo ";
                                         callback=ucall\">
                                        <span data-uloginbutton=\"facebook\" class=\"social_btn social_facebook\">&nbsp;</span>
                                        <span data-uloginbutton=\"vkontakte\" class=\"social_btn social_vkontakte\">&nbsp;</span>
                                        <span data-uloginbutton=\"twitter\" class=\"social_btn social_twitter\">&nbsp;</span>
                                        <span data-uloginbutton=\"yandex\" class=\"social_btn social_yandex\">&nbsp;</span>
                                        <span data-uloginbutton=\"google\" class=\"social_btn social_google\">&nbsp;</span>
                                        <span data-uloginbutton=\"odnoklassniki\" class=\"social_btn social_odnoklassniki\">&nbsp;</span>
                                    </div>
                                ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 62
                echo "                            </section>
                        </div>
                        ";
            }
            // line 65
            echo "                        <div class=\"form_group_header\">
                            <h2>";
            // line 66
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("order.label.buyer"), "html", null, true);
            echo "</h2>
                        </div>
                        ";
            // line 68
            if (((isset($context["indiForm"]) ? $context["indiForm"] : null) && (isset($context["legalForm"]) ? $context["legalForm"] : null))) {
                // line 69
                echo "                        <ul id=\"contragent_type\" class=\"filter_sort_switches\">
                            <li>
                                <label>
                                    <span>";
                // line 72
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.label.indi.caption"), "html", null, true);
                echo "</span>
                                    <input type=\"radio\" value=\"indi_form\" name=\"form_selector\" ";
                // line 73
                if ((( !$this->getAttribute($this->getAttribute((isset($context["indiForm"]) ? $context["indiForm"] : null), "vars", array()), "valid", array()) && $this->getAttribute($this->getAttribute((isset($context["legalForm"]) ? $context["legalForm"] : null), "vars", array()), "valid", array())) || ($this->getAttribute($this->getAttribute((isset($context["indiForm"]) ? $context["indiForm"] : null), "vars", array()), "valid", array()) && $this->getAttribute($this->getAttribute((isset($context["legalForm"]) ? $context["legalForm"] : null), "vars", array()), "valid", array())))) {
                    echo "  checked=\"checked\" ";
                }
                echo "/>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <span>";
                // line 78
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("form.label.legal.caption"), "html", null, true);
                echo "</span>
                                    <input type=\"radio\" value=\"legal_form\" name=\"form_selector\" ";
                // line 79
                if (( !$this->getAttribute($this->getAttribute((isset($context["legalForm"]) ? $context["legalForm"] : null), "vars", array()), "valid", array()) && $this->getAttribute($this->getAttribute((isset($context["indiForm"]) ? $context["indiForm"] : null), "vars", array()), "valid", array()))) {
                    echo " checked=\"checked\" ";
                }
                echo "/>
                                </label>
                            </li>
                        </ul>
                        ";
            }
            // line 84
            echo "                        ";
            if ((isset($context["indiForm"]) ? $context["indiForm"] : null)) {
                // line 85
                echo "                            ";
                $this->env->loadTemplate("CoreOrderBundle:Order/Form:indi_info_form.html.twig")->display(array_merge($context, array("form" => (isset($context["indiForm"]) ? $context["indiForm"] : null))));
                // line 86
                echo "                        ";
            }
            // line 87
            echo "                        ";
            if ((isset($context["legalForm"]) ? $context["legalForm"] : null)) {
                // line 88
                echo "                            ";
                $this->env->loadTemplate("CoreOrderBundle:Order/Form:legal_info_form.html.twig")->display(array_merge($context, array("form" => (isset($context["legalForm"]) ? $context["legalForm"] : null))));
                // line 89
                echo "                        ";
            }
            // line 90
            echo "                ";
        }
        // line 91
        echo "            </div>
        </div>
        <!-- side content col -->
            ";
        // line 94
        $this->displayBlock("order_summary_block", $context, $blocks);
        echo "
        <!-- /side content col -->
    </div>
";
    }

    // line 98
    public function block_footer($context, array $blocks = array())
    {
        // line 99
        echo "    ";
        $context["mixMarketList"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "mix-market"), "method");
        // line 100
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "environment", array()) == "prod")) {
            // line 101
            $context["mixMarketList"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : null), "get", array(0 => "core_config_logic"), "method"), "get", array(0 => "mix-market"), "method");
            // line 102
            echo "        ";
            echo $this->getAttribute((isset($context["mixMarketList"]) ? $context["mixMarketList"] : null), "cart", array(), "array");
        }
        // line 104
        $this->displayParentBlock("footer", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Order:step2.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  277 => 104,  273 => 102,  271 => 101,  269 => 100,  266 => 99,  263 => 98,  255 => 94,  250 => 91,  247 => 90,  244 => 89,  241 => 88,  238 => 87,  235 => 86,  232 => 85,  229 => 84,  219 => 79,  215 => 78,  205 => 73,  201 => 72,  196 => 69,  194 => 68,  189 => 66,  186 => 65,  181 => 62,  167 => 52,  162 => 49,  160 => 48,  153 => 44,  148 => 41,  145 => 40,  139 => 38,  137 => 37,  129 => 32,  126 => 31,  123 => 30,  117 => 28,  111 => 27,  105 => 26,  99 => 24,  77 => 21,  73 => 15,  68 => 14,  65 => 13,  56 => 8,  29 => 11,  22 => 10,  11 => 8,);
    }
}
