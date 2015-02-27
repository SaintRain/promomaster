<?php

/* CoreCommonBundle:Fragments:header.html.twig */
class __TwigTemplate_0c1e9bba00ae7527b9d2d8a22578903aa51e35d4ec316c987483ebec579d1f89 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["orderRoutes"] = array(0 => "core_order_cart_step2", 1 => "core_order_cart_step3", 2 => "core_order_cart_step3_5", 3 => "core_order_cart_step4", 4 => "core_order_finish", 5 => "core_order_finish_with_payment_id", 6 => "core_order_finish_with_order_id");
        // line 10
        echo "
";
        // line 11
        $context["contragent"] = $this->env->getExtension('notification_extension')->getCurrentContragentFunction();
        // line 12
        $context["logo"] = $this->env->getExtension('core_holiday_twig_function_extension')->getLogoLinkFunction();
        // line 13
        echo "
<header role=\"banner\" id=\"header\" class=\"clearfix";
        // line 14
        if (twig_in_filter((isset($context["route"]) ? $context["route"] : $this->getContext($context, "route")), (isset($context["orderRoutes"]) ? $context["orderRoutes"] : $this->getContext($context, "orderRoutes")))) {
            echo " order_header";
        }
        echo "\">
    ";
        // line 15
        if (twig_in_filter((isset($context["route"]) ? $context["route"] : $this->getContext($context, "route")), (isset($context["orderRoutes"]) ? $context["orderRoutes"] : $this->getContext($context, "orderRoutes")))) {
            // line 16
            echo "
        <div class=\"order_header_pad\">
                <a href=\"";
            // line 18
            echo $this->env->getExtension('routing')->getPath("core_common_index");
            echo "\" class=\"header_logo";
            if ($this->getAttribute((isset($context["logo"]) ? $context["logo"] : $this->getContext($context, "logo")), "isHoliday", array())) {
                echo " header_logo_holiday";
            }
            echo "\">
                    <img alt=\"OliKids.ru &mdash; интернет-магазин детских товаров\" src=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["logo"]) ? $context["logo"] : $this->getContext($context, "logo")), "src", array()), "html", null, true);
            echo "\">
                </a>
\t\t<h1>Оформление заказа</h1>
\t\t";
            // line 22
            $this->env->loadTemplate("CoreCommonBundle:Fragments:userMenu.html.twig")->display(array_merge($context, array("contragent" => (isset($context["contragent"]) ? $context["contragent"] : $this->getContext($context, "contragent")))));
            // line 23
            echo "                ";
            $this->env->loadTemplate("CoreCommonBundle:Fragments:userCart.html.twig")->display($context);
            // line 24
            echo "        </div>
        ";
        } else {
            // line 26
            echo "            ";
            if (((isset($context["route"]) ? $context["route"] : $this->getContext($context, "route")) == "core_common_index")) {
                // line 27
                echo "                <h1 class=\"header_logo";
                if ($this->getAttribute((isset($context["logo"]) ? $context["logo"] : $this->getContext($context, "logo")), "isHoliday", array())) {
                    echo " header_logo_holiday";
                }
                echo "\">
                    <img alt=\"OliKids.ru &mdash; интернет-магазин детских товаров\" src=\"";
                // line 28
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["logo"]) ? $context["logo"] : $this->getContext($context, "logo")), "src", array()), "html", null, true);
                echo "\">
                </h1>
                ";
            } else {
                // line 31
                echo "                <h2>
                    <a href=\"";
                // line 32
                echo $this->env->getExtension('routing')->getPath("core_common_index");
                echo "\" class=\"header_logo";
                if ($this->getAttribute((isset($context["logo"]) ? $context["logo"] : $this->getContext($context, "logo")), "isHoliday", array())) {
                    echo " header_logo_holiday";
                }
                echo "\">
                        <img alt=\"OliKids.ru &mdash; интернет-магазин детских товаров\" src=\"";
                // line 33
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["logo"]) ? $context["logo"] : $this->getContext($context, "logo")), "src", array()), "html", null, true);
                echo "\">
                    </a>
                </h2>
            ";
            }
            // line 37
            echo "
            <div class=\"header_data\">
                <div class=\"header_data_layer1 clearfix\">
                    <div class=\"header_work_time pull-left\">
                        ";
            // line 41
            if ((isset($context["officeWorkTime"]) ? $context["officeWorkTime"] : $this->getContext($context, "officeWorkTime"))) {
                // line 42
                echo "                            ";
                if ($this->getAttribute((isset($context["officeWorkTime"]) ? $context["officeWorkTime"] : null), "minutes", array(), "any", true, true)) {
                    // line 43
                    echo "                                ";
                    $context["officeWorkTimeMsg"] = $this->env->getExtension('translator')->transchoice($this->getAttribute((isset($context["officeWorkTime"]) ? $context["officeWorkTime"] : $this->getContext($context, "officeWorkTime")), "msg", array()), $this->getAttribute((isset($context["officeWorkTime"]) ? $context["officeWorkTime"] : $this->getContext($context, "officeWorkTime")), "minutes", array()), array("%minute%" => $this->getAttribute((isset($context["officeWorkTime"]) ? $context["officeWorkTime"] : $this->getContext($context, "officeWorkTime")), "minutes", array())));
                    // line 44
                    echo "                                ";
                } else {
                    // line 45
                    echo "                                    ";
                    $context["officeWorkTimeMsg"] = $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["officeWorkTime"]) ? $context["officeWorkTime"] : $this->getContext($context, "officeWorkTime")), "msg", array()));
                    // line 46
                    echo "                            ";
                }
                // line 47
                echo "                            <span
                                ";
                // line 48
                if (($this->getAttribute((isset($context["officeWorkTime"]) ? $context["officeWorkTime"] : null), "isWeekend", array(), "any", true, true) && $this->getAttribute((isset($context["officeWorkTime"]) ? $context["officeWorkTime"] : $this->getContext($context, "officeWorkTime")), "isWeekend", array()))) {
                    echo " 
                                data-weekend=\"1\"
                                ";
                } else {
                    // line 51
                    echo "                                data-weekend=\"0\" data-now=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["officeWorkTime"]) ? $context["officeWorkTime"] : $this->getContext($context, "officeWorkTime")), "time", array()), "now", array()), "html", null, true);
                    echo "\" data-start=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["officeWorkTime"]) ? $context["officeWorkTime"] : $this->getContext($context, "officeWorkTime")), "time", array()), "startTime", array()), "html", null, true);
                    echo "\" data-end=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["officeWorkTime"]) ? $context["officeWorkTime"] : $this->getContext($context, "officeWorkTime")), "time", array()), "endTime", array()), "html", null, true);
                    echo "\"
                                ";
                }
                // line 53
                echo "                                class=\"office-work open";
                if ($this->getAttribute((isset($context["officeWorkTime"]) ? $context["officeWorkTime"] : $this->getContext($context, "officeWorkTime")), "isClosed", array())) {
                    echo " close";
                }
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["officeWorkTimeMsg"]) ? $context["officeWorkTimeMsg"] : $this->getContext($context, "officeWorkTimeMsg")), "html", null, true);
                echo "</span>
                        ";
            }
            // line 55
            echo "                        <span class=\"header_work_time_title\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("workTime.label"), "html", null, true);
            echo ":&nbsp;</span>
                        ";
            // line 56
            echo $this->env->getExtension('translator')->trans("workTime.body");
            echo "

                    </div>
                    ";
            // line 59
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("CoreCommonBundle:Fragments:helpArticles", array("request" => (isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")))));
            echo "
                </div>
                <div class=\"header_data_layer2 clearfix\">
                    ";
            // line 62
            $this->env->loadTemplate("CoreCommonBundle:Fragments:userCart.html.twig")->display($context);
            // line 63
            echo "                    <div class=\"header_contacts_phone\">

                        ";
            // line 65
            $context["phonesCaptions"] = array("rostov" => "в Ростове-на-Дону", "msk" => "в Москве", "spb" => "в Санкт-Петербурге");
            // line 66
            echo "
                        <strong class=\"text-phone-selected\">";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phones"]) ? $context["phones"] : $this->getContext($context, "phones")), "rostov", array(), "array"), "html", null, true);
            echo "</strong>
                        <span class=\"text_tgl text-city-selected\">";
            // line 68
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phonesCaptions"]) ? $context["phonesCaptions"] : $this->getContext($context, "phonesCaptions")), "rostov", array(), "array"), "html", null, true);
            echo "</span>
                        <div class=\"header_contacts_dropdown dropdown\">
                            <ul>
                                ";
            // line 71
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["phones"]) ? $context["phones"] : $this->getContext($context, "phones")));
            foreach ($context['_seq'] as $context["key"] => $context["phone"]) {
                // line 72
                echo "                                    ";
                if ($this->getAttribute((isset($context["phonesCaptions"]) ? $context["phonesCaptions"] : null), $context["key"], array(), "array", true, true)) {
                    // line 73
                    echo "
                                        <li id=\"";
                    // line 74
                    echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                    echo "\" ";
                    if (($context["key"] == "rostov")) {
                        echo "class=\"selected\"";
                    }
                    echo "><strong class=\"text-phone\">";
                    echo twig_escape_filter($this->env, $context["phone"], "html", null, true);
                    echo "</strong><span class=\"text-city\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phonesCaptions"]) ? $context["phonesCaptions"] : $this->getContext($context, "phonesCaptions")), $context["key"], array(), "array"), "html", null, true);
                    echo "</span></li>

                                    ";
                }
                // line 77
                echo "                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['phone'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 78
            echo "                            </ul>
                        </div>
                    </div>
                    <div class=\"header_search\">
                        ";
            // line 82
            $this->env->loadTemplate("CoreCommonBundle:Fragments:searchForm.html.twig")->display($context);
            // line 83
            echo "                    </div>
                    ";
            // line 84
            $this->env->loadTemplate("CoreCommonBundle:Fragments:userMenu.html.twig")->display(array_merge($context, array("contragent" => (isset($context["contragent"]) ? $context["contragent"] : $this->getContext($context, "contragent")))));
            // line 85
            echo "                </div>
            </div>
    ";
        }
        // line 88
        echo "

