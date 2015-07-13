//variable for function
var deleteDialog;

$(function() {

    var delete_id = 0;

    var dialog = $("#dialog-form").dialog({
        autoOpen: false,
        height: 300,
        width: 350,
        modal: true,
        buttons: [
        {
            text: "Delete",
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

    deleteDialog = function(id) {
        delete_id = id;
        dialog.dialog("open");
    }
});

