<?php

/* CoreStatisticsBundle:Admin/Crud:stockStatistics.html.twig */
class __TwigTemplate_fca82a81e8fe594ee84ec65192db5d5120f078d03616a278ec1067f5697facd2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CoreStatisticsBundle:Admin/Crud:default.html.twig");

        $this->blocks = array(
            'statisticsContent' => array($this, 'block_statisticsContent'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CoreStatisticsBundle:Admin/Crud:default.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_statisticsContent($context, array $blocks = array())
    {
        // line 3
        echo "
<p>В колонке \"Свободный\" не учтёны виртуальные позиции. В остальных колонках могут присутствовать как креальные так и виртуальные позиции.</p>

";
        // line 7
        echo "<table class=\"table table-bordered table-hover\" style=\"width:100%\">
    <thead>
        <tr>
            <th style=\"width:30%\" rowspan=\"2\">По категориям</th>
            <th colspan=\"2\">Свободный</th>
            <th colspan=\"2\">Опл., неотпр.</th>
            <th colspan=\"2\">Бронь</th>
            <th colspan=\"2\">В пути</th>
            <th colspan=\"2\">Всего</th>
        </tr>

        <tr>
            <th>";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</th>
            <th>шт.</th>
            <th>";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</th>
            <th>шт.</th>
            <th>";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</th>
            <th>шт.</th>
            <th>";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</th>
            <th>шт.</th>
            <th>";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</th>
            <th>шт.</th>            
        </tr>
    </thead>
    <tbody>
    ";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "byCategories", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            // line 33
            echo "            <tr>
                <td><a href=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_category_productcategory_edit", array("id" => $this->getAttribute($this->getAttribute($context["c"], "category", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["c"], "category", array()), "captionRu", array()), "html", null, true);
            echo "</a></td>
                <td class=\"success\">";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["c"], "free", array()), "quantity_sum", array())), "html", null, true);
            echo "</td>
                <td class=\"success\">";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["c"], "free", array()), "quantity", array()), "html", null, true);
            echo "</td>
                <td class=\"error\">";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["c"], "paidNotShipped", array()), "quantity_sum", array())), "html", null, true);
            echo "</td>
                <td class=\"error\">";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["c"], "paidNotShipped", array()), "quantity", array()), "html", null, true);
            echo "</td>
                <td class=\"info\">";
            // line 39
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["c"], "booking", array()), "quantity_sum", array())), "html", null, true);
            echo "</td>
                <td class=\"info\">";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["c"], "booking", array()), "quantity", array()), "html", null, true);
            echo "</td>
                <td class=\"warning\">";
            // line 41
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["c"], "supply", array()), "quantity_sum", array())), "html", null, true);
            echo "</td>
                <td class=\"warning\">";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["c"], "supply", array()), "quantity", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 43
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["c"], "total", array()), "quantity_sum", array())), "html", null, true);
            echo "</td>
                <td>";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["c"], "total", array()), "quantity", array()), "html", null, true);
            echo "</td>
            </tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "            ";
        $context["c"] = $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "byCategoriesAll", array());
        // line 48
        echo "            <tr>
                <td style=\"text-align:right\"><b>Итого</b></td>
                <td class=\"success\"><b>";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["c"]) ? $context["c"] : $this->getContext($context, "c")), "free_quantity_sum", array())), "html", null, true);
        echo "</b></td>
                <td class=\"success\"><b>";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["c"]) ? $context["c"] : $this->getContext($context, "c")), "free_quantity", array()), "html", null, true);
        echo "</b></td>
                <td class=\"error\"><b>";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["c"]) ? $context["c"] : $this->getContext($context, "c")), "paid_quantity_sum", array())), "html", null, true);
        echo "</b></td>
                <td class=\"error\"><b>";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["c"]) ? $context["c"] : $this->getContext($context, "c")), "paid_quantity", array()), "html", null, true);
        echo "</b></td>
                <td class=\"info\"><b>";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["c"]) ? $context["c"] : $this->getContext($context, "c")), "booking_quantity_sum", array())), "html", null, true);
        echo "</b></td>
                <td class=\"info\"><b>";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["c"]) ? $context["c"] : $this->getContext($context, "c")), "booking_quantity", array()), "html", null, true);
        echo "</b></td>
                <td class=\"warning\"><b>";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["c"]) ? $context["c"] : $this->getContext($context, "c")), "supply_quantity_sum", array())), "html", null, true);
        echo "</b></td>
                <td class=\"warning\"><b>";
        // line 57
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["c"]) ? $context["c"] : $this->getContext($context, "c")), "supply_quantity", array()), "html", null, true);
        echo "</b></td>
                <td>";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["c"]) ? $context["c"] : $this->getContext($context, "c")), "total_quantity_sum", array())), "html", null, true);
        echo "</b></td>
                <td>";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["c"]) ? $context["c"] : $this->getContext($context, "c")), "total_quantity", array()), "html", null, true);
        echo "</td>
            </tr>
        </tbody>
    </table>



