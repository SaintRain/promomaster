<?php

/* CoreStatisticsBundle:Admin/Crud:stockStatistics.html.twig */
class __TwigTemplate_49208750cf1b18f6a223be2d59f3e91a20d57e9a5255f56e5132f5a06c73cd2f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("CoreStatisticsBundle:Admin/Crud:default.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

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
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "byCategories", array()));
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
        $context["c"] = $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "byCategoriesAll", array());
        // line 48
        echo "            <tr>
                <td style=\"text-align:right\"><b>Итого</b></td>
                <td class=\"success\"><b>";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["c"]) ? $context["c"] : null), "free_quantity_sum", array())), "html", null, true);
        echo "</b></td>
                <td class=\"success\"><b>";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["c"]) ? $context["c"] : null), "free_quantity", array()), "html", null, true);
        echo "</b></td>
                <td class=\"error\"><b>";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["c"]) ? $context["c"] : null), "paid_quantity_sum", array())), "html", null, true);
        echo "</b></td>
                <td class=\"error\"><b>";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["c"]) ? $context["c"] : null), "paid_quantity", array()), "html", null, true);
        echo "</b></td>
                <td class=\"info\"><b>";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["c"]) ? $context["c"] : null), "booking_quantity_sum", array())), "html", null, true);
        echo "</b></td>
                <td class=\"info\"><b>";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["c"]) ? $context["c"] : null), "booking_quantity", array()), "html", null, true);
        echo "</b></td>
                <td class=\"warning\"><b>";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["c"]) ? $context["c"] : null), "supply_quantity_sum", array())), "html", null, true);
        echo "</b></td>
                <td class=\"warning\"><b>";
        // line 57
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["c"]) ? $context["c"] : null), "supply_quantity", array()), "html", null, true);
        echo "</b></td>
                <td>";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["c"]) ? $context["c"] : null), "total_quantity_sum", array())), "html", null, true);
        echo "</b></td>
                <td>";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["c"]) ? $context["c"] : null), "total_quantity", array()), "html", null, true);
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
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "byManufacturers", array()));
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
        $context["c"] = $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "byManufacturersAll", array());
        // line 108
        echo "                <tr>
                    <td style=\"text-align:right\"><b>Итого</b></td>
                    <td class=\"success\"><b>";
        // line 110
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["c"]) ? $context["c"] : null), "free_quantity_sum", array())), "html", null, true);
        echo "</b></td>
                    <td class=\"success\"><b>";
        // line 111
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["c"]) ? $context["c"] : null), "free_quantity", array()), "html", null, true);
        echo "</b></td>
                    <td class=\"error\"><b>";
        // line 112
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["c"]) ? $context["c"] : null), "paid_quantity_sum", array())), "html", null, true);
        echo "</b></td>
                    <td class=\"error\"><b>";
        // line 113
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["c"]) ? $context["c"] : null), "paid_quantity", array()), "html", null, true);
        echo "</b></td>
                    <td class=\"info\"><b>";
        // line 114
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["c"]) ? $context["c"] : null), "booking_quantity_sum", array())), "html", null, true);
        echo "</b></td>
                    <td class=\"info\"><b>";
        // line 115
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["c"]) ? $context["c"] : null), "booking_quantity", array()), "html", null, true);
        echo "</b></td>
                    <td class=\"warning\"><b>";
        // line 116
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["c"]) ? $context["c"] : null), "supply_quantity_sum", array())), "html", null, true);
        echo "</b></td>
                    <td class=\"warning\"><b>";
        // line 117
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["c"]) ? $context["c"] : null), "supply_quantity", array()), "html", null, true);
        echo "</b></td>
                    <td>";
        // line 118
        echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->moneyFormatFunction($this->getAttribute((isset($context["c"]) ? $context["c"] : null), "total_quantity_sum", array())), "html", null, true);
        echo "</b></td>
                    <td>";
        // line 119
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["c"]) ? $context["c"] : null), "total_quantity", array()), "html", null, true);
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
        return array (  340 => 119,  336 => 118,  332 => 117,  328 => 116,  324 => 115,  320 => 114,  316 => 113,  312 => 112,  308 => 111,  304 => 110,  300 => 108,  297 => 107,  288 => 104,  284 => 103,  280 => 102,  276 => 101,  272 => 100,  268 => 99,  264 => 98,  260 => 97,  256 => 96,  252 => 95,  246 => 94,  243 => 93,  239 => 92,  231 => 87,  226 => 85,  221 => 83,  216 => 81,  211 => 79,  197 => 67,  187 => 59,  183 => 58,  179 => 57,  175 => 56,  171 => 55,  167 => 54,  163 => 53,  159 => 52,  155 => 51,  151 => 50,  147 => 48,  144 => 47,  135 => 44,  131 => 43,  127 => 42,  123 => 41,  119 => 40,  115 => 39,  111 => 38,  107 => 37,  103 => 36,  99 => 35,  93 => 34,  90 => 33,  86 => 32,  78 => 27,  73 => 25,  68 => 23,  63 => 21,  58 => 19,  44 => 7,  39 => 3,  36 => 2,  11 => 1,);
    }
}
