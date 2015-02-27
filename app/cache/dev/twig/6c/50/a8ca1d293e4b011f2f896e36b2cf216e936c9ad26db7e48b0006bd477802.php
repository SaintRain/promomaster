<?php

/* CoreCommonBundle::main_layout.html.twig */
class __TwigTemplate_6c50a8ca1d293e4b011f2f896e36b2cf216e936c9ad26db7e48b0006bd477802 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("CoreCommonBundle::base_layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'css' => array($this, 'block_css'),
            'js_head' => array($this, 'block_js_head'),
            'header' => array($this, 'block_header'),
            'menu' => array($this, 'block_menu'),
            'footer' => array($this, 'block_footer'),
            'js_footer' => array($this, 'block_js_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CoreCommonBundle::base_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_css($context, array $blocks = array())
    {
        // line 4
        echo "    <!--[i f lt IE 8]>
     <link href=\"/css/main_ie7.css\" rel=\"stylesheet\">
    <![endi f]-->
    <!--[if lt IE 9]>
    <script src=\"http://html5shiv.googlecode.com/svn/trunk/html5.js\"></script>
    <![endif]-->

    ";
        // line 11
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "9769a71_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9769a71_0") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/main_select2_1.css");
            // line 20
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
            // asset "9769a71_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9769a71_1") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/main_jquery-ui_2.css");
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
            // asset "9769a71_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9769a71_2") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/main_main_3.css");
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
            // asset "9769a71_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9769a71_3") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/main_style_4.css");
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
            // asset "9769a71_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9769a71_4") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/main_style_default_5.css");
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
            // asset "9769a71_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9769a71_5") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/main_slick_6.css");
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
        } else {
            // asset "9769a71"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9769a71") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/main.css");
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
        }
        unset($context["asset_url"]);
    }

    // line 24
    public function block_js_head($context, array $blocks = array())
    {
        // line 25
        echo "    <script type=\"text/javascript\">
        var _home = '/',
                google_tag_params = {
                     ecomm_pagetype: 'other'
                },
                settingsJS = {
                    extra: [],
                    routes: [], // роуты
                    trans: [], // переводы
                    countCollection: [] // кол-во элементов коллекции в формах
                };
        settingsJS.extra['prodId'] = null;
        settingsJS.extra['pageType'] = 'other';
        settingsJS.extra['cartCost'] = null;
        settingsJS.routes['social_auth'] = \"";
        // line 39
        echo $this->env->getExtension('routing')->getPath("application_sonata_user_auth_social");
        echo "\";
        settingsJS.routes['core_product_subscribe_to_report'] = \"";
        // line 40
        echo $this->env->getExtension('routing')->getPath("core_product_subscribe_to_report");
        echo "\";
        settingsJS.routes['core_product_get_date_and_count_for_nearest_supply'] = \"";
        // line 41
        echo $this->env->getExtension('routing')->getPath("core_product_get_date_and_count_for_nearest_supply");
        echo "\";
        settingsJS.routes['core_product_buy_by_order'] = \"";
        // line 42
        echo $this->env->getExtension('routing')->getPath("core_product_buy_by_order");
        echo "\";
        settingsJS.trans['msg_work_time'] = '";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("msg.work_time"), "html", null, true);
        echo "';
        settingsJS.trans['msg_not_work_time'] = '";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("msg.not_work_time"), "html", null, true);
        echo "';
        settingsJS.trans['msg_time_till_close_start'] = '";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("msg.time_till_close_start"), "html", null, true);
        echo "';
        settingsJS.trans['msg_time_till_close_end'] = '";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("msg.time_till_close_end"), "html", null, true);
        echo "';
    </script>

    ";
        // line 49
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "0c878b4_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0c878b4_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_jquery.min_1.js");
            // line 69
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0c878b4_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0c878b4_1") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_jquery-ui.min_2.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0c878b4_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0c878b4_2") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_select2.min_3.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0c878b4_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0c878b4_3") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_select2_locale_ru_4.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0c878b4_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0c878b4_4") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_modernizr.custom_5.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0c878b4_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0c878b4_5") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_flexmenu.min_6.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0c878b4_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0c878b4_6") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_script_7.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0c878b4_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0c878b4_7") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_jquery.inputmask_8.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0c878b4_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0c878b4_8") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_jquery.inputmask.numeric.extensions_9.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0c878b4_9"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0c878b4_9") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_bootstrap.min_10.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0c878b4_10"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0c878b4_10") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_slick.min_11.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0c878b4_11"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0c878b4_11") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_frontend.filter_12.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0c878b4_12"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0c878b4_12") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_main.frontend_13.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0c878b4_13"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0c878b4_13") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_frontend.catalog_14.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0c878b4_14"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0c878b4_14") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_work_time_15.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "0c878b4_15"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0c878b4_15") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_ulogin_16.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "0c878b4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0c878b4") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    // line 73
    public function block_header($context, array $blocks = array())
    {
        // line 74
        echo "    <div class=\"wrapper\">
        ";
        // line 75
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("CoreCommonBundle:Fragments:header", array("request" => $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()))));
        echo "
    ";
    }

    // line 78
    public function block_menu($context, array $blocks = array())
    {
        // line 79
        echo "        ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("CoreCommonBundle:Fragments:menu", array("request" => $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()))));
        echo "\t
    ";
    }

    // line 82
    public function block_footer($context, array $blocks = array())
    {
        // line 83
        echo "        ";
        if ( !$this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) {
            // line 84
            echo "            ";
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("CoreCommonBundle:Fragments:modalWindow", array("request" => $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()))));
            echo "
        ";
        }
        // line 86
        echo "        ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("CoreCommonBundle:Fragments:footer", array("request" => $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()))));
        echo "
        ";
        // line 88
        echo "    ";
        $this->displayBlock('js_footer', $context, $blocks);
        // line 89
        echo "</div>
";
    }

    // line 88
    public function block_js_footer($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle::main_layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  313 => 88,  308 => 89,  305 => 88,  300 => 86,  294 => 84,  291 => 83,  288 => 82,  281 => 79,  278 => 78,  272 => 75,  269 => 74,  266 => 73,  160 => 69,  156 => 49,  150 => 46,  146 => 45,  142 => 44,  138 => 43,  134 => 42,  130 => 41,  126 => 40,  122 => 39,  106 => 25,  103 => 24,  57 => 20,  53 => 11,  44 => 4,  41 => 3,  11 => 1,);
    }
}
