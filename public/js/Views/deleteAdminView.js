function val() {

    if ($("#form-admin").val() === "-1") {
        SEMICOLON.widget.notifications($("#failed-id"));
        return false;
    } else {
        $('#showModal').click();
        return false;
    }
}

$("#form-admin").change(function () {
    if ($("#form-admin").val() !== "-1") {

        args = {
            "id": $("#form-admin").val()
        };

        SEMICOLON.widget.notifications($("#wait"));

        $.post("?controller=Admin&action=select", args, function (data) {
            if (data.identification) {
                $("#form-id-table").html(data.identification);
                $("#form-name-table").html(data.name);
                $("#form-email-table").html(data.email);
                $("#form-firstLastName-table").html(data.first_lastname);
                $("#form-secondLastName-table").html(data.second_lastname);
                $("#form-submit").css('display', 'block');
                SEMICOLON.widget.notifications($("#success"));
            } else {
                $("#form-id-table").html("");
                $("#form-name-table").html("");
                $("#form-email-table").html("");
                $("#form-firstLastName-table").html("");
                $("#form-secondLastName-table").html("");
                $("#form-submit").css('display', 'none');
            }
        }, "json");
    } else {
        $("#form-id-table").html("");
        $("#form-name-table").html("");
        $("#form-email-table").html("");
        $("#form-firstLastName-table").html("");
        $("#form-secondLastName-table").html("");
        $("#form-submit").css('display', 'none');
    }
});

$("#form-submity").click(function () {

    $("#form-submity").attr('disabled', 'disabled');
    $("#form-close").attr('disabled', 'disabled');

    SEMICOLON.widget.notifications($("#wait"));

    $.post("?controller=Admin&action=delete", args, function (data) {
        if (data.result === "1") {
            SEMICOLON.widget.notifications($("#success"));
            setTimeout("location.href = '?controller=Admin&action=delete';", 1500);
        } else {
            SEMICOLON.widget.notifications($("#warning"));
            $("#form-submity").removeAttr('disabled');
            $("#form-close").removeAttr('disabled');
        }
    }, "json");
});