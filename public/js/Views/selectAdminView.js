$("#form-admin").change(function () {

    if ($("#form-admin").val() !== "-1") {

        var parameters = {
            "id": $("#form-admin").val()
        };

        SEMICOLON.widget.notifications($("#wait"));

        $.post("?controller=Admin&action=select", parameters, function (data) {
            if (data.identification) {
                $("#form-id-table").html(data.identification);
                $("#form-name-table").html(data.name);
                $("#form-email-table").html(data.email);
                $("#form-firstLastName-table").html(data.first_lastname);
                $("#form-secondLastName-table").html(data.second_lastname);
                SEMICOLON.widget.notifications($("#success"));
            } else {
                $("#form-id-table").html("");
                $("#form-name-table").html("");
                $("#form-email-table").html("");
                $("#form-firstLastName-table").html("");
                $("#form-secondLastName-table").html("");
                SEMICOLON.widget.notifications($("#warning"));
            }
        }, "json");
    }
});
