<?php

/* CoreOrderBundle:Admin/Batch/delliveryWaybills:delliveryWaybills.html.twig */
class __TwigTemplate_3becd67a70d3cc4f3bab4ca58182c2d1022e4252aa34641d5ce662da870ca3bd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["one_row_head"] = ('' === $tmp = "    <tr>
        <td class=\"head\">
            <b>Перевозчик</b>
        </td>
        <td class=\"head\">
            <b>Заказ</b>
        </td>
        <td class=\"head\">
            <b>Продавец</b>
        </td>
        <td class=\"head\">
            <b>Получатель</b>
        </td>
        <td class=\"head\">
            <b>Оплата доставки (р.)</b>
        </td>
        <td class=\"head\">
            <b>Сумма заказа (р.) </b>
        </td>
        <td class=\"head\">
            <b>Адрес доставки (выдачи) </b>
        </td>
        <td class=\"head\">
            <b>Контактный тел.</b>
        </td>
        <td class=\"head\">
            <b>Комментарии</b>
        </td>
    </tr>
") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 32
        echo "

";
        // line 34
        $this->displayBlock('content', $context, $blocks);
        // line 77
        echo "
";
    }

    // line 34
    public function block_content($context, array $blocks = array())
    {
        // line 35
        echo "
    <style type=\"text/css\" media=\"screen,print\">
        table {font-family:San-Serif,Verdana,Arial;font-size:11px;border:1px solid #000;border-bottom:0;border-right:0;border-collapse: collapse;background-color: #fff;margin:0px 0px 0px 0px;}
        table td, table th {border: 1px solid #000; border-left: 0; border-top: 0; padding: 3px;}        
        table thead th, table tfoot th,
        table thead td, table tfoot td {background-color:#eee;}
        table tbody td {background-color:#fff;}
        table tbody td.head {white-space:nowrap;background-color:#eee;}
    </style>

    <h3>Отправки на ";
        // line 45
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : null), "d-m-Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
        echo "</h3>
    <table border=\"0\" width=\"100%\" >        
        <tbody>
            ";
        // line 48
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "paid", array(), "any", true, true)) {
            // line 49
            echo "                <tr>
                    <th colspan=\"100%\" align=\"left\">
                        <b>Оплаченные заказы</b>
                    </th>
                </tr>
                ";
            // line 54
            echo twig_escape_filter($this->env, (isset($context["one_row_head"]) ? $context["one_row_head"] : null), "html", null, true);
            echo "
                ";
            // line 55
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "paid", array()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
                // line 56
                echo "                    ";
                echo twig_include($this->env, $context, "CoreOrderBundle:Admin/Batch/delliveryWaybills:one_row_for_body.html.twig");
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            echo "            ";
        }
        // line 59
        echo "
            ";
        // line 60
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "nalojka", array(), "any", true, true)) {
            // line 61
            echo "                <tr>
                    <th colspan=\"100%\" align=\"left\">
                        <b>Заказы с наложенным платежом</b>
                    </th>
                </tr>
                ";
            // line 66
            echo twig_escape_filter($this->env, (isset($context["one_row_head"]) ? $context["one_row_head"] : null), "html", null, true);
            echo "
                ";
            // line 67
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "nalojka", array()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
                // line 68
                echo "                    ";
                echo twig_include($this->env, $context, "CoreOrderBundle:Admin/Batch/delliveryWaybills:one_row_for_body.html.twig");
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 70
            echo "            ";
        }
        // line 71
        echo "        </tbody>
    </table>

    <h5>Всего заказов на доставке: ";
        // line 74
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "ordersTotal", array()), "html", null, true);
        echo " Сумма общих расходов на доставку: ";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "deliveryTotalCost", array())), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "
        Сумма расходов на доставку наличными: ";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "deliveryTotalNalojkaCost", array())), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</h5>
    ";
    }

    public function getTemplateName()
    {
        return "CoreOrderBundle:Admin/Batch/delliveryWaybills:delliveryWaybills.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  199 => 75,  191 => 74,  186 => 71,  183 => 70,  166 => 68,  149 => 67,  145 => 66,  138 => 61,  136 => 60,  133 => 59,  130 => 58,  113 => 56,  96 => 55,  92 => 54,  85 => 49,  83 => 48,  77 => 45,  65 => 35,  62 => 34,  57 => 77,  55 => 34,  51 => 32,  20 => 1,);
    }
}
