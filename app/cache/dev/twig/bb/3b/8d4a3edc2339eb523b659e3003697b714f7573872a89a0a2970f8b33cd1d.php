<?php

/* SonataAdminBundle::standard_layout.html.twig */
class __TwigTemplate_bb3b8d4a3edc2339eb523b659e3003697b714f7573872a89a0a2970f8b33cd1d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'html_attributes' => array($this, 'block_html_attributes'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'body_attributes' => array($this, 'block_body_attributes'),
            'sonata_nav' => array($this, 'block_sonata_nav'),
            'logo' => array($this, 'block_logo'),
            'sonata_nav_menu_before' => array($this, 'block_sonata_nav_menu_before'),
            'sonata_nav_menu' => array($this, 'block_sonata_nav_menu'),
            'top_bar_before_nav' => array($this, 'block_top_bar_before_nav'),
            'sonata_top_bar_nav' => array($this, 'block_sonata_top_bar_nav'),
            'top_bar_after_nav' => array($this, 'block_top_bar_after_nav'),
            'sonata_top_bar_search' => array($this, 'block_sonata_top_bar_search'),
            'sonata_nav_menu_after' => array($this, 'block_sonata_nav_menu_after'),
            'sonata_page_content' => array($this, 'block_sonata_page_content'),
            'notice' => array($this, 'block_notice'),
            'sonata_breadcrumb' => array($this, 'block_sonata_breadcrumb'),
            'sonata_admin_content' => array($this, 'block_sonata_admin_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 11
        $context["_preview"] = $this->renderBlock("preview", $context, $blocks);
        // line 12
        $context["_form"] = $this->renderBlock("form", $context, $blocks);
        // line 13
        $context["_show"] = $this->renderBlock("show", $context, $blocks);
        // line 14
        $context["_list_table"] = $this->renderBlock("list_table", $context, $blocks);
        // line 15
        $context["_list_filters"] = $this->renderBlock("list_filters", $context, $blocks);
        // line 16
        $context["_side_menu"] = $this->renderBlock("side_menu", $context, $blocks);
        // line 17
        $context["_content"] = $this->renderBlock("content", $context, $blocks);
        // line 18
        $context["_title"] = $this->renderBlock("title", $context, $blocks);
        // line 19
        $context["_breadcrumb"] = $this->renderBlock("breadcrumb", $context, $blocks);
        // line 20
        $context["_actions"] = $this->renderBlock("actions", $context, $blocks);
        // line 21
        echo "<!DOCTYPE html>
<html ";
        // line 22
        $this->displayBlock('html_attributes', $context, $blocks);
        echo ">
    <head>
        <meta charset=\"UTF-8\">

        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

        ";
        // line 28
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 55
        echo "
        ";
        // line 56
        $this->displayBlock('javascripts', $context, $blocks);
        // line 82
        echo "
        <title>
            ";
        // line 84
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Admin", array(), "SonataAdminBundle"), "html", null, true);
        echo "

            ";
        // line 86
        if ( !twig_test_empty((isset($context["_title"]) ? $context["_title"] : $this->getContext($context, "_title")))) {
            // line 87
            echo "                ";
            echo (isset($context["_title"]) ? $context["_title"] : $this->getContext($context, "_title"));
            echo "
            ";
        } else {
            // line 89
            echo "                ";
            if (array_key_exists("action", $context)) {
                // line 90
                echo "                    -
                    ";
                // line 91
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "breadcrumbs", array(0 => (isset($context["action"]) ? $context["action"] : $this->getContext($context, "action"))), "method"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["menu"]) {
                    // line 92
                    echo "                        ";
                    if ( !$this->getAttribute($context["loop"], "first", array())) {
                        // line 93
                        echo "                            &gt;
                        ";
                    }
                    // line 95
                    echo "                        ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["menu"], "label", array()), "html", null, true);
                    echo "
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 97
                echo "                ";
            }
            // line 98
            echo "            ";
        }
        // line 99
        echo "        </title>
    </head>
    <body ";
        // line 101
        $this->displayBlock('body_attributes', $context, $blocks);
        echo ">
        ";
        // line 103
        echo "
        ";
        // line 104
        $this->displayBlock('sonata_nav', $context, $blocks);
        // line 186
        echo "
        <div class=\"container-fluid\">
            ";
        // line 188
        $this->displayBlock('sonata_page_content', $context, $blocks);
        // line 281
        echo "        </div>
    </body>
</html>
";
    }

    // line 22
    public function block_html_attributes($context, array $blocks = array())
    {
        echo "class=\"no-js\"";
    }

    // line 28
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 29
        echo "            <!-- jQuery code -->
            <link rel=\"stylesheet\" href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatajquery/themes/flick/jquery-ui-1.8.16.custom.css"), "html", null, true);
        echo "\" media=\"all\">

            <link rel=\"stylesheet\" href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\" media=\"all\">
            <link rel=\"stylesheet\" href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/bootstrap/css/bootstrap-responsive.min.css"), "html", null, true);
        echo "\" media=\"all\">

            <link rel=\"stylesheet\" href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/x-editable/css/bootstrap-editable.css"), "html", null, true);
        echo "\" media=\"all\">

            ";
        // line 37
        if ((array_key_exists("admin_pool", $context) && $this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : $this->getContext($context, "admin_pool")), "getOption", array(0 => "use_select2"), "method"))) {
            // line 38
            echo "                <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/select2/select2.css"), "html", null, true);
            echo "\" media=\"all\">
                <style>
                    div.select2-container {
                        margin-left: 0px !important;
                    }

                    div.select2-drop ul {
                        margin: 0px !important;
                    }
                </style>
            ";
        }
        // line 49
        echo "
            <!-- base application asset -->
            <link rel=\"stylesheet\" href=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/css/layout.css"), "html", null, true);
        echo "\" media=\"all\">
            <link rel=\"stylesheet\" href=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/css/colors.css"), "html", null, true);
        echo "\" media=\"all\">

        ";
    }

    // line 56
    public function block_javascripts($context, array $blocks = array())
    {
        // line 57
        echo "            <script>
                window.SONATA_CONFIG = {
                    CONFIRM_EXIT: ";
        // line 59
        if ((array_key_exists("admin_pool", $context) && $this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : $this->getContext($context, "admin_pool")), "getOption", array(0 => "confirm_exit"), "method"))) {
            echo "true";
        } else {
            echo "false";
        }
        echo ",
                    USE_SELECT2: ";
        // line 60
        if ((array_key_exists("admin_pool", $context) && $this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : $this->getContext($context, "admin_pool")), "getOption", array(0 => "use_select2"), "method"))) {
            echo "true";
        } else {
            echo "false";
        }
        // line 61
        echo "                };
                window.SONATA_TRANSLATIONS = {
                    CONFIRM_EXIT:  '";
        // line 63
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("confirm_exit", array(), "SonataAdminBundle"), "js"), "html", null, true);
        echo "'
               };
            </script>
            <script src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatajquery/jquery-1.8.3.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatajquery/jquery-ui-1.8.23.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatajquery/jquery-ui-i18n.js"), "html", null, true);
        echo "\"></script>

            <script src=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>

            <script src=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/x-editable/js/bootstrap-editable.min.js"), "html", null, true);
        echo "\"></script>

            ";
        // line 74
        if ((array_key_exists("admin_pool", $context) && $this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : $this->getContext($context, "admin_pool")), "getOption", array(0 => "use_select2"), "method"))) {
            // line 75
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/select2/select2.min.js"), "html", null, true);
            echo "\"></script>
            ";
        }
        // line 77
        echo "
            <script src=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/jquery/jquery.form.js"), "html", null, true);
        echo "\"></script>
            ";
        // line 79
        if ((array_key_exists("admin_pool", $context) && $this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : $this->getContext($context, "admin_pool")), "getOption", array(0 => "confirm_exit"), "method"))) {
            echo "<script src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/jquery/jquery.confirmExit.js"), "html", null, true);
            echo "\"></script>";
        }
        // line 80
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/base.js"), "html", null, true);
        echo "\"></script>
        ";
    }

    // line 101
    public function block_body_attributes($context, array $blocks = array())
    {
        echo "class=\"sonata-bc ";
        if (twig_test_empty((isset($context["_side_menu"]) ? $context["_side_menu"] : $this->getContext($context, "_side_menu")))) {
            echo "sonata-ba-no-side-menu";
        }
        echo "\"";
    }

    // line 104
    public function block_sonata_nav($context, array $blocks = array())
    {
        // line 105
        echo "            <div class=\"navbar navbar-fixed-top\">
                <div class=\"navbar-inner\">
                    <div class=\"container-fluid\">
                        <a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".nav-collapse\">
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                        </a>

                        ";
        // line 114
        if (array_key_exists("admin_pool", $context)) {
            // line 115
            echo "                            <div class=\"navbar-text pull-right\">";
            $this->env->resolveTemplate($this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : $this->getContext($context, "admin_pool")), "getTemplate", array(0 => "user_block"), "method"))->display($context);
            echo "</div>

                            ";
            // line 117
            $this->displayBlock('logo', $context, $blocks);
            // line 123
            echo "
                            ";
            // line 124
            $this->displayBlock('sonata_nav_menu_before', $context, $blocks);
            // line 125
            echo "
                            ";
            // line 126
            $this->displayBlock('sonata_nav_menu', $context, $blocks);
            // line 178
            echo "
                            ";
            // line 179
            $this->displayBlock('sonata_nav_menu_after', $context, $blocks);
            // line 180
            echo "
                        ";
        }
        // line 182
        echo "                    </div>
                </div>
            </div>
        ";
    }

    // line 117
    public function block_logo($context, array $blocks = array())
    {
        // line 118
        echo "                                <a href=\"";
        echo $this->env->getExtension('routing')->getUrl("sonata_admin_dashboard");
        echo "\" class=\"brand\">
                                    <img src=\"";
        // line 119
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : $this->getContext($context, "admin_pool")), "titlelogo", array())), "html", null, true);
        echo "\"  alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : $this->getContext($context, "admin_pool")), "title", array()), "html", null, true);
        echo "\">
                                    ";
        // line 120
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : $this->getContext($context, "admin_pool")), "title", array()), "html", null, true);
        echo "
                                </a>
                            ";
    }

    // line 124
    public function block_sonata_nav_menu_before($context, array $blocks = array())
    {
    }

    // line 126
    public function block_sonata_nav_menu($context, array $blocks = array())
    {
        // line 127
        echo "                                <div class=\"nav-collapse\">
                                    <ul class=\"nav\">
                                        ";
        // line 129
        $this->displayBlock('top_bar_before_nav', $context, $blocks);
        // line 130
        echo "                                        ";
        $this->displayBlock('sonata_top_bar_nav', $context, $blocks);
        // line 163
        echo "                                        ";
        $this->displayBlock('top_bar_after_nav', $context, $blocks);
        // line 164
        echo "                                    </ul>

                                    ";
        // line 166
        $this->displayBlock('sonata_top_bar_search', $context, $blocks);
        // line 175
        echo "
                                </div>
                            ";
    }

    // line 129
    public function block_top_bar_before_nav($context, array $blocks = array())
    {
        echo " ";
    }

    // line 130
    public function block_sonata_top_bar_nav($context, array $blocks = array())
    {
        // line 131
        echo "                                            ";
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "security", array()), "token", array()) && $this->env->getExtension('security')->isGranted("ROLE_SONATA_ADMIN"))) {
            // line 132
            echo "                                                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : $this->getContext($context, "admin_pool")), "dashboardgroups", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
                // line 133
                echo "                                                    ";
                $context["display"] = (twig_test_empty($this->getAttribute($context["group"], "roles", array())) || $this->env->getExtension('security')->isGranted("ROLE_SUPER_ADMIN"));
                // line 134
                echo "                                                    ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["group"], "roles", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
                    if ( !(isset($context["display"]) ? $context["display"] : $this->getContext($context, "display"))) {
                        // line 135
                        echo "                                                        ";
                        $context["display"] = $this->env->getExtension('security')->isGranted($context["role"]);
                        // line 136
                        echo "                                                    ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 137
                echo "
                                                    ";
                // line 139
                echo "                                                    ";
                $context["item_count"] = 0;
                // line 140
                echo "                                                    ";
                if ((isset($context["display"]) ? $context["display"] : $this->getContext($context, "display"))) {
                    // line 141
                    echo "                                                        ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["group"], "items", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["admin"]) {
                        if (((isset($context["item_count"]) ? $context["item_count"] : $this->getContext($context, "item_count")) == 0)) {
                            // line 142
                            echo "                                                            ";
                            if (($this->getAttribute($context["admin"], "hasroute", array(0 => "list"), "method") && $this->getAttribute($context["admin"], "isGranted", array(0 => "LIST"), "method"))) {
                                // line 143
                                echo "                                                                ";
                                $context["item_count"] = ((isset($context["item_count"]) ? $context["item_count"] : $this->getContext($context, "item_count")) + 1);
                                // line 144
                                echo "                                                            ";
                            }
                            // line 145
                            echo "                                                        ";
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['admin'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 146
                    echo "                                                    ";
                }
                // line 147
                echo "
                                                    ";
                // line 148
                if (((isset($context["display"]) ? $context["display"] : $this->getContext($context, "display")) && ((isset($context["item_count"]) ? $context["item_count"] : $this->getContext($context, "item_count")) > 0))) {
                    // line 149
                    echo "                                                    <li class=\"dropdown\">
                                                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">";
                    // line 150
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($context["group"], "label", array()), array(), $this->getAttribute($context["group"], "label_catalogue", array())), "html", null, true);
                    echo " <span class=\"caret\"></span></a>
                                                        <ul class=\"dropdown-menu\">
                                                            ";
                    // line 152
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["group"], "items", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["admin"]) {
                        // line 153
                        echo "                                                                ";
                        if (($this->getAttribute($context["admin"], "hasroute", array(0 => "list"), "method") && $this->getAttribute($context["admin"], "isGranted", array(0 => "LIST"), "method"))) {
                            // line 154
                            echo "                                                                    <li";
                            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "_sonata_admin"), "method") == $this->getAttribute($context["admin"], "code", array()))) {
                                echo " class=\"active\"";
                            }
                            echo "><a href=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["admin"], "generateUrl", array(0 => "list"), "method"), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($context["admin"], "label", array()), array(), $this->getAttribute($context["admin"], "translationdomain", array())), "html", null, true);
                            echo "</a></li>
                                                                ";
                        }
                        // line 156
                        echo "                                                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['admin'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 157
                    echo "                                                        </ul>
                                                    </li>
                                                    ";
                }
                // line 160
                echo "                                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 161
            echo "                                            ";
        }
        // line 162
        echo "                                        ";
    }

    // line 163
    public function block_top_bar_after_nav($context, array $blocks = array())
    {
        echo " ";
    }

    // line 166
    public function block_sonata_top_bar_search($context, array $blocks = array())
    {
        // line 167
        echo "                                        ";
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "security", array()), "token", array()) && $this->env->getExtension('security')->isGranted("ROLE_SONATA_ADMIN"))) {
            // line 168
            echo "                                            <form action=\"";
            echo $this->env->getExtension('routing')->getUrl("sonata_admin_search");
            echo "\" method=\"GET\"  class=\"navbar-search\">
                                                <div class=\"input-append\">
                                                    <input type=\"text\" name=\"q\" value=\"";
            // line 170
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "q"), "method"), "html", null, true);
            echo "\" class=\"input-large search-query\" placeholder=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("search_placeholder", array(), "SonataAdminBundle"), "html", null, true);
            echo "\">
                                                </div>
                                            </form>
                                        ";
        }
        // line 174
        echo "                                    ";
    }

    // line 179
    public function block_sonata_nav_menu_after($context, array $blocks = array())
    {
    }

    // line 188
    public function block_sonata_page_content($context, array $blocks = array())
    {
        // line 189
        echo "                ";
        $this->displayBlock('notice', $context, $blocks);
        // line 192
        echo "
                <div class=\"row-fluid\">
                    ";
        // line 194
        $this->displayBlock('sonata_breadcrumb', $context, $blocks);
        // line 222
        echo "
                    ";
        // line 223
        if ( !twig_test_empty((isset($context["_actions"]) ? $context["_actions"] : $this->getContext($context, "_actions")))) {
            // line 224
            echo "                        <div class=\"span4 offset2\">
                            ";
            // line 225
            echo (isset($context["_actions"]) ? $context["_actions"] : $this->getContext($context, "_actions"));
            echo "
                        </div>
                    ";
        }
        // line 228
        echo "                </div>

                <div class=\"row-fluid\">
                    ";
        // line 231
        if ( !twig_test_empty((isset($context["_side_menu"]) ? $context["_side_menu"] : $this->getContext($context, "_side_menu")))) {
            // line 232
            echo "                        <div class=\"sidebar span2\">
                            <div class=\"well sonata-ba-side-menu\" style=\"padding: 8px 0;\">";
            // line 233
            echo (isset($context["_side_menu"]) ? $context["_side_menu"] : $this->getContext($context, "_side_menu"));
            echo "</div>
                        </div>
                    ";
        }
        // line 236
        echo "
                    <div class=\"content ";
        // line 237
        echo (( !twig_test_empty((isset($context["_side_menu"]) ? $context["_side_menu"] : $this->getContext($context, "_side_menu")))) ? (" span10") : ("span12"));
        echo "\">
                        ";
        // line 238
        $this->displayBlock('sonata_admin_content', $context, $blocks);
        // line 270
        echo "                    </div>
                </div>

                ";
        // line 273
        $this->displayBlock('footer', $context, $blocks);
        // line 280
        echo "            ";
    }

    // line 189
    public function block_notice($context, array $blocks = array())
    {
        // line 190
        echo "                    ";
        $this->env->loadTemplate("SonataCoreBundle:FlashMessage:render.html.twig")->display($context);
        // line 191
        echo "                ";
    }

    // line 194
    public function block_sonata_breadcrumb($context, array $blocks = array())
    {
        // line 195
        echo "                        ";
        if (( !twig_test_empty((isset($context["_breadcrumb"]) ? $context["_breadcrumb"] : $this->getContext($context, "_breadcrumb"))) || array_key_exists("action", $context))) {
            // line 196
            echo "                            <div class=\"span6\">
                                <ul class=\"breadcrumb\">
                                    ";
            // line 198
            if (twig_test_empty((isset($context["_breadcrumb"]) ? $context["_breadcrumb"] : $this->getContext($context, "_breadcrumb")))) {
                // line 199
                echo "                                        ";
                if (array_key_exists("action", $context)) {
                    // line 200
                    echo "                                            ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "breadcrumbs", array(0 => (isset($context["action"]) ? $context["action"] : $this->getContext($context, "action"))), "method"));
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
                    foreach ($context['_seq'] as $context["_key"] => $context["menu"]) {
                        // line 201
                        echo "                                                ";
                        if ( !$this->getAttribute($context["loop"], "last", array())) {
                            // line 202
                            echo "                                                    <li>
                                                        ";
                            // line 203
                            if ( !twig_test_empty($this->getAttribute($context["menu"], "uri", array()))) {
                                // line 204
                                echo "                                                            <a href=\"";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["menu"], "uri", array()), "html", null, true);
                                echo "\">";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["menu"], "label", array()), "html", null, true);
                                echo "</a>
                                                        ";
                            } else {
                                // line 206
                                echo "                                                            ";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["menu"], "label", array()), "html", null, true);
                                echo "
                                                        ";
                            }
                            // line 208
                            echo "                                                        <span class=\"divider\">/</span>
                                                    </li>
                                                ";
                        } else {
                            // line 211
                            echo "                                                    <li class=\"active\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["menu"], "label", array()), "html", null, true);
                            echo "</li>
                                                ";
                        }
                        // line 213
                        echo "                                            ";
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
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 214
                    echo "                                        ";
                }
                // line 215
                echo "                                    ";
            } else {
                // line 216
                echo "                                        ";
                echo (isset($context["_breadcrumb"]) ? $context["_breadcrumb"] : $this->getContext($context, "_breadcrumb"));
                echo "
                                    ";
            }
            // line 218
            echo "                                </ul>
                            </div>
                        ";
        }
        // line 221
        echo "                    ";
    }

    // line 238
    public function block_sonata_admin_content($context, array $blocks = array())
    {
        // line 239
        echo "
                            ";
        // line 240
        if ( !twig_test_empty((isset($context["_preview"]) ? $context["_preview"] : $this->getContext($context, "_preview")))) {
            // line 241
            echo "                                <div class=\"sonata-ba-preview\">";
            echo (isset($context["_preview"]) ? $context["_preview"] : $this->getContext($context, "_preview"));
            echo "</div>
                            ";
        }
        // line 243
        echo "
                            ";
        // line 244
        if ( !twig_test_empty((isset($context["_content"]) ? $context["_content"] : $this->getContext($context, "_content")))) {
            // line 245
            echo "                                <div class=\"sonata-ba-content\">";
            echo (isset($context["_content"]) ? $context["_content"] : $this->getContext($context, "_content"));
            echo "</div>
                            ";
        }
        // line 247
        echo "
                            ";
        // line 248
        if ( !twig_test_empty((isset($context["_show"]) ? $context["_show"] : $this->getContext($context, "_show")))) {
            // line 249
            echo "                                <div class=\"sonata-ba-show\">";
            echo (isset($context["_show"]) ? $context["_show"] : $this->getContext($context, "_show"));
            echo "</div>
                            ";
        }
        // line 251
        echo "
                            ";
        // line 252
        if ( !twig_test_empty((isset($context["_form"]) ? $context["_form"] : $this->getContext($context, "_form")))) {
            // line 253
            echo "                                <div class=\"sonata-ba-form\">";
            echo (isset($context["_form"]) ? $context["_form"] : $this->getContext($context, "_form"));
            echo "</div>
                            ";
        }
        // line 255
        echo "
                            ";
        // line 256
        if (( !twig_test_empty((isset($context["_list_table"]) ? $context["_list_table"] : $this->getContext($context, "_list_table"))) ||  !twig_test_empty((isset($context["_list_filters"]) ? $context["_list_filters"] : $this->getContext($context, "_list_filters"))))) {
            // line 257
            echo "                                <div class=\"row-fluid\">
                                    <div class=\"sonata-ba-list ";
            // line 258
            if (trim((isset($context["_list_filters"]) ? $context["_list_filters"] : $this->getContext($context, "_list_filters")))) {
                echo "span10";
            } else {
                echo "span12";
            }
            echo "\">
                                        ";
            // line 259
            echo (isset($context["_list_table"]) ? $context["_list_table"] : $this->getContext($context, "_list_table"));
            echo "
                                    </div>
                                    ";
            // line 261
            if (trim((isset($context["_list_filters"]) ? $context["_list_filters"] : $this->getContext($context, "_list_filters")))) {
                // line 262
                echo "                                        <div class=\"sonata-ba-filter span2\">
                                            ";
                // line 263
                echo (isset($context["_list_filters"]) ? $context["_list_filters"] : $this->getContext($context, "_list_filters"));
                echo "
                                        </div>
                                    ";
            }
            // line 266
            echo "                                </div>
                            ";
        }
        // line 268
        echo "
                        ";
    }

    // line 273
    public function block_footer($context, array $blocks = array())
    {
        // line 274
        echo "                    <div class=\"row-fluid\">
                        <div class=\"span2 offset10 pull-right\">
                            <span class=\"label\"><a href=\"http://sonata-project.org\" rel=\"noreferrer\" style=\"text-decoration: none; color: black\">Sonata Project</a></span>
                        </div>
                    </div>
                ";
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle::standard_layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  856 => 274,  853 => 273,  848 => 268,  844 => 266,  838 => 263,  835 => 262,  833 => 261,  828 => 259,  820 => 258,  817 => 257,  815 => 256,  812 => 255,  806 => 253,  804 => 252,  801 => 251,  795 => 249,  793 => 248,  790 => 247,  784 => 245,  782 => 244,  779 => 243,  773 => 241,  771 => 240,  768 => 239,  765 => 238,  761 => 221,  756 => 218,  750 => 216,  747 => 215,  744 => 214,  730 => 213,  724 => 211,  719 => 208,  713 => 206,  705 => 204,  703 => 203,  700 => 202,  697 => 201,  679 => 200,  676 => 199,  674 => 198,  670 => 196,  667 => 195,  664 => 194,  660 => 191,  657 => 190,  654 => 189,  650 => 280,  648 => 273,  643 => 270,  641 => 238,  637 => 237,  634 => 236,  628 => 233,  625 => 232,  623 => 231,  618 => 228,  612 => 225,  609 => 224,  607 => 223,  604 => 222,  602 => 194,  598 => 192,  595 => 189,  592 => 188,  587 => 179,  583 => 174,  574 => 170,  568 => 168,  565 => 167,  562 => 166,  556 => 163,  552 => 162,  549 => 161,  543 => 160,  538 => 157,  532 => 156,  520 => 154,  517 => 153,  513 => 152,  508 => 150,  505 => 149,  503 => 148,  500 => 147,  497 => 146,  490 => 145,  487 => 144,  484 => 143,  481 => 142,  475 => 141,  472 => 140,  469 => 139,  466 => 137,  459 => 136,  456 => 135,  450 => 134,  447 => 133,  442 => 132,  439 => 131,  436 => 130,  430 => 129,  424 => 175,  422 => 166,  418 => 164,  415 => 163,  412 => 130,  410 => 129,  406 => 127,  403 => 126,  398 => 124,  391 => 120,  385 => 119,  380 => 118,  377 => 117,  370 => 182,  366 => 180,  364 => 179,  361 => 178,  359 => 126,  356 => 125,  354 => 124,  351 => 123,  349 => 117,  343 => 115,  341 => 114,  330 => 105,  327 => 104,  317 => 101,  310 => 80,  304 => 79,  300 => 78,  297 => 77,  291 => 75,  289 => 74,  284 => 72,  279 => 70,  274 => 68,  270 => 67,  266 => 66,  260 => 63,  256 => 61,  250 => 60,  242 => 59,  238 => 57,  235 => 56,  228 => 52,  224 => 51,  220 => 49,  205 => 38,  203 => 37,  198 => 35,  193 => 33,  189 => 32,  184 => 30,  181 => 29,  178 => 28,  172 => 22,  165 => 281,  163 => 188,  159 => 186,  157 => 104,  154 => 103,  150 => 101,  146 => 99,  143 => 98,  140 => 97,  123 => 95,  119 => 93,  116 => 92,  99 => 91,  96 => 90,  93 => 89,  87 => 87,  85 => 86,  80 => 84,  76 => 82,  74 => 56,  71 => 55,  69 => 28,  60 => 22,  57 => 21,  55 => 20,  53 => 19,  51 => 18,  49 => 17,  47 => 16,  45 => 15,  43 => 14,  41 => 13,  39 => 12,  37 => 11,);
    }
}
