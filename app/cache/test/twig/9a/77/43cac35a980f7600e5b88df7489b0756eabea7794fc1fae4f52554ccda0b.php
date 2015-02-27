<?php

/* ApplicationSonataAdminBundle::layout.html.twig */
class __TwigTemplate_9a7743cac35a980f7600e5b88df7489b0756eabea7794fc1fae4f52554ccda0b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SonataAdminBundle::standard_layout.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'sonata_admin_content' => array($this, 'block_sonata_admin_content'),
            'logo' => array($this, 'block_logo'),
            'sonata_top_bar_search' => array($this, 'block_sonata_top_bar_search'),
            'sonata_nav_menu' => array($this, 'block_sonata_nav_menu'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle::standard_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatamarkitup/markitup/markitup/skins/sonata/style.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
    <link rel=\"stylesheet\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatamarkitup/markitup/markitup/sets/markdown/style.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
    <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatamarkitup/markitup/markitup/sets/html/style.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatamarkitup/markitup/markitup/sets/textile/style.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
    <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/applicationsonataadmin/css/admin_extra.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
    <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corereview/star-rating/jquery.rating.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corecommon/fancybox/jquery.fancybox.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/applicationivoryckeditor/jquery-spellchecker-demo-master/css/jquery.spellchecker.min.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
    <style>                
        .langSwitch {
            cursor:pointer;
        }
        .sonata-bc input[type=\"checkbox\"],
        .sonata-bc  input[type=\"radio\"] {
            margin-top:0px;
            margin-bottom:0px;
        }
    </style>

";
    }

    // line 26
    public function block_javascripts($context, array $blocks = array())
    {
        // line 27
        echo "
    <script>
        window.SONATA_CONFIG = {
            CONFIRM_EXIT: ";
        // line 30
        if ((array_key_exists("admin_pool", $context) && $this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : $this->getContext($context, "admin_pool")), "getOption", array(0 => "confirm_exit"), "method"))) {
            echo "true";
        } else {
            echo "false";
        }
        echo ",
            USE_SELECT2: ";
        // line 31
        if ((array_key_exists("admin_pool", $context) && $this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : $this->getContext($context, "admin_pool")), "getOption", array(0 => "use_select2"), "method"))) {
            echo "true";
        } else {
            echo "false";
        }
        // line 32
        echo "        };
        window.SONATA_TRANSLATIONS = {
            CONFIRM_EXIT: '";
        // line 34
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("confirm_exit", array(), "SonataAdminBundle"), "js"), "html", null, true);
        echo "'
        };
    </script>
    <script src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatajquery/jquery-1.8.3.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatajquery/jquery-ui-1.8.23.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatajquery/jquery-ui-i18n.js"), "html", null, true);
        echo "\"></script>

    <script src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>

    <script src=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/x-editable/js/bootstrap-editable.min.js"), "html", null, true);
        echo "\"></script>

    ";
        // line 45
        if ((array_key_exists("admin_pool", $context) && $this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : $this->getContext($context, "admin_pool")), "getOption", array(0 => "use_select2"), "method"))) {
            // line 46
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/select2/select2.min.js"), "html", null, true);
            echo "\"></script>
    ";
        }
        // line 48
        echo "
    <script src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/applicationsonataadmin/js/jquery.form.js"), "html", null, true);
        echo "\"></script>
    ";
        // line 50
        if ((array_key_exists("admin_pool", $context) && $this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : $this->getContext($context, "admin_pool")), "getOption", array(0 => "confirm_exit"), "method"))) {
            echo "<script src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/jquery/jquery.confirmExit.js"), "html", null, true);
            echo "\"></script>";
        }
        // line 51
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/base.js"), "html", null, true);
        echo "\"></script>


    ";
        // line 54
        if ((array_key_exists("admin_pool", $context) && $this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : $this->getContext($context, "admin_pool")), "getOption", array(0 => "use_select2"), "method"))) {
            // line 55
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/select2/select2_locale_ru.js"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
    ";
        }
        // line 57
        echo "
    <script src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/ivoryckeditor/ckeditor.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatamarkitup/markitup/markitup/jquery.markitup.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatamarkitup/markitup/markitup/sets/markdown/set.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatamarkitup/markitup/markitup/sets/html/set.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonatamarkitup/markitup/markitup/sets/textile/set.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>

    <script src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/applicationsonataadmin/js/jquery.inputmask/jquery.inputmask.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/applicationsonataadmin/js/jquery.inputmask/jquery.inputmask.extensions.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/applicationsonataadmin/js/jquery.inputmask/jquery.inputmask.numeric.extensions.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/applicationsonataadmin/js/jquery.inputmask/jquery.inputmask.regex.extensions.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>


    <script src=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/applicationsonataadmin/js/admin_extra.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>

    <script src=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corestatistics/highstock/js/highstock.js"), "html", null, true);
        echo "\"></script>
    <!--
    <script src=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corestatistics/highstock/js/modules/exporting.js"), "html", null, true);
        echo "\"></script>
    -->
    <script src=\"";
        // line 76
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corestatistics/highcharts/js/themes/customise.default.ru.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corereview/star-rating/jquery.rating.pack.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corecommon/fancybox/jquery.fancybox.pack.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreproduct/js/remotevideo.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/applicationivoryckeditor/jquery-spellchecker-demo-master/js/jquery.spellchecker.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    ";
        // line 82
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corecommon/js/jquery.mcdropdown.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corecommon/js/jquery.bgiframe.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/applicationsonataadmin/js/stupidtable.min.js"), "html", null, true);
        echo "\"></script>
    ";
        // line 86
        echo "    <script type=\"text/javascript\">
        ";
        // line 88
        echo "            \$(document).ready(function() {
                setMaskForInputs();
                setDatePickerForInputs();
            });

        ";
        // line 94
        echo "            var adminRoutes = [];
            var adminExtra = [];
            ";
        // line 96
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) {
            // line 97
            echo "                adminExtra['email'] = '";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "email", array()), "html", null, true);
            echo "';
            ";
        }
        // line 99
        echo "                ";
        // line 100
        echo "            var img = \$('<img />')
                    .attr('src', \"";
        // line 101
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/ajax-loader.gif"), "html", null, true);
        echo "\")
                    .css({position: 'absolute', display: 'none', zIndex: 1000000})
                    .attr('id', 'pict_weit');
            \$(document)
                    .ajaxStart(function() {
                        \$('#pict_weit').css('display', 'block');
                    })
                    .ajaxStop(function() {
                        \$('#pict_weit').css('display', 'none');
                        setMaskForInputs();
                        setDatePickerForInputs();
                    })
                    .ready(function(\$) {
                        \$('body').append(img);
                        \$(document).mousemove(function(event) {
                            \$('#pict_weit').css({
                                left: event.pageX + 10,
                                top: event.pageY - 10
                            });
                        });
                    });

    </script>

";
    }

    // line 127
    public function block_sonata_admin_content($context, array $blocks = array())
    {
        // line 128
        echo "    ";
        // line 129
        echo "    ";
        if ((array_key_exists("action", $context) && ((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")) == "list"))) {
            // line 130
            echo "
        ";
            // line 131
            $this->displayBlock("side_menu_to_tabs", $context, $blocks);
            echo "

    ";
        }
        // line 134
        echo "
    ";
        // line 135
        $this->displayParentBlock("sonata_admin_content", $context, $blocks);
        echo "

    ";
        // line 137
        $context["optionsExtraBlocks"] = $this->getAttribute($this->getAttribute((isset($context["ServiceContainer"]) ? $context["ServiceContainer"] : $this->getContext($context, "ServiceContainer")), "get", array(0 => "application_sonata_admin_extra_blocks_logic"), "method"), "getWhatShow", array());
        // line 138
        echo "
    ";
        // line 140
        echo "    ";
        if (($this->getAttribute((isset($context["optionsExtraBlocks"]) ? $context["optionsExtraBlocks"] : null), "sides", array(), "array", true, true) && $this->getAttribute($this->getAttribute((isset($context["optionsExtraBlocks"]) ? $context["optionsExtraBlocks"] : null), "sides", array(), "array", false, true), "left", array(), "array", true, true))) {
            // line 141
            echo "
        ";
            // line 142
            $this->env->loadTemplate("ApplicationSonataAdminBundle:Admin\\ExtraBlocks:extra_left_blocks.html.twig")->display($context);
            // line 143
            echo "
    ";
        }
        // line 145
        echo "
    ";
        // line 147
        echo "    ";
        if (($this->getAttribute((isset($context["optionsExtraBlocks"]) ? $context["optionsExtraBlocks"] : null), "sides", array(), "array", true, true) && $this->getAttribute($this->getAttribute((isset($context["optionsExtraBlocks"]) ? $context["optionsExtraBlocks"] : null), "sides", array(), "array", false, true), "bottom", array(), "array", true, true))) {
            // line 148
            echo "
        ";
            // line 149
            $this->env->loadTemplate("ApplicationSonataAdminBundle:Admin\\ExtraBlocks:extra_bottom_blocks.html.twig")->display($context);
            // line 150
            echo "
    ";
        }
        // line 152
        echo "
";
    }

    // line 155
    public function block_logo($context, array $blocks = array())
    {
        // line 156
        echo "    <a title=\"Перейти на сайт\"  href=\"";
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\" class=\"brand\">
        <img src=\"";
        // line 157
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : $this->getContext($context, "admin_pool")), "titlelogo", array())), "html", null, true);
        echo "\"  alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : $this->getContext($context, "admin_pool")), "title", array()), "html", null, true);
        echo "\">
    </a>

    <a href=\"";
        // line 160
        echo $this->env->getExtension('routing')->getUrl("sonata_admin_dashboard");
        echo "\" class=\"brand\">
        <span class=\"icon-home\" title=\"Общая статистика\"></span>
    </a>

