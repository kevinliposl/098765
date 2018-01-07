$("#form-courses").change(function () {
    if ($("#form-courses").val() !== "-1") {
        args = {
            "initials": $("#form-courses").val()
        };

        SEMICOLON.widget.notifications($("#wait"));

        $.post("?controller=Course&action=selectDelete", args, function (data) {
            if (data.initials) {
                $("#form-initials-table").html(data.initials);
                $("#form-name-table").html(data.name);
                $("#form-instrument-table").html(data.instrument);
                $("#form-description-table").html(data.description);
                SEMICOLON.widget.notifications($("#success"));

                $("#form-submit").css("display", "block");
            } else {
                $("#form-initials-table").html("");
                $("#form-name-table").html("");
                $("#form-instrument-table").html("");
                $("#form-description-table").html("");
                $("#form-secondLastName-table").html("");
                SEMICOLON.widget.notifications($("#warning"));

                $("#form-submit").css("display", "none");
            }
        }, "json");
    } else {
        $("#form-initials-table").html("");
        $("#form-name-table").html("");
        $("#form-instrument-table").html("");
        $("#form-description-table").html("");
        $("#form-secondLastName-table").html("");

        $("#form-submit").css("display", "none");
    }
});

$("#form-submit").click(function () {
    if ($("#form-courses").val() === "-1") {
        $("#failed-form-courses").attr("data-notify-msg", "<i class=icon-remove-sign></i> Curso inválido. Seleccione e intente de nuevo!");
        SEMICOLON.widget.notifications($("#failed-form-courses"));
        return false;
    } else {
        $('#form-submit').attr('data-target', '#myModal');
    }
});

$("#form-submity").click(function () {
    $("#form-submity").attr('disabled', 'disabled');
    $("#form-close").attr('disabled', 'disabled');

    SEMICOLON.widget.notifications($("#wait"));

    $.post("?controller=Course&action=reactivate", args, function (data) {
        if (data.result === "1") {
            SEMICOLON.widget.notifications($("#success"));
            setTimeout("location.href = '?controller=Course&action=reactivate';", 2000);
        } else {
            SEMICOLON.widget.notifications($("#warning"));
            $("#form-submity").removeAttr('disabled');
            $("#form-close").removeAttr('disabled');
        }
    }, "json");
});