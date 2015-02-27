<?php

/* ApplicationSonataUserBundle:Profile:left_menu.html.twig */
class __TwigTemplate_c1d7d3185d8422b8d0bb7126ea8f8fb1e3da8642d6047c28323d258dd934a451 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'left_menu' => array($this, 'block_left_menu'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 8
        echo "
";
        // line 9
        $this->displayBlock('left_menu', $context, $blocks);
    }

    public function block_left_menu($context, array $blocks = array())
    {
        // line 10
        echo "    <aside class=\"side_col\">
        <div class=\"side_col_pad\">
            <ul class=\"sidebar_menu\">
                ";
        // line 13
        $context["orderCountNotification"] = $this->env->getExtension('notification_extension')->getOrderNotificationFunction();
        // line 14
        echo "                ";
        $context["ticketsNotification"] = $this->env->getExtension('notification_extension')->getTicketsNotification();
        // line 15
        echo "                <li class=\"sidebar_menu_item";
        // line 16
        if (((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "application_sonata_user_profile_orders_history_list_first_page") || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "application_sonata_user_profile_orders_history_list")) || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "application_sonata_user_profile_order"))) {
            // line 18
            echo " active";
        }
        // line 19
        echo "\">";
        // line 20
        if (((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "application_sonata_user_profile_orders_history_list_first_page") || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "application_sonata_user_profile_orders_history_list")) || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "application_sonata_user_profile_order"))) {
            // line 23
            echo "<span class=\"sidebar_menu_link\">Мои заказы ";
            if (((isset($context["orderCountNotification"]) ? $context["orderCountNotification"] : null) > 0)) {
                echo "<span title=\"Количество неоплаченных заказов\" class=\"notice_indicator\">";
                echo twig_escape_filter($this->env, (isset($context["orderCountNotification"]) ? $context["orderCountNotification"] : null), "html", null, true);
                echo "</span>";
            }
            echo "</span>";
        } else {
            // line 25
            echo "<a href=\"";
            echo $this->env->getExtension('routing')->getPath("application_sonata_user_profile_orders_history_list_first_page");
            echo "\" class=\"sidebar_menu_link\">Мои заказы ";
            if (((isset($context["orderCountNotification"]) ? $context["orderCountNotification"] : null) > 0)) {
                echo "<span title=\"Количество неоплаченных заказов\" class=\"notice_indicator\">";
                echo twig_escape_filter($this->env, (isset($context["orderCountNotification"]) ? $context["orderCountNotification"] : null), "html", null, true);
                echo "</span>";
            }
            echo "</a>";
        }
        // line 27
        echo "</li>
                <li class=\"sidebar_menu_item";
        // line 29
        if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "application_sonata_user_profile_products_favorites_first_page") || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "application_sonata_user_profile_products_favorites"))) {
            // line 30
            echo " active";
        }
        // line 31
        echo "\">";
        // line 32
        if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "application_sonata_user_profile_products_favorites_first_page") || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "application_sonata_user_profile_products_favorites"))) {
            // line 34
            echo "<span class=\"sidebar_menu_link\">Избранные товары</span>";
        } else {
            // line 36
            echo "<a href=\"";
            echo $this->env->getExtension('routing')->getPath("application_sonata_user_profile_products_favorites_first_page", array("_format" => "html"));
            echo "\" class=\"sidebar_menu_link\">Избранные товары</a>";
        }
        // line 38
        echo "</li>
                <li class=\"sidebar_menu_item";
        // line 40
        if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "application_sonata_user_profile_products_history_first_page") || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "application_sonata_user_profile_products_history"))) {
            // line 41
            echo " active";
        }
        // line 42
        echo "\">";
        // line 43
        if ((($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "application_sonata_user_profile_products_history_first_page") || ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "application_sonata_user_profile_products_history"))) {
            // line 45
            echo "<span class=\"sidebar_menu_link\">Просмотренные товары</span>";
        } else {
            // line 47
            echo "<a href=\"";
            echo $this->env->getExtension('routing')->getPath("application_sonata_user_profile_products_history_first_page", array("_format" => "html"));
            echo "\" class=\"sidebar_menu_link\">Просмотренные товары</a>";
        }
        // line 49
        echo "</li>
                <li class=\"sidebar_menu_item";
        // line 51
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "trouble_ticket_index_auth")) {
            echo " active";
        }
        // line 52
        echo "\">";
        // line 53
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "trouble_ticket_index_auth")) {
            // line 54
            echo "<span class=\"sidebar_menu_link\">Мои обращения&nbsp;";
            if ((isset($context["ticketsNotification"]) ? $context["ticketsNotification"] : null)) {
                echo "<span class=\"notice_indicator\">";
                echo twig_escape_filter($this->env, (isset($context["ticketsNotification"]) ? $context["ticketsNotification"] : null), "html", null, true);
                echo "</span>";
            }
            echo "</span>";
        } else {
            // line 56
            echo "<a href=\"";
            echo $this->env->getExtension('routing')->getPath("trouble_ticket_index_auth");
            echo "\" class=\"sidebar_menu_link\">Мои обращения&nbsp;";
            if ((isset($context["ticketsNotification"]) ? $context["ticketsNotification"] : null)) {
                echo "<span class=\"notice_indicator\">";
                echo twig_escape_filter($this->env, (isset($context["ticketsNotification"]) ? $context["ticketsNotification"] : null), "html", null, true);
                echo "</span>";
            }
            echo "</a>";
        }
        // line 58
        echo "</li>
            </ul>
            <ul class=\"sidebar_menu settings\">

                <li class=\"sidebar_menu_item";
        // line 62
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "sonata_user_profile_show")) {
            echo " active";
        }
        echo "\">";
        // line 63
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method") == "sonata_user_profile_show")) {
            // line 64
            echo "<span class=\"sidebar_menu_link\">Персональная информация</span>";
        } else {
            // line 66
            echo "<a href=\"";
            echo $this->env->getExtension('routing')->getPath("sonata_user_profile_show");
            echo "\" class=\"sidebar_menu_link\">Персональная информация</a>";
        }
        // line 68
        echo "</li>
                ";
        // line 69
        $context["isActive"] = false;
        // line 70
        echo "                ";
        $context["curRouteName"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method");
        // line 71
        echo "                ";
        if (((((((isset($context["curRouteName"]) ? $context["curRouteName"] : null) == "application_sonata_user_contragent_create") || ((isset($context["curRouteName"]) ? $context["curRouteName"] : null) == "application_sonata_user_contragent_index")) || ((isset($context["curRouteName"]) ? $context["curRouteName"] : null) == "application_sonata_user_contragent_edit")) || ((isset($context["curRouteName"]) ? $context["curRouteName"] : null) == "application_sonata_user_contact_edit")) || ((isset($context["curRouteName"]) ? $context["curRouteName"] : null) == "application_sonata_user_contact_create"))) {
            // line 72
            echo "                    ";
            $context["isActive"] = true;
            // line 73
            echo "                ";
        }
        // line 74
        echo "                ";
        $context["likeLink"] = true;
        // line 75
        echo "                ";
        if (((isset($context["curRouteName"]) ? $context["curRouteName"] : null) == "application_sonata_user_contragent_index")) {
            // line 76
            echo "                    ";
            $context["likeLink"] = false;
            // line 77
            echo "                ";
        }
        // line 78
        echo "                <li class=\"sidebar_menu_item";
        if ((isset($context["isActive"]) ? $context["isActive"] : null)) {
            echo " active";
        }
        echo "\">";
        // line 79
        if ((!(isset($context["likeLink"]) ? $context["likeLink"] : null))) {
            // line 80
            echo "<span class=\"sidebar_menu_link\">Адреса доставки</span>";
        } else {
            // line 82
            echo "<a href=\"";
            echo $this->env->getExtension('routing')->getPath("application_sonata_user_contragent_index");
            echo "\" class=\"sidebar_menu_link\">Адреса доставки</a>";
        }
        // line 84
        echo "</li>
                
            </ul>
        </div>
    </aside>

";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Profile:left_menu.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  210 => 84,  205 => 82,  202 => 80,  200 => 79,  194 => 78,  191 => 77,  188 => 76,  185 => 75,  182 => 74,  179 => 73,  176 => 72,  173 => 71,  170 => 70,  168 => 69,  165 => 68,  160 => 66,  157 => 64,  155 => 63,  150 => 62,  144 => 58,  133 => 56,  124 => 54,  122 => 53,  120 => 52,  116 => 51,  113 => 49,  108 => 47,  105 => 45,  103 => 43,  101 => 42,  98 => 41,  96 => 40,  93 => 38,  88 => 36,  85 => 34,  83 => 32,  81 => 31,  78 => 30,  76 => 29,  73 => 27,  62 => 25,  53 => 23,  51 => 20,  49 => 19,  46 => 18,  44 => 16,  42 => 15,  39 => 14,  37 => 13,  32 => 10,  26 => 9,  23 => 8,  20 => 1,);
    }
}
