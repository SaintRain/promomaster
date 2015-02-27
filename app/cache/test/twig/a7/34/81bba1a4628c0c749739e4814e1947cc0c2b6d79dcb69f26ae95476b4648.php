<?php

/* ApplicationSonataBlockBundle:Block:block_statistics.html.twig */
class __TwigTemplate_a73481bba1a4628c0c749739e4814e1947cc0c2b6d79dcb69f26ae95476b4648 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'block' => array($this, 'block_block'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute($this->getAttribute((isset($context["sonata_block"]) ? $context["sonata_block"] : $this->getContext($context, "sonata_block")), "templates", array()), "block_base", array()));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 9
    public function block_block($context, array $blocks = array())
    {
        // line 10
        echo "    <table border=\"0\">
        <tr>
            <td style=\"width:77%\" nowrap valign=\"top\">
                <table style=\"width:100%;\">
                    <tr>
                        <td >
                            <table class=\"table table-bordered table-striped\" >
                                <thead>
                                    <tr><td  colspan=\"2\"><img src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/applicationsonatauser/admin/img/shopping-basket.png"), "html", null, true);
        echo "\"/> ЗАКАЗЫ</td></tr>
                                </thead>
                                <tbody>
                                    <tr><td style=\"width:70%\">Всего:</td>
                                        <td>";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["statistics"]) ? $context["statistics"] : $this->getContext($context, "statistics")), "generalOrdersStatistics", array()), "orders_total", array()), "html", null, true);
        echo "</td>
                                    </tr>
                                    <tr><td>Оплаченных:</td>
                                        <td>";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["statistics"]) ? $context["statistics"] : $this->getContext($context, "statistics")), "generalOrdersStatistics", array()), "orders_total_paid", array()), "html", null, true);
        echo "</td>
                                    </tr>

                                    <tr><td>Оплаченных за 7 дней:</td>
                                        <td>";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["statistics"]) ? $context["statistics"] : $this->getContext($context, "statistics")), "generalOrdersStatistics", array()), "orders_total_paid_by_period_7", array()), "html", null, true);
        echo "</td>
                                    </tr>

                                    <tr><td>Оплаченных за сутки:</td>
                                        <td>";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["statistics"]) ? $context["statistics"] : $this->getContext($context, "statistics")), "generalOrdersStatistics", array()), "orders_total_paid_by_period_1", array()), "html", null, true);
        echo "</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td >&nbsp;<td/>

                        <td>
                            <table class=\"table table-bordered table-striped \" >
                                <thead>
                                    <tr><td  colspan=\"2\"><img src=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/applicationsonatauser/admin/img/users.png"), "html", null, true);
        echo "\"/> ПОЛЬЗОВАТЕЛИ</td></tr>
                                </thead>
                                <tbody>
                                    <tr><td style=\"width:70%\">Всего:</td>
                                        <td>";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["statistics"]) ? $context["statistics"] : $this->getContext($context, "statistics")), "generalUserStatistics", array()), "users_total", array()), "html", null, true);
        echo "</td>
                                    </tr>
                                    <tr><td>За 7 дней:</td>
                                        <td>";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["statistics"]) ? $context["statistics"] : $this->getContext($context, "statistics")), "generalUserStatistics", array()), "users_total_period_7", array()), "html", null, true);
        echo "</td>
                                    </tr>
                                    <tr><td>За сутки:</td>
                                        <td>";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["statistics"]) ? $context["statistics"] : $this->getContext($context, "statistics")), "generalUserStatistics", array()), "users_total_period_1", array()), "html", null, true);
        echo "</td>
                                    </tr>
                                    <tr><td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td>&nbsp;<td/>
                        <td>
                            <table class=\"table table-bordered table-striped \">
                                <thead>
                                    <tr><td colspan=\"2\"><img src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/applicationsonatauser/admin/img/user--exclamation.png"), "html", null, true);
        echo "\"/> ОБРАЩЕНИЯ</td></tr>
                                </thead>
                                <tbody>
                                    <tr><td style=\"width:70%\">Всего:</td>
                                        <td>";
        // line 69
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["statistics"]) ? $context["statistics"] : $this->getContext($context, "statistics")), "generalTroubleTicketStatistics", array()), "troubletickets_total", array()), "html", null, true);
        echo "</td>
                                    </tr>
                                    <tr><td>Закрыто:</td>
                                        <td>";
        // line 72
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["statistics"]) ? $context["statistics"] : $this->getContext($context, "statistics")), "generalTroubleTicketStatistics", array()), "troubletickets_total_closed", array()), "html", null, true);
        echo "</td>
                                    </tr>
                                    <tr><td>За 7 дней:</td>
                                        <td>";
        // line 75
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["statistics"]) ? $context["statistics"] : $this->getContext($context, "statistics")), "generalTroubleTicketStatistics", array()), "troubletickets_total_by_period_7", array()), "html", null, true);
        echo "</td>
                                    </tr>
                                    <tr><td>За сутки:</td>
                                        <td>";
        // line 78
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["statistics"]) ? $context["statistics"] : $this->getContext($context, "statistics")), "generalTroubleTicketStatistics", array()), "troubletickets_total_by_period_1", array()), "html", null, true);
        echo "</td>
                                    </tr>

                                </tbody>
                            </table>
                        </td>
                        <td>&nbsp;<td/>
                        <td>
                            <table class=\"table table-bordered table-striped \" >
                                <thead>
                                    <tr><td colspan=\"2\"><img src=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/applicationsonatauser/admin/img/money.png"), "html", null, true);
        echo "\"/> ТРАНЗАКЦИИ</td></tr>
                                </thead>
                                <tbody>
                                    <tr><td style=\"width:70%\">Всего:</td>
                                        <td>";
        // line 92
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["statistics"]) ? $context["statistics"] : $this->getContext($context, "statistics")), "generalPaymentStatistics", array()), "payment_total", array()), "html", null, true);
        echo "</td>
                                    </tr>
                                    <tr><td>Всего исполнено:</td>
                                        <td>";
        // line 95
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["statistics"]) ? $context["statistics"] : $this->getContext($context, "statistics")), "generalPaymentStatistics", array()), "payment_total_passed", array()), "html", null, true);
        echo "</td>
                                    </tr>
                                    <tr><td>За 7 дней:</td>
                                        <td>";
        // line 98
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["statistics"]) ? $context["statistics"] : $this->getContext($context, "statistics")), "generalPaymentStatistics", array()), "payment_total_by_period_7", array()), "html", null, true);
        echo "</td>
                                    </tr>
                                    <tr><td>За сутки:</td>
                                        <td>";
        // line 101
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["statistics"]) ? $context["statistics"] : $this->getContext($context, "statistics")), "generalPaymentStatistics", array()), "payment_total_by_period_1", array()), "html", null, true);
        echo "</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>

                <table class=\"table table-bordered\">
                    <tr><td>
                            <div  id=\"container\" style=\"height: 500px; width:100%;\"></div>
                        </td></tr>
                </table>
            </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td style=\"width:23%\" valign=\"top\">
                <table class=\"table table-bordered\" >
                    <thead>
                        <tr><td><b>Название</b></td><td><b>Состояние системы</b></td></tr>
                    </thead>
                    <tbody>
                        <tr class=\"success\">
                            <td>Текущее время (";
        // line 123
        echo twig_escape_filter($this->env, (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone")), "html", null, true);
        echo ")</td>
                            <td>";
        // line 124
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d.m.Y H:i", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
        echo "</td>
                        </tr>
                        ";
        // line 126
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["statistics"]) ? $context["statistics"] : $this->getContext($context, "statistics")), "healthOfSystem", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["h"]) {
            // line 127
            echo "                            <tr class=\"";
            if (($this->getAttribute($context["h"], "status", array()) == 0)) {
                echo "success";
            }
            if (($this->getAttribute($context["h"], "status", array()) == 1)) {
                echo "warning";
            }
            if (($this->getAttribute($context["h"], "status", array()) == 3)) {
                echo "error";
            }
            echo "\"><td nowrap>
                                    <i class=\"";
            // line 128
            if (($this->getAttribute($context["h"], "status", array()) == 0)) {
                echo "icon-ok-sign";
            }
            if (($this->getAttribute($context["h"], "status", array()) == 1)) {
                echo "icon-warning-sign";
            }
            if (($this->getAttribute($context["h"], "status", array()) == 3)) {
                echo "icon-fire";
            }
            echo "\" data-bindattr-4=\"4\"></i>
                                    ";
            // line 129
            echo twig_escape_filter($this->env, $this->getAttribute($context["h"], "label", array()), "html", null, true);
            echo "</td><td>";
            if ($this->getAttribute($context["h"], "message", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute($context["h"], "message", array()), "html", null, true);
            } else {
                echo "Ok";
            }
            echo "</td></tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['h'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 131
        echo "                    </tbody>
                </table>
                    <p>Для проверки состояния системы из консоли, необходимо выполнить команду: <b>app/console monitor:health</b></p>
                    <p>
                        <a href=\"";
        // line 135
        echo $this->env->getExtension('routing')->getPath("application_sonata_admin_phpinfo");
        echo "\" class=\"btn btn-small\" title=\"phpinfo()\" target=\"_blank\">
                            <i class=\"icon-info-sign\"></i>
                            phpinfo()
                        </a>
                        <a href=\"";
        // line 139
        echo $this->env->getExtension('routing')->getPath("application_sonata_admin_log", array("chars" => 10000));
        echo "\" class=\"btn btn-small\" title=\"prod.log\" target=\"_blank\">
                            <i class=\"icon-info-sign\"></i>
                            prod.log
                        </a>
                    </p>
            </td>
        </tr>
    </table>

    <script>
        \$(document).ready(function() {

        var seriesOptions = [],
                colors = Highcharts.getOptions().colors;";
        // line 152
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["statistics"]) ? $context["statistics"] : $this->getContext($context, "statistics")), "seriesOptions", array()));
        foreach ($context['_seq'] as $context["so_key"] => $context["so"]) {
            // line 153
            echo "                seriesOptions[";
            echo twig_escape_filter($this->env, $context["so_key"], "html", null, true);
            echo "] = {
        animation: false,
                name: \"";
            // line 155
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute($context["so"], "caption", array()), "js"), "html", null, true);
            echo "\",
                data: [
        ";
            // line 157
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["so"], "data", array()));
            foreach ($context['_seq'] as $context["d_key"] => $context["d"]) {
                // line 158
                echo "                            [";
                echo twig_escape_filter($this->env, $this->getAttribute($context["d"], 0, array(), "array"), "html", null, true);
                echo ",";
                echo twig_escape_filter($this->env, $this->getAttribute($context["d"], 1, array(), "array"), "html", null, true);
                echo " ],";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['d_key'], $context['d'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 159
            echo "                    ]
            },";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['so_key'], $context['so'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 161
        echo "                    console.log(seriesOptions);
                    createChart();
                    // create the chart when all data is loaded
                            function createChart() {

                            \$('#container').highcharts('StockChart', {
                            chart: {
                            type: 'line', // spline, line, area
                                    margin: [40, 5, 50, 5]
                                    //  backgroundColor: '#f9f9f9'
                            },
                                    title: {
                                    text: 'ЗАКАЗЫ / ПОЛЬЗОВАТЕЛИ',
                                            align: 'left',
                                            x: 8,
                                            style: {
                                            color: '#404040',
                                                    fontSize:'12px'
                                            }
                                    },
                                    rangeSelector: {
                                    enabled: true,
                                            selected: 2,
                                            buttons: [
                                            {type: 'week', count: 1, text: '1н'},
                                            {type: 'week', count: 2, text: '2н'},
                                            {type: 'month', count: 1, text: '1м'},
                                            {type: 'month', count: 2, text: '2м'},
                                            {type: 'month', count: 6, text: '6м'},
                                            {type: 'ytd', text: 'СНГ'},
                                            {type: 'year', count: 1, text: '1г'},
                                            {type: 'all', text: 'Все'}
                                            ],
                                            inputPosition: {
                                            align: 'left',
                                                    x: 320
                                            }
                                    },
                                    navigator: {
                                    height: 50,
                                            series: {
                                            type: 'area'
                                            }
                                    },
                                    colors: [
                                            'rgb(100, 100, 100)',
                                            'rgb(0, 200, 0)',
                                            'rgb(255, 0, 0)',
                                            'rgb(255, 153, 0)',
                                            'rgb(102, 153, 204)'
                                    ],
                                    credits: {
                                    enabled: false
                                    },
                                    xAxis: {
                                    minRange: 7 * 24 * 3600 * 1000,
                                            minTickInterval: 24 * 3600 * 1000,
                                            type: 'datetime',
                                            labels: {
                                            rotation: - 45,
                                                    align: 'right',
                                                    style: {
                                                    fontSize: '12px'
                                                    }
                                            },
                                            dateTimeLabelFormats: {
                                            millisecond: '%H:%M:%S.%L',
                                                    second: '%H:%M:%S',
                                                    minute: '%H:%M',
                                                    hour: '%H:%M',
                                                    day: '%e %b',
                                                    week: '%e %b',
                                                    month: '%b %Y',
                                                    year: '%Y'
                                            }
                                    },
                                    yAxis: {
                                    tickInterval: 1
                                    },
                                    legend: {
                                    enabled: true,
                                            verticalAlign: 'top',
                                            align: 'right',
                                            x: - 10,
                                            y: 23
                                    },
                                    tooltip: {
                                    valueDecimals: 0
                                    },
                                    series: seriesOptions
                            });
                            }

                    });
        </script>


        ";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataBlockBundle:Block:block_statistics.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  318 => 161,  311 => 159,  301 => 158,  297 => 157,  292 => 155,  286 => 153,  282 => 152,  266 => 139,  259 => 135,  253 => 131,  239 => 129,  227 => 128,  214 => 127,  210 => 126,  205 => 124,  201 => 123,  176 => 101,  170 => 98,  164 => 95,  158 => 92,  151 => 88,  138 => 78,  132 => 75,  126 => 72,  120 => 69,  113 => 65,  98 => 53,  92 => 50,  86 => 47,  79 => 43,  66 => 33,  59 => 29,  52 => 25,  46 => 22,  39 => 18,  29 => 10,  26 => 9,);
    }
}
