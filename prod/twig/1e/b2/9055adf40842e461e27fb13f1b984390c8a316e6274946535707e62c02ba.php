<?php

/* ApplicationSonataUserBundle:Admin/Form:balance_history_widget.html.twig */
class __TwigTemplate_1eb29055adf40842e461e27fb13f1b984390c8a316e6274946535707e62c02ba extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 9
        try {
            $this->parent = $this->env->loadTemplate("SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(9);

            throw $e;
        }

        $_trait_0 = $this->env->loadTemplate("ApplicationSonataUserBundle:Admin/Form:balance_history_tbody.html.twig");
        // line 11
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."ApplicationSonataUserBundle:Admin/Form:balance_history_tbody.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'balance_history_widget' => array($this, 'block_balance_history_widget'),
            )
        );
    }

    protected function doGetParent(array $context)
    {
        // line 9
        return "SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 13
    public function block_balance_history_widget($context, array $blocks = array())
    {
        // line 14
        echo "    ";
        ob_start();
        // line 16
        if ((isset($context["balanceHistory"]) ? $context["balanceHistory"] : null)) {
            // line 18
            $context["balance"] = 0;
            // line 20
            echo "<script>
                \$(function () {

                    \$('#sellers').on('change', function(){
                        var url = \$(this).val();
                        \$('#table-export-to-csv').hide();
                        \$.ajax({
                            url: url,
                            success: function (result) {
                                \$('#table-export-to-csv').replaceWith(result).show();
                            }
                        });
                    });

                    \$(\"#btn-export-to-csv\").on('click', function (event) {
                        exportTableToCSV.apply(this, [\$('#table-export-to-csv'), \$('#table-export-to-csv').data('csv-name')]);
                    });";
            // line 38
            $context["balance"] = 0;
            // line 39
            echo "var seriesOptions = [{
                        animation: false,
                        name: 'Баланс',
                        data: [

                        [";
            // line 44
            echo twig_escape_filter($this->env, (twig_date_format_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "createdDateTime", array()), "U", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)) * 1000), "html", null, true);
            echo ", 0],";
            // line 46
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["balanceHistory"]) ? $context["balanceHistory"] : null));
            foreach ($context['_seq'] as $context["i"] => $context["item"]) {
                // line 47
                $context["balance"] = (($this->getAttribute($context["item"], "type", array())) ? (((isset($context["balance"]) ? $context["balance"] : null) + $this->getAttribute($context["item"], "amount", array()))) : (((isset($context["balance"]) ? $context["balance"] : null) - $this->getAttribute($context["item"], "amount", array()))));
                // line 48
                echo "[";
                echo twig_escape_filter($this->env, (twig_date_format_filter($this->env, $this->getAttribute($context["item"], "date", array()), "U", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)) * 1000), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, (isset($context["balance"]) ? $context["balance"] : null), "html", null, true);
                echo "],";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['i'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 51
            echo "]
                    }];
                    createChart();
                    function createChart() {

                        \$('#balance-history-highcharts').highcharts('StockChart', {
                            chart: {
                                type: 'line',
                                margin: [40, 5, 50, 5],
                                width: \$(window).width() - 90,
                            },
                            title: {
                                text: 'Баланс',
                                align: 'left',
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
                                series: {type: 'area'}
                            },
                            credits: {enabled: false},
                            xAxis: {
                                minRange: 7 * 24 * 3600 * 1000,
                                minTickInterval: 24 * 3600 * 1000,
                                type: 'datetime',
                                labels: {
                                    rotation: -45,
                                    align: 'right',
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
                                    labels: {
                                    style: {width: '150px',},
                                    formatter: function() {
                                        return number_format(this.value) + ' ' + this.chart.tooltip.options.valueSuffix;
                                    }
                                },
                                plotLines: [{
                                    value: 0,
                                    width: 2,
                                    color: 'red',
                                    dashStyle : 'shortdash'
                                }]
                            },
                            legend: {enabled: false},
                            tooltip: {
                                valueDecimals: 2,
                                valueSuffix: ' ";
            // line 125
            echo twig_escape_filter($this->env, $this->env->getExtension('money_extension')->currencyFormatFunction(), "html", null, true);
            echo "',
                            },
                            series: seriesOptions
                        });
                    }
                });
            </script>

            <div class=\"balance-history-container\">

                <table class=\"table table-bordered \">
                    <thead>
                        <td colspan=\"5\">
                            <div class=\"pull-left\">История баланса контрагента&nbsp;</div>
                            <div class=\"pull-right\">
                                ";
            // line 148
            echo "                                <a id=\"btn-export-to-csv\" href=\"#\" class=\"btn\"><i class=\"icon-file\"></i>Экспорт в CSV</a>
                            </div>
                        </td>
                    </thead>

                    ";
            // line 153
            $this->displayBlock("balance_history_tbody", $context, $blocks);
            echo "

                </table>

            </div>

            <div class=\"clearfix\"></div>
            <br>
            <br>

            <div class=\"balance-history-highcharts-container\">

                <table class=\"table table-bordered\">
                    <tr>
                        <td>
                            <div  id=\"balance-history-highcharts\" style=\"height: 500px;width:100%;\"></div>
                        </td>
                    </tr>
                </table>

            </div>";
        } else {
            // line 177
            echo "Контрагент еще не совершал никаких операций!";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "ApplicationSonataUserBundle:Admin/Form:balance_history_widget.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  230 => 177,  206 => 153,  199 => 148,  181 => 125,  105 => 51,  95 => 48,  93 => 47,  89 => 46,  86 => 44,  79 => 39,  77 => 38,  59 => 20,  57 => 18,  55 => 16,  52 => 14,  49 => 13,  40 => 9,  22 => 11,  11 => 9,);
    }
}
