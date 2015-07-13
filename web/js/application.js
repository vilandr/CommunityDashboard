$(function() {
    var dialog = $("#dialog-form").dialog({
        autoOpen: false,
        height: 300,
        width: 350,
        modal: true,
        buttons: [
        {
            text: "Delete",
            click: function() {

                //$('#delete-kpa-form').submit();

            }
        },
        {
            text: "Cancel",
            click: function() {
                //document.forms[0].reset();
                $(this).dialog("close");
            }
        }
    ]
    });

    $("ul.ops li button").click(function() {
        dialog.dialog("open");
    });
});
