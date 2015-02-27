<?php

/* ApplicationSonataUserBundle:Profile:orders_history_list.html.twig */
class __TwigTemplate_16310622308ed0542d87532b416783410c1413a2f501e1eddae9e5581e824fef extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataUserBundle::cabinet_layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'meta_description' => array($this, 'block_meta_description'),
            'seo' => array($this, 'block_seo'),
            'main_content' => array($this, 'block_main_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataUserBundle::cabinet_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 15
        $context["_page"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "page"), "method");
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 11
    public function block_title($context, array $blocks = array())
    {
        echo "История заказов | OliKids.ru";
    }

    // line 12
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "история, заказы, состояние";
    }

    // line 13
    public function block_meta_description($context, array $blocks = array())
    {
        echo "История заказов и их состояние на сайте OliKids. Отслеживайте своевременность отправки купленного Вами товара.";
    }

    // line 17
    public function block_seo($context, array $blocks = array())
    {
        // line 18
        echo "    ";
        ob_start();
        // line 19
        echo "
        ";
        // line 20
        $this->displayParentBlock("seo", $context, $blocks);
        echo "


        ";
        // line 23
        $context["totalPageNumber"] = twig_round(($this->getAttribute((isset($context["orders"]) ? $context["orders"] : null), "getTotalItemCount", array()) / $this->getAttribute((isset($context["orders"]) ? $context["orders"] : null), "getItemNumberPerPage", array())), 0, "ceil");
        // line 24
        echo "
        ";
        // line 25
        if ((((isset($context["_page"]) ? $context["_page"] : null) - 1) > 0)) {
            // line 26
            echo "            ";
            if ((((isset($context["_page"]) ? $context["_page"] : null) - 1) == 1)) {
                // line 27
                echo "                <link rel=\"prev\" href=\"";
                echo $this->env->getExtension('routing')->getPath("application_sonata_user_profile_orders_history_list_first_page");
                echo "\" />
            ";
            } else {
                // line 29
                echo "                <link rel=\"prev\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_profile_orders_history_list", array("page" => ((isset($context["_page"]) ? $context["_page"] : null) - 1))), "html", null, true);
                echo "\" />
            ";
            }
            // line 31
            echo "        ";
        }
        // line 32
        echo "
        ";
        // line 33
        if ((((isset($context["_page"]) ? $context["_page"] : null) + 1) <= (isset($context["totalPageNumber"]) ? $context["totalPageNumber"] : null))) {
            // line 34
            echo "            ";
            if ((!(isset($context["_page"]) ? $context["_page"] : null))) {
                // line 35
                echo "                ";
                $context["_page"] = 1;
                // line 36
                echo "            ";
            }
            // line 37
            echo "            <link rel=\"next\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_profile_orders_history_list", array("page" => ((isset($context["_page"]) ? $context["_page"] : null) + 1))), "html", null, true);
            echo "\" />
        ";
        }
        // line 39
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 43
    public function block_main_content($context, array $blocks = array())
    {
        // line 44
        echo "    ";
        ob_start();
        // line 45
        echo "
        ";
        // line 46
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["orders"]) ? $context["orders"] : null), "items", array()))) {
            // line 47
            echo "
            <h2>Мои заказы</h2>

            <table class=\"cabinet_orders_list common_table\">
                <tbody>
                    ";
            // line 52
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["orders"]) ? $context["orders"] : null), "items", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
                // line 53
                echo "
                        <tr ";
                // line 54
                echo $this->env->getExtension('fastedit_extension')->fastEditFunction($context["order"]);
                echo " class=\"cabinet_orders_list_order common_table_row\">
                            <td class=\"cabinet_orders_list_info\">
                                <span class=\"cabinet_orders_list_name\"><a href=\"";
                // line 56
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("application_sonata_user_profile_order", array("id" => $this->getAttribute($context["order"], "id", array()))), "html", null, true);
                echo "\">Заказ №";
                echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute($context["order"], "id", array())), "html", null, true);
                echo "</a> от ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["order"], "createdDateTime", array()), "d.m.Y, H:i", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
                echo "</span>
                                <ul class=\"cabinet_orders_list_specs list_simple\">
                                    <li>Сумма заказа: ";
                // line 58
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction((($this->getAttribute($this->getAttribute((isset($context["ordersHelpData"]) ? $context["ordersHelpData"] : null), $this->getAttribute($context["order"], "id", array()), array(), "array", false, true), "history_info", array(), "array", true, true)) ? ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["ordersHelpData"]) ? $context["ordersHelpData"] : null), $this->getAttribute($context["order"], "id", array()), array(), "array"), "history_info", array(), "array"), "total_cost_all", array(), "array")) : ($this->getAttribute($this->getAttribute((isset($context["ordersHelpData"]) ? $context["ordersHelpData"] : null), $this->getAttribute($context["order"], "id", array()), array(), "array"), "total_cost_all", array(), "array")))), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                echo "</li>

                                    ";
                // line 60
                if ($this->getAttribute($this->getAttribute((isset($context["ordersHelpData"]) ? $context["ordersHelpData"] : null), $this->getAttribute($context["order"], "id", array()), array(), "array", false, true), "expectedDateOfDelivery", array(), "array", true, true)) {
                    // line 61
                    echo "
                                        <li>Ожидаемая дата доставки: ";
                    // line 62
                    echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["ordersHelpData"]) ? $context["ordersHelpData"] : null), $this->getAttribute($context["order"], "id", array()), array(), "array"), "expectedDateOfDelivery", array(), "array"), "none", "none", null, (isset($context["default_timezone"]) ? $context["default_timezone"] : null), "d MMMM"), "html", null, true);
                    if ($this->getAttribute($context["order"], "deliveryMethod", array())) {
                        echo " (";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["order"], "deliveryMethod", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                        echo ")";
                    }
                    echo ".</li>

                                    ";
                    // line 67
                    echo "
                                    ";
                }
                // line 69
                echo "
                                </ul>
                            </td>";
                // line 73
                if ($this->getAttribute($context["order"], "extraStatus", array())) {
                    // line 75
                    echo "<td class=\"cabinet_orders_list_status order_status\" style=\"color: #";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["order"], "extraStatus", array()), "hex", array()), "html", null, true);
                    echo "\"> ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["order"], "extraStatus", array()), ("caption" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "locale", array()))), "html", null, true);
                    echo "</td>";
                } else {
                    // line 79
                    echo "<td class=\"cabinet_orders_list_status order_status pending\"> В обработке</td>";
                }
                // line 83
                echo "</tr>

                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 86
            echo "
                </tbody>
            </table>

            <!-- pagination -->
            ";
            // line 91
            echo $this->env->getExtension('knp_pagination')->render((isset($context["orders"]) ? $context["orders"] : null), "CoreProductBundle:Catalog:pagination.html.twig", array(), array("routeFirsPage" => "application_sonata_user_profile_orders_history_list_first_page"));
            echo "
            <!-- /pagination -->

        ";
        } else {
            // line 95
            echo "
            ";
            // line 96
            $context["contragent"] = $this->env->getExtension('notification_extension')->getCurrentContragentFunction();
            // line 97
            echo "            ";
            if ((isset($context["contragent"]) ? $context["contragent"] : null)) {
                // line 98
                echo "
                <div class=\"attention_box\">
                    <h6>У контрагента <strong>";
                // line 100
                if ($this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "legalForm", array(), "any", true, true)) {
                    echo "\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "organization", array()), "html", null, true);
                    echo "\"";
                } else {
                    echo twig_escape_filter($this->env, (((($this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "lastName", array()) . " ") . $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "firstName", array())) . " ") . $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "surName", array())), "html", null, true);
                }
                echo "</strong> еще нет заказов!</h6>
                </div>

            ";
            } else {
                // line 104
                echo "
                <div class=\"attention_box\">
                    <h6>Не найден контрагент.</h6>
                </div>

            ";
            }
            // line 110
            echo "        ";
        }
        // line 111
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Profile:orders_history_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  257 => 111,  254 => 110,  246 => 104,  233 => 100,  229 => 98,  226 => 97,  224 => 96,  221 => 95,  214 => 91,  207 => 86,  199 => 83,  196 => 79,  189 => 75,  187 => 73,  183 => 69,  179 => 67,  169 => 62,  166 => 61,  164 => 60,  157 => 58,  148 => 56,  143 => 54,  140 => 53,  136 => 52,  129 => 47,  127 => 46,  124 => 45,  121 => 44,  118 => 43,  112 => 39,  106 => 37,  103 => 36,  100 => 35,  97 => 34,  95 => 33,  92 => 32,  89 => 31,  83 => 29,  77 => 27,  74 => 26,  72 => 25,  69 => 24,  67 => 23,  61 => 20,  58 => 19,  55 => 18,  52 => 17,  46 => 13,  40 => 12,  34 => 11,  29 => 15,);
    }
}
