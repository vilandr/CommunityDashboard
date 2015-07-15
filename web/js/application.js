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