";
        // line 67
        echo "    <table class=\"table table-bordered table-hover\" style=\"width:100%;\">
        <thead>
            <tr>
                <th style=\"width:30%\" rowspan=\"2\">По производителям</th>
                <th colspan=\"2\">Свободный</th>
                <th colspan=\"2\">Опл., неотпр.</th>
                <th colspan=\"2\">Бронь</th>
                <th colspan=\"2\">В пути</th>
                <th colspan=\"2\">Всего</th>
            </tr>

            <tr>
                <th>";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</th>
                <th>шт.</th>
                <th>";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</th>
                <th>шт.</th>
                <th>";
        // line 83
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</th>
                <th>шт.</th>
                <th>";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</th>
                <th>шт.</th>
                <th>";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
        echo "</th>
                <th>шт.</th>
            </tr>
        </thead>
        <tbody>
    ";
        // line 92
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "byManufacturers", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            // line 93
            echo "                <tr>
                    <td><a href=\"";
            // line 94
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_manufacturer_manufacturer_edit", array("id" => $this->getAttribute($this->getAttribute($context["c"], "manufacturer", array()), "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["c"], "manufacturer", array()), "captionRu", array()), "html", null, true);
            echo "</a></td>
                    <td class=\"success\">";
            // line 95
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["c"], "free", array()), "quantity_sum", array())), "html", null, true);
            echo "</td>
                    <td class=\"success\">";
            // line 96
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["c"], "free", array()), "quantity", array()), "html", null, true);
            echo "</td>
                    <td class=\"error\">";
            // line 97
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["c"], "paidNotShipped", array()), "quantity_sum", array())), "html", null, true);
            echo "</td>
                    <td class=\"error\">";
            // line 98
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["c"], "paidNotShipped", array()), "quantity", array()), "html", null, true);
            echo "</td>
                    <td class=\"info\">";
            // line 99
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["c"], "booking", array()), "quantity_sum", array())), "html", null, true);
            echo "</td>
                    <td class=\"info\">";
            // line 100
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["c"], "booking", array()), "quantity", array()), "html", null, true);
            echo "</td>
                    <td class=\"warning\">";
            // line 101
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["c"], "supply", array()), "quantity_sum", array())), "html", null, true);
            echo "</td>
                    <td class=\"warning\">";
            // line 102
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["c"], "supply", array()), "quantity", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 103
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute($this->getAttribute($context["c"], "total", array()), "quantity_sum", array())), "html", null, true);
            echo "</td>
                    <td>";
            // line 104
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["c"], "total", array()), "quantity", array()), "html", null, true);
            echo "</td>
                </tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 107
        echo "            ";
        $context["c"] = $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "byManufacturersAll", array());
        // line 108
        echo "                <tr>
                    <td style=\"text-align:right\"><b>Итого</b></td>
                    <td class=\"success\"><b>";
        // line 110
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["c"]) ? $context["c"] : $this->getContext($context, "c")), "free_quantity_sum", array())), "html", null, true);
        echo "</b></td>
                    <td class=\"success\"><b>";
        // line 111
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["c"]) ? $context["c"] : $this->getContext($context, "c")), "free_quantity", array()), "html", null, true);
        echo "</b></td>
                    <td class=\"error\"><b>";
        // line 112
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["c"]) ? $context["c"] : $this->getContext($context, "c")), "paid_quantity_sum", array())), "html", null, true);
        echo "</b></td>
                    <td class=\"error\"><b>";
        // line 113
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["c"]) ? $context["c"] : $this->getContext($context, "c")), "paid_quantity", array()), "html", null, true);
        echo "</b></td>
                    <td class=\"info\"><b>";
        // line 114
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["c"]) ? $context["c"] : $this->getContext($context, "c")), "booking_quantity_sum", array())), "html", null, true);
        echo "</b></td>
                    <td class=\"info\"><b>";
        // line 115
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["c"]) ? $context["c"] : $this->getContext($context, "c")), "booking_quantity", array()), "html", null, true);
        echo "</b></td>
                    <td class=\"warning\"><b>";
        // line 116
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["c"]) ? $context["c"] : $this->getContext($context, "c")), "supply_quantity_sum", array())), "html", null, true);
        echo "</b></td>
                    <td class=\"warning\"><b>";
        // line 117
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["c"]) ? $context["c"] : $this->getContext($context, "c")), "supply_quantity", array()), "html", null, true);
        echo "</b></td>
                    <td>";
        // line 118
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["c"]) ? $context["c"] : $this->getContext($context, "c")), "total_quantity_sum", array())), "html", null, true);
        echo "</b></td>
                    <td>";
        // line 119
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["c"]) ? $context["c"] : $this->getContext($context, "c")), "total_quantity", array()), "html", null, true);
        echo "</td>
                </tr>
            </tbody>
        </table>
";
    }

    public function getTemplateName()
    {
        return "CoreStatisticsBundle:Admin/Crud:stockStatistics.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  332 => 119,  328 => 118,  324 => 117,  320 => 116,  316 => 115,  312 => 114,  308 => 113,  304 => 112,  300 => 111,  296 => 110,  292 => 108,  289 => 107,  280 => 104,  276 => 103,  272 => 102,  268 => 101,  264 => 100,  260 => 99,  256 => 98,  252 => 97,  248 => 96,  244 => 95,  238 => 94,  235 => 93,  231 => 92,  223 => 87,  218 => 85,  213 => 83,  208 => 81,  203 => 79,  189 => 67,  179 => 59,  175 => 58,  171 => 57,  167 => 56,  163 => 55,  159 => 54,  155 => 53,  151 => 52,  147 => 51,  143 => 50,  139 => 48,  136 => 47,  127 => 44,  123 => 43,  119 => 42,  115 => 41,  111 => 40,  107 => 39,  103 => 38,  99 => 37,  95 => 36,  91 => 35,  85 => 34,  82 => 33,  78 => 32,  70 => 27,  65 => 25,  60 => 23,  55 => 21,  50 => 19,  36 => 7,  31 => 3,  28 => 2,);
    }
}
