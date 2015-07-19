<?php

/* ApplicationSonataUserBundle:Admin/Form:balance_history_tbody.html.twig */
class __TwigTemplate_74e0061fd653f74ed62f8159f2daec5a8b5254baf088577e3c56edfa7cb095f1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'balance_history_tbody' => array($this, 'block_balance_history_tbody'),
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
        $this->displayBlock('balance_history_tbody', $context, $blocks);
    }

    public function block_balance_history_tbody($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        ob_start();
        // line 12
        if ((isset($context["balanceHistory"]) ? $context["balanceHistory"] : null)) {
            // line 14
            echo "<tbody id=\"table-export-to-csv\" class=\"table-highlight-on-hover\" data-csv-name=\"balance_history-";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d-m-Y_H-i-s", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            if (array_key_exists("object", $context)) {
                echo "-No";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "html", null, true);
            }
            echo ".csv\">

                <tr>
                    <td class=\"table-th\">Дата</td>
                    <td class=\"table-th\">Дебет</td>
                    <td class=\"table-th\">Кредит</td>
                    <td class=\"table-th\">Баланс</td>
                    <td class=\"table-th\">Описание</td>
                </tr>";
            // line 24
            $context["balance"] = 0;
            // line 25
            $context["dateShort"] = twig_capitalize_string_filter($this->env, $this->env->getExtension('common_extension')->getMonthWordFilter($this->getAttribute(twig_first($this->env, (isset($context["balanceHistory"]) ? $context["balanceHistory"] : null)), "date", array()), true));
            // line 26
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["balanceHistory"]) ? $context["balanceHistory"] : null));
            foreach ($context['_seq'] as $context["i"] => $context["item"]) {
                // line 28
                $context["dateShortTmp"] = twig_capitalize_string_filter($this->env, $this->env->getExtension('common_extension')->getMonthWordFilter($this->getAttribute($context["item"], "date", array()), true));
                // line 29
                if ((((isset($context["dateShort"]) ? $context["dateShort"] : null) != (isset($context["dateShortTmp"]) ? $context["dateShortTmp"] : null)) || ($context["i"] == 0))) {
                    // line 30
                    $context["dateShort"] = (isset($context["dateShortTmp"]) ? $context["dateShortTmp"] : null);
                    // line 32
                    echo "<tr>
                        <th colspan=\"5\" class=\"table-th\">";
                    // line 33
                    echo twig_escape_filter($this->env, (isset($context["dateShort"]) ? $context["dateShort"] : null), "html", null, true);
                    echo "</th>
                    </tr>";
                }
                // line 38
                echo "<tr>
                        <td>";
                // line 40
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "date", array()), "d.m.Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
                // line 41
                echo "</td>
                        <td align=\"right\" ";
                // line 42
                echo ">
                            <div class=\"text-right\">";
                // line 45
                if ( !$this->getAttribute($context["item"], "type", array())) {
                    // line 46
                    if ($this->getAttribute($context["item"], "amount", array())) {
                        echo "-";
                    }
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($context["item"], "amount", array())), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                    // line 47
                    $context["balance"] = ((isset($context["balance"]) ? $context["balance"] : null) - $this->getAttribute($context["item"], "amount", array()));
                }
                // line 50
                echo "</div>
                        </td>
                        <td align=\"right\" ";
                // line 52
                echo ">
                            <div class=\"text-right\">";
                // line 55
                if ($this->getAttribute($context["item"], "type", array())) {
                    // line 56
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($context["item"], "amount", array())), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                    // line 57
                    $context["balance"] = ((isset($context["balance"]) ? $context["balance"] : null) + $this->getAttribute($context["item"], "amount", array()));
                }
                // line 60
                echo "</div>
                        </td>
                        <td align=\"right\" class=\"";
                // line 62
                if (((isset($context["balance"]) ? $context["balance"] : null) < 0)) {
                    echo "error";
                } elseif (((isset($context["balance"]) ? $context["balance"] : null) > 0)) {
                    echo "success";
                }
                echo "\">
                            <div class=\"text-right\">";
                // line 65
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction((isset($context["balance"]) ? $context["balance"] : null)), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
                // line 67
                echo "</div>
                        </td>
                        <td>";
                // line 70
                echo nl2br($this->getAttribute($context["item"], "description", array()));
                // line 71
                echo "</td>
                    </tr>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['i'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            echo "<tr>
                    <td></td>
                    <td style=\"border-left: none;\"></td>
                    <td style=\"border-left: none;\"><div class=\"text-right\">Итого:</div></td>
                    <td class=\"";
            // line 80
            if (((isset($context["balance"]) ? $context["balance"] : null) < 0)) {
                echo "error";
            } elseif (((isset($context["balance"]) ? $context["balance"] : null) > 0)) {
                echo "success";
            }
            echo "\">
                        <div class=\"text-right\">
                            <span class=\"text-right\">";
            // line 84
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction((isset($context["balance"]) ? $context["balance"] : null)), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            // line 86
            echo "</span>
                        </div>
                    </td>
                    <td></td>
                </tr>

            </tbody>";
        } else {
            // line 96
            echo "Контрагент еще не совершал никаких операций!";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Admin/Form:balance_history_tbody.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  171 => 96,  162 => 86,  158 => 84,  149 => 80,  143 => 76,  136 => 71,  134 => 70,  130 => 67,  126 => 65,  118 => 62,  114 => 60,  111 => 57,  107 => 56,  105 => 55,  102 => 52,  98 => 50,  95 => 47,  88 => 46,  86 => 45,  83 => 42,  80 => 41,  78 => 40,  75 => 38,  70 => 33,  67 => 32,  65 => 30,  63 => 29,  61 => 28,  57 => 26,  55 => 25,  53 => 24,  37 => 14,  35 => 12,  32 => 10,  26 => 9,  23 => 8,  20 => 1,);
    }
}
