//variable for function
var deleteDialog;

$(function() {

    var delete_id = 0;
    var global_kpi_id = 0;


    //KPA DELETE

    var kpadialog = $("#kpadialog-form").dialog({
        autoOpen: false,
        height: 300,
        width: 350,
        modal: true,
        buttons: [
        {
            text: "Delete KPA",
            click: function() {
                window.location.href = "/web/index.php?r=site%2Fdeletekpa&id=" + delete_id;
            }
        },
        {
            text: "Cancel",
            click: function() {
                $(this).dialog("close");
            }
        }
    ]
    });
    kpaDeleteDialog = function(id) {
        delete_id = id;
    kpadialog.dialog("open");
    }


    //GOAL DELETE
    var goaldialog = $("#goaldialog-form").dialog({
        autoOpen: false,
        height: 300,
        width: 350,
        modal: true,
        buttons: [
        {
            text: "Delete Goal",
            click: function() {
                window.location.href = "/web/index.php?r=site%2Fdeletegoal&id=" + delete_id;
            }
        },
        {
            text: "Cancel",
            click: function() {
                $(this).dialog("close");
            }
        }
    ]
    });
    goalDeleteDialog = function(id) {
        delete_id = id;
    goaldialog.dialog("open");
    }
    //KPI DELETE
    var kpidialog = $("#kpidialog-form").dialog({
        autoOpen: false,
        height: 300,
        width: 350,
        modal: true,
        buttons: [
        {
            text: "Delete KPI",
            click: function() {
                window.location.href = "/web/index.php?r=site%2Fdeletekpi&id=" + delete_id;
            }
        },
        {
            text: "Cancel",
            click: function() {
                $(this).dialog("close");
            }
        }
    ]
    });
    kpiDeleteDialog = function(id) {
        delete_id = id;
    kpidialog.dialog("open");
    }
    //METRIC DELETE
    var metricdialog = $("#metricdialog-form").dialog({
        autoOpen: false,
        height: 300,
        width: 350,
        modal: true,
        buttons: [
        {
            text: "Delete Metric",
            click: function() {
                window.location.href = "/web/index.php?r=site%2Fdeletemetric&metric_id=" + delete_id +"&kpi_id="+ global_kpi_id;
            }
        },
        {
            text: "Cancel",
            click: function() {
                $(this).dialog("close");
            }
        }
    ]
    });
    metricDeleteDialog = function(metric_id, kpi_id) {
        delete_id = metric_id;
        global_kpi_id = kpi_id;
    metricdialog.dialog("open");
    }


});


    function createGauge( currentData, maxScale,elementID) {

        var gaugeOptions = {

            chart: {
                type: 'solidgauge'
            },

            title: null,

            pane: {
                center: ['50%', '85%'],
                size: '100%',
                startAngle: -90,
                endAngle: 90,
                background: {
                    backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
                    innerRadius: '60%',
                    outerRadius: '100%',
                    shape: 'arc'
                }
            },

            tooltip: {
                enabled: false
            },

            // the value axis
            yAxis: {
                stops: [
                    [0.1, '#55BF3B'], // green
                    [0.5, '#DDDF0D'], // yellow
                    [0.9, '#DF5353'] // red
                ],
                lineWidth: 0,
                minorTickInterval: null,
                tickPixelInterval: 400,
                tickWidth: 0,
                title: {
                    y: -70
                },
                labels: {
                    y: 16
                }
            },

            plotOptions: {
                solidgauge: {
                    dataLabels: {
                        y: 5,
                        borderWidth: 0,
                        useHTML: true
                    }
                }
            }
        };

        // The speed gauge
        $('#' + elementID).highcharts(Highcharts.merge(gaugeOptions, {
            yAxis: {
                min: 0,
                max: maxScale,
                title: {
                    text: 'Score'
                }
            },

            credits: {
                enabled: false
            },

            series: [{
                name: 'Speed',
                data: [currentData],
                dataLabels: {
                    format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                        ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><br/>' +
                           '<span style="font-size:12px;color:silver">Score</span></div>'
                },
                tooltip: {
                    valueSuffix: ' km/h'
                }
            }]

        }));

        $('#container-speed').highcharts(),
                point,
                newVal,
                inc;
    }
