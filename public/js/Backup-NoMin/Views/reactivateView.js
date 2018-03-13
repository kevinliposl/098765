$("#form-student").change(function () {
    if ($("#form-student").val() !== "-1") {

        SEMICOLON.widget.notifications($("#wait"));

        var value = $("#form-student").val();
        var values = value.split(";");
        var parameters = {
            "id": values[0],
            "tipo": values[1]
        };
        $.post("?controller=Student&action=selectDeleteStudent", parameters, function (data) {
            if (data.identification) {
                $("#form-id-table").text(data.identification);
                $("#form-name-table").text(data.name);
                $("#form-lastName-table").text(data.first_lastname + " " + data.second_lastname);
                $("#form-phones-table").text(data.phoneOne + ", " + data.phoneTwo);
                $("#form-email-table").text(data.email);
                $("#form-rango").text(data.tipo);
                $("#form-submit").css("display", "block");
                SEMICOLON.widget.notifications($("#success"));
            } else {
                SEMICOLON.widget.notifications($("#warning"));
            }
        }, "json");
    } else {
        $("#form-id-table").text("");
        $("#form-name-table").text("");
        $("#form-lastName-table").text("");
        $("#form-phones-table").text("");
        $("#form-email-table").text("");
        $("#form-rango").text("");
        $("#form-submit").css('display', "none");
    }
});


function Redirect() {
    window.location = "?controller=Student&action=reactivateStudent";
}

$("#form-submity").click(function () {

    $("#form-submity").attr('disabled', 'disabled');
    $("#form-close").attr('disabled', 'disabled');

    SEMICOLON.widget.notifications($("#wait"));

    var value = $("#form-student").val();
    var values = value.split(";");
    var parameters = {
        "id": values[0],
        "tipo": values[1]
    };
    $.post("?controller=Student&action=reactivateStudent", parameters, function (data) {
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