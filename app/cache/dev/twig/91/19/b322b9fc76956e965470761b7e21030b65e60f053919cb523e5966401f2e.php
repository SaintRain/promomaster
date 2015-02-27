<?php

/* CoreCommonBundle::base_layout2.html.twig */
class __TwigTemplate_9119b322b9fc76956e965470761b7e21030b65e60f053919cb523e5966401f2e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_description' => array($this, 'block_meta_description'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'css' => array($this, 'block_css'),
            'js_head' => array($this, 'block_js_head'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        ob_start();
        // line 2
        echo "    <!DOCTYPE html>
    <!--[if IE 8]>
    <html lang=\"ru\" class=\"ie8\"> <![endif]-->
    <!--[if IE 9]>
    <html lang=\"ru\" class=\"ie9\"> <![endif]-->
    <!--[if !IE]><!-->
    <html lang=\"ru\"> <!--<![endif]-->
    <head>
        <title>";
        // line 10
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

        <!-- Meta -->
        <meta charset=\"utf-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <meta name=\"description\" content=\"";
        // line 15
        $this->displayBlock('meta_description', $context, $blocks);
        echo "\">
        <meta name=\"keywords\" content=\"";
        // line 16
        $this->displayBlock('meta_keywords', $context, $blocks);
        echo "\">
        <meta name=\"author\" content=\"\">

        <!-- Favicon -->
        <link rel=\"shortcut icon\" href=\"/favicon.ico\">

        ";
        // line 22
        $this->displayBlock('css', $context, $blocks);
        // line 39
        echo "
        ";
        // line 40
        $this->displayBlock('js_head', $context, $blocks);
        // line 81
        echo "
        ";
        // line 83
        echo "        ";
        echo $this->env->getExtension('fastedit_extension')->fastEditInitFunction();
        echo "
    </head>

    <body>
    ";
        // line 87
        $this->displayBlock('body', $context, $blocks);
        // line 88
        echo "    </body>

    </html>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 10
    public function block_title($context, array $blocks = array())
    {
    }

    // line 15
    public function block_meta_description($context, array $blocks = array())
    {
    }

    // line 16
    public function block_meta_keywords($context, array $blocks = array())
    {
    }

    // line 22
    public function block_css($context, array $blocks = array())
    {
        // line 23
        echo "            ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "ec44b6a_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ec44b6a_0") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/main_bootstrap.min_1.css");
            // line 36
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"/>
            ";
            // asset "ec44b6a_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ec44b6a_1") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/main_style_2.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"/>
            ";
            // asset "ec44b6a_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ec44b6a_2") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/main_line-icons_3.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"/>
            ";
            // asset "ec44b6a_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ec44b6a_3") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/main_font-awesome.min_4.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"/>
            ";
            // asset "ec44b6a_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ec44b6a_4") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/main_flexslider_5.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"/>
            ";
            // asset "ec44b6a_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ec44b6a_5") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/main_parallax-slider_6.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"/>
            ";
            // asset "ec44b6a_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ec44b6a_6") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/main_page_log_reg_v1_7.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"/>
            ";
            // asset "ec44b6a_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ec44b6a_7") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/main_default_8.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"/>
            ";
            // asset "ec44b6a_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ec44b6a_8") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/main_custom_9.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"/>
            ";
        } else {
            // asset "ec44b6a"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ec44b6a") : $this->env->getExtension('assets')->getAssetUrl("css/compiled/main.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"/>
            ";
        }
        unset($context["asset_url"]);
        // line 38
        echo "        ";
    }

    // line 40
    public function block_js_head($context, array $blocks = array())
    {
        // line 41
        echo "
            <script type=\"text/javascript\">
                var
                        settingsJS = {
                            routes: [] // роуты

                        };
                settingsJS.routes['social_auth'] = \"";
        // line 48
        echo $this->env->getExtension('routing')->getPath("application_sonata_user_auth_social");
        echo "\";
            </script>

            ";
        // line 51
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "509b667_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_509b667_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_jquery.min_1.js");
            // line 64
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
            ";
            // asset "509b667_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_509b667_1") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_jquery-migrate.min_2.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
            ";
            // asset "509b667_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_509b667_2") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_bootstrap.min_3.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
            ";
            // asset "509b667_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_509b667_3") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_back-to-top_4.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
            ";
            // asset "509b667_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_509b667_4") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_jquery.flexslider-min_5.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
            ";
            // asset "509b667_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_509b667_5") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_modernizr_6.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
            ";
            // asset "509b667_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_509b667_6") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_jquery.cslider_7.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
            ";
            // asset "509b667_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_509b667_7") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_custom_8.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
            ";
            // asset "509b667_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_509b667_8") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_app_9.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
            ";
            // asset "509b667_9"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_509b667_9") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_parallax-slider_10.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
            ";
        } else {
            // asset "509b667"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_509b667") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
            ";
        }
        unset($context["asset_url"]);
        // line 66
        echo "

            <script type=\"text/javascript\">
                jQuery(document).ready(function () {
                    App.init();
                });
            </script>

            <!--[if lt IE 9]>
            <script src=\"/assets/plugins/respond.js\"></script>
            <script src=\"/assets/plugins/html5shiv.js\"></script>
            <script src=\"/assets/js/plugins/placeholder-IE-fixes.js\"></script>
            <![endif]-->

        ";
    }

    // line 87
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle::base_layout2.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  283 => 87,  265 => 66,  197 => 64,  193 => 51,  187 => 48,  178 => 41,  175 => 40,  171 => 38,  109 => 36,  104 => 23,  101 => 22,  96 => 16,  91 => 15,  86 => 10,  78 => 88,  76 => 87,  68 => 83,  65 => 81,  63 => 40,  60 => 39,  58 => 22,  49 => 16,  45 => 15,  37 => 10,  27 => 2,  25 => 1,);
    }
}
