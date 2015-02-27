<?php

/* CoreOrderBundle:Order/Block:payment_system_switcher.html.twig */
class __TwigTemplate_2e66da98112b85b9b34644fa9afb4cb8be26d850432300fe7d40f64ce42b74c1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'payment_system_switcher' => array($this, 'block_payment_system_switcher'),
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
        $this->displayBlock('payment_system_switcher', $context, $blocks);
    }

    public function block_payment_system_switcher($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        ob_start();
        // line 11
        echo "
        ";
        // line 12
        if (array_key_exists("paymentSytems", $context)) {
            // line 13
            echo "
            ";
            // line 14
            $context["ps"] = (isset($context["paymentSytems"]) ? $context["paymentSytems"] : $this->getContext($context, "paymentSytems"));
            // line 15
            echo "            ";
            $context["orderCost"] = ((array_key_exists("data", $context)) ? ($this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "orderCostInfo", array()), "total_cost", array())) : (((array_key_exists("orderCostInfo", $context)) ? ($this->getAttribute((isset($context["orderCostInfo"]) ? $context["orderCostInfo"] : $this->getContext($context, "orderCostInfo")), "total_cost", array())) : (0))));
            // line 16
            echo "
            <ul class=\"order_payment_group group_switcher\">

                ";
            // line 19
            if ((($this->getAttribute($this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "PlasticCard", array(), "array"), "isEnabled", array()) || ($this->getAttribute($this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "PlasticCardTerminal", array(), "array"), "isEnabled", array()) && (isset($context["isSupplyPlacticCard"]) ? $context["isSupplyPlacticCard"] : $this->getContext($context, "isSupplyPlacticCard")))) && ((isset($context["orderCost"]) ? $context["orderCost"] : $this->getContext($context, "orderCost")) >= 1))) {
                // line 20
                echo "
                    <li class=\"group_switch no-bg\" data-tab=\"1\"";
                // line 21
                if ((!(isset($context["isSupplyPlacticCard"]) ? $context["isSupplyPlacticCard"] : $this->getContext($context, "isSupplyPlacticCard")))) {
                    echo " data-val=\"PlasticCard\"";
                }
                echo ">
                        <span class=\"group_switch_icon\"><span class=\"payment_PlasticCard payment_icon\">&nbsp;</span>";
                // line 22
                echo "</span>
                        <span class=\"group_switch_text\">Пластиковая карта</span>
                    </li>

                ";
            }
            // line 27
            echo "
                ";
            // line 28
            if ((($this->getAttribute($this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "WebMoney", array(), "array"), "isEnabled", array()) || $this->getAttribute($this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "YandexMoney", array(), "array"), "isEnabled", array())) && ((isset($context["orderCost"]) ? $context["orderCost"] : $this->getContext($context, "orderCost")) >= 1))) {
                // line 29
                echo "
                    <li class=\"group_switch\" data-tab=\"2\">
                        <span class=\"group_switch_icon\"><span class=\"payment_WebMoney_small payment_icon\">&nbsp;</span><span class=\"payment_YandexMoney_small payment_icon\">&nbsp;</span></span>
                        <span class=\"group_switch_text\">Платежная система</span>
                    </li>

                ";
            }
            // line 36
            echo "
                ";
            // line 37
            if ($this->getAttribute($this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "Qiwi", array(), "array"), "isEnabled", array())) {
                // line 38
                echo "
                    <li class=\"group_switch no-bg\" data-tab=\"3\" data-val=\"Qiwi\">
                        <span class=\"group_switch_icon\"><span class=\"payment_Qiwi payment_icon\">&nbsp;</span></span>
                        <span class=\"group_switch_text\">QIWI</span>
                    </li>

                ";
            }
            // line 45
            echo "
                ";
            // line 46
            if (($this->getAttribute($this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "BankTransfer", array(), "array"), "isEnabled", array()) || $this->getAttribute($this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "AlfaBank", array(), "array"), "isEnabled", array()))) {
                // line 47
                echo "
                    <li class=\"group_switch\" data-tab=\"4\">
                        <span class=\"group_switch_icon\"><span class=\"payment_BankTransfer_small payment_icon\">&nbsp;</span><span class=\"payment_AlfaBank_small payment_icon\">&nbsp;</span></span>
                        <span class=\"group_switch_text\">Банковский платеж</span>
                    </li>

                ";
            }
            // line 54
            echo "
                ";
            // line 55
            if (($this->getAttribute($this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "Megafon", array(), "array"), "isEnabled", array()) || $this->getAttribute($this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "Beeline", array(), "array"), "isEnabled", array()))) {
                // line 56
                echo "
                    <li class=\"group_switch\" data-tab=\"5\">
                        <span class=\"group_switch_icon\"><span class=\"payment_Megafon_small payment_icon\">&nbsp;</span><span class=\"payment_Beeline_small payment_icon\">&nbsp;</span></span>
                        <span class=\"group_switch_text\">Мобильный телефон</span>
                    </li>

                ";
            }
            // line 63
            echo "
                ";
            // line 64
            if ($this->getAttribute($this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "PayPal", array(), "array"), "isEnabled", array())) {
                // line 65
                echo "
                    <li class=\"group_switch\" data-tab=\"6\" data-val=\"PayPal\">
                        <span class=\"group_switch_icon\"><span class=\"payment_PayPal_small payment_icon\">&nbsp;</span></span>
                        <span class=\"group_switch_text\">PayPal</span>
                    </li>

                ";
            }
            // line 72
            echo "
            </ul>
            <div class=\"order_payment_type type_switcher brown_gradient_box\">

                ";
            // line 76
            if (((isset($context["isSupplyPlacticCard"]) ? $context["isSupplyPlacticCard"] : $this->getContext($context, "isSupplyPlacticCard")) && ((isset($context["orderCost"]) ? $context["orderCost"] : $this->getContext($context, "orderCost")) >= 1))) {
                // line 77
                echo "
                    <ul class=\"type_switches\" data-content=\"1\">
                        <li><span style=\"margin-right: 67px;\">";
                // line 79
                if ($this->getAttribute($this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "PlasticCard", array(), "array"), "isEnabled", array())) {
                    echo "На сайте";
                }
                if (($this->getAttribute($this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "PlasticCard", array(), "array"), "isEnabled", array()) && $this->getAttribute($this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "PlasticCardTerminal", array(), "array"), "isEnabled", array()))) {
                    echo "</span> <span>";
                }
                if ($this->getAttribute($this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "PlasticCardTerminal", array(), "array"), "isEnabled", array())) {
                    echo "В пункте выдачи";
                }
                echo "</span></li>
                        ";
                // line 80
                if ($this->getAttribute($this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "PlasticCard", array(), "array"), "isEnabled", array())) {
                    echo "<li class=\"type_switch no-bg\" data-val=\"PlasticCard\"><span class=\"payment_PlasticCard payment_icon type_switch_icon\">VISA / Master Card (онлайн)</span></li>";
                }
                // line 81
                echo "                        ";
                if ($this->getAttribute($this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "PlasticCardTerminal", array(), "array"), "isEnabled", array())) {
                    echo "<li class=\"type_switch no-bg\" data-val=\"PlasticCardTerminal\"><span class=\"payment_PlasticCard payment_icon type_switch_icon\">VISA / Master Card (терминал)</span></li>";
                }
                // line 82
                echo "                    </ul>

                ";
            }
            // line 85
            echo "
                ";
            // line 86
            if (((isset($context["orderCost"]) ? $context["orderCost"] : $this->getContext($context, "orderCost")) >= 1)) {
                // line 87
                echo "
                    <ul class=\"type_switches\" data-content=\"2\">
                        ";
                // line 89
                if ($this->getAttribute($this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "WebMoney", array(), "array"), "isEnabled", array())) {
                    echo "<li class=\"type_switch no-bg\" data-val=\"WebMoney\"><span class=\"payment_WebMoney payment_icon type_switch_icon\">WebMoney</span></li>";
                }
                // line 90
                echo "                        ";
                if ($this->getAttribute($this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "YandexMoney", array(), "array"), "isEnabled", array())) {
                    echo "<li class=\"type_switch no-bg\" data-val=\"YandexMoney\"><span class=\"payment_YandexMoney payment_icon type_switch_icon\">Яндекс.Деньги</span></li>";
                }
                // line 91
                echo "                    </ul>

                ";
            }
            // line 94
            echo "
                <ul class=\"type_switches\" data-content=\"4\">
                    ";
            // line 96
            if ($this->getAttribute($this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "BankTransfer", array(), "array"), "isEnabled", array())) {
                echo "<li class=\"type_switch no-bg\" data-val=\"BankTransfer\"><span class=\"payment_BankTransfer payment_icon type_switch_icon\">Сбербанк</span></li>";
            }
            // line 97
            echo "                    ";
            if ($this->getAttribute($this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "AlfaBank", array(), "array"), "isEnabled", array())) {
                echo "<li class=\"type_switch no-bg\" data-val=\"AlfaBank\"><span class=\"payment_AlfaBank payment_icon type_switch_icon\">Альфа-банк</span></li>";
            }
            // line 98
            echo "                </ul>
                <ul class=\"type_switches\" data-content=\"5\">
                    ";
            // line 100
            if ($this->getAttribute($this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "Megafon", array(), "array"), "isEnabled", array())) {
                echo "<li class=\"type_switch no-bg\" data-val=\"Megafon\"><span class=\"payment_Megafon payment_icon type_switch_icon\">Мегафон</span></li>";
            }
            // line 101
            echo "                    ";
            if ($this->getAttribute($this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "Beeline", array(), "array"), "isEnabled", array())) {
                echo "<li class=\"type_switch no-bg\" data-val=\"Beeline\"><span class=\"payment_Beeline payment_icon type_switch_icon\">Билайн</span></li>";
            }
            // line 102
            echo "                </ul>
            </div>

        ";
        } else {
            // line 106
            echo "
            Платежные системы не были получены!

        ";
        }
        // line 110
        echo "
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Order/Block:payment_system_switcher.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  240 => 110,  234 => 106,  228 => 102,  223 => 101,  219 => 100,  215 => 98,  210 => 97,  206 => 96,  202 => 94,  197 => 91,  192 => 90,  188 => 89,  184 => 87,  182 => 86,  179 => 85,  174 => 82,  169 => 81,  165 => 80,  153 => 79,  149 => 77,  147 => 76,  141 => 72,  132 => 65,  130 => 64,  127 => 63,  118 => 56,  116 => 55,  113 => 54,  104 => 47,  102 => 46,  99 => 45,  90 => 38,  88 => 37,  85 => 36,  76 => 29,  74 => 28,  71 => 27,  64 => 22,  58 => 21,  55 => 20,  53 => 19,  48 => 16,  45 => 15,  43 => 14,  40 => 13,  38 => 12,  35 => 11,  32 => 10,  26 => 9,  23 => 8,  20 => 1,);
    }
}