";
    }

    // line 166
    public function block_sonata_top_bar_search($context, array $blocks = array())
    {
    }

    // line 168
    public function block_sonata_nav_menu($context, array $blocks = array())
    {
        // line 169
        echo "
    ";
        // line 171
        echo "
    ";
        // line 172
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("ApplicationSonataAdminBundle:MenuAdmin:menu", array("request" => $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()))));
        echo "

";
    }

    // line 176
    public function block_footer($context, array $blocks = array())
    {
        // line 177
        echo "    <script>
        jQuery(function(\$) {
            //для удобства, если кликнули по TD, то выделяем в нем первый checkbox
            \$('body').on('click', 'td, th', function(e) {
                if (\$(e.target).is('td') || \$(e.target).is('th')) {
                    \$(this).find('input[type=\"checkbox\"]').first().click();
                }

            });

            ";
        // line 188
        echo "//     \$('#list_batch_checkbox').click(function () {
//    \$('th').find('input[type=\"checkbox\"]').first().trigger('click');
            //Селект2 декорация для html5 ошибок
            \$('body').on('change', '.control-group select.select2-offscreen, .control-group input.ajax-entity', function() {
                var \$this = \$(this),
                    eltBlock = \$this.parents('.control-group'),
                    selectContainer = \$('.select2-container', eltBlock);

                if (\$this.is(':invalid')) {
                     selectContainer.addClass('html5-error');
                } else {
                    selectContainer.removeClass('html5-error');
                }

            });

            //hmtl5 error scroll
            \$('input[type=\"submit\"]').click(function() {

                var \$this = \$(this),
                    parentForm = \$this.parents('form'),
                    invalidElements = \$('input.select2-offscreen:invalid, textarea.select2-offscreen:invalid, select.select2-offscreen:invalid', parentForm);
                if (invalidElements.length) {
                    \$('body').animate({
                            scrollTop: (invalidElements.first().offset().top - 40)
                        }, 'slow');
                }
            });

            /*
            \$('form').submit(function() {
                console.log('dfdf');
                var \$this = \$(this),
                    invalidElements = \$('input:ivalid,textarea:invalid, select:invalid', \$this);
                console.log(invalidElements);
                invalidElements.each(function(index, element){
                   var \$this = \$(element);

                   \$('body').animate({
                            scrollTop: \$this.offset().top
                        }, 'slow');
                });

            });
            */
            select2Html5();
        });

        /**
         * Селект2 декорация для html5 ошибок
         * @returns {void}
         */
        function select2Html5() {
            \$('.control-group select.select2-offscreen, .control-group input.ajax-entity').each(function(index, element){
                var \$this = \$(element),
                    eltBlock = \$this.parents('.control-group'),
                    parentBlock = \$('.controls.sonata-ba-field', eltBlock);
                parentBlock.css(\"position\", \"relative\");
            });
        }

    </script>
    <div class=\"row-fluid\">
        <div class=\"span2 offset10 pull-right\">
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataAdminBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  447 => 188,  435 => 177,  432 => 176,  425 => 172,  422 => 171,  419 => 169,  416 => 168,  411 => 166,  402 => 160,  394 => 157,  389 => 156,  386 => 155,  381 => 152,  377 => 150,  375 => 149,  372 => 148,  369 => 147,  366 => 145,  362 => 143,  360 => 142,  357 => 141,  354 => 140,  351 => 138,  349 => 137,  344 => 135,  341 => 134,  335 => 131,  332 => 130,  329 => 129,  327 => 128,  324 => 127,  295 => 101,  292 => 100,  290 => 99,  284 => 97,  282 => 96,  278 => 94,  271 => 88,  268 => 86,  264 => 84,  260 => 83,  255 => 82,  251 => 80,  247 => 79,  243 => 78,  239 => 77,  235 => 76,  230 => 74,  225 => 72,  220 => 70,  214 => 67,  210 => 66,  206 => 65,  202 => 64,  197 => 62,  193 => 61,  189 => 60,  185 => 59,  181 => 58,  178 => 57,  172 => 55,  170 => 54,  163 => 51,  157 => 50,  153 => 49,  150 => 48,  144 => 46,  142 => 45,  137 => 43,  132 => 41,  127 => 39,  123 => 38,  119 => 37,  113 => 34,  109 => 32,  103 => 31,  95 => 30,  90 => 27,  87 => 26,  70 => 12,  66 => 11,  62 => 10,  58 => 9,  54 => 8,  50 => 7,  46 => 6,  42 => 5,  37 => 4,  34 => 3,);
    }
}
