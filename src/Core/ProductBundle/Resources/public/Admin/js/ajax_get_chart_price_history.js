
/**
 * График цен
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

$(function () {

    // Инициализация окна-контейнера для помешения графика
    $('body').append('<div id="graph-container" title="График изменения цены"><div id="linechart"></div></div>');
    $('#graph-container').dialog({
        modal: true,
        width: '80%',
        height: '465',
        autoOpen: false,
        show: {
            effect: "fade",
            duration: 300
        },
        hide: {
            effect: "fade",
            duration: 300
        },
        position: "center",
        open: function (event, ui) {
            $('.ui-dialog').css({position: 'fixed', top: 100});
            $('#linechart').highcharts().reflow();
        },
        resize: function (event, ui) {
            $('#linechart').highcharts().setSize(
                    this.offsetWidth - 26,
                    this.offsetHeight - 30,
                    false
                    );
        }
    });

    // создание графика
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: "linechart",
            zoomType: "x",
            resetZoomButton: {
                position: {
                    x: -35,
                    y: -54
                }
            }
        },
        legend: {
            align: "left",
            verticalAlign: "top",
            floating: true,
            borderWidth: 1
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true,
                    y: -6,
                    formatter: function () {
                        return Highcharts.numberFormat(this.y, 2) + this.series.tooltipOptions.valueSuffix;
                    },
                    borderRadius: 3,
                    backgroundColor: "rgba(252, 255, 197, 0.8)",
                    color: "#000"
                }
            }
        },
        subtitle: {
            text: 'Текущая цена: <span id="highcharts-current-price"></span>' + currencySymbol + ', установлена <span id="highcharts-current-date"></span> (UTC/GMT <span id="highcharts-current-time-offset"></span>ч.)',
            useHTML: true
        },
        title: {
            text: "График изменения цены",
            margin: 25
        },
        tooltip: {
            crosshairs: [{
                    color: "#999",
                    dashStyle: "shortdot"
                }, {
                    color: "#999",
                    dashStyle: "shortdot"
                }],
            useHTML: true,
            xDateFormat: "%d.%m.%Y в %H:%M:",
            formatter: function () {
                var date = new Date(this.x),
                        formatDate = ('0' + (date.getUTCDate())).slice(-2) + '.' + ('0' + (date.getUTCMonth() + 1)).slice(-2) + '.' + date.getUTCFullYear() + ' в ' + ('0' + (date.getUTCHours())).slice(-2) + ':' + ('0' + (date.getUTCMinutes())).slice(-2);
                return this.key + '<br>' + formatDate + '<br><span style=\"color: ' + this.series.color + '\">' + this.series.name + '</span>: <b>' + Highcharts.numberFormat(this.y, 2) + this.series.tooltipOptions.valueSuffix + '</b>';
            },
            valueSuffix: currencySymbol
        },
        xAxis: {
            type: "datetime",
            gridLineWidth: 1,
            gridLineColor: "rgba(255, 255, 255, 0.1)",
            maxZoom: 21600000,
            dateTimeLabelFormats: {
                day: "%e %b",
                week: "%e %b",
                month: "%b %y"
            }
        },
        yAxis: {
            title: {
                text: "Цена (" + currencySymbol + ")"
            },
            labels: {
                formatter: function () {
                    return Highcharts.numberFormat(this.value, 2);
                }
            }
        },
        series: [{
                animation: false,
                name: "Цена",
                data: []
            }],
        exporting: {
            chartOptions: {
                subtitle: {
                    text: ''
                }
            }
        }
    });

    // запрос и обработка данных (построение графика)
    $('.get-chart-price-history').click(function () {
        var id = $(this).data('id');

        $.ajax({
            url: core_statistics_ajax_get_chart_price_history,
            type: 'POST',
            data: 'id=' + id
        }).done(function (result) {
            if (result) {
                var data = $.parseJSON(result);

                $('#linechart').highcharts().series[0].setData(data.series);
                $('#highcharts-current-price').text(Highcharts.numberFormat(data.current.price, 2));
                $('#highcharts-current-date').text(data.current.humanDate);
                $('#highcharts-current-time-offset').text((data.current.timeOffsetInHours > 0 ? '+' : '') + data.current.timeOffsetInHours);

                $('#graph-container').dialog('open');
            }

        }).fail(function (e, e2, e3) {
            console.log(e);
            console.log(e2);
            console.log(e3);
            alert('При получении данных, для построения графика, прозошла ошибка!');
        });
    });
});