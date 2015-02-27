<?php

/* CoreCommonBundle:Fragments:userMenu.html.twig */
class __TwigTemplate_540c81c3eab874e9609d71f6d896bb9a979785d4eab11538ef2652d0adcb07c1 extends Twig_Template
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
        echo "<!--noindex-->
<div class=\"header_useraccount";
        // line 2
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
            echo " menu";
        }
        echo "\">
    ";
        // line 3
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
            // line 4
            echo "        ";
            $context["orderCountNotification"] = $this->env->getExtension('notification_extension')->getOrderNotificationFunction();
            // line 5
            echo "        ";
            $context["totalCountNotification"] = (isset($context["orderCountNotification"]) ? $context["orderCountNotification"] : null);
            // line 6
            echo "        ";
            $context["ticketsNotification"] = $this->env->getExtension('notification_extension')->getTicketsNotification();
            // line 7
            echo "            <strong class=\"header_useraccount_name\">";
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "firstname", array()) || $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "lastname", array()))) {
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "lastname", array()) . " ") . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "firstname", array())), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "username", array()), "html", null, true);
            }
            echo "</strong>
            <a rel=\"nofollow\" class=\"header_useraccount_dropdown_tgl text_tgl\" href=\"\">Личный кабинет</a>";
            // line 8
            if (((isset($context["totalCountNotification"]) ? $context["totalCountNotification"] : null) > 0)) {
                echo "&nbsp;<span class=\"notice_indicator\">";
                echo twig_escape_filter($this->env, (isset($context["totalCountNotification"]) ? $context["totalCountNotification"] : null), "html", null, true);
                echo "</span>";
            }
            // line 9
            echo "            <div class=\"header_useraccount_dropdown dropdown\">
                <div class=\"header_useraccount_dropdown_header\">
                    <strong class=\"header_useraccount_name\">";
            // line 11
            if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "firstname", array()) || $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "lastname", array()))) {
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "lastname", array()) . " ") . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "firstname", array())), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "username", array()), "html", null, true);
            }
            echo "</strong>
                    <a rel=\"nofollow\" class=\"header_useraccount_dropdown_tgl text_tgl\" href=\"";
            // line 12
            echo $this->env->getExtension('routing')->getPath("sonata_user_profile_show");
            echo "\">Личный кабинет</a>
                </div>
                ";
            // line 14
            if ((isset($context["contragent"]) ? $context["contragent"] : null)) {
                // line 15
                echo "                    <ul class=\"first\">
                        <li class=\"pad\">";
                // line 17
                if ($this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "legalForm", array(), "any", true, true)) {
                    // line 18
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "organization", array()), "html", null, true);
                } else {
                    // line 20
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "lastName", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "firstName", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "surName", array()), "html", null, true);
                }
                // line 22
                echo "</li>
                        <li class=\"pad\">Баланс: ";
                // line 23
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->env->getExtension('payment_extension')->getBalanceFunction($this->getAttribute((isset($context["contragent"]) ? $context["contragent"] : null), "id", array()))), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                echo "</li>";
                // line 24
                if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "contragents", array()), "count", array()) > 1)) {
                    // line 25
                    echo "<li>
                                <a rel=\"nofollow\" class=\"btn-change-contragent with-url\" ";
                    // line 26
                    echo " data-url=\"";
                    echo $this->env->getExtension('routing')->getPath("application_sonata_user_get_user_contragents");
                    echo "\">Сменить контрагента</a>
                            </li>";
                }
                // line 29
                echo "</ul>
                ";
            }
            // line 31
            echo "
                <ul";
            // line 32
            if ((!(isset($context["contragent"]) ? $context["contragent"] : null))) {
                echo " class=\"first\"";
            }
            echo ">
                    <li>
                        <a rel=\"nofollow\" href=\"";
            // line 34
            echo $this->env->getExtension('routing')->getPath("application_sonata_user_profile_orders_history_list_first_page");
            echo "\">Мои заказы</a>";
            if (((isset($context["orderCountNotification"]) ? $context["orderCountNotification"] : null) > 0)) {
                echo "<span title=\"Количество неоплаченных заказов\" class=\"notice_indicator\">";
                echo twig_escape_filter($this->env, (isset($context["orderCountNotification"]) ? $context["orderCountNotification"] : null), "html", null, true);
                echo "</span>";
            }
            // line 35
            echo "                    </li>
                    <li>
                        <a rel=\"nofollow\" rel=\"nofollow\" href=\"";
            // line 37
            echo $this->env->getExtension('routing')->getPath("application_sonata_user_profile_products_favorites_first_page", array("_format" => "html"));
            echo "\">Избранные товары</a>
                    </li>
                    <li>
                        <a rel=\"nofollow\" href=\"";
            // line 40
            echo $this->env->getExtension('routing')->getPath("application_sonata_user_profile_products_history_first_page", array("_format" => "html"));
            echo "\">Просмотренные товары</a>
                    </li>
                    <li>
                        <a rel=\"nofollow\" href=\"";
            // line 43
            echo $this->env->getExtension('routing')->getPath("trouble_ticket_index_auth");
            echo "\">Мои обращения</a>";
            if ((isset($context["ticketsNotification"]) ? $context["ticketsNotification"] : null)) {
                echo "<span class=\"notice_indicator\">";
                echo twig_escape_filter($this->env, (isset($context["ticketsNotification"]) ? $context["ticketsNotification"] : null), "html", null, true);
                echo "</span>";
            }
            // line 44
            echo "                    </li>
                </ul>
                <ul>
                    <li>
                        <a rel=\"nofollow\" href=\"";
            // line 48
            echo $this->env->getExtension('routing')->getPath("sonata_user_profile_show");
            echo "\">Персональная информация</a>
                    </li>
                    <li>
                        <a rel=\"nofollow\" href=\"";
            // line 51
            echo $this->env->getExtension('routing')->getPath("application_sonata_user_contragent_index");
            echo "\">Адреса доставки</a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a rel=\"nofollow\" href=\"";
            // line 56
            echo $this->env->getExtension('routing')->getPath("_logout");
            echo "\">Выйти</a>
                    </li>
                </ul>
            </div>
        ";
        } else {
            // line 61
            echo "            <a rel=\"nofollow\" href=\"";
            echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
            echo "\" class=\"header_useraccount_login text_tgl\">Вход</a>
            <a rel=\"nofollow\" href=\"";
            // line 62
            echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
            echo "\" class=\"text_tgl\">Регистрация</a>
    ";
        }
        // line 64
        echo "</div>
<!--/noindex-->";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Fragments:userMenu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  191 => 64,  186 => 62,  181 => 61,  173 => 56,  165 => 51,  159 => 48,  153 => 44,  145 => 43,  139 => 40,  133 => 37,  129 => 35,  121 => 34,  114 => 32,  111 => 31,  107 => 29,  101 => 26,  98 => 25,  96 => 24,  91 => 23,  88 => 22,  81 => 20,  78 => 18,  76 => 17,  73 => 15,  71 => 14,  66 => 12,  58 => 11,  54 => 9,  48 => 8,  39 => 7,  36 => 6,  33 => 5,  30 => 4,  28 => 3,  22 => 2,  19 => 1,);
    }
}
