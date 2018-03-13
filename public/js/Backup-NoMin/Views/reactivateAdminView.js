$("#form-admin").change(function () {
    SEMICOLON.widget.notifications($("#wait"));

    if ($("#form-admin").val() !== "-1") {

        var parameters = {
            "id": $("#form-admin").val()
        };

        SEMICOLON.widget.notifications($("#wait"));

        $.post("?controller=Admin&action=select", parameters, function (data) {
            if (data.identification) {
                $("#form-id-table").text(data.identification);
                $("#form-name-table").text(data.name);
                $("#form-first-lastName-table").text(data.first_lastname);
                $("#form-second-lastName-table").text(data.second_lastname);
                $("#form-email-table").text(data.email);
                $("#form-submit").css('display', "block");
                SEMICOLON.widget.notifications($("#success"));
            } else {
                SEMICOLON.widget.notifications($("#warning"));
            }
        }, "json");
    } else {
        document.getElementById("form-submit").style.display = "none";
    }
});
function Redirect() {
    window.location = "?controller=Admin&action=reactivate";
}

$("#form-submit").click(function () {
    $("#showModal").click();
});

$("#form-submity").click(function () {
    $("#form-submity").attr('disabled', 'disabled');
    $("#form-close").attr('disabled', 'disabled');

    SEMICOLON.widget.notifications($("#wait"));

    var parameters = {
        "id": $("#form-admin").val()
    };

    $.post("?controller=Admin&action=reactivate", parameters, function (data) {
        if (data.result === "1") {
            SEMICOLON.widget.notifications($("#success"));
            setTimeout('Redirect()', 1000);
        } else {
            SEMICOLON.widget.notifications($("#warning"));
            $("#form-submity").removeAttr('disabled');
            $("#form-close").removeAttr('disabled');
        }
    }, "json");
});