";
        // line 228
        echo "</header>";
        // line 230
        if ((($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()) && $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "contragents", array())) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "contragents", array()), "count", array()) > 1))) {
            // line 232
            echo "<div class=\"hidden\">
        <div title=\"";
            // line 233
            if ((isset($context["contragent"]) ? $context["contragent"] : $this->getContext($context, "contragent"))) {
                echo "Смена";
            } else {
                echo "Пожалуйста, выберите";
            }
            echo " контрагента\" id=\"change-contragent-container\" data-auto-open=\"";
            if ((isset($context["contragent"]) ? $context["contragent"] : $this->getContext($context, "contragent"))) {
                echo "false";
            } else {
                echo "true";
            }
            echo "\">

            <ul class=\"change-contragent\" data-url=\"";
            // line 235
            echo $this->env->getExtension('routing')->getPath("application_sonata_user_ajax_change_contragent");
            echo "\">

                ";
            // line 237
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "contragents", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                // line 238
                echo "
                    <li>
                        <span ";
                // line 240
                if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "get", array(0 => "current_contragent_id"), "method") != $this->getAttribute($context["c"], "id", array()))) {
                    echo "class=\"text_tgl\" data-id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["c"], "id", array()), "html", null, true);
                    echo "\"";
                } else {
                    echo " class=\"text_tgl contragent-selected\" title=\"Текущий контрагент\"";
                }
                echo ">";
                // line 242
                if ($this->getAttribute($context["c"], "legalForm", array(), "any", true, true)) {
                    // line 243
                    echo twig_escape_filter($this->env, $this->getAttribute($context["c"], "organization", array()), "html", null, true);
                } else {
                    // line 245
                    echo twig_escape_filter($this->env, (((($this->getAttribute($context["c"], "lastName", array()) . " ") . $this->getAttribute($context["c"], "firstName", array())) . " ") . $this->getAttribute($context["c"], "surName", array())), "html", null, true);
                }
                // line 248
                echo "</span>
                    </li>

                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 252
            echo "
            </ul>

        </div>
    </div>";
        }
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Fragments:header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  303 => 252,  294 => 248,  291 => 245,  288 => 243,  286 => 242,  277 => 240,  273 => 238,  269 => 237,  264 => 235,  249 => 233,  246 => 232,  244 => 230,  242 => 228,  238 => 88,  233 => 85,  231 => 84,  228 => 83,  226 => 82,  220 => 78,  214 => 77,  200 => 74,  197 => 73,  194 => 72,  190 => 71,  184 => 68,  180 => 67,  177 => 66,  175 => 65,  171 => 63,  169 => 62,  163 => 59,  157 => 56,  152 => 55,  142 => 53,  132 => 51,  126 => 48,  123 => 47,  120 => 46,  117 => 45,  114 => 44,  111 => 43,  108 => 42,  106 => 41,  100 => 37,  93 => 33,  85 => 32,  82 => 31,  76 => 28,  69 => 27,  66 => 26,  62 => 24,  59 => 23,  57 => 22,  51 => 19,  43 => 18,  39 => 16,  37 => 15,  31 => 14,  28 => 13,  26 => 12,  24 => 11,  21 => 10,  19 => 1,);
    }
}
