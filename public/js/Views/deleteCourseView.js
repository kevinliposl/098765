$("#form-courses").change(function () {
    if ($("#form-courses").val() !== "-1") {
        var parameters = {
            "initials": $("#form-courses").val()
        };

        SEMICOLON.widget.notifications($("#wait"));

        $.post("?controller=Course&action=select", parameters, function (data) {
            if (data.initials) {
                $("#form-initials-table").html(data.initials);
                $("#form-name-table").html(data.name);
                $("#form-instrument-table").html(data.instrument);
                $("#form-description-table").html(data.description);
                $("#form-submit").css("display", "block");

                SEMICOLON.widget.notifications($("#success"));
            } else {
                $("#form-initials-table").html("");
                $("#form-name-table").html("");
                $("#form-instrument-table").html("");
                $("#form-description-table").html("");
                $("#form-secondLastName-table").html("");
                $("#form-submit").css("display", "none");

                SEMICOLON.widget.notifications($("#warning"));
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

    var parameters = {
        "initials": $("#form-courses").val()
    };

    $.post("?controller=Course&action=delete", parameters, function (data) {
        if (data.result === "1") {
            SEMICOLON.widget.notifications($("#success"));
            setTimeout("location.href = '?controller=Course&action=delete';", 1500);
        } else {
            SEMICOLON.widget.notifications($("#warning"));
            $("#form-submity").removeAttr('disabled');
            $("#form-close").removeAttr('disabled');
        }
    }, "json");
});

